<ion-view title="图片展示" style="background: black;">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: black;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backto_showimg()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white"><span ng-bind="page_num">1</span>/<span ng-bind="page_count"></span></h1>
    </ion-header-bar>

	<div style="  position: relative; top:50%;  transform:translateY(-50%);">
        <ion-slide-box slide-interval="5000" show-pager="false" active-slide="myActiveSlide" on-release="onRelease()">      
            <ion-slide ng-repeat="image in hotelDetailImages">    
                <div class="slide_box_img">
                    <img ng-src='{{image.location}}' style="width:100%;height:250px">
                </div>     
            </ion-slide>         
        </ion-slide-box> 
	</div>

</ion-view>
