<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 简单的加密类
 */
class mysimpleencrypt {

    public function en($msg)
    {
        return urlencode(base64_encode($msg));
    }
    
    public function de($msg)
    {
        return base64_decode(urldecode($msg));
    }

}