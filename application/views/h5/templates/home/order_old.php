
<style type="text/css">
    .f_s12 {
        font-size: 1.2rem;
    }
    .f_s15 {
        font-size: 1.5rem;
    }

    .pa_55 {
        padding: 0.55rem;
    }
    .pay_55 {
        padding: 0.55rem;
    }
    .mb_55 {
        margin-bottom: 0.55rem;
    }

    p.c_ff6d6d{
        color: #ff6d6d;
    }
    .mb_100 {
        margin-bottom: 0rem;
    }
    p.f_s14 {
        font-size: 1.4rem;
    }

    .bar-header{
        height: 4rem;
    }
    .size {
        top:4rem;
    }
    div.bsit_heig{
        height: 4rem;
        line-height: 3rem;
        cursor: pointer;
    }
    p.bsit_heig{
        height: 4rem;
        line-height: 3rem;
        cursor: pointer;
    }

</style>
<ion-view view-title="比比旅行" style="background-color: #F6F6F6;" ng-init="homeInit()">
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="flight_title po_re text_a_c bg_fff pofir">

            <a class="returnbut c_fff f_s18" ng-click="gotoQuery();"><span></span>返回</a>

            <span  style="display:block" ng-style="loading">

                <span class="f_s18" ng-bind="selected.goto.depCity"></span>

                <!---去的标签------>

                <i class="fan_icon ml_55" ng-if="selected.back.date ==''"></i>

                <!---去的标签 [end]------>

                <!---往返的标签------>

                <i class="fan_icon_toform ml_55" ng-if="selected.back.date !=''"></i>

                <!---往返标签 [end]------>

                <span class="f_s18" ng-bind="selected.goto.arrCity"></span>

            </span>

        </div>
    </ion-header-bar>




    <ion-content scroll="false" class='size' >

        <ion-scroll style="height: 100%;" >
            <!-- <ion-refresher on-refresh="doRefresh()"></ion-refresher> -->
            <ion-list >
            <ion-item style="padding:0.7rem;">
                 <section style="display:true" ng-style="loading">

                    <!----航班信息-------->

                    <div class="flightTimeBox">

                    <div class="border_b_1_dc bg_fff goto_spread_shrink" ng-click="goto_spread_shrink($event)">

                        <!-----往------->

                        <!-- 收缩效果 -->

                        <section class="f_s12 goto_shrink">

                            <p class="pt_100 c_808080"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><span class="ml_55" ng-bind="selected.goto.date | date:'M月dd日'">4月20日</span><span class="ml_55" ng-bind="selected.goto.week">周三</span><span class="ml_55" ng-bind="selected.goto.flight.depTime">16:30</span><span class="ml_100 mr_55" ng-bind="selected.goto.flight.orgAirport + selected.goto.flight.orgJetquay[0]">宝安机场T2</span>-<span class="ml_55 mr_55" ng-bind="selected.goto.flight.dstAirport + selected.goto.flight.dstJetquay[0]">虹桥机场T3</span></p>                       

                        </section>

                        <!-- 展开效果 -->

                        <div class="goto_spread" style="display:none;">

                            <p class="pt_100 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">往</span><font class="ml_55" ng-bind="selected.goto.flight.gs + selected.goto.flight.flightNo[0]">东方航空</font><font class="fr pt_35">空客<span ng-bind="selected.goto.flight.planeType[0]"></span><span class="ml_55 mr_55" ng-bind="selected.goto.seatItem.seatMsg"></span></font></p>

                            <p class="f_s12 c_999 pt_55 pb_55" ng-if="selected.goto.flight.codeShare[0] ==1">共享航班(实际乘坐深圳航空ZH9815)</p>

                            <div class="flibox pt_55">

                                <div class="toFliTime pb_100">

                                    <span class="wid35 fl text_a_c f_s18" ng-bind="selected.goto.depCity">深圳</span>

                                    <span class="wid30 fl text_a_c pt_25" ng-if="selected.goto.interday >0">

                                        <p class="f_s12">+<span ng-bind="selected.goto.interday"></span>天</p>

                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='<?php echo base_url("resources/air/image/fdfdv.png");?>'></p>

                                    </span>

                                    <span class="wid30 fl text_a_c" ng-if="selected.goto.interday ==0">

                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png"); ?>'></p>

                                    </span>

                                    <span class="wid35 fr text_a_c f_s18" ng-bind="selected.goto.arrCity">上海</span>

                                </div>

                                <div class="toFliTime mt_100 pt_55 c_808080">

                                    <span class="wid35 fl text_a_c f_s12" ng-bind="selected.goto.flight.orgAirport + selected.goto.flight.orgJetquay[0]">宝安机场T2</span>

                                    <span class="wid30 fl text_a_c pt_10 f_s11" ng-bind="selected.goto.flightTime">2小时20分</span>

                                    <span class="wid35 fr text_a_c f_s12" ng-bind="selected.goto.flight.dstAirport + selected.goto.flight.dstJetquay[0]">宝安机场T2</span>

                                </div>

                                <div class="toFliTime mt_100 pt_100">

                                    <span class="wid35 fl text_a_c f_s14" ng-bind="selected.goto.flight.depTime">16:40</span>

                                    <span class="wid30 fl text_a_c f_s12 pt_10 c_138fe1" ng-if="selected.goto.flight.stopnum[0] ==1">经停</span>

                                    <span class="wid35 fr text_a_c f_s14" ng-bind="selected.goto.flight.arriTime">16:40</span>

                                </div>

                            </div>

                        </div>
                        <!-----往 [end]------->



                        <!-----返------->

                        <!-- 收缩效果 -->
                        <section class="f_s12 goto_shrink"  ng-if="selected.back.date != ''">

                            <p class="pt_55 c_808080"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">返</span><span class="ml_55" ng-bind="selected.back.date | date:'M月dd日'">4月20日</span><span class="ml_55" ng-bind="selected.back.week">周三</span><span class="ml_55" ng-bind="selected.back.flight.depTime">16:30</span><span class="ml_100 mr_55" ng-bind="selected.back.flight.orgAirport + selected.back.flight.orgJetquay[0]">宝安机场T2</span>-<span class="ml_55 mr_55" ng-bind="selected.back.flight.dstAirport + selected.back.flight.dstJetquay[0]">虹桥机场T3</span></p>

                        </section>
                        <!-- 展开效果 -->

                        <div class="goto_spread" style="display:none;"  ng-if="selected.back.date != ''">

                            <p class="pt_55 f_s12 c_999 wrapfix"><span class="yiau_boxt dp_i_b c_fff bg_289deb text_a_c border_1_2cafff">返</span><font class="ml_55" ng-bind="selected.back.flight.gs + selected.back.flight.flightNo[0]">东方航空</font><font class="fr pt_35">空客<span ng-bind="selected.back.flight.planeType[0]"></span><span class="ml_55 mr_55" ng-bind="selected.back.seatItem.seatMsg"></span></font></p>

                            <p class="f_s12 c_999 pt_55 pb_55" ng-if="selected.back.flight.codeShare[0] ==1">共享航班(实际乘坐深圳航空ZH9815)</p>

                            <div class="flibox pt_55">

                                <div class="toFliTime pb_100">

                                    <span class="wid35 fl text_a_c f_s18" ng-bind="selected.back.depCity">深圳</span>

                                    <span class="wid30 fl text_a_c pt_25" ng-if="selected.back.interday >0">

                                        <p class="f_s12">+<span ng-bind="selected.back.interday"></span>天</p>

                                        <p class="maxIcon pl_150 pr_150 mt-2"><img src='<?php echo base_url("resources/air/image/fdfdv.png");?>'></p>

                                    </span>

                                    <span class="wid30 fl text_a_c" ng-if="selected.back.interday ==0">

                                        <p class="maxIcon pl_150 mt_150 pr_150"><img src='<?php echo base_url("resources/air/image/fdfdv.png");?>'></p>

                                    </span>

                                    <span class="wid35 fr text_a_c f_s18" ng-bind="selected.back.arrCity">上海</span>

                                </div>

                                <div class="toFliTime mt_100 pt_55 c_808080">

                                    <span class="wid35 fl text_a_c f_s12" ng-bind="selected.back.flight.orgAirport + selected.back.flight.orgJetquay[0]">宝安机场T2</span>

                                    <span class="wid30 fl text_a_c pt_25 f_s11" ng-bind="selected.back.flightTime">2小时20分</span>

                                    <span class="wid35 fr text_a_c f_s12" ng-bind="selected.back.flight.dstAirport + selected.back.flight.dstJetquay[0]">宝安机场T2</span>

                                </div>

                                <div class="toFliTime mt_100 pt_100">

                                    <span class="wid35 fl text_a_c f_s14" ng-bind="selected.back.flight.depTime">16:40</span>

                                    <span class="wid30 fl text_a_c f_s12 pt_35 c_138fe1" ng-if="selected.back.flight.stopnum[0] ==1">经停</span>

                                    <span class="wid35 fr text_a_c f_s14" ng-bind="selected.back.flight.arriTime">16:40</span>

                                </div>

                            </div>

                        </div>



                        <!-- 返 [end] -->



                        <!-- 收缩按钮 -->

                        <p class="bsiu_but text_a_c pb_55 wid100"><img class="down_arrow_goto" src='<?php echo base_url("resources/air/image/skit.png");?>'></p>

                        <!-- 收缩按钮  [end] -->

                    </div>





                    </div>

                    <!-- 航班信息  [end] -->



                    <ul class="moniylist bg_fff pt_55 pb_55 wrapfix f_s12 text_a_c mb_100">

                        <li class="border_r_1_e9 fl"><p class="mb_55">成人票</p><p class="c_ff6d6d">￥<span ng-bind="costdetail.goto.adult.unitprice + costdetail.back.adult.unitprice"></span></p></li>

                        <li class="border_r_1_e9 fl"><p class="mb_55">儿童票</p><p class="c_ff6d6d">￥<span ng-bind="costdetail.goto.child.unitprice + costdetail.back.child.unitprice"></span></p></li>

                        <li class="border_r_1_e9 fl"><p class="mb_55">民航基金</p><p class="c_ff6d6d">￥<span ng-bind="costdetail.goto.total.airporttax + costdetail.back.total.airporttax"></span></p></li>

                        <li class="fl"><p class="mb_55">退改签</p><a class="c_289deb butchir" ng-click="getMealPolicy($event)">点击查看</a></li>

                    </ul>
                </div>

             </section>    

            <!-- 填写信息 -->
            



            </ion-item>
            <ion-item style="padding:0.7rem;">
                <section class="f_s14">
                   <!-- 乘客信息 -->

                    <div class="bg_fff mb_100 border_t_1_e9">

                        <div class="bsit_heig pa_55 border_b_1_e9 po_re">
                        <div style="float: left">

                            乘客信息<span class="ml_100 f_s12 c_999"><span ng-bind="currentselected.adult.count" ng-model="currentselected.adult.count"></span><span>成人</span></span><span class="ml_100 f_s12 c_999"><span ng-bind="currentselected.child.count" ng-model="currentselected.child.count">></span><span>儿童</span></span>
                             </div>
                            <div>

                            <a class="addNewBut fr addIcon" ng-if="(currentselected.adult.count + currentselected.child.count) > 0 " ng-click="passenger()">更改乘客</a>
                            </div>

                        </div>

                        <div class="bsit_heig pa_55 border_b_1_e9 c_289deb f_s14 text_a_c bg_fff addIcon" ng-if="(currentselected.adult.count + currentselected.child.count) == 0"  ng-click="passenger()">

                            <span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增乘客


                        </div>

                        <ul class="cenBox mancenit">

                            <li class="border_b_1_e9 po_re" ng-repeat="x in userContacts" ng-if="x.chk == true">

                                <!-- 删除按钮 -->

                                <i class="deleteIcon" ng-click="selectedRemove($index)"></i>

                                <!-- 删除按钮 [end] -->

                                <div ng-click="displayUserContact(true,$index)">

                                    <p class="f_s14 "><span class="mr_200" ng-bind="x.zhongwenming" ng-model="x.name"></span><span class="bst_jdir c_289deb f_s12" ng-if="x.type ==1">儿童</span></p>

                                    <p class="f_s12 pt_55"><span class="mr_200" ng-bind="x.zhengjianleixing"></span><span ng-bind="x.zhengjianhaoma"></span></p>

                                </div>

                                <!-- 方向按钮 -->

                                <i class="nwpo_boti" ng-click="displayUserContact(true,$index)"></i>

                                <!-- 方向按钮  [end] -->

                            </li>

                        </ul>

                    </div>

                    <!-- 乘客信息 [end] -->

<!-- 
                    <p class="bg_fffbde c_999 f_s12 text_a_c border_b_1_e9 pt_100 pb_100 mb_100" ng-show=""><span class="sit_bsitd dp_i_b text_a_c mr_55">!</span>该舱位儿童不可订，请选择其他舱位或拨打客服电话。</p> -->
                </section>
            </ion-item>
            <ion-item style="padding:0.7rem;">
                <section class="f_s14" style="font-size:1.3rem;">
                <!-- 联系人信息 -->

                <section class="bg_fff mb_100 border_t_1_e9">


                    <p class="bsit_heig pa_55 border_b_1_e9 po_re">

                        <span class="fl f_s13">联系人信息<span class="ml_55 f_s13 c_999">用于接收短信</span></span>

                        <a class="addNewBut fr contactsBut" ng-show="currentContact.xingming !='' && sf == '' " ng-click="contacts(true)">编辑联系人</a>

                    </p>

                    <div class="bsit_heig pa_55 border_b_1_e9 c_289deb text_a_c f_s14  bg_fff addIcon" ng-show="currentContact == '' || currentContact.xingming ==''" ng-click="contacts(false)">
                        <span class="cuisiAdd  dp_i_b f_s14 mr_55">+</span>添加联系人

                    </div>



                    <div ng-show="currentContact != '' && currentContact.xingming !='' ">

                        <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                            <span class="dp_i_b fl pr_55 ">姓名</span>

                            <span class="fl" ng-bind="currentContact.xingming">张三</span>

                        </div>

                        <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                            <span class="dp_i_b fl pr_55 ">手机号</span>

                            <span class="fl" ng-bind="currentContact.shoujihaoma">张三</span>

                        </div>

                    </div>

                </section>

                <!-- 联系人信息 [end] -->
                </section>
            </ion-item>
            <ion-item style="padding:0.7rem 0.7rem 0;margin-bottom: 2rem;">
                <section class="f_s14">
                <!--航空意外险-->

                <div class="dp_b po_re border_b_1_e9  pay_55 bg_fff" ng-show="accidents.length >0">     
                    <div class="f_s15 c_181818 mb_55  pr_300">
                        <div style="position:absolute">
                        航空意外险<a class="yiauhsj text_a_c ml_55 Aaicbut " ng-click="Aaicbut($event)">?</a>
                        </div>
                        <select class=" bsit_bvoxt c_999 fr" ng-model="selectedidx" ng-init="selectedidx='0'" ng-change="changeInsurance(accidents[selectedidx])" ng-disabled="!Insurance.accident.buy">
                            <option value="{{$index}}" ng-repeat="x in accidents" ng-bind="x.xiaoshoudanjia * tripCount | number:2"></option>
                        </select>
                        <span class="f_s12 c_999 fr mr_55 bsit_span" ng-show="tripCount ==2">往返共</span>
                    </div>
                    <div style="clear:both"></div>

                    <div class="f_s12 pr_300 wrapfix" style="position:relative;padding-top: 6px;">

                        <span class="c_535353 fl">最高赔付<font class="c_ff6d6d" ng-bind="accident.baoxianjine * tripCount | currency:'￥'">￥320万</font></span>

                        <span class="c_ff6d6d fr"><span ng-bind="accident.xiaoshoudanjia * tripCount | currency:'￥'"></span> X 1人</span>

                    </div>

                    <span class="nbsut_box"><input type="checkbox" id="checkbox-h-1" class="regular-checkbox" ng-model="Insurance.accident.buy" ng-change="checkedInsurance(Insurance.accident.buy,accident,0)" /><label class="vm" for="checkbox-h-1"></label></span>

                </div>

                <!---航空意外险  [end]-->

                <!--延误取消险-->
                <!--
                <div class="dp_b po_re border_b_1_e9 bg_fff pay_55 mb_100" ng-show="dallyovers.length >0">

                    <p class="f_s15 c_181818 mb_55 pr_300">延误取消险<a class="yiauhsj text_a_c ml_55 Yuanbut" ng-click="Yuanbut($event)">?</a></p>

                    <div class="f_s12 pr_300 wrapfix">

                        <span class="c_535353 fl">最高赔付<font class="c_ff6d6d" ng-bind="dallyover.xiaoshoudanjia * tripCount | currency:'￥'"></font></span>

                        <span class="c_ff6d6d fr"><span ng-bind="dallyover.xiaoshoudanjia * tripCount | currency:'￥'"></span> X 1人</span>

                    </div>

                    <span class="nbsut_box"><input type="checkbox" id="checkbox-q-1" class="regular-checkbox" ng-model="Insurance.dallyover.buy" ng-change="checkedInsurance(Insurance.dallyover.buy,dallyover,2)" /><label class="vm" for="checkbox-q-1"></label></span>

                </div>
                -->
                <!-- 延误取消险  [end] -->

                <!---邮寄报销证明-->

                <section class="put_input bg_fff border_t_1_e9">

                    <div class="bsit_heig pa_55 border_b_1_e9 po_re " ng-click="chooseMail(mail.isMail)">

                        快递报销证明<span class="ml_55 f_s11 c_999">将在起飞后的7天内寄出 <font class="c_ff6d6d f_s12" ng-bind="mail.displayprice | currency:'￥'">￥15</font></span>



                        <span class="sniu_spoc" style="top:0px;margin-top:5px"><input type="checkbox" id="yuan-1-2" class="regular-checkbox gubsit_bug" ng-model="mail.isMail"  /><label class="dp_i_b" for="yuan-1-2"></label></span>

                    </div>

                    <section class="niu_ubox" style="display:none;" ng-style="display.mail">

                        <p class="bsit_heig pa_55 border_b_1_e9 po_re">

                            <a class="addNewBut fl maiaddadbut" ng-show="mail.shoujianrenmingzi !=''" ng-click="cancel(false)">取消收件地址</a>

                            <a class="addNewBut fr maiaddadbut" ng-show="mail.shoujianrenmingzi !=''" ng-click="address()">更改收件地址</a>

                        </p>

                        <!-- ---没有收件人信息显示有收件人就不显示 -->

                        <p class="bsit_heig pa_55 border_b_1_e9 po_re c_289deb text_a_c maiaddadbut" ng-show="mail.shoujianrenmingzi ==''" ng-click="address()"<span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增收件地址</p>

                        <!-- 没有收件人信息显示 [end] -->

                        <div ng-show="mail.shoujianrenmingzi !=''">

                            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix shwis_box">

                                <span class="dp_i_b fl pr_55 ">收件人</span>

                                <div class="ksiu_butbox fl po_re" ng-bind="mail.shoujianrenmingzi">张三<i class="nwpo_boti"></i></div>

                            </div>

                            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                                <span class="dp_i_b fl pr_55 ">手机号</span>

                                <div class="ksiu_butbox fl" ng-bind="mail.shoujihao">13689089632</div>

                            </div>

                            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                                <span class="dp_i_b fl pr_55 ">详细地址</span>

                                <div class="ksiu_butbox_ns02 fl " ng-bind="mail.dizhi">广东省深圳市福田区八卦二路</div>

                            </div>
							
							<div class="list">
								<a class="item item-icon-right" style="padding: 1rem 0.5rem;border: none;" ng-click="gotoTaitou();">
									<span class="f_s13" ng-show="taitou.name ==''">发票抬头</span>
									<span ng-show="taitou.name !=''">
										<div class="f_s13" ng-bind="taitou.name">深圳航旅发展有限公司</div>
										<div class="f_s11 c_999"><span ng-bind="taitou.type" class="mr_55">企业</span><span ng-bind="taitou.shuihao">1111111111</span></div>
									</span>
									<i class="icon ion-ios-arrow-right" style="font-size: 2.3rem;"></i>
								</a>
							</div>

                        </div>

                    </section>

                </section>

                <!-- 邮寄报销证明  [end] -->
                </section>
            </ion-item>

            </ion-list>
            <!-- <ion-infinite-scroll on-infinite="loadMore()"></ion-infinite-scroll> -->
        </ion-scroll>
    </ion-content>


    <ion-footer-bar align-title="left"  style="height: 3.8rem;line-height: 3rem;padding: 0.4rem;background-color: #2577E3;z-index: 10" class="dd">


                <div class=" c_fff" style="width: 100%;">

                    <span class="f_s14 fl">订单总额:<span class="c_ff6d6d" ng-bind="costdetail.totalprice | currency:'￥'"></span></span>

                    <input id='order_zhifu_sf_btn' name="order_zhifu_btn" type="button" value="去支付" ng-show="issf == 1" class="bg_ff6d6d c_fff f_s14 tomaiby fr" style="text-align: center;" ng-click="postOrder()" ng-disabled="disable.btnPost" />
                    <!--
	            <a id='order_zhifu_zy_btn' ng-show="issf == 0" href='<?php echo site_url("wx/zhifu");?>' class="bg_ff6d6d c_fff f_s14 tomaiby fr" ng-click="postOrder()" ng-disabled="disable.btnPost">去支付</a>
                    -->
                    <a id='order_zhifu_zy_btn' ng-show="issf == 0" href='#' class="bg_ff6d6d c_fff f_s14 tomaiby fr" style="text-align: center;" ng-click="postOrder()" ng-disabled="disable.btnPost">去支付</a>
                    <span class="bitu_bg c_fff f_s12 fr mr_100 vm " ng-show="costdetail.totalprice >0 " ng-click="mingxi()">明细<i class="dp_i_b ml_55 salse000"></i></span>

                </div>
    </ion-footer-bar>

    <!------ 明细单---------->

    <section class="minsjBox" style="display:none;" >

        <div class="nir_pox_box bg_fff f_s14" style="bottom: 6rem;padding-bottom:3rem;">

            <div ng-show="costdetail.goto.totalprice >0">

                <h2 class="f_s14"><b>去程</b></h2>

                <p ng-show="costdetail.adult.count > 0"><span class="fl">成人票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.adult.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>

                <p ng-show="costdetail.child.count > 0"><span class="fl">儿童票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.child.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.child.count"></span>人</span></p>

                <p ng-show="costdetail.adult.count > 0"><span class="fl">民航基金</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.goto.total.airporttax | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>

                <p ng-show="Insurance.accident.buy"><span class="fl">航空意外险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.accident.goto.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>

                <p ng-show="Insurance.dallyover.buy"><span class="fl">航班延误险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.dallyover.goto.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>

            </div>

            <div class="border_t_1_e9 pt_55" ng-show="costdetail.back.totalprice >0">

                <h2 class="f_s14"><b>回程</b></h2>

                <p ng-show="costdetail.adult.count > 0"><span class="fl">成人票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.adult.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>

                <p ng-show="costdetail.child.count > 0"><span class="fl">儿童票</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.child.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.child.count"></span>人</span></p>

                <p ng-show="costdetail.adult.count > 0"><span class="fl">民航基金</span><span class="fr c_ff6d6d"><span ng-bind="costdetail.back.total.airporttax | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count"></span>人</span></p>

                <p ng-show="Insurance.accident.buy"><span class="fl">航空意外险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.accident.back.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>

                <p ng-show="Insurance.dallyover.buy"><span class="fl">航班延误险</span><span class="fr c_ff6d6d"><span ng-bind="Insurance.dallyover.back.unitprice | currency:'￥'"></span> x <span ng-bind="costdetail.adult.count + costdetail.child.count"></span>人</span></p>

            </div>

            <div class="border_t_1_e9 pt_55" ng-show="mail.isMail">

                <p><span class="fl">行程单快递费</span><span class="fr c_ff6d6d" ng-bind="costdetail.expressfee | currency:'￥'"></span></p>

            </div>

        </div>


    </section>

    <!------ 明细单  [end]---------->


    <!----舱位售完提示----------------------->

    <section class="tisomeBox" style="display:none" ng-style="myStyle.soldOut">

        <div class="tismbox bg_fff pa_100 text_a_c">

            <p class="f_s14 c_181818 border_b_1_e9 pa_100">抱歉,您选择的舱位已经售完</p>

            <a class="c_289deb dp_b pa_100 f_s14" href='<?php echo site_url("/h5/index#/flightList");?>'>返回航班列表</a>

        </div>

    </section>

    <!----舱位售完提示----------------------->
    <!-- 浮动框增加样式 -->
    <style>
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
	
      <script id="my-Aaicbut.html" type="text/ng-template">
          <ion-popover-view  class="weizhi">
            <ion-content style="margin:0">
              <section class="AainBox">

                    <div class="border_r_1_e9 border_l_1_e9 border_t_1_e9">

                        <h2 class="pa_50_100 bg_fff c_181818 f_s14 border_b_1_e9">航空意外险 </h2>

                        <p class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">承保公司：<span class="f_s12 c_535353" ng-bind="accident.mingcheng">承保公司的名称</span></p>

                        <h2 class="pl_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9 wrapfix "><span class="fl wid50 box_bb border_r_1_e9 pt_55 pb_55">保费</span><span class="fl wid50 box_bb pl_100 pt_55 pb_55">保额</span></h2>

                        <p class="pl_100 bg_fff c_535353 f_s12 border_b_1_e9 wrapfix"><span class="fl wid50 box_bb border_r_1_e9 pt_55 pb_55" ng-bind="accident.xiaoshoudanjia">￥20.00</span><span class="fl wid50 box_bb pl_100 pt_55 pb_55" ng-bind="accident.baoxianjine">￥800000.00</span></p>

                        <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">保额描述</h2>

                        <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="accident.baoexiangxi">该保额描述的内容</p>

                        <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">特别说明</h2>

                        <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="accident.beizhu">该保额描述的内容</p>

                        <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">投保范围及限制</h2>

                        <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="accident.baoxianfanwei">这个框的高度根据文字的行数来进行自动调整</p>

                        <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">仅起飞前退票时可以退保</h2>

                    </div>

                </section>

            </ion-content>
          </ion-popover-view>
      </script>

      <script id="my-Yuanbut.html" type="text/ng-template">
          <ion-popover-view class="weizhi">
            <ion-content style="margin:0">
              <!--------延误取消险 ------------>

              <section class=" YuannBox" >

                  <div class="border_r_1_e9 border_l_1_e9 border_t_1_e9">

                      <h2 class="pa_50_100 bg_fff c_181818 f_s14 border_b_1_e9">延误取消险 </h2>

                      <p class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">承保公司：<span class="f_s12 c_535353" ng-bind="dallyover.mingcheng">承保公司的名称</span></p>

                      <h2 class="pl_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9 wrapfix "><span class="fl wid50 box_bb border_r_1_e9 pt_55 pb_55">保费</span><span class="fl wid50 box_bb pl_100 pt_55 pb_55">保额</span></h2>

                      <p class="pl_100 bg_fff c_535353 f_s12 border_b_1_e9 wrapfix"><span class="fl wid50 box_bb border_r_1_e9 pt_55 pb_55" ng-bind="dallyover.xiaoshoudanjia">￥20.00</span><span class="fl wid50 box_bb pl_100 pt_55 pb_55" ng-bind="dallyover.baoxianjine">￥800000.00</span></p>

                      <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">保额描述</h2>

                      <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="dallyover.baoexiangxi">该保额描述的内容</p>

                      <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">特别说明</h2>

                      <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="dallyover.beizhu">该保额描述的内容</p>

                      <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">投保范围及限制</h2>

                      <p class="pa_50_100 bg_fff c_535353 f_s12 border_b_1_e9" ng-bind="dallyover.baoxianfanwei">这个框的高度根据文字的行数来进行自动调整</p>

                      <h2 class="pa_50_100 bg_f6f6f6 c_181818 f_s14 border_b_1_e9">仅起飞前退票时可以退保</h2>

                  </div>

              </section>

              <!--------延误取消险   [end]------------>
            </ion-content>
          </ion-popover-view>
      </script>

    <style>

        .nieut_boxt2 table tr td {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-bottom-color: #e9e9e9;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-image-outset: 0 0 0 0;
            border-image-repeat: stretch stretch;
            border-image-slice: 100% 100% 100% 100%;
            border-image-source: none;
            border-image-width: 1 1 1 1;
            border-left-color: #e9e9e9;
            border-left-style: solid;
            border-left-width: 1px;
            border-right-color: #e9e9e9;
            border-right-style: solid;
            border-right-width: 1px;
            border-top-color: #e9e9e9;
            border-top-style: solid;
            border-top-width: 1px;
            padding-bottom: 0.5rem;
            padding-left: 0.3rem;
            padding-right: 0.3rem;
            padding-top: 0.5rem;

            }
    </style>

      <!-- 退签改 -->
      <script id="my-tuiqiangai.html" type="text/ng-template">
          <ion-popover-view class="weizhi">

            <ion-content style="margin:0">
            <!-- 退改签规则 -->

            <section  class="nieut_boxt2" ng-style="display_mp" style="padding-top:0px;left:0px,margin-left:0px;">

                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fff f_s12 text_a_c" style="width: 100%;border: 0;">

                    <!-- 去程 表格-->

                    

                    <!-- 去程 文字 -->

                    <tbody>

                        <tr>

                            <td colspan="4" scope="col" class="f_s15 bg_f6f6f6 text_a_l">退改签规则<span class="fr c_289deb pr_100">去程</span></td>

                        </tr>

                        <tr>

                            <td colspan="4" style="border:none">

                                <span class="fl fw_b wus_bxot text_a_l">退票：</span>

                                <div class="fl nsitBox text_a_l">
									<p class="mb_55 vm">●成人票</p>
                                    <p class="mb_55" ng-bind="goto.mealPolicy.adult.refundStipulate"></p>
											<p class="mb_55 vm">●儿童票</p>
                                    <p ng-bind="goto.mealPolicy.child.refundStipulate"></p>							
									


                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td colspan="4" style="border:none">

                                <span class="fl fw_b wus_bxot text_a_l">改期：</span>

                                <div class="fl nsitBox text_a_l">
									<p class="mb_55 vm">●成人票</p>
                                    <p class="mb_55" ng-bind="goto.mealPolicy.adult.changeStipulate"></p>
									<p class="mb_55 vm">●儿童票</p>
                                    <p ng-bind="goto.mealPolicy.child.changeStipulate"></p>


                                </div>

                            </td>

                        </tr>
						<tr>
							<td colspan="4" style="border:none">
								<span class="fl fw_b  text_a_l">签转：</span>
								<div class="fl  text_a_l">
									<p class="mb_55 vm">●成人票</p>
									<p class="mb_55" ng-bind="goto.mealPolicy.adult.modifyStipulate"></p>
									<p class="mb_55 vm">●儿童票</p>
									<p ng-bind="goto.mealPolicy.child.modifyStipulate"></p>

								</div>
							</td>
						</tr>


                    </tbody>



                    <!-- 回程 表格-->





                    <!-- 回程 文字 -->

                    <tbody  ng-style="myStyle.display_child">

                        <tr>

                            <td colspan="4" scope="col" class="f_s15 bg_f6f6f6 text_a_l">退改签规则<span class="fr c_289deb pr_100">回程</span></td>

                        </tr>

                        <tr>

                            <td colspan="4" style="border:none">

                                <span class="fl fw_b wus_bxot text_a_l">退票：</span>

                                <div class="fl nsitBox text_a_l">
									<p class="mb_55 vm">●成人票</p>
                                    <p class="mb_55" ng-bind="back.mealPolicy.adult.refundStipulate"></p>
									<p class="mb_55 vm">●儿童票</p>
                                    <p ng-bind="back.mealPolicy.child.refundStipulate"></p>
                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td colspan="4" style="border:none">

                                <span class="fl fw_b wus_bxot text_a_l">改期：</span>

                                <div class="fl nsitBox text_a_l">
									<p class="mb_55 vm">●成人票</p>
                                    <p class="mb_55" ng-bind="back.mealPolicy.adult.changeStipulate"></p>
									<p class="mb_55 vm">●儿童票</p>
                                    <p ng-bind="back.mealPolicy.child.changeStipulate"></p>
                                </div>

                            </td>

                        </tr>
						<tr>
							<td colspan="4" style="border:none">
								<span class="fl fw_b  text_a_l">签转：</span>
								<div class="fl  text_a_l">
									<p class="mb_55 vm">●成人票</p>
									<p class="mb_55" ng-bind="back.mealPolicy.adult.modifyStipulate"></p>
									<p class="mb_55 vm">●儿童票</p>
									<p ng-bind="back.mealPolicy.child.modifyStipulate"></p>

								</div>
							</td>
						</tr>

                    </tbody>



                </table>

                <p class="bsit_pit bg_f6f6f6 pt_55 pb_55" ng-style="myStyle.display_adult" style="width:100%">若需购买婴儿票，请拨打客服电话400-991-7909</p>

            </section>

            <!-- 退改签规则 [end] -->
              



            </ion-content>
          </ion-popover-view>
      </script>





</ion-view>