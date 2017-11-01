<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class xiangqing extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
            );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/xiangqing/index', $data);
    }
    // 出票报表
    public function xiangqingbaoxiao() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "select m.id as id,
        m.orderid as orderid,
        m.dingdanhao as dingdanhao,
        m.piaohao as piaohao,
        m.hangchengid as hangchengid,
        m.kepiaozhuangtai as kepiaozhuangtai,
        m.hangchenglvkeid as hangchenglvkeid,
        m.caigouqudao as caigouqudao,
        m.yidipingtai as yidipingtai,
        m.yididingdanhao as yididingdanhao,
        m.chupiaobianma as chupiaobianma,
        m.hangsi as hangsi,
        m.hangchengleixing as hangchengleixing,
        m.hangbanhao as hangbanhao,
        m.cangwei as cangwei,
        m.chufachengshi as chufachengshi,
        m.daodachengshi as daodachengshi,
        m.qifeijichang as qifeijichang,
        m.daodajichang as daodajichang,
        m.qifeishijian as qifeishijian,
        m.chengkeleixing as chengkeleixing,
        m.xingming as xingming,
        m.zhengjianleixing as zhengjianleixing,
        m.zhengjianhaoma as zhengjianhaoma,
        m.chushengriqi as chushengriqi,
        m.goumaijia as goumaijia,
        m.chupiaoshijian as chupiaoshijian,
        m.tuipiaoshijian as tuipiaoshijian,
        m.tuikuanpicihao as tuikuanpicihao from caiwu_fj_xiangqing as m where ";

        $ps = array();
        if ($leixing == 0) {
            $sql = $sql . ' chupiaoshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        } else {
            $sql = $sql . ' tuipiaoshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        }

        $kv = new stdClass();
        $kv->key = 'orderid';
        $kv->value = '订单ID';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'dingdanhao';
        $kv1->value = '出票订单号';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'piaohao';
        $kv2->value = '票号';
        $lst[] = $kv2;
        
        $kv3 = new stdClass();
        $kv3->key = 'hangchengid';
        $kv3->value = '航程ID';
        $lst[] = $kv3;
        
        $kv4 = new stdClass();
        $kv4->key = 'kepiaozhuangtai';
        $kv4->value = '客票状态';
        $lst[] = $kv4;
        
        $kv5 = new stdClass();
        $kv5->key = 'hangchenglvkeid';
        $kv5->value = '航程旅客ID';
        $lst[] = $kv5;
        
        $kv6 = new stdClass();
        $kv6->key = 'caigouqudao';
        $kv6->value = '采购渠道';
        $lst[] = $kv6;
        
        $kv7 = new stdClass();
        $kv7->key = 'yidipingtai';
        $kv7->value = '异地出票平台';
        $lst[] = $kv7;
        
        $kv8 = new stdClass();
        $kv8->key = 'yididingdanhao';
        $kv8->value = '异地订单号';
        $lst[] = $kv8;
        
        $kv9 = new stdClass();
        $kv9->key = 'chupiaobianma';
        $kv9->value = '出票编码';
        $lst[] = $kv9;
        
        $kv10 = new stdClass();
        $kv10->key = 'hangsi';
        $kv10->value = '航司';
        $lst[] = $kv10;
        
        $kv11 = new stdClass();
        $kv11->key = 'hangchengleixing';
        $kv11->value = '航程类型';
        $lst[] = $kv11;
        
        $kv12 = new stdClass();
        $kv12->key = 'hangbanhao';
        $kv12->value = '航班号';
        $lst[] = $kv12;
        
        $kv13 = new stdClass();
        $kv13->key = 'cangwei';
        $kv13->value = '舱位';
        $lst[] = $kv13;
        
        $kv14 = new stdClass();
        $kv14->key = 'chufachengshi';
        $kv14->value = '出发城市';
        $lst[] = $kv14;
        
        $kv15 = new stdClass();
        $kv15->key = 'daodachengshi';
        $kv15->value = '到达城市';
        $lst[] = $kv15;
        
        $kv16 = new stdClass();
        $kv16->key = 'qifeijichang';
        $kv16->value = '起飞机场';
        $lst[] = $kv16;
        
        $kv17 = new stdClass();
        $kv17->key = 'daodajichang';
        $kv17->value = '到达机场';
        $lst[] = $kv17;
        
        $kv18 = new stdClass();
        $kv18->key = 'qifeishijian';
        $kv18->value = '起飞时间';
        $lst[] = $kv18;
        
        $kv19 = new stdClass();
        $kv19->key = 'chengkeleixing';
        $kv19->value = '常客类型';
        $lst[] = $kv19;
        
        $kv20 = new stdClass();
        $kv20->key = 'xingming';
        $kv20->value = '姓名';
        $lst[] = $kv20;
        
        $kv21 = new stdClass();
        $kv21->key = 'zhengjianleixing';
        $kv21->value = '证件类型';
        $lst[] = $kv21;
        
        $kv22 = new stdClass();
        $kv22->key = 'zhengjianhaoma';
        $kv22->value = '证件号码';
        $lst[] = $kv22;
        
        $kv23 = new stdClass();
        $kv23->key = 'chushengriqi';
        $kv23->value = '出生日期';
        $lst[] = $kv23;
        
        $kv24 = new stdClass();
        $kv24->key = 'goumaijia';
        $kv24->value = '购买价';
        $lst[] = $kv24;
        
        $kv25 = new stdClass();
        $kv25->key = 'chupiaoshijian';
        $kv25->value = '出票时间';
        $lst[] = $kv25;
        
        $kv26 = new stdClass();
        $kv26->key = 'tuipiaoshijian';
        $kv26->value = '退票时间';
        $lst[] = $kv26;
        
        $kv27 = new stdClass();
        $kv27->key = 'tuikuanpicihao';
        $kv27->value = '退款批次号';
        $lst[] = $kv27;

        $name = $datetimeStart.'-'.$datetimeEnd.'-详情对账表-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
