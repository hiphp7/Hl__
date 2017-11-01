<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jiudian extends CI_Controller {

    public function index($sf="") {
        $this->load->view('h5/jiudian/index');
    }
    public function tabs() {
        $this->load->view('h5/jiudian/templates/tabs');
    }

}
