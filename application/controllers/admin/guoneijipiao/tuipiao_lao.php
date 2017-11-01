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
		$this->load->library('mysimpleencrypt');
		$tuipiaoid = $this->mysimpleencrypt->de($tuipiaoid);
		$admin_session = $this->session->userdata('admin');
        // 执行锁单
        if ($tuipiaoid != '' && $this->issuodan($tuipiaoid, $admin_session ['id']) == '未锁单') {
			$obj = array('suodan' => true, 'suodanid' => $admin_session['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
			$this->db->update('tuipiaodingdan', $obj, array('id' => $tuipiaoid));
        }

        $this->load->view('admin/guoneijipiao/tuipiao/index', $data);
    }
	/**
     * 判断是否是用户本人锁的单
     */
    public function issuodan($id, $suodanid)
    {
        $result = '未锁单';
        $sql = 'select m.id as id, m.suodanid as suodanid from tuipiaodingdan as m where m.id = ?';
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
            $this->db->update('tuipiaodingdan', $obj, array('id' => $hangchengid));
        }
        redirect('admin/guoneijipiao/tuipiao/index');
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
            //$mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, m.dingdanid as dingdanid,
            m.tuipiaoleixing as tuipiaoleixing,
            m.chulizhuangtai as chulizhuangtai, m.suodan as suodan, 
            m.suodanid as suodanid, m.suodanshijian as suodanshijian from tuipiaodingdan as m ';

        $sqlcount = 'select count(m.id) as id from tuipiaodingdan as m ';

        $ps = array();
        // 乘客姓名
        if ((!empty($zhongwenming) && $zhongwenming != '') || (!empty($piaohao) && $piaohao != '')) {
            $sql .= ',hangchenglvke as hl ';
            $sqlcount .= ',hangchenglvke as hl ';
        }

        // 出票编码 订单编号 订单状态 付款时间
        if ((!empty($wangfanhangcheng) && $wangfanhangcheng != '' || $wangfanhangcheng =='0') ||(!empty($chupiaobianma) && $chupiaobianma != '') || (!empty($dingdanhao) && $dingdanhao != '') || (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '') || (!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '')) {
            $sql .= ',dingdan as d ';
            $sqlcount .= ',dingdan as d ';
        }

        // 退票类型
        if (!empty($tuipiaoleixing) && $tuipiaoleixing != '' && $tuipiaoleixing != '全部') {
            $sql .= ',tuipiao as tp ';
            $sqlcount .= ',tuipiao as tp ';
        }

        $sql .= 'where ';
        $sqlcount .= 'where ';

        // 乘客姓名
        if ((!empty($zhongwenming) && $zhongwenming != '') || (!empty($piaohao) && $piaohao != '')) {
            $sql .= 'm.dingdanid = hl.dingdanid ';
            $sqlcount .= 'm.dingdanid = hl.dingdanid ';
        }

        // 出票编码 订单编号 订单状态 付款时间
        if ((!empty($wangfanhangcheng) && $wangfanhangcheng != ''|| $wangfanhangcheng =='0') ||(!empty($chupiaobianma) && $chupiaobianma != '') || (!empty($dingdanhao) && $dingdanhao != '') || (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '') || (!empty($fukuanshijian_begin) && $fukuanshijian_begin != ''&& !empty($fukuanshijian_end) && $fukuanshijian_end != '')) {
            $sql .= 'and m.dingdanid = d.id ';
            $sqlcount .= 'and m.dingdanid = d.id ';
        }

        // 退票类型
        if (!empty($tuipiaoleixing) && $tuipiaoleixing != '' && $tuipiaoleixing != '全部') {
            $sql .= 'and m.dingdanid = tp.dingdanid ';
            $sqlcount .= 'and m.dingdanid = tp.dingdanid ';
        }

        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql .= 'and hl.zhongwenming = ? ';
            $sqlcount .= 'and hl.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        }

        // 票号
        if (!empty($piaohao) && $piaohao != '') {
            $sql .= 'and hl.piaohao = ? ';
            $sqlcount .= 'and hl.piaohao = ? ';
            $ps[] = $piaohao;
        }

        // 出票编码
        if (!empty($chupiaobianma) && $chupiaobianma != '') {

			$sql = $sql . "and d.chupiaobianma like '%" . $chupiaobianma . "%'  ";
            $sqlcount = $sqlcount . "and d.chupiaobianma like '%" . $chupiaobianma . "%' ";
        }
			// 航程类型       
		  if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != '全部' || $wangfanhangcheng =='0') {
		  $sql = $sql . 'and d.wangfanhangcheng = ? ';
		  $sqlcount = $sqlcount . 'and d.wangfanhangcheng = ? ';
		  $ps[] = $wangfanhangcheng;

		  }
        // 订单编号
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql .= 'and d.dingdanhao = ? ';
            $sqlcount .= 'and d.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }

        // 订单状态
        if (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '' && $dingdanzhuangtai != '全部' ) {
            $sql .= 'and d.dingdanzhuangtai = ? ';
            $sqlcount .= 'and d.dingdanzhuangtai = ? ';
            $ps[] = $dingdanzhuangtai;
        }

        // 付款时间
        if (!empty($fukuanshijian_begin) &&
                $fukuanshijian_begin != '' && !empty($fukuanshijian_end) &&
                $fukuanshijian_end != '') {
            $sql .= 'and d.dingdanzhuangtai between ? and ? ';
            $sqlcount .= 'and d.dingdanzhuangtai between ? and ? ';
            $ps[] = $fukuanshijian_begin;
            $ps[] = $fukuanshijian_end;
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
                $obj->id = $this->mysimpleencrypt->en($r->id);
                //$obj->hid = $this->mysimpleencrypt->en($r->id);
                //$obj->tid = $this->mysimpleencrypt->en($r->id);

                $obj->chulizhuangtai = $r->chulizhuangtai;

                $dingdan_obj = $this->mdingdan->getObj($r->dingdanid);
                // 订单号
                $obj->dingdanhao = !empty($dingdan_obj->dingdanhao) != null ? $dingdan_obj->dingdanhao : '';
                // 出票编码
                $obj->chupiaobianma = !empty($dingdan_obj->chupiaobianma) != null ? $dingdan_obj->chupiaobianma : '';
                // 订单状态
                $obj->dingdanzhuangtai = !empty($dingdan_obj->dingdanzhuangtai) != null ? $vs[intval($dingdan_obj->dingdanzhuangtai)] : '';

                if ($r->tuipiaoleixing == false) {
                    $obj->tuipiaoleixing = '自愿退票';
                } else {
                    $obj->tuipiaoleixing = '非自愿退票';
                }

                //$hangcheng_obj = $this->mhangcheng->getObjById($r->hangchengid);
                $hangcheng_obj = $this->mhangcheng->getObj($r->dingdanid);

                $obj->wangfan = !empty($hangcheng_obj->wangfan) != null ? $hangcheng_obj->wangfan : '';

                // 航班时间/航班号/舱位（成人，儿童）
                $obj->hb = !empty($hangcheng_obj->qifeishijian) != null ? $hangcheng_obj->qifeishijian . ' ' . $hangcheng_obj->hangbanhao . ' ' . $hangcheng_obj->cangwei : '';
                // 出票编码
                $obj->daodajichang = !empty($hangcheng_obj->daodajichang) != null ? $hangcheng_obj->daodajichang : '';
                // 起飞 到达
                $obj->qifei_daoda = !empty($hangcheng_obj->qifeijichang) != null ? $hangcheng_obj->qifeijichang . '/' . $hangcheng_obj->daodajichang : '';
                // 总价/乘客数（成人/儿童）
                $obj->zongjia_sks = !empty($dingdan_obj->dingdanzhuangtai) != null ? $dingdan_obj->dingdanzonge . '/' . $this->mhangchenglvke->getPersonNum($r->dingdanid, false) . '人' . $this->mhangchenglvke->getPersonNum($r->dingdanid, true) . '人' : '';
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
    public function xiangqing($en_dingdan_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("dingdan/mtuipiao", "mtuipiao");
        $this->load->model("dingdan/mtuipiaodingdan", "mtuipiaodingdan");
        $data['li'] = $this->li;

        // 退票 id
        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $tp = $this->mtuipiaodingdan->getObj($id);
        $obj = $this->mdingdan->getMyObj($tp->dingdanid);
        // 退票订单表
        $data['tp'] = $tp;
        // 订单表内容
        $data['obj'] = $obj;
        
        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($tp->dingdanid);
        $data['hangcheng'] = $hangcheng;

        if (!empty($hangcheng)) {
            if (count($hangcheng) > 0) {
                // 退票内容 
                $data['tuipiao'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 0, $hangcheng[0]->id);
				if (empty($data['tuipiao']->lst)) {
                    $data['tuipiao'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 2, $hangcheng[0]->id);
                }
            }

            if (count($hangcheng) > 1) {
                // 退票内容 
                $data['tuipiao1'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 0, $hangcheng[1]->id);
				if (empty($data['tuipiao1']->lst)) {
                    $data['tuipiao'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 2, $hangcheng[0]->id);
                }
            }
        }

        $this->load->view('admin/guoneijipiao/tuipiao/xiangqing', $data);
    }

    /**
     * 出票处理 
     * $en_id 航程 id
     */
    public function tuipiaochuli($en_dingdan_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("dingdan/mtuipiao", "mtuipiao");
        $this->load->model("dingdan/mtuipiaodingdan", "mtuipiaodingdan");
        $data['li'] = $this->li;

        // 退票 id
        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $tp = $this->mtuipiaodingdan->getObj($id);
        $obj = $this->mdingdan->getMyObj($tp->dingdanid);
        // 退票订单表
        $data['tp'] = $tp;
        // 订单表内容
        $data['obj'] = $obj;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($tp->dingdanid);
        $data['hangcheng'] = $hangcheng;

        if (!empty($hangcheng)) {
            if (count($hangcheng) > 0) {
                // 退票内容 
                $data['tuipiao'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 0, $hangcheng[0]->id);
            }

            if (count($hangcheng) > 1) {
                // 退票内容 
                $data['tuipiao1'] = $this->mtuipiao->getTuiPiaoXQ($tp->dingdanid, 0, $hangcheng[1]->id);
            }
        }

        $this->load->view('admin/guoneijipiao/tuipiao/tuipiaochuli', $data);
    }

    /**
     * 退票处理 
     */
    public function tp() {
        $this->db->trans_begin();

        $this->load->model('dingdan/mdingdan', 'mdingdan');

        $wufatuipiao = $this->input->post('wufatuipiao');
        $admin_session = $this->session->userdata('admin');
        /*
          $hangchenglvkeid = $this->input->post('hangchenglvkeid');
          $tuipiaoid = $this->input->post('tuipiaoid');
         */
        $dingdanid = $this->input->post('dingdanid');
		// 总价
        $total_fee = $this->input->post('total_fee');
        
        // 要退的钱
        $mtuikuan = $this->input->post('mtuikuan');
        // 手续费
        $mfeiyong = $this->input->post('mfeiyong');
		
        $refund_fee0 = $this->input->post('refund_fee0');
        $refund_fee1 = $this->input->post('refund_fee1');
        // 退票自愿非自愿
        $tuipiaoleixing = $this->input->post('tuipiaoleixing');
        // 退票订单 id 
        $tuipiaodingdanid = $this->input->post('tuipiaodingdanid');

        $refund_fee = 0;
        // 成人
        $tuipiaojine_cr = 0;
        // 儿童
        $tuipiaojine_et = 0;
        if (!empty($refund_fee0) && intval($refund_fee0) > 0) {
            $refund_fee = intval($refund_fee0);
            $tuipiaojine_cr = intval($refund_fee0);
        }

        if (!empty($refund_fee1) && intval($refund_fee1) > 0) {
            $refund_fee = intval($refund_fee) + intval($refund_fee1);
            $tuipiaojine_et = intval($refund_fee1);
        }

        if ($wufatuipiao == '0') {
			
			$chulipicihao = 'TK'.date('YmdHis');
            $tplxar = json_decode($tuipiaoleixing);

            $sql = 'select m.id as id, m.hangchenglvkeid as hangchenglvkeid 
                from tuipiao as m where m.dingdanid = ? and (m.chulizhuangtai = 0 or m.chulizhuangtai = 1)';
            $res = $this->db->query($sql, array($dingdanid));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    $tuipiaoleixing_sub = 0;
                    foreach ($tplxar as $v) {
                        if ($v->tuipiaoid == $r->id) {
                            $tuipiaoleixing_sub = $v->leixing;
                        }
                    }

                    // 退票表设置 已经完成时间
                    $obj_tuipiao = array('wanchengshijian' => date("Y-m-d H:i:s"),
                        'tuipiaoleixing' => $tuipiaoleixing_sub,
                        'caozuoyuanid' => $admin_session['id'],
                        'tuipiaoleixing' => 2,
                        'chulizhuangtai' => 2,
                        'caozuoshijian' => date("Y-m-d H:i:s"));
                    $this->db->update('tuipiao', $obj_tuipiao, array('id' => $r->id));

                    // 在航程旅客表中状态字段改为
                    $this->db->update('hangchenglvke', array('zhuangtai' => '已退票'), array('id' => $r->hangchenglvkeid));
					$this->db->update('tuipiao', array('chulipicihao' => $chulipicihao), array('hangchenglvkeid' => $r->hangchenglvkeid));
					// 更改财务飞机乘客详情状态
					$this->db->update('caiwu_fj_xiangqing', array('kepiaozhuangtai' => '已退票','tuikuanpicihao' => $chulipicihao,'tuipiaoshijian' => date("Y-m-d H:i:s")), array('hangchenglvkeid' => $r->hangchenglvkeid));

                }
            }
			
			$mtuikuan = json_decode($mtuikuan);
            $mfeiyong = json_decode($mfeiyong);
            
            foreach ($mtuikuan as $mt){
                $this->db->update('tuipiao', array('tuipiaojine'=>$mt->refund_fee), array('hangchengid'=>$mt->hangchengid,'shifouertong'=>$mt->ertong,'chulipicihao' => $chulipicihao));
                
            }
            foreach ($mfeiyong as $mtf){
                $this->db->update('tuipiao', array('feiyong'=>$mtf->refund_shouxufei), array('hangchengid'=>$mtf->hangchengid,'shifouertong'=>$mtf->ertong, 'chulipicihao' => $chulipicihao));
                
            } 

            // 退票订单状态
            $obj_tuipiaodingdan = array(
                'caozuoyuanid' => $admin_session['id'],
                'chulizhuangtai' => 2,
                'tuipiaojine_et' => $tuipiaojine_et,
                'tuipiaojine_cr' => $tuipiaojine_cr,
                'tuipiaojine' => $total_fee,
				'chulipicihao' => $chulipicihao,
                'caozuoshijian' => date("Y-m-d H:i:s"));
            $this->db->update('tuipiaodingdan', $obj_tuipiaodingdan, array('id' => $tuipiaodingdanid));
            // 订单中设置 出票状态
            //$this->db->update('dingdan', array('chupiaozhuangtai' => 4, 'wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => $admin_session['id']), array('id' => $dingdanid));
        } else if ($wufatuipiao == '1') {

            $tplxar = json_decode($tuipiaoleixing);

            $sql = 'select m.id as id, m.hangchenglvkeid as hangchenglvkeid 
                from tuipiao as m where m.dingdanid = ? and (m.chulizhuangtai = 0 or m.chulizhuangtai = 1)';
            $res = $this->db->query($sql, array($dingdanid));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {

                    $tuipiaoleixing_sub = 0;
                    foreach ($tplxar as $v) {
                        if ($v->tuipiaoid == $r->id) {
                            $tuipiaoleixing_sub = $v->leixing;
                        }
                    }

                    // 退票表设置 已经完成时间
                    $obj_tuipiao = array('wanchengshijian' => date("Y-m-d H:i:s"),
                        'tuipiaoleixing' => $tuipiaoleixing_sub,
                        'caozuoyuanid' => $admin_session['id'],
                        'tuipiaoleixing' => 3,
                        'chulizhuangtai' => 3,
                        'caozuoshijian' => date("Y-m-d H:i:s"));
                    $this->db->update('tuipiao', $obj_tuipiao, array('id' => $r->id));

                    // 在航程旅客表中状态字段改为
                    $this->db->update('hangchenglvke', array('zhuangtai' => '已出票'), array('id' => $r->hangchenglvkeid));
                }
            }

            // 退票订单状态
            $obj_tuipiaodingdan = array(
                'caozuoyuanid' => $admin_session['id'],
                'chulizhuangtai' => 3,
                'tuipiaojine' => $refund_fee,
                'caozuoshijian' => date("Y-m-d H:i:s"));
           $this->db->update('tuipiaodingdan', $obj_tuipiaodingdan, array('id' => $tuipiaodingdanid));

        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->library('mypost');

            $resutl = '';
            // 执行退款
            if ($dingdanid != 0 && $wufatuipiao == '0') {

			$chulipicihao = $chulipicihao;
             // $chulipicihao = 'TK20170103224237';

             $sql = 'select t.dingdanid as dingdanid, t.hangchenglvkeid as hangchenglvkeid,l.shifouertong as shifouertong from tuipiao as t left join hangchenglvke as l on l.id = t.hangchenglvkeid where t.chulipicihao = ?';
             $query = $this->db->query($sql, $chulipicihao);
             $tui = $query->result();

             $sql = 'select t.tuipiaojine as tuipiaojine from tuipiaodingdan as t  where t.chulipicihao = ?';
             $query = $this->db->query($sql, $chulipicihao);
             $tuipiaodindan = $query->row();
             $total = $tuipiaodindan->tuipiaojine;
			 // 退款
             $re = $this->xunhuantuikuan($tui,$total);
		
	
				
            }

            if ($dingdanid != 0 && $wufatuipiao == '0') {
				
			$tuipiaodingdanid = $tuipiaodingdanid;
			$sql = "SELECT n.caozuoshijian AS tuipiaoshijian, n.dingdanid AS dingdanid, n.tuipiaojine_cr as tuipiaojine_cr,n.tuipiaojine_et AS tuipiaojine_et,n.tuipiaojine AS tuipiaojine, SUM(CASE WHEN lk.shifouertong = 0 THEN  1 ELSE   0 END ) AS daren, SUM(  CASE  WHEN lk.shifouertong = 1 THEN   1 ELSE    0 END ) AS ertong ,lk.*, n.id FROM ( SELECT l.shifouertong,l.id as idlk, m.chulipicihao FROM tuipiao as m LEFT JOIN  hangchenglvke as l  ON m.hangchenglvkeid = l.id ) as lk LEFT JOIN tuipiaodingdan as n ON lk.chulipicihao =n.chulipicihao WHERE n.id = ?";

			$query = $this->db->query($sql, $tuipiaodingdanid);

			$tuipiao = $query->row();
			$dingdanid = $tuipiao->dingdanid;

			$chulipicihao = $tuipiao->chulipicihao;
			$tuipiaoshijian = $tuipiao->tuipiaoshijian;
			$daren = intval($tuipiao->daren);
			$ertong = intval($tuipiao->ertong);
			$tuipiaojine_cr = floatval($tuipiao->tuipiaojine_cr);
			$tuipiaojine_et = floatval($tuipiao->tuipiaojine_et);
			$tuipiaojine = floatval($tuipiao->tuipiaojine);

			// 获取航程信息
			$sql1 = "SELECT group_concat(concat(concat(lk.qifeishijian,'-'),lk.daodashijian)) as qifeidaodashijian, SUM(lk.fanchengbiaozhi) AS wangfan ,GROUP_CONCAT(lk.s1) AS chengrencangweiall ,GROUP_CONCAT(lk.s2) AS ertongcangweiall,SUM(lk.piaomiandanjia) as piaomiandanjiaall , SUM(lk.danzhangpiaomianjia) as danzhangpiaomianjiaall , group_concat(concat(concat(lk.dstCitysanzima,'-'),lk.orgCitysanzima)) as chufadaodacity, GROUP_CONCAT(lk.hangbanhao) as hanghanhaoall,GROUP_CONCAT(lk.qifeishijian) as qifeishijianall,lk.* FROM (
			select m.id as id,
			m.dstCitysanzima as dstCitysanzima,
			m.orgCitysanzima as orgCitysanzima,
			m.qifeishijian as qifeishijian,
			m.daodashijian as daodashijian,
			m.piaomiandanjia as piaomiandanjia,
			m.danzhangpiaomianjia AS danzhangpiaomianjia,
			m.xiaoshouzongjia AS xiaoshouzongjia,
			m.hangbanhao as hangbanhao,
			m.fanchengbiaozhi as fanchengbiaozhi,
			l.shifouertong AS shifouertong,
			l.hangchengid AS hangchengid,
			mmm.s1 AS s1,
			mmm.s2 AS s2,
			m.dstCity,
			m.orgCity FROM hangcheng as m LEFT JOIN ( SELECT  m1.seatCode as s1, m1.hangchengid as h1, m2.hangchengid as h2  ,m2.seatCode as s2 FROM hangchenglvke AS m1,hangchenglvke AS m2 WHERE  m1.shifouertong =0 AND m2.shifouertong=1 ) as mmm ON mmm.h1 =m.id and mmm.h2 =m.id LEFT JOIN hangchenglvke as l  on m.id = l.hangchengid  where m.dingdanid = ?  GROUP BY l.hangchengid )as lk ";
			$query = $this->db->query($sql1, $dingdanid);
			$hc = $query->row();

			// 订单信息
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


			if ($dingdan->isgaiqian) {
				// 获取保险价格
				$sql3 = 'SELECT DISTINCT b.dingdanzongjia as danjia FROM gaiqiandingdan as g,dingdan as d, baoxiandingdan  AS b WHERE g.xindingdanid = ? AND g.zhudingdanid = d.id AND b.dingdanid = g.zhudingdanid AND d.baoxian = 1';
				$query = $this->db->query($sql3, $dingdanid);
				$baoxian = $query->row();
				if (!empty($baoxian)) {
					$baoxiandanjia = $baoxian->dingdanzongjia;
				} else {
					$baoxiandanjia = 0;
				}
			} else {
				if ($dingdan->baoxian) {
				   $sql4 = 'select m.dingdanzongjia as dingdanzongjia from baoxiandingdan as m where m.dingdanid = ?';
				   $query = $this->db->query($sql4, $dingdanid);
				   $baoxian = $query->row();
				   $baoxiandanjia = $baoxian->dingdanzongjia;
				} else {
					$baoxiandanjia = 0;
				}
			}

			   $data = new stdclass();

			   $data->tuipiaodingdanhao = $chulipicihao;  //处理批次号
			   $data->chupiaodingdanhao = $dingdan->dingdanhao ;  // 出票订单号
			   $data->lianxiren = $dingdan->lianxiren;
			   $data->lianxirendianhua = $dingdan->lianxirendianhua;  // 联系人电话
			   $data->dingdanzhungtai = '退票成功，已退款';  // 订单状态


			  $data->chupiaobianma = $dingdan->prn;  // 出票编码
			  if (empty($dingdan->prn)) {
				  $data->caigouqudao = '异地';
			  } else {
				   $data->caigouqudao = '本地';
			  }
			  $data->yididingdanhao = $dingdan->yididingdanhao;  // 异地订单号
			  $data->yidipingtai = $dingdan->yidipingtai;  // 异地平台

			  $data->gendanrenid = $dingdan->suodanid;


			  $data->hangchengleixing = $hc->wangfan;   // 是否往返程
			  $totalbaoxianshu = $daren + $ertong;
			  if ($hc->wangfan) {
				$daren = $daren/2;
				$ertong = $ertong/2;
			  }
			  $data->hangbanhao = $hc->hanghanhaoall; // 航班号
			  $data->chufachengshi = $hc->orgCity;  // 出发城市
			  $data->daodachengshi = $hc->dstCity;  // 到达城市

			  $data->qifeijichang = $hc->chufadaodacity; // 出发机场-到达机场

			  $data->chengrencangwei = $hc->chengrencangweiall;  // 成人舱位
			  $data->ertongcangwei = $hc->ertongcangweiall;   // 儿童舱位
			  $data->chengrenshuliang = $daren;  // 成人数
			  $data->ertongshuliang = $ertong;  // 儿童数
			  $data->qifeidaodashijian = $hc->qifeidaodashijian; // 起飞到达时间

			  $data->chengrendantuipiaofei = $tuipiaojine_cr;
			  $data->ertongdantuipiaofei = $tuipiaojine_et;
			  $data->tuipiaofeizonge = $tuipiaojine_cr * $daren + $tuipiaojine_et * $ertong;
			  $data->huishouyouhuie = 0;  // 回收优惠额
			  $data->tuikuanzonge = $tuipiaojine; // 退款总额
			  $data->baoxiantuikuane = $totalbaoxianshu * $baoxiandanjia;
			  $data->baoxiaotuikuane = 0; //报销退款额 --待定

			  $data->duifangzhanghu = ''; // 对方账户
			  $data->pingtaizhanghu = ''; // 平台账户

			  // $data->shenqingshijian =    // 申请时间待定
			  $data->tuipiaoshijian = $tuipiaoshijian;
			  $data->tuikuanshijian = date("YmsHis");



			$this->db->insert('caiwu_fj_tuipiao' , $data);	

		
				
				
				
						
				
				
                $fasong = $this->mdingdan->getDuanXinTongZhiEx($dingdanid);
                if(!empty($fasong->airline_fan)){
                  $this->myalidayu->TuiPiao_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan);                  
                } else {
                  $this->myalidayu->TuiPiao_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
                 
                }
                redirect('/admin/guoneijipiao/tuipiao/success/'.$wufatuipiao);
            }

            /*
             * 无法退票
             */
            if ($wufatuipiao == '1') {
				
                $fasong = $this->mdingdan->getDuanXinTongZhiEx($dingdanid);
                if(!empty($fasong->airline_fan)){
                  $this->myalidayu->JuJueTuiKuan_wangfan_v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight,$fasong->tel_fan, $fasong->name_fan, $fasong->date_fan, $fasong->dep_fan, $fasong->arr_fan, $fasong->airline_fan, $fasong->flight_fan);                  
                } else {
                  $this->myalidayu->JuJueTuiKuan__v5($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
                 
                }                
                
                redirect('/admin/guoneijipiao/tuipiao/success/'.$wufatuipiao);
            }
        }
    }

    public function success($wufatuipiao) {
		
        if ($wufatuipiao == '1') {
            $data['tag'] = '无法退票！';
        }
        
        if ($wufatuipiao == '0') {
            $data['tag'] = '退票成功！';
        }
        $this->load->view('admin/guoneijipiao/tuipiao/success', $data);
    }
	 // 退款以下往上退
	  public function xunhuantuikuan($tui, $totalprice){
		$this->load->library('mypost');

		$dingdanid =  $tui[0]->dingdanid;

		$sql = 'select d.isgaiqian as isgaiqian,d.dingdanhao as dingdanhao, d.shoukuanzhanghu as shoukuanzhanghu, d.dingdanzonge as dingdanzonge  from dingdan as d where id = ?';
		$query = $this->db->query($sql, $dingdanid);
		$dingdan = $query->row();
		$dingdanhao = $dingdan->dingdanhao;
		$dingdanzonge = $dingdan->dingdanzonge;
		if ($dingdan->isgaiqian == 1) {
		  $total = 0;
		  $lk = array();
		  foreach ($tui as $v) {
			$hangchenglvkeid = $v->hangchenglvkeid;
			$shifouertong  = $v->shifouertong;
			$dingdanid  = $v->dingdanid;
			if ($shifouertong == 0) {
			  $sql = 'select g.hangchenglvkeid as oldhangchenglvkeid, g.dingdanid as dingdanid, x.chengrenshengcangfei as feiyong from gaiqian as g left join gaiqiandingdan as gd on g.shenqinghao = gd.shenqinghao left join gaiqianxiangqing as x on gd.id = x.gaiqiandingdanid where g.newhangchenglvkeid = ?';
			} else {
			  $sql = 'select g.hangchenglvkeid as oldhangchenglvkeid, g.dingdanid as dingdanid, x.ertongshengcangfei as feiyong from gaiqian as g left join gaiqiandingdan as gd on g.shenqinghao = gd.shenqinghao left join gaiqianxiangqing as x on gd.id = x.gaiqiandingdanid where g.newhangchenglvkeid = ?';
			}
			$query = $this->db->query($sql, $hangchenglvkeid);
			$g = $query->row();

			$total += $g->feiyong;
			$data = new stdClass();
			$data->hangchenglvkeid = $g->oldhangchenglvkeid;
			$data->dingdanid = $g->dingdanid;
			$data->shifouertong = $shifouertong;
			$lk[] = $data;

		  }
		  if ($totalprice >  $total) {
			// 退款
			$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
			$get_data = array('transaction_id' => '', 'out_trade_no' => $dingdanhao, 'total_fee' =>  floatval($dingdanzonge), 'refund_fee' =>  floatval($total));
			$resutl = $this->mypost->request_get($url, $get_data);

			 $totalprice = $totalprice- $total;
			if(!empty($lk) && count($lk) > 0){
				$this->xunhuantuikuan($lk, $totalprice);	
			}

		  } else  {
			// 退款
			$total = $totalprice;
			$url = 'http://m.bibi321.com/hl/wxpay/refund.php';
			$get_data = array('transaction_id' => '', 'out_trade_no' => $dingdanhao, 'total_fee' =>  floatval($dingdanzonge), 'refund_fee' =>  floatval($total));
			$resutl = $this->mypost->request_get($url, $get_data);

		  }

		} else {

		  $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
		  $get_data = array('transaction_id' => '', 'out_trade_no' => $dingdanhao, 'total_fee' => floatval($dingdanzonge), 'refund_fee' => floatval($totalprice));
		  $resutl = $this->mypost->request_get($url, $get_data);
		  return  false;
		}

	  }
	  

	  


}
