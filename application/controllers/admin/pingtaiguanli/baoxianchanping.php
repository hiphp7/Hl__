<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 平台管理  --  保险产品管理
 */
class baoxianchanping extends CI_Controller {

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
        $std2->display_name = '公司名称';
        $std2->name = 'baoxiangongsi';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '保险名称';
        $std3->name = 'chanpinmingcheng';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '保险类别';
        $std4->name = 'chanpinleibie';
        $std4->show = true;
        $li[3] = $std4;
        
        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '销售价(元/份)';
        $std5->name = 'xiaoshoudanjia';
        $std5->show = true;
        $li[4] = $std5;
        
        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '成本价(元/份)';
        $std6->name = 'chengbendanjia';
        $std6->show = true;
        $li[5] = $std6;
        
//        $std7 = new stdClass();
//        $std7->index = 6;
//        $std7->display_name = '状态';
//        $std7->name = 'dangqianzhuangtai';
//        $std7->show = true;
//        $li[6] = $std7;
        
        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '日期';
        $std7->name = 'chuangjianshijian';
        $std7->show = true;
        $li[6] = $std7;
        
        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '操作人';
        $std8->name = 'guanliyuanxingming';
        $std8->show = true;
        $li[7] = $std8;
        


        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/pingtaiguanli/baoxianchanping/index', $data);
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
        
        $sql = 'select m.id as id, m.baoxiangongsiid as baoxiangongsiid,m.chanpinmingcheng as chanpinmingcheng,
            m.chanpinleibie as chanpinleibie, m.xiaoshoudanjia as xiaoshoudanjia, m.chengbendanjia as chengbendanjia, 
m.dangqianzhuangtai as dangqianzhuangtai, m.caozuoyuanid as caozuoyuanid, m.chuangjianshijian as chuangjianshijian 
, m.shangjia as shangjia,b.xingming as guanliyuanxingming,c.mingcheng as baoxiangongsi from baoxianchanpin as m
left join guanliyuan as b on m.caozuoyuanid= b.id left join baoxiangongsi as c on m.baoxiangongsiid = c.id where ';

        $sqlcount = 'select count(m.id) as id from baoxianchanpin as m where ';

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
    
    // 下架保险产品
    public function xiajia()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->db->trans_begin();
        $this->db->update('baoxianchanpin',array('shangjia' => 0), array('id' => $id));
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '0';
        }
        else
        {
            $this->db->trans_commit();
            echo '1';
        }
    }
    
    // 保存保险公司
    public function save()
    {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $obj = array(
            'chanpinmingcheng' => $this->security->xss_clean($this->input->post('chanpinmingcheng')),
            'baoxiangongsiid' => intval($this->security->xss_clean($this->input->post('baoxiangongsiid'))),
            'chanpinleibie' => intval($this->security->xss_clean($this->input->post('chanpinleibie'))),
            'baoxianjine' => floatval($this->security->xss_clean($this->input->post('baoxianjine'))),
            'xiaoshoudanjia' => floatval($this->security->xss_clean($this->input->post('xiaoshoudanjia'))),
            'chengbendanjia' => floatval($this->security->xss_clean($this->input->post('chengbendanjia'))),
            'jiesuanfangshi' => intval($this->security->xss_clean($this->input->post('jiesuanfangshi'))),
            'baoxianqixian' => intval($this->security->xss_clean($this->input->post('baoxianqixian'))),
            'chanpindaima' => $this->security->xss_clean($this->input->post('chanpindaima')),
            'shifoutuibao' => intval($this->security->xss_clean($this->input->post('shifoutuibao'))),
            'nianlingxianzhi' => intval($this->security->xss_clean($this->input->post('nianlingxianzhi'))),
            'zuixiaonianling' => intval($this->security->xss_clean($this->input->post('zuixiaonianling'))),
            'zuidanianling' => intval($this->security->xss_clean($this->input->post('zuidanianling'))),
            'baoexiangxi' => $this->security->xss_clean($this->input->post('baoexiangxi')),
            'baoxianfanwei' => $this->security->xss_clean($this->input->post('baoxianfanwei')),
            'beizhu' => $this->security->xss_clean($this->input->post('beizhu')),
            'yanzhengdizhi' => $this->security->xss_clean($this->input->post('yanzhengdizhi')),
            
            'caozuoyuanid' => $admin_session['id'],
            'chuangjianshijian' => date("Y-m-d H:i:s"),
            'shangjia' => 1,
        );
        $this->db->insert('baoxianchanpin', $obj);
        $id = $this->db->insert_id();
        
        if(intval($id) > 0)
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }
    
    // 修改保险公司
    public function update()
    {
        date_default_timezone_set("Asia/Shanghai");
        $admin_session = $this->session->userdata('admin');
        $obj = array(
            'baoxiangongsiid' => intval($this->security->xss_clean($this->input->post('baoxiangongsiid'))),
            'chanpinmingcheng' => $this->security->xss_clean($this->input->post('chanpinmingcheng')),
            'chanpinleibie' => intval($this->security->xss_clean($this->input->post('chanpinleibie'))),
            'xiaoshoudanjia' => floatval($this->security->xss_clean($this->input->post('xiaoshoudanjia'))),
            'chengbendanjia' => floatval($this->security->xss_clean($this->input->post('chengbendanjia'))),
            'caozuoyuanid' => $admin_session['id'],
            'chuangjianshijian' => date("Y-m-d H:i:s")
        );
        
        $this->db->trans_begin();
        $this->db->update('baoxianchanpin', $obj, array('id' => $this->security->xss_clean($this->input->post('id'))));
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '0';
        }
        else
        {
            $this->db->trans_commit();
            echo '1';
        }
    }
}
