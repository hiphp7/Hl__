<ion-view view-title="在线支付" style="background-color:#EFEFEF">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="goto2()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">在线支付</h1>
    </ion-header-bar>

    <ion-content style="">

        <div class="item item-divider hotel_divider" style=" overflow: hidden; padding: 10px; border: 0; background-color: white">
            <p style="font-size: 20px; font-family: 黑体" ng-bind="order.hotelname"></p>
            <p ng-bind="order.roomtype">标准间（预付）</p>
            <p><span ng-bind="order.arrivalDate"></span>入住，<span ng-bind="order.departureDate"></span>离店，预定<span ng-bind="order.numberOfRooms"></span>间房</p>


            <div id="xq" style="width: 100%; border: 0; border-top: 1px solid #e1e1e1; overflow: hidden; display: none;">
                <div>
                    <div class="row">
                        <div class="col col-20" style=" text-align: left; padding-left: 0;">
                            <div class="col-demo" style=" text-align: left; padding-left: 0;">费用明细</div>
                        </div>
                        <div class="col" style="margin-left: 15px; border-bottom: 1px solid #e1e1e1; ">
                            <div class="col-demo" style=" text-align: left;"><span >房费</span><span style="float: right;" >￥<span ng-bind="order.fangjianfei"></span></span></div>
							 <div class="col-demo" style=" text-align: left;" ng-hide="order.ismail == '否'"><span >邮递费</span><span style="float: right;" >￥<span>20</span></span></div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col col-20">
                            <div class="col-demo"></div>
                        </div>

                    </div>
                </div>

                <div style="border-bottom: 1px solid #e1e1e1;">
                    <div class="row">
                        <div class="col col-20"style=" text-align: left; padding-left: 0;">
                            <div class="col-demo" style=" text-align: left; padding-left: 0;">入住人</div>
                        </div>
                        <div class="col" style="margin-left: 15px; ">
                            <div class="col-demo" style=" text-align: left;"><span ng-bind="order.name"></span></div>
                        </div>
                    </div>
                </div>

                <div style="border-bottom: 1px solid #e1e1e1;">
                    <div class="row">
                        <div class="col col-20"style=" text-align: left; padding-left: 0;">
                            <div class="col-demo" style=" text-align: left; padding-left: 0;">联系电话</div>
                        </div>
                        <div class="col" style="margin-left: 15px;">
                            <div class="col-demo" style="text-align: left;"><span ng-bind="order.mobile"></span></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="zs" style=" background-image: url('<?php echo base_url("jiudian_img/bolang_1.png"); ?>');background-size:100% 100%;padding: 0 10px 5px 10px; ">
            应付总额 ￥
            <span style="font-size: 20px; color: #ff9000"><span ng-bind="order.totalCost"></span></span>.00
            <a id="test1" ng-click="xiangqing()" style="float: right; color: #67dae3">详情　▼</a>
        </div>

        <div id="sq" style=" background-image: url('<?php echo base_url("jiudian_img/bolang_1.png"); ?>');background-size:100% 100%;padding: 0 10px 5px 10px; display: none">
            应付总额 ￥
            <span style="font-size: 20px; color: #ff9000"><span ng-bind="order.totalCost"></span></span>.00
            <a id="test2" ng-click="shouqi()" style="float: right; color: #67dae3">收起　▲</a>
        </div>




        <div class="row" style="padding:10px 10px 0 10px;  ">
            <div style="border-bottom: 2px solid #e1e1e1;">
                <a ng-click="gotopay()">
                    <img src='<?php echo base_url("jiudian_img/wxzf.jpg"); ?>' style="width:100%"></a>
            </div>
        </div>
       <!-- <div class="row" style="padding:0px 10px 10px 10px">
            <a>
                <img src='<?php echo base_url("jiudian_img/zfb.jpg"); ?>'  style="width:100%"></a>
        </div> -->

        <div class="row" style="padding:40px 10px 0 10px;  ">
            <div style="border-top: 2px solid #e1e1e1;">
                <img src='<?php echo base_url("jiudian_img/verisign.jpg"); ?>'  style="width:100%">
            </div>
        </div>

    </ion-content>
</ion-view>
