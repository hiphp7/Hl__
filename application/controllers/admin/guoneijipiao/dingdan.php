<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  -- 保险售后管理 --  订单管理
 */
class dingdan extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '订单号/创建时间';
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
        $std3->display_name = '保险类型';
        $std3->name = 'baoxianleixing';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '保险公司/保险名称';
        $std4->name = 'hb';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '被保人数';
        $std5->name = 'biebaorenshu';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '生效日期';
        $std6->name = 'shengxiaoriqi';
        $std6->show = true;
        $li[5] = $std6;
		
        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '保单状态';
        $std7->name = 'zhuangtai';
        $std7->show = true;
        $li[6] = $std7;		

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '订单总价';
        $std7->name = 'dingdanzongjia';
        $std7->show = true;
        $li[7] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '投保人/联系方式';
        $std8->name = 'tuobaoren';
        $std8->show = true;
        $li[8] = $std8;

        $std9 = new stdClass();
        $std9->index = 8;
        $std9->display_name = '锁单人/锁单时间';
        $std9->name = 'suodan';
        $std9->show = true;
        $li[9] = $std9;

        $this->li = $li;
    }

    public function index($tableid = '') {
        $this->load->model("baoxian/mbaoxiandingdan", "mbaoxiandingdan");
        $this->load->library('mysimpleencrypt');
        $tableid = $this->mysimpleencrypt->de($tableid);
        $admin_session = $this->session->userdata('admin');
        if ($tableid != '' && $this->issuodan($tableid, $admin_session ['id']) == '未锁单') {

            $obj = array('suodan' => true, 'suodanid' => $admin_session['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('baoxiandingdan', $obj, array('dingdanid' => $tableid));
        }

        $data['li'] = $this->li;
        $data['baoxiangongsi'] = $this->mbaoxiandingdan->getBaoXianGongSi();
        $this->load->view('admin/guoneijipiao/dingdan/index', $data);
    }

    /**
     * 判断是否是用户本人锁的单
     */
    public function issuodan($id, $suodanid) {
        $result = '未锁单';
        $sql = 'select m.id as id, m.suodanid as suodanid from baoxiandingdan as m where m.dingdanid = ?';
        $res = $this->db->query($sql, array($id));
        foreach ($res->result() as $r) {
            if (!empty($r->id) && intval($r->id) > 0) {
                if (!empty($r->id) && $r->suodanid == $suodanid) {
                    $result = '自己锁单';
                } else if (!empty($r->id) && !empty($r->suodanid) && intval($r->suodanid) > 0 && intval($r->suodanid) != intval($suodanid)) {
                    $result = '别人锁单';
                }
            }
        }
        return $result;
    }

    /**
     * 解锁
     */
    public function jiesuo($hangchengid = '') {

        $this->load->library('mysimpleencrypt');
        $hangchengid = $this->mysimpleencrypt->de($hangchengid);
        $admin_session = $this->session->userdata('admin');
        if ($hangchengid != '' && $this->issuodan($hangchengid, $admin_session ['id']) == '自己锁单') {
            $obj = array('suodan' => false, 'suodanid' => 0);
            $this->db->update('baoxiandingdan', $obj, array('dingdanid' => $hangchengid));
        }
        redirect('admin/guoneijipiao/dingdan/index');
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->library('mysimpleencrypt');
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("baoxian/mbaoxiandingdan", "mbaoxiandingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        // 加载锁单
        $this->load->model("dingdan/msoudan", "msoudan");

        $bxlx = $this->config->item("保险类型");
		$bxzt = $this->config->item("保险订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        // 查询参数
        // 被保人
        $zhongwenming = $this->input->post('zhongwenming');
        // 投保人
        $lianxiren = $this->input->post('lianxiren');
        // 订单编号
        $baoxiandingdanhao = $this->input->post('baoxiandingdanhao');
        // 保险公司
        $mingcheng = $this->input->post('mingcheng');
        // 保险类型
        $baoxianleixing = $this->input->post('baoxianleixing');
        // 支付方式
        $zhifufangshi = $this->input->post('zhifufangshi');
        // 保单状态
        //$baodanzhuangtai = $this->input->post('baodanzhuangtai');
        // 付款时间 开始
        $chuangjianshijian_begin = $this->input->post('chuangjianshijian_begin');
        // 付款时间 结束
        $chuangjianshijian_end = $this->input->post('chuangjianshijian_end');
        $shanghuhao = $this->input->post('shanghuhao');
        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'baoxiandingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select d.id as id, d.dingdanhao as dingdanhao, d.chuangjianshijian as chuangjianshijian,d.lianxiren as lianxiren, d.lianxirendianhua as lianxirendianhua,
                d.zhifufangshi as zhifufangshi 
                from dingdan as d ';

        $sqlcount = 'select count(d.id) as id from dingdan as d ';

        $ps = array();
        // 被保人  
        if ((!empty($zhongwenming) && $zhongwenming != '') ||
                (!empty($mingcheng) && $mingcheng != '' && $mingcheng != '全部') ||
                (!empty($baoxiandingdanhao) && $baoxiandingdanhao != '') ||
                (!empty($baoxianleixing) && $baoxianleixing != '' && $baoxianleixing != '全部')) {
            $ids = $this->mbaoxiandingdan->getDingDanIds($zhongwenming, $mingcheng, $baoxiandingdanhao, $baoxianleixing);
            if (!empty($ids)) {
                $sql .= 'where d.id in ' . $ids;
                $sqlcount .= 'where d.id in ' . $ids;
            }
        }

        // 投保人
        if (!empty($lianxiren) && $lianxiren != '') {
            if (stristr($sql, 'where') == FALSE) {
                $sql = $sql . 'where d.lianxiren = ? ';
                $sqlcount = $sqlcount . 'where d.lianxiren = ? ';
            } else {
                $sql = $sql . 'and d.lianxiren = ? ';
                $sqlcount = $sqlcount . 'and d.lianxiren = ? ';
            }
            $ps[] = $lianxiren;
        }


        // 支付方式
        if (!empty($zhifufangshi) && $zhifufangshi != '' && $zhifufangshi != '全部') {
            if (stristr($sql, 'where') == FALSE) {
                $sql = $sql . 'where d.zhifufangshi = ? ';
                $sqlcount = $sqlcount . 'where d.zhifufangshi = ? ';
            } else {
                $sql = $sql . 'and d.zhifufangshi = ? ';
                $sqlcount = $sqlcount . 'and d.zhifufangshi = ? ';
            }
            $ps[] = $zhifufangshi;
        }
        // 保险 1 买保险
        if (stristr($sql, 'where') == FALSE) {
            $sql = $sql . 'where d.baoxian = ? ';
            $sqlcount = $sqlcount . 'where d.baoxian = ? ';
        } else {
            $sql = $sql . 'and d.baoxian = ? ';
            $sqlcount = $sqlcount . 'and d.baoxian = ? ';
        }
        $ps[] = 1;

        // 付款时间
        if (!empty($chuangjianshijian_begin) && $chuangjianshijian_begin != '' && !empty($chuangjianshijian_end) && $chuangjianshijian_end != '') {
            if (stristr($sql, 'where') == FALSE) {
                $sql = $sql . 'where d.fukuanshijian between ? and ? ';
                $sqlcount = $sqlcount . 'where d.fukuanshijian between ? and ? ';
            } else {
                $sql = $sql . 'and d.fukuanshijian between ? and ? ';
                $sqlcount = $sqlcount . 'and d.fukuanshijian between ? and ? ';
            }
            $ps[] = $chuangjianshijian_begin;
            $ps[] = $chuangjianshijian_end;
        }

        // 出票完成才显示 即出票状态为 1 时才显示
        if (stristr($sql, 'where') == FALSE) {
            $sql = $sql . 'where d.chupiaozhuangtai = ? ';
            $sqlcount = $sqlcount . 'where d.chupiaozhuangtai = ? ';
        } else {
            $sql = $sql . 'and d.chupiaozhuangtai = ? ';
            $sqlcount = $sqlcount . 'and d.chupiaozhuangtai = ? ';
        }
        $ps[] = 1;
		if (!empty($shanghuhao) && $shanghuhao != '' && $shanghuhao != '全部') {
            $sql = $sql . 'and d.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'and d.shanghuhao = ? ';
            $ps[] = $shanghuhao;
        } 


        // 不变的
        $sql = $sql . 'order by d.id desc limit ' . $start . ', ' . $length;

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
                $objdd = $this->mbaoxiandingdan->getObjByDingdanid($r->id);
                $obj = new stdClass();
                $obj->id = $r->id;
                $obj->hid = $this->mysimpleencrypt->en($r->id);
                $obj->baoxiandingdanhao = $objdd->baoxiandingdanhao; // . '/' . $r->chulishijian;
                $obj->dingdanhao = $r->dingdanhao.'<br/>'.$r->chuangjianshijian;
                $hc = $this->mhangcheng->getObj($r->id);
                if (!empty($hc) && !empty($hc->wangfan)) {
                    $obj->wangfan = $hc->wangfan;
                } else {
                    $obj->wangfan = '';
                }
                // 保险类型
                $obj->baoxianleixing = $bxlx[strval($objdd->baoxianleixing)];

                // 保险公司/保险名称
                $obj->hb = $this->mbaoxiandingdan->getBaoXianAndGongSi($objdd->baoxianchanpinid);

                // 被保人数
                $bbrs = $this->mhangchenglvke->getNum($r->id);
                if (!empty($bbrs)) {
                    $obj->biebaorenshu = $bbrs->id;
                } else {
                    $obj->biebaorenshu = 0;
                }
                // 生效日期
                $obj->shengxiaoriqi = $objdd->shengxiaoriqi;
                // 订单总价
                $obj->dingdanzongjia = $objdd->dingdanzongjia;

                // 投保人/联系方式
                $obj->tuobaoren = $r->lianxiren . '/' . $r->lianxirendianhua;

                // 锁单人/更新时间
                if (!empty($objdd->suodan) && $objdd->suodan == true) {
                    $obj->suodan = $this->mguanliyuan->getName($objdd->suodanid) . '/' . $objdd->suodanshijian;
                } else {
                    $obj->suodan = '';
                }

                if (!empty($objdd->suodanid) && $objdd->suodanid == $admin_session['id']) {
                    $obj->suodan_self = '1';
                } else {
                    $obj->suodan_self = '0';
                }
                // 保单状态
                $obj->zhuangtai = $bxzt[$objdd->baodanzhuangtai];
				$obj->baodanzhuangtai = $objdd->baodanzhuangtai;
				$obj->youweichuli = $objdd->youweichuli; // 是否有未处理保单
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
    public function xiangqing($en_id = '') {

        $this->load->library('mysimpleencrypt');
        $this->load->model("baoxian/mbaoxiandingdan", "mbaoxiandingdan");
        $data['li'] = $this->li;

        $id = $this->mysimpleencrypt->de($en_id);
        // 获取 订单出票信息
        $obj = $this->mbaoxiandingdan->getObj($id);
        $data['obj'] = $obj;

        $this->load->view('admin/guoneijipiao/dingdan/xiangqing', $data);
    }

    /**
     * 出票处理 
     * $en_id 航程 id
     */
    public function chupiaochuli($en_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("baoxian/mbaoxiandingdan", "mbaoxiandingdan");
        $data['li'] = $this->li;

        $id = $this->mysimpleencrypt->de($en_id);
        // 获取 订单出票信息
        $obj = $this->mbaoxiandingdan->getObj($id);
        $data['obj'] = $obj;

        $this->load->view('admin/guoneijipiao/dingdan/chupiaochuli', $data);
    }

    /**
     * 出票处理 
     */
    public function cp() {
        $this->db->trans_begin();

        $admin_session = $this->session->userdata('admin');

        //$id = $this->input->post('baoxian_id');
        //$baodanhao = $this->input->post('baodanhao');
        $waicaipingtai = $this->input->post('waicaipingtai');
        $waicaidingdanbianhao = $this->input->post('waicaidingdanbianhao');
        $waicaizongjia = $this->input->post('waicaizongjia');
        //$shengxiaoriqi = $this->input->post('shengxiaoriqi');
        $dingdanid = $this->input->post('dingdanid');
        //$insurance = $this->input->post('insurance');

        $mybaodanhao = $this->input->post('mybaodanhao');
        $myshengxiaoriqi = $this->input->post('myshengxiaoriqi');
        $baodanhao = json_decode($mybaodanhao);
        foreach ($baodanhao as $bd) {
            $this->db->update('baoxiandingdan', array('baodanhao' => $bd->baodanhao, 'waicaipingtai' => $waicaipingtai,
                'waicaidingdanbianhao' => $waicaidingdanbianhao,
                'waicaizongjia' => $waicaizongjia,
                'wanchengshijian' => date("Y-m-d H:i:s"),
                'baodanzhuangtai' => 3,
                'caozuoyuanid' => $admin_session['id']), array('id' => $bd->baoxianid));
        }

        $shengxiaoriqi = json_decode($myshengxiaoriqi);
        foreach ($shengxiaoriqi as $rq) {
            $this->db->update('baoxiandingdan', array('shengxiaoriqi' => $rq->shengxiaoriqi), array('id' => $rq->baoxianid));
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if ($dingdanid != 0) {
                $fasong = $this->mdingdan->getDuanXinTongZhi($dingdanid);

                $this->myalidayu->TouBaoChengGong_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            redirect('/admin/guoneijipiao/dingdan/success');
        }
    }

    /**
     * 出票处理 
     */
    public function cp0() {
        $this->db->trans_begin();

        $admin_session = $this->session->userdata('admin');
        $this->load->model("dingdan/mgaiqian", "mgaiqian");

        $id = $this->input->post('baoxian_id');
        $baodanhao = $this->input->post('baodanhao');
        $waicaipingtai = $this->input->post('waicaipingtai');
        $waicaidingdanbianhao = $this->input->post('waicaidingdanbianhao');
        $waicaizongjia = $this->input->post('waicaizongjia');
        $shengxiaoriqi = $this->input->post('shengxiaoriqi');
        $dingdanid = $this->input->post('dingdanid');
        $insurance = $this->input->post('insurance');

        $this->db->update('baoxiandingdan', array('baodanhao' => $baodanhao, 'waicaipingtai' => $waicaipingtai,
            'waicaidingdanbianhao' => $waicaidingdanbianhao,
            'waicaizongjia' => $waicaizongjia,
            'shengxiaoriqi' => $shengxiaoriqi,
            'wanchengshijian' => date("Y-m-d H:i:s"),
            'baodanzhuangtai' => 3,
            'caozuoyuanid' => $admin_session['id']), array('id' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if ($dingdanid != 0) {
                $fasong = $this->mdingdan->getDuanXinTongZhi($dingdanid);
                //var_dump($fasong);
                $this->myalidayu->TouBaoChengGong2($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $insurance, $baodanhao, '400-991-7909');
            }
            redirect('/admin/guoneijipiao/dingdan/success');
        }
    }

    // 处理成功
    public function success() {
        $this->load->view('admin/guoneijipiao/dingdan/success');
    }

}
