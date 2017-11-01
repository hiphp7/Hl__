<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * �������  --  ��Ʊ����
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
    // ��Ʊ����
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
        $kv->value = '������';
        $lst[] = $kv;

        $kv1 = new stdClass();
        $kv1->key = 'dingdanlaiyuan';
        $kv1->value = '������Դ';
        $lst[] = $kv1;

        $kv2 = new stdClass();
        $kv2->key = 'caigoupingtai';
        $kv2->value = '�ɹ�ƽ̨';
        $lst[] = $kv2;

        $kv3 = new stdClass();
        $kv3->key = 'orderId';
        $kv3->value = '�ɹ�ƽ̨�ϵĶ�����';
        $lst[] = $kv3;

        $kv4 = new stdClass();
        $kv4->key = 'fangjianshu';
        $kv4->value = '������';
        $lst[] = $kv4;
        $kv5 = new stdClass();
        $kv5->key = 'daynum';
        $kv5->value = '��ҹ��';
        $lst[] = $kv5;
        $kv6 = new stdClass();
        $kv6->key = 'fangfei';
        $kv6->value = '����';
        $lst[] = $kv6;
        $kv7 = new stdClass();
        $kv7->key = 'fapiaopeisongfei';
        $kv7->value = '��Ʊ���ͷ�';
        $lst[] = $kv7;
        $kv8 = new stdClass();
        $kv8->key = 'dingdanzonge';
        $kv8->value = '�����ܶ�';
        $lst[] = $kv8;
        $kv9 = new stdClass();
        $kv9->key = 'zhifuqudao';
        $kv9->value = '֧������';
        $lst[] = $kv9;
        $kv10 = new stdClass();
        $kv10->key = 'zhifushouxufeilv';
        $kv10->value = '֧����������';
        $lst[] = $kv10;
        $kv11 = new stdClass();
        $kv11->key = 'chengrenshuliang';
        $kv11->value = '֧��������';
        $lst[] = $kv11;

        $kv12 = new stdClass();
        $kv12->key = 'dingdanyouhui';
        $kv12->value = '�����Ż�';
        $lst[] = $kv12;
        $kv13 = new stdClass();
        $kv13->key = 'ertonshuliang';
        $kv13->value = 'ʵ���տ��ܶ�';
        $lst[] = $kv13;
        $kv14 = new stdClass();
        $kv14->key = 'caigouzonge';
        $kv14->value = '�ɹ��ܶ�';
        $lst[] = $kv14;
        $kv15 = new stdClass();
        $kv15->key = 'fapiaopeisongchengben';
        $kv15->value = '��Ʊ���ͳɱ�';
        $lst[] = $kv15;
        $kv16 = new stdClass();
        $kv16->key = 'dengluzhanghao';
        $kv16->value = '�Է���½�˺�';
        $lst[] = $kv16;
        $kv17 = new stdClass();
        $kv17->key = 'zhifuzhanghao';
        $kv17->value = '�Է�֧���˺�';
        $lst[] = $kv17;
        $kv18 = new stdClass();
        $kv18->key = 'shoukuanzhanghao';
        $kv18->value = 'ƽ̨�տ��˺�';
        $lst[] = $kv18;
        $kv19 = new stdClass();
        $kv19->key = 'xiadanshijian';
        $kv19->value = '����ʱ��';
        $lst[] = $kv19;
        $kv20 = new stdClass();
        $kv20->key = 'zhifushijian';
        $kv20->value = '֧��ʱ��';
        $lst[] = $kv20;
        $kv21 = new stdClass();
        $kv21->key = 'zhifuqudao';
        $kv21->value = '֧������';
        $lst[] = $kv21;
        $kv22 = new stdClass();
        $kv22->key = 'gendanren';
        $kv22->value = '������';
        $lst[] = $kv22;
        
        $name = $datetimeStart.'-'.$datetimeEnd.'-�Ƶ���˱���������-';

        $this->load->library('javaexcel');
        $result = $this->javaexcel->CreateExcel($lst, $sql, $ps, $name);

        if (!empty($result) && $result != "") {
            redirect(base_url('upload/caiwu/' . $result . '.xls'));
        }

    }

}
