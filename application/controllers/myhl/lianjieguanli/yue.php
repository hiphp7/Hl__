<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 接入管理  --  连接管理 -- 查看余额
 */
class yue extends CI_Controller {

        /**
         * 设置对接
         */
	public function index()
	{
	    $this->load->view('myhl/lianjieguanli/yue/index');
	}
}
