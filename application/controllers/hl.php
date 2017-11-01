<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 三方平台登录
 * 后台对应的 controllers 全部在 myhl 里面
 */
class hl extends CI_Controller {
    /*
      首页
     */

    public function index() {
        $this->load->view('hl/index');
    }

    /*
      登录页
     */

    public function login() {
        $this->load->view('hl/login');
    }
    
    /*
     * 退出
     */
    public function logout()
    {
        //清除session
        $this->session->unset_userdata('sangfang_admin');
        $this->load->view('hl/logout');
    }

    /*
     * 登录方法
     */

    public function mylogin() {

        date_default_timezone_set("Asia/Shanghai");
        $this->load->library('encrypt');
        //清除session
        $this->session->unset_userdata('sangfang_admin');
        $vc = $this->getMyCode();
        $yanzhengma = $this->security->xss_clean($this->input->post('VerifyCode'));

        if (strcasecmp($vc, $yanzhengma) == 0) {

            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $sql = 'select m.id as id,
                m.sanfanggongsiid as sanfanggongsiid,m.guanliyuan as guanliyuan,m.mima as mima,m.shoujihao as shoujihao,m.dengluriqi as dengluriqi 
                from sanfangpingtai as m where m.guanliyuan = ?';
            $res = $this->db->query($sql, array($username));
            $rows = $res->result();
            
            foreach ($rows as $row) {

                if (!empty($row) && intval($row->id) > 0) {

                    $de_password = $this->encrypt->decode($row->mima);
                    if ($de_password == $password) {
                        $sanfanggongsiid = $row->sanfanggongsiid;

                        $web_admin = array('id' => $row->id, 'guanliyuan' => $username, 'mima' => $de_password, 'sanfanggongsiid' => $sanfanggongsiid);
                        $this->session->set_userdata('sangfang_admin', $web_admin);
                        
                        // 更新登录日期                        
                        $this->db->update('sanfangpingtai', array('dengluriqi' => date("Y-m-d H:i:s")), array('id' => $row->id));

                        // 跳转到首页
                        redirect('/myhl/lianjieguanli/dizhi/index');
                    }
                }
            }

            if (count($rows) == 0) {
                $data['err'] = '密码输入错误！';
                $this->load->view('hl/login', $data);
            }
        } else {
            $data['err'] = '验证码输入错误！';
            $this->load->view('hl/login', $data);
        }

        $data['err'] = '用户名密码错误！';
        $this->load->view('hl/login', $data);
    }
    
    public function validationCode() {
        header('Content-Type:text/html; charset=utf-8');

        $vc = $this->getMyCode();
        $yanzhengma = $this->input->post('VerifyCode');
        if (strcasecmp($vc, $yanzhengma) == 0) {
            echo 'true';
        }
        echo 'false';
    }

    /*
     * 获取验证码
     */

    public function getMyCode() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!empty($_SESSION ['code'])) {
            return $_SESSION ['code'];
        }
        return '';
    }

}
