<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟火车
 */
class huoche extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '订单号';
        $std1->name = 'dingdanhao';
        $std1->show = true;
        $li[0] = $std1;


        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '车次';
        $std3->name = 'train_code';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '出发站';
        $std4->name = 'from_station';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '到达站';
        $std5->name = 'arrive_station';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '乘车日期';
        $std6->name = 'chengcheqiri';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '出发/到达';
        $std7->name = 'chufa_daoda';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '票数';
        $std8->name = 'lvkenum';
        $std8->show = true;
        $li[7] = $std8;

        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '订单总价';
        $std9->name = 'dingdanzongjia';
        $std9->show = true;
        $li[8] = $std9;

        $std10 = new stdClass();
        $std10->index = 9;
        $std10->display_name = '订单状态';
        $std10->name = 'statusname';
        $std10->show = true;
        $li[9] = $std10;

        $std11 = new stdClass();
        $std11->index = 10;
        $std11->display_name = '完成时间';
        $std11->name = 'wanchengshijian';
        $std11->show = true;
        $li[10] = $std11;

        $this->li = $li;
    }

    public function index($dingdanid = '') {
        $data['li'] = $this->li;

        $this->load->view('wm/wangmeng/huoche/index', $data);
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('mysimpleencrypt');

        $orderstatus = $this->config->item("火车订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
        $leixing = $this->input->post('leixing');

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
        // if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'orderid' == $this->li[$sortid]->name) {
        //     $mysort = 'chuangjianshijian';
        //     $mydir = $dir;
        // }

        if ($leixing == 1) {
            $sql = 'select m.id as id,m.merchant_order_id as merchant_order_id,
            m.train_code as train_code,
            m.arrive_station as arrive_station,
            m.from_station as from_station,
            m.status as status,
            m.travel_time as travel_time,
            m.order_id as order_id,
            m.from_time as from_time,
            m.arrive_time as arrive_time,
            m.isshifazhan as isshifazhan,
            m.iszhongdianzhan as iszhongdianzhan,
            m.out_ticket_time as out_ticket_time,
            m.suodan as suodan,
            m.suodanid as suodanid,
            m.refund_amount as refund_amount,
            m.pay_money as pay_money,
            m.suodanshijian as suodanshijian,
            t.refund_total_amount as refund_total_amount,
            t.chuangjianshijian as chuangjianshijian,
            t.shenqinghao as shenqinghao
            from train_order as m RIGHT JOIN train_tuipiao_dingdan as t on m.id = t.orderid ';

            $sqlcount = 'select count(m.id) as id from train_order as m RIGHT JOIN train_tuipiao_dingdan as t on m.id = t.orderid ';

            $ps = array();

            $sql = $sql . 'where m.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'where  m.shanghuhao = ? ';
            $ps[] = $wm_admin['shanghuhao'];

            $sql = $sql . 'and  t.zhuangtai in (4,5) ';
            $sqlcount = $sqlcount . ' and t.zhuangtai in (4,5) ';


            // 开始时间--结束时间
            if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
                $sql .= 'and  t.chuangjianshijian >= ?  and  t.chuangjianshijian <= ? ';
                $sqlcount .= 'and t.chuangjianshijian >= ? and t.chuangjianshijian  <= ? ';
                $ps[] = $datetimeStart . " 0:0:0";
                $ps[] = $datetimeEnd . " 23:59:59";
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
			//echo $this->db->last_query();
            $row = $res_count->first_row();
            if (!empty($row)) {
                $mycount = $row->id;
            }

            $mydata = array();
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $v) {

                    $v->statusname = $orderstatus[$v->status];
                    $v->dingdanhao = $v->shenqinghao;  //退票申请号
                    $v->chengcheqiri = date('Y-m-d', strtotime($v->travel_time));

                    $from_time = date('H:i', strtotime($v->from_time));
                    $arrive_time = date('H:i', strtotime($v->arrive_time));

                    $date = floor((strtotime($v->arrive_time) - strtotime($v->from_time)) / 86400);

                    if ($date > 0) {
                        $v->chufa_daoda = $from_time . ':' . $arrive_time . ' +' . $date . '天';
                    } else {
                        $v->chufa_daoda = $from_time . ':' . $arrive_time;
                    }
                    $v->from_station = $v->from_station;

                    $v->arrive_station = $v->arrive_station;
                    $v->wanchengshijian = $v->chuangjianshijian;
                    $v->lvkenum = $this->gettuiPersonNum($v->shenqinghao);
                    $v->dingdanzongjia = $v->refund_total_amount; // 退票总额
                    $mydata[] = $v;
                }
            }
            $result = new stdClass();
            $result->myData = $mydata;
            $result->iTotalDisplayRecords = $mycount;
            $result->iTotalRecords = $mycount;

            echo json_encode($result);
            exit;
        }

        $sql = 'select m.id as id,m.merchant_order_id as merchant_order_id,
        m.train_code as train_code,
        m.arrive_station as arrive_station,
        m.from_station as from_station,
        m.status as status,
        m.travel_time as travel_time,
        m.order_id as order_id,
        m.from_time as from_time,
        m.arrive_time as arrive_time,
        m.isshifazhan as isshifazhan,
        m.iszhongdianzhan as iszhongdianzhan,
        m.out_ticket_time as out_ticket_time,
        m.chuangjianshijian as chuangjianshijian,
        m.suodan as suodan,
        m.suodanid as suodanid,
        m.refund_amount as refund_amount,
        m.pay_money as pay_money,
        m.suodanshijian as suodanshijian
        from train_order as m ';

        $sqlcount = 'select count(m.id) as id from train_order as m ';

        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $sqlcount = $sqlcount . 'where  m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];


        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql .= 'and  m.out_ticket_time >= ?  and  m.out_ticket_time <= ? ';
            $sqlcount .= 'and m.out_ticket_time >= ? and m.out_ticket_time  <= ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }

        $sql = $sql . 'and m.status = ? ';
        $sqlcount = $sqlcount . 'and m.status = ? ';

        $ps[] = 2;

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

        $a = $this->db->last_query();

        $res_count = $this->db->query($sqlcount, $ps);

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $mydata = array();
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $v) {

                $v->statusname = $orderstatus[$v->status];
                $v->dingdanhao = $v->merchant_order_id;
                $v->chengcheqiri = date('Y-m-d', strtotime($v->travel_time));

                $from_time = date('H:i', strtotime($v->from_time));
                $arrive_time = date('H:i', strtotime($v->arrive_time));

                $date = floor((strtotime($v->arrive_time) - strtotime($v->from_time)) / 86400);

                if ($date > 0) {
                    $v->chufa_daoda = $from_time . ':' . $arrive_time . ' +' . $date . '天';
                } else {
                    $v->chufa_daoda = $from_time . ':' . $arrive_time;
                }
                $v->from_station = $v->from_station;

                $v->arrive_station = $v->arrive_station;
                $v->wanchengshijian = $v->out_ticket_time;
                $v->lvkenum = $this->getPersonNum($v->id);
                $v->dingdanzongjia = $v->pay_money - $v->refund_amount;
                $mydata[] = $v;
            }
        }
        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    public function info() {
        $wm_admin = $this->session->userdata('wm_admin');
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
        $leixing = $this->input->post('leixing');
        if ($leixing == 1) {
            $sqlcount = 'select t.shenqinghao as shenqinghao from train_order as m RIGHT JOIN train_tuipiao_dingdan as t on m.id = t.orderid ';
            $ps = array();
            $sqlcount = $sqlcount . 'where  m.shanghuhao = ? ';
            $ps[] = $wm_admin['shanghuhao'];
            $sqlcount = $sqlcount . 'and  t.zhuangtai in (4,5) ';


            // 开始时间--结束时间
            if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
                $sqlcount = $sqlcount . 'and t.chuangjianshijian >= ? and t.chuangjianshijian  <= ? ';
                $ps[] = $datetimeStart . " 0:0:0";
                $ps[] = $datetimeEnd . " 23:59:59";
            }
            $res_count = $this->db->query($sqlcount, $ps);
            $a = $this->db->last_query();
            $piaoshu = 0;
            $dingdanall = 0;
            if ($res_count->num_rows() > 0) {
                foreach ($res_count->result() as $v) {
                    $dingdanall += 1;
                    $piaoshu += intval($this->gettuiPersonNum($v->shenqinghao));  // 票数
                }
            }
            $b = new stdClass();
            $b->dingdanall = $dingdanall;
            $b->piaoshuall = $piaoshu;

            echo json_encode($b);
            exit;
        }

        $sql = 'select m.id as id,m.merchant_order_id as merchant_order_id from train_order as m ';
        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];
        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql = $sql . 'and m.out_ticket_time >= ? and m.out_ticket_time  <= ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }
        $sql = $sql . 'and m.status = ? ';

        $ps[] = 2;

        $res = $this->db->query($sql, $ps);
        $a = $this->db->last_query();

        $piaoshu = 0;
        $dingdanall = 0;
        if ($res->num_rows() > 0) {
            foreach ($res->result()as $v) {
                $dingdanall += 1;
                $piaoshu += intval($this->getPersonNum($v->id));  // 票数
            }
        }
        $b = new stdClass();
        $b->dingdanall = $dingdanall;
        $b->piaoshuall = $piaoshu;

        echo json_encode($b);
    }

    /**
     * 获取订单的旅客人数
     * $id 为订单 id
     * $ertong 是否儿童，默认为 false
     */
    public function getPersonNum($id) {

        $sql = 'select count(m.id) as num from train_order_lvke as m where m.orderid = ?';
        $res = $this->db->query($sql, array($id));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->num;
        }
        return $mycount;
    }

    /**
     * 获取订单的退票旅客人数
     * $shenqinghao 退票申请号
     */
    public function gettuiPersonNum($shenqinghao) {

        $sql = 'select count(id) as num from train_tuipiao_dingdan as m where m.shenqinghao = ?';
        $res = $this->db->query($sql, array($shenqinghao));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->num;
        }
        return $mycount;
    }

}

