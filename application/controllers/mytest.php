<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mytest extends CI_Controller {

    public function index() {
        $this->load->view('mytest/index');
    }
	
	    public function zhangdan_dingshi() {

		$myfile = "dingshi.txt";
		$txt = time();
		file_put_contents($myfile, $txt, FILE_APPEND);
		$txt = "\r\n";
		file_put_contents($myfile, $txt, FILE_APPEND);
    }


    public function pangbian() {
        $this->load->view('mytest/pangbian');
    }

    public function pangbian1() {
        $this->load->view('mytest/pangbian1');
    }

    public function chaxun() {
        $this->load->view('mytest/chaxun');
    }

    public function getDateList() {
        $this->load->library('lunar');
        $this->lunar->getDateList();
    }
    
    // 时间戳
    public function date()
    {
        echo time();
    }
	
	public function path() {
		
        $lst = array();
        $sql = 'select m.zhanghu as zhanghu, m.mima as mima, m.xingming as xingming from guanliyuan as m';

        $kv = new stdClass();
        $kv->key = 'zhanghu';
        $kv->value = '账户';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'mima';
        $kv1->value = '密码';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'xingming';
        $kv2->value = '姓名';
        $lst[] = $kv2;

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, array(), '测试');
        echo $result;
    }

}
