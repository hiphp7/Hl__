<ion-view view-title="酒店" hide-nav-bar="true">
    <style type="text/css">
        .hotelList_popover{
            width:100%;
            margin-top: 0px!important;
            left:0!important;
        }
        .district_popover label{
            padding: 1rem 0px 1rem 5rem;
        }
        .regular-checkbox + i {
            opacity: 0;
            filter:Alpha(opacity=0);
        }
        .regular-checkbox:checked + i {
            opacity: 1;
            filter:Alpha(opacity=100);
        }
        .regular-checkbox:checked + i,.regular-checkbox:checked + i + span {
            color:#42D6D4;
        }
    </style>
    <ion-content>
        <section style="background-color: #f4f4f4;">
            <div class="row" style="background-color: #49d3dd;">
                <div class="col col-10 icon-left" ng-click="back();" style="line-height: 38px;cursor: pointer; border-width: 0px">
                    <i class="icon ion-chevron-left" style="color: white;font-size:160%;"></i>
                </div>
                <div class="col col-90">
                    <div class="item item-input" style="background-color: #FFFFFF; padding:0;border-radius: 3px;border-width: 0px;">
                        <ul class="input-label f_s12" style="padding:0;padding-right: 0.5rem;width: auto;">
                            <li ng-click="showDatePage('left');" style="cursor: pointer;"><span style="padding:0 0.5rem;">入</span><span ng-bind="ruzhuDate | date:'MM-dd'"></span></li>
                            <li ng-click="showDatePage('right');" style="cursor: pointer;"><span style="padding:0 0.5rem;">离</span><span ng-bind="lidianDate | date:'MM-dd'"></span></li>
                        </ul>
                        <span class="divider"></span>
                        <i class="icon placeholder-icon ion-ios-search"></i>
                        <input class="chkAll_name" type="search" placeholder="酒店名/商圈/地标/景点等" ng-model="chkAll_name" style="background-color: white;padding-right: 0;">
                    </div>
                </div>
            </div>
            <div class="row top_select">
                <div class="col col-33 select" ng-click="openPrice_popover($event);">
                    <button class="button button-small button-light c_42d6d4">
                        <span ng-bind="price"></span><i class="icon ion-ios-arrow-down"></i>
                    </button>
                </div>
                <div class="col col-33 select" ng-click="openStar_popover($event);">
                    <button class="button button-small button-light">
                        <span ng-bind="star"></span><i class="icon ion-ios-arrow-down"></i>
                    </button>
                </div>
                <div class="col col-33 select" ng-click="openDistrict_popover($event);">
                    <button class="button button-small button-light">
                        <span ng-bind="xzq"></span><i class="icon ion-ios-arrow-down"></i>
                    </button>
                </div>
            </div>
            <!--点击弹出框 [begin]-->
            <section id="hotelFloatBox">
                <!--价格 [begin]-->
                <script id="price_popover.html" type="text/ng-template">
                    <ion-popover-view class="price_popover hotelList_popover" style="height: 14rem;">
                        <ion-content class="content">
                            <div class="row hotelFloat" style="padding:0;"> 
                                <div class="col hotelFloatBox" style="padding:0;">
                                    <div class="list">
                                        <label class="item item-icon-left select_child" ng-click="chkPrice('低价优先');">
                                            <input class="regular-checkbox" type="radio" name="price" checked>
                                            <i class="icon ion-ios-checkmark-empty"></i>
                                            <span>低价优先</span>
                                        </label>
                                        <label class="item item-icon-left select_child" ng-click="chkPrice('高价优先');">
                                            <input class="regular-checkbox" type="radio" name="price">
                                            <i class="icon ion-ios-checkmark-empty"></i>
                                            <span>高价优先</span>
                                        </label>
                                        <label class="item item-icon-left select_child" ng-click="chkPrice('好评优先');">
                                            <input class="regular-checkbox" type="radio" name="price">
                                            <i class="icon ion-ios-checkmark-empty"></i>
                                            <span>好评优先</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </ion-content>
                    </ion-popover-view>
                </script>
                <!--价格 [end]-->
                <!--星级 [begin]-->
                <script id="star_popover.html" type="text/ng-template">
                    <ion-popover-view class="star_popover hotelList_popover" style="height: 19rem;">
                        <ion-content>
                            <div class="hotelFloat">
                                <div class="row" style="padding:0;">
                                    <div class="col" style="padding:0;text-align: center;">
                                        <span>星级(多选)</span>
                                    </div>
                                </div>
                                <div class="hotelStarFloat starBox">
                                    <div class="row hotelStarFloat_childBox">
                                        <div class="col child noLimit">
                                            <label class="on" for="checkbox-hotelList-0" ng-click="chkStar2(true,star_arr2)">
                                                不限<input type="checkbox" id="checkbox-hotelList-0" class="regular-checkbox ryuaibnsbox yuainsbt" disabled="disabled" ng-bind="chkAll_star2" ng-checked="chkAll_star2" />
                                            </label>
                                        </div>
                                        <div class="col child starChild" style="margin: 0 0.8rem;">
                                            <label for="checkbox-hotelList-1" ng-click="chkStar2(false,star_arr2)">
                                                <span ng-bind="star_arr2[0].name"></span>
                                                <input type="checkbox" id="checkbox-hotelList-1" class="regular-checkbox" ng-model="star_arr2[0].chk" />
                                            </label>
                                        </div>
                                        <div class="col child starChild">
                                            <label for="checkbox-hotelList-2" ng-click="chkStar2(false,star_arr2)">
                                                <span ng-bind="star_arr2[1].name"></span>
                                                <input type="checkbox" id="checkbox-hotelList-2" class="regular-checkbox" ng-model="star_arr2[1].chk" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row hotelStarFloat_childBox">
                                        <div class="col child starChild">
                                            <label for="checkbox-hotelList-3" ng-click="chkStar2(false,star_arr2)">
                                                <span ng-bind="star_arr2[2].name"></span>
                                                <input type="checkbox" id="checkbox-hotelList-3" class="regular-checkbox" ng-model="star_arr2[2].chk" />
                                            </label>
                                        </div>
                                        <div class="col child starChild" style="margin: 0 0.8rem;">
                                            <label for="checkbox-hotelList-4" ng-click="chkStar2(false,star_arr2)">
                                                <span ng-bind="star_arr2[3].name"></span>
                                                <input type="checkbox" id="checkbox-hotelList-4" class="regular-checkbox" ng-model="star_arr2[3].chk" />
                                            </label>
                                        </div>
                                        <div class="col child starChild">
                                            <label for="checkbox-hotelList-5" ng-click="chkStar2(false,star_arr2)">
                                                <span ng-bind="star_arr2[4].name"></span>
                                                <input type="checkbox" id="checkbox-hotelList-5" class="regular-checkbox" ng-model="star_arr2[4].chk" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row starConfirm">
                                    <div class="col cancel" ng-click="hotelfilter(false);">
                                        <span style="color: gray;">取消</span>
                                    </div>
                                    <div class="col confirm" ng-click="hotelfilter(true);">
                                        <span style="color: white;">确定</span>
                                    </div>
                                </div>
                            </div>
                        </ion-content>
                    </ion-popover-view>
                </script>
                <!--星级 [end]-->
                <!--行政区 [begin]-->

                <script id="district_popover.html" type="text/ng-template">
                    <ion-popover-view class="district_popover hotelList_popover" style="height: 19rem;">
                    <ion-content>
                    <div class="row" style="padding:0;">
                    <div class="col" style="padding:0;">
                    <div class="list">
                    <label class="item item-icon-left select_child" for="checkbox-xzq-0" ng-click="chkDistrict(true,d.district)">
                    <input class="regular-checkbox" type="radio" id="checkbox-xzq-0" name="xzq">
                    <i class="icon ion-ios-checkmark-empty"></i>
                    <span>不限</span>
                    </label>
                    <label class="item item-icon-left select_child" ng-repeat="d in districts" for="checkbox-xzq-{{$index + 1}}" ng-click="chkDistrict(false,d.district)">
                    <input class="regular-checkbox" type="radio" id="checkbox-xzq-{{$index + 1}}" name="xzq">
                    <i class="icon ion-ios-checkmark-empty"></i>
                    <span ng-bind="d.district"></span>
                    </label>
                    </div>
                    </div>
                    </div>
                    </ion-content>
                    </ion-popover-view>
                </script> 


                <!--行政区 [end]-->
            </section>
            <!--点击弹出框 [end]-->
            <!--酒店列表 [begin]-->
            <ion-list style="border-bottom:1px solid #ddd;">
                <ion-item class="jiudian_list" ng-repeat="hotel in newhotels | filter:{'name':chkAll_name} | orderBy:sortBy:sortDesc" ng-click="qiangding(hotel);">
                    <img ng-src="{{hotel.thumbnailId}}">
                    <div class="contentBox">
                        <ul>
                            <li class="li1 f_s13 fw_b" ng-bind='hotel.name'></li>
                            <li class="li2 f_s11">
                                <span class="calm" ng-bind='hotel.commentScore'></span>
                                <span class="calm" style="margin-left:0.2rem;">分</span>
                                <span class="calm ml_30" ng-bind='hotel.commentScore > 3.5 ? "好": "一般"'>好</span>
                                <span class=" ml_30 mr_30"  style="color:#8B8B8B;">|</span>
                                <span style="color:#8B8B8B;" ng-bind="hotel.category | xingji"></span>
                            </li>
                            <li class="li3 f_s11" style="line-height: 85%;color:#8B8B8B;">
                                <span class="describe" ng-bind="hotel.description | cut:30:' ...'"></span>
<!--                                <span class="ml_30 mr_30">|</span>
                                <span>距您455m</span>-->
                            </li>
                            <li class="li4" style="height:auto;margin-top: 1rem;">
                                <span style="color:#FF6600;float:left;" ng-bind='"￥" + hotel.salePrice'>￥788元</span>
                                <input name="" type="button" value="抢订" style="background-color:#FF6600;color:#fff;padding:0.2rem 1.5rem;border-radius: 0.3rem;float:right;margin-right: 1rem;">
                            </li>
                        </ul>
                    </div>
                </ion-item>
            </ion-list>
            <!--酒店列表 [end]-->
			<!--<div ng-if="newhotels.length == 0" style="text-align: center;font-size: 1.3rem;">没有找到符合条件的酒店</div>-->
        </section>
		<ion-infinite-scroll ng-if="!noMore" on-infinite="gethotelList()" distance="-8%">
        </ion-infinite-scroll>
    </ion-content>
</ion-view>
