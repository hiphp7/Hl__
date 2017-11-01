<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class zhangdan_dingshi extends CI_Controller {
	

    public function index() {
        $this->load->view('myhl/lianjieguanli/zhangdan/index');
    }

    /**
     * 飞机出票总数
     */
    public function feiji_num() {

        $shanghuhao = 10000;

        $sql_mum = 'SELECT count(d.id) as chuNum FROM  dingdan as d LEFT JOIN hangchenglvke as lk ON d.id = lk.dingdanid WHERE d.shanghuhao = ? and d.isgaiqian = 0 AND d.chupiaozhuangtai = 1';
        $query = $this->db->query($sql, array($shanghuhao));
        $res = $query->row();
        // var_dump($this->db->last_query());
        var_dump($res);
    }
	
	    /**
     * 飞机出票总数
     */
    public function dingshi() {

		$myfile = "dingshi.txt";
		$txt = 1;
		file_put_contents($myfile, $txt, FILE_APPEND);
		$txt = "\r\n";
		file_put_contents($myfile, $txt, FILE_APPEND);
    }

    /**
     * 飞机退票总数
     */
    public function feiji_tui_num() {

        $shanghuhao = 10000;

        $sql_tui_num = 'SELECT count(d.id) as tuiNum FROM  dingdan as d LEFT JOIN hangchenglvke as lk ON d.id = lk.dingdanid WHERE d.shanghuhao = ? and d.isgaiqian = 0 AND d.chupiaozhuangtai = 1 and lk.zhuangtai = "已退票"';
        $query = $this->db->query($sql_tui_num, array($shanghuhao));
        $res = $query->row();
        // var_dump($this->db->last_query());
        var_dump($res);
    }

    /**
     *  規定时间内飞机出票总数
     */
    public function feiji_num_time() {

        $shanghuhao = 10000;
        $start_time = "2017-1-1 0:0:0";
        $end_time = "2017-3-1 0:0:0";

        $sql_num_time = 'SELECT count(d.id) as chuNum FROM  dingdan as d LEFT JOIN hangchenglvke as lk ON d.id = lk.dingdanid WHERE d.shanghuhao = ? and d.isgaiqian = 0  AND d.chupiaozhuangtai = 1 AND d.chuangjianshijian BETWEEN ? AND ?';
        $query = $this->db->query($sql_num_time, array($shanghuhao, $start_time, $end_time));
        $res = $query->row();
        var_dump($this->db->last_query());
        var_dump($res);
    }

    /**
     *  規定时间内飞机退票总数
     */
    public function feiji_tui_num_time() {

        $shanghuhao = 10000;
        $start_time = "2017-1-1 0:0:0";
        $end_time = "2017-3-1 0:0:0";

        $sql_tui_num_time = 'SELECT count(d.id) as tuiNum FROM  dingdan as d LEFT JOIN hangchenglvke as lk ON d.id = lk.dingdanid WHERE d.shanghuhao = ? and d.isgaiqian = 0 and lk.zhuangtai = "已退票" AND d.chupiaozhuangtai = 1 AND d.chuangjianshijian BETWEEN ? AND ?';
        $query = $this->db->query($sql_tui_num_time, array($shanghuhao, $start_time, $end_time));
        $res = $query->row();
        var_dump($this->db->last_query());
        var_dump($res);
    }

    /**
     *  規定时间内飞机退票总数
     */
    public function tui_bytuipiao() {

        $shanghuhao = 10000;
        $start_time = "2017-1-1 0:0:0";
        $end_time = "2017-3-1 0:0:0";

        $sql_tui_num_time = 'SELECT count(t.id) as tuiNum FROM tuipiaodingdan AS t LEFT JOIN tuipiao as tp ON t.chulipicihao = tp.chulipicihao WHERE t.shanghuhao = ? and t.chulizhuangtai = 2  AND tp.shenqingriqi BETWEEN  ? AND ?';
        $query = $this->db->query($sql_tui_num_time, array($shanghuhao, $start_time, $end_time));
        $res = $query->row();
        var_dump($this->db->last_query());
        var_dump($res);
    }

    /**
     *  規定时间内火车总数
     */
    public function huoche_num() {

        $shanghuhao = 10000;
        $start_time = "2016-1-1 0:0:0";
        $end_time = "2017-3-1 0:0:0";

        $sql_num = 'SELECT count(t.id) as chuNum FROM train_order as t LEFT JOIN train_order_lvke as lk ON t.id = t.order_id WHERE t.shanghuhao = ?  AND t.chuangjianshijian BETWEEN  ? AND ?';
        $query = $this->db->query($sql_num, array($shanghuhao, $start_time, $end_time));
        $res = $query->row();
        var_dump($this->db->last_query());
        var_dump($res);
    }

    /**
     *  規定时间内火车退票总数
     */
    public function huoche_tui_num() {

        $shanghuhao = 10000;
        $start_time = "2016-1-1 0:0:0";
        $end_time = "2017-3-1 0:0:0";

        $sql_tui_num = 'SELECT COUNT(m.id) as tuiNum FROM train_tuipiao_dingdan as m LEFT JOIN train_tuipiao_xiangqing as x on m.shanghuhao = x.shenqinghao WHERE m.shanghuhao = ? AND m.zhuangtai = 4 or m.zhuangtai = 5 AND m.chuangjianshijian BETWEEN  ? AND ?';
        $query = $this->db->query($sql_tui_num, array($shanghuhao, $start_time, $end_time));
        $res = $query->row();
        var_dump($this->db->last_query());
        var_dump($res);
    }


	/**
     * 保存账单极其详情
	 * 脚本自动执行 2点
     */
    public function savezhangdan() {
        // $zhangdanhao = "wm".date("YmdHis").rand(1000,9999); // 账单号
        // $shanghuhao = 10000;
        // $start_time = "2017-1-1 0:0:0";
        // $end_time = "2017-3-1 0:0:0";
        // 查看商户信息

        $this->db->trans_begin();
        $sql_shanghu = 'SELECT s.shanghuhao as shanghuhao, s.shanghuzhuangtai as shanghuzhuangtai, s.qingsuanfangshi as qingsuanfangshi,s.qingsuanriqi as qingsuanriqi FROM wm_qiyeshanghu as s WHERE s.shanghuzhuangtai = 1';
        $query = $this->db->query($sql_shanghu);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $v) {
                $shanghuhao = $v->shanghuhao;
                $qingsuanfangshi = $v->qingsuanfangshi; // 清算方式
                $qingsuanriqi = $v->qingsuanriqi; // 清单日期

                /**
                 *  此处判断账单生成时间
                 */
                // 清算方式 0 周结 1 月结
                if ($qingsuanfangshi == "0") {
                    $weak = date('w', time());
                    if ($weak != $qingsuanriqi) {
                        continue;
                    } else {
                        $start_time = date('Y-m-d',strtotime('-1 week last monday')) . " 00:00:00";
                        $end_time = date('Y-m-d',strtotime('last sunday')) . " 23:59:59";
                    }
                } else {
                    $day = date('d', time());
                    if ($day != $qingsuanriqi) {
                        continue;
                    } else {
                        $start_time = date('Y-m-01', strtotime('-1 month')). " 00:00:00";
                        $end_time = date('Y-m-t', strtotime('-1 month')) . " 23:59:59";
                    }
                }
                $zhangdanhao = "wm" . date("YmdHis") . rand(1000, 9999); // 账单号
                // 查看收款账户信息
                $sql_zhanghu = 'SELECT s.shanghuhao as shanghuhao, s.shoukuanpingtai as shoukuanpingtai, s.huzhuming as huzhuming,s.zhanghao as zhanghao FROM wm_shoukuanzhanghu as s WHERE s.shanghuhao = ?';
                $query = $this->db->query($sql_zhanghu, array($shanghuhao));
                $res = $query->row();
                $shoukuanpingtai = $res->shoukuanpingtai; // 收款平台
                $huzhuming = $res->huzhuming; // 户主名
                $zhanghao = $res->zhanghao;  // 帐号
                // 查询 产品类型
                $sql_chapin = 'SELECT q.chanpinleixing AS leixing,q.qianyuefangshi AS qianyuefangshi,q.yongjinjishu AS jishu FROM wm_qianyuechanpin as q WHERE q.shanghuhao = ? and q.zhuangtai = 1';
                $query_chapin = $this->db->query($sql_chapin, array($shanghuhao));
                $res = $query->result();
                if ($query_chapin->num_rows() > 0) {
                    //生成账单
                    $obj = array(
                        "kaishiriqi" => $start_time,
                        "jieshuriqi" => $end_time,
                        "chuzhangriqi" => date("Y-m-d H:i:s"),
                        "zhangdanhao" => $zhangdanhao,
                        "shanghuhao" => $shanghuhao,
                        "shoukuanzhanghu" => $zhanghao,
                        "shoukuanpingtai" => $shoukuanpingtai,
                        "shoukuanhuzuming" => $huzhuming,
                        "qingsuanfangshi" => $qingsuanfangshi,
                        "qingsuanriqi" => $qingsuanriqi,
                        "qingsuanriqi" => $qingsuanriqi
                    );

                    $this->db->insert('wm_shanghuzhangdan', $obj);
                    $zhangdanid = $this->db->insert_id(); // 账单号
                    $yongjinzonge = 0;
                    foreach ($query_chapin->result() as $v1) {
                        // 类型 0 飞机 1 火车 2国内酒店 3 机票保险
                        if ($v1->leixing == 0) {
                            $yongjinjishu = $v1->jishu;

                            // 获取出票数
                            $sql_num_time = 'SELECT count(d.id) as chuNum FROM  dingdan as d LEFT JOIN hangchenglvke as lk ON d.id = lk.dingdanid WHERE d.shanghuhao = ? and d.isgaiqian = 0  AND d.chupiaozhuangtai = 1 AND d.chuangjianshijian BETWEEN ? AND ?';
                            $query = $this->db->query($sql_num_time, array($shanghuhao, $start_time, $end_time));
                            $res_chu = $query->row();
                            $chuNum = $res_chu->chuNum;

                            // 获取退票数
                            $sql_tui_num_time = 'SELECT count(t.id) as tuiNum FROM tuipiaodingdan AS t LEFT JOIN tuipiao as tp ON t.chulipicihao = tp.chulipicihao WHERE t.shanghuhao = ? and t.chulizhuangtai = 2  AND tp.wanchengshijian BETWEEN  ? AND ?';
                            $query = $this->db->query($sql_tui_num_time, array($shanghuhao, $start_time, $end_time));
                            $res_tui = $query->row();
                            $tuiNum = $res_tui->tuiNum;

                            $feiji = array(
                                "leixing" => $v1->leixing,
                                "zhangdanid" => $zhangdanid,
                                "chuhuoshu" => $chuNum,
                                "tuihuoshu" => $tuiNum,
                                "yongjinjishu" => $yongjinjishu,
                                "youxiaoshu" => $chuNum - $tuiNum,
                                "yongjine" => ($chuNum - $tuiNum) * $yongjinjishu
                            );

                            $this->db->insert('wm_zhangdanmingxi', $feiji);
                            $yongjinzonge += ($chuNum - $tuiNum) * $yongjinjishu;
                        } else if ($v1->leixing == 1) {
                            $yongjinjishu = $v1->jishu;
                            // 获取火车出票数
                            $sql_num = 'SELECT count(t.id) as chuNum , SUM(t.pay_money-t.refund_amount) as chumoney FROM train_order as t LEFT JOIN train_order_lvke as lk ON t.id = t.order_id WHERE t.shanghuhao = ?   AND t.status = 2 AND t.chuangjianshijian BETWEEN  ? AND ?';
                            $query = $this->db->query($sql_num, array($shanghuhao, $start_time, $end_time));
                            $res_chu = $query->row();
                            $chuNum = $res_chu->chuNum;
                            if (empty($res_chu->chumoney)) {
                                $chumoney = 0;
                            } else {
                                $chumoney = $res_chu->chumoney;
                            }
                            
 

                            //获取火车退票数
                            $sql_tui_num = 'SELECT COUNT(m.id) as tuiNum,SUM(m.refund_total_amount) as tuimoney FROM train_tuipiao_dingdan as m LEFT JOIN train_tuipiao_xiangqing as x on m.shanghuhao = x.shenqinghao WHERE m.shanghuhao = ? AND (m.zhuangtai = 4 or m.zhuangtai = 5) AND m.chuangjianshijian BETWEEN  ? AND ?';
                            $query = $this->db->query($sql_tui_num, array($shanghuhao, $start_time, $end_time));
                            $res_tui = $query->row();
                            $tuiNum = $res_tui->tuiNum;
                            if (empty($res_tui->tuimoney)) {
                                $tuimoney = 0;
                            } else {
                                $tuimoney = $res_tui->tuimoney;
                            }
                            if ($v1->qianyuefangshi == 0) {
                                $huoche = array(
                                    "leixing" => $v1->leixing,
                                    "zhangdanid" => $zhangdanid,
                                    "chuhuoshu" => $chuNum,
                                    "tuihuoshu" => $tuiNum,
                                    "yongjinjishu" => $yongjinjishu,
                                    "youxiaoshu" => $chuNum - $tuiNum,
                                    "qianyuefangshi" => 0,
                                    "yongjine" => ($chuNum - $tuiNum) * $yongjinjishu
                                );
                                $this->db->insert('wm_zhangdanmingxi', $huoche);
                                $yongjinzonge += ($chuNum - $tuiNum) * $yongjinjishu;

                            } elseif($v1->qianyuefangshi == 1) {

                                $huoche = array(
                                    "leixing" => $v1->leixing,
                                    "zhangdanid" => $zhangdanid,
                                    "chuhuoshu" => $chumoney,
                                    "tuihuoshu" => $tuimoney,
                                    "yongjinjishu" => $yongjinjishu,
                                    "youxiaoshu" => $chumoney - $tuimoney,
                                    "qianyuefangshi" => 1,
                                    "yongjine" => ($chumoney - $tuimoney) * $yongjinjishu
                                );
                                $this->db->insert('wm_zhangdanmingxi', $huoche);
                                $yongjinzonge += ($chumoney - $tuimoney) * $yongjinjishu;

                            }
                            

                        } else if($v1->leixing == 2){
                            $yongjinjishu = $v1->jishu;
                            $sql_jiudian = 'select m.affiliateConfirmationId as piaoshu,m.numberOfRooms as numberOfRooms ,m.numberOfCustomers as numberOfCustomers,m.totalCost as totalCost from jiudian_chuangjiandingdan as m WHERE m.dingdanzhuangtai = 2  and m.shanghuhao = ? and  m.fukuanshijian BETWEEN ? AND ?';
                            $query = $this->db->query($sql_jiudian, array($shanghuhao, $start_time, $end_time));
                    
                            $row = $query->result();

                            $jianpiaoall = 0;
                            $dingdanall = 0;
                            $totalCost = 0;
                            if ($query->num_rows() > 0) {
                                foreach ($row as $v) {
                                    $jianpiaoall += $v->numberOfRooms + $v->numberOfCustomers;
                                    $totalCost += $v->totalCost;
                                    $piaoshu += 1;
                                }            
                            } 
                            if ($v1->qianyuefangshi == 0) {
                                $jiudian = array(
                                    "leixing" => $v1->leixing,
                                    "zhangdanid" => $zhangdanid,
                                    "chuhuoshu" => $jianpiaoall,
                                    "tuihuoshu" => 0,
                                    "yongjinjishu" => $yongjinjishu,
                                    "youxiaoshu" => $jianpiaoall,
                                    "qianyuefangshi" => 0,
                                    "yongjine" => $jianpiaoall * $yongjinjishu
                                );
                                $this->db->insert('wm_zhangdanmingxi', $jiudian);
                                $yongjinzonge += $jianpiaoall * $yongjinjishu;
   
                            } else if($v1->qianyuefangshi == 1) {
                                $jiudian = array(
                                    "leixing" => $v1->leixing,
                                    "zhangdanid" => $zhangdanid,
                                    "chuhuoshu" => $totalCost,
                                    "tuihuoshu" => 0,
                                    "yongjinjishu" => $yongjinjishu,
                                    "youxiaoshu" => $totalCost,
                                    "qianyuefangshi" => 1,
                                    "yongjine" => $totalCost * $yongjinjishu
                                );
                                $this->db->insert('wm_zhangdanmingxi', $jiudian);
                                $yongjinzonge += $totalCost * $yongjinjishu;
                            }
                                                       
                        } else if($v1->leixing == 3){
                                $yongjinjishu = $v1->jishu;
                                $sql_chubaoxian = 'SELECT b.id  as id from baoxiandingdan as b LEFT JOIN dingdan as d ON b.dingdanid = b.id WHERE d.isgaiqian = 0 and b.baodanzhuangtai = 3 and d.shanghuhao = ?   AND d.chuangjianshijian BETWEEN  ? AND ?';
                                $query = $this->db->query($sql_chubaoxian, array($shanghuhao, $start_time, $end_time));
                                $chubaoxiancount = $query->num_rows();
                                
                                $sql_tuibaoxian = 'SELECT t.id as id  FROM tuipiao AS t  LEFT JOIN dingdan as d ON d.id = t.dingdanid WHERE  t.chulizhuangtai = 2  AND d.baoxian = 1 and d.shanghuhao = ?   AND t.wanchengshijian BETWEEN  ? AND ?';
                                $query = $this->db->query($sql_tuibaoxian, array($shanghuhao, $start_time, $end_time));
                                $tuibaoxiancount  = $query->num_rows();

                                if ($v1->qianyuefangshi == 0) {
                                    $baoxian = array(
                                        "leixing" => $v1->leixing,
                                        "zhangdanid" => $zhangdanid,
                                        "chuhuoshu" => $chubaoxiancount,
                                        "tuihuoshu" => $tuibaoxiancount,
                                        "yongjinjishu" => $yongjinjishu,
                                        "youxiaoshu" => $chubaoxiancount - $tuibaoxiancount,
                                        "qianyuefangshi" => 0,
                                        "yongjine" => ($chubaoxiancount - $tuibaoxiancount) * $yongjinjishu
                                    );
                                    $this->db->insert('wm_zhangdanmingxi', $baoxian);
                                    $yongjinzonge += ($chubaoxiancount - $tuibaoxiancount) * $yongjinjishu;
                                
                                } else if($v1->qianyuefangshi == 1) {
     
                                }
                                

                        } else {
                            
                        }
                    }
                    $this->db->update('wm_shanghuzhangdan', array("yongjinzonge" => $yongjinzonge), array('id' => $zhangdanid)); // 更新佣金总额
                } else {
                    
                }
            }
        } else {
            
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'false';
        } else {
            $this->db->trans_commit();
            echo 'true';
        }
    }
	


}
