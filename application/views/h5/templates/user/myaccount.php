<ion-view view-title="比比旅行">
    <style type="text/css">
        .msgBox_tisomeBox div {
            top: 40%;
            left: 50%;
        }
		        .returnbut_ac{ position:absolute; left:1rem; top:50%; margin-top:-1.138rem; height:2.277rem; line-height:2.277rem; font-size:1.6rem;}
        .returnbut_ac span{ display:inline-block; width:1.27rem; height:2.277rem; background:url('<?php echo base_url("resources/air/image/iocn_arrow.png");?>') no-repeat; background-size:1.27rem 2.277rem; vertical-align:top; margin-right:0.5rem; cursor:pointer;}
    </style>
    <ion-content>
        <!------主页--------->
        <section class="wrap_Box mainbox ptHeiht" style="min-height: 480px;padding-top: 3.9rem;">
            <div class="flight_title po_re text_a_c bg_fff pofir" style="background:#49d3dd;">
                <a class="returnbut_ac c_fff f_s18" ng-click="gotoUser();"><span></span>返回</a>
                <span class="f_s18">我的账户</span>
            </div>
            <section ng-style="loading">
                <ul class="bg_fff f_s14 usreUl">
                    <li class="wrapfix po_re heius6 headList">
                        <span class="fl c_181818">头像</span>
                        <span style="float:none;margin: 0 auto;" class="icon bsit_box fr"><img style="margin: 0 auto;" ng-src="{{member.img}}"></span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>
                    <li class="wrapfix po_re datalist" ng-click="memberDisplay()">
                        <span class="fl c_181818">姓名</span>
                        <span class="fr c_999 userName" ng-bind="member.xingming"></span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>
                    <li class="wrapfix po_re datalist" ng-click="memberDisplay()">
                        <span class="fl c_181818">性别</span>
                        <span class="fr c_999" ng-bind="member.xingbie =='男' ? '男' : '女' "></span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>
                    <li class="wrapfix po_re phonelist" ng-click="memberDisplay()">
                        <span class="fl c_181818">绑定手机</span>
                        <span class="fr c_999" ng-bind="member.disableMobile"></span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>
                    <!--<li class="wrapfix po_re emaillist" ng-click="memberDisplay()">
                        <span class="fl c_181818">绑定邮箱</span>
                        <span class="fr c_999" ng-bind="member.disableMobile"></span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>-->
                    <li class="wrapfix po_re emaillist" ng-click="memberDisplay()">
                                <span class="fl c_181818">绑定邮箱</span>
                                <span class="fr c_999" ng-bind="member.disableYouXiang.length ==0 ? '绑定后可提高账号安全性': member.disableYouXiang">绑定后可提高账号安全性</span>
                                <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                            </li>
                    
                    <li class="wrapfix po_re passwordlist">
                        <span class="fl c_181818">登录密码</span>
                        <span class="fr c_999" ng-show="member.mima==''">尚未设置密码</span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>
                   <!-- <li class="wrapfix po_re" style="display:block;">
                        <span class="fl c_181818">微信账号</span>
                        <span class="fr c_999">已绑定</span>
                        <i class="icon"><img src='<?php echo base_url("resources/air/image/afd1.png"); ?>'></i>
                    </li>-->
                </ul>
                <a ng-click="switchuser()">
                    <input style="background: #49D3DD;border-radius: 30px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="退出当前账号" />
                </a>
            </section>
        </section>
        <!----主页 [end]------>
        <!----头像------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 headPortrait" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">上传头像</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
                <a class="but_nsit f_s16 upload" ng-click="upload()">上传</a>
                <input type="hidden" id="hideinput" ng-model="imgurl"/>
            </div>
            <!--------头部header   [end]---------->
            <section class="pt_100" ng-if="openmode == 'web'">
                <div id="clipArea"></div>
                <div id="view" style="display:none;"></div>
                <div class="pa_100 wrapfix">
                    <span class="shuwikks fl">选择图片<input type="file" id="file" /></span>
                    <input type="button" id="clipBtn" value="截取" class="shuwikks fr" />
                </div>
            </section>
        </section>
        <!----头像  [end]------->

        <!----编辑个人资料------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 dataMation" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">编辑个人资料</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
            </div>
            <!--------头部header   [end]---------->
            <section class="bg_fff f_s13">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">姓名</span>
                    <input name="" type="text" class="fl f_s13 dataName" style='font-size:1.3rem;' placeholder="订票时的默认联系人" ng-model="memberNew.xingming" maxlength="50"/>
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">性别</span>
                    <div class="nrigbox fr">
                        <span class="mr_200 "><input type="radio" id="radio-v-1" name="radio-v-set" class="regular-radio" value="男" ng-checked="memberNew.xingbie =='男'" ng-model="memberNew.xingbie"/><label for="radio-v-1" class="vm mr_55" ></label>男</span>
                        <span><input type="radio" id="radio-v-2" name="radio-v-set" class="regular-radio"  value="女" ng-checked="memberNew.xingbie == '女'"  ng-model="memberNew.xingbie" /><label for="radio-v-2" class="vm mr_55"></label>女</span>
                    </div>
                </div>
            </section>
            <input  style="background: #49D3DD;border-radius: 4px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="保存"  ng-click="SaveMemberInfo('name_gender')"/>
        </section>
        <!----编辑个人资料  [end]------->
        <!----绑定手机------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 phoneMation" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">绑定手机</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
            </div>
            <!--------头部header   [end]---------->
            <section class="bg_fff f_s13">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">手机号</span>
                    <input name="" type="tel" class="fl f_s13 myphone pt_55 pb_35 mt_30 wid60"  placeholder="请输入要绑定的手机号" maxlength="11" ng-model="memberNew.shoujihaoma"/>
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">验证码</span>
                    <input name="" type="tel" class="fl f_s13 mycodes pt_55 pb_35 mt_30 wid40" placeholder="请输入验证码" maxlength="6" ng-model="send.code"/>
                    <input style="margin: 0;background:#999999;filter:alpha(opacity=30);-moz-opacity:0.3;opacity: 0.3;border-radius: 0;   " name="" type="button" class="snsit_but text_a_c fr c_fff " value="获取验证码" ng-click="sendVerifyCode('shoujihaoma')"/>
                </div>
            </section>
            <input style="background: #49D3DD;border-radius: 4px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="绑定" ng-click="SaveMemberInfo('shoujihaoma')"/>
            <p class="ansuPtxt f_s13 c_999 text_a_c mt_300" style="display:none;">您今日已申请发送了太多次验证码，<br/>若有疑问请拨打客服电话<span class="c_289deb">400-991-7909</span></p>
        </section>
        <!----绑定手机  [end]------->
        <!----绑定邮箱------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 emailMation" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">绑定邮箱</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
            </div>
            <!--------头部header   [end]---------->
            <section class="bg_fff f_s13">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">邮箱</span>
                    <input name="" type="text" class="fl f_s13 myemail" placeholder="请输入要绑定的邮箱" ng-model="memberNew.youxiang" maxlength="50"/>
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">验证码</span>
                    <input name="" type="tel" class="fl f_s13 mycodes pt_55 pb_35 mt_30" placeholder="请输入验证码" maxlength="6" style="width:40%" ng-model="send.code" />
                    <input style="margin: 0;background:#999999;filter:alpha(opacity=30);-moz-opacity:0.3;opacity: 0.3;border-radius: 0;" name="" type="button" class="snsit_but text_a_c fr c_fff " value="获取验证码" ng-click="sendVerifyCode('youxiang')" />
                </div>
            </section>
            <input style="background: #49D3DD;border-radius: 4px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="绑定" ng-click="SaveMemberInfo('youxiang')"/>
        </section>
        <!----绑定邮箱  [end]------->
        <!----修改登录密码------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 passwordMation" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">修改登录密码</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
            </div>
            <!--------头部header   [end]---------->
            <section class="bg_fff f_s13 mb_100">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix ">
                    <span class="dp_i_b fl pr_55 c_606060">当前密码</span>
                    <input name="" type="password" class="fl f_s13 oldpassword " placeholder="请输入当前密码" ng-model="password.oldpassword"  maxlength="60">
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix ">
                    <span class="dp_i_b fl pr_55 c_606060">新密码</span>
                    <input name="" type="password" class="fl f_s13 newpassword" placeholder="8-18位字母,数字,特殊字符中两种" ng-model="password.newpassword" maxlength="18">
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix cheis_box">
                    <span class="dp_i_b fl pr_55 c_606060">确认密码</span>
                    <input name="" type="password" class="fl f_s13 paopassword" placeholder="8-18位字母,数字,特殊字符中两种" ng-model="password.paopassword" maxlength="18">
                </div>
            </section>
            <!--<p class="wiks text_a_r "><label><span class="situ_diud dp_i_b mr_55">显示密码</span><input type="checkbox" id="checkbox-r-1" class="regular-checkbox passwordshow" /><label class="vm" for="checkbox-r-1"></label></label></p>-->
            <input  style="background: #49D3DD;border-radius: 4px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="修改" ng-click="SaveMemberInfo('mima')">
        </section>
        <!----修改登录密码  [end]------->
        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/iscroll-zoom.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/hammer.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/lrz.all.bundle.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/jquery.photoClip.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/myAccount.js"); ?>'></script>
    </ion-content>
</ion-view>