<ion-view view-title="比比旅行" ng-init="traininit()" hide-tabs=”true”>
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }
    .row + .row{
        margin-top: 0px;
    }
    .rtn:before{
        line-height: 32px !important;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
    <div class="buttons" ui-sref="trainList">
      <button class="button icon-left ion-chevron-left button-clear rtn" style="line-height:32px;">返回</button>
    </div>
    <h1 class="title" style="font-size: 1.5rem;">订单填写</h1>
    <div class="buttons">
      <button class="button button-clear rtn" ng-click="orderInfo($event)">订单须知</button>
    </div>
    </ion-header-bar>
    <ion-content scroll="true" has-subheader="false" class='order'>
            <div class="center" style="display:block;" ng-style="loading">
                <div class="stationInfo">

                    <div class="row">

                        <span class="startStation" ng-bind="selected.from_station"></span>

                        <span class="train" ng-bind="selected.train_code"></span>

                        <span class="endStation" ng-bind="selected.arrive_station"></span>

                    </div>

                    <div class="row">

                        <span class="startTime" ng-bind="selected.from_time"></span>

                        <span class="trainTimeText"><i></i><span ng-click="getTimeList(selected)" class="df-c-c-r">列车时刻</span></span>

                        <span class="endTime" ng-bind="selected.arrive_time"></span>

                    </div>

                    <div class="row">

                        <span class="startDate" ng-bind="selected.search.date | date:'MM-dd ' + ' ' + selected.search.week"></span>

                        <span class="countTime" ng-bind="selected.costtime"></span>

                        <span class="endDate" ng-bind="selected.search.arr_date | date:'MM-dd ' + ' ' + selected.search.arr_week"></span>

                    </div>

                </div>
                
                <div class="selectedSeat">

                    <span>已选坐席</span>

                    <span><span ng-bind="selected.seatList[0].typeName"></span><i>￥</i><span ng-bind="selected.seatList[0].price | currency:''"></span></span>

                </div>
                
                <!-- 乘车人 -->
                <div class="passenger">

                    <span class="title">乘车人信息</span>

                    <span class="detail" ng-if="(costdetail.adult.count + costdetail.child.count) > 0">

                        <span ng-bind="costdetail.adult.count + '成人'"></span><span ng-bind="costdetail.child.count + '儿童'"></span>

                    </span>

                    <span class="btn" ng-click="showChoosePassenger()" ng-if="(costdetail.adult.count + costdetail.child.count) == 0"><i>选择乘车人</i></span>

                </div>
                
                <div class="passengerList">

                    <div class="btnRow" ng-if="(costdetail.adult.count + costdetail.child.count) > 0">
                    
                        <div class="column btn" ng-click="showChoosePassenger()">更改/添加乘车人</div>
                        <div class="column" ng-click="addChildTicket()">添加儿童票</div>

                    </div>

                    <div class="row" ng-repeat="x in userContacts |orderBy:'chkTime'" ng-if="x.chk == true">

                        <div class="column df-c-c-r">

                            <span class="dif-c-c-r" ng-click="selectedRemove(x)"><i></i></span>

                        </div>

                        <!-- <div class="column" ng-click="displayUserContact(true,x, 'order')"> -->

                        <div class="column">

                            <p class="userName" ng-bind="x.user_name"></p>

                            <p class="cardType" ng-bind="x.ids_type"></p>

                        </div>

                        <!-- <div class="column" ng-click="displayUserContact(true,x, 'order')"> -->

                        <div class="column">

                            <p><span ng-bind="x.ticket_type ==1 ? '儿童票': ''"></span></p>

                            <p ng-bind="x.user_ids"></p>

                        </div>

                    </div>

                </div>
                
                <!-- 联系人 -->
                <div class="contact">

                    <span class="title">联系信息</span>

                    <span class="info" ng-if="currentContact.xingming !=''">用于接收短信通知</span>

                    <span class="btn"><i ng-bind="currentContact.xingming =='' ? '' : '修改联系人'" ng-click="lianxiren(sf)"></i></span>


                </div>
                
                <div class="contactDetail" ng-if="currentContact.xingming !=''">

                    <div class="row">

                        <div class="column">姓名</div>

                        <div class="column" ng-bind="currentContact.xingming"></div>

                    </div>

                    <div class="row">

                        <div class="column">电话</div>

                        <div class="column" ng-bind="currentContact.shoujihaoma"></div>

                    </div>

                </div>
                
                <!-- 套餐类型 -->
                <div class="setMealType" ui-sref="tab.insuranceTrain">

                    <div class="row">

                        <div class="column">套餐类型</div>

                        <div class="column">

                            <span ng-bind="insurance.title">优先出票</span><i></i>

                        </div>

                    </div>

                </div>
                
                <!-- 套餐发票 -->
                <div class="setMealInvoice"  ng-click="addressTrainInfo()">

                    <div class="row">

                        <div class="column">套餐发票</div>

                        <div class="column">

                            <span ng-bind="insurance.isMail ? '邮寄发票' : '不需要'">不需要</span><i></i>

                        </div>

                    </div>

                </div>
                
            </div>
</ion-content>

            <ion-footer-bar align-title="left" class=" footorder" style="background-color: #5b6b83">
                <span class="countMoney">订单总额:<i><i>￥</i><span ng-bind="costdetail.total.totalPrice | currency:''" class="ng-binding">0.00</span></i>
                </span>
                <span class="detail df-c-c-r ng-hide" ng-show="costdetail.total.totalPrice >0" ng-click="mingxi()"><span>明细</span><i></i></span>
                <span class="payBtn" ng-show="issf == 1" ng-click="postOrder()"><i>去支付</i></span>
                <input id='train_order_zhifu_zy' ng-show="issf == 0" type="button" value="去支付" class="bg_ff6d6d c_fff f_s14 tomaiby fr" style="text-align: center;" ng-click="postOrder()" ng-disabled="disable.btnPost"></input>
                <form id="hc_tijiaoform" method="get" action="<?php echo base_url();?>wxpay/jsapi_hc.php">
                    <input type="submit" id="tijiao_hcp" value="提交" style="display:none;" />
                    <input type="hidden" id="hc_total_fee" name="total_fee"/>
                    <input type="hidden" id="hc_body" name="body"/>
                    <input type="hidden" id="hc_attach" name="attach"/>
                    <input type="hidden" id="hc_goods_tag" name="goods_tag"/>
                    <input type="hidden" id="hc_detail" name="detail"/>
                    
                </form>
            </ion-footer-bar>
<!-- 明细 -->
<div class="particularsMask" style="display: none;" ng-click="yincang();$event.stopPropagation();">
                <div class="particulars">
                    <div class="row">
                        <div class="column">火车票</div>
                        <div class="column">
                            <span><i style="display:none">￥</i><span ng-bind="costdetail.unit.ticketfare | currency:'￥'" class="ng-binding">￥133.00</span></span>x<span ng-bind="costdetail.total.totalCount + '人'" class="ng-binding">2人</span>
                        </div>
                    </div>
                    <!-- ngIf: costdetail.total.insurance >0 --><div class="row ng-scope" ng-if="costdetail.total.insurance >0">
                        <div class="column">套餐</div>
                        <div class="column">
                            <span><i style="display:none">￥</i><span ng-bind="costdetail.unit.insurance | currency:'￥'" class="ng-binding">￥20.00</span></span>x<span ng-bind="costdetail.adult.count + '份'" class="ng-binding">1份</span>
                        </div>
                    </div><!-- end ngIf: costdetail.total.insurance >0 -->
                    <div class="row">
                        <div class="column">提示:儿童票无需支付套餐费用</div>
                    </div>
                </div>
            </div>

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
    ion-popover-view.orderNotice {
        top:0 !important;
        left:0 !important;
        right:0 !important;
        bottom: 0 !important;
        width:80% !important;
        margin: auto !important;

        
    }
</style>

<!-- 订票须知 -->
<script id="templates/orderNotice.html" type="text/ng-template">
      <ion-popover-view class="orderNotice" >
        <ion-header-bar align-title="left" class="bar-light">
          <h1 class="title">购票说明：</h1>
        </ion-header-bar>
        <ion-content >

              <div class="content">

                  <p>1. 因受全国各铁路局的不同规定与要求，比比旅行无法承诺百分之百代购成功，请您谅解。如果出票失败，比比旅行将短信通知您，并在7个工作日内原路退回票款。</p>

                  <p>2. 卧铺铺位是随机分配的，预定时暂收下铺价格，出票成功后会根据实际票价退还差价。</p>

                  <p class="title">取票说明：</p>

                  <p>1. 发车前凭订票时登记的证件和电子订单号，您可在全国任意火车站或代售点换取纸质车票。</p>

                  <p>2. 对于部分高铁和动车，如果您订票时使用的证件为二代身份证，就可以持二代身份证直接检票进站。</p>

                  <p class="title">儿童票购票说明：</p>

                  <p>1. 儿童不能单独乘车，需有成人同行。每位成年乘客可以免费携带1名身高1.2米以下的儿童。超过1名时，其他儿童需购买儿童票。</p>

                  <p>2. 身高在1.2-1.5米的儿童需购买儿童票。身高超过1.5米的儿童需购买成人票。请根据儿童实际身高购票，否则乘车时可能无法进站。</p>

                  <p>3. 儿童票价格不定，因此先按成人票价收取费用，之后会根据实际出票价格退还差价。</p>

                  <p>4. 卧铺儿童票与同行成人床位是分开的。如果需要成人与儿童共用床位，请至火车站买票。</p>

                  <p class="title">退票与改签：

                      <p>1. 开车前15天（不含）以上退票的，不收取退票费；票面乘车站开车时间前48小时以上的按票价5%计，24小时以上、不足48小时的按票价10%计，不足24小时的按票价20%计。</p>

                      <p>2. 开车前48小时～15天期间内，改签或变更到站至距开车15天以上的其他列车，又在距开车15天前退票的，仍核收5%的退票费。</p>

                      <p>3. 办理车票改签或“变更到站”时，新车票票价低于原车票的，退还差额，对差额部分核收退票费并执行现行退票费标准。</p>

                      <p>4. 改签或变更到站后的车票乘车日期在春运期间的，退票时一律按开车时间前不足24小时标准核收退票费。</p>

                      <p>5. 上述计算的尾数以5角为单位，尾数小于2.5角的舍去、2.5角以上且小于7.5角的计为5角、7.5角以上的进为1元。退票费最低按2元计收。</p>

              </div>
        </ion-content>
      </ion-popover-view>
</script>
    <!-- 选择成人-->
    <script id="templates/xuanchengren.html" type="text/ng-template">
         <ion-modal-view style="top:50%;width: 100%;left: 0px;height: 50%;">
           <ion-header-bar class="bar bar-header" style="background-color: grey">

               <span class="title" >需使用成人证件购买儿童票，请选择</span>

           </ion-header-bar>
           <ion-content class="padding" style="top: 2.6rem; padding: 0px" scroll="false">


           <div class="list card">

              <div class="item item-icon-left" ng-repeat="item in userContacts | filter:{ ticket_type: 0,chk:true}" ng-click="tianjiaertong(item)">
                {{item.user_name}}
              </div>

              </div> 
           </ion-content>
         </ion-modal-view>

    </script>    
</ion-view>

