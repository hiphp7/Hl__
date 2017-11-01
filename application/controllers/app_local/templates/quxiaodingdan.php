<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class quxiaodingdan extends CI_Controller {
      public function cancel() {
        $this->load->view('h5/jiudian/templates/qxdd');
      }
      public function cancelOrder(){
       $this->load->library('quna');
       $orderId = $this->input->post('orderId');
       
       $res = $this->quna->cancelOrder1($orderId);
      
       $str = json_decode($res);
       
       
       if($str->code == 0){       
            $this->db->trans_begin();
            $sql = "update jiudian_chuangjiandingdan  set  dingdanzhuangtai=0   where orderId = $orderId";
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

}