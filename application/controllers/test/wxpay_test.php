<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wxpay_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('tools');
        /*
         * 判断是否是微信登录，如果是微信登录，则默认的支付方式为微信支付
         */ 
        if(is_weixin() == true)
        {
            // 加载微信支付类
            $this->load->library('CI_Wechat'); 
        }
    }
    
    /*
     * Ajax 测试支付
     */
    public function index()
    {
        $this->load->view('test/wxpay_test');
    }
    
    public function zhifu()
    {
        //微信支付配置的参数配置读取
        $this->load->library('wechatpay');
        
        $openid = $this->session->userdata('openid');

        if (empty($openid)) {
            $openid = $this->wechatpay->oauth();
            $this->session->set_userdata('openid', $openid);
        }
        
        //商户交易单号
        $out_trade_no = $this->input->get('out_trade_no');
        // 总费用
        $total_fee = $this->input->get('total_fee');
        $body = $this->input->get('body');
        $attach = $this->input->get('attach');
        $goods_tag = $this->input->get('goods_tag');
        $detail = $this->input->get('detail');

        // 商品详情
        $param['body'] = $body;
        $param['attach'] = $attach;
        $param['detail'] = $detail;
        $param['out_trade_no'] = $out_trade_no;
        $param['total_fee'] = $total_fee;
        $param["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];
        $param["time_start"] = date("YmdHis");
        $param["time_expire"] = date("YmdHis", time() + 600);
        $param["goods_tag"] = $goods_tag;
        $param["notify_url"] = base_url() . "index.php/wx/notify";
        $param["trade_type"] = "JSAPI";
        $param["openid"] = $openid;
        
        //统一下单，获取结果，结果是为了构造jsapi调用微信支付组件所需参数
        $result = $this->wechatpay->unifiedOrder($param);

        //如果结果是成功的我们才能构造所需参数，首要判断预支付id
        if (isset($result["prepay_id"]) && !empty($result["prepay_id"])) {
            //调用支付类里的get_package方法，得到构造的参数
            $parameters = json_encode($this->wechatpay->get_package($result['prepay_id']));
            echo $parameters;
        }
    }
    
    public function refund() {
        
        $this->load->library('wechatpay');

        $out_trade_no = $this->input->get('out_trade_no');
        $total_fee = $this->input->get('total_fee');
        $refund_fee = $this->input->get('refund_fee');

        $mch_id = $this->config->item('mch_id');
        //自定义商户退单号
        $out_refund_no = $mch_id . date("YmdHis");
        $result = $this->wechatpay->refund($out_trade_no, $out_refund_no, $total_fee, $refund_fee, $mch_id);
       
        var_dump($result);
    }


}

