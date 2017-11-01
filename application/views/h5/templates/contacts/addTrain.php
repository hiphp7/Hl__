<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">添加联系人</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back()"><span></span>返回</a>


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

                <input name="xingming" type="text" class="fl f_s13" id="attenName" ng-trim="true" maxlength="30" placeholder="请输入联系人的姓名" ng-model="contact.xingming" />

            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                <span class="dp_i_b fl pr_55 c_606060">手机号</span>

               <input name="phone" type="text" class="fl f_s13 required" id="attenPhone"  maxlength="11" placeholder="请输入手机号" ng-model="contact.shoujihaoma" />

            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                                <button id='fsdxyzm' class="fl button button-positive" style="width: 50%;background-color: #2577E3; height: 3rem;min-height: 3rem;line-height: 3rem" ng-click="postduanxin()">
                                  获取短信验证码
                                </button>
                                
                                <input name="code" type="text" class="fl f_s13 required" style="width: 50%" placeholder="请输入短信验证码" ng-model="a.code" />

            </div>


        </section>

        <!----联系人信息 [end]---------->
            <button class="button button-full button-positive" ng-click="saveContact(!disable.isEdit)">确定</button>


    <!----新增或编辑联系人 [end]------------------------------>
  </ion-content>
</ion-view>


































