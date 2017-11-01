<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class passenger extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/passenger/index');
	}
        
        public function edit()
	{
            $this->load->view('h5/templates/passenger/edit');
	}

	public function indexTrain()
	{
            $this->load->view('h5/templates/passenger/indexTrain');
	}
        
        public function editTrain()
	{
            $this->load->view('h5/templates/passenger/editTrain');
	}
    
}
