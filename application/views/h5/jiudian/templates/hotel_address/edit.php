<ion-view view-title="地址编辑">
	<style type="text/css">
		.lianxiren input[type="text"]{
            font-size: 1.3rem;
        }
	</style>
    <ion-header-bar align-title="center" class="bar-positive" style="background-color: #49d3dd;background-image: none;border-color:#49d3dd;">
        <!--------头部header---------->
        <a class="button icon-left ion-ios-arrow-back button-clear" ng-click="back()">返回</a>
        <span class="title">{{title}}收件地址</span>
<!--        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
            <span class="heaTxx">{{title}}收件地址</span>
            <a class="returnbut c_fff f_s16 returnjs"  ng-click="back()"><span></span>返回</a>
        </div>-->
        <!--------头部header   [end]---------->
    </ion-header-bar>
    <ion-content>
        <!----联系人信息 [end]---------->
        <section class="bg_fff f_s13 lianxiren">
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">收件人</span>
                <input name="" type="text" class="fl f_s13" id="addressName" placeholder="请输入收件人姓名" ng-model="address.shoujianrenmingzi" />
            </div>
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">手机号</span>
                <input name="" type="text" class="fl f_s13" id="addressPone" placeholder="请输入手机号" ng-model="address.shoujihao" />
            </div>
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">详细地址</span>
                <input name="" type="text" class="fl f_s13" id="addressLisr" placeholder="请输入详细地址" ng-model="address.dizhi" />
            </div>
        </section>
        <!----联系人信息 [end]---------->
        <!----新增或编辑收件地址 [end]------------------------------>
        <button class="button button-full button-positive" ng-click="saveAddress(!disable.isEdit)" style="background-color: #49d3dd;border-width:0">确定</button>
    </ion-content>
</ion-view>