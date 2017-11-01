<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 联系地址管理
 */
class address extends CI_Controller {
    

    public function select() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $yonghuid = $this->input->get('yonghuid');
        $sql = "select m.id as id, m.shoujianrenmingzi as shoujianrenmingzi, m.shoujihao as shoujihao, m.dizhi as dizhi from yonghudizhi as m where yonghuid = ?";
        $query = $this->db->query($sql, array($yonghuid));
        $address = $query->result();

        if (!empty($address)) {
            foreach ($address as $k => $row) {
                $row->chk = false;
                $row->isNew = false;
                $row->isDelte = false;
                $row->isEdit = false;
            }
			echo $callback . "(" . json_encode($address) . ")";
            die();
        } else {
			echo $callback . "(false)";
        }
    }

    public function trainSelect() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $yonghuid = $this->input->get('yonghuid');
        $sql = "select m.id as id, m.yonghuid as yonghuid, m.bx_invoice_receiver as bx_invoice_receiver, m.bx_invoice_phone as bx_invoice_phone, m.bx_invoice_address as bx_invoice_address,m.bx_invoice_zipcode as bx_invoice_zipcode from train_youdidizhi as m where yonghuid = ?";
        $query = $this->db->query($sql, array($yonghuid));
        $address = $query->result();

        if (!empty($address)) {
            foreach ($address as $k => $row) {
                $row->chk = false;
                $row->isNew = false;
            }
			echo $callback . "(" . json_encode($address) . ")";
            die();
        } else {
            echo $callback . "(false)";
        }
    }
    public function trainAdd(){
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $webadmin = $this->session->userdata('webadmin');
        $address = json_decode ( $this->input->get('address'));
        $data = new stdClass();
        $data->yonghuid = $address->yonghuid;
        $data->bx_invoice_receiver = $address->bx_invoice_receiver;
        $data->bx_invoice_phone = $address->bx_invoice_phone;
        $data->bx_invoice_address = $address->bx_invoice_address;
        $data->bx_invoice_zipcode = $address->bx_invoice_zipcode;
        $id = $address->id;
        if($id > 0){
            $this->db->update('train_youdidizhi', $data, array('id' => $id));
            
			echo $callback . "(" . json_encode($this->db->affected_rows()) . ")";
            die();

        } else {
            $this->db->insert('train_youdidizhi', $data);
			echo $callback . "(" . $this->db->insert_id() . ")";
            die();                 
        }
    }

}

