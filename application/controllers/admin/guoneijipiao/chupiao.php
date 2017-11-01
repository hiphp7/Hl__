<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  出票管理
 */
class chupiao extends CI_Controller {

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

        $this->li = $li;
    }

    public function index($hangchengid = '' ,$r='') {
        $data['li'] = $this->li;
        $this->load->library('mysimpleencrypt');
        $hangchengid = $this->mysimpleencrypt->de($hangchengid);
        $admin_session = $this->session->userdata('admin');

        if ($hangchengid != '' && $this->issuodan($hangchengid, $admin_session ['id']) == '未锁单') {
            $obj = array('suodan' => 1, 'suodanid' => $admin_session ['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('dingdan', $obj, array('id' => $hangchengid));
			
        }
        $this->load->view('admin/guoneijipiao/chupiao/index', $data);
    }
	
	public function jiasuo($hangchengid = '' ,$r='') {
        $data['li'] = $this->li;
        $this->load->library('mysimpleencrypt');
        $hangchengid = $this->mysimpleencrypt->de($hangchengid);
        $admin_session = $this->session->userdata('admin');

        if ($hangchengid != '' && $this->issuodan($hangchengid, $admin_session ['id']) == '未锁单') {
            $obj = array('suodan' => 1, 'suodanid' => $admin_session ['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('dingdan', $obj, array('id' => $hangchengid));
			
        }
		redirect('admin/guoneijipiao/chupiao/index');
        //$this->load->view('admin/guoneijipiao/chupiao/index', $data);
    }

    /**
     * 判断是否是用户本人锁的单
     */
    public function issuodan($id, $suodanid) {
        $result = '未锁单';
        $sql = 'select m.id as id, m.suodanid as suodanid from dingdan as m where m.id = ?';
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
    public function jiesuo($hangchengid = '',$r='') {
		$this->load->helper('url');
        $this->load->library('mysimpleencrypt');
        $hangchengid = $this->mysimpleencrypt->de($hangchengid);
        $admin_session = $this->session->userdata('admin');
		
        if ($hangchengid != '' && $this->issuodan($hangchengid, $admin_session ['id']) == '自己锁单') {
            $obj = array('suodan' => 0, 'suodanid' => 0);
            $this->db->update('dingdan', $obj, array('id' => $hangchengid));
			
        }
        redirect('admin/guoneijipiao/chupiao/index');
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->library('mysimpleencrypt');
        // 加载管理员
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        // 加载航程
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        // 加载航程
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        // 出票编码
        $chupiaobianma = $this->input->post('chupiaobianma');
        // 订单编号
        $dingdanhao = $this->input->post('dingdanhao');
        // 乘客姓名
        $zhongwenming = $this->input->post('zhongwenming');
        // 航程类型
        $wangfanhangcheng = $this->input->post('wangfanhangcheng');
        // 支付方式
        $zhifufangshi = $this->input->post('zhifufangshi');
        // 订单状态
        $dingdanzhuangtai = $this->input->post('dingdanzhuangtai');
        // 付款时间 开始
        $fukuanshijian_begin = $this->input->post('fukuanshijian_begin');
        // 付款时间 结束
        $fukuanshijian_end = $this->input->post('fukuanshijian_end');
		$shanghuhao = $this->input->post('shanghuhao');
        $mysort = 'id';
        $mydir = 'desc';
        // if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
        //     $mysort = $this->li[$sortid]->name;
        //     $mydir = $dir;
        // }

        $sql = 'select m.id as id, m.dingdanhao as dingdanhao, 
            m.chupiaobianma as chupiaobianma,
            m.dingdanzonge as dingdanzonge, 
            m.dingdanzhuangtai as dingdanzhuangtai,
            m.suodan as suodan, 
            m.suodanid as suodanid,
            m.lianxiren as lianxiren,
            m.lianxirendianhua as lianxirendianhua,			
            m.suodanshijian as suodanshijian,
			m.fukuanshijian as fukuanshijian,
			m.chuangjianshijian as chuangjianshijian,
            m.chulishijian as chulishijian 
            from dingdan as m ';

        $sqlcount = 'select count(m.id) as id from dingdan as m ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $ps_sub = $this->mhangchenglvke->getDingDanIdByName($zhongwenming, '');
            $sql = $sql . 'where m.id in ' . $ps_sub . ' ';
            $sqlcount = $sqlcount . 'where m.id in ' . $ps_sub . ' ';
        } else {
            $sql = $sql . 'where ';
            $sqlcount = $sqlcount . 'where ';
        }

        // 出票编码
        if (!empty($chupiaobianma) && $chupiaobianma != '') {
            $sql = $sql . "and m.chupiaobianma like '%" . $chupiaobianma . "%'  ";
            $sqlcount = $sqlcount . "and m.chupiaobianma like '%" . $chupiaobianma . "%' ";
        }

        // 订单编号
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql = $sql . 'and m.dingdanhao = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }


        // 航程类型

        if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != '全部') {
            $sql = $sql . 'and m.wangfanhangcheng = ? ';
            $sqlcount = $sqlcount . 'and m.wangfanhangcheng = ? ';
            $ps[] = $wangfanhangcheng;
        }

        // 支付方式
        if (!empty($zhifufangshi) && $zhifufangshi != '' && $zhifufangshi != '全部') {
            $sql = $sql . 'and m.zhifufangshi = ? ';
            $sqlcount = $sqlcount . 'and m.zhifufangshi = ? ';
            $ps[] = $zhifufangshi;
        } 

        // 订单状态
        if (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '' && $dingdanzhuangtai != '全部') {
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

        $sql = $sql . 'and m.isgaiqian = ? ';
        $sqlcount = $sqlcount . 'and m.isgaiqian = ? ';
        $ps[] = 0;
		
        if (!empty($shanghuhao) && $shanghuhao != '' && $shanghuhao != '全部') {
            $sql = $sql . 'and m.shanghuhao = ? ';
            $sqlcount = $sqlcount . 'and m.shanghuhao = ? ';
            $ps[] = $shanghuhao;
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
                // id 简单加密一下
                $obj->id = $this->mysimpleencrypt->en($r->id);
                $obj->hid = $this->mysimpleencrypt->en($r->id);

                $hc = $this->mhangcheng->getObj($r->id);
                $obj->dingdanhao = $r->dingdanhao . '<br/>' . $r->chuangjianshijian;

                $obj->wangfan = $hc->wangfan;
                // 航班时间/航班号/舱位（成人，儿童）
                $obj->hb = $hc->hb;
                // 出票编码
                $obj->chupiaobianma = $r->chupiaobianma;
                // 到达机场
                $obj->daodajichang = $hc->daodajichang;
                // 起飞 到达
                $obj->qifei_daoda = $hc->qifeijichang . '/' . $hc->daodajichang;
                // 总价/乘客数（成人/儿童）
                $obj->zongjia_sks = $r->dingdanzonge . '/' . $this->getPersonNum($r->id, 0) . '人' . $this->getPersonNum($r->id, 1) . '人';

                // 锁单人/更新时间
                if ($r->suodan == true) {
                    $obj->suodan = $this->mguanliyuan->getName($r->suodanid) . '/' . $r->suodanshijian;
                } else {
                    $obj->suodan = '';
                }

                if ($r->suodanid == $admin_session['id']) {
                    $obj->suodan_self = '1';
                } else {
                    $obj->suodan_self = '0';
                }
                // 订单状态
                $obj->dingdanzhuangtai = $myconfig[$r->dingdanzhuangtai];
                $obj->dingdanzhuangtai_int = $r->dingdanzhuangtai;

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
     * 获取订单的旅客人数
     * $id 为订单 id
     * $ertong 是否儿童，默认为 false
     */
    public function getPersonNum($id, $ertong) {

        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ? and m.shifouertong = ?';
        $res = $this->db->query($sql, array($id, $ertong));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }
        return $mycount;
    }

    /**
     * 详情  
     * $en_id 航程 id
     */
    public function xiangqing($en_id = '') {

        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;

        //$id = $this->mysimpleencrypt->de($en_id);
        //$mydingdanid = $this->mhangcheng->getDingDanId($id);
        $mydingdanid = $this->mysimpleencrypt->de($en_id);
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
                    $data['hangchenglvke'][0] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'][0] = $hangchenglvke_tongji;
                }

                if (count($hangcheng) > 1) {

                    // 获取航程旅客
                    $hangchenglvke1 = $this->mhangchenglvke->getHangChengLvKe($hangcheng[1]->id);
                    if (!empty($hangchenglvke1)) {
                        $data['hangchenglvke'][1] = $hangchenglvke1;
                    }

                    $hangchenglvke_tongji1 = $this->mhangchenglvke->tongji_hangcheng($hangcheng[1]->id, $mydingdanid);
                    if (!empty($hangchenglvke_tongji1)) {
                        $data['hangchenglvke_tongji'][1] = $hangchenglvke_tongji1;
                    }
                }

                // 燃油税
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
            }
        }
        $this->load->view('admin/guoneijipiao/chupiao/xiangqing', $data);
    }

    /**
     * 出票处理 
     * $en_id 航程 id
     */
    public function chupiaochuli($en_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;

        //$id = $this->mysimpleencrypt->de($en_id);
        //$mydingdanid = $this->mhangcheng->getDingDanId($id);
        $mydingdanid = $this->mysimpleencrypt->de($en_id);
        $obj = $this->mdingdan->getMyObj($mydingdanid);
        $data['obj'] = $obj;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($obj->id);

        if (!empty($hangcheng)) {
            $data['hangcheng'] = $hangcheng;
            if (count($hangcheng) > 0) {
                $data['hangchengid'] = $hangcheng[0]->id;
                // 获取航程旅客
                $hangchenglvke = $this->mhangchenglvke->getHangChengLvKe($hangcheng[0]->id);
                if (!empty($hangchenglvke)) {
                    $data['hangchenglvke'][0] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'][0] = $hangchenglvke_tongji;
                }

                if (count($hangcheng) > 1) {

                    $hangchenglvke1 = $this->mhangchenglvke->getHangChengLvKe($hangcheng[1]->id);
                    if (!empty($hangchenglvke1)) {
                        $data['hangchenglvke'][1] = $hangchenglvke1;
                    }

                    $hangchenglvke_tongji1 = $this->mhangchenglvke->tongji_hangcheng($hangcheng[1]->id, $mydingdanid);
                    if (!empty($hangchenglvke_tongji1)) {
                        $data['hangchenglvke_tongji'][1] = $hangchenglvke_tongji1;
                    }
                }

                // 燃油税
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
            }
        }

        $this->load->view('admin/guoneijipiao/chupiao/chupiaochuli', $data);
    }

    /**
     * 异地出票
     */
    public function yidicp() {
        $admin_session = $this->session->userdata('admin');
        $dingdanid = $this->input->post('yidi_dingdanid');
        $chupiaobianma = Array();
        // 添加事物
        $this->db->trans_begin();
        // 0、获取出票编码 并保存到数据库
        $yidi_piaohao_cpbm = $this->input->post('yidi_piaohao_cpbm');
        $cpbm = json_decode($yidi_piaohao_cpbm);
        foreach ($cpbm as $v) {
            if ($v->ertong == '1') {
                $this->db->update('hangchenglvke', array('chupiaobianma' => $v->cpbm), array('hangchengid' => $v->hangchenglvid, 'shifouertong' => true));
            } else {
                $this->db->update('hangchenglvke', array('chupiaobianma' => $v->cpbm), array('hangchengid' => $v->hangchenglvid, 'shifouertong' => false));
            }
            if (!in_array($v->cpbm, $chupiaobianma)) {
                array_push($chupiaobianma, $v->cpbm);
            }
        }
        $chupiaobianma = implode("<br/>", $chupiaobianma);
        // 1、获取票号 并保存到数据库
        $yidi_piaohao = $this->input->post('yidi_piaohao');
        $piaohao = json_decode($yidi_piaohao);
        foreach ($piaohao as $key => $v) {
            $this->db->update('hangchenglvke', array('piaohao' => $v->piaohao, 'zhuangtai' => '已出票'), array('id' => $v->hangchenglvke));
        }

        // 2、修改 订单表
        $chupiaoshijian = date("Y-m-d H:i:s");
        $ps = array(
            'yidipingtai' => $this->input->post('yidipingtai'),
            'yidicaigoujine' => $this->input->post('yidicaigoujine'),
            'yididingdanhao' => $this->input->post('yididingdanhao'),
            'yidiqitashuoming' => $this->input->post('yidiqitashuoming'),
            'chupiaobianma' => $chupiaobianma,
            'chulishijian' => $chupiaoshijian,
            'chupiaozhuangtai' => 1,
            // 订单状态 标示为已经出票
            'dingdanzhuangtai' => 3);
        $this->db->update('dingdan', $ps, array('id' => $dingdanid));

        // 财务用
        $orders_sql = 'select m.id as id,
                       m.dingdanhao as dingdanhao,
                       m.sanfanggongsi as sanfanggongsi,
                       m.dingdanleibie as dingdanleibie,
                       m.yonghuid as yonghuid,
                       m.chupiaobianma as chupiaobianma,
                       m.zhifufangshi as zhifufangshi,
                       m.dingdanzonge as dingdanzonge,
                       m.chupiaozhuangtai as chupiaozhuangtai,
                       m.lianxiren as lianxiren,
                       m.lianxirendianhua as lianxirendianhua,
                       m.baoxian as baoxian,
                       m.baoxiaopingzheng as baoxiaopingzheng,
                       m.fasongduanxin as fasongduanxin,
                       m.dingdanzhuangtai as dingdanzhuangtai,
                       m.fukuanshijian as fukuanshijian,
                       m.chuangjianshijian as chuangjianshijian,
                       m.chulishijian as chulishijian,
                       m.wanchengshijian as wanchengshijian,
                       m.caozuoyuanid as caozuoyuanid,
                       m.beizhu as beizhu,
                       m.shoujianren as shoujianren,
                       m.youjidizhi as youjidizhi,
                       m.youjirendianhua as youjirendianhua,
                       m.suodanid as suodanid,
                       m.yidipingtai as yidipingtai,
                       m.yidicaigoujine as yidicaigoujine,
                       m.yididingdanhao as yididingdanhao,
                       m.yidiqitashuoming as yidiqitashuoming,
                       m.prn as prn,
                       m.caigoujine as caigoujine,
                       m.qitashuoming as qitashuoming,
                       m.isgaiqian as isgaiqian,
                       m.chupiaozhuangtai as chupiaozhuangtai,
                       m.chuangjianshijian as chuangjianshijian
                       from dingdan as m  where id = ?';

        $orders_res = $this->db->query($orders_sql, $dingdanid);

        $dingdan = $orders_res->row();

        $orderid = $dingdan->id;

        $sql = "SELECT group_concat(concat(concat(lk.qifeishijian,'-'),lk.daodashijian)) as qifeidaodashijian, SUM(lk.fanchengbiaozhi) AS wangfan, GROUP_CONCAT(lk.s1) AS chengrencangweiall, GROUP_CONCAT(lk.s2) AS ertongcangweiall, SUM(lk.piaomiandanjia) as piaomiandanjiaall, SUM(lk.danzhangpiaomianjia) as danzhangpiaomianjiaall, group_concat(concat(concat(lk.dstCitysanzima,'-'),lk.orgCitysanzima)) as chufadaodacity, GROUP_CONCAT(lk.hangbanhao) as hanghanhaoall,lk.* FROM (select m.id as id,m.dstCitysanzima as dstCitysanzima,m.orgCitysanzima as orgCitysanzima,m.qifeishijian as qifeishijian,m.daodashijian as daodashijian,m.piaomiandanjia as piaomiandanjia,m.danzhangpiaomianjia AS danzhangpiaomianjia,m.xiaoshouzongjia AS xiaoshouzongjia,m.hangbanhao as hangbanhao,m.fanchengbiaozhi as fanchengbiaozhi,
   l.shifouertong AS shifouertong,l.hangchengid AS hangchengid,mmm.s1 AS s1,mmm.s2 AS s2,m.dstCity,m.orgCity FROM hangcheng as m LEFT JOIN ( SELECT  m1.seatCode as s1, m1.hangchengid as h1, m2.hangchengid as h2  ,m2.seatCode as s2 FROM hangchenglvke AS m1,hangchenglvke AS m2 WHERE  m1.shifouertong =0 AND m2.shifouertong=1 ) as mmm ON mmm.h1 =m.id and mmm.h2 =m.id LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? GROUP BY l.hangchengid )as lk ";

        $query = $this->db->query($sql, array($orderid));

        $hc = $query->row();
        $sql4 = '
   select
   SUM(case when l.shifouertong = 0 THEN 1 else 0 END) AS daren,
   SUM(case when l.shifouertong = 1 THEN 1 else 0 END) AS ertong FROM hangcheng as m LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? limit 1';
        $query = $this->db->query($sql4, array($orderid));
        $renci = $query->row();


        $data = new stdclass();
        $data->dingdanhao = $dingdan->dingdanhao;
        $data->orderid = $orderid;
        $data->lianxiren = $dingdan->lianxiren;
        $data->lianxirendianhua = $dingdan->lianxirendianhua;  // 联系人电话
        $data->chuangjianshijian = $dingdan->chuangjianshijian;  // 创建时间
        $data->zhifushijian = $dingdan->fukuanshijian;  // 付款时间
        $data->chupiaoshijian = $dingdan->wanchengshijian;  // 完成时间
        $data->dingdanzhuangtai = $dingdan->dingdanzhuangtai;  // 订单状态
        $data->jipiaozongjia = $dingdan->dingdanzonge;  // 订单总价
        $data->zhifuzongjia = $dingdan->dingdanzonge;  // 订单总价

        $data->zhifufeilv = 0.006; // 支付费率
        $data->zhifushouxufei = floatval($dingdan->dingdanzonge) * 0.006; // 支付手续费
        $data->shijishoukuan = floatval($dingdan->dingdanzonge) - $data->zhifushouxufei;  // 实收款
        $data->zhifuqudao = $dingdan->zhifufangshi;  // 支付渠道
        $data->baoxiaozongjia = $dingdan->baoxiaopingzheng ? 15 : 0;

        $data->hangchengleixing = $hc->wangfan;   // 是否往返程
        if ($hc->wangfan) {
            $daren = intval($renci->daren) / 2;
            $ertong = intval($renci->ertong) / 2;
            $baoxianshu = ($daren + $ertong) * 2;
        } else {
            $daren = $renci->daren;
            $ertong = $renci->ertong;
            $baoxianshu = $daren + $ertong;
        }
        $data->hangbanhao = $hc->hanghanhaoall; // 航班号
        $data->chufachengshi = $hc->orgCity;  // 出发城市
        $data->daodachengshi = $hc->dstCity;  // 到达城市

        $data->qifeijichang = $hc->chufadaodacity; // 出发机场-到达机场

        $data->chengrencangwei = $hc->chengrencangweiall;  // 成人舱位
        $data->ertongcangwei = $hc->ertongcangweiall;   // 儿童舱位
        $data->chengrenshuliang = $daren;  // 成人数
        $data->ertonshuliang = $ertong;  // 儿童数
        $data->changrenjia = $hc->piaomiandanjiaall;  // 成人票面价
        $data->ertongjia = intval($hc->danzhangpiaomianjiaall) / 2; // 儿童价票面价
        $data->qifeidaodashijian = $hc->qifeidaodashijian; // 起飞到达时间

        $data->youhu = 0;

        if ($dingdan->baoxian) {
            $sql2 = 'select m.dingdanzongjia as dingdanzongjia from baoxiandingdan as m where m.dingdanid = ?';
            $query = $this->db->query($sql2, array($orderid));

            $baoxian = $query->first_row();

            $baoxiandanjia = $baoxian->dingdanzongjia;
            $data->baoxiandanjia = $baoxiandanjia;

            $data->baoxianshu = $baoxianshu;
            $data->baoxianzongjia = $baoxianshu * $baoxiandanjia;
        } else {
            $data->baoxiandanjia = 0;
            $data->baoxianshu = 0;
            $data->baoxianzongjia = 0;
        }

        $this->db->insert('caiwu_fj_chupiao', $data);

        $data = new stdClass();
        $data->caigouqudao = "异地";
        $data->yidipingtai = $this->input->post('yidipingtai');
        $data->yididingdanhao = $this->input->post('yididingdanhao');
        $data->chupiaobianma = $chupiaobianma;
        $data->dingdanzhuangtai = 3;
        $data->chupiaoshijian = $chupiaoshijian;
        $data->gendanrenxingming = $admin_session['username'];

        $this->db->update('caiwu_fj_chupiao', $data, array('orderid' => $dingdanid));
        // 财务 详情
        // $dingdanid = 213;
        $sql = "select h.seatCode as cangwei,h.hangbanhao AS hangbanhao,h.orgCity AS chufachengshi,h.dstCity AS daodachengshi,
        h.orgCitysanzima AS qifeijichang,h.dstCitysanzima AS daodajichang,h.qifeishijian AS qifeishijian,h.hangkonggongsi AS hangsi,
        d.chulishijian AS chupiaoshijian,d.dingdanhao as dingdanhao, d.yidipingtai as yidipingtai, d.chupiaobianma as chupiaobianma, d.yididingdanhao as yididingdanhao,
        lk.piaohao AS piaohao, lk.zhengjianhaoma as zhengjianhaoma, lk.zhengjianleixing AS chengkeleixing,lk.zhongwenming AS xingming,
        lk.piaomianjia AS goumaijia,lk.id as hangchenglvkeid,
        lk.chushengriqi AS chushengriqi, h.id AS hangchengid, d.id  AS orderid FROM hangchenglvke as lk 
        LEFT JOIN hangcheng AS h on lk.hangchengid = h.id LEFT JOIN dingdan AS d ON d.id = lk.dingdanid WHERE lk.dingdanid = ?";
        $query = $this->db->query($sql, $dingdanid);
        $lk = $query->result();
        foreach ($lk as $v) {
            $data = new stdclass();
            $data = $v;
            if (empty($data->yididingdanhao)) {
                $data->caigouqudao = '本地';
            } else {
                $data->caigouqudao = '异地';
            }
            $data->kepiaozhuangtai = '已出票';
            $this->db->insert('caiwu_fj_xiangqing', $data);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if ($dingdanid != 0) {
                $fasong = $this->mdingdan->getDuanXinTongZhiEx($dingdanid);
                if (!empty($fasong->airline_fan)) {
                    $this->myalidayu->ChuPiaoTongZhi_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->deptime, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan, $fasong->deptime_fan);
                } else {
                    $this->myalidayu->ChuPiaoTongZhi_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->deptime);
                }
            }
            $this->db->update('dingdan', array('wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => $admin_session['id']), array('id' => $dingdanid));
            redirect('/admin/guoneijipiao/chupiao/success');
        }
    }

    /**
     * 本地出票
     */
    public function bendicp() {
        $admin_session = $this->session->userdata('admin');
        $dingdanid = $this->input->post('ben_dingdanid');
        $chupiaobianma = Array();
        // 添加事物
        $this->db->trans_begin();
        // 0、获取出票编码 并保存到数据库
        $ben_piaohao_cpbm = $this->input->post('ben_piaohao_cpbm');
        $cpbm = json_decode($ben_piaohao_cpbm);
        foreach ($cpbm as $v) {
            if ($v->ertong == '1') {
                $this->db->update('hangchenglvke', array('chupiaobianma' => $v->cpbm), array('hangchengid' => $v->hangchenglvid, 'shifouertong' => true));
            } else {
                $this->db->update('hangchenglvke', array('chupiaobianma' => $v->cpbm), array('hangchengid' => $v->hangchenglvid, 'shifouertong' => false));
            }
            if (!in_array($v->cpbm, $chupiaobianma)) {
                array_push($chupiaobianma, $v->cpbm);
            }
        }

        // 1、获取票号 并保存到数据库
        $ben_piaohao = $this->input->post('ben_piaohao');
        $piaohao = json_decode($ben_piaohao);
        foreach ($piaohao as $key => $v) {
            $this->db->update('hangchenglvke', array('piaohao' => $v->piaohao, 'zhuangtai' => '已出票'), array('id' => $v->hangchenglvke));
        }
        $chupiaobianma = implode("<br/>", $chupiaobianma);

        // 2、修改 订单表
        $chupiaoshijian = date("Y-m-d H:i:s");
        $ps = array(
            'prn' => $this->input->post('prn'),
            'caigoujine' => $this->input->post('caigoujine'),
            'qitashuoming' => $this->input->post('qitashuoming'),
            'chupiaobianma' => $chupiaobianma,
            'chulishijian' => $chupiaoshijian,
            'chupiaozhuangtai' => 1,
            // 订单状态 标示为已经出票
            'dingdanzhuangtai' => 3);
        $this->db->update('dingdan', $ps, array('id' => $dingdanid));
        // 财务用
        $orders_sql = 'select m.id as id,
   m.dingdanhao as dingdanhao,
   m.sanfanggongsi as sanfanggongsi,
   m.dingdanleibie as dingdanleibie,
   m.yonghuid as yonghuid,
   m.chupiaobianma as chupiaobianma,
   m.zhifufangshi as zhifufangshi,
   m.dingdanzonge as dingdanzonge,
   m.chupiaozhuangtai as chupiaozhuangtai,
   m.lianxiren as lianxiren,
   m.lianxirendianhua as lianxirendianhua,
   m.baoxian as baoxian,
   m.baoxiaopingzheng as baoxiaopingzheng,
   m.fasongduanxin as fasongduanxin,
   m.dingdanzhuangtai as dingdanzhuangtai,
   m.fukuanshijian as fukuanshijian,
   m.chuangjianshijian as chuangjianshijian,
   m.chulishijian as chulishijian,
   m.wanchengshijian as wanchengshijian,
   m.caozuoyuanid as caozuoyuanid,
   m.beizhu as beizhu,
   m.shoujianren as shoujianren,
   m.youjidizhi as youjidizhi,
   m.youjirendianhua as youjirendianhua,
   m.suodanid as suodanid,
   m.yidipingtai as yidipingtai,
   m.yidicaigoujine as yidicaigoujine,
   m.yididingdanhao as yididingdanhao,
   m.yidiqitashuoming as yidiqitashuoming,
   m.prn as prn,
   m.caigoujine as caigoujine,
   m.qitashuoming as qitashuoming,
   m.isgaiqian as isgaiqian,
   m.chupiaozhuangtai as chupiaozhuangtai,
   m.chuangjianshijian as chuangjianshijian
   from dingdan as m  where id = ?';

        $orders_res = $this->db->query($orders_sql, $dingdanid);

        $dingdan = $orders_res->row();

        $orderid = $dingdan->id;

        $sql = "SELECT group_concat(concat(concat(lk.qifeishijian,'-'),lk.daodashijian)) as qifeidaodashijian, SUM(lk.fanchengbiaozhi) AS wangfan, GROUP_CONCAT(lk.s1) AS chengrencangweiall, GROUP_CONCAT(lk.s2) AS ertongcangweiall, SUM(lk.piaomiandanjia) as piaomiandanjiaall, SUM(lk.danzhangpiaomianjia) as danzhangpiaomianjiaall, group_concat(concat(concat(lk.dstCitysanzima,'-'),lk.orgCitysanzima)) as chufadaodacity, GROUP_CONCAT(lk.hangbanhao) as hanghanhaoall,lk.* FROM (select m.id as id,m.dstCitysanzima as dstCitysanzima,m.orgCitysanzima as orgCitysanzima,m.qifeishijian as qifeishijian,m.daodashijian as daodashijian,m.piaomiandanjia as piaomiandanjia,m.danzhangpiaomianjia AS danzhangpiaomianjia,m.xiaoshouzongjia AS xiaoshouzongjia,m.hangbanhao as hangbanhao,m.fanchengbiaozhi as fanchengbiaozhi,
   l.shifouertong AS shifouertong,l.hangchengid AS hangchengid,mmm.s1 AS s1,mmm.s2 AS s2,m.dstCity,m.orgCity FROM hangcheng as m LEFT JOIN ( SELECT  m1.seatCode as s1, m1.hangchengid as h1, m2.hangchengid as h2  ,m2.seatCode as s2 FROM hangchenglvke AS m1,hangchenglvke AS m2 WHERE  m1.shifouertong =0 AND m2.shifouertong=1 ) as mmm ON mmm.h1 =m.id and mmm.h2 =m.id LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? GROUP BY l.hangchengid )as lk ";

        $query = $this->db->query($sql, array($orderid));

        $hc = $query->row();
        $sql4 = '
   select
   SUM(case when l.shifouertong = 0 THEN 1 else 0 END) AS daren,
   SUM(case when l.shifouertong = 1 THEN 1 else 0 END) AS ertong FROM hangcheng as m LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ? limit 1';
        $query = $this->db->query($sql4, array($orderid));
        $renci = $query->row();


        $data = new stdclass();
        $data->dingdanhao = $dingdan->dingdanhao;
        $data->orderid = $orderid;
        $data->lianxiren = $dingdan->lianxiren;
        $data->lianxirendianhua = $dingdan->lianxirendianhua;  // 联系人电话
        $data->chuangjianshijian = $dingdan->chuangjianshijian;  // 创建时间
        $data->zhifushijian = $dingdan->fukuanshijian;  // 付款时间
        $data->chupiaoshijian = $dingdan->wanchengshijian;  // 完成时间
        $data->dingdanzhuangtai = $dingdan->dingdanzhuangtai;  // 订单状态
        $data->jipiaozongjia = $dingdan->dingdanzonge;  // 订单总价
        $data->zhifuzongjia = $dingdan->dingdanzonge;  // 订单总价

        $data->zhifufeilv = 0.006; // 支付费率
        $data->zhifushouxufei = floatval($dingdan->dingdanzonge) * 0.006; // 支付手续费
        $data->shijishoukuan = floatval($dingdan->dingdanzonge) - $data->zhifushouxufei;  // 实收款
        $data->zhifuqudao = $dingdan->zhifufangshi;  // 支付渠道
        $data->baoxiaozongjia = $dingdan->baoxiaopingzheng ? 15 : 0;

        $data->hangchengleixing = $hc->wangfan;   // 是否往返程
        if ($hc->wangfan) {
            $daren = intval($renci->daren) / 2;
            $ertong = intval($renci->ertong) / 2;
            $baoxianshu = ($daren + $ertong) * 2;
        } else {
            $daren = $renci->daren;
            $ertong = $renci->ertong;
            $baoxianshu = $daren + $ertong;
        }
        $data->hangbanhao = $hc->hanghanhaoall; // 航班号
        $data->chufachengshi = $hc->orgCity;  // 出发城市
        $data->daodachengshi = $hc->dstCity;  // 到达城市

        $data->qifeijichang = $hc->chufadaodacity; // 出发机场-到达机场

        $data->chengrencangwei = $hc->chengrencangweiall;  // 成人舱位
        $data->ertongcangwei = $hc->ertongcangweiall;   // 儿童舱位
        $data->chengrenshuliang = $daren;  // 成人数
        $data->ertonshuliang = $ertong;  // 儿童数
        $data->changrenjia = $hc->piaomiandanjiaall;  // 成人票面价
        $data->ertongjia = intval($hc->danzhangpiaomianjiaall) / 2; // 儿童价票面价
        $data->qifeidaodashijian = $hc->qifeidaodashijian; // 起飞到达时间

        $data->youhu = 0;

        if ($dingdan->baoxian) {
            $sql2 = 'select m.dingdanzongjia as dingdanzongjia from baoxiandingdan as m where m.dingdanid = ?';
            $query = $this->db->query($sql2, array($orderid));

            $baoxian = $query->first_row();

            $baoxiandanjia = $baoxian->dingdanzongjia;
            $data->baoxiandanjia = $baoxiandanjia;

            $data->baoxianshu = $baoxianshu;
            $data->baoxianzongjia = $baoxianshu * $baoxiandanjia;
        } else {
            $data->baoxiandanjia = 0;
            $data->baoxianshu = 0;
            $data->baoxianzongjia = 0;
        }

        $this->db->insert('caiwu_fj_chupiao', $data);


        $data = new stdClass();
        $data->caigouqudao = '本地';
        $data->dingdancaigouzonge = $this->input->post('caigoujine');
        $data->chupiaobianma = $chupiaobianma;
        $data->dingdanzhuangtai = 3;
        $data->chupiaoshijian = $chupiaoshijian;
        $data->gendanrenxingming = $admin_session['username'];

        $this->db->update('caiwu_fj_chupiao', $data, array('orderid' => $dingdanid));
        // 财务详情
        // $dingdanid = 213;
        $sql = "select h.seatCode as cangwei,h.hangbanhao AS hangbanhao,h.orgCity AS chufachengshi,h.dstCity AS daodachengshi,
        h.orgCitysanzima AS qifeijichang,h.dstCitysanzima AS daodajichang,h.qifeishijian AS qifeishijian,h.hangkonggongsi AS hangsi,
        d.chulishijian AS chupiaoshijian,d.dingdanhao as dingdanhao, d.yidipingtai as yidipingtai, d.chupiaobianma as chupiaobianma, d.yididingdanhao as yididingdanhao,
        lk.piaohao AS piaohao, lk.zhengjianhaoma as zhengjianhaoma, lk.zhengjianleixing AS chengkeleixing,lk.zhongwenming AS xingming,
        lk.piaomianjia AS goumaijia,lk.id as hangchenglvkeid,
        lk.chushengriqi AS chushengriqi, h.id AS hangchengid, d.id  AS orderid FROM hangchenglvke as lk 
        LEFT JOIN hangcheng AS h on lk.hangchengid = h.id LEFT JOIN dingdan AS d ON d.id = lk.dingdanid WHERE lk.dingdanid = ?";
        $query = $this->db->query($sql, $dingdanid);
        $lk = $query->result();
        foreach ($lk as $v) {
            $data = new stdclass();
            $data = $v;
            if (empty($data->yididingdanhao)) {
                $data->caigouqudao = '本地';
            } else {
                $data->caigouqudao = '异地';
            }
            $data->kepiaozhuangtai = '已出票';
            $this->db->insert('caiwu_fj_xiangqing', $data);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if ($dingdanid != 0) {
                $fasong = $this->mdingdan->getDuanXinTongZhiEx($dingdanid);
                if (!empty($fasong->airline_fan)) {
                    $this->myalidayu->ChuPiaoTongZhi_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->deptime, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan, $fasong->deptime_fan);
                } else {
                    $this->myalidayu->ChuPiaoTongZhi_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->deptime);
                }
            }
            $this->db->update('dingdan', array('wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => $admin_session['id']), array('id' => $dingdanid));
            redirect('/admin/guoneijipiao/chupiao/success');
        }
    }

    public function success() {
        $this->load->view('admin/guoneijipiao/chupiao/success');
    }

}

