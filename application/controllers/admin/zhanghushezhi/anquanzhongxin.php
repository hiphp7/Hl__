<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 账户设置  --  安全中心
 */
class anquanzhongxin extends CI_Controller {

    public function index() {
        $this->load->view('admin/zhanghushezhi/anquanzhongxin/index');
    }

    /**
     * 修改密码
     */
    public function pwd() {

        $this->load->library('encrypt');
        //清除session
        $admin = $this->session->userdata('admin');
        $password = $this->security->xss_clean($this->input->post('password'));
        $mima = $this->security->xss_clean($this->input->post('old_password'));

        if (!empty($admin) && !empty($admin['mima']) && $admin['mima'] == $mima) {
            $this->db->update('guanliyuan', array('mima' => $password), array('id' => $admin['id']));
            redirect('/admin/zhanghushezhi/anquanzhongxin/index/ok');
        } else {
            // 重新登录
            redirect('/admin/login/index');
        }
    }

    /**
     * 密码修改成功
     */
    public function ok() {
        $this->load->view('admin/zhanghushezhi/anquanzhongxin/index/ok');
    }

}
