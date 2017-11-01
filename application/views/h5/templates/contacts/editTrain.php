<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">编辑联系人</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back()"><span></span>返回</a>

             <a class="but_nsit f_s16 " ng-click="saveContact()">确定</a> 

        </div>

        <!--------头部header   [end]---------->
    </ion-header-bar>
  <ion-content>
    <!----新增或编辑联系人------------------------------>

    <section class="wrap_Box addcontacts bg_f6f6f6 pttop50" style="padding-top: 2rem;">



        <!----联系人信息 [end]---------->

        <section class="bg_fff f_s13">

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">姓名</span>
                <input name="" type="text" class="fl f_s13" id="attenName" placeholder="请输入联系人的姓名" maxlength="30" ng-model="contact.xingming" />
            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">手机号</span>
                <input name="" type="text" class="fl f_s13" id="attenPhone" placeholder="请输入手机号" maxlength="11" ng-model="contact.shoujihaoma" />
            </div>
            <!--
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">联系地址</span>
                <input name="bx_invoice_address" type="text" class="fl f_s13" id="bx_invoice_address" placeholder="请输入保险发票联系地址" ng-model="contact.bx_invoice_address" />
            </div>
            
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">联系电话</span>
                <input name="bx_invoice_phone" type="text" class="fl f_s13" id="bx_invoice_phone" placeholder="请输入保险发票联系电话" maxlength="11" ng-model="contact.bx_invoice_phone" />
            </div>
            
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                <span class="dp_i_b fl pr_55 c_606060">邮政编号</span>
                <input name="bx_invoice_zipcode" type="text" class="fl f_s13" id="bx_invoice_zipcode" placeholder="请输入手机号" maxlength="11" ng-model="contact.bx_invoice_zipcode" />
            </div>
            -->
        </section>
        <!--确定键-->
        <!--<button class="button button-full button-positive" ng-click="saveContact()">
          确定
        </button>-->

  </ion-content>
</ion-view>