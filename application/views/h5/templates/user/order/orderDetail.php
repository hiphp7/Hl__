<ion-view view-title="比比旅行">
    <style type="text/css">
        .float_boxt {
            padding-top: 25%;
        }
        .nieut_boxt table tr td {
            line-height: 130%;
        }
    </style>
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="flight_title po_re text_a_c bg_fff pofir">
            <a class="returnbut c_fff f_s18" style='font-size: 1.8rem;' onclick="javascript:history.go(-1);"><span></span>返回</a>
            <span class="f_s18">订单详情</span>
        </div>
    </ion-header-bar>
    <ion-content style="top:0;">
        <!------主页--------->
        <section class="wrap_Box ptHeiht mainbox frompb">

            <section style="display:none" ng-style="loading">
                <!----订单编号-------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 pa_100 bh_spread_shrink">
                    <div class="wrapfix vm f_s12">
                        <div class="fl"><i class="bsit_bosico mr_55 mt-2"><img src='<?php echo base_url("resources/air/image/sm_plane.png"); ?>'></i><span><span class="c_999">订单号：</span><font ng-bind="orderDetail.dingdanhao"></font></span></div>
                        <div class="fr mt_55 f_s13">
                            <span ng-bind="orderDetail.dingdanzonge | currency:'￥'"></span>
                            <!--<span><a class="around text_a_c mr_55 Aaicbut">?</a></span>-->
                            <span ng-bind="orderDetail.statusName" ng-class="getColor(orderDetail.statusName)"></span>
                        </div>
                    </div>
                    <!-----收缩按钮--------->
                    <p class="bsiu_but text_a_c mt_55" style="display:none"><img class="down_arrow_bh" src='<?php echo base_url("resources/air/image/skit.png"); ?>'></p>
                    <!-----收缩按钮  [end]--------->
                </section>
                <!----订单编号  [end]-------->
                <!----航班信息-------->
                <div class="flightTimeBox mt_100">
                    <!-----往------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff goto_spread_shrink">
                        <!-- 收缩效果 -->
                        <section class="f_s12 goto_shrink">
                            <p class="pt_100 c_202020"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><span class="ml_30" ng-bind="orderDetail.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="ml_55 mr_30" ng-bind="orderDetail.hangchengs.goto.qifeijichang + orderDetail.hangchengs.goto.qifeihangzhanlou"></span>-<span class="ml_30" ng-bind="orderDetail.hangchengs.goto.daodajichang + orderDetail.hangchengs.goto.daodahangzhanlou"></span></p>
                            <p class="pt_55 c_999">乘客：<span class="c_202020" ng-repeat="x in orderDetail.hangchengs.goto.hangchenglvkes"><span ng-bind='x.name'></span>&nbsp;</span></p>
                        </section>
                        <!-- 展开效果 -->
                        <div class="goto_spread" style="display:none;">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><font class="ml_55" ng-bind="orderDetail.hangchengs.goto.hangkonggongsi + orderDetail.hangchengs.goto.hangbanhao"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.hangchengs.goto.jixing"></span><span class="ml_55 mr_55" ng-bind="orderDetail.goto.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="c_999 fr" ng-if="orderDetail.hangchengs.goto.gongxianghangbanhao.lenght >0">共享航班(实际乘坐深圳航空ZH9815)</span></p>
                            <div class="fliTimenbox pt_35" style="height: 9.3rem;">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s20" ng-bind="orderDetail.hangchengs.goto.qifeichengshi"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-show="goto.interday >0">
                                        <p class="f_s12">+<span ng-bind="goto.interday"></span>天</p>
                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s20" ng-bind="orderDetail.hangchengs.goto.daodachengshi"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.hangchengs.goto.qifeijichang + orderDetail.hangchengs.goto.qifeihangzhanlou"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-bind="goto.flightTime">2小时20分</span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.hangchengs.goto.daodajichang + orderDetail.hangchengs.goto.daodahangzhanlou">宝安机场T2</span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.hangchengs.goto.qifeishijianchuo*1000 | date : 'HH:mm'">16:40</span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.hangchengs.goto.jingtinglianbiao >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.hangchengs.goto.daodashijianchuo*1000 | date : 'HH:mm'">16:40</span>
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
                            <!-----乘客信息 [end]------------>
                        </div>
                        <!-----收缩按钮--------->
                        <p class="bsiu_but text_a_c pb_55 wid100"><img class="down_arrow_goto" src='<?php echo base_url("resources/air/image/skit.png"); ?>'></p>
                        <!-----收缩按钮  [end]--------->
                    </div>
                    <!-----往 [end]------->
                    <!-----返------->
                    <div class="pl_100 pr_55 border_b_1_dc border_t_1_dc mb_100 pb_55 bg_fff back_spread_shrink" ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1">
                        <!-- 收缩效果 -->
                        <section class="f_s12 back_shrink">
                            <p class="pt_100 c_202020"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">返</span><span class="ml_30" ng-bind="orderDetail.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="ml_55 mr_30" ng-bind="orderDetail.hangchengs.back.qifeijichang + orderDetail.hangchengs.back.qifeihangzhanlou"></span>-<span class="ml_30" ng-bind="orderDetail.hangchengs.back.daodajichang + orderDetail.hangchengs.back.daodahangzhanlou"></span></p>
                            <p class="pt_55 c_999">乘客：<span class="c_202020" ng-repeat="x in orderDetail.hangchengs.back.hangchenglvkes"><span ng-bind='x.name'></span>&nbsp;</span></p>
                        </section>
                        <!-- 展开效果 -->                   
                        <div class="back_spread" style="display:none;">
                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">返</span><font class="ml_55" ng-bind="orderDetail.hangchengs.back.hangkonggongsi + orderDetail.hangchengs.back.hangbanhao"></font><font class="fr pt_35">空客<span ng-bind="orderDetail.hangchengs.back.jixing"></span><span class="ml_55 mr_55" ng-bind="orderDetail.back.cabinName"></span></font></p>
                            <p class="f_s12 pt_35 pb_55 wrapfix"><span class="ml_230" ng-bind="orderDetail.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="c_999 fr" ng-if="orderDetail.hangchengs.back.gongxianghangbanhao.lenght >0">共享航班(实际乘坐深圳航空ZH9815)</span></p>
                            <div class="fliTimenbox pt_35" style="height: 9.3rem;">
                                <div class="toFliTime pb_100">
                                    <span class="wid35 fl text_a_c f_s20" ng-bind="orderDetail.hangchengs.back.qifeichengshi"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-show="back.interday >0">
                                        <p class="f_s12">+<span ng-bind="back.interday"></span>天</p>
                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid30 fl text_a_c">
                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>
                                    </span>
                                    <span class="wid35 fr text_a_c f_s20" ng-bind="orderDetail.hangchengs.back.daodachengshi"></span>
                                </div>
                                <div class="toFliTime mt_100 pt_100 c_808080">
                                    <span class="wid35 fl text_a_c f_s13" ng-bind="orderDetail.hangchengs.back.qifeijichang + orderDetail.hangchengs.back.qifeihangzhanlou"></span>
                                    <span class="wid30 fl text_a_c pt_25" ng-bind="back.flightTime">2小时20分</span>
                                    <span class="wid35 fr text_a_c f_s13" ng-bind="orderDetail.hangchengs.back.daodajichang + orderDetail.hangchengs.back.daodahangzhanlou">宝安机场T2</span>
                                </div>
                                <div class="toFliTime mt_100 pt_100">
                                    <span class="wid40 fl text_a_c f_s16" ng-bind="orderDetail.hangchengs.back.qifeishijianchuo*1000 | date : 'HH:mm'">16:40</span>
                                    <span class="wid20 fl text_a_c f_s12 mt_10 c_138fe1"><span ng-if="orderDetail.hangchengs.back.jingtinglianbiao >0">经停</span></span>
                                    <span class="wid40 fr text_a_c f_s16" ng-bind="orderDetail.hangchengs.back.daodashijianchuo*1000 | date : 'HH:mm'">16:40</span>
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
                            <!-----乘客信息 [end]------------>
                        </div>
                        <!-----收缩按钮--------->
                        <p class="bsiu_but text_a_c pb_55 wid100"><img class="down_arrow_back" src='<?php echo base_url("resources/air/image/skit.png"); ?>'></p>
                        <!-----收缩按钮  [end]--------->
                    </div>
                    <!-----返 [end]------->
                </div>
                <!-----航班信息  [end]------------>
                <!-----联系人和报销证明------------------>
                <section class="bg_fff border_b_1_dc border_t_1_dc wrapfix f_s14 pt_55 pl_55 pr_55">
                    <!----联系人------>
                    <section class="border_b_1_dc wrapfix pa_55">
                        <div class="fl c_999 wid25">联系人：</div>
                        <section class="fl wid75 f_s12">
                            <div class="fl wid30">
                                <p class="mt_10">姓名:</p>
                                <p class="mt_55">手机号:</p> 
                            </div>
                            <section class="fl wid70 box_bb pl_55">
                                <p class="mt_10" ng-bind="yonghu[0].xingming"></p>                            
                                <p class="mt_55" ng-bind="yonghu[0].shoujihaoma"></p>
                            </section>
                        </section>
                    </section>
                    <!----联系人  [end]------>
                    <!----保险信息-------->
                    <section class="wrapfix pa_55">
                        <div class="fl c_999 wid30">保险信息：</div>
                        <section class="fl wid70 f_s12 c_202020">
                            <!----航空意外险-------->
                            <section class="wrapfix">
                                <div class="fl wid35">
                                    <p class="mt_10">航空意外险:</p>
<!--                                    <p class="mt_55">保险公司:</p>-->
                                    <p class="mt_55">保单号:</p>
                                </div>
                                <section class="fl wid65 box_bb pl_55">
                                    <p class="mt_10" ng-if="orderDetail.baoxiandingdans[0] == null">未购买</p>
                                    <p class="mt_10" ng-if="orderDetail.baoxiandingdans[0] != null"><span ng-bind="orderDetail.baoxiandingdans[0].dingdanzongjia | currency:'￥'"></span> x <span ng-bind="orderDetail.hangchenglvkes.length"></span> 人</p>
<!--                                    <p class="mt_55" ng-bind="orderDetail.insurances.accident.insurerName">保险公司</p>-->
                                    <p class="mt_55 overflow_omission policynos" ng-repeat="x in orderDetail.baoxiandingdans" ng-bind="x.baodanhao">保单号</p>
                                </section>
                            </section>
                        </section>
                    </section>
                    <!----保险信息  [end]--------> 
                    <!-- 分隔线 -->
                    <section class="border_b_1_dc"></section>
					<!----报销证明------>
                    <section class="border_b_1_dc wrapfix pa_55" ng-show="orderDetail.shoujianren != null && orderDetail.shoujianren != ''">
                        <div class="fl c_999 wid30">报销证明：</div>
                        <section class="fl wid70 f_s12">
                            <p class="mb_55 mt_10">起飞后的七天内寄出</p>
                            <p class="mb_55 wrapfix"><span class="fl wid30">收件人:</span><span class="fl wid70" ng-bind="orderDetail.shoujianren"></span></p>
                            <p class="mb_55 wrapfix"><span class="fl wid30">手机号:</span><span class="fl wid70" ng-bind="orderDetail.youjirendianhua"></span> </p>
                            <p class="mb_55 wrapfix"><span class="fl wid30">详细地址:</span><span class="fl wid70" ng-bind="orderDetail.youjidizhi"></span></p>
<!--                            <p class="mb_55 wrapfix"><span class="fl wid30">报销方式:</span><span class="fl wid70" ng-bind="orderDetail.isTravelInv==0 ? '行程单' : '旅行发票'"></span></p>
                            <p class="mb_55 wrapfix"><span class="fl wid30">快递单号:</span><span class="fl wid70" ng-bind="orderDetail.expressNo"></span> </p>-->
                        </section>
                    </section>
                    <!----报销证明  [end]------>
                    <section class="border_b_1_dc wrapfix pa_55" ng-show="orderDetail.istaitou=='1' ">
                        <div class="fl c_999 wid30">发票类型：</div>
                        <section class="fl wid70 f_s12">

                            <div class="mb_55 mt_10" ng-bind="orderDetail.fapiaoleixing=='个人' ? '个人' : '企业'"></div>
                            <p class="mb_55 wrapfix"><span class="fl wid30">发票名称:</span><span class="fl wid70" ng-bind="orderDetail.fapiaomingzi"></span></p>
                             <p class="mb_55 wrapfix" ng-if="orderDetail.fapiaoleixing=='企业'"><span class="fl wid30">发票抬头:</span><span class="fl wid70" ng-bind="orderDetail.qiyeshuihao"></span> </p>
                        </section>
                    </section>					
                    <p class="pt_55 pb_55"><a class="c_289deb butchir" ng-click="getMealPolicy('goto' ,$event)"><span>点击查看退改签规则</span><span ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1">(去程)</span></a></p>
                    <p class="pt_55 pb_55" ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1"><a class="c_289deb butchir" ng-click="getMealPolicy('back', $event)">点击查看退改签规则(返程)</a></p>
                </section>
                <!-----联系人和报销证明  [end]------------------>
                
            </section>
        </section>
        <!----主页 [end]------>
    </ion-content>

    <ion-footer-bar align-title="center" class="bar-positive" style="display: none;">
        <div class="c_fff" ng-show="orderDetail.chupiaozhuangtai ==1" style="position: fixed;bottom: 0;width: 100%;left: 50%;margin-left: -50%;height: 3.8rem;line-height: 3rem;padding: 0.4rem;box-sizing: border-box;z-index: 10;">
            <input class="bg_ff6d6d c_fff f_s14 tomaiby fr ml_100" type="button" value="退票" name="" ng-click="refundTicket(orderDetail)" ng-if="x.ketuipiaorenshu > 0 && x.tuipiao_show"/>
            <input class="bg_ff6d6d c_fff f_s14 tomaiby fr ml_100" type="button" value="改期" name="" ng-click="alterTicket(orderDetail)" ng-if="x.kegaiqianrenshu > 0 && x.gaiqi_show"/>

        </div>
    </ion-footer-bar>

<!-- 浮动框增加样式 -->
<style type="text/css">
    ion-popover-view.weizhi {
        top:0 !important;
        left:0 !important;
        right:0 !important;
        bottom: 0 !important;
        width:80% !important;
        margin: auto !important;

        
    }
    .f_s12 td{
        font-size: 1.2rem;
    }
</style>


      <script id="my-tuiqiangai.html" type="text/ng-template">
          <ion-popover-view class="weizhi">
            <ion-content style="margin:0">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fff f_s13 text_a_c">
            <tr>
                <td colspan="4" scope="col" class="f_s15 bg_f6f6f6 text_a_l" style="padding: 0.5rem 0.3rem">退改签规则<span class="fr c_289deb pr_100" ng-bind="wangfan">去程</span></td>
            </tr>
            <!-- 表格-->
           
            <!-- 文字 -->
            <tbody >
                <tr>
                    <td colspan="4" style="border:none">
                        <span class="fl fw_b  text_a_l">退票：</span>
                        <div class="fl  text_a_l">
                            <p class="mb_55 vm">●成人票</p>
                            <p class="mb_55" ng-bind="mealPolicy.adult.refundStipulate"></p>
                            <p class="mb_55 vm">●儿童票</p>
                            <p ng-bind="mealPolicy.child.refundStipulate"></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="border:none">
                        <span class="fl fw_b  text_a_l">改期：</span>
                        <div class="fl  text_a_l">
                            <p class="mb_55 vm">●成人票</p>
                            <p class="mb_55" ng-bind="mealPolicy.adult.changeStipulate"></p>

                            <p class="mb_55 vm">●儿童票</p>
                            <p ng-bind="mealPolicy.child.changeStipulate"></p>
                            

                        </div>
                    </td>
                </tr>
				<tr>
                    <td colspan="4" style="border:none">
                        <span class="fl fw_b  text_a_l">签转：</span>
                        <div class="fl  text_a_l">
                            <p class="mb_55 vm">●成人票</p>
                            <p class="mb_55" ng-bind="mealPolicy.adult.modifyStipulate"></p>
                            <p class="mb_55 vm">●儿童票</p>
                            <p ng-bind="mealPolicy.child.modifyStipulate"></p>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="bg_f6f6f6 pt_55">若需购买婴儿票，请拨打客服电话:400-991-7909</p>
            </ion-content>
            </ion-popover-view>
        </script>
<script type="text/javascript">
                $(function() {
                    //订单编号收缩或展开
                    //publicFunction.silderFn("sbidicon", "sbid");
                    //订单编号收缩或展开
                    //$(document).on("click", ".bh_spread_shrink", function () {
                    $(".bh_spread_shrink").on("click", function() {
                        var nsdisplay = $(this).find(".bh_shrink").css("display");
                        if (nsdisplay == "none") {
                            $(this).parent().find(".down_arrow_bh").addClass("salse180").removeClass("salse000");
                            $(this).find(".bh_shrink").stop().slideDown();
                        } else {
                            $(this).parent().find(".down_arrow_bh").addClass("salse000").removeClass("salse180");
                            $(this).find(".bh_shrink").stop().slideUp();
                        }
                    });
                    //去程收缩或展开
                    //$(document).on("click", ".goto_spread_shrink", function () {
                    $(".goto_spread_shrink").on("click", function() {
                        var nsdisplay = $(this).parent().find(".goto_spread").css("display");
                        if (nsdisplay == "none") {
                            $(this).parent().parent().find(".down_arrow_goto").addClass("salse180").removeClass("salse000");
                            $(this).parent().find(".goto_spread").stop().slideDown();
                            $(this).parent().find(".goto_shrink").stop().slideUp();
                            $(this).parent().find(".nskkt_box1 > div:last").removeClass("border_b_1_dc");
                        } else {
                            $(this).parent().parent().find(".down_arrow_goto").addClass("salse000").removeClass("salse180");
                            $(this).parent().find(".goto_shrink").stop().slideDown();
                            $(this).parent().find(".goto_spread").stop().slideUp();
                        }
                    });
                    //回程收缩或展开
                    //$(document).on("click", ".back_spread_shrink", function () {
                    $(".back_spread_shrink").on("click", function() {
                        var nsdisplay = $(this).parent().find(".back_spread").css("display");
                        if (nsdisplay == "none") {
                            $(this).parent().parent().find(".down_arrow_back").addClass("salse180").removeClass("salse000");
                            $(this).parent().find(".back_spread").stop().slideDown();
                            $(this).parent().find(".back_shrink").stop().slideUp();
                            $(this).parent().find(".nskkt_box2 > div:last").removeClass("border_b_1_dc");
                        } else {
                            $(this).parent().parent().find(".down_arrow_back").addClass("salse000").removeClass("salse180");
                            $(this).parent().find(".back_shrink").stop().slideDown();
                            $(this).parent().find(".back_spread").stop().slideUp();
                        }
                    });
                    //保单号收缩或展开
                    //$(document).on("click", ".policynos", function () {
                    $(".policynos").on("click", function() {
                        var bool = $(this).parent().find(".policynos").hasClass("overflow_omission");
                        if (bool) {
                            $(this).parent().find(".policynos").removeClass("overflow_omission");
                        } else {
                            $(this).parent().find(".policynos").addClass("overflow_omission");
                        }
                    });
                    //查看退改签规则
                   // publicFunction.clickShow("butchir", "nieut_boxt");
                   // publicFunction.clickHide("nieut_boxt", "nieut_boxt");
                });
</script>

 <script id="templates/airtuigai.html" type="text/ng-template">
	    <ion-modal-view style="width: 100%;height: 100%;top:0px;left:0px">
	    <ion-header-bar align-title="center" class="" style="background: grey;">

	    <span class="title">退改签规则</span>
           <div class="buttons" style="margin-top: 10px;">
				<img src='<?php echo base_url("resources/air/image/tuigai_cha.png"); ?>' class="mr_55" style="height: 15px;height: 15px;" ng-click="airtuigai.hide()">
			</div>
	    </ion-header-bar>
	    <ion-content has-subheader="false">

        <!-- 退改签说明： -->
        <div style="margin-left: 5px;">

            <div style="font-size: 20px;margin-bottom: 15px;margin-top: 5px;">成人票:</div>
            <div style="margin-left: 20px;">
                    <div style="line-height: 30px;">
                        <div>
                            <div style="width: 15%; float: left;">退票费</div>
                            <div style="width: 80%; float: left;" ng-if="adult['refundTimePointAadvance'] != ''">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['refundTimePointAadvance']}}小时之前 <span style="right: 20px; float: right;">{{adult['refundPercentAdvance']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['refundTimePointAadvance']}}小时到{{adult['refundTimePoint']}}小时之前<span style="right: 20px; float: right;">{{adult['refundPercentBefore']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['refundTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{adult['refundPercentAfter']}}</span></div>
                                </div>                                
                            </div>
                            <div style="width: 80%; float: left;" ng-if="adult['refundTimePointAadvance'] == '' && adult['refundTimePoint'] != 0 && adult['refundTimePoint'] != '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['refundTimePoint']}}小时之前 <span style="right: 20px; float: right;">{{adult['refundPercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['refundTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{adult['refundPercentAfter']}}</span></div>
                                </div>
                            </div>

                            <div style="width: 80%; float: left;" ng-if="adult['refundTimePointAadvance'] == '' && adult['refundTimePoint'] == 0 && adult['refundTimePoint'] != '' ">

                                <div style="width: 100%; float: left;" ng-if="adult['refundPercentBefore'] == 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>

                                <div style="width: 100%; float: left;" ng-if="adult['refundPercentBefore'] != 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">{{adult['refundPercentBefore']}}</span></div>
                                </div>

                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">{{adult['refundPercentAfter']}}</span></div>
                                </div>
                            </div>

                            <div style="width: 80%; float: left;" ng-if="adult['refundTimePointAadvance'] == '' &&  adult['refundTimePoint'] == '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">免费</span></div>
                                </div>
                            </div>     


                        </div>
                        <div style="clear: both;"></div>
                        <div>
                            <div style="width: 15%; float: left;">改期费</div>
                            <div style="width: 80%; float: left;" ng-if="adult['changeTimePointAdvance'] != ''">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['changeTimePointAdvance']}}小时之前 <span style="right: 20px; float: right;">{{adult['changePercentAdvance']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['changeTimePointAdvance']}}小时到{{adult['changeTimePoint']}}小时之前<span style="right: 20px; float: right;">{{adult['changePercentBefore']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['changeTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{adult['changePercentAfter']}}</span></div>
                                </div>                                
                            </div>
                            <div style="width: 80%; float: left;" ng-if="adult['changeTimePointAdvance'] == '' && adult['changeTimePoint'] != 0 && adult['changeTimePoint'] != '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['changeTimePoint']}}小时之前 <span style="right: 20px; float: right;">{{adult['changePercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{adult['changeTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{adult['changePercentAfter']}}</span></div>
                                </div>
                            </div>
                            <div style="width: 80%; float: left;" ng-if="adult['changeTimePointAdvance'] == '' && adult['changeTimePoint'] == 0 && adult['changeTimePoint'] != '' ">
                                <div style="width: 100%; float: left;" ng-if="adult['changePercentBefore'] == 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>

                                <div style="width: 100%; float: left;" ng-if="adult['changePercentBefore'] != 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">{{adult['changePercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">{{adult['changePercentAfter']}}</span></div>
                                </div>
                            </div>
                            

                            <div style="width: 80%; float: left;" ng-if="adult['changeTimePointAdvance'] == '' && adult['changeTimePoint'] == '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">免费</span></div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>


            <div style="clear: both;"></div>

            <hr style="margin: 15px;" />  
            <div style="font-size: 20px;margin-bottom: 15px;margin-top: 5px;">儿童票:</div>
            <div style="margin-left: 20px;"
                    <div style="line-height: 30px;">
                        <div>
                            <div style="width: 15%; float: left;">退票费</div>
                            <div style="width: 80%; float: left;" ng-if="child['refundTimePointAadvance'] != ''">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['refundTimePointAadvance']}}小时之前 <span style="right: 20px; float: right;">{{child['refundPercentAdvance']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['refundTimePointAadvance']}}小时到{{child['refundTimePoint']}}小时之前<span style="right: 20px; float: right;">{{child['refundPercentBefore']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['refundTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{child['refundPercentAfter']}}</span></div>
                                </div>                                
                            </div>
                            <div style="width: 80%; float: left;" ng-if="child['refundTimePointAadvance'] == '' && child['refundTimePoint'] != 0 && child['refundTimePoint'] != '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['refundTimePoint']}}小时之前 <span style="right: 20px; float: right;">{{child['refundPercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['refundTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{child['refundPercentAfter']}}</span></div>
                                </div>
                            </div>

                            <div style="width: 80%; float: left;" ng-if="child['refundTimePointAadvance'] == '' && child['refundTimePoint'] == 0 && child['refundTimePoint'] != '' ">
                                <div style="width: 100%; float: left;" ng-if="child['refundPercentBefore'] == 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>

                                <div style="width: 100%; float: left;" ng-if="child['refundPercentBefore'] != 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">{{child['refundPercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">{{child['refundPercentAfter']}}</span></div>
                                </div>
                            </div>
                            <div style="width: 80%; float: left;" ng-if="child['refundTimePointAadvance'] == '' && child['refundTimePoint'] == '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">免费</span></div>
                                </div>
                            </div>

                        </div>
                        <div style="clear: both;"></div>
                        <div>
                            <div style="width: 15%; float: left;">改期费</div>
                            <div style="width: 80%; float: left;" ng-if="child['changeTimePointAdvance'] != ''">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['changeTimePointAdvance']}}小时之前 <span style="right: 20px; float: right;">{{child['changePercentAdvance']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['changeTimePointAdvance']}}小时到{{child['changeTimePoint']}}小时之前<span style="right: 20px; float: right;">{{child['changePercentBefore']}}</span></div>

                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['changeTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{child['changePercentAfter']}}</span></div>
                                </div>                                
                            </div>
                            <div style="width: 80%; float: left;" ng-if="child['changeTimePointAdvance'] == '' && child['changeTimePoint'] != 0 && child['changeTimePoint'] != '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['changeTimePoint']}}小时之前 <span style="right: 20px; float: right;">{{child['changePercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞{{child['changeTimePoint']}}小时内及飞后<span style="right: 20px; float: right;">{{child['changePercentAfter']}}</span></div>
                                </div>
                            </div>

                            <div style="width: 80%; float: left;" ng-if="child['changeTimePointAdvance'] == '' && child['changeTimePoint'] == 0 && child['changeTimePoint'] != '' ">
                                <div style="width: 100%; float: left;" ng-if="child['changePercentBefore'] == 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>

                                <div style="width: 100%; float: left;" ng-if="child['changePercentBefore'] != 0">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">{{child['changePercentBefore']}}</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">{{child['changePercentAfter']}}</span></div>
                                </div>
                            </div>
                            <div style="width: 80%; float: left;" ng-if="child['changeTimePointAdvance'] == '' && child['changeTimePoint'] == '' ">
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞前 <span style="right: 20px; float: right;">免费</span></div>
                                </div>
                                <div style="width: 100%; float: left;">
                                    <div style="margin-right:10px;">起飞后<span style="right: 20px; float: right;">免费</span></div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>

               <div style="clear: both;"></div>
               <hr style="margin: 15px;" />
               <div>注意：<span style="color: red;">成人票儿童票不可签转</span></div>
               <div style="font-size:20px;margin-top: 10px; margin-bottom: 10px;">备注:</div>
               <div style="line-height: 25px;">以上均为乘客自愿退改签规则，非自愿退改签规则以可适用法律及航空公司规定为准。航空公司规定以各航空公司官方网站的公示为准。</div>
               <div style="line-height: 25px;">申请改签，同舱位变更时，如变更  前后的票面价之间存在差价，需补足差价；如同时存在改期手续费和升舱费，则需同时收取改期手续费和舱位差额</div>

        </div>



	    </ion-content>
	    </ion-modal-view>
    </script>
</ion-view>