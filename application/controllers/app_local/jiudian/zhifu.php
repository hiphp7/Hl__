<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class zhifu extends CI_Controller {
      public function pay() {
        $this->load->view('h5/jiudian/templates/zxf');
    }
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
    public function payOrder(){
       $this->load->library('quna');
       $orderId = $this->input->post('orderId');
       $payAmount =2500;
       $res = $this->quna->payOrder1($orderId, $payAmount);
      
       $str = json_decode($res);
       //var_dump($str);        
       //exit();
       if($str->code == 0){       
            $this->db->trans_begin();
            $sql = "update jiudian_chuangjiandingdan  set  dingdanzhuangtai=2   where orderId = $orderId";
            $res = $this->db->query($sql);    
                    if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo 'false';
            } else {
                $this->db->trans_commit();
                echo 'true';
            }
      }else{
          echo 'false';
      }
    
   }
    public function weixinpay(){
	   $this->db->trans_begin();
        $this->load->library('quna');
		$this->load->library('javageo');

        $orderId = $this->input->get('out_trade_no');
        $fukuanshijian = $this->input->get('fukuanshijian');
	    $y = substr($fukuanshijian, 0, 4);
	    $m = substr($fukuanshijian, 4, 2);
	    $d = substr($fukuanshijian, 6, 2);
	    $h = substr($fukuanshijian, 8, 2);
	    $i = substr($fukuanshijian, 10, 2);
	    $s = substr($fukuanshijian, 12, 2);
	    $fukuanshijianall = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i . ':' . $s;
        $totalprice = $this->input->get('total_fee');
        $sql1 = "update jiudian_chuangjiandingdan set fukuanshijian = '$fukuanshijianall' where affiliateConfirmationId = '$orderId'";
        $res1 = $this->db->query($sql1);
        $sql3 = "select hotelId,roomTypeId,orderId,ratePlanId,numberOfRooms,numberOfCustomers,arrivalDate,departureDate from jiudian_chuangjiandingdan where affiliateConfirmationId = '$orderId' ";
        $res3 = $this->db->query($sql3);
        $row = $res3->row();
		//插入微信支付过道费
		$sql6 = "update jiudian_chuangjiandingdan  set  zhifushouxufeilv=0.006   where orderId = $qunaorderid";			
        $res6 = $this->db->query($sql6); 
		//实际收款
		$shijishoukuan = $totalprice*0.006;
		$sql7 = "update jiudian_chuangjiandingdan  set  shijizhifuzonge=$shijishoukuan   where orderId = $qunaorderid";			
        $res7 = $this->db->query($sql7);
		//付款方式
		$sql8 = "update jiudian_chuangjiandingdan  set  zhifufangshi='微信支付'   where orderId = $qunaorderid";			
        $res8 = $this->db->query($sql8);
		$arrivalDate = substr($row->arrivalDate,0,10);
        $departureDate = substr($row->departureDate,0,10);
		$hotelId = $row->hotelId;
		$roomTypeId = $row->roomTypeId;
		$ratePlanId = $row->ratePlanId;
		$res4 = $this->quna->queryRatePlan($arrivalDate,$departureDate,$hotelId,$roomTypeId,$ratePlanId);
		$str = json_decode($res4);
		$nightlyRates = $str->result->hotels[0]->rooms[0]->ratePlans[0]->nightlyRates;
		 $payfee = 0;
        for($i = 0;$i < count($nightlyRates) ;$i++){
            $payfee+= $nightlyRates[$i]->cost;
        }
        $qunaorderid = $row->orderId;
        $payAmount = $row->numberOfRooms * $payfee;
        $res = $this->quna->payOrder1($qunaorderid, $payAmount);
        $str = json_decode($res);
        if ($str->code == 0) {
			//修改订单状态
            $sql2 = "update jiudian_chuangjiandingdan  set  dingdanzhuangtai=2   where orderId = $qunaorderid";			
            $res2 = $this->db->query($sql2);  
            //插入采购金额			
			$sql5 = "update jiudian_chuangjiandingdan set qunakoukuanjine = $payAmount where orderId = $qunaorderid";
			$res5 = $this->db->query($sql5); 
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
                $get_data = array('transaction_id' => '', 'out_trade_no' => $orderId, 'total_fee' => $totalprice, 'refund_fee' => $totalprice);
                //$resutl = $this->request_get($url, $get_data);   
                echo 'false1';
            } else {
                $this->db->trans_commit();
                echo 'true';
            }
        } else {
            echo 'false2';
        }
    }
}