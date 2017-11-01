<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class myonghu extends CI_Model {

    /**
     * 通过 $id 获取用户对象
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.xingming as xingming, m.shoujihaoma as shoujihaoma from yonghu as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->xingming = $r->xingming;
                    $obj->shoujihaoma = $r->shoujihaoma;
                }
            }
        }
        return $obj;
    }
}
