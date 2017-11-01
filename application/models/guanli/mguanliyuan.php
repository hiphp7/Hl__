<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 管理员
 */
class mguanliyuan extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getName($id = 0) {
        $name = '';
        if ($id != 0) {
            $sql = 'select m.xingming as xingming from guanliyuan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $name = $r->xingming;
                }
            }
        }
        return $name;
    }
}
