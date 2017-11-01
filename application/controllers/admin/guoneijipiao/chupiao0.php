<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 国内机票  --  出票管理
 */
class chupiao0 extends CI_Controller {

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

    public function index($hangchengid = '') {
        $data['li'] = $this->li;

        if ($hangchengid != '') {
            $this->load->library('mysimpleencrypt');
            $this->load->model("dingdan/msoudan", "msoudan");
            $hangchengid = $this->mysimpleencrypt->de($hangchengid);
            if ($this->msoudan->isSouDan($hangchengid, 'hangcheng') == '未锁单') {
                $this->msoudan->save($hangchengid, 'hangcheng');
            }
        }
        $this->load->view('admin/guoneijipiao/chupiao/index', $data);
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $this->load->library('mysimpleencrypt');
        // 加载管理员
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        // 加载锁单
        $this->load->model("dingdan/msoudan", "msoudan");
        $myconfig = $this->config->item("订单状态");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

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

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, h.id as hid, m.dingdanhao as dingdanhao,m.chupiaobianma as chupiaobianma,
            h.wangfanhangcheng as wangfan,
            h.qifeijichang as qifeijichang,
            h.daodajichang as daodajichang,
            h.hangbanhao as hangbanhao,
            h.cangwei as cangwei,
            h.qifeishijian as qifeishijian,
            m.dingdanzonge as dingdanzonge, m.dingdanzhuangtai as dingdanzhuangtai,
            m.chulishijian as chulishijian 
            from dingdan as m, hangcheng as h ';

        $sqlcount = 'select count(h.id) as id from dingdan as m, hangcheng as h ';

        $ps = array();
        // 乘客姓名
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . ', hangchenglvke as lk where m.id = h.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $sqlcount = $sqlcount . ', hangchenglvke as lk where m.id = h.dingdanid and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        } else {
            $sql = $sql . 'where m.id = h.dingdanid ';
            $sqlcount = $sqlcount . 'where m.id = h.dingdanid ';
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
                $obj->hid = $this->mysimpleencrypt->en($r->hid);
                $obj->dingdanhao = $r->dingdanhao;

                if ($r->wangfan == false) {
                    $obj->wangfan = '单程';
                } else {
                    $obj->wangfan = '返程';
                }
                // 航班时间/航班号/舱位（成人，儿童）
                $obj->hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->cangwei;
                // 出票编码
                $obj->chupiaobianma = $r->chupiaobianma;
                // 到达机场
                $obj->daodajichang = $r->daodajichang;
                // 起飞 到达
                $obj->qifei_daoda = $r->qifeijichang . '/' . $r->daodajichang;
                // 总价/乘客数（成人/儿童）
                $obj->zongjia_sks = $r->dingdanzonge . '/' . $this->getPersonNum($r->id, 0) . '人' . $this->getPersonNum($r->id, 1) . '人';
                // 锁单人/更新时间
                $obj->suodan = $this->msoudan->isSouDan($r->hid, 'hangcheng');
                $obj->suodan_zt = '未锁单';
                if ($obj->suodan == '自己锁单' || $obj->suodan == '别人锁单') {
                    $obj->suodan_zt = $obj->suodan;
                    if (!empty($r->dingdanzhuangtai) && $r->dingdanzhuangtai == 9) {
                        $obj->suodan = $this->msoudan->getSouDan($r->hid, 'hangcheng'); // $this->mguanliyuan->getName($r->id) . '/' . $r->chulishijian;
                    }
                    else
                    {
                        $obj->suodan = $this->msoudan->getSouDan($r->hid, 'hangcheng');
                    }
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

        $id = $this->mysimpleencrypt->de($en_id);
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

        $id = $this->mysimpleencrypt->de($en_id);
        $mydingdanid = $this->mhangcheng->getDingDanId($id);
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
                    $data['hangchenglvke'] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'] = $hangchenglvke_tongji;
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
    public function yidicp()
    {
        $dingdanid = $this->input->post('yidi_dingdanid');
        // 添加事物
        $this->db->trans_begin();
        
        // 1、修改 订单表
        $ps = array(
                    'yidipingtai' => $this->input->post('yidipingtai'),
                    'yidicaigoujine' => $this->input->post('yidicaigoujine'),
                    'yididingdanhao' => $this->input->post('yididingdanhao'),
                    'yidiqitashuoming' => $this->input->post('yidiqitashuoming'),
                    //'chupiaobianma' => $v, 
                    'chulishijian' => date("Y-m-d H:i:s"),
                    'chupiaozhuangtai' => 1,
                    // 订单状态 标示为已经出票
                    'dingdanzhuangtai' => 3);
         $this->db->update('dingdan', $ps, array('id' => $dingdanid));
         
         // 2、获取票号 并保存到数据库
         $yidi_piaohao = $this->input->post('yidi_piaohao');
         $piaohao = json_decode($yidi_piaohao);
         foreach ($piaohao as $key => $v)
         {
             $this->db->update('hangchenglvke', array('piaohao' => $v->piaohao), array('id' => $v->hangchenglvke));
         }
         
        if($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if($dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($dingdanid);
                //var_dump($fasong);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
           redirect('/admin/guoneijipiao/chupiao/success');
        }
    }
    
    /**
     * 本地出票
     */
    public function bendicp()
    {
        $dingdanid = $this->input->post('ben_dingdanid');
        // 添加事物
        $this->db->trans_begin();
        
        // 1、修改 订单表
        $ps = array(
                    'prn' => $this->input->post('prn'),
                    'caigoujine' => $this->input->post('caigoujine'),
                    'qitashuoming' => $this->input->post('qitashuoming'),
                    //'chupiaobianma' => $v, 
                    'chulishijian' => date("Y-m-d H:i:s"),
                    'chupiaozhuangtai' => 1,
                    // 订单状态 标示为已经出票
                    'dingdanzhuangtai' => 3);
         $this->db->update('dingdan', $ps, array('id' => $dingdanid));
         
         // 2、获取票号 并保存到数据库
         $ben_piaohao = $this->input->post('ben_piaohao');
         $piaohao = json_decode($ben_piaohao);
         foreach ($piaohao as $key => $v)
         {
             $this->db->update('hangchenglvke', array('piaohao' => $v->piaohao), array('id' => $v->hangchenglvke));
         }
         
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if($dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($dingdanid);
                //var_dump($fasong);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
           redirect('/admin/guoneijipiao/chupiao/success');
        }
    }

        /**
     * 出票处理 
     */
    public function cp()
    {
        $inde1_dingdanid = 0;
        $inde2_dingdanid = 0;
        $ps = $_POST;
        $this->db->trans_begin();
        
        foreach ($ps as $key => $v)
        {
            $sc = explode('_1_', $key);
   
            // 添加出票编码
            if(!empty($sc) && $sc[0] == 'chupiaobianma')
            {
                $ps = array('chupiaobianma' => $v, 
                    'chulishijian' => date("Y-m-d H:i:s"),
                    'chupiaozhuangtai' => 1,
                    // 订单状态 标示为已经出票
                    'dingdanzhuangtai' => 3);
                $this->db->update('dingdan', $ps, array('id' => $sc[1]));
                $inde1_dingdanid = intval($sc[1]);
            }
            
            // 添加 票号
            if(!empty($sc) && $sc[0] == 'piaohao')
            {
                $this->db->update('hangchenglvke', array('piaohao' => $v), array('id' => $sc[1]));
            } 
            
            $sc1 = explode('_2_', $key);
            if(!empty($sc1) && $sc1[0] == 'chupiaobianma')
            {
                $ps = array('chupiaobianma' => $v, 
                    'chupiaozhuangtai' => 1,
                    // 订单状态 标示为已经出票
                    'dingdanzhuangtai' => 3);
                $this->db->update('dingdan', $ps, array('id' => $sc1[1]));
                $inde2_dingdanid = intval($sc1[1]);
            }
            
            // 添加 票号
            if(!empty($sc1) && $sc1[0] == 'piaohao')
            {
                $this->db->update('hangchenglvke', array('piaohao' => $v), array('id' => $sc1[1]));
            } 
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            // 出票成功后发生短信
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if($inde1_dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($inde1_dingdanid);
                //var_dump($fasong);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
            if($inde2_dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($inde2_dingdanid);
                //var_dump($fasong);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
           redirect('/admin/guoneijipiao/chupiao/success');
        }
    }
    
    public function success()
    {
        $this->load->view('admin/guoneijipiao/chupiao/success');
    }
   
    /**
     * 出票处理 
     * $en_id 航程 id
     */
    public function chupiaochuli0($en_id = '') {
        $data['li'] = $this->li;
        if (!empty($en_id) || $en_id != '') {
            // 获取订单
            $this->load->model("dingdan/mdingdan", "mdingdan");
            $obj = $this->mdingdan->getMyObj($id);
        }
        $this->load->view('admin/guoneijipiao/chupiao/chupiaochuli0', $data);
    }

    /**
     * 锁单
     */
    public function suodan($hc_id) {
        $this->load->library('mysimpleencrypt');
        $this->load->model("dingdan/msoudan", "msoudan");
        $hangchengid = $this->mysimpleencrypt->de($hc_id);
        if ($this->msoudan->isSouDan($hangchengid, 'hangcheng') == '未锁单') {
            $this->msoudan->save($hangchengid, 'hangcheng');
            echo '1';
        } else {
            echo '0';
        }
    }

    public function xiangqing0() {
        $this->load->view('admin/guoneijipiao/chupiao/xiangqing0');
    }

}

