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
    
    <script src='<?php echo base_url("js/app.js"); ?>'></script>
    <script src='<?php echo base_url("js/config.js"); ?>'></script>
    <script src='<?php echo base_url("js/controllers.js"); ?>'></script>
    <script src='<?php echo base_url("js/services.js"); ?>'></script>
    <script src='<?php echo base_url("js/directive.js"); ?>'></script>
    
    <link href='<?php echo base_url("css/style1.css"); ?>' rel="stylesheet"/>
    <link href='<?php echo base_url("css/normalize3.0.2.min.css"); ?>' rel="stylesheet"/>
    <link href='<?php echo base_url("css/style2.css"); ?>' rel="stylesheet"/>
    <link href='<?php echo base_url("css/mobiscroll.css"); ?>' rel="stylesheet"/>
    <link href='<?php echo base_url("css/mobiscroll_date.css"); ?>' rel="stylesheet"/>

</head>
<body ng-app="starter">
<ion-nav-bar class="bar-positive nav-title-slide-ios7">
    <ion-nav-back-button class="button-icon ion-arrow-left-c">
    </ion-nav-back-button>
</ion-nav-bar>
<ion-nav-view animation="slide-left-right"></ion-nav-view>
</body>
</html>
