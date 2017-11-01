<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  退票管理
 */
class gaiqianshengqing extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '申请号';
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
        $std3->display_name = '起飞/到达';
        $std3->name = 'qifei_daoda';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '改签时间';
        $std4->name = 'gaiqianshijian';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '是否升舱';
        $std5->name = 'shifoushengcang';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '乘客数(成人/儿童)';
        $std6->name = 'zongjia_sks';
        $std6->show = true;
        $li[5] = $std6;
        /*
          $std7 = new stdClass();
          $std7->index = 6;
          $std7->display_name = '乘客数(成人/儿童)';
          $std7->name = 'zongjia_sks';
          $std7->show = true;
          $li[6] = $std7;
         */
        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '锁单人/更新时间';
        $std8->name = 'suodan';
        $std8->show = true;
        $li[7] = $std8;

        $this->li = $li;
    }

    public function index($gaiqianid = '') {
        $data['li'] = $this->li;
		$this->load->library('mysimpleencrypt');
		$gaiqianid = $this->mysimpleencrypt->de($gaiqianid);
		$admin_session = $this->session->userdata('admin');
        // 执行锁单
        if ($gaiqianid != '' && $this->issuodan($gaiqianid, $admin_session ['id']) == '未锁单') {
			$obj = array('suodan' => true, 'suodanid' => $admin_session['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
			$this->db->update('gaiqiandingdan', $obj, array('id' => $gaiqianid));
        }
        $this->load->view('admin/guoneijipiao/gaiqianshengqing/index', $data);
    }
	/**
     * 判断是否是用户本人锁的单
     */
    public function issuodan($id, $suodanid)
    {
        $result = '未锁单';
        $sql = 'select m.id as id, m.suodanid as suodanid from gaiqiandingdan as m where m.id = ?';
        $res = $this->db->query($sql, array($id));
        foreach ($res->result() as $r) {
            if(!empty($r->id) && intval($r->id) > 0)
            {
                if(!empty($r->id) && $r->suodanid == $suodanid)
                {
                    $result = '自己锁单';
                }
                else if(!empty($r->id) && !empty ($r->suodanid) && intval($r->suodanid) > 0
                        && intval($r->suodanid) != intval($suodanid))
                {
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
            $this->db->update('gaiqiandingdan', $obj, array('id' => $hangchengid));
        }
        redirect('admin/guoneijipiao/gaiqianshengqing/index');
    }


    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->library('mysimpleencrypt');
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mgaiqian", "mgaiqian");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        //$vs = $this->config->item("订单状态");
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
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            //$mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, 
            m.dingdanid as dingdanid,
            m.chulizhuangtai as chulizhuangtai,
            m.shenqingzhuangtai as shenqingzhuangtai,
            m.shenqinghao as shenqinghao,
            m.suodan as suodan,
            m.suodanid as suodanid,
            m.suodanshijian as suodanshijian 
            from gaiqiandingdan as m where ';

        $sqlcount = 'select count(m.id) as id from gaiqiandingdan as m where ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $zwm = $this->mhangchenglvke->getGaiQianIdByName($zhongwenming, '');
            $sql = $sql . 'and m.dingdanid in ' . $zwm . ' ';
            $sqlcount = $sqlcount . 'and m.dingdanid in ' . $zwm . ' ';
        }

        
          // 申请编号
          if (!empty($shenqinghao) && $shenqinghao != '') {
          $sql = $sql . 'and m.shenqinghao = ? ';
          $sqlcount = $sqlcount . 'and m.shenqinghao = ? ';
          $ps[] = $shenqinghao;
          }
         

        // 申请状态
        if (!empty($shenqingzhuangtai) && $shenqingzhuangtai != '' && $shenqingzhuangtai != '全部') {
            $sql = $sql . 'and m.shenqingzhuangtai = ? ';
            $sqlcount = $sqlcount . 'and m.shenqingzhuangtai = ? ';
            $ps[] = $shenqingzhuangtai;
        }

        // 改签日期
        if (!empty($gaiqianshijian_begin) && $gaiqianshijian_begin != '' && !empty($gaiqianshijian_end) && $gaiqianshijian_end != '') {
            $sql = $sql . 'and m.gaiqianshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.gaiqianshijian between ? and ? ';
            $ps[] = $gaiqianshijian_begin;
            $ps[] = $gaiqianshijian_end;
        }

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
				$shenqinghao = $r->shenqinghao;

                $gc = $this->mgaiqian->getgq($r->dingdanid, $r->chulizhuangtai);
                $obj->id = $this->mysimpleencrypt->en($r->id);

                $obj->chulizhuangtai = $r->chulizhuangtai;
                $obj->shenqingzhuangtai = $r->shenqingzhuangtai;

                // 申请号
                $obj->dingdanhao = $r->shenqinghao;

                $hc = $this->mhangcheng->getObj($r->dingdanid);
                $obj->wangfan = !empty($hc->wangfan) ? $hc->wangfan : '';

                // 起飞 到达
                $obj->qifei_daoda = !empty($hc->qifeijichang) ? $hc->qifeijichang . '/' . $hc->daodajichang : '';

                // 订单状态
                 if ($gc->shifoushengcang == '0') {
                    $obj->shifoushengcang = '不升舱';
                } elseif ($gc->shifoushengcang == '1') {
                    $obj->shifoushengcang = '可考虑升为公务舱';
                } else {
                    $obj->shifoushengcang = '可考虑升为头等舱';
                }

                // 航班时间/航班号/舱位（成人，儿童）
                $obj->gaiqianshijian = $gc->gaiqianshijian;
				$sql = 'select h.shifouertong as shifouertong, COUNT(h.shifouertong) as renshu from gaiqian as m, hangchenglvke as h 
                where m.hangchenglvkeid = h.id and m.shenqinghao = ? GROUP BY h.shifouertong';
                $query = $this->db->query($sql, array($shenqinghao));

                $re = $query->result();
                $daren = 0;
                $ertong = 0;
                if (!empty($re)) {
                    foreach ($re as  $v) {
                        if($v->shifouertong == '0'){
                            $daren = $v->renshu;
                        } else {
                            $ertong = $v->renshu;
                        }
                    }
                }
                $obj->zongjia_sks = $daren . '/成人' . $ertong . '/儿童';

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
     public function xiangqing($en_gaiqian_id = '') {

        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("dingdan/mgaiqian", "mgaiqian");
        $this->load->model("dingdan/mgaiqiandingdan", "mgaiqiandingdan");
        $this->load->model("dingdan/mgaiqianxiangqing", "mgaiqianxiangqing");
        $data['li'] = $this->li;
		$zhenghjianlexing = $this->config->item("证件类型");

        $dingdanid = 0;
        // 改签订单ID id
        $id = $this->mysimpleencrypt->de($en_gaiqian_id);


        $tp = $this->mgaiqian->getObj($id);
        if (!empty($tp) && count($tp) > 0) {
            $dingdanid = $tp[0]->dingdanid;
        }
        $obj = $this->mdingdan->getMyObj($dingdanid);
        $obj_tuipiaodingdan = $this->mgaiqiandingdan->getObj($id);
        $data['obj_tuipiaodingdan'] = $obj_tuipiaodingdan;

        $data['obj'] = $obj;
        $data['gaiqian_obj'] = $tp;

        // 改签订单 id
        $data['gaiqiandingdanid'] = $id;

        $sql = 'select m.shenqinghao as shenqinghao from gaiqiandingdan as m where id = ?';
        $query = $this->db->query($sql, array($id));
        $res = $query->row();
        $shenqinghao = $res->shenqinghao;

        $sql = 'select m.shenqinghao as shenqinghao,
        m.hangchengid as hangchengid,
        m.gaiqianshijian as gaiqianshijian,
        m.shifoushengcang as shifoushengcang,
        m.hangchenglvkeid as hangchenglvkeid,
        count(m.gaiqianrenshu) as gaiqianrenshu,
        m.shenqingzhuangtai as shenqingzhuangtai
        from gaiqian as m  where shenqinghao = ? GROUP BY hangchengid';

        $query = $this->db->query($sql, array($shenqinghao));
        $re = $query->result();

        if (!empty($re)) {
            $hangc = array();
            foreach ($re as $v) {
                $a = new stdClass();
                $hangchengid = $v->hangchengid;
                // 根据航程ID获取航程信息
                $sql = 'select m.id as id, m.PNRhao as PNRhao, m.shifouertong as shifouertong,
                m.chengkerenshu as chengkerenshu, m.wangfanhangcheng as wangfanhangcheng, 
                m.fanchengbiaozhi as fanchengbiaozhi, m.hangchengxuhao as hangchengxuhao, 
                m.hangkonggongsi as hangkonggongsi, m.hangbanhao as hangbanhao, 
                m.gongxianghangbanhao as gongxianghangbanhao, m.jixing as jixing,
                m.qifeijichang as qifeijichang, m.daodajichang as daodajichang,
                m.qifeihangzhanlou as qifeihangzhanlou, m.daodahangzhanlou as daodahangzhanlou,
                m.jingtinglianbiao as jingtinglianbiao, m.qifeishijian as qifeishijian,
                m.daodashijian as daodashijian, m.cangwei as cangwei, m.piaoyuanshuliang as piaoyuanshuliang,
                m.xiaoshouzongjia as xiaoshouzongjia, m.piaomiandanjia as piaomiandanjia, m.ranyoushui as ranyoushui,
                m.fandian as fandian, m.fanqian as fanqian,
				m.parPrice as parPrice,
				m.fandian as fandian, m.fanqian as fanqian,
				m.refundStipulate as refundStipulate,
				m.changeStipulate as changeStipulate,
				m.suitableAirline as suitableAirline,
				m.modifyStipulate as modifyStipulate,
				m.refundStipulateChild as refundStipulateChild,
				m.changeStipulateChild as changeStipulateChild,
				m.modifyStipulateChild as modifyStipulateChild,
				m.suitableAirlineChild as suitableAirlineChild, 
                m.jijianfei as jijianfei, m.baoxian as baoxian, m.qitafei as qitafei, m.danzhangpiaomianjia as danzhangpiaomianjia
                from hangcheng as m where m.id = ?';
                $res = $this->db->query($sql, array($hangchengid));

                $a->hangcheng = $res->row();

                $gaiqianxiangqing_ss = $this->mgaiqianxiangqing->getObj($hangchengid, $id);
                if (!empty($gaiqianxiangqing_ss) && count($gaiqianxiangqing_ss) > 0) {
                    $a->gaiqianxiangqing = $gaiqianxiangqing_ss[0];
                } else {
                    $a->gaiqianxiangqing ='';
                }

                // 获取改签人员
                $sql2 = 'select m.shenqinghao as shenqinghao,
                m.hangchengid as hangchengid,
                m.gaiqianshijian as gaiqianshijian,
                m.shifoushengcang as shifoushengcang,
                m.hangchenglvkeid as hangchenglvkeid,
                m.gaiqianshuoming as gaiqianshuoming,
                m.shenqingzhuangtai as shenqingzhuangtai
                from gaiqian as m  where shenqinghao = ? and hangchengid = ?';

                $query = $this->db->query($sql2, array($shenqinghao, $hangchengid));
                $res = $query->result();

                if(!empty($res)){

                    $gaiqianshenqing = new stdClass();
                    if ($res[0]->shifoushengcang == '0') {
                        $gaiqianshenqing->leixing = '不升舱';
                    } elseif ($res[0]->shifoushengcang == '1') {
                        $gaiqianshenqing->leixing = '可考虑升为公务舱';
                    } else {
                        $gaiqianshenqing->leixing = '可考虑升为头等舱';
                    }
                    $gaiqianshenqing->gaiqianshijian = date("Y-m-d", strtotime($res[0]->gaiqianshijian));
                    $gaiqianshenqing->gaiqianyuanyin = $res[0]->gaiqianshuoming;
                    $gaiqianlvke = array();
					$youertong = false;
                    foreach ($res as $v2) {

                        $hangchenglvkeid = $v2->hangchenglvkeid;
                        // 查询航程旅客信息
                        $sql3 ='select m.id as id, m.lvkeid as lvkeid,m.hangchengid as hangchengid, 
                        m.shifouertong as shifouertong,
                        m.pingtaidingdanhao as pingtaidingdanhao,
                        m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
                        m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
                        m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
                        m.xingbie as xingbie, m.chushengriqi as chushengriqi,
                        m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
                        m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
                        m.chushengdi as chushengdi, m.shoujihao as shoujihao,
                        m.seatCode as seatCode, m.refundStipulate as refundStipulate,
                        m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
						m.piaomianjia as piaomianjia,
                        m.modifyStipulate as modifyStipulate,
                        m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where id = ?';
                        $query = $this->db->query($sql3, array($hangchenglvkeid));
                        $res = $query->row();
						$res->zhengjianleixing = $zhenghjianlexing[$res->zhengjianleixing];
	                    if ($res->shifouertong == '1') {
                            $youertong = true;
                        }
                        $gaiqianlvke[] = $res;
						
                    }
                    $a->gaiqianlvke = $gaiqianlvke;
                    $a->gaiqianshenqing = $gaiqianshenqing;
					$a->youertong = $youertong;


                }
                $hangc[] = $a;

            }

        }

        $data['dingdanid'] = $dingdanid;
        $data['hangc'] = $hangc;

        $this->load->view('admin/guoneijipiao/gaiqianshengqing/xiangqing', $data);
    }
    /**
     * 出票处理 
     * $en_id 航程 id
     */
        public function gaiqianchuli($en_gaiqian_id = '') {

            $this->load->library('mysimpleencrypt');
            $this->load->model("hangcheng/mhangcheng", "mhangcheng");
            $this->load->model("dingdan/mdingdan", "mdingdan");
            $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
            $this->load->model("dingdan/mgaiqian", "mgaiqian");
            $this->load->model("dingdan/mgaiqiandingdan", "mgaiqiandingdan");
            $this->load->model("dingdan/mgaiqianxiangqing", "mgaiqianxiangqing");
            $data['li'] = $this->li;
			$zhenghjianlexing = $this->config->item("证件类型");

            $dingdanid = 0;
            // 改签订单ID id
            $id = $this->mysimpleencrypt->de($en_gaiqian_id);


            $tp = $this->mgaiqian->getObj($id);
            if (!empty($tp) && count($tp) > 0) {
                $dingdanid = $tp[0]->dingdanid;
            }
            $obj = $this->mdingdan->getMyObj($dingdanid);
            $obj_tuipiaodingdan = $this->mgaiqiandingdan->getObj($id);
            $data['obj_tuipiaodingdan'] = $obj_tuipiaodingdan;

            $data['obj'] = $obj;
            $data['gaiqian_obj'] = $tp;

            // 改签订单 id
            $data['gaiqiandingdanid'] = $id;

            $sql = 'select m.shenqinghao as shenqinghao from gaiqiandingdan as m where id = ?';
            $query = $this->db->query($sql, array($id));
            $res = $query->row();
            $shenqinghao = $res->shenqinghao;
			$data['shenqinghao'] = $shenqinghao;

            $sql = 'select m.shenqinghao as shenqinghao,
            m.hangchengid as hangchengid,
            m.gaiqianshijian as gaiqianshijian,
            m.shifoushengcang as shifoushengcang,
            m.hangchenglvkeid as hangchenglvkeid,
            count(m.gaiqianrenshu) as gaiqianrenshu,
            m.shenqingzhuangtai as shenqingzhuangtai
            from gaiqian as m  where shenqinghao = ? GROUP BY hangchengid';

            $query = $this->db->query($sql, array($shenqinghao));
            $re = $query->result();

            if (!empty($re)) {
                $hangc = array();
                foreach ($re as $v) {
                    $a = new stdClass();
                    $hangchengid = $v->hangchengid;
                // 根据航程ID获取航程信息
                    $sql = 'select m.id as id, m.PNRhao as PNRhao, m.shifouertong as shifouertong,
                    m.chengkerenshu as chengkerenshu, m.wangfanhangcheng as wangfanhangcheng, 
                    m.fanchengbiaozhi as fanchengbiaozhi, m.hangchengxuhao as hangchengxuhao, 
                    m.hangkonggongsi as hangkonggongsi, m.hangbanhao as hangbanhao, 
                    m.gongxianghangbanhao as gongxianghangbanhao, m.jixing as jixing,
                    m.qifeijichang as qifeijichang, m.daodajichang as daodajichang,
                    m.qifeihangzhanlou as qifeihangzhanlou, m.daodahangzhanlou as daodahangzhanlou,
                    m.jingtinglianbiao as jingtinglianbiao, m.qifeishijian as qifeishijian,
                    m.daodashijian as daodashijian, m.cangwei as cangwei, m.piaoyuanshuliang as piaoyuanshuliang,
                    m.xiaoshouzongjia as xiaoshouzongjia, m.piaomiandanjia as piaomiandanjia, m.ranyoushui as ranyoushui,
                    m.fandian as fandian, m.fanqian as fanqian,
					m.parPrice as parPrice,
                    m.fandian as fandian, m.fanqian as fanqian,
                    m.refundStipulate as refundStipulate,
                    m.changeStipulate as changeStipulate,
                    m.suitableAirline as suitableAirline,
                    m.modifyStipulate as modifyStipulate,
                    m.refundStipulateChild as refundStipulateChild,
                    m.changeStipulateChild as changeStipulateChild,
                    m.modifyStipulateChild as modifyStipulateChild,
                    m.suitableAirlineChild as suitableAirlineChild, 
                    m.jijianfei as jijianfei, m.baoxian as baoxian, m.qitafei as qitafei, m.danzhangpiaomianjia as danzhangpiaomianjia
                    from hangcheng as m where m.id = ?';
                    $res = $this->db->query($sql, array($hangchengid));

                    $a->hangcheng = $res->row();

                    $gaiqianxiangqing_ss = $this->mgaiqianxiangqing->getObj($hangchengid, $id);
                    if (!empty($gaiqianxiangqing_ss) && count($gaiqianxiangqing_ss) > 0) {
                        $a->gaiqianxiangqing = $gaiqianxiangqing_ss[0];
                    } else {
                        $a->gaiqianxiangqing ='';
                    }

                // 获取改签人员
                    $sql2 = 'select m.shenqinghao as shenqinghao,
                    m.hangchengid as hangchengid,
                    m.gaiqianshijian as gaiqianshijian,
                    m.shifoushengcang as shifoushengcang,
                    m.hangchenglvkeid as hangchenglvkeid,
                    m.gaiqianshuoming as gaiqianshuoming,
                    m.shenqingzhuangtai as shenqingzhuangtai
                    from gaiqian as m  where shenqinghao = ? and hangchengid = ?';

                    $query = $this->db->query($sql2, array($shenqinghao, $hangchengid));
                    $res = $query->result();

                    if(!empty($res)){
                        $gaiqianshenqing = new stdClass();
                        if ($res[0]->shifoushengcang == '0') {
                            $gaiqianshenqing->leixing = '不升舱';
                        } elseif ($res[0]->shifoushengcang == '1') {
                            $gaiqianshenqing->leixing = '可考虑升为公务舱';
                        } else {
                            $gaiqianshenqing->leixing = '可考虑升为头等舱';
                        }
                        $gaiqianshenqing->gaiqianshijian = date("Y-m-d", strtotime($res[0]->gaiqianshijian));
                        $gaiqianshenqing->gaiqianyuanyin = $res[0]->gaiqianshuoming;
                        $gaiqianlvke = array();
						$youertong = false;
                        foreach ($res as $v2) {

                            $hangchenglvkeid = $v2->hangchenglvkeid;
                        // 查询航程旅客信息
                            $sql3 ='select m.id as id, m.lvkeid as lvkeid,m.hangchengid as hangchengid, 
                            m.shifouertong as shifouertong,
                            m.pingtaidingdanhao as pingtaidingdanhao,
                            m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
                            m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
                            m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
                            m.xingbie as xingbie, m.chushengriqi as chushengriqi,
                            m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
                            m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
                            m.chushengdi as chushengdi, m.shoujihao as shoujihao,
                            m.seatCode as seatCode, m.refundStipulate as refundStipulate,
                            m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
							m.piaomianjia as piaomianjia,
                            m.modifyStipulate as modifyStipulate,
                            m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where id = ?';
                            $query = $this->db->query($sql3, array($hangchenglvkeid));
                            $res = $query->row();
							$res->zhengjianleixing = $zhenghjianlexing[$res->zhengjianleixing];
							if ($res->shifouertong == '1') {
								$youertong = true;
							}							
                            $gaiqianlvke[] = $res;
                        }
                        $a->gaiqianlvke = $gaiqianlvke;
                        $a->gaiqianshenqing = $gaiqianshenqing;
						$a->youertong = $youertong;


                    }
                    $hangc[] = $a;

                }

            }


            $data['dingdanid'] = $dingdanid;

            $data['hangc'] = $hangc;

            $this->load->view('admin/guoneijipiao/gaiqianshengqing/gaiqianchuli', $data);
        }
    /**
     * 改签处理 
     */
    public function gq() {
		header("Content-type:text/html;charset=utf-8");
        $this->db->trans_begin();
		$total = 0;
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $admin_session = $this->session->userdata('admin');
        $this->load->model("dingdan/mgaiqian", "mgaiqian");

        $dingdanid = $this->input->post('dingdanid_1');

        // 航班号
        $hangbanhao_1 = $this->input->post('hangbanhao_1');
        // 航班日期
        $hangbanriqi_1 = $this->input->post('hangbanriqi_1');
        // 起飞时间
        $qifeishijian_1 = $this->input->post('qifeishijian_1');
        // 抵达时间
        $didashijian_1 = $this->input->post('didashijian_1');
        // 成人舱位
        $chengrencangwei_1 = $this->input->post('chengrencangwei_1');
        // 成人单张手续费
        $chengrenshouxufei_1 = $this->input->post('chengrenshouxufei_1');
        // 成人单张升舱费
        $chengrenshengcangfei_1 = $this->input->post('chengrenshengcangfei_1');
        // 儿童舱位
        $ertongcangwei_1 = $this->input->post('ertongcangwei_1');
        // 儿童单张手续费
        $ertongshouxufei_1 = $this->input->post('ertongshouxufei_1');
        // 儿童单张升舱费
        $ertongshengcangfei_1 = $this->input->post('ertongshengcangfei_1');
        // 航程 id
        $hangchengid_1 = $this->input->post('hangchengid_1');
        // 改签详情 id
        $xqid_1 = $this->input->post('xqid_1');
		// 跨天
		$kuatian_1 = $this->input->post('kuatian_1');
		
		if ($chengrenshouxufei_1 == '' && empty($chengrenshouxufei_1)) {
            $chengrenshouxufei_1 = 0;
        } else {
            $chengrenshouxufei_1 = floatval($chengrenshouxufei_1);
        }
        if ($chengrenshengcangfei_1 == '' && empty($chengrenshengcangfei_1)) {
            $chengrenshengcangfei_1 = 0;
        } else {
            $chengrenshengcangfei_1 = floatval($chengrenshengcangfei_1);
        }

        if ($ertongshouxufei_1 == '' && empty($ertongshouxufei_1)) {
            $ertongshouxufei_1 = 0;
        } else {
            $ertongshouxufei_1 = floatval($ertongshouxufei_1);
        }

        if ($ertongshengcangfei_1 == '' && empty($ertongshengcangfei_1)) {
            $ertongshengcangfei_1 = 0;
        } else {
            $ertongshengcangfei_1 = floatval($ertongshengcangfei_1);
        }

        // 航班号
        $hangbanhao_2 = $this->input->post('hangbanhao_2');
        // 航班日期
        $hangbanriqi_2 = $this->input->post('hangbanriqi_2');
        // 起飞时间
        $qifeishijian_2 = $this->input->post('qifeishijian_2');
        // 抵达时间
        $didashijian_2 = $this->input->post('didashijian_2');
        // 成人舱位
        $chengrencangwei_2 = $this->input->post('chengrencangwei_2');
        // 成人单张手续费
        $chengrenshouxufei_2 = $this->input->post('chengrenshouxufei_2');
        // 成人单张升舱费
        $chengrenshengcangfei_2 = $this->input->post('chengrenshengcangfei_2');
        // 儿童舱位
        $ertongcangwei_2 = $this->input->post('ertongcangwei_2');
        // 儿童单张手续费
        $ertongshouxufei_2 = $this->input->post('ertongshouxufei_2');
        // 儿童单张升舱费
        $ertongshengcangfei_2 = $this->input->post('ertongshengcangfei_2');
        // 航程 id
        $hangchengid_2 = $this->input->post('hangchengid_2');
        // 改签详情 id
        $xqid_2 = $this->input->post('xqid_2');
        // 跨天
        $kuatian_2 = $this->input->post('kuatian_2');

        // 改签订单
        $gaiqiandingdanid = $this->input->post('gaiqiandingdanid');

        $shenqingzhuangtai = $this->input->post('shenqingzhuangtai');
		$shenqinghao = $this->input->post('shenqinghao');
		$ghangcheng = array();
		
		 $q1 = substr($qifeishijian_1, 0, 2);
        $q2 = substr($qifeishijian_1, 2, 2);
        $qifeishijian_1 = $hangbanriqi_1.' '.$q1.':'.$q2.':00';

        $qifeishijian_1 = date("Y-m-d H:i:s", strtotime($qifeishijian_1));

        // 抵达时间
        $didashijian_1 = $this->input->post('didashijian_1');

        $q1 = substr($didashijian_1, 0, 2);
        $q2 = substr($didashijian_1, 2, 2);
        $didashijian_1 = $hangbanriqi_1.' '.$q1.':'.$q2.':00';

        $didashijian_1 = date("Y-m-d H:i:s", strtotime($didashijian_1));
        $didashijian_1  = date("Y-m-d H:i:s",strtotime("$didashijian_1   + $kuatian_1   day"));
		
        $obj = array('hangbanriqi' => $hangbanriqi_1,
            'qifeishijian' => $qifeishijian_1,
            'didashijian' => $didashijian_1,
            'chengrencangwei' => $chengrencangwei_1,
            'chengrenshouxufei' => $chengrenshouxufei_1,
            'chengrenshengcangfei' => $chengrenshengcangfei_1,
            'ertongcangwei' => $ertongcangwei_1,
            'ertongshouxufei' => $ertongshouxufei_1,
            'ertongshengcangfei' => $ertongshengcangfei_1,
            'gaiqiandingdanid' => $gaiqiandingdanid,
            'hangbanhao' => $hangbanhao_1,
            'hangchengid' => $hangchengid_1,
            'caozuorenid' => $admin_session['id'],
            'caozuoshijian' => date("Y-m-d H:i:s")
        );
		$ghangcheng[0]= $obj;

        if (!empty($hangchengid_2) && intval($hangchengid_2) > 0) {
			
			if ($chengrenshouxufei_2 == '' && empty($chengrenshouxufei_2)) {
				$chengrenshouxufei_2 = 0;
			} else {
				$chengrenshouxufei_2 = floatval($chengrenshouxufei_1);
			}
			if ($chengrenshengcangfei_2 == '' && empty($chengrenshengcangfei_2)) {
				$chengrenshengcangfei_2 = 0;
			} else {
				$chengrenshengcangfei_2 = floatval($chengrenshengcangfei_2);
			}

			if ($ertongshouxufei_2 == '' && empty($ertongshouxufei_2)) {
				$ertongshouxufei_2 = 0;
			} else {
				$ertongshouxufei_2 = floatval($ertongshouxufei_2);
			}

			if ($ertongshengcangfei_2 == '' && empty($ertongshengcangfei_2)) {
				$ertongshengcangfei_2 = 0;
			} else {
				$ertongshengcangfei_2 = floatval($ertongshengcangfei_2);
			}
			
			
			$q1 = substr($qifeishijian_2, 0, 2);
            $q2 = substr($qifeishijian_2, 2, 2);
            $qifeishijian_2 = $hangbanriqi_2.' '.$q1.':'.$q2.':00';

            $qifeishijian_2 = date("Y-m-d H:i:s", strtotime($qifeishijian_2));

            $q1 = substr($didashijian_2, 0, 2);
            $q2 = substr($didashijian_2, 2, 2);
            $didashijian_2 = $hangbanriqi_2.' '.$q1.':'.$q2.':00';

            $didashijian_2 = date("Y-m-d H:i:s", strtotime($didashijian_2));
            $didashijian_2  = date("Y-m-d H:i:s",strtotime("$didashijian_2   + $kuatian_2  day"));
            $obj1 = array('hangbanriqi' => $hangbanriqi_2,
                'qifeishijian' => $qifeishijian_2,
                'didashijian' => $didashijian_2,
                'chengrencangwei' => $chengrencangwei_2,
                'chengrenshouxufei' => $chengrenshouxufei_2,
                'chengrenshengcangfei' => $chengrenshengcangfei_2,
                'ertongcangwei' => $ertongcangwei_2,
                'ertongshouxufei' => $ertongshouxufei_2,
                'ertongshengcangfei' => $ertongshengcangfei_2,
                'gaiqiandingdanid' => $gaiqiandingdanid,
                'hangbanhao' => $hangbanhao_2,
                'hangchengid' => $hangchengid_2,
                'caozuorenid' => $admin_session['id'],
                'caozuoshijian' => date("Y-m-d H:i:s")
            );
			$ghangcheng[1]= $obj1;

        }

        if ($shenqingzhuangtai == '2') {

            if (!empty($hangchengid_1) && intval($hangchengid_1) > 0) {
                if (!empty($xqid_1) && intval($xqid_1) > 0) {
                    // 保存改签详情
                    $this->db->update('gaiqianxiangqing', $obj, array('id' => $xqid_1));
                } else {
                    // 保存改签详情
                    $this->db->insert('gaiqianxiangqing', $obj);
                }
            }

            if (!empty($hangchengid_2) && intval($hangchengid_2) > 0) {
                if (!empty($xqid_2) && intval($xqid_2) > 0) {
                    // 保存改签详情
                    $this->db->update('gaiqianxiangqing', $obj1, array('id' => $xqid_2));
                } else {
                    // 保存改签详情
                    $this->db->insert('gaiqianxiangqing', $obj1);
                }
            }
			
            // 改签单
            $this->db->update('gaiqian', array('shenqingzhuangtai' => $shenqingzhuangtai, 'shenghe' => true,
                'chulizhuangtai' => 2,
                'shengherenid' => $admin_session['id'],
                'caozuoyuanid' => $admin_session['id'],
                'shengheshijian' => date("Y-m-d H:i:s")), array('shenqinghao' => $shenqinghao));
            // 改签订单
            $this->db->update('gaiqiandingdan', array('shenqingzhuangtai' => $shenqingzhuangtai, 'shenghe' => true,
                'chulizhuangtai' => 2,
                'shengherenid' => $admin_session['id'],
                'caozuoyuanid' => $admin_session['id'],
                'shengheshijian' => date("Y-m-d H:i:s")), array('shenqinghao' => $shenqinghao));
            // 订单
            //$this->db->update('dingdan', array('chupiaozhuangtai' => 7), array('id' => $dingdanid));

            // 更新航程旅客状态
            $this->db->query('update hangchenglvke set zhuangtai = ? where id in (select hangchenglvkeid from gaiqian where shenqinghao = ? )', array('已改期', $shenqinghao));

			
			
			// 保存新的改签订单
			$dingdanidold = $dingdanid;
			$sql = 'select m.yonghuid as yonghuid,
			m.lianxirendianhua as lianxirendianhua,
			m.baoxian as baoxian,
			m.lianxiren as lianxiren,
			m.baoxiaopingzheng as baoxiaopingzheng,
			m.shoujianren as shoujianren,
			m.youjidizhi as youjidizhi,
			m.youjirendianhua as youjirendianhua,
			m.dingdanhao as dingdanhao,
                        m.shanghuhao as shanghuhao,
			m.baoxiaopingzheng as baoxiaopingzheng,
			m.lianxiren as lianxiren from dingdan as m where id = ?';

			$query = $this->db->query($sql, $dingdanidold);

			$res = $query->row();
			
			$sql = 'select m.id as id from dingdan as m order by m.id desc limit 0, 1';
			$query = $this->db->query($sql);
			$row = $query->row();
			if(!empty($row)){
				$lastid = $row->id;
				$newid = $lastid + 1;
			} else{
				$newid = 1;
			}

			
			$dingdanhao = 'hc' . date('Ymdhis') . $newid;
			$std = new stdClass();
			$std->yonghuid = $res->yonghuid;
			$std->lianxiren = $res->lianxiren;
			$std->lianxirendianhua = $res->lianxirendianhua;
			$std->baoxian = $res->baoxian;
			$std->shoujianren = $res->shoujianren;
			$std->youjidizhi = $res->youjidizhi;
			$std->youjirendianhua = $res->youjirendianhua;
			$std->dingdanhao = $dingdanhao;
			$std->parentdingdanhao = $res->dingdanhao;
			$std->baoxiaopingzheng = $res->baoxiaopingzheng;
			$std->shanghuhao = $res->shanghuhao;

			$std->isgaiqian = 1; // 表示改签单
			$std->chuangjianshijian = date("Y-m-d H:i:s");

			// 等待处理 -订单状态
			$std->dingdanzhuangtai= 0; 
			// 出票状态
			$std->chupiaozhuangtai = 0;
			// 发送短信
			$std->fasongduanxin= 1; 
			$this->db->insert('dingdan', $std);
			$dingdanid = $this->db->insert_id();
			
			// 更新新订单号
			$this->db->update('gaiqiandingdan', array('xindingdanid' => $dingdanid), array('shenqinghao' => $shenqinghao)); 
			// 遍历航程
			$index = 0;

			foreach ($ghangcheng as $hangcheng) {
				$gaiqiandingdanid = $hangcheng['gaiqiandingdanid'];
				$hangchengidold = $hangcheng['hangchengid'];

				$sql = 'select m.hangkonggongsi as hangkonggongsi,
				m.qifeihangzhanlou as qifeihangzhanlou,
				m.daodahangzhanlou as daodahangzhanlou,
				m.airlineCode as airlineCode,
				m.dstCity as dstCity,
				m.orgCity as orgCity,
                m.dstCitysanzima as dstCitysanzima,
                m.orgCitysanzima as orgCitysanzima,
				m.piaomiandanjia as piaomiandanjia,
				m.parPrice as parPrice,
				m.jijianfei as jijianfei,
				m.ranyoushui as ranyoushui,				
				m.qifeishijian as qifeishijian,
				m.qifeijichang as qifeijichang,
				m.daodajichang as daodajichang
				from hangcheng as m where m.id = ?
				';
				$query = $this->db->query($sql, $hangchengidold);
				$hc = $query->row();
				// 获取退改签规则
				$qifeijichang = $hc->qifeijichang;
				$daodajichang = $hc->daodajichang;
				$airlineCode = $hc->airlineCode;
				$date = $hangcheng['qifeishijian'];
				$seatCode = $hangcheng['chengrencangwei'];
				// 获取退改签规则
                // $mealPolicy = $this->gettuigaiqian($date, $airlineCode, $qifeijichang, $daodajichang ,$seatCode);
				$tuigai = $this->tuigai($date, $airlineCode, $qifeijichang, $daodajichang ,$seatCode);

				// 改签航程
				$std2 = new stdClass();
				$std2->qifeishijian = $hangcheng['qifeishijian'];
				$std2->daodashijian = $hangcheng['didashijian'];
				$std2->cangwei = $hangcheng['chengrencangwei'];
				$std2->hangbanhao = $hangcheng['hangbanhao'];

				$std2->hangkonggongsi = $hc->hangkonggongsi;
				$std2->qifeihangzhanlou = $hc->qifeihangzhanlou;
				$std2->daodahangzhanlou = $hc->daodahangzhanlou;
				$std2->qifeijichang = $hc->qifeijichang;
				$std2->daodajichang = $hc->daodajichang;
				$std2->dstCity = $hc->dstCity;
				$std2->orgCity = $hc->orgCity;
				$std2->jijianfei = $hc->jijianfei;
                $std2->ranyoushui = $hc->ranyoushui;
                $std2->dstCitysanzima = $hc->dstCitysanzima;
                $std2->orgCitysanzima = $hc->orgCitysanzima;
				$std2->dingdanid = $dingdanid;
				$std2->piaomiandanjia = $hc->piaomiandanjia + $hangcheng['chengrenshengcangfei'] - $hangcheng['chengrenshouxufei'];
				$std2->parPrice = $hc->piaomiandanjia + $hangcheng['chengrenshengcangfei'] - $hangcheng['chengrenshouxufei'];

                $std2->airlineCode = $tuigai[0]->airlineCode;
                $std2->adult_tuigaiid = $tuigai[0]->id;
                $std2->child_tuigaiid = $tuigai[1]->id;
                
				// $std2->airlineCode = $mealPolicy->adult->airlineCode;
				// $std2->refundStipulate = $mealPolicy->adult->refundStipulate;
				// $std2->changeStipulate = $mealPolicy->adult->changeStipulate;
				// $std2->modifyStipulate = $mealPolicy->adult->modifyStipulate;
				// $std2->suitableAirline = $mealPolicy->adult->suitableAirline;
				// $std2->refundStipulateChild = $mealPolicy->child->refundStipulate;
				// $std2->changeStipulateChild = $mealPolicy->child->changeStipulate;
				// $std2->modifyStipulateChild = $mealPolicy->child->modifyStipulate;
				// $std2->suitableAirlineChild = $mealPolicy->child->suitableAirline;

				if (count($ghangcheng) > 1) {
					// 往返航程
					$std2->wangfanhangcheng = 1; //  0 单程 1 往返程
				} else {
					// 往返航程
					$std2->wangfanhangcheng = 0; //  0 单程 1 往返程
				}

				if ($index == 0) {
					$std2->fanchengbiaozhi = 0;
				} else {
					$std2->fanchengbiaozhi = 1;
				}
				$index++;

				$this->db->insert('hangcheng', $std2);
				
				$hangchengid = $this->db->insert_id();

				// 获取改签航程旅客id
				$sql3 = 'select m.id as id, h.id as gaiqianid,
				m.shenqinghao as shenqinghao,h.hangchenglvkeid as hangchenglvkeid from gaiqian as h left join gaiqiandingdan as m ON m.shenqinghao = h.shenqinghao where m.id = ? and h.hangchengid = ?';

				$query = $this->db->query($sql3, array($gaiqiandingdanid, $hangchengidold));
				$hclkeidolds = $query->result();

				$darenrenshu = 0;
                $ertongrenshu = 0;
				foreach ($hclkeidolds as $v) {

					$hclkedold = $v->hangchenglvkeid;

					$sql4 = 'select m.id as id, m.lvkeid as lvkeid, 
					m.shifouertong as shifouertong,m.piaomianjia as piaomianjia,
					m.pingtaidingdanhao as pingtaidingdanhao,
					m.piaohao as piaohao, m.shifoutuipiao as shifoutuipiao, 
					m.shifougaiqian as shifougaiqian, m.chuangjianshijian as chuangjianshijian, 
					m.zhongwenming as zhongwenming, m.yingwenming as yingwenming, 
					m.xingbie as xingbie, m.chushengriqi as chushengriqi,
					m.guoji as guoji, m.zhengjianleixing as zhengjianleixing,
					m.zhengjianhaoma as zhengjianhaoma, m.zhengjianyouxiaoqi as zhengjianyouxiaoqi,
					m.chushengdi as chushengdi, m.shoujihao as shoujihao,
					m.hangbanhao as hangbanhao, m.seatCode as seatCode,
					m.lianxidianhua as lianxidianhua, m.email as email from hangchenglvke as m where m.id = ?';

					$query = $this->db->query($sql4, $hclkedold);
					$hclk = $query->row();
					$std5 = new stdClass();
					$std5->shifouertong = $hclk->shifouertong;
					$std5->zhongwenming = $hclk->zhongwenming;
					$std5->xingbie = $hclk->xingbie;
					$std5->chushengriqi = $hclk->chushengriqi;
					$std5->zhengjianhaoma = $hclk->zhengjianhaoma;
					$std5->chushengdi = $hclk->chushengdi;
					$std5->shoujihao = $hclk->shoujihao;
					$std5->zhengjianleixing = $hclk->zhengjianleixing; // 证件类型
					$std5->zhuangtai = '';
					$std5->shifougaiqian = '否';
					$std5->shifoutuipiao = '否';
					$std5->lvkeid = $hclk->lvkeid;
					$std5->chuangjianshijian = date("Y-m-d H:i:s");

					if ($hclk->shifouertong == '0') {
						$darenrenshu +=1;
						$std5->seatCode = $hangcheng['chengrencangwei'];

                        $std5->airlineCode = $tuigai[0]->airlineCode;
                        $std5->tuigaiid = $tuigai[0]->id;
						// $std5->airlineCode = $mealPolicy->adult->airlineCode;
						// $std5->refundStipulate = $mealPolicy->adult->refundStipulate;
						// $std5->changeStipulate = $mealPolicy->adult->changeStipulate;
						// $std5->modifyStipulate = $mealPolicy->adult->modifyStipulate;
						// $std5->suitableAirline = $mealPolicy->adult->suitableAirline;						
						$std5->piaomianjia = $hangcheng['chengrenshengcangfei'] + $hc->piaomiandanjia  - $hangcheng['chengrenshouxufei']; // 票面价
					} else {
						$std5->seatCode = $hangcheng['ertongcangwei'];
						$ertongrenshu +=1;

                        $std5->airlineCode = $tuigai[1]->airlineCode;
                        $std5->tuigaiid = $tuigai[1]->id;
						// $std5->airlineCode = $mealPolicy->child->airlineCode;
						// $std5->refundStipulate = $mealPolicy->child->refundStipulate;
						// $std5->changeStipulate = $mealPolicy->child->changeStipulate;
						// $std5->modifyStipulate = $mealPolicy->child->modifyStipulate;
						// $std5->suitableAirline = $mealPolicy->child->suitableAirline;						
						$std5->piaomianjia = $hangcheng['ertongshengcangfei'] + $hclk->piaomianjia  - $hangcheng['ertongshouxufei']; // 票面价
					}

					$std5->hangbanhao = $hangcheng['hangbanhao'];  // 航班号
					$std5->dingdanid = $dingdanid;  // 订单ID
					$std5->hangchengid = $hangchengid;  // 订单ID
					$this->db->insert('hangchenglvke', $std5); // 插入航程旅客
					$lvkeid = $this->db->insert_id();
					
					// 插入新生成的航程旅客ID
					$this->db->update('gaiqian', array('newhangchenglvkeid' => $lvkeid), array('id' => $v->gaiqianid));
										 
                    // 起飞两小时前2小时及以后不用 出保险订单
                    $time1 = date('YmdHis');  // 时间
                    $time2 = date('YmdHis', strtotime("-2 hour", strtotime($hc->qifeishijian)));
                    if (intval($time2) > intval($time1)) {
                        // 保险
                        $sql_baoxian = 'select m.id as id, m.dingdanzongjia as dingdanzongjia,
                        m.baoxianleixing as baoxianleixing,m.baoxianchanpinid as baoxianchanpinid
                             from baoxiandingdan as m where m.hangchenglvkeid = ?';
                        $query = $this->db->query($sql_baoxian, $hclkedold);
                        $baoxian = $query->row();

                        $this->db->update('baoxiandingdan', array('baodanzhuangtai' => 13), array('id' => $baoxian->id));

                        $bao = new stdClass();
                        $bao->dingdanid = $dingdanid; // 新订单id
                        $bao->hangchenglvkeid = $lvkeid; // 航程旅客id
                        $bao->dingdanzongjia = $baoxian->dingdanzongjia;
                        $bao->baoxianleixing = $baoxian->baoxianleixing;
                        $bao->baoxianchanpinid = $baoxian->baoxianchanpinid;
                        $bao->dingdanzhuangtai = 0; //订单状态
                        $bao->baodanzhuangtai = 0; //保险状态
                        $bao->chuangjianshijian = date("Y-m-d H:i:s"); //创建时间
                        $this->db->insert('baoxiandingdan', $bao);
						$baoxiandingdanid = $this->db->insert_id();
                        $this->db->update('baoxiandingdan', array('baoxiandingdanhao' => "BX" . time() . $baoxiandingdanid), array('id' => $baoxiandingdanid));
                    						
                    }
					
					// 财务详情
                    $this->db->update('caiwu_fj_xiangqing', array('kepiaozhuangtai' => '已改期'), array('hangchenglvkeid' => $hclkedold));
					
				}
			}
			if (!empty($hangchengid_2) && intval($hangchengid_2) > 0) {
                $total = $chengrenshengcangfei_1 * $darenrenshu + $ertongshengcangfei_1 * $ertongrenshu + $chengrenshengcangfei_2 * $darenrenshu + $ertongshengcangfei_2 * $ertongrenshu;
            } else {
                $total = $chengrenshengcangfei_1 * $darenrenshu + $ertongshengcangfei_1 * $ertongrenshu;
            }
			
            $this->db->update('dingdan',array('dingdanzonge'=>$total,'wangfanhangcheng'=>$std2->wangfanhangcheng),array('id'=>$dingdanid));
        } else if ($shenqingzhuangtai == '5') {
            // 保存改签详情
            $this->db->insert('gaiqianxiangqing', $obj);

            // 改签单
            $this->db->update('gaiqian', array('shenqingzhuangtai' => $shenqingzhuangtai,
                'chulizhuangtai' => 3,
                'caozuoyuanid' => $admin_session['id']), array('dingdanid' => $dingdanid, 'chulizhuangtai' => 0));
            // 改签订单
            $this->db->update('gaiqiandingdan', array('shenqingzhuangtai' => $shenqingzhuangtai,
                'chulizhuangtai' => 3,
                'caozuoyuanid' => $admin_session['id']), array('dingdanid' => $dingdanid, 'chulizhuangtai' => 0));
            // 订单
            //$this->db->update('dingdan', array('chupiaozhuangtai' => 9), array('id' => $dingdanid));

            // 更新航程旅客状态
            $this->db->query('update hangchenglvke set zhuangtai = ? where id in (select hangchenglvkeid from gaiqian where shenqinghao = ? )', array('无法改签', $shenqinghao));

        } else if ($shenqingzhuangtai == '6') {
            // 改签单
            $this->db->update('gaiqian', array('shenqingzhuangtai' => $shenqingzhuangtai,
                'chulizhuangtai' => 4,
                'caozuoyuanid' => $admin_session['id']), array('dingdanid' => $dingdanid, 'chulizhuangtai' => 0));
            // 改签订单
            $this->db->update('gaiqiandingdan', array('shenqingzhuangtai' => $shenqingzhuangtai,
                'chulizhuangtai' => 4,
                'caozuoyuanid' => $admin_session['id']), array('dingdanid' => $dingdanid, 'chulizhuangtai' => 0));

				$this->load->library('myalidayu');
            
                $fasong = $this->mdingdan->getDuanXinTongZhiEx($dingdanid);
                if(!empty($fasong->airline_fan)){
                  $this->myalidayu->GaiQianShiBai_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan);
                    
                } else {
                  $this->myalidayu->GaiQianShiBai_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
                 
                }
        }
        // 出票成功后发生短信
        $this->load->library('myalidayu');

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            redirect('/admin/guoneijipiao/gaiqianshengqing/success/'.$shenqingzhuangtai);
        }
    }

    public function success($shenqingzhuangtai) {
        $data['tag'] = '';
        if($shenqingzhuangtai == '2')
        {
            $data['tag'] = '审核通过';
        }
        else if($shenqingzhuangtai == '6')
        {
            $data['tag'] = '用户取消改签';
        }
        else if($shenqingzhuangtai == '5')
        {
            $data['tag'] = '无法改签';
        }
        $this->load->view('admin/guoneijipiao/gaiqianshengqing/success', $data);
    }

	public function gettuigaiqian_lao($Date, $airlineCode, $qifeijichang, $daodajichang ,$seatCode){
        date_default_timezone_set("Asia/Shanghai");

    
        $this->load->library('mypost');
        $conf = $this->config->item("conf");

        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = $Date;
        //航空公司
        $airlineCode = $airlineCode;  // airlineCode
        // 出发机场三字码

        $depCode = array_search($qifeijichang, $airport);

        //目的机场三字码
        $arrCode = array_search($daodajichang, $airport);
        //舱位
        $classCode = $seatCode;
        
        //返回成功与否判断
        $returnStatus = "true";
        //return $this->tuigaiqian_localDb($airlineCode, $classCode);
        //die();
        
        // 成人
        $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        $sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . $classCode . $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
        $post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = $classCode;
        $post_data['depCode'] = $depCode;
        $post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
            $adult = new stdClass();
            //条目id
            $adult->seatId = $g->modifyAndRefundStipulateList->seatId;
            //航空公司二字码
            $adult->airlineCode = $airlineCode;
            
            //$adult->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //舱位码
            $adult->seatCode = $g->modifyAndRefundStipulateList->seatCode;
            //舱位级别
            $adult->seatType = $g->modifyAndRefundStipulateList->seatType;
            //服务级别
            $adult->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
            //退票规定
            $adult->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
            //更改规定
            $adult->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
            //适用航线
            $suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            $a = (array)$suitableAirline;
            $a = $a[0];
            $adult->suitableAirline = $a;
            //$adult->suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            //签转规定
            $modifyStipulate = "可以改签";
            if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
                $modifyStipulate = "不能改签";
            }
            $adult->modifyStipulate = $modifyStipulate;
        }else{
            $returnStatus = "false";
        }
        
        // 儿童
        $url = $conf['Url51Book'] . "getModifyAndRefundStipulateServiceRestful1.0/getModifyAndRefundStipulate";
        $post_data['agencyCode'] = $conf['Agency51Book'];
        $sign = md5($conf['Agency51Book'] . $airlineCode . $arrCode . "Y". $depCode . $depDate . $conf['Security51Book']);
        $post_data['sign'] = $sign;
        $post_data['depDate'] = $depDate;
        $post_data['airlineCode'] = $airlineCode;
        $post_data['classCode'] = "Y";
        $post_data['depCode'] = $depCode;
        $post_data['arrCode'] = $arrCode;
        $res = $this->mypost->request_post($url, $post_data);
        $g = simplexml_load_string($res);
        if (!empty($g) && $g->returnCode == 'S') {
            $child = new stdClass();
            //条目id
            $child->seatId = $g->modifyAndRefundStipulateList->seatId;
            //航空公司二字码
            //$airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //$airlineCode = strval($airlineCode);
            //$child->airlineCode = $airlineCode[0];
            $child->airlineCode = $airlineCode;
            //$child->airlineCode = $g->modifyAndRefundStipulateList->airlineCode;
            //舱位码
            $child->seatCode = $g->modifyAndRefundStipulateList->seatCode;
            //舱位级别
            $child->seatType = $g->modifyAndRefundStipulateList->seatType;
            //服务级别
            $child->serviceLevel = $g->modifyAndRefundStipulateList->serviceLevel;
            //退票规定
            $child->refundStipulate = urldecode($g->modifyAndRefundStipulateList->refundStipulate);
            //更改规定
            $child->changeStipulate = urldecode($g->modifyAndRefundStipulateList->changeStipulate);
            //适用航线
            $suitableAirline = $g->modifyAndRefundStipulateList->suitableAirline;
            $a = (array)$suitableAirline;
            $a = $a[0];
            $child->suitableAirline = $a;
            //签转规定
            $modifyStipulate = "可以改签";
            if (urldecode($g->modifyAndRefundStipulateList->modifyStipulate) == '不能改签;') {
                $modifyStipulate = "不能改签";
            }
            $child->modifyStipulate = $modifyStipulate;
        }else{
            $returnStatus = "false";
        }
        if($returnStatus == "true"){
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            return $data;
        }else{
            return "false";
        }

    }
	
    // 获取退签改
    public function tuigaiqian_localDb($airlineCode, $seatCode){
        //$airlineCode = $this->input->post('aircode');
        //$seatCode = $this->input->post('seatCode');
        $this->db->trans_begin();
        $sql = 'select m.seatId as seatId,
        m.airlineCode as airlineCode,
        m.seatCode as seatCode,
        m.refundStipulate as refundStipulate,
        m.changeStipulate as changeStipulate,
        m.suitableAirline as suitableAirline,
        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode =? ';
        $query = $this->db->query($sql, array($airlineCode,$seatCode));
        $adult = $query->row();

        $sql = 'select m.seatId as seatId,
        m.airlineCode as airlineCode,
        m.seatCode as seatCode,
        m.refundStipulate as refundStipulate,
        m.changeStipulate as changeStipulate,
        m.suitableAirline as suitableAirline,
        m.modifyStipulate as modifyStipulate from tuigaiqianzhengce as m where airlineCode = ? and seatCode = "Y" ';
        $query = $this->db->query($sql, array($airlineCode));
        $child = $query->row();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return 'fasle';
        }
        else
        {
            $this->db->trans_commit();
            $data = new stdClass();
            $data->adult = $adult;
            $data->child = $child;
            return json_encode($data);
        }

    }

   public function chahangchengtuigaiqian($hangchengid) {
        // $hangchengid = $this->input->post('hangchengid');

        $sql = "select m.adult_tuigaiid as adult_tuigaiid ,m.child_tuigaiid as child_tuigaiid from hangcheng as m where m.id = ?";
        $query = $this->db->query($sql, array($hangchengid));
        $res = $query->row();

        
        $adult_tuigaiid = $res->adult_tuigaiid;
        $child_tuigaiid = $res->child_tuigaiid;
        $data = Array();
        
      $sql_adult = "select m.id as id, m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,
          m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,
          m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,
          m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,
          m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,
          m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from order_tuigaiguize as m 
          where m.id =?";      
        $query_adult = $this->db->query($sql_adult, array($adult_tuigaiid));
        $data[0] = $query_adult->row();       
         $sql_child= "select m.id as id, m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,
          m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,
          m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,
          m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,
          m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,
          m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from order_tuigaiguize as m 
          where m.id =?";      
        $query_child = $this->db->query($sql_child, array($child_tuigaiid));
        $data[1] = $query_child->row();
        
        echo json_encode($data);
            
    }

    // 查退改签
    public function tuigai($Date, $airlineCode, $qifeijichang, $daodajichang ,$seatCode) {
        date_default_timezone_set("Asia/Shanghai");
        $airport = $this->config->item("airport_short"); //机场
        //出发日期
        $depDate = $Date;
        //航空公司
        $airlineCode = $airlineCode;  // airlineCode
        // 出发机场三字码

        $depCode = array_search($qifeijichang, $airport);

        //目的机场三字码
        $arrCode = array_search($daodajichang, $airport);
        //舱位
        $classCode = $seatCode;

        $this->load->library('mypost');
        $conf = $this->config->item("conf");



        // $airport = $this->config->item("airport_short"); //机场
        // //出发日期
        // $depDate = "2017-02-21";
        // //航空公司
        // // $airlineCode = "PN";
        // $airlineCode = "SC";
        // //出发机场三字码
        // $depCode = array_search("新郑机场", $airport);
        // //目的机场三字码
        // $arrCode = array_search("库尔勒机场", $airport);
        //舱位
        // // $classCode = "T";
        // $classCode = "V";
        $this->load->library('mypost');
        $this->load->library('book51');
        $conf = $this->config->item("conf");
        $data = Array();

        $sql = "select m.id as id, m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row();
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (empty($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (empty($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (empty($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }
                    //   提前更改费率
                    if (empty($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (empty($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (empty($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (empty($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),                    
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);
                    $id = $this->db->insert_id();
                    $obj['id'] = $id;
                    $data[0] = $obj;
                }
            }
        } else {
            $data[0] = $res;           
        }

        $classCode = "Y";
        $sql = "select m.id as id, m.airlineCode as airlineCode,m.seatCode as seatCode,m.changePercentAfter as changePercentAfter,m.changePercentBefore as changePercentBefore,m.refundPercentAfter as refundPercentAfter,m.refundPercentBefore as refundPercentBefore,m.changeTimePoint as changeTimePoint,m.refundTimePoint as refundTimePoint,m.changePercentAdvance as changePercentAdvance,m.refundPercentAdvance as refundPercentAdvance,m.changeTimePointAdvance as changeTimePointAdvance,m.refundTimePointAadvance as refundTimePointAadvance,m.suitableAirline as suitableAirline,m.modifyStipulate as modifyStipulate from tuigaiguize as m where m.kaiguan = 1  and m.airlineCode = ? and m.seatCode = ? ";
        $query = $this->db->query($sql, array($airlineCode, $classCode));
        $res = $query->last_row();
        if (empty($res)) {
            // 本地查不到数据时在线查询
            $re = $this->book51->RC5($airlineCode, $arrCode, $classCode, $depCode, $depDate);
            if (!empty($re) && $re->returnCode == 'S') {
                if (!empty($re->modifyAndRefundStipulateList)) {
                    $a = $re->modifyAndRefundStipulateList;
                    $data_a = json_encode($a);
                    $a1 = json_decode($data_a);

                    $modifyStipulate = '0';
                    if (urldecode($a1->modifyStipulate) != '不能改签;') {
                        $modifyStipulate = '1';
                    }
                    $suitableAirline = '*';
                    if (urldecode($a1->suitableAirline) != '适用全部航线') {
                        $suitableAirline = urldecode($a1->suitableAirline);
                    }
                    if (empty($a1->changeTimePoint)) {
                        $changeTimePoint = '';
                    } else {
                        $changeTimePoint = $a1->changeTimePoint;
                    }
                    if (empty($a1->refundTimePoint)) {
                        $refundTimePoint = '';
                    } else {
                        $refundTimePoint = $a1->refundTimePoint;
                    }

                    if (empty($a1->serviceLevel)) {
                        $serviceLevel = '';
                    } else {
                        $serviceLevel = $a1->serviceLevel;
                    }
                    //   提前更改费率
                    if (empty($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $a1->changePercentAdvance;
                    }
                    //   提前更改费率
                    if (empty($a1->changePercentAdvance)) {
                        $changePercentAdvance = '';
                    } else {
                        $changePercentAdvance = $this->tostr($a1->changePercentAdvance);
                    }
                    //   提前退废票率
                    if (empty($a1->refundPercentAdvance)) {
                        $refundPercentAdvance = '';
                    } else {
                        $refundPercentAdvance = $this->tostr($a1->refundPercentAdvance);
                    }
                    //   提前变更时间点
                    if (empty($a1->changeTimePointAdvance)) {
                        $changeTimePointAdvance = '';
                    } else {
                        $changeTimePointAdvance = $a1->changeTimePointAdvance;
                    }
                    //   提前退票时间点
                    if (empty($a1->refundTimePointAadvance)) {
                        $refundTimePointAadvance = '';
                    } else {
                        $refundTimePointAadvance = $a1->refundTimePointAadvance;
                    }
                    $obj = array(
                            'inserttime' => date("Y-m-d H:i:s"),
                            'airlineCode' => $a1->airlineCode,
                            'seatCode' => $a1->seatCode,
                            'changePercentAfter' => $this->tostr($a1->changePercentAfter),
                            'changePercentBefore' => $this->tostr($a1->changePercentBefore),
                            'refundPercentAfter' => $this->tostr($a1->refundPercentAfter),
                            'refundPercentBefore' => $this->tostr($a1->refundPercentBefore),
                            'changeTimePoint' => $changeTimePoint,
                            'refundTimePoint' => $refundTimePoint,
                            'changePercentAdvance' => $changePercentAdvance,
                            'refundPercentAdvance' => $refundPercentAdvance,
                            'changeTimePointAdvance' => $changeTimePointAdvance,
                            'refundTimePointAadvance' => $refundTimePointAadvance,
                            'suitableAirline' => $suitableAirline,
                            'modifyStipulate' => $modifyStipulate);

                    $this->db->insert('tuigaiguize', $obj);
                    $id = $this->db->insert_id();
                    $obj['id'] = $id;
                    $data[1] = $obj;
                }
            }
        } else {
            $data[1] = $res;           
        }
        return $data;
    }

}
