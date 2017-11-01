<ion-view view-title="比比旅行" style="background: url('<?php echo base_url("resources/air/image/newIndex.png"); ?>') no-repeat;background-size: cover;">
    <style type="text/css">
        .toMobileBtn{
            position: absolute;
            top: 26.76%;
            left: 21.2%;
            width: 24.13%;
            height: 18.89%;
            z-index: 1;
            -webkit-animation: scaleAnimation 1.2s linear infinite;
            -moz-animation: scaleAnimation 1.2s linear infinite;
            animation: scaleAnimation 1.2s linear infinite;
        }

        .toTrainBtn{
            position: absolute;
            top: 26.76%;
            left: 54.8%;
            width: 24.13%;
            height: 18.89%;
            z-index: 1;
            -webkit-animation: scaleAnimation 1.2s linear infinite;
            -moz-animation: scaleAnimation 1.2s linear infinite;
            animation: scaleAnimation 1.2s linear infinite;
        }
        @-webkit-keyframes scaleAnimation {
            0%{
            -webkit-transform: scale(1);
        }
        25%{
            -webkit-transform: scale(1.1);
        }
        50%{
            -webkit-transform: scale(1);
        }
        75%{
            -webkit-transform: scale(0.9);
        }
        100%{
            -webkit-transform: scale(1);
        }
        }
        @-moz-keyframes scaleAnimation {
            0%{
            -moz-transform: scale(1);
        }
        25%{
            -moz-transform: scale(1.1);
        }
        50%{
            -moz-transform: scale(1);
        }
        75%{
            -moz-transform: scale(0.9);
        }
        100%{
            -moz-transform: scale(1);
        }
        }
        @keyframes scaleAnimation {
            0%{
            transform: scale(1);
        }
        25%{
            transform: scale(1.1);
        }
        50%{
            transform: scale(1);
        }
        75%{
            transform: scale(0.9);
        }
        100%{
            transform: scale(1);
        }
        }

        .toMobileBtn img, .toTrainBtn img{
            max-width: 100%;
            display: block;
        }

        @media only screen and (max-width:320px) and (max-height:380px) {
            .toMobileBtn, .toTrainBtn{
                top:31.76%;
            }

        }
    </style>
	<!--
	<a href='http://m.bibi321.com/hl/index.php#/tab/home' class="toMobileBtn"><img src='<?php echo base_url("resources/air/image/newIndex-mobile.png"); ?>' alt=""></a>
    <a ng-click="gotoTrain();" class="toTrainBtn"><img src='<?php echo base_url("resources/air/image/newIndex-train.png"); ?>' alt=""></a>
	-->
    <a ng-click="gotoHome();" class="toMobileBtn"><img src='<?php echo base_url("resources/air/image/newIndex-mobile.png"); ?>' alt=""></a>
    <a ng-click="gotoTrain();" class="toTrainBtn"><img src='<?php echo base_url("resources/air/image/newIndex-train.png"); ?>' alt=""></a>
	
</ion-view>