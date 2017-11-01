<ion-view view-title="比比旅行">
    <style type="text/css">

        .filterBox2{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 10;
        }
    </style>
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="flight_title po_re text_a_c bg_fff pofir">
            <a class="returnbut c_fff" style="font-size: 1.8rem;" ng-click="backUser();"><span></span>返回</a>
            <span class="f_s18" style="font-size:1.7rem;">机票订单</span>
        </div>
    </ion-header-bar>
    <ion-content style="background: #f2f3f5;">	
	<ion-refresher pulling-text="下拉刷新" on-refresh="doRefresh()"></ion-refresher>
        <!----主页------>
        <section class="wrap_Box mainbox">
            <ul class="bsiut_box bg_fff border_b_1_e9 text_a_c f_s14 mb_100 listchbsi">
				<li class="{{active.on1}}" ng-click="getOrderList(1)">待付款</li>
                <li class="{{active.on2}}" ng-click="getOrderList(2)">未出行</li>
                <li class="{{active.on3}}" ng-click="getOrderList(3)">全部订单</li>
            </ul>
            <section class="orderBox f_s13" style="display:none" ng-style="loading">
                <!-----待付款---------->
                <section ng-style="myStyle.display1">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist" style="margin-bottom: 0.5rem;">
                            <section ng-click="orderDetail(x)">
                                <p class="border border_b_1_de pt_100 pb_100 c_999" style="color:#838383;"><i class="bsit_bosico mr_55"><img src='<?php echo base_url("resources/air/image/sm_plane.png"); ?>'></i>订单生成时间：<span ng-bind="x.chuangjianshijianchuo*1000 | date : 'yyyy年MM月dd日 HH:mm'"></span></p>
                                <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13 vm">
                                    <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.hangchengs.goto.wangfanhangcheng==1 ? '往返' : '单程'" style="background: #49d3dd;color: #fff;padding-top:0;padding-bottom: 0; margin-top: 0.35rem;margin-bottom: 0.25rem;">往返</span>
                                    <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)" style="color: #fe4747;margin-right: 0.5rem;font-size: 1.5rem;"></span>
                                    <span class="mr_200 fr pt_35" ng-bind="x.dingdanzonge | currency:'￥'" style="color:#ff6600;font-size: 1.5rem;margin-right: 1rem;"></span>
                                </div>
                                <section class="pt_100 pb_100 f_s12">
                                    <div>
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.hangchengs.goto.qifeichengshi" style="font-size: 1.5rem;"></span>-<span ng-bind="x.hangchengs.goto.daodachengshi" style="font-size:1.5rem;"></span><span class="c_999 ml_100"><span ng-bind="x.hangchengs.goto.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.goto.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.goto.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                    </div>
                                    <div class="mt_100" ng-show="x.hangchengs.goto.wangfanhangcheng==1">
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.hangchengs.back.qifeichengshi"></span>-<span ng-bind="x.hangchengs.back.daodachengshi"></span><span class="c_999 ml_100"><span ng-bind="x.hangchengs.back.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.back.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.back.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                    </div>
                                </section>
                            </section>

                            <div class="text_a_r ardBut pt_55 pb_55 " ng-show="x.dingdanzhuangtai ==0 || x.dingdanzhuangtai ==6">
<!--                            <input name="" type="button" value="删除订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.dingdanzhuangtai ==6" ng-click="deleteOrder(x)" />
                            <input name="" type="button" value="取消订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.dingdanzhuangtai ==0" ng-click="closeOrder(x)" />
							-->
                            <input name="" type="button" value="支付" class="c_ff6d6d border_1_ff6d6d ml_55 bg_fff" ng-show="x.dingdanzhuangtai ==0" ng-click="onlinePay(x)" style="background: #ff6600;" />
							<form id="jpz_zf_tijiaoform" method="get" action="<?php echo base_url();?>wxpay/jsapi_air_gaiqian.php">
					                <input type="hidden" id="jpz_zf_total_fee" name="total_fee"/>
					                <input type="hidden" id="jpz_zf_body" name="body"/>
					                <input type="hidden" id="jpz_zf_attach" name="attach"/>
					                <input type="hidden" id="jpz_zf_goods_tag" name="goods_tag"/>
					                <input type="hidden" id="jpz_zf_detail" name="detail"/>
                                    <input type="hidden" id="jpz_zf_dingdanid" name="dingdanid"/>
                            </form>
                            </div>
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                </section>
                <!-----待付款 [end]---------->
                <!-----未出行---------->
                <section ng-style="myStyle.display2">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist" style="margin-bottom: 0.5rem;">
                            <section>
                                <section ng-click="orderDetail(x)">
                                    <p class="border border_b_1_de pt_100 pb_100 c_999" style="color:#838383;"><i class="bsit_bosico mr_55"><img src='<?php echo base_url("resources/air/image/sm_plane.png"); ?>'></i>订单生成时间：<span ng-bind="x.chuangjianshijianchuo*1000 | date : 'yyyy年MM月dd日 HH:mm'"></span></p>
                                    <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13">
                                        <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.hangchengs.goto.wangfanhangcheng==1 ? '往返' : '单程'" style="background: #49d3dd;color: #fff;padding-top:0;padding-bottom: 0; margin-top: 0.35rem;margin-bottom: 0.25rem;"></span>
                                        <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)" style="color: #fe4747;margin-right: 0.5rem;font-size: 1.5rem;"></span>
                                        <span class="mr_200 fr pt_35" ng-bind="x.dingdanzonge | currency:'￥'" style="color: #ff6600;font-size: 1.5rem;margin-right: 1rem;"></span>                                    
                                    </div>
                                    <section class="pt_100 pb_100 f_s12">
                                        <div>
                                            <p class="mb_35 nsiit_xt" style="margin-bottom: 1rem;"><span ng-bind="x.hangchengs.goto.qifeichengshi" style="font-size: 1.5rem;"></span>-<span ng-bind="x.hangchengs.goto.daodachengshi" style="font-size: 1.5rem;"></span><span style="color: #878787;" class="ml_100"><span ng-bind="x.hangchengs.goto.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.goto.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                            <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.goto.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                        </div>
                                        
                                        <div class="mt_100" ng-show="x.hangchengs.back.fanchengbiaozhi==1">
                                            <p class="mb_35 nsiit_xt"><span ng-bind="x.hangchengs.back.qifeichengshi"></span>-<span ng-bind="x.hangchengs.back.daodachengshi"></span><span class="c_999 ml_100"><span ng-bind="x.hangchengs.back.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.back.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                            <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.back.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                        </div>
                                    </section>  
                                </section> 
                                <div class="text_a_r ardBut pt_55 pb_55 border_t_1_de" ng-show="x.dingdanzhuangtai == 3" >
                                    <input name="" type="button" value="改期" class="c_505050 border-1_d bg_fff ml_55" ng-click="alterTicket(x)" ng-if="x.kegaiqianrenshu > 0 && x.gaiqi_show" style="background: #ff6600;width: 6rem;" />
                                    <input name="" type="button" value="退票" class="c_505050 border-1_d bg_fff ml_55" ng-click="refundTicket(x)" ng-if="x.ketuipiaorenshu > 0 && x.tuipiao_show" style="background: #ff6600;width: 6rem;"/>
                                </div>
                            </section> 
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                </section>
                <!-----未出行 [end]---------->
                <!-----全部订单---------->
                <section class="flight_foo po_re" ng-style="myStyle.display3">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist | order_filter:statusfilter | orderBy:sort.sortBy:true" style="margin-bottom: 0.5rem;">
                            <section ng-click="orderDetail(x)">
                                <p class="border border_b_1_de pt_100 pb_100 c_999" style="color:#838383;"><i class="bsit_bosico mr_55"><img src='<?php echo base_url("resources/air/image/sm_plane.png"); ?>'></i>订单生成时间：<span ng-bind="x.chuangjianshijianchuo*1000 | date : 'yyyy年MM月dd日 HH:mm'" style="color: black;"></span></p>
                                <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13 vm">
                                    <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.hangchengs.goto.wangfanhangcheng==1 ? '往返' : '单程'" style="background: #49d3dd;color: #fff;padding-top:0;padding-bottom: 0; margin-top: 0.35rem;margin-bottom: 0.25rem;">往返</span>
                                    <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)" style="color: #fe4747;font-size: 1.5rem;margin-right: 0.5rem;"></span>
                                    <span class="mr_200 fr pt_35" ng-bind="x.dingdanzonge | currency:'￥'" style="color:#ff6600;font-size: 1.5rem;margin-right: 1rem;"></span>
                                </div>
                                <section class="pt_100 pb_100 f_s12">
                                    <div>
                                        <p class="mb_35 nsiit_xt" style="margin-bottom: 1rem;"><span ng-bind="x.hangchengs.goto.qifeichengshi" style="font-size: 1.5rem;"></span>-<span ng-bind="x.hangchengs.goto.daodachengshi" style="font-size: 1.5rem;"></span><span class="c_999 ml_100" style="color: #878787;"><span ng-bind="x.hangchengs.goto.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.goto.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.goto.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.goto.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                    </div>
                                    <div class="mt_100" ng-show="x.hangchengs.goto.wangfanhangcheng==1">
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.hangchengs.back.qifeichengshi"></span>-<span ng-bind="x.hangchengs.back.daodachengshi"></span><span class="c_999 ml_100"><span ng-bind="x.hangchgs.back.hangkonggongsi"></span><span class="ml_55" ng-bind="x.hangchengs.back.hangbanhao" style="color: #ff9508;font-size: 1.3rem;"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.hangchengs.back.qifeishijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.hangchengs.back.daodashijianchuo*1000 | date : 'MM月dd日 HH:mm'"></span></p>
                                    </div>
                                </section>
                            </section>
                            <div class="text_a_r ardBut pt_55 pb_55" ng-class="getClass(x.dingdanzhuangtai)" ng-show="getClass(x.dingdanzhuangtai) == 'border_t_1_de'" style="border: none;">
							<!--
                                <input name="" type="button" value="删除订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="(x.dingdanzhuangtai ==5 || x.dingdanzhuangtai ==6 || x.dingdanzhuangtai ==7 || x.dingdanzhuangtai ==8) && x.Visible ==0" ng-click="deleteOrder(x)" />
                                      <input name="" type="button" value="取消订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.dingdanzhuangtai ==0" ng-click="closeOrder(x)" />
									  -->
                                      <input name="" type="button" value="支付" style="border: none;border-radius: 5px;background: #ff6600;width: 6rem;" class="c_ff6d6d ml_55 bg_fff" ng-show="x.dingdanzhuangtai ==0" ng-click="onlinePay(x)" />
                                      <input name="" type="button" value="改期" style="border: none;border-radius: 5px;background: #ff6600;width: 6rem;" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.dingdanzhuangtai ==3 && x.gaiqi_show && x.kegaiqianrenshu>0" ng-click="alterTicket(x)" />
                                      <input name="" type="button" value="退票" style="border: none;border-radius: 5px;background: #ff6600;width: 6rem;" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.dingdanzhuangtai ==3 && x.tuipiao_show  && x.ketuipiaorenshu>0" ng-click="refundTicket(x)" />
                            </div>
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                </section>
                <!-----全部订单 [end]---------->
            </section>
		</section>
        <!----主页  [end]------>
    </ion-content>
    <!---筛选条件选择------>
    <ul class="filter_nav c_fff f_s12"  ng-style="myStyle.display3" style="width: 100%;height: 4.5rem;position: fixed;bottom: 0;left: 0;background-color: #5b6b83;">
        <li class="fl order_filter" style="font-size: 1.2rem;">
            <i class="bg_filter01"></i>
            <p>筛选</p>
        </li>
        <li class="order_filter" style="float:right;margin-right: 5%;font-size: 1.2rem;">
            <i class="bg_filter02"></i>
            <p ng-bind="sort.sortName">按起飞时间排序</p>
        </li>
    </ul>
    <!---筛选条件选择  [end]------>
    <!---筛选条件弹出层1------------------>
    <section class="filterBox2 srfiriBox" style="display:none;">
        <section class="mdit_bsit" style="height:33%;">
            <ul class="nwiu_but text_a_c c_fff f_s16">
                <li class="fl lebutci" ng-click="Confirmfilter(false)">取消</li>
                <li class="wid50 fl cheiBut" ng-click="chkStatus(true,titleName)" ng-bind="titleName">全部选中</li>
                <li class="fl lebutci" ng-click="Confirmfilter(true)">确定</li>
            </ul>
            <section class="bsot_rid bg_fff pa_100">
                <div class="pt_100 pb_100 wrapfix bsktis bsithin">
                    <label  ng-repeat="x in filterStatusList" for="checkbox-d-{{$index}}" style="font-size:1.2rem;">
                        <span class="fl mb_100"><input type="checkbox" id="checkbox-d-{{$index}}" class="regular-checkbox" ng-model="x.chk" ng-click="chkStatus(false)" /><label class="va mr_55" for="checkbox-d-{{$index}}"></label><span ng-bind="x.statusName"></span></span>
                    </label>
                </div>
            </section>
        </section>
    </section>
    <!---筛选条件弹出层1 [end]------------------>
    <!---筛选条件弹出层2------------------>
    <section class="filterBox2 timefileBox f_s13" style="display:none;">
        <section class="mdit_bsit">
            <ul class="nwiu_but text_a_c c_fff f_s16">
                <li class="fl ksjbutsf" ng-click="sortConfirm(false)">取消</li>
                <li class="fr ksjbutsf" ng-click="sortConfirm(true)" style="display:none">确定</li>
            </ul>
            <section class="bsot_rid bg_fff pa_100">
                <div class="pa_100 wrapfix nsit_box">
                    <label for="radio-t-1" style="font-size:1.3rem;"><span class="fl mb_100 ksjbutsf"><input type="radio" id="radio-t-1" name="radio-t-set" class="regular-radio" ng-model="sort.chk" ng-checked="sort.chk ==0" ng-click="sortConfirm(true)" value="0" /><label class="va mr_100" for="radio-t-1"></label>按预定时间排序</span></label>
                    <label for="radio-t-2" style="font-size:1.3rem;"><span class="fl mb_100 ksjbutsf"><input type="radio" id="radio-t-2" name="radio-t-set" class="regular-radio" ng-model="sort.chk" ng-checked="sort.chk ==1" ng-click="sortConfirm(true)" value="1" /><label class="va mr_100" for="radio-t-2"></label>按起飞时间排序</span></label>
                </div>
            </section>
        </section>
    </section>
    <!---筛选条件弹出层2 [end]------------------>
    <!--取消隐藏筛选条件框-->
    <script type="text/javascript">
        $(function() {
            console.log(1111);
            $(".filter_nav li").on("click", function() {
                var nautindex = $(this).index();
                $(this).addClass("on").siblings().removeClass("on");
                if (nautindex == 0) {
                    $(".srfiriBox").show().addClass("onbut");
                } else {
                    $(".timefileBox").show().addClass("onbut");
                }
            });
            $(document).on("click", ".listchbsi li", function() {
                var bsindex = $(this).index();
                $(this).addClass("on").siblings().removeClass("on");
                $(".orderBox > section:eq(" + bsindex + ")").show().siblings().hide();
            });
            //改签
            $(document).on("click", ".ardBut input[type='button']", function() {
                var ksVal = $(this).val();
                if (ksVal == "改签") {
                    //publicFunction.BalloonBC("改签请拨打客服电话<br/>400-9917-909");
                    //$(".determineBut").html("拨打").attr("href", "tel:400-9917-909")
                }
            });
            //订单筛选条件确定按钮
            $(document).on("click", ".lebutci", function() {
                if ($(this).html() == "确定") {
                    $(".srfiriBox").hide();
                } else {
                    $(".srfiriBox").hide();
                }
            });
            //确定按钮
            $(document).on("click", ".ksjbutsf", function() {
                if ($(this).html() == "确定") {
                    var lseihg = $(".nsit_box input[type='radio']:checked").length;
                    if (lseihg == 0) {
                        publicFunction.promptimeBox("请选择时间筛选条件", 1500);
                    } else {
                        $(".timefileBox").hide();
                    }
                    ;
                } else {
                    $(".timefileBox").hide();
                }
            });
        })
    </script>

</ion-view>
