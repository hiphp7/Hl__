<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 航程 -- 航程旅客
 */
class mhangchenglvke extends CI_Model {

    /**
     * 获取 旅客中改签是儿童或者成人的个数
     */
    public function getGaiQianRenShu($dingdanid, $ischild = false) {
        $result = new stdClass();
        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ? and m.shifougaiqian = ? ';
        if ($ischild == true) {
            $sql = $sql . 'and m.chushengriqi < date_add(now(), interval -12 year)';
        } else {
            $sql = $sql . 'and m.chushengriqi between date_add(now(), interval -12 year) and date_add(now(), interval -2 year)';
        }
        $res = $this->db->query($sql, array(true, $dingdanid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $result->id = $r->id;
            }
        }
        return $result;
    }

    /**
     * 获取订单的旅客人数
     * $id 为订单 id
     * $ertong 是否儿童，默认为 false
     */
    public function getPersonNum($id, $ertong) {

        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ? and m.shifouertong = ?';
        $res = $this->db->query($sql, array($id, $ertong));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }
        return $mycount;
    }

    /**
     * 获取 旅客人数
     */
    public function getNum($dingdanid = 0) {
        $result = new stdClass();
        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ?';

        $res = $this->db->query($sql, array($dingdanid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $result->id = $r->id;
            }
        }
        return $result;
    }

    /**
     * 获取航程旅客
     */
    public function getHangChengLvKe($hangchengid) {
        $sql = 'select m.id as id, m.lvkeid as lvkeid, 
                   m.shifouertong as shifouertong,
		   m.pingtaidingdanhao as pingtaidingdanhao,
           m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
           m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
           m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
           m.xingbie as xingbie, m.chushengriqi as chushengriqi,
           m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
           m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
           m.chushengdi as chushengdi, m.shoujihao as shoujihao,
           m.seatCode as seatCode, m.refundStipulate as refundStipulate,
           m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
           m.modifyStipulate as modifyStipulate,
		   m.zhuangtai as zhuangtai,
           m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.hangchengid = ?';
        $res = $this->db->query($sql, array($hangchengid));
        return $res->result();
    }

    /**
     * 获取航程旅客
     */
    public function getHangChengLvKe_et($hangchengid, $shifouertong) {
        $sql = 'select m.id as id, m.lvkeid as lvkeid, 
                   m.shifouertong as shifouertong,
		   m.pingtaidingdanhao as pingtaidingdanhao,
           m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
           m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
           m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
           m.xingbie as xingbie, m.chushengriqi as chushengriqi,
           m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
           m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
           m.chushengdi as chushengdi, m.shoujihao as shoujihao,
           m.seatCode as seatCode, m.refundStipulate as refundStipulate,
           m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
           m.modifyStipulate as modifyStipulate,
           m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.hangchengid = ? and m.shifouertong = ?';
        $res = $this->db->query($sql, array($hangchengid, $shifouertong));
        return $res->result();
    }
    
    /**
     * 获取航程旅客 改签
     */
    public function getHangChengLvKe_GaiQianEx($hangchengid, $ar) {
       
        $str = '(';
        $mycount = count($ar);
        $index = 0;
        foreach ($ar as $v) {
            
            if ($index != $mycount - 1) {
                $str.= $v->hangchenglvkeid . ',';
            } else {
                $str.= $v->hangchenglvkeid;
            }
            $index++;
        }
        $str.= ')';
        
        $sql = 'select m.id as id, m.lvkeid as lvkeid, 
                   m.shifouertong as shifouertong,
		   m.pingtaidingdanhao as pingtaidingdanhao,
           m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
           m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
           m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
           m.xingbie as xingbie, m.chushengriqi as chushengriqi,
           m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
           m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
           m.chushengdi as chushengdi, m.shoujihao as shoujihao,
           m.seatCode as seatCode, m.refundStipulate as refundStipulate,
           m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
           m.modifyStipulate as modifyStipulate,
           m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.hangchengid = ? and 
           m.id in ' . $str;
        $res = $this->db->query($sql, array($hangchengid));
        return $res->result();
    }

    /**
     * 获取航程旅客 改签
     */
    public function getHangChengLvKe_GaiQian($ar) {
        $hangchengid = '(';
        
        $ar_hangcheng = array();
        $str = '(';
        $mycount = count($ar);
        $index = 0;
        foreach ($ar as $v) {
            if(!array_key_exists(intval($v->hangchengid), $ar_hangcheng))
            {
                 $ar_hangcheng[intval($v->hangchengid)] = $v->hangchengid;
            }
            if ($index != $mycount - 1) {
                $str.= $v->hangchenglvkeid . ',';
            } else {
                $str.= $v->hangchenglvkeid;
            }
            $index++;
        }
        $str.= ')';
        
        $my_hc_count = count($ar_hangcheng);
        $index_hc = 0;
        foreach ($ar_hangcheng as $v) {
            if ($index_hc != $my_hc_count - 1) {
                $hangchengid.= $v . ',';
            } else {
                $hangchengid.= $v;
            }
            $index_hc++;
        }
        $hangchengid.= ')';

        $sql = 'select m.id as id, m.lvkeid as lvkeid, 
                   m.shifouertong as shifouertong,
		   m.pingtaidingdanhao as pingtaidingdanhao,
           m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
           m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
           m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
           m.xingbie as xingbie, m.chushengriqi as chushengriqi,
           m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
           m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
           m.chushengdi as chushengdi, m.shoujihao as shoujihao,
           m.seatCode as seatCode, m.refundStipulate as refundStipulate,
           m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
           m.modifyStipulate as modifyStipulate,
           m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.hangchengid in '.$hangchengid.' and 
           m.id in ' . $str;
        $res = $this->db->query($sql);
        return $res->result();
    }

    /**
     * 获取航程旅客
     */
    public function getObjById($id) {
        $sql = 'select m.id as id, m.lvkeid as lvkeid, 
                   m.shifouertong as shifouertong,
		   m.pingtaidingdanhao as pingtaidingdanhao,
           m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
           m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
           m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
           m.xingbie as xingbie, m.chushengriqi as chushengriqi,
           m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
           m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
           m.chushengdi as chushengdi, m.shoujihao as shoujihao,
           m.hangbanhao as hangbanhao, m.seatCode as seatCode,
           m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.id = ?';
        $res = $this->db->query($sql, array($id));
        return $res->result();
    }

    /**
     * 显示乘客类型
     */
    public function tongji_hangcheng($hangchengid, $dingdanid) {
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("yonghu/myonghu", "myonghu");

        $dingdan_chupiaobianma = $this->mdingdan->getObj($dingdanid);
        $hangcheng_obj = $this->mhangcheng->getMyObj($hangchengid);
        // 获取用户电话
        $yonghu_obj = $this->myonghu->getObj(intval($dingdan_chupiaobianma->yonghuid));

        $hangbanhao = $hangcheng_obj->hangbanhao;
        $qifeijichang = $hangcheng_obj->qifeijichang;
        $daodajichang = $hangcheng_obj->daodajichang;
        $qifeishijian = $hangcheng_obj->qifeishijian;
        $seatCode = $hangcheng_obj->seatCode;
        $lianxidianhua = $yonghu_obj->shoujihaoma;

        $lst = array();
        $sql = 'select count(m.id) as id, m.id as mid, m.shifouertong as shifouertong, m.cangwei as cangwei,m.seatCode as seatCode, m.piaomianjia as piaomianjia, m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, m.chupiaobianma as chupiaobianma from hangchenglvke as m where m.hangchengid = ? group by m.shifouertong';
        $res = $this->db->query($sql, array($hangchengid));

        foreach ($res->result() as $r) {
            $o = new stdClass();
            $o->chengkeshuliang = $r->id;
            $o->zhongwenming = $r->zhongwenming;
            $o->yingwenming = $r->yingwenming;
            if (!empty($r->shifouertong) && $r->shifouertong == '1') {
				$o->piaomiandanjia = $r->piaomianjia; // 销售票面价
				$o->jijianfei = 0;
                $o->shifouertong = '儿童';
                $lvke = $this->getHangChengLvKe_et($hangchengid, 1);
                // 占座指令
                $o->zanzuo = $this->zz($hangbanhao, $qifeijichang, $daodajichang, $qifeishijian, $seatCode, $lvke, $lianxidianhua);
            } else {
				$o->piaomiandanjia = $hangcheng_obj->piaomiandanjia; // 销售票面价
				$o->jijianfei = $hangcheng_obj->jijianfei;
                $o->shifouertong = '成人';
                $lvke = $this->getHangChengLvKe_et($hangchengid, 0);
                // 占座指令
                $o->zanzuo = $this->zz($hangbanhao, $qifeijichang, $daodajichang, $qifeishijian, $seatCode, $lvke, $lianxidianhua);
            }
			$o->cangwei = $r->seatCode;
            $o->chupiaobianma = $r->chupiaobianma;
			$o->piaomianjia = $r->piaomianjia; // 折扣票面价
            if (!empty($hangcheng_obj)) {    
                
                $o->fandian = $hangcheng_obj->fandian;
                $o->fanqian = $hangcheng_obj->fanqian;
            } else {
                $o->piaomiandanjia = '';
                $o->jijianfei = '';
                $o->fandian = '';
                $o->fanqian = '';
            }
            $o->hangchengid = $hangchengid;
            $o->mid = $r->mid;
            $o->dingdanid = $dingdanid;

            $lst[] = $o;
        }
        return $lst;
    }

    /**
     * $hangbanhao 航班号
     * $qifeijichang 起飞机场
     * $daodajichang 到达机场
     * $seatCode 仓位
     * $lvke 旅客列表
     * $lianxidianhua 联系电话 
     */
    public function zz($hangbanhao, $qifeijichang, $daodajichang, $qifeishijian, $seatCode, $lvke, $lianxidianhua) {

        $date = strtotime($qifeishijian);
        $airport = $this->config->item("airport_short");
        $zhangzuo = 'SS:' . $hangbanhao . ' ' . $seatCode . ' ' . date('d', $date) . date('M', $date) . ' ' .
                strval(array_search($qifeijichang, $airport)) . strval(array_search($daodajichang, $airport)) .
                ' NN' . strval(count($lvke));
        $zhangzuo .= '<br/>NM ';
        // 扫描旅客
        $index = 1;
        foreach ($lvke as $v) {
            if ($v->shifouertong == 0) {
                if ($index == count($lvke)) {
                    $zhangzuo .= '1' . $v->zhongwenming;
                } else {
                    $zhangzuo .= '1' . $v->zhongwenming . ' ';
                }
            } else {
                if ($index == count($lvke)) {
                    $zhangzuo .= '1' . $v->zhongwenming . 'CHD';
                } else {
                    $zhangzuo .= '1' . $v->zhongwenming . 'CHD ';
                }
            }
            $index++;
        }
        $zhangzuo .= '<br/>';

        $index = 1;
        foreach ($lvke as $v) {
            if ($index == 1) {
                $zhangzuo .= 'SSR FOID ' . substr($hangbanhao, 0, 2) . ' HK/NI' . $v->zhengjianhaoma . '/p' . $index;
            } else {
                $zhangzuo .= '<br/>SSR FOID ' . substr($hangbanhao, 0, 2) . ' HK/NI' . $v->zhengjianhaoma . '/p' . $index;
            }
            $index++;
        }
        $zhangzuo .= '<br/>';
        $zhangzuo .= 'OSI ' . substr($hangbanhao, 0, 2) . ' CTCT' . $lianxidianhua . '<br/>';
        $zhangzuo .= 'TK:TL/1200/./SZX462' . '<br/>';
        return $zhangzuo;
    }

    /**
     * 通过 乘客姓名
     * 查询返回 id 、 航程 id 、订单 id
     */
    public function getIdByName($zhongwenming, $piaohao) {
        $result = '';
        $ps = array();
        $sql = 'select m.id as id from hangchenglvke as m where ';
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . 'and m.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        }

        if (!empty($piaohao) && $piaohao != '') {
            $sql = $sql . 'and m.piaohao = ? ';
            $ps[] = $piaohao;
        }

        $sql = str_replace("where and", "where", $sql);
        if (substr(trim($sql), -5) == 'where') {
            $sql = substr(trim($sql), 0, strlen(trim($sql)) - 5);
        }
        $res = $this->db->query($sql, $ps);
        if ($res->num_rows() > 0) {
            $result = '(';
            $db_reslt = $res->result();
            $index = 0;
            foreach ($db_reslt as $r) {
                if ($index == count($db_reslt) - 1) {
                    $result = $result . $r->id;
                } else {
                    $result = $result . $r->id . ',';
                }
                $index++;
            }
            $result = $result . ')';
        }
        return $result;
    }

    /**
     * 通过 乘客姓名
     * 查询返回 id 、 航程 id 、订单 id
     */
    public function getDingDanIdByName($zhongwenming, $piaohao) {
        $result = '';
        $ps = array();
        $sql = 'select distinct m.dingdanid as dingdanid from hangchenglvke as m where ';
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . 'and m.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        }

        if (!empty($piaohao) && $piaohao != '') {
            $sql = $sql . 'and m.piaohao = ? ';
            $ps[] = $piaohao;
        }

        $sql = str_replace("where and", "where", $sql);
        if (substr(trim($sql), -5) == 'where') {
            $sql = substr(trim($sql), 0, strlen(trim($sql)) - 5);
        }
        $res = $this->db->query($sql, $ps);
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

    /**
     * 通过 乘客姓名
     * 查询返回 id 、 航程 id 、订单 id
     */
    public function getGaiQianIdByName($zhongwenming, $piaohao) {
        $result = '';
        $ps = array();
        $sql = 'select distinct m.dingdanid as id from gaiqian as m, hangchenglvke as h where m.hangchenglvkeid = h.id ';
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . 'and m.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        }

        if (!empty($piaohao) && $piaohao != '') {
            $sql = $sql . 'and m.piaohao = ? ';
            $ps[] = $piaohao;
        }

        $sql = str_replace("where and", "where", $sql);
        if (substr(trim($sql), -5) == 'where') {
            $sql = substr(trim($sql), 0, strlen(trim($sql)) - 5);
        }
        $res = $this->db->query($sql, $ps);
        if ($res->num_rows() > 0) {
            $result = '(';
            $db_reslt = $res->result();
            $index = 0;
            foreach ($db_reslt as $r) {
                if ($index == count($db_reslt) - 1) {
                    $result = $result . $r->id;
                } else {
                    $result = $result . $r->id . ',';
                }
                $index++;
            }
            $result = $result . ')';
        }
        return $result;
    }

}

