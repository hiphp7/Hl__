<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 退票订单
 */
class mtuipiaodingdan extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.dingdanid as dingdanid, m.chulizhuangtai as chulizhuangtai,
                m.tuipiaojine as tuipiaojine, m.tuipiaojine_et as tuipiaojine_et,
                m.tuipiaojine_cr as tuipiaojine_cr,
                m.shenqingriqi as shenqingriqi, m.tuipiaoleixing as tuipiaoleixing 
                from tuipiaodingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->dingdanid = $r->dingdanid;
                    $obj->chulizhuangtai = $r->chulizhuangtai;
                    $obj->shenqingriqi = $r->shenqingriqi;
                    $obj->tuipiaoleixing = $r->tuipiaoleixing;
                    $obj->dingdanid = $r->dingdanid;
                    $obj->tuipiaojine = $r->tuipiaojine;
                    $obj->tuipiaojine_et = $r->tuipiaojine_et;
                    $obj->tuipiaojine_cr = $r->tuipiaojine_cr;
                    $obj->id = $id;
                }
            }
        }
        return $obj;
    }
    
}
