<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  改签出票
 */
class gaiqianshengqing0 extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '申请号';
        $std1->name = 'shenqinghao';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '航程类别';
        $std2->name = 'wangfan';
        $std2->show = true;
        $li[1] = $std2;

        $std5 = new stdClass();
        $std5->index = 2;
        $std5->display_name = '起飞/到达';
        $std5->name = 'qifei_daoda';
        $std5->show = true;
        $li[2] = $std5;

        $std6 = new stdClass();
        $std6->index = 3;
        $std6->display_name = '改签时间';
        $std6->name = 'gaiqianshijian';
        $std6->show = true;
        $li[3] = $std6;

        $std7 = new stdClass();
        $std7->index = 4;
        $std7->display_name = '是否升舱';
        $std7->name = 'shifoushengcang';
        $std7->show = true;
        $li[4] = $std7;
        
        $std17 = new stdClass();
        $std17->index = 5;
        $std17->display_name = '乘客数(成人/儿童)';
        $std17->name = 'zongjia_sks';
        $std17->show = true;
        $li[5] = $std17;

        $std8 = new stdClass();
        $std8->index = 6;
        $std8->display_name = '锁单人/更新时间';
        $std8->name = 'suodan';
        $std8->show = true;
        $li[6] = $std8;

        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;
        $this->load->view('admin/guoneijipiao/gaiqianshengqing/index', $data);
    }
    
    /**
     * 显示全部订单
     */
    public function all() {

        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        // 查询参数
        // 申请编号
        $shenqinghao = $this->input->post('shenqinghao');
        // 乘客姓名
        $zhongwenming = $this->input->post('zhongwenming');
        // 申请状态
        $shenqingzhuangtai = $this->input->post('shenqingzhuangtai');
        // 改签日期 开始
        $gaiqianshijian_begin = $this->input->post('gaiqianshijian_begin');
        // 改签日期 结束
        $gaiqianshijian_end = $this->input->post('gaiqianshijian_end');

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'shenqinghao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select g.id as id, g.shenqinghao as shenqinghao,
            g.gaiqianshijian as gaiqianshijian, g.shenqingriqi as shenqingriqi,
            g.shenqingzhuangtai as shenqingzhuangtai,
            g.shifoushengcang as shifoushengcang,
            g.caozuoyuanid as caozuoyuanid,
            g.dingdanid as dingdanid,
            g.kaishishijian as kaishishijian 
            from gaiqian as g ';

        $sqlcount = 'select count(g.id) as id from gaiqian as g ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . ', hangchenglvke as lk where g.dingdanid = lk.dingdanid and lk.zhongwenming = ? ';
            $sqlcount = $sqlcount . ', hangchenglvke as lk where g.dingdanid = lk.dingdanid and lk.zhongwenming = ? ';
            $ps[] = $zhongwenming;

        } else {
            $sql = $sql . 'where ';
            $sqlcount = $sqlcount . 'where ';
        }

        // 申请编号
        if (!empty($shenqinghao) && $shenqinghao != '') {
            $sql = $sql . 'and g.shenqinghao = ? ';
            $sqlcount = $sqlcount . 'and g.shenqinghao = ? ';
            $ps[] = $shenqinghao;
        }

        // 申请状态
        if (!empty($shenqingzhuangtai) && $shenqingzhuangtai != '' && $shenqingzhuangtai != '全部') {
            $sql = $sql . 'and g.shenqingzhuangtai = ? ';
            $sqlcount = $sqlcount . 'and g.shenqingzhuangtai = ? ';
            $ps[] = $shenqingzhuangtai;
        }

        // 改签日期
        if (!empty($gaiqianshijian_begin) && $gaiqianshijian_begin != '' && !empty($gaiqianshijian_end) && $gaiqianshijian_end != '') {
            $sql = $sql . 'and g.gaiqianshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and g.gaiqianshijian between ? and ? ';
            $ps[] = $gaiqianshijian_begin;
            $ps[] = $gaiqianshijian_end;
        }

        // 不变的
        $sql = $sql . 'order by g.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

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
                $obj->shenqinghao = $r->shenqinghao;
                
                $hc = $this->mhangcheng->getObj($r->dingdanid);
                $obj->wangfan = $hc->wangfan;
                
                // 起飞 到达
                $obj->qifei_daoda = $hc->qifeijichang . '/' . $hc->daodajichang;
                $obj->gaiqianshijian = $r->gaiqianshijian;
                
                if ($r->shifoushengcang == false) {
                    $obj->shifoushengcang = '不升舱';
                } else {
                    $obj->shifoushengcang = '可升为公务舱';
                }
                
                /*
                 * 获取改签的 成人数和儿童数量
                 */ 
                $chenren_num = $this->mhangchenglvke->getGaiQianRenShu($r->dingdanid, false);
                $ertong_num = $this->mhangchenglvke->getGaiQianRenShu($r->dingdanid, false);
                
                // 总价/乘客数（成人/儿童）
                if(!empty($chenren_num) && !empty($chenren_num->id) && intval($chenren_num->id) > 0)
                {
                    $obj->zongjia_sks = $chenren_num->id . '人';
                }
                if(!empty($ertong_num) && !empty($ertong_num->id) && intval($ertong_num->id) > 0)
                {
                    $obj->zongjia_sks = $chenren_num->id . '人/' . $ertong_num->id . '人';
                }
                
                // 锁单人/更新时间
                if (!empty($r->caozuoyuanid)) {
                    $obj->suodan = $this->mguanliyuan->getName($r->caozuoyuanid) . '/' . $r->kaishishijian;
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
