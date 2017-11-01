<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
</style>
<ion-header-bar align-title="left" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">{{title}}收件地址</span>

            <a class="returnbut c_fff f_s16 returnjs"  ng-click="back()"><span></span>返回</a>

             <a class="but_nsit f_s16 addresbutton" ng-click="saveAddress(!disable.isEdit)">确定</a> 

        </div>

        <!--------头部header   [end]---------->
</ion-header-bar>
  <ion-content style="top:4rem">
    
        <!----联系人信息 [end]---------->

        <section class="bg_fff f_s13">

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

    </section>

    <!----新增或编辑收件地址 [end]------------------------------>
    <!--<button class="button button-full button-positive" ng-click="saveAddress(!disable.isEdit)">确定</button>-->
  </ion-content>
</ion-view>