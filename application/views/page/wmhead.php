<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>网盟服务平台</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url("resources/wm/css/bootstrap.css"); ?>" rel="stylesheet">

        <script src="<?php echo base_url("resources/wm/js/jquery-2.1.1.min.js"); ?>"></script>
        <script src="<?php echo base_url("resources/wm/js/bootstrap.min.js"); ?>"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url("resources/wm/js/modernizr-2.6.2.min.js"); ?>"></script>
        <script src="<?php echo base_url("resources/wm/js/respond.min.js"); ?>"></script>
        <![endif]-->
        <!--         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs/dt-1.10.8,fh-3.0.0,kt-2.0.0,r-1.0.7,sc-1.3.0/datatables.min.css"/>
                <script type="text/javascript" src="https://cdn.datatables.net/r/bs/dt-1.10.8,fh-3.0.0,kt-2.0.0,r-1.0.7,sc-1.3.0/datatables.min.js"></script> -->

        <link href="<?php echo base_url("vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet"/>
        <!-- Font Awesome -->
        <link href="<?php echo base_url("vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet"/>
        <!-- iCheck -->
        <link href="<?php echo base_url("vendors/iCheck/skins/flat/green.css"); ?>" rel="stylesheet"/>
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url("vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"); ?>" rel="stylesheet"/>
        <!-- jVectorMap -->
        <link href="<?php echo base_url("production/css/maps/jquery-jvectormap-2.0.3.css"); ?>" rel="stylesheet"/>

        <!-- datatables -->
        <link href="<?php echo base_url("vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"); ?>" rel="stylesheet"/>

        <link href="<?php echo base_url("vendors/nprogress/nprogress.css"); ?>" rel="stylesheet"/>


        <!-- Custom Theme Style -->

         <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.structure.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.theme.min.css"); ?>" rel="stylesheet" /> 

        <link rel="stylesheet" href="<?php echo base_url("resources/wm/css/mycss.css"); ?>">
        <script src="<?php echo base_url("resources/wm/js/my_js.js"); ?>"></script>
    </head>
    <style>

    </style>
    <body >

        <div style="width: 100%; padding-left: 1%; background: #22b7c2; height: 90px; box-shadow: 0px 1px 3px #999999;position: relative;">
            <a class="navbar-brand" href="#">
                <img alt="Brand"  src='<?php echo base_url("resources/wm/header.png"); ?>'>
            </a> 
            <div class="" style="font-size: 24px;color: #FEFEFE;opacity: 0.8;margin-top: 45px; float: left; ">网盟服务平台</div>
            <div class=" wm_logout" style="float: right; padding: 0 1.5%; line-height: 88px;"> 
                <span class="glyphicon glyphicon-off" style="font-size: 24px; color: #79EEf7; top: 5px;"></span>
                <span  class="" style="font-size: 20px;color: #79EEf7" >退出</span>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="row" style=" margin: 0; padding: 0">
            <div class=" nav_left" >
                <div style="width: 100%; height: 120px; display: table;">
                    <span style="display: table-cell; vertical-align: middle; width: 30%;padding-right: 10px;"> 
                        <div style="">
                            <img src="<?php echo base_url("resources/wm/images/qiye.png"); ?>" class="img-responsive" style="float: right;">
                        </div>
                    </span>

                    <span style="display: table-cell; vertical-align: middle; width: 60%;">
                        <div style="float: left;">
                            <span class="company_name"><?php echo $shangumingcheng; ?></span>
                        </div>  
                    </span>
                    <span style="display: table-cell; vertical-align: middle; width: 10%;">
                    </span>
                </div>
<!--                <div style="padding: 10px 0 0 10%; width: 80%; display: table;" >
                    <img src="<?php echo base_url("resources/wm/images/qiye.png"); ?>" class="img-responsive"  style="float: left; margin-top: 8%;">
                    <h3>深圳亚华投资有限公司</h3>

                </div>-->
                <ul class="left_list">
        　　<li class="li_lineh"><h3>推广管理</h3>
        　　<ul class="left_list list_hover">
                        <?php if (isset($lianjie)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/home/index"); ?>'>链接管理</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/home/index"); ?>'>链接管理</a></span></li>
                            <?php endif; ?>
            　　</ul>
        　　</li>

        　　<li class="li_lineh"><h3>数据查询</h3>
        　　<ul class="left_list list_hover" >
                        <?php if (isset($yonghu)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/yonghu/index"); ?>'>查询注册用户</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/yonghu/index"); ?>'>查询注册用户</a></span></li>
                            <?php endif; ?>
                            <?php if ($feiji_show == true): ?>
                            <?php if (isset($feiji)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/feiji/index"); ?>'>查询国内机票订单</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/feiji/index"); ?>'>查询国内机票订单</a></span></li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($huoche_show == true): ?>
                            <?php if (isset($huoche)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/huoche/index"); ?>'>查询火车票订单</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/huoche/index"); ?>'>查询火车票订单</a></span></li>
                            <?php endif; ?>
                            <?php endif; ?>
                           <?php if ($jiudian_show == true): ?>
                            <?php if (isset($jiudian)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/jiudian/index"); ?>'>查询国内酒店订单</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/jiudian/index"); ?>'>查询国内酒店订单</a></span></li>
                            <?php endif; ?> 
                            <?php endif; ?>
                            <?php if ($baoxian_show == true): ?>
                             <?php if (isset($baoxian) ): ?>
                                 <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/baoxian/index"); ?>'>查询机票保险订单</a></span></li>
                             <?php else: ?>
                                 <li><span><a href='<?php echo site_url("wm/wangmeng/baoxian/index"); ?>'>查询机票保险订单</a></span></li>
                             <?php endif; ?> 
                             <?php endif; ?> 

            　　</ul>
        　　</li>

        　　<li class="li_lineh"><h3>佣金结算</h3>
        　　<ul class="left_list list_hover" >

<!--            　　<li><span>当期账单</span></li>
            　　<li><span>账单查询</span></li>-->

            <?php if (isset($zhangdan) && $dangqianxiangqing): ?>
                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/zhangdan/dangqianxiangqing"); ?>'>当期账单</a></span></li>
            <?php else: ?>
                <li><span><a href='<?php echo site_url("wm/wangmeng/zhangdan/dangqianxiangqing"); ?>'>当期账单</a></span></li>
            <?php endif; ?>
            <?php if (isset($zhangdan)  && !$dangqianxiangqing): ?>
                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/zhangdan/index"); ?>'>账单查询</a></span></li>
            <?php else: ?>
                <li><span><a href='<?php echo site_url("wm/wangmeng/zhangdan/index"); ?>'>账单查询</a></span></li>
            <?php endif; ?>
            　　</ul>
        　　</li>

        　　<li class="li_lineh"><h3>商户信息</h3>
        　　<ul class="left_list list_hover" >

                            <?php if (isset($zhanghu)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/zhanghu/index"); ?>'>账户安全</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/zhanghu/index"); ?>'>账户安全</a></span></li>
                            <?php endif; ?>
                            <?php if (isset($zhifu)): ?>
                                <li class="list_background"><span><a href='<?php echo site_url("wm/wangmeng/zhifu/index"); ?>'>收款设置</a></span></li>
                            <?php else: ?>
                                <li><span><a href='<?php echo site_url("wm/wangmeng/zhifu/index"); ?>'>收款设置</a></span></li>
                            <?php endif; ?>


            　　</ul>
        　　</li>
                </ul>
            </div>


            <div class="nav_right" style="min-width: 160px;padding-left: 41px;padding-right: 101px; min-height: 600px;">

                <script>
                    $(".wm_logout").click(function() {
                        window.location.href='<?php echo site_url("wm/login/logout"); ?>';
                    });
                </script>