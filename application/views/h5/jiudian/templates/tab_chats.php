<ion-view title="超级特价酒店">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtoHotelhomes()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">超级特价酒店</h1>
    </ion-header-bar>

    <style type="text/css">
        .tejia img:first-child{
            position: absolute;
            top: 0px;
            left: 0px;
            max-width: 100px;
            max-height: 123px;
            width: 100%;
            height: 100%;
        }
    </style>
    <ion-content style="background-color: #efefef;">
	   <div style="margin-top:35%; text-align: center" >
          <p style="color:#777777;line-height: 1.2rem;font-size: 1.2rem;font-family: SimHei;width: 100%">目前还没有特价酒店哦</p>
          <span style="color:#777777;line-height: 35px;font-size: 1.2rem;font-family: SimHei;width: 100%">去看看其他房源吧</span>
          <br><img src="<?php echo base_url("jiudian_img/chaxun.png"); ?>" style="width:50%">
      </div>
        <div style="margin-top:10px; display: none;" >
            <a class="item item-thumbnail-left tejia"  style="line-height: 14.6px; padding-left: 110px; border-top:0;margin-bottom: 1px;">
                <img src="<?php echo base_url("jiudian_img/ben.png"); ?>" >
                <p style="font-family: 黑体; font-size: 16px;color: black;" >深圳百合酒店</p>
                <p style="margin-top:5px;"><span style="font-size: 17px; color: #49d3dd;"> 4.2分</span>
                    &nbsp;<span style="color: #8d8d8d; ">789人点评</span>         
                </p>
                <p>
                    <span style="font-size: 12px; color: #8d8d8d; " >距您<100米 华强商圈</span>
                </p>
                <p style="color: #ffcc33; font-size: 12px; ">
                    最低价房型已省16%
                    <span style="color: #cccccc; text-decoration:line-through; font-size: 14px; position: absolute; right:15px;">￥234</span>
                </p>
                <p style="color: #00ff99; font-size: 12px; ">
                    最新预定：1天前
                    <span style="color: #fc721a; font-size: 15px; position: absolute; right:15px;">￥123<span style="color: #8d8d8d; font-size: 12px;">起</span></span>
                </p>              
            </a>          
        </div>     
        
    </ion-content>	
</ion-view>
