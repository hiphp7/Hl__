<ion-view view-title="比比旅行">
    <style type="text/css">
        .taitouHead{
            color:#7d7d7d;
            padding: 0.5rem 1rem;
        }
        .taitou_boxul li > label{
            padding: 1rem;
        }
    </style>
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <a class="button icon-left ion-ios-arrow-left button-clear" style="color:#fff;margin-top: 5px;" ng-click="gotoOrder();"></a>
        <span class="title heaTxx" style="color:#fff;font-size: 2rem;line-height: 4.888888888888889rem;font-size:1.5rem;margin: 0 auto;">发票抬头</span>
        <a class="but_nsit f_s16 " style="height: 4.888rem;line-height: 4.888rem;text-align: center;" ng-click="finish();">完成</a>

        <!--------头部header   [end]---------->
    </ion-header-bar>
    <!--<ion-header-bar align-title="center" style="background-color: #49D3DD;color:#fff;height: 4.888rem;">
        <a class="button icon-left ion-ios-arrow-left button-clear" style="color:#fff;margin-top: 5px;" ng-click="gotoOrder();"></a>
        <span class="title heaTxx" style="color:#fff;font-size: 2rem;line-height: 3.888888888888889rem;font-size:1.5rem;margin: 0 auto;">发票抬头</span>
        <a class="but_nsit f_s16 " style="height: 4.888rem;line-height: 4.888rem;text-align: center;" ng-click="finish();">完成</a> 
    </ion-header-bar>-->
    <ion-content style="background-color: #F3F2F7;top: 59px;">
        <div class="taitouHead f_s11">请填写发票抬头信息并保存</div>
        <ul class="taitou_boxul bg_fff">
            <li class="border_b_1_d border_t_1_d">
                <label class="dp_b wrapfix" for="checkbox-taitou-1" ng-click="leixing('企业');">
                    <div class="fl f_s15 c_1f1f1f">类型：企业</div>
                    <div class="fr pr_100"><input type="radio" name="taitou" id="checkbox-taitou-1" class="regular-checkbox" ng-model="shuihaoShow.qiye" ng-checked="shuihaoShow.qiye == 1"/><label class="vm" for="checkbox-taitou-1"></label></div>
                </label>
            </li>
            <li class="border_b_1_d">
                <label class="dp_b wrapfix" for="checkbox-taitou-2" style="padding-left: 5.3rem;" ng-click="leixing('个人');">
                    <div class="fl f_s15 c_1f1f1f">个人</div>
                    <div class="fr pr_100"><input type="radio" name="taitou" id="checkbox-taitou-2" class="regular-checkbox" ng-model="shuihaoShow.geren" ng-checked="shuihaoShow.geren == 1"/><label class="vm" for="checkbox-taitou-2"></label></div>
                </label>
            </li>
        </ul>
        <div class="list">
            <div class="item item-input f_s15" style="border-top: none;">
                <span>名称：</span>
                <input style="font-size:1.5rem;color: #444;" type="text" placeholder="请输入名称" ng-model="taitou.name">
                <i class="icon ion-close-circled f_s20" style="margin-right: 2.3rem;color:#7D7D7D;cursor: pointer;" ng-click='clearName();'></i>
            </div>
            <div class="item item-input f_s15" ng-show='show'>
                <span>税号：</span>
                <input style="font-size:1.5rem;color: #444;" type="text" placeholder="纳税人识别码（选填）" ng-model="taitou.shuihao">
                <i class="icon ion-ios-help-outline" style="margin-right: 2.3rem;font-size:2.3rem;color:#FF9508;cursor: pointer;" ng-click='shuihaoTip();'></i>
            </div>
        </div>
    </ion-content>
    <!--<ion-footer-bar align-title="center" style="background-color: #FF6D6D;color:#fff;width: 94%;margin: 1rem auto;border-radius: 0.8rem;">
        <div class="title" ng-click="finish();" style="cursor: pointer;">完成</div>
    </ion-footer-bar>-->
</ion-view>