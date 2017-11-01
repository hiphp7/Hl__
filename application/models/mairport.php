<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 机场 model 类
 */
class mairport extends CI_Model {

    /**
     * 通过 $id 获取用户对象
     */
    public function getObj($Airport = '') {
        $obj = new stdClass();
        if ($Airport != '') {
            $sql = 'select m.City as City from airport as m where m.Airport = ? or m.Short = ?';
            $res = $this->db->query($sql, array($Airport, $Airport));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->City = $r->City;
                }
            }
        }
        return $obj;
    }
    
}
