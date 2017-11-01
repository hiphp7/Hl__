<ion-view view-title="比比旅行" class="myOrder" >
<style type="text/css">
    .row{
        padding: 0px;
    }
</style>
	<ion-header-bar align-title="center" class="bar-positive">
    <div class="buttons" ui-sref="tab.user">
      <button class="button icon-left ion-chevron-left button-clear"  >返回</button>
    </div>
    <h1 class="title" >火车票订单</h1>

		
	</ion-header-bar>
	<ion-content has-subheader="false">
	<ion-refresher pulling-text="下拉刷新" on-refresh="doRefresh()"></ion-refresher>
		    <div class="container">

        <div class="myOrder">
            <div class="center">

                <div class="orderType">

                    <div class="row">

                        <div class="column" ng-click="getOrderList(1)" >待付款</div>

                        <div class="column" ng-click="getOrderList(2)" >未出行</div>

                        <div class="column selected" ng-click="getOrderList(3)" >全部订单</div>

                    </div>

                </div>

                <div class="orderLists" ng-style="loading" style="margin-top:4.5rem;">

                    <!-- 全部订单 -->

                    <div class="orderList" ng-style="loading" style="border-top:1px solid #e4e3e4;">

                        <div class="item" ng-repeat="x in orderlist | orderBy:sort.sortBy:true" style="padding: 0px;">

                            <div class="row" style="height:3.8rem;">

                                <div class="column" style="height:3.8rem;line-height:3.8rem;">

									<i></i><span style="color:#666;font-size:1.5rem;">订单生成时间：</span><span ng-bind="x.chuangjianriqi" style="width: 42%;color: black;font-size:1.5rem;margin-left:0.5rem;" ng-click="orderDetail(x)"></span>
                                    <span style="width: 15%;">
                                    <span style="width: 20px;height: 25px;display: inline-block !important;" class="btn del" ng-style="isShow(x.status ==6 || x.status ==7)"  ng-if="(x.status ==6 || x.status ==7)"ng-click="deleteOrder(x)"><img src="<?php echo base_url('resources/train/images/rubbish.png');?>" style="width:20px;"></span>
                                    </span>
                                </div>

                            </div>
							<div class="row" ng-click="orderDetail(x)" style="margin-bottom: 0.5rem;">
								<div class="column" style="width: initial;line-height: 3rem;">

                                    <span class="money" style="margin-right: 1rem;line-height: 3.5rem;color:#ff6600;"><i>￥</i><span ng-bind="moneyFormat(x.pay_money)"></span></span> 
                                    
                                </div>
                                <span class="status" ng-bind="x.statusName" ng-class="getColor(x.statusName)" style="color: #fe4747;font-size: 1.3rem;line-height: 3.5rem;"></span>
							</div>
                            <div class="row" ng-click="orderDetail(x)" style="margin-bottom: 0.5rem;">

                                <div class="column" style="border-top: 1px solid #ededed;border-bottom:none;">

                                    <span class="city" ng-bind="x.from_station + '-' + x.arrive_station" style="font-size:1.5rem;"></span>

                                    <span class="train" ng-bind="x.train_code + '次'" style="color: #ff9508;"></span>

                                </div>
                                
                            </div>

                            <div class="row" ng-click="orderDetail(x)" >

                                <div class="column" style="color: black;">

                                    <span style="font-size:1.3rem;display:block;width:100%;" ng-bind="x.depSortDate + ' ' + x.depTime + ' - ' + x.arrSortDate + ' ' + x.arrTime"></span>

                                </div>

                            </div>

                            <div class="row" ng-if="x.status == 0 || (x.status == 2 && x.ketuipiao) || x.status == 6 || x.status == 7" ng-style="isShow(x.status == 2 && x.ketuipiao)" style="height: 4rem;">

                                <div class="column">

                                <!--     <span class="btn cancel" ng-style="isShow(x.status == 0)" ng-if="x.status == 0" ng-click="closeOrder(x)">取消订单</span> -->

                                    <span class="btn del" ng-style="isShow(x.status ==6 || x.status ==7)" ng-if="(x.status ==6 || x.status ==7)" ng-click="deleteOrder(x)">删除订单</span>
                                    
                                 <span style="border: none;border-radius: 5px;background: #ff6600;width: 6rem;margin-left: 70%;text-align: center;margin-top: 1rem;color: white;" class="btn pay" ng-style="isShow(x.status == 0)" ng-if="x.status == 0" ng-click="onlinePay(x)">支付</span>

                                    <span  style="border: none;border-radius: 5px;background: #ff6600;width: 6rem;margin-left: 70%;text-align: center;margin-top: 1rem;color: white;" class="btn refund" ng-style="isShow(x.status == 2)" ng-if="x.status == 2 && x.ketuipiao" ng-click="refundTicket(x)">退票</span>

                                    
                                    
                                </div>

                            </div>
							

                        </div>

                        <p class="noMorePrompt">

                            没有更多订单了

                        </p>

                    </div>

                </div>

            </div>



        </div>

    </div>

	</ion-content>
    <ion-footer-bar align-title="left" class="foot" ng-style="footLoading">
                    <!-- <div class="foot" > -->

                        <ul>

                            <li>

                                <div class="time">

                                    <label for="order1">

                                        <div>

                                            <span><input type="checkbox" name="orderOption" id="order1" ng-module="sortOrder1" ng-check="sortOrder1 == 1" ng-click="sortOrder(1)"><i></i></span>

                                            <span ng-bind="sortOrder1Name"></span>

                                        </div>

                                    </label>

                                </div>

                                <div class="orderOption">

                                    <div>

                                        <label for="order2">

                                            <p>

                                                <input type="checkbox" name="orderOption" id="order2" ng-module="sortOrder2" ng-check="sortOrder2 == 1" ng-click="sortOrder(2)"><i></i><span>三个月内的订单</span>

                                            </p>

                                        </label>

                                        <label for="order3">

                                            <p>

                                                <input type="checkbox" name="orderOption" id="order3" ng-module="sortOrder3" ng-check="sortOrder3 == 1" ng-click="sortOrder(3)"><i></i><span>有效订单</span>

                                            </p>

                                        </label>

                                    </div>

                                </div>

                            </li>

                        </ul>

                    <!-- </div> -->

    </ion-footer-bar>

</ion-view>