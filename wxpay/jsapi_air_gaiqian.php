<?php 
ini_set('date.timezone','Asia/Shanghai');
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
			$url = "http://m.bibi321.com/hl/index.php/app/db/order/zhifu";
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
$dingdanid = $_GET['dingdanid'];

$count = 0;
$leixing = 'hb';
$mydata = date("YmdHis");
$dingdanhao = $leixing.$mydata.$dingdanid;
               //连接数据库
               $conn = mysql_connect('112.74.171.99', 'root', 'hlpiao') or die ('数据库连接失败！</br>错误原因：'.mysql_error());
               
               //设置字符集，如utf8和gbk等，根据数据库的字符集而定
               mysql_query("set names 'utf8'"); 
               //选定数据库
               mysql_select_db('air', $conn) or die('数据库选定失败！</br>错误原因：'.mysql_error());
               
               $sql = 'select m.id as id from dingdan as m order by m.id desc limit 0, 1';
               
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
//var_dump($openId);

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($body);
$input->SetAttach($attach);
//$input->SetOut_trade_no($leixing.WxPayConfig::MCHID.date("YmdHis").$count);
$input->SetOut_trade_no($dingdanhao);
$input->SetTotal_fee($total_fee * 100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 6000));
$input->SetGoods_tag($goods_tag);
$input->SetNotify_url("http://m.bibi321.com/hl/wxpay/jsapi_air_gaiqian.php");
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
<html ng-app="myApp">
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

    </head>
    <body ng-controller="MyWXPayCtrl">
        <ion-header-bar align-title="center" class="bar-positive" style="width:100%;padding:0;border-color: #49D3DD;background: #49D3DD;    background-image: linear-gradient(0deg,#49D3DD,#49D3DD 50%,transparent 50%);">
        <div style="width:100%;height:44px;line-height: 44px;text-align: center;">
            <a class="returnbut c_fff" style="font-size: 1.6rem;" ng-click="retunurl()"><span></span>返回</a>
            <span style="font-size: 1.6rem;">微信支付</span>
        </div>
    </ion-header-bar>
    <ion-header-bar align-title="center" class="bar-subheader" style="width:100%;padding:0;height:auto;border: none;">
        <div class="paneBox border_b_1_e9 bg_fff7dc f_s13 c_987b4d text_a_c pt_100 pb_100" style="width: 100%;background: #10C4D1;color: white;">
            请在订单有效期内完成支付，还剩
            <span class="c_ff6d6d ng-binding" ng-bind="minute" style="color: white;"></span>
            分
            <span class="c_ff6d6d ng-binding" ng-bind="second" style="color:#fff;"></span>
            秒
        </div>
    </ion-header-bar>
    <ion-content>
        <!------主页--------->
        <section class="wrap_Box mainbox frompb">
                <!----航班信息-------->
                <div class="flightTimeBox mt_100">
                    <!-----往------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff goto_spread_shrink">
                        <div class="goto_spread">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff" style="border: 1px solid #49d3dd;background: #49d3dd;">往</span><font class="ml_55" ng-bind="orderDetail.hangchengs.goto.hangkonggongsi + orderDetail.hangchengs.goto.hangbanhao"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.hangchengs.goto.jixing"></span><span class="ml_55 mr_55" ng-bind="orderDetail.goto.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 hh:mm'"></span><span class="c_999 fr" ng-if="orderDetail.hangchengs.goto.gongxianghangbanhao.lenght >0">共享航班(实际乘坐深圳航空ZH9815)</span></p>
                            <div class="fliTimenbox pt_35" style="height: 9.3rem;">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s20" ng-bind="orderDetail.hangchengs.goto.qifeichengshi"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-show="goto.interday >0">
                                        <p class="f_s12">+<span ng-bind="goto.interday"></span>天</p>
                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='http://m.bibi321.com/hl/resources/air/image/fdfdv.png'></p>
                                    </span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='http://m.bibi321.com/hl/resources/air/image/fdfdv.png'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s20" ng-bind="orderDetail.hangchengs.goto.daodachengshi"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.hangchengs.goto.qifeijichang + orderDetail.hangchengs.goto.qifeihangzhanlou"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-bind="goto.flightTime">2小时20分</span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.hangchengs.goto.daodajichang + orderDetail.hangchengs.goto.daodahangzhanlou">宝安机场T2</span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.hangchengs.goto.qifeishijianchuo*1000 | date : 'hh:mm'">16:40</span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.hangchengs.goto.jingtinglianbiao >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.hangchengs.goto.daodashijianchuo*1000 | date : 'hh:mm'">16:40</span>
                                </div>
                            </div>
                            <!-----乘客信息------------>
                            <section class="bg_fff border_t_1_dc wrapfix f_s14 pt_100">
                                <div class="fl c_999 wid17 f_s12">乘客：</div>
                                <section class="fl wid83 c_202020 f_s12">
                                    <section class="nskkt_box1">
                                        <div class="border_b_1_dc mb_55" ng-repeat="x in orderDetail.hangchengs.goto.hangchenglvkes">
                                            <p class="mb_55 wrapfix"><span class="fl mr_100" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12 fl" ng-show="x.type ==1">儿童</span><span class="c_289deb fr f_s13 mr_55" ng-bind="x.zhuangtai" ng-class="getColor2(x.zhuangtai)"></span></p>
                                            <p class="mb_55 wrapfix"><span class="fl mr_100"><span ng-bind="x.zhengjianming">证件类型</span>:<span class="ml_55" ng-bind="x.zhengjianhaoma">证件号码</span></span></p>
                                            <p class="mb_55 wrapfix" ng-show="x.piaohao != null"><span class="fl mr_100">票号：<span ng-bind="x.piaohao"></span></span></p>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </div>
                    </div>
                    <!-----往 [end]------->
                    <!-----返------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff back_spread_shrink" ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1">
                        <div class="goto_spread">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">返</span><font class="ml_55" ng-bind="orderDetail.hangchengs.back.hangkonggongsi + orderDetail.hangchengs.back.hangbanhao"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.hangchengs.back.jixing"></span><span class="ml_55 mr_55" ng-bind="orderDetail.back.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 hh:mm'"></span><span class="c_999 fr" ng-if="orderDetail.hangchengs.back.gongxianghangbanhao.lenght >0">共享航班(实际乘坐深圳航空ZH9815)</span></p>
                            <div class="fliTimenbox pt_35" style="height: 9.3rem;">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s20" ng-bind="orderDetail.hangchengs.back.qifeichengshi"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-show="back.interday >0">
                                        <p class="f_s12">+<span ng-bind="back.interday"></span>天</p>
                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='http://m.bibi321.com/hl/resources/air/image/fdfdv.png'></p>
                                    </span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='http://m.bibi321.com/hl/resources/air/image/fdfdv.png'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s20" ng-bind="orderDetail.hangchengs.back.daodachengshi"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.hangchengs.back.qifeijichang + orderDetail.hangchengs.back.qifeihangzhanlou"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-bind="back.flightTime">2小时20分</span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.hangchengs.back.daodajichang + orderDetail.hangchengs.back.daodahangzhanlou">宝安机场T2</span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.hangchengs.back.qifeishijianchuo*1000 | date : 'hh:mm'">16:40</span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.hangchengs.back.jingtinglianbiao >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.hangchengs.back.daodashijianchuo*1000 | date : 'hh:mm'">16:40</span>
                                </div>
                            </div>
                            <!-----乘客信息------------>
                            <section class="bg_fff border_t_1_dc wrapfix f_s14 pt_100">
                                <div class="fl c_999 wid17 f_s12">乘客：</div>
                                <section class="fl wid83 c_202020 f_s12">
                                    <section class="nskkt_box1">
                                        <div class="border_b_1_dc mb_55" ng-repeat="x in orderDetail.hangchengs.back.hangchenglvkes">
                                            <p class="mb_55 wrapfix"><span class="fl mr_100" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12 fl" ng-show="x.type ==1">儿童</span><span class="c_289deb fr f_s13 mr_55" ng-bind="x.zhuangtai" ng-class="getColor2(x.zhuangtai)"></span></p>
                                            <p class="mb_55 wrapfix"><span class="fl mr_100"><span ng-bind="x.zhengjianming">证件类型</span>:<span class="ml_55" ng-bind="x.zhengjianhaoma">证件号码</span></span></p>
                                            <p class="mb_55 wrapfix" ng-show="x.piaohao != null"><span class="fl mr_100">票号：<span ng-bind="x.piaohao"></span></span></p>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </div>
                    </div>
                    <!-----返 [end]------->
                </div>
                <!-----航班信息  [end]------------>

                <section class="bg_fff border_b_1_dc border_t_1_dc wrapfix f_s14 pt_55 pl_55 pr_55">
                    <!----联系人------>
                    <section class="border_b_1_dc wrapfix pa_55 mb_55">
                        <div class="fl c_999 wid25">联系人：</div>
                        <section class="fl wid75 f_s12">
                            <div class="fl wid30">
                                <p class="mt_10">姓名:</p>
                                <p class="mt_55">手机号:</p> 
                            </div>
                            <section class="fl wid70 box_bb pl_55">
                                <p class="mt_10" ng-bind="orderDetail.lianxiren"></p>                            
                                <p class="mt_55" ng-bind="orderDetail.lianxirendianhua"></p>
                            </section>
                        </section>
                    </section>
                </section>
                <!----联系人  [end]------>
                <!------ 明细单---------->

                <!------ 明细单  [end]---------->
        </section>
        <!----主页 [end]------>

    </ion-content>
    <ion-footer-bar align-title="center" class="bar-positive" style="height: 3.8rem;line-height: 3rem;padding: 0.4rem;background-color:#526279;    background-image: linear-gradient(180deg,#526279,#526279 50%,transparent 50%);">
        <div class="c_fff" style="width:100%;">
            <span id="hid" style="display:none;"><?php echo $orderDetail->dingdanhao;?></span>
            <span class="f_s14">订单总额:<span class="c_ff6d6d" ng-bind="orderDetail.dingdanzonge | currency:'￥'"></span></span>
            <input id="btn_ziying_zhifu" class="bg_ff6d6d c_fff f_s14 tomaiby fr ml_100" ng-click="zhifu()" type="button" value="支付"/>
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
					publicJS.promptBox("正在为您跳转订单管理,请稍候", 3000);
                    window.location.href = 'http://m.bibi321.com/hl/index.php#/flightOrder';
                } 
                else if(res.err_msg == "get_brand_wcpay_request:cancel" )
                {
					publicJS.promptBox("支付取消", 2000);
                }
                else 
                {
                    publicJS.promptBox("支付失败", 2000);
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
    
  
angular.module("myApp",["ionic","starter.services"]).controller("MyWXPayCtrl",function($scope,$http,$ionicLoading, $interval, $timeout, MsgBox){
    
    var a = window.localStorage.getItem('ordergaiqian');
    $scope.orderDetail = $.parseJSON(a);

            
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
                                window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/home';
                            }, 2000);
                            window.localStorage.removeItem('ordergaiqian');

                            return;
                        }
                    }
                }, 1000, 0);
            };
            //启动倒计时
            $scope.countdown();
            
            $scope.zhifu = function(){
                 callpay();
                
                //saveairplne();
            };
            
            $scope.retunurl = function(){
                window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/order';
            };
});
    
</script>
</html>
