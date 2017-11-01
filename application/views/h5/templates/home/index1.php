<ion-view view-title="比比旅行">
    <ion-nav-title>
        <img src='<?php echo base_url("resources/air/image/ic_logo.png"); ?>' style="height: 100%;width: auto;"/>
    </ion-nav-title>
    <ion-content class="main-content">
        <!-- 轮播图 -->
        <ion-slide-box class="banner" does-continue="true" auto-play="true">
            <ion-slide ng-repeat="bannerItem in bannerData">
                <img ng-src="{{bannerItem.imgUrl}}"/>
            </ion-slide>
        </ion-slide-box>
        <!--轮播结束-->
        
        <!--------banner [end]------------------->
        <ul class="wep_tap text_a_c f_s14 border_b_1_e9 c_888 bg_fff">
            <li ng-class="{true: 'box_bb fl on', false: 'box_bb fl'}[isActive]" ng-click="trip(true)"><span class="dp_i_b border_r_1_e4 wid">单程</span></li>
            <li ng-class="{true: 'box_bb fl on', false: 'box_bb fl'}[isActive1]" ng-click="trip(false)"><span class="dp_i_b wid">往返</span></li>
        </ul>
        <section class="bg_fff">
            <!----出发地--------->
            <section class="setOff wrapfix po_re border_b_1_e9">
                <div class="left_setbox fl ">
                    <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img src='<?php echo base_url("resources/air/image/ic_Take.png"); ?>' class="mr_55">出发地</p>
                    <div class="f_s22 iust_boxt cityBut departure c_1f1f1f" ng-bind="depCity" ng-click="placeAction('出发地')"></div>
                </div>
                <div class="icon but_swi"><img id='img_switch' ng-click="switchCity()" style='transition: 600ms ease-in-out all;' src='<?php echo base_url("resources/air/image/switch.png"); ?>'></div>
                <div class="left_setbox fr text_a_r">
                    <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img src='<?php echo base_url("resources/air/image/ic_landing.png"); ?>' class="mr_55">目的地</p>
                    <div class="f_s22 iust_boxt cityBut destination c_1f1f1f" ng-bind="arrCity" ng-click="placeAction('目的地')"></div>
                </div>
            </section>
            <!----出发地 [end]--------->
            <!----出发时间 [end]--------->
            <section class="setOff wrapfix po_re border_b_1_e9 timesetbox">
                <div class="left_setbox fl">
                    <p class="c_908f97 f_s12 mb_55 ">出发时间</p>
                    <div class="f_s16 iust_boxt datebut dateture c_1f1f1f" ng-click="showDatePage('left')"><span ng-bind="gotoDate| date:'MM月dd日 '"></span><span class="c_908f97 f_s12 ml_55" ng-bind="gotoWeek"></span></div>
                </div>
                <div class="left_setbox fr ReturnBox text_a_r" ng-style="fanchengshijian">
                    <p class="c_908f97 f_s12 mb_55">返程时间</p>
                    <div class="f_s16 iust_boxt datebut datetion c_1f1f1f" ng-click="showDatePage('right')"><span ng-bind="backDate| date:'MM月dd日 '"></span><span class="c_908f97 f_s12 ml_55" ng-bind="backWeek"></span></div>
                </div>
            </section>
            <!----出发时间 [end]--------->
        </section>
        <a ng-click="searchflight()"><input name="" type="submit" class="ind_but c_fff f_s16 text_a_c bg_ff6d6d" value="查询" /></a>
        <!---我的常用航线------->
        <div class="myboxt f_s12 c_999" ng-show="historys.length >0 ">
            <p class="pa_55 wrapfix"><span class="fl">我的常用航线</span><a class="fr c_999" ng-click="clearhistory()">清除全部</a></p>
            <ul class="mybsibox text_a_c f_s12 wrapfix">
                <li class="box_bb fl" ng-repeat="x in historys | orderBy:['creationTime']:true"><div ng-click="getHistoryCity(historys.length - 1 - $index)"><a ng-bind="x.depCity"></a><span></span><a ng-bind="x.arrCity"></a></div></li>
            </ul>
        </div>
        <!---我的常用航线  [end]------->
        <!---说明文字-------->
        <div class="biut_txt text_a_c c_999 f_s14"><span class="dp_i_b mb_100"><i class="suit_icon_01"></i>全球机票</span><span class="dp_i_b mb_100"><i class="suit_icon_03"></i>含税价格</span><span class=" dp_i_b mb_100"><i class="suit_icon_02"></i>航协认证</span><span class=" dp_i_b mb_100"><i class="suit_icon_04"></i>出票保障</span></div>
        <!---说明文字-------->
        <div class="icon" style="width:12.5rem; height:auto; margin:2rem auto 1rem;"><img src='<?php echo base_url("resources/air/image/bibi_end.png"); ?>'/></div>
        
    </ion-content>
</ion-view>