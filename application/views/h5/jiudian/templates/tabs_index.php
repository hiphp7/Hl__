<ion-tabs class="tabs-icon-top">
    <style type="text/css">
        .shouye {padding: 5px; line-height: 2px!important;margin-left: -10%;  }
        .shouye i{ color: #49d3dd;font-size: 28px!important;}
        .shouye span{ color: #49d3dd; font-size: 13px;}
        
        .my{margin-left:14%;padding: 5px; line-height: 2px!important;}
        .my i{font-size: 26px!important;}
        .my span{ font-size: 13px;}
        
        #img{
            height: 60px; position: fixed;
            top:-15px;margin: auto;left: 0;right: 0;
        }

    </style>
  <!-- Dashboard Tab -->
  <ion-tab class="shouye" title="首页"icon-off="ion-ios-home-outline" icon-on="icon-home" ng-click="modal.show()" style="color: #49d3dd">
    <ion-nav-view name="index_tab-bibi"  style="color: #49d3dd"></ion-nav-view>
  </ion-tab>

 <img src='<?php echo base_url("jiudian_img/a001.png"); ?>' id="img">

  <ion-tab title="我的"class="my"  icon-off="icon-user" icon-on="icon-user" href="#/account">
    <ion-nav-view name="" ></ion-nav-view>
  </ion-tab>
</ion-tabs>