<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 用户操作
 */
class yonghudb extends CI_Controller {

    /**
     * 自营 修改联系人
     */
    public function ziyingmodifyyonghu() {
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->post('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->post('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->post('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
        echo $bool;
    }
    
    /**
     * 三分 修改联系人
     */
    public function ziyingmodifyyonghu_sf() {
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->post('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->post('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->post('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
        echo $bool;
    }
    
    public function ziyingmodifyyonghu_get() {
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->get('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->get('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->get('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
        echo $bool;
    }

}




































