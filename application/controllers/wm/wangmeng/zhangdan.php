<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟账单
 */
class zhangdan extends CI_Controller {
    /*
     * 首页
     */

    private $chanpin = array(
        0 => "国内机票",
        1 => "火车票",
        2 => "国内酒店",
        3 => "机票保险"
    );
    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std2 = new stdClass();
        $std2->index = 0;
        $std2->display_name = '账单编号';
        $std2->name = 'zhangdanhao';
        $std2->show = true;
        $li[0] = $std2;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '账单开始日期';
        $std2->name = 'kaishiriqi';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '账单结束日期';
        $std3->name = 'jieshuriqi';
        $std3->show = true;
        $li[2] = $std3;

        $std3 = new stdClass();
        $std3->index = 3;
        $std3->display_name = '出账日期';
        $std3->name = 'chuzhangriqi';
        $std3->show = true;
        $li[3] = $std3;

        $std3 = new stdClass();
        $std3->index = 4;
        $std3->display_name = '结算方式';
        $std3->name = 'qingsuanfangshi';
        $std3->show = true;
        $li[4] = $std3;

        $std3 = new stdClass();
        $std3->index = 5;
        $std3->display_name = '佣金(元)';
        $std3->name = 'yongjinzonge';
        $std3->show = true;
        $li[5] = $std3;

        $std3 = new stdClass();
        $std3->index = 6;
        $std3->display_name = '账单状态';
        $std3->name = 'zhuangtai';
        $std3->show = true;
        $li[6] = $std3;

        $std3 = new stdClass();
        $std3->index = 7;
        $std3->display_name = '结算时间';
        $std3->name = 'jiesuanshijian';
        $std3->show = true;
        $li[7] = $std3;

        $this->li = $li;
    }

    public function index() {
		$wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $sql_zhanghu = 'select m.shoukuanpingtai as shoukuanpingtai, m.huzhuming as huzhuming, m.zhanghao as zhanghao from wm_shoukuanzhanghu as m where m.shanghuhao = ? limit 1';
        $query_zhanghu = $this->db->query($sql_zhanghu, array($shanghuhao));
        $zhanghu = $query_zhanghu->row();
        if (empty($zhanghu->zhanghao)) {
            redirect('wm/wangmeng/zhifu/index');
        } else {    
			$data['li'] = $this->li;
			$this->load->view('wm/wangmeng/zhangdan/index', $data);
		}
    }

    /**
     * 获取订单
     */
    public function all() {
        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('mysimpleencrypt');
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
        $zhuangtai = $this->input->post('zhuangtai');
        $cishu = $this->input->post('cishu');
        if ($cishu == 0) {
            $result = new stdClass();
            $result->myData = array();
            $result->iTotalDisplayRecords = 0;
            $result->iTotalRecords = 0;
            echo json_encode($result);
            exit;
        }

        $mysort = 'id';
        $mydir = 'desc';
        // if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
        //     $mysort = $this->li[$sortid]->name;
        //     $mydir = $dir;
        // }
        // $mysort = 'id';
        // $mydir = 'desc';

        $sql = 'SELECT m.id as id,m.zhangdanhao as zhangdanhao,m.kaishiriqi as kaishiriqi, m.jieshuriqi as jieshuriqi,m.jiesuanshijian as jiesuanshijian,m.jiesuanrenid as jiesuanrenid,m.yongjinzonge as yongjinzonge,m.zhuangtai as zhuangtai,m.qingsuanfangshi as qingsuanfangshi,m.qingsuanriqi as qingsuanriqi ,m.chuzhangriqi as chuzhangriqi FROM wm_shanghuzhangdan as m ';

        $sqlcount = 'select count(m.id) as id from wm_shanghuzhangdan as m ';

        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $sqlcount = $sqlcount . 'where  m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];

        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql .= 'and  m.jiesuanshijian >= ?  and  m.jiesuanshijian <= ? ';
            $sqlcount .= 'and m.jiesuanshijian >= ? and m.jiesuanshijian  <= ? ';
            $ps[] = $datetimeStart." 0:0:0";
            $ps[] = $datetimeEnd." 23:59:59";
        }

        if (!empty($zhuangtai) && $zhuangtai != '') {
            $sql = $sql . 'and m.zhuangtai = ? ';
            $sqlcount = $sqlcount . 'and m.zhuangtai = ? ';
            if ($zhuangtai == 1) {
                $ps[] = 1;
            } else {
                $ps[] = 0;
            }
        }

        // 不变的
        $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

        $sql = str_replace("where order", "order", $sql);
        $sql = str_replace("where and", "where", $sql);

        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }
        $res = $this->db->query($sql, $ps);
        $res_count = $this->db->query($sqlcount, $ps);

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }
        $mydata = array();
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $r->id = $this->mysimpleencrypt->en($r->id);
                if ($r->qingsuanfangshi == 0) {
                    $r->qingsuanfangshi = "周结";
                } else {
                    $r->qingsuanfangshi = "月结";
                }
                if ($r->zhuangtai == 0) {
                    $r->zhuangtai = "结算中";
                } else {
                    $r->zhuangtai = "已结算";
                }
                $r->chuzhangriqi = date("Y-m-d", strtotime($r->chuzhangriqi));
                $r->kaishiriqi = date("Y-m-d", strtotime($r->kaishiriqi));
                $r->jieshuriqi = date("Y-m-d", strtotime($r->jieshuriqi));

                $mydata[] = $r;
            }
        }
        // $mydata = array();
        // $mycount = 0;
        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    /**
     * 获取订单详情
     * 
     * @param type $id 订单id
     */
    public function xiangqing($id) {
        $this->load->library('mysimpleencrypt');
        $id = $this->mysimpleencrypt->de($id);
        $chapin = $this->chanpin;
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $sql = 'SELECT m.id as id,m.zhangdanhao as zhangdanhao,m.kaishiriqi as kaishiriqi, m.jieshuriqi as jieshuriqi,m.jiesuanshijian as jiesuanshijian,m.jiesuanrenid as jiesuanrenid,m.yongjinzonge as yongjinzonge,m.zhuangtai as zhuangtai,m.qingsuanfangshi as qingsuanfangshi,m.qingsuanriqi as qingsuanriqi ,m.chuzhangriqi as chuzhangriqi FROM wm_shanghuzhangdan as m where m.id = ? limit 1';
        $query = $this->db->query($sql, array($id));
        $info = $query->row();
        $id = $info->id;
        if ($info->qingsuanfangshi == 0) {
            $info->qingsuanfangshi = "周结";
        } else {
            $info->qingsuanfangshi = "月结";
        }
        if ($info->zhuangtai == 0) {
            $info->zhuangtai = "结算中";
            $info->xingming = '';
        } else {
            $info->zhuangtai = "已结算";
            $info->xingming = $this->getName($info->jiesuanrenid);
        }
        $info->chuzhangriqi = date("Y-m-d", strtotime($info->chuzhangriqi));
        $info->kaishiriqi = date("Y-m-d", strtotime($info->kaishiriqi));
        $info->jieshuriqi = date("Y-m-d", strtotime($info->jieshuriqi));
        $info->xingming = $this->getName($info->jiesuanrenid);
        $data['info'] = $info;
        $sql_mingxi = 'SELECT m.leixing as leixing, m.chuhuoshu as chuhuoshu,m.tuihuoshu as tuihuoshu, m.yongjine as yongjine,m.youxiaoshu as youxiaoshu,m.yongjinjishu as yongjinjishu ,m.qianyuefangshi as qianyuefangshi  FROM  wm_zhangdanmingxi as m where m.zhangdanid =? ';
        $query_mingxi = $this->db->query($sql_mingxi, array($id));
        $mingxi = $query_mingxi->result();
        foreach ($mingxi as $v) {
            $v->leixingmingcheng = $chapin[$v->leixing];
            $v->yongjinjishu = floatval($v->yongjinjishu);
        }
        $data['mingxi'] = $mingxi;
        $this->load->view('wm/wangmeng/zhangdan/xiangqing', $data);
    }

    /**
     * 当前订单信息
     */
    public function dangqianxiangqing() {
        $chapin = $this->chanpin;
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $sql_zhanghu = 'select m.shoukuanpingtai as shoukuanpingtai, m.huzhuming as huzhuming, m.zhanghao as zhanghao from wm_shoukuanzhanghu as m where m.shanghuhao = ? limit 1';
        $query_zhanghu = $this->db->query($sql_zhanghu, array($shanghuhao));
        $zhanghu = $query_zhanghu->row();
        if (empty($zhanghu->zhanghao)) {
            redirect('wm/wangmeng/zhifu/index');
        } else {      
            $sql = 'SELECT m.id as id,m.zhangdanhao as zhangdanhao,m.kaishiriqi as kaishiriqi, m.jieshuriqi as jieshuriqi,m.jiesuanshijian as jiesuanshijian,m.jiesuanrenid as jiesuanrenid,m.yongjinzonge as yongjinzonge,m.zhuangtai as zhuangtai,m.qingsuanfangshi as qingsuanfangshi,m.qingsuanriqi as qingsuanriqi ,m.chuzhangriqi as chuzhangriqi FROM wm_shanghuzhangdan as m where shanghuhao = ?';
            $query = $this->db->query($sql, array($shanghuhao));
            $info = $query->last_row();
            if ($query->num_rows() > 0) {
                $id = $info->id;
                if ($info->qingsuanfangshi == 0) {
                    $info->qingsuanfangshi = "周结";
                } else {
                    $info->qingsuanfangshi = "月结";
                }
                if ($info->zhuangtai == 0) {
                    $info->zhuangtai = "结算中";
                    $info->xingming = '';
                } else {
                    $info->zhuangtai = "已结算";
                    $info->xingming = $this->getName($info->jiesuanrenid);
                }
                $info->chuzhangriqi = date("Y-m-d", strtotime($info->chuzhangriqi));
                $info->kaishiriqi = date("Y-m-d", strtotime($info->kaishiriqi));
                $info->jieshuriqi = date("Y-m-d", strtotime($info->jieshuriqi));
                $info->xingming = $this->getName($info->jiesuanrenid);

                $data['info'] = $info;

                $sql_mingxi = 'SELECT m.leixing as leixing, m.chuhuoshu as chuhuoshu,m.tuihuoshu as tuihuoshu, m.yongjine as yongjine,m.youxiaoshu as youxiaoshu,m.yongjinjishu as yongjinjishu ,m.qianyuefangshi as qianyuefangshi FROM  wm_zhangdanmingxi as m where m.zhangdanid =? ';
                $query_mingxi = $this->db->query($sql_mingxi, array($id));
                $mingxi = $query_mingxi->result();
                foreach ($mingxi as $v) {
                    $v->leixingmingcheng = $chapin[$v->leixing];
                    $v->yongjinjishu = floatval($v->yongjinjishu);
                }
                $data['mingxi'] = $mingxi;
                $this->load->view('wm/wangmeng/zhangdan/dangqianxiangqing', $data);
            } else {
                $this->load->view('wm/wangmeng/zhangdan/wushuju');
            }
        }
    }

    /**
     * 
     * @param type $caoyuanid 管理员id
     * @return string 获取操作员姓名
     */
    public function getName($caoyuanid) {
        if (empty($caoyuanid)) {
            return '';
        };
        $sql = 'select m.xingming as xingming from guanliyuan m where m.id = ? limit 1 ';
        $query = $this->db->query($sql, array($caoyuanid));
        $res = $query->row();
        return $res->xingming;
    }

    /**
     * 
     * @return type 获取订单信息
     */
    public function info() {
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $datetimeEnd = $this->input->post('datetimeEnd');
        $datetimeStart = $this->input->post('datetimeStart');
        $zhuangtai = $this->input->post('zhuangtai');

        $sql = 'SELECT m.id as id,yongjinzonge AS yongjinzongeaall FROM wm_shanghuzhangdan as m ';

        $ps = array();
        $sql = $sql . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];
        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql .= 'and  m.jiesuanshijian >= ?  and  m.jiesuanshijian <= ? ';
            $ps[] = $datetimeStart." 0:0:0";
            $ps[] = $datetimeEnd." 23:59:59";
        }
        if (!empty($zhuangtai) && $zhuangtai != '') {
            $sql = $sql . 'and m.zhuangtai = ? ';
            if ($zhangtai == 1) {
                $ps[] = 1;
            } else if ($zhuangtai == 2) {
                $ps[] = 0;
            } else {
                
            }
        }
        $query = $this->db->query($sql, $ps);
        $dingdannum = 0;
        $yongjinzongeaall = 0;
        $res = $query->result();
        if ($query->num_rows>0) {
            foreach ($res as $v) {
                $dingdannum +=1;
                $yongjinzongeaall +=$v->yongjinzongeaall;
                
            }
        }
        $b = new stdClass();
        $b->dingdannum = $dingdannum;
        $b->yongjinzongeaall = $yongjinzongeaall;        
        echo json_encode($b);
    }

}

