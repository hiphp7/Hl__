<ion-view view-title="比比旅行">
    <ion-content>
        <script type="text/javascript" >
            $(function() {
                $('input').attr('autocomplete', 'off');
            })
        </script>
        <!------主页--------->
        <style type="text/css">
            .f_s13 {
                 font-size: 1.3rem!important; 
            }
            .buti_bitu div{
                font-size: 112%;
            }
  
        </style>
        <section class="wrap_Box ptHeiht mainbox">
            <div class="flight_title po_re text_a_c bg_fff pofir">
                <a class="returnbut c_fff f_s18" ui-sref="tab.user"><span></span>返回</a>
                <span class="f_s18">常用信息</span>
            </div>
            <ul class="bsiut_box bg_fff border_b_1_e9 text_a_c f_s15 mb_100 listchbsi" >
                <li class="{{active.on1}}" ng-click="getDataList(1)" style="width:50%;">常用乘客</li>
                <li class="{{active.on3}}" ng-click="getDataList(2)" style="width:50%;">收件地址</li>
            </ul>
            <section class="aecBox" style="display:none" ng-style="loading">
                <!---乘客--------->
                <section class="passenger" ng-style="myStyle.display1">
                    <div class="bsit_heig border_b_1_e9 border_t_1_e9 c_289deb f_s14 text_a_c  mb_100 bg_fff addList" ng-click="userContactDisplay(false,x)">
                        <span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增乘客
                    </div>
                    <ul class="cenBox border_t_1_e9 bg_fff newbsuiu_cpos puanList">
                        <li class="border_b_1_e9 po_re" ng-repeat="x in userContacts">
                            <div>
                                <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.zhongwenming">张三</span><span class="bst_jdir c_289deb f_s12" ng-show="x.shifouertong ==1">儿童</span></p>
                                <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianleixing">身份证</span><span ng-bind="x.zhengjianhaoma">44083198810883695</span></p>
                            </div>
                            <!----方向按钮------>
                            <i class="nsut_bixt" ng-click="userContactDisplay(true,x)"></i>
                            <!----方向按钮  [end]------>
                        </li>
                    </ul>
                    <!--没有乘客显示----------->
                    <p class="nsitoshow c_999  f_s14 text_a_c" ng-show="userContacts.lenght>0"><span class="mr_55">!</span>暂无乘客</p>
                    <!--没有乘客显示----------->
                </section>
                <!---乘客 [end]--------->
                <!---收件地址--------->
                <section class="receiver" ng-style="myStyle.display2">
                    <div class="bsit_heig border_b_1_e9 border_t_1_e9 c_289deb f_s14 text_a_c  mb_100 bg_fff addList" ng-click="AddressDisplay(false,x)">
                        <span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增收件地址
                    </div>
                    <ul class="cenBox border_t_1_e9 bg_fff newbsuiu_cpos puanList">
                        <li class="border_b_1_e9 po_re" ng-repeat="x in addressList" ng-click="AddressDisplay(true,x)">
                            <div>
                                <p class="f_s14 mb_55 wrapfix"><span class="wid25 fl">收件人 </span><span class="wid75 fl" ng-bind="x.shoujianrenmingzi">张三</span></p>
                                <p class="f_s12 mb_55 wrapfix"><span class="wid25 fl">手机号码</span><span class="wid75 fl" ng-bind="x.shoujihao">13728858529</span></p>
                                <p class="f_s12 wrapfix"><span class="wid25 fl">详细地址</span><span class="wid75 fl" ng-bind="x.dizhi">深圳市福田区八卦二路义华大厦</span></p>
                            </div>
                            <!----方向按钮------>
                            <i class="nsut_bixt"></i>
                            <!----方向按钮  [end]------>
                        </li>
                    </ul>
                    <!--没有收件地址显示----------->
                    <p class="nsitoshow c_999  f_s14 text_a_c" ng-show="addressList.lenght >0"><span class="mr_55">!</span>暂无收件地址</p>
                    <!--没有收件地址显示----------->
                </section>
                <!---收件地址 [end]--------->
            </section>
        </section>
        <!----主页 [end]------>
        <!----新建或编辑乘客---------------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 addPassenger" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">编辑乘客</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
                <a class="but_nsit f_s16 selebutton" ng-click="userContactSave(!disable.zhengjianleixing)">确定</a>
            </div>
            <!--------头部header   [end]---------->
            <div class="buti_bitu  pa_100 border_b_1_e9 wrapfix bg_fff">
                <div class="wid50 fl text_a_c"><input type="radio" id="radio-v-1" name="radio-v-set" class="regular-radio" value="0" ng-checked="userContact.shifouertong ==0" ng-model="userContact.shifouertong" /><label for="radio-v-1" class="vm mr_55"></label>成人</div>
                <div class="wid50 fr text_a_c"><input type="radio" id="radio-v-2" name="radio-v-set" class="regular-radio" value="1" ng-checked="userContact.shifouertong ==1" ng-model="userContact.shifouertong" /><label for="radio-v-2" class="vm mr_55"></label>儿童</div>
            </div>

            <section class="bg_fff f_s13 mt_55">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">姓名</span>
                    <input name="" type="text" class="fl f_s13" id="addname" placeholder="请填写真实姓名" ng-model="userContact.zhongwenming" ng-disabled="disable.zhongwenming" />
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">性别</span>
                    <select class="bsit_bixsles f_s16" id="addGender" ng-model="userContact.xingbie">
                        <option value="1">男</option>
                        <option value="0">女</option>
                    </select>
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">证件类型</span>
                    <select class="bsit_bixsles f_s16" id="addcredentials" ng-model="userContact.zhengjianleixing" ng-disabled="disable.zhengjianleixing">
                        <option ng-repeat="x in identitys" value="{{x}}">{{x}}</option>
                    </select>
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">证件号码</span>
                    <input name="" type="text" class="fl f_s13" id="addnumber" placeholder="请输入有效的证件号" ng-model="userContact.zhengjianhaoma" />
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix bapdate" ng-style="myStyle.display3">
                    <span class="dp_i_b fl pr_55 c_606060">出生日期</span>
                    <input name="" type="text" class="fl f_s13" id="inputpdate" placeholder="请输入出生日期(格式:2000-01-01)" ng-model="userContact.chushengriqi" />
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">联系电话</span>
                    <input name="" type="text" class="fl f_s13" id="addtel" placeholder="选填" ng-model="userContact.shoujihao" />
                </div>

                <div id="datePlugin"></div>
            </section>
            <a class="nsiu_remove dp_b text_a_c" ng-click="ConfigDel(1)">
                <i class="dp_i_b icon"><img src='<?php echo base_url("resources/air/image/nsiu_remove.png"); ?>'></i>
                <p class="f_s12 c_999">删除</p>
            </a>
        </section>
        <!----新建或编辑乘客  [end]---------------->
        <!----新建或编辑收件地址---------------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 addReceiver" style="display:none;">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">编辑收件地址</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
                <a class="but_nsit f_s16 selebutton" ng-click="AddressSave(!disable.isEdit)">确定</a>
            </div>
            <!--------头部header   [end]---------->
            <section class="bg_fff f_s13">
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">收件人</span>
                    <input name="" type="text" class="fl f_s13" id="addressName" placeholder="请输入收件人姓名" ng-model="address.shoujianrenmingzi" />
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">手机号</span>
                    <input name="" type="text" class="fl f_s13" id="addressPone" placeholder="请输入手机号" ng-model="address.shoujihao" />

                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">邮政编码</span>
                    <input name="" type="text" class="fl f_s13" placeholder="请输入邮政编码" ng-model="address.youbian" />
                </div>
                <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
                    <span class="dp_i_b fl pr_55 c_606060">详细地址</span>
                    <input name="" type="text" class="fl f_s13" id="addressLisr" placeholder="请输入详细地址" ng-model="address.dizhi" />
                </div>
            </section>
            <a class="nsiu_remove dp_b text_a_c" ng-click="ConfigDel(2)">
                <i class="dp_i_b icon"><img src='<?php echo base_url("resources/air/image/nsiu_remove.png"); ?>'></i>
                <p class="f_s12 c_999">删除</p>
            </a>
        </section>
        <!----新建或编辑收件地址  [end]---------------->
        
        <script type="text/javascript">
            $(function() {
                $(document).on("click", ".listchbsi li", function() {
                    var thisindex = $(this).index();
                    $(this).addClass("on").siblings().removeClass("on");
                    $(".aecBox section:eq(" + thisindex + ")").show().siblings().hide();
                });
                //新增，编辑乘客
                $(document).on("click", ".passenger .addList, .passenger .puanList li i", function() {
                    if ($(this).is(".addList")) {
                        $(".addPassenger .header .heaTxx").html("新增乘客");
                        $('.addPassenger input[type="text"]').val("");
                        //$(".addPassenger select").val("身份证");
                        $(".addPassenger #addGender").val("男");
                        $(".addPassenger #addcredentials").val("身份证");
                        $(".bapdate").hide();
                        $(".addPassenger .nsiu_remove").hide();
                    } else {
                        $(".addPassenger .header .heaTxx").html("编辑乘客");
                        $(".addPassenger .nsiu_remove").show();
                    }
                    publicFunction.rightAnimation("addPassenger", "onbut")
                });
                //新增，编辑乘客返回主页
                $(document).on("click", ".addPassenger .returnbut", function() {
                    publicFunction.returnbut("addPassenger", "mainbox", "addPassenger .header");
                });
                //新增，编辑乘客确定保存
                $(document).on("click", ".addPassenger .selebutton", function() {
                    //var relist=effectCommon.addman();
                    //if(relist != false){
                    //  publicFunction.returnbut("addPassenger","mainbox","addPassenger .header");
                    //}
                });
                //删除乘客
                $(document).on("click", ".addPassenger .nsiu_remove", function() {
                    //publicFunction.BalloonBC("确认删除该乘客");
                });
                //新增，编辑收件地址
                $(document).on("click", ".receiver .addList, .receiver .puanList li i", function() {
                    if ($(this).is(".addList")) {
                        $(".addReceiver .header .heaTxx").html("新增收件地址");
                        $('.addReceiver input[type="text"]').val("");
                        $(".addReceiver .nsiu_remove").hide();
                    } else {
                        $(".addReceiver .header .heaTxx").html("编辑收件地址");
                        $(".addReceiver .nsiu_remove").show();
                    }
                    publicFunction.rightAnimation("addReceiver", "onbut")
                });
                //新增，编辑收件地址返回主页
                $(document).on("click", ".addReceiver .returnbut", function() {
                    publicFunction.returnbut("addReceiver", "mainbox", "addReceiver .header");
                });
                //新增，编辑收件地址确定保存
                $(document).on("click", ".addReceiver .selebutton", function() {
                    //var relist=effectCommon.addaddress();
                    //if(relist != false){
                    //  publicFunction.returnbut("addReceiver","mainbox","addReceiver .header");
                    //}
                });
                //删除收件地址
                $(document).on("click", ".addReceiver .nsiu_remove", function() {
                    //publicFunction.BalloonBC("确认删除该收件地址");
                });
                //确认删除
                $(document).on("click", ".tisomeBox .determineBut", function() {
                    publicFunction.returnbut("addPassenger, .addContacts, .addReceiver", "mainbox", "addPassenger .header, .addContacts .header, addReceiver .header");
                });
                publicFunction.winheight();
  
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
            });
        </script>
		<script type="text/javascript">
			 $(function(){
				$('#inputpdate').date();
			 })
		</script>
    </ion-content>

</ion-view>
