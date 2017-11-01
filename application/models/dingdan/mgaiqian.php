<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 改签
 */
class mgaiqian extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $ar = array();
        if ($id != 0) {
            $sql = 'select m.shenqinghao as shenqinghao, m.dingdanid as dingdanid,
                m.hangchengid as hangchengid, 
                m.shenqingriqi as shenqingriqi,
                m.hangchenglvkeid as hangchenglvkeid,
                m.shenqingzhuangtai as shenqingzhuangtai, m.suodan as suodan 
                from gaiqian as m, gaiqiandingdan as q where q.id = ? and q.dingdanid = m.dingdanid and q.chulizhuangtai = m.chulizhuangtai';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj = new stdClass();
                    $obj->shenqinghao = $r->shenqinghao;
                    $obj->dingdanid = $r->dingdanid;
                    $obj->hangchengid = $r->hangchengid;
                    $obj->hangchenglvkeid = $r->hangchenglvkeid;
                    $obj->shenqingzhuangtai = $r->shenqingzhuangtai;
                    $obj->suodan = $r->suodan;
                    $obj->shenqingriqi = $r->shenqingriqi;
                    $ar[] = $obj;
                }
            }
        }
        return $ar;
    }

    /**
     * 通过 参数查询
     * 查询返回 id 、 航程 id 、订单 id
     */
    public function getIdByPs() {
        $result = '';

        $sql = 'select distinct m.dingdanid as dingdanid from gaiqian as m where m.shenqingzhuangtai = 2';
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            $result = '(';
            $db_reslt = $res->result();
            $index = 0;
            foreach ($db_reslt as $r) {
                if ($index == count($db_reslt) - 1) {
                    $result = $result . $r->dingdanid;
                } else {
                    $result = $result . $r->dingdanid . ',';
                }
                $index++;
            }
            $result = $result . ')';
        }
        return $result;
    }

    public function getgaiqianxiangqing($gaiqianid) {
        $obj = new stdClass();
        if ($gaiqianid != 0) {
            $sql = 'select m.qifeishijian as qifeishijian, 
                m.hangbanriqi as hangbanriqi,
                m.didashijian as didashijian, 
                m.hangbanhao as hangbanhao,
                m.chengrencangwei as chengrencangwei,
                m.chengrenshouxufei as chengrenshouxufei, 
                m.chengrenshengcangfei as chengrenshengcangfei, 
                m.ertongshouxufei as ertongshouxufei,
                m.ertongcangwei as ertongcangwei,
                m.ertongshengcangfei as ertongshengcangfei 
                from gaiqianxiangqing as m where m.gaiqianid = ?';
            $res = $this->db->query($sql, array($gaiqianid));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->qifeishijian = $r->qifeishijian;
                    $obj->hangbanriqi = $r->hangbanriqi;
                    $obj->didashijian = $r->didashijian;
                    $obj->hangbanhao = $r->hangbanhao;
                    $obj->chengrencangwei = $r->chengrencangwei;
                    $obj->chengrenshouxufei = $r->chengrenshouxufei;
                    $obj->chengrenshengcangfei = $r->chengrenshengcangfei;
                    $obj->ertongcangwei = $r->ertongcangwei;
                    $obj->ertongshouxufei = $r->ertongshouxufei;
                    $obj->ertongshengcangfei = $r->ertongshengcangfei;
                }
            }
        }
        return $obj;
    }

    /**
     * 获取改签 内容，在改签申请中用到
     */
    public function getgq($dingdanid, $chulizhuangtai) {
        $obj = new stdClass();
        $sql = 'select 
                m.gaiqianshijian as gaiqianshijian,
                m.shenqingriqi as shenqingriqi,
                m.shifoushengcang as shifoushengcang 
                from gaiqian as m where m.dingdanid = ? and m.chulizhuangtai = ?';
        $res = $this->db->query($sql, array($dingdanid, $chulizhuangtai));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->shenqingriqi = $r->shenqingriqi;
                $obj->shifoushengcang = $r->shifoushengcang;
                $obj->gaiqianshijian = $r->gaiqianshijian;
                break;
            }
        }
        return $obj;
    }
    
    /**
     * 获取改签 单中的成人儿童，在改签申请中用到
     */
    public function getgq_chengren_ertong($dingdanid, $chulizhuangtai) {
        $obj = new stdClass();
        $cr = 0;
        $et = 0;
        $sql = 'select h.shifouertong as shifouertong from gaiqian as m, hangchenglvke as h 
            where m.hangchenglvkeid = h.id and m.dingdanid = ? and m.chulizhuangtai = ?';
        $res = $this->db->query($sql, array($dingdanid, $chulizhuangtai));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                if($r->shifouertong == '1')
                {
                    $et = intval($et) + 1;
                }
                
                if($r->shifouertong == '0')
                {
                    $cr = intval($cr) + 1;
                }
            }
        }
        $obj->cr = $cr;
        $obj->et = $et;
        return $obj;
    }

}
