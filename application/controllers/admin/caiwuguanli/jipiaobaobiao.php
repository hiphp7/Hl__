<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class jipiaobaobiao extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/jipiaobaobiao/index', $data);
    }
    // 出票报表
    public function zhuchupiao() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "SELECT m.orderid AS orderid,m.dingdanhao AS dingdanhao,m.baoxiandanjia AS baoxiandanjia,m.baoxianzongjia AS baoxianzongjia,m.dingdanlaiyuan AS dingdanlaiyuan,m.caigouqudao AS caigouqudao, m.yidipingtai AS yidipingtai,m.yididingdanhao as yididingdanhao,m.chupiaobianma AS chupiaobianma,m.hangchengleixing as hangchengleixing, m.hangbanhao AS hangbanhao, m.chufachengshi AS chufachengshi, m.daodachengshi AS daodachengshi,m.qifeijichang AS qifeijichang, m.chengrencangwei as chengrencangwei, m.ertongcangwei AS ertongcangwei,m.chengrenshuliang as chengrenshuliang,m.ertonshuliang AS ertonshuliang, m.changrenjia as changrenjia,m.ertongjia AS ertongjia, m.jipiaozongjia AS jipiaozongjia, m.baoxianshu AS baoxianshu,m.baoxiaozongjia AS baoxiaozongjia,m.youhu AS youhu,m.zhifuzongjia AS zhifuzongjia,m.zhifuqudao as zhifuqudao,m.zhifufeilv AS zhifufeilv,m.zhifushouxufei AS zhifushouxufei, m.shijishoukuan as shijishoukuan,m.dingdancaigouzonge AS dingdancaigouzonge,m.duifangzhanghu AS duifangzhanghu, m.duifangzhanghu AS duifangzhanghu ,m.pingtaizhanghu AS pingtaizhanghu,m.lianxiren as lianxiren,m.lianxirendianhua AS lianxirendianhua, m.gendanrenxingming AS gendanrenxingming,m.chuangjianshijian AS chuangjianshijian,m.zhifushijian as zhifushijian ,m.chupiaoshijian as chupiaoshijian, m.qifeidaodashijian AS qifeidaodashijian FROM caiwu_fj_chupiao AS m WHERE ";


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
        $kv2->key = 'caigouqudao';
        $kv2->value = '采购渠道';
        $lst[] = $kv2;

        $kv3 = new stdClass();
        $kv3->key = 'yidipingtai';
        $kv3->value = '异地出票平台';
        $lst[] = $kv3;

        $kv4 = new stdClass();
        $kv4->key = 'hangchengleixing';
        $kv4->value = '航程类型';
        $lst[] = $kv4;
        $kv5 = new stdClass();
        $kv5->key = 'hangbanhao';
        $kv5->value = '航班号';
        $lst[] = $kv5;
        $kv6 = new stdClass();
        $kv6->key = 'chufachengshi';
        $kv6->value = '出发城市';
        $lst[] = $kv6;
        $kv7 = new stdClass();
        $kv7->key = 'daodachengshi';
        $kv7->value = '到达城市';
        $lst[] = $kv7;
        $kv8 = new stdClass();
        $kv8->key = 'qifeijichang';
        $kv8->value = '起飞机场';
        $lst[] = $kv8;
        $kv9 = new stdClass();
        $kv9->key = 'qifeijichang';
        $kv9->value = '成人舱位';
        $lst[] = $kv9;
        $kv10 = new stdClass();
        $kv10->key = 'ertongcangwei';
        $kv10->value = '儿童舱位';
        $lst[] = $kv10;
        $kv11 = new stdClass();
        $kv11->key = 'chengrenshuliang';
        $kv11->value = '成人数量';
        $lst[] = $kv11;

        $kv12 = new stdClass();
        $kv12->key = 'daodachengshi';
        $kv12->value = '到达城市';
        $lst[] = $kv12;
        $kv13 = new stdClass();
        $kv13->key = 'ertonshuliang';
        $kv13->value = '儿童数量';
        $lst[] = $kv13;
        $kv14 = new stdClass();
        $kv14->key = 'ertongjia';
        $kv14->value = '成人单张购买价';
        $lst[] = $kv14;
        $kv15 = new stdClass();
        $kv15->key = 'jipiaozongjia';
        $kv15->value = '儿童单张购买价';
        $lst[] = $kv15;
        $kv16 = new stdClass();
        $kv16->key = 'baoxianshu';
        $kv16->value = '航意险数';
        $lst[] = $kv16;
        $kv17 = new stdClass();
        $kv17->key = 'baoxiandanjia';
        $kv17->value = '保险单价';
        $lst[] = $kv17;
        $kv18 = new stdClass();
        $kv18->key = 'baoxianzongjia';
        $kv18->value = '保险总价';
        $lst[] = $kv18;
        $kv19 = new stdClass();
        $kv19->key = 'baoxiaozongjia';
        $kv19->value = '报销订单总价';
        $lst[] = $kv19;
        $kv20 = new stdClass();
        $kv20->key = 'youhu';
        $kv20->value = '订单优惠';
        $lst[] = $kv20;
        $kv21 = new stdClass();
        $kv21->key = 'zhifuzongjia';
        $kv21->value = '订单支付总价';
        $lst[] = $kv21;
        $kv22 = new stdClass();
        $kv22->key = 'zhifuqudao';
        $kv22->value = '支付渠道';
        $lst[] = $kv22;
        $kv23 = new stdClass();
        $kv23->key = 'zhifufeilv';
        $kv23->value = '支付手续费率';
        $lst[] = $kv23;
        $kv24 = new stdClass();
        $kv24->key = 'zhifushouxufei';
        $kv24->value = '支付手续费';
        $lst[] = $kv24;
        $kv25 = new stdClass();
        $kv25->key = 'youhu';
        $kv25->value = '订单优惠';
        $lst[] = $kv25;
        $kv26 = new stdClass();
        $kv26->key = 'shijishoukuan';
        $kv26->value = '实际收款总额';
        $lst[] = $kv26;
        $kv27 = new stdClass();
        $kv27->key = 'dingdancaigouzonge';
        $kv27->value = '订单采购金额';
        $lst[] = $kv27;
        $kv28 = new stdClass();
        $kv28->key = 'pingtaizhanghu';
        $kv28->value = '平台账户';
        $lst[] = $kv28;
        $kv29 = new stdClass();
        $kv29->key = 'lianxiren';
        $kv29->value = '订单联系人';
        $lst[] = $kv29;
        $kv30 = new stdClass();
        $kv30->key = 'lianxirendianhua';
        $kv30->value = '订单联系方式';
        $lst[] = $kv30;
        $kv31 = new stdClass();
        $kv31->key = 'gendanrenxingming';
        $kv31->value = '跟单人姓名';
        $lst[] = $kv31;
        $kv32 = new stdClass();
        $kv32->key = 'chuangjianshijian';
        $kv32->value = '创建时间';
        $lst[] = $kv32;
        $kv33 = new stdClass();
        $kv33->key = 'lianxiren';
        $kv33->value = '订单联系人';
        $lst[] = $kv33;
        $kv34 = new stdClass();
        $kv34->key = 'zhifushijian';
        $kv34->value = '支付时间';
        $lst[] = $kv34;
        $kv35 = new stdClass();
        $kv35->key = 'chupiaoshijian';
        $kv35->value = '出票时间';
        $lst[] = $kv35;
        $kv36 = new stdClass();
        $kv36->key = 'qifeidaodashijian';
        $kv36->value = '起飞到达时间';
        $lst[] = $kv36;

        $name = $datetimeStart.'-'.$datetimeEnd.'-出票对账表-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
