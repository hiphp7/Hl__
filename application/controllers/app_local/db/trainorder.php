<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 火车订单管理
 */
class Trainorder extends CI_Controller {
	
	public function save_my_temp() {

        $laiyuan = $this->input->post('sf');
        $zhucelaiyuan = $this->config->item('注册来源');
        $laiyuan = array_search($laiyuan, $zhucelaiyuan);
        $yonghuid = $this->input->post('yonghuid');
        $huochexiweileixing = $this->config->item('火车席位类型');

        $obj = json_decode($this->input->post('selected'));
		
        $this->load->library('yi19');
        $hczjlx = $this->config->item("火车证件类型");
        //商户订单Id
        $merchant_order_id = date('YmdHis');
        //订单级别
        $order_level = 1;
        //订单处理结果通知URL
        $order_result_url = '';
        //订单预订结果通知URL
        $book_result_url = '';
        //到达车站
        $arrive_station = $obj->arrive_station;
        //到达时间
        $arrive_time = $obj->arrive_time;
        //订单内乘客信息
        $ticket_person = $obj->ticketInfo->ticket_person;
        $ticket_person_adult = $ticket_person->adult;
        $ticket_person_child = $ticket_person->child;
        $lst = array();
        if (!empty($ticket_person_adult) && count($ticket_person_adult) > 0) {
            foreach ($ticket_person_adult as $adult) {
                $obj2 = new stdClass();
                //是否购买19旅行保险产品
                $obj2->bx = 1;
                //证件类型
                $obj2->ids_type = array_search($adult->ids_type, $hczjlx);
                //车票类型
                $obj2->ticket_type = $adult->ticket_type;
                //证件号码
                $obj2->user_ids = $adult->user_ids;
                //姓名
                $obj2->user_name = $adult->user_name;
                $lst[] = $obj2;
            }
        }
        if (!empty($ticket_person_child) && count($ticket_person_child) > 0) {
            foreach ($ticket_person_child as $child) {
                $obj2 = new stdClass();
                //是否购买19旅行保险产品
                $obj2->bx = 1;
                //证件类型
                $obj2->ids_type = array_search($child->ids_type, $hczjlx);
                //车票类型
                $obj2->ticket_type = $child->ticket_type;
                //证件号码
                $obj2->user_ids = $child->user_ids;
                //姓名
                $obj2->user_name = $child->user_name;
                $lst[] = $obj2;
            }
        }
        $book_detail_list = $lst;
        //保险发票
        if (!empty($obj->ticketInfo->mail->isMail) && $obj->ticketInfo->mail->isMail == TRUE) {
            //是否需要保险发票
            $bx_invoice = 1;
            //保险发票联系地址
            $bx_invoice_address = $obj->ticketInfo->mail->bx_invoice_address;
            //保险发票联系电话
            $bx_invoice_phone = $obj->ticketInfo->mail->bx_invoice_phone;
            //保险发票收件人
            $bx_invoice_receiver = $obj->ticketInfo->mail->bx_invoice_receiver;
            //保险发票邮政编号
            $bx_invoice_zipcode = $obj->ticketInfo->mail->bx_invoice_zipcode;
        } else {
            //是否需要保险发票
            $bx_invoice = 0;
            //保险发票联系地址
            $bx_invoice_address = '';
            //保险发票联系电话
            $bx_invoice_phone = '';
            //保险发票收件人
            $bx_invoice_receiver = '';
            //保险发票邮政编号
            $bx_invoice_zipcode = '';
        }
        //出发车站
        $from_station = $obj->from_station;
        //出发时间
        $from_time = $obj->from_time;
        //联系人地址
        $link_address = '';
        //联系人邮箱
        $link_mail = $obj->ticketInfo->contacts->youxiang;
        //联系人姓名
        $link_name = $obj->ticketInfo->contacts->xingming;
        //联系人手机
        $link_phone = $obj->ticketInfo->contacts->shoujihaoma;
        //保险格式
        $order_pro1 = 'BX_20';
        //保留字段2
        $order_pro2 = '';
        //座位类型
        $seat_type = array_search(strval($obj->lowerprice->typeName), $huochexiweileixing); //是否要加字段？
        //预订车票完成并付款成功是否短信通知用户
        $sms_notify = 1;
        //总计金额
        $sum_amount = $obj->ticketInfo->cost->total->totalPrice;
        //车票单价
        $ticket_price = $obj->ticketInfo->cost->total->ticketfare; //保留两位小数
        //车次
        $train_code = $obj->train_code;
        //乘车日期
        $ss = explode('T', $obj->search->date);
        $travel_time = $ss[0]; //$obj->search->date;//如：2014-01-01
        //备选无座
        $wz_ext = 0;

        $re = $this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext, $bx_invoice);
        $re = json_decode($re);
        if (!empty($re) && $re->return_code == '000') {

            $data = new stdClass();
            $data->arrive_station = $re->arrive_station;
            $data->arrive_time = date("Y-m-d H:i:s", strtotime($re->arrive_time));
            $data->bx_pay_money = $re->bx_pay_money;
            $data->from_station = $re->from_station;
            $data->from_time = date("Y-m-d H:i:s", strtotime($re->from_time));
            $data->merchant_order_id = $re->merchant_order_id;
            $data->order_id = $re->order_id;
            $data->pay_money = $re->pay_money;
            $data->seat_type = $re->seat_type;
            $data->ticket_pay_money = $re->ticket_pay_money;
            $data->train_code = $re->train_code;
            $data->travel_time = date("Y-m-d H:i:s", strtotime($re->travel_time));

            $data->laiyuan = $laiyuan;
            $data->status = 1;
            // $data->refund_status = 0;
            $data->yonghuid = $yonghuid;

            $data->bx_invoice = $obj->ticketInfo->mail->isMail == false ? 0 : 1; // 是否邮递
            $data->bx_invoice_address = $obj->ticketInfo->mail->bx_invoice_address;
            $data->bx_invoice_phone = $obj->ticketInfo->mail->bx_invoice_phone;
            $data->bx_invoice_receiver = $obj->ticketInfo->mail->bx_invoice_receiver;
            $data->bx_invoice_zipcode = $obj->ticketInfo->mail->bx_invoice_zipcode;

            // 联系人
            $data->link_address = isset($obj->ticketInfo->contacts->dizhi) ? $obj->ticketInfo->contacts->dizhi : '';
            $data->link_mail = isset($obj->ticketInfo->contacts->youxiang) ? $obj->ticketInfo->contacts->youxiang : '';
            $data->link_name = $obj->ticketInfo->contacts->xingming;
            $data->link_phone = $obj->ticketInfo->contacts->shoujihaoma;

            // 保险
            if ($order_pro1 = 'BX_20' || $order_pro1 = '') {
                $data->insurance = '20';
                $data->insurerName = '太平人寿';
            } else {
                $data->insurance = '30';
                $data->insurerName = '太平人寿';
            }
			//$data->chuangjianshijian = time();
            $re = $this->db->insert('train_order', $data);
            if ($this->db->insert_id() > 0) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }


    public function save() {
        
        $laiyuan = $this->input->post('sf');
        $zhucelaiyuan = $this->config->item('注册来源');
        $laiyuan = array_search($laiyuan, $zhucelaiyuan);
        $yonghuid = $this->input->post('yonghuid');
        $huochexiweileixing = $this->config->item('火车席位类型');

		// 火车票订单号
        $dingdanid_hc = $this->input->post('orderid');
		$obj = json_decode($this->input->post('selected'));
        $this->load->library('yi19');
        $hczjlx = $this->config->item("火车证件类型");
		
		$sql = "select m.id as id from train_order as m where m.merchant_order_id = ?";
		$query = $this->db->query($sql, array($dingdanid_hc));

		if($query->num_rows() > 0){
			echo "false"; //已经有订单号返回
		} else {
			
			$this->db->trans_begin();
			//商户订单Id
			$merchant_order_id = $dingdanid_hc;
			$data = new stdClass();
			$data->shanghuhao = $obj->ticketInfo->contacts->shanghuhao; // 商户号
			$data->arrive_station = $obj->arrive_station;
			$ss = explode('T', $obj->search->date);
			$travel_time = $ss[0]; //$obj->search->date;//如：2014-01-01 //出发时间
			$cost_time = $obj->cost_time; // 时长
			$data->from_station = $obj->from_station;
			$data->travel_time = $travel_time;
			$from_time = $travel_time . '' . $obj->from_time;
			$data->from_time = date("Y-m-d H:i:s", strtotime($from_time));
			$data->arrive_time = date("Y-m-d H:i:s", strtotime("$data->from_time + $cost_time min"));
			$data->merchant_order_id = $merchant_order_id;
			$data->pay_money = $obj->ticketInfo->cost->total->totalPrice;
			$data->seat_type = array_search(strval($obj->lowerprice->typeName), $huochexiweileixing); //是否要加字段？
			$data->ticket_pay_money = $obj->seatList[0]->price;
			$data->train_code = $obj->train_code;
			$data->laiyuan = $laiyuan;
			$data->status = 0;
			$data->insurance = $obj->ticketInfo->cost->total->insurance; //保险单价
			$data->insurerName = '太平人寿';  //保险名称
			$data->yonghuid = $yonghuid;
			$data->bx_invoice = $obj->ticketInfo->mail->isMail == false ? 0 : 1; // 是否邮递
			$data->bx_invoice_address = $obj->ticketInfo->mail->bx_invoice_address;
			$data->bx_invoice_phone = $obj->ticketInfo->mail->bx_invoice_phone;
			$data->bx_invoice_receiver = $obj->ticketInfo->mail->bx_invoice_receiver;
			$data->bx_invoice_zipcode = $obj->ticketInfo->mail->bx_invoice_zipcode;
			// 联系人
			$data->link_address = isset($obj->ticketInfo->contacts->dizhi) ? $obj->ticketInfo->contacts->dizhi : '';
			$data->link_mail = isset($obj->ticketInfo->contacts->youxiang) ? $obj->ticketInfo->contacts->youxiang : '';
			$data->link_name = $obj->ticketInfo->contacts->xingming;
			$data->link_phone = $obj->ticketInfo->contacts->shoujihaoma;
			// 保险
			if ($order_pro1 = 'BX_20' || $order_pro1 = '') {
				$data->insurance = '20';
				$data->insurerName = '太平人寿';
			} else {
				$data->insurance = '30';
				$data->insurerName = '太平人寿';
			}
			if ($obj->arrive_station == $obj->end_station) {
				$data->iszhongdianzhan = 0;
			} else {
				$data->iszhongdianzhan = 1;
			}
			if ($obj->from_station == $obj->start_station) {
				$data->isshifazhan = 0;
			} else {
				$data->isshifazhan = 1;
			}
			$data->chuangjianshijian = date("Y-m-d H:i:s", time());
			$re = $this->db->insert('train_order', $data); // 创建订单
			$id = $this->db->insert_id();
			//订单内乘客信息
			$ticket_person = $obj->ticketInfo->ticket_person;
			$ticket_person_adult = $ticket_person->adult;
			$ticket_person_child = $ticket_person->child;
			$lst = array();
			if (!empty($ticket_person_adult) && count($ticket_person_adult) > 0) {
				foreach ($ticket_person_adult as $adult) {
					$obj2 = new stdClass();
					//是否购买19旅行保险产品
					$obj2->bx = 1;
					//证件类型
					$obj2->ids_type = array_search($adult->ids_type, $hczjlx);
					//车票类型
					$obj2->ticket_type = $adult->ticket_type;
					//证件号码
					$obj2->user_ids = $adult->user_ids;
					//姓名
					$obj2->user_name = $adult->user_name;
					$lst[] = $obj2;
				}
			}
			if (!empty($ticket_person_child) && count($ticket_person_child) > 0) {
				foreach ($ticket_person_child as $child) {
					$obj2 = new stdClass();
					//是否购买19旅行保险产品
					$obj2->bx = 0;
					//证件类型
					$obj2->ids_type = array_search($child->ids_type, $hczjlx);
					//车票类型
					$obj2->ticket_type = $child->ticket_type;
					//证件号码
					$obj2->user_ids = $child->user_ids;
					//姓名
					$obj2->user_name = $child->user_name;
					$lst[] = $obj2;
				}
			}
			$book_detail_list = $lst;
			foreach ($book_detail_list as $k => $v) {
				$obj = new stdClass();
				$obj->user_name = $v->user_name;
				$obj->user_ids = $v->user_ids;
				$obj->ids_type = $v->ids_type;
				$obj->bx = $v->bx;
				$obj->ticket_type = $v->ticket_type;
				$obj->bx_price = $data->insurance; // 保险费用
				$obj->amount = $data->ticket_pay_money; // 单张票价格
				$obj->merchant_id = $merchant_order_id;
				$obj->orderid = $id; //订单表对应ID
				$obj->ticketStatusName = ''; //  出票状态
				$this->db->insert('train_order_lvke', $obj);
			}
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				echo 'false';
			} else {
				$this->db->trans_commit();
				echo 'true';
			}
		}
    }
	//创建19yi订单
    public function create19yiorder() {
        
        $merchant_order_id = $this->input->get('out_trade_no');
        $fukuanshijian = $this->input->get('fukuanshijian');
        $totalprice = $this->input->get('total_fee');

        $y = substr($fukuanshijian, 0, 4);
        $m = substr($fukuanshijian, 4, 2);
        $d = substr($fukuanshijian, 6, 2);
        $h = substr($fukuanshijian, 8, 2);
        $i = substr($fukuanshijian, 10, 2);
        $s = substr($fukuanshijian, 12, 2);
        $fukuanshijianall = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i . ':' . $s;
        $this->load->library('yi19');
        $dingdanid = substr($merchant_order_id, 16); // 订单id
		
		$sql = "select m.fukuanshijian AS fukuanshijian FROM train_order as m WHERE m.id = ?";
		$query = $this->db->query($sql, array($dingdanid));
		$dingdan = $query->row();
		$fukuanshijian = $dingdan->fukuanshijian;
		if(empty($fukuanshijian)){
			
			// 更新订单号
			$this->db->update('train_order', array('merchant_order_id' => $merchant_order_id), array('id' => $dingdanid));
			// 更新订单号
			$this->db->update('train_order_lvke', array('merchant_id' => $merchant_order_id), array('orderid' => $dingdanid));
			$sql = 'select m.merchant_order_id as merchant_order_id,
			m.arrive_station as arrive_station,
			m.arrive_time as arrive_time,
			m.bx_pay_money as bx_pay_money,
			m.from_station as from_station,
			m.from_time as from_time,
			m.pay_money as pay_money,
			m.seat_type as seat_type,
			m.ticket_pay_money as ticket_pay_money,
			m.train_code as train_code,
			m.travel_time as travel_time,
			m.bx_invoice as bx_invoice,
			m.bx_invoice_address as bx_invoice_address,
			m.bx_invoice_phone as bx_invoice_phone,
			m.bx_invoice_receiver as bx_invoice_receiver,
			m.bx_invoice_zipcode as bx_invoice_zipcode,
			m.link_address as link_address,
			m.link_mail as link_mail,
			m.link_name as link_name,
			m.link_phone as link_phone,
			m.insurance as insurance,
			m.insurerName as insurerName
			from train_order as m where m.id = ?';
			$query = $this->db->query($sql, array($dingdanid));
			$re = $query->row();

			$sql = 'select m.bx as bx,
			m.ids_type as ids_type ,
			m.ticket_type as ticket_type ,
			m.user_ids as user_ids ,
			m.user_name as user_name 
			from train_order_lvke as m where m.orderid = ?';
			$query1 = $this->db->query($sql, array($dingdanid));
			$lvke = $query1->result();

			$merchant_order_id = $merchant_order_id;
			$order_level = 1;
			$arrive_station = $re->arrive_station;
			$arrive_time = date("H:i", strtotime($re->arrive_time));
			$book_detail_list = $lvke;
			$bx_invoice_address = $re->bx_invoice_address;
			$bx_invoice_phone = $re->bx_invoice_phone;
			$bx_invoice_receiver = $re->bx_invoice_receiver;
			$bx_invoice_zipcode = $re->bx_invoice_zipcode;
			$from_station = $re->from_station;
			$from_time = date("H:i", strtotime($re->from_time));
			$link_address = $re->link_address;
			$link_mail = $re->link_mail;
			$link_name = $re->link_name;
			$link_phone = $re->link_phone;
			if ($re->insurance == "30") {
				$order_pro1 = "BX_30";
			} else {
				$order_pro1 = "BX_20";
			}

			$order_pro2 = '';
			$seat_type = $re->seat_type;
			$sms_notify = 1;
			$sum_amount = $re->pay_money;
			$ticket_price = $re->ticket_pay_money;
			$train_code = $re->train_code;
			$travel_time = date("Y-m-d", strtotime($re->travel_time));
			$wz_ext = 0;
			$bx_invoice = $re->bx_invoice;
			//创建19yi订单
			$res = $this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext, $bx_invoice);
						
		$myfile = "jieshou.txt";
		$txt = $res;
		file_put_contents($myfile, $txt, FILE_APPEND);
		$txt = "\r\n";
		file_put_contents($myfile, $txt, FILE_APPEND);
		
			$res = json_decode($res);
			if (!empty($res) && $res->return_code == '000') {

				$order_id = $res->order_id;
				$this->db->update('train_order', array('order_id' => $order_id, 'status' => 1, 'fukuanshijian' => $fukuanshijianall), array('merchant_order_id' => $merchant_order_id));

				foreach ($lvke as $k => $v) {
					$obj = new stdClass();
					$obj->order_id = $order_id;
					$obj->ticketStatusName = '出票中'; //  出票状态
					$this->db->update('train_order_lvke', $obj, array('merchant_id' => $merchant_order_id));
				}
				echo 'true';
				die();
			} else {
				// 失败回滚的时候要把钱退掉
				$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
				$get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($totalprice), 'refund_fee' => floatval($totalprice));
				$resutl = $this->request_get($url, $get_data);
				$this->db->update('train_order', array('status' => 8), array('merchant_order_id' => $merchant_order_id));
				echo 'false';
				die();
			}
		}
    }
	
		//创建19yi订单 -- 加事务
    public function create19yiorder—jiashiwu() {
        $this->db->trans_begin();
        $merchant_order_id = $this->input->get('out_trade_no');
        $fukuanshijian = $this->input->get('fukuanshijian');
        $totalprice = $this->input->get('total_fee');
		
        $y = substr($fukuanshijian, 0, 4);
        $m = substr($fukuanshijian, 4, 2);
        $d = substr($fukuanshijian, 6, 2);
        $h = substr($fukuanshijian, 8, 2);
        $i = substr($fukuanshijian, 10, 2);
        $s = substr($fukuanshijian, 12, 2);
        $fukuanshijianall = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i . ':' . $s;
        $this->load->library('yi19');
		$dingdanid = substr($merchant_order_id,16); // 订单id
		// 更新订单号
        $this->db->update('train_order', array('merchant_order_id' => $merchant_order_id), array('id' => $dingdanid));
		// 更新订单号
        $this->db->update('train_order_lvke', array('merchant_id' => $merchant_order_id), array('orderid' => $dingdanid));
        $sql = 'select m.merchant_order_id as merchant_order_id,
        m.arrive_station as arrive_station,
        m.arrive_time as arrive_time,
        m.bx_pay_money as bx_pay_money,
        m.from_station as from_station,
        m.from_time as from_time,
        m.pay_money as pay_money,
        m.seat_type as seat_type,
        m.ticket_pay_money as ticket_pay_money,
        m.train_code as train_code,
        m.travel_time as travel_time,
        m.bx_invoice as bx_invoice,
        m.bx_invoice_address as bx_invoice_address,
        m.bx_invoice_phone as bx_invoice_phone,
        m.bx_invoice_receiver as bx_invoice_receiver,
        m.bx_invoice_zipcode as bx_invoice_zipcode,
        m.link_address as link_address,
        m.link_mail as link_mail,
        m.link_name as link_name,
        m.link_phone as link_phone,
        m.insurance as insurance,
        m.insurerName as insurerName
        from train_order as m where m.id = ?';
        $query = $this->db->query($sql, array($dingdanid));
        $re = $query->row();

        $sql = 'select m.bx as bx,
        m.ids_type as ids_type ,
        m.ticket_type as ticket_type ,
        m.user_ids as user_ids ,
        m.user_name as user_name 
        from train_order_lvke as m where m.orderid = ?';
        $query1 = $this->db->query($sql, array($dingdanid));
        $lvke = $query1->result();

        $merchant_order_id = $merchant_order_id;
        $order_level = 1;
        $arrive_station = $re->arrive_station;
        $arrive_time = date("H:i", strtotime($re->arrive_time));
        $book_detail_list = $lvke;
        $bx_invoice_address = $re->bx_invoice_address;
        $bx_invoice_phone = $re->bx_invoice_phone;
        $bx_invoice_receiver = $re->bx_invoice_receiver;
        $bx_invoice_zipcode = $re->bx_invoice_zipcode;
        $from_station = $re->from_station;
        $from_time = date("H:i", strtotime($re->from_time));
        $link_address = $re->link_address;
        $link_mail = $re->link_mail;
        $link_name = $re->link_name;
        $link_phone = $re->link_phone;
        if ($re->insurance == "30") {
            $order_pro1 = "BX_30";
        } else {
            $order_pro1 = "BX_20";
        }

        $order_pro2 = '';
        $seat_type = $re->seat_type;
        $sms_notify = 1;
        $sum_amount = $re->pay_money;
        $ticket_price = $re->ticket_pay_money;
        $train_code = $re->train_code;
        $travel_time = date("Y-m-d", strtotime($re->travel_time));
        $wz_ext = 0;
        $bx_invoice = $re->bx_invoice;
		//创建19yi订单
        $res = $this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, $book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, $bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, $link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, $train_code, $travel_time, $wz_ext, $bx_invoice);
		
		$txt = $res;
		if(!empty($txt))
		{
		$myfile = fopen("jieshou1.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fclose($myfile);
		}

        $res = json_decode($res);
        if (!empty($res) && $res->return_code == '000') {

            $order_id = $res->order_id;
            $this->db->update('train_order', array('order_id' => $order_id, 'status' => 1, 'fukuanshijian' => $fukuanshijianall), array('merchant_order_id' => $merchant_order_id));

            foreach ($lvke as $k => $v) {
                $obj = new stdClass();
                $obj->order_id = $order_id;
                $obj->ticketStatusName = '出票中'; //  出票状态
                $this->db->update('train_order_lvke', $obj, array('merchant_id' => $merchant_order_id));	
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->cancelOrder($order_id, $merchant_order_id);
                // 失败回滚的时候要把钱退掉
                $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
                $get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($totalprice), 'refund_fee' => floatval($totalprice));
                $resutl = $this->request_get($url, $get_data);
				$this->db->update('train_order', array('order_id' => $order_id, 'status' => 8), array('merchant_order_id' => $merchant_order_id));

                echo 'false';
            } else {
                $this->db->trans_commit();
                echo 'true';
            }
        } else {
			// 失败回滚的时候要把钱退掉
			$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
			$get_data = array('transaction_id' => '', 'out_trade_no' => $merchant_order_id, 'total_fee' => floatval($totalprice), 'refund_fee' => floatval($totalprice));
			$resutl = $this->request_get($url, $get_data);		
            $this->db->update('train_order', array('status' => 8), array('merchant_order_id' => $merchant_order_id));
						
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				echo 'false';
			}else {
                $this->db->trans_commit();			
                echo 'false';
            }
        }
    }
	
	public function save11() {

        $laiyuan = $this->input->post('sf');
        $zhucelaiyuan = $this->config->item('注册来源');
        $laiyuan = array_search($laiyuan, $zhucelaiyuan);
        $yonghuid = $this->input->post('yonghuid');
        $huochexiweileixing = $this->config->item('火车席位类型');
		// 火车票订单号
		$dingdanid_hc = $this->input->post('orderid');
        $obj = json_decode($this->input->post('selected'));	
        $this->load->library('yi19');
        $hczjlx = $this->config->item("火车证件类型");
        //商户订单Id
        $merchant_order_id = $dingdanid_hc;
        //订单级别
        $order_level = 1;
        //订单处理结果通知URL
        $order_result_url = '';
        //订单预订结果通知URL
        $book_result_url = '';
        //到达车站
        $arrive_station = $obj->arrive_station;
        //到达时间
        $arrive_time = $obj->arrive_time;
        //订单内乘客信息
        $ticket_person = $obj->ticketInfo->ticket_person;
        $ticket_person_adult = $ticket_person->adult;
        $ticket_person_child = $ticket_person->child;
        $lst = array();
        if (!empty($ticket_person_adult) && count($ticket_person_adult) > 0) {
            foreach ($ticket_person_adult as $adult) {
                $obj2 = new stdClass();
                //是否购买19旅行保险产品
                $obj2->bx = 1;
                //证件类型
                $obj2->ids_type = array_search($adult->ids_type, $hczjlx);
                //车票类型
                $obj2->ticket_type = $adult->ticket_type;
                //证件号码
                $obj2->user_ids = $adult->user_ids;
                //姓名
                $obj2->user_name = $adult->user_name;
                $lst[] = $obj2;
            }
        }
        if (!empty($ticket_person_child) && count($ticket_person_child) > 0) {
            foreach ($ticket_person_child as $child) {
                $obj2 = new stdClass();
                //是否购买19旅行保险产品
                $obj2->bx = 1;
                //证件类型
                $obj2->ids_type = array_search($child->ids_type, $hczjlx);
                //车票类型
                $obj2->ticket_type = $child->ticket_type;
                //证件号码
                $obj2->user_ids = $child->user_ids;
                //姓名
                $obj2->user_name = $child->user_name;
                $lst[] = $obj2;
            }
        }
        $book_detail_list = $lst;
        //保险发票
        if (!empty($obj->ticketInfo->mail->isMail) && $obj->ticketInfo->mail->isMail == TRUE) {
            //是否需要保险发票
            $bx_invoice = 1;
            //保险发票联系地址
            $bx_invoice_address = $obj->ticketInfo->mail->bx_invoice_address;
            //保险发票联系电话
            $bx_invoice_phone = $obj->ticketInfo->mail->bx_invoice_phone;
            //保险发票收件人
            $bx_invoice_receiver = $obj->ticketInfo->mail->bx_invoice_receiver;
            //保险发票邮政编号
            $bx_invoice_zipcode = $obj->ticketInfo->mail->bx_invoice_zipcode;
        } else {
            //是否需要保险发票
            $bx_invoice = 0;
            //保险发票联系地址
            $bx_invoice_address = '';
            //保险发票联系电话
            $bx_invoice_phone = '';
            //保险发票收件人
            $bx_invoice_receiver = '';
            //保险发票邮政编号
            $bx_invoice_zipcode = '';
        }
        //出发车站
        $from_station = $obj->from_station;
        //出发时间
        $from_time = $obj->from_time;
        //联系人地址
        $link_address = '';
        //联系人邮箱
        $link_mail = $obj->ticketInfo->contacts->youxiang;
        //联系人姓名
        $link_name = $obj->ticketInfo->contacts->xingming;
        //联系人手机
        $link_phone = $obj->ticketInfo->contacts->shoujihaoma;
        //保险格式
        $order_pro1 = 'BX_20';
        //保留字段2
        $order_pro2 = '';
        //座位类型
        $seat_type = array_search(strval($obj->lowerprice->typeName), $huochexiweileixing); //是否要加字段？
        //预订车票完成并付款成功是否短信通知用户
        $sms_notify = 1;
        //总计金额
        $sum_amount = $obj->ticketInfo->cost->total->totalPrice;
        //车票单价
        //$ticket_price = $obj->ticketInfo->cost->total->ticketfare; //保留两位小数
		$ticket_price = $obj->seatList[0]->price;
        //车次
        $train_code = $obj->train_code;
        //乘车日期
        $ss = explode('T', $obj->search->date);
        $travel_time = $ss[0]; //$obj->search->date;//如：2014-01-01
        //备选无座
        $wz_ext = 0;

        $re = $this->yi19->CreateOrder($merchant_order_id, $order_level, $arrive_station, $arrive_time, 
		$book_detail_list, $bx_invoice_address, $bx_invoice_phone, $bx_invoice_receiver, 
		$bx_invoice_zipcode, $from_station, $from_time, $link_address, $link_mail, $link_name, 
		$link_phone, $order_pro1, $order_pro2, $seat_type, $sms_notify, $sum_amount, $ticket_price, 
		$train_code, $travel_time, $wz_ext, $bx_invoice);
	/*	
		$myfile = "newfile.txt";
        $txt = $re;
		file_put_contents($myfile, $txt, FILE_APPEND);
        $txt = "\r\n";
        file_put_contents($myfile, $txt, FILE_APPEND);        
	*/	
		$re = json_decode($re);
		//var_dump($re);
        if (!empty($re) && $re->return_code == '000') {
			$this->db->trans_begin();
            $data = new stdClass();
			$data->arrive_station = $re->arrive_station;
			$travel_time = $re->travel_time; //出发时间
			$cost_time = $obj->cost_time; // 时长
            $data->bx_pay_money = $re->bx_pay_money;
            $data->from_station = $re->from_station;
			$from_time = $travel_time.''.$re->from_time;
			$data->from_time = date("Y-m-d H:i:s", strtotime($from_time));
			$data->arrive_time = date("Y-m-d H:i:s", strtotime("$data->from_time + $cost_time min"));
            $data->merchant_order_id = $re->merchant_order_id;
            $data->order_id = $re->order_id;
			$order_id = $re->order_id;
            $data->pay_money = $re->pay_money;
            $data->seat_type = $re->seat_type;
            $data->ticket_pay_money = $re->ticket_pay_money;
            $data->train_code = $re->train_code;
            $data->travel_time = date("Y-m-d H:i:s", strtotime($re->travel_time));
            $data->laiyuan = $laiyuan;
            $data->status = 1;
            // $data->refund_status = 0;
            $data->yonghuid = $yonghuid;
            $data->bx_invoice = $obj->ticketInfo->mail->isMail == false ? 0 : 1; // 是否邮递
            $data->bx_invoice_address = $obj->ticketInfo->mail->bx_invoice_address;
            $data->bx_invoice_phone = $obj->ticketInfo->mail->bx_invoice_phone;
            $data->bx_invoice_receiver = $obj->ticketInfo->mail->bx_invoice_receiver;
            $data->bx_invoice_zipcode = $obj->ticketInfo->mail->bx_invoice_zipcode;

            // 联系人
            $data->link_address = isset($obj->ticketInfo->contacts->dizhi) ? $obj->ticketInfo->contacts->dizhi : '';
            $data->link_mail = isset($obj->ticketInfo->contacts->youxiang) ? $obj->ticketInfo->contacts->youxiang : '';
            $data->link_name = $obj->ticketInfo->contacts->xingming;
            $data->link_phone = $obj->ticketInfo->contacts->shoujihaoma;

            // 保险

            if ($order_pro1 = 'BX_20' || $order_pro1 = '') {
                $data->insurance = '20';
                $data->insurerName = '太平人寿';
            } else {
                $data->insurance = '30';
                $data->insurerName = '太平人寿';
            }
			if ($obj->arrive_station == $obj->end_station) {
               $data->iszhongdianzhan = 0;
            } else {
                $data->iszhongdianzhan = 1;
            }
            if ($obj->from_station == $obj->start_station) {
                $data->isshifazhan = 0;
            } else {
                $data->isshifazhan = 1;
            }
            $data->chuangjianshijian = date("Y-m-d H:i:s",time());
            $re = $this->db->insert('train_order', $data);
			$id = $this->db->insert_id();
            foreach ($book_detail_list as $k => $v) {
                $obj = new stdClass();
                $obj->user_name = $v->user_name;
                $obj->user_ids = $v->user_ids;
                $obj->ids_type = $v->ids_type;
                $obj->ticket_type = $v->ticket_type;
                $obj->bx_price = $data->insurance; // 保险费用
                $obj->amount = $ticket_price; // 单张票价格
                $obj->merchant_id = $merchant_order_id;
                $obj->order_id = $order_id;
                $obj->orderid = $id; //订单表对应ID
				$obj->ticketStatusName = '出票中'; //  出票状态
                $this->db->insert('train_order_lvke', $obj);
			}			
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$this->cancelOrder($order_id, $merchant_order_id);
				echo 'false';
				
			}
			else
			{
				$this->db->trans_commit();
				echo 'true';
			}		
        } else {
			echo 'false';
		}
    }


	public function cancelOrder($order_id, $merchant_order_id){
        $this->load->library('yi19');
        $this->yi19->cancelOrder($order_id, $merchant_order_id);
    }


	// 订单列表
	public function trainorderlist()
	{
		$this->db->trans_begin();
		$yonghuid = $this->input->get('yonghuid');
		$shaixuan = $this->input->get('status');
		$sf = $this->input->get('sf');
		$laiyuan = $this->config->item('注册来源');
		$laiyuan = array_search($sf, $laiyuan);

		$dingdanzhuangtai = $this->config->item('火车订单状态');

		$sql= "select m.order_id as order_id,
		m.id as id,
		m.merchant_order_id as merchant_order_id,
		m.arrive_station as arrive_station,
		m.arrive_time as arrive_time,
		m.from_station as from_station,
		m.from_time as from_time,
		m.train_code as train_code,
		m.bx_pay_money as bx_pay_money,
		m.pay_money as pay_money,
		m.ticket_pay_money as ticket_pay_money,
		m.status as status,
		m.chuangjianshijian as chuangjianshijian
		from train_order as m where yonghuid = ? and laiyuan = ? and isdelete = 0";
		$query = $this->db->query($sql, array($yonghuid, $laiyuan));
		 // $qe = $this->db->last_query();
		$result = $query->result();
		$list = array();
		if (!empty($result) && $result != false) {
			
			foreach ($result as $k => $v) {
				$ketuipiao = false;
				$sql = 'select m.ticketStatusName as ticketStatusName from train_order_lvke as m where orderid = ?';
				$query = $this->db->query($sql, array($v->id));
				$passenslist = $query->result();
				if(!empty($passenslist)){
					foreach ($passenslist as $v1){
						if($v1->ticketStatusName == "出票完成"){
							$ketuipiao = true;
						}
					}
				}
				$chuangjianshijianchuo = strtotime($v->chuangjianshijian);
				$timer = strtotime('now');
				$zhongzhishijianchuo = $chuangjianshijianchuo + 10 * 60; // 支付最后时间
				if ($v->status == '0' && $zhongzhishijianchuo < $timer) {
					$this->db->update('train_order', array('status' => 6), array('id' => $v->id));
					$v->status == '6';
				}			
				if($shaixuan == "2") {
					if (strtotime($v->from_time) > time()) {
						$v->statusName = $dingdanzhuangtai[$v->status];
						$v->depWeek= $this->getweek($v->from_time);
						$v->arrWeek= $this->getweek($v->arrive_time);
						$v->depSortDate =date("m月d日",strtotime($v->from_time));
						$v->arrSortDate =date("m月d日",strtotime($v->arrive_time));
						$v->depTime =date("H:i",strtotime($v->from_time));
						$v->arrTime =date("H:i",strtotime($v->arrive_time));
						$v->chuangjianriqi = date("m月d日 H:i", strtotime($v->chuangjianshijian));
						$v->ketuipiao = $ketuipiao;
						$list[]= $v;
					}
				}  else if ($shaixuan == "1") {
					if ($v->status == '0') {
						$v->statusName = $dingdanzhuangtai[$v->status];
						$v->depWeek = $this->getweek($v->from_time);
						$v->arrWeek = $this->getweek($v->arrive_time);
						$v->depSortDate = date("m月d日", strtotime($v->from_time));
						$v->arrSortDate = date("m月d日", strtotime($v->arrive_time));
						$v->depTime = date("H:i", strtotime($v->from_time));
						$v->arrTime = date("H:i", strtotime($v->arrive_time));
						$v->chuangjianriqi = date("m月d日 H:i", strtotime($v->chuangjianshijian));
						$v->ketuipiao = $ketuipiao;
						$list[] = $v;
					}
				} else {
						$v->statusName = $dingdanzhuangtai[$v->status];
						$v->depWeek= $this->getweek($v->from_time);
						$v->arrWeek= $this->getweek($v->arrive_time);
						$v->depSortDate =date("m月d日",strtotime($v->from_time));
						$v->arrSortDate =date("m月d日",strtotime($v->arrive_time));
						$v->depTime =date("H:i",strtotime($v->from_time));
						$v->arrTime =date("H:i",strtotime($v->arrive_time));
						$v->chuangjianriqi = date("m月d日 H:i", strtotime($v->chuangjianshijian));
						$v->ketuipiao = $ketuipiao;
						$list[]= $v;
				}
			}              
		} 
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo 'false';
		} else {
		    $this->db->trans_commit();
		    //echo json_encode($list);
                    $callback = $this->input->get('callback');
                    echo $callback."('".json_encode($list)."')";
		}			
		


	}
	// 订单详情
	public function orderdetail()
	{
		$this->db->trans_begin();
		$this->load->library('yi19');
		$dingdanzhuangtai = $this->config->item('火车订单状态');
		$zuoweileixing = $this->config->item('火车席位类型');
		$type = $this->config->item('火车证件类型');
		$chupiaostatus = $this->config->item('火车出票状态');
		$id = $this->input->get('id');
		// $status = $this->input->post('status');
		$sql = "select m.order_id as order_id,
		m.merchant_order_id as merchant_order_id,
		m.id as id,
		m.arrive_station as arrive_station,
		m.arrive_time as arrive_time,
		m.bx_pay_money as bx_pay_money,
		m.from_station as from_station,
		m.from_time as from_time,
		m.pay_money as pay_money,
		m.seat_type as seat_type,
		m.ticket_pay_money as ticket_pay_money,
		m.train_code as train_code,
		m.travel_time as travel_time,
		m.status as status,
		m.laiyuan as laiyuan,
		m.refund_status as refund_status,
		m.bx_invoice as bx_invoice,
		m.bx_invoice_address as bx_invoice_address,
		m.bx_invoice_phone as bx_invoice_phone,
		m.bx_invoice_receiver as bx_invoice_receiver,
		m.bx_invoice_zipcode as bx_invoice_zipcode,
		m.link_address as link_address,
		m.link_mail as link_mail,
		m.link_name as link_name,
		m.link_phone as link_phone,
		m.insurance as insurance,
		m.insurerName as insurerName,
		m.chuangjianshijian as chuangjianshijian
		from train_order as m where id = ?";

		$query = $this->db->query($sql, array($id));

		$result = $query->row();
		if (!empty($result) && $result != false) {
			$result->statusName = $dingdanzhuangtai[$result->status];
			$chuangjianshijian = $result->chuangjianshijian;
			$result->chuangjianshijian = date("m月d日 H:i", strtotime($chuangjianshijian));
			$result->depWeek= $this->getweek($result->from_time);
			$result->arrWeek= $this->getweek($result->arrive_time);
			$result->depSortDate = date("m月d日",strtotime($result->from_time));
			$result->arrSortDate = date("m月d日",strtotime($result->arrive_time));
			$result->depTime = date("H:i",strtotime($result->from_time));
			$result->arrTime = date("H:i",strtotime($result->arrive_time));
			$result->costtime = $this->timecha($result->from_time, $result->arrive_time);
			$result->seat_Name = $zuoweileixing[$result->seat_type];
			$order_id = $result->order_id;
			$merchant_order_id = $result->merchant_order_id;

			$sql = 'select m.bx_channel as bx_channel,
					m.bx_code as bx_code,
					m.id as id,
					m.bx_price as bx_price,
					m.ids_type as ids_type,
					m.ticket_type as ticket_type,
					m.user_ids as user_ids,
					m.user_name as user_name,
					m.train_box as train_box,
					m.seat_no as seat_no,
					m.seat_type as seat_type,
					m.ticketStatusName as ticketStatusName,
					m.bx_channel as bx_channel 
					from train_order_lvke as m where orderid = ?';

			$query = $this->db->query($sql, array($id));
			$passenslist = $query->result();
			$passensname='';
			$totalCount = 0;
			$adultCount = 0;
			$ketuipiao = false; // 是否可退票
			$insuranceNos = '';
			foreach ($passenslist as $key => $v) {
				$v->chk = false ; // 退票用
				$v->identityName = $type[$v->ids_type];
				$passensname = $passensname.','.$v->user_name;
				if ($v->ticket_type != 1) {
					$adultCount++;
				}
				$totalCount++;
				if ($v->ticketStatusName == "出票完成"){
					$ketuipiao = true;       
				}
				if(empty($insuranceNos) ||$insuranceNos == '' && !empty($v->bx_code)){
					$insuranceNos = $v->bx_code;
				}					
			}
			$result->passenslist = $passenslist;
			$result->passensname = trim($passensname,',');
			$result->totalCount = $totalCount;
			$result->adultCount = $adultCount;
			$result->ketuipiao = $ketuipiao;
			$result->insuranceNos = $insuranceNos;
		} 
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo 'false';
		} else {
		   $this->db->trans_commit();
			//echo json_encode($result);	
                        $callback = $this->input->get('callback');
                        echo $callback."('".json_encode($result)."')";
		}
	}

	
	//删除订单
	public function deleteorder()
	{
		$id = $this->input->get('id');	
		$this->db->update('train_order', array('isdelete' => 1), array('id' => $id));
		if ($this->db->affected_rows()>0) {
			//echo 'true';
                        $callback = $this->input->get('callback');
                        echo $callback."('true')";
		} else {
			$callback = $this->input->get('callback');
                        echo $callback."('false')";
		}
	}

	public function getweek($date)
	{
		$week = date('w',strtotime($date));
		switch ($week) {
			case '0':
				$w = '日';
				break;
			case '1':
				$w = '一';
				break;
			case '2':
				$w = '二';
				break;
			case '3':
				$w = '三';
				break;
			case '4':
				$w = '四';
				break;
			case '5':
				$w = '五';
				break;
			default:
				$w = '六';
				break;
		}
		return "星期".$w;
	}
	/**
	 * 计算时间差
	 */
	public function timecha($date1, $date2){

		$cle = strtotime($date2)-strtotime($date1);
		$d = floor($cle/3600/24);
		$cle  -= $d * 60 * 60 * 24;
		$h = floor(($cle%(3600*24))/3600);
		$cle  -= $h * 60 * 60;
		$m = floor(($cle%(3600*24))/60);
		$d=intval($d);
		$h=intval($h);

		if ($d <= 0) {
			if ($h <= 0) {
				return  $m.'分';
			} else {
			   return  $h.'小时'.$m.'分';
			}
			
		} else {
			return $d.'天'.$h.'小时'.$m.'分';
		}
	}

	/*
	 * 先建订单,在申请19yi
	 */
	public function ordertuipiao() {
		$this->db->trans_begin();
		$this->load->library('yi19');
		$str = json_decode($this->input->get('tuipiao'));
		$adultlist = $str->adultlist;
		$childlist = $str->childlist;
		$comment = $str->RawNote;
		$merchant_order_id = $str->merchant_order_id;
		$order_id = $str->order_id;
		$id = $str->id;
		$refund_type = $str->refund_type;  // 退票类型
		$shenqinghao = 'TP' . time();
		$tuipiaolist = array();
		$refundinfo = array();
		if ($adultlist != null) {
			foreach ($adultlist as $key => $value) {
				$data = new stdClass();
				$refund = new stdClass();
				$data->ids_type = $value->ids_type;
				$data->ticket_type = $value->ticket_type;
				$data->user_ids = $value->user_ids;
				$data->user_name = $value->user_name;
				$data->orderlvkeid = $value->id;

				$refund->id_type = $value->ids_type;
				$refund->ticket_type = $value->ticket_type;
				$refund->user_ids = $value->user_ids;
				$refund->user_name = $value->user_name;

				$tuipiaolist[] = $data;
				$refundinfo[] = $refund;
			}
		}

		if ($childlist != null) {
			foreach ($childlist as $k => $v) {
				$data = new stdClass();
				$refund = new stdClass();
				$data->ids_type = $v->ids_type;
				$data->ticket_type = $v->ticket_type;
				$data->user_ids = $v->user_ids;
				$data->user_name = $v->user_name;
				$data->orderlvkeid = $v->id;

				$refund->id_type = $v->ids_type;
				$refund->ticket_type = $v->ticket_type;
				$refund->user_ids = $v->user_ids;
				$refund->user_name = $v->user_name;

				$tuipiaolist[] = $data;
				$refundinfo[] = $refund;
			}
		}
		// 保存
		$tdingdan = new stdClass();
		$tdingdan->merchant_order_id = $merchant_order_id;
		$tdingdan->train_order_id = $order_id;
		$tdingdan->comment = $comment;
		$tdingdan->zhuangtai = 0;
		$tdingdan->orderid = $id;
		$tdingdan->shenqinghao = $shenqinghao;

		$this->db->insert('train_tuipiao_dingdan', $tdingdan);
		$tuipiaoid = $this->db->insert_id();

		foreach ($tuipiaolist as $key => $value) {
			$value->shenqinghao = $shenqinghao;
			$this->db->insert('train_tuipiao_xiangqing', $value);
			$this->db->update('train_order_lvke', array('ticketStatusName' => '退票中'), array('id' => $value->orderlvkeid));
		}

		// 提交19yi
		if ($refund_type == 'all') {
			$refundinfo = Array();
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo 'false';		
		}
		else
		{
			$this->db->trans_commit();	
			$refundinfo = json_encode($refundinfo);			
			$request_id = $shenqinghao;
			$re = $this->yi19->refundTicket($comment, $merchant_order_id, $order_id, $refund_type, $refundinfo, $request_id);
			$re = json_decode($re);

			if ($re->status == 'SUCCESS') {
                            $this->db->update('train_tuipiao_dingdan', array('zhuangtai' => 1), array('id' => $tuipiaoid));
                            //echo "true";
                            $callback = $this->input->get('callback');
                            echo $callback."('true')";
			} else {
				$this->db->update('train_tuipiao_dingdan', array('zhuangtai' => 2), array('id' => $tuipiaoid));
				
				foreach ($tuipiaolist as $key => $value) {
					$value->shenqinghao = $shenqinghao;
					$this->db->update('train_order_lvke', array('ticketStatusName' => '出票完成'), array('id' => $value->orderlvkeid));
				}				
				$callback = $this->input->get('callback');
                                echo $callback."('false')";
			}
		}
	}

	/**
     * 模拟get进行url请求
     * @param string $url
     * @param array $get_data
     */
    function request_get($url = '', $get_data = array()) {
        if (empty($url) || empty($get_data)) {
            return false;
        }
        
        $o = "";
        foreach ( $get_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $get_data = substr($o,0,-1);

        $postUrl = $url.'?'.$get_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }

}