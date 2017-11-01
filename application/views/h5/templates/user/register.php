<ion-view view-title="比比旅行">
    <ion-content>
        <!------主页--------->
        <style type="text/css">  
            .tisomeBox .tismbox p{line-height: 135%;padding: 0rem;}
            .bsrroebox .buti_New input{font-size: 1.3rem;padding-top: 0.5rem;display:inline;padding-bottom: 0;height:3rem;}
            .bsrroebox .buti_New input.phoneName{}
            #termsOfService{position: absolute;top: 10%!important;left: 9%!important;min-width: 11rem;border-radius: 0.15rem;overflow: hidden;width: 80%;height: 80%;background: #fff;z-index: 1000;margin-top: 0;}
            .termsOfService .head{background-color: #2577e3;color: #fff;width: 4rem;text-align: center;height: 2.8rem;line-height: 2.5rem;border-radius:3px;}
            #termsOfService .center{width: 100%;max-height: 100%;padding: 0 1.5rem;float: left;padding-bottom: 4rem;}
            .popover-backdrop.active {background-color: rgba(0,0,0,.4);}
        </style>
        <section class="wrap_Box bg_icon">
            <a class="reballBox dp_b icon" ui-sref="login"><img src='<?php echo base_url("resources/air/image/ic_return.png"); ?>'></a>
            <div class="re_logo pa_50_100">
                
                <p class="f_s22 c_fff text_a_c" style="color: #6A6C6F;">欢迎注册</p>
            </div>
            <section class="bsrroebox f_s14">
                <div class="buti_New  border_b_1_807f99 mb_55 ">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginself.png"); ?>'></span>
                    <input name="" type="tel" class="f_s13 c_fff phoneName pt_55 pb_55 mt_55 wid60" placeholder="手机号" ng-model="registerInfo.shoujihaoma">
                </div>
                <div class="buti_New  border_b_1_807f99 mb_55">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginphone.png"); ?>'></span>
                    <input name="" type="tel" class="fl f_s13 codes c_fff pt_55 pb_55 mt_55 wid40" placeholder="6位数字" maxlength="6" ng-model="send.code">
                    <input style="padding:0;margin-top:1.5rem;color:#fff;border-radius: 0; filter: alpha(opacity=30);-moz-opacity:0.3; opacity:0.3;background-color: black;height: 2rem;line-height: 2rem;font-size: 1.2rem;" name="" type="button" class="snsit_but f_s13 text_a_c fr  c_fff " value="获取验证码" ng-click="sendVerifyCode()">
                </div>
               
                <div class="buti_New  border_b_1_807f99 mb_55">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginpsd.png"); ?>'></span>
                    <input style="margin-top: 4px;" name="" type="password" class="c_fff f_s13 possword" maxlength="18" minlength="8" placeholder="8-18位字母,数字,特殊字符中两种" ng-model="registerInfo.mima">
                </div>
            </section>
            <input style="background: #49D3DD;border-radius: 30px;color: white;margin-top: 4rem;margin-bottom: 2rem;" name="" type="submit" class="reboxBut c_1f1f1f bg_e4e4e4 f_s16 registerBut" value="完成注册并登陆" ng-click="confirm()">
            <p class="wiks wrapfix pt_55">
                <label class="c_aeaeae fl f_s13 df-c-c-r" for="yuan-1-2" ng-click="showTermsOfService($event)">
                    <input type="checkbox" id="yuan-1-2" class="regular-checkbox" ng-model="termsOfService" ng-checked="termsOfService" />
                    <label></label>
                    <span style="color: #554844;">同意服务条款</span>
                </label>
                <a class="c_fff fr f_s13" ng-click="gotoLogin();"style="text-decoration: underline;color: #4B4444;">已有帐号</a>
            </p>
        </section>
        <!-- 浮动窗口 -->
        <div id="mask" class="mask"></div>

        <!-- 订单须知 -->
        <!--        <div id="termsOfService" class="popupWin termsOfService">
                    <div class="head"></div>
                    <div class="center">
                        <div class="content">
                            <p class="title">一、用户权利</p>
                            <p>
                                在您完成注册手续后，意味着您已获得比比旅行账户的使用权。您应提供及时、详尽及准确的个人资料，并不断更新注册资料，符合及时、详尽准确的要求。您应妥善保管您的账户和密码，通过您的账户和密码操作或实施的行为，将视为您本人的行为，由您本人承担相应的责任和后果。如果您发现他人不当使用您的账户或有任何其他可能危及您的账户安全的情形时，您应当立即以书面、有效方式通知比比旅行，要求比比旅行暂停相关服务。在此，您理解比比旅行对您的请求采取行动需要合理时间，比比旅行对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任。
                            </p>
                            <p class="title">二、使用规则</p>
                            <p>
                                您可自行注册账号名称，编辑头像、简介等注册信息，但您承诺遵守法律法规、社会主义制度、国家利益、公民合法权益、公共秩序、社会道德风尚和信息真实性等七条底线，并遵守《互联网用户账号名称管理规定》及相关管理规定，且账号名称、头像和简介等注册信息中不得含有违法和不良信息。
                            </p>
                            <p>
                                若您以虚假信息骗取账号名称注册，或您账号头像、简介等注册信息存在违法和不良信息的，或利用比比旅行账号实施重复侵权行为的，比比旅行有权采取通知您限期改正、暂停使用、注销登记等措施。
                            </p>
                            <p>
                                您须对自己在使用比比旅行网络服务过程中的行为承担法律责任，包括但不限于：对受到侵害者进行赔偿，以及在比比旅行在先承担了因您的行为导致的行政处罚或侵权损害赔偿责任后，您应给予比比旅行等额的赔偿。
                            </p>
                            <p class="title">三、服务的变更、中断或终止</p>
                            <p>
                                您完全理解并同意，本服务涉及到互联网及移动通讯等服务，可能会受到各个环节不稳定因素的影响。因此任何因不可抗力、计算机病毒或黑客攻击、系统不稳定、用户所在位置、用户关机、GSM网络、互联网络、通信线路等其他比比旅行无法预测或控制的原因，造成服务中断、取消或终止的风险，由此给您带来的损失比比旅行不承担赔偿责任。
                            </p>
                        </div>
                    </div>
                </div>
        -->
        <!----主页 end------>
        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script type="text/javascript">
                $(function() {
                    publicFunction.winheight();
//                    $('#head').on('click', function() {
//                        $('#mask').hide();
//                    });
                })
                
                                       
                
                
                
        </script>
        <script id="termsOfService.html" type="text/ng-template">
            <ion-popover-view id="termsOfService" class="popupWin termsOfService">
                <ion-header-bar>
                    <div ng-click="closePopover($event);" class="head">确定</div>
                </ion-header-bar>
              <ion-content>
                  <div class="center">
                      <div class="content">
                          <p class="title">一、用户权利</p>
                          <p>
                              在您完成注册手续后，意味着您已获得比比旅行账户的使用权。您应提供及时、详尽及准确的个人资料，并不断更新注册资料，符合及时、详尽准确的要求。您应妥善保管您的账户和密码，通过您的账户和密码操作或实施的行为，将视为您本人的行为，由您本人承担相应的责任和后果。如果您发现他人不当使用您的账户或有任何其他可能危及您的账户安全的情形时，您应当立即以书面、有效方式通知比比旅行，要求比比旅行暂停相关服务。在此，您理解比比旅行对您的请求采取行动需要合理时间，比比旅行对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任。
                          </p>
                          <p class="title">二、使用规则</p>
                          <p>
                              您可自行注册账号名称，编辑头像、简介等注册信息，但您承诺遵守法律法规、社会主义制度、国家利益、公民合法权益、公共秩序、社会道德风尚和信息真实性等七条底线，并遵守《互联网用户账号名称管理规定》及相关管理规定，且账号名称、头像和简介等注册信息中不得含有违法和不良信息。
                          </p>
                          <p>
                              若您以虚假信息骗取账号名称注册，或您账号头像、简介等注册信息存在违法和不良信息的，或利用比比旅行账号实施重复侵权行为的，比比旅行有权采取通知您限期改正、暂停使用、注销登记等措施。
                          </p>
                          <p>
                              您须对自己在使用比比旅行网络服务过程中的行为承担法律责任，包括但不限于：对受到侵害者进行赔偿，以及在比比旅行在先承担了因您的行为导致的行政处罚或侵权损害赔偿责任后，您应给予比比旅行等额的赔偿。
                          </p>
                          <p class="title">三、服务的变更、中断或终止</p>
                          <p>
                              您完全理解并同意，本服务涉及到互联网及移动通讯等服务，可能会受到各个环节不稳定因素的影响。因此任何因不可抗力、计算机病毒或黑客攻击、系统不稳定、用户所在位置、用户关机、GSM网络、互联网络、通信线路等其他比比旅行无法预测或控制的原因，造成服务中断、取消或终止的风险，由此给您带来的损失比比旅行不承担赔偿责任。
                          </p>
                      </div>
                  </div>
              </ion-content>
            </ion-popover-view>
        </script> 
    </ion-content>
</ion-view>
