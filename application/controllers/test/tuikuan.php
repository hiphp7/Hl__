<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 退款
 */
class tuikuan extends CI_Controller {
    
    /**
     * 模拟get进行url请求
     * @param string $url
     * @param array $get_data
     */
    function request_get($url = '', $get_data = array()) {
        if (empty($url) || empty($get_data)) {
            return false;
        }
        
        $o = "";
        foreach ( $get_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $get_data = substr($o,0,-1);

        $postUrl = $url.'?'.$get_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }

    public function index($out_trade_no, $total_fee, $refund_fee) {
        $url = 'http://m.bibi321.com/hl/wxpay/refund.php';
        $get_data = array('transaction_id' => '', 'out_trade_no' => $out_trade_no, 'total_fee' => $total_fee, 'refund_fee' => $refund_fee);
        $resutl = $this->request_get($url, $get_data);
       
        if(strpos($resutl, '成功'))
        {
            echo '自动退款测试成功！';
        }
        else
        {
            echo '自动退款测试失败！';
        }
    }
    
}
