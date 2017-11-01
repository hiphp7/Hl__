<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 网盟业务  --  企业商户
 */
class qiyeshanghu extends CI_Controller {

    private $li;
    private $chanpin = array(
        0 => "国内机票",
        1 => "火车票",
        2 => "国内酒店",
        3 => "机票保险",
    );

    function __construct() {
        parent::__construct();

// 生成列表显示的列
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '注册时间';
        $std1->name = 'chuangjianshijian';
        $std1->show = true;
        $li[0] = $std1;

        $std1 = new stdClass();
        $std1->index = 1;
        $std1->display_name = '商户号';
        $std1->name = 'shanghuhaonum';
        $std1->show = true;
        $li[1] = $std1;

        $std2 = new stdClass();
        $std2->index = 2;
        $std2->display_name = '注册邮箱';
        $std2->name = 'email';
        $std2->show = true;
        $li[2] = $std2;

        $std3 = new stdClass();
        $std3->index = 3;
        $std3->display_name = '公司名称';
        $std3->name = 'mingcheng';
        $std3->show = true;
        $li[3] = $std3;

        $std4 = new stdClass();
        $std4->index = 4;
        $std4->display_name = '公司联系人';
        $std4->name = 'name';
        $std4->show = true;
        $li[4] = $std4;

        $std5 = new stdClass();
        $std5->index = 5;
        $std5->display_name = '公司联系方式';
        $std5->name = 'shanghudianhua';
        $std5->show = true;
        $li[5] = $std5;

        $std5 = new stdClass();
        $std5->index = 6;
        $std5->display_name = '清算方式';
        $std5->name = 'qingsuanfangshi';
        $std5->show = true;
        $li[6] = $std5;

        $std5 = new stdClass();
        $std5->index = 7;
        $std5->display_name = '清算日期';
        $std5->name = 'qingsuanriqi';
        $std5->show = true;
        $li[7] = $std5;

        $std6 = new stdClass();
        $std6->index = 8;
        $std6->display_name = '商户状态';
        $std6->name = 'shanghuzhuangtai';
        $std6->show = true;
        $li[8] = $std6;

        $this->li = $li;
    }

    public function index() {
        $data['li'] = $this->li;

        $this->load->view('admin/wangmengyewu/qiyeshanghu/index', $data);
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

        $starttime = $this->input->post('starttime');
        $endtime = $this->input->post('endtime');
        $zhuangtai = $this->input->post('zhuangtai');

        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name)) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.shanghuhao as shanghuhao, m.chuangjianshijian as chuangjianshijian,m.name as name, m.email as email,m.mingcheng as mingcheng,m.shanghuzhuangtai as shanghuzhuangtai ,m.shanghudianhua as shanghudianhua ,m.qingsuanfangshi as qingsuanfangshi ,m.qingsuanriqi as qingsuanriqi from  wm_qiyeshanghu as m ';
        $sqlcount = 'select count(m.shanghuhao) as num from wm_qiyeshanghu as m ';
        $ps = array();

        $sql .= 'where ';
        $sqlcount .= 'where ';
        // 商戶状态
        if (!empty($zhuangtai) && $zhuangtai != '' && $zhuangtai != '全部') {
            $sql .= 'and m.shanghuzhuangtai = ? ';
            $sqlcount .= 'and m.shanghuzhuangtai = ? ';

            if ($zhuangtai == 1) {
                $shanghuzhuangtai = 1;
            } else {
                $shanghuzhuangtai = 0;
            }
            $ps[] = $shanghuzhuangtai;
        }
        // 时间
        if (!empty($starttime) &&
                $starttime != '' && !empty($endtime) &&
                $endtime != '') {
            $sql .= 'and  m.chuangjianshijian >= ?  and  m.chuangjianshijian <= ? ';
            $sqlcount .= 'and m.chuangjianshijian >= ? and m.chuangjianshijian  <= ? ';
            $ps[] = $starttime;
            $ps[] = $endtime;
        }
            $sql .= 'and m.shanghuleixing = 0 ';
            $sqlcount .= 'and m.shanghuleixing = 0 ';
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
                $r->shanghuhaonum = $r->shanghuhao;
                $r->shanghuhao = $this->mysimpleencrypt->en($r->shanghuhao);
                if ($r->shanghuzhuangtai == 1) {
                    $r->shanghuzhuangtai = "启用";
                } else {
                    $r->shanghuzhuangtai = "禁用";
                }
                if ($r->qingsuanfangshi == 0) {
                    $r->qingsuanfangshi = "周结";
                    $r->qingsuanriqi = $this->getweek($r->qingsuanriqi);
                } else {
                    $r->qingsuanfangshi = "月结";
                    $r->qingsuanriqi = $r->qingsuanriqi . "号";
                }

                $mydata[] = $r;
            }
        }

        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    public function xiangqing($shanghuhao) {
        $this->load->library('mysimpleencrypt');
        $chanpinleixing = $this->chanpin;
        if (!empty($shanghuhao)) {
            $data['shanghuhao'] = $shanghuhao;
            $shanghuhao = $this->mysimpleencrypt->de($shanghuhao);
           
            $sql_info = 'select m.shanghuhao as shanghuhao, m.chuangjianshijian as chuangjianshijian,m.name as name, m.email as email,
              m.mingcheng as mingcheng,m.shanghuzhuangtai as shanghuzhuangtai ,m.shanghudianhua as shanghudianhua ,
              m.qingsuanfangshi as qingsuanfangshi ,m.chuangjianshijian as chuangjianshijian ,
              m.qingsuanriqi as qingsuanriqi from  wm_qiyeshanghu as m where m.shanghuhao = ? limit 1';
            $query_info = $this->db->query($sql_info, array($shanghuhao));
            $res = $query_info->row();

            if ($res->qingsuanfangshi == 0) {
                $res->qingsuanfangshi = "周结";
                $res->qingsuanriqi = $this->getweek($res->qingsuanriqi);
            } else {
                $res->qingsuanfangshi = "月结";
                $res->qingsuanriqi = $res->qingsuanriqi . "号";
            }

            $data['info'] = $res;

            $sql_zhanghu = 'select m.shoukuanpingtai as shoukuanpingtai, m.huzhuming as huzhuming, m.zhanghao as zhanghao from wm_shoukuanzhanghu as m where m.shanghuhao = ? limit 1';
            $query_zhanghu = $this->db->query($sql_zhanghu, array($shanghuhao));
            $zhanghu = $query_zhanghu->row();
            $data['zhanghu'] = $zhanghu;

            $sql_chanpin = 'select m.chanpinleixing as chanpinleixing, m.qianyuefangshi as qianyuefangshi, m.yongjinjishu as yongjinjishu, m.zhuangtai as zhungtai from wm_qianyuechanpin as m where m.shanghuhao = ?';
            $query_chanpin = $this->db->query($sql_chanpin, array($shanghuhao));
            $chanpin = $query_chanpin->result();

            foreach ($chanpin as $v) {

                $v->leixing = $chanpinleixing[$v->chanpinleixing];
                if ($v->qianyuefangshi == 0) {
                    $v->yongjinjishu = floatval($v->yongjinjishu)."元(按成单数)";
                } else {
                    $v->yongjinjishu = floatval($v->yongjinjishu)*100 . "%(按交易额比例)";
                }
                

                
                if ($v->zhungtai == 0) {
                    $v->chanpinzhungtai = "禁用";
                } else {
                    $v->chanpinzhungtai = "启用";
                }
            }
            $data['chanpin'] = $chanpin;

            $this->load->view('admin/wangmengyewu/qiyeshanghu/xiangqing', $data);
        }
    }

    public function gaichanpinzhungtai() {
        $this->load->library('mysimpleencrypt');

        $chanpinleixing = $this->security->xss_clean($this->input->post('chanpinleixing'));
        $shanghuhao = $this->security->xss_clean($this->input->post('shanghuhao'));

        $sql = 'select zhuangtai from wm_qianyuechanpin where shanghuhao = ? and chanpinleixing = ? limit 1';
        $query = $this->db->query($sql, array($shanghuhao, $chanpinleixing));
        $res = $query->row();
        $zhuangtai = $res->zhuangtai;
        if ($zhuangtai == "0") {
            $zhuangtai = 1;
        } else {
            $zhuangtai = 0;
        }

        $this->db->update('wm_qianyuechanpin', array("zhuangtai" => $zhuangtai), array("chanpinleixing" => $chanpinleixing, "shanghuhao" => $shanghuhao));
        if ($this->db->affected_rows() > 0) {
            echo $zhuangtai;
        } else {
            echo "fasle";
        }
    }

    public function kaihu() {
        $this->load->view('admin/wangmengyewu/qiyeshanghu/kaihu');
    }

// 签约产品
    public function qianyuechanpin($shanghuhao) {

        if (!empty($shanghuhao)) {
            $data['shanghuhao'] = $shanghuhao;
            $data['chanpin'] = $this->chanpin;
            $this->load->view('admin/wangmengyewu/qiyeshanghu/qianyuechanpin', $data);
        }
    }

    // 添加签约产品
    public function addqianyue($shanghuhao) {
        $this->load->library('mysimpleencrypt');
        if (!empty($shanghuhao)) {
            $shanghuhao1 = $this->mysimpleencrypt->de($shanghuhao);
            $chanpin = $this->chanpin;
            $sql = 'select  chanpinleixing FROM wm_qianyuechanpin where shanghuhao = ?';
            $query = $this->db->query($sql, array($shanghuhao1));

            if ($query->num_rows() > 0) {
                $yiqanyue = $query->result();
                $qianyue = array();
                foreach ($yiqanyue as $value) {
                    array_push($qianyue, $value->chanpinleixing);
                }
                $qianyue = array_flip($qianyue); // 交换 键名与键值
                foreach ($chanpin as $k => $v) {
                    if (isset($qianyue[$k])) {
                        unset($chanpin[$k]);
                    };
                }
            }
            $data["chanpin"] = $chanpin;
            $data["shanghuhao"] = $shanghuhao;
            $this->load->view('admin/wangmengyewu/qiyeshanghu/addqianyue', $data);
        }
    }

    public function chayouxiang() {
        $email = $this->security->xss_clean($this->input->post('email'));
        $sql = "select shanghuhao from wm_qiyeshanghu where email = ? limit 1";
        $query = $this->db->query($sql, array($email));
        $res = $query->row();
        if ($query->num_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function savekaihu() {
        $this->load->library('mysimpleencrypt');
        $this->load->library('encrypt');
        $this->load->helper('string');
        $admin_session = $this->session->userdata('admin');
        $email = $this->security->xss_clean($this->input->post('email'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $mingcheng = $this->security->xss_clean($this->input->post('mingcheng'));
        $shanghudianhua = $this->security->xss_clean($this->input->post('shanghudianhua'));
        $qingsuanfangshi = $this->security->xss_clean($this->input->post('qingsuanfangshi'));
        $qingsuanriqi = $this->security->xss_clean($this->input->post('qingsuanriqi'));
        $shoukuanpingtai = $this->security->xss_clean($this->input->post('shoukuanpingtai'));
        $huzhuming = $this->security->xss_clean($this->input->post('huzhuming'));
        $zhanghao = $this->security->xss_clean($this->input->post('zhanghao'));


        $this->db->trans_begin();
        $shanghuhao = rand(10000, 99999);
        $sql = 'select shanghuhao from wm_qiyeshanghu where shanghuhao = ?';
        $query = $this->db->query($sql, array($shanghuhao));
        if ($query->num_rows() > 0) {
            $shanghuhao = rand(10000, 99999);
        }
        $password = random_string('alnum', 6);
        $mima = $this->encrypt->encode($shanghuhao . $password);
        $obj = array(
            "shanghuhao" => $shanghuhao,
            "mima" => $mima,
            "email" => $email,
            "name" => $name,
            "mingcheng" => $mingcheng,
            "qingsuanfangshi" => $qingsuanfangshi,
            "qingsuanriqi" => $qingsuanriqi,
            "shanghudianhua" => $shanghudianhua,
            "shanghuleixing" => 0,
            "chuangjianshijian" => date("Y-m-d H:i:s"),
            'caozuoyuanid' => $admin_session['id']
        );
        $this->db->insert('wm_qiyeshanghu', $obj);
        $shanghao = array(
            "shanghuhao" => $shanghuhao,
            "huzhuming" => $huzhuming,
            "zhanghao" => $zhanghao,
            "shoukuanpingtai" => $shoukuanpingtai,
            "time" => date("Y-m-d H:i:s"),
            'caozuoyuanid' => $admin_session['id']
        );
        $this->db->insert('wm_shoukuanzhanghu', $shanghao);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect('admin/wangmengyewu/qiyeshanghu/kaihu');
        } else {
            $this->db->trans_commit();

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.bibi321.com';
            $config['smtp_user'] = 'postmaster@bibi321.com';
            $config['smtp_pass'] = 'Bibi321_CN';
            $config['smtp_port'] = '465';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['validate'] = 'TRUE';
            $config['dns'] = 'TRUE';
            $config['smtp_crypto'] = 'ssl';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $this->load->library('email');
            $this->email->initialize($config);

            //以下设置Email内容  
            $this->email->from('postmaster@bibi321.com', '比比旅行官网');
            $this->email->to($email);
            $this->email->subject('比比旅行开户成功');
            $this->email->message(
                    '<div style="font-size: 14px;">
                   尊敬的用户：<br/>
                   &nbsp&nbsp&nbsp&nbsp您好！<br/>
                   &nbsp&nbsp&nbsp&nbsp恭喜您在比比旅行平台成功开通账户！<br/>
                    <br/>

                    &nbsp&nbsp&nbsp&nbsp您的邮箱:' . $email . '<br/>
                    &nbsp&nbsp&nbsp&nbsp您的初始密码：<span style="color:#00ccff">' . $password . '</span>
                    <br/>
                     &nbsp&nbsp&nbsp&nbsp为了您账户的安全，请尽快登录【比比旅行】修改密码！
                    <br/><br/>
                     &nbsp&nbsp&nbsp&nbsp比比旅行：<a href="http://wm.bibi321.com">http://wm.bibi321.com</a>
                     <br/><br/>
                    (本邮件由系统发出，请不要回复!)
                </div>'
            );
            //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
            $this->email->send();

            $shanghuhao = $this->mysimpleencrypt->en($shanghuhao);
            redirect('admin/wangmengyewu/qiyeshanghu/qianyuechanpin/' . $shanghuhao);
        }
    }

    public function e(){
        $password  = 1;
        $email  = "1157810112@qq.com";
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.bibi321.com';
        $config['smtp_user'] = 'postmaster@bibi321.com';
        $config['smtp_pass'] = 'Bibi321_CN';
        $config['smtp_port'] = '465';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['validate'] = 'TRUE';
        $config['dns'] = 'TRUE';
        $config['smtp_crypto'] = 'ssl';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->load->library('email');
        $this->email->initialize($config);

        //以下设置Email内容  
        $this->email->from('postmaster@bibi321.com', '比比旅行官网');
        $this->email->to($email);
        $this->email->subject('比比旅行开户成功');
        $this->email->message(
                '<div style="font-size: 14px;">
               尊敬的用户：<br/>
               &nbsp&nbsp&nbsp&nbsp您好！<br/>
               &nbsp&nbsp&nbsp&nbsp恭喜您在比比旅行平台成功开通账户！<br/>
                <br/>

                &nbsp&nbsp&nbsp&nbsp您的邮箱:' . $email . '<br/>
                &nbsp&nbsp&nbsp&nbsp您的初始密码：<span style="color:#00ccff">' . $password . '</span>
                <br/>
                 &nbsp&nbsp&nbsp&nbsp为了您账户的安全，请尽快登录【比比旅行】修改密码！
                <br/><br/>
                 &nbsp&nbsp&nbsp&nbsp比比旅行：<a href="http://wm.bibi321.com">http://wm.bibi321.com</a>
                 <br/><br/>
                (本邮件由系统发出，请不要回复!)
            </div>'
        );
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
        $this->email->send();
    }

    public function qianyue() {
        $this->load->library('mysimpleencrypt');
        $admin_session = $this->session->userdata('admin');
        $data = array();
        $chanpinleixing = $this->security->xss_clean($this->input->post('chanpinleixing'));
        $shanghuhao = $this->security->xss_clean($this->input->post('shanghuhao'));
        $shanghuhao = $this->mysimpleencrypt->de($shanghuhao);
        if (count($chanpinleixing) > 0) {
            foreach ($chanpinleixing as $v) {
                $chanpinleixing = $this->security->xss_clean($this->input->post('chanpinleixing'));
                $jishu = $this->security->xss_clean($this->input->post('jishu_' . $v));
                $zhuangtai = $this->security->xss_clean($this->input->post('zhuangtai_' . $v));
                $qianyuefangshi = $this->security->xss_clean($this->input->post('qianyuefangshi_' . $v));

                $data[] = array(
                    'caozuoyuanid' => $admin_session['id'],
                    "chuangjianshijian" => date("Y-m-d H:i:s"),
                    "shanghuhao" => $shanghuhao,
                    "chanpinleixing" => $v,
                    "yongjinjishu" => empty($jishu) ? 0 : $jishu,
                    "zhuangtai" => $zhuangtai == "on" ? 1 : 0,
                    "qianyuefangshi" => $qianyuefangshi == "on" ? 1 : 0
                );
            }
            $this->db->insert_batch('wm_qianyuechanpin', $data);
        } 
        redirect('admin/wangmengyewu/qiyeshanghu/index','refresh');
    }

    public function changezhanghu() {
        $this->load->library('mysimpleencrypt');
        $admin_session = $this->session->userdata('admin');
        $shoukuanpingtai = $this->security->xss_clean($this->input->post('shoukuanpingtai'));
        $huzhuming = $this->security->xss_clean($this->input->post('huzhuming'));
        $zhanghao = $this->security->xss_clean($this->input->post('zhanghao'));
        $shanghuhao = $this->security->xss_clean($this->input->post('shanghuhao'));
        $shanghuhao = $this->mysimpleencrypt->de($shanghuhao);
        $this->db->update('wm_shoukuanzhanghu', array("shoukuanpingtai" => $shoukuanpingtai, "huzhuming" => $huzhuming, "zhanghao" => $zhanghao, 'time' => date("Y-m-d H:i:s"), "caozuoyuanid" => $admin_session['id']), array("shanghuhao" => $shanghuhao));
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

    public function m() {

        $this->load->library('encrypt');
        $shanghuhao = "16586";
        $mima = "12345678";
        echo $this->encrypt->encode($shanghuhao . $mima);
    }

}
