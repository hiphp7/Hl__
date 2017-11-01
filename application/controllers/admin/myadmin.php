<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * app http://www.cnblogs.com/zhoujg/p/4629162.html
 */
class myadmin extends CI_Controller {

    public function index() {
        $this->load->view('admin/myadmin/index');
    }

    /*
     * 登录 
     */

    public function mylogin() {
       
        $this->load->library('encrypt');
        //清除session
        $this->session->unset_userdata('admin');
        $vc = $this->getMyCode();
        $yanzhengma = $this->security->xss_clean($this->input->post('VerifyCode'));
        
        if (strcasecmp($vc, $yanzhengma) == 0) {

            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            
            $sql = 'select m.id as id,m.mima as mima,m.jiaoseid as jiaoseid,m.guanliyuanzuid as guanliyuanzuid from guanliyuan as m where m.zhanghu = ?';
            $res = $this->db->query($sql, array($username));
            $rows = $res->result();
            
            foreach ($rows as $row) {
                
                if (!empty($row) && intval($row->id) > 0) {
                    
                    $de_password = $row->mima;
                    if($de_password == $password)
                    {
                        $jiaoseid = $row->jiaoseid;
                        $guanliyuanzuid = $row->guanliyuanzuid;
                        
                        $web_admin = array('id' => $row->id, 'username' => $username, 'jiaoseid' => $jiaoseid, 'guanliyuanzuid' => $guanliyuanzuid);
                        $this->session->set_userdata('admin', $web_admin);

                        redirect('/admin/myadmin/index');
                    }
                } 
            }
            
            if(count($rows) == 0)
            {
                $data['err'] = '密码输入错误！';
                $this->load->view('admin/myadmin/login', $data);
            }
        } else {
            $data['err'] = '验证码输入错误！';
            $this->load->view('admin/myadmin/login', $data);
        }

        $data['err'] = '用户名密码错误！';
        $this->load->view('admin/myadmin/login', $data);
         
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

