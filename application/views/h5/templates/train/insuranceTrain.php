<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }
</style>
	<ion-header-bar align-title="center" class="bar-positive">
		<div class="buttons">
		  <button class="button icon-left ion-chevron-left button-clear"  ui-sref="tab.trainOrder">返回</button>
		</div>
		<h1 class="title">选择套餐类型</h1>
	</ion-header-bar>
	<ion-content has-subheader="false" class="chooseSetMeal">

		    <div class="row" ng-repeat="x in insuranceList">
		        <label for="setMealType{{$index}}" ng-click="selectedInsurance(x)" style="width: 100%;">
		            <div class="column">
		                <p class="title" ng-bind="x.title">优先出票套餐</p>
		                <ul>
		                    <li ng-repeat="y in x.contents" ng-bind="y.content"></li>
		                </ul>
		            </div>

		            <div class="column df-c-c-r">

		                <input type="checkbox" name="setMealType" id="setMealType{{$index}}" ng-checked="x.chk" ng-model="x.chk">

		                <i></i>

		            </div>

		        </label>

		    </div>
		    

		    <p class="prompt">提示: 儿童票无法购买保险，但是也无需支付套餐费用。</p>

		    <span class="confirmBtn" ng-click="selConfirmInsurance(true)">
		        确定
		    </span>

	</ion-content>
</ion-view>