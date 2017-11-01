<ion-view view-title="入住离店日期">
    <style type="text/css">
		.jiudian_date .date_between{color:#fff;background:#5CDDDB;}
        .jiudian_date .ruzhu{color:#fff; background:#49D3DD;}
        .jiudian_date .lidian{color:#fff; background:#49D3DD;}
		/*去掉点击选定的样式 - 抵消common.css样式的影响*/
        .jiudian_date li:not(.false):active, .datetable li:not(.false):active p{
            background:#fff;
            color:#5f5f5f;
            border-radius:0rem;
            -moz-border-radius:0rem;
            -webkit-border-radius:0rem;
        }
    </style>
    <ion-header-bar align-title="center" style="background-color: #49D3DD;">
        <a class="button icon-left ion-ios-arrow-left button-clear" style="color:#fff;" ng-click="back()"></a>
        <h1 class="title light">{{title}}</h1>
    </ion-header-bar>
    <ion-content>

        <!-----日历------->
        <div>
            <ul class="dateUlbox text_a_c hotel_dateBox">
                <li class="dateList" ng-repeat="x in dateLists">
                    <p class="f_s18 text_a_c mb_55 border_b_1_d pb_55" ng-bind="x.date| date:'yyyy年MM月'"></p>
                    <ul class="datetablego c_1d1d1d f_s14 wrapfix fw_b">
                        <li class="c_49D3DD">日</li>
                        <li>一</li>
                        <li>二</li>
                        <li>三</li>
                        <li>四</li>
                        <li>五</li>
                        <li>六</li>
                    </ul>
                    <ul class="datetable c_5f5f5f wrapfix jiudian_date">
                        <li ng-repeat="y in x.days" class="{{y.enable}}" style="padding-top: 0;height: 4.6rem;line-height: 4.6rem;">
                            <div ng-switch on="y.enable">
                                <!-- 不可用状态 -->
                                <div ng-switch-when="false" class="c_808080">
                                    <p class="f_s14" style="height:4.6rem;line-height: 4.6rem;" ng-bind="y.solar| date:'dd'"></p>
                                </div>
                                <!-- 可用状态 周末-->
                                <div ng-show="true" ng-switch-when="true" ng-click="showHomePage(y,$event)" style="position: relative;">
                                    <div class="f_s10 ruzhuOrlidian" style="position: absolute;color: #fff;left: 1.3rem;top: -1.4rem;height:0;"></div>
                                    <p class="f_s14 as" style="height:4.6rem;line-height: 4.6rem;font-weight:bold;" ng-bind="y.solar| date:'dd'"></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </ion-content>
</ion-view>
