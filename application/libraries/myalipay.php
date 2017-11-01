<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/lib/alipay_submit.class.php');

class myalipay {

    protected $_CI;
    protected $alipay_config;

    public function __construct() {
        $this->_CI = & get_instance();
        $this->init_config();
    }

    /**
     * 初始化支付宝配置，详细参数请根据自己实际接口修改
     */
    private function init_config() {
        //支付宝帐户
        //合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner'] = '2088711341846614';
        
        //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
        $alipay_config['seller_id']	= $alipay_config['partner'];

        //安全检验码，以数字和字母组成的32位字符
        $alipay_config['key'] = 'cme6twtfqkjud5b617nhigmkhpovmflf';
        //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        //签名方式 不需修改
        $alipay_config['sign_type'] = strtoupper('MD5');

        //字符编码格式 目前支持 gbk 或 utf-8
        $alipay_config['input_charset'] = strtolower('utf-8');

        //ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert'] = APPPATH . 'libraries/lib/cacert.pem';

        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport'] = 'http';

        $this->alipay_config = $alipay_config;
    }

    public function alipay() {
        //支付类型
        $payment_type = "1";
        //必填，不能修改
        //服务器异步通知页面路径
        $notify_url = "http://m.bibi321.com/wxpay/index.php/alipay/do_notify";
        //需http://格式的完整路径，不能加?id=123这类自定义参数        //页面跳转同步通知页面路径
        $return_url = "http://m.bibi321.com/wxpay/index.php/alipay/do_return";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/     
        //卖家支付宝帐户
        $seller_email = "";
        //必填        //商户订单号
        $out_trade_no = '12345';
        //商户网站订单系统中唯一订单号，必填        
        //订单名称
        $subject = '测试';
        //必填        //付款金额
        $total_fee = 0.01;
        //必填        //订单描述        
        $body = 'zhifu';
        //商品展示地址
        //$show_url = "http://localhost:8080/wtshop/index.php/storeweb/searchmain/shangpinxinxilst";
        //需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html        
        //防钓鱼时间戳
        $anti_phishing_key = "";
        //若要使用请调用类文件submit中的query_timestamp函数        
        //客户端的IP地址
        $exter_invoke_ip = "";
        //非局域网的外网IP地址，如：221.0.0.1


        /*         * ********************************************************* */
        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => trim($this->alipay_config['partner']),
            "payment_type" => $payment_type,
            "notify_url" => $notify_url,
            "return_url" => $return_url,
            "seller_id" => $this->alipay_config['seller_id'],
            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "total_fee" => $total_fee,
            "body" => $body,
            //"show_url" => site_url('alipay/index'),
            "anti_phishing_key" => $anti_phishing_key,
            "exter_invoke_ip" => $exter_invoke_ip,
            "_input_charset" => trim(strtolower($this->alipay_config['input_charset']))
        );
        
        //建立请求
        $alipaySubmit = new AlipaySubmit($this->alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确定");
        //加一个编码页面，避免跳转页面显示错误
        echo $html_text;
    }
    
    public function tuikuan()
    {
        
    }

}
