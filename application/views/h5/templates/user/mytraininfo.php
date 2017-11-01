<<ion-view view-title="比比旅行" class="orderDetail">
<ion-header-bar align-title="center" class="bar-positive">
  <div class="buttons" ui-sref="tab.trainorderlist">
    <button class="button icon-left ion-chevron-left button-clear"  >返回</button>
  </div>
  <h1 class="title" >我的订单</h1>
</ion-header-bar>
  <ion-content>
  <div class="center" style="margin-top: 0rem;">

      <div class="section">

          <div class="row">

              <div class="column df-s-c-r">

                  <span><i class="zoom075"></i></span>

                  <span class="df-s-c-r">

                        <span>订单编号:</span>

                        <span ng-bind="orderDetail.order_id"></span>

                  </span>

              </div>

          </div>

          <div class="row">

              <div class="column df-e-c-r">

                  <span class="seat" ng-bind="orderDetail.seat_Name"></span>

                  <span class="money" ng-bind="'￥' + moneyFormat(orderDetail.pay_money)"></span>

                  <span><i class="moneyDetail" ng-click="moneyDetail($event)">?</i><i ng-bind="orderDetail.statusName" ng-class="getColor(orderDetail.statusName)"></i></span>

              </div>

          </div>

          <!-- <div class="row">

              <div class="column">

                  <ul>

                      <li>

                          <span>2016-04-20 15:58</span>

                          <span>提交订单</span>

                      </li>

                      <li>

                          <span>2016-04-20 15:58</span>

                          <span><i>?</i>提交订单</span>

                      </li>

                  </ul>

              </div>

          </div>

          <div class="row">

              <div class="column">

                  <i class="icon-arrow"></i>

              </div>

          </div> -->

      </div>

      <div class="section">

          <div class="briefInfo">

              <div class="row">

                  <div class="column">

                      <span ng-bind="orderDetail.depSortDate + ' ' + orderDetail.depWeek + ' ' + orderDetail.depTime + ' ' + orderDetail.from_station + '-' + orderDetail.arrive_station"></span>

                  </div>

              </div>

              <div class="row">

                  <div class="column">乘车人：</div>

                  <div class="column">

                      <p ng-bind="orderDetail.passensname"></p>

                  </div>

              </div>

          </div>

          <div class="detailInfo">

              <div class="stationInfo">

                  <div class="row">

                      <span class="startStation" ng-bind="orderDetail.from_station"></span>

                      <span class="train" ng-bind="orderDetail.train_code"></span>

                      <span class="endStation" ng-bind="orderDetail.arrive_station"></span>

                  </div>

                  <div class="row">

                      <span class="startTime" ng-bind="orderDetail.depTime"></span>

                      <span class="trainTimeText" ng-click="getTimeList(orderDetail)"><i></i><span>列车时刻</span></span>

                      <span class="endTime" ng-bind="orderDetail.arrTime"></span>

                  </div>

                  <div class="row">

                      <span class="startDate" ng-bind="orderDetail.depSortDate | date:'MM-dd ' + ' ' + selected.depWeek"></span>

                      <span class="countTime" ng-bind="orderDetail.costtime"></span>

                      <span class="endDate" ng-bind="orderDetail.arrSortDate | date:'MM-dd ' + ' ' + selected.depWeek"></span>

                  </div>

                  <div class="row">

                      <div class="column"></div>

                  </div>

              </div>

              <div class="passengerInfo">

                  <div class="row">

                      <div class="column">乘车人：</div>

                      <div class="column">

                          <ul>

                              <li ng-repeat="x in orderDetail.passenslist">

                                  <div class="userName">

                                      <span ng-bind="x.user_name"></span>

                                      <span ng-bind="x.ticket_type ==1 ? '儿童票': '成人票'"></span>

                                      <span ng-bind="x.ticketStatusName" ng-class="getColor(x.ticketStatusName)"></span>

                                  </div>

                                  <div class="cardNumber">

                                      <span ng-bind="x.identityName + '：'"></span>

                                      <span ng-bind="x.user_ids"></span>

                                  </div>

                                  <div class="seatNumber">

                                      <span>座位号：</span>

                                      <span ng-if="x.train_box != ''" ng-bind="x.train_box + '车厢' + x.seat_no"></span>

                                  </div>

                              </li>

                          </ul>

                      </div>

                  </div>

              </div>

          </div>

          <div class="row">

              <div class="column df-c-c-r" ng-click="zhedie()">

                  <i class="icon-arrow"></i>

              </div>

          </div>

      </div>

      <div class="section">

          <div class="row df">

              <div class="column df-s-s-r">

                  <p>联系人</p>

                  <div>

                      <p><span>姓名：</span><span ng-bind="orderDetail.link_name"></span></p>

                      <p><span>手机号：</span><span ng-bind="orderDetail.link_phone"></span></p>

                  </div>

              </div>

          </div>

          <div class="row df" ng-if="orderDetail.insurance > 0">

              <div class="column df-s-s-r">

                  <p>套餐</p>

                  <div>

                      <ul>

                          <li ng-bind="'￥'+ moneyFormat(orderDetail.insurance) + ' x ' + orderDetail.adultCount + '份'"></li>

                          <li ng-bind="'保单公司：' + (orderDetail.insurerName == null ? '待定': orderDetail.insurerName)"></li>

                          <li><span ng-bind="'保单号: '+ ((orderDetail.insuranceNos == null || orderDetail.insuranceNos == '') ? '待定': orderDetail.insuranceNos)"></span><i class="insurancePolicyBtn"  ng-click="baodan($event)" ng-if="(orderDetail.insuranceNos != null && orderDetail.insuranceNos != '')">?</i></li>

                      </ul>

                  </div>

              </div>

          </div>

      </div>

      <div class="section">

          <div class="row df" ng-if="orderDetail.insurance > 0">

              <div class="column df-s-s-r">

                  <p>报销证明</p>

                  <div>

                      <ul>

                          <li>

                              出行后7个工作日内寄出

                          </li>

                          <li>

                              <span>收件人：</span>

                              <span ng-bind="orderDetail.bx_invoice_receiver"></span>

                          </li>

                          <li>

                              <span>详细地址：</span>

                              <span ng-bind="orderDetail.bx_invoice_address"></span>

                          </li>

                          <li>

                              <span>手机号：</span>

                              <span ng-bind="orderDetail.bx_invoice_phone"></span>

                          </li>

                          <li>

                              <span>报销方式: </span>

                              <span>保险发票</span>

                          </li>

                      </ul>

                  </div>

              </div>

          </div>

          <div class="row">

              <div class="column refundRuleBtn" ng-click="tuipiaoguize($event)">

                  <span>退票规则</span>

              </div>

          </div>

      </div>

  </div>

  </ion-content>
  <ion-footer-bar align-title="left" class="foot">
    <div class="row">

        <div class="column">

            <span class="btn" ng-if="orderDetail.status ==2 && orderDetail.ketuipiao" ng-click="refundTicket(orderDetail)">退票</span>

        </div>

    </div>
  </ion-footer-bar>

<script id="templates/trainTime.html" type="text/ng-template">
    <ion-modal-view style="width: 100%;height: 100%;top:0px;left:0px">
    <ion-header-bar align-title="center" class="bar-positive">
        <a class="button icon-left ion-chevron-left button-clear"  style="color:#fff;" ng-click="trainTime.hide()">返回</a>
        <span class="title">列车时刻表</span>
    </ion-header-bar>
    <ion-content has-subheader="false">
        

    <div class="trainTime">

    <div class="center">

        <div class="trainTimeList">

            <div class="title" ng-bind="timeList.train_code + '次 ' + timeList.time_list[0].name + '—' + timeList.time_list[timeList.time_list.length-1].name">

            </div>

            <div class="table">

                <div class="tr">

                    <div class="th">站名</div>

                    <div class="th">到站时间</div>

                    <div class="th">出发时间</div>

                    <div class="th">停留时间</div>

                </div>

                <div class="tr" ng-repeat="x in timeList.time_list">

                    <div class="td" ng-class="loadClass(x, 'station','sto_name')" ng-bind="x.name"></div>

                    <div class="td" ng-class="loadClass(x, 'station','arr_time')" ng-bind="$first ? '---' : x.arrtime"></div>

                    <div class="td" ng-class="loadClass(x, 'station','dep_time')" ng-bind="$last ? '---' : x.starttime"></div>

                    <div class="td" ng-class="loadClass(x, 'station','sto_time')" ng-bind="($first || $last) ? x.interval : x.interval + '分钟'"></div>

                </div>

            </div>

        </div>

    </div>
    </div>          
    </ion-content>
    </ion-modal-view>
</script>


<!-- 浮动框增加样式 -->
<style type="text/css">
    ion-popover-view.refundRule {
        top:0 !important;
        left:0 !important;
        right:0 !important;
        bottom: 0 !important;
        width:80% !important;
        margin: auto !important;

        
    }
</style>

<!-- 订票须知 -->
<script id="templates/refundRule.html" type="text/ng-template">
      <ion-popover-view class="refundRule" >
        <ion-header-bar align-title="left" class="bar-light">
          <h1 class="title">退票规则:</h1>
        </ion-header-bar>
        <ion-content >
            <div class="center">

                <p>没有换取纸质车票且不晚于开车前30分钟的，可以办理退票。</p>

                <p>开车后改签的车票不退。</p>

                <p>

                    开车前15天（不含）以上退票的，不收取退票费；票 面乘车站开车时间前48小时以上的按票价5%计，24小 时以上、不足48小时的按票价10%计，不足24小时的 按票价20%计。开车前48小时～15天期间内，改签或 变更到站至距开车15天以上的其他列车，又在距开车 15天前退票的，仍核收5%的退票费。

                </p>

                <p>

                    办理车票改签或“变更到站”时，新车票票价低于原 车票的，退还差额，对差额部分核收退票费并执行现 行退票费标准。

                </p>

                <p>

                    改签或变更到站后的车票乘车日期在春运期间的，退 票时一律按开车时间前不足24小时标准核收退票费。

                </p>

                <p>

                    上述计算的尾数以5角为单位，尾数小于2.5角的舍去 、2.5角以上且小于7.5角的计为5角、7.5角以上的进 为1元。退票费最低按2元计收。

                </p>

                <p>

                    有其他特殊情况请拨打客服电话 400-991-7909 咨询。

                </p>

            </div>

        </div>
        </ion-content>
      </ion-popover-view>
</script>
<style type="text/css">
        ion-popover-view.tran_baodanhao {
            top:0 !important;
            left:0 !important;
            right:0 !important;
            bottom: 0 !important;
            width:80% !important;
            margin: auto !important;
        }
    </style>
<!-- 订票须知 -->
<script id="templates/baodan.html" type="text/ng-template">
      <ion-popover-view class="tran_baodanhao" >

        <ion-content >
                <div class="f_s13" style="padding: 1rem 3rem;">               
                    <div ng-repeat="x in orderDetail.passenslist">
                        <p class="pt_55">投保人：<span ng-bind="x.user_name">小高</span></p>
                        <p>保单号：<span  ng-bind="x.bx_code">12345678</span></p>
                    </div>
                </div>

        </ion-content>
      </ion-popover-view>
</script>

<!-- 浮动框增加样式 -->
<style type="text/css">
    ion-popover-view.orderMoneyDetail {
        top:0 !important;
        left:0 !important;
        right:0 !important;
        bottom: 0 !important;
        width:80% !important;
        margin: auto !important;
        height: 8rem;

        
    }
</style>

<!-- 订票须知 -->
<script id="templates/orderMoneyDetail.html" type="text/ng-template">
      <ion-popover-view class="orderMoneyDetail" >

        <ion-content  scroll="false">
        <div>

        <div class="section">

            <div class="row">

                <div class="column">

                    <p>

                        <span>火车票</span>

                        <span>

                              <i>￥</i>

                              <span ng-bind="moneyFormat(orderDetail.ticket_pay_money) + ' x ' + orderDetail.totalCount + '人 = '"></span>

                              <span>

                                    <i>￥</i>

                                    <span ng-bind="moneyFormat(orderDetail.ticket_pay_money) * orderDetail.totalCount"></span>

                              </span>

                        </span>

                    </p>

                    <p ng-if="orderDetail.insurance > 0">

                        <span>套餐</span>

                        <span>

                              <i>￥</i>

                              <span ng-bind="moneyFormat(orderDetail.insurance) + ' x ' + orderDetail.adultCount + '份 = '"></span>

                        <span>

                              <i>￥</i>

                              <span ng-bind="moneyFormat(orderDetail.insurance) * orderDetail.adultCount"></span>

                        </span>

                    </p>

                </div>

            </div>

        </div>
        </div>
        </ion-content>
      </ion-popover-view>
</script>
</ion-view>
