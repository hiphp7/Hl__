<ion-tabs class="tabs-icon-top tabs-color-active-calm" style="background-color:#DDDDDD;box-shadow:5px 1px 5px 5px #DDDDDD">
    <style type="text/css">
                .yanse i{ color: #49d3dd;}
                .yanse span{ color: #49d3dd;}
    </style>

    <div style="position:fixed;  z-index: 10; width:100%;  background-color: rgba(0, 0, 0, 0.5); "ng-show="guanjia" ng-click="close_guanjia()" id="backgr">
        <div class="row"  style="height:100px; background-color:white; width:100%;position:absolute; z-index: 99;
        bottom:80px; padding:0;">
            <div class="col" style="text-align:center; padding:10px 0 0 0;line-height: 20px; position: relative; z-index: 999;">
                <img src='<?php echo base_url("jiudian_img/jdsc.jpg"); ?>' style="width:50%;" ng-click="goto_wdsc()"><p>酒店收藏</p>
            </div>
            <div class="col" style="text-align:center; padding:10px 0 0 0;line-height: 20px; position: relative; z-index: 999;">
            <img src='<?php echo base_url("jiudian_img/llsl.jpg"); ?>' style="width:50%;" ng-click="goto_history()"><p>浏览历史</p>
            </div>
            <div class="col" style="text-align:center; padding:10px 0 0 0;line-height: 20px; position: relative; z-index: 999;">
            <img src='<?php echo base_url("jiudian_img/cjwt.jpg"); ?>' style="width:50%;"  ng-click="goto_changjianwenti()"><p>常见问题</p>
            </div>
        </div>
    </div>


  <ion-tab title="酒店管家"class="yanse" icon-off="ion-ios-home-outline" icon-on="ion-ios-home" ng-click="show_guanjia()" style="color: #49d3dd" badge-style="badge-assertive">
    <ion-nav-view name="jiudian_tab-hotelhome"  style="color: #49d3dd"></ion-nav-view>
  </ion-tab>


  <ion-tab title="超级特价" icon-off="ion-ios-chatboxes-outline" icon-on="ion-ios-chatboxes" href="#/chats">
    <ion-nav-view name="jiudian_tab-chats"></ion-nav-view>
  </ion-tab>


  <ion-tab title="我的订单" icon-off="ion-ios-paper-outline" icon-on="ion-ios-paper" href="#/account">
    <ion-nav-view name="jiudian_tab-account"></ion-nav-view>
  </ion-tab>
</ion-tabs>