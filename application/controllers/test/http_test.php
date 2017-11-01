<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class http_test extends CI_Controller {

    public function index() {
        $this->load->helper('tools');
        $url = site_url('wx/test');
        $data_zhifu = request_get($url);
        echo $data_zhifu;
    }

    public function zhifu() {
        
        $out_trade_no = $this->input->get('out_trade_no');
        $total_fee = $this->input->get('total_fee');
        $body = $this->input->get('body');
        $attach = $this->input->get('attach');
        $goods_tag = $this->input->get('goods_tag');
        $detail = $this->input->get('detail');

        
        $this->load->helper('tools');
        //$url = site_url('wx/test');
        $url = 'http://m.bibi321.com/wxpay/index.php/wx/zhifu?out_trade_no='.$out_trade_no.'&total_fee='.$total_fee.'&body='.$body.'&attach='.$attach.'&goods_tage='.$goods_tag.'&detail='.$detail;
        $data_zhifu = request_get($url);
        echo $data_zhifu;
    }

}
