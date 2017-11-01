<ion-view title="图片展示">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtoHotels()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">图片展示</h1>
    </ion-header-bar>
    <ion-content style="background-color: #efefef;" >
   
    <div  style="padding: 0; width: 100%; padding-top: 5px;">      
      <div class="list" style="width: 48%;float: left;margin: 0; padding: 0; margin-left: 1.3%;"
           ng-repeat="image in hotelDetailImages">
          <a ng-click="tupian($index)"><img ng-src="{{image.location}}" style="width: 100%"></a>
      </div>  
    </div>
        
    </ion-content>	
</ion-view>
