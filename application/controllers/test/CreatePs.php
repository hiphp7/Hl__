<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CreatePs extends CI_Controller {

    public function index() {
        
        $head = new stdClass();
        $head->appKey = '12345678';
        $head->salt = '123';
        $head->sign = '063cae89a00896187f80eecbf922364a';
        $head->version = '3.1.0';
        
        $data = new stdClass();
        $data->hotelIds = '159903';
        $data->isNeedImage = 'false';
        $data->isNeedRooms = 'true';
        
        $obj = new stdClass();
        $obj->head = $head;
        $obj->data = $data;
        
        $str = json_encode($obj);
        echo $str;
    }
}
