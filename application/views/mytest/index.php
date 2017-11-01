<!DOCTYPE html>
<html>
    <head>
        <title>比比旅游</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic.min.css"); ?>' rel="stylesheet">
        <script src='<?php echo base_url("lib/ionic/js/ionic.bundle.min.js"); ?>'></script>

        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/jquery/mobiscroll_date.js"); ?>'></script>
        <script src='<?php echo base_url("lib/jquery/mobiscroll.js"); ?>'></script>

        <script src='<?php echo base_url("lib/ionic/js/angular-local-storage.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-resource.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-sanitize.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-animate.min.js"); ?>'></script>

        <link href='<?php echo base_url("css/common.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/index.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/normalize3.0.2.min.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/mobiscroll.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/mobiscroll_date.css"); ?>' rel="stylesheet"/>

        <script type="text/javascript">
            angular.module('app', ['ngAnimate']).
                    controller('ctrl', ['$scope', function($scope) {
                    $scope.showButton = function() {
                        $scope.expression = true;
                    };
                    $scope.hideButton = function() {
                        $scope.expression = false;
                    };

                    $scope.placeAction = function(dizhi) {
                        console.log(dizhi);
                    };

                    $scope.depCity = '深圳市';
                    $scope.arrCity = '北京市';

                    var scale = 1;
                    $scope.switchCity = function() {
                        scale++;
                        var img_switch = document.getElementById('img_switch');
                        img_switch.style.transform = "rotate(" + scale * 360 + "deg)";
                        var city = $scope.depCity;
                        var code = $scope.depCode;
                        $scope.depCity = $scope.arrCity;
                        $scope.depCode = $scope.arrCode;
                        $scope.arrCity = city;
                        $scope.arrCode = code;
                    };

                }]);
        </script>
        <style type="text/css">
            #animate{ background-color:red;-webkit-transition:all linear 2s; transition:all linear 2s; opacity:1;}
            #animate.ng-hide{ opacity:0;}
            /*一下会慢慢解释*/
            #animate.ng-hide { }
            #animate.ng-hide-add { }
            #animate.ng-hide-add.ng-hide-add-active { }
            #animate.ng-hide-remove { }
            #animate.ng-hide-remove.ng-hide-remove-active {  }
        </style>

    </head>
    <body ng-app="app" ng-controller="ctrl">
        <button ng-click="showButton()">show</button>
        <button ng-click="hideButton()">hide</button>
        <div id="animate" ng-show="expression">"思涂客"</div>
        <br/>
        <br/>
        <section class="setOff wrapfix po_re border_b_1_e9">
            <div class="left_setbox fl ">
                <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img class="mr_55" src="http://112.74.171.99/hl/resources/air/image/ic_Take.png">出发地</p>
                <div ng-click="placeAction('出发地')" ng-bind="depCity" class="f_s22 iust_boxt cityBut departure c_1f1f1f ng-binding">北京市</div>
            </div>
            <div class="icon but_swi"><img src="http://112.74.171.99/hl/resources/air/image/switch.png" style="transition: all 600ms ease-in-out 0s; transform: rotate(0deg);" ng-click="switchCity()" id="img_switch" class=""></div>
            <div class="left_setbox fr text_a_r">
                <p class="c_908f97 f_s13 mb_55 nsuit_icon"><img class="mr_55" src="http://112.74.171.99/hl/resources/air/image/ic_landing.png">目的地</p>
                <div ng-click="placeAction('目的地')" ng-bind="arrCity" class="f_s22 iust_boxt cityBut destination c_1f1f1f ng-binding">深圳市</div>
            </div>
        </section>
    </body>
</html>
