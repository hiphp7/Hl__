<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 保险单号
 */
class mbaoxiandingdan extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.dingdanid as dingdanid, m.baoxianchanpinid as baoxianchanpinid,
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
                from baoxiandingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->id = $id;
                    $obj->dingdanid = $r->dingdanid;
                    $obj->baoxianchanpinid = $r->baoxianchanpinid;
                    $obj->hangchenglvkeid = $r->hangchenglvkeid;
                    $obj->dingdanzhuangtai = $r->dingdanzhuangtai;
                    $obj->dingdanzongjia = $r->dingdanzongjia;
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
                    
                    $this->load->model("dingdan/mdingdan", "mdingdan");
                    $this->load->model("hangcheng/mhangcheng", "mhangcheng");
                    $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
                    $obj->mdingdan = $this->mdingdan->getMyObj($r->dingdanid);
                    $obj->mhangcheng = $this->mhangcheng->getObj($r->dingdanid);
                    $obj->mhangchenglvke = $this->mhangchenglvke->getObjById($r->hangchenglvkeid);
                }
            }
        }
        return $obj;
    }
    
}
