<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jiudian_orderquery extends CI_Controller {
     public function zxf() {
        $this->load->view('h5/jiudian/templates/jiudian_query/zxf');
    }

    public function ddxq() {
        $this->load->view('h5/jiudian/templates/jiudian_query/ddxq');
    }
    public function orderinfo(){
		$this->load->library('quna');
        $orderId = $this->input->get('orderId');
        $sql_order = "SELECT id,hotelId,arrivalDate,departureDate,numberOfRooms,roomTypeId,ratePlanId,affiliateConfirmationId,xiadanshijian,totalCost,orderId,ismail,hotelname,address,roomtype,daynum FROM jiudian_chuangjiandingdan where orderId = $orderId";
		//var_dump($sql_order);
        $res_order = $this->db->query($sql_order);
        $rows_order = $res_order->result();
		//var_dump($rows_order);
        $ruzhuriqi = $rows_order[0]->arrivalDate;
        $lidianriqi = $rows_order[0]->departureDate;
		$res1 = $this->quna->queryOrderDetail2($orderId, $rows_order[0]->affiliateConfirmationId);
        $str = json_decode($res1);
        //var_dump($str);
        $orderStatus = $str->result->orders[0]->orderStatus;
        if($orderStatus == "WAIT_PAY"){
            $rows_order[0]->orderStatus = '等待支付';
        }
        if($orderStatus == "WAIT_CONFIRM"){
            $rows_order[0]->orderStatus = '等待确认';
        }
        if($orderStatus == "WAIT_ARRANGE_ROOM"){
            $rows_order[0]->orderStatus = '等待安排房间';
        }
        if($orderStatus == "WAIT_SHOW"){
            $rows_order[0]->orderStatus = '等待入住';
        }
        if($orderStatus == "CHECKED_IN"){
            $rows_order[0]->orderStatus = '已入住';
        }
        if($orderStatus == "CHECKED_OUT"){
            $rows_order[0]->orderStatus = '已离店';
        }
        if($orderStatus == "RESERVE_CANCELED"){
            $rows_order[0]->orderStatus = '预定取消';
        }
        if($orderStatus == "RESERVE_FAILED"){
            $rows_order[0]->orderStatus = '预定失败';
        }
        if($orderStatus == "NO_SHOW"){
            $rows_order[0]->orderStatus = '未入住';
        }
		if($rows_order[0]->ismail == "是"){
            $rows_order[0]->fangjianfei = $rows_order[0]->totalCost - 20;
        }else{
			$rows_order[0]->fangjianfei = $rows_order[0]->totalCost;
        }
		$roomTypeId = $rows_order[0]->roomTypeId;
        $ratePlanId = $rows_order[0]->ratePlanId;
        $hotelId = $rows_order[0]->hotelId;
        $today = date("Y-m-d",strtotime("+2 day"));
        $mingtian = date("Y-m-d",strtotime("+3 day"));
		$res2 = $this->quna->queryRatePlan($today,$mingtian,$hotelId,$roomTypeId,$ratePlanId) ;
		//var_dump($res2);
		$str1 = json_decode($res2);
		$roomtype = $str1->result->hotels[0]->rooms[0]->name;
		$bedType = $str1->result->hotels[0]->rooms[0]->ratePlans[0]->bedType;
		if($bedType == "BIG"){
			$bedType = '大床';
		}
		if($bedType == "DOUBLE"){
			$bedType = '双床';
		}
		if($bedType == "BIG_DOUBLE"){
			$bedType = '大/双床';
		}else{
			$bedType = '其他';
		}
        $rows_order[0]->arrivalDate= substr($rows_order[0]->arrivalDate,5,5);
        $rows_order[0]->departureDate = substr($rows_order[0]->departureDate,5,5);
        $rows_order[0]->xiadanshijian = substr($rows_order[0]->xiadanshijian,5,5);
        $chuangjiandingdanid =$rows_order[0]->id;
        $sql_contact = "SELECT name,mobile FROM jiudian_contact where chuangjiandingdanid = $chuangjiandingdanid";
        $res_contact = $this->db->query($sql_contact);
        $rows_contact = $res_contact->result();       
        $rows_order[0]->name =  $rows_contact[0]->name;
        $rows_order[0]->mobile =  $rows_contact[0]->mobile;
        $rows_order[0]->bedtype = $bedType;
        //echo json_encode($rows_order);
        $callback = $this->input->get('callback');
        echo $callback."('".json_encode($rows_order)."')";
       
    }
}

