<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;

    }
    .addrtn:before{
    	line-height: 32px !important;
    }
</style>
	<ion-header-bar align-title="center" class="bar-positive">
		<div class="buttons" ui-sref="tab.passengerTrain">
		  <button class="button icon-left ion-chevron-left button-clear addrtn"  >返回</button>
		</div>
		<h1 class="title" ng-bind="disable.identityType ? '编辑乘车人' : '新增乘车人'">新增乘车人</h1>
		<div class="buttons">
		   <button class="button button-clear" ng-click="saveUserContact(!disable.identityType)">确定</button> 
		</div>
	</ion-header-bar>
	<ion-content has-subheader="false" class="addPassenger">

		    <div class="type">

		        <div class="row">

		            <div class="column">

		                <label for="isAdult" class="df-c-c-r">

		                    <input type="radio" name="passengerType" value="0" id="isAdult" ng-checked="userContact.ticket_type ==0" ng-model="userContact.ticket_type">

		                    <i></i><span>成人</span>

		                </label>

		            </div>

		            <div class="column">

		                <label for="isChild" class="df-c-c-r">

		                    <input type="radio" name="passengerType" value="1" id="isChild" ng-checked="userContact.ticket_type ==1" ng-model="userContact.ticket_type">

		                    <i></i><span>儿童</span>

		                </label>

		            </div>

		        </div>

		    </div>

		    <div class="passengerInfo">

		        <div class="row">

		            <div class="column df-s-c-r"><span>姓名</span><i ng-click="passengerName($event)">?</i></div>

		            <div class="column">

		                <input type="text" ng-model="userContact.user_name" maxlength="26">

		            </div>

		        </div>



		        <div class="row">

		            <div class="column">证件类型</div>

		            <div class="column">

		                <input type="text" id="cardTypeValue" readonly="readonly" ng-model="userContact.ids_type">



		                <select class="cardType" id="cardType" ng-model="userContact.ids_type"  ng-disabled="disable.identityType">

		                    <option value="请选择">请选择</option>

		                    <option ng-repeat="x in identitys | orderBy:'sortId'" value="{{x.Name}}">{{x.Name}}</option>

		                </select>



		                <i></i>

		            </div>

		        </div>

		        <div class="row">

		            <div class="column">证件号码</div>

		            <div class="column">

		                <input type="text" ng-model="userContact.user_ids" maxlength="18">

		            </div>

		        </div>

<!-- 		        <div class="row" ng-style="myStyle.birthday">

		            <div class="column">出生日期</div>

		            <div class="column">

		                <input type="text" id="inputpdate" placeholder="请输入出生日期(格式:2000-01-01)" ng-model="userContact.chushengriqi">

		            </div>

		        </div> -->

		        <div id="datePlugin"></div>

		    </div>
		   <!-- <button class="button button-full button-positive" ng-click="saveUserContact(!disable.identityType)">确定</button>-->
		    <ion-checkbox ng-model="isShow" ng-change="pushNotificationChange(isShow)" ng-init="isShow=true">提示</ion-checkbox>

		    <div class="prompt" ng-show="isShow">

<!-- 		        <p class="title">

		            提示：

		        </p> -->

		        <p>

		            1. 购买火车票时可使用的有效身份证件为：居民身份证、 港澳居民来往内地通行证、台湾居民来往大陆通行证、 按规定可使用的有效护照这四种。

		        </p>

		        <p>

		            2. 身高在1.2米-1.5米之间的儿童需购买儿童票，但必须 与成人票一起下单。购票时使用同行成人证件购票并凭此 证件取票，无需填写儿童的证件号码。因为儿童票票价计 算复杂，因此购票时暂收成人票价。购票后如有差价，将 在出票后3个工作日内退回至您的原支付账户。

		        </p>

		        <p>

		            3. 每名成年乘客可免费携带1名身高不足1.2米的儿童。 如果一位成年乘客携带1名以上不足1.2米的儿童，多出的 儿童即使身高不足1.2米也需要购买儿童票。

		        </p>

		        <p>

		            4. 有其他特殊要求请拨打客服电话 <a href="tel:400-991-7909">400-991-7909</a> 咨询。

		        </p>

		    </div>

	</ion-content>

<!-- 浮动框增加样式 -->
<style type="text/css">
    ion-popover-view.passengerName {
        top:0 !important;
        left:0 !important;
        right:0 !important;
        bottom: 0 !important;
        width:80% !important;
        margin: auto !important;

        
    }
</style>
<!--  乘客姓名提醒浮动框 -->
<script id="templates/passengerName.html" type="text/ng-template">
      <ion-popover-view class="passengerName" >
        <ion-header-bar align-title="left" class="bar-light">
          <h1 class="title">购买火车票的姓名填写说明：</h1>
        </ion-header-bar>
        <ion-content >

        <div class="content">

            <p>1.乘客姓名与证件号码必须与乘车时所使用证件上的名字和号码一致，如有中文名，请填写中文名。</p>

            <p>2.含生僻字的中文姓名，生僻字及其后面的的汉字请用拼音代替，例如：“张俧大”的填写格式为“张zhida”。</p>

            <p>3.姓名最多输入不超过30个字符（1个汉字计为2个字符），如果超过30个字符，请按姓名中第一个汉字或英文字符开始按顺序连续输入30个字符（空格字符不输入）。</p>

            <p>4.姓名中有”.”或”?”时，请仔细辩析身份证原件上的”.”或”?”，准确输入。</p>

        </div>
        </ion-content>
      </ion-popover-view>
</script>
</ion-view>
