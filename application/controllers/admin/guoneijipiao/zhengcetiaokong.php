<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 国内机票  --  政策调控
 */
class zhengcetiaokong extends CI_Controller {

	public function index()
	{
	    $this->load->view('admin/guoneijipiao/zhengcetiaokong/index');
	}
}
