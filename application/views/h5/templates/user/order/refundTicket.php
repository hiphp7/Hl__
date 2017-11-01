<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="flight_title po_re text_a_c bg_fff pofir">
            <a class="returnbut c_fff f_s18" onclick="javascript:history.go(-1);"><span></span>返回</a>
            <span class="f_s18">申请退票</span>
        </div>
    </ion-header-bar>
    <ion-content>
        <!------主页--------->
        <section class="wrap_Box mainbox frompb">
            <section style="display:none" ng-style="loading">
                <!-----选择要退票的乘客------>
                <!-----往--------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 ">
                    <p class="c_999 f_s14">选择要退票的航程和乘客</p>
                    <label class="dp_b f_s14 inlut_sel"><input type="checkbox" id="checkbox-3-0" class="cge regular-checkbox  guchens" ng-model="chk1" ng-click="selectedAll('goto',chk1)" /><label class="vm mr_100" for="checkbox-3-0"></label><span ng-bind="orderDetail.hangchengs.goto.qifeichengshi"></span>——<span ng-bind="orderDetail.hangchengs.goto.daodachengshi"></span><span class="yiau_boxt dp_i_b mr_55 c_fff bg_289deb text_a_c border_1_2cafff fr f_s12" style="line-height:1.3rem;">往</span></label>
                    <ul class="cenBox  bg_fff ckns_Ul inlut_sel pl_400 box_bb border_t_1_dc">
                        <li class="po_re" ng-repeat="x in orderDetail.hangchengs.goto.hangchenglvkes| filter:{ zhuangtai: '已出票'}">
                            <span class="poti_input">
                                <input type="checkbox" id="checkbox-c-{{$index}}" ng-checked="x.shifoutuipiao" ng-model="x.shifoutuipiao" class="regular-checkbox ryuaibnsbox ajirh_boxhuan" /><label class="vm" for="checkbox-c-{{$index}}"></label>
                            </span>
                            <label class="dp_b" for="checkbox-c-{{$index}}">
                                <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12" ng-show="x.shifouertong == 1">儿童</span></p>
                                <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianming"></span><span ng-bind="x.zhengjianhaoma"></span></p>
                            </label>
                        </li>
                    </ul>
                </section>
                <!-----往  [end]--------->
                <!-----返--------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 " ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1">
                    <p class="c_999 f_s14">选择要退票的航程和乘客</p>
                    <label class="dp_b f_s14 inlut_sel"><input type="checkbox" id="checkbox-l-0" class="cge regular-checkbox guchensHuan" ng-model="chk2" ng-click="selectedAll('back',chk2)" /><label class="vm mr_100" for="checkbox-l-0"></label><span ng-bind="orderDetail.hangchengs.back.qifeichengshi"></span>——<span ng-bind="orderDetail.hangchengs.back.daodachengshi"></span><span class="yiau_boxt dp_i_b mr_55 c_fff bg_289deb text_a_c border_1_2cafff fr f_s12" style="line-height:1.3rem;">返</span></label>
                    <ul class="cenBox  bg_fff ckns_Ul inlut_sel pl_400 box_bb border_t_1_dc">
                        <li class="po_re" ng-repeat="x in orderDetail.hangchengs.back.hangchenglvkes | filter:{ zhuangtai: '已出票'}">
                            <span class="poti_input">
                                <input type="checkbox" id="checkbox-b-{{$index}}" ng-checked="x.shifoutuipiao" ng-model="x.shifoutuipiao" class="regular-checkbox ryuaibnsbox huanajirh_box" /><label class="vm" for="checkbox-b-{{$index}}"></label>
                            </span>
                            <label class="dp_b" for="checkbox-b-{{$index}}">
                                <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12" ng-show="x.shifouertong ==1">儿童</span></p>
                                <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianming"></span><span ng-bind="x.zhengjianhaoma"></span></p>
                            </label>
                        </li>
                    </ul>
                </section>
                <!-----返  [end]--------->
                <!-----选择要退票的乘客  [end]------>
                <!-----退票原因------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 mb_100 wrapfix f_s14 ">
                    <div class="fl c_999 wid25 hsktk">退票原因</div>
                    <section class="fl wid75">
                        <select name="" class="nsut_sese mb_100 abks_se01" ng-model="refundInfo.refundType" ng-options="x.Type as x.Name for x in refundReason" ng-change="selChange(refundInfo.refundType)">
                            <option value="">-- 请选择 --</option>
                        </select>
                        <select name="" class="nsut_sese abks_se02" ng-model="refundInfo.RawReason" ng-options="x.Name for x in reasonDetails">
                            <option value="">-- 请选择 --</option>
                        </select>
                    </section>
                </section>
                <!-----退票原因  [end]------->
                <!-----联系电话------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mb_100  f_s14 ">
                    <div class="wrapfix mb_100" style="display:none">
                        <div class="fl c_999 wid25 hsktk">联系电话</div>
                        <section class="fl wid75">
                            <input name="" type="text" class="nsut_sese pl_55 pr_55 phoneInput" placeholder="请填写手机号" ng-model="refundInfo.tel" />
                        </section>
                    </div>
                    <div class="wrapfix">
                        <div class="fl c_999 wid25 hsktk">备注</div>
                        <section class="fl wid75">
                            <textarea name="" cols="" rows="" class="ksit_textarea pa_55" ng-model="refundInfo.RawNote" placeholder="请在这里补充关于退票的更多细节(例如具体原因、新票的票号）,可以让我们更快的为您核实情况并办理退票手续。"></textarea>
                        </section>
                    </div>
                </section>
                <!-----联系电话  [end]------->
                <!-----提示------->
                <section class="mb_100  f_s12 ">
                    <p class="mb_55">提示：</p>
                    <p class="mb_55">1.若您的报销单据已经寄出给您，您还需要将他们寄回。</p>
                    <p class="mb_55">2.退票处理时间为9:00-22:00,此时段之外的退票申请将顺延至第二天。</p>
                    <p class="mb_55">3.若有其他疑问可拨打客服电话：400-991-7909</p>
                </section>
                <!-----提示  [end]------->

            </section>
        </section>
        <!----主页------>
    </ion-content>
    <ion-footer-bar align-title="center" class="bar-positive" style="background:#526279;">
        <div class="c_fff" style="position: fixed;bottom: 0;width: 100%;left: 50%;margin-left: -50%;height: 3.8rem;line-height: 3rem;padding: 0.4rem;box-sizing: border-box;z-index: 10;">
            <a class="f_s14 fl butchir c_fff bsut_bbai ov_h" href="tel:4009917909">拨打客服电话</a>
            <input name="" type="submit" value="提交" class="bg_ff6d6d c_fff f_s14 tomaiby fr tigisi" ng-click="refundRequest()" ng-show="display.btnPost">
        </div>
    </ion-footer-bar>
    <script type="text/javascript" >
                $(function() {
                    $(".bitu_bg").on("click", function() {
                        var nsdisplay = $(".minsjBox").css("display");
                        if (nsdisplay == "none") {
                            $(this).find("i").addClass("salse180").removeClass("salse000");
                            $(".minsjBox").stop().slideDown();
                        } else {
                            $(this).find("i").addClass("salse000").removeClass("salse180");
                            $(".minsjBox").stop().slideUp();
                        }
                    });

                    $(document).on("click", ".tigisi", function() {
                        //var puab=effectCommon.tunanFn();

                        //if(puab!=false){//提交成功弹出的提示
                        //	publicFunction.manualTips( "您的退票申请已经提交审核，客服会在24小时内与您联系。请保持您的手机畅通！","确认" );
                        //	}

                    });
                    //全选或取消
                    publicFunction.checkdFn("guchens", "ajirh_boxhuan");
                    publicFunction.checkdFn("guchensHuan", "huanajirh_box");

                })
    </script>
</ion-view>
