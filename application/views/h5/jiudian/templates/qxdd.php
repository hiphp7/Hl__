<ion-view view-title="{{chat.name}}"hide-nav-bar="true">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtoddxq()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">取消订单</h1>
    </ion-header-bar>
	
    <ion-content style="background-color: #f7f7f7;  border-width: 0px;">

        <div class="item item-divider hotel_divider" style=" background-color: white;margin:0 auto;border-width: 0 0 1px 0; font-size: 15px;">
            <span style="font-family: 黑体">已支付：&nbsp;&nbsp;<b style="color: #fd772a">￥<span ng-bind="order.totalCost"></span></b></span>
            <b style="color: #49d3dd; float: right;">费用早餐明细</b>
        </div>
        <div style="padding: 8px;">
            <div class="item item-divider hotel_divider" style=" background-color: #fdf9f6;margin:0 auto; border: 0; font-family: 黑体;">
                预定信息
            </div>
            <a class="item" style="border: 0; font-family: 黑体; ">
                <p ng-bind="order.roomtype">豪华大床房（开业特惠）</p>
                <p>入住:&nbsp;<span ng-bind="order.arrivalDate"></span>&nbsp;离店：&nbsp;<span ng-bind="order.departureDate"></span>&nbsp;预定<span ng-bind="order.numberOfRooms"></span>间房</p>
                <p>入住人：<span ng-bind="order.name"></span></p>
                <p>到店时间：<span ng-bind="order.arrivalDate"></span>&nbsp;16:00前到店</p>
                <p>特别要求：无</p>
                <p ng-bind="order.mobile">联系电话：150****6340</p>
                <p>订单编号：<span ng-bind="order.affiliateConfirmationId"></span></p>
            </a>
        </div>

        <div style="padding: 8px;">
            <div class="item item-divider hotel_divider" style=" background-color: #fdf9f6;margin:0 auto; border: 0; font-family: 黑体;">
                退款说明
            </div>
            <a class="item item-text-wrap" style="border: 0;line-height: 16px; " >
                <span style="font-family: 黑体; font-size: 12.5px">根据扣款书名，订单一经确认，不可变更或取消，若未入
                    住酒店或取消修改，我们将收取您首日房费800。</span></br>
                <span style="font-family: 黑体; font-size: 12.5px;">退款将在1-7个工作日内返还至您的支付账户</span>
            </a>
        </div>


        <div style="width: 156px; height: 34px; background-color: #49d3dd;text-align: center;
             padding-top: 5px; display: none; z-index: 20; position: absolute;
             left: 0;right:0;buttom:0;top:60%; margin: auto;" id="quxiao">
            <span style="color: white; font-size: 14px;font-family: 黑体;">亲，订单已取消成功！</span>
        </div>

    </ion-content>
	<div class="bar bar-footer" style="background-image: none; padding: 6px 16px 6px 16px; margin-bottom: 5%;; background-color: #f7f7f7;"  >
		<button   style="width: 100%;background-color: #ff6600; height: 40px; border-width: 0px; " class="button button-energized"  ng-click="quxiaodingdan()" id="qxddan">
			<span style="color: white;font-size: 18px">取消订单</span>
		</button>
	</div>
</ion-view>

