<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class db extends CI_Controller {

    public function index() {
        $sql = 'select m.id as id,m.liansaihao as liansaihao,m.liansaihao as liansaihao from mqiudui_ch as m where m.liansaihao = ?';
        $res = $this->db->query($sql, array(1));
        $rows = $res->result();
        var_dump($rows);
        echo count($rows);
    }

    public function t2() {
        $sql = 'select * from myusers as m where m.name like ?';
        $res = $this->db->query($sql, array('吴大%'));
        $rows = $res->result();
        //var_dump($rows);
        echo json_encode($rows);
    }

    public function update() {
        // 出票编码
        $chupiaobianma = $this->input->post('chupiaobianma');
        // 订单编号
        $dingdanhao = $this->input->post('dingdanhao');
        // 乘客姓名
        $zhongwenming = $this->input->post('zhongwenming');

        $obj = array();
        if (!empty($chupiaobianma) && $chupiaobianma != '') {
            $obj['chupiaobianma;'] = $chupiaobianma;
        }

        if (!empty($dingdanhao) && $dingdanhao != '') {
            $obj['dingdanhao;'] = $dingdanhao;
        }

        if (!empty($zhongwenming) && $zhongwenming != '') {
            $obj['zhongwenming;'] = $zhongwenming;
        }

        $bool = $this->db->update('yonghu', $obj, array('id' => $this->input->post('shojihaoma')));

        echo $bool;
    }

    public function t1() {
        $this->load->view('welcome_message');
    }

    public function mypost() {
        echo $_SERVER['REQUEST_METHOD'];
        echo "<br/>";

        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') == 0) {
            echo '可以了';
        }
    }

    public function hasexist() {
        $shoujihaoma = $this->input->post('shoujihaoma');
        $res = $this->db->query('select count(m.id) as id from yonghu as m where m.shoujihaoma = ?', array($shoujihaoma));
        $row = $res->first_row();
        if (!empty($row) && intval($row->id) > 0) {
            echo '存在';
        } else {
            echo '不存在';
        }
    }

    public function hasexist1($shoujihaoma = '') {
        //$shoujihaoma = $this->input->post('shoujihaoma');
        if ($shoujihaoma != '') {
            $res = $this->db->query('select count(m.id) as id from yonghu as m where m.shoujihaoma = ?', array($shoujihaoma));
            $row = $res->first_row();
            if (!empty($row) && intval($row->id) > 0) {
                return true;
            }
        }
        return false;
    }

    public function time() {
        echo time();
    }

}
