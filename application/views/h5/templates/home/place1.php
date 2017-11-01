<ion-view> 
 <style type="text/css">
            .alpha_sidebar{
                position: absolute;
                /*top:90px;*/
                top: 7rem;
                right:  10px;
                z-index: 100000
            }
            .alpha_sidebar li{
                color: #49afcd;
                margin-bottom: 0px;
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
        </style>
 <ion-header-bar class="bar-positive " style="height:4rem">
        <div class="header po_re f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">选择{{title}}</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back();"><span></span>返回</a>

        </div>
    </ion-header-bar>

        <div class="bar bar-subheader" style="position:absolute;height:4rem;width: 100%;padding:0;">
    	    <label class="item-input" style="">
    	        <i class="icon ion-ios-search placeholder-icon"></i>
    	        <input type="search"  style="" placeholder="搜索" ng-focus="searchCity($event)" ng-keyup="keyup($event)" ng-model="content">
    	     </label>

        </div>
        </div>
   <ion-content scroll="true" class="has-header ng-hide searchList" padding="true"  style="top:9rem" ng-show="content !='' " >
        <div data-ng-repeat="x in searchList">
            <ion-item ng-click="showHomePage(x)">
                {{x.city}}
            </ion-item>
        </div>
    </ion-content>
    <ion-content scroll="true" class="has-header ng-hide" padding="true" style="position: absolute;top:9rem;" ng-show="content ==''"  >
		<div>
                <div style="margin-left: 10px"> 历史</div>
                <div class="row" style="padding-right: 32px;" >
                  <div class="col col-30 button button-light button-small " style="margin: 2px ;font-size:20px" ng-repeat="v in history" ng-click="showHomePage(v)">{{v.city}}</div>
                  <div class="" style="margin: 2px" ng-if="history== ''">无</div>
                </div>
                <div style="margin-left: 10px"> 热门城市</div>
                  <div class="row" style="padding-right: 32px;" ng-repeat="v1 in remenplace">
                    <div class="col col-30 button button-light button-small" style="margin: 2px ;font-size:20px" ng-repeat="v2 in v1" ng-click="showHomePage(v2)">{{v2.city}}</div>
                  </div>

         </div>
        <div data-ng-repeat="(letter, authors) in sorted_users" class="alpha_list">
            <ion-item class="item item-divider" id="index_{{letter}}">
                {{letter}}
            </ion-item>
            <ion-item ng-repeat="author in authors" ng-bind="author.city" ng-click="showHomePage(author)">
            </ion-item>
        </div>
    </ion-content>
   
    <ul class="alpha_sidebar ng-hide"   ng-show="content =='' ">
        <li ng-click="gotoList('index_{{letter}}')" ng-repeat="letter in alphabet"> 
            {{letter}}
        </li>
    </ul>
</ion-view>