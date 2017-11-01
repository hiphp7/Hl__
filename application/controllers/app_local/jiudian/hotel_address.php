<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hotel_address extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/jiudian/templates/hotel_address/index');
	}
        
        public function edit()
	{
            $this->load->view('h5/jiudian/templates/hotel_address/edit');
	}
        
}
