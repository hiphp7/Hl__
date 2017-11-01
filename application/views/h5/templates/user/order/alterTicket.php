<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="flight_title po_re text_a_c bg_fff pofir">
            <a class="returnbut c_fff" style="font-size: 1.8rem;" onclick="javascript:history.go(-1);"><span></span>返回</a>
            <span class="f_s18">申请改签</span>
        </div>
    </ion-header-bar>
    <ion-content>	
        <!------主页--------->
        <section class="wrap_Box mainbox frompb">
            <section style="display:none" ng-style="loading">
                <!----往---------->
                <section>
                    <!-----选择要退票的乘客------>
                    <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 ">
                        <p class="c_999 f_s14">选择要改签的航程和乘客</p>
                        <label class="dp_b f_s14 inlut_sel"><input type="checkbox" id="checkbox-3-0" class="cge regular-checkbox guchens"  ng-model="chk1" ng-click="selectedAll('goto',chk1)"/><label class="vm mr_100" for="checkbox-3-0"></label><span ng-bind="orderDetail.hangchengs.goto.qifeichengshi"></span>——<span ng-bind="orderDetail.hangchengs.goto.daodachengshi"></span><span class="yiau_boxt dp_i_b mr_55 c_fff bg_289deb text_a_c border_1_2cafff fr f_s12" style="line-height:1.5rem;">往</span></label>
                        <ul class="cenBox  bg_fff ckns_Ul inlut_sel pl_400 box_bb border_t_1_dc">
                            <li class="po_re" ng-repeat="x in orderDetail.hangchengs.goto.hangchenglvkes | filter:{ zhuangtai: '已出票'}" >
                                <span class="poti_input">
                                    <input type="checkbox" id="checkbox-c-{{$index}}"  ng-checked="x.shifougaiqian" ng-model="x.shifougaiqian" class="regular-checkbox ryuaibnsbox ajirh_boxhuan" /><label class="vm" for="checkbox-c-{{$index}}"></label>
                                </span>
                                <label class="dp_b" for="checkbox-c-{{$index}}">
                                    <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12" ng-show="x.shifouertong ==1">儿童</span></p>
                                    <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianming"></span><span ng-bind="x.zhengjianhaoma"></span></p>
                                </label>
                            </li>
                        </ul>
                    </section>
                    <!-----选择要退票的乘客  [end]------>
                    <!-----改签原因------->
                    <section class="bg_fff border_b_1_dc mb_100 wrapfix f_s14 ">
                        <div class="fl c_999 wid25 hsktk">改签为</div>
                        <section class="fl wid75">
                            <div class="nsut_sese mb_55 pl_55 box_bb tidhbs_box" ng-click="showDatePage('goto')" ng-bind="submitInfo.goto.changeDate">请选择出发日期</div>
                            <select name="" class="nsut_sese abks_se02" ng-model="submitInfo.goto.upgrade" ng-options="x.id as x.name for x in UpgradeType">
                                <option value="">-- 请选择 --</option>
                            </select>
                        </section>
                    </section>
                    <!-----改签原因  [end]------->
                </section>
                <!---往  [end]------>
                <!----返---------->
                <section ng-show="orderDetail.hangchengs.back.fanchengbiaozhi==1">
                    <!-----选择要退票的乘客------>
                    <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 ">
                        <p class="c_999 f_s14">选择要改签的航程和乘客</p>
                        <label class="dp_b f_s14 inlut_sel"><input type="checkbox" id="checkbox-l-0" class="cge regular-checkbox guchensHuan" ng-model="chk2" ng-click="selectedAll('back',chk2)"/><label class="vm mr_100" for="checkbox-l-0"></label><span ng-bind="orderDetail.hangchengs.back.qifeichengshi">深圳</span>——<span ng-bind="orderDetail.hangchengs.back.daodachengshi">上海</span><span class="yiau_boxt dp_i_b mr_55 c_fff bg_289deb text_a_c border_1_2cafff fr f_s12">返</span></label>
                        <ul class="cenBox  bg_fff ckns_Ul inlut_sel pl_400 box_bb border_t_1_dc">
                            <li class="po_re" ng-repeat="x in orderDetail.hangchengs.back.hangchenglvkes | filter:{ zhuangtai: '已出票'}">
                                <span class="poti_input">
                                    <input type="checkbox" id="checkbox-b-{{$index}}" ng-checked="x.shifougaiqian" ng-model="x.shifougaiqian" class="regular-checkbox ryuaibnsbox huanajirh_box" /><label class="vm" for="checkbox-b-{{$index}}"></label>
                                </span>
                                <label class="dp_b" for="checkbox-b-{{$index}}">
                                    <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.name"></span><span class="bst_jdir c_289deb f_s12" ng-show="x.shifouertong ==1">儿童</span></p>
                                    <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianming"></span><span ng-bind="x.zhengjianhaoma"></span></p>
                                </label>
                            </li>
                        </ul>
                    </section>
                    <!-----选择要退票的乘客  [end]------>
                    <!-----改签原因------->
                    <section class="bg_fff border_b_1_dc mb_100 wrapfix f_s14 ">
                        <div class="fl c_999 wid25 hsktk">改签为</div>
                        <section class="fl wid75">
                            <div class="nsut_sese mb_55 pl_55 box_bb tidhbs_box" ng-click="showDatePage('back')" ng-bind="submitInfo.back.changeDate">请选择返回日期</div>
                            <select name="" class="nsut_sese abks_se02" ng-model="submitInfo.back.upgrade" ng-options="x.id as x.name for x in UpgradeType">
                                <option value="">-- 请选择 --</option>
                            </select>
                        </section>
                    </section>
                    <!-----改签原因  [end]------->
                </section>
                <!---返  [end]------>
                <!-----联系电话------->
                <section class="bg_fff border_b_1_dc border_t_1_dc mb_100  f_s14 ">
                    <div class="wrapfix">
                        <div class="fl c_999 wid25 hsktk">备注</div>
                        <section class="fl wid75">
                            <textarea name="" cols="" rows="" class="ksit_textarea pa_55" ng-model="submitInfo.Remark" placeholder="请在这里补充关于退票的更多细节(例如具体原因、新票的票号）,可以让我们更快的为您核实情况并办理退票手续。"></textarea>
                        </section>
                    </div>
                </section>
                <!-----联系电话  [end]------->
                <!-----提示------->
                <section class="mb_100  f_s12 ">
                    <p class="mb_55">提示：</p>
                    <p class="mb_55">1.若您的报销单据已经寄出给您，您还需要单据将寄回。</p>
                    <p class="mb_55">
                        2.改签处理时间为9:00-22:00,此时段之外的改签申请将
                        顺延至第二天。
                    </p>
                    <p class="mb_55">3.若有其他疑问可拨打客服电话：400-991-7909</p>
                </section>
                <!-----提示  [end]------->

            </section>
        </section>
        <!----主页------>

    </ion-content>
    <ion-footer-bar align-title="center" class="bar-positive" style="background:#526279;">
        <div class="c_fff" style="position: fixed;bottom: 0;width: 100%;left: 50%;margin-left: -50%;height: 3.8rem;line-height: 3rem;padding: 0.3rem;box-sizing: border-box;z-index: 10;">
            <a class="f_s14 fl butchir c_fff bsut_bbai ov_h" href="tel:4009917909">拨打客服电话</a>
            <input name="" type="submit" value="提交" class="bg_ff6d6d c_fff f_s14 tomaiby fr tigisi" ng-click="submitApply()" ng-show="display.btnPost">
        </div>
    </ion-footer-bar>
    <script type="text/javascript">
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
                        //var puab = effectCommon.mealFn();
                        //if (puab != false) {//提交成功弹出的提示
                        //    //publicFunction.manualTips( "您的退票申请已经提交审核，客服会在24小时内与您联系。请保持您的手机畅通！","确认" );
                        //}
                    });
                    //全选或取消
                    publicFunction.checkdFn("guchens", "ajirh_boxhuan");
                    publicFunction.checkdFn("guchensHuan", "huanajirh_box");

                })
    </script>

	<script id="templates/time.html" type="text/ng-template">
        <ion-modal-view >
        <ion-header-bar align-title="center" class="bar-positive">
            <a class="button icon-left ion-chevron-left button-clear"  ng-click="time.hide()">返回</a>
            <span class="title" ng-bind="titleName"></span>
        </ion-header-bar>
        <ion-content has-subheader="false">
			<!------日期选择-------------->
			<section class="" style="display:block;">

				<!-----日历------->
				<ul class="dateUlbox text_a_c">
					<li ng-repeat="x in dateLists">
						<p class="f_s18 text_a_c mb_55 border_b_1_d pb_55" ng-bind="x.date| date:'yyyy年MM月'"></p>
						<ul class="datetablego c_1d1d1d f_s14 wrapfix fw_b">
							<li class="c_ff6d6d">日</li>
							<li>一</li>
							<li>二</li>
							<li>三</li>
							<li>四</li>
							<li>五</li>
							<li class="c_ff6d6d">六</li>
						</ul>
						<ul class="datetable c_1d1d1d wrapfix">
							<li ng-repeat="y in x.days" class="{{y.enable}}">
								<div ng-switch on="y.enable">
									<!-- 不可用状态 -->
									<div ng-switch-when="false" class="c_808080"><p class="f_s14" ng-bind="y.solar| date:'dd'"></p><p></p></div>
									<!-- 可用状态 周末-->
									<div ng-switch-when="true" ng-click="selectedDate(y)"><p class="f_s14" ng-class="loadClass(y, 2)" ng-bind="y.solar| date:'dd'" style="font-weight:bold;"></p><p class="c_808080" ng-bind="y.lunar"></p></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
				<!-----日历  [end]------->
			</section>
			<!------日期选择  [end]-------------->
          
        </ion-content>
        </ion-modal-view>
    </script>
	</ion-view>
