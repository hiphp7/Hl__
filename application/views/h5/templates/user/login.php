<ion-view view-title="比比旅行">
    <ion-content>
        <style type="text/css">
        .bsrroebox .buti_New input{
            font-size: 1.3rem;
            color:#000;
        }
        </style>
        <!---主页-->
        <section class="wrap_Box bg_icon " style="min-height: 640px;">
            <a class="reballBox dp_b icon" ui-sref="bibi"><img src='<?php echo base_url("resources/air/image/ic_return.png"); ?>'></a>
            <div class="re_logo pa_50_100">
                <div class="icon logoIcon"><img src='<?php echo base_url("resources/air/image/loginlogo.png"); ?>'></div>
                
            </div>
            <section class="f_s14 bsrroebox">
                <div class="buti_New  border_b_1_807f99 mb_55  " id="qq_nickname">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginself.png"); ?>'></span>
                    <input name="" type="text" class="f_s13 c_fff" placeholder="手机号/邮箱" ng-model="loginInfo.loginName">
                </div>
                <div class="buti_New  border_b_1_807f99 " id="qq_logout">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginlock.png"); ?>'></span>
                    <input name="" type="password" class="f_s13 posswordInput c_fff" placeholder="登录密码" ng-model="loginInfo.loginPass">
                </div>
            </section>
            <input name="" type="submit" class="reboxBut c_1f1f1f bg_e4e4e4 f_s16 loginBut myself" value="登录" ng-click="login()" style="background: #49D3DD;border-radius: 44px; -moz-border-radius: 44px; -webkit-border-radius: 44px; border-radius: 44px;" >
            <p class="wiks wrapfix pt_100">
                <a ng-click='gotoForgotPassword();' class="c_aeaeae fl f_s13" style="float: right;color:#fff;text-decoration: underline;">忘记密码</a>
                <div style="position: absolute;top: 2%;right: 2%;border-radius: 8px;width: 45px;height: 30px;line-height:30px;border:1px solid #fff;text-align: center;opacity: 0.8;filter:alpha(opacity=80);">
                    <a ng-click="gotoRegister();" class="c_fff fr f_s13" style="float: inherit;">注册</a>
                </div>
                
            </p>
            <!-- <section class="mt_200">
                <p class="wiks f_s13 bsit_topbox text_a_c "><span class="c_fff">第三方账号登录</span></p>
                <div class="sbit_A text_a_c mt_100 pb_200 ">
                    <a href="http://m.bibi321.com/hl/index.php/weixinlogin/index/{{sanfang_denglv}}/{{loginBack}}" class="icon c_fff"  /*ng-click="getLoginUrl('WX')"*/ ng-show="WeChat">
                        <img src='<?php echo base_url("resources/air/image/ic_WeChat.png"); ?>'>
                        <p class="f_s12 c_fff text_a_c mt_55">微信登录</p>
                    </a>
                    <a class="icon po_re" ng-click="getLoginUrl('QQ')">
                        <img src='<?php echo base_url("resources/air/image/ic_qq.png"); ?>'>
                        <p class="f_s12 c_fff text_a_c mt_55">QQ登录</p>
                    </a>
                </div>
            </section> -->
        </section>
        <!---主页-->
        <script type="text/javascript">
            $(function(){
            publicFunction.winheight();

            $(document).on("click", ".loginBut", function () {
            //var loginus = effectCommon.login();
            });
            })

        </script>
    </ion-content>
</ion-view>
