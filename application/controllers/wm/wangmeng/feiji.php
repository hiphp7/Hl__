<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 机票
 */
class feiji extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

// 生成列表显示的列
        $std2 = new stdClass();
        $std2->index = 0;
        $std2->display_name = '订单号';
        $std2->name = 'dingdanhao';
        $std2->show = true;
        $li[0] = $std2;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '订单类型';
        $std2->name = 'dingdanleixing';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '航程类型';
        $std3->name = 'hangchengleixing';
        $std3->show = true;
        $li[2] = $std3;

        $std3 = new stdClass();
        $std3->index = 3;
        $std3->display_name = '航班信息';
        $std3->name = 'hangbanxinxi';
        $std3->show = true;
        $li[3] = $std3;

        $std3 = new stdClass();
        $std3->index = 4;
        $std3->display_name = '起飞/到达';
        $std3->name = 'qifeidaoda';
        $std3->show = true;
        $li[4] = $std3;

        $std3 = new stdClass();
        $std3->index = 5;
        $std3->display_name = '票数';
        $std3->name = 'piaoshu';
        $std3->show = true;
        $li[5] = $std3;

        $std3 = new stdClass();
        $std3->index = 6;
        $std3->display_name = '订单总价';
        $std3->name = 'dingdanzongjia';
        $std3->show = true;
        $li[6] = $std3;
        $std3 = new stdClass();
        $std3->index = 7;
        $std3->display_name = '订单状态';
        $std3->name = 'dingdanzhuangtai';
        $std3->show = true;
        $li[7] = $std3;

        $std3 = new stdClass();
        $std3->index = 8;
        $std3->display_name = '完成时间';
        $std3->name = 'wanchengshijian';
        $std3->show = true;
        $li[8] = $std3;
        $this->li = $li;
    }

    /**
     * 生成连接地址
     */
    public function index() {
        $data['li'] = $this->li;
        $this->load->view('wm/wangmeng/feiji/index', $data);
    }

    /**
     * 显示全部连接地址
     */
    public function all() {

        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('mysimpleencrypt');
        // 加载管理员
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        // 加载航程
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        // 加载航程
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");

        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
        $cishu = $this->input->post('cishu');
        $leixing = $this->input->post('leixing');
        if ($cishu == 0) {
            $result = new stdClass();
            $result->myData = array();
            $result->iTotalDisplayRecords = 0;
            $result->iTotalRecords = 0;
            echo json_encode($result);
            exit;
        }

        if ($leixing == 1) {

            $mysort = 'id';
            $mydir = 'desc';
            $sql = 'select m.id as id, m.dingdanhao as dingdanhao,
            m.chupiaobianma as chupiaobianma,
            m.dingdanzonge as dingdanzonge, 
            m.dingdanzhuangtai as dingdanzhuangtai,
            m.suodan as suodan, 
            m.suodanid as suodanid, 
            m.suodanshijian as suodanshijian,
            m.fukuanshijian as fukuanshijian,
            m.wanchengshijian as wanchengshijian,
            t.caozuoshijian as caozuoshijian,
            t.id as tuiid,
            t.tuipiaojine as tuipiaojine,
            t.chulipicihao as chulipicihao
            from dingdan as m RIGHT JOIN tuipiaodingdan as t ON m.id = t.dingdanid WHERE t.chulizhuangtai = 2 ';

            $sqlcount = 'select count(m.id) as id from dingdan as m RIGHT JOIN tuipiaodingdan as t ON m.id = t.dingdanid WHERE t.chulizhuangtai = 2 ';

            $ps = array();
            $sql = $sql . 'and m.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'and  m.shanghuhao = ? ';
            $ps[] = $wm_admin['shanghuhao'];

            // 开始时间--结束时间
            if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
                $sql .= 'and  t.caozuoshijian >= ?  and  t.caozuoshijian <= ? ';
                $sqlcount .= 'and t.caozuoshijian >= ? and t.caozuoshijian  <= ? ';
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
			
            $row = $res_count->first_row();
            if (!empty($row)) {
                $mycount = $row->id;
            }

            $mydata = array();
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $obj = new stdClass();
                    // id 简单加密一下
                    $obj->id = $this->mysimpleencrypt->en($r->id);
                    $hc = $this->mhangcheng->getObj_sanfang($r->id);

                    $obj->dingdanhao = $r->chulipicihao; // 处理批次号
                    $obj->wanchengshijian = $r->caozuoshijian;  // 退票完成时间
                    $obj->hangchengleixing = $hc->wangfan;
                    $obj->qifeidaoda = $hc->qifeidaoda; // 起飞到达                   
                    $obj->piaoshu = intval($this->gettuiPersonNum($r->chulipicihao)); // 票数

                    $obj->dingdanzongjia = $r->tuipiaojine; //退票总价
                    $obj->dingdanleixing = $myconfig[$r->dingdanzhuangtai];
                    $obj->hangbanxinxi = $hc->hangbanxinxi;
                    // 订单状态
                    $obj->dingdanzhuangtai = "已退票";

                    $mydata[] = $obj;
                }
            }



            $result = new stdClass();
            $result->myData = $mydata;
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

        $sql = 'select m.id as id, m.dingdanhao as dingdanhao, 
            m.chupiaobianma as chupiaobianma,
            m.dingdanzonge as dingdanzonge, 
            m.dingdanzhuangtai as dingdanzhuangtai,
            m.suodan as suodan, 
            m.suodanid as suodanid, 
            m.suodanshijian as suodanshijian,
            m.fukuanshijian as fukuanshijian,
            m.wanchengshijian as wanchengshijian,
            m.chulishijian as chulishijian 
            from dingdan as m ';
        $sqlcount = 'select count(m.id) as id from dingdan as m ';

        $ps = array();
        $sql = $sql . 'where m.shanghuhao = ? ';
        $sqlcount = $sqlcount . 'where  m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];

        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {

            $sql .= 'and  m.wanchengshijian >= ?  and  m.wanchengshijian <= ? ';
            $sqlcount .= 'and m.wanchengshijian >= ? and m.wanchengshijian  <= ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }

        $sql = $sql . 'and m.isgaiqian = ? ';
        $sqlcount = $sqlcount . 'and m.isgaiqian = ? ';
        $ps[] = 0;

        $sql = $sql . 'and m.chupiaozhuangtai = ? ';
        $ps[] = 1;


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
        $b = $this->db->last_query();
        $res_count = $this->db->query($sqlcount, $ps);
        $a = $this->db->last_query();

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $mydata = array();
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj = new stdClass();
                $obj->id = $this->mysimpleencrypt->en($r->id);
                $hc = $this->mhangcheng->getObj_sanfang($r->id);
                $obj->dingdanhao = $r->dingdanhao;
                $obj->wanchengshijian = $r->wanchengshijian;
                $obj->hangchengleixing = $hc->wangfan;
                $obj->qifeidaoda = $hc->qifeidaoda; // 起飞到达
                $obj->piaoshu = intval($this->getPersonNum($r->id)); // 票数
                $obj->dingdanzongjia = $r->dingdanzonge;
                $obj->dingdanleixing = $myconfig[$r->dingdanzhuangtai];
                $obj->hangbanxinxi = $hc->hangbanxinxi;
                // 订单状态
                $obj->dingdanzhuangtai = "已成交";

                $mydata[] = $obj;
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
            $sqlcount = 'select t.chulipicihao as chulipicihao from dingdan as m RIGHT JOIN tuipiaodingdan as t ON m.id = t.dingdanid WHERE t.chulizhuangtai = 2 ';
            $ps = array();
            $sqlcount = $sqlcount . 'and  m.shanghuhao = ? ';
            $ps[] = $wm_admin['shanghuhao'];
            if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
                $sql = $sql . 'and  t.caozuoshijian >= ?  and  t.caozuoshijian <= ? ';
                $ps[] = $datetimeStart . " 0:0:0";
                $ps[] = $datetimeEnd . " 23:59:59";
            }
            $res_count = $this->db->query($sqlcount, $ps);
            $piaoshu = 0;
            $dingdanall = 0;
            if ($res_count->num_rows() > 0) {
                foreach ($res_count->result() as $r) {
                    $dingdanall += 1;
                    $piaoshu += intval($this->gettuiPersonNum($r->chulipicihao)); //退票数
                }
            }

            $b = new stdClass();
            $b->dingdanall = $dingdanall;
            $b->piaoshuall = $piaoshu;
            echo json_encode($b);
            exit;
        }
        $sql = 'select m.id as id, m.dingdanhao as dingdanhao, 
            m.chupiaobianma as chupiaobianma,
            m.dingdanzonge as dingdanzonge, 
            m.dingdanzhuangtai as dingdanzhuangtai,
            m.suodan as suodan, 
            m.suodanid as suodanid, 
            m.suodanshijian as suodanshijian,
            m.fukuanshijian as fukuanshijian,
            m.wanchengshijian as wanchengshijian,
            m.chulishijian as chulishijian 
            from dingdan as m ';
        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];
        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql = $sql . 'and m.wanchengshijian >= ?  and  m.wanchengshijian <= ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }
        $sql = $sql . 'and m.isgaiqian = ? ';
        $ps[] = 0;
        $sql = $sql . 'and m.chupiaozhuangtai = ? ';
        $ps[] = 1;

        $resall = $this->db->query($sql, $ps);

        $piaoshu = 0;
        $dingdanall = 0;
        if ($resall->num_rows() > 0) {
            foreach ($resall->result() as $r) {
                $dingdanall += 1;
                $piaoshu += intval($this->getPersonNum($r->id)); // 票数
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
     */
    public function getPersonNum($id) {

        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ? ';
        $res = $this->db->query($sql, array($id));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }
        return $mycount;
    }

    /**
     * 获取退票订单的退票旅客人数
     * $chulipicihao 为退票处理批次号
     */
    public function gettuiPersonNum($chulipicihao) {
        $sql = 'SELECT count(id) as tuipiaoshu from tuipiao where chulipicihao = ?';
        $res = $this->db->query($sql, array($chulipicihao));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->tuipiaoshu;
        }
        return $mycount;
    }

}
