<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟付款设置
 */
class zhifu extends CI_Controller {
    /*
     * 首页
     */

    public function index() {
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $sql = 'SELECT m.huzhuming as huzhuming,m.shoukuanpingtai as shoukuanpingtai,m.zhanghao as zhanghao FROM wm_shoukuanzhanghu as m where m.shanghuhao = ?';
        $query = $this->db->query($sql,$shanghuhao);
        $data['zhanghu'] = $query->row();

        $sql = 'SELECT m.email as email FROM wm_qiyeshanghu as m where m.shanghuhao = ?';
        $query = $this->db->query($sql,$shanghuhao);
        $res = $query->row();

        $email = $this->emailyanma($res->email);
        $data['email'] = $email;
        $this->load->library('session');
        $this->session->set_userdata('wm_email', $res->email);
        $this->load->view('wm/wangmeng/zhifu/index',$data);
    }

    public function fayanzhengma()
    {   


        $this->load->library('encrypt');
        $this->load->library('session');
        $email = $this->session->userdata('wm_email');
        $this->load->helper('cookie');
        $yanzhengma = rand(10000,99999);
       // $yanzhengma = 11111;
        $this->session->set_userdata('wm_yanzhengma', $yanzhengma, "1800");

        // $email = '1157810112@qq.com'; 
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.bibi321.com';
        $config['smtp_user'] = 'postmaster@bibi321.com';
        $config['smtp_pass'] = 'Bibi321_CN';
        $config['smtp_port'] = '465';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['validate'] = 'TRUE';
        $config['dns'] = 'TRUE';
        $config['smtp_crypto'] = 'ssl';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->load->library('email');
        $this->email->initialize($config);

        //以下设置Email内容  
        $this->email->from('postmaster@bibi321.com', '比比旅行官网');
        $this->email->to($email);
        $this->email->subject('[比比旅行]网盟邮箱验证码');
        $this->email->message(
                '<div style="font-size: 14px;">
               ' . $email . '，你好!：<br/>
                您正在进行收款账户设置，请在验证码输入框中输入：
                <br/>
                    <br/>
                    <span style="color:#00ccff">' . $yanzhengma . '</span>
                    <br/>
                    <br/>
                 如果您没有进行此项操作，请忽略本邮件，验证码在30分钟内输入有效。
                <br/><br/>
                 比比旅行网盟地址：<a href="http://wm.bibi321.com">http://wm.bibi321.com</a>
                 <br/>
                (本邮件由系统发出，请不要回复。)
            </div>'
        );

        $this->email->send();
    }
    /**
     * 判断验证码
     */
    public function yanzheng()
    {
        $yanzhengshenfen = $this->security->xss_clean($this->input->post('yanzhengshenfen'));
		$wm_yanzhengma = $this->session->userdata('wm_yanzhengma');;
        if ($wm_yanzhengma == $yanzhengshenfen) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    /**
     * 修账号
     */
    public function xiuzhanghu()
    {
        $this->db->trans_begin();
        $shoukuanpingtai = $this->security->xss_clean($this->input->post('shoukuanpingtai'));
        $zhanghao = $this->security->xss_clean($this->input->post('zhanghao'));
        $huzhuming = $this->security->xss_clean($this->input->post('huzhuming'));
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $data = array('shoukuanpingtai' => $shoukuanpingtai, 'zhanghao' => $zhanghao);
        $this->db->update('wm_shoukuanzhanghu', $data, array('shanghuhao'=>$shanghuhao));

        $data_zhandu = array('shoukuanpingtai' => $shoukuanpingtai, 'shoukuanzhanghu' => $zhanghao,'shoukuanhuzuming'=>$huzhuming);
        $this->db->update('wm_shanghuzhangdan', $data_zhandu, array('shanghuhao'=>$shanghuhao,'zhuangtai'=>0));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'fasle';
        } else {
            $this->db->trans_commit();
            $this->load->library('session');
            $this->session->unset_userdata('wm_email');
			$this->session->unset_userdata('wm_yanzhengma');
            echo 'true';
        }       
    }

    /**
     * 
     * @param string $mail 邮箱
     * @return type 邮箱加掩码
     */
    function emailyanma($mail) {
        if (empty($mail)) {
            return $mail;
        }
        $l = strrpos($mail, "@");
        $str = substr($mail, 0, $l);
        $length = strlen($str);
        $count = 1;
        if ($length <= 4) {
            $le = substr($str, 1);
            $len = strlen($le);
            $yanma = "";
            $i = 0;
            while ($i < $len) {
                $yanma .= "*";
                $i +=1;
            }
            return str_replace($le, $yanma, $mail, $count);
        } else {
            $le = substr($str, 1, 5);

            return str_replace($le, "*****", $mail, $count);
        }
    }


}