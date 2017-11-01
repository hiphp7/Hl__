<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/article/index');
	}
        
        public function article_content()
	{
            $this->load->view('h5/templates/article/article-content');
	}
        
}
