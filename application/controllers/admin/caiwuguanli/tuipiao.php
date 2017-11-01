<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 财务管理  --  机票报表
 */
class tuipiao extends CI_Controller {

    public function index() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
            );
        $data['csrf'] = $csrf;
        $this->load->view('admin/caiwuguanli/tuipiao/index', $data);
    }
    // 出票报表
    public function tuipiaobaobiao() {

        $datetimeStart = $this->input->get('datetimeStart');
        $datetimeEnd = $this->input->get('datetimeEnd');
        $leixing = $this->input->get('leixing');

        $sql = "select m.id as id,
        m.dingdanzhungtai as dingdanzhungtai,
        m.tuipiaodingdanhao as tuipiaodingdanhao,
        m.chupiaodingdanhao as chupiaodingdanhao,
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
        m.daodajicheng as daodajicheng,
        m.qifeishijian as qifeishijian,
        m.chengrencangwei as chengrencangwei,
        m.ertongcangwei as ertongcangwei,
        m.chengrenshuliang as chengrenshuliang,
        m.ertongshuliang as ertongshuliang,
        m.chengrendantuipiaofei as chengrendantuipiaofei,
        m.ertongdantuipiaofei as ertongdantuipiaofei,
        m.tuipiaofeizonge as tuipiaofeizonge,
        m.huishouyouhuie as huishouyouhuie,
        m.tuikuanzonge as tuikuanzonge,
        m.baoxiantuikuane as baoxiantuikuane,
        m.baoxiaotuikuane as baoxiaotuikuane,
        m.duifangzhanghu as duifangzhanghu,
        m.pingtaizhanghu as pingtaizhanghu,
        m.lianxiren as lianxiren,
        m.lianxirendianhua as lianxirendianhua,
        m.gendanrenid as gendanrenid,
        m.shenqingshijian as shenqingshijian,
        m.tuipiaoshijian as tuipiaoshijian,
        m.tuikuanshijian as tuikuanshijian,
        m.qifeidaodashijian as qifeidaodashijian from caiwu_fj_tuipiao as m where ";

        $ps = array();
        if ($leixing == 0) {
            $sql = $sql . ' tuipiaoshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        } else {
            $sql = $sql . ' tuikuanshijian between ? and ? ';
            $ps[] = $datetimeStart;
            $ps[] = $datetimeEnd;
        }

        $kv = new stdClass();
        $kv->key = 'dingdanzhungtai';
        $kv->value = '订单状态';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'tuipiaodingdanhao';
        $kv1->value = '退票批次号号';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'chupiaodingdanhao';
        $kv2->value = '出票订单号';
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
        $kv5->value = '异地平台';
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
        $kv13->key = 'daodajicheng';
        $kv13->value = '到达机场';
        $lst[] = $kv13;
        
        $kv14 = new stdClass();
        $kv14->key = 'qifeishijian';
        $kv14->value = '起飞时间';
        $lst[] = $kv14;
        
        $kv15 = new stdClass();
        $kv15->key = 'chengrencangwei';
        $kv15->value = '成人舱位';
        $lst[] = $kv15;
        
        $kv16 = new stdClass();
        $kv16->key = 'ertongcangwei';
        $kv16->value = '儿童舱位';
        $lst[] = $kv16;
        
        $kv17 = new stdClass();
        $kv17->key = 'chengrenshuliang';
        $kv17->value = '成人数量';
        $lst[] = $kv17;
        
        $kv18 = new stdClass();
        $kv18->key = 'ertongshuliang';
        $kv18->value = '儿童数量';
        $lst[] = $kv18;
        
        $kv19 = new stdClass();
        $kv19->key = 'chengrendantuipiaofei';
        $kv19->value = '成人单张退票费';
        $lst[] = $kv19;
        
        $kv20 = new stdClass();
        $kv20->key = 'ertongdantuipiaofei';
        $kv20->value = '儿童单张退票费';
        $lst[] = $kv20;
        
        $kv21 = new stdClass();
        $kv21->key = 'tuipiaofeizonge';
        $kv21->value = '退票费总额';
        $lst[] = $kv21;
        
        $kv22 = new stdClass();
        $kv22->key = 'huishouyouhuie';
        $kv22->value = '回收优惠额';
        $lst[] = $kv22;
        
        $kv23 = new stdClass();
        $kv23->key = 'tuikuanzonge';
        $kv23->value = '退款总额';
        $lst[] = $kv23;
        
        $kv24 = new stdClass();
        $kv24->key = 'baoxiantuikuane';
        $kv24->value = '保险退款额';
        $lst[] = $kv24;
        
        $kv25 = new stdClass();
        $kv25->key = 'baoxiaotuikuane';
        $kv25->value = '报销退款额';
        $lst[] = $kv25;
        
        $kv26 = new stdClass();
        $kv26->key = 'duifangzhanghu';
        $kv26->value = '对方账户';
        $lst[] = $kv26;
        
        $kv27 = new stdClass();
        $kv27->key = 'pingtaizhanghu';
        $kv27->value = '平台账户';
        $lst[] = $kv27;
        
        $kv28 = new stdClass();
        $kv28->key = 'lianxiren';
        $kv28->value = '订单联系人';
        $lst[] = $kv28;
        
        $kv29 = new stdClass();
        $kv29->key = 'lianxirendianhua';
        $kv29->value = '订单联系方式';
        $lst[] = $kv29;
        
        $kv30 = new stdClass();
        $kv30->key = 'gendanrenid';
        $kv30->value = '跟单人ID';
        $lst[] = $kv30;
        
        $kv31 = new stdClass();
        $kv31->key = 'shenqingshijian';
        $kv31->value = '退款申请时间';
        $lst[] = $kv31;
        
        $kv32 = new stdClass();
        $kv32->key = 'tuipiaoshijian';
        $kv32->value = '退票时间';
        $lst[] = $kv32;
        
        $kv33 = new stdClass();
        $kv33->key = 'tuikuanshijian';
        $kv33->value = '退款时间';
        $lst[] = $kv33;
        
        $kv34 = new stdClass();
        $kv34->key = 'qifeidaodashijian';
        $kv34->value = '起飞到达时间';
        $lst[] = $kv34;

        $name = $datetimeStart.'-'.$datetimeEnd.'-退票对账表-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
