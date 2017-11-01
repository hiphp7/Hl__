<ion-view view-title="酒店城市">
	<style type="text/css">
        .alpha_sidebar li{
            margin-bottom: 0;
        }
    </style>
    <ion-header-bar class="place_head" style="background:#49D3DD;">
        <div class="header po_re f_s18 text_a_c border_b_1_d bg_fff pftop" style="background:#49D3DD;">
            <span class="heaTxx">选择城市</span>
            <a class="returnbut c_fff f_s18 returnjs" ng-click="back();"><span></span>返回</a>
        </div>
    </ion-header-bar>

    <div class="bar bar-subheader">
        <label class="item-input" style="">
            <i class="icon ion-ios-search placeholder-icon"></i>
            <input type="search"  style="" placeholder="搜索" ng-focus="searchCity($event)" ng-keyup="keyup($event)" ng-model="content">
        </label>
    </div>
    <ion-content scroll="true" class="has-header ng-hide searchList" padding="true"  style="top:100px" ng-show="content !='' " >
        <div data-ng-repeat="x in searchList">
            <ion-item ng-click="showHomePage(x)" ng-bind="x.cityName">
            </ion-item>
        </div>
    </ion-content>
    <ion-content scroll="true" class="has-header ng-hide" padding="true" style="position: absolute;top:100px;" ng-show="content ==''"  >
        <div>
            <div style="margin-left: 10px"> 历史</div>
            <div class="row" style="padding-right: 32px;" >
                <div class="col col-30 button button-light button-small " style="margin: 2px;border-color: #ddd;" ng-repeat="v in history" ng-click="showHomePage(v)" ng-bind="v.cityName"></div>
                <div class="" style="margin: 2px" ng-if="history== ''">无</div>
            </div>
            <div style="margin-left: 10px"> 热门城市</div>
            <div class="row" style="padding-right: 32px;" ng-repeat="v1 in remenplace">
                <div class="col col-30 button button-light button-small" style="margin: 2px;border-color: #ddd;" ng-repeat="v2 in v1" ng-click="showHomePage(v2)" ng-bind="v2.cityName"></div>
            </div>
        </div>
        <div data-ng-repeat="(letter, authors) in sorted_users" class="alpha_list">
            <ion-item class="item item-divider hotel_divider" id="index_{{letter}}" ng-bind="letter">
            </ion-item>
            <ion-item ng-repeat="author in authors" ng-bind="author.cityName" ng-click="showHomePage(author)">
            </ion-item>
        </div>
    </ion-content>

    <ul class="alpha_sidebar ng-hide"   ng-show="content =='' ">
        <li ng-click="gotoList('index_{{letter}}')" ng-repeat="letter in alphabet" ng-bind="letter"> 
        </li>
    </ul>
</ion-view>