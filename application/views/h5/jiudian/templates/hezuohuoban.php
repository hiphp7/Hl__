<ion-view view-title="合作伙伴"  on-swipe-right="onSwipeRight(1)"  on-swipe-left="onSwipeLeft(0)">
    <ion-header-bar align-title="center" class="bar-positive"  style="box-shadow: 0px 2px 2px #b7ccd2;
					background-color: #49d3dd;background-image: none; border-bottom: 0;">
        <div class="buttons">
            <button class="button button-clear" ng-click="back_index()"><i class="icon ion-ios-arrow-left" style="color: white;font-size:115%" ></i></button>
        </div>
        <h1 class="title">
            <div class="switch_search">
                <div class="switch_search_tab" on-swipe-right="activeSlideSearch(1)" ng-click="activeSlideSearch(0)" ng-class="(slideIndexSearch==0 ||slideIndexSearch==-1) ? '' : 'white_search_tab'">
                    合作伙伴
                </div>
                <div class="switch_search_tab" on-swipe-left="activeSlideSearch(0)" ng-click="activeSlideSearch(1)" ng-class="(slideIndexSearch==1) ? '' : 'white_search_tab'">
                    合作航司
                </div>
                <div class="switch_bg" ng-class="(slideIndexSearch==0 ||slideIndexSearch==-1) ? 'search_left' :'search_right'"></div>
            </div>
        </h1>
    </ion-header-bar>
	    <style type="text/css">
        .switch_search{
            position:relative;display:flex;width:140px;height:28px;
            margin-top:8px;border:solid 1px #fff;border-radius:16px;
            font-size: 15px; margin: 8px auto;
        }
        .switch_search_tab{
            flex:1;height:28px;width:70px;
            line-height:28px;color:#49d3dd;z-index:12;
        }
        .white_search_tab{
            color:#0c8891;
        }
        .switch_bg{
            background:#fff;border-radius:16px;position:absolute;
            top:-1px;left:-1px;height:28px;width:70px;
        }
        .search_right{
            left: 70px !important;
            border-radius: 0 16px 16px 0;
            
        }
        .search_left{
            left: -1px !important;
            border-radius: 16px 0 0 16px;
        }
        .hezuo_show{ display: block !important;}
        .hezuo_hide{ display: none;}
		
    </style>
    <ion-content style="background-color: white;">
         <div  ng-class="(slideIndexSearch==0 ||slideIndexSearch==-1) ? 'hezuo_show' :'hezuo_hide'">
            <div style="width: 100%; padding: 20px 10%;">
                <img src='<?php echo base_url("jiudian_img/hezuo_01.png"); ?>' style="width: 100%;">
            </div>

            <div style="width: 100%; padding: 10px 10%; border-top: 3px solid #efefef;">
                <img src='<?php echo base_url("jiudian_img/hezuo_02.png"); ?>' style="width: 100%;">
            </div>
            <div style="width: 100%; padding: 10px 10%; border-top: 3px solid #efefef;">
                <img src='<?php echo base_url("jiudian_img/hezuo_03.png"); ?>' style="width: 100%;">
            </div>
        </div>
        <div  ng-class="(slideIndexSearch==1 ) ? 'hezuo_show' :'hezuo_hide'" >
            <h4 style="padding: 3% 0 0 5%;">合作航司</h4>
            <div style=" padding: 20px 10%;">
                <img src='<?php echo base_url("jiudian_img/hezuohs.jpg"); ?>' style="width: 100%;">
            </div>
        </div>
		<div style="width:100%; height:40px; background: #efefef;" ></div>
    </ion-content>
</ion-view>