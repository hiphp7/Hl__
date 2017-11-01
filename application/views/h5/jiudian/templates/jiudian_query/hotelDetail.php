<ion-view view-title="酒店详情">
	<style type="text/css">
        .back{
            width: 2.8rem;
            height: 2.8rem;
            border-radius: 100%;
            text-align: center;
            line-height: 3rem;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            z-index: 99;
        }
        .back{
            top: 0.5rem;
            left: 1rem;
        }
        
        .back i{
			position: relative;
			top: 1px;
			left: -1px;
            color:#fff;
            font-size: 2.3rem;
        }
    </style>
    <ion-content>
        <div style="position:relative;">
            <a class="back" ng-click="back()"><i class="icon ion-ios-arrow-left"></i></a>
            <a ng-click="Collection()">
                <img src='<?php echo base_url("jiudian_img/shoucang.png"); ?>' style="z-index: 99;position: absolute; width: 15%;left: 85%;"ng-show="shoucang_show">
            </a>
            <a ng-click="Collection()">
                <img src='<?php echo base_url("jiudian_img/shoucang_true.png"); ?>' style="z-index: 99;position: absolute; width: 15%;left: 85%;" ng-show="shoucang_show2">
            </a>
            <ion-slide-box does-continue="false" auto-play="false" show-pager="false">
                <ion-slide ng-if="images.length > 0">
                    <div class="slide_box_img">
                        <img ng-src='{{images[0].location}}' style="width:100%;height:160px">
                    </div>
                </ion-slide>
                <ion-slide ng-if="!(images.length > 0)">
                    <div class="slide_box_img">
                        <img src='<?php echo base_url("jiudian_img/show_img.png"); ?>' style="width:100%;height:160px">
                    </div>
                </ion-slide>
            </ion-slide-box>
            <div class="f_s20" style="position:absolute;bottom:1.5rem;left:0.8rem;z-index: 1;color:#ececec;font-size: 1.5rem;width: 65%;white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;" ng-bind="selected_hotel.name"></div>
            <div ng-if="images.length > 0" class="f_s20" ng-click="tupian_show()" style="position:absolute;bottom:1.5rem;right:0.8rem;z-index: 1;color:#ececec;font-size: 1.5rem;cursor:pointer;">查看更多&nbsp;<i class="icon ion-ios-arrow-right f_s18" style="font-weight: bold;"></i></div>
        </div>
        <div class="list hotelDetail" style="margin-bottom:0;padding-bottom:0;">
            <div class="item item-icon-right" style="padding:5px;border-width:0 0 1px 0;font-size: 1.3rem;">
                <span class="calm" ng-bind="selected_hotel.commentScore"></span>
                <span class="calm" style="margin-left:0.1rem;">分</span>
                <span style="margin-left:0.2rem;color:#999999;" ng-bind='selected_hotel.commentScore >= 4.5 ? "服务好评": "服务一般"'></span>
                <span style="margin-left:0.3rem;color:#999999;" ng-bind='selected_hotel.category | xingji'></span>
            </div>
            <a class="item" style="padding:5px;border-width:1px 0;">
                <h2 style="font-size: 13px;" ng-bind='selected_hotel.address'></h2>

            </a>
			<div style="padding: 0.8rem 0;background: #efefef;">
				<a class="item item-icon-left">
					<span class="fl">
						<i class="icon ion-ios-list-outline" style="color:#42D6D4;"></i>
						<span ng-bind="ruzhuDate | date:'MM月dd日'" ng-click="showDatePage('left');"></span>-<span ng-bind="lidianDate | date:'MM月dd日'" ng-click="showDatePage('right');"></span>
					</span>
					<span class="fr">共<span class="ml_30 mr_30" ng-bind="dayNumber"></span>晚</span>
				</a>

        </div>
        </div>
        <div class="row" style="padding:0;background-image:url('<?php echo base_url("jiudian_img/jdydbj.jpg"); ?>')" >
            <!--酒店详情列表 [begin]-->
            <ion-list style="border-bottom:1px solid #ddd;width: 96%;margin: 0 auto;">
                <ion-item class="hotelDetail_list" style="background-color:transparent;" ng-repeat="room in rooms| limitTo:showNumber">
                    <div class="room" style="width:100%;height:auto;overflow: hidden;background-color: #fff;border-top: 1px solid #ddd;">
                        <img ng-src="{{room.imageUrl}}" ng-if="room.imageUrl">
                        <img src='<?php echo base_url("jiudian_img/room_img.png");?>' ng-if="!(room.imageUrl)">
                        <div class="contentBox">
                            <ul>
                                <li class="li1 f_s13" ng-bind="room.name">商务双人房</li>
                                <li class="li2 f_s11" style="color:#8B8B8B;">
                                    <span class="fl" style="width:56%; white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden; ">
                                        <span ng-bind="room.area">22m</span>
                                        <span class="ml_30" ng-bind="room.chanpinxinxi.hotel_tehui.window">无窗</span>
                                        <span class=" ml_30" ng-bind="room.chanpinxinxi.hotel_tehui.bedType">大床</span>
                                        <span ng-bind="room.chanpinxinxi.hotel_tehui.productName">+无早</span>
                                    </span>
                                    <span class="f_s11 fr" style="color:#FF6600;">
                                        ￥
                                        <span class="f_s18" ng-bind="room.chanpinxinxi.hotel_tehui.hotelPrice">680</span>
                                        <span>元</span>
                                        <span style="color:#8B8B8B;">起</span>
                                        <i class="icon ion-ios-arrow-down f_s18" style="color:#8B8B8B;font-weight: bold;"></i>
                                    </span>
                                </li>
                                <li class="li3 f_s11" style="line-height: 150%;color:#8B8B8B;clear: both;">
                                    <span class="calm f_s10" style="border:1px solid #11c1f3;border-radius:2px;" ng-show="room.chanpinxinxi.length > 1">多价位可选</span> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div style="display: none;">
                        <!--比比特惠 begin-->
                        <div class="chanpin" style="width: 98%;overflow: hidden;background-color: #fff;float: right;padding: 0.8rem;border-top: 1px solid #ddd;">
                            <div class="fl" style="width:50%;line-height: 100%;">
                                <p style="font-size: 1.3rem;">
                                    比比特惠
                                    <i class="icon ion-ios-arrow-right f_s15" style="font-weight: bold;"></i>
                                </p>
                                <p style="color:#8B8B8B;font-size: 1.2rem;width:66%; white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;">
                                    <span class="ml_30" ng-bind="room.chanpinxinxi.hotel_tehui.bedType">大床</span>
									<span ng-bind="room.chanpinxinxi.hotel_tehui.productName">无早</span>
                                    
                                </p>
                                <p><span style="color:#8B8B8B;font-size: 1.2rem;">不可取消</span><span class="ml_30 calm" style="font-size: 1.2rem;">最低价</span></p>
                            </div>
                            <div class="fr" style="width:50%;text-align: center;padding: 0.5rem 0px;">
                                <div class="f_s10 fr" style="border:1px solid #FF6600;border-radius:3px;background-color:#FF6600;color:#fff;width: 6rem;height:4.5rem;font-size: 1.6rem;position: relative;line-height: 2rem;cursor: pointer;" ng-click="gotoOrder(room, room.chanpinxinxi.hotel_tehui);">
                                    预订
                                    <div style="position: absolute;bottom: 2px;background-color:#fff;color:#FF6600;padding: 0rem 0.6rem;font-size: 1.3rem;margin-left: 0.4rem;">
                                        在线付
                                    </div>
                                </div>

                                <span class="f_s11 fr" style="color:#FF6600;line-height: 3.3rem;margin: 0.8rem 1rem 0 0;">
                                    ￥<span class="f_s18" ng-bind="room.chanpinxinxi.hotel_tehui.hotelPrice">680</span>
                                    <span class="f_s11">元</span>
                                    <!--<div class="f_s11" style="color:#858585;">已优惠￥<span ng-bind="room.chanpinxinxi.hotel_tehui.youhuijine"></span></div>-->
                                </span>
                            </div>
                        </div>
                        <!--比比特惠 end-->
                        <!--尊享订房 begin-->
                        <div class="chanpin" style="width: 98%;overflow: hidden;background-color: #fff;float: right;padding: 0.8rem;border-top: 1px solid #ddd;">
                            <div class="fl" style="width:50%;line-height: 100%;">
                                <p style="font-size: 1.3rem;">
                                    尊享订房
                                    <i class="icon ion-ios-arrow-right f_s15" style="font-weight: bold;"></i>
                                </p>
                                <p style="color:#8B8B8B;font-size: 1.2rem;width:66%; white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;">
                                    <span class="ml_30" ng-bind="room.chanpinxinxi.hotel_zunxiang.bedType">大床</span>
                                    <span ng-bind="room.chanpinxinxi.hotel_zunxiang.productName">无早</span>
                                </p>
                                <p><span style="color:#8B8B8B;font-size: 1.2rem;">不可取消</span><span class="ml_30 calm" style="font-size: 1.2rem;">比比尊享</span></p>
                            </div>
                            <div class="fr" style="width:50%;text-align: center;padding: 0.5rem 0px;">
                                <div class="f_s10 fr" style="border:1px solid #FF6600;border-radius:3px;background-color:#FF6600;color:#fff;width: 6rem;height:4.5rem;font-size: 1.6rem;position: relative;line-height: 2rem;cursor: pointer;" ng-click="gotoOrder(room, room.chanpinxinxi.hotel_zunxiang);">
                                    预订
                                    <div style="position: absolute;bottom: 2px;background-color:#fff;color:#FF6600;padding: 0rem 0.6rem;font-size: 1.3rem;margin-left: 0.4rem;">
                                        在线付
                                    </div>
                                </div>
                                <span class="f_s11 fr" style="color:#FF6600;line-height: 3.3rem;margin: 0.8rem 1rem 0 0;">
                                    ￥<span class="f_s18" ng-bind="room.chanpinxinxi.hotel_zunxiang.hotelPrice">680</span>
                                    <span class="f_s11">元</span>
                                    <!--<div class="f_s11" style="color:#858585;">已优惠￥<span ng-bind="room.chanpinxinxi.hotel_zunxiang.youhuijine"></span></div>-->
                                </span>
                            </div>
                        </div>
                        <!--尊享订房 end-->
                    </div>
                </ion-item>
            </ion-list>
        </div>

        <div class="row" style="padding:0;border-bottom: 1px solid #ddd; margin:0;" style="display:none;" ng-style="lookAll_display" ng-click="lookAll();" ng-show="rooms.length > 6">
            <div class="col" style="padding:0;">
                <button class="button button-full button-light" style="margin:0;min-height:0;min-width:0">
                    查看全部
                </button>
            </div>
        </div>

        <ul class="s_f13" style="padding: 0.8rem 1.8rem;background-color: #efefef;color:#666;">
            <!--            <li style="list-style:disc;">酒店政策</li>
                        <div>入住时间：14:00 以后</div>-->
            <li style="list-style:disc;">酒店提示</li>
            <div ng-bind="selected_hotel.generalAmenities"></div>
        </ul>
        <div class="row" style="color:#666;line-height: 123%;position: relative;border: 1px solid #ddd;">
            <span class="ml_150" style="text-align: center;" ng-if="selected_hotel.roomAmenities | sheshi:'行李寄存'">
                <i class="icon ion-ios-box-outline f_s16"></i>
                <p class="f_s13">行李寄存</p>
            </span>
            <span class="ml_150" style="text-align: center;" ng-if="selected_hotel.roomAmenities | sheshi:'唤醒服务'">
                <i class="icon ion-android-notifications-none f_s16"></i>
                <p class="f_s13">唤醒</p>
            </span>
            <span class="ml_150" style="text-align: center;" ng-if="selected_hotel.roomAmenities | sheshi:'无烟房'">
                <i class="icon ion-no-smoking f_s16"></i>
                <p class="f_s13">无烟房</p>
            </span>
            <span class="ml_150" style="text-align: center;" ng-if="selected_hotel.roomAmenities | sheshi:'宽带'">
                <i class="icon ion-monitor f_s16"></i>
                <p class="f_s13">宽带</p>
            </span>
            <span class="ml_150" style="text-align: center;" ng-if="selected_hotel.roomAmenities | sheshi:'国际长途'">
                <i class="icon ion-ios-telephone-outline f_s16"></i>
                <p class="f_s13">国际长途</p>
            </span>
<!--            <span style="text-align: center;margin-right: 0px;position: absolute;right: 10px;top: 30%;">
                <span class="f_s13">更多</span>
                <i class="icon icon-right ion-ios-arrow-right ml_30 f_s16"></i>
            </span>-->
        </div>
        <div class="row" style="padding:0; margin-top:0px;">
            <div class="col" style="padding:0;">
                <img src='<?php echo base_url("jiudian_img/hotelDetailBottom.jpg"); ?>' style="width:100%">
            </div>
        </div>
    </ion-content>
</ion-view>
