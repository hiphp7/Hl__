<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }
    .chooseAddress {
        width: 100%;
        height: auto;
        background-color: #f6f6f6;
    }

    .chooseAddress .add{
        margin-top: 0.5rem;
        height: 3rem;
        width: 100%;
        text-align: center;
        border-top: 1px solid #eaeaeb;
        border-bottom: 1px solid #eaeaeb;
        color: #49D3DD;
        font-size: 1.3rem;
        background-color: #fff;
    }

    .chooseAddress .add i{
        height: 1.2rem;
        width: 1.25rem;
        border-radius: 100%;
        display: block;
        border: 1px solid #49D3DD;
        margin-right: 0.25rem;
        position: relative;
    }

    .chooseAddress .add i::before{
        content: '';
        position: absolute;
        width: 0.1rem;
        height: 0.8rem;
        background-color: #49D3DD;
        top: 0.125rem;
        left: 50%;
        margin-left: -0.05rem;
    }

    .chooseAddress .add i::after{
        content: '';
        position: absolute;
        width: 0.8rem;
        height: 0.1rem;
        background-color: #49D3DD;
        top: 50%;
        left: 50%;
        margin-top: -0.025rem;
        margin-left: -0.38rem;
    }

    .passenger .add span{
        display: block;
    }

    .chooseAddress .list{
        width: 100%;
        float: left;
        background-color: #fff;
    }

    .chooseAddress .list .row{
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ebebeb;
        float: left;
        position: relative;
    }

    .chooseAddress .list .row label{
        max-width: 85%;
        height: auto;
        float: left;
        overflow: hidden;
        clear: left;
    }

    .chooseAddress .list .row .column{
        height: auto;
    }

    .chooseAddress .list .row label .column:nth-of-type(1){
        width: 15%;
        height: auto;
        position: relative;
    }

    .chooseAddress .list .row label .column:nth-of-type(1) input{
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1;
        opacity: 0;
    }

    .chooseAddress .list .row label .column:nth-of-type(1) input + span{
        width: 20px;
        height: 20px;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        border: 2px solid #dbdbdb;
        background-color: #fff;
    }

    .chooseAddress .list .row label .column:nth-of-type(1) input:checked + span{
        background:url(http://m.bibi321.com/hl/resources/train/images/order-icons.png) no-repeat 0px 0px;
        height:20px;
        padding-left:21px;
        border: 0;
    }

    .chooseAddress .list .row label .column:nth-of-type(2){
        width: 85%;
        height: auto;
        overflow: hidden;
        padding: 0.5rem 0;
        clear: left;
        display: block;
    }

    .chooseAddress .list .row label .column:nth-of-type(2) p{
        width: 100%;
        white-space: normal;
        line-height: 0.9rem;
        font-size: 0.7rem;
        float: left;
    }

    .chooseAddress .list .row label .column:nth-of-type(2) p span:nth-of-type(1){
        width: 30%;
        height: 1.2rem;
        line-height: 1.2rem;
        float: left;
    }

    .chooseAddress .list .row label .column:nth-of-type(2) p span:nth-of-type(2){
        width: 70%;
        line-height: 1.2rem;
        float: left;
        -ms-word-break: break-all;
        word-break: break-all;
    }

    .chooseAddress .list .row > .column:nth-of-type(1){
        width: 15%;
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
    }

    .chooseAddress .list .row .column:nth-of-type(1) i.editBtn{
        display: block;
        background:url(http://m.bibi321.com/hl/resources/train/images/order-icons.png) no-repeat 0px -20px;
        height:20px;
        padding-left:21px;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-top: -10px;
        margin-left: -10.5px;
    }

</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="buttons" ui-sref="tab.addressTrainInfo">
          <button class="button icon-left ion-chevron-left button-clear"  ng-click="selectedAddress(0, false)">返回</button>
        </div>
        <h1 class="title">选择收货地址</h1>
<!--        <div class="buttons">
          <button class="button button-clear" ng-click="">确定</button>
        </div> -->
    </ion-header-bar>
    <ion-content has-subheader="false" class="chooseAddress">

            <div class="add df-c-c-r">

                <i></i><span ng-click="displayAddress(false,x)">新增收货地址</span>

            </div>

            <div class="list">

                <div class="row df" ng-repeat="x in addressList" >

                    <label for="rb-{{$index}}" class="dif-s-c-r fg1" ng-click="selectedAddress(x, true)">

                        <div class="column dif-c-c-r fg0">

                            <input type="radio" name="rbAddress" id="rb-{{$index}}" ng-checked="x.chk" ng-model="x.chk"><span class="df-c-c-r"></span>

                        </div>

                        <div class="column fg1">

                            <p class="recipient"><span>收件人</span><span ng-bind="x.bx_invoice_receiver"></span></p>

                            <p class="phone"><span>手机号码</span><span ng-bind="x.bx_invoice_phone"></span></p>

                            <p class="zipCode"><span>邮政编码</span><span ng-bind="x.bx_invoice_zipcode"></span></p>

                            <p class="recipientAddress"><span>详细地址</span><span ng-bind="x.bx_invoice_address"></span></p>

                        </div>

                    </label>

                    <div class="column df-c-c-r fg0" ng-click="displayAddress(true, x)">

                        <i class="editBtn"></i>

                    </div>

                </div>

            </div>
            

    </ion-content>
</ion-view>