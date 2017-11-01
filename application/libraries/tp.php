<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('smarty/Smarty.class.php');

class tp extends Smarty {

    function __construct() {
        parent::__construct();

        $this->template_dir = APPPATH . 'views';
        $this->compile_dir = APPPATH . 'templates_c/';
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
    }

}