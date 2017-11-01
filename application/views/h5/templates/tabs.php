<ion-tabs class="tabs-icon-top tabs-color-active-assertive tabs-light" class="forget">
    <ion-tab title="首页" icon-on="bar-ion-on" icon-off="bar-ion-off" class="forget"  on-select="show(0)">
        <ion-nav-view name="bibi"></ion-nav-view>
    </ion-tab>
    <ion-tab title="飞机" icon-on="bar-plane-on" icon-off="bar-plane-off" class="forget"  on-select="show(1)">
        <ion-nav-view name="tab-home"></ion-nav-view>
    </ion-tab>
    <ion-tab title="火车" icon-on="bar-train-on" icon-off="bar-train-off" class="forget"  on-select="show(2)">
        <ion-nav-view name="tab-train"></ion-nav-view>
    </ion-tab>
    <ion-tab title="酒店" icon-on="bar-hotel-on" icon-off="bar-hotel-off" class="forget"  on-select="show(3)">
        <ion-nav-view name="tab-hotelhome"></ion-nav-view>
    </ion-tab>
    <ion-tab title="我的" icon-on="bar-myself-on" icon-off="bar-myself-off" class="forget"  on-select="show(4)">
        <ion-nav-view name="tab-user"></ion-nav-view>
    </ion-tab>
</ion-tabs>