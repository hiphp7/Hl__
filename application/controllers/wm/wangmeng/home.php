<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟首页
 */
class home extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '链接名称';
        $std1->name = 'mingcheng';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '创建日期';
        $std2->name = 'time';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '网址';
        $std3->name = 'lianjieurl';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '二维码';
        $std4->name = 'qrcode';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '状态';
        $std5->name = 'zhuangtai';
        $std5->show = true;
        $li[4] = $std5;

        $this->li = $li;
    }

    /*
     * 首页
     */
    public function index() {

        $data['li'] = $this->li;
        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $data["shangumingcheng"] = $wm_admin['mingcheng'];
        $sql = "select count(id) as num from wm_tuiguanglianjie where shanghuhao = ?";
        $query = $this->db->query($sql, $shanghuhao);
        $res = $query->row();
		$shumu = $this->shumu();
        if ($shumu <= 10) {
            $data["jianlianjie"] = true;
        } else {
            $data["jianlianjie"] = false;
        }
        $this->load->view('wm/wangmeng/home/index', $data);
    }
	 /*
     * 链接数目
     */
    public function shumu() {

        $wm_admin = $this->session->userdata('wm_admin');
        $shanghuhao = $wm_admin['shanghuhao'];
        $data["shangumingcheng"] = $wm_admin['mingcheng'];
        $sql = "select count(id) as num from wm_tuiguanglianjie where shanghuhao = ?";
        $query = $this->db->query($sql, $shanghuhao);
        $res = $query->row();
		return $res->num;
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $wm_admin = $this->session->userdata('wm_admin');

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));

        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        $shanghuhao = $wm_admin['shanghuhao'];

        // if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
        //     $mysort = $this->li[$sortid]->name;
        //     $mydir = $dir;
        // }

        $mysort = 'id';
        $mydir = 'desc';

        $sql = 'select m.id as id, m.mingcheng as mingcheng, m.lianjieurl as lianjieurl,m.qrcode as qrcode, m.time as time,m.zhuangtai as zhuangtai,m.shanghuhao as shanghuhao  from  wm_tuiguanglianjie as m ';
        $sqlcount = 'select count(m.id) as num from wm_tuiguanglianjie as m ';
        $ps = array();

        $sql .= 'where ';
        $sqlcount .= 'where ';
        $sql .= "m.shanghuhao = ? ";
        $sqlcount .= "m.shanghuhao = ? ";
        $ps[] = $shanghuhao;

        // 不变的
        $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

        $sql = str_replace("where order", "order", $sql);
        $sql = str_replace("where and", "where", $sql);
        if (substr(trim($sql), -5) == 'where') {
            $sql = substr(trim($sql), 0, strlen(trim($sql)) - 5);
        }

        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }

        $res = $this->db->query($sql, $ps);
        $a = $this->db->last_query();

        $res_count = $this->db->query($sqlcount, $ps);
        $b = $this->db->last_query();
        $mycount = 0;
        $row = $res_count->first_row();

        if (!empty($row)) {
            $mycount = $row->num;
        }

        $mydata = array();
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                if ($r->zhuangtai == 0) {
                    $r->zhuangtai = "开启";
                } else{
                   $r->zhuangtai = "关闭"; 
                }

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

    public function savelianjie() {
        $this->load->helper('string');
        $wm_admin = $this->session->userdata('wm_admin');
        $zhuangtai = $this->security->xss_clean($this->input->post('zhuangtai'));
        $mingcheng = $this->security->xss_clean($this->input->post('carType'));

        $shanghuhao = $wm_admin['shanghuhao'];
        $strnum = random_string('numeric', 5);

        $sql = "select biaoshi from wm_tuiguanglianjie limit 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $strnum = random_string('numeric', 5);
        }
        $lianjieurl = $strnum . "1";
        $qrcode = $strnum . "2";

        $obj = array(
            'shanghuhao' => $shanghuhao,
            'time' => date("Y-m-d H:i:s"),
            'mingcheng' => $mingcheng,
            'biaoshi' => $strnum,
            'lianjieurl' => site_url() . '/h5/index/' . $lianjieurl,
            'qrcode' => site_url() . '/h5/index/' . $qrcode,
            'zhuangtai' => $zhuangtai
        );
        $this->db->insert('wm_tuiguanglianjie', $obj);
        if ($this->db->insert_id() > 0) {
			$shumu = $this->shumu();
            echo $shumu;
        } else {
            echo "false";
        }
    }
    // 二维码下载
    public function erweimaxiazai($id, $length) {
        $this->load->library('qrcode');
        $sql = 'select m.qrcode as qrcode  from  wm_tuiguanglianjie as m where id = ? limit 1';
        $query = $this->db->query($sql, array($id));
        $res = $query->row();
        $url = $res->qrcode;
        $errorCorrectionLevel = 'L'; //容错级别
        $matrixPointSize = $length; //生成图片大小
        $u = '/qrcode/' . $id . '.png';
        $img = 'upload' . $u; //生成二维码图片
        QRcode::png($url, $img, $errorCorrectionLevel, $matrixPointSize, 2); //生成二维码
        $QR = base_url('upload') . '/' . $u; //已经生成的原始二维码图

        $filename = basename($QR);
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $filename);
        readfile($QR);  
        exit();
    }

}

