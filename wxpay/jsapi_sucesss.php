<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
//require_once 'log.php';

//初始化日志
//$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
//$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

$ps = $_GET['ps'];
$cs = json_decode(urldecode($ps));

$count = 0;
$leixing = 'hb';
               //连接数据库
               $conn = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die ('数据库连接失败！</br>错误原因：'.mysql_error());
               
               //设置字符集，如utf8和gbk等，根据数据库的字符集而定
               mysql_query("set names 'utf8'"); 
               
               //选定数据库
               mysql_select_db('air', $conn) or die('数据库选定失败！</br>错误原因：'.mysql_error());
               
			   $sql = 'select m.id as id from dingdan as m order by m.id desc limit 0, 1';
			   if(!empty($cs) && $cs->air == 0)
			   {
                   $sql = 'select m.id as id from train_order as m order by m.id desc limit 0, 1';
				   $leixing = 'hc';
			   }
               //执行SQL语句(查询) 
               $result = mysql_query($sql) or die('数据库查询失败！</br>错误原因：'.mysql_error());
               if(!empty($result))
               {
                   $row = mysql_fetch_row($result,MYSQL_ASSOC);
                   if(!empty($row))
				   {
					   $count = $row['id'];
				   }
               }
               
               // 释放结果
               mysql_free_result($result); 
               // 关闭连接
               mysql_close(); 
			   
			   var_dump($cs);
			   echo '<br>';
			   var_dump($count);
			   echo '<br>';
			   var_dump($leixing);

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

/*
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("test");
$input->SetAttach("test");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://m.bibi321.com/wxpayg/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);
*/

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($cs->body);
$input->SetAttach($cs->attach);
//$input->SetOut_trade_no($leixing.WxPayConfig::MCHID.date("YmdHis").$count);
$input->SetOut_trade_no($leixing.date("YmdHis").$count);
$input->SetTotal_fee($cs->total_fee);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($cs->goods_tag);
$input->SetNotify_url("http://m.bibi321.com/wxpayg/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付样例-支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				//WeixinJSBridge.log(res.err_msg);
				//alert(res.err_code+res.err_desc+res.err_msg);
                               //alert('帅哥吴大富：' + res.err_desc + ' err_desc 错误 msg ' + res.err_msg);
                           if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    alert('支付成功');
                    //我在这里选择了前台只要支付成功将单号传递更新数据
                    //saveairplne();

                } 
				else if(res.err_msg == "get_brand_wcpay_request:cancel" )
				{
					alert('支付取消');
				}
				else 
                {
                     alert('支付失败');
                }
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		/*
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
		*/
	};
	
	</script>
</head>
<body>
    <br/>
    <font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px"><?php echo $cs->total_fee; ?>分</span>钱</b></font><br/><br/>
	<div align="center">
		<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
	</div>
</body>
</html>
