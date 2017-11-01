<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 用户地址
 */
class myonghudizhi extends CI_Model {

    /**
     * 保存或者更改
     */
    public function UpdateSave($yonghuid, $shoujianrenmingzi, $dizhi, $shoujihao) {
        $myid = $this->Exist($yonghuid);
        $obj = array('yonghuid' => $yonghuid,
            'shoujianrenmingzi' => $shoujianrenmingzi,
            'dizhi' => $dizhi,
            'shoujihao' => $shoujihao);
        
        if ($myid > 0) {
            // 存在就修改
            $this->db->update('yonghudizhi', $obj, array('id' => $myid));
        } else {
            // 不存在就添加
            $this->db->insert('yonghudizhi', $obj);
        }
    }

    /**
     * 判断是否存在
     */
    public function Exist($yonghuid) {
        $sql = 'select m.id as id from yonghudizhi as m where m.yonghuid = ?';
        $res = $this->db->query($sql, array($yonghuid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                if (!empty($r->id) && intval($r->id) > 0) {
                    return intval($r->id);
                }
            }
        }

        return 0;
    }

}
