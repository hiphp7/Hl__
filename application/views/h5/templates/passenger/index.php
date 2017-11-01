<ion-view view-title="比比旅行">
    <ion-header-bar align-title="center" class="bar-positive">
       <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop nobor">

            <span class="heaTxx">选择乘客</span>

            <a class="returnbut c_fff f_s18 returnjs" ng-click="selectedConfirm(false)"><span></span>返回</a>

             <a class="but_nsit f_s16 selebutton" ng-click="selectedConfirm(true)">确定</a> 
            <!--<p style="display: inline-block;text-align: right;position: absolute;right: 1rem;" ng-click="selectedConfirm(true)">完成</p>-->
        </div>
    </ion-header-bar>
    <style type="text/css">
    .pessenger{
        top:4rem;
        background-color: #f6f6f6;

    }
    .pa_55{
        padding: 0px;
    }
    .bsit_heig {
    height: 4rem;
    line-height: 4rem;
    cursor: pointer;
}
    .nobor{
        border: 0;
        font-size: 1.5rem;
    }   
    </style>
    <ion-content class="pessenger">
        <!--------头部header   [end]---------->

        <div class="bsit_heig pa_55 border_b_1_e9 border_t_1_e9 c_289deb f_s14 text_a_c mt_100 bg_fff yusjtbox" ng-click="displayUserContact(false,0)">

            <span class="cuisiAdd dp_i_b f_s14 mr_55">+</span>新增乘客

        </div>

        <p class="txtsio_p pl_100 f_s12" >

            <span class="fl">已选<font class="c_289deb mr_55"><span ng-bind="currentselected.adult.count + currentselected.child.count"></span></font>成人<font class="c_289deb mr_55"><span class="adult" ng-bind="currentselected.adult.count"></span></font>儿童<font class="c_289deb mr_55"><span ng-bind="currentselected.child.count"></span></font></span>
            <!--
            <span class="fr">购买儿童票请拨打400-3028289</span>
            -->
        </p>

        <ul class="cenBox border_t_1_e9 bg_fff cenulsbnk">

             <li class="border_b_1_e9 po_re" ng-repeat="x in userContacts | orderBy:'chk':true">

                <div>

                    <span class="poti_input">

                        <input type="checkbox" id="checkbox-s1-{{$index}}" class="regular-checkbox gubsit_bug" ng-checked="x.chk" ng-model="x.chk" ng-click="selectedUserContact(x ,isdable.check)" /><label class="vm" for="checkbox-s1-{{$index}}"></label>

                    </span>

                    <label class="dp_b" for="checkbox-s1-{{$index}}">

                        <p class="f_s14 "><span class="mr_200" ng-bind="x.zhongwenming"></span><span class="bst_jdir c_289deb f_s12" ng-show="x.type ==1">儿童</span></p>

                        <p class="f_s12"><span class="mr_200" ng-bind="x.zhengjianleixing">身份证</span><span ng-bind="x.zhengjianhaoma"></span></p>

                    </label>

                </div>

                <!----方向按钮---->

                <i class="nsut_bixt" ng-click="displayUserContact(true,$index)"></i>

                <!----方向按钮  [end]------>

            </li>

        </ul>
    </section>

    <!----选择乘客 [end]------------------------------>
    <!--确定键-->
    <!--<button style="background: #49D3DD;color: white;" class="button button-full button-positive" ng-click="selectedConfirm(true)">
      完成
    </button>-->
    </ion-content>
</ion-view>