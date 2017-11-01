<ion-view view-title="{{chat.name}}"hide-nav-bar="true">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backto()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">订单详情</h1>
    </ion-header-bar>

    <ion-content style="background-color: #f7f7f7;">

        <!--
          <div class="row" style="background-color: #49d3dd;padding: 0;">
                 <div class="col ">
                 <a style="padding-left: 12px; font-size: 28px;" ng-click="backtozxf()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%"></i></a>
                 <span style="color: white;padding-left: 112px;font-size:17px">订单详情</span>
                 </div>
               </div>
        -->

        
            <div class="row" style="padding: 8px 0 8px 8px; background-color:#49d3dd; height: 100px;">
                <div class="col col-10">
                    <div class="col-demo" style="padding-top: 5px; font-size: 26px; color: white;"><i class="icon ion-ios-checkmark-outline"></i></div>
                </div>
                <div class="col-67">
                    <div class="col-demo" style="height: 90px; text-align: left;color: white;padding-top: 12px;">
										   <!-- <span style="font-size: 26px; font-family: 黑体;">已确认</span><br/>
						<p style= "color: white; ">酒店已确认您的房间，许等待5-15分钟酒店
						  <br/>录入信息后即可入住</p>--> 
						  
					   <span style="font-size: 26px; font-family: 黑体;" ng-bind="order.orderStatus"></span><br/>
						<p style= "color: white; " ng-show = "order.orderStatus == '等待支付'">请在30分钟内完成支付！
						  <br/></p>
						<p style= "color: white; " ng-show = "order.orderStatus == '等待确认'">您的订单已经支付成功，等待酒店确认中！
						  <br/>请稍作等待！</p>
						<p style= "color: white; " ng-show = "order.orderStatus == '等待安排房间'">您的订单已经支付成功，等待酒店安排房间！
						  <br/>请稍作等待！</p>
						<p style= "color: white; " ng-show = "order.orderStatus == '等待入住'">酒店已收到您的入住信息，您可安心入住。
						  <br/></p>
						<p style= "color: white; " ng-show = "order.orderStatus == '已入住'">您可以通过比比重新预订！
						  <br/></p>
						<p style= "color: white; " ng-show = "order.orderStatus == '已离店'">房间为您保留到xx月xx日的中午12：00，酒店一般在14：00开始办理入住
						  <br/>早到可能需要等待。</p>
						<p style= "color: white; " ng-show = "order.orderStatus == '预定取消'">您的订单已取消，您可以通过比比重新预订。
						  <br/></p>
						<p style= "color: white; " ng-show = "order.orderStatus == '预定失败'">您的订单预定失败，您可以通过比比重新预定。
						  <br/></p>
						<p style= "color: white; " ng-show = "order.orderStatus == '未入住'">您可以通过比比再次预定！
						  <br/></p>                                     
                    </div>
                </div>
                <div class="col">
                    <div class="col-demo"  style="height: 90px;padding-top: 50px;">
                        <a style="font-size: 14px; color: white; ">详细&nbsp;></a>
                    </div>
                </div>
            </div>
        
        <div class="item item-divider hotel_divider" style=" background-color: white;margin:0 auto;border-width: 0 0 1px 0; font-size: 15px;">
            <span style="font-family: 黑体;">在线支付：&nbsp;&nbsp;<b style="color: #fd772a">￥<span ng-bind="order.totalCost"></span></b></span>
            <span style="color: #49d3dd; float: right;">费用早餐明细</span>
        </div>
        <div style="padding: 8px;">
            <div style="padding: 14px;padding-bottom: 2px; background-color: white;">
                <div class="item" style="margin-top: 5px; font-family: 黑体; padding:5px 0 12px 0; border-style: solid;border-width: 0 0 2px 0;">
                    <span style=" font-size: 18px;" ng-bind="order.hotelname"></span>
                </div>
                <div class="item" style="margin-top: 1px; font-family: 黑体; padding:12px 0 12px 0;; border-style: solid;border-width: 0 0 2px 0;">
                    <p ng-bind="order.address"></p>
                    <p style="color: #49d3dd">联系酒店</p>
                </div>
                <div class="item" style=" font-family: 黑体; padding-left: 0; border-style: solid;border-width: 0;margin-top: 1px;">
                    <p style="font-size: 18px;" ng-bind="order.roomtype">豪华大床房（开业特惠）
                        <span style="font-size: 12px;color: #49d3dd; float: right;">房型详情</span>
                    </p>
                    <p style="margin-top: 10px;"><span style="font-size: 18px;"><span ng-bind="order.arrivalDate"></span>至<span ng-bind="order.departureDate"></span></span>
                        <span style="font-size: 14px;"><span ng-bind="order.daynum"></span>晚<span ng-bind="order.numberOfRooms"></span>间最晚到店16:00前</span></p>
                    <p><span ng-bind="order.bedtype"></span>丨全部房间Wi-Fi丶优先宽带免费</p>
                </div>
            </div>
        </div>
        <div style="padding: 8px;">
            <div class="item item-divider hotel_divider" style=" background-color: #fdf9f6;margin:0 auto; border: 0; font-family: 黑体;">
                预定信息
            </div>
            <div style="background-color: white;padding: 10px;">
                <div class="item" style="font-family: 黑体; padding-left: 0; border-style: solid;border-width: 0 0 1px 0;">
                    <p><span>入住人&nbsp;&nbsp;</span><span style="margin-left: 20px; font-size: 16px;" ng-bind="order.name">李思思</span></p>
                </div>
                <div class="item" style=" font-family: 黑体;padding-left: 0; border-style: solid;border-width: 0 0 1px 0; margin-top: 1px;">
                    <p><span>到店时间</span><span style="margin-left: 20px;"><span ng-bind="order.arrivalDate"></span>16:00前到店</span></p>
                </div>
                <div class="item" style=" font-family: 黑体; padding-left: 0; border-style: solid;border-width: 0 0 1px 0;margin-top: 1px;">
                    <p><span>特别要求</span><span style="margin-left: 20px;">无</span></p>
                </div>

                <div class="item" style=" font-family: 黑体; padding-left: 0; border-style: solid;border-width: 0 0 0px 0;margin-top: 1px;">
                    <p><span>联系电话</span><span style="margin-left: 20px;"  ng-bind="order.mobile">150****6340</span></p>
                </div>
                <!--<div class="item" style=" font-family: 黑体; padding-left: 0;border:0;margin-top: 1px;">
                    <p><span>发票信息</span><span style="margin-left: 20px;">如需要发票，可向酒店索取</span></p>
                </div>-->
            </div>
        </div>
    <div style="padding: 8px;">
      <a class="item item-divider hotel_divider"  ng-click="common_pro()" style=" background-color: #fdf9f6;margin:0 auto; border: 0; font-family: 黑体; padding-left: 10px;padding-right: 10px;">
        <span style="font-size: 14px;">常见问题</span><i class="icon ion-chevron-right" style="position: absolute; right: 14px;"></i>
      </a>
      <div style="background-color: white;padding: 1px 10px 0px 10px;">
          <a class="item" ng-click="common_pro()" style=" padding: 10px 0 5px 0; border-style: solid;border-width: 0 0 1px 0; height: 40px;margin-top: 1px;font-family: 黑体;">
          <div  style="">
            <span style="font-size: 16px;">如何才算订房确认即预定成功？</span><i class="icon ion-chevron-right" style="position: absolute; right: 5px;"></i>
          </div>
        </a>
        <a class="item" ng-click="common_pro()"  style=" padding: 10px 0 5px 0; border-style: solid;border-width: 0 0 1px 0; height: 40px;margin-top: 1px;font-family: 黑体;">
          <div  style="">
            <span style="font-size: 16px;">如何查询订单？</span><i class="icon ion-chevron-right" style="position: absolute; right: 5px;"></i>
          </div>
        </a>
        <a class="item" ng-click="common_pro()"  style=" padding: 10px 0 5px 0; border-style: solid;border-width: 0 0 1px 0; height: 40px;margin-top: 1px;font-family: 黑体;">
          <div  style="overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">
            <span style="font-size: 16px;">预付订单的发票是酒店开具，还是比比旅行开具？</span><i class="icon ion-chevron-right" style="position: absolute; right: 5px;"></i>
          </div>
        </a>
        <a class="item" ng-click="common_pro()"  style=" padding: 10px 0 5px 0; border-style: solid;border-width: 0 0 0px 0; height: 40px;margin-top: 1px;font-family: 黑体;">
          <div  style="">
            <span style="font-size: 16px;">预付订单的取消或修改？</span><i class="icon ion-chevron-right" style="position: absolute; right: 5px;"></i>
          </div>
        </a>
      </div>    
    </div>
        <div style="padding: 8px;">
            <div class="item item-divider hotel_divider" style=" background-color: #fdf9f6;margin:0 auto; border: 0; font-family: 黑体;">
                其他信息
            </div>
            <a class="item item-text-wrap" style="border: 0;line-height: 16px; " >
                <p><span style="font-size: 16px;">订单编号</span><span style="margin-left: 20px; font-size: 16px; font-family: 黑体;" ng-bind="order.affiliateConfirmationId"></span></p><br/>
                <p><span style="font-size: 16px;">预定日期</span><span style="margin-left: 20px; font-size: 16px; font-family: 黑体;" ng-bind="order.xiadanshijian">2016-11-18</span></p>
            </a>
        </div>
 <!--<button class="button button-light" style="width:30%; float: right; margin-right: 10px; border: 1px solid #d8d8d8;" ng-click="gotoqxdd(order)" ng-hide="order.orderStatus == '已入住'||order.orderStatus == '已离店'||order.orderStatus == '预定取消'||order.orderStatus == '预定失败'||order.orderStatus == '未入住'">
      <span style="color:#49D3DD"> 取消订单</span>
    </button>
        <button class="button button-light"style="width:30%; float: right;margin-right: 10px;border: 1px solid #d8d8d8;">
            <span style="color:#49D3DD"> 投诉 建议</span>
        </button>-->
        <div >
            <img src='<?php echo base_url("jiudian_img/mskz.png"); ?>' style="width:100%">
        </div>
        <div class="row" style="border-color: white;">
            <div class="col col-33" style="border-color: white;">
                <a ng-click="gotoAir();" style="text-decoration: none;"><img src='<?php echo base_url("jiudian_img/fjp.png"); ?>' style="width:100%"><p style="text-align: center;color:black">飞机票</p></a>
            </div>
            <div class="col col-33" style="border-color: white;">
                <a ng-click="gotoTrain();" style="text-decoration: none;"><img src='<?php echo base_url("jiudian_img/hcp.png"); ?>' style="width:100%"><p style="text-align: center;color:black">火车票</p></a>
            </div>
            <div class="col col-33" style="border-color: white;">
                <a href="#" style="text-decoration: none;"><img src='<?php echo base_url("jiudian_img/kf.png"); ?>' style="width:100%"><p style="text-align: center;color:black">咨询</p></a>
            </div>
        </div>
    </ion-content>
</ion-view>
