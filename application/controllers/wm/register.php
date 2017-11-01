<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class register extends CI_Controller {
    private $chanpin = array(
        0 => "国内机票",
        1 => "火车票",
        2 => "国内酒店",
        3 => "机票保险",
    );
    public function index()
    {
        $this->load->view('wm/register');
    }
    public function fayanzhengma()
    {

        $this->load->library('encrypt');
        $this->load->helper('cookie');

        $yanzhengma = rand(10000,99999);
        //$yanzhengma = 11111;
        $email = $this->security->xss_clean($this->input->post('email'));
  
		$this->session->set_userdata('wmgr_yanzhengma', $yanzhengma, "1800");
        
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
        $this->email->subject('[比比旅行]网盟注册验证码');
        $this->email->message(
                '<div style="font-size: 14px;">
               ' . $email . '，你好!：<br/>
                您的网盟注册验证码为：
                <br/>
				<br/>
				<span style="color:#00ccff">' . $yanzhengma . '</span>
				<br/>
				<br/>
                30分钟内输入有效。
                <br/><br/>
                比比旅行网盟地址：<a href="http://wm.bibi321.com">http://wm.bibi321.com</a>
                 <br/>
                (本邮件由系统发出，请不要回复。)
            </div>'
        );

     echo    $this->email->send();
    }

    public function getyanzhengma()
    {
		$yanzhengma=$this->session->userdata('wmgr_yanzhengma');
        $getyanzhengma = $this->security->xss_clean($this->input->post('yanzhengma'));
        if ($yanzhengma == $getyanzhengma) {
            echo "true";
        } else {
            echo "false";
        }
        
    }

    public function gerenkaihu()
    {
        $this->load->library('mysimpleencrypt');
        $this->load->library('encrypt');
        $this->load->helper('string');
        $email = $this->security->xss_clean($this->input->post('email'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $shanghudianhua = $this->security->xss_clean($this->input->post('shanghudianhua'));

        $this->db->trans_begin();
        $shanghuhao = rand(10000, 99999);
        $sql = 'select shanghuhao from wm_qiyeshanghu where shanghuhao = ?';
        $query = $this->db->query($sql, array($shanghuhao));
        if ($query->num_rows() > 0) {
            $shanghuhao = rand(10000, 99999);
        }
        $password = random_string('alnum', 6);
        $mima = $this->encrypt->encode($shanghuhao . $password);
        $obj = array(
            "shanghuhao" => $shanghuhao,
            "mima" => $mima,
            "email" => $email,
            "name" => $name,
            "shanghudianhua" => $shanghudianhua,
            "shanghuleixing" => 1,
            "shanghuzhuangtai" => 0,
            "qingsuanfangshi" => 1,
            "qingsuanriqi" => 10,
            "chuangjianshijian" => date("Y-m-d H:i:s")

        );
        $this->db->insert('wm_qiyeshanghu', $obj);
       $shanghao = array(
           "shanghuhao" => $shanghuhao,
           "huzhuming" => $name,
           "zhanghao" => '',
           "shoukuanpingtai" => '',
           "time" => date("Y-m-d H:i:s"),
       );
       $this->db->insert('wm_shoukuanzhanghu', $shanghao);

       $data = array(
           array(
                "chuangjianshijian" => date("Y-m-d H:i:s"),
                "shanghuhao" => $shanghuhao,
                "chanpinleixing" => 0,
                "yongjinjishu" => 5,
                "qianyuefangshi" => 0,
                "zhuangtai" => 1               
           ),
           array(
                "chuangjianshijian" => date("Y-m-d H:i:s"),
                "shanghuhao" => $shanghuhao,
                "chanpinleixing" => 1,
                "yongjinjishu" => 2,
                "qianyuefangshi" => 0,
                "zhuangtai" => 1
           ),
           array(
                "chuangjianshijian" => date("Y-m-d H:i:s"),
                "shanghuhao" => $shanghuhao,
                "chanpinleixing" => 2,
                "yongjinjishu" => 0.03,
                "qianyuefangshi" => 1,
                "zhuangtai" => 1
           ),
           array(
                "chuangjianshijian" => date("Y-m-d H:i:s"),
                "shanghuhao" => $shanghuhao,
                "chanpinleixing" => 3,
                "yongjinjishu" => 10,
                "qianyuefangshi" => 0,
                "zhuangtai" => 1
           )
       );

       $this->db->insert_batch('wm_qianyuechanpin', $data);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

           redirect('wmgr/index/register');
        } else {
            $this->db->trans_commit();
      
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
            $this->email->subject('比比旅行开户成功');
            $this->email->message(
                    '<div style="font-size: 14px;">
                   尊敬的用户：<br/>
                   &nbsp&nbsp&nbsp&nbsp您好！<br/>
                   &nbsp&nbsp&nbsp&nbsp恭喜您在比比旅行平台成功开通账户！<br/>
                    <br/>

                    &nbsp&nbsp&nbsp&nbsp您的邮箱:' . $email . '<br/>
                    &nbsp&nbsp&nbsp&nbsp您的初始密码：<span style="color:#00ccff">' . $password . '</span>
                    <br/>
                     &nbsp&nbsp&nbsp&nbsp为了您账户的安全，请尽快登录【比比旅行】修改密码！
                    <br/><br/>
                     &nbsp&nbsp&nbsp&nbsp比比旅行：<a href="http://wm.bibi321.com">http://wm.bibi321.com</a>
                     <br/><br/>
                    (本邮件由系统发出，请不要回复!)
                </div>'
            );
            $this->email->send();
            redirect('wm/login/index?msg="ok"');
        }
    }
    
    public function chayouxiang() {
  
        $email = $this->security->xss_clean($this->input->post('email'));
        $sql = "select shanghuhao from wm_qiyeshanghu where email = ? limit 1";
        $query = $this->db->query($sql, array($email));
        $this->session->unset_userdata('wmgr_yanzhengma');
        if ($query->num_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
    
}