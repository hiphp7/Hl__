<ion-view view-title="国内酒店" >
    <style type="text/css">
        .gotoType{
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -moz-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-align-items: center;
            align-items: center;
            position: absolute;
            top: 0;
            height: 100%;
        }
		.hotel_search .hotel_search_box{
            background: #fff;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            padding: 0 9px 9px;
        }
		.orderSelect{
            margin: 0px 10px;
            background: #fff;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
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
	<ion-header-bar align-title="center" style="background-color: #49d3dd; border-bottom:0;box-shadow: 1px 1px 4px #5E5E5E;   -moz-box-shadow: 1px 1px 4px #5E5E5E; -webkit-box-shadow: 1px 1px 4px #5E5E5E;  box-shadow: 1px 1px 4px #5E5E5E;background-image:none;">
        <button class="button icon-left ion-ios-arrow-left button-clear" style="color:white;" ng-click="gotoBibi();">
        </button>
        <div class="title" style="font-weight: normal;color: white;font-size: 1.6rem;">
            国内酒店
        </div>
    </ion-header-bar>
    <ion-content style="background-color: #EFEFEF;"  style="background:#f6f6f6;">
        <ion-slide-box slide-interval="5000" does-continue="true" show-pager="false">
            <ion-slide>
                <div class="box"><img src ='<?php echo base_url("jiudian_img/bibidingfang.jpg"); ?>' style="width:100%;"></div>
            </ion-slide>
            <ion-slide>
                <div class="box "><img src ='<?php echo base_url("jiudian_img/bibilx_new.jpg"); ?>' style="width:100%;margin-top: -4px;"></div>
            </ion-slide>
        </ion-slide-box>
        <!--<div class="row padding">
            <div class="col col-50 guoneiwai" style="padding:0px">
                <button class="button button-light button-full guoneihotel" ng-click="guonei(true);" style="margin-top:-18px;border-radius: 5px 0 0 5px; border-bottom: 2px solid #17CECC;">
                    <span>国内酒店</span>
                </button>
            </div>
            <div class="col col-50 guoneiwai" style="padding:0px">
                <button class="button button-light button-full haiwaihotel" ng-click="guonei(false);" style="margin-top:-18px;border-radius: 0 5px 5px 0;">
                    <span>海外酒店</span>
                </button>
            </div>
        </div>-->
        <div class="row padding hotel_search">
            <div class="col hotel_search_box">
                <div class="list">
                    <a class="item item-icon-right" style="padding:5px;border-width:0 0 1px 0" ng-click="placeAction('出发地')">
                        <p style="font-size:1.1rem;color: #A4A4A4;">目的地城市</p>
                        <h2 style="font-size:2.2rem" ng-bind="cityName"></h2>
						<i class="icon ion-ios-arrow-right" style="font-size: 1.8rem;color:#999;right:0;"></i>
                    </a>
                    <a class="item item-icon-right" style="padding:5px;border-width:1px 0 1px 0">
                        <div  class="row">
                            <div class="col col-45" ng-click="showDatePage('left')">
                                <p style="font-size:1.1rem;color: #A4A4A4;">入住日期</p>
                                <span style="font-size:1.6rem" ng-bind="ruzhuDate | date:'MM月dd日 '"></span>
                                <span style="font-size:1.1rem;color: #A4A4A4;" ng-bind="ruzhuWeek">周三</span>
                            </div>
                            <div class="col col-10" style="padding:0">
                                <h2 style="font-size:1.1rem;padding-top: 3rem;color: #A4A4A4;" ng-bind="dayNumber + '晚'"></h2>
                            </div>
                            <div class="col col-45" ng-click="showDatePage('right')">
                                <p style="font-size:1.1rem;color: #A4A4A4;">离店日期</p>
                                <span style="font-size:1.6rem" ng-bind="lidianDate | date:'MM月dd日 '"></span>
                                <span style="font-size:1.1rem;color: #A4A4A4;" ng-bind="lidianWeek">周三</span>
                            </div>
                            <i class="icon ion-ios-arrow-right" style="font-size: 1.8rem;color:#999;right:0;"></i>
                        </div>
                    </a>
                    <a class="item  item-icon-right"  style="padding:5px;border-width:1px 0 1px 0">
                        <input  type="text" placeholder="商圈/地标/景点等关键词" ng-model="searchBox.name" style="height:4.4rem;width:100%">
					</a>
                    <a class="item item-icon-right" style="padding:5px;border-width:1px 0 1px 0;">
                        <div class="col col-50" style="position: relative;float:left">
                            <label class="item item-input item-select" style="border-width:0px;padding: 0;">
                                <div class="input-label" style="width: 25%;padding: 7px 0px 7px 0;">
                                    <h3 style="font-size:1.3rem;color: #A4A4A4;">星级</h3>
                                </div>
                                <select style="font-size:1.3rem;padding: 0;right: 30px;color: #A4A4A4;" class="xialakuang" ng-model="jiudian_search.starSelect" ng-options="s.code as s.name for s in star_arr">
                                    <option value="">不限</option>
                                </select>
                            </label>
                        </div>
                        <div class="col col-50" style="position: relative;float:right;">
                            <label class="item item-input item-select" style="border-width:0px;padding: 0;">
                                <div class="input-label" style="width: 25%;padding: 7px 0px 7px 0;">
                                    <h3 style="font-size:1.3rem;color: #A4A4A4;">价格</h3>
                                </div>
                                <select style="font-size:1.3rem;padding: 0;right: 28px;color: #A4A4A4;width: 58%;" class="xialakuang"  ng-model="jiudian_search.priceSelect" ng-options="s.price as s.name for s in price_arr">
                                    <option value="">不限</option>
                                </select>
                            </label>
                        </div>
                    </a>
                    <div id="renshu" style="display: none;">
                        <div class="row" style="padding:15px 5px;border-bottom:1px solid #d4d4d4; background-color: white; ">
                            <div ng-click="openPopover3($event)" class="col-20" style="font-size: 16px;color: #49d3dd">
                                <span ng-bind="adultNumber.number"></span>位
                                <a style="color: #49d3dd"><i class="ion-ios-arrow-down"></i></a>
                            </div>
                            <div class="col-20">成人</div>
                            <div  ng-click="openPopover2($event)" class="col-20" style="font-size: 16px;color: #49d3dd">
                                <span ng-bind="childrenNumber.number"></span>位
                                <a style="color: #49d3dd"><i class="ion-ios-arrow-down"></i></a>
                            </div>
                            <div class="col-20">儿童</div>
                            <div class="col" style="padding: 0; border: none;color: #A4A4A4;">
                                每间人数
                            </div>
                        </div>
                        <script id="my-popover3.html" type="text/ng-template">
                            <ion-popover-view style="width:100%;height: 0;">
                            <ion-scroll scrollbar-y="false" style="width: 100%; height: 150px; left:-5px;">
                            <div class="list weishuFloat" >
                            <label class="item item-icon-left item-radio renshuSelect" ng-click="num(1)" >
                            <input type="radio" name="group" value="quanbu" checked="checked">
                            <div class="radio-content weishu" >
                            <div class="item item-content" ><span class="ws_child">1位</span></div>
                            <span><i class="radio-icon ion-ios-checkmark-empty"></i></span>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num(2)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">2位</span></div>
                            <span ><i class="radio-icon ion-ios-checkmark-empty"></i></span>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num(3)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">3位</span></div>
                            <span ><i class="radio-icon ion-ios-checkmark-empty"></i></span>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num(4)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">4位</span></div>
                            <span ><i class="radio-icon ion-ios-checkmark-empty"></i></span>
                            </div>
                            </label>
                            </div>
                            </ion-scroll>
                            </ion-popover-view>
                        </script>
                        <script id="my-popover2.html" type="text/ng-template">
                            <ion-popover-view style="width:100%;height: 0;">
                            <ion-scroll scrollbar-y="false" style="width: 100%; height: 150px;left:0px;">
                            <div class="list" >
                            <label class="item item-radio renshuSelect" ng-click="num2(0)">
                            <input type="radio" name="group" value="quanbu" checked="checked">
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">0位</span></div>
                            <i class="radio-icon ion-ios-checkmark-empty"></i>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num2(1)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">1位</span></div>
                            <i class="radio-icon ion-ios-checkmark-empty"></i>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num2(2)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">2位</span></div>
                            <i class="radio-icon ion-ios-checkmark-empty"></i>
                            </div>
                            </label>
                            <label class="item item-radio renshuSelect" ng-click="num2(3)">
                            <input type="radio" name="group" value="shenzhen" >
                            <div class="radio-content weishu">
                            <div class="item item-content" ><span class="ws_child">3位</span></div>
                            <i class="radio-icon ion-ios-checkmark-empty"></i>
                            </div>
                            </label>
                            </div>
                            </ion-scroll>
                            </ion-popover-view>
                        </script>
                    </div>
                    <button class="button button-block" style="color:#fff;background:#FF6600;margin-bottom:-1px;border:none;" ng-click="search();">
                        搜索查询
                    </button>
                </div>
            </div>
        </div>
        <div class="orderSelect">
            <div class="row wrapfix" style="height: 6rem;">
				<div class="col" style="position: relative;">
					<a class="gotoType" style="text-decoration:none;" ng-click="gotoAir();">
						<img src='<?php echo base_url("jiudian_img/fjp1.png"); ?>' style="width:30%;margin-left: 25px;">
						<span class="ml_55 f_s18" style="color:#42D6D4;">飞机票</span>
					</a>
				</div>
				<span style="border-left:1px solid #ddd;height: 4rem;margin-top: 0.5rem;"></span>
				<div class="col" style="position: relative;">
					<a class="gotoType" style="text-decoration:none;" ng-click="gotoTrain();">
						<img src='<?php echo base_url("jiudian_img/hcp1.png"); ?>' style="width:30%;margin-left: 25px;">
						<span class="ml_55 f_s18" style="color:#42D6D4;">火车票</span>
					</a>
				</div>
			</div>
        </div>
        <div class="row padding" style="margin-top: 10px;">
            <div class="col"style="padding:0;">
                <img src ='<?php echo base_url("jiudian_img/why.png"); ?>' style="width:100%;height:260px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;">
            </div>
        </div>
		
		

    </ion-content>
</ion-view>
