<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>航旅投资后台管理</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url("vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url("vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url("vendors/iCheck/skins/flat/green.css"); ?>" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url("vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"); ?>" rel="stylesheet">
        <!-- jVectorMap -->
        <link href="<?php echo base_url("production/css/maps/jquery-jvectormap-2.0.3.css"); ?>" rel="stylesheet"/>

        <!-- datatables -->
        <link href="<?php echo base_url("vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"); ?>" rel="stylesheet"/>

        <link href="<?php echo base_url("vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url("build/css/custom.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.structure.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.theme.min.css"); ?>" rel="stylesheet" />
        <style type="text/css">
        .error
        {
            color:red;
        }
    </style>
    </head>
    <body class="nav-md">

        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="<?php echo base_url("resources/g_img/aukey.png"); ?>" alt="" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>欢迎使用</span>
                                <h2></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br/>

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section active">
                                <h3>&nbsp;</h3>
                                <ul style="" class="nav side-menu">
                                    <?php if (!empty($jieruguanli) && $jieruguanli == true): ?>
                                    <li class="active">
                                        <a><i class="fa"></i> 接入管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: block;">
                                    <?php else: ?>
                                    <li>
                                        <a><i class="fa"></i> 接入管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                    <?php endif; ?>
                                            <?php if (!empty($shengchenglianjiedizhi) && $shengchenglianjiedizhi == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("myhl/lianjieguanli/dizhi/index"); ?>'>生成连接地址</a></li>
                                            <?php else: ?>
                                            <li><a href='<?php echo site_url("myhl/lianjieguanli/dizhi/index"); ?>'>生成连接地址</a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($zhangdan) && $zhangdan == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("myhl/lianjieguanli/zhangdan/index"); ?>'>生成对账单</a></li>
                                            <?php else: ?>
                                            <li><a href='<?php echo site_url("myhl/lianjieguanli/zhangdan/index"); ?>'>生成对账单</a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($duijie) && $duijie == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("myhl/lianjieguanli/duijie/index"); ?>'>设置对接</a></li>
                                            <?php else: ?>
                                            <li><a href='<?php echo site_url("myhl/lianjieguanli/duijie/index"); ?>'>设置对接</a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($yue) && $yue == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("myhl/lianjieguanli/yue/index"); ?>'>查看余额</a></li>
                                            <?php else: ?>
                                            <li><a href='<?php echo site_url("myhl/lianjieguanli/yue/index"); ?>'>查看余额</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav role="navigation" class="">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <!-- 页头导航 -->
                            <ul class="nav navbar-nav navbar-left">

                                <li role="presentation"><a href='<?php echo site_url("hl/logout"); ?>'><span style="font-size:16px; font-weight:bold;">退出</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- 数据展示 -->
                <div role="main" class="right_col" style="min-height: 3160px;">           