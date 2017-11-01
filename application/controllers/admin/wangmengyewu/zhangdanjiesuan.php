<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 网盟业务  --  企业商户
 */
class zhangdanjiesuan extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '账单编号/出账日';
        $std1->name = 'zhanghanchutime';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '起始日期';
        $std2->name = 'kaishiriqi';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '结束日期';
        $std3->name = 'jieshuriqi';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '佣金总计';
        $std4->name = 'yongjinzonge';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '商户名称';
        $std5->name = 'mingcheng';
        $std5->show = true;
        $li[4] = $std5;

        $std5 = new stdClass();
        $std5->index = 5;
        $std5->display_name = '注册邮箱';
        $std5->name = 'email';
        $std5->show = true;
        $li[5] = $std5;

        $std5 = new stdClass();
        $std5->index = 6;
        $std5->display_name = '结算方式';
        $std5->name = 'qingsuanfangshi';
        $std5->show = true;
        $li[6] = $std5;

        $std6 = new stdClass();
        $std6->index = 7;
        $std6->display_name = '账单状态';
        $std6->name = 'zhangdanzhuangtai';
        $std6->show = true;
        $li[7] = $std6;

        $std6 = new stdClass();
        $std6->index = 8;
        $std6->display_name = '结算时间';
        $std6->name = 'jiesuanshijian';
        $std6->show = true;
        $li[8] = $std6;


        $this->li = $li;
    }

    public function index($id = '') {
        $data['li'] = $this->li;
        $admin_session = $this->session->userdata('admin');

        // 执行锁单
        if ($id != '' && $this->issuodan($id, $admin_session ['id']) == '未锁单') {
            $this->load->library('mysimpleencrypt');
            $id = $this->mysimpleencrypt->de($id);
            $obj = array('suodan' => true, 'jiesuanrenid' => $admin_session['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('wm_shanghuzhangdan', $obj, array('id' => $id));
        }
        $this->load->view('admin/wangmengyewu/zhangdanjiesuan/index', $data);
    }

    /**
     * 判断是否是用户本人锁的单
     */
    public function issuodan($id, $suodanid) {
        $this->load->library('mysimpleencrypt');
        $id = $this->mysimpleencrypt->de($id);

        $result = '未锁单';
        $sql = 'select m.id as id, m.jiesuanrenid as jiesuanrenid from wm_shanghuzhangdan as m where m.id = ?';
        $res = $this->db->query($sql, array($id));
        foreach ($res->result() as $r) {
            if (!empty($r->id) && intval($r->id) > 0) {
                if (!empty($r->id) && $r->jiesuanrenid == $suodanid) {
                    $result = '自己锁单';
                } else if (!empty($r->id) && !empty($r->jiesuanrenid) && intval($r->jiesuanrenid) > 0 && intval($r->jiesuanrenid) != intval($suodanid)) {
                    $result = '别人锁单';
                }
            }
        }
        return $result;
    }

    /**
     * 解锁
     */
    public function jiesuo($id = '') {

        $this->load->library('mysimpleencrypt');
        $admin_session = $this->session->userdata('admin');

        if ($id != '' && $this->issuodan($id, $admin_session ['id']) == '自己锁单') {
            $id = $this->mysimpleencrypt->de($id);
            $obj = array('suodan' => false, 'jiesuanrenid' => 0);
            $this->db->update('wm_shanghuzhangdan', $obj, array('id' => $id));
            $a = $this->db->last_query();
        }
        redirect('admin/wangmengyewu/zhangdanjiesuan/index');
    }

    /**
     * 显示全部订单
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $this->load->library('mysimpleencrypt');

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        $zhangdanhao = $this->input->post('zhangdanhao');
        $jiesuanzhuangtai = $this->input->post('jiesuanzhuangtai');
        $chuzhang_end = $this->input->post('chuzhang_end');
        $chuzhang_begin = $this->input->post('chuzhang_begin');

        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && "zhanghanchutime" == $this->li[$sortid]->name) {
            $mysort = "chuzhangriqi";
            $mydir = $dir;
        } else {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'SELECT m.id as id,m.zhangdanhao as zhangdanhao,m.shanghuhao as shanghuhao, m.kaishiriqi as kaishiriqi, m.jieshuriqi as jieshuriqi, m.chuzhangriqi as chuzhangriqi, m.yongjinzonge as yongjinzonge, 
                m.zhuangtai as zhuangtai, m.jiesuanrenid as jiesuanrenid, m.jiesuanshijian as jiesuanshijian, m.shoukuanzhanghu as shoukuanzhanghu, m.suodan as suodan, 
                m.shoukuanpingtai as shoukuanpingtai, m.shoukuanhuzuming as shoukuanhuzuming, m.qingsuanfangshi as qingsuanfangshi,m.qingsuanriqi as qingsuanriqi FROM wm_shanghuzhangdan as m ';
        $sqlcount = 'select count(m.id) as num from wm_shanghuzhangdan as m ';
        $ps = array();

        $sql .= 'where ';
        $sqlcount .= 'where ';
        // 结算状态
        if ($jiesuanzhuangtai != '' && $jiesuanzhuangtai != '全部') {
            $sql .= 'and m.zhuangtai = ? ';
            $sqlcount .= 'and m.zhuangtai = ? ';
            $ps[] = $jiesuanzhuangtai;
        }
        if ($zhangdanhao != '' && $zhangdanhao != '全部') {
            $sql .= 'and m.zhangdanhao = ? ';
            $sqlcount .= 'and m.zhangdanhao = ? ';
            $ps[] = $zhangdanhao;
        }
        // 时间
        if (!empty($chuzhang_end) && $chuzhang_end != '' && !empty($chuzhang_begin) && $chuzhang_begin != '') {
            $sql .= 'and m.chuzhangriqi between ? and ? ';
            $sqlcount .= 'and m.chuzhangriqi between ? and ? ';
            $ps[] = $chuzhang_begin . " 0:0:0";
            $ps[] = $chuzhang_end . " 23:59:59";
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
        $a = $this->db->last_query();

        $res_count = $this->db->query($sqlcount, $ps);
        $b = $this->db->last_query();
        $mycount = 0;
        $row = $res_count->first_row();

        if (!empty($row)) {
            $mycount = $row->num;
        }
        $mydata = array();
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj = new stdClass();
                $obj = $r;
                $shanghuhao = $r->shanghuhao;
                $obj->id = $this->mysimpleencrypt->en($obj->id);
                if ($obj->zhuangtai == 0) {
                    $obj->zhangdanzhuangtai = "未结算";
                } else {
                    $obj->zhangdanzhuangtai = "已结算";
                    $jiesuanrenid = $obj->jiesuanrenid;
                    $query = $this->db->query('select xingming from guanliyuan where id = ? limit 1', array($jiesuanrenid));
                    $res = $query->row();
                    $xingming = $res->xingming;
                    $obj->jiesuanshijian = $xingming . "<br/>" . $obj->jiesuanshijian;
                };
                if ($obj->qingsuanfangshi == 0) {
                    $obj->qingsuanfangshi = "周结";
                } else {
                    $obj->qingsuanfangshi = "月结";
                }
                $obj->zhanghanchutime = $obj->zhangdanhao . "<br>" . $obj->chuzhangriqi;
                $sql_info = 'select m.shanghuhao as shanghuhao, m.chuangjianshijian as chuangjianshijian,m.name as name, m.email as email,
                            m.mingcheng as mingcheng,m.shanghuzhuangtai as shanghuzhuangtai ,m.shanghudianhua as shanghudianhua ,
                            m.qingsuanfangshi as qingsuanfangshi ,m.chuangjianshijian as chuangjianshijian ,
                            m.qingsuanriqi as qingsuanriqi from  wm_qiyeshanghu as m where m.shanghuhao = ? limit 1';
                $query_info = $this->db->query($sql_info, array($shanghuhao));
                $res = $query_info->row();
                $obj->mingcheng = $res->mingcheng;
                $obj->email = $res->email;

                if ($obj->jiesuanrenid == $admin_session['id']) {
                    $obj->suodan_self = '1';
                } else {
                    $obj->suodan_self = '0';
                }
                if ($obj->zhuangtai == '1') {
                    $obj->chuli = '1';
                } else {
                    $obj->chuli = '0';
                }

                $mydata[] = $obj;
            }
        }
//        $mydata = array();
//        $mycount = 0;
        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    /**
     * 
     * @param type $id
     * @param type $jie 是否显示结算按钮
     */
    public function xiangqing($id, $jie = '') {
        $this->load->library('mysimpleencrypt');
        $id = $this->mysimpleencrypt->de($id);
        $data['id'] = $id;
        $admin_session = $this->session->userdata('admin');
        $sql = 'SELECT m.id as id,m.zhangdanhao as zhangdanhao,m.shanghuhao as shanghuhao, m.kaishiriqi as kaishiriqi, m.jieshuriqi as jieshuriqi, m.chuzhangriqi as chuzhangriqi, m.yongjinzonge as yongjinzonge, 
                m.zhuangtai as zhuangtai, m.jiesuanrenid as jiesuanrenid, m.jiesuanshijian as jiesuanshijian, m.shoukuanzhanghu as shoukuanzhanghu, m.suodan as suodan, 
                m.shoukuanpingtai as shoukuanpingtai, m.shoukuanhuzuming as shoukuanhuzuming, m.qingsuanfangshi as qingsuanfangshi,m.qingsuanriqi as qingsuanriqi FROM wm_shanghuzhangdan as m where m.id = ? limit 1';
        $query = $this->db->query($sql, array($id));
        $zhangdan = $query->row();
        $shanghuhao = $zhangdan->shanghuhao;
        $zhangdan->shanghuhao = $this->mysimpleencrypt->en($zhangdan->shanghuhao);
        $zhangdan->id = $this->mysimpleencrypt->en($zhangdan->id);
        $data['zhangdan'] = $zhangdan;
        $sql = 'select m.zhangdanid as zhangdanid,m.leixing as leixing,m.yongjine as yongjine from wm_zhangdanmingxi as m where m.zhangdanid = ?';
        $query = $this->db->query($sql, array($id));
        $zhangdanmingxi = $query->result();
        $mingxi = array();
        foreach ($zhangdanmingxi as $v) {
            if ($v->leixing == 0) {
                $mingxi['0'] = $v->yongjine;
            } elseif ($v->leixing == 1) {
                $mingxi['1'] = $v->yongjine;
            }elseif ($v->leixing == 2) {
                $mingxi['2'] = $v->yongjine;
            }elseif ($v->leixing == 3) {
                $mingxi['3'] = $v->yongjine;
            }
        }
        $data['mingxi'] = $mingxi;
        if ($zhangdan->jiesuanrenid == $admin_session['id'] && $jie != '') {
            $data['jie'] = true;
        } else {
            $data['jie'] = false;
        }
        $this->load->view('admin/wangmengyewu/zhangdanjiesuan/xiangqing', $data);
    }

    public function jiesuan() {
        $this->load->library('mysimpleencrypt');
        $admin_session = $this->session->userdata('admin');
        $id = $this->security->xss_clean($this->input->post('id'));
        $id = $this->mysimpleencrypt->de($id);
        $arr = array(
            "jiesuanrenid" => $admin_session['id'],
            "jiesuanshijian" => date('Y-m-d H:i:s'),
            "zhuangtai" => 1
        );
        $this->db->update('wm_shanghuzhangdan', $arr, array("id" => $id));
        $a = $this->db->last_query();
        if ($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "fasle";
        }
    }

    public function getweek($week) {
        switch ($week) {
            case '7':
                $w = '日';
                break;
            case '1':
                $w = '一';
                break;
            case '2':
                $w = '二';
                break;
            case '3':
                $w = '三';
                break;
            case '4':
                $w = '四';
                break;
            case '5':
                $w = '五';
                break;
            default:
                $w = '六';
                break;
        }
        return "周" . $w;
    }

}
