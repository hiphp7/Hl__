<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台管理  --  保险公司管理
 */
class baoxiangongsi extends CI_Controller {

	private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = 'WebSite';
        $std1->name = 'url';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '公司名称';
        $std2->name = 'mingcheng';
        $std2->show = true;
        $li[1] = $std2;
        
        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '服务电话';
        $std3->name = 'lianxidianhua';
        $std3->show = true;
        $li[2] = $std3;
        
        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '更新日期';
        $std4->name = 'chuangjianshijian';
        $std4->show = true;
        $li[3] = $std4;

        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/pingtaiguanli/baoxiangongsi/index', $data);
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
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }
        
        $sql = 'select m.id as id, m.url as url, m.mingcheng as mingcheng, m.lianxidianhua as lianxidianhua,
            m.chuangjianshijian as chuangjianshijian, m.caozuoyuanid as caozuoyuanid 
            from baoxiangongsi as m where ';

        $sqlcount = 'select count(m.id) as id from baoxiangongsi as m where ';

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
        $result->myData = $res->result();
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }
}
