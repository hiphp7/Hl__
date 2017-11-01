<?php 
ini_set('date.timezone','Asia/Shanghai');
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
			$url = "http://m.bibi321.com/hl/index.php/app/db/trainorder/create19yiorder";
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

$total_fee = $_GET['total_fee'];
$body = $_GET['body'];
$attach = $_GET['attach'];
$goods_tag = $_GET['goods_tag'];
$detail = $_GET['detail'];

$count = 1;
$leixing = 'hc';
$mydata = date("YmdHis");
               //连接数据库
               $conn = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die ('数据库连接失败！</br>错误原因：'.mysql_error());
               
               //设置字符集，如utf8和gbk等，根据数据库的字符集而定
               mysql_query("set names 'utf8'"); 
               
               //选定数据库
               mysql_select_db('air', $conn) or die('数据库选定失败！</br>错误原因：'.mysql_error());
               
			   $sql = 'select m.id as id from train_order as m order by m.id desc limit 0, 1';
			   //$leixing = 'hc';
               //执行SQL语句(查询) 
               $result = mysql_query($sql) or die('数据库查询失败！</br>错误原因：'.mysql_error());
               if(!empty($result))
               {
                   $row = mysql_fetch_row($result,MYSQL_ASSOC);
                   if(!empty($row))
				   {
					   $count = intval($row['id']) + 1;
				   }
               }
               
               // 释放结果
               mysql_free_result($result); 
               // 关闭连接
               mysql_close(); 
	 
if(!empty($total_fee) && intval($total_fee) > 0)
{
//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($body);
$input->SetAttach($attach);
//$input->SetOut_trade_no($leixing.WxPayConfig::MCHID.$mydata.$count);
$input->SetOut_trade_no($leixing.$mydata.$count);
$input->SetTotal_fee($total_fee * 100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 6000));
$input->SetGoods_tag($goods_tag);
$input->SetNotify_url("http://m.bibi321.com/hl/wxpay/jsapi_hc.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);

$jsApiParameters = $tools->GetJsApiParameters($order);

}

?>

<!DOCTYPE html>
<html ng-app="trainApp">
    <head>
        <title>火车票-微信支付</title>
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
            .user_type{
                width: auto;
                border-radius: 0.4rem;
                border: 1px solid #49d3dd;
                padding: 0 0.15rem;
                color: #49d3dd;
                margin-left: 0.4rem;
				
            }
        </style>
    </head>
    <body ng-controller="Train_WXPayCtrl">
    <ion-header-bar align-title="center" class="bar-positive bar bar-header disable-user-behavior" style="width:100%;padding:0;background-color:#49d3dd;">
        <div style="width:100%;height:44px;line-height: 44px;text-align: center;color:#fff;background-color: #49d3dd">
            <a class="returnbut c_fff" style="font-size: 1.6rem;" ng-click="retunurl();"><span></span>返回</a>
            <span style="font-size: 1.6rem;">火车票-微信支付</span>
        </div>
    </ion-header-bar>
	<ion-header-bar align-title="center" class="bar-subheader" style="width:100%;padding:0;height:auto;border: none;">
        <div class="paneBox border_b_1_e9 bg_fff7dc f_s13 c_987b4d text_a_c pt_100 pb_100" style="background-color:#10C4D1;width: 100%;color: #fff;">
            请在订单有效期内完成支付，还剩
            <span class="ng-binding" ng-bind="minute"></span>
            分
            <span class="ng-binding" ng-bind="second"></span>
            秒
        </div>
    </ion-header-bar>
    <ion-content style="width:100%;padding-top:0.6rem;">
        <div class="fliTimenbox pt_35" style="border-top: 1px solid #c9c9c9;">
            <div class="toFliTime pb_100">
                <span class="wid35 fl text_a_c f_s15" ng-bind="orderDetail.from_station"></span>
                <span class="wid30 fl text_a_c">
                    <p class="maxIcon pl_150 pr_150" ng-bind="orderDetail.train_code"></p>
                    <p class="maxIcon pl_150 pr_150"><img src='http://m.bibi321.com/hl/resources/air/image/fdfdv.png'></p>
                    <p class="maxIcon pl_150 pr_150" ng-bind="orderDetail.seatList[0].typeName"></p>
                </span>
                <span class="wid35 fr text_a_c f_s15" ng-bind="orderDetail.arrive_station"></span>
            </div>
            <div class="toFliTime mt_100 pt_100">
                <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.from_time"></span>
                <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.arrive_time"></span>
            </div>
        </div>
        <div class="passengerInfo" style="border-top: 1px solid #c9c9c9;padding-top: 0.6rem;">
            <div class="row">
                <div class="column">乘车人：</div>
                <div class="column">
                    <ul>
                        <li ng-repeat="x in ticketInfo.ticket_person.adult" ng-if="ticketInfo.ticket_person.adult.length > 0">
                            <div class="userName">
                                <span ng-bind="x.user_name"></span>
                                <span class="user_type">成人票</span>
                            </div>
                            <div class="cardNumber">
                                <span ng-bind="x.ids_type + '：'"></span>
                                <span ng-bind="x.user_ids"></span>
                            </div>
                        </li>
                        <li ng-repeat="x in ticketInfo.ticket_person.child" ng-if="ticketInfo.ticket_person.child.length > 0">
                            <div class="userName">
                                <span ng-bind="x.user_name"></span>
                                <span class="user_type">儿童票</span>
                            </div>
                            <div class="cardNumber">
                                <span ng-bind="x.ids_type + '：'"></span>
                                <span ng-bind="x.user_ids"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </ion-content>
    <ion-footer-bar align-title="center" class="bar-positive" style="height: 3.8rem;line-height: 3rem;padding: 0.4rem;background-color:#526279;background-image: linear-gradient(180deg,#526279,#526279 50%,transparent 50%);">
        <div class="c_fff" style="width:100%;">
		    <span id="hid" style="display:none;"><?php echo $leixing.$mydata.$count;?></span>
            <span class="f_s18">订单总额:<span class="c_ff6d6d ng-binding">￥<span ng-bind="ticketInfo.cost.total.totalPrice"></span></span></span>
            <input id="btn_ziying_zhifu" class="bg_ff6d6d c_fff f_s18 tomaiby fr ml_100" ng-click="zhifu()" type="button" value="支付">
        </div>
    </ion-footer-bar>
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
			
            // 保存火车订单
            function savetrain() {

		   	    var a = window.localStorage.getItem('train_order');
                var train_order = $.parseJSON(a);
                var selected = JSON.stringify(train_order.selected);
                var  yonghuid = train_order.yonghuid;
                var  sf = train_order.sf;
                var csrf_test_name = getCsrf();

				/*
                $.post('http://www.m.bibi321.com/hl/index.php/app/db/trainorder/save', objtops(order)).success(function (data) {
                  
                    var data = $.parseJSON(data);
                    if (data.code == '0'){
                        alert('出单成功');
						window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/trainorderlist';
                    } else if(data.code == '1') {
                        alert('出单失败');
                    } else {
                        alert('数据出错');
                    }

                });
				*/
				
				$.post('http://m.bibi321.com/hl/index.php/app/db/trainorder/save', {selected : encodeURIComponent(selected), yonghuid : yonghuid, sf : sf, orderid: $('#hid').html(), csrf_test_name : csrf_test_name}, function(data){
					
                    if (data == 'true'){
						callpay();
						window.localStorage.removeItem('t_currentContact');
                        window.localStorage.removeItem('t_userContacts');
                        window.localStorage.removeItem('t_addressList');
                        window.localStorage.removeItem('t_insurance');
                        window.localStorage.removeItem('insuranceListTrain');
                        window.localStorage.removeItem('t_mail');
                        window.localStorage.removeItem('t_currentselected');
                        window.localStorage.removeItem('t_chooseId');
                        window.localStorage.removeItem('firstUserContact');
                        window.localStorage.removeItem('train_order');
                        window.localStorage.removeItem('t_costdetail');
						window.localStorage.removeItem('gotoDate');

                      //  alert('订票成功，等待出票！');
					//	window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/trainorderlist';
                    } else {
                        alert('订票失败！');
                    }
				});
				return false;
                
            }

	
    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                //WeixinJSBridge.log(res.err_msg);
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
     
                    //我在这里选择了前台只要支付成功将单号传递更新数据
 //                   savetrain();
					window.localStorage.removeItem('t_currentContact');
					window.localStorage.removeItem('t_userContacts');
					window.localStorage.removeItem('t_addressList');
					window.localStorage.removeItem('t_insurance');
					window.localStorage.removeItem('insuranceListTrain');
					window.localStorage.removeItem('t_mail');
					window.localStorage.removeItem('t_currentselected');
					window.localStorage.removeItem('t_chooseId');
					window.localStorage.removeItem('firstUserContact');
					window.localStorage.removeItem('train_order');
					window.localStorage.removeItem('t_costdetail');
					window.localStorage.removeItem('gotoDate');

					publicJS.promptBox("正在为您跳转订单管理,请稍候", 3000);
					window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/trainorderlist';

                } 
				else if(res.err_msg == "get_brand_wcpay_request:cancel" )
				{
					
					publicJS.promptBox("支付取消", 2000);
					window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/trainorderlist';					
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
	
	
    angular.module("trainApp", ["ionic","starter.services"]).controller("Train_WXPayCtrl", function($scope, $interval, $timeout,MsgBox, $http) {

        var a = window.localStorage.getItem('train_order');
      
        var train_order = $.parseJSON(a);
        //订单详情
        $scope.orderDetail = train_order.selected;
        $scope.ticketInfo = $scope.orderDetail.ticketInfo;
        $scope.retunurl = function() {
            window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/trainOrder';
        };
		
		//定时重新加载航班
		$scope.countdown = function() {
			$scope.minute = 10;
			$scope.second = 0;
			var timePromise = $interval(function() {
				$scope.second--;
				if ($scope.second <= 0) {
					if ($scope.minute > 0) {
						$scope.second = 59;
						$scope.minute--;
					} else {
						$interval.cancel(timePromise);
						MsgBox.promptBox("支付超时，请重新选择！", 2000);
						$timeout(function() {
							window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/train';
						}, 2000);
						return;
					}
				}
			}, 1000, 0);
		};
		//启动倒计时
		$scope.countdown();
		
		$scope.zhifu = function(){
			var orderDetail = JSON.stringify($scope.orderDetail)

            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                orderDetail: orderDetail,
                csrf_test_name: csrf_test_name
            };
            $http.post('http://m.bibi321.com/hl/index.php/app/jiekou/train/checkTicketNum', objtops(myobject)).success(function(data) {

                if (data == "余票充足") {
                    savetrain();
                } else {
                    MsgBox.promptBox(data + "，请重新提交订单！", 2000);
                    $timeout(function() {
                       window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/train';
                    }, 2000);
                    return;
                }
            });
            
			
        };
    });
</script>
</html>