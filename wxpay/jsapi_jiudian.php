<?php
ini_set('date.timezone', 'Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once '../lib/WxPay.Notify.php';




class PayNotifyCallBack extends WxPayNotify
{
	function request_get($url = '', $get_data = array()) {
        if (empty($url) || empty($get_data)) {
            return false;
        }

        $o = "";
        foreach ($get_data as $k => $v) {
            $o.= "$k=" . urlencode($v) . "&";
        }
        $get_data = substr($o, 0, -1);

        $postUrl = $url . '?' . $get_data;
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        $data = curl_exec($ch); //运行curl
        curl_close($ch);

        return $data;
    }
	
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);

				
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
	
			$fukuanshijian = $result["time_end"];
			$out_trade_no = $result["out_trade_no"];
			$total_fee = $result["total_fee"];
			$url = "http://m.bibi321.com/hl/index.php/app/jiudian/zhifu/weixinpay";
			$get_data["fukuanshijian"] = $fukuanshijian;
			$get_data["out_trade_no"] = $out_trade_no;
			$get_data["total_fee"] = $total_fee;
			$this->request_get($url, $get_data);
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		//Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		return true;
	}
}
$notify = new PayNotifyCallBack();
$notify->Handle(false);

$ps = $_GET['ps'];
$cs = json_decode(urldecode($ps));

$count = 0;
$leixing = 'hl';
$mydata = date("YmdHis");
//连接数据库
$conn = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die('数据库连接失败！</br>错误原因：' . mysql_error());

//设置字符集，如utf8和gbk等，根据数据库的字符集而定
mysql_query("set names 'utf8'");

//选定数据库
mysql_select_db('air', $conn) or die('数据库选定失败！</br>错误原因：' . mysql_error());

$sql = 'select m.id as id from dingdan as m order by m.id desc limit 0, 1';

//执行SQL语句(查询) 
$result = mysql_query($sql) or die('数据库查询失败！</br>错误原因：' . mysql_error());
if (!empty($result)) {
    $row = mysql_fetch_row($result, MYSQL_ASSOC);
    if (!empty($row)) {
        $count = intval($row['id']) + 1;
    }
}

// 释放结果
mysql_free_result($result);
// 关闭连接
mysql_close();
$transaction_id = $cs->orderid;
if (!empty($cs) && !empty($cs->totalprice) && $cs->totalprice > 0) {
//①、获取用户openid
    $tools = new JsApiPay();
    $openId = $tools->GetOpenid();
//var_dump($openId);
//②、统一下单
    $input = new WxPayUnifiedOrder();
	$input->SetBody($cs->body);
	$input->SetAttach($cs->attach);
//$input->SetOut_trade_no($leixing.WxPayConfig::MCHID.date("YmdHis").$count);
    $input->SetOut_trade_no($transaction_id );
    $input->SetTotal_fee($cs->totalprice*100);
    $input->SetTime_start(date("YmdHis"));
    $input->SetTime_expire(date("YmdHis", time() + 6000));
    $input->SetGoods_tag($cs->goods_tag);
    //$input->SetNotify_url("http://m.bibi321.com/hl/wxpay/notify.php");
	$input->SetNotify_url("http://m.bibi321.com/hl/wxpay/jsapi_jiudian.php");
    $input->SetTrade_type("JSAPI");
    $input->SetOpenid($openId);
    $order = WxPayApi::unifiedOrder($input);

    $jsApiParameters = $tools->GetJsApiParameters($order);
//var_dump($jsApiParameters);
//获取共享收货地址js函数参数
//$editAddress = $tools->GetEditAddressParameters();
}
?>

<!DOCTYPE html>
<html ng-app="HotelApp">
    <head>
        <title>比比旅游</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='http://m.bibi321.com/hl/lib/ionic/css/ionic.min.css' rel="stylesheet"/>
        <script src='http://m.bibi321.com/hl/lib/jquery/jquery.min.js'></script>
        <script src='http://m.bibi321.com/hl/lib/ionic/js/ionic.bundle.min.js'></script>

        <script src='http://m.bibi321.com/hl/js/services.js'></script>
        <script src='http://m.bibi321.com/hl/js/publicJS.js'></script>

        <link href='http://m.bibi321.com/hl/css/common.css' rel="stylesheet"/>
        <link href='http://m.bibi321.com/hl/css/index.css' rel="stylesheet"/>

        <link type="text/css" href='http://m.bibi321.com/hl/css/publicCss1.css' rel="stylesheet" />
        <link type="text/css" href='http://m.bibi321.com/hl/css/trainList.css' rel="stylesheet"/>
        <link type="text/css" href='http://m.bibi321.com/hl/css/trainOrder.css' rel="stylesheet"/>
        <link href='http://m.bibi321.com/hl/css/layout.css' rel="stylesheet"/>
        <style type="text/css">
            /* CSS RESET */
* { padding: 0; margin: 0; }
body { font: 12px "微软雅黑", Arial; background: #efeff4; min-width: 320px; max-width: 640px; color: #000; }
a { text-decoration: none; color: #666666; }
a, img { border: none; }
img { vertical-align: middle; }
ul, li { list-style: none; }
em, i { font-style: normal; }
.clear { clear: both }
.clear_wl:after { content: "."; height: 0; visibility: hidden; display: block; clear: both; }
.fl { float: left }
.fr { float: right }
.all_w { width: 91.3%; margin: 0 auto; }
/*基础字体属性*/
.f10 { font-size: 10px }
.f11 { font-size: 11px }
.f12 { font-size: 12px }
.f14 { font-size: 14px }
.f13 { font-size: 13px }
.f16 { font-size: 16px }
.f18 { font-size: 18px }
.f20 { font-size: 20px }
.f22 { font-size: 22px }
.f24 { font-size: 24px }
.f26 { font-size: 26px }
.f28 { font-size: 28px }
.f32 { font-size: 32px }
.fb { font-weight: bold }
/********/
.header { background: #393a3e; color: #f5f7f6; height: auto; overflow: hidden; }
.gofh { float: left; height: 45px; display: -webkit-box; -webkit-box-orient: horizontal; -webkit-box-pack: center; -webkit-box-align: center; }
.gofh a { padding-right: 10px; border-right: 1px solid #2e2f33; }
.gofh a img { width: 40%; }
.ttwenz { float: left; height: 45px; }
.ttwenz h4 { font-size: 16px; font-weight: 400; margin-top: 2px; }
.ttwenz h5 { font-size: 12px; font-weight: 400; color: #6c7071; }
.wenx_xx { text-align: center; font-size: 16px; padding: 18px 0; }
.wenx_xx .wxzf_price { font-size: 45px; }
.skf_xinf { height: 43px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; line-height: 43px; background: #FFF; font-size: 12px; overflow: hidden; }
.skf_xinf .bt { color: #767676; float: left; }
.ljzf_but { border-radius: 3px; height: 45px; line-height: 45px; background: #44bf16; display: block; text-align: center; font-size: 16px; margin-top: 14px; color: #fff; }
/**/
.ftc_wzsf { display:none; width: 100%; height: 100%; position: fixed; z-index: 999; top: 0; left: 0; }
.ftc_wzsf .hbbj { width: 100%; height: 100%; position: absolute; z-index: 8; background: #000; opacity: 0.4; top: 0; left: 0; }
.ftc_wzsf .srzfmm_box { position: absolute; z-index: 10; background: #f8f8f8; width: 88%; left: 50%; margin-left: -44%; top: 25px; }
.qsrzfmm_bt { font-size: 16px; border-bottom: 1px solid #c9daca; overflow: hidden; }
.qsrzfmm_bt a { display: block; width: 10%; padding: 10px 0; text-align: center; }
.qsrzfmm_bt img.tx { width: 10%; padding: 10px 0; }
.qsrzfmm_bt span { padding: 15px 5px; }
.zfmmxx_shop { text-align: center; font-size: 12px; padding: 10px 0; overflow: hidden; }
.zfmmxx_shop .mz { font-size: 14px; float: left; width: 100%; }
.zfmmxx_shop .wxzf_price { font-size: 24px; float: left; width: 100%; }
.blank_yh { width: 89%; margin: 0 auto; line-height: 40px; display: block; color: #636363; font-size: 16px; padding: 5px 0; overflow: hidden; border-bottom: 1px solid #e6e6e6; border-top: 1px solid #e6e6e6; }
.blank_yh img { height: 40px; }
.ml5 { margin-left: 5px; }
.mm_box { width: 89%; margin: 10px auto; height: 40px; overflow: hidden; border: 1px solid #bebebe; }
.mm_box li { border-right: 1px solid #efefef; height: 40px; float: left; width: 16.3%; background: #FFF; }
.mm_box li.mmdd{ background:#FFF url(../images/dd_03.jpg) center no-repeat ; background-size:25%;}
.mm_box li:last-child { border-right: none; }
.xiaq_tb { padding: 5px 0; text-align: center; border-top: 1px solid #dadada; }
.numb_box { position: absolute; z-index: 10; background: #f5f5f5; width: 100%; bottom: 0px; }
.nub_ggg { border: 1px solid #dadada; overflow: hidden; border-bottom: none; }
.nub_ggg li { width: 33.3333%; border-bottom: 1px solid #dadada; float: left; text-align: center; font-size: 22px; }
.nub_ggg li a { display: block; color: #000; height: 50px; line-height: 50px; overflow: hidden; }
.nub_ggg li a:active  { background: #e0e0e0;}
.nub_ggg li a.zj_x { border-left: 1px solid #dadada; border-right: 1px solid #dadada; }
.nub_ggg li span { display: block; color: #e0e0e0; background: #e0e0e0; height: 50px; line-height: 50px; overflow: hidden; }
.nub_ggg li span.del img { width: 30%; }
.fh_but{ position:absolute; right:0px; top:12px; font-size:14px; color:#20d81f;}
.zfcg_box{ background:#f2f2f2;  height: 56px; line-height:56px;   font-size:20px; color:#1ea300; }
.zfcg_box img{ width:10%;}
.cgzf_info{ background:#FFF; border-top:1px solid #dfdfdd; }
.spxx_shop{ background:#FFF; margin-left:4.35%; border-top:1px solid #dfdfdd; padding:10px 0; }
.spxx_shop td{ color:#7b7b7b; font-size:14px; padding:10px 0;}
.wzxfcgde_tb{ position:fixed; width:100%; z-index:999; bottom:20px; text-align:center;}
.wzxfcgde_tb img{ width:20.6%;}
.mlr_pm{margin-right:4.35%;}
</style>
    </head>
    <body ng-controller="Hotel_WXPayCtrl">
    <ion-header-bar align-title="center" class="bar-positive"style="width:100%;padding:0;background-color: #49D3DD;">
        <div style="width:100%;height:44px;line-height: 44px;text-align: center;">
            <a class="returnbut c_fff" style="font-size: 1.6rem;" ng-click="retunurl()"><span></span>返回</a>
            <span style="font-size: 1.6rem;">微信支付</span>
        </div>
    </ion-header-bar>
    <ion-header-bar align-title="center" class="bar-subheader" style="width:100%;padding:0;height:auto;border: none;">
        <div class="paneBox border_b_1_e9 bg_fff7dc f_s13 c_987b4d text_a_c pt_100 pb_100">
            请在订单有效期内完成支付，还剩
            <span class="c_ff6d6d ng-binding" ng-bind="minute"></span>
            分
            <span class="c_ff6d6d ng-binding" ng-bind="second"></span>
            秒
        </div>
    </ion-header-bar>
    <ion-content>
        <!------主页--------->
        <div class="wenx_xx">
            <div class="mz">比比旅行-<span ng-bind="orderDetail.hotelname"></span></div>
            <div class="wxzf_price">￥<span ng-bind="orderDetail.totalCost"></span></div>
        </div>
        <div class="skf_xinf">
            <div class="all_w"> <span class="bt">收款方</span> <span class="fr">深圳航旅投资有限公司</span> </div>
        </div>
      <button class="button button-block button-balanced" ng-click="zhifu()" style="border-width:0">
            立即支付
        </button> 

    </ion-content>


</body>
<script type="text/javascript">
    function objtops(obj)
    {
        var p = [];
        for (var key in obj) {
            p.push(key + '=' + encodeURIComponent(obj[key]));
        }
        return p.join('&');
    }

    function getCsrf() {
        var name = 'csrf_cookie_name';
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null)
            return unescape(arr[2]);
        return null;
    }
    function weixinchaxun() {
        var order_ps = {
            orderid: order.affiliateConfirmationId,
            sf: sf,
            csrf_test_name: csrf_test_name
        }
		console.log(order_ps);
        $.post('http://m.bibi321.com/hl/index.php/app/templates/zhifu/weixinpay', objtops(order_ps)).success(function (data) {  // 改为在线地址
            if (data == 'true') {
                $.post('http://m.bibi321.com/hl/index.php/app/templates/zhifu/payorder', objtops(order_ps)).success(function (data) {
					if(data == 'true'){


                window.localStorage.removeItem('currentContact');
                window.localStorage.removeItem('userContacts');
                window.localStorage.removeItem('mail');
                window.localStorage.removeItem('Insurance');
                window.localStorage.removeItem('costdetail');
                window.localStorage.removeItem('addressList');
                window.localStorage.removeItem('order');
                window.localStorage.removeItem('currentselected');
                window.localStorage.removeItem('air_taitou');
                alert('正在为您跳转订单管理,请稍候');
                window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/ddxq';
                    }else{
						alert('订单提交失败正在处理3！');
					}
				}).error(function (error) {
					alert('订单提交失败正在处理4！');
				});
            } else {
                alert('订单提交失败正在处理1！');

            }

        }).error(function (error) {
            alert('订单提交失败正在处理2！');
        });
    };


    // 提交飞机订单
    function saveairplne() {
        var a = window.localStorage.getItem('order');
        var order = $.parseJSON(a);

        var sf = window.localStorage.getItem('sf');
        sf = $.parseJSON(sf);

        var csrf_test_name = getCsrf();
        var hotelname = JSON.stringify(order.hotelname);
        //var currentContact = JSON.stringify(order.currentContact); // 联系人。
        var orderid = JSON.stringify(order.orderid); // 收件人。
       // var Insurance = JSON.stringify(order.Insurance); // 保险信息
        // 地址列表
        //var selected = JSON.stringify(order.selected); // 航班信息
        var costdetail = JSON.stringify(order.tatalprice); // 费用
        //var addressList = JSON.stringify(order.addressList);
        //var air_taitou = JSON.stringify(order.air_taitou);

        //  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
        var csrf_test_name = getCsrf();

        var order_ps = {
            hotelname: hotelname,
            orderid: orderid,
            //addressList: addressList,
            //Insurance: Insurance,
            //selected: selected,
            //userContacts: userContacts,
            costdetail: costdetail,
            //air_taitou: air_taitou,
            //orderid: $('#hid').html(),
            sf: sf,
            csrf_test_name: csrf_test_name
        }

        $.post('http://m.bibi321.com/hl/index.php/app/db/order/save', objtops(order_ps)).success(function (data) {  // 改为在线地址
            if (data == 'true') {
                callpay();
                window.localStorage.removeItem('hotelname');
                window.localStorage.removeItem('orderid');
                window.localStorage.removeItem('costdetail');
                //window.localStorage.removeItem('Insurance');
                //window.localStorage.removeItem('costdetail');
                //window.localStorage.removeItem('addressList');
                //window.localStorage.removeItem('order');
                //window.localStorage.removeItem('currentselected');
                //window.localStorage.removeItem('air_taitou');
                //  alert('正在为您跳转订单管理,请稍候');
                //				window.location.href = 'http://m.bibi321.com/hl/index.php#/flightOrder';

            } else {
                alert('订单提交失败正在处理3！');

            }

        }).error(function (error) {
            alert('订单提交失败正在处理4！');
        });

    }


    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
<?php echo $jsApiParameters; ?>,
                function (res) {
                    //WeixinJSBridge.log(res.err_msg);
                    if (res.err_msg == "get_brand_wcpay_request:ok") {

	

					window.localStorage.removeItem('order');
	

					publicJS.promptBox("正在为您跳转订单管理,请稍候", 3000);
                        //我在这里选择了前台只要支付成功将单号传递更新数据
                       window.location.href = 'http://m.bibi321.com/hl/index.php#/hotelhome/hotels//tjdd/zxf/ddxq';
                    }
                    else if (res.err_msg == "get_brand_wcpay_request:cancel")
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
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        } else {
            jsApiCall();
        }
    }


    angular.module("HotelApp", ["ionic", "starter.services"]).controller("Hotel_WXPayCtrl", function ($scope, $http, $ionicLoading, $interval, $timeout, MsgBox) {

        var a = window.localStorage.getItem('order');
        var order = $.parseJSON(a);
        console.log(order);
        //订单详情
        $scope.orderDetail = order;


        //定时重新加载航班
        $scope.countdown = function () {
            $scope.minute = 10;
            $scope.second = 0;
            var timePromise = $interval(function () {
                $scope.second--;
                if ($scope.second <= 0) {
                    if ($scope.minute > 0) {
                        $scope.second = 59;
                        $scope.minute--;
                    } else {
                        $interval.cancel(timePromise);
                        MsgBox.promptBox("支付超时，请重新选择！", 2000);
                        $timeout(function () {
                            //window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/home';
                        }, 2000);
                        window.localStorage.removeItem('order');
                        window.localStorage.removeItem('currentContact');
                        window.localStorage.removeItem('userContacts');
                        window.localStorage.removeItem('addressList');
                        window.localStorage.removeItem('mail');
                        window.localStorage.removeItem('costdetail');
                        window.localStorage.removeItem('air_taitou');
                        return;
                    }
                }
            }, 1000, 0);
        };
        //启动倒计时
        $scope.countdown();

        $scope.zhifu = function () {
            callpay();

            //saveairplne();
        };
		$scope.retunurl = function(){
	        window.location.href = 'http://m.bibi321.com/hl/index.php#/hotelhome/hotels//tjdd/zxf';
        };
    });

</script>
</html>
