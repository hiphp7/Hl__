<ion-view view-title="预定支付" >
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="goto()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" ng-bind="hotelname"></h1>
    </ion-header-bar>
    <div style=" margin: auto; width:100%; height: 100%; position: absolute;  background-color: rgba(0, 0, 0, 0.5); z-index: 20;" ng-show="fanhui" ng-click="quxiao()">
        <div style="margin:auto; width: 60%; height: 110px; text-align: center; min-width: 195px;
             background: white; position: absolute; top:0; left:0; bottom:0; right:0;">
            <div style="margin:20px 10px 0px 10px; height: 55px;">你的订单尚未填写完成，是否确定要离开当前页面?</div>
            <div class="row"style="padding:0;  height: 35px; border-top:1px solid #f3f3f3;">
                <div class="col" style="padding:0;  border-right:1px solid #f3f3f3;">
                    <input type="button" value="取消" ng-click="quxiao()"  style="width:100%; height: 100%; background: white; color: #49d3dd; "/>               
                </div>
                <div class="col" style="padding:0;">
                    <input type="button" value="确定" ng-click="queding()" style="width:100%; height: 100%; background: white; color: #49d3dd;"/>
                </div>
            </div>
        </div>
    </div>
    <ion-content style="background-color: #efefef;">
        <style type="text/css">
            .div1{overflow: hidden;}
            .div1 label{width: 22%;text-align: center;height: 35px; float: left; margin: 5px; padding-top: 5px;  }
            .aa{  border-radius: 5px; }
            .ruzhuren_label:last-child{ border:none!important; }
			.anniu{border-color: #49d3dd;}

			.anniuyanse{background-color: #49d3dd; color: white;}
		.anniuyanse:hover{ color:white;}
		.anniuyanse.activated{background-color: #49d3dd; color: white; border:0;}
        </style>
        <div class="item item-divider" style=" background-color:#49d3dd; height: 100px; padding: 12px 10px 8px 10px; border: 0;">
            <div style="background-color: white; height: 80px; border-radius: 3px; padding: 8px 5px 0 5px;">
                <b style="font-family: 黑体; font-size: 14px;" ng-bind="roomname"></b>
                <p style="font-family: 黑体;font-size: 12px; ">入住:<span ng-bind="ruzhuriqi"></span>&nbsp;离店:<span ng-bind="lidianriqi"></span>&nbsp;<span ng-bind="daynum"></span>晚</p>
                <p style="font-family: 黑体; font-size: 12px;">大床&nbsp;全部房间Wi-Fi、有线宽带免费&nbsp;每日单早</p>
            </div>
        </div>
        <!--<img src='<?php echo base_url("jiudian_img/jinxu.jpg"); ?>'  style="width: 100%; margin-bottom: 8px;">-->

        <div class="item item-icon-right" style="height: 46px; padding-right: 0;padding-top: 7px;padding-bottom: 0;" ng-click="showorhide()">
            <div class="row" style="padding-left: 0; padding-bottom: 0;">
                <div class="col-20" style="">
                    <p style="">房间数</p>
                </div>
                <div class="col-67">
                    <div style="font-size: 18px; height: 30px;">{{fangjianshu.num}}间 </div>
                </div>
                <div class="col" style="padding-top: 0;">
                    <a  style="color: black;">
                        <i ng-show="!isShow" class="icon ion-ios-arrow-down" ></i>
                        <i ng-show="isShow" class="icon ion-ios-arrow-up" ></i>
                    </a>
                </div>
            </div>
        </div>


        <div id="show"  ng-show="isShow">
            <div class="div1">
                <label class="item item-radio aa a1" ><input type="radio" name="group" value="1"   ng-click="fjs('.a1',1)">1</label>
                <label class="item item-radio aa a2" ><input type="radio" name="group" value="2"   ng-click="fjs('.a2',2)">2</label>
                <label class="item item-radio aa a3" ><input type="radio" name="group" value="3"   ng-click="fjs('.a3',3)">3</label>
                <label class="item item-radio aa a4" ><input type="radio" name="group" value="4"   ng-click="fjs('.a4',4)">4</label>
                <label class="item item-radio aa a5" ><input type="radio" name="group" value="5"   ng-click="fjs('.a5',5)">5</label>
                <label class="item item-radio aa a6" ><input type="radio" name="group" value="6"   ng-click="fjs('.a6',6)">6</label>
                <label class="item item-radio aa a7" ><input type="radio" name="group" value="7"   ng-click="fjs('.a7',7)">7</label>
                <label class="item item-radio aa a8" ><input type="radio" name="group" value="8"   ng-click="fjs('.a8',8)">8</label>
            </div>
        </div>


        <div class="item " style="padding-right: 0;padding-top: 0px;padding-bottom: 0;">

            <div class="row" style=" padding: 0 5px 0 0;">
                <div class="col-20" id="rzr" style="display:flex; text-align: center; padding-right: 20px;" >
                    <p id="rzr_p" style=" margin:auto; margin-left: 0;">入住人</p>
                </div>
                <div class="col-67">
                    <div style="font-size: 18px; padding-top: 0 ;">
                        <div class="list" style="border: 0">
                            <label class="item item-input ruzhuren_label"style="padding-top:1px; margin-top: 1px; border: 0;padding-left: 0;border-bottom: 1px solid #d1d3d6;" ng-repeat="ruzhuren in zhuhu track by $index">
                                <input type="text" id="text{{$index+1}}" ng-model="ruzhuren.name" placeholder="姓名，1间房填1个人">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col" style="display:flex; text-align: center; padding-left: 10px;">
                    <a  ng-click="gotoxzrzr()" style="text-decoration: none;  margin:auto;">
                        <img src='<?php echo base_url("jiudian_img/rzrs.png"); ?>' style="height: 30px;width: 30px; float: right; ">
                    </a>
                </div>
            </div>
        </div>


        <div class="item item-icon-right" style="padding-right: 0;padding-top: 10px;padding-bottom: 0;">
            <div class="row" style=" padding: 0 5px 0 0;">
                <div class="col-20" style="">
                    <p style="margin-top: 3px;">联系电话</p>
                </div>
                <div class="col-67">
                    <div class="item item-input-inset" style="padding:0px;border: 0;">
                        <label class="item-input-wrapper" style="background-color: white; padding: 0">
                            <input type="text" placeholder="" id="phone" style="background-color: white;border: 0;padding: 0" ng-model="orderinfo.mobile">
                        </label>
                    </div>
                </div>
                <div class="col" style="padding-top: 0;">
                    <a >
                        <img src='<?php echo base_url("jiudian_img/jndh.png"); ?>' style="height: 30px;width: 30px; float: right; ">
                    </a>
                </div>
            </div>
        </div>

        <div class="item item-divider" style="min-height:10px;background-color: #EFEFEF"></div>

        <!---邮寄报销证明-->
        <section class="put_input bg_fff border_t_1_e9">
            <div class="border_b_1_e9 po_re " style='padding:1rem 0.55rem;' ng-click="chooseMail()">
                快递报销证明<span class="ml_55 f_s11 c_999">将在入住后的7天内寄出 <font class="c_ff6d6d f_s12">￥<span ng-bind="hotel_mail.displayprice"></span></font></span>
                <span class="sniu_spoc mr_55"><input type="checkbox" class="regular-checkbox gubsit_bug" ng-model="hotel_mail.isMail"  /><label class="dp_i_b"></label></span>
            </div>
            <section style="display:none;" ng-style="mail_display">
                <p class="wrapfix pa_55 border_b_1_e9 po_re" ng-show="hotel_mail.shoujianrenmingzi != ''">
                    <a class="addNewBut fl maiaddadbut" ng-click="cancel(false)">取消收件地址</a>
                    <a class="addNewBut fr maiaddadbut mr_55" ng-click="address()">更改收件地址</a>
                </p>
                <!-- ---没有收件人信息显示有收件人就不显示 -->
                <p class="bsit_heig pa_55 border_b_1_e9 po_re c_289deb text_a_c maiaddadbut" ng-show="hotel_mail.shoujianrenmingzi == ''" ng-click="address()"<span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增收件地址</p>
                <!-- 没有收件人信息显示 [end] -->
                <div ng-show="hotel_mail.shoujianrenmingzi != ''">
                    <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix shwis_box">
                        <span class="dp_i_b fl pr_55 ">收件人</span>
                        <div class="ksiu_butbox fl po_re" ng-bind="hotel_mail.shoujianrenmingzi">张三<i class="nwpo_boti"></i></div>
                    </div>
                    <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                        <span class="dp_i_b fl pr_55 ">手机号</span>
                        <div class="ksiu_butbox fl" ng-bind="hotel_mail.shoujihao">13689089632</div>
                    </div>
                    <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                        <span class="dp_i_b fl pr_55 ">详细地址</span>
                        <div class="ksiu_butbox_ns02 fl " ng-bind="hotel_mail.dizhi">广东省深圳市福田区八卦二路</div>
                    </div>
                    <div class="list">
                        <a class="item item-icon-right" style="padding: 1rem 0.5rem;border: none;" ng-click="gotoTaitou();">
                            <span class="f_s13" ng-show="taitou.name ==''">发票抬头</span>
                            <span ng-show="taitou.name !=''">
                                <div class="f_s13" ng-bind="taitou.name">深圳航旅发展有限公司</div>
                                <div class="f_s11 c_999"><span ng-bind="taitou.type" class="mr_55">企业</span><span ng-bind="taitou.shuihao"></span></div>
                            </span>
                            <i class="icon ion-ios-arrow-right" style="font-size: 2.3rem;"></i>
                        </a>
                    </div>
                </div>
            </section>
        </section>
        <!-- 邮寄报销证明  [end] -->
		<div class="item item-divider" style="min-height:10px;background-color: #EFEFEF"></div>

        <div  style="padding:10px; background-color:white" >
            <span style="color:#49D3DD">扣款说明:</span>
            <span style="color: rgb(123, 123, 123);">订单提交需支付全部房费，如订单不确认将全额退款至您的付款账户。
                订单确认后不可取消修改，如未入住或取消修改及提前离店，
                我们将收取您¥<span ng-bind="fangjianfei">×××</span>支付酒店</span>
        </div>

        <img src='<?php echo base_url("jiudian_img/kksm_0.jpg"); ?>' style="width:100%; position: relative; top: 30px;"></a>
    </ion-content>

    <div ng-show="zaocan">
        <div style=" z-index: 10; width:100%; height: 100%; bottom: 44px; position: absolute; background-color: rgba(0, 0, 0, 0.5);" ng-click="kongbaichu_guanbi()">
        </div>
        <div style=" background-color: white; width: 100%; overflow: hidden; z-index: 20; position: absolute; bottom: 44px;
                 padding: 5px 20px;  min-height: 120px;" id="zaocan">
            <div style="height: 20px;">
                
            </div>
            <div><span>在线付款</span><span style="float: right;color: #ff6600;font-size: 18px; ">￥<b style="font-size: 18px;" ng-bind="totalprice"></b></span></div>
            <ion-scroll zooming="true" direction="y" overflow-scroll="true" style=" width: 100%; overflow:auto;" ng-style="gundong">
                <div class="row" style="padding-left: 0" ng-repeat="zhudianriqi in zhudianriqis" >
                    <div class="col-33"><span ng-bind ="zhudianriqi.date"></span></div>
                    <div class="col-50" style="padding-left: 0;">无早</div>
                    <div class="col" style="padding: 0;" ><span style="float: right;">￥<span ng-bind ="productType=='比比特惠'?zhudianriqi.tehuiPrice :zhudianriqi.zunxiangPrice"></span>×<span ng-bind ="fangjianshu.num"></span></div>
                </div>
                <div class="row"style="padding-left: 0" ng-hide="hotel_mail.isMail == false">
                    <div class="col-33">发票配送费</div>
                    <div class="col-50" style="padding-left: 0;"></div>
                    <div class="col" style="padding: 0;" ><span style="float: right;">￥<span ng-bind ="hotel_mail.displayprice"></span>×1</span></div>
                </div>
            </ion-scroll>    
        </div>
    </div>  

    <ion-footer-bar align-title="center" class="bar-assertive" style="background-image: none;border: 0; padding: 0;">
		<div class="row" style="background-color: white;padding-top: 2px;">
            <div class="col-50">
                <div style="padding-top: 8px;"><span style="font-size: 16px; color: #ff6600;">总额:￥<b style="font-size: 18px;" ng-bind="totalprice"></b></span></div>
            </div>
            <div class="col-25">
                <div style="padding-top: 8px;"><a ng-click="zcmx()" style="font-size: 12px; color: #49d3dd;float: right;">费用早餐明细</a></div>
            </div>
            <div class="col-25">
                <div style="padding-top: 4px;">
				<input type="button" class="button button-assertive" value="去支付"ng-click="creatdd()"
                           style="width: 78px; min-height: 12px; line-height: 30px;margin-right: 0px; background-color: #ff6600; 
						   font-size: 17px; float: right;border-width: 0px;margin-top:-2px;">
                    
                </div>
            </div>
        </div>
    </ion-footer-bar>
</ion-view>




