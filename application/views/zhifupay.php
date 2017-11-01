<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <title>比比旅游</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic.min.css"); ?>' rel="stylesheet"/>
        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/ionic.bundle.min.js"); ?>'></script>
        <link href='<?php echo base_url("css/common.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/index.css"); ?>' rel="stylesheet"/>
        
        <link type="text/css" href='<?php echo base_url("css/publicCss1.css"); ?>' rel="stylesheet" />
        <link type="text/css" href='<?php echo base_url("css/trainList.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("css/trainOrder.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/layout.css"); ?>' rel="stylesheet"/>

        <!--我的-->
        <link type="text/css" href='<?php echo base_url("resources/user/css/user.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("resources/user/css/register.css"); ?>' rel="stylesheet"/>
        
    </head>
    <body ng-controller="MyWXPayCtrl">
        <ion-header-bar align-title="center" class="bar-positive"style="width:100%;padding:0;">
        <div style="width:100%;height:44px;line-height: 44px;text-align: center;">
            <a class="returnbut c_fff" style="font-size: 1.6rem;" ng-click="retunurl()"><span></span>返回</a>
            <span style="font-size: 1.6rem;">微信支付</span>
        </div>
    </ion-header-bar>
    <ion-content>
        <!------主页--------->
        <section class="wrap_Box mainbox frompb">
                <!----航班信息-------->
                <div class="flightTimeBox mt_100">
                    <!-----往------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff goto_spread_shrink">
                        <!-- 展开效果 -->
                        <div class="goto_spread">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><font class="ml_55" ng-bind="orderDetail.goto.flight.gs + orderDetail.goto.flight.flightNo[0]"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.goto.flight.planeType[0]"></span><span class="ml_55 mr_55" ng-bind="orderDetail.goto.flight.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.goto.flight.date"></span></p>
                            <div class="fliTimenbox pt_35">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s15" ng-bind="orderDetail.goto.depCity"></span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s15" ng-bind="orderDetail.goto.arrCity"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.goto.flight.orgAirport"></span>
                                    <span class="wid30 fl text_a_c pt_25 f_s11" ng-bind="orderDetail.goto.flightTime"></span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.goto.flight.dstAirport"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.goto.flight.depTime"></span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.goto.flight.stopnum >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.goto.flight.arriTime"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----往 [end]------->
                    <!-----返------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff back_spread_shrink" ng-show="orderDetail.fanchengbiaozhi == 1">
                        <div class="goto_spread">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><font class="ml_55" ng-bind="orderDetail.back.flight.gs + orderDetail.back.flight.flightNo[0]"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.back.flight.planeType[0]"></span><span class="ml_55 mr_55" ng-bind="orderDetail.back.flight.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.back.flight.date"></span></p>
                            <div class="fliTimenbox pt_35">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s15" ng-bind="orderDetail.back.depCity"></span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s15" ng-bind="orderDetail.back.arrCity"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.back.flight.orgAirport"></span>
                                    <span class="wid30 fl text_a_c pt_25 f_s11" ng-bind="orderDetail.back.flightTime"></span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.back.flight.dstAirport"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.back.flight.depTime"></span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.back.flight.stopnum >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.back.flight.arriTime"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----返 [end]------->
                </div>
                <!-----航班信息  [end]------------>
                <!-----乘客信息------------>
                <section class="bg_fff border_t_1_dc wrapfix f_s14 pt_100">
                    <div class="fl c_999 wid17 f_s12">乘客：</div>
                    <section class="fl wid83 c_202020 f_s12">
                        <section class="nskkt_box2">
                            <div class="border_b_1_dc mb_55" ng-repeat="x in userContacts" ng-if="x.chk == true">
                                <p class="mb_55 wrapfix"><span class="fl mr_100" ng-bind="x.zhongwenming">洪晓彤</span><span class="bst_jdir c_289deb f_s12 fl" ng-show="x.type ==1">儿童</span></p>
                                <p class="mb_55 wrapfix"><span class="fl mr_100"><span ng-bind="x.zhengjianleixing">证件类型</span>:<span class="ml_55" ng-bind="x.zhengjianhaoma">证件号码</span></span></p>
                            </div>
                        </section>
                    </section>
                </section>
                <!-----乘客信息 [end]------------>
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
                                <p class="mt_10" ng-bind="currentContact.xingming"></p>                            
                                <p class="mt_55" ng-bind="currentContact.shoujihaoma"></p>
                            </section>
                        </section>
                    </section>
                </section>
                <!----联系人  [end]------>
                <!------ 明细单---------->
                <section  class="pa_55 mb_55">
                    <div ng-show="costdetail.goto.totalprice >0">
                        <h2 class="f_s14"><b>去程</b></h2>
                        <p ng-show="costdetail.adult.count > 0"><span>成人票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.adult.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>
                        <p ng-show="costdetail.child.count > 0"><span>儿童票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.child.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.child.count"></span>人</span></p>
                        <p ng-show="costdetail.adult.count > 0"><span>民航基金</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.total.airporttax | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>
                        <p ng-show="Insurance.accident.buy"><span>航空意外险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.accident.goto.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>
                        <p ng-show="Insurance.dallyover.buy"><span>航班延误险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.dallyover.goto.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>
                    </div>
                    <div class="border_t_1_e9 pt_55" ng-show="costdetail.back.totalprice >0" style="height:auto;">
                        <h2 class="f_s14"><b>回程</b></h2>
                        <p ng-show="costdetail.adult.count > 0"><span>成人票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.adult.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>
                        <p ng-show="costdetail.child.count > 0"><span>儿童票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.child.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.child.count"></span>人</span></p>
                        <p ng-show="costdetail.adult.count > 0"><span>民航基金</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.total.airporttax | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>
                        <p ng-show="Insurance.accident.buy"><span >航空意外险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.accident.back.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>
                        <p ng-show="Insurance.dallyover.buy"><span>航班延误险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.dallyover.back.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>
                    </div>
                    <div class="border_t_1_e9 pt_55" ng-show="mail.isMail">
                        <p><span>行程单快递费</span><span class="fr c_ff6d6d" ng-bind="costdetail.expressfee | currency:'￥'"></span></p>
                    </div>
                </section>
                <!------ 明细单  [end]---------->
        </section>
        <!----主页 [end]------>

    </ion-content>
    <ion-footer-bar align-title="center" class="bar-positive" style="height: 3.8rem;line-height: 3rem;padding: 0.4rem;background-color:#387ef5;">
        <div class="c_fff" style="width:100%;">
            <span class="f_s14">订单总额:<span class="c_ff6d6d" ng-bind="costdetail.totalprice | currency:'￥'"></span></span>
            <input id="btn_ziying_zhifu" class="bg_ff6d6d c_fff f_s14 tomaiby fr ml_100" ng-click="zhifu()" type="button" value="支付"/>
        </div>
    </ion-footer-bar>
    </body>
    <script type="text/javascript">
     <?php
$jsApiParameters = $parameters;//参数赋值
?>
    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                //WeixinJSBridge.log(res.err_msg);
                alert(res.err_msg);
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    $.alert('支付成功');
                    //我在这里选择了前台只要支付成功将单号传递更新数据
                    /*
                    $.ajax({
                        url:'<?php  echo $notifyurl.'/'.$pubid;?>',
                        dataType:'json',
                        success : function(ret){
                            if(ret==1){
                                //成功后返回我的订单页面
                                //location.href="<?php echo base_url().'index.php/wx/myorder';?>";
                            }
                        }
                    });
                    */
                }else
                {
                    //$.alert('支付失败');
                }
                //alert(res.err_code+res.err_desc+res.err_msg);
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
    
    angular.module("myApp",["ionic"])
.controller("MyWXPayCtrl",function($scope){
    
    var a = window.localStorage.getItem('order');
    console.log(a);
    console.log($.parseJSON(a));
    var order = $.parseJSON(a);
    console.log(order);

            //订单详情
            $scope.orderDetail = order.selected;
            //乘客
            $scope.userContacts = order.userContacts;
            //联系人
            $scope.currentContact = order.currentContact;
            //明细单
            $scope.costdetail = order.costdetail;
            //保险
            $scope.Insurance = order.Insurance;
            
            $scope.zhifu = function(){
                callpay();
            };
			
			$scope.retunurl = function(){
                window.location.href = 'http://m.bibi321.com/hl/index.php#/tab/order';
            };
});
    
</script>
</html>
