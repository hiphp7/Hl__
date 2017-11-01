<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class yi19_test extends CI_Controller {

    public function index() {
        $this->load->library('yi19');
        $data = $this->yi19->AV('2016-12-09', '咸宁北', '深圳北');
        echo $data;
    }

    public function VerifyUsers() {

        $this->load->library('yi19');

        $obj = new stdClass();
        $obj->ids_type = '1';
        $obj->user_ids = '51012519821018061X';
        $obj->user_name = '陈飞';
        $lst[] = $obj;

        $obj1 = new stdClass();
        $obj1->ids_type = '1';
        $obj1->user_ids = '41048219900520113X';
        $obj1->user_name = '高晓凯';
        $lst[] = $obj1;

        $obj2 = new stdClass();
        $obj2->ids_type = '1';
        $obj2->user_ids = '510184201108240166';
        $obj2->user_name = '李恩贝';
        $lst[] = $obj2;

        $detail_list = $lst;

        $this->yi19->VerifyUsers($detail_list);
    }

    public function CreateOrder() {

        $this->load->library('yi19');

        $obj = new stdClass();
        $obj->bx = 1;
        $obj->ticket_type = 0;
        $obj->ids_type = 1;
        $obj->user_ids = '51012519821018061X';
        $obj->user_name = '陈飞';
        //$obj->user_name = 'chenfei';
        $lst[] = $obj;

        $obj1 = new stdClass();
        $obj1->bx = 1;
        $obj1->ticket_type = 0;
        $obj1->ids_type = 1;
        $obj1->user_ids = '41048219900520113X';
        $obj1->user_name = '高晓凯';
        //$obj1->user_name = 'gaoxiaokai';
        $lst[] = $obj1;

        $obj2 = new stdClass();
        $obj2->bx = 1;
        $obj2->ticket_type = 1;
        $obj2->ids_type = 1;
        $obj2->user_ids = '510184201108240166';
        $obj2->user_name = '李恩贝';
        //$obj2->user_name = 'liebei';
        $lst[] = $obj2;

        $book_detail_list = $lst;

        $merchant_order_id = '11';
        $order_level = 1;
        $arrive_station = '深圳北';
        //$arrive_station = 'ShengZhengBei';
        $arrive_time = '14:02';
        $bx_invoice_address = '成都';
        //$bx_invoice_address = 'xianning';
        $bx_invoice_phone = '13541167940';
        $bx_invoice_receiver = '陈飞';
        //$bx_invoice_receiver = 'chenfei';
        $bx_invoice_zipcode = '610500';
        $from_station = '成都南';
        //$from_station = 'xianning';
        $from_time = '09:02';
        $link_address = '成都';
        //$link_address = 'xianning';
        $link_mail = 'monk@126.com';
        $link_name = '陈飞';
        //$link_name = 'chenfei';
        $link_phone = '13541167940';
        $order_pro1 = 'BX_20';
        $order_pro2 = '';
        $seat_type = '3';
        $sms_notify = '1';
        $sum_amount = 100;
        $ticket_price = 80;
        $train_code = 'G1003';
        $travel_time = '2016-11-11';
        $wz_ext = 0;

        $this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext);
    }

    public function queryOrderInfo() {
        $this->load->library('yi19');
        $this->yi19->queryOrderInfo('EXHC161027154342207', '8');
    }

    public function cancelOrder() {
        $this->load->library('yi19');
        $this->yi19->cancelOrder('EXHC161027160140225', '80');
    }

    public function refundTicket() {
        $this->load->library('yi19');
header("Content-type: text/html; charset=utf-8");
        $obj1 = new stdClass();
        $obj1->ids_type = '1';
        $obj1->ticket_type = '0';
        $obj1->user_ids = '41048219900520113X';
        $obj1->user_name = '高晓凯';
        $lst[] = $obj1;

        $obj2 = new stdClass();
        $obj2->ids_type = '1';
        $obj1->ticket_type = '1';
        $obj2->user_ids = '510184201108240166';
        $obj2->user_name = '李恩贝';
        $lst[] = $obj2;

        $comment = '退票';
        $merchant_order_id = 'hc2017050416581138';
        $order_id = 'EXHC170504165900510';
        $refund_type = 'all';

        $refundinfo = $lst;
        $request_id = '11x';
       echo  $this->yi19->refundTicket($comment, $merchant_order_id, $order_id, $refund_type, $refundinfo, $request_id);
    }
    
    public function querySubwayStation() {
        $this->load->library('yi19');
        $this->yi19->querySubwayStation('G1003');
    }
    
    public function checkTicketNum() {
        $this->load->library('yi19');
        $data = $this->yi19->checkTicketNum('G1003', '2016-12-09', '咸宁北', '深圳北');
		echo $data;
	}
    
    public function queryBxInfo() {
        $this->load->library('yi19');
        $this->yi19->queryBxInfo('EXHC161027154342207');
    }

}

