<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="title">
            <a class="returnbut c_fff f_s16" ng-click="backHome()"><span></span>返回</a>
            <span>
                <span class="f_s16" ng-bind="search.depCity"></span>
                <i class="fan_icon ml_55 "></i>
                <span class="f_s16" ng-bind="search.arrCity"></span>
                <font class="f_s12 c_fff" ng-show="flights.length >0" style="display:none"><span>(</span><span ng-bind="newflights.length"></span><span>个航班)</span></font>
            </span>
        </div>

    </ion-header-bar>
    <ion-content>	
        <section class="wrap_Box mainsecit flight_foo">
            <!---往返时选择完去程显示---------->
            <p class="pto_uait bg_3dcbff c_fff f_s11" ng-style="myStyle.displayflight"><i class="dp_i_b mr_30"></i>去程<span class="ml_55 mr_55" ng-bind="selected.goto.date| date:'yyyy-MM-dd '"></span><span ng-bind="selected.goto.flight.depTime"></span>-<span ng-bind="selected.goto.flight.arriTime"></span><span class="ml_55" ng-bind="selected.goto.flight.flightNo[0]"></span><span class="ml_55">¥<span ng-bind="selected.goto.seatItem.parPrice"></span></span> </p>
            <!---往返时选择完去程显示  [end]---------->
            <ul class="but_weekBox border_b_1_d4 text_a_c wrapfix c_555 bg_fff mb_100 ">
                <li class="po_re pl_300 fl text_a_l pt_55 pb_55">
                    <i class="prenbut"></i>
                    <p class="f_s14  border_r_1_e9 " ng-click="dateChange(y, -1)" ng-class="loadColor()">前一天</p>
                    <p></p>
                </li>
                <li class="fl databutBix pt_55 pb_55" ng-click="showDatePage(0)">
                    <p class="f_s14  c_138fe1"><span ng-bind="search.date| date:'MM-dd '"></span><span style="margin-left:6px;" ng-bind="search.week"></span></p>
                    <p></p>
                </li>
                <li class="po_re pr_300 fl text_a_r pt_55 pb_55">
                    <i class="nextbut"></i>
                    <p class="f_s14  border_l_1_e9 c_505050" ng-click="dateChange(y, 1)">后一天</p>
                    <p></p>
                </li>
            </ul>

            <style type="text/css">
                div p.c_ff6d6d, p span.c_ff6d6d{
                    color: #ff6d6d;
                }
                div p.c_181818 {
                    color: #181818;
                }
                div a.f_s18,div p.f_s18,div p span.f_s18 {
                    font-size: 1.8rem;
                }
                p.c_138fe1,span.c_138fe1 {
                    color: #138fe1;
                }
                div p.mb_55 {
                    margin-bottom: 0.55rem;
                }
                .f_s14 {
                    font-size: 1.4rem;
                }
                .f_s10 {
                    font-size: 1rem;
                }
				.huaix_ul{
                    overflow: hidden;padding-bottom: 1rem;
                }
                .huaix_ul .tehui,.huaix_ul .kscp{
                    border: 1px solid #ddd;padding: 0 0.5rem 0.5rem 0.5rem;margin:1rem auto 0;
                }
                .huaix_ul .tehui .tehui_title,.huaix_ul .kscp .kscp_title{
                    color:#fff;font-size:1.3rem;height: 3.5rem;line-height: 3.5rem;border-bottom: 1px solid #ddd;
                }
                .huaix_ul .tehui .tehui_title span,.huaix_ul .kscp .kscp_title span{
                    background:#1a9bf1;display: inline-block;width: 8.5rem;height: 2.3rem;line-height: 2.3rem;text-align: center;
                }
                .huaix_ul .kscp .kscp_child{
                    border-bottom: 1px solid #ddd;height:auto;padding: 0.5rem 0;
                }
                .huaix_ul .kscp .kscp_child:last-child{
                    border-bottom: none;padding-bottom: 0;
                }
            </style>
            <!-----航班信息列表----------->
            <ul class="huabanBox border_t_1_d4 bg_fff" ng-style="myStyle.displaytitle">

                <ion-item ng-repeat="x in newflights | orderBy:sortBy:sortDesc" style="padding: 0 0 0.7rem 0;">

                    <li class="flightList">
                        <a class="wrapfix border_b_1_d4" style="padding:1rem 0">
                            <div class="newboxleft fl wrapfix">
                                <span class="wid40 fl">
                                    <p class="f_s18 c_181818 " ng-bind="x.depTime"></p>
                                    <p class="c_999 f_s12 mt_100" style="font-size: 1.2rem;" ng-bind="x.orgAirport+x.orgJetquay[0]"></p>
                                    
                                </span>
                                <span class="fl text_a_c sbit_iskbox_stop" ng-show="x.stopnum[0] !=0 ">
                                    <p class="c_138fe1">经停</p>
                                    <p class="maxIcon"><img src='<?php echo base_url("resources/air/image/fuch_bix_01.png"); ?>'></p>
                                </span>
                                <span class="fl text_a_c sbit_iskbox" ng-show="x.stopnum[0] ==0 ">
                                    <p class="maxIcon"><img src='<?php echo base_url("resources/air/image/fuch_bix_01.png"); ?>'></p>
                                </span>
                                <span class="wid40 fr">
                                    <p class="btnSortArrTime f_s18 c_181818" ng-bind="x.arriTime"></p>
                                    <p class="c_999 f_s12 mt_100" style="font-size: 1.2rem;" ng-bind="x.dstAirport+x.dstJetquay[0]"></p>

                                </span>
                                <p class="bsui_ptxt fl po_re f_s10 c_999 mt_3"><i class="pr_icon mr_55"><img ng-src='<?php echo base_url("resources/air/image/air/{{x.aircode}}.png"); ?>'></i><span ng-bind="x.gs"></span><span ng-bind="x.flightNo[0]"></span><span ng-bind="x.planeType[0]" class="ml_55"></span></p>
                                <p class="f_s10 fl" ng-show="x.codeShare ==true"><span class="c_138fe1">共享航班</span>(实际乘坐 深圳航空ZH9815)</p>
                            </div>
                            <div class="newboxright text_a_r fr">
								<p class="c_ff6d6d f_s10 " ng-if="x.tehui.length > 0">￥<span class="btnSortPrice f_s16" ng-bind="x.tehui[0].settlePrice"></span><span class="c_999">起</span></p>
								<p class="c_ff6d6d f_s10 " ng-if="x.tehui.length == 0">￥<span class="btnSortPrice f_s16" ng-bind="x.seatItems[0].parPrice"></span><span class="c_999">起</span></p>
                                <!--<p class="c_ff6d6d f_s10 " ng-if="x.seatItems[0].seatMsg == '经济舱' && x.seatItems[0].discount < 1.0">￥<span class="btnSortPrice f_s16" ng-bind="x.seatItems[0].settlePrice"></span><span class="c_999">起</span></p>
                                <p class="c_ff6d6d f_s10 " ng-if="x.seatItems[0].seatMsg != '经济舱' || x.seatItems[0].discount == 1.0 ">￥<span class="btnSortPrice f_s16" ng-bind="x.seatItems[0].parPrice"></span><span class="c_999">起</span></p>-->
                                <p class="f_s10 c_999 " ng-switch on="x.seatItems[0].discount[0]">
                                    <span ng-switch-when="1.0">全价</span>
                                    <span ng-switch-default ng-if="x.seatItems[0].dz == 1"><span ng-bind="x.seatItems[0].discount * 10 | number:1"></span><span>&nbsp;折</span></span>
                                </p>
                                <p class="c_ff6d6d f_s10" ng-switch on="x.seatItems[0].seatStatus[0]">
                                    <span class="nwiu_bix" ng-if="x.seatItems[0].seatStatus[0] <=5"><span ng-bind="x.seatItems[0].seatStatus[0]"></span><span>张</span></span>
                                    <span class="nwiu_bix f_s10" ng-if="x.seatItems[0].seatStatus[0] <5">票量紧张</span>
                                </p>
                            </div>
                        </a>
                        <!--------------点击机票显示---------------->
                        <ul class="huaix_ul" style="display:none;">
                            <!--比比特惠 [begin]-->
                            <li class="wrapfix tehui pt_55" ng-repeat="y in x.tehui | seat_filter:seatfilter" ng-if="x.tehui.length > 0">
                                <div class="tehui_title mb_55">
                                    <span>比比特惠</span>
                                </div>
                                <div class="fl">
                                    <p class="c_181818 mb_55" style="font-size:1.4rem;">
                                        <span ng-bind=" '特惠' + y.seatMsg"></span>
                                    </p>
                                    <p><a class="c_209bec f_s13 " ng-click="getMealPolicy(x,y,$event)">点击查看退改签规则</a></p>
                                </div>
                                <div class="fr text_a_r">
                                    <p>
                                        <span class="c_ff6d6d f_s16" style="font-size: 1.6rem;"><font class="f_s16">￥</font><span ng-bind="y.parPrice"></span></span>
                                        <input name="" type="button" value="{{btnName}}" class="bsit_bg bg_ff5555 f_s14 c_fff" ng-click="reserve(x, y, baseinfo)"/>
                                    </p>
                                    <p class="c_ff6d6d f_s10 " ng-switch on ="y.seatStatus[0]">
                                        <span class="nwiu_bix" ng-if="y.seatStatus[0] <=5"><span ng-bind="y.seatStatus[0]"></span><span>张</span></span>
                                        <span class="nwiu_bix f_s10" ng-if="y.seatStatus[0] <5">票量紧张</span>                             
                                    </p>
                                </div>
                            </li>
                            <!--比比特惠 [end]-->
                            <!--快速出票-->
                            <li class="wrapfix kscp">
                                <div class="kscp_title">
                                    <span>快速出票</span>
                                </div>
                                <div class="wrapfix kscp_child pt_55" ng-repeat="y in x.seatItems | seat_filter:seatfilter">
                                    <div class="fl">
                                        <p class="c_181818 mb_55" style="font-size:1.4rem;">
                                            <span ng-bind="y.seatMsg"></span>
                                            <span ng-switch on="y.discount">
                                                <span ng-switch-when="1.0">全价</span>
                                                <span ng-switch-default ng-if="y.dz == 1 && y.discount <1.0 "><span ng-bind="y.discount * 10 | number:1"></span><span>&nbsp;折</span></span>
                                            </span>
                                        </p>
                                        <p><a class="c_209bec f_s13 " ng-click="getMealPolicy(x,y)">点击查看退改签规则</a></p>
                                    </div>
                                    <div class="fr text_a_r">
                                        <p>
                                            <span class="c_ff6d6d f_s16" style="font-size: 1.6rem;"><font class="f_s16">￥</font><span ng-bind="y.parPrice"></span></span>
                                            <input name="" type="button" value="{{btnName}}" class="bsit_bg bg_ff5555 f_s14 c_fff" ng-click="reserve(x, y, baseinfo)"/>
                                        </p>
                                        <p class="c_ff6d6d f_s10 " ng-switch on ="y.seatStatus[0]">
                                            <span class="nwiu_bix" ng-if="y.seatStatus[0] <=5"><span ng-bind="y.seatStatus[0]"></span><span>张</span></span>
                                            <span class="nwiu_bix f_s10" ng-if="y.seatStatus[0] <5">票量紧张</span>                             
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!--------------点击机票显示  [end]---------------->
                    </li>
                </ion-item>
            </ul>

            <!-----航班信息列表  [end]----------->
        </section>
    </ion-content>
    
    <!---筛选条件弹出层------------------>
    <section class="filterBox" style="display:none;">
        <section class="filterMian">
            <ul class="nwiu_but text_a_c c_fff f_s14">
                <li class="fl lebutci" ng-click="flightfilter(false)">取消</li>
                <li class="wid50 fl clearFilter" ng-click="clearfilter()">清空筛选条件</li>
                <li class="fl lebutci" ng-click="flightfilter(true)">确定</li>
            </ul>

            <!--<div class="tuaobox "style="display:none;">
                <div class="f_s14 c_1d1d1d fl">
                        <input type="checkbox" id="checkbox-1-1" class="regular-checkbox " /><label class="vm" for="checkbox-1-1"></label>
                    仅看直飞
                </div>
                <div class="f_s14 c_1d1d1d fr">
                        <input type="checkbox" id="checkbox-1-2" class="regular-checkbox " /><label class="vm" for="checkbox-1-2"></label>
                    不看共享航班
                </div>
            </div>-->

            <div class="nbox_box border_t_1_d">
                <ul class="fil_tuaobox f_s14 fl">
                    <li class="on"><p class="vm text_a_c">起飞时段</p></li>
                    <li ng-show="orgairp.length >1 || dstairp.length > 1"><p class="vm text_a_c">起降机场</p></li>
                    <li style="display:none;"><p class="vm text_a_c">机型</p></li>
                    <li><p class="vm text_a_c">舱位</p></li>
                    <li><p class="vm text_a_c">航空公司</p></li>
                </ul>
                <div class="filt_riamin fl">
                    <!---起飞时段------->
                    <ul class="selctbox nwiu_boxul inlut_sel">
                        <li class="wrapfix border_b_1_d">
                            <label class="dp_b wrapfix" for="checkbox-vd" ng-click="chkTime(true)" >
                                <div class="fl bsit_li f_s14 c_229bec">不限</div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-vd" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_time" ng-checked="chkAll_time" /><span class="vm"></span></div>
                            </label>
                        </li>
                        <li class="border_b_1_d" ng-repeat="x in timelist">
                            <label class="dp_b wrapfix" for="checkbox-vd-{{$index}}">
                                <div class="fl bsit_li f_s15 c_1f1f1f"><span ng-bind="x.name"></span><span ng-bind="x.bt"></span>-<span ng-bind="x.et"></span></div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-vd-{{$index}}" class="regular-checkbox " ng-model="x.chk" ng-click="chkTime(false)" /><span class="vm"></span></div>
                            </label>
                        </li>
                    </ul>
                    <!---起飞时段 [end]------>

                    <!---起降机场------->
                    <div class="selctbox nwiu_boxul" style="display:none;">
                        <section ng-show="orgairp.length >1">
                            <p class="pa_55 f_s10"><span>起飞机场({{search.depCity}})</span></p>
                            <ul class="nwiu_boxul inlut_sel">
                                <li class="wrapfix border_b_1_d">
                                    <label class="dp_b wrapfix" for="checkbox-3-0" ng-click="chkdepAirPort(true)">
                                        <div class="fl bsit_li f_s15 c_229bec">不限</div>
                                        <div class="fr pr_100"><input type="checkbox" id="checkbox-3-0" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_depAirPort" ng-checked="chkAll_depAirPort" /><label class="vm" for="checkbox-3-0"></label></div>
                                    </label>
                                </li>
                                <li class="wrapfix border_b_1_d" ng-repeat="x in orgairp">
                                    <label class="dp_b wrapfix" for="checkbox-3-{{$index + 1}}">
                                        <div class="fl bsit_li f_s15 c_1f1f1f" ng-bind="x.orgAirport"></div>
                                        <div class="fr pr_100"><input type="checkbox" id="checkbox-3-{{$index + 1}}" class="regular-checkbox" ng-model="x.chk" ng-click="chkdepAirPort(false)" /><label class="vm" for="checkbox-3-{{$index + 1}}"></label></div>
                                    </label>
                                </li>
                            </ul>
                        </section>
                        <section ng-show="dstairp.length >1">
                            <p class="pa_55 mt_100 f_s10"><span>降落机场({{search.arrCity}})</span></p>
                            <ul class="nwiu_boxul inlut_sel">
                                <li class="wrapfix border_b_1_d">
                                    <label class="dp_b wrapfix" for="checkbox-4-0" ng-click="chkarrAirPort(true)">
                                        <div class="fl bsit_li f_s15 c_229bec">不限</div>
                                        <div class="fr pr_100"><input type="checkbox" id="checkbox-4-0" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_arrAirPort" ng-checked="chkAll_arrAirPort" /><label class="vm" for="checkbox-4-0"></label></div>
                                    </label>
                                </li>
                                <li class="wrapfix border_b_1_d" ng-repeat="x in dstairp">
                                    <label class="dp_b wrapfix" for="checkbox-4-{{$index + 1}}">
                                        <div class="fl bsit_li f_s15 c_1f1f1f" ng-bind="x.dstAirport"></div>
                                        <div class="fr pr_100"><input type="checkbox" id="checkbox-4-{{$index + 1}}" class="regular-checkbox" ng-model="x.chk" ng-click="chkarrAirPort(false)" /><label class="vm" for="checkbox-4-{{$index + 1}}"></label></div>
                                    </label>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <!---起降机场 [end]------>

                    <!---机型------->
                    <ul class="selctbox nwiu_boxul inlut_sel" style="display:none;">

                        <li class="wrapfix border_b_1_d">
                            <div class="fl bsit_li f_s14 c_229bec">不限</div>
                            <div class="fr pr_100"><input type="checkbox" id="checkbox-5-0" class="regular-checkbox ryuaibnsbox yuainsbt" /><label class="vm" for="checkbox-5-0"></label></div>
                        </li>
                        <li class="wrapfix border_b_1_d">
                            <div class="fl bsit_li f_s14 c_1f1f1f">大型机</div>
                            <div class="fr pr_100"><input type="checkbox" id="checkbox-5-1" class="regular-checkbox " /><label class="vm" for="checkbox-5-1"></label></div>
                        </li>
                        <li class="wrapfix border_b_1_d">
                            <div class="fl bsit_li f_s14 c_1f1f1f">中型机</div>
                            <div class="fr pr_100"><input type="checkbox" id="checkbox-5-2" class="regular-checkbox " /><label class="vm" for="checkbox-5-2"></label></div>
                        </li>
                    </ul>
                    <!---机型 [end]------>

                    <!---舱位------->
                    <ul class="selctbox nwiu_boxul inlut_sel" style="display:none;">
                        <li class="wrapfix border_b_1_d">
                            <label class="dp_b wrapfix" for="checkbox-6-0" ng-click="chkSeat(true)" >
                                <div class="fl bsit_li f_s15 c_229bec">不限</div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-6-0" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_seat" ng-checked="chkAll_seat"/><label class="vm" for="checkbox-6-0"></label></div>
                            </label>
                        </li>
                        <li class="wrapfix border_b_1_d" ng-repeat="x in seatClass">
                            <label class="dp_b wrapfix" for="checkbox-6-{{$index + 1}}">
                                <div class="fl bsit_li f_s15 c_1f1f1f" ng-bind="x.seatMsg">头等/商务舱</div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-6-{{$index + 1}}" class="regular-checkbox " ng-model="x.chk" ng-click="chkSeat(false)"/><label class="vm" for="checkbox-6-{{$index + 1}}"></label></div>
                            </label>
                        </li>
                    </ul>
                    <!---舱位 [end]------>

                    <!-----航空公司选择-------->
                    <ul class="selctbox nwiu_boxul inlut_sel" style="display:none" >
                        <li class="wrapfix border_b_1_d">
                            <label class="dp_b wrapfix" for="checkbox-2-0" ng-click="chkAir(true)" >
                                <div class="fl bsit_li f_s14 c_229bec">不限</div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-2-0" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_air" ng-checked="chkAll_air"/><label class="vm" for="checkbox-2-0"></label></div>
                            </label>
                        </li>                    
                        <li class="wrapfix border_b_1_d" ng-repeat="x in airports">
                            <label class="dp_b wrapfix" for="checkbox-2-{{$index + 1}}">
                                <div class="fl bsit_li f_s14 c_1f1f1f"><i class="dp_i_b mr_55"><img ng-src='<?php echo base_url("resources/air/image/air/{{x.aircode}}.png"); ?>'></i><span ng-bind="x.gs"></span></div>
                                <div class="fr pr_100"><input type="checkbox" id="checkbox-2-{{$index + 1}}" class="regular-checkbox" ng-model="x.chk" ng-click="chkAir(false)" /><label class="vm" for="checkbox-2-{{$index + 1}}"></label></div>
                            </label>
                        </li>
                    </ul>
                    <!-----航空公司选择  [end]-------->
                    <!---常用筛选------->
                    <ul class="selctbox nwiu_boxul inlut_sel" style="display:none">
                        <li></li>
                    </ul>
                    <!---常用筛选 [end]------>
                </div>	
            </div>
        </section>
    </section>
    <!---筛选条件弹出层 [end]------------------>
    <ion-footer-bar align-title="center" class="bar-positive">
        <!---筛选条件选择------>
        <ul class="filter_nav c_fff f_s13" ng-style="myStyle.displaytitle">
            <li>
                <i class="bg_filter01"></i>
                <p>筛选</p>
            </li>
            <li ng-click="flightSort('depTime')">
                <i class="bg_filter02"></i>
                <p ng-bind="titleTime"></p>
            </li>
            <li class="on" id="titlePrice" ng-click="flightSort('sortPrice')">
                <i class="bg_filter03"></i>
                <p ng-bind="titlePrice"></p>
            </li>
        </ul>

        <!---筛选条件选择  [end]------>

    </ion-footer-bar>
	<script type="text/javascript">
        $(function() {

            publicFunction.selseamrFn();
            effectCommon.flightsPage();

            //返回按钮
            $(".returnjs").on("click", function() {
                publicFunction.returnbut("dateselect", "mainsecit", "dateselect .header");
            });

            //选中日期
            publicFunction.clickhidefi("datetable li:not(.false)", "dateselect", "mainsecit", "dateselect .header");

            //取消筛选
            publicFunction.clickHide("lebutci", "filterBox");

            //查看退定规则
            //publicFunction.clickShow("butchir", "nieut_boxt");
            // publicFunction.clickHide("nieut_boxt", "nieut_boxt");

        });
        //一维数组去掉重复项
        function unique1(arr, keyname) {
            var output = [], keys = [];
            angular.forEach(arr, function(item) {
                var key = item[keyname];
                if (keys.indexOf(key) < 0) {
                    keys.push(key);
                    output.push(item);
                }
            });
            return output;
        }
        //二维数组去掉重复项
        function unique2(arr, keyname1, keyname2) {
            var output = [], keys = [];
            angular.forEach(arr, function(item) {
                var arr2 = item[keyname1];
                angular.forEach(arr2, function(item) {
                    var key = item[keyname2];
                    if (keys.indexOf(key) < 0) {
                        keys.push(key);
                        output.push(item);
                    }
                });
            });
            return output;
        }
    </script>
</ion-view>
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

      <script id="my-tuiqiangai.html" type="text/ng-template">
          <ion-popover-view class="weizhi">
            <ion-content style="margin:0;padding: 1rem;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fff f_s13 text_a_c">
            <tr>
                <td colspan="4" scope="col" class="f_s15 bg_f6f6f6 text_a_l" style="padding: 0.5rem 0.3rem">退改签规则<span class="fr c_289deb pr_100"></span></td>
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
                        <div class="fw_b  text_a_l">签转：</div>
                        <div class="text_a_l">
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