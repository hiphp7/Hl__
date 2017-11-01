<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive"style="width:100%;padding:0;">
        <div style="width:100%;height:44px;line-height: 44px;text-align: center;">
            <a class="returnbut c_fff" style="font-size: 1.6rem;" onclick="javascript:history.go(-1);"><span></span>返回</a>
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
                            <div class="border_b_1_dc mb_55" ng-repeat="x in userContacts">
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
                                <p class="mt_10" ng-bind="currentContact.zhanghu"></p>                            
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
            <input class="bg_ff6d6d c_fff f_s14 tomaiby fr ml_100" type="button" value="支付"/>
        </div>
    </ion-footer-bar>
</ion-view>