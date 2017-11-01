<ion-view title="浏览历史">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtoHotels()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white;">浏览历史</h1>
		<button class="button button-small" style="background-color: #49d3dd; width: 50px; margin-right: 8px; border: 0;" ng-click="clear_history();">
          <span style="color: white; font-family: 黑体; font-size: 14px;">清空</span>
        </button>
    </ion-header-bar>

    <style type="text/css">
        .shoucang img:first-child{
            position: absolute;
            top: 2px;
            left: 0px;
            max-width: 100px;
            max-height: 120px;
            width: 100%;
            height: 100%;
        }
    </style>
    <ion-content overflow-scroll="true" style="background-color: #efefef; overflow:auto;" >

        <div  ng-repeat="riqi in liulan | orderBy:riqi.date">
            <h6 ng-bind="riqi.date == jintian ? '今天': '{{riqi.date}}'" style="text-align: center;padding: 5px; color: #A7A1A1;"></h6>
            <div ng-repeat="hotels in liulan[$index].hotel_detail ">
                <a class="item item-thumbnail-left shoucang"  style="line-height: 18px; " ng-click="goto_hoteldetail('{{hotels}}')">
                <img ng-src="{{hotels.thumbnailId}}">
                <p style="font-family: 黑体; font-size: 16px;color: black;" ng-bind='hotels.name'></p>
                <p><span style="font-size: 15px; color: #49d3dd;">{{hotels.commentScore}}分</span>
                    &nbsp;<span class="calm ml_30" ng-bind='x.commentScore > 3.5 ? "好": "一般"'>好</span>  
                    <span style="font-size: 12px; color: #8d8d8d; " ng-bind="x.category | xingji"></span>
                </p>
                <p>
                   <span class="describe" ng-bind="hotels.description | cut:30:' ...'"></span>
                </p>
                <p style="color: #8d8d8d; font-size: 12px; ">{{x.address}}</p>
                <span style="color: #fc721a; font-size: 15px; float: right;">￥{{hotels.hotelPrice}}<span style="color: #8d8d8d; font-size: 12px;"></span></span>
            </a>
            </div>    
        </div>       

    </ion-content>	
</ion-view>
