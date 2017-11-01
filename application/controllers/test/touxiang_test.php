<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class touxiang_test extends CI_Controller {

    //上传头像
    public function upload() {
        // 用户id
        $UserId = $this->input->post('UserId');
        // 去掉url头后的base64编码字符串
        $base64 = $this->input->post('touxiang');
        //获取图片类型
        $type = $this->input->post('type');
        $new_file = "./resources/user/userImages/" . $UserId . ".{$type}";
        //$new_file = "/usr/local/apache/htdocs/air/resources/user/userImages/" . $UserId . ".{$type}";
        $base64_decode = base64_decode($base64);
        if (write_file($new_file, $base64_decode)) {
            echo $UserId . ".{$type}";
        } else {
            echo false;
        }
    }
}
