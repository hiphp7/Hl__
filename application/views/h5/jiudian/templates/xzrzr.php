
<ion-view view-title="选择入住人">
    <style type="text/css">
      .test1 input{ width: 28px; height: 28px; margin-top: 5px; margin-left: 10px;}
      .test1 input:checked:before{  background: white;  border-color: #49d3dd;  }
      .test1 input:before{border-color: #cccccc;}
      .test1 input:before, .test1:before{ width: 75%; height: 75%;}
      .test1 input:after{ border:2px solid #49d3dd; border-top: none;border-right: none  ;top:24%; left:13%}
	  .anniubiankuang.activated{border:0; box-shadow: 0;}
		.anniuyanse{background-color: #49d3dd; color: white;}
		.anniuyanse:hover{ color:white;}
		.anniuyanse.activated{background-color: #49d3dd; color: white; border:0;}
    </style>
    <ion-header-bar align-title="center" class="bar-positive"  style="background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="backtotjdd()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title" style="font-family: 黑体; color: white">选择入住人</h1>
		<button class="button button-small anniubiankuang" style=" border:0; background-color: #49d3dd; width: 50px; margin-right: 8px;" ng-click="finish();">
		  <span style="color: white; font-family: 黑体; font-size: 14px;">完成</span>
		</button>
    </ion-header-bar>

  <ion-content style="background-color: #efefef;" >


    <div style="background-color: #efefef; height: 35px; padding: 6px 0 0 15px; ">
      <span style="font-family: 黑体; font-size: 12px;">新增入住人</span>
    </div>

    <div class="item item-input" style="padding:3px;">
      <label class="item-input-wrapper" style="background-color: white;">
        <input type="text" placeholder="姓名,1房间最多1人" style="background-color: white;" ng-click="show_tianjia()" id="xingming" >
      </label>
      <i ng-show="tianjia_show" ng-click="clear_text()" class="ion-android-close"></i>
      <button ng-show="tianjia_show" class="button button-small anniubiankuang" style="background-color: #49d3dd; width: 50px; margin-right: 8px;" ng-click="tianjia()">
        <span style="color: white; font-family: 黑体; font-size: 14px;">添加</span>
      </button>
    </div>


   <div style="background-color: #efefef; height: 35px; padding: 0px 0 0 15px;">
      <div style="font-family: 黑体; font-size: 12px; padding-top: 6px; float: left;">选择入住人</div>
    </div>
    <div class="row"  style="padding: 0px; background-color: white;"ng-repeat="n in list track by $index">
      <div class="col col" style="padding: 0px;">
        <ul class="list">
          <li class="item item-checkbox"  style="border: 0; " >
            <label  class="checkbox checkbox-calm test1" >
                <input type="checkbox"  class="test2" style="background-color: white; border: #49d3dd;" name="ruzhuren" ng-model="n.chk" ng-click="ruzhuren('{{n.name}}')">
            </label>
            <span ng-bind="n.name"></span>
          </li>
        </ul>
      </div>
      <div class="col-20" style="padding-left: 15px;">
          <button class="button button-small anniubiankuang" style="background-color: #49d3dd; width: 50px; margin-top:8px;" ng-click="delete_contact($index)">
            <span style="color: white; font-family: 黑体; font-size: 14px;">删除</span>
          </button>
      </div>
    </div>



  </ion-content>
</ion-view>
