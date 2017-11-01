<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 测试 51book 发送
 */
class hds_test extends CI_Controller {

    public function index() {

        $head = new stdClass();
        $head->appKey = '12345678';
        $head->salt = '1397813103606';
        $head->sign = md5(md5("abcdefg" . "12345678") . "1397813103606");
        $head->version = '3.1.0';

        $data = new stdClass();
        $data->hotelIds = '159903';
        $data->isNeedImage = 'false';
        $data->isNeedRooms = 'true';

        $obj = new stdClass();
        $obj->head = $head;
        //$obj->data = $data;

        $str = json_encode($obj);
        echo $str;
    }

    function request_get_str($url = '', $data_get = '') {
        if (empty($url) || empty($data_get)) {
            return false;
        }

        $header = array('Content-Type: application/json');

        $postUrl = $url . '?' . $data_get;
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch); //运行curl
        curl_close($ch);

        return $data;
    }

    public function JiuDianList() {
        //header("Content-type:text/html;charset=utf-8");
        $this->load->library('mypost');
//        $get_data['appKey'] = "12345678";
//        $get_data['salt'] = "1397813103606";
//        $get_data['sign'] = md5(md5("abcdefg" . $get_data['appKey']) . $get_data['salt']);
//        $get_data['version'] = "3.1.0";
        $url = "http://hdsoutlet.qunar.com/api/hotel/queryHotelList.json";
        //$get_data['hotelIds'] = "2536987";
        $head = new stdClass();
        $head->appKey = '12345678';
        $head->salt = '1397813103606';
        $head->sign = md5(md5("abcdefg12345678") . "1397813103606");
        //$head->version = '3.1.0';
        $head->version = '3.1.0';
        $obj = new stdClass();
        $obj->head = $head;
        $str = json_encode($obj);
        $res = $this->mypost->request_get_str($url, $str);
        var_dump($res);
    }

}

