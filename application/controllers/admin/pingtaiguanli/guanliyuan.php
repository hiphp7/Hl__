<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台管理  --  管理员管理
 */
class guanliyuan extends CI_Controller {

        /**
         * 管理员
         */
	public function index()
	{
	     $this->load->view('admin/pingtaiguanli/guanliyuan/index');
	}
}
