<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 订单
 */
class mdingdan extends CI_Model {

    /**
     * 获取 id 号
     */
    public function getObjById($dingdanhao) {
        $obj = new stdClass();

        $sql = 'select m.id as id from dingdan as m where m.dingdanhao = ?';
        $res = $this->db->query($sql, array($dingdanhao));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->id = $r->id;
            }
        }

        return $obj;
    }
    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $obj = new stdClass();
        if ($id != 0) {
            $sql = 'select m.yonghuid as yonghuid, m.dingdanhao as dingdanhao, m.chupiaobianma as chupiaobianma,
                m.dingdanzhuangtai as dingdanzhuangtai,
                m.dingdanzonge as dingdanzonge 
                from dingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->yonghuid = $r->yonghuid;
                    $obj->dingdanhao = $r->dingdanhao;
                    $obj->chupiaobianma = $r->chupiaobianma;
                    $obj->dingdanzhuangtai = $r->dingdanzhuangtai;
                    $obj->dingdanzonge = $r->dingdanzonge;
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
            //$myconfig_dingdanzhuangtai = $this->config->item("订单状态");
            $myconfig_zhifufangshi = $this->config->item("支付方式");
            $myconfig_chupiaozhuangtai = $this->config->item("出票状态");

            $this->load->model("sanfang/msanfanggongsi", "msanfanggongsi");

            $sql = 'select m.id as id, m.dingdanhao as dingdanhao, m.sanfanggongsi as sanfanggongsi,
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
                m.wanchengshijian as wanchengshijian,
                m.chulishijian as chulishijian,
                m.yidipingtai as yidipingtai,
                m.yidicaigoujine as yidicaigoujine,
                m.yididingdanhao as yididingdanhao,
                m.yidiqitashuoming as yidiqitashuoming,
                m.prn as prn,
				m.isgaiqian as isgaiqian,
                m.caigoujine as caigoujine,
                m.qitashuoming as qitashuoming 
                from dingdan as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj->dingdanhao = $r->dingdanhao;
                    $obj->id = $r->id;
					$obj->isgaiqian = $r->isgaiqian;
                    if (!empty($r->chupiaozhuangtai)) {
                        $obj->chupiaozhuangtai = $myconfig_chupiaozhuangtai[$r->chupiaozhuangtai];
                    } else {
                        $obj->chupiaozhuangtai = '';
                    }

                    if (!empty($r->sanfanggongsi) && $r->sanfanggongsi > 0) {
                        $sf = $this->msanfanggongsi->getObj($r->sanfanggongsi);
                        $obj->dingdanlaiyuan = $sf->gongsimingcheng;
                    } else {
                        $obj->dingdanlaiyuan = '自营';
                    }

                    $obj->fukuanshijian = $r->fukuanshijian;
                    $obj->wanchengshijian = $r->wanchengshijian;
					if(empty($r->zhifufangshi)){
						$obj->zhifufangshi = '';
					}else{
						$obj->zhifufangshi = $myconfig_zhifufangshi[$r->zhifufangshi];
					};
                    
                    $obj->dingdanzonge = $r->dingdanzonge;
                    $obj->chulishijian = $r->chulishijian;
					$obj->lianxiren = $r->lianxiren;
                    $obj->lianxirendianhua = $r->lianxirendianhua;
                    
                    $obj->yidipingtai = $r->yidipingtai;
                    $obj->yidicaigoujine = $r->yidicaigoujine;
                    $obj->yididingdanhao = $r->yididingdanhao;
                    $obj->yidiqitashuoming = $r->yidiqitashuoming;
                    $obj->prn = $r->prn;
                    $obj->caigoujine = $r->caigoujine;
                    $obj->qitashuoming = $r->qitashuoming;
                }
            }
        }
        return $obj;
    }

    /**
     * 对于事物要控制的部分，返回的都是要插入的 $obj
     */
    public function save($yonghuid, $costdetail, $mail, $zhifufangshi = 2) {
        $obj = array();
        date_default_timezone_set("Asia/Shanghai");

        // 用户id
        $obj['yonghuid'] = $yonghuid;
        // 支付方式
        $obj['zhifufangshi'] = $zhifufangshi;
        // 订单总价
        $obj['dingdanzonge'] = $costdetail->totalprice;
        if ($costdetail->insurances->accident > 0 || $costdetail->insurances->dallyover > 0) {
            $obj['baoxian'] = 1;
        } else {
            $obj['baoxian'] = 0;
        }
        // 报销凭证- 是否邮发票
        $obj['baoxiaopingzheng'] = $mail->isMail ? 1 : 0; 
        // 收件人名字
        $obj['shoujianren'] = $mail->shoujianrenmingzi; 
        // 收件人地址
        $obj['youjidizhi'] = $mail->dizhi;  
        // 收件人手机号
        $obj['youjirendianhua'] = $mail->shoujihao; 
        // 等待处理 -订单状态
        $obj['dingdanzhuangtai'] = 1; 
        // 发送短信
        $obj['fasongduanxin'] = 1; 
        // 付款时间
        $obj['fukuanshijian'] =  date("Y-m-d H:i:s" ,time());
        
        // 保存订单
        $this->db->insert('dingdan', $obj);
        $dingdanid = $this->db->insert_id();
        return $dingdanid;
    }
    
    /**
     * 对于事物要控制的部分，返回的都是要插入的 $obj
     */
    public function getSaveArray($yonghuid, $costdetail, $mail, $zhifufangshi = 2) {
        $obj = array();
        date_default_timezone_set("Asia/Shanghai");

        // 用户id
        $obj['yonghuid'] = $yonghuid;
        // 支付方式
        $obj['zhifufangshi'] = $zhifufangshi;
        // 订单总价
        $obj['dingdanzonge'] = $costdetail->totalprice;
        if ($costdetail->insurances->accident > 0 || $costdetail->insurances->dallyover > 0) {
            $obj['baoxian'] = 1;
        } else {
            $obj['baoxian'] = 0;
        }
        // 报销凭证- 是否邮发票
        $obj['baoxiaopingzheng'] = $mail->isMail ? 1 : 0; 
        // 收件人名字
        $obj['shoujianren'] = $mail->shoujianrenmingzi; 
        // 收件人地址
        $obj['youjidizhi'] = $mail->dizhi;  
        // 收件人手机号
        $obj['youjirendianhua'] = $mail->shoujihao; 
        // 等待处理 -订单状态
        $obj['dingdanzhuangtai'] = 1;
		// 出票状态
        $obj['chupiaozhuangtai'] = 0;
        // 发送短信
        $obj['fasongduanxin'] = 1; 
        // 付款时间
        $obj['fukuanshijian'] =  date("Y-m-d H:i:s" ,time());
        
        // 返回要保存的对象
        return $obj;
    }
    
    /**
     * 对于事物要控制的部分，返回的都是要插入的 $obj
     */
    public function getSaveObj($yonghuid, $costdetail, $mail, $zhifufangshi = 2) {
        $obj = new stdClass();
        date_default_timezone_set("Asia/Shanghai");
		
		$this->load->model("yonghu/myonghu", "myonghu");

        // 用户id
        $obj->yonghuid= $yonghuid;
        // 支付方式
        $obj->zhifufangshi= $zhifufangshi;
        // 订单总价
        $obj->dingdanzonge= $costdetail->totalprice;
        if ($costdetail->insurances->accident > 0 || $costdetail->insurances->dallyover > 0) {
            $obj->baoxian= 1;
        } else {
            $obj->baoxian= 0;
        }
        // 报销凭证- 是否邮发票
        $obj->baoxiaopingzheng= $mail->isMail ? 1 : 0; 
        // 收件人名字
        $obj->shoujianren= $mail->shoujianrenmingzi; 
        // 收件人地址
        $obj->youjidizhi= $mail->dizhi;  
        // 收件人手机号
        $obj->youjirendianhua= $mail->shoujihao; 
        // 等待处理 -订单状态
        $obj->dingdanzhuangtai= 0; 
        // 出票状态
        $obj->chupiaozhuangtai = 0;
        // 发送短信
        $obj->fasongduanxin= 1; 
        // 付款时间
		$time = date("Y-m-d H:i:s");
        
		$obj->chuangjianshijian=  $time;
		
		// 新建联系人和联系电话
        $obj_yonghu = $this->myonghu->getObj($yonghuid);
        $obj->lianxiren = $obj_yonghu->xingming;
        $obj->lianxirendianhua = $obj_yonghu->shoujihaoma;
        
        // 返回要保存的对象
        return $obj;
    }
	
	/**
     * 通过订单 id 获取
     */
    public function getDuanXinTongZhi($dingdanid) {
        
        $this->load->model("mairport");
        $obj = new stdClass();
        $sql = 'select m.lianxiren as lianxiren, m.lianxirendianhua as lianxirendianhua, 
            m.fasongduanxin as fasongduanxin, m.baoxian as baoxian,
            m.chupiaobianma as chupiaobianma,
			h.dstCity as dstCity, h.orgCity as orgCity,
            h.hangkonggongsi as hangkonggongsi, h.hangbanhao as hangbanhao,
            h.qifeijichang as qifeijichang, h.daodajichang as daodajichang,
            h.qifeihangzhanlou as qifeihangzhanlou, h.daodahangzhanlou as daodahangzhanlou,
            h.qifeishijian as qifeishijian, h.daodashijian as daodashijian 
            from dingdan as m, hangcheng as h where m.id = h.dingdanid 
            and m.id = ?';
        $res = $this->db->query($sql, array($dingdanid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->name = $r->lianxiren;
                $obj->tel = $r->lianxirendianhua;
                // 是否发送短信
                $obj->fasongduanxin = $r->fasongduanxin;
                // 是否包含保险
                $obj->baoxian = $r->baoxian;
                $obj->airline = $r->hangkonggongsi;
                $obj->flight = $r->hangbanhao;
				$obj->dep = $r->dstCity;
                $obj->arr = $r->orgCity;
                $obj->date = $r->qifeishijian;
                $obj->deptime = $r->daodashijian;
                $obj->chupiaobianma = $r->chupiaobianma;
                
            }
        }
        return $obj;
    }
	
	/**
     * 通过订单 id 获取 发送短信的信息
     */
    public function getDuanXinTongZhiEx($dingdanid) {

        $this->load->model("mairport");
        $obj = new stdClass();
        $sql = 'select m.lianxiren as lianxiren, m.lianxirendianhua as lianxirendianhua, 
            m.fasongduanxin as fasongduanxin, m.baoxian as baoxian,
            m.chupiaobianma as chupiaobianma 
            from dingdan as m where m.id = ?';
        $res = $this->db->query($sql, array($dingdanid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->name = $r->lianxiren;
                $obj->tel = $r->lianxirendianhua;
                // 是否发送短信
                $obj->fasongduanxin = $r->fasongduanxin;
                // 是否包含保险
                $obj->baoxian = $r->baoxian;
            }
        }

        $index = 1;
        $sql = 'select h.hangkonggongsi as hangkonggongsi, h.hangbanhao as hangbanhao, 
            h.qifeijichang as qifeijichang, h.daodajichang as daodajichang,
            h.qifeihangzhanlou as qifeihangzhanlou, h.daodahangzhanlou as daodahangzhanlou,
            h.qifeishijian as qifeishijian, h.daodashijian as daodashijian 
            from hangcheng as h where h.dingdanid = ? order by h.qifeishijian asc';
        $res = $this->db->query($sql, array($dingdanid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {

                if ($index == 1) {
                    //$obj->chupiaobianma = $r->chupiaobianma;
                    $obj->airline = $r->hangkonggongsi;
                    $obj->flight = $r->hangbanhao;
                    $obj->dep = $this->mairport->getObj($r->qifeijichang)->City;
                    $obj->arr = $this->mairport->getObj($r->daodajichang)->City;
                   
				   $obj->date = date("Y-m-d", strtotime( $r->qifeishijian)); // $r->qifeishijian;
                    $obj->deptime = date("H:i", strtotime( $r->qifeishijian));
                    //$obj->deptime = $r->daodashijian;
                } else {
                    //$obj->chupiaobianma_fan = $r->chupiaobianma;
                    $obj->airline_fan = $r->hangkonggongsi;
                    $obj->flight_fan = $r->hangbanhao;
                    $obj->dep_fan = $this->mairport->getObj($r->qifeijichang)->City;
                    $obj->arr_fan = $this->mairport->getObj($r->daodajichang)->City;
                   
					$obj->date_fan = date("Y-m-d", strtotime( $r->qifeishijian)); // $r->qifeishijian;
                    $obj->deptime_fan = date("H:i", strtotime( $r->qifeishijian));
                    //$obj->deptime_fan = $r->daodashijian;
                }
                $index++;
            }
        }
        return $obj;
    }
	
	/**
     * 通过订单 id 获取
     */
    public function getDuanXinTongZhi_ByDingdanhao($dingdanhao) {
        
        $this->load->model("mairport");
        $obj = new stdClass();
        $sql = 'select m.lianxiren as lianxiren, m.lianxirendianhua as lianxirendianhua, 
            m.fasongduanxin as fasongduanxin, m.baoxian as baoxian,
            m.chupiaobianma as chupiaobianma,
            h.hangkonggongsi as hangkonggongsi, h.hangbanhao as hangbanhao,
            h.qifeijichang as qifeijichang, h.daodajichang as daodajichang,
            h.qifeihangzhanlou as qifeihangzhanlou, h.daodahangzhanlou as daodahangzhanlou,
            h.qifeishijian as qifeishijian, h.daodashijian as daodashijian 
            from dingdan as m, hangcheng as h where m.id = h.dingdanid 
            and m.dingdanhao = ?';
        $res = $this->db->query($sql, array($dingdanhao));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->name = $r->lianxiren;
                $obj->tel = $r->lianxirendianhua;
                // 是否发送短信
                $obj->fasongduanxin = $r->fasongduanxin;
                // 是否包含保险
                $obj->baoxian = $r->baoxian;
                $obj->airline = $r->hangkonggongsi;
                $obj->flight = $r->hangbanhao;
                $obj->dep = $this->mairport->getObj($r->qifeijichang)->City;
                $obj->arr = $this->mairport->getObj($r->daodajichang)->City;
                $obj->date = $r->qifeishijian;
                $obj->deptime = $r->daodashijian;
                $obj->chupiaobianma = $r->chupiaobianma;
                
            }
        }
        return $obj;
    }
	
	/**
     * 通过 参数查询
     * 查询返回 id 、 航程 id 、订单 id
     */
    public function getIdByPs($chupiaobianma, $dingdanhao, $dingdanzhuangtai, $fukuanshijian_begin, $fukuanshijian_end) {
        $result = '';
        $ps = array();
        $sql = 'select m.id as id from dingdan as m where ';
        if(!empty($chupiaobianma) && $chupiaobianma != '')
        {
            $sql = $sql.'m.chupiaobianma = ? ';
            $ps[] = $chupiaobianma;
        }
        
        if(!empty($dingdanhao) && $dingdanhao != '')
        {
            $sql = $sql.'m.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }
        
        if(!empty($dingdanzhuangtai) && $dingdanzhuangtai != '')
        {
            $sql = $sql.'m.dingdanzhuangtai = ? ';
            $ps[] = $dingdanzhuangtai;
        }
        
        if(!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '')
        {
            $sql = $sql.'and m.fukuanshijian between ? and ? ';
            $ps[] = $fukuanshijian_begin;
            $ps[] = $fukuanshijian_end;
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
