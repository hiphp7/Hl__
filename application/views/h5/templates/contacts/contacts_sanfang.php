<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">{{status}}联系人</span>

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

                <input name="xingming" type="text" class="fl f_s13" id="attenName" ng-trim="true" placeholder="请输入联系人的姓名" ng-model="contact.xingming" />

            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                <span class="dp_i_b fl pr_55 c_606060">手机号</span>

               <input name="phone" type="text" class="fl f_s13 required" id="attenPhone"  placeholder="请输入手机号" ng-model="contact.shoujihaoma" />
<!--                 <span calss="fl" style="width: 20%;text-align: center;">
                <button id='fsdxyzm' class="button button-positive" style="width: 15%;background-color: #2577E3" ng-click="postduanxin()">
                  获取短信验证码
                </button>
                </span>
                <input name="code" type="text" class="fr f_s13 required" style="width: 25%" placeholder="请输入短信验证码" ng-model="a.code" /> -->

            </div>

            <div id='div_shangfang_lianxiren_add' class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

<!--                 <span class="dp_i_b fl pr_55 c_606060" style="width: 30%">请输入短信验证码</span>

                <input name="xingming" type="text" class="fl f_s13" id="attenName" ng-trim="true" placeholder="请输入联系人的姓名" ng-model="contact.xingming" /> -->
                                <!-- <span calss="fl" > -->
                                <button id='fsdxyzm' class="fl button button-positive" style="width: 50%;background-color: #2577E3; height: 3rem; min-height: 3rem; line-height: 3rem" ng-click="postduanxin()">
                                  获取短信验证码
                                </button>
                                <!-- </span> -->
                                <input name="code" type="text" class="fl f_s13 required" style="width: 25%" placeholder="请输入短信验证码" ng-model="a.code" />

            </div>


        </section>

        <!----联系人信息 [end]---------->
            <button class="button button-full button-positive" ng-click="saveContact(!disable.isEdit)">确定</button>
        <!-----提示------->
	        <ion-checkbox id="chk_ts" ng-model="pushNotification.checked" ng-change="pushNotificationChange()">提示</ion-checkbox>
        <section class="pa_100  mb_100  f_s12 c_929292 ">

            

            <div id='tishi_d' ng-show="isShow">

            <p class="mb_55">1. 登机时出示证件的号码，应与订票时所填证件号码一致。</p>

            <p class="mb_55">2. 中国旅客购买国内机票可以使用的证件有：身份证、护照、公安部门发放的临时身份证明、军官证、武警警官证、士兵证、军队学员证、军队文职干部证、军队离退休干部证、军队职工证、港澳通行证、学生证、户口簿、户口所在地公安机关出具的身份证明、出生证明。</p>

            <p class="mb_55">3. 外国旅客、华侨、港、澳、台胞购买国内机票可以使用的证件有：护照、外交官证、港澳地区居民旅行证件、台湾同胞旅行证件。</p>

            <p class="mb_55">4. 购买国际机票必须使用护照，不能使用其他类型的证件。</p>

            <p class="mb_55">5. 年龄为2-12周岁的乘客可以购买儿童票，但登机当天应未满12周岁。</p>

            <p class="mb_55">6. 年龄为2周岁以下乘客应购买婴儿票，婴儿票手续复杂，请拨打客服电话预订。</p>

            <p class="mb_55">7. 有其他特殊要求请拨打客服电话 400-991-7909 咨询。</p>
            </div>


        </section>

        <!-----提示  [end]------->

    </section>

    <!----新增或编辑联系人 [end]------------------------------>
  </ion-content>
</ion-view>


































