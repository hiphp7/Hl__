<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contacts extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/contacts/index');
	}
        
        public function add()
	{
            $this->load->view('h5/templates/contacts/add');
	}
        
        public function edit()
	{
            $this->load->view('h5/templates/contacts/edit');
	}
        public function addTrain()
	{
            $this->load->view('h5/templates/contacts/addTrain');
	}
	    public function editTrain()
	{
            $this->load->view('h5/templates/contacts/editTrain');
	}
	    public function contacts_sanfang()
	{
            $this->load->view('h5/templates/contacts/contacts_sanfang');
	}
        public function contacts_ziying()
	{
            $this->load->view('h5/templates/contacts/contacts_ziying');
	}
        
}
