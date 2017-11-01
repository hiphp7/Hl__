<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 火车订单管理
 */
class Trainorder extends CI_Controller {
	
	public function save_my_temp() {
        $callback = $this->input->get('callback');
        $laiyuan = $this->input->get('sf');
        $zhucelaiyuan = $this->config->item('注册来源');
        $laiyuan = array_search($laiyuan, $zhucelaiyuan);

        $yonghuid = $this->input->get('yonghuid');
        $huochexiweileixing = $this->config->item('火车席位类型');

        $obj = json_decode($this->input->get('selected'));
		
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
		var_dump($re);
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
                echo $callback . "(" . json_encode($data) . ")";
            } else {
                echo $callback . "(false)";
            }
        }
    }
	
	public function save() {

	    $callback = $this->input->get('callback');
        $laiyuan = $this->input->get('sf');
        $zhucelaiyuan = $this->config->item('注册来源');
        $laiyuan = array_search($laiyuan, $zhucelaiyuan);

        $yonghuid = $this->input->get('yonghuid');
        $huochexiweileixing = $this->config->item('火车席位类型');

		// 火车票订单号
		$dingdanid_hc = $this->input->get('orderid');
        $obj = json_decode($this->input->get('selected'));
		
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
				echo $callback . "(" . json_encode($data) . ")";
				
			}
			else
			{
				$this->db->trans_commit();
				echo $callback . "(false)";
			}

			
        } else {
			echo $callback . "(false)";
		}
    }

    public function test(){
        echo $callback . "(" . 'true' . ")";
    }
	public function cancelOrder($order_id, $merchant_order_id){
        $this->load->library('yi19');
        $this->yi19->cancelOrder($order_id, $merchant_order_id);
    }


 

        // 订单列表
        public function trainorderlist()
        {
			$callback = $this->input->get('callback');
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
            if (!empty($result) && $result != false) {

                $list = array();
                foreach ($result as $k => $v) {
                    if($shaixuan == "1") {

                        if (strtotime($v->from_time) > time()) {


                            $v->statusName = $dingdanzhuangtai[$v->status];
                            $v->depWeek= $this->getweek($v->from_time);
                            $v->arrWeek= $this->getweek($v->arrive_time);
                            $v->depSortDate =date("m月d日",strtotime($v->from_time));
                            $v->arrSortDate =date("m月d日",strtotime($v->arrive_time));
                            $v->depTime =date("H:i",strtotime($v->from_time));
                            $v->arrTime =date("H:i",strtotime($v->arrive_time));
                            $list[]= $v;
                        }
                    } else {
                        $v->statusName = $dingdanzhuangtai[$v->status];
                        $v->depWeek= $this->getweek($v->from_time);
                        $v->arrWeek= $this->getweek($v->arrive_time);
                        $v->depSortDate =date("m月d日",strtotime($v->from_time));
                        $v->arrSortDate =date("m月d日",strtotime($v->arrive_time));
                        $v->depTime =date("H:i",strtotime($v->from_time));
                        $v->arrTime =date("H:i",strtotime($v->arrive_time));
                        $list[]= $v;
                    }

                }
                echo $callback . "(" . json_encode($data) . ")";
            } else {
                echo $callback . "(false)";
            }


        }
        // 订单详情
		        public function orderdetail()
        {
			$callback = $this->input->get('callback');
            $this->load->library('yi19');
            $dingdanzhuangtai = $this->config->item('火车订单状态');
            $zuoweileixing = $this->config->item('火车席位类型');
            $type = $this->config->item('火车证件类型');
            $chupiaostatus = $this->config->item('火车出票状态');
            $id = $this->input->get('id');
            // $status = $this->input->get('status');

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
                // $ticketStatus = array_search($order_status, $chupiaostatus);
                foreach ($passenslist as $key => $v) {
                        $v->chk = false ; // 退票用
                        $v->identityName = $type[$v->ids_type];
                        $passensname = $passensname.','.$v->user_name;
                        if ($v->ticket_type != 1) {
                            $adultCount++;
                        }
                        $totalCount++;
                }
                $result->passenslist = $passenslist;

                $result->passensname = trim($passensname,',');
                $result->totalCount = $totalCount;
                $result->adultCount = $adultCount;
                echo $callback . "(" . json_encode($data) . ")";

            } else {
                echo $callback . "(false)";
            }

        }
        public function orderdetail1()
        {
			$callback = $this->input->get('callback');
            $this->load->library('yi19');
            $dingdanzhuangtai = $this->config->item('火车订单状态');
            $zuoweileixing = $this->config->item('火车席位类型');
            $type = $this->config->item('火车证件类型');
            $chupiaostatus = $this->config->item('火车出票状态');
            $id = $this->input->get('id');
            // $status = $this->input->get('status');

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

                // seat_type
                // statusName
                // costtime
                // 座位类型

                // $result->status = $result->status;
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

                $re = $this->yi19->queryOrderInfo($order_id, $merchant_order_id);
                $re = json_decode($re);
                if (!empty($re) && $re->return_code == '000') {


                        $passensname='';
                        $ticket_list = $re->ticket_list;
                        $passenslist = $ticket_list->book_detail_list;
                        $totalCount = 0;
                        $adultCount = 0;
                        $order_status = $ticket_list->order_status;  // 接口返回出票状态

                        $ticketStatus = array_search($order_status, $chupiaostatus);

                        foreach ($passenslist as $k=> $v) {
                            $v->chk = false ; // 退票用
                            $v->identityName = $type[$v->ids_type];
                            $v->ticketStatus = $ticketStatus;  // 出票状态
                            $passensname = $passensname.','.$v->user_name;
                            if ($v->ticket_type != 1) {
                                $adultCount++;
                            }
                            $totalCount++;

                        }
                        if ($result->insurance > 0) {
                             $baoxian = $this->yi19->queryBxInfo($order_id, $merchant_order_id);
                             $baoxian = json_decode($baoxian);
                             $result->insuranceNos = $baoxian->bxInfos[0]->bx_code;
                        }

                    $result->passenslist = $passenslist;

                    $result->passensname = trim($passensname,',');
                    $result->totalCount = $totalCount;
                    $result->adultCount = $adultCount;

                    echo $callback . "(" . json_encode($data) . ")";
                    die();
                } else {
                    echo $callback . "(" . json_encode($data) . ")";
                    die();
                }

            } else {
                echo $callback . "(false)";
            }

        }
        //删除订单
        public function deleteorder()
        {
			$callback = $this->input->get('callback');
            $id = $this->input->get('id');
            $this->db->set('isdelete', 1);
            $this->db->where('id', $id);
            $this->db->update('train_order');
            if ($this->db->affected_rows()>0) {
               echo $callback . "(" . json_encode($data) . ")";
            } else {
               echo $callback . "(false)";
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

        // 退票
        public function ordertuipiao()
        {
			$callback = $this->input->get('callback');
            $tuipiaolist = json_decode($this->input->get('tuipiao'));
            $adultlist = $tuipiaolist->adultlist;
            $childlist = $tuipiaolist->childlist;
            $this->db->trans_start();
            if ($adultlist != null) {
                foreach ($adultlist as $key => $value) {
                    $data= new stdClass();
                    $data->train_order_id = $tuipiaolist->order_id;
                    $data->merchant_order_id = $tuipiaolist->merchant_order_id;
                    $data->ids_type = $value->ids_type;
                    $data->ticket_type = $value->ticket_type;
                    $data->user_ids = $value->user_ids;
                    $data->user_name = $value->user_name;
                    $data->RawNote = $tuipiaolist->RawNote;
                    $this->db->insert('train_tuipiao', $data);
                }
            }

            if ($childlist != null) {
                foreach ($childlist as $k=> $v) {
                    $data= new stdClass();
                    $data->train_order_id = $tuipiaolist->order_id;
                    $data->merchant_order_id = $tuipiaolist->merchant_order_id;
                    $data->ids_type = $v->ids_type;
                    $data->ticket_type = $v->ticket_type;
                    $data->user_ids = $v->user_ids;
                    $data->user_name = $v->user_name;
                    $data->RawNote = $tuipiaolist->RawNote;
                    $this->db->insert('train_tuipiao', $data);
                }
            }

			$this->db->update('train_order',array('status'=>3),array('order_id'=>$tuipiaolist->order_id));
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                echo $callback . "(" . json_encode($data) . ")";
            }
            else
            {
                $this->db->trans_commit();
                echo $callback . "(false)";
            }
        }

        public function ordertuipiaotest()
        {

		    $callback = $this->input->get('callback');
            $str  = '{"order_id":"EXHC161108092618608","merchant_order_id":"1478568221","RawNote":"","adultlist":[{"bx":"1"
,"bx_code":"","enter_year":"","ids_type":"2","preference_from_station_code":"","preference_from_station_name"
:"","preference_to_station_code":"","preference_to_station_name":"","province_code":"","province_name"
:"","school_code":"","school_name":"","school_system":"","student_no":"","ticket_type":"0","user_ids"
:"41048219900520113X","user_name":"高晓凯","chk":true,"identityName":"二代身份证","$$hashKey":"object:11"}],"childlist"
:[]}';
            $str = json_decode($str);
            var_dump($str);
            $adultlist = $str->adultlist;
            $childlist = $str->childlist;
            $this->db->trans_start();
            if ($adultlist != null) {
                foreach ($adultlist as $key => $value) {
                    $data= new stdClass();
                    $data->train_order_id = $str->order_id;
                    $data->merchant_order_id = $str->merchant_order_id;
                    $data->ids_type = $value->ids_type;
                    $data->ticket_type = $value->ticket_type;
                    $data->user_ids = $value->user_ids;
                    $data->user_name = $value->user_name;
                    $data->RawNote = $str->RawNote;
                    $this->db->insert('train_tuipiao', $data);
                }
            }

            if ($childlist != null) {
                foreach ($childlist as $k=> $v) {
                    $data= new stdClass();
                    $data->train_order_id = $str->order_id;
                    $data->merchant_order_id = $str->merchant_order_id;
                    $data->ids_type = $v->ids_type;
                    $data->ticket_type = $v->ticket_type;
                    $data->user_ids = $v->user_ids;
                    $data->user_name = $v->user_name;
                    $data->RawNote = $str->RawNote;
                    $this->db->insert('train_tuipiao', $data);
                }
            }


            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                echo $callback . "(" . json_encode($data) . ")";
            }
            else
            {
                $this->db->trans_commit();
                echo $callback . "(false)";
            }
        }

}