<ion-view view-title="比比旅行">
    <style type="text/css">
        .fanhui::before{
            font-size: 27px!important;
            line-height: 28px!important;
        }
        .goright{
            background: url(./resources/air/image/gogo.png) no-repeat;
            width: 1.5rem;
            background-size: contain;
            height: 1.5rem;
            display: inline-block;
        }
        .prompt img{
            width: 1.5rem;
            padding-top: 5px;
        }
        .center .queryCondition .date .time{
            font-size: 2rem;
            padding-left: 1.2rem;
            line-height: 3rem;
        }
        .center .queryCondition .date .week{
            font-size: 2rem;
            color: black;
        }
		 .tabs-light>.tabs, .tabs.tabs-light {
            padding-top: 0px;
            border-color: #ddd;
            background-color: #fff;
            background-image: linear-gradient(0deg,#ddd,#FFF 50%,transparent 50%);
            color: #444;
        }
		.tab-item .icon{
			margin-top:6px;
            height: 24px;
        }
    </style>
    <ion-header-bar align-title="center" class="bar-positive" style="box-shadow: 1px 1px 4px #5E5E5E !important;">
                <button class="button icon-left ion-ios-arrow-left button-clear" style="color:white;" ng-click="backHome();">
                </button>
                <h3 class="title" style="line-height: 3.888888888888889rem;font-size: 1.7rem;">火车票</h3>        
    </ion-header-bar>
<ion-content has-subheader="false"  style="background:#f6f6f6;" >


       <img ng-src='<?php echo base_url("resources/train/images/fixbg.png"); ?>' style="width: 100%;height: auto;"/>
        <!-- <img ng-src="{{bannerItem.imgUrl}}"/> -->




    

<div class="center">
    <div class="queryCondition">

        <div class="city">

            <div class="start">

                <span class="prompt"><img ng-src='<?php echo base_url("resources/air/image/gohere.png"); ?>' style="margin-right: 5px;"/>出发地</span>

                <span class="cityName" ng-bind="search.current.depStation" ng-click="selectStation('left')">
                </span>

            </div>

            <div class="exchange df-c-c-r" >

                <span class="dif-c-c-r" ng-click="switchStation()"><i></i></span>

            </div>

            <div class="end">

                <span class="prompt"><img ng-src='<?php echo base_url("resources/air/image/arrihere.png"); ?>' style="width: 1.3rem;margin-right: 3px;"/>目的地</span>

                <span class="cityName" ng-bind="search.current.arrStation" ng-click="selectStation('right')">
                </span>

            </div>

        </div>

        <div class="date">
            
            <span class="prompt"><img ng-src='<?php echo base_url("resources/air/image/gogo.png"); ?>' /> 出发日期</span>
            
            <span class="time" ng-bind="search.date | date:'MM月dd日 '" ng-click="selectDate('left')"></span>

            <span class="week" ng-bind="search.week"></span>

        </div>

        <div class="isHighSpeedRail">

            <span style="line-height:3rem;margin-top:0;">只看高铁/动车</span>

            <input type="checkbox" ng-checked="search.only_GCD" ng-model="search.only_GCD">

            <span class="checkbox"></span>

        </div>

    </div>

    <span class="queryBtn" ng-click="trainSearch()">

        <i></i><span>查询</span>

    </span>
</div>
</ion-content>
<!-- <ion-footer-bar align-title="left" class="bar-assertive" style="background: url(./resources/air/image/footbg.png) no-repeat;background-size: cover;height: 7rem;">
    
</ion-footer-bar> -->
</ion-view>