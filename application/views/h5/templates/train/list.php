
<ion-view view-title="比比旅行" class='trainList' >
	<ion-header-bar  class="bar-positive" >

	<a class="button icon-left ion-ios-arrow-left button-clear" ui-sref="tab.train">返回</a>
	<span class="title"><span  ng-bind="search.current.depStation"></span><i></i><span ng-bind="search.current.arrStation"></span></span>

	<a class="button icon-right  button-clear "  ng-click="getSearchList(true)">查返程</a>
	</ion-header-bar>
	<ion-header-bar align-title="center" class="bar-subheader"  ng-style="display.head" style="display:none;">
	    <div class="trainMenu" >

	        <ul>

	            <li class="df-s-c-r"><i></i><span ng-click="dateChange(y, -1)" ng-class="loadColor(-1)">前一天</span></li>

	            <li class="df-c-c-r"><i></i></li>

	            <li class="databutBix df-c-c-r "  style="width: 30%" ng-click="selectDate(2)"><span ng-bind="search.date| date:'MM-dd '"></span><span ng-bind="search.week"></span></li>

	            <li class="df-c-c-r"><i></i></li>

	            <li class="df-e-c-r" style="float:right;width: 30%"><span ng-click="dateChange(y, +1)" ng-class="loadColor(+1)">后一天</span><i></i></li>

	        </ul>

	    </div>
	</ion-header-bar>
	<style type="text/css">
/*			.platform-ios.platform-cordova:not(.fullscreen) .has-subheader{
				top:88px;
			}*/
			.df-c-c-c img{
				 background: url('<?php echo base_url("resources/air/image/shi.png"); ?>') no-repeat;
				 background-size: contain;
				 width: 1.3rem;
				 height: 1.3rem;
				 margin-right: 5px;
				 margin-top: 2px;
			}
			.changeColor{
				color: white !important;
				
			}
			.bar .button.button-clear .icon:before, .bar .button.button-clear.icon-left:before, .bar .button.button-clear.icon-right:before, .bar .button.button-clear.icon:before, .bar button.button-clear .icon:before, .bar button.button-clear.icon-left:before, .bar button.button-clear.icon-right:before, .bar button.button-clear.icon:before{
	        font-size: 2rem;
	        line-height: 29px;
    		}
	</style>

	<ion-content has-subheader="true" style="background:#f6f6f6;">

	<div class="center" style="margin-top: 0rem">
	    <ul class="list" ng-style="myStyle.loadfinish" style="display:none; margin-top: 0.4rem" ng-if="display.central == 'loadfinish'">
	        <li ng-repeat="x in trainList |orderBy:sortBy:sortDesc" ng-if="x.seatList.length >0">
	            <div class="baseInfo" ng-click="baseInfo($event);changeColor();">
	                <div class="column df-c-c-c"style="width: 20%;">
						
						<span class="time" ng-bind="x.from_time"></span>
	                    
	                    <span class="time" ng-bind="x.arrive_time" style="font-weight: normal;"></span>

	                </div>



	                <div class="column df-c-c-c">
	                	<div style="display: flex;width: 90px;margin-bottom: 10px">
							<img ng-src='<?php echo base_url("resources/air/image/shi.png"); ?>'/>
							<span class="city" ng-bind="x.from_station"></span>
						</div>
						<div style="display: flex;width: 90px;">
							<img ng-src='<?php echo base_url("resources/air/image/zhong.png"); ?>'  />
	                    	<span class="city" ng-bind="x.arrive_station"></span>
						</div>
	                    

	                </div>
					
					<div class="column df-c-c-c">

	                    <span class="content" style="text-align: right;">

	                        <span class="trains" ng-bind="x.train_code + '次'" style="height: 2.5rem;line-height: 2.5rem;"></span>

	                    

	                    <span class="time" ng-bind="x.costtime" style="font-size: 1rem;height: 2.5rem;line-height: 2.5rem;"></span>

	                    </span>

	                </div>
	                <div class="column df-c-c-c"style="float: right;">

	                    <span class="money" style="font-size: 1rem;height: 2.5rem;line-height: 2.5rem;"><i>￥</i><span ng-bind="x.lowerprice.price"></span></span>
	                    <span class="" style="font-size: 1rem;height: 2.5rem;line-height: 2.5rem;"><i></i><span ng-bind="x.lowerprice.typeName+( x.lowerprice.count != 0 ?  x.lowerprice.count +'张' : '无票')"></span></span>
	                   
						
	                </div>

	            </div>

	            <div class="simpleInfo {{className}}" style="display: none;">

	                <!--number 余票 money价格   -->

	                <div class="column df-c-c-r" ng-class="y.count == 0 ? 'c999':''" ng-repeat="y in x.seatList | limitTo: 4 |orderBy:typeId:desc">

	                    <span class="name" ng-bind="y.typeName"></span>

	                    <span class="number"><span ng-bind="y.count"></span><span>张</span></span>

	                    <span class="money"><i>￥</i><span ng-bind="moneyFormat(y.price)"></span></span>

	                </div>

	            </div>

	            <div class="detailInfo" style="display: none;">

	                <div class="row" ng-click="getTimeList(x)">

	                    <div class="column">列车时刻表</div>

	                </div>

	                <div class="row" ng-repeat="y in x.seatList" style="margin-top:0px">

	                    <ul>

	                        <li class="df-s-c-r" ng-bind="y.typeName"></li>

	                        <li class="df-c-c-r"><i>￥</i><span ng-bind="moneyFormat(y.price)"></span></li>

	                        <li class="df-c-c-r {{y.count < 10 && y.count > 0 ? 'marked' : ''}}">

	                            <!-- marked:红色   -->

	                            <span ng-if="y.count >= 10"><span ng-bind="y.count"></span><span>张</span></span>

	                            <span ng-if="y.count < 10 && y.count > 0">仅剩<span ng-bind="y.count"></span><span>张</span></span>

	                            <span ng-if="y.count == 0">无票</span>

	                        </li>

	                        <li class="df-e-c-r" ng-if="y.count >0"><span ng-click="reserve(x, y)">预订</span></li>

	                    </ul>

	                </div>

	            </div>

	        </li>

	    </ul>
	    <!--  查询没有数据时显示  -->

	    <section class="ticketQueryNoData" ng-style="myStyle.loadfinish" ng-if="display.central == 'loadempty'">

	        <div class="usrbox zoom05 df-c-c-r">ng-src='<?php echo base_url("resources/train/images/popupImg.png"); ?>' alt=""></div>

	        <p><span ng-bind="errMsg"></span>

	            <br />请更换条件重新查询。</p>

	        <a ng-click="gotoTrainHome();" class="dp_b nsjah_a f_s16 text_a_c">确认</a>

	    </section>

	    <!--  查询没有数据时显示  -->
	    <!--  查询出错时显示  -->

	    <section class="ticketQueryFailure" ng-style="myStyle.loadfinish" ng-if="display.central == 'loaderr'">

	        <div class="usrbox zoom05"><img ng-src='<?php echo base_url("resources/train/images/popupImg.png"); ?>' alt=""></div>

	        <p>网络通讯出错，请重新查询。</p>

	        <a href="javascript:void(0);" ng-click="getSearchList(false)">确认</a>

	    </section>

	    <!--  查询出错时显示  -->
	    <!--  筛选没有数据时显示  -->

	    <section class="ticketQueryNoData" ng-style="myStyle.loadfinish" ng-if="display.central == 'screenEmpty'">

	        <div class="usrbox zoom05"></div>

	        <p>

	            <span ng-bind="errMsg"></span>

	        </p>

	    </section>
	    <!--  筛选没有数据时显示  -->

	    <div class="loadingT" ng-style="myStyle.loading" ng-if="display.central == 'loading'" >

	        <div class="load load-animation">

	            <span class="imgBg imgBg-animation">



	               <img ng-src='<?php echo base_url("resources/train/images/bg_picture.jpg"); ?>'  alt="" class="bgImg bgImg-animation">

	               <img ng-src='<?php echo base_url("resources/train/images/ic_railway.png"); ?>'  alt="" class="rail rail-animation">

	               <img ng-src='<?php echo base_url("resources/train/images/ic_train.png"); ?>'  alt="" class="train train-animation">

	               <div class="bottomBg"></div>

	           </span>

	        </div>

	    </div>

	</div>
		
	</ion-content>
	<ion-footer-bar align-title="left" class=" foot" style="background-color: #5B6B8;display:none;padding:0;" ng-style="myStyle.loadfinish" ng-show="display.foot">
            <!-- <div class="foot" style="display:block;" ng-style="myStyle.loadfinish" ng-show="display.foot || 1==1"> -->

                <ul>

                    <li>

                        <a href="javascript:void(0);" class="df-c-c-c" ng-click="shaixuan.show()">

                            <span><i></i></span>

                            <span>筛选</span>

                        </a>

                    </li>

                    <li class="{{depTimeClass}}" ng-click="listSort('depTimeClass')">

                        <!-- up从早到晚 down从晚到早 -->

                        <a href="javascript:void(0);" class="df-c-c-c">

                            <span><i></i></span>

                            <span>时间从早到晚</span>

                        </a>

                    </li>

                    <li class="{{costTimeClass}}" ng-click="listSort('costTimeClass')">

                        <a href="javascript:void(0);" class="df-c-c-c">

                            <span><i></i></span>

                            <span>耗时</span>

                        </a>

                    </li>

                  <!-- <li class="{{moneyClassName}}" ng-click="switchDisplay(className)">
					
                         number 显示余票 money显示价格 

                        <a href="javascript:void(0);" class="df-c-c-c">

                            <span><i></i></span>

                            <span ng-bind="textName">价格</span>

                        </a>

                    </li>
					-->
                </ul>

            <!-- </div> -->

	</ion-footer-bar>
    <script id="templates/shaixuan.html" type="text/ng-template">
      <ion-modal-view style="top:25%;width: 100%;left: 0px;height: 50%;">
        <ion-header-bar class="bar bar-header bar-positive" style="background: #5a6b84;height: 4rem;line-height: 4rem;padding:0;">

            <a class="button icon-left  button-clear " style="margin-left: 5%;width: 15%;text-align: left;line-height: 4rem;font-size: 1.3rem !important;top:0px" ng-click="searchfilter(false)">取消</a>
            <span class="title" style="line-height: 4rem;font-size: 1.3rem !important">选择筛选条件</span>

            <a class="button icon-right  button-clear " style="color:#fff;margin-right: 5%;width: 15%;text-align: right;line-height: 4rem;font-size: 1.3rem !important;top:0px" ng-click="searchfilter(true)">确定</a>
        </ion-header-bar>
        <ion-content class="padding" style="top: 2.6rem;">

			<div> 
                <ul class="shanxuan" style="width: 88%;margin-left: 6%;">

                    <li style="width: 100%;">

                        <p class="title">

                            <i></i>

                            <span>车型选择</span>

                        </p>

                        <ul>

                            <li ng-repeat="x in trainTypeList">

                                <label for="chk-type-{{$index}}">

                                    <span ng-bind="x.name"></span>

                                    <input type="checkbox" id="chk-type-{{$index}}" ng-model="x.chk" ng-click="chkTrainType(false)"><i></i>

                                </label>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <p class="title" style="margin: 20px,0">

                            <i></i>

                            <span>出发时间</span>

                        </p>

                        <ul>

                            <li ng-repeat="x in timelist  | orderBy:'id':false ">

                                <label for="chk-time-{{$index}}">

                                    <span ng-bind="x.bt + '-' + x.et"></span>

                                    <input type="checkbox" id="chk-time-{{$index}}" ng-model="x.chk" ng-click="chkTime(false)"><i></i>

                                </label>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <p class="title">

                            <i></i>

                            <span>出发/到达车站</span>

                        </p>

                        <ul>

                            <li ng-repeat="x in stationList |orderBy:'type':true">

                                <label for="chk-station-{{$index}}">

                                    <span ng-bind="x.station"></span>

                                    <input type="checkbox" id="chk-station-{{$index}}" ng-model="x.chk" ng-click="chkStation(false)"><i></i>

                                </label>

                            </li>

                        </ul>

                    </li>

                </ul>

 
            </div>
        </ion-content>
      </ion-modal-view>

    </script>

    <script id="templates/trainTime.html" type="text/ng-template">
	    <ion-modal-view style="width: 100%;height: 100%;top:0px;left:0px">
	    <ion-header-bar align-title="center" class="bar-positive">
            <a class="button icon-left ion-chevron-left button-clear"  style="color:#fff;" ng-click="trainTime.hide()">返回</a>
	    	<span class="title">列车时刻表</span>
	    </ion-header-bar>
	    <ion-content has-subheader="false">
	    	

	    <div class="trainTime">

	    <div class="center">

	        <div class="trainTimeList">

	            <div class="title" ng-bind="timeList.train_code + '次 ' + timeList.time_list[0].name + '—' + timeList.time_list[timeList.time_list.length-1].name">

	            </div>

	            <div class="table">

	                <div class="tr">

	                    <div class="th">站名</div>

	                    <div class="th">到站时间</div>

	                    <div class="th">出发时间</div>

	                    <div class="th">停留时间</div>

	                </div>

	                <div class="tr" ng-repeat="x in timeList.time_list">

	                    <div class="td" ng-class="loadClass(x, 'station','sto_name')" ng-bind="x.name"></div>

	                    <div class="td" ng-class="loadClass(x, 'station','arr_time')" ng-bind="$first ? '---' : x.arrtime"></div>

	                    <div class="td" ng-class="loadClass(x, 'station','dep_time')" ng-bind="$last ? '---' : x.starttime"></div>

	                    <div class="td" ng-class="loadClass(x, 'station','sto_time')" ng-bind="($first || $last) ? x.interval : x.interval + '分钟'"></div>

	                </div>

	            </div>

	        </div>

	    </div>
		</div>	    	
	    </ion-content>
	    </ion-modal-view>
    </script>
	</ion-view>

