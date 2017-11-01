<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">{{title}}乘客</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back()"><span></span>返回</a>
            
            <a class="but_nsit f_s16 addbutton" ng-click="saveUserContact(!disable.identityType)">确定</a> 

        </div>

        <!--------头部header   [end]---------->
    </ion-header-bar>
    <style type="text/css">
    .checkbox input:checked+.checkbox-icon:before, .checkbox input:checked:before{
        background: #49d3dd;
        border-color: #49d3dd;
    }
      .passenger{
        top: 4rem;

      }
        input[type="text"]{
            font-size: 1.3rem;
        }
      .pa_55 {
          padding: 0.55rem;
      }
      .tip p{
          line-height:130%;
      }
    </style>
    <ion-content class="passenger">

        <!----联系人信息---------->

        <section class="bg_fff f_s13">

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                <span class="dp_i_b fl pr_55 c_606060">姓名</span>

                <input name="" type="text" class="fl f_s13" maxlength="26" placeholder="与乘机证件上一致" id="addname" ng-model="userContact.zhongwenming" />

            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                <span class="dp_i_b fl pr_55 c_606060">证件类型</span>
                
                <select class="bsit_bixsles f_s14" id="addcredentials" ng-model="userContact.zhengjianleixing" ng-disabled="disable.identityType">
                    <option ng-repeat="x in identitys" value="{{x.Name}}">{{x.Name}}</option>
                </select>
                
            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">

                <span class="dp_i_b fl pr_55 c_606060">证件号码</span>

                <input name="" type="text" class="fl f_s13" placeholder="与乘机证件上一致" id="addnumber" ng-model="userContact.zhengjianhaoma" />

            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix bapdate" ng-style="myStyle.birthday">

                <span class="dp_i_b fl pr_55 c_606060">出生日期</span>

                <input name="" type="text" class="fl f_s13" id="inputpdate" placeholder="请输入出生日期(格式:2000-01-01)" ng-model="userContact.chushengriqi" />

            </div>

            <div id="datePlugin"></div>

        </section>
        <!--确定键-->
        <!--<button class="button button-full button-positive" ng-click="saveUserContact(!disable.identityType)">
          确定
        </button>-->

        <!----联系人信息 [end]---------->

        <!-----提示------->
        <ion-checkbox ng-model="isShow" ng-change="pushNotificationChange(isShow)" ng-init="isShow=true"><span style="position: absolute;top: 50%;left: 50px;z-index: 3;margin-top: -10px;">提示</span></ion-checkbox>

        <section class="pa_100  mb_100  f_s12 c_929292 tip" ng-show="isShow">

            <p class="mb_55">提示：</p>

            <p class="mb_55">

                1. 登机时出示证件的号码，应与订票时所填证件号码一

                致。

            </p>

            <p class="mb_55">2. 中国旅客购买国内机票可以使用的证件有：身份证、护照、公安部门发放的临时身份证明、军官证、武警警官证、士兵证、军队学员证、军队文职干部证、军队离退休干部证、军队职工证、港澳通行证、学生证、户口簿、户口所在地公安机关出具的身份证明、出生证明。</p>

            <p class="mb_55">3. 外国旅客、华侨、港、澳、台胞购买国内机票可以使用的证件有：护照、外交官证、港澳地区居民旅行证件、台湾同胞旅行证件。</p>

            <p class="mb_55">4. 购买国际机票必须使用护照，不能使用其他类型的证件。</p>

            <p class="mb_55">5. 年龄为2-12周岁的乘客可以购买儿童票，但登机当天应未满12周岁。</p>

            <p class="mb_55">6. 年龄为2周岁以下乘客应购买婴儿票，婴儿票手续复杂，请拨打客服电话预订。</p>

            <p class="mb_55">7. 有其他特殊要求请拨打客服电话 400-991-7909 咨询。</p>



        </section>

        <!-----提示  [end]------->

    </section>
     <script type="text/javascript">
     
     $(document).on("change", "#addcredentials", function() {
                    if ($(this).val() == "身份证") {
                        $(".bapdate").hide();
                    } else {
                        var a = $('#inputpdate').val();
                        if(a !='' && a == null){
                            $('#inputpdate').val("1980-01-01");
                        }
                        $(".bapdate").show();
                    }
                });
     </script>

    <!----新增或乘客 [end]------------------------------>

    </ion-content>

  <script type="text/javascript">
    
     $(function(){
        $('#inputpdate').date();
     });
    
 </script>
  </ion-view>