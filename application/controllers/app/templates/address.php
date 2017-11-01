<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class address extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/address/index');
	}
        
        public function edit()
	{
            $this->load->view('h5/templates/address/edit');
	}
	public function indexTrain()
	{
            $this->load->view('h5/templates/address/indexTrain');
	}
        
        public function editTrain()
	{
            $this->load->view('h5/templates/address/editTrain');
	}
        public function InfoTrain()
	{
            $this->load->view('h5/templates/address/infoTrain');
	}
        
}
