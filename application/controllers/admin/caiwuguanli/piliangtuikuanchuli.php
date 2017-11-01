<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 财务管理  --  批量退款记录
 */
class piliangtuikuanchuli extends CI_Controller {

	public function index()
	{
	     $this->load->view('admin/caiwuguanli/piliangtuikuanchuli/index');
	}
}
