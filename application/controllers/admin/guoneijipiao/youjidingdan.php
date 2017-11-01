<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  -- 报销售后管理  订单管理
 */
class youjidingdan extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '订单编号/创建日期';
        $std1->name = 'dingdanhao';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '出票订单编号';
        $std2->name = 'chupiaodingdanhao';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '行程报销单总数';
        $std3->name = 'chupiaobianma';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '保险发票总数';
        $std4->name = 'fapiaoshu';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '航班起飞时间';
        $std5->name = 'qifeishijian';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '收件人/联系方式';
        $std6->name = 'shoujianren_lianxifangshi';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '收件地址';
        $std7->name = 'shoujiandizhi';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '订单总价';
        $std8->name = 'tuobaoren';
        $std8->show = true;
        $li[7] = $std8;
        
        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '锁单人/锁单时间';
        $std9->name = 'suodan';
        $std9->show = true;
        $li[8] = $std9;

        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/guoneijipiao/youjidingdan/index', $data);
    }
    
    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("baoxian/mbaoxiandingdan", "mbaoxiandingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        
        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        // 查询参数
        // 订单号
        $dingdanhao = $this->input->post('dingdanhao');
       
        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, m.dingdanid as dingdanid,
                m.dingdanhao as dingdanhao, m.xingchengshu as xingchengshu,
                m.fapiaoshu as fapiaoshu, m.baoxianleixing as baoxianleixing,
                m.qifeishijian as qifeishijian, m.shoujianren as shoujianren,
                m.lianxifangshi as lianxifangshi, m.shoujiandizhi as shoujiandizhi,
                m.dingdanzongjia as dingdanzongjia, m.dingdanzhuangtai as dingdanzhuangtai,
                m.wuliuhao as wuliuhao, m.xingchengdan as xingchengdan,
                m.chuangjianshijian as chuangjianshijian, m.chulishijian as chulishijian,
                m.wanchengshijian as wanchengshijian, m.caozuoyuanid as caozuoyuanid,
                m.beizhu as beizhu from baoxiaodan as m, dingdan as d where m.dingdanid = d.id and d.chupiaozhuangtai = 1 ';

        $sqlcount = 'select count(m.id) as id from baoxiaodan as m, dingdan as d where m.dingdanid = d.id and d.chupiaozhuangtai = 1 ';

        $ps = array();
       
        // 保险订单号
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql = $sql . 'and m.dingdanhao like ? ';
            $sqlcount = $sqlcount . 'and m.dingdanhao like ? ';
            $ps[] = $dingdanhao.'%';
        }
        
        // 起飞 24 小时后显示
        $sql = $sql . 'and m.qifeishijian > date_add(now(), interval 1 day)';
        $sqlcount = $sqlcount . 'and m.qifeishijian > date_add(now(), interval 1 day)';
        
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
                $obj->id = $r->id;
                $obj->chupiaodingdanhao = $this->mdingdan->getObj($r->dingdanid);
                // 行程报销单总数
                $obj->xingchengshu = $r->xingchengshu;
                // 保险发票总数
                $obj->fapiaoshu = $r->fapiaoshu;
                // 航班起飞时间
                $obj->qifeishijian = $r->qifeishijian;
                
                // 收件人/联系方式
                $obj->shoujianren_lianxifangshi = $r->shoujianren.'/'.$r->lianxifangshi;
                // 收件地址
                $obj->shoujiandizhi = $r->shoujiandizhi;
                 // 订单总价
                $obj->dingdanzongjia = $r->dingdanzongjia;
                
                // 锁单人/更新时间
                if (!empty($r->caozuoyuanid)) {
                    $obj->suodan = $this->mguanliyuan->getName($r->caozuoyuanid) . '/' . $r->chulishijian;
                } else {
                    $obj->suodan = '';
                }
                
                $mydata[] = $obj;
            }
        }

        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

}
