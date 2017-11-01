<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 改签订单
 */
class mgaiqiandingdan extends CI_Model {

    /**
     * 获取改签订单
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.dingdanid as dingdanid, m.chulizhuangtai as chulizhuangtai,
                m.shenqingriqi as shenqingriqi, m.shenqingzhuangtai as shenqingzhuangtai,
                m.shenqinghao as shenqinghao,
                m.caozuoshijian as caozuoshijian,
                m.gaiqianshijian as gaiqianshijian 
                from gaiqiandingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->dingdanid = $r->dingdanid;
                    $obj->chulizhuangtai = $r->chulizhuangtai;
                    $obj->shenqingriqi = $r->shenqingriqi;
                    $obj->shenqingzhuangtai = $r->shenqingzhuangtai;
                    $obj->shenqinghao = $r->shenqinghao;
                    $obj->gaiqianshijian = $r->gaiqianshijian;
                    $obj->caozuoshijian = $r->caozuoshijian;
                    $obj->id = $id;
                }
            }
        }
        return $obj;
    }
    
}
