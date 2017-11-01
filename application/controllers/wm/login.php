<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 网盟
 * 后台对应的 controllers 全部在 mywm 里面
 */
class login extends CI_Controller {
    /*
      首页
     */

      public function index() {
        $this->load->helper('cookie');
        $data['username']=get_cookie('username', TRUE);
        $data['password']=get_cookie('password', TRUE);
        $remmber=get_cookie('remmber', TRUE);
		$msg = $this->input->get('msg');
        if ($remmber =="true" && !empty($data['username']) && !empty($data['password']) && $msg != 'ok' ) {
            redirect('wm/wangmeng/home/index');
        }
        $this->load->view('wm/login',$data);
    }

    // ajax验证码
    public function yanzhengma() {
        $this->load->library('encrypt');
        $vc = $this->getMyCode();
        $yanzhengma = $this->security->xss_clean($this->input->post('VerifyCode'));

        if (strcasecmp($vc, $yanzhengma) == 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    // 登录

    public function mylogin() {
        $this->session->unset_userdata('wm_admin');
        $this->load->library('encrypt');
        $this->load->helper('cookie');;
        $data = Array();
        $vc = $this->getMyCode();
        $yanzhengma = $this->security->xss_clean($this->input->post('VerifyCode'));
        $email = $this->security->xss_clean($this->input->post('name'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $num = intval($this->security->xss_clean($this->input->post('num')));
        $a = $this->input->post('remmber');
        $savepwd = $this->security->xss_clean($this->input->post('remmber'));
        if ($num >= 2) {
            if (strcasecmp($vc, $yanzhengma) == 0) {
                $sql = 'SELECT m.email as email,m.shanghuhao as shanghuhao,m.mima as mima,m.mingcheng as mingcheng,shanghudianhua as shanghudianhua, m.shanghuzhuangtai as shanghuzhuangtai FROM wm_qiyeshanghu as m where m.email = ? limit 1';
                $query = $this->db->query($sql, array($email));
                if ($query->num_rows() == 0) {
                    $data['status'] = 1;
                    $data['msg'] = "账户或密码有误，请检查";
                    $data['num'] = $num;
                } else {
                    $res = $query->row();
                    $mima = $res->mima;
                    $shanghuhao = $res->shanghuhao;
                    $mingcheng = $res->mingcheng;
                    if ($shanghuhao . $password == $this->encrypt->decode($mima)) {
                        if ($res->shanghuzhuangtai == 1) {
                            $data['status'] = 0;
                            $data['msg'] = "登录成功";
                            $data['num'] = $num;
                            $wm_admin = array('shanghuhao' => $res->shanghuhao, 'name' => $email,"mingcheng"=>$mingcheng);

                            if ($savepwd == "on") {

                                $user = array('name' => 'username', 'value' => $email, 'expire' => 60 * 60 * 24 * 30);
                                set_cookie($user);
                                $pwd = array('name' => 'password', 'value' => $password, 'expire' => 60 * 60 * 24 * 30);
                                set_cookie($pwd);
                                $remmber = array('name' => 'remmber', 'value' => "true", 'expire' => 60 * 60 * 24 * 30);
                                set_cookie($remmber);

                            } else {
                                $remmber = array('name' => 'remmber', 'value' => "false", 'expire' => 60 * 60 * 24 * 30);
                            }
                            $this->session->set_userdata('wm_admin', $wm_admin);
                        } else {
                            $data['status'] = 4;
                            $data['msg'] = "对不起，账号已禁用或审核中。";
                            $data['num'] = $num;
                        }
                    } else {
                        $data['status'] = 2;
                        $data['msg'] = "账户或密码有误，请检查";
                        $data['num'] = $num;
                    }
                }
            } else {
                $data['status'] = 3;
                $data['msg'] = "验证码错误";
                $data['num'] = $num;
            }
        } else {
            $sql = 'SELECT m.email as email,m.shanghuhao as shanghuhao,m.mima as mima,m.mingcheng as mingcheng,shanghudianhua as shanghudianhua, m.shanghuzhuangtai as shanghuzhuangtai FROM wm_qiyeshanghu as m where m.email = ? limit 1';
            $query = $this->db->query($sql, array($email));
            if ($query->num_rows() == 0) {
                $data['status'] = 1;
                $data['msg'] = "用户不存在";
                $data['num'] = $num + 1;
            } else {
                $res = $query->row();
                $mima = $res->mima;
                $shanghuhao = $res->shanghuhao;
                $mingcheng = $res->mingcheng;
                if ($shanghuhao . $password == $this->encrypt->decode($mima)) {
                    if ($res->shanghuzhuangtai == 1) {
                        $data['status'] = 0;
                        $data['msg'] = "登录成功";
                        $data['num'] = $num;
                        $wm_admin = array('shanghuhao' => $res->shanghuhao, 'name' => $email,"mingcheng"=>$mingcheng);
                        if ($savepwd == "on") {
                            $user = array('name' => 'username', 'value' => $email, 'expire' => 60 * 60 * 24 * 30);
                            set_cookie($user);
                            $pwd = array('name' => 'password', 'value' => $password, 'expire' => 60 * 60 * 24 * 30);
                            set_cookie($pwd);
                            $remmber = array('name' => 'remmber', 'value' => "true", 'expire' => 60 * 60 * 24 * 30);
                            set_cookie($remmber);
                        } else {
                                $remmber = array('name' => 'remmber', 'value' => "false", 'expire' => 60 * 60 * 24 * 30);
                            }
                        $this->session->set_userdata('wm_admin', $wm_admin);
                    } else {
                        $data['status'] = 4;
                        $data['msg'] = "对不起，账号已禁用或审核中。";
                        $data['num'] = $num;
                    }
                } else {
                    $data['status'] = 2;
                    $data['msg'] = "账户或密码有误，请检查";
                    $data['num'] = $num + 1;
                }
            }
        }
        echo json_encode($data);
    }

    /*
     * 退出
     */

    public function logout() {
        $this->load->library('session');
        //清除session
        $this->session->unset_userdata('wm_admin');
        $this->load->helper('cookie');
        delete_cookie("remmber");

        redirect('wm/login','refresh');
    }

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
