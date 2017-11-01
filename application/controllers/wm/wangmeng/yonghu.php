<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * 网盟用户
 */
class yonghu extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // 生成列表显示的列
        $std2 = new stdClass();
        $std2->index = 0;
        $std2->display_name = '用户名';
        $std2->name = 'zhanghu';
        $std2->show = true;
        $li[0] = $std2;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '注册时间';
        $std2->name = 'zhuceriqi';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '手机号码';
        $std3->name = 'shoujihaoma';
        $std3->show = true;
        $li[2] = $std3;

        $std3 = new stdClass();
        $std3->index = 3;
        $std3->display_name = '邮箱地址';
        $std3->name = 'youxiang';
        $std3->show = true;
        $li[3] = $std3;

        $std3 = new stdClass();
        $std3->index = 4;
        $std3->display_name = '真实姓名';
        $std3->name = 'xingming';
        $std3->show = true;
        $li[4] = $std3;

        $this->li = $li;
    }

    /**
     * 生成连接地址
     */
    public function index() {
        $data['li'] = $this->li;

        $this->load->view('wm/wangmeng/yonghu/index', $data);
    }

    /**
     * 显示全部连接地址
     */
    public function all() {

        $wm_admin = $this->session->userdata('wm_admin');
        $this->load->library('mysimpleencrypt');


        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        // $sortid = $_POST['order'][0]['column'];
        // $dir = $_POST['order'][0]['dir'];
        // 结束时间
        $datetimeEnd = $this->input->post('datetimeEnd');
        // 开始时间
        $datetimeStart = $this->input->post('datetimeStart');
        $cishu = $this->input->post('cishu');
        if ($cishu == 0) {
            $result = new stdClass();
            $result->myData = array();
            $result->iTotalDisplayRecords = 0;
            $result->iTotalRecords = 0;
            echo json_encode($result);
            exit;
        }

        $mysort = 'id';
        $mydir = 'desc';
        // if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
        //     $mysort = $this->li[$sortid]->name;
        //     $mydir = $dir;
        // }
        // $mysort = 'id';
        // $mydir = 'desc';

        $sql = 'SELECT m.id as id,m.xingming as xingming,m.zhuceriqi as zhuceriqi,m.shoujihaoma as shoujihaoma,m.youxiang as youxiang,m.zhanghu AS zhanghu FROM yonghu as m  ';

        $sqlcount = 'select count(m.id) as id from yonghu as m ';

        $ps = array();

        $sql = $sql . 'where m.shanghuhao = ? ';
        $sqlcount = $sqlcount . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];


        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sql = $sql . 'and  m.zhuceriqi >= ?  and  m.zhuceriqi <= ?';
            $sqlcount = $sqlcount . 'and  m.zhuceriqi >= ?  and  m.zhuceriqi <= ?';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
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
                $r->shoujihaoma = $this->dianhuayanma($r->shoujihaoma);
                $r->youxiang = $this->emailyanma($r->youxiang);
                $r->xingming = $this->xingmingyanma($r->xingming);
                $mydata[] = $r;
            }
        }
        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;
        echo json_encode($result);
    }

    public function info() {
        $datetimeEnd = $this->input->post('datetimeEnd');
        $datetimeStart = $this->input->post('datetimeStart');
        $wm_admin = $this->session->userdata('wm_admin');
        $sqlcount = 'select count(m.id) as renshu from yonghu as m ';

        $ps = array();

        $sqlcount = $sqlcount . 'where m.shanghuhao = ? ';
        $ps[] = $wm_admin['shanghuhao'];

        // 开始时间--结束时间
        if (!empty($datetimeStart) && $datetimeStart != '' && !empty($datetimeEnd) && $datetimeEnd != '') {
            $sqlcount = $sqlcount . 'and  m.zhuceriqi >= ?  and  m.zhuceriqi <= ?';
            $ps[] = $datetimeStart . " 0:0:0";
            $ps[] = $datetimeEnd . " 23:59:59";
        }
        $res_count = $this->db->query($sqlcount, $ps);
        $res = $res_count->row();
        echo json_encode($res);
    }

    /**
     * 
     * @param type $num 电话
     * @param type $star_num 掩码位数
     * @return string 字符串
     */
    function dianhuayanma($num, $star_num = 4) {
        if (empty($num)) {
            return $num;
        }
        $star_num = $star_num >= strlen($num) ? strlen($num) - 2 : (int) $star_num;
        if ($star_num % 2 == 0) {
            $star_left = $star_right = $star_num / 2;
        } else {
            $star_left = floor($star_num / 2);
            $star_right = $star_num - $star_left;
        }
        $len = strlen($num);
        $left = floor($len / 2) - $star_left;
        $right = round($len / 2) - $star_right;
        $middle = $len - $left - $right;
        $result = substr($num, 0, $left) . str_repeat("*", $middle) . substr($num, $left + $middle, $right);
        return $result;
    }

    /**
     * 
     * @param type $name 中文姓名
     * @return type 带掩码的姓名 姓带掩码
     */
    function xingmingyanma($name) {
        //        $name = "阿沛·阿旺晋美";
        //        $name = "高晓凯";
        if (empty($name)) {
            return $name;
        }
        $count = 1;
        $tr = "/^[\x{4E00}-\x{9FA5}]{2,5}$/u";
        $a = preg_match($tr, $name, $b);
        if ($a) {
            $le = mb_substr($name, 0, 1);
            $len = iconv_strlen($le, "UTF-8");
            $yanma = "";
            $i = 0;
            while ($i < $len) {
                $yanma .= "*";
                $i +=1;
            }
            return str_replace($le, $yanma, $name, $count);
        }
        //      $tr = "/[\x{4E00}-\x{9FA5}]{2,5}(+:·[\x{4E00}-\x{9FA5}]{2,5})*/u";  // 张三 与 阿沛·阿旺晋美
        //      $hou= "/·[\x{4E00}-\x{9FA5}]{2,5}]$/u";
        $qian = "/[\x{4E00}-\x{9FA5}]{2,5}·*/u";
        $a = preg_match($qian, $name, $b);
        if ($a) {
            $strqian = $b[0];
            $len = iconv_strlen($strqian, "UTF-8");
            $yanma = "";
            $i = 0;
            while ($i < $len - 1) {
                $yanma .= "*";
                $i +=1;
            }
            $yanma .=".";
            return str_replace($strqian, $yanma, $name, $count);
        }
        return $name;
    }

    /**
     * 
     * @param string $mail 邮箱
     * @return type 邮箱加掩码
     */
    function emailyanma($mail) {
        if (empty($mail)) {
            return $mail;
        }
        $l = strrpos($mail, "@");
        $str = substr($mail, 0, $l);
        $length = strlen($str);
        $count = 1;
        if ($length <= 4) {
            $le = substr($str, 1);
            $len = strlen($le);
            $yanma = "";
            $i = 0;
            while ($i < $len) {
                $yanma .= "*";
                $i +=1;
            }
            return str_replace($le, $yanma, $str, $count);
        } else {
            $le = substr($str, 1, 5);
            return str_replace($le, "*****", $str, $count);
        }
    }

}

