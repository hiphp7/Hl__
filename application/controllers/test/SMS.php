<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SMS extends CI_Controller {

    public function index() {
        $this->mvc_SMS_Send("吴总", '{"code":"1234","product":"alidayu"}', '13302969813', '你好');
        $this->load->view('welcome_message');
    }
    
    public function index1()
    {
        // 发送短信
        //$SmsParam = json_encode(array('name' => '吴总', 'action' => '{"code":"1234","product":"alidayu"}', 'code' => '123456', 'time' => '5分钟', 'phone' => '400-991-7909'));
        
        // 出票成功
        $SmsParam = json_encode(array('date' => '2016-07-10 07:30', 'name' => '老吴', 'dep' => '北京', 'arr' => '广州', 'air' => '中国国航', 'flight' => 'CA8234'));
        $arr_param = array('SmsFreeSignName' => '比比旅行', 'RecNum' => '13302969813', 'SmsTemplateCode' => 'SMS_11365109','SmsParam' => $SmsParam);
                
        echo $SmsParam;
    }

    /**
     * 发送验证码
     *
     * @param mixed $userName 用户姓名
     * @param mixed $action 操作指令
     * @param mixed $tel 接收号码{多个手机号用“，”隔开}
     * @param mixed $code 验证码
     * @return mixed This is the return value description
     *
     */
    public function mvc_SMS_Send($userName, $action, $tel, $code) {
        try {
            $this->load->library("nusoaplib");
            $url = "http://ibe.bibi321.com:8829/AliDaYu/getAliDaYuSMSService.svc?wsdl";

            $fn_Name = 'Send1';
            //$SmsParam = json_encode(array('name' => $userName, 'action' => $action, 'code' => $code));
            //$arr_param = array('SmsFreeSignName' => '比比旅行', 'RecNum' => $tel, 'SmsTemplateCode' => 'SMS_7410270','SmsParam' => $SmsParam);

            $SmsParam = json_encode(array('name' => $userName, 'action' => $action, 'code' => $code, 'time' => '5分钟', 'phone' => '400-991-7909'));
            $arr_param = array('SmsFreeSignName' => '比比旅行', 'RecNum' => $tel, 'SmsTemplateCode' => 'SMS_11365109', 'SmsParam' => $SmsParam);

            $xml = $this->nusoaplib->soapCall($url, $fn_Name, $arr_param);

            /*
            $result = $this->my->xml_to_json($xml);

            if (array_key_exists("code", $result) && $result['code'] != 0) {
                if ($result['code'] == 15) {
                    throw new Exception($result['sub_msg']);
                }
                throw new Exception($result['msg']);
            }
            */
            
           var_dump($xml);
            //return $result;
        } catch (exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
