<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class orderstatus extends CI_Controller {
      public function status() {
        $this->load->view('h5/jiudian/templates/tab_account');
    }
    public function statusquery(){
        $this->load->library('quna');
        $orderId = $this->input->post('orderId');
        $sql = "select affiliateConfirmationId from jiudian_chuangjiandingdan where orderId = $orderId";
        $res = $this->db->query($sql);
        $row = $res->row();
        //var_dump($row);
        $affiliateConfirmationId = $row-> affiliateConfirmationId;
        $res1 = $this->quna->queryOrderDetail2($orderId,$affiliateConfirmationId);
        $str = json_decode($res1);
       //var_dump($str);
        $orderStatus = $str->result->orders[0]->orderStatus;
        if($orderStatus == "WAIT_PAY" || $orderStatus == "WAIT_CONFIRM" || $orderStatus == "WAIT_ARRANGE_ROOM" || $orderStatus == "WAIT_SHOW"){
            echo $orderStatus;         
        }  else {
            echo 'false';   
        }
        
    }
    public function dingdanquery(){
        $orderId = $this->input->post('orderId');
        $sql = "select dingdanzhuangtai from jiudian_chuangjiandingdan where orderId = $orderId";
        $res = $this->db->query($sql);
        $row = $res->row();
        $dingdanzhuangtai = $row->dingdanzhuangtai;
        if($dingdanzhuangtai == 0){
            echo "已取消";
        }
        if($dingdanzhuangtai == 1){
            echo "未支付";
        }
        if($dingdanzhuangtai == 2){
            echo "已支付";
        }
    }
}