<ion-view view-title="比比旅行" class="container userCenter">
    
    <ion-content>
        <div class="center">
            <div class="userInfo" ng-click="gotoMyAccount()">
                <img src='<?php echo base_url("resources/user/img/userCenter-userInfoBg.png"); ?>' alt="">
                <div class="row">
                    <div class="column df-c-c-r">
                        <img id="userImg" ng-src="{{member.img}}" alt="">
                    </div>
                    <div class="column">
                        <div class="login df-c-c-c" ng-if="loginSuccess">
                            <p ng-bind="member.xingming"></p>
                            <p><span ng-bind="member.disableMobile.length >0 ? ('已绑定手机：'+ member.disableMobile) : '未绑定手机'"></span></p>
                            <!--<p><span ng-bind="member.disableEmail.length ==0 ? '未绑定邮箱': member.disableEmail"></span></p>-->                        </div>
                        <div class="unLogin df-c-c-c" ng-if="!loginSuccess">
                            <p>您还没有登录，点击登录</p>
                        </div>
                        <i></i>
                    </div>
                </div>
            </div>
            <div class="orderType">
                <div class="row" style="padding:0;">
                    <div class="column df-c-c-c" ng-click="gotoFlightOrder()">
                        <span><i class="zoom1"></i></span>
                        <span>机票订单</span>
                    </div>
                    <div class="column df-c-c-c" ng-click="trainorderlist()">
                        <span><i class="zoom1"></i></span>
                        <span>火车票订单</span>
                    </div>
                    <div class="column df-c-c-c" ng-click="gotoHotel()">
                        <span><i class="zoom1"></i></span>
                        <span>酒店订单</span>
                    </div>
                </div>
            </div>
            <div class="otherInfo">
                <div class="row" id="informationBtn" ng-click="gotoCommonInfo();" style="margin-top:0;padding:0 0 0 0.75rem;">
                    <div class="column df-s-c-r">
                        <i class="zoom1"></i><span>常用信息管理</span>
                    </div>
                </div>
                <div class="row" id="customerServiceBtn" ng-click="gotoCustom();" style="margin-top:0;padding:0 0 0 0.75rem;">
                    <div class="column df-s-c-r">
                        <i class="zoom1"></i><span>客服中心</span>
                    </div>
                </div>
            </div>
            <div class="banner">
                <img src='<?php echo base_url("resources/user/img/userCenter-banner.png"); ?>' alt="">
            </div>
        </div>
    </ion-content>
</ion-view>