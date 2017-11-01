<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
<!--         <a class="returnbut c_fff f_s18  df-c-c-r" onclick="javascript:history.go(-1);"><span></span>返回</a>

        <span class="f_s18">申请退票</span> -->
        <div class="buttons" ui-sref="tab.user">
          <button class="button icon-left ion-chevron-left button-clear" onclick="javascript:history.go(-1);">返回</button>
        </div>
        <h1 class="title" >申请退票</h1>
    </ion-header-bar>
    <ion-content has-subheader="false">
        
                <section style="display:block" ng-style="loading">

                    <!-----选择要退票的乘车人------>

                    <!-----往--------->

                    <section class="bg_fff border_b_1_dc border_t_1_dc mt_100 ">

                        <div class="border_b_1_dc f_s13">

                            <p class="pb_55">

                                <span ng-bind="orderDetail.from_station">深圳</span>—<span ng-bind="orderDetail.arrive_station">上海</span>

                                <span ng-bind="orderDetail.seat_Name" class="ml_100">二等座</span><span ng-bind="orderDetail.train_code" class="ml_100 c_999">二等座</span>

                            </p>

                            <p class="pb_100 c_999">

                                <span ng-bind="orderDetail.depSortDate">4月20日</span><span class="" ng-bind="orderDetail.depWeek">周三</span><span class="" ng-bind="orderDetail.depTime">16:30</span>

                                <span>——</span>

                                <span ng-bind="orderDetail.arrSortDate">4月20日</span><span class="" ng-bind="orderDetail.arrWeek">周三</span><span class="" ng-bind="orderDetail.arrTime">16:30</span>

                            </p>

                        </div>

                        <p class="c_999 f_s14 mt_100">选择要退票的乘车人</p>

                        <ul class="cenBox  bg_fff ckns_Ul inlut_sel box_bb">

                            <li class="po_re" ng-repeat="x in orderDetail.passenslist" ng-if="x.ticketStatusName == '出票完成'">

                                <span class="poti_input">

                                    <input type="checkbox" id="checkbox-c-{{$index}}" ng-checked="x.chk" ng-model="x.chk" class="regular-checkbox ryuaibnsbox ajirh_boxhuan" /><label class="vm" for="checkbox-c-{{$index}}"></label>

                                </span>

                                <label class="dp_b" for="checkbox-c-{{$index}}">

                                    <p class="f_s14 mb_55"><span class="mr_200" ng-bind="x.user_name">张三</span><span class="bst_jdir c_289deb f_s12" ng-bind="x.ticket_type ==1 ? '儿童票': '成人票'">儿童</span></p>

                                    <p class="f_s12"><span class="mr_200" ng-bind="x.identityName">身份证</span><span ng-bind="x.user_ids">44083198810883695</span></p>

                                </label>



                            </li>

                        </ul>

                    </section>

                    <!-----往  [end]--------->

                    <!-----选择要退票的乘车人  [end]------>



                    <!-----备注------->

                    <section class="bg_fff border_b_1_dc mb_100  f_s14 mt_100">

                        <div>

                            <div class="c_999 hsktk">备注</div>

                            <div>

                                <textarea style="width:80%;margin:0 auto;" name="" cols="" rows="" class="tp_textarea pa_55" ng-model="refundInfo.RawNote" placeholder="若有疑问，请留言，或直接拨打客服电话咨询。"></textarea>

                            </div>

                        </div>

                    </section>

                    <!-----备注  [end]------->
                </section>

    </ion-content>
    <ion-footer-bar align-title="left" >

    <div class="monylistbox c_fff">

        <a class="f_s14 fl butchir c_fff bsut_bbai ov_h" href="tel:4009917909">拨打客服电话</a>

        <input name="" type="submit" value="提交" class="bg_ff6d6d c_fff f_s14 tomaiby fr tigisi" ng-click="refundRequest()" ng-show="display.btnPost">

    </div>

    </ion-footer-bar>
</ion-view>