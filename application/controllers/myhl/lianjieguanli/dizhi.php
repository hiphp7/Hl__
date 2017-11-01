<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 接入管理  --  连接管理 -- 生成连接地址
 */
class dizhi extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std2 = new stdClass();
        $std2->index = 0;
        $std2->display_name = '渠道';
        $std2->name = 'qudao';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 1;
        $std3->display_name = '地址';
        $std3->name = 'dizhi';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 2;
        $std4->display_name = '创建时间';
        $std4->name = 'chuangjianshijian';
        $std4->show = true;
        $li[3] = $std4;

        $this->li = $li;
    }

    /**
     * 生成连接地址
     */
    public function index() {
        $data['li'] = $this->li;
        $this->load->view('myhl/lianjieguanli/dizhi/index', $data);
    }

    /**
     * 显示全部连接地址
     */
    public function all() {

        $sangfang_admin = $this->session->userdata('sangfang_admin');
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, m.qudao as qudao,m.dizhi as dizhi,m.chuangjianshijian as chuangjianshijian 
            from lianjiedizhi as m where m.sanfanggongsiid = ? ';

        $sqlcount = 'select count(m.id) as id from lianjiedizhi as m where m.sanfanggongsiid = ? ';

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

        $res = $this->db->query($sql, array($sangfang_admin['sanfanggongsiid']));
        $res_count = $this->db->query($sqlcount, array($sangfang_admin['sanfanggongsiid']));

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $result = new stdClass();
        $result->myData = $res->result();
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }
    
    /*
     * 添加
     */

    public function save() {
        date_default_timezone_set("Asia/Shanghai");
        $qudao = $this->security->xss_clean($this->input->post('qudao'));
        $m = $this->QueryByQudao($qudao);

        if (!empty($m) && intval($m->id) > 0) {
            echo -1;
        } else {
            $this->load->library('encrypt');
            $webadmin = $this->session->userdata('sangfang_admin');

            $obj = array(
                'sanfanggongsiid' => $webadmin['sanfanggongsiid'],
                'chuangjianshijian' => date("Y-m-d H:i:s"),
                'dizhi' => $this->encrypt->encode($qudao),
                'qudao' => $qudao
            );
            $this->db->insert('lianjiedizhi', $obj);
            $id = $this->db->insert_id();
        }
        echo $id;
    }
    
    /*
     * 修改
     */

    public function update() {
        date_default_timezone_set("Asia/Shanghai");
        $qudao = $this->security->xss_clean($this->input->post('qudao'));
        $id = $this->security->xss_clean($this->input->post('id'));

        if (!empty($m) && intval($m->id) > 0) {
            echo -1;
        } else {
            $this->load->library('encrypt');

            $obj = array(
                'chuangjianshijian' => date("Y-m-d H:i:s"),
                'dizhi' => $this->encrypt->encode($qudao),
                'qudao' => $qudao
            );
            
            $this->db->update('lianjiedizhi', $obj, array('id' => $id));
            $id = $this->db->insert_id();
        }
        echo $id;
    }
    
    /*
     * 删除
     */

    public function del() {
        date_default_timezone_set("Asia/Shanghai");
        $id = $this->security->xss_clean($this->input->post('id'));
        
        $this->db->delete('lianjiedizhi', array('id' => $id)); 
        echo $id;
    }

    public function QueryByQudao($qudao) {
        $res = $this->db->query('select m.id as id from lianjiedizhi as m where m.qudao = ?', array($qudao));
        return $res->first_row();
    }

}
