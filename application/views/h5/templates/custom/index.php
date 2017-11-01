<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive" style='order-color: #49d3dd;background-color: #49d3dd;background-image: linear-gradient(0deg,#49d3dd,#49d3dd 50%,transparent 50%);'>
        <!--------头部header----------> 
            <div class="title" style='font-size: 1.6rem;'>
                <a class="returnbut c_fff" style='font-size: 1.6rem;' ng-click="back();"><span></span>返回</a>
                <span class="f_s18">比比旅行</span>
            </div>
            <!--------头部header   [end]---------->
    </ion-header-bar>
    <ion-content class="custom-content">
        <style>
            .nsit_siur li a {
                height: 6.4rem;
            }
            .nsit_siur li a i{
                margin-right: 3.55rem;
            }
            .nsit_siur li a i img {
                width:800%;
            }
        </style>

        <!----主页---------->
        <section class="wrap_Box mainsecit pb_footer" style="background-color:#F6F6F6">
            

            <!----banner------>
            <div class="icon"><img src='<?php echo base_url("resources/air/image/banner.jpg"); ?>'></div>
            <!----banner  [end]------>

            <!----客服电话---------->
            <div class="pa_100 bg_fff border_b_1_e9 wrapfix mb_100">
                <span class="f_s16 pt_55  pb_55 fl c_2c2c2c">客服专线: 400-991-7909</span>
                <a class="fl c_fff nsit_box yoan_3 pt_55  pb_55" style="color:#49d3dd;font-size:1.6rem;margin-left:10%;" href="tel:4009917909"><i class="icon icon-phone"></i>拨打电话</a>
            </div>
            <!----客服电话 [end]---------->

            <!----在线客服---------->
            <section class="bg_fff border_t_1_e9 mb_100">
                <p class="pa_100 f_s16">在线客服</p>
                <p class="nsit_siur c_181818 f_s14 wrapfix ">
                    <span class="text_a_c fl"><a class="icon"><img src='<?php echo base_url("resources/air/image/qr_code_wx.png"); ?>' /></a></span>
                    <span class="text_a_c fl"><a class="icon"><img src='<?php echo base_url("resources/air/image/qr_code_qq2.png"); ?>' /></a></span>
                </p>
                <p class="nsit_siur c_181818 f_s14 wrapfix">
                    <span class="text_a_c fl">比比在线为您服务</span>
                    <span class="text_a_c fl">扫描进入QQ交流群</span>
                </p>
                <p class="nsit_siur c_181818 f_s14 wrapfix pt_55 pb_100" >
                    <span class="text_a_c fl">比比旅行网</span>
                    <span class="text_a_c fl">567992269</span>
                </p>
            </section>
            <!--<div class="icon mb_100"><img src="images/qr_code.png" /></div>-->
            <!----在线客服 [end]---------->

            <!----常见问题--------------->
            <section class="bg_fff border_t_1_e9 mb_100">
                <p class="pa_100 f_s16">常见问题</p>
                <ul class="nsit_siur border_t_1_e9 c_181818 f_s14 wrapfix">
                    <li class="text_a_c fl securityBut" ng-click="gotoSafty();"><a class="dp_b c_181818"><i class="icon mr_55 dp_i_b"><img src='<?php echo base_url("resources/air/image/enk01.png"); ?>'></i>安全保障</a></li>
                    <li class="text_a_c fl gubskBut" ng-click="gotoBuy();"><a class="dp_b c_181818"><i class="icon mr_55 dp_i_b"><img src='<?php echo base_url("resources/air/image/enk02.png"); ?>'></i>购票</a></li>
                    <li class="text_a_c fl accountBut" ng-click="gotoZhanghao();"><a class="dp_b c_181818"><i class="icon mr_55 dp_i_b"><img src='<?php echo base_url("resources/air/image/enk03.png"); ?>'></i>账号管理</a></li>
                    <li class="text_a_c fl tuisBut" ng-click="gotoTuigai();"><a  class="dp_b c_181818"><i class="icon mr_55 dp_i_b"><img src='<?php echo base_url("resources/air/image/enk04.png"); ?>'></i>退改签</a></li>
                </ul>
            </section>
            <!----常见问题  [end]--------------->

            <!----关于我们--------------------->
            <div class="pa_100 bg_fff border_b_1_e9 border_t_1_e9 f_s16 po_re mb_100 aboutUsBut fw_b" ng-click="gotoAboutUs();" style="font-weight:normal;color:#49d3dd;">关于我们<i class="nsku_i"></i></div>
            <!----关于我们  [end]--------------------->

            <!------尾部导航------------>
            <nav class="navFooter box_bb border_t_1_d bg_fff" style="display:none;">
                <li >
                    <a href="index.html?status=1" class="dp_b">
                        <div class="ticket"></div>
                        <p >机票</p>
                    </a>
                </li>
                <li class="on" >
                    <a href="###" class="dp_b">
                        <div class="customer_service"></div>
                        <p >客服</p>
                    </a>
                </li>
                <li >
                    <a href="my.html" class="dp_b">
                        <div class="my"></div>
                        <p >我的</p>
                    </a>
                </li>
            </nav>
            <!------尾部导航 [end]------------>		
        </section>
        <!----主页------>
    </ion-content>
</ion-view>