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
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->get('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->get('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->get('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
		echo $callback . "(" . $bool . ")";
    }
    
    /**
     * 三分 修改联系人
     */
    public function ziyingmodifyyonghu_sf() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->get('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->get('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->get('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
        echo $callback . "(" . json_encode($data) . ")";
    }
    
    public function ziyingmodifyyonghu_get() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $xingming = $this->security->xss_clean($this->input->get('xingming'));
        $shoujihaoma = $this->security->xss_clean($this->input->get('shoujihaoma'));
        $yuan_shoujihaoma = $this->security->xss_clean($this->input->get('yuan_shoujihaoma'));
        
        $bool = $this->db->update('yonghu', array('xingming' => $xingming, 'shoujihaoma' => $shoujihaoma),
                array('shoujihaoma' => $yuan_shoujihaoma));
        
        echo $callback . "(" . $bool . ")";
    }

}




































