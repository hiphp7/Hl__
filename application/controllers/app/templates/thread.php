<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thread extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/thread/index');
	}
        
        public function newTopic()
	{
            $this->load->view('h5/templates/thread/newTopic');
	}
        
        public function thread_content()
	{
            $this->load->view('h5/templates/thread/thread-content');
	}
        
}
