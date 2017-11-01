<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟账单
 */
class zhanghu extends CI_Controller {
    /*
     * 首页
     */

    public function index() {

        $this->load->view('wm/wangmeng/zhanghu/index');
    }

    public function yanmima() {
        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('encrypt');
        $shanghuhao = $wm_admin['shanghuhao'];
        $mima = $this->security->xss_clean($this->input->post('mima'));

        $sql = "SELECT mima from wm_qiyeshanghu where shanghuhao =? limit 1";
        $query = $this->db->query($sql, array($shanghuhao));
        $res = $query->row();
        if ($shanghuhao . $mima == $this->encrypt->decode($res->mima)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function xiumima() {
        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('encrypt');
        $shanghuhao = $wm_admin['shanghuhao'];
        $mima = $this->security->xss_clean($this->input->post('mima'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $re_pwd = $this->security->xss_clean($this->input->post('re_pwd'));

        $sql = "SELECT mima from wm_qiyeshanghu where shanghuhao =? limit 1";
        $query = $this->db->query($sql, array($shanghuhao));
        $res = $query->row();
        if ($shanghuhao . $mima == $this->encrypt->decode($res->mima) && $password == $re_pwd) {

            $this->db->update('wm_qiyeshanghu', array("mima" => $this->encrypt->encode($shanghuhao . $password)), array("shanghuhao" => $shanghuhao));
            if ($this->db->affected_rows() > 0) {
                echo "true";
            } else {
                echo "false";
            };
        } else {
            echo "false";
        }
    }


}