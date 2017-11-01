<ion-view title="航班列表">
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="title">
            <a class="returnbut c_fff f_s16" ng-click="backHome()" style="left: 0rem !important;"><span></span>返回</a>
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
            <ul class="but_weekBox  text_a_c wrapfix c_555 bg_fff  ">
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
                    color: #ff6600;
                }
                div p.c_181818 {
                    color: #181818;
                }
                div a.f_s18,div p.f_s18,div p span.f_s18 {
                    font-size: 1.5rem;
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
                 padding: 0 0.5rem 0.5rem 0.5rem;margin:1rem auto 0;
                }
                .huaix_ul .tehui .tehui_title,.huaix_ul .kscp .kscp_title{
                    color:#fff;font-size:1.3rem;height: 3.5rem;line-height: 3.5rem;
                }
                .huaix_ul .tehui .tehui_title span,.huaix_ul .kscp .kscp_title span{
                   display: inline-block;width: 8.5rem;height: 2.3rem;line-height: 2.3rem;color: black;
                   font-weight: bold;
                }
                .huaix_ul .kscp .kscp_child{
                    border-bottom: 1px solid #ddd;height:auto;padding: 0.5rem 0;
                }
                .huaix_ul .kscp .kscp_child:last-child{
                    border-bottom: none;padding-bottom: 0;
                }
                .bgleft{
                    
                    background:url('<?php echo base_url("resources/air/image/bgleft.png");?>') no-repeat;background-size: 100%;
                    color: white;
                }
            </style>
            <!-----航班信息列表----------->
            <ul class="huabanBox border_t_1_d4 bg_fff" ng-style="myStyle.displaytitle">

                <ion-item ng-repeat="x in newflights | orderBy:sortBy:sortDesc" style="padding: 0 0 0rem 0;">

                    <li class="flightList">
                        <a class="wrapfix " style="padding:1rem 0">
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
                                    <span class="nwiu_bix f_s10" ng-if="5 < x.seatItems[0].seatStatus[0] && x.seatItems[0].seatStatus[0] <=9">票量紧张</span>
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
                                    <p><a class="c_209bec f_s13 " ng-click="tuigaiqian(x,y,$event)">点击查看退改签规则</a></p>
                                </div>
                                <div class="fr text_a_r">
                                    <p>
                                        <span class="c_ff6d6d f_s16" style="font-size: 1.6rem;"><font class="f_s16">￥</font><span ng-bind="y.parPrice"></span></span>
                                        <input name="" type="button" value="{{btnName}}" class="bsit_bg bg_ff5555 f_s14 c_fff" ng-click="reserve(x, y, baseinfo)"/>
                                    </p>
                                    <p class="c_ff6d6d f_s10 " ng-switch on ="y.seatStatus[0]">
                                        <span class="nwiu_bix" ng-if="y.seatStatus[0] <=5"><span ng-bind="y.seatStatus[0]"></span><span>张</span></span>
                                        <span class="nwiu_bix f_s10" ng-if="5 < y.seatStatus[0] && y.seatStatus[0] <=9">票量紧张</span>                             
                                    </p>
                                </div>
                            </li>
                            <!--比比特惠 [end]-->
                            <!--快速出票-->
                            <li class="wrapfix kscp" style="border: none;">
                                <div class="kscp_title">
                                    <span class="bgleft" style="color: white;">快速出票</span>
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
                                        <p><a class="c_209bec f_s13 " ng-click="tuigaiqian(x,y,$event)">点击查看退改签规则</a></p>
                                    </div>
                                    <div class="fr text_a_r">
                                        <p>
                                            <span class="c_ff6d6d f_s16" style="font-size: 1.6rem;"><font class="f_s16">￥</font><span ng-bind="y.parPrice"></span></span>
                                            <input name="" type="button" value="{{btnName}}" class="bsit_bg bg_ff5555 f_s14 c_fff" ng-click="reserve(x, y, baseinfo)"/>
                                        </p>
                                        <p class="c_ff6d6d f_s10 " ng-switch on ="y.seatStatus[0]">
                                            <span class="nwiu_bix" ng-if="y.seatStatus[0] <=5"><span ng-bind="y.seatStatus[0]"></span><span>张</span></span>
                                            <span class="nwiu_bix f_s10" ng-if="5 < y.seatStatus[0] && y.seatStatus[0] <=9">票量紧张</span> 
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
    <ion-footer-bar align-title="center" class="bar-positive" style="background: #5b6b83;">
        <!---筛选条件选择------>
        <ul class="filter_nav c_fff f_s13" ng-style="myStyle.displaytitle" style="bottom: 5px;">
            <li>
                <i class="bg_filter01"></i>
                <p style="font-size: 90%;">筛选</p>
            </li>
            <li ng-click="flightSort('depTime')">
                <i class="bg_filter02"></i>
                <p ng-bind="titleTime" style="font-size: 90%;"></p>
            </li>
            <li class="on" id="titlePrice" ng-click="flightSort('sortPrice')">
                <i class="bg_filter03"></i>
                <p ng-bind="titlePrice" style="font-size: 90%;"></p>
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
            <div style="margin-left: 20px;">
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






