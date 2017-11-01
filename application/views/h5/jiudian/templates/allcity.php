<ion-view title="全部城市">
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtowdsc()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">全部城市</h1>
    </ion-header-bar>
	<ion-content style="background-color: #efefef;" >
	    <style type="text/css">
        .my_radio i {color: #49d3dd;}
        .my_radio {height: 40px;}
        .my_radio div div{height: 40px !important;  padding-top: 7px !important;}
        .my_radio div div span {font-size: 80% !important;}
        .my_radio i {padding-top: 5px !important; font-size: 20px !important; }
    </style>
		<div style="padding: 5px;">
		  <span style="font-size: 12px; color: #8d8d8d; font-family: 黑体;">您收藏的酒店包含以下城市</span>
		</div>

    	<ion-radio class="my_radio" ng-repeat="city in citys"
                   value="{{city.citycode}}"
                   ng-model="xuanze"
		   ng-click="choice_city('{{city.cityname}}','{{city.citycode}}')">
          {{city.cityname}}({{city.citynum}})
        </ion-radio>	
		
	</ion-content>	
</ion-view>
