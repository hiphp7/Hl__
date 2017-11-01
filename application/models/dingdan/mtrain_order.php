<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单
 */
class mtrain_order extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.id as id, m.yonghuid as yonghuid, m.order_id as order_id,
                m.merchant_order_id as merchant_order_id, m.arrive_station as arrive_station,
                m.arrive_time as arrive_time
                from train_order as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                return $res->result();
            }
        }
        return $obj;
    }
    
    /**
     * 获取管理员名称
     */
    public function getLastId() {
        $sql = 'select m.id as id from train_order as m order by m.id desc limit 0, 1';
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                return intval($r->id) + 1;
            }
        }
        return 0;
    }
}
