<ion-view view-title="比比旅行">
	<ion-content class="prodetailContent">
		<ion-list>
			
			<a class="proItem item" ng-repeat="proItems in proData" href="#">
				<div class="infoBox">
					<span class="left">
						<p>{{proItems.dep_time}}</p>
						<p>{{proItems.dep}}</p>
					</span>
					<span class="left">
						<img src="images/fuch_bix_01.png" alt="" />
					</span>
					<span class="left">
						<p>{{proItems.arr_time}}</p>
						<p>{{proItems.arr}}</p>
					</span>
					<div class="clear"></div>
					<p>
						<img src="images/CZ.png" alt="" />
						<i>{{proItems.name}}</i>
					</p>
				</div>
				<div class="priceBox">
					<p><i>¥</i><i class="price">{{proItems.price}}</i>起</p>
					<p>4.3折</p>
				</div>
			</a>
		</ion-list>
	</ion-content>
</ion-view>