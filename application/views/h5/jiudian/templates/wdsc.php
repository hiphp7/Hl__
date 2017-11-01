<ion-view title="我的收藏">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtoHotels()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white;">我的收藏</h1>

    </ion-header-bar>
    <style type="text/css">
        .shoucang img:first-child{
            position: absolute;
            top: 0px;
            left: 0px;
            max-width: 100px;
            max-height: 126px;
            width: 100%;
            height: 100%;
        }
    </style>
    <ion-content overflow-scroll="true" style="background-color: #efefef; overflow:auto;" >

        <div class="list" style="margin-bottom:0; height: 30px;">
          <a class="item item-icon-right" ng-click="goto_all_city()" style=" padding: 5px; font-size: 1.09rem;">
              <span ng-bind="cityname"></span>       
          <i class="icon ion-ios-arrow-right" style="font-size: 1.7rem; right: 0px;"></i>
        </a>
        </div>
        <div ng-repeat="shoucang in collection">
            <div class='{{shoucang.city}} all_collection'>
            <a class="item item-thumbnail-left shoucang"  style="line-height: 18px; "  ng-click="goto_hoteldetail_2('{{shoucang}}')">
                <img ng-src="{{shoucang.thumbnailId}}" >
                <p style="font-family: 黑体; font-size: 14px;color: black;"  ng-bind='shoucang.name'></p>
                <p><span style="font-size: 15px; color: #49d3dd;">{{shoucang.commentScore}}分</span>
                    &nbsp;<span style="color: #8d8d8d; ">789人点评</span>         
                </p>
                <p>
                    <span style="font-size: 12px; color: #8d8d8d; " ng-bind="shoucang.category | xingji"></span>
                </p>
                <p style="color: #8d8d8d; font-size: 12px; ">{{shoucang.address}}</p>
                <span style="color: #fc721a; font-size: 15px; float: right;">￥{{shoucang.hotelPrice}}<span style="color: #8d8d8d; font-size: 12px;"></span></span>
            </a>
            </div>    
        </div>       


    </ion-content>	
</ion-view>
