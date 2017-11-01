<ion-view view-title="" hide-nav-bar="true">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backto()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">酒店订单</h1>
    </ion-header-bar>

    <style type="text/css">
      .test1 input{ width: 2.5rem; height: 2.5rem; margin-top: 0px; margin-left: 0px;}
      .test1 input:checked:before{  background: #30404f;  border: 1px solid white;}
      .test1 input:before{border-color: #cccccc;}
      .test1 input:before, .test1:before{ width: 60%; height: 60%;border-radius: 0px;background: #30404f; border-color: white;}
      .test1 input:after{ border:2px solid #49d3dd; border-top: none;border-right: none  ;top:19%; left:7%}  
    </style>
  <ion-content style="background-color:#F5F5F5;  padding: 0px 10px 44px 10px;">
		
	<div style="text-align: center; margin-top:35%;" ng-if="orders == '' || orders == null || orders == undefined">
	  <p style="color:#777777;line-height: 1.2rem;font-size: 1.2rem;font-family: SimHei;width: 100%">目前还没有订单哦</p>
	  <span style="color:#777777;line-height: 35px;font-size: 1.2rem;font-family: SimHei;width: 100%">尽快去预订吧</span>
	  <br><img src="<?php echo base_url("jiudian_img/jddingdan.png"); ?>" style="width:50%">
	</div>


      <div class="item item-divider hotel_divider" style="margin-top: 5px; background-color:white; height: 130px;border-radius: 3px; padding-top: 5px;" 
	  ng-repeat="order in orders" ng-style="order.dingdanzhuangtai == '已支付' || order.dingdanzhuangtai == '待支付' ? '' : yincang" " >
      <div class="row" style="padding: 0; height: 85px;" ng-click="gotoddxq(order)">
        <div class="col col-10" style="height: 85px;">
          <div class="col-demo" style="padding-top: 5px; font-size: 26px; color: white;"><i class="icon ion-ios-checkmark-outline" style="color: #49d3dd"></i></div>
        </div>
        <div class="col-75">
          <div class="col-demo" ng-style="order.dingdanzhuangtai=='已取消'?myobj:''" style="height: 85px; text-align: left;color: black;padding-top: 12px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" ng-click="gotoddxq(order)">
              <span style="font-size: 16px; font-family: 黑体;" ng-bind="order.hotelname"   ng-style="order.dingdanzhuangtai=='已取消'?myobj:''"></span><br/>
              <a style= "color: black;font-size: 14px; color: #5d5d5d; width:98%; white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;" ng-bind="order.address"  ng-style="order.dingdanzhuangtai=='已取消'?myobj:''"></a>
              <br/>
              <a style="font-size: 14px; color: #5d5d5d;" ng-style="order.dingdanzhuangtai=='已取消'?myobj:''"><span ng-bind="order.arrivalDate" ></span>至<span ng-bind="order.departureDate" ></span>&nbsp;<span ng-bind="order.daynum"></span>晚/<span ng-bind="order.numberOfRooms"></span>间</a>
          </div>
        </div>
        <div class="col col">
          <div class="col-demo"  style="height: 85px;">
            <b style="color: #fd772a; font-size: 14px;"  ng-style="order.dingdanzhuangtai=='已取消'?myobj:''" >￥<span ng-bind="order.totalCost"></span></b><br/>
            <a style="font-size: 14px; color: black;"   ng-style="order.dingdanzhuangtai=='已取消'?myobj:''"><span ng-bind="order.dingdanzhuangtai"></span></a>
          </div>    
        </div>  
      </div>
     <!--<button ng-click="gotoHotelDetail(order);" class="button button-small button-light" style="float: right; margin-right: 10px; border: 1px solid #d8d8d8;">
        <span style="color:#49D3DD;font-size: 12px;"> 再次预定</span>
      </button>-->
          <button class="button button-small button-light" style="float: right; margin-right: 10px; border: 1px solid #d8d8d8;" ng-show="order.dingdanzhuangtai == '未支付'" ng-click="gotozxf(order)">
        <span style="color:#49D3DD;font-size: 11.2px;"> &nbsp;去支付&nbsp;</span>
      </button>
          <!--<button class="button button-small button-light" style="float: right; margin-right: 10px; border: 1px solid #d8d8d8;" ng-click="gotoqxdd(order)" ng-hide="order.dingdanzhuangtai == '已取消'">
        <span style="color:#49D3DD;font-size: 12px;"> &nbsp;取消&nbsp;</span>
      </button>-->

    </div>

  </ion-content>
<ion-footer-bar align-title="left" class="bar-assertive"  style="background-color: #30404f;background-image: none;border-top: 0; padding: 0;">
    <div class="row"style="color:white; text-align: center; font-size: 1.3rem;padding: 0; line-height: 44px; ">
        <div class="col" style="padding: 0;" >
            <img src="<?php echo base_url("jiudian_img/saixuan.png"); ?>" style="width:17px; height:17px;position: relative;top: 2px;">
            <a ng-click="goto_saixuan()" style="color:white;">筛选</a>
        </div>
        <div class="col"style="padding: 0;text-align: center;">
            <img src="<?php echo base_url("jiudian_img/shijian.png"); ?>" style="width:17px; height:17px;position: relative;top: 2px;">
            <span>预定时间</span></div>
      <div class="col"style="padding: 0;text-align: center;">
        <ul class="list">
          <li class="item item-checkbox"  style="border: 0; padding: 0;background-color: #30404f;" >
              <label  class="checkbox checkbox-calm test1"style="" ng-click="youxiaodingdan()" >
                <input type="checkbox"  class="test2" ng-model="chk"
                       style="background-color: #30404f; border: #49d3dd; margin: 0; position: fixed; right: 0px; top: 14px;" name="ruzhuren">
            </label>
              <span style="color: white;font-size: 1.3rem;">有效订单</span>
          </li>
        </ul>
      </div>
    </div>
</ion-footer-bar>
</ion-view>
