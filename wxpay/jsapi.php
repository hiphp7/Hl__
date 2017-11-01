<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}


//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

/*
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($_GET['body']);
//$input->SetAttach($_GET['attach']);
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($_GET['total_fee']);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
//$input->SetGoods_tag($_GET['body']);
$input->SetNotify_url("http://m.bibi321.com/wxpayg/example/notify.php");
$input->SetTrade_type("APP");
$input->SetOpenid($openId);
$input->SetProduct_id($_GET['total_fee']);
$order = WxPayApi::UnifiedOrder($input);
//echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//printf_info($order);
echo json_encode($order);
*/

$input = new WxPayUnifiedOrder();
$input->SetBody('qwe');
//$input->SetAttach('qwe');
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee(1);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
//$input->SetGoods_tag($_GET['body']);
$input->SetNotify_url("http://m.bibi321.com/wxpayg/example/notify.php");
$input->SetTrade_type("APP");
$input->SetOpenid($openId);
$input->SetProduct_id('12345');
$order = WxPayApi::UnifiedOrder($input);
echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
printf_info($order);
//echo json_encode($order);

?>













