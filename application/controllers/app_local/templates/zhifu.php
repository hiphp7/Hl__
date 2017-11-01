<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class zhifu extends CI_Controller {
      public function pay() {
        $this->load->view('h5/jiudian/templates/zxf');
    }
   
    public function payOrder(){
       $this->load->library('quna');
       $orderId = $this->input->post('orderid');
	   $sql = "select orderId from jiudian_chuangjiandingdan where affiliateConfirmationId = $orderId ";
	   $res = $this->db->query($sql);
	   $row = $res->row();
	   $qunaorderid = $row->orderId;
       $payAmount =2500;
       $res = $this->quna->payOrder1($qunaorderid, $payAmount);
      
       $str = json_decode($res);
       //var_dump($str);        
       //exit();
       if($str->code == 0){       
            $this->db->trans_begin();
            $sql = "update jiudian_chuangjiandingdan  set  dingdanzhuangtai=2   where orderId =$qunaorderid";
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
	   $orderid = $this->input->get('out_trade_no');
       $fukuanshijian = $this->input->get('fukuanshijian');
	   $totalprice = $this->input->get('total_fee');
       $sql1 = "insert jiudian_chuangjiandingdan(fukuanshijian) values($fukuanshijian) where affiliateConfirmationId = $orderId"；
	   $res = $this->db->query($sql1);
	   $sql = "select orderId from jiudian_chuangjiandingdan where affiliateConfirmationId = $orderId ";
	   $res = $this->db->query($sql);
	   $row = $res->row();
	   $qunaorderid = $row->orderId;
       $payAmount =$totalprice ;
       $res = $this->quna->payOrder1($qunaorderid, $payAmount);
      
       $str = json_decode($res);
       //var_dump($str);        
       //exit();
       if($str->code == 0){       
            $this->db->trans_begin();
            $sql = "update jiudian_chuangjiandingdan  set  dingdanzhuangtai=2   where orderId =$qunaorderid";
            $res = $this->db->query($sql);    
                    if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
				 $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
            $get_data = array('transaction_id' => '', 'out_trade_no' => $orderid, 'total_fee' => $totalprice, 'refund_fee' => $totalprice);
            $resutl = $this->request_get($url, $get_data);   
                echo 'false';
            } else {
                $this->db->trans_commit();
                echo 'true';
            }
      }else{
          echo 'false';
      }
        
     
   }
}