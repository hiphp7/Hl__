<ion-view view-title="酒店" hide-nav-bar="true">
    <style type="text/css">

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
	<div class="bar-header row" style="background-color: #49d3dd;height: 60px;">
        <div class="col col-10 icon-left" ng-click="back();" style="line-height: 38px;cursor: pointer;">
            <i class="icon ion-chevron-left" style="color: white;font-size:160%;"></i>
        </div>
        <div class="col col-90">
            <div class="item item-input" style="background-color: #FFFFFF; padding:0;border-radius: 3px;border-width: 0px;width: 88%;float: left;">
                <ul class="input-label f_s12" style="padding:0;padding-right: 0.5rem;width: auto;">
                    <li ng-click="showDatePage('left');" style="cursor: pointer;"><span style="padding:0 0.5rem;">入</span><span ng-bind="ruzhuDate | date:'MM-dd'"></span></li>
                    <li ng-click="showDatePage('right');" style="cursor: pointer;"><span style="padding:0 0.5rem;">离</span><span ng-bind="lidianDate | date:'MM-dd'"></span></li>
                </ul>
                <span class="divider" style="padding: 0 0.5rem;"></span>
                <i class="icon placeholder-icon ion-ios-search" style="font-size:1.4rem;"></i>
                <input class="chkAll_name" type="search" placeholder="商圈/地标/景点等关键词" ng-model="searchBox" style="background-color: white;padding-right: 0;font-size:1.2rem;">
            </div>
            <button class="button button-clear" style="top: -0.4rem;float: right;padding: 0px;min-width: 0;color:#fff;font-size:1.3rem;" ng-click="search();">
                搜索
            </button>
        </div>
    </div>
    <div class="bar-subheader row top_select">
        <div class="col col-33 select">
            <button class="button button-small button-light c_42d6d4">
                <span ng-bind="price"></span><i class="icon ion-ios-arrow-down"></i>
            </button>
        </div>
        <div class="col col-33 select">
            <button class="button button-small button-light">
                <span ng-bind="star"></span><i class="icon ion-ios-arrow-down"></i>
            </button>
        </div>
        <div class="col col-33 select">
            <button class="button button-small button-light">
                <span ng-bind="xzq"></span><i class="icon ion-ios-arrow-down"></i>
            </button>
        </div>
    </div>
    <!--点击弹出框 [begin]-->
    <section id="hotelFloatBox">
        <!--价格 [begin]-->
        <div class="row hotelFloat" style="padding:0;display: none;"> 
            <div class="col hotelFloatBox">
                <div class="list hotel_list">
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
        <!--星级 [begin]-->
        <div class="hotelFloat" style="display: none;padding-bottom: 1rem;">
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
                    <span>取消</span>
                </div>
                <div class="col confirm" ng-click="hotelfilter(true);">
                    <span>确定</span>
                </div>
            </div>
        </div>
        <!--行政区 [begin]-->
        <div class="row hotelFloat" style="padding:0;display: none;margin-top: 1px;">
            <div class="col hotelFloatBox">
                <ion-scroll>
                    <div class="list hotel_list" style="height: auto;">
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
                </ion-scroll>
            </div>
        </div>
    </section>
    <!--点击弹出框 [end]-->
    <ion-content class='hotel_content' style="top:94px;" overflow-scroll="false">
        <section>
            <!--酒店列表 [begin]-->
            <ion-list style="border-bottom:1px solid #ddd;">
                <ion-item class="jiudian_list" ng-repeat="hotel in newhotels | orderBy:sortBy:sortDesc" ng-click="qiangding(hotel);">
                    <img ng-src="{{hotel.thumbnailId}}" ng-if="hotel.thumbnailId != '' && hotel.thumbnailId != null">
					<img src='<?php echo base_url("jiudian_img/room_img.png");?>' ng-if="hotel.thumbnailId == '' || hotel.thumbnailId == null">
                    <div class="contentBox">
                        <ul>
                            <li class="li1 f_s13 fw_b" style="width:98%; white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden; " ng-bind='hotel.name'></li>
                            <li class="li2 f_s11">
                                <span class="calm" ng-bind='hotel.commentScore'></span>
                                <span class="calm" style="margin-left:0.2rem;">分</span>
                                <span class="calm ml_30" ng-bind='hotel.commentScore > 3.5 ? "好": "一般"'>好</span>
                                <span class=" ml_30 mr_30"  style="color:#8B8B8B;">|</span>
                                <span style="color:#8B8B8B;" ng-bind="hotel.category | xingji"></span>
                            </li>
                            <li class="li3 f_s11" style="line-height: 85%;color:#8B8B8B;">
                                <span class="describe" ng-bind="hotel.description | cut:30:' ...'"></span>
                            </li>
							<li class="f_s11" style="line-height: 85%;color:#8B8B8B;" ng-hide="searchName == '' || searchName == null">
                                距<span class="describe" ng-bind="searchName"></span>约
                                <span class="describe" ng-bind="hotel.distance"></span>米
                            </li>
							<li class="f_s11" style="line-height: 85%;color:#8B8B8B;" ng-hide="searchName != '' && searchName != null">
                                距您约<span class="describe" ng-bind="hotel.distance"></span>米
                            </li>
                            <li class="li4" style="height:auto;margin-top: 1rem;">
                                <span style="color:#FF6600;float:left;" ng-bind='"￥" + hotel.hotelPrice'>￥788元</span>
                                <input name="" type="button" value="抢订" style="background-color:#FF6600;color:#fff;padding:0.2rem 1.5rem;border-radius: 0.3rem;float:right;margin-right: 1rem;">
                            </li>
                        </ul>
                    </div>
                </ion-item>
            </ion-list>
            <!--酒店列表 [end]-->
			<!--<div ng-if="newhotels.length == 0" style="text-align: center;font-size: 1.3rem;">没有找到符合条件的酒店</div>-->
        </section>
		<ion-infinite-scroll ng-if="!noMore" on-infinite="gethotelList('上拉加载')" immediate-check="false" distance="10px">
        </ion-infinite-scroll>
    </ion-content>
	<!--背景-->
    <div id='hotel_bg' style="width:100%;height:1000px;position: absolute;left: 0;top: 100px;z-index: 99;background: rgba(0,0,0,0.5);display: none;"></div>
</ion-view>
