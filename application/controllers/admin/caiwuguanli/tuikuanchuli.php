<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 财务管理  --  退款处理
 */
class tuikuanchuli extends CI_Controller {

	public function index()
	{
	     $this->load->view('admin/caiwuguanli/tuikuanchuli/index');
	}
}
