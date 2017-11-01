<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sendMessage_test extends CI_Controller {
	    public function index() {
		header("Content-type:text/html;charset=utf-8");
        $this->load->library('sendmessage');
		$data = $this->sendmessage->send('@all','cheshi');
        echo $data;
		$myfile = "sendmessage.txt";
		$txt = $data;
		file_put_contents($myfile, $txt, FILE_APPEND);
		$txt = "\r\n";
		file_put_contents($myfile, $txt, FILE_APPEND);
		
    }
}