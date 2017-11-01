<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class array_search extends CI_Controller {

    public function index($cs = '') {
        $depCity = urldecode($cs);
        $jc = $this->config->item("机场"); //城市
        $depCity_code = array_search($depCity, $jc);
        echo $depCity_code;
    }


}

