<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class custom extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/custom/index');
	}
        
        public function aboutus()
	{
            $this->load->view('h5/templates/custom/aboutus');
	}
        
        public function buy()
	{
            $this->load->view('h5/templates/custom/buy');
	}
        
        public function safty()
	{
            $this->load->view('h5/templates/custom/safty');
	}
        
        public function tuigai()
	{
            $this->load->view('h5/templates/custom/tuigai');
	}
        
        public function zhanghao()
	{
            $this->load->view('h5/templates/custom/zhanghao');
	}
}
