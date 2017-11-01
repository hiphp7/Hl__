<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * yi19 接口
 */
class yi19 {

    private function ToStr($data, $TrainAppKey) {
        $st = '';
        foreach ($data as $key => $value) {
            $st = $st . $value;
        }
        $st = $st . $TrainAppKey;
        return $st;
    }
    
    private function encode_json($str) {
        return preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $str);
    }

    private function ArrayToString($data) {
        $st = '';
        $len = count($data);
        $index = 0;
        foreach ($data as $key => $value) {
            if ($index == $len - 1) {
                $st = $st . $key . '=' . $value;
            } else {
                $st = $st . $key . '=' . $value . '&';
                $index++;
            }
        }
        return $st;
    }

    /**
     * 火车票 余票查询
     * $from_station 出发车站
     * $arrive_station 到达车站
     * $travel_time yyyy-MM-dd 出发时间
     */
    public function AV($travel_time, $from_station, $arrive_station) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'queryLeftTicket';
        $post_data['version'] = '1.0.0';

        $post_data['travel_time'] = $travel_time;
        $post_data['from_station'] = $from_station;
        $post_data['arrive_station'] = $arrive_station;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
		
        $res = request_post($url, $post_data);

        return $res;
    }

    /**
     * 火车票 验证用户信息
     * $detail_list 用户列表
     * $lst = array();
     * $obj = new stdClass();
     * $obj->ids_type = 1;
     * $obj->user_ids = '51025198910180652';
     * $obj->user_name = '吴大富';
     * $lst[] = $obj;
     *
     */
    public function VerifyUsers($detail_list) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'verifyUsers';
        $post_data['version'] = '1.0.0';


        $obj = new stdClass();
        $obj->detail_list = $detail_list;

        $json_param = json_encode($obj);
        //$post_data['json_param'] = $this->encode_json($json_param);
		$post_data['json_param'] = $json_param;
        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }

    /**
     * 火车票 创建订单
     */
    public function CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext,
	$bx_invoice = 1) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'createOrder';
        $post_data['version'] = '1.0.0';

        $obj = new stdClass();
        $obj->merchant_order_id = $merchant_order_id;
        $obj->order_level = $order_level;
        //$obj->order_result_url = 'http://m.bibi321.com/hl/index.php';
		$obj->order_result_url = 'http://m.bibi321.com/hl/19yi_trainorder_huidiao.php';
		
        //$obj->book_result_url = '';
        $obj->arrive_station = $arrive_station;
        $obj->arrive_time = $arrive_time;
        $obj->book_detail_list = $book_detail_list;
        $obj->bx_invoice = $bx_invoice;
        $obj->bx_invoice_address = $bx_invoice_address;
        $obj->bx_invoice_phone = $bx_invoice_phone;

        $obj->bx_invoice_receiver = $bx_invoice_receiver;
        $obj->bx_invoice_zipcode = $bx_invoice_zipcode;
        $obj->from_station = $from_station;
        $obj->from_time = $from_time;
        $obj->link_address = $link_address;
        $obj->link_mail = $link_mail;
        $obj->link_name = $link_name;
        $obj->link_phone = $link_phone;
        $obj->order_pro1 = $order_pro1;
        $obj->order_pro2 = $order_pro2;
        $obj->seat_type = $seat_type;
        $obj->sms_notify = $sms_notify;
        $obj->sum_amount = $sum_amount;
        $obj->ticket_price = $ticket_price;
        $obj->train_code = $train_code;

        $obj->travel_time = $travel_time;
        $obj->wz_ext = $wz_ext;
		
		//var_dump($obj);

        $json_param = json_encode($obj);
        $post_data['json_param'] = $json_param; // $this->encode_json($json_param);

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 订单查询接口
     * $order_id 订单ID 19旅行生成的订单号
     * $merchant_order_id 商户订单ID 合作商户的订单Id
     */
    public function queryOrderInfo($order_id, $merchant_order_id)
    {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'queryOrderInfo';
        $post_data['version'] = '1.0.0';

        $post_data['order_id'] = $order_id;
        $post_data['merchant_order_id'] = $merchant_order_id;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 订单查询接口
     * $order_id 订单ID 19旅行生成的订单号
     * $merchant_order_id 商户订单ID 合作商户的订单Id
     */
    public function cancelOrder($order_id, $merchant_order_id)
    {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'cancelOrder';
        $post_data['version'] = '1.0.0';

        $post_data['order_id'] = $order_id;
        $post_data['merchant_order_id'] = $merchant_order_id;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 火车票 退票退款
     */
    public function refundTicket($comment, $merchant_order_id, 
	$order_id, $refund_type, $refundinfo, $request_id) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'refundTicket';
        $post_data['version'] = '1.0.0';

        $obj = new stdClass();
		$obj->comment = $comment;
        $obj->merchant_order_id = $merchant_order_id;
        $obj->order_id = $order_id;
        $obj->refund_picture_url = '';
        $obj->refund_result_url = 'http://m.bibi321.com/hl/19yi_tuipiao_huidiao.php';
        $obj->refund_type = $refund_type;
		
        $obj->refundinfo = $refundinfo;
        $obj->request_id = $request_id;

        $json_param = json_encode($obj);

        $post_data['json_param'] = $json_param;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;

        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 火车票 查询途经站信息
     */
    public function querySubwayStation($train_code) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'querySubwayStation';
        $post_data['version'] = '1.0.0';

        $post_data['train_code'] = $train_code;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 火车票 验证余票
     */
    public function checkTicketNum($train_code, $travel_time, $from_station, $arrive_station) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'checkTicketNum';
        $post_data['version'] = '1.0.0';

        $post_data['train_code'] = $train_code;
        $post_data['travel_time'] = $travel_time;
        $post_data['from_station'] = $from_station;
        $post_data['arrive_station'] = $arrive_station;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
    /**
     * 火车票 保险信息查询
     */
    public function queryBxInfo($order_id) {
        $CI = & get_instance();
        $CI->load->helper('tools');
        $conf = $CI->config->item("19_yi");

        $url = $conf['url'];
        $post_data['terminal'] = 'PC';
        $post_data['merchant_id'] = $conf['TrainAppID'];
        $post_data['timestamp'] = date('YmdHis');

        $post_data['type'] = 'queryBxInfo';
        $post_data['version'] = '1.0.0';

        $post_data['order_id'] = $order_id;

        $hmac = md5($this->ToStr($post_data, $conf['TrainAppKey']));

        // MD5 加密
        $post_data['hmac'] = $hmac;
        $res = request_post($url, $post_data);
        return $res;
    }
    
}