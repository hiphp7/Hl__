<ion-view view-title="比比旅行">
<style type="text/css">
    .bar .button.button-clear.icon-left::before{
        font-size: 20px;
    }

    .choosePassenger {
            width: 100%;
            height: auto;
            background-color: #f6f6f6;
    }
    .choosePassenger .add {
            margin-top: 0.5rem;
            height: 3rem;
            width: 100%;
            text-align: center;
            border-top: 1px solid #eaeaeb;
            border-bottom: 1px solid #eaeaeb;
            color: #49D3DD;
            font-size: 1.3rem;
            display: -webkit-flex;
            display: -ms-flex;
            display: flex;
            justify-content: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            display: -webkit-box;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            -webkit-box-orient: horizontal;
            background-color: #fff;
    }
    .choosePassenger .add i {
            height: 1.2rem;
            width: 1.2rem;
            border-radius: 100%;
            display: block;
            border: 1px solid #49D3DD;
            margin-right: 0.25rem;
            position: relative;
    }
    .choosePassenger .add i::before {
            content: '';
            position: absolute;
            width: 0.1rem;
            height: 0.8rem;
            background-color: #49D3DD;
            top: 0.125rem;
            left: 50%;
            margin-left: -0.05rem;
    }
    .choosePassenger .add i::after {
            content: '';
            position: absolute;
            width: 0.8rem;
            height: 0.1rem;
            background-color: #49D3DD;
            top: 50%;
            left: 50%;
            margin-top: -0.025rem;
            margin-left: -0.4rem;
    }
    .choosePassenger .list {
            width: 100%;
            float: left;
            background-color: #fff;
    }
    .choosePassenger .list .row {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ebebeb;
            float: left;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: flex;
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-align-items: center;
            -moz-align-items: center;
            -ms-align-items: center;
            align-items: center;
            position: relative;
    }
    .choosePassenger .list .row label {
            width: 88%;
            height: auto;
            display: block;
            overflow: hidden;
            display: -webkit-inline-flex;
            display: -moz-inline-flex;
            display: -ms-inline-flex;
            display: inline-flex;
            /*
            -webkit-justify-content: flex-start;
            -moz-justify-content: flex-start;
            -ms-justify-content: flex-start;
            justify-content: flex-start;*/
            -webkit-flex-grow: 0;
            -moz-flex-grow: 0;
            -ms-flex-grow: 0;
            flex-grow: 0;
    }
    .choosePassenger .list .row .column {
            display: block;
            height: auto;
    }
    .choosePassenger .list .row>label .column:nth-of-type(1) {
            width: 15%;
            height: auto;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: flex;
            justify-content: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            display: -webkit-box;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            -webkit-box-orient: horizontal;
            position: relative;
            -webkit-flex-grow: 0;
            -moz-flex-grow: 0;
            -ms-flex-grow: 0;
            flex-grow: 0;
    }
    .choosePassenger .list .row label .column:nth-of-type(1) input {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
            opacity: 0;
    }
    .choosePassenger .list .row label .column:nth-of-type(1) input+span {
            width: 20px;
            height: 20px;
            border-radius: 100%;
            border: 2px solid #dbdbdb;
            background-color: #fff;
            display: block;
            /*display: -webkit-flex;
            display: -ms-flex;
            display: flex;
            justify-content: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            display: -webkit-box;
            -webkit-box-pack: center;
            -webkit-box-align: center;
            -webkit-box-orient: horizontal;*/
    }
    .choosePassenger .list .row label .column:nth-of-type(1) input:checked+span {
            background: url(http://m.bibi321.com/hl/resources/train/images/order-icons.png) no-repeat 0px 0px;
            height: 20px;
            padding-left: 21px;
            border: 0;
    }
    .choosePassenger .list .row label .column:nth-of-type(2) {
            width: 85%;
            height: auto;
            overflow: hidden;
            padding: 0.5rem 0;
            -webkit-flex-grow: 1;
            -moz-flex-grow: 1;
            -ms-flex-grow: 1;
            flex-grow: 1;
    }
    .choosePassenger .list .row label .column:nth-of-type(2) p {
            width: 100%;
            white-space: normal;
            line-height: 0.9rem;
            font-size: 1.3rem;
            float: left;
            padding-bottom:0.8rem;
    }
    .choosePassenger .list .row label .column:nth-of-type(2) p span:nth-of-type(1) {
            width: 35%;
            height: 1.4rem;
            line-height: 1.4rem;
            float: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
    }
    .choosePassenger .list .row label .column:nth-of-type(2) p span:nth-of-type(2) {
            width: 65%;
            line-height: 1.2rem;
            float: left;
            display: block;
            word-break: normal;
            display: block;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow: hidden;
    }
    .choosePassenger .list .row label .column:nth-of-type(2) p:nth-of-type(1) span:nth-of-type(2) {
            width: auto;
            display: inline-block;
/*            height: 0.8rem;
            line-height: 0.8rem;*/
            font-size: 1rem;
            border-radius: 0.1rem;
            border: 1px solid #49d3dd;
            padding: 0 0.15rem;
            color: #49d3dd;
            margin-top: 0.2rem;
			margin-right:5px;
    }
	.nocheck{
            width: auto;
            display: inline-block;
/*            height: 0.8rem;
            line-height: 0.8rem;*/
            font-size: 1rem;
            border-radius: 0.1rem;
            border: 1px solid #49d3dd;
            padding: 0 0.15rem;
            color: #49d3dd;
            margin-top: 0.2rem;
            line-height: 1.2rem;
            word-break: normal;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow: hidden;
            
    }
	 .plscheck{
            width: auto;
            display: inline-block;
/*            height: 0.8rem;
            line-height: 0.8rem;*/
            font-size: 1rem;
            border-radius: 0.1rem;
            border: 1px solid #ff6600;
            padding: 0 0.15rem;
            color: white;
            margin-top: 0.2rem;
            line-height: 1.2rem;
            word-break: normal;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow: hidden;
            background: #ff6600;
    }
    .choosePassenger .list .row>.column:nth-of-type(1) {
            width: 12%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            right: 0;
            top: 0;
    }
    .choosePassenger .list .row .column:nth-of-type(1) i.editBtn {
            display: block;
            background: url(http://m.bibi321.com/hl/resources/train/images/order-icons.png) no-repeat 0px -20px;
            height: 20px;
            padding-left: 21px;
            vertical-align: middle;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -10px;
            margin-left: -10.5px;
    }
    .rtngood:before{
        line-height: 32px !important;
    }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <div class="buttons">
          <button class="button icon-left ion-chevron-left button-clear rtngood"  ng-click="selectedConfirm(false)">返回</button>
        </div>
        <h1 class="title">选择乘车人</h1>
        <div class="buttons">
           <button class="button button-clear" ng-click="selectedConfirm(true)">完成</button> 
        </div>
    </ion-header-bar>
    <ion-content has-subheader="false" class="choosePassenger">
        <div class="add" ng-click="displayUserContact(false,0)">

            <i></i><span>新增乘车人</span>

        </div>

        <div class="list">

            <div class="row" ng-repeat="x in userContacts | orderBy:'chk':true" ng-if="!x.isNew">

                <label for="chk-A-{{$index}}">

                    <div class="column">

                        <input type="checkbox" name="chk-A-{{$index}}" id="chk-A-{{$index}}" ng-checked="x.chk" ng-model="x.chk" ng-click="selectedUserContact(x)"><span></span>

                    </div>

                    <div class="column">

                        <p><span ng-bind="x.user_name"></span><span ng-if="x.ticket_type ==1">儿童票</span>
							<span ng-if="x.Audit ==0" class="nocheck">未核验</span>
							<span ng-if="x.Audit ==0" class="plscheck">点击尝试核验</span>
						</p>

                        <p><span ng-bind="x.ids_type"></span><span ng-bind="x.user_ids"></span></p>

                    </div>

                </label>

                <div class="column" ng-click="displayUserContact(true, x)">

                    <i class="editBtn"></i>

                </div>

            </div>

        </div>
        <!--<button class="button button-full button-positive" ng-click="selectedConfirm(true)">
          确定
        </button>-->
    </ion-content>
</ion-view>