<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
         <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
            <span class="heaTxx">编辑联系人</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back()"><span></span>返回</a>
            <!-- <a class="but_nsit f_s16 " ng-click="saveContact()">确定</a> -->

        </div>
    </ion-header-bar>
  <ion-content>
      <section class="wrap_Box addcontacts bg_f6f6f6 pttop50" style="padding-top: 2rem;">
	  <section class="bg_fff f_s13">
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">姓名</span>
                <input name="contacts_ziying_name" type="text" class="fl f_s13" id="contacts_ziying_name" placeholder="请输入联系人的姓名"  />
            </div>
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">手机号</span>
                <input name="contacts_ziying_Phone" type="text" class="fl f_s13" id="contacts_ziying_Phone" placeholder="请输入手机号" />
            </div>
        </section>
        <button class="button button-full button-positive" ng-click="saveContact()">
          确定
        </button>
	  </section>
  </ion-content>
</ion-view>