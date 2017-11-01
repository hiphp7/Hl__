<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class xinxiguanli extends CI_Controller {
    
    public function index() {
        $this->load->view('admin/jiudian/xinxiguanli/index');
    }
    
    /**
     * 问答详情
     */
    public function wendaxiangqiang()
    {}
    
    /**
     * 新增问答
     */
    public function xinzengwenda(){
        
    }
    
}

