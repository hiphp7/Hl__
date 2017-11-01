<ion-view view-title="比比旅行">
<style type="text/css">

.contact {
	top:4rem;
	background: #F6F6F6;
}
.bsit_heig {
    height: 4rem;
    line-height: 3rem;
    cursor: pointer;
}
</style>
    <ion-header-bar align-title="center" class="bar-positive ">

        <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">

            <span class="heaTxx">选择订单联系人</span>

            <a class="returnbut c_fff f_s18" ui-sref="tab.order"><span></span>返回</a>

        </div>
    </ion-header-bar>

  <ion-content class='contact'>
     <!--------头部header   [end]---------->

        <div class="bsit_heig pa_55 border_b_1_e9 border_t_1_e9 c_289deb f_s14 text_a_c mt_100 bg_fff addbutcond" ng-click="displayContacts(false,x)">

            <span class="cuisiAdd dp_i_b f_s14 mr_55 ">+</span>新增联系人

        </div>

        <ul class="cenBox bg_fff">

            <li class="border_b_1_e9 po_re " ng-repeat="x in Contacts"  >
                <span ng-click="selectedContact(x)">

                    <span class="poti_input">

                        <input type="radio" id="radio-qw-{{$index}}" name="radio-qw-v" class="regular-radio gubsit_bug" /><label for="radio-qw-{{$index}}"></label>

                    </span>

                    <label class="dp_b" for="radio-qw-{{$index}}">

                        <p class="f_s14 "><span class="mr_200" ng-bind="x.name">张三</span></p>

                        <p class="f_s12"><span class="mr_200">手机号码</span><span ng-bind="x.tel">13578059555</span></p>

                    </label>
                </span>

                <!----方向按钮------>

                <i class="nsut_bixt" ng-click="displayContacts(true,x)"></i>

                <!----方向按钮  [end]------>

            </li>
        </ul>
  </ion-content>
</ion-view>