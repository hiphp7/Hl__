<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class jiudianjudan extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/jiudianjudan/index', $data);
    }
    // 拒单报表
    public function judan() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "SELECT m.affiliateConfirmationId AS affiliateConfirmationId,
            m.dingdanlaiyuan AS dingdanlaiyuan,
            m.dingdanlaiyuan AS dingdanlaiyuan,
            m.caigouqudao AS caigouqudao,
            m.numberOfRooms AS numberOfRooms,
            m.daynum as daynum,
            m.fangfei AS fangfei,
            m.fapiaopeisongfei as fapiaopeisongfei,
            m.totalCost AS totalCost,
            m.zhifufangshi AS zhifufangshi,
            m.zhifushouxufeilv AS zhifushouxufeilv,
            m.zhifushouxufei AS zhifushouxufei,
            m.dingdanyouhui as dingdanyouhui,
            m.shijizhifuzonge AS shijizhifuzonge,
            m.tuikuanzonge AS tuikuanzonge,
            
            m.dengluzhanghao as dengluzhanghao,
            m.zhifuzhanghao AS zhifuzhanghao,
            m.pingtaishoukuanzhanghao AS pingtaishoukuanzhanghao,
            m.xiadanshijian AS xiadanshijian,
            m.fukuanshijian as fukuanshijian,
            m.tuikuanshijian AS tuikuanshijian,
            m.gendanren AS gendanren FROM jiudian_chuangjiandingdan AS m WHERE dingdanzhuangtai = 2 and tuikuanzonge IS NOT NULL and tuikuanshijian IS NOT NULL and ";

        $ps = array();
        if ($leixing == 0) {
            $sql = $sql . ' xiadanshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        } else {
            $sql = $sql . ' fukuanshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        }

        $lst = array();
        $kv = new stdClass();
        $kv->key = 'affiliateConfirmationId';
        $kv->value = '订单号';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'dingdanlaiyuan';
        $kv1->value = '订单来源';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'caigouqudao';
        $kv2->value = '采购平台';
        $lst[] = $kv2;

        $kv3 = new stdClass();
        $kv3->key = 'numberOfRooms';
        $kv3->value = '房间数';
        $lst[] = $kv3;

        $kv4 = new stdClass();
        $kv4->key = 'daynum';
        $kv4->value = '过夜数';
        $lst[] = $kv4;
        
        $kv5 = new stdClass();
        $kv5->key = 'fangfei';
        $kv5->value = '房费';
        $lst[] = $kv5;
        
        $kv6 = new stdClass();
        $kv6->key = 'fapiaopeisongfei';
        $kv6->value = '发票配送费';
        $lst[] = $kv6;
        
        $kv7 = new stdClass();
        $kv7->key = 'totalCost';
        $kv7->value = '订单总额';
        $lst[] = $kv7;
        
        $kv8 = new stdClass();
        $kv8->key = 'zhifufangshi';
        $kv8->value = '支付渠道';
        $lst[] = $kv8;
        
        $kv9 = new stdClass();
        $kv9->key = 'zhifushouxufeilv';
        $kv9->value = '支付手续费率';
        $lst[] = $kv9;
        
        $kv10 = new stdClass();
        $kv10->key = 'zhifushouxufei';
        $kv10->value = '支付手续费';
        $lst[] = $kv10;
        
        $kv11 = new stdClass();
        $kv11->key = 'dingdanyouhui';
        $kv11->value = '订单优惠';
        $lst[] = $kv11;

        $kv12 = new stdClass();
        $kv12->key = 'shijizhifuzonge';
        $kv12->value = '实际收款总额';
        $lst[] = $kv12;
        
        $kv13 = new stdClass();
        $kv13->key = 'tuikuanzonge';
        $kv13->value = '实际退款总额';
        $lst[] = $kv13;
        
        $kv14 = new stdClass();
        $kv14->key = 'dengluzhanghao';
        $kv14->value = '对方登录账号';
        $lst[] = $kv14;
        
        $kv15 = new stdClass();
        $kv15->key = 'zhifuzhanghao';
        $kv15->value = '对方支付账户';
        $lst[] = $kv15;
        
        $kv16 = new stdClass();
        $kv16->key = 'pingtaishoukuanzhanghao';
        $kv16->value = '平台收款账户';
        $lst[] = $kv16;
        
        $kv17 = new stdClass();
        $kv17->key = 'xiadanshijian';
        $kv17->value = '创建时间';
        $lst[] = $kv17;
        
        $kv18 = new stdClass();
        $kv18->key = 'fukuanshijian';
        $kv18->value = '支付时间';
        $lst[] = $kv18;
        
        $kv19 = new stdClass();
        $kv19->key = 'tuikuanshijian';
        $kv19->value = '退款时间';
        $lst[] = $kv19;
        
        $kv20 = new stdClass();
        $kv20->key = 'gendanren';
        $kv20->value = '跟单人';
        $lst[] = $kv20;

        $name = $datetimeStart.'-'.$datetimeEnd.'-酒店拒单对账表-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
