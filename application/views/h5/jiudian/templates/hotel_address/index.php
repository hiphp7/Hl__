<ion-view view-title="地址列表">
    <ion-header-bar align-title="center" class="bar-positive" style="height:4rem;background-color: #49d3dd" >
        <!--------头部header---------->
        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop" style="background-color: #49d3dd">
            <span class="heaTxx">选择收件地址</span>
            <a class="returnbut c_fff f_s18 returnjs" ng-click="selectedAddress('',0, false)"><span></span>返回</a>
         </div>
    </ion-header-bar>
    <style type="text/css">
        .bsit_heig {
            height: 4rem;
            line-height: 3rem;
            cursor: pointer;
        }
    </style>
  <ion-content class="address" style="top:4rem;background: #F6F6F6;">
        <!--------头部header [end]---------->
        <div class="bsit_heig pa_55 border_b_1_e9 border_t_1_e9 c_289deb f_s14 text_a_c mt_100 bg_fff anjt_tuibox" ng-click="displayAddress('false',0,x)">
            <span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增收件地址
        </div>
        <ul class="cenBox bg_fff sowjman">
            <li class="border_b_1_e9 po_re " ng-repeat="x in hotel_addressList" >
            <span ng-click="selectedAddress(x, $index, true)">
                <span class="poti_input">
                    <input type="radio" id="radio-tr-{{$index}}" name="radio-qw-v" class="regular-radio gubsit_bug " ng-checked="hotel_mail.isMail == true && $index == hotel_mail.index" /><label for="radio-tr-{{$index}}" ></label>
                </span>
                <label class="dp_b" for="radio-tr-{{$index}}">
                    <p class="f_s14  wrapfix"><span class="mr_200" ng-bind="x.shoujianrenmingzi">张三</span></p>
                    <p class="f_s12  wrapfix"><span class="wid25 fl">手机号码</span><span class="wid75 fl" ng-bind="x.shoujihao">13578059555</span></p>
                    <p class="f_s12 wrapfix"><span class="wid25 fl">详细地址</span><span class="wid75 fl" ng-bind="x.dizhi">深圳市福田区八卦二路义华大厦</span></p>
                </label>
                </span>
                <!----方向按钮------>
                <i class="nsut_bixt" ng-click="displayAddress('true',$index,'')"></i>
                <!----方向按钮  [end]------>
            </li>
        </ul>
  </ion-content>
</ion-view>