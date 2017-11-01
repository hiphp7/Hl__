<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class nusoaplib {

    function __construct() {
        require_once('nusoap/nusoap.php');
    }

    /**
     * 调用MVC接口
     *
     * @param mixed $url 请求地址
     * @param mixed $fn_Name 方法名
     * @param mixed $arr_param 参数集
     * @return mixed 结果集
     *
     */
    public function soapCall($url, $fn_Name, $arr_param) {
        try {
            $client = new SoapClient($url);
            $client->soap_defencoding = 'utf-8';
            $client->xml_encoding = 'utf-8';
            $client->decode_utf8 = true;

            $result = $client->call($fn_Name, array($fn_Name => $arr_param));
            var_dump($result);
            $result = json_decode(json_encode($result), TRUE);
            $result = $result[$fn_Name . 'Result'];

            $result = json_decode($result, TRUE);

            $itemName = "returnMessage";
            if ($fn_Name == "AV31" || $fn_Name == "AVByCity" || $fn_Name == "TestData") {
                $itemName = "flights";
            }

            if ($result['returnCode'] != 0) {
                throw new Exception($result['returnMessage']);
            }

            return $result[$itemName];
        } catch (SOAPFault $e) {
            throw new Exception($e->getMessage());
        }
    }

}