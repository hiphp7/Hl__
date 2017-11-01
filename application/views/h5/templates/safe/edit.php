<ion-view view-title="比比旅行">
<style type="text/css">
    input[type="text"]{
        font-size: 1.3rem;
    }
    .buti_bitu.wrapfix {
    	padding: 10px;
    }
    .wrapfix{
    	position: relative;
    }
    .wrapfix li{
    	height: 25px;
    	font-style: normal;
    	font-size: 1.2rem;
    }
    .safetitle h3{
    	    width: 25%;
    		height: 3rem;
   			line-height: 3rem;
   			box-sizing: border-box;
    		padding-left: 8px;
    }
    .wrapfix ul{
    	padding-left: 10px;
    }
    .none{
    	padding-left: 10px;
    	color: #999999;
    	font-size: 1.5rem;
    }
   .wrapfix em{
   	 width: 32px;
    height: 40px;
    background: url(./resources/air/image/allrigh.png) no-repeat;
    background-size: contain;
    position: absolute;
    right: 1rem;
    top: 5rem;

   }
</style>
    <ion-header-bar align-title="center" class="bar-positive">
        <!--------头部header---------->

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">选择套餐类型</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="back()"><span></span>返回</a>

            

        </div>

        <!--------头部header   [end]---------->
    </ion-header-bar>
  <ion-content>
    <!----新增或编辑联系人------------------------------>

    <section class="wrap_Box addcontacts bg_f6f6f6 pttop50" style="padding-top: 0">



        <!----联系人信息 [end]---------->

        <section class="bg_fff f_s13">

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix poing" ng-click="Cem()">
				<div class="safetitle" style="height: 3.5rem;line-height: 3.5rem;">
					<h3 style="font-size: 1.5rem;float: left;width: 40%;">飞行保障套餐A</h3><span style="float: right;width: 10%;color: #999999">&#165;30</span>	
				</div>
				
                
                <ul>
                	<li>1.一对一金牌客服服务</li>
                	<li>2.急速退改签服务<em style=""></em></li>
                	<li>3.短信提醒服务</li>
                	<li>4.最高<span style="color: #FF6606;">300万</span>保额的航空意外险</li>
                </ul>
				
            </div>

            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix reming"ng-click="changeInsurance(accidents[selectedidx])"ng-model="selectedidx">
				<div class="safetitle" style="height: 3.5rem;line-height: 3.5rem;">
					<h3 style="font-size: 1.5rem;float: left;width: 40%;">飞行保障套餐B</h3><span style="float: right;width: 10%;color: #999999">&#165;20</span>	
				</div>
				
                
                <ul>
                	<li>1.专人客服服务</li>
                	<li>2.极速退改签服务<em style=""></em></li>
                	<li>3.短信提醒服务</li>
                	<li>4.最高<span style="color: #FF6606;">100万</span>保额的航空意外险</li>
                </ul>
               


            </div>
            <div class="buti_bitu  pa_55 border_b_1_e9 wrapfix">
            	<div class="none">
            		无套餐	
            	</div>
            	
            </div>	
			<input  style="background: #FF9514;width: 90%; border-radius: 4px;" name="" type="submit" class="reboxBut c_fff bg_ff6d6d f_s16 " value="确认" ng-click="saveSafe()">
        </section>
        <!--确定键-->
        <!--<button class="button button-full button-positive" ng-click="saveContact()">
          确定
        </button>-->
        <!-- <ion-checkbox  ng-change="!isShow" ng-init="isShow = false">提示</ion-checkbox> -->

        <!----联系人信息 [end]---------->

        <!-----提示------->

        

        <!-----提示  [end]------->

    </section>

    <!----新增或编辑联系人 [end]------------------------------>
  </ion-content>
</ion-view>
<script>
		function Cem(){
			$('.poing').click(function(){
				$(this).find('em').show();
			$('.reming').find('em').hide();				
			})
		}
		function Nem(){
			$('.reming').click(function(){
				$(this).find('em').show();
				$('.poing').find('em').hide();
			})	
		}
		$('.reming').find('em').hide();
		Cem();
		Nem();
</script>