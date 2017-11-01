<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }
</style>
	<ion-header-bar align-title="center" class="bar-positive">
		<div class="buttons">
		  <button class="button icon-left ion-chevron-left button-clear" ng-click="selConfirmAddress(false)" >返回</button>
		</div>
		<h1 class="title">是否需要发票</h1>
	</ion-header-bar>
	<ion-content has-subheader="false" class="isNeedInvoice">
	    <div class="choose">

	        <div class="rows">

	            <label for="chk_false">

	                <div class="column">

	                    <span>不需要发票</span>

	                </div>

	                <div class="column df-c-c-r">

	                    <input type="radio" id="chk_false" name="needInvoice" value=false ng-checked="mail.isMail ==false" ng-model="mail.isMail" ng-click="checkedMail(false)">

	                    <i></i>

	                </div>

	            </label>

	        </div>

	        <div class="rows">

	            <label for="chk_true">

	                <div class="column">

	                    <span>邮寄发票</span>

	                </div>

	                <div class="column df-c-c-r">

	                    <input type="radio" id="chk_true" name="needInvoice" value=true ng-checked="mail.isMail == true" ng-model="mail.isMail" ng-click="checkedMail(true)">

	                    <i></i>

	                </div>

	            </label>

	        </div>

	    </div>

	    <div class="address" ng-style="myStyle.displayAddress">

	        <div class="row">

	            <div class="column df-s-c-r fg1"><span>发票金额</span><span><i style="display:none">￥</i><span ng-bind="insurance.price | currency:'￥'">20</span></span></div>

	        </div>

	        <div class="row">

	            <div class="column df-s-c-r fg1">

	                <span>收件人</span><span ng-bind="mail.bx_invoice_receiver"></span>

	            </div>

	        </div>

	        <div class="row">

	            <div class="column df-s-c-r fg1">

	                <span>联系电话</span>

	                <span ng-bind="mail.bx_invoice_phone"></span>

	            </div>

	        </div>

	        <div class="row">

	            <div class="column df-s-c-r fg1"><span>邮政编码</span><span ng-bind="mail.bx_invoice_zipcode"></span></div>

	        </div>

	        <div class="row" ng-click="changeAddress(true)">

	            <div class="column df-s-c-r fg1"><span>收件地址</span><span ng-bind="mail.bx_invoice_address"></span></div>

	        </div>

	    </div>

	    <div class="remark">
	        <p>1.纸质火车票可以直接作为报销凭据，因此邮寄的发票针对的是套餐内除车票外的产品。</p>
	        <p>2.发票将在出行后7个工作日内寄出</p>
	    </div>

	    <span class="confirmBtn" ng-click="selConfirmAddress(true)">
	        确定
	    </span>

	</ion-content>
</ion-view>