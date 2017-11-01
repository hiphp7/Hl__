<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class email extends CI_Controller {

    public function index() {
       $this->load->library('email'); 
       
       //以下设置Email参数  
        $config['protocol'] = 'smtp';  
        $config['smtp_host'] = 'smtp.126.com';  
        $config['smtp_user'] = 'monk0123456@126.com';  
        $config['smtp_pass'] = '19830306';  
        $config['smtp_port'] = '25';  
        $config['charset'] = 'utf-8';  
        $config['wordwrap'] = TRUE;  
        $config['mailtype'] = 'html';  
        $this->email->initialize($config);              
          
        //以下设置Email内容  
        $this->email->from('monk0123456@126.com', '陈飞');  
        $this->email->to('279405290@qq.com');  
        $this->email->subject('Email Test');  
        $this->email->message('<font color=red>Testing the email class.</font>');  
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
  
        $this->email->send();
    }
    
}














































