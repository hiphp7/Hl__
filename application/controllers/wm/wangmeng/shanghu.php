<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟商户
 */
class shanghu extends CI_Controller {

    /*
     *首页
     */

    public function index() {

        $this->load->view('wm/wangmeng/shanghu/index');
    }
}