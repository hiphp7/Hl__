<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 国内机票  --  退票管理
 */
class tuipiao extends CI_Controller {

	public function index()
	{
	    $this->load->view('admin/guojijipiao/tuipiao/index');
	}
}
