<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台管理  --  用户管理
 */
class quanxian extends CI_Controller {

	public function index()
	{
	     $this->load->view('admin/pingtaiguanli/quanxian/index');
	}
}
