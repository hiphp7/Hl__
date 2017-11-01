<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
        <a class="button icon-left ion-ios-arrow-left button-clear button-dark" ng-click="back()"></a>
        <h1 class="title">{{title}}</h1>
    </ion-header-bar>
    <ion-content>

        <!-----日历------->
        <div>
            <ul class="dateUlbox text_a_c">
                <li ng-repeat="x in dateLists">
                    <p class="f_s18 text_a_c mb_55 border_b_1_d pb_55" ng-bind="x.date| date:'yyyy年MM月'"></p>
                    <ul class="datetablego c_1d1d1d f_s14 wrapfix fw_b">
                        <li class="c_ff6d6d">日</li>
                        <li>一</li>
                        <li>二</li>
                        <li>三</li>
                        <li>四</li>
                        <li>五</li>
                        <li class="c_ff6d6d">六</li>
                    </ul>
                    <ul class="datetable c_1d1d1d wrapfix">
                        <li ng-repeat="y in x.days" class="{{y.enable}}">
                            <div ng-switch on="y.enable">
                                <!-- 不可用状态 -->
                                <div ng-switch-when="false" class="c_808080"><p class="f_s14" ng-bind="y.solar| date:'dd'"></p><p></p></div>
                                <!-- 可用状态 周末-->
                                <div ng-switch-when="true" ng-click="showHomePage(y)"><p class="f_s14" ng-class="loadClass(y, 2)" ng-bind="y.solar| date:'dd'" style="font-weight:bold;"></p><p class="c_808080" ng-bind="y.lunar"></p></div>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </ion-content>

</ion-view>