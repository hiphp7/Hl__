<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 保险订单
 */
class mbaoxiandingdan extends CI_Model {

    /**
     * 获取保险订单
     */
    public function getObj($dingdanid) {

        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");

        $obj = new stdClass();
        $lst = array();
        $sql = 'select m.id as id, m.baoxianchanpinid as baoxianchanpinid,
                m.hangchenglvkeid as hangchenglvkeid, m.dingdanzhuangtai as dingdanzhuangtai,
                m.dingdanzongjia as dingdanzongjia, m.baoxianleixing as baoxianleixing,
                m.baoxiandingdanhao as baoxiandingdanhao,
                m.waicaipingtai as waicaipingtai, 
                m.waicaidingdanbianhao as waicaidingdanbianhao, 
                m.waicaizongjia as waicaizongjia,
                m.waicaibeizhu as waicaibeizhu,
                m.baodanhao as baodanhao,
                m.baodanzhuangtai as baodanzhuangtai, 
                m.chuangjianshijian as chuangjianshijian,
                m.shengxiaoriqi as shengxiaoriqi,
                m.beizhu as beizhu,
                m.suodan as suodan,
                m.suodanid as suodanid 
                from baoxiandingdan as m where m.dingdanid = ?';
        $res = $this->db->query($sql, array($dingdanid));
		
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj_sub = new stdClass();
                $obj_sub->id = $r->id;
                $obj_sub->dingdanid = $dingdanid;
                $obj_sub->baoxianchanpinid = $r->baoxianchanpinid;
                $obj_sub->hangchenglvkeid = $r->hangchenglvkeid;
                $obj_sub->dingdanzhuangtai = $r->dingdanzhuangtai;
                $obj_sub->dingdanzongjia = $r->dingdanzongjia;
                $obj_sub->baoxianleixing = $r->baoxianleixing;
                $obj_sub->baoxiandingdanhao = $r->baoxiandingdanhao;
                $obj_sub->waicaipingtai = $r->waicaipingtai;
                $obj_sub->waicaidingdanbianhao = $r->waicaidingdanbianhao;
                $obj_sub->waicaizongjia = $r->waicaizongjia;
                $obj_sub->waicaibeizhu = $r->waicaibeizhu;
                $obj_sub->baodanhao = $r->baodanhao;
                $obj_sub->baodanzhuangtai = $r->baodanzhuangtai;
                $obj_sub->chuangjianshijian = $r->chuangjianshijian;
                $obj_sub->shengxiaoriqi = $r->shengxiaoriqi;
                $obj_sub->beizhu = $r->beizhu;
                $obj_sub->suodan = $r->suodan;
                $obj_sub->suodanid = $r->suodanid;
                $obj_sub->mhangchenglvke = $this->mhangchenglvke->getObjById($r->hangchenglvkeid);
                
                $lst[] = $obj_sub;
            }
        }
        $obj->lst = $lst;
        $obj->mdingdan = $this->mdingdan->getMyObj($dingdanid);
        $obj->mhangcheng = $this->mhangcheng->getObj($dingdanid);
        return $obj;
    }

    /**
     * 获取保险公司
     */
    public function getBaoXianGongSi() {
        $mingcheng = array();
        $sql = 'select distinct bgs.mingcheng as mingcheng from baoxiandingdan as m, baoxianchanpin as bxcp, baoxiangongsi as bgs where m.baoxianchanpinid = bxcp.id and bxcp.baoxiangongsiid = bgs.id';
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                if (!empty($r->mingcheng)) {
                    $mingcheng[] = $r->mingcheng;
                }
            }
        }
        return $mingcheng;
    }

    public function getBaoXianAndGongSi($baoxianchanpinid = 0) {
        $result = '';
        if ($baoxianchanpinid > 0) {
            $sql = 'select bxcp.chanpinmingcheng as chanpinmingcheng, bgs.mingcheng as mingcheng from baoxianchanpin as bxcp, baoxiangongsi as bgs where bxcp.baoxiangongsiid = bgs.id and bxcp.id = ? limit 0, 1';
            $res = $this->db->query($sql, array($baoxianchanpinid));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->chanpinmingcheng) && !empty($r->mingcheng)) {
                        $result = $r->mingcheng . '/' . $r->chanpinmingcheng;
                    }
                }
            }
        }
        return $result;
    }

    /**
     * 获取保险订单
     */
    public function getObjByDingdanid($dingdanid) {
        $obj = new stdClass();
        $sql = 'select m.id as id, m.baoxianchanpinid as baoxianchanpinid,
                m.hangchenglvkeid as hangchenglvkeid, m.dingdanzhuangtai as dingdanzhuangtai,
                m.dingdanzongjia as dingdanzongjia, m.baoxianleixing as baoxianleixing,
                m.baoxiandingdanhao as baoxiandingdanhao,
                m.waicaipingtai as waicaipingtai, 
                m.waicaidingdanbianhao as waicaidingdanbianhao, 
                m.waicaizongjia as waicaizongjia,
                m.waicaibeizhu as waicaibeizhu,
                m.baodanhao as baodanhao,
                m.baodanzhuangtai as baodanzhuangtai, 
                m.chuangjianshijian as chuangjianshijian,
                m.shengxiaoriqi as shengxiaoriqi,
                m.beizhu as beizhu,
                m.suodan as suodan,
                m.suodanshijian as suodanshijian,
                m.suodanid as suodanid 
                from baoxiandingdan as m where m.dingdanid = ?';
        $res = $this->db->query($sql, array($dingdanid));
		$youweichuli = false;
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->id = $r->id;
                $obj->dingdanid = $dingdanid;
                $obj->baoxianchanpinid = $r->baoxianchanpinid;
                $obj->hangchenglvkeid = $r->hangchenglvkeid;
                $obj->dingdanzhuangtai = $r->dingdanzhuangtai;
                if (!empty($obj->dingdanzongjia) && intval($obj->dingdanzongjia) > 0) {
                    $obj->dingdanzongjia = intval($obj->dingdanzongjia) + intval($r->dingdanzongjia);
                } else {
                    $obj->dingdanzongjia = $r->dingdanzongjia;
                }
                $obj->baoxianleixing = $r->baoxianleixing;
                $obj->baoxiandingdanhao = $r->baoxiandingdanhao;
                $obj->waicaipingtai = $r->waicaipingtai;
                $obj->waicaidingdanbianhao = $r->waicaidingdanbianhao;
                $obj->waicaizongjia = $r->waicaizongjia;
                $obj->waicaibeizhu = $r->waicaibeizhu;
                $obj->baodanhao = $r->baodanhao;
                $obj->baodanzhuangtai = $r->baodanzhuangtai;
                $obj->chuangjianshijian = $r->chuangjianshijian;
                $obj->shengxiaoriqi = $r->shengxiaoriqi;
                $obj->beizhu = $r->beizhu;
                $obj->suodan = $r->suodan;
                $obj->suodanid = $r->suodanid;
                $obj->suodanshijian = $r->suodanshijian;

                if ($r->baodanzhuangtai == 1) {
                    $youweichuli = true;
                }
            }
        }
        $obj->youweichuli = $youweichuli;		
        return $obj;
    }

    /**
     * 获取订单 id
     * 
     * $zhongwenming 被投保人，
     * $mingcheng 保险公司名称，
     * $baoxiandingdanhao 报单号，
     * $baoxianleixing 保险类型
     */
    public function getDingDanIds($zhongwenming, $mingcheng, $baoxiandingdanhao, $baoxianleixing) {
        $result = '(';
        $ps = array();
        $sql = 'select distinct m.dingdanid as dingdanid from baoxiandingdan as m ';
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql .= ',hangchenglvke as k where m.hangchenglvkeid = k.id and k.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        }

        if (!empty($mingcheng) && $mingcheng != '') {
            // 没有添加 where
            if (stristr($sql, 'where') == FALSE) {
                $sql .= ',baoxianchanpin as bxcp, baoxiangongsi as bgs where m.baoxianchanpinid = bxcp.id and bxcp.baoxiangongsiid = bgs.id and bgs.mingcheng = ? ';
            } else {
                $sql = str_replace('where', ',baoxianchanpin as bxcp, baoxiangongsi as bgs where', $sql);
                $sql = str_replace('k.zhongwenming = ?', 'k.zhongwenming = ? and m.baoxianchanpinid = bxcp.id and bxcp.baoxiangongsiid = bgs.id and bgs.mingcheng = ? ', $sql);
            }
            $ps[] = $mingcheng;
        }

        if (!empty($baoxiandingdanhao) && $baoxiandingdanhao != '') {
            if (stristr($sql, 'where') == FALSE) {
                $sql .= 'where m.baoxiandingdanhao = ? ';
            } else {
                $sql .= 'and m.baoxiandingdanhao = ? ';
            }
            $ps[] = $baoxiandingdanhao;
        }

        if (!empty($baoxianleixing) && $baoxianleixing != '' && $baoxianleixing != '全部') {
            if (stristr($sql, 'where') == FALSE) {
                $sql .= 'where m.baoxianleixing = ? ';
            } else {
                $sql .= 'and m.baoxianleixing = ? ';
            }
            $ps[] = $baoxianleixing;
        }

        if (!empty($ps) && count($ps) > 0) {
            $res = $this->db->query($sql, $ps);
            foreach ($res->result() as $r) {
                $ids[] = $r->dingdanid;
            }
        }

        $indx = 0;
        foreach ($ids as $s) {
            if ($indx != count($ids) - 1) {
                $result .= $s;
            } else {
                $result .= $s . ',';
            }
            $indx = $indx + 1;
        }
        $result .= ')';
        return $result;
    }

}
