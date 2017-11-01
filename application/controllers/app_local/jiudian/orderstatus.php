<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class orderstatus extends CI_Controller {

    public function status() {
        $this->load->view('h5/jiudian/templates/tab_account');
    }

    public function statusquery() {
        $this->load->library('quna');
        $orderId = $this->input->get('orderId');
        $sql = "select affiliateConfirmationId from jiudian_chuangjiandingdan where orderId = $orderId";
        $res = $this->db->query($sql);
        $row = $res->row();
        //var_dump($row);
        $affiliateConfirmationId = $row->affiliateConfirmationId;
        $res1 = $this->quna->queryOrderDetail2($orderId, $affiliateConfirmationId);
        $str = json_decode($res1);
        //var_dump($str);
        $orderStatus = $str->result->orders[0]->orderStatus;
        if ($orderStatus == "WAIT_PAY" || $orderStatus == "WAIT_CONFIRM" || $orderStatus == "WAIT_ARRANGE_ROOM" || $orderStatus == "WAIT_SHOW") {
            //echo $orderStatus;
            $callback = $this->input->get('callback');
            echo $callback."('".$orderStatus."')";
        } else {
            echo 'false';
        }
    }



    public function myorder() {
        $userid = $this->input->get('userId');

        $sql = "select m.hotelId as hotelId, m.arrivalDate as arrivalDate,m.departureDate as departureDate,m.totalCost as totalCost,m.orderId as orderId,m.numberOfRooms as numberOfRooms,m.xiadanshijian as xiadanshijian,m.hotelname as hotelname,m.address as address,m.daynum as daynum from jiudian_chuangjiandingdan as m where m.yonghuid = $userid order by xiadanshijian DESC";
		//var_dump($sql);
        $res = $this->db->query($sql);
        $row = $res->result();

        for ($i = 0; $i < count($row); $i++) {
           
            $row[$i]->arrivalDate = substr($row[$i]->arrivalDate, 5, 5);
            $row[$i]->departureDate = substr($row[$i]->departureDate, 5, 5);
            $orderId = $row[$i]->orderId;
            $sql2 = "select dingdanzhuangtai from jiudian_chuangjiandingdan where orderId = $orderId";
            $res2 = $this->db->query($sql2);
            $row2 = $res2->row();
            $time = time();
			$xiadanshijian = strtotime($row[$i]->xiadanshijian);
            $a = ($time - $xiadanshijian)/60;
			if($a > 30 && $row2->dingdanzhuangtai == 1){
            $row[$i]->dingdanzhuangtai = "已取消";
            }
            if($a <30 && $row2->dingdanzhuangtai == 1){
            $row[$i]->dingdanzhuangtai = "未支付";
            }
			if($row2->dingdanzhuangtai == 2){
			$row[$i]->dingdanzhuangtai = "已支付";	
			}
        }

        //echo json_encode($row);
        $callback = $this->input->get('callback');
        echo $callback."('".json_encode($row)."')";
    }

}
