<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }
    .addAddress {
        width: 100%;
        height: auto;
        background-color: #f6f6f6;

    }

    .addAddress .rows{
        padding: 0 0.75rem;
        width: 100%;
        height: 3rem;
        padding-bottom: 1px;
        background-color: #fff;
        float: left;
        border-bottom: 1px solid  #ededed;
        margin-bottom: 1px;
    }

    .addAddress .rows:nth-of-type(1){
        margin-top: 0.5rem;
    }

    .addAddress .rows .column{
        height: 3rem;
        float: left;
        text-align: left;
    }

    .addAddress .rows .column:nth-of-type(1){
        width: 30%;
        font-size: 1.3rem;
        color: #797979;
    }

    .addAddress .rows .column:nth-of-type(2){
        width: 70%;
        font-size: 1.2rem;
    }

    .addAddress .rows .column:nth-of-type(2) input{
        border: 0;
        width: 100%;
        height: 2.5rem;
        margin: 0.05rem 0;
        float: left;
        font-size: 1.3rem;
    }

    .addAddress .rows:last-of-type{
        height: 3.1rem;
    }

    .addAddress .rows:last-of-type .column:nth-of-type(1){
        line-height: 3.1rem;
    }

    .addAddress .rows:last-of-type .column{
          height: 3rem;
    }

    .addAddress .rows:last-of-type .column:nth-of-type(2) textarea{
        resize: none;
        width:100%;
        line-height: 1.3rem;
        height: 3rem;
        border: 0px;
        margin: 0.05rem 0;
        color: #34353a;
        display: block;
        font-size: 1.2rem;
    }

</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="buttons" ui-sref="tab.addressTrain">
          <button class="button icon-left ion-chevron-left button-clear"  >返回</button>
        </div>
        <h1 class="title"><span ng-bind="title"></span>收件地址</h1>
        <div class="buttons">
          <button class="button button-clear" ng-click="saveAddress(!disable.isEdit)">确定</button>
        </div> 
    </ion-header-bar>
    <ion-content has-subheader="false" class="addAddress">
        <div >

            <div class="rows">

                <div class="column df-s-c-r">姓名</div>

                <div class="column">

                    <input type="text" ng-model="address.bx_invoice_receiver" maxlength="50">

                </div>

            </div>

            <div class="rows">

                <div class="column df-s-c-r">手机号</div>

                <div class="column">

                    <input type="tel" ng-model="address.bx_invoice_phone" maxlength="11">

                </div>

            </div>

            <div class="rows">

                <div class="column df-s-c-r">邮政编码</div>

                <div class="column">

                    <input type="tel" ng-model="address.bx_invoice_zipcode" maxlength="6">

                </div>

            </div>

            <div class="rows">

                <div class="column df-s-c-r">收件地址</div>

                <div class="column">

                    <textarea ng-model="address.bx_invoice_address" style="font-size:0.64rem;font-family: 'Microsoft YaHei';" maxlength="50"></textarea>

                </div>

            </div>

        </div>
        <!--<button class="button button-full button-positive" ng-click="saveAddress(!disable.isEdit)">确定</button>-->
    </ion-content>
</ion-view>