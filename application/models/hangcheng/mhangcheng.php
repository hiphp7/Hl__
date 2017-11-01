<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 航程
 */
class mhangcheng extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($dingdanid = 0) {
        $qifeishijian = '';
        $daodashijian = '';
        $qifeijichang = '';
        $daodajichang = '';
        $hb = '';
        $result = new stdClass();
        if ($dingdanid != 0) {
            $sql = 'select m.wangfanhangcheng as wangfanhangcheng, m.qifeijichang as qifeijichang,
               m.daodajichang as daodajichang, m.hangbanhao as hangbanhao,
               m.hangkonggongsi as hangkonggongsi, m.seatCode as seatCode,
               m.qifeishijian as qifeishijian, m.daodashijian as daodashijian,
               m.cangwei as cangwei from hangcheng as m where m.dingdanid = ?';
            $res = $this->db->query($sql, array($dingdanid));
            if (!empty($res) && $res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->wangfanhangcheng) && $r->wangfanhangcheng == 1) {
                        $result->wangfan = '往返';
                        $qifeishijian .= '<br/>' . $r->qifeishijian;
                        $daodashijian .= '<br/>' . $r->daodashijian;
                        $qifeijichang .= '<br/>' . $r->qifeijichang;
                        $daodajichang .= '<br/>' . $r->daodajichang;
                        $hb .= '<br/>' . $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->seatCode;
                    } else {
                        $result->wangfan = '单程';
                        $qifeishijian = $r->qifeishijian;
                        $daodashijian = $r->daodashijian;
                        $qifeijichang = $r->qifeijichang;
                        $daodajichang = $r->daodajichang;
                        $hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->seatCode;
                    }
                    $result->qifeijichang = $qifeijichang;
                    $result->daodajichang = $daodajichang;
                    $result->hangbanhao = $r->hangbanhao;
                    $result->cangwei = $r->cangwei;
                    $result->hangkonggongsi = $r->hangkonggongsi;
                    $result->seatCode = $r->seatCode;
                    $result->qifeishijian = $qifeishijian;
                    $result->daodashijian = $daodashijian;
                    $result->hb = $hb;
                }
            }
        }
        return $result;
    }

    /**
     * 三方获取航程信息
     */
    public function getObj_sanfang($dingdanid = 0) {
        $qifeishijian = '';
        $daodashijian = '';
        $qifeijichang = '';
        $daodajichang = '';
        $hb = '';

        $hangbanxinxi = "";
        $qifeidaoda = '';

        $result = new stdClass();
        if ($dingdanid != 0) {
            $sql = 'select m.wangfanhangcheng as wangfanhangcheng, m.qifeijichang as qifeijichang,
               m.daodajichang as daodajichang, m.hangbanhao as hangbanhao,
               m.hangkonggongsi as hangkonggongsi, m.seatCode as seatCode,
               m.dstCitysanzima as dstCitysanzima,m.orgCitysanzima as orgCitysanzima,
               m.qifeishijian as qifeishijian, m.daodashijian as daodashijian,
               m.cangwei as cangwei from hangcheng as m where m.dingdanid = ?';
            $res = $this->db->query($sql, array($dingdanid));
            if (!empty($res) && $res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->wangfanhangcheng) && $r->wangfanhangcheng == 1) {
                        $result->wangfan = '往返';
                        $chatianshu = round((strtotime($r->daodashijian) - strtotime($r->qifeishijian)) / 3600 / 24); // 相差天数
                        $hangbanxinxi .= '<br/>' . date("Y-m-d", strtotime($r->qifeishijian)) . ' ' . $r->hangbanhao;
                        $qifeidaoda .='<br/>' . date("H:i", strtotime($r->qifeishijian)) . ' ' . $r->orgCitysanzima . ' -  ' . date("H:i", strtotime($r->daodashijian)) . ' ' . $r->dstCitysanzima . ' +' . $chatianshu;

                        $qifeishijian .= '<br/>' . $r->qifeishijian;
                        $daodashijian .= '<br/>' . $r->daodashijian;
                        $qifeijichang .= '<br/>' . $r->qifeijichang;
                        $daodajichang .= '<br/>' . $r->daodajichang;
                        $hb .= '<br/>' . $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->seatCode;
                    } else {
                        $result->wangfan = '单程';
                        $chatianshu = round((strtotime($r->daodashijian) - strtotime($r->qifeishijian)) / 3600 / 24); // 相差天数
                        $hangbanxinxi .= date("Y-m-d", strtotime($r->qifeishijian)) . ' ' . $r->hangbanhao;
                        $qifeidaoda .= date("H:i", strtotime($r->qifeishijian)) . ' ' . $r->orgCitysanzima . ' -  ' . date("H:i", strtotime($r->daodashijian)) . ' ' . $r->dstCitysanzima . ' +' . $chatianshu;


                        $qifeishijian = $r->qifeishijian;
                        $daodashijian = $r->daodashijian;
                        $qifeijichang = $r->qifeijichang;
                        $daodajichang = $r->daodajichang;
                        $hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->seatCode;
                    }
                    $result->qifeijichang = $qifeijichang;
                    $result->daodajichang = $daodajichang;
                    $result->hangbanhao = $r->hangbanhao;
                    $result->cangwei = $r->cangwei;
                    $result->hangkonggongsi = $r->hangkonggongsi;
                    $result->seatCode = $r->seatCode;
                    $result->qifeishijian = $qifeishijian;
                    $result->daodashijian = $daodashijian;
                    $result->hb = $hb;

                    $result->hangbanxinxi = trim($hangbanxinxi, '<br/>');
                    $result->qifeidaoda = trim($qifeidaoda, '<br/>');
                }
            }
        }
        return $result;
    }

    /**
     * 获取管理员名称
     */
    public function getObjById($id = 0) {
        $result = new stdClass();
        if ($id != 0) {
            $sql = 'select m.wangfanhangcheng as wangfanhangcheng, m.qifeijichang as qifeijichang,
               m.daodajichang as daodajichang, m.hangbanhao as hangbanhao,m.parPrice as parPrice,
               m.qifeishijian as qifeishijian, m.daodashijian as daodashijian, 
               m.cangwei as cangwei from hangcheng as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if (!empty($res) && $res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->wangfanhangcheng) && $r->wangfanhangcheng == 1) {
                        $result->wangfan = '往返';
                    } else {
                        $result->wangfan = '单程';
                    }
                    $result->qifeijichang = $r->qifeijichang;
                    $result->daodajichang = $r->daodajichang;
                    $result->hangbanhao = $r->hangbanhao;
                    $result->cangwei = $r->cangwei;
                    $result->qifeishijian = $r->qifeishijian;
                    $result->daodashijian = $r->daodashijian;
                    $result->parPrice = $r->parPrice;
                }
            }
        }
        return $result;
    }

    public function getMyObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.dingdanid as dingdanid, m.piaomiandanjia as piaomiandanjia, 
                m.seatCode as seatCode, 
                m.ranyoushui as ranyoushui,
				m.jijianfei as jijianfei,
                m.hangbanhao as hangbanhao,
                m.qifeijichang as qifeijichang,
                m.daodajichang as daodajichang,
                m.fandian as fandian, m.fanqian as fanqian,
                m.qifeishijian as qifeishijian 
                from hangcheng as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->dingdanid = $r->dingdanid;

                    $obj->seatCode = $r->seatCode;
                    $obj->hangbanhao = $r->hangbanhao;
                    $obj->qifeijichang = $r->qifeijichang;
                    $obj->daodajichang = $r->daodajichang;
                    $obj->qifeishijian = $r->qifeishijian;
                    $obj->fandian = $r->fandian;
                    $obj->fanqian = $r->fanqian;

                    if (!empty($r->piaomiandanjia)) {
                        $obj->piaomiandanjia = $r->piaomiandanjia;
                    } else {
                        $obj->piaomiandanjia = '';
                    }

                    if (!empty($r->jijianfei)) {
                        $obj->jijianfei = $r->jijianfei;
                    } else {
                        $obj->jijianfei = '';
                    }
                }
            }
        }

        return $obj;
    }

    /**
     * 获取管理员名称
     */
    public function getDingDanId($id = 0) {
        if ($id != 0) {
            $sql = 'select m.dingdanid as dingdanid from hangcheng as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    return $r->dingdanid;
                }
            }
        }
        return 0;
    }

    /**
     * 获取订单的航程
     */
    public function getHangCheng($dingdanid) {
        $sql = 'select m.id as id, m.PNRhao as PNRhao, m.shifouertong as shifouertong,
           m.chengkerenshu as chengkerenshu, m.wangfanhangcheng as wangfanhangcheng, 
           m.fanchengbiaozhi as fanchengbiaozhi, m.hangchengxuhao as hangchengxuhao, 
           m.hangkonggongsi as hangkonggongsi, m.hangbanhao as hangbanhao, 
           m.gongxianghangbanhao as gongxianghangbanhao, m.jixing as jixing,
           m.qifeijichang as qifeijichang, m.daodajichang as daodajichang,
           m.qifeihangzhanlou as qifeihangzhanlou, m.daodahangzhanlou as daodahangzhanlou,
           m.jingtinglianbiao as jingtinglianbiao, m.qifeishijian as qifeishijian,
           m.daodashijian as daodashijian, m.cangwei as cangwei, m.piaoyuanshuliang as piaoyuanshuliang,
           m.xiaoshouzongjia as xiaoshouzongjia, m.piaomiandanjia as piaomiandanjia, m.ranyoushui as ranyoushui,
           m.fandian as fandian, m.fanqian as fanqian,
           m.jijianfei as jijianfei, m.baoxian as baoxian, m.qitafei as qitafei, m.danzhangpiaomianjia as danzhangpiaomianjia
            from hangcheng as m where m.dingdanid = ?';
        $res = $this->db->query($sql, array($dingdanid));
        if ($res->num_rows() > 0) {
            return $res->result();
        }
    }

    /**
     * 获取 航程
     * $selected post 传过来的数据
     * $dingdan_obj 订单的 object 
     * $dingdanid 保存后订单的 id
     * $lvke 航程旅客
     */
    public function getSaveObj($selected, $dingdan_obj, $dingdanid, $lvke, $baoxian, $costdetail) {

        $hc_obj_ar = array();
        // 航程不为空
        if ($selected->goto->date != '') {
            $hc_obj = new stdClass();
            $hangcheng = new stdClass();
            $hangcheng->baoxian = $dingdan_obj->baoxian;
            // $hangcheng->gendingdanid = $gendingdanid;  // 根订单id
            $hangcheng->dingdanid = $dingdanid;
            // $hangcheng->dabianma = $dabianma;  // 大编码
            $jixing = $selected->goto->flight->planeType; // 飞机型号
            $jixing = $this->object2array($jixing);
            if (!empty($jixing) && count($jixing) > 0) {
                $hangcheng->jixing = $jixing[0];
            } else {
                $hangcheng->jixing = '';
            }

            /**
             * 新增 折扣价格：parPrice
             */
            $hangcheng->parPrice = $selected->goto->seatItem->piaomianjia; // 折扣价格

            $hangcheng->hangchengxuhao = $selected->goto->flight->aircode; // 飞机型号
            $hangcheng->hangkonggongsi = $selected->goto->flight->gs; // 航空公司
            $hangcheng->qifeijichang = $selected->goto->flight->orgAirport; // 起飞机场
            $hangcheng->daodajichang = $selected->goto->flight->dstAirport; // 到达机场

            $qifeihangzhanlou = $selected->goto->flight->orgJetquay; // 起飞航站楼
            $qifeihangzhanlou = $this->object2array($qifeihangzhanlou);

            if (!empty($qifeihangzhanlou)) {
                $hangcheng->qifeihangzhanlou = $qifeihangzhanlou[0]; // 起飞航站楼
            } else {
                $hangcheng->qifeihangzhanlou = '';
            }

            $daodahangzhanlou = $selected->goto->flight->dstJetquay; // 到达航站楼
            $daodahangzhanlou = $this->object2array($daodahangzhanlou);
            // 到达航站楼
            if (!empty($daodahangzhanlou)) {
                $hangcheng->daodahangzhanlou = $daodahangzhanlou[0]; // 到达航站楼
            } else {
                $hangcheng->daodahangzhanlou = '';
            }
            // 起飞时间
            $date = $selected->goto->flight->date;
            $depTime = $selected->goto->flight->depTime;
            $fulltime = $date . '' . $depTime;
            $timeAll = date("Y-m-d H:i:s", strtotime($fulltime));
            $hangcheng->qifeishijian = $timeAll;
            // 到达时间			
            $date = $selected->goto->flight->date;
            $arriTime = $selected->goto->flight->arriTime;
            $fulltime = $date . '' . $arriTime;
            //$timeAll = date("Y-m-d H:i:s" ,strtotime($fulltime));

            $interday = $selected->goto->interday; // 增加天数
            $timeAll = date("Y-m-d H:i:s", strtotime("$fulltime + $interday day "));
            $hangcheng->daodashijian = $timeAll;

            $hangcheng->cangwei = $selected->goto->seatItem->seatMsg; // 舱位
            $seatCode = $selected->goto->seatItem->seatCode; // 舱位类型
            $seatCode = $this->object2array($seatCode);
            $hangcheng->seatCode = $seatCode[0];
            //$hangcheng->piaoyuanshuliang = $selected->goto->seatItem->seatStatus; // 数量
            // $hangcheng->PNRhao = $PNRhao; // PNRh号 记录乘客信息
            // $hangcheng->PNRxinxi = $PNRxinxi; // PNRh 记录乘客信息
            // $hangcheng->shifouertong = $shifouertong; // 
            // $hangcheng->chengkerenshu = $shifouertong; // 

            $hangcheng->wangfanhangcheng = 0; //  0 去程 1返程
            $hangcheng->hangchengxuhao = 0; //  航程序号
            $gongxianghangbanhao = $selected->goto->flight->codeShare; // 是否是共享航班 0 否 1是
            $gongxianghangbanhao = $this->object2array($gongxianghangbanhao);
            $gxhb = '否';
            if (!empty($gongxianghangbanhao) && count($gongxianghangbanhao) > 0 && $gongxianghangbanhao[0] == 'true') {
                $gxhb = '是';
            }
            $hangcheng->gongxianghangbanhao = $gxhb;

            $jingtinglianbiao = $selected->goto->flight->stopnum; // 是否是经停链表
            $jingtinglianbiao = $this->object2array($jingtinglianbiao);
            if (!empty($jingtinglianbiao) && count($jingtinglianbiao) > 0) {
                $hangcheng->jingtinglianbiao = $jingtinglianbiao[0];
            } else {
                $hangcheng->jingtinglianbiao = '';
            }

            $hangbanhao = $selected->goto->flight->flightNo; // 飞机型号
            $hangbanhao = $this->object2array($hangbanhao);
            $hbh = '';
            if (!empty($hangbanhao) && count($hangbanhao) > 0) {
                $hbh = $hangbanhao[0];
            }
            $hangcheng->hangbanhao = $hbh;

            // 票面单价
            $hangcheng->piaomiandanjia = $selected->goto->seatItem->settlePrice;
            //$parPrice = $selected->goto->seatItem->parPrice;
            //$settlePrice = $selected->goto->seatItem->settlePrice;
            /*
              if($parPrice == $settlePrice){
              $hangcheng->fandian = 0;
              $hangcheng->fanqian = 0;
              } else {
              $hangcheng->fandian = $selected->goto->seatItem->policyData->commisionPoint;
              $hangcheng->fanqian = $selected->goto->seatItem->policyData->commisionMoney;
              }
             */
            $hangcheng->fandian = $selected->goto->seatItem->policyData->commisionPoint;
            $hangcheng->fanqian = $selected->goto->seatItem->policyData->commisionMoney;

            // 单张票面价
            $hangcheng->danzhangpiaomianjia = $selected->goto->flight->basePrice;
            //  销售总价
            //$hangcheng->xiaoshouzongjia = $costdetail->goto->totalprice;  
            // 基建燃油税
            $airportTax = $selected->goto->flight->airportTax;
            $airportTax = $this->object2array($airportTax);
            $sub_airportTax = 0;
            if (!empty($airportTax) && count($airportTax) > 0) {
                $sub_airportTax = $airportTax[0];
            }
            $hangcheng->ranyoushui = 0; // 燃油税
            $hangcheng->jijianfei = $sub_airportTax;
//            $hangcheng->airlineCode = $selected->goto->mealPolicy->adult->airlineCode;
//            $hangcheng->refundStipulate = $selected->goto->mealPolicy->adult->refundStipulate;
//            $hangcheng->changeStipulate = $selected->goto->mealPolicy->adult->changeStipulate;
//            $hangcheng->modifyStipulate = $selected->goto->mealPolicy->adult->modifyStipulate;
//            $hangcheng->suitableAirline = $selected->goto->mealPolicy->adult->suitableAirline;
//
//            $hangcheng->refundStipulateChild = $selected->goto->mealPolicy->child->refundStipulate;
//            $hangcheng->changeStipulateChild = $selected->goto->mealPolicy->child->changeStipulate;
//            $hangcheng->modifyStipulateChild = $selected->goto->mealPolicy->child->modifyStipulate;
//            $hangcheng->suitableAirlineChild = $selected->goto->mealPolicy->child->suitableAirline;

            $hangcheng->dstCity = $selected->goto->flight->dstCity; // 到达城市
            $hangcheng->orgCity = $selected->goto->flight->orgCity; // 出发城市
            $hangcheng->dstCitysanzima = $selected->goto->flight->dstCitysanzima; // 到达城市三字码
            $hangcheng->orgCitysanzima = $selected->goto->flight->orgCitysanzima; // 出发城市三字码

            $hangcheng->airlineCode = $selected->goto->mealPolicy[0]->airlineCode;

            $hc_obj->hangcheng = $hangcheng;
            
           $adult_tuigai = array(
                'airlineCode' => $selected->goto->mealPolicy[0]->airlineCode,
				'seatCode' => $selected->goto->mealPolicy[0]->seatCode,
				'inserttime' => date("Y-m-d H:i:s"),
                'changePercentAfter' => $selected->goto->mealPolicy[0]->changePercentAfter,
                'changePercentBefore' => $selected->goto->mealPolicy[0]->changePercentBefore,
                'refundPercentAfter' => $selected->goto->mealPolicy[0]->refundPercentAfter,
                'refundPercentBefore' => $selected->goto->mealPolicy[0]->refundPercentBefore,
                'changeTimePoint' => $selected->goto->mealPolicy[0]->changeTimePoint,
                'refundTimePoint' => $selected->goto->mealPolicy[0]->refundTimePoint,
                'changePercentAdvance' => $selected->goto->mealPolicy[0]->changePercentAdvance,
                'refundPercentAdvance' => $selected->goto->mealPolicy[0]->refundPercentAdvance,
                'changeTimePointAdvance' => $selected->goto->mealPolicy[0]->changeTimePointAdvance,
                'refundTimePointAadvance' => $selected->goto->mealPolicy[0]->refundTimePointAadvance,
                'suitableAirline' => $selected->goto->mealPolicy[0]->suitableAirline,
                'modifyStipulate' => $selected->goto->mealPolicy[0]->modifyStipulate);
            
            $child_tuigai = array(
                'airlineCode' => $selected->goto->mealPolicy[1]->airlineCode,
				'seatCode' => $selected->goto->mealPolicy[1]->seatCode,
				'inserttime' => date("Y-m-d H:i:s"),
                'changePercentAfter' => $selected->goto->mealPolicy[1]->changePercentAfter,
                'changePercentBefore' => $selected->goto->mealPolicy[1]->changePercentBefore,
                'refundPercentAfter' => $selected->goto->mealPolicy[1]->refundPercentAfter,
                'refundPercentBefore' => $selected->goto->mealPolicy[1]->refundPercentBefore,
                'changeTimePoint' => $selected->goto->mealPolicy[1]->changeTimePoint,
                'refundTimePoint' => $selected->goto->mealPolicy[1]->refundTimePoint,
                'changePercentAdvance' => $selected->goto->mealPolicy[1]->changePercentAdvance,
                'refundPercentAdvance' => $selected->goto->mealPolicy[1]->refundPercentAdvance,
                'changeTimePointAdvance' => $selected->goto->mealPolicy[1]->changeTimePointAdvance,
                'refundTimePointAadvance' => $selected->goto->mealPolicy[1]->refundTimePointAadvance,
                'suitableAirline' => $selected->goto->mealPolicy[1]->suitableAirline,
                'modifyStipulate' => $selected->goto->mealPolicy[1]->modifyStipulate);
            
            $hc_obj->adult_tuigai = $adult_tuigai;
            $hc_obj->child_tuigai = $child_tuigai;

            $hc_lvke = array();

            // 航程旅客
            foreach ($lvke as $v) {
                $hc_my_lvke = new stdClass();
                $hclc = new stdClass();

                $hclc->dingdanid = $dingdanid; // 订单ID
                // 保存的时候要添加的航程 id
                //$hclc->hangchengid = $hangchengid ; // 航程ID // 要与上面的航程合并起来

                $zhengjianleixing = array_search(strval($v->zhengjianleixing), $this->config->item('证件类型'));
                $hclc->hangbanhao = $hbh;  // 航班号
                $hclc->lvkeid = $v->id;   // 旅客ID
                $hclc->chuangjianshijian = date("Y-m-d H:i:s", time());
                $hclc->zhongwenming = $v->zhongwenming;
                $hclc->shifouertong = $v->shifouertong;
                $hclc->chushengriqi = $v->chushengriqi;
                //$hclc->zhengjianleixing = $zhengjianleixing;
                $hclc->zhengjianleixing = $v->zhengjianleixing;
                $hclc->zhengjianhaoma = $v->zhengjianhaoma;
                $hclc->cangwei = $hangcheng->cangwei;
                //$hclc->seatCode = $hangcheng->seatCode;
                $hclc->zhuangtai = '';

                $hclc->xingbie = $v->xingbie;
                $hclc->guoji = $v->guoji;
                $hclc->zhengjianyouxiaoqi = $v->zhengjianyouxiaoqi;
                $hclc->chushengdi = $v->chushengdi;
                $hclc->shoujihao = $v->shoujihao;
                $hclc->lianxidianhua = $v->lianxidianhua;
                $hclc->email = $v->email;
                if ($v->shifouertong == 0) {
                    $hclc->seatCode = $hangcheng->seatCode;
                    $hclc->piaomianjia = $selected->goto->seatItem->piaomianjia; // 票面价

                    $hclc->airlineCode = $selected->goto->mealPolicy[0]->airlineCode;

                    // $hclc->airlineCode = $selected->goto->mealPolicy->adult->airlineCode;
                    // $hclc->refundStipulate = $selected->goto->mealPolicy->adult->refundStipulate;
                    // $hclc->changeStipulate = $selected->goto->mealPolicy->adult->changeStipulate;
                    // $hclc->modifyStipulate = $selected->goto->mealPolicy->adult->modifyStipulate;
                    // $hclc->suitableAirline = $selected->goto->mealPolicy->adult->suitableAirline;
                } else {
                    $hclc->seatCode = 'Y';
                    $hclc->piaomianjia = $costdetail->goto->child->unitprice; // 票面价

                    $hclc->airlineCode = $selected->goto->mealPolicy[1]->airlineCode;

                    // $hclc->airlineCode = $selected->goto->mealPolicy->child->airlineCode;
                    // $hclc->refundStipulate = $selected->goto->mealPolicy->child->refundStipulate;
                    // $hclc->changeStipulate = $selected->goto->mealPolicy->child->changeStipulate;
                    // $hclc->modifyStipulate = $selected->goto->mealPolicy->child->modifyStipulate;
                    // $hclc->suitableAirline = $selected->goto->mealPolicy->child->suitableAirline;
                }


                $hc_my_lvke->lk = $hclc;

                // 用户保险
                if ($baoxian->accident->buy == true && $baoxian->accident->goto->product != '') {
                    $bx = new stdClass();
                    $bx->dingdanid = $dingdanid;
                    $bx->baoxianchanpinid = $baoxian->accident->goto->product->id;  // 保险产品Id
                    // 航程旅客ID 
                    //$bx->hangchenglvkeid = 1;  

                    $bx->dingdanzhuangtai = 1;  // 订单状态
                    $bx->baodanzhuangtai = 1;  // 保单状态
                    $bx->dingdanzongjia = $baoxian->accident->goto->unitprice;  // 订单总价
                    $bx->baoxianleixing = $baoxian->accident->goto->product->chanpinleibie;  // 保险类型
                    $bx->chuangjianshijian = date("Y-m-d H:i:s", time());  // 创建时间

                    $hc_my_lvke->accident = $bx;
                }

                if ($baoxian->dallyover->buy == true && $baoxian->dallyover->goto->product != '') {
                    $bx = new stdClass();
                    $bx->dingdanid = $dingdanid;
                    $bx->baoxianchanpinid = $baoxian->dallyover->goto->product->id;  // 保险产品Id
                    // 航程旅客ID 
                    //$bx->hangchenglvkeid = 1;  

                    $bx->dingdanzhuangtai = 1;  // 订单状态
                    $bx->baodanzhuangtai = 1;  // 保单状态
                    $bx->dingdanzongjia = $baoxian->dallyover->goto->unitprice;  // 订单总价
                    $bx->baoxianleixing = $baoxian->dallyover->goto->product->chanpinleibie;  // 保险类型
                    // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                    $bx->chuangjianshijian = date("Y-m-d H:i:s");  // 创建时间

                    $hc_my_lvke->dallyover = $bx;
                }

                $hc_lvke[] = $hc_my_lvke;
            }
            $hc_obj->lvke = $hc_lvke;
            $hc_obj_ar[] = $hc_obj;
        }

        // 往返  这个还要仔细考虑一下
        if ($selected->back->date != '') {
            $hc_obj = new stdClass();
            $hangcheng = new stdClass();
            $hangcheng->baoxian = $dingdan_obj->baoxian;
            // $hangcheng->gendingdanid = $gendingdanid;  // 根订单id
            $hangcheng->dingdanid = $dingdanid;
            // $hangcheng->dabianma = $dabianma;  // 大编码
            $jixing = $selected->back->flight->planeType; // 飞机型号
            $jixing = $this->object2array($jixing);
            if (!empty($jixing) && count($jixing) > 0) {
                $hangcheng->jixing = $jixing[0];
            } else {
                $hangcheng->jixing = '';
            }

            /**
             * 新增 折扣价格：parPrice
             */
            $hangcheng->parPrice = $selected->back->seatItem->piaomianjia; // 折扣价格

            $hangcheng->hangchengxuhao = $selected->back->flight->aircode; // 飞机型号
            $hangcheng->hangkonggongsi = $selected->back->flight->gs; // 航空公司
            $hangcheng->qifeijichang = $selected->back->flight->orgAirport; // 起飞机场
            $hangcheng->daodajichang = $selected->back->flight->dstAirport; // 到达机场

            $qifeihangzhanlou = $selected->back->flight->orgJetquay; // 起飞航站楼
            $qifeihangzhanlou = $this->object2array($qifeihangzhanlou);

            if (!empty($qifeihangzhanlou)) {
                $hangcheng->qifeihangzhanlou = $qifeihangzhanlou[0]; // 起飞航站楼
            } else {
                $hangcheng->qifeihangzhanlou = '';
            }

            $daodahangzhanlou = $selected->back->flight->dstJetquay; // 到达航站楼
            $daodahangzhanlou = $this->object2array($daodahangzhanlou);
            // 到达航站楼
            if (!empty($daodahangzhanlou)) {
                $hangcheng->daodahangzhanlou = $daodahangzhanlou[0]; // 到达航站楼
            } else {
                $hangcheng->daodahangzhanlou = '';
            }
            // 起飞时间
            $date = $selected->back->flight->date;
            $depTime = $selected->back->flight->depTime;
            $fulltime = $date . '' . $depTime;
            $timeAll = date("Y-m-d H:i:s", strtotime($fulltime));
            $hangcheng->qifeishijian = $timeAll;
            // 到达时间			
            $date = $selected->back->flight->date;
            $arriTime = $selected->back->flight->arriTime;
            $fulltime = $date . '' . $arriTime;
            //$timeAll = date("Y-m-d H:i:s" ,strtotime($fulltime));

            $interday = $selected->back->interday; // 增加天数
            $timeAll = date("Y-m-d H:i:s", strtotime("$fulltime + $interday day "));
            $hangcheng->daodashijian = $timeAll;

            $hangcheng->cangwei = $selected->back->seatItem->seatMsg; // 舱位
            $seatCode = $selected->back->seatItem->seatCode; // 舱位类型
            $seatCode = $this->object2array($seatCode);
            $hangcheng->seatCode = $seatCode[0];
            //$hangcheng->piaoyuanshuliang = $selected->back->seatItem->seatStatus; // 数量
            // $hangcheng->PNRhao = $PNRhao; // PNRh号 记录乘客信息
            // $hangcheng->PNRxinxi = $PNRxinxi; // PNRh 记录乘客信息
            // $hangcheng->shifouertong = $shifouertong; // 
            // $hangcheng->chengkerenshu = $shifouertong; // 

            $hangcheng->wangfanhangcheng = 0; //  0 去程 1返程
            $hangcheng->hangchengxuhao = 0; //  航程序号
            $gongxianghangbanhao = $selected->back->flight->codeShare; // 是否是共享航班 0 否 1是
            $gongxianghangbanhao = $this->object2array($gongxianghangbanhao);
            $gxhb = '否';
            if (!empty($gongxianghangbanhao) && count($gongxianghangbanhao) > 0 && $gongxianghangbanhao[0] == 'true') {
                $gxhb = '是';
            }
            $hangcheng->gongxianghangbanhao = $gxhb;

            $jingtinglianbiao = $selected->back->flight->stopnum; // 是否是经停链表
            $jingtinglianbiao = $this->object2array($jingtinglianbiao);
            if (!empty($jingtinglianbiao) && count($jingtinglianbiao) > 0) {
                $hangcheng->jingtinglianbiao = $jingtinglianbiao[0];
            } else {
                $hangcheng->jingtinglianbiao = '';
            }

            $hangbanhao = $selected->back->flight->flightNo; // 飞机型号
            $hangbanhao = $this->object2array($hangbanhao);
            $hbh = '';
            if (!empty($hangbanhao) && count($hangbanhao) > 0) {
                $hbh = $hangbanhao[0];
            }
            $hangcheng->hangbanhao = $hbh;

            // 票面单价
            $hangcheng->piaomiandanjia = $selected->back->seatItem->settlePrice;
            //$parPrice = $selected->back->seatItem->parPrice;
            //$settlePrice = $selected->back->seatItem->settlePrice;
            /*
              if($parPrice == $settlePrice){
              $hangcheng->fandian = 0;
              $hangcheng->fanqian = 0;
              } else {
              $hangcheng->fandian = $selected->back->seatItem->policyData->commisionPoint;
              $hangcheng->fanqian = $selected->back->seatItem->policyData->commisionMoney;
              }
             */
            $hangcheng->fandian = $selected->back->seatItem->policyData->commisionPoint;
            $hangcheng->fanqian = $selected->back->seatItem->policyData->commisionMoney;

            // 单张票面价
            $hangcheng->danzhangpiaomianjia = $selected->back->flight->basePrice;
            //  销售总价
            //$hangcheng->xiaoshouzongjia = $costdetail->back->totalprice;  
            // 基建燃油税
            $airportTax = $selected->back->flight->airportTax;
            $airportTax = $this->object2array($airportTax);
            $sub_airportTax = 0;
            if (!empty($airportTax) && count($airportTax) > 0) {
                $sub_airportTax = $airportTax[0];
            }
            $hangcheng->ranyoushui = 0; // 燃油税
            $hangcheng->jijianfei = $sub_airportTax;
//            $hangcheng->airlineCode = $selected->back->mealPolicy->adult->airlineCode;
//            $hangcheng->refundStipulate = $selected->back->mealPolicy->adult->refundStipulate;
//            $hangcheng->changeStipulate = $selected->back->mealPolicy->adult->changeStipulate;
//            $hangcheng->modifyStipulate = $selected->back->mealPolicy->adult->modifyStipulate;
//            $hangcheng->suitableAirline = $selected->back->mealPolicy->adult->suitableAirline;
//
//            $hangcheng->refundStipulateChild = $selected->back->mealPolicy->child->refundStipulate;
//            $hangcheng->changeStipulateChild = $selected->back->mealPolicy->child->changeStipulate;
//            $hangcheng->modifyStipulateChild = $selected->back->mealPolicy->child->modifyStipulate;
//            $hangcheng->suitableAirlineChild = $selected->back->mealPolicy->child->suitableAirline;

            $hangcheng->dstCity = $selected->back->flight->dstCity; // 到达城市
            $hangcheng->orgCity = $selected->back->flight->orgCity; // 出发城市
            $hangcheng->dstCitysanzima = $selected->back->flight->dstCitysanzima; // 到达城市三字码
            $hangcheng->orgCitysanzima = $selected->back->flight->orgCitysanzima; // 出发城市三字码

            $hangcheng->airlineCode = $selected->back->mealPolicy[0]->airlineCode;
            $hc_obj->hangcheng = $hangcheng;
            

                 $adult_tuigai = array(
				'seatCode' => $selected->back->mealPolicy[0]->seatCode,
				'inserttime' => date("Y-m-d H:i:s"),				 
                'airlineCode' => $selected->back->mealPolicy[0]->airlineCode,
                'changePercentAfter' => $selected->back->mealPolicy[0]->changePercentAfter,
                'changePercentBefore' => $selected->back->mealPolicy[0]->changePercentBefore,
                'refundPercentAfter' => $selected->back->mealPolicy[0]->refundPercentAfter,
                'refundPercentBefore' => $selected->back->mealPolicy[0]->refundPercentBefore,
                'changeTimePoint' => $selected->back->mealPolicy[0]->changeTimePoint,
                'refundTimePoint' => $selected->back->mealPolicy[0]->refundTimePoint,
                'changePercentAdvance' => $selected->back->mealPolicy[0]->changePercentAdvance,
                'refundPercentAdvance' => $selected->back->mealPolicy[0]->refundPercentAdvance,
                'changeTimePointAdvance' => $selected->back->mealPolicy[0]->changeTimePointAdvance,
                'refundTimePointAadvance' => $selected->back->mealPolicy[0]->refundTimePointAadvance,
                'suitableAirline' => $selected->back->mealPolicy[0]->suitableAirline,
                'modifyStipulate' => $selected->back->mealPolicy[0]->modifyStipulate);
            
            $child_tuigai = array(
				'seatCode' => $selected->back->mealPolicy[1]->seatCode,
				'inserttime' => date("Y-m-d H:i:s"),			
                'airlineCode' => $selected->back->mealPolicy[1]->airlineCode,
                'changePercentAfter' => $selected->back->mealPolicy[1]->changePercentAfter,
                'changePercentBefore' => $selected->back->mealPolicy[1]->changePercentBefore,
                'refundPercentAfter' => $selected->back->mealPolicy[1]->refundPercentAfter,
                'refundPercentBefore' => $selected->back->mealPolicy[1]->refundPercentBefore,
                'changeTimePoint' => $selected->back->mealPolicy[1]->changeTimePoint,
                'refundTimePoint' => $selected->back->mealPolicy[1]->refundTimePoint,
                'changePercentAdvance' => $selected->back->mealPolicy[1]->changePercentAdvance,
                'refundPercentAdvance' => $selected->back->mealPolicy[1]->refundPercentAdvance,
                'changeTimePointAdvance' => $selected->back->mealPolicy[1]->changeTimePointAdvance,
                'refundTimePointAadvance' => $selected->back->mealPolicy[1]->refundTimePointAadvance,
                'suitableAirline' => $selected->back->mealPolicy[1]->suitableAirline,
                'modifyStipulate' => $selected->back->mealPolicy[1]->modifyStipulate);
            
            $hc_obj->adult_tuigai = $adult_tuigai;
            $hc_obj->child_tuigai = $child_tuigai;

            $hc_lvke = array();

            // 航程旅客
            foreach ($lvke as $v) {
                $hc_my_lvke = new stdClass();
                $hclc = new stdClass();

                $hclc->dingdanid = $dingdanid; // 订单ID
                // 保存的时候要添加的航程 id
                //$hclc->hangchengid = $hangchengid ; // 航程ID // 要与上面的航程合并起来

                $zhengjianleixing = array_search(strval($v->zhengjianleixing), $this->config->item('证件类型'));
                $hclc->hangbanhao = $hbh;  // 航班号
                $hclc->lvkeid = $v->id;   // 旅客ID
                $hclc->chuangjianshijian = date("Y-m-d H:i:s", time());
                $hclc->zhongwenming = $v->zhongwenming;
                $hclc->shifouertong = $v->shifouertong;
                $hclc->chushengriqi = $v->chushengriqi;
                //$hclc->zhengjianleixing = $zhengjianleixing;
                $hclc->zhengjianleixing = $v->zhengjianleixing;
                $hclc->zhengjianhaoma = $v->zhengjianhaoma;
                $hclc->cangwei = $hangcheng->cangwei;
                //$hclc->seatCode = $hangcheng->seatCode;
                $hclc->zhuangtai = '';

                $hclc->xingbie = $v->xingbie;
                $hclc->guoji = $v->guoji;
                $hclc->zhengjianyouxiaoqi = $v->zhengjianyouxiaoqi;
                $hclc->chushengdi = $v->chushengdi;
                $hclc->shoujihao = $v->shoujihao;
                $hclc->lianxidianhua = $v->lianxidianhua;
                $hclc->email = $v->email;
                if ($v->shifouertong == 0) {
                    $hclc->seatCode = $hangcheng->seatCode;
                    $hclc->piaomianjia = $selected->back->seatItem->piaomianjia; // 票面价

                    $hclc->airlineCode = $selected->back->mealPolicy[0]->airlineCode;

                    // $hclc->airlineCode = $selected->back->mealPolicy->adult->airlineCode;
                    // $hclc->refundStipulate = $selected->back->mealPolicy->adult->refundStipulate;
                    // $hclc->changeStipulate = $selected->back->mealPolicy->adult->changeStipulate;
                    // $hclc->modifyStipulate = $selected->back->mealPolicy->adult->modifyStipulate;
                    // $hclc->suitableAirline = $selected->back->mealPolicy->adult->suitableAirline;
                } else {
                    $hclc->seatCode = 'Y';
                    $hclc->piaomianjia = $costdetail->back->child->unitprice; // 票面价

                    $hclc->airlineCode = $selected->back->mealPolicy->child->airlineCode;

                    // $hclc->airlineCode = $selected->back->mealPolicy->child->airlineCode;
                    // $hclc->refundStipulate = $selected->back->mealPolicy->child->refundStipulate;
                    // $hclc->changeStipulate = $selected->back->mealPolicy->child->changeStipulate;
                    // $hclc->modifyStipulate = $selected->back->mealPolicy->child->modifyStipulate;
                    // $hclc->suitableAirline = $selected->back->mealPolicy->child->suitableAirline;
                }

                $hc_my_lvke->lk = $hclc;

                // 用户保险
                if ($baoxian->accident->buy == true && $baoxian->accident->back->product != '') {
                    $bx = new stdClass();
                    $bx->dingdanid = $dingdanid;
                    $bx->baoxianchanpinid = $baoxian->accident->back->product->id;  // 保险产品Id
                    // 航程旅客ID 
                    //$bx->hangchenglvkeid = 1;  

                    $bx->dingdanzhuangtai = 1;  // 订单状态
                    $bx->baodanzhuangtai = 1;  // 保单状态
                    $bx->dingdanzongjia = $baoxian->accident->back->unitprice;  // 订单总价
                    $bx->baoxianleixing = $baoxian->accident->back->product->chanpinleibie;  // 保险类型
                    $bx->chuangjianshijian = date("Y-m-d H:i:s", time());  // 创建时间

                    $hc_my_lvke->accident = $bx;
                }

                if ($baoxian->dallyover->buy == true && $baoxian->dallyover->back->product != '') {
                    $bx = new stdClass();
                    $bx->dingdanid = $dingdanid;
                    $bx->baoxianchanpinid = $baoxian->dallyover->back->product->id;  // 保险产品Id
                    // 航程旅客ID 
                    //$bx->hangchenglvkeid = 1;  

                    $bx->dingdanzhuangtai = 1;  // 订单状态
                    $bx->baodanzhuangtai = 1;  // 保单状态
                    $bx->dingdanzongjia = $baoxian->dallyover->back->unitprice;  // 订单总价
                    $bx->baoxianleixing = $baoxian->dallyover->back->product->chanpinleibie;  // 保险类型
                    // $bx->baoxiandingdanhao = '';  // 保险订单号  不知

                    $bx->chuangjianshijian = date("Y-m-d H:i:s");  // 创建时间

                    $hc_my_lvke->dallyover = $bx;
                }

                $hc_lvke[] = $hc_my_lvke;
            }
            $hc_obj->lvke = $hc_lvke;
            $hc_obj_ar[] = $hc_obj;
        }
        return $hc_obj_ar;
    }

    /**
     * 对象数组转为普通数组 
     * 
     */
    public function object2array($object) {
        if (is_object($object)) {
            $array = array();
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

}

