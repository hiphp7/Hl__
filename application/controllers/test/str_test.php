<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class str_test extends CI_Controller {

    public function index() {
        $ps = '125@126.com';
        if (strpos($ps, '@') !== false) {
            echo "手机";
        } else {
            echo "邮箱";
        }
    }

}
