<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wx extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('CI_Wechat'); //由于我的项目是时刻都跟微信绑在一起，所以直接加载在构造函数里了，不用每个方法都加载了。
    }
    
    public function zhifu1($ps)
    {
		$cs = json_decode(urldecode($ps));
		var_dump($cs);
        $this->load->view('zhifupay');
    }
	
	public function zhifu($ps)
    {
		$cs = json_decode(urldecode($ps));
		$this->load->model("dingdan/mdingdan","mdingdan");
        //微信支付配置的参数配置读取
        $this->load->library('wechatpay');
		
        $openid = $this->session->userdata('openid');

        if (empty($openid)) {
            $openid = $this->wechatpay->oauth();
            $this->session->set_userdata('openid', $openid);
        }
		
        // 商品详情
        $param['body'] = $cs->body;
        $param['attach'] = $cs->attach;
        $param['detail'] = $cs->detail;
		if($cs->air == 1)
		{
			// 航班订单
            $param['out_trade_no'] = 'hb'.date('YmdHis').$this->mdingdan->getLastId();
		}
		else
		{
			// 火车订单
			$param['out_trade_no'] = 'hc'.date('YmdHis').$this->mdingdan->getLastId();
		}
        $param['total_fee'] = $cs->total_fee;
        $param["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];
        $param["time_start"] = date("YmdHis");
        $param["time_expire"] = date("YmdHis", time() + 600);
        $param["goods_tag"] = $cs->goods_tag;
        $param["notify_url"] = base_url() . "index.phptify";
        $param["trade_type"] = "JSAPI";
        $param["openid"] = $openid;
        
        //统一下单，获取结果，结果是为了构造jsapi调用微信支付组件所需参数
        $result = $this->wechatpay->unifiedOrder($param);

        //var_dump($result);
        //如果结果是成功的我们才能构造所需参数，首要判断预支付id
        if (isset($result["prepay_id"]) && !empty($result["prepay_id"])) {
            //调用支付类里的get_package方法，得到构造的参数
            $data['parameters'] = json_encode($this->wechatpay->get_package($result['prepay_id']));
            $data['notifyurl'] = $param["notify_url"];
            //要有个页面将以上数据传递过去并展示给用户
            $this->load->view('zhifupay', $data);
        }
    }

    
	/*
    public function zhifu()
    {
        //微信支付配置的参数配置读取
        $this->load->library('wechatpay');
        
        $openid = $this->session->userdata('openid');

        if (empty($openid)) {
            $openid = $this->wechatpay->oauth();
            $this->session->set_userdata('openid', $openid);
        }
        //商户交易单号
        $out_trade_no = $this->input->get('out_trade_no');
        // 总费用
        $total_fee = $this->input->get('total_fee');
        $body = $this->input->get('body');
        $attach = $this->input->get('attach');
        $goods_tag = $this->input->get('goods_tag');
        $detail = $this->input->get('detail');

        //$openid = $openid; // $_SESSION['openid'];
        // 商品详情
        $param['body'] = $body;
        $param['attach'] = $attach;
        $param['detail'] = $detail;
        $param['out_trade_no'] = $out_trade_no;
        $param['total_fee'] = $total_fee;
        $param["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];
        $param["time_start"] = date("YmdHis");
        $param["time_expire"] = date("YmdHis", time() + 600);
        $param["goods_tag"] = $goods_tag;
        $param["notify_url"] = base_url() . "index.php/wx/notify";
        $param["trade_type"] = "JSAPI";
        $param["openid"] = $openid;
        
        //统一下单，获取结果，结果是为了构造jsapi调用微信支付组件所需参数
        $result = $this->wechatpay->unifiedOrder($param);

        //var_dump($result);
        //如果结果是成功的我们才能构造所需参数，首要判断预支付id
        if (isset($result["prepay_id"]) && !empty($result["prepay_id"])) {
            //调用支付类里的get_package方法，得到构造的参数
            $data['parameters'] = json_encode($this->wechatpay->get_package($result['prepay_id']));
            $data['notifyurl'] = $param["notify_url"];
            $data['fee'] = $total_fee;
            //$data['pubid'] = '10'; //$_SESSION['orderid'];
            //要有个页面将以上数据传递过去并展示给用户
            $this->load->view('zhifupay', $data);
        }
        
    }
	*/

    public function index() {
        
        //微信支付配置的参数配置读取
        $this->load->library('wechatpay');
        
        $openid = $this->session->userdata('openid');

        if (empty($openid)) {
            $openid = $this->wechatpay->oauth();
            $this->session->set_userdata('openid', $openid);
        }

        //商户交易单号
        $out_trade_no = '555551';
        // 总费用
        $total_fee = '1';
        //$openid = $openid; // $_SESSION['openid'];
        // 商品详情
        $param['body'] = "狗宠物牙膏";
        $param['attach'] = 'test';
        $param['detail'] = "狗宠物牙膏" . $out_trade_no;
        $param['out_trade_no'] = $out_trade_no;
        $param['total_fee'] = $total_fee;
        $param["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];
        $param["time_start"] = date("YmdHis");
        $param["time_expire"] = date("YmdHis", time() + 600);
        $param["goods_tag"] = "狗宠物牙膏";
        $param["notify_url"] = base_url() . "index.php/wx/notify";
        $param["trade_type"] = "JSAPI";
        $param["openid"] = $openid;

        //统一下单，获取结果，结果是为了构造jsapi调用微信支付组件所需参数
        $result = $this->wechatpay->unifiedOrder($param);

        var_dump($result);

        //如果结果是成功的我们才能构造所需参数，首要判断预支付id
        if (isset($result["prepay_id"]) && !empty($result["prepay_id"])) {
            //调用支付类里的get_package方法，得到构造的参数
            $data['parameters'] = json_encode($this->wechatpay->get_package($result['prepay_id']));
            $data['notifyurl'] = $param["notify_url"];
            $data['fee'] = $total_fee;
            $data['pubid'] = '10'; //$_SESSION['orderid'];
            //要有个页面将以上数据传递过去并展示给用户
            $this->load->view('pay', $data);
        }
    }

    /**
     * 退款
     */
    public function refund() {
        
        $this->load->library('wechatpay');

        $out_trade_no = '55555';
        //$out_trade_no = '4000492001201610287944578460';
        $total_fee = '1';
        $refund_fee = '1';

        $mch_id = $this->config->item('mch_id');
        //自定义商户退单号
        $out_refund_no = $mch_id . date("YmdHis");
        $result = $this->wechatpay->refund($out_trade_no, $out_refund_no, $total_fee, $refund_fee, $mch_id);
        //$result = $this->wechatpay->refundByTransId($out_trade_no, $out_refund_no, $total_fee, $refund_fee, $wxconfig['mch_id']);

        var_dump($result);
    }
	
    public function train_save(){
        $laiyuan = $this->input->post('sf');
        $yonghuid = $this->input->post('yonghuid');
        $selected = $this->input->post('selected');

        $selected = json_decode($selected);

        $ticketInfo =$selected->ticketInfo;
        $person = $ticketInfo->ticket_person;
        $adult = $person->adult;
        $child = $person->child;
        $contacts = $ticketInfo->contacts;
        $mail = $ticketInfo->mail;
        $insurance = $ticketInfo->insurance;
        $cost = $ticketInfo->cost;



        $this->load->library('yi19');
        $type = $this->config->item('火车证件类型');
        $lst = [];
        foreach ($adult as $k => $v) {
            $obj = new stdClass();
            $obj->bx = 1;
            $obj->ticket_type = $v->ticket_type;
            foreach ($type as $key => $value) {
                if ($value == $v->ids_type) {
                    $obj->ids_type = $key;
                }
            }
            $obj->user_ids = $v->user_ids;
            $obj->user_name = $v->user_name;
            $lst[] = $obj;
            
        }

        foreach ($child as $k => $v) {
            $obj = new stdClass();
            $obj->bx = 1;
            $obj->ticket_type = $v->ticket_type;
            foreach ($type as $key => $value) {
                if ($value == $v->ids_type) {
                    $obj->ids_type = $key;
                }
            }
            $obj->user_ids = $v->user_ids;
            $obj->user_name = $v->user_name;
            $lst[] = $obj;
            
        }

        $book_detail_list = $lst;

        $merchant_order_id = time();
        $order_level = 1;


        $arrive_station = $selected->arrive_station;
        $arrive_time = $selected->arrive_time;
        // 邮递地址
        $bx_invoice = $mail->isMail == false ? 0 : 1; // 是否邮递
        $bx_invoice_address = $mail->bx_invoice_address;
        $bx_invoice_phone = $mail->bx_invoice_phone;
        $bx_invoice_receiver = $mail->bx_invoice_receiver;
        $bx_invoice_zipcode = $mail->bx_invoice_zipcode;

        // 站点信息
        $from_station = $selected->from_station;
        $from_time = $selected->from_time;

        // 联系人
        $link_address = isset($contacts->dizhi) ? $contacts->dizhi : '';
        $link_mail = isset( $contacts->youxiang) ? $contacts->youxiang : '';
        $link_name = $contacts->xingming;
        $link_phone = $contacts->shoujihaoma;

        $order_pro1 = 'BX_20';
        $order_pro2 = '';

        $sms_notify = '1';  // 短信提醒

        // 座位信息
        $seat_type = $selected->seatList[0]->typeId;
        $sum_amount = $selected->seatList[0]->count;
        $ticket_price = $selected->seatList[0]->price;
        $train_code = $selected->train_code;
        $travel_time = date('Y-m-d', strtotime($selected->arrive_time));
        $wz_ext = 0;

        $re =$this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list,$bx_invoice, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext);
        $re = json_decode($re);
        if (!empty($re) && $re->return_code =='000') {

            $data = new stdClass();
            $data->arrive_station = $re->arrive_station;
            $data->arrive_time = $re->arrive_time;
            $data->bx_pay_money = $re->bx_pay_money;
            $data->from_station = $re->from_station;
            $data->from_time = $re->from_time;
            $data->merchant_order_id = $re->merchant_order_id;
            $data->order_id = $re->order_id;
            $data->pay_money = $re->pay_money;
            // $data->return_code = $re->return_code;
            $data->seat_type = $re->seat_type;
            $data->ticket_pay_money = $re->ticket_pay_money;
            $data->train_code = $re->train_code;
            $data->travel_time = $re->travel_time;

            $data->laiyuan = $laiyuan;
            $data->order_status = 0;
            $data->refund_status = 0;
            $data->yonghuid = $yonghuid; 

            $re = $this->db->insert('train_order', $data);

            // 付款
            $body = '火车票';
            $out_trade_no = $re->merchant_order_id;
            $total_fee = $re->bx_pay_money;
            $attach = '火车票';
            $goods_tag = '火车票';
            $detail = '火车票';
            $this->load->helper('tools');

            // 请求微信支付接口
           $url = 'http://m.bibi321.com/wxpay/index.php/wx/zhifu?out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&body='.$body.'&attach='.$attach.'&goods_tage='.$goods_tag.'&detail='.$detail;
           
           $data_zhifu = request_get($url);
           var_dump($data_zhifu);

        }

    }

    public function save(){

         // 付款
         $body = '火车票';
         $out_trade_no = 111;
         $total_fee = 1;
         $attach = '火车票';
         $goods_tag = '火车票';
         $detail = '火车票';
         $this->load->helper('tools');

         // 请求微信支付接口
        $url = 'http://m.bibi321.com/wxpay/index.php/wx/zhifu?out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&body='.$body.'&attach='.$attach.'&goods_tage='.$goods_tag.'&detail='.$detail;
        $re = request_get($url);
        var_dump($re);
    }

}
