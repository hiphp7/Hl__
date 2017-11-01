<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  退票管理
 */
class tuipiao0 extends CI_Controller {

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
            $tuipiaoid = $this->mysimpleencrypt->de($tuipiaoid);
            $admin_session = $this->session->userdata('admin');

            $obj = array('suodan' => true, 'suodanid' => $admin_session['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('tuipiao', $obj, array('id' => $tuipiaoid));
        }
        $this->load->view('admin/guoneijipiao/tuipiao/index', $data);
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

        $sql = 'select m.id as id, m.shenqinghao as shenqinghao, m.dingdanid as dingdanid, 
            m.hangchengid as hangchengid, m.shenqingriqi as shenqingriqi, m.tuipiaoleixing as tuipiaoleixing,
            m.caozuoyuanid as caozuoyuanid, m.caozuoshijian as caozuoshijian, m.wanchengshijian as wanchengshijian,
            m.tuipiaoyuanyin as tuipiaoyuanyin, m.fujian as fujian, m.beizhu as beizhu,
            m.chulizhuangtai as chulizhuangtai, m.suodan as suodan, 
            m.suodanid as suodanid, m.suodanshijian as suodanshijian from tuipiao as m where ';

        $sqlcount = 'select count(m.id) as id from tuipiao as m where ';

        $ps = array();
        // 乘客姓名
        if ((!empty($zhongwenming) && $zhongwenming != '') || (!empty($piaohao) && $piaohao != '')) {
            $zwm = $this->mhangchenglvke->getIdByName($zhongwenming, $piaohao);
            $sql = $sql . 'and m.hangchenglvkeid in ' . $zwm . ' ';
            $sqlcount = $sqlcount . 'and m.hangchenglvkeid in ' . $zwm . ' ';
        }

        // 出票编码 订单编号 订单状态 付款时间
        if ((!empty($chupiaobianma) && $chupiaobianma != '') || (!empty($dingdanhao) && $dingdanhao != '') || (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '') || (!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '')) {

            $zwm = $this->mdingdan->getIdByPs($chupiaobianma, $dingdanhao, $dingdanzhuangtai, $fukuanshijian_begin, $fukuanshijian_end);
            $sql = $sql . 'and m.dingdanid in ' . $zwm . ' ';
            $sqlcount = $sqlcount . 'and m.dingdanid in ' . $zwm . ' ';
        }

        /*
          // 航程类型
          if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != '全部') {
          $sql = $sql . 'and h.wangfanhangcheng = ? ';
          $sqlcount = $sqlcount . 'and h.wangfanhangcheng = ? ';
          $ps[] = $wangfanhangcheng;
          }
         */

        // 退票类型
        if (!empty($tuipiaoleixing) && $tuipiaoleixing != '' && $tuipiaoleixing != '全部') {
            $sql = $sql . 'and t.tuipiaoleixing = ? ';
            $sqlcount = $sqlcount . 'and t.tuipiaoleixing = ? ';
            $ps[] = $tuipiaoleixing;
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
                $obj->hid = $this->mysimpleencrypt->en($r->id);
                $obj->tid = $this->mysimpleencrypt->en($r->id);

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

                $hangcheng_obj = $this->mhangcheng->getObjById($r->hangchengid);

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
    public function xiangqing0($en_dingdan_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $this->load->model("dingdan/mtuipiao", "mtuipiao");
        $data['li'] = $this->li;

        // 退票 id
        //$tuipiao_id = $this->mysimpleencrypt->de($en_tuipiao_id);

        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        //$mydingdanid = $this->mhangcheng->getDingDanId($id);
        $tp = $this->mtuipiao->getObj($id);
        $obj = $this->mdingdan->getMyObj($tp->dingdanid);
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

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $tp->dingdanid);
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
                $data['tuipiaoid'] = $id;
            }
        }

        $this->load->view('admin/guoneijipiao/tuipiao/xiangqing', $data);
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
        $data['li'] = $this->li;

        // 退票 id
        //$tuipiao_id = $this->mysimpleencrypt->de($en_tuipiao_id);
        // 退票 id
        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $tp = $this->mtuipiao->getObj($id);
        $obj = $this->mdingdan->getMyObj($tp->dingdanid);
        $data['obj'] = $obj;

        $data['hangchengid'] = $tp->hangchengid;
        $data['dingdanid'] = $tp->dingdanid;
        $data['tuipiaoid'] = $id;
        $data['tuipiaojine'] = $tp->tuipiaojine;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($tp->dingdanid);

        // 获取航程旅客
        $hangchenglvkes = $this->mhangchenglvke->getHangChengLvKe($tp->hangchengid);

        $data['hangcheng'] = $hangcheng;
        $data['c'] = $this->gethclk($tp->hangchenglvkeid, $tp->dingdanid);
        $data['hangchenglvkes'] = $hangchenglvkes;

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
        $data['li'] = $this->li;

        // 退票 id
        $id = $this->mysimpleencrypt->de($en_dingdan_id);
        $tp = $this->mtuipiao->getObj($id);
        $obj = $this->mdingdan->getMyObj($tp->dingdanid);
        $data['obj'] = $obj;

        $data['hangchengid'] = $tp->hangchengid;
        $data['dingdanid'] = $tp->dingdanid;
        $data['tuipiaoid'] = $id;
        
        // 退票对象
        $data['tp'] = $tp;

        // 获取航程
        $hangcheng = $this->mhangcheng->getHangCheng($tp->dingdanid);

        // 获取航程旅客
        //$hangchenglvkes = $this->mhangchenglvke->getHangChengLvKe($tp->hangchengid);
        $hangchenglvkes = $this->mhangchenglvke->getObjById($tp->hangchenglvkeid);

        $data['hangcheng'] = $hangcheng;
        $data['c'] = $this->gethclk($tp->hangchenglvkeid, $tp->dingdanid);
        $data['hangchenglvkes'] = $hangchenglvkes;

        $this->load->view('admin/guoneijipiao/tuipiao/tuipiaochuli', $data);
    }

    public function gethclk($hangchenglvkeid, $dingdanid) {
        $obj = new stdClass();
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $dingdan = $this->mdingdan->getObj($dingdanid);
        $sql = 'select m.id as id, m.cangwei as cangwei, m.seatCode as seatCode, l.shifouertong as shifouertong, h.piaomiandanjia as piaomiandanjia,
                m.airlineCode as airlineCode, m.refundStipulate as refundStipulate,
                m.changeStipulate as changeStipulate, m.suitableAirline as suitableAirline,
                m.modifyStipulate as modifyStipulate,
                h.ranyoushui as ranyoushui, h.danzhangpiaomianjia as danzhangpiaomianjia 
                from hangchenglvke as m, lvke as l, hangcheng as h where m.lvkeid = l.id 
                and m.hangchengid = h.id and m.id = ?';
        $res = $this->db->query($sql, array($hangchenglvkeid));
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj->id = $r->id;
                $obj->cangwei = $r->cangwei . ' ' . $r->seatCode;
                if ($r->shifouertong == 0) {
                    $obj->shifouertong = '成人';
                } else {
                    $obj->shifouertong = '儿童';
                }
                $obj->piaomiandanjia = $r->piaomiandanjia;
                $obj->ranyoushui = $r->ranyoushui;
                $obj->danzhangpiaomianjia = $r->danzhangpiaomianjia;
                $obj->chupiaobianma = $dingdan->chupiaobianma;

                $obj->airlineCode = $r->airlineCode;
                // 退票规则
                $obj->refundStipulate = $r->refundStipulate;
                // 升仓改期
                $obj->changeStipulate = $r->changeStipulate;
                $obj->suitableAirline = $r->suitableAirline;
                // 能改签的是 true 不能改签的是 false
                $obj->modifyStipulate = $r->modifyStipulate == 1 ? '允许签转' : '不能改签';
            }
        }
        return $obj;
    }

    /**
     * 退票处理 
     */
    public function tp() {
        $this->db->trans_begin();

        $this->load->model('dingdan/mdingdan', 'mdingdan');

        $wuftuipiap = $this->input->post('wuftuipiap');
        $admin_session = $this->session->userdata('admin');
        $hangchengid = $this->input->post('hangchengid');
        $hangchenglvkeid = $this->input->post('hangchenglvkeid');
        $dingdanid = $this->input->post('dingdanid');
        $tuipiaoid = $this->input->post('tuipiaoid');
        // 总价
        $total_fee = $this->input->post('total_fee');
        $refund_fee = $this->input->post('refund_fee');
        // 退票自愿非自愿
        $tuipiaoleixing = $this->input->post('tuipiaoleixing');

        if ($wuftuipiap == '0') {
            // 退票表设置 已经完成时间
            $obj_tuipiao = array('wanchengshijian' => date("Y-m-d H:i:s"),
                'tuipiaoleixing' => $tuipiaoleixing,
                'caozuoyuanid' => $admin_session['id'],
                'tuipiaoleixing' => 2,
                'chulizhuangtai' => 2,
                'tuipiaojine' => $refund_fee,
                'caozuoshijian' => date("Y-m-d H:i:s"));
            $this->db->update('tuipiao', $obj_tuipiao, array('id' => $tuipiaoid));
            // 订单中设置 出票状态
            $this->db->update('dingdan', array('chupiaozhuangtai' => 4, 'wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => $admin_session['id']), array('id' => $dingdanid));
            // 在航程旅客表中状态字段改为
            $this->db->update('hangchenglvke', array('zhuangtai' => '已退票'), array('id' => $hangchenglvkeid));
        }
        else if ($wuftuipiap == '1') {
            // 退票表设置 已经完成时间
            $obj_tuipiao = array('wanchengshijian' => date("Y-m-d H:i:s"),
                'tuipiaoleixing' => $tuipiaoleixing,
                'caozuoyuanid' => $admin_session['id'],
                'tuipiaoleixing' => 3,
                'chulizhuangtai' => 3,
                'tuipiaojine' => $refund_fee,
                'caozuoshijian' => date("Y-m-d H:i:s"));
            $this->db->update('tuipiao', $obj_tuipiao, array('id' => $tuipiaoid));
            // 订单中设置 出票状态
            $this->db->update('dingdan', array('chupiaozhuangtai' => 5, 'wanchengshijian' => date("Y-m-d H:i:s"), 'caozuoyuanid' => $admin_session['id']), array('id' => $dingdanid));
            // 在航程旅客表中状态字段改为
            $this->db->update('hangchenglvke', array('zhuangtai' => '无法退票'), array('id' => $hangchenglvkeid));
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
            if ($dingdanid != 0 && $wuftuipiap == '0') {
                $sql = 'select m.dingdanhao as dingdanhao from dingdan as m where m.id = ?';
                $res = $this->db->query($sql, array($dingdanid));
                if ($res->num_rows() > 0) {
                    foreach ($res->result() as $r) {
                        // 退票成功后把款退掉
                        $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
                        $get_data = array('transaction_id' => '', 'out_trade_no' => $r->dingdanhao, 'total_fee' => $total_fee, 'refund_fee' => $refund_fee);
                        $resutl = $this->mypost->request_get($url, $get_data);
                    }
                }
            }

            if ($resutl == '成功') {
                $fasong = $this->mdingdan->getDuanXinTongZhi($dingdanid);
                $this->myalidayu->TuiPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight, $fasong->deptime, $fasong->chupiaobianma, '400-991-7909');
                redirect('/admin/guoneijipiao/tuipiao/success');
            }
            
            /*
             * 无法退票
             */
            if($wuftuipiap == '1')
            {
                $data['tag'] = '无法退款！';
                redirect('/admin/guoneijipiao/tuipiao/success', $data);
            }

        }
    }

    public function success() {
        $this->load->view('admin/guoneijipiao/tuipiao/success');
    }

}
