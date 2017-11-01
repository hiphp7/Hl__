<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 信息管理  --  新增问答
 */
class xinzengwenda extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '序号';
        $std1->name = 'id';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '问题名称';
        $std2->name = 'wentimingcheng';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '答案';
        $std3->name = 'daan';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '发布人';
        $std4->name = 'guanliyuanxingming';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '上传时间';
        $std5->name = 'chuangjianshijian';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '最后编辑时间';
        $std6->name = 'bianjishijian';
        $std6->show = true;
        $li[5] = $std6;



        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/jiudian/xinxiguanli/xinzengwenda/index', $data);
    }

    /**
     * 显示全部用户组
     */
    public function all() {
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        $mysort = 'id';
        $mydir = 'asc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id,m.wentimingcheng as wentimingcheng,m.daan as daan, m.chuangjianshijian as chuangjianshijian,
            m.bianjishijian as bianjishijian,b.xingming as guanliyuanxingming from jiudian_xinzengwenda as m
left join guanliyuan as b on m.caozuoyuanid = b.id where ';

        $sqlcount = 'select count(m.id) as id from jiudian_xinzengwenda as m where ';

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

        $res = $this->db->query($sql);
        $res_count = $this->db->query($sqlcount);

        $mycount = 0;
        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        $result = new stdClass();
        //
        $result->myData = $res->result();
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    // 修改问答
    public function update() {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $obj = array(
            'wentimingcheng' => $this->security->xss_clean($this->input->post('wentimingcheng')),
            'daan' => $this->security->xss_clean($this->input->post('daan')),
            'caozuoyuanid' => $admin_session['id'],
            'bianjishijian' => date("Y-m-d H:i:s")
        );

        $this->db->trans_begin();
        $this->db->update('jiudian_xinzengwenda', $obj, array('id' => $this->security->xss_clean($this->input->post('id'))));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo '0';
        } else {
            $this->db->trans_commit();
            echo '1';
        }
    }

    // 删除问答
    public function del() {
        $this->db->trans_begin();
        $this->db->delete('jiudian_xinzengwenda', array('id' => $this->security->xss_clean($this->input->post('id'))));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo '0';
        } else {
            $this->db->trans_commit();
            echo '1';
        }
    }

    //上传
    public function save() {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $obj = array(
            'wentimingcheng' => $this->security->xss_clean($this->input->post('wentimingcheng')),
            'daan' => $this->security->xss_clean($this->input->post('daan')),
            'caozuoyuanid' => $admin_session['id'],
            'chuangjianshijian' => date("Y-m-d H:i:s")
        );
        $this->db->insert('jiudian_xinzengwenda', $obj);
        $id = $this->db->insert_id();

        if (intval($id) > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // 导出excel
//    public function daochuExcel() {
//        $leixing = $this->input->get('leixing');
//        $sql = 'select m.id as id,m.wentimingcheng as wentimingcheng,m.daan as daan,
//                   m.caozuoyuanid as caozuoyuanid, m.chuangjianshijian as chuangjianshijian,
//            m.bianjishijian as bianjishijian from jiudian_xinzengwenda as m';
//
//        $ps = array();
//        $ps[] = "2017-03-02";
//        $ps[] = "2017-03-03";
//
//        $kv = new stdClass();
//        $kv->key = 'wentimingcheng';
//        $kv->value = '问题名称';
//        $lst[] = $kv;
//
//        $kv1 = new stdClass();
//        $kv1->key = 'daan';
//        $kv1->value = '答案';
//        $lst[] = $kv1;
//
//        $kv2 = new stdClass();
//        $kv2->key = 'caozuoyuanid';
//        $kv2->value = '操作员id';
//        $lst[] = $kv2;
//
//        $kv3 = new stdClass();
//        $kv3->key = 'chuangjianshijian';
//        $kv3->value = '创建时间';
//        $lst[] = $kv3;
//
//        $kv4 = new stdClass();
//        $kv4->key = 'bianjishijian';
//        $kv4->value = '编辑时间';
//        $lst[] = $kv4;
//
//        $name = '-新增问答表-';
//
//        $this->load->library('javaexcel');
//        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);
//
//        if (!empty($result) && $result != "") {
//            redirect(base_url('upload/jiudian_xinzengwenda/' . $result . '.xls'));
//            echo "1";
//        } else {
//            echo "0";
//        }
//    }

}

