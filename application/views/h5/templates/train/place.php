<ion-view view-title="比比旅行">   
   <style type="text/css">
            .alpha_sidebar{
                position: absolute;
                /*top:90px;*/
                top: 8rem;
                right:  10px;
                z-index: 100000
            }
            .alpha_sidebar li{
                color: #49afcd;
                margin-bottom: 2px;
                cursor: pointer;
            }
            .alpha_list{
                padding-right: 22px;
            }

            .bar-subheader{
                top:4rem;
            }
			.bar-subheader .item-input{
				padding-left:24px;
				padding-top:2px;
			}
			.bar-subheader .item-input i{
				font-size:139%;
			}
			.bar-subheader .item-input input{
				font-size:16px;
			}
            .padding {
                padding-top: 0px;
            }
            
            .abcbox_li {
    border-radius: 0.3rem;
    box-sizing: border-box;
    font-size: 1.5rem;
    height: 2.5rem;
    line-height: 2.5rem;
    margin: 0.25rem;
    width: 2.5rem;
    border: 1px solid #ddd;
    text-align: center;
    float:left;
    list-style:none;
}
        </style>
 <ion-header-bar class="bar-positive " style="height:4rem">
        <div class="header po_re f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">选择{{title}}</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back();"><span></span>返回</a>

        </div>
    </ion-header-bar>

        <div class="bar bar-subheader"  style="position:absolute;height:3rem;width: 100%">
    	    <label class="item-input" style="">
    	        <i class="icon ion-ios-search placeholder-icon"></i>
    	        <input type="search"  style="" placeholder="搜索" ng-focus="searchCity($event)" ng-keyup="keyup($event)" ng-model="content">
    	     </label>
            

        </div>
   <ion-content scroll="true" class="has-header ng-hide searchList" padding="true"  style="top:8rem" ng-show="content !='' " >
        <div data-ng-repeat="x in searchList" ng-click="showHomePage(x)" style="padding-right: 118px;">
            <ion-item >
                {{x.stationName}}
            </ion-item>
        </div>
    </ion-content>

    <ion-content scroll="true" class="has-header ng-hide" padding="true" style="position: absolute;top:8rem;" ng-show="content ==''"  >
        <div>
                <div style="margin-left:10px;font-size:16px;"> 历史</div>
                <div class="row" style="padding-right: 118px;" >
                  <div class="col col-30 button button-light button-small " style="margin:2px;font-size:16px;" ng-repeat="v in history" ng-click="showHomePage(v)">{{v.stationName}}</div>
                  <div class="" style="margin: 2px" ng-if="history== ''">无</div>
                </div>
                <div style="margin-left:10px;font-size:16px;"> 热门城市</div>
                  <div class="row" style="padding-right: 118px;" ng-repeat="v1 in remenplace">
                    <div class="col col-30 button button-light button-small" style="margin:2px;font-size:16px;" ng-repeat="v2 in v1" ng-click="showHomePage(v2)">{{v2.stationName}}</div>
                  </div>
         </div>
        <div data-ng-repeat="(letter, authors) in sorted_users" class="alpha_list" style="padding-right: 118px;">
            <ion-item class="item item-divider" id="index_{{letter}}">
                {{letter}}
            </ion-item>
            <ion-item ng-repeat="author in authors" ng-bind="author.stationName" ng-click="showHomePage(author)">
            </ion-item>
        </div>
    </ion-content>
    <ul style="width:118px;overflow:hidden;top:9rem;" class="alpha_sidebar ng-hide" ng-show="content =='' ">
        <li class="abcbox_li" style="list-style:none;width:50px;overflow:hidden;" ng-click="gotoList('index_{{letter}}')" ng-repeat="letter in alphabet"> 
            {{letter}}
        </li>
    </ul>
</ion-view>