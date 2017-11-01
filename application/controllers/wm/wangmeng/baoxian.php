<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 机票
 */
class baoxian extends CI_Controller {

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
        $std2->display_name = '保单号';
        $std2->name = 'baodanhao';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '保险名称';
        $std3->name = 'baoxianleixing';
        $std3->show = true;
        $li[2] = $std3;

        $std3 = new stdClass();
        $std3->index = 3;
        $std3->display_name = '保险总价';
        $std3->name = 'dingdanzongjia';
        $std3->show = true;
        $li[3] = $std3;

        $std3 = new stdClass();
        $std3->index = 4;
        $std3->display_name = '保险状态';
        $std3->name = 'baodanzhuangtai';
        $std3->show = true;
        $li[4] = $std3;

        $std3 = new stdClass();
        $std3->index = 5;
        $std3->display_name = '完成时间';
        $std3->name = 'wanchengshijian';
        $std3->show = true;
        $li[5] = $std3;


        $this->li = $li;
    }

    /**
     * 生成连接地址
     */
    public function index() {
        $data['li'] = $this->li;
        $this->load->view('wm/wangmeng/baoxian/index', $data);
    }

    /**
     * 显示全部连接地址
     */
    public function all() {

        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('mysimpleencrypt');
        // 加载管理员

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));

        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
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

            $sql = 'SELECT b.baodanhao as baodanhao, d.dingdanhao as dingdanhao, b.baoxianchanpinid as baoxianchanpinid ,b.dingdanzongjia as dingdanzongjia,b.baodanzhuangtai as baodanzhuangtai,b.wanchengshijian as wanchengshijian FROM baoxiandingdan as b LEFT JOIN dingdan as d on b.dingdanid = d.id WHERE b.baodanzhuangtai = 3 ';

            $sqlcount = 'SELECT b.id as id,b.dingdanzongjia as dingdanzongjia FROM baoxiandingdan as b LEFT JOIN dingdan as d on b.dingdanid = d.id WHERE b.baodanzhuangtai = 3 ';

            $ps = array();
            $sql = $sql . 'and d.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'and  d.shanghuhao = ? ';
            $ps[] = $wm_admin['shanghuhao'];

            //开始时间--结束时间
            if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
                $sql .= 'and  b.wanchengshijian >= ?  and  b.wanchengshijian <= ? ';
                $sqlcount .= 'and b.wanchengshijian >= ? and b.wanchengshijian  <= ? ';
                $ps[] = $datetimeStart . " 0:0:0";
                $ps[] = $datetimeEnd . " 23:59:59";
            }

            // 不变的
            $sql = $sql . 'order by b.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

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
            $mycount = $res_count->num_rows();
            $mydata = array();
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $baoxian = $this->baoxianmingcheng();
                    $r->baoxianleixing = $baoxian[$r->baoxianchanpinid]['chanpinmingcheng'];
                    $mydata[] = $r;
                }
            }
            // $mydata = array();
            $result = new stdClass();
            $result->myData = $mydata;
            $result->iTotalDisplayRecords = $mycount;
            $result->iTotalRecords = $mycount;
            echo json_encode($result);
            exit;
        }

       

    public function baoxianmingcheng()
    {
        $sql="SELECT bx.chanpinmingcheng as chanpinmingcheng,bx.baoxianjine as baoxianjine,bx.id as id  FROM baoxianchanpin as bx";
        $query = $this->db->query($sql);
        $res = $query ->result();
        $baoxian = array();
        foreach ($res as $k => $v) {
            $baoxian[$v->id] = array('chanpinmingcheng' => $v->chanpinmingcheng,'baoxianjine' => $v->baoxianjine, );   
        }
        return $baoxian;
        
    }

    public function info() {
        $wm_admin = $this->session->userdata('wm_admin');
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');

        $sql = 'SELECT b.id as id,b.dingdanzongjia as dingdanzongjia FROM baoxiandingdan as b LEFT JOIN dingdan as d on b.dingdanid = d.id WHERE b.baodanzhuangtai = 3 ';

        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];
        //开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql .= 'and  b.wanchengshijian >= ?  and  b.wanchengshijian <= ? ';
            $sqlcount .= 'and b.wanchengshijian >= ? and b.wanchengshijian  <= ? ';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }

        $resall = $this->db->query($sql, $ps);
		
        $dingdanall = 0;
        $dingdanzongjiaall = 0;
        if ($resall->num_rows()>0) {
            $row = $resall->result();
            for($i = 0; $i < count($row);$i++){
                $dingdanall += 1;          
                $dingdanzongjiaall += $row[$i]->dingdanzongjia;          
            }
    
        } 

        $b = new stdClass();
        $b->dingdanall = $dingdanall;
        $b->dingdanzongjiaall = $dingdanzongjiaall;
        echo json_encode($b);

    }

   
}
