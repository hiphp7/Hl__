<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 接入管理  --  连接管理 -- 生成对账单
 */
class zhangdan extends CI_Controller {

        /**
         * 生成连接地址
         */
	public function index()
	{
	    $this->load->view('myhl/lianjieguanli/zhangdan/index');
	}
}
