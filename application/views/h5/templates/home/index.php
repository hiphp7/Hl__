<ion-view view-title="比比旅行" ng-init="homeInit()">
    <style type="text/css">
        .fanhui{
            position: absolute;
        }
        .fanhui::before{
            font-size: 27px!important;
            line-height: 28px!important;
        }
        .bar.bar-positive{
            background: #49D3DD;
            /*height: 3.888888888888889rem;  */         
            box-shadow: 1px 1px 4px #5E5E5E;

            -moz-box-shadow: 1px 1px 4px #5E5E5E; /* Firefox */
            -webkit-box-shadow: 1px 1px 4px #5E5E5E; /* Safari 和 Chrome */
            box-shadow: 1px 1px 4px #5E5E5E; /* Opera 10.5+, 以及使用了IE-CSS3的IE浏览器 */

  
        }
        .bar .title{
            height: 3.888888888888889rem;
            line-height: 3.888888888888889rem;
            font-size: 1.7rem;
        }
        .has-header {
            /*top:3.877778rem;*/
        }
        .bar h3 .title{
            height: 4.888888888888889rem;
            line-height: 4.888888888888889rem;
            font-size:2rem;
        }
        .tabs-light>.tabs, .tabs.tabs-light {
            padding-top: 0px;
            border-color: #ddd;
            background-color: #fff;
            background-image: linear-gradient(0deg,#ddd,#FFF 50%,transparent 50%);
            color: #444;
        }
        .tab-item .icon{
			margin-top:6px;
            height: 24px;
        }
    </style>
    <ion-header-bar align-title="center" class="bar-positive">
                <button class="button icon-left ion-ios-arrow-left button-clear" style="color:white;" ng-click="backHome();">
        </button>
                <h3 class="title" style="line-height: 3.888888888888889rem;font-size: 1.7rem;">国内机票</h3>        
    </ion-header-bar>
    <ion-content class="content_1"  style="background:#f6f6f6;">
        <div class="img">
            <img width='100%' ng-src="{{bannerData}}"/>
        </div>
        
        <div class="row_cont"></div>
        <!-- <ion-slide-box ng-if="bannerData" auto-play="1" slide-interval="2000" does-continue="true" auto-play="true" on-slide-changed="slideHasChanged($index)" banner-produce>
            <ion-slide ng-repeat="bannerItem in bannerData">
                <img width='100%' ng-src="{{bannerItem}}"/>
            </ion-slide>
        </ion-slide-box> -->
        <!-- banner [end]-> -->
        <ul class="wep_tap text_a_c f_s14 border_b_1_e9 c_888 bg_fff">
            <li style="width: 29.25%;margin-left: 10%;margin-right: 10%;" ng-class="{true: 'box_bb fl on', false: 'box_bb fl'}[isActive]" ng-click="trip(true)"><span class="dp_i_b border_r_1_e4 wid" style="border: none;">单程</span></li>
            <li style="width: 0.5%;height: 50%;background: #e4e4e4;float: left;margin-top: 10px;">
                
            </li>
            <li style="width: 29.25%;margin-left: 10%;margin-right: 10%;" ng-class="{true: 'box_bb fl on', false: 'box_bb fl'}[isActive1]" ng-click="trip(false)"><span class="dp_i_b wid">往返</span></li>
        </ul>
        <section class="bg_fff">
            <!-- <!-出发地  -->
            <section class="setOff wrapfix po_re border_b_1_e9" style="padding-bottom: 10px;">
                <div class="left_setbox fl ">
                    <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img src='<?php echo base_url("resources/air/image/ic_Take.png"); ?>' class="mr_55">出发城市</p>
                    <div class="f_s22 iust_boxt cityBut departure c_1f1f1f" ng-bind="depCity" ng-click="placeAction('出发地')"></div>
                </div>
                <div class="icon but_swi"><img id='img_switch' ng-click="switchCity()" style='transition: 600ms ease-in-out all;' src='<?php echo base_url("resources/air/image/switch.png"); ?>'></div>
                <div class="left_setbox fr text_a_r">
                    <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img src='<?php echo base_url("resources/air/image/ic_landing.png"); ?>' class="mr_55">到达城市</p>
                    <div class="right f_s22 iust_boxt cityBut destination c_1f1f1f" id="mudi" ng-bind="arrCity" ng-click="placeAction('目的地')"></div>
                </div>
            </section>
            <!-- <!-出发地 [end]->
            <!-出发时间 [end]-->
            <section class="setOff wrapfix po_re border_b_1_e9 timesetbox">
                <div class="left_setbox fl" style="margin-left: 4px;">
                    <p class="c_908f97 f_s12 mb_55 " style="padding-bottom: 5px;"><img src='<?php echo base_url("resources/air/image/yes.png"); ?>'id="dagou">出发日期</p>
                    <div class="f_s16 iust_boxt datebut dateture c_1f1f1f" id="shijian"  ng-click="showDatePage('left')"><span ng-bind="gotoDate| date:'MM月dd日 '"></span><span class="c_908f97 f_s12 ml_55" ng-bind="gotoWeek"></span></div>
                </div>
                <div class="left_setbox fr ReturnBox text_a_r" ng-style="fanchengshijian">
                    <p class="c_908f97 f_s12 mb_55" style="padding-bottom: 5px;"><img src='<?php echo base_url("resources/air/image/comeback.png"); ?>'id="huilai">返回日期</p>
                    <div class="f_s16 iust_boxt datebut datetion c_1f1f1f" ng-click="showDatePage('right')"><span ng-bind="backDate| date:'MM月dd日 '"></span><span class="c_908f97 f_s12 ml_55" ng-bind="backWeek"></span></div>
                </div>
            </section>
            <!--出发时间 [end]-->
        </section>
        <div style="background:#f6f6f6;padding-top:1rem;">
        <a ng-click="searchflight()"><input style="margin:0 auto 2rem;" name="" type="submit" class="ind_but c_fff f_s16 text_a_c bg_ff6d6d" value="查询" style="background: #ff9508;" /></a>
        <!---我的常用航线------->
        <div class="myboxt f_s12 c_999" ng-show="historys.length >0 ">
            <p class="pa_55 wrapfix"><span class="fl">我的常用航线</span><a class="fr c_999" ng-click="clearhistory()">清除全部</a></p>
            <ul class="mybsibox text_a_c f_s12 wrapfix">
                <li class="box_bb fl" ng-repeat="x in historys | orderBy:['creationTime']:true"><div ng-click="getHistoryCity(historys.length - 1 - $index)"><a ng-bind="x.depCity"></a><span></span><a ng-bind="x.arrCity"></a></div></li>
            </ul>
        </div>
        <!---我的常用航线  [end]------->
        <!---说明文字-->
        <div style="background: #f6f6f6;">
        <div class="biut_txt text_a_c c_999 f_s14"><span class="dp_i_b mb_100"><i class="suit_icon_01"></i>全球机票</span><span class="dp_i_b mb_100"><i class="suit_icon_03"></i>含税价格</span><span class=" dp_i_b mb_100"><i class="suit_icon_02"></i>航协认证</span><span class=" dp_i_b mb_100"><i class="suit_icon_04"></i>出票保障</span></div>
        <div class="biut_txt  c_999 f_s14" style="padding:0px 13%"><a href='http://www.tianjin-air.com/travelnotice/transportation/index.html#demesticTransport'><img style="width: 3.3rem;height: 3.3rem;display: inline-block;vertical-align: top;margin-right: 0.55rem;" src='<?php echo base_url("resources/air/image/logo_tianjin.png"); ?>' >天津航空国内运输总条件</a></div>    
        <!---说明文字-->
        
        <div class="icon" style="width:12.5rem; height:auto; margin:2rem auto 1rem;overflow:hidden;"><img src='<?php echo base_url("resources/air/image/bibi_end.png"); ?>'/></div>
        </div>
		</div>
    </ion-content>
</ion-view>