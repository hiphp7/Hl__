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
        $departureDate = substr($this->input->post('lidianDate'),0,10);
		$daynum = (strtotime($this->input->post('lidianDate')) - strtotime($this->input->post('ruzhuDate'))) / 60 / 60 / 24;
        $hotelId = $this->input->post('hotelId');
        $ratePlanId = $this->input->post('ratePlanId');
		$roomTypeId = $this->input->post('roomTypeId');	
		$res4 = $this->quna->queryRatePlan($arrivalDate,$departureDate,$hotelId,$roomTypeId,$ratePlanId);
		//var_dump($res4);
		$str3 = json_decode($res4);
		if($str3->code == 0){
		$nightlyRates = $str3->result->hotels[0]->rooms[0]->ratePlans[0]->nightlyRates;
		$payfee = 0;
        for($i = 0;$i < count($nightlyRates) ;$i++){
            $payfee+= $nightlyRates[$i]->cost;
        }
        $numberOfRooms = $this->input->post('numberOfRooms');
        $totalPrice = $payfee * intval($numberOfRooms);
        $costdetail = $this->input->post('totalPrice');
        $roomTypeId = $this->input->post('roomTypeId');
        $latestArrivalTime = $arrivalDate   ;
        $mobile = $this->input->post('mobile');
        $contact = $this->input->post('numberofContact');
        $orderrooms = json_decode($contact);
        $name =  urlencode($orderrooms[0]);
        $arr = array();
        for($i = 0;$i<count($orderrooms);$i++){
			$arr[$i]->Customers[0] = new stdClass();
            $arr[$i]->Customers[0]->Name = urlencode($orderrooms[$i]);
        }
        $res = $this->quna->validateOrder($arrivalDate, $departureDate, $latestArrivalTime, $hotelId, $ratePlanId, $totalPrice, $numberOfRooms);
        $str = json_decode($res);
        $a = $str->result->resultCode;
        //返回结果ok：正常预定,    
        if ($a == "OK") {
            $affiliateConfirmationId = 'hl'.time();
            $paymentType = 'Prepay';
            $totalCost = $totalPrice;
            $currencyCode = 'RMB';
            $res1 = $this->quna->createOrder1($affiliateConfirmationId,$hotelId, $departureDate, $roomTypeId,$ratePlanId, $arrivalDate, $numberOfRooms,'',$latestArrivalTime,$currencyCode,'',$name,$mobile,$arr,'','','',$paymentType,$totalCost,'','','','','');
            $str1 = json_decode($res1);    
            if($str1->code == 0){
            $this->db->trans_begin();
            $riqi = date('Y-m-d H:i:s', time());
            $orderId = $str1->result->orderId;
			if($this->input->post('isMail') == 'true'){
                $a = '是';
				$fangfei = $costdetail - 20;
				$fapiaopeisongfei = 20;
            }else{
                $a = '否';
				$fangfei = $costdetail;
				$fapiaopeisongfei = 0;
            }
			
			$sql_zhanghao = "select zhanghu,shanghuhao from yonghu where id = ?";
			$res_zhanghao = $this->db->query($sql_zhanghao,$this->input->post('userId'));
			$row_zhanghao = $res_zhanghao->row();
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
                'totalCost' => $costdetail,
                'yonghuid' => $this->input->post('userId'),
				'ismail' => $a,
				'dengluzhanghao'=>$row_zhanghao->zhanghu,
				'shanghuhao'=>$row_zhanghao->shanghuhao,
				'caigouqudao'=>'去哪',
				'dingdanlaiyuan'=>'app',
				'fangfei'=>$fangfei,
				'daynum'=>$daynum,
				'fapiaopeisongfei'=>$fapiaopeisongfei,
				'hotelname'=>$this->input->post('hotelname'),
				'roomtype'=>$this->input->post('roomtype'),
				'address'=>$this->input->post('address')
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
			if($this->input->post('isMail') == 'true'){
                $arr4 = array(
                    'userId' =>  $this->input->post('userId'),
                    'bibidingdanbianhao'=> $affiliateConfirmationId,
                    'fapiaoleixing'=> $this->input->post('taitouleixing'),
                    'xingming'=> $this->input->post('shoujianrenmingzi'),
                    'address'=> $this->input->post('shoujiandizhi'),
                    'mobile'=>  $this->input->post('shoujianrenshouji'),
                    'fapiaotaitou'=>$this->input->post('taitoumingcheng'),
                    'shuihao'=>$this->input->post('shuihao')
                );
                $this->db->insert('jiudian_fapiao',$arr4);  
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo 'false';
            } else {
                $this->db->trans_commit();
				$data = new stdClass();
				$data->orderId =  $orderId;
				$data->arrivalDate =  $arrivalDate;
				$data->departureDate =  $departureDate;
				echo json_encode($data);
            }
            }else{
                echo 'false';
            }
        }
		}else{
			echo 'false';
		}
    }

}
