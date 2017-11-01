<ion-view view-title="比比旅行">
    <ion-content>
        <style type="text/css">
            .f_s13 {
                font-size: 1.3rem!important;
            }
            .bsrroebox .buti_New input{color:black;}
        </style>
        <section class="wrap_Box bg_icon" style="min-height: 627px;">
            <a class="reballBox dp_b icon" ui-sref="login"><img src='<?php echo base_url("resources/air/image/ic_return.png"); ?>'></a>
            <div class="re_logo pa_50_100">
                <div class="icon logoIcon"></div>
                <p class="f_s24 c_fff text_a_c" style="color: #666;">重设密码</p>
            </div>
            <section class="bsrroebox f_s14">
                <div class="buti_New  border_b_1_fff mb_100 ">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginself.png"); ?>'></span>
                    <input name="" type="tel" class="f_s13 c_fff phoneName pt_55 pb_55 mt_55 wid60" style='height:3rem;line-height:100%;display:inline-block;' placeholder="手机号" ng-model="registerInfo.shoujihaoma">
                </div>
                <div class="buti_New  border_b_1_fff mb_100">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginphone.png"); ?>'></span>
                    <input name="" type="tel" class="fl f_s13 codes c_fff pt_55 pb_55 mt_55 wid40" placeholder="6位数字" maxlength="6" ng-model="send.code">
                   <input style="padding:0;margin-top:1.5rem;color:#fff;border-radius: 0; filter: alpha(opacity=30);-moz-opacity:0.3; opacity:0.3;background-color: black;height: 2rem;line-height: 2rem;font-size: 1.2rem;" name="" type="button" class="snsit_but f_s13 text_a_c fr  c_fff " value="获取验证码" ng-click="sendVerifyCode()">
                </div>
                <div class="buti_New  border_b_1_fff mb_100">
                    <span class="icon leftIocn"><img src='<?php echo base_url("resources/air/image/loginpsd.png"); ?>'></span>
                    <input name="" type="password" class="c_fff f_s13 possword" maxlength="18" placeholder="设置新密码"  ng-model="registerInfo.mima">
                </div>
            </section>
            <input style="background: #49D3DD;border-radius: 30px;color: white;" name="" type="submit" class="reboxBut c_1f1f1f bg_e4e4e4 f_s16 registerBut" value="确认" ng-click="confirm()">
        </section>
    </ion-content>
</ion-view>
