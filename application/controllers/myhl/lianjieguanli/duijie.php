<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 接入管理  --  连接管理 -- 设置对接
 */
class duijie extends CI_Controller {

        /**
         * 设置对接
         */
	public function index()
	{
	    $this->load->view('myhl/lianjieguanli/duijie/index');
	}
}
