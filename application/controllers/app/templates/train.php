<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Train extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/train/index');
	}
	public function trainList()
	{
            $this->load->view('h5/templates/train/list');
	}
	public function trainOrder()
	{
            $this->load->view('h5/templates/train/order');
	}
	public function place()
	{
            $this->load->view('h5/templates/train/place');
	}
	public function insurance()
	{
            $this->load->view('h5/templates/train/insuranceTrain');
	}
}