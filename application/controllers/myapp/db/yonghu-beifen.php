<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 联系人管理
 */
class yonghu extends CI_Controller {

    // 以用户id查询
    public public function find() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $id = $this->input->get('yonghuid');
        $query = $this->db->get_where('yonghu', array('id' => $id));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                echo $callback . "(" . json_encode($row) . ")"
            }
        }
    }

    public function update() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $yonghu = json_decode($this->input->get('yonghu'));
        $data = new stdClass();
        $data->xingming = $yonghu->xingming;
        $data->shoujihaoma = $yonghu->shoujihaoma;
        $id = $yonghu->id;
        $this->db->update('yonghu', $data, array('id' => $id));
		echo $callback . "(" . $this->db->affected_rows(). ")";
    }
    
    // 发短信
    public function duanxin() {
		$callback = $this->input->get('callback');
        date_default_timezone_set("Asia/Shanghai");
        $this->load->library('code');
        $code = rand() % 100000;
        $name = $this->input->get('name');
        $tel = $this->input->get('tel');
        $this->load->library('myalidayu');
        $result = $this->myalidayu->YanZhengMa($code, $name, $tel);
        if ($result == true) {
            $this->load->library('session');
            $this->session->set_userdata('yanzheng', $code);
        }
       echo $callback . "(" . $result . ")";
    }
    
    // 验证短信
    public function yanzheng() {
		$callback = $this->input->get('callback');
        $this->load->library('session');
        date_default_timezone_set("Asia/Shanghai");
        $code1 = $this->session->userdata('yanzheng');
        $code2 = $this->input->get('code');
        if ($code1 == $code2) {
            $this->session->unset_userdata('yanzheng');
            echo $callback . "(" . json_encode($data) . ")";
        } else {
            echo $callback . "(false)";
			
        }
    }

    //三方注册
    public function sanfangzhuce() {
		$callback = $this->input->get('callback');
        $yonghu = json_decode($this->input->get('yonghu'));
        $sf = $this->input->get('sf');
        // 判断是否存在      
        $name = $yonghu->xingming;
        $tel = $yonghu->shoujihaoma;
        $sql ="select m.id as id, m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where xingming = ? and shoujihaoma = ? and zhucelaiyuan = ?";
        $re = $this->db->query($sql, array($name, $tel, $sf));
        $res = $re->row();
        if (!empty($res)) {
            echo $callback . "(" . json_encode($res) . ")";
            die();
        }
        $data = new stdClass();
        $data->xingming = $yonghu->xingming;
        $data->shoujihaoma = $yonghu->shoujihaoma;
        $data->zhanghu = $yonghu->shoujihaoma;
        $data->mima = $yonghu->shoujihaoma;
        $data->zhuceriqi = date("Y-m-d H:i:s", time());
        $data->zhucelaiyuan = $sf;
        $this->db->insert('yonghu', $data);
        $id = $this->db->insert_id();
    
        if ($id > 0) {
            $sql ="select m.id as id, m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where id = ?";
            $re = $this->db->query($sql, array($id));
            $rel = $re->row();
            if (!empty($rel)) {
                echo $callback . "(" . json_encode($data) . ")";
                return;
            }
        } else {
            echo $callback . "(false)";
			
        }
    }

}