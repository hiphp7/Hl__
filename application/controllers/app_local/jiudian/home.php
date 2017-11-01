<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function bibi() {
        $this->load->view('h5/jiudian/templates/bibi');
    }

    public function tabs() {
        $this->load->view('h5/jiudian/templates/tabs');
    }
    public function tabs_index() {
        $this->load->view('h5/jiudian/templates/tabs_index');
    }
    public function hotelhome() {
        $this->load->view('h5/jiudian/templates/home/hotelhome');
    }

    public function tab_chats() {
        $this->load->view('h5/jiudian/templates/tab_chats');
    }

    public function chat_detail() {
        $this->load->view('h5/jiudian/templates/chat_detail');
    }

    public function tab_account() {
        $this->load->view('h5/jiudian/templates/tab_account');
    }

    public function zf() {
        $this->load->view('h5/jiudian/templates/zf');
    }

    public function ddxq() {
        $this->load->view('h5/jiudian/templates/ddxq');
    }

    public function tjdd() {
        $this->load->view('h5/jiudian/templates/tjdd');
    }

    public function zxf() {
        $this->load->view('h5/jiudian/templates/zxf');
    }

    public function place() {
        $this->load->view('h5/jiudian/templates/home/place');
    }

    public function jiudian_date() {
        $this->load->view('h5/jiudian/templates/home/jiudian_date');
    }

    public function qxdd() {
        $this->load->view('h5/jiudian/templates/qxdd');
    }

    public function xzrzr() {
        $this->load->view('h5/jiudian/templates/xzrzr');
    }
        public function hotel_fapiaotaitou() {
        $this->load->view('h5/jiudian/templates/hotel_fapiaotaitou');
    }
	
    public function wdsc() {
        $this->load->view('h5/jiudian/templates/wdsc');
    }
    public function allcity() {
        $this->load->view('h5/jiudian/templates/allcity');
    }
    public function history() {
        $this->load->view('h5/jiudian/templates/history');
    }
     public function showimg() {
        $this->load->view('h5/jiudian/templates/showimg');
    }   
     public function bigimg() {
        $this->load->view('h5/jiudian/templates/bigimg');
    } 
    public function changjianwenti() {
        $this->load->view('h5/jiudian/templates/changjianwenti');
    } 
    public function bibiyoushi() {
        $this->load->view('h5/jiudian/templates/bibiyoushi');
    }      
    public function dingpiaozhinan() {
        $this->load->view('h5/jiudian/templates/dingpiaozhinan');
    }     
    public function hezuohuoban() {
        $this->load->view('h5/jiudian/templates/hezuohuoban');
    }      	

    //查询酒店城市
    public function jiudian_city() {
        $sql = 'select m.provinceId as provinceId,
m.cityName as cityName, 
m.cityCode as cityCode, 
m.parentCityCode as parentCityCode from jiudian_chengshi as m ORDER BY cityCode';
        $res = $this->db->query($sql);
        $row = $res->result();
        if (!empty($row)) {
            //echo json_encode($row);
            $callback = $this->input->get('callback');
            echo $callback."('".json_encode($row)."')";
        } else {
            echo 'false';
        }
    }

}
