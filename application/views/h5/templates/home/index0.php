<ion-view view-title="比比旅行">
	<ion-nav-title>
		<img src='<?php echo base_url("resources/air/image/ic_logo.png"); ?>' class="main-title" />
	</ion-nav-title>
	<ion-content class="main-content">
		<!-- 轮播图 -->
			<ion-slide-box class="banner" does-continue="true" auto-play="true">
				<ion-slide ng-repeat="bannerItem in bannerData">
					<img ng-src="{{bannerItem.imgUrl}}"/>
				</ion-slide>
			</ion-slide-box>
		<!--轮播结束-->
		<div class="typeChooseBox">
			<div ng-class="{'active': selectItem==0}" ng-click="changeAction(0)">
				<p>
					<span>单程</span>
				</p>
			</div>
			<div ng-class="{'active': selectItem==1}" ng-click="changeAction(1)">
				<p>
					<span>往返</span>
				</p>
			</div>
		</div>
		<section class="placeSection">
			<div class="placeBox">
				<div class="startBox left f1">
					<p>
						<img src='<?php echo base_url("resources/air/image/airplane.png"); ?>' alt="" />
						<span>出发地</span>
					</p>
					<h2 class="startData"  ng-click="placeAction(0)">{{initStart}}</h2>
				</div>
				<div class="endBox right f1">
					<p>
						<img src='<?php echo base_url("resources/air/image/airplane2.png"); ?>' alt="" />
						<span>目的地</span>
						
					</p>
					<h2 class="endData" ng-click="placeAction(1)">{{initEnd}}</h2>
				</div>
				<div class="clear"></div>
				<div class="changeLog">
					<img src='<?php echo base_url("resources/air/image/changeLog.png"); ?>' alt="" ng-click="rotateChange()"/>
				</div>
			</div>
		</section>
		<section class="placeBox dataBox">
		
				<p>出发时间</p>
		
				<div>
					<input type="text" name="USER_AGE" id="USER_AGE" readonly class="input" value="{{currentData}}" />
				</div>
    
  		</section>
  		<div class="btnBox">
  			<button class="button button-full button-assertive myAction" ng-click="gotoDetail()">
			  查询
			</button>
  		</div>
		<footer>
			<div class="footerBox left">
				<i><img src='<?php echo base_url("resources/air/image/ic_ticket.png"); ?>' alt="" /></i>
				<span>全球机票</span>
			</div>
			<div class="footerBox left">
				<i><img src='<?php echo base_url("resources/air/image/ic_price.png"); ?>' alt="" /></i>
				<span>含税价格</span>
			</div>
			<div class="footerBox left">
				<i><img src='<?php echo base_url("resources/air/image/ic_certification.png"); ?>' alt="" /></i>
				<span>航协认证</span>
			</div>
			<div class="footerBox left">
				<i><img src='<?php echo base_url("resources/air/image/ic_ensure.png"); ?>' alt="" /></i>
				<span>出票保障</span>
			</div>
			<div class="clear"></div>
		</footer>	
		<div class="company">
			<img src='<?php echo base_url("resources/air/image/bibi_end.png"); ?>' alt="" />
		</div>
		
	</ion-content>
</ion-view>