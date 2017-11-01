<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class config_test extends CI_Controller {

    public function index() {
        $vs = $this->config->item("订单状态");
        var_dump($vs);
        echo '<br/>';
        echo $vs['2'];
    }
    
    public function ruo()
    {
        $vs = '1';
        if($vs === 1)
        {
            echo 'OK';
        }
        else
        {
            echo 'NO';
        }
    }
    
}
