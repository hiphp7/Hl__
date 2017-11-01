<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class jiudiandingfang extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/jiudiandingfang/index', $data);
    }
    // 出票报表
    public function dingfang() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "SELECT m.affiliateConfirmationId AS dingdanhao,
                 m.dingdanlaiyuan AS dingdanlaiyuan,
                 m.caigouqudao AS caigoupingtai,
                 m.orderId AS orderId,
                 m.numberOfRooms AS fangjianshu,
                 m.daynum AS daynum,
                 m.fangfei AS fangfei,
                 m.fapiaopeisong AS fapiaopeisongfei,
                 m.totalCost AS dingdanzonge,
                 m.zhifufangshi AS zhifuqudao,
                 m.zhifushouxufei AS zhifushouxufei,
                 m.zhifushouxufeilv AS zhifushouxufeilv,
                 m.dingdanyouhui AS dingdanyouhui,
                 m.shijizhifuzonge AS shijizhifuzonge,
                 m.qunakoukuanjine AS caigouzonge,
                 m.kuaidichengben AS fapiaopeisongchengben,
                 m.dengluzhanghao AS dengluzhanghao,
                 m.zhifuzhanghao AS zhifuzhanghao,
                 m.pingtaishoukuanzhanghao AS shoukuanzhanghao,
                 m.xiadanshijian AS xiadanshijian,
                 m.fukuanshijian AS zhifushijian,
                 m.gendanren AS gendanren
                 FROM jiudian_chuangjiandingdan AS m WHERE dingdanzhuangtai=2 and tuikuanshijian IS NULL and";

        $ps = array();
        if ($leixing == 0) {
            $sql = $sql . ' xifanshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        } else {
            $sql = $sql . ' fukuanshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        }

        $lst = array();
        $kv = new stdClass();
        $kv->key = 'dingdanhao';
        $kv->value = '订单号';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'dingdanlaiyuan';
        $kv1->value = '订单来源';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'caigoupingtai';
        $kv2->value = '采购平台';
        $lst[] = $kv2;

        $kv3 = new stdClass();
        $kv3->key = 'orderId';
        $kv3->value = '采购平台上的订单号';
        $lst[] = $kv3;

        $kv4 = new stdClass();
        $kv4->key = 'fangjianshu';
        $kv4->value = '房间数';
        $lst[] = $kv4;
        $kv5 = new stdClass();
        $kv5->key = 'daynum';
        $kv5->value = '过夜数';
        $lst[] = $kv5;
        $kv6 = new stdClass();
        $kv6->key = 'fangfei';
        $kv6->value = '房费';
        $lst[] = $kv6;
        $kv7 = new stdClass();
        $kv7->key = 'fapiaopeisongfei';
        $kv7->value = '发票配送费';
        $lst[] = $kv7;
        $kv8 = new stdClass();
        $kv8->key = 'dingdanzonge';
        $kv8->value = '订单总额';
        $lst[] = $kv8;
        $kv9 = new stdClass();
        $kv9->key = 'zhifuqudao';
        $kv9->value = '支付渠道';
        $lst[] = $kv9;
        $kv10 = new stdClass();
        $kv10->key = 'zhifushouxufeilv';
        $kv10->value = '支付手续费率';
        $lst[] = $kv10;
        $kv11 = new stdClass();
        $kv11->key = 'chengrenshuliang';
        $kv11->value = '支付手续费';
        $lst[] = $kv11;

        $kv12 = new stdClass();
        $kv12->key = 'dingdanyouhui';
        $kv12->value = '订单优惠';
        $lst[] = $kv12;
        $kv13 = new stdClass();
        $kv13->key = 'ertonshuliang';
        $kv13->value = '实际收款总额';
        $lst[] = $kv13;
        $kv14 = new stdClass();
        $kv14->key = 'caigouzonge';
        $kv14->value = '采购总额';
        $lst[] = $kv14;
        $kv15 = new stdClass();
        $kv15->key = 'fapiaopeisongchengben';
        $kv15->value = '发票配送成本';
        $lst[] = $kv15;
        $kv16 = new stdClass();
        $kv16->key = 'dengluzhanghao';
        $kv16->value = '对方登陆账号';
        $lst[] = $kv16;
        $kv17 = new stdClass();
        $kv17->key = 'zhifuzhanghao';
        $kv17->value = '对方支付账号';
        $lst[] = $kv17;
        $kv18 = new stdClass();
        $kv18->key = 'shoukuanzhanghao';
        $kv18->value = '平台收款账号';
        $lst[] = $kv18;
        $kv19 = new stdClass();
        $kv19->key = 'xiadanshijian';
        $kv19->value = '创建时间';
        $lst[] = $kv19;
        $kv20 = new stdClass();
        $kv20->key = 'zhifushijian';
        $kv20->value = '支付时间';
        $lst[] = $kv20;
        $kv21 = new stdClass();
        $kv21->key = 'zhifuqudao';
        $kv21->value = '支付渠道';
        $lst[] = $kv21;
        $kv22 = new stdClass();
        $kv22->key = 'gendanren';
        $kv22->value = '跟单人';
        $lst[] = $kv22;
        
        $name = $datetimeStart.'-'.$datetimeEnd.'-酒店对账报表（订房）-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
