<ion-view view-title="比比旅行">
    <ion-content>
        <!----主页------>
        <style type="text/css">
            .bsiut_box{
                margin-top: 2.5rem;
            }
        </style>
        <section class="wrap_Box ptHeiht mainbox">
            <div class="flight_title po_re text_a_c bg_fff pofir">
                <a class="returnbut c_fff f_s18" href="my.html"><span></span>返回</a>
                <span class="f_s18">我的订单</span>
            </div>
            <ul class="bsiut_box bg_fff border_b_1_e9 text_a_c f_s14 mb_100 listchbsi">
                <li class="{{active.on1}}" ng-click="getOrderList(1)">待付款</li>
                <li class="{{active.on2}}" ng-click="getOrderList(2)">未出行</li>
                <li class="{{active.on3}}" ng-click="getOrderList(3)">全部订单</li>
            </ul>
            <section class="orderBox f_s13" style="display:none" ng-style="loading">
                <!-----待付款---------->
                <section ng-style="myStyle.display1">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist">
                            <section ng-click="orderDetail(x)">
                                <p class="border border_b_1_de pt_100 pb_100 c_999"><i class="bsit_bosico mr_55"><img src="images/sm_plane.png"></i>订单生成时间：<span ng-bind="x.CreationTime"></span></p>
                                <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13">
                                    <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.IsRoundTrip==1 ? '往返' : '单程'">往返</span>
                                    <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)">待付款</span>
                                    <span class="mr_200 fr pt_35" ng-bind="x.price | currency:'￥'">￥1588</span>
                                </div>
                                <section class="pt_100 pb_100 f_s12">
                                    <div>
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.goto.depCity"></span>-<span ng-bind="x.goto.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.goto.airName"></span><span ng-bind="x.goto.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.goto.depSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.depWeek">周日</span><span class="mr_55" ng-bind="x.goto.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.goto.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.arrWeek">周一</span><span class="mr_55" ng-bind="x.goto.arrTime">22:10</span></p>
                                    </div>
                                    <div class="mt_100" ng-show="x.IsRoundTrip==1">
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.back.depCity"></span>-<span ng-bind="x.back.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.back.airName"></span><span ng-bind="x.back.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.back.depSortDate">05-01</span><span class="mr_55" ng-bind="x.back.depWeek">周日</span><span class="mr_55" ng-bind="x.back.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.back.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.back.arrWeek">周一</span><span class="mr_55" ng-bind="x.back.arrTime">22:10</span></p>
                                    </div>
                                </section>
                            </section>
                            <div class="text_a_r ardBut pt_55 pb_55 border_t_1_de" ng-show="x.Status ==0 || x.Status ==6">
                                <input name="" type="button" value="删除订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.Status ==6" ng-click="deleteOrder(x)" />
                                <input name="" type="button" value="取消订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.Status ==0" ng-click="closeOrder(x)" />
                                <input name="" type="button" value="支付" class="c_ff6d6d border_1_ff6d6d ml_55 bg_fff" ng-show="x.Status ==0" ng-click="onlinePay(x)" />
                            </div>
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                </section>
                <!-----待付款 [end]---------->
                <!-----未出行---------->
                <section ng-style="myStyle.display2">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist">
                            <section ng-click="orderDetail(x)">
                                <p class="border border_b_1_de pt_100 pb_100 c_999"><i class="bsit_bosico mr_55"><img src="images/sm_plane.png"></i>订单生成时间：<span ng-bind="x.CreationTime"></span></p>
                                <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13">
                                    <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.IsRoundTrip==1 ? '往返' : '单程'">往返</span>
                                    <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)">已出票</span>
                                    <span class="mr_200 fr pt_35" ng-bind="x.price | currency:'￥'">￥1588</span>
                                </div>
                                <section class="pt_100 pb_100 f_s12">
                                    <div>
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.goto.depCity"></span>-<span ng-bind="x.goto.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.goto.airName"></span><span ng-bind="x.goto.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.goto.depSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.depWeek">周日</span><span class="mr_55" ng-bind="x.goto.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.goto.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.arrWeek">周一</span><span class="mr_55" ng-bind="x.goto.arrTime">22:10</span></p>
                                    </div>
                                    <div class="mt_100" ng-show="x.IsRoundTrip==1">
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.back.depCity"></span>-<span ng-bind="x.back.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.back.airName"></span><span ng-bind="x.back.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.back.depSortDate">05-01</span><span class="mr_55" ng-bind="x.back.depWeek">周日</span><span class="mr_55" ng-bind="x.back.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.back.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.back.arrWeek">周一</span><span class="mr_55" ng-bind="x.back.arrTime">22:10</span></p>
                                    </div>
                                </section>  
                            </section>                      
                            <div class="text_a_r ardBut pt_55 pb_55 border_t_1_de" ng-show="x.Status ==3" >
                                <input name="" type="button" value="改签" class="c_505050 border-1_d bg_fff ml_55" ng-click="alterTicket(x)" />
                                <input name="" type="button" value="退票" class="c_505050 border-1_d bg_fff ml_55" ng-click="refundTicket(x)" />
                            </div>
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                </section>
                <!-----未出行 [end]---------->
                <!-----全部订单---------->
                <section class="flight_foo po_re" ng-style="myStyle.display3">
                    <ul class="orderUl">
                        <li class="mb_55 pl_100 pr_100 f_s12" ng-repeat="x in orderlist | order_filter:statusfilter | orderBy:sort.sortBy:true">
                            <section ng-click="orderDetail(x)">
                                <p class="border border_b_1_de pt_100 pb_100 c_999"><i class="bsit_bosico mr_55"><img src="images/sm_plane.png"></i>订单生成时间：<span ng-bind="x.CreationTime"></span></p>
                                <div class="border_b_1_de pt_55 pb_55 wrapfix f_s13 vm">
                                    <span class="bstiu_sp fl pt_35 pb_25 pl_75 pr_75" ng-bind="x.IsRoundTrip==1 ? '往返' : '单程'">往返</span>
                                    <span class="c_289deb fr pt_35" ng-bind="x.statusName" ng-class="getColor(x.statusName)">待付款</span>
                                    <span class="mr_200 fr pt_35" ng-bind="x.price | currency:'￥'">￥1588</span>
                                </div>
                                <section class="pt_100 pb_100 f_s12">
                                    <div>
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.goto.depCity"></span>-<span ng-bind="x.goto.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.goto.airName"></span><span class="ml_55" ng-bind="x.goto.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.goto.depSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.depWeek">周日</span><span class="mr_55" ng-bind="x.goto.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.goto.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.goto.arrWeek">周一</span><span class="mr_55" ng-bind="x.goto.arrTime">22:10</span></p>
                                    </div>
                                    <div class="mt_100" ng-show="x.IsRoundTrip==1">
                                        <p class="mb_35 nsiit_xt"><span ng-bind="x.back.depCity"></span>-<span ng-bind="x.back.arrCity"></span><span class="c_999 ml_100"><span ng-bind="x.back.airName"></span><span class="ml_55" ng-bind="x.back.flightNo"></span></span></p>
                                        <p class="c_999"><span class="mr_55" ng-bind="x.back.depSortDate">05-01</span><span class="mr_55" ng-bind="x.back.depWeek">周日</span><span class="mr_55" ng-bind="x.back.depTime">22:10</span><span class="mr_55">——</span><span class="mr_55" ng-bind="x.back.arrSortDate">05-01</span><span class="mr_55" ng-bind="x.back.arrWeek">周一</span><span class="mr_55" ng-bind="x.back.arrTime">22:10</span></p>
                                    </div>
                                </section>
                            </section>
                            <div class="text_a_r ardBut pt_55 pb_55" ng-class="getClass(x.Status)" ng-show="getClass(x.Status) == 'border_t_1_de'">
                                <input name="" type="button" value="删除订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="(x.Status ==5 || x.Status ==6 || x.Status ==7 || x.Status ==8) && x.Visible ==0" ng-click="deleteOrder(x)" />
                                <input name="" type="button" value="取消订单" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.Status ==0" ng-click="closeOrder(x)" />
                                <input name="" type="button" value="支付" class="c_ff6d6d border_1_ff6d6d ml_55 bg_fff" ng-show="x.Status ==0" ng-click="onlinePay(x)" />
                                <input name="" type="button" value="改签" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.Status ==3" ng-click="alterTicket(x)" />
                                <input name="" type="button" value="退票" class="c_505050 border-1_d bg_fff ml_55" ng-show="x.Status ==3" ng-click="refundTicket(x)" />
                            </div>
                        </li>
                    </ul>
                    <p class="text_a_c pa_50_100 c_999 f_s13">没有更多订单了</p>
                    <!---筛选条件选择------>
                    <ul class="filter_nav c_fff f_s12">
                        <li class="fl">
                            <i class="bg_filter01"></i>
                            <p>筛选</p>
                        </li>
                        <li style="float:right;">
                            <i class="bg_filter02"></i>
                            <p ng-bind="sort.sortName">按起飞时间排序</p>
                        </li>
                    </ul>
                    <!---筛选条件选择  [end]------>
                    <!---筛选条件弹出层------------------>
                    <section class="filterBox srfiriBox" style="display:none;">
                        <section class="mdit_bsit">
                            <ul class="nwiu_but text_a_c c_fff f_s16">
                                <li class="fl lebutci" ng-click="Confirmfilter(false)">取消</li>
                                <li class="wid50 fl cheiBut" ng-click="chkStatus(true,titleName)" ng-bind="titleName">全部选中</li>
                                <li class="fl lebutci" ng-click="Confirmfilter(true)">确定</li>
                            </ul>
                            <section class="bsot_rid bg_fff pa_100">
                                <div class="pt_100 pb_100 wrapfix bsktis bsithin">
                                    <label  ng-repeat="x in filterStatusList" for="checkbox-d-{{$index}}">
                                        <span class="fl mb_100"><input type="checkbox" id="checkbox-d-{{$index}}" class="regular-checkbox" ng-model="x.chk" ng-click="chkStatus(false)" /><label class="va mr_100" for="checkbox-d-{{$index}}"></label><span ng-bind="x.statusName"></span></span>
                                    </label>
                                </div>
                            </section>
                        </section>
                    </section>
                    <!---筛选条件弹出层 [end]------------------>
                    <!---筛选条件弹出层------------------>
                    <section class="filterBox timefileBox" style="display:none;">
                        <section class="mdit_bsit">
                            <ul class="nwiu_but text_a_c c_fff f_s16">
                                <li class="fl ksjbutsf" ng-click="sortConfirm(false)">取消</li>
                                <li class="fr ksjbutsf" ng-click="sortConfirm(true)" style="display:none">确定</li>
                            </ul>
                            <section class="bsot_rid bg_fff pa_100">
                                <div class="pa_100 wrapfix nsit_box" >
                                    <label for="radio-t-1"><span class="fl mb_100 ksjbutsf"><input type="radio" id="radio-t-1" name="radio-t-set" class="regular-radio" ng-model="sort.chk" ng-checked="sort.chk ==0" ng-click="sortConfirm(true)" value="0" /><label class="va mr_100" for="radio-t-1"></label>按预定时间排序</span></label>
                                    <label for="radio-t-2"><span class="fl mb_100 ksjbutsf"><input type="radio" id="radio-t-2" name="radio-t-set" class="regular-radio" ng-model="sort.chk" ng-checked="sort.chk ==1" ng-click="sortConfirm(true)" value="1" /><label class="va mr_100" for="radio-t-2"></label>按起飞时间排序</span></label>
                                </div>
                            </section>
                        </section>
                    </section>
                    <!---筛选条件弹出层 [end]------------------>
                </section>
                <!-----全部订单 [end]---------->
            </section>
        </section>
        <!----主页  [end]------>
        <script type="text/javascript">
            $(function() {
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
                        //var lseihg=$(".bsithin input[type='checkbox']:checked").length;
                        //if(lseihg==0){
                        //    publicFunction.promptimeBox("请选择订单筛选条件",1500);
                        //}else{
                        //    $(".srfiriBox").hide();
                        //};
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
    </ion-content>
</ion-view>