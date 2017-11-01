<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class creatdingdan extends CI_Controller {

    public function query() {
        $this->load->view('h5/jiudian/templates/tjdd');
    }

    public function validateOrder1() {
        $this->load->library('quna');
        $arrivalDate = substr($this->input->post('ruzhuDate'), 0,10);
        //var_dump($arrivalDate);
        $departureDate = substr($this->input->post('lidianDate'),0,10);
        //var_dump($departureDate);
        $hotelId = $this->input->post('hotelId');
        //var_dump($hotelId);
        $ratePlanId = $this->input->post('ratePlanId');
        //var_dump($ratePlanId);
        $numberOfRooms = $this->input->post('numberOfRooms');
        $salePrice = intval($this->input->post('salePrice'));
        $daynum = (strtotime($departureDate)-strtotime($arrivalDate))/60/60/24;
        $totalPrice = $salePrice * intval($numberOfRooms)*$daynum;
        //var_dump($totalPrice);
       
        $roomTypeId = $this->input->post('roomTypeId');
        //var_dump($roomTypeId);

        $latestArrivalTime = $arrivalDate   ;
        //var_dump($latestArrivalTime);
        $mobile = $this->input->post('mobile');
        $contact = $this->input->post('numberofContact');
        $orderrooms = json_decode($contact);
        
        
        
        $name =  urlencode($orderrooms[0]);
        $arr = array();
        for($i = 0;$i<count($orderrooms);$i++){
			$arr[$i]->Customers[0] = new stdClass();
            $arr[$i]->Customers[0]->Name = urlencode($orderrooms[$i]);
        }

        
        
//        $arrivalDate = '2016-12-27';
//        $departureDate = '2016-12-28';
//        $hotelId = '571821570';
//        $ratePlanId = '41665';
//        $totalPrice = '550';
//        $numberOfRooms = '1';
//        $sql = "SELECT arrivalEndTime FROM jiudian_yudingguize WHERE jiudianbianma = $hotelId";
//        $res =$this->db->query($sql);
//        $latestArrivalTime = $arrivalDate.$res->row()->arrivalEndTime;
//        var_dump($latestArrivalTime);
//        exit();



        $res = $this->quna->validateOrder($arrivalDate, $departureDate, $latestArrivalTime, $hotelId, $ratePlanId, $totalPrice, $numberOfRooms);
       // var_dump($res);
        $str = json_decode($res);
        $a = $str->result->resultCode;
        //var_dump($a);
        //exit();
        //返回结果ok：正常预定,    
        if ($a == "OK") {
            $affiliateConfirmationId = 'hl'.time();
            $paymentType = 'Prepay';
            $totalCost = $totalPrice;
            $currencyCode = 'RMB';
            //$contact = new stdClass();
            //$contact->name = $name;
           // $contact->mobile = $mobile;
            
            //arr[0]->Customers[0]->Name = $name;
            //$orderRooms =$arr;
            $res1 = $this->quna->createOrder1($affiliateConfirmationId,$hotelId, $departureDate, '90000141','50000039', $arrivalDate, $numberOfRooms,'',$latestArrivalTime,$currencyCode,'',$name,$mobile,$arr,'','','',$paymentType,$totalCost,'','','','','');
            $str1 = json_decode($res1);
     
            if($str1->code == 0){
//                echo 111;
//                exit();
            $this->db->trans_begin();
            $riqi = date('Y-m-d H:i:s', time());
            $orderId = $str1->result->orderId;
            $arr1 = array(
                'affiliateConfirmationId' => $affiliateConfirmationId,
                'hotelId' => $hotelId,
                'roomTypeId' => $roomTypeId,
                'ratePlanId' => $ratePlanId,
                'arrivalDate' => $arrivalDate,
                'departureDate' => $departureDate,
                'numberOfRooms' =>$numberOfRooms,
                'numberOfCustomers' => $numberOfRooms,
                'latestArrivalTimedatetime' =>$arrivalDate,
                'currencyCode' => $currencyCode,
                'paymentType' => $paymentType,
                'dingdanzhuangtai' => 1,
                'xiadanshijian' => $riqi,
                'orderId' => $orderId,
                'totalCost' => $totalPrice
            );
            $this->db->insert('jiudian_chuangjiandingdan', $arr1);
            $sql = "select id from jiudian_chuangjiandingdan where orderId = $orderId";
            $res = $this->db->query($sql);
            $row = $res->row();

            $arr2 = array(
                'chuangjiandingdanid' => $row->id,
                'name' => urldecode($name),
                'Mobile' => $mobile
            );
            $this->db->insert('jiudian_contact', $arr2);
            for($j =0;$j<count($arr);$j++){
            $arr3 = array(
                'chuangjiandingdanid' => $row->id,
                'name' => urldecode($arr[$j]->Customers[0]->Name)
            );
            $this->db->insert('jiudian_orderrooms', $arr3);
            };
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo 'false';
            } else {
                $this->db->trans_commit();
                echo $orderId;
            }
            }else{
                echo 'false';
            }
        }
    }
    public function totalCost(){
        $arrivalDate = $this->input->post('ruzhuDate');
        $departureDate = $this->input->post('lidianDate');
        $numberOfRooms = $this->input->post('numberOfRooms');
        $salePrice = intval($this->input->post('salePrice'));
        $daynum = (strtotime($departureDate)-strtotime($arrivalDate))/60/60/24;
        $totalPrice = $salePrice * intval($numberOfRooms)*$daynum;
        echo $totalPrice;
    }

}
