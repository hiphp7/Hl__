<ion-view view-title="比比旅行-比速度·比价格·比服务" style="color: black" >
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <h1 class="title">
            <span style=" margin: 0 auto;">
                <img src='<?php echo base_url("jiudian_img/bibi_logo_new.png"); ?>' style="width: 50%;max-width: 120px; min-width: 75px; vertical-align:middle;" >
            </span>
        </h1>
<!--        <button class="button button-clear" ng-click="backtoHotels()" style="right: -5px;">
            <img src='<?php echo base_url("jiudian_img/bibi_phone.png"); ?>' style="width: 33%; min-width: 24px;  vertical-align:middle;" >
        </button>-->
	    <a href="tel:4009917909"><i class="icon icon-phone" id="top_phone"></i></a>
    </ion-header-bar>
  <ion-content style="background: #f3f3f3;">
    
      <ion-slide-box auto-play="true" does-continue="true" slide-interval=4000 show-pager="false"
				active-slide="myActiveSlide">
        <ion-slide>
            <img src='<?php echo base_url("jiudian_img/slide_1.png"); ?>' ng-click="goto_dingpiaozhinan()" style="width: 100%;">
        </ion-slide>
        <ion-slide>
          <img src='<?php echo base_url("jiudian_img/slide_2.png"); ?>' ng-click="goto_bibiyoushi()"style="width: 100%;" >
        </ion-slide>
      </ion-slide-box>
    

    <!--机票、火车票-->
    <div class="row" style="background: white; padding: 4px 0 0;  padding: 4% 0;">
        <div class="col" style="padding: 0">
        <div class="col-demo" ng-click="gotoAir();">
            <a><img src='<?php echo base_url("jiudian_img/jipiao_new.png"); ?>' style=""><br/><span class="font">机票</span></a>
        </div>
      </div>
      <div class="col" style="padding: 0">
        <div class="col-demo" ng-click="gotoTrain();" >
              <a><img src='<?php echo base_url("jiudian_img/huochepiao_new.png"); ?>' style=""><br/><span class="font">火车票</span></a>
        </div>
      </div>
      <div class="col" style="padding: 0">
        <div class="col-demo" ng-click="gotoJiudian();">
            <a><img src='<?php echo base_url("jiudian_img/jiudian_new.png"); ?>' style="" ><br/><span class="font">酒店客栈</span></a>
        </div>
      </div>
      <div class="col" style="padding: 0">
          <div class="col-demo" ng-click="gotouser();">
		  <a><img src='<?php echo base_url("jiudian_img/wode_new.png"); ?>' style=""><br/><span class="font">我的</span></a>
          </div>
      </div>
    </div>


    <!-- 旅行优势、各国签证...-->

        <div class="row" style=" padding:3px 0 3px; background: white; margin-top: 0; overflow: hidden;">
          <div class="col" id="col_1" >
              <a ng-click="goto_bibiyoushi()"><img src='<?php echo base_url("jiudian_img/bibiyoushi_1.png"); ?>'class="travel_img"  id="img_1"></a>
          </div>

          <div class="col" id="col_2">
              <a ng-click="goto_dingpiaozhinan()"><img src='<?php echo base_url("jiudian_img/bibiyoushi_2.png"); ?>' class="travel_img"></a>
          </div>

          <div class="col" id="col_3" style="margin:0; padding: 0;">
            <a ng-click="goto_hezuohuoban()"><img src='<?php echo base_url("jiudian_img/bibiyoushi_3.png"); ?>' class="travel_img"></a>
          </div>
        </div>

    <div style="width: 100%;  background: #efefef; overflow: hidden; padding: 10px 0;margin-top: 4px; position: relative;">
        <div style=" width: 100%; font-family: 黑体; font-size: 1.4rem; top:-2px; z-index:99;
		color: #333333; margin-bottom: 5px; padding-left: 10px; position: absolute;">
            <a href="http://www.tianjin-air.com/travelnotice/transportation/index.html#demesticTransport" style="font-size: 1.2rem; color: #df1d25;">
			严格执行天津航空公司运输标准</a>
        </div>
		<img src='<?php echo base_url("jiudian_img/bibi_footer.jpg"); ?>' style="width: 100%; margin-top: -8px; position: relative;">
    </div>
    
    <div style=" height: 40px; background: rgb(230, 230, 230) none repeat scroll 0% 0%;" >
        <div class="row" style="color: rgba(0, 0, 0, 0.5); font-size: 1rem;">
            <div class="col col-20"></div>
            <div class="col">&copy;&nbsp;比比旅行</div>
            <div class="col col-50">粤ICP备13042645号<span style="padding-left: 5px;"></span></div>
        </div>
    </div>
	
  </ion-content>
</ion-view>










