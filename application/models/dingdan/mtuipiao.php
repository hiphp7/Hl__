<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 退票
 */
class mtuipiao extends CI_Model {

    /**
     * 获取退票详情
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.shenqinghao as shenqinghao, m.dingdanid as dingdanid,
                m.hangchengid as hangchengid, m.shenqingriqi as shenqingriqi,
                m.tuipiaoleixing as tuipiaoleixing, m.caozuoshijian as caozuoshijian,
                m.wanchengshijian as wanchengshijian,
                m.tuipiaoyuanyin as tuipiaoyuanyin, 
                m.fujian as fujian, m.beizhu as beizhu,
                m.hangchenglvkeid as hangchenglvkeid,
                m.tuipiaojine as tuipiaojine,
                m.chulizhuangtai as chulizhuangtai, m.suodan as suodan 
                from tuipiao as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->shenqinghao = $r->shenqinghao;
                    $obj->dingdanid = $r->dingdanid;

                    $obj->hangchengid = $r->hangchengid;
                    $obj->shenqingriqi = $r->shenqingriqi;
                    $obj->tuipiaoleixing = $r->tuipiaoleixing;
                    $obj->caozuoshijian = $r->caozuoshijian;
                    $obj->wanchengshijian = $r->wanchengshijian;
                    $obj->tuipiaoyuanyin = $r->tuipiaoyuanyin;
                    $obj->fujian = $r->fujian;
                    $obj->beizhu = $r->beizhu;
                    $obj->hangchenglvkeid = $r->hangchenglvkeid;
                    $obj->chulizhuangtai = $r->chulizhuangtai;
                    $obj->suodan = $r->suodan;
                    $obj->tuipiaojine = $r->tuipiaojine;
                }
            }
        }
        return $obj;
    }

    /**
     * 获取退票单
     * 输入：订单id 退票状态
     */
    public function getTuiPiao($dingdanid, $chulizhuangtai) {
        $sql = 'select m.shenqinghao as shenqinghao, m.dingdanid as dingdanid,
                m.hangchengid as hangchengid, m.shenqingriqi as shenqingriqi,
                m.tuipiaoleixing as tuipiaoleixing, m.caozuoshijian as caozuoshijian,
                m.wanchengshijian as wanchengshijian,
                m.tuipiaoyuanyin as tuipiaoyuanyin, 
                m.fujian as fujian, m.beizhu as beizhu,
                m.hangchenglvkeid as hangchenglvkeid,
                m.tuipiaojine as tuipiaojine,
                m.chulizhuangtai as chulizhuangtai, m.suodan as suodan 
                from tuipiao as m where m.dingdanid = ? and m.chulizhuangtai = ?';
        $res = $this->db->query($sql, array($dingdanid, $chulizhuangtai));
        return $res->result();
    }
    
    public function tuipiaolx($hangchenglvkeid)
    {
        $result = '自愿退票';
        $sql = 'select m.tuipiaoleixing as tuipiaoleixing from tuipiao as m where m.hangchenglvkeid = ?';
        $res = $this->db->query($sql, array($hangchenglvkeid));
        foreach ($res->result() as $r) {
            if(!empty($r->tuipiaoleixing) && 0 == intval($r->tuipiaoleixing))
            {
                $result = '非自愿退票';
            }
        }
        return $result;
    }
    
      /**
     * 获取退票单详情
     * 输入：订单id 退票状态
     */
    public function getTuiPiaoXQ($dingdanid, $chulizhuangtai, $hangchengid,$tuipiaoleixing) {
        
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        
        $result = new stdClass();
        
        // 退票详情
        $lst = array();
        $sql = 'select m.id as id, m.dingdanid as dingdanid,
                m.hangchengid as hangchengid,
                m.hangchenglvkeid as hangchenglvkeid,
                m.tuipiaoleixing as tuipiaoleixing,
                m.tuipiaoyuanyin as tuipiaoyuanyin, 
                m.fujian as fujian, m.beizhu as beizhu,
                m.tuipiaojine as tuipiaojine,
                m.chulizhuangtai as chulizhuangtai 
                from tuipiao as m where m.dingdanid = ? and m.chulizhuangtai = ? and m.hangchengid = ? and m.tuipiaoleixing = ?';
        $res = $this->db->query($sql, array($dingdanid, $chulizhuangtai, $hangchengid,$tuipiaoleixing));
        if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    
                    $obj = new stdClass();
                    $obj->id = $r->id;
                    // 获取航程旅客
                    $lk = $this->mhangchenglvke->getObjById($r->hangchenglvkeid);
                    foreach ($lk as $k) {
                        // 乘客类型
                        $obj->shifouertong = $k->shifouertong;
                        $obj->zhongwenming = $k->zhongwenming;
                        $obj->zhengjianleixing = $k->zhengjianleixing;
                        $obj->zhengjianhaoma = $k->zhengjianhaoma;
                        $obj->chushengriqi = $k->chushengriqi;
                        $obj->piaohao = $k->piaohao;
                    }
                    
                    $obj->tuipiaolx = $this->tuipiaolx($r->hangchenglvkeid);
                    
                    // 退票状态
                    $obj->tuipiaoleixing = $r->tuipiaoleixing;
                    // 退票原因
                    $obj->tuipiaoyuanyin = $r->tuipiaoyuanyin;
                    
                    $lst[] = $obj;
                    
                    // 获取航程 id
                    //$hangchengid = $r->hangchengid;
                }
            }
        $result->lst = $lst;
        
        $dic = array();
        $ertong_num = 0;
        $chenren_num = 0;
        // 航程
        $hc = array();
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $dingdan = $this->mdingdan->getObj($dingdanid);
        $sql = 'select m.id as id, m.cangwei as cangwei, m.seatCode as seatCode, l.shifouertong as shifouertong, m.piaomianjia as piaomianjia,
                m.airlineCode as airlineCode, m.refundStipulate as refundStipulate,
                m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
                m.modifyStipulate as modifyStipulate,h.piaomiandanjia as piaomiandanjia,h.jijianfei as jijianfei,
                h.fandian as fandian, h.fanqian as fanqian, t.tuipiaojine as tuipiaojine, t.feiyong as feiyong,
                h.ranyoushui as ranyoushui, h.danzhangpiaomianjia as danzhangpiaomianjia , m.tuigaiid as tuigaiid
                from hangchenglvke as m, lvke as l, hangcheng as h, tuipiao t where m.lvkeid = l.id 
				and m.zhuangtai <> ?  and t.tuipiaoleixing = ?
                and m.hangchengid = h.id and m.id = t.hangchenglvkeid and m.hangchengid = ?';
        $res = $this->db->query($sql, array('已退票',$tuipiaoleixing, $hangchengid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                
                $obj = new stdClass();
                $obj->id = $r->id;
                $obj->cangwei = $r->cangwei . ' ' . $r->seatCode;
                if ($r->shifouertong == 0) {
                    $obj->shifouertong = '成人';
                    $chenren_num = $chenren_num + 1;
					$obj->ranyoushui = $r->ranyoushui;
					$obj->jijianfei = $r->jijianfei;
                } else {
                    $obj->shifouertong = '儿童';
                    $ertong_num = $ertong_num + 1;
					$obj->ranyoushui = 0;
					$obj->jijianfei = 0;
                }
                $obj->renshu = 0;
                $obj->fandian = $r->fandian;
                $obj->fanqian = $r->fanqian;
                $obj->tuipiaojine = $r->tuipiaojine;
                $obj->feiyong = $r->feiyong;	
                $obj->tuigaiid = $r->tuigaiid;    			
                
                $obj->piaomianjia = $r->piaomianjia;
                if ($r->shifouertong == 0) {
                    $obj->piaomiandanjia = $r->piaomiandanjia;
                } else {
                    $obj->piaomiandanjia = $r->piaomianjia;
                }               
                $obj->danzhangpiaomianjia = $r->danzhangpiaomianjia;
                $obj->chupiaobianma = $dingdan->chupiaobianma;

                $obj->airlineCode = $r->airlineCode;
                // 退票规则
                $obj->refundStipulate = $r->refundStipulate;
                // 升仓改期
                $obj->changeStipulate = $r->changeStipulate;
                $obj->suitableAirline = $r->suitableAirline;
                // 能改签的是 true 不能改签的是 false
                $obj->modifyStipulate = $r->modifyStipulate;
				$obj->hangchengid = $hangchengid;
                
                if ($r->shifouertong == 0) {
                    $dic['成人'] = $obj;
                } else {
                    $dic['儿童'] = $obj;
                }
            }
        }
        
        foreach ($dic as $key => $value) {
            if($key == '成人')
            {
                $value->renshu = $chenren_num;
                $hc[] = $value;
            }
            else if($key == '儿童')
            {
                $value->renshu = $ertong_num;
                $hc[] = $value;
            }
        }
        
        $result->hc = $hc;
        
        return $result;
    }

    /**
     * 获取退票单详情_已处理
     * 输入：订单id 退票状态
     */
    public function getTuiPiaoXQ_chakan($dingdanid, $chulizhuangtai, $hangchengid ,$tuipiaodingdanid) {
        
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        
        $result = new stdClass();
        $sql_tuipiao = 'select m.chulipicihao as chulipicihao from tuipiaodingdan as m where id = ?';
        $res = $this->db->query($sql_tuipiao, array($tuipiaodingdanid));
        $result = $res->row();
        if(!empty($result) && $result->chulipicihao){
            $chulipicihao = $result->chulipicihao; // 处理批次号
        }
        
        // 退票详情
        $lst = array();
        $sql = 'select m.id as id, m.dingdanid as dingdanid,
                m.hangchengid as hangchengid,
                m.hangchenglvkeid as hangchenglvkeid,
                m.tuipiaoleixing as tuipiaoleixing,
                m.tuipiaoyuanyin as tuipiaoyuanyin, 
                m.fujian as fujian, m.beizhu as beizhu,
                m.tuipiaojine as tuipiaojine,
                m.chulizhuangtai as chulizhuangtai 
                from tuipiao as m where m.dingdanid = ? and m.chulizhuangtai = ? and m.hangchengid = ? and m.chulipicihao = ?';
        $res = $this->db->query($sql, array($dingdanid, $chulizhuangtai, $hangchengid, $chulipicihao));
        if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    
                    $obj = new stdClass();
                    $obj->id = $r->id;
                    // 获取航程旅客
                    $lk = $this->mhangchenglvke->getObjById($r->hangchenglvkeid);
                    foreach ($lk as $k) {
                        // 乘客类型
                        $obj->shifouertong = $k->shifouertong;
                        $obj->zhongwenming = $k->zhongwenming;
                        $obj->zhengjianleixing = $k->zhengjianleixing;
                        $obj->zhengjianhaoma = $k->zhengjianhaoma;
                        $obj->chushengriqi = $k->chushengriqi;
                        $obj->piaohao = $k->piaohao;
                    }
                    
                    $obj->tuipiaolx = $this->tuipiaolx($r->hangchenglvkeid);
                    
                    // 退票状态
                    $obj->tuipiaoleixing = $r->tuipiaoleixing;
                    // 退票原因
                    $obj->tuipiaoyuanyin = $r->tuipiaoyuanyin;
                    
                    $lst[] = $obj;
                    
                    // 获取航程 id
                    //$hangchengid = $r->hangchengid;
                }
            }
        $result->lst = $lst;
        
        $dic = array();
        $ertong_num = 0;
        $chenren_num = 0;
        // 航程
        $hc = array();
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $dingdan = $this->mdingdan->getObj($dingdanid);
        $sql = 'select m.id as id, m.cangwei as cangwei, m.seatCode as seatCode, l.shifouertong as shifouertong, m.piaomianjia as piaomianjia,
                m.airlineCode as airlineCode, m.refundStipulate as refundStipulate,
                m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
                m.modifyStipulate as modifyStipulate,h.piaomiandanjia as piaomiandanjia,h.jijianfei as jijianfei,
                h.fandian as fandian, h.fanqian as fanqian, t.tuipiaojine as tuipiaojine, t.feiyong as feiyong,
                h.ranyoushui as ranyoushui, h.danzhangpiaomianjia as danzhangpiaomianjia , m.tuigaiid as tuigaiid
                from hangchenglvke as m, lvke as l, hangcheng as h, tuipiao t where m.lvkeid = l.id 
				and t.chulipicihao = ? 
                and m.hangchengid = h.id and m.id = t.hangchenglvkeid and m.hangchengid = ?';
        $res = $this->db->query($sql, array($chulipicihao, $hangchengid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                
                $obj = new stdClass();
                $obj->id = $r->id;
                $obj->cangwei = $r->cangwei . ' ' . $r->seatCode;
                if ($r->shifouertong == 0) {
                    $obj->shifouertong = '成人';
                    $chenren_num = $chenren_num + 1;
					$obj->ranyoushui = $r->ranyoushui;
					$obj->jijianfei = $r->jijianfei;
                } else {
                    $obj->shifouertong = '儿童';
                    $ertong_num = $ertong_num + 1;
					$obj->ranyoushui = 0;
					$obj->jijianfei = 0;
                }
                $obj->renshu = 0;
                $obj->fandian = $r->fandian;
                $obj->fanqian = $r->fanqian;
                $obj->tuipiaojine = $r->tuipiaojine;
                $obj->feiyong = $r->feiyong;
				$obj->tuigaiid = $r->tuigaiid;				
                
                $obj->piaomianjia = $r->piaomianjia;
                if ($r->shifouertong == 0) {
                    $obj->piaomiandanjia = $r->piaomiandanjia;
                } else {
                    $obj->piaomiandanjia = $r->piaomianjia;
                }              
                $obj->danzhangpiaomianjia = $r->danzhangpiaomianjia;
                $obj->chupiaobianma = $dingdan->chupiaobianma;

                $obj->airlineCode = $r->airlineCode;
                // 退票规则
                $obj->refundStipulate = $r->refundStipulate;
                // 升仓改期
                $obj->changeStipulate = $r->changeStipulate;
                $obj->suitableAirline = $r->suitableAirline;
                // 能改签的是 true 不能改签的是 false
                $obj->modifyStipulate = $r->modifyStipulate;
				$obj->hangchengid = $hangchengid;
                
                if ($r->shifouertong == 0) {
                    $dic['成人'] = $obj;
                } else {
                    $dic['儿童'] = $obj;
                }
            }
        }
        
        foreach ($dic as $key => $value) {
            if($key == '成人')
            {
                $value->renshu = $chenren_num;
                $hc[] = $value;
            }
            else if($key == '儿童')
            {
                $value->renshu = $ertong_num;
                $hc[] = $value;
            }
        }
        
        $result->hc = $hc;
        
        return $result;
    }

}
