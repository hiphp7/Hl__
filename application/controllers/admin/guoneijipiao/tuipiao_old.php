<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  退票管理
 */
class tuipiao extends CI_Controller {

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

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '航程类别';
        $std2->name = 'wangfan';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '出票编码';
        $std3->name = 'chupiaobianma';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '航班时间/航班号/舱位(成人,儿童)';
        $std4->name = 'hb';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '起飞/到达';
        $std5->name = 'qifei_daoda';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '订单状态';
        $std6->name = 'dingdanzhuangtai';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '总价/乘客数(成人/儿童)';
        $std7->name = 'zongjia_sks';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '锁单人/更新时间';
        $std8->name = 'suodan';
        $std8->show = true;
        $li[7] = $std8;
        
        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '退票类型';
        $std9->name = 'tuipiaoleixing';
        $std9->show = true;
        $li[8] = $std9;

        $this->li = $li;
    }

    public function index($tuipiaoid = '') {
        $data['li'] = $this->li;
        
        // 执行锁单
        if ($tuipiaoid != '') {
            $this->load->library('mysimpleencrypt');
            $this->load->model("dingdan/msoudan", "msoudan");
            $tuipiaoid = $this->mysimpleencrypt->de($tuipiaoid);
            if ($this->msoudan->isSouDan($tuipiaoid, 'tuipiao') == '未锁单') {
                $this->msoudan->save($tuipiaoid, 'tuipiao');
            }
        }
        $this->load->view('admin/guoneijipiao/tuipiao/index', $data);
    }
    
    /**
     * 显示全部订单
     */
    public function all() {

        $this->load->library('mysimpleencrypt');
        $this->load->model("dingdan/msoudan", "msoudan");
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        
        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];
        
        $vs = $this->config->item("订单状态");

        // 查询参数
        // 出票编码
        $chupiaobianma = $this->input->post('chupiaobianma');
        // 订单编号
        $dingdanhao = $this->input->post('dingdanhao');
        // 乘客姓名
        $zhongwenming = $this->input->post('zhongwenming');
        // 航程类型
        $wangfanhangcheng = $this->input->post('wangfanhangcheng');
        // 乘客票号
        $piaohao = $this->input->post('piaohao');
        // 订单状态
        $dingdanzhuangtai = $this->input->post('dingdanzhuangtai');
        // 付款时间 开始
        $fukuanshijian_begin = $this->input->post('fukuanshijian_begin');
        // 付款时间 结束
        $fukuanshijian_end = $this->input->post('fukuanshijian_end');
        // 退票类型
        $tuipiaoleixing = $this->input->post('tuipiaoleixing');

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, t.id as tid, h.id as hid, m.dingdanhao as dingdanhao,m.chupiaobianma as chupiaobianma,
            h.wangfanhangcheng as wangfan,
            h.qifeijichang as qifeijichang,
            h.daodajichang as daodajichang,
            h.hangbanhao as hangbanhao,
            h.cangwei as cangwei,
            h.qifeishijian as qifeishijian,
            m.dingdanzonge as dingdanzonge, m.dingdanzhuangtai as dingdanzhuangtai,
            t.dingdanid as dingdanid,
            t.tuipiaoleixing as tuipiaoleixing,
            t.caozuoyuanid as caozuoyuanid,
            t.caozuoshijian as caozuoshijian,
            m.chulishijian as chulishijian 
            from dingdan as m, hangcheng as h, tuipiao as t ';

        $sqlcount = 'select count(t.id) as id from dingdan as m, hangcheng as h, tuipiao as t ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . ', hangchenglvke as lk where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $sqlcount = $sqlcount . ', hangchenglvke as lk where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $ps[] = $zhongwenming;

            // 乘客票号
            if (!empty($piaohao) && $piaohao != '') {
                $sql = $sql . 'and lk.piaohao = ? ';
                $sqlcount = $sqlcount . 'and lk.piaohao = ? ';
                $ps[] = $piaohao;
            }
        } else {

            // 乘客票号
            if (!empty($piaohao) && $piaohao != '') {
                $sql = $sql . ', hangchenglvke as lk where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.piaohao = ? ';
                $sqlcount = $sqlcount . ', hangchenglvke as lk where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.piaohao = ? ';
                $ps[] = $piaohao;
            } else {
                $sql = $sql . 'where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and t.dingdanid = m.id ';
                $sqlcount = $sqlcount . 'where m.chupiaozhuangtai = 2 and m.id = h.dingdanid and t.dingdanid = m.id ';
            }
        }

        // 出票编码
        if (!empty($chupiaobianma) && $chupiaobianma != '') {
            $sql = $sql . 'and m.chupiaobianma = ? ';
            $sqlcount = $sqlcount . 'and m.chupiaobianma = ? ';
            $ps[] = $chupiaobianma;
        }

        // 订单编号
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql = $sql . 'and m.dingdanhao = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }

        // 航程类型
        if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != '全部') {
            $sql = $sql . 'and h.wangfanhangcheng = ? ';
            $sqlcount = $sqlcount . 'and h.wangfanhangcheng = ? ';
            $ps[] = $wangfanhangcheng;
        }
        
        // 退票类型
        if (!empty($tuipiaoleixing) && $tuipiaoleixing != '' && $tuipiaoleixing != '全部') {
            $sql = $sql . 'and t.tuipiaoleixing = ? ';
            $sqlcount = $sqlcount . 'and t.tuipiaoleixing = ? ';
            $ps[] = $tuipiaoleixing;
        }

        // 订单状态
        if (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '') {
            $sql = $sql . 'and m.dingdanzhuangtai = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanzhuangtai = ? ';
            $ps[] = $dingdanzhuangtai;
        }

        // 付款时间
        if (!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '') {
            $sql = $sql . 'and m.fukuanshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.fukuanshijian between ? and ? ';
            $ps[] = $fukuanshijian_begin;
            $ps[] = $fukuanshijian_end;
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
                $obj->id = $this->mysimpleencrypt->en($r->id);  
                $obj->hid = $this->mysimpleencrypt->en($r->id);
                $obj->tid = $this->mysimpleencrypt->en($r->tid);
                $obj->dingdanhao = $r->dingdanhao;
                $obj->chupiaobianma = $r->chupiaobianma;  
                $obj->dingdanzhuangtai = $vs[intval($r->dingdanzhuangtai)];
                
                if ($r->tuipiaoleixing == false) {
                    $obj->tuipiaoleixing = '自愿退票';
                } else {
                    $obj->tuipiaoleixing = '非自愿退票';
                }
                if ($r->wangfan == false) {
                    $obj->wangfan = '单程';
                } else {
                    $obj->wangfan = '返程';
                }
                // 航班时间/航班号/舱位（成人，儿童）
                $obj->hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->cangwei;
                // 出票编码
                $obj->daodajichang = $r->daodajichang;
                // 起飞 到达
                $obj->qifei_daoda = $r->qifeijichang . '/' . $r->daodajichang;
                // 总价/乘客数（成人/儿童）
                $obj->zongjia_sks = $r->dingdanzonge . '/' . $this->mhangchenglvke->getPersonNum($r->id, false) . '人' . $this->mhangchenglvke->getPersonNum($r->id, true) . '人';
                // 锁单人/更新时间
                $suodan = $this->msoudan->getSouDan($r->tid, 'tuipiao');
                /*
                if (!empty($r->caozuoyuanid)) {
                    $obj->suodan = $this->mguanliyuan->getName($r->caozuoyuanid) . '/' . $r->caozuoshijian;
                } else {
                    $obj->suodan = '';
                }
                 */
                $obj->suodan = $suodan;
                $mydata[] = $obj;
            }
        }

        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    /**
     * 显示全部订单
     */
    public function all_old() {

        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        // 查询参数
        // 出票编码
        $chupiaobianma = $this->input->post('chupiaobianma');
        // 订单编号
        $dingdanhao = $this->input->post('dingdanhao');
        // 乘客姓名
        $zhongwenming = $this->input->post('zhongwenming');
        // 航程类型
        $wangfanhangcheng = $this->input->post('wangfanhangcheng');
        // 乘客票号
        $piaohao = $this->input->post('piaohao');
        // 订单状态
        $dingdanzhuangtai = $this->input->post('dingdanzhuangtai');
        // 付款时间 开始
        $fukuanshijian_begin = $this->input->post('fukuanshijian_begin');
        // 付款时间 结束
        $fukuanshijian_end = $this->input->post('fukuanshijian_end');
        // 退票类型
        $tuipiaoleixing = $this->input->post('tuipiaoleixing');

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select t.id as id, m.dingdanhao as dingdanhao,m.chupiaobianma as chupiaobianma,
            h.wangfanhangcheng as wangfan,
            h.qifeijichang as qifeijichang,
            h.daodajichang as daodajichang,
            h.hangbanhao as hangbanhao,
            h.cangwei as cangwei,
            h.qifeishijian as qifeishijian,
            m.dingdanzonge as dingdanzonge, m.dingdanzhuangtai as dingdanzhuangtai,
            t.dingdanid as dingdanid,
            t.tuipiaoleixing as tuipiaoleixing,
            t.caozuoyuanid as caozuoyuanid,
            t.caozuoshijian as caozuoshijian,
            m.chulishijian as chulishijian 
            from dingdan as m, hangcheng as h, tuipiao as t ';

        $sqlcount = 'select count(t.id) as id from dingdan as m, hangcheng as h, tuipiao as t ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . ', hangchenglvke as lk where m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $sqlcount = $sqlcount . ', hangchenglvke as lk where m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $ps[] = $zhongwenming;

            // 乘客票号
            if (!empty($piaohao) && $piaohao != '') {
                $sql = $sql . 'and lk.piaohao = ? ';
                $sqlcount = $sqlcount . 'and lk.piaohao = ? ';
                $ps[] = $piaohao;
            }
        } else {

            // 乘客票号
            if (!empty($piaohao) && $piaohao != '') {
                $sql = $sql . ', hangchenglvke as lk where m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.piaohao = ? ';
                $sqlcount = $sqlcount . ', hangchenglvke as lk where m.id = h.dingdanid and m.id = t.dingdanid and lk.dingdanid = m.id and lk.piaohao = ? ';
                $ps[] = $piaohao;
            } else {
                $sql = $sql . 'where m.id = h.dingdanid ';
                $sqlcount = $sqlcount . 'where m.id = h.dingdanid ';
            }
        }

        // 出票编码
        if (!empty($chupiaobianma) && $chupiaobianma != '') {
            $sql = $sql . 'and m.chupiaobianma = ? ';
            $sqlcount = $sqlcount . 'and m.chupiaobianma = ? ';
            $ps[] = $chupiaobianma;
        }

        // 订单编号
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql = $sql . 'and m.dingdanhao = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }

        // 航程类型
        if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != '全部') {
            $sql = $sql . 'and h.wangfanhangcheng = ? ';
            $sqlcount = $sqlcount . 'and h.wangfanhangcheng = ? ';
            $ps[] = $wangfanhangcheng;
        }
        
        // 退票类型
        if (!empty($tuipiaoleixing) && $tuipiaoleixing != '' && $tuipiaoleixing != '全部') {
            $sql = $sql . 'and t.tuipiaoleixing = ? ';
            $sqlcount = $sqlcount . 'and t.tuipiaoleixing = ? ';
            $ps[] = $tuipiaoleixing;
        }

        // 订单状态
        if (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '') {
            $sql = $sql . 'and m.dingdanzhuangtai = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanzhuangtai = ? ';
            $ps[] = $dingdanzhuangtai;
        }

        // 付款时间
        if (!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '') {
            $sql = $sql . 'and m.fukuanshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.fukuanshijian between ? and ? ';
            $ps[] = $fukuanshijian_begin;
            $ps[] = $fukuanshijian_end;
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
                $obj->id = $r->id;
                $obj->dingdanhao = $r->dingdanhao;  
                
                if ($r->tuipiaoleixing == false) {
                    $obj->tuipiaoleixing = '自愿退票';
                } else {
                    $obj->tuipiaoleixing = '非自愿退票';
                }
                if ($r->wangfan == false) {
                    $obj->wangfan = '单程';
                } else {
                    $obj->wangfan = '返程';
                }
                // 航班时间/航班号/舱位（成人，儿童）
                $obj->hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->cangwei;
                // 出票编码
                $obj->daodajichang = $r->daodajichang;
                // 起飞 到达
                $obj->qifei_daoda = $r->qifeijichang . '/' . $r->daodajichang;
                // 总价/乘客数（成人/儿童）
                $obj->zongjia_sks = $r->dingdanzonge . '/' . $this->mhangchenglvke->getPersonNum($r->id, false) . '人' . $this->mhangchenglvke->getPersonNum($r->id, true) . '人';
                // 锁单人/更新时间
                if (!empty($r->caozuoyuanid)) {
                    $obj->suodan = $this->mguanliyuan->getName($r->caozuoyuanid) . '/' . $r->caozuoshijian;
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
    
        /**
     * 详情  
     * $en_id 航程 id
     */
    public function xiangqing($en_dingdan_id = '', $en_tuipiao_id) {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;
        
        // 退票 id
        $tuipiao_id = $this->mysimpleencrypt->de($en_tuipiao_id);

        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $mydingdanid = $this->mhangcheng->getDingDanId($id);
        $obj = $this->mdingdan->getMyObj($mydingdanid);
        $data['obj'] = $obj;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($obj->id);

        if (!empty($hangcheng)) {
            $data['hangcheng'] = $hangcheng;
            if (count($hangcheng) > 0) {
                // 获取航程旅客
                $hangchenglvke = $this->mhangchenglvke->getHangChengLvKe($hangcheng[0]->id);
                if (!empty($hangchenglvke)) {
                    $data['hangchenglvke'] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'] = $hangchenglvke_tongji;
                }
                
                // 燃油税
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
                
                // 航程 id
                $data['hangchengid'] = $hangcheng[0]->id;
                
                 // 航程 id
                $data['dingdanid'] = $obj->id;
                
                // 退票 id  
                $data['tuipiaoid'] = $tuipiao_id;
            }
        }
        
        $this->load->view('admin/guoneijipiao/tuipiao/xiangqing', $data);
    }

    /**
     * 出票处理 
     * $en_id 航程 id
     */
    public function tuipiaochuli($en_dingdan_id = '', $en_tuipiao_id) {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;
        
        // 退票 id
        $tuipiao_id = $this->mysimpleencrypt->de($en_tuipiao_id);

        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $mydingdanid = $this->mhangcheng->getDingDanId($id);
        $obj = $this->mdingdan->getMyObj($mydingdanid);
        $data['obj'] = $obj;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($obj->id);

        if (!empty($hangcheng)) {
            $data['hangcheng'] = $hangcheng;
            if (count($hangcheng) > 0) {
                // 获取航程旅客
                $hangchenglvke = $this->mhangchenglvke->getHangChengLvKe($hangcheng[0]->id);
                if (!empty($hangchenglvke)) {
                    $data['hangchenglvke'] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'] = $hangchenglvke_tongji;
                }
                
                // 燃油税
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
                
                // 航程 id
                $data['hangchengid'] = $hangcheng[0]->id;
                
                 // 航程 id
                $data['dingdanid'] = $obj->id;
                
                // 退票 id  
                $data['tuipiaoid'] = $tuipiao_id;
            }
        }
        
        $this->load->view('admin/guoneijipiao/tuipiao/tuipiaochuli', $data);
    }
    
    /**
     * 退票处理 
     */
    public function tp()
    {
        $ps = $_POST;
        $this->db->trans_begin();
        
        $admin_session = $this->session->userdata('admin');
        $hangchengid = $this->input->post('hangchengid');
        $dingdanid = $this->input->post('dingdanid');
        $tuipiaoid = $this->input->post('tuipiaoid');
        
        $flag = false;
        foreach ($ps as $key => $v)
        {
            $sc = explode('_', $key);
            // 添加出票编码
            if(!empty($sc) && $sc[0] == 'chupiaobianma')
            {
                $tpxz = array('tuipiaozhangshu' => $v,
                    'tuipiaoid' => $tuipiaoid,
                    'hangchengid' => $hangchengid,
                    'dingdanid' => $dingdanid);
                
                // 保存退票细则
                $this->db->insert('tuipiaoxize', $tpxz);
                //$this->db->update('tuipiao', array('chupiaobianma' => $v), array('id' => $sc[1]));
                 $flag = true;
            }
        }
        
        // 修改 退票单
        if($flag == true)
        {
            // 退票表设置 已经完成时间
            $obj_tuipiao = array('wanchengshijian' => date("Y-m-d H:i:s"),
                'caozuoyuanid' => $admin_session['id'],
                'caozuoshijian' => date("Y-m-d H:i:s"));
            $this->db->update('tuipiao', $obj_tuipiao, array('id' => $tuipiaoid));
            // 订单中设置 出票状态
            $this->db->update('dingdan', array('chupiaozhuangtai' => 4, 'wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => date("Y-m-d H:i:s")),
                    array('id' => $dingdanid));
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            redirect('/admin/guoneijipiao/tuipiao/success');
        }
    }
    
    public function success()
    {
        $this->load->view('admin/guoneijipiao/tuipiao/success');
    }

}
