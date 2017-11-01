<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 三方公司
 */
class msanfanggongsi extends CI_Model {

    /**
     * 获取三方公司
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.gongsimingcheng as gongsimingcheng from sanfanggongsi as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->gongsimingcheng = $r->gongsimingcheng;
                }
            }
        }
        return $obj;
    }
    
    /**
     * 获取管理员名称
     */
    public function getMyObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $myconfig_dingdanzhuangtai = $this->config->item("订单状态");
            $myconfig_zhifufangshi = $this->config->item("支付方式");
            $myconfig_chupiaozhuangtai = $this->config->item("出票状态");
            
            $sql = 'select m.dingdanhao as dingdanhao, m.sanfanggongsi as sanfanggongsi,
                m.dingdanleibie as dingdanleibie,
                m.yonghuid as yonghuid,
                m.chupiaobianma as chupiaobianma,
                m.zhifufangshi as zhifufangshi,
                m.dingdanzonge as dingdanzonge,
                m.chupiaozhuangtai as chupiaozhuangtai,
                m.lianxiren as lianxiren,
                m.lianxirendianhua as lianxirendianhua,
                m.dingdanzhuangtai as dingdanzhuangtai,
                m.fukuanshijian as fukuanshijian,
                m.chulishijian as chulishijian 
                from dingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->dingdanhao = $r->dingdanhao;
                    $obj->chupiaozhuangtai = $myconfig_chupiaozhuangtai[$r->chupiaozhuangtai];
                }
            }
        }
        return $obj;
    }
}
