<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 国际机票  --  出票管理
 */
class chupiao extends CI_Controller {

	public function index()
	{
	     $this->load->view('admin/guojijipiao/chupiao/index');
	}
}
