<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class judan extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
            );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/judan/index', $data);
    }
    // 出票报表
    public function judanbaobiao() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "select m.id as id,
        m.orderid as orderid,
        m.dingdanhao as dingdanhao,
        m.dingdanzhuangtai as dingdanzhuangtai,
        m.dingdanlaiyuan as dingdanlaiyuan,
        m.caigouqudao as caigouqudao,
        m.yidipingtai as yidipingtai,
        m.yididingdanhao as yididingdanhao,
        m.chupiaobianma as chupiaobianma,
        m.hangchengleixing as hangchengleixing,
        m.hangbanhao as hangbanhao,
        m.chufachengshi as chufachengshi,
        m.daodachengshi as daodachengshi,
        m.qifeijichang as qifeijichang,
        m.chengrencangwei as chengrencangwei,
        m.ertongcangwei as ertongcangwei,
        m.chengrenshuliang as chengrenshuliang,
        m.ertonshuliang as ertonshuliang,
        m.changrenjia as changrenjia,
        m.ertongjia as ertongjia,
        m.jipiaozongjia as jipiaozongjia,
        m.baoxianshu as baoxianshu,
        m.baoxiandanjia as baoxiandanjia,
        m.baoxianzongjia as baoxianzongjia,
        m.baoxiaozongjia as baoxiaozongjia,
        m.youhu as youhu,
        m.zhifuzongjia as zhifuzongjia,
        m.zhifuqudao as zhifuqudao,
        m.zhifufeilv as zhifufeilv,
        m.zhifushouxufei as zhifushouxufei,
        m.shijishoukuan as shijishoukuan,
        m.dingdancaigouzonge as dingdancaigouzonge,
        m.duifangzhanghu as duifangzhanghu,
        m.pingtaizhanghu as pingtaizhanghu,
        m.lianxiren as lianxiren,
        m.lianxirendianhua as lianxirendianhua,
        m.gendanrenxingming as gendanrenxingming,
        m.chuangjianshijian as chuangjianshijian,
        m.zhifushijian as zhifushijian,
        m.chupiaoshijian as chupiaoshijian,
        m.qifeidaodashijian as qifeidaodashijian,
        m.tuikuanshijian as tuikuanshijian from caiwu_fj_judan as m where ";

        $ps = array();
        if ($leixing == 0) {
            $sql = $sql . ' chuangjianshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        } else {
            $sql = $sql . ' zhifushijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        }

         $kv = new stdClass();
        $kv->key = 'orderid';
        $kv->value = '订单ID';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'dingdanhao';
        $kv1->value = '订单号';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'dingdanzhuangtai';
        $kv2->value = '订单状态';
        $lst[] = $kv2;
        
        $kv3 = new stdClass();
        $kv3->key = 'dingdanlaiyuan';
        $kv3->value = '订单来源';
        $lst[] = $kv3;
        
        $kv4 = new stdClass();
        $kv4->key = 'caigouqudao';
        $kv4->value = '采购渠道';
        $lst[] = $kv4;
        
        $kv5 = new stdClass();
        $kv5->key = 'yidipingtai';
        $kv5->value = '异地出票平台';
        $lst[] = $kv5;
        
        $kv6 = new stdClass();
        $kv6->key = 'yididingdanhao';
        $kv6->value = '异地订单号';
        $lst[] = $kv6;
        
        $kv7 = new stdClass();
        $kv7->key = 'chupiaobianma';
        $kv7->value = '出票编码';
        $lst[] = $kv7;
        
        $kv8 = new stdClass();
        $kv8->key = 'hangchengleixing';
        $kv8->value = '航程类型';
        $lst[] = $kv8;
        
        $kv9 = new stdClass();
        $kv9->key = 'hangbanhao';
        $kv9->value = '航班号';
        $lst[] = $kv9;
        
        $kv10 = new stdClass();
        $kv10->key = 'chufachengshi';
        $kv10->value = '出发城市';
        $lst[] = $kv10;
        
        $kv11 = new stdClass();
        $kv11->key = 'daodachengshi';
        $kv11->value = '到达城市';
        $lst[] = $kv11;
        
        $kv12 = new stdClass();
        $kv12->key = 'qifeijichang';
        $kv12->value = '起飞机场';
        $lst[] = $kv12;
        
        $kv13 = new stdClass();
        $kv13->key = 'chengrencangwei';
        $kv13->value = '成人舱位';
        $lst[] = $kv13;
        
        $kv14 = new stdClass();
        $kv14->key = 'ertongcangwei';
        $kv14->value = '儿童舱位';
        $lst[] = $kv14;
        
        $kv15 = new stdClass();
        $kv15->key = 'chengrenshuliang';
        $kv15->value = '成人数量';
        $lst[] = $kv15;
        
        $kv16 = new stdClass();
        $kv16->key = 'ertonshuliang';
        $kv16->value = '儿童数量';
        $lst[] = $kv16;
        
        $kv17 = new stdClass();
        $kv17->key = 'changrenjia';
        $kv17->value = '成人单张购买价';
        $lst[] = $kv17;
        
        $kv18 = new stdClass();
        $kv18->key = 'ertongjia';
        $kv18->value = '儿童单张购买价';
        $lst[] = $kv18;
        
        $kv19 = new stdClass();
        $kv19->key = 'jipiaozongjia';
        $kv19->value = '机票订单总价';
        $lst[] = $kv19;
        
        $kv20 = new stdClass();
        $kv20->key = 'baoxianshu';
        $kv20->value = '航意险数';
        $lst[] = $kv20;
        
        $kv21 = new stdClass();
        $kv21->key = 'baoxiandanjia';
        $kv21->value = '保险订单单价';
        $lst[] = $kv21;
        
        $kv22 = new stdClass();
        $kv22->key = 'baoxianzongjia';
        $kv22->value = '保险总价';
        $lst[] = $kv22;
        
        $kv23 = new stdClass();
        $kv23->key = 'baoxiaozongjia';
        $kv23->value = '报销订单总价';
        $lst[] = $kv23;
        
        $kv24 = new stdClass();
        $kv24->key = 'youhu';
        $kv24->value = '订单优惠';
        $lst[] = $kv24;
        
        $kv25 = new stdClass();
        $kv25->key = 'zhifuzongjia';
        $kv25->value = '订单支付总价';
        $lst[] = $kv25;
        
        $kv26 = new stdClass();
        $kv26->key = 'zhifuqudao';
        $kv26->value = '支付渠道';
        $lst[] = $kv26;
        
        $kv27 = new stdClass();
        $kv27->key = 'zhifufeilv';
        $kv27->value = '支付手续费率';
        $lst[] = $kv27;
        
        $kv28 = new stdClass();
        $kv28->key = 'zhifushouxufei';
        $kv28->value = '支付手续费';
        $lst[] = $kv28;
        
        $kv29 = new stdClass();
        $kv29->key = 'shijishoukuan';
        $kv29->value = '实际收款总额';
        $lst[] = $kv29;
        
        $kv30 = new stdClass();
        $kv30->key = 'dingdancaigouzonge';
        $kv30->value = '订单采购金额';
        $lst[] = $kv30;
        
        $kv31 = new stdClass();
        $kv31->key = 'duifangzhanghu';
        $kv31->value = '对方账户';
        $lst[] = $kv31;
        
        $kv32 = new stdClass();
        $kv32->key = 'pingtaizhanghu';
        $kv32->value = '平台账户';
        $lst[] = $kv32;
        
        $kv33 = new stdClass();
        $kv33->key = 'lianxiren';
        $kv33->value = '订单联系人';
        $lst[] = $kv33;
        
        $kv34 = new stdClass();
        $kv34->key = 'lianxirendianhua';
        $kv34->value = '订单联系方式';
        $lst[] = $kv34;
        
        $kv35 = new stdClass();
        $kv35->key = 'gendanrenxingming';
        $kv35->value = '跟单人姓名';
        $lst[] = $kv35;
        
        $kv36 = new stdClass();
        $kv36->key = 'chuangjianshijian';
        $kv36->value = '创建时间';
        $lst[] = $kv36;
        
        $kv37 = new stdClass();
        $kv37->key = 'zhifushijian';
        $kv37->value = '支付时间';
        $lst[] = $kv37;
        
        $kv38 = new stdClass();
        $kv38->key = 'chupiaoshijian';
        $kv38->value = '出票时间';
        $lst[] = $kv38;
        
        $kv39 = new stdClass();
        $kv39->key = 'qifeidaodashijian';
        $kv39->value = '起飞到达时间';
        $lst[] = $kv39;

        $name = $datetimeStart.'-'.$datetimeEnd.'-拒单对账表-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
