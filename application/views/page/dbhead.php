<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <title>航旅投资后台管理</title>

    <!-- Bootstrap -->
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
                        <img src="<?php echo base_url("resources/g_img/logo.png"); ?>" alt="" class="img-circle profile_img">
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
                            <!-- 国内机票 -->
                            <?php if (!empty($guoneijipiao) && $guoneijipiao == true && !empty($guoneijipiao_curr) && $guoneijipiao_curr == true): ?>
                            <?php if (!empty($guoneijipiao_jipiaoshouhou_curr) && $guoneijipiao_jipiaoshouhou_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 机票售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 机票售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($guoneijipiao_chupiao) && $guoneijipiao_chupiao == true): ?>
                                    <?php if (!empty($guoneijipiao_chupiao_curr) && $guoneijipiao_chupiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>出票管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>出票管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_tuipiao) && $guoneijipiao_tuipiao == true): ?>
                                    <?php if (!empty($guoneijipiao_tuipiao_curr) && $guoneijipiao_tuipiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/tuipiao/index"); ?>'>退票管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/tuipiao/index"); ?>'>退票管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_gaiqianshengqing) && $guoneijipiao_gaiqianshengqing == true): ?>
                                    <?php if (!empty($guoneijipiao_gaiqianshengqing_curr) && $guoneijipiao_gaiqianshengqing_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/gaiqianshengqing/index"); ?>'>改签申请管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/gaiqianshengqing/index"); ?>'>改签申请管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_gaiqianchupiao) && $guoneijipiao_gaiqianchupiao == true): ?>
                                    <?php if (!empty($guoneijipiao_gaiqianchupiao_curr) && $guoneijipiao_gaiqianchupiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/gaiqianchupiao/index"); ?>'>改签出票管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/gaiqianchupiao/index"); ?>'>改签出票管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            
                            <?php if (!empty($guoneijipiao_baoxian_curr) && $guoneijipiao_baoxian_curr == true): ?>
                            <li class="active"><a><i class="fa"></i> 保险售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li><a><i class="fa"></i> 保险售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($guoneijipiao_dingdan) && $guoneijipiao_dingdan == true): ?>
                                    <?php if (!empty($guoneijipiao_dingdan_curr) && $guoneijipiao_dingdan_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/dingdan/index"); ?>'>订单管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/dingdan/index"); ?>'>订单管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            
                            <?php if (!empty($guoneijipiao_baoxiao_curr) && $guoneijipiao_baoxiao_curr == true): ?>
                            <li class="active"><a><i class="fa"></i> 报销售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li><a><i class="fa"></i> 报销售后管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($guoneijipiao_baoxiao) && $guoneijipiao_baoxiao == true): ?>
                                    <?php if (!empty($guoneijipiao_baoxiao_dd_curr) && $guoneijipiao_baoxiao_dd_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/youjidingdan/index"); ?>'>订单管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/youjidingdan/index"); ?>'>订单管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            
                            <?php if (!empty($guoneijipiao_jpzc_curr) && $guoneijipiao_jpzc_curr == true): ?>
                            <li class="active"><a><i class="fa fa-edit"></i> 机票政策管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li><a><i class="fa"></i> 机票政策管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_zhengcetiaokong) && $guoneijipiao_zhengcetiaokong == true): ?>
                                    <?php if (!empty($guoneijipiao_zhengcetiaokong_curr) && $guoneijipiao_zhengcetiaokong_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/zhengcetiaokong/index"); ?>'>政策调控</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/zhengcetiaokong/index"); ?>'>政策调控</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_zhengcetianjia) && $guoneijipiao_zhengcetianjia == true): ?>
                                    <?php if (!empty($guoneijipiao_zhengcetianjia_curr) && $guoneijipiao_zhengcetianjia_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/zhengcetianjia/index"); ?>'>政策添加</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/zhengcetianjia/index"); ?>'>政策添加</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($guoneijipiao_zhengcegengxin) && $guoneijipiao_zhengcegengxin == true): ?>
                                    <?php if (!empty($guoneijipiao_zhengcegengxin_curr) && $guoneijipiao_zhengcegengxin_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/guoneijipiao/zhengcegengxin/index"); ?>'>政策更新</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/guoneijipiao/zhengcegengxin/index"); ?>'>政策更新</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            
                            <!-- 财务管理 -->
							
                            <?php if (!empty($caiwuguanli) && $caiwuguanli == true && !empty($caiwuguanli_curr) && $caiwuguanli_curr == true): ?>
							<!--
                            <?php if (!empty($caiwuguanli_tuikuanguanli_curr) && $caiwuguanli_tuikuanguanli_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 退款管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 退款管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($caiwuguanli_tuikuanchuli) && $caiwuguanli_tuikuanchuli == true): ?>
                                    <?php if (!empty($caiwuguanli_tuikuanchuli_curr) && $caiwuguanli_tuikuanchuli_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/tuikuanchuli/index"); ?>'>退款处理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/tuikuanchuli/index"); ?>'>退款处理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($caiwuguanli_pltuikuanchuli) && $caiwuguanli_pltuikuanchuli == true): ?>
                                    <?php if (!empty($caiwuguanli_pltuikuanchuli_curr) && $caiwuguanli_pltuikuanchuli_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/piliangtuikuanchuli/index"); ?>'>批量退款记录</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/piliangtuikuanchuli/index"); ?>'>批量退款记录</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            -->
                            <?php if (!empty($caiwuguanli_gnjp_curr) && $caiwuguanli_gnjp_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 国内机票报表 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 国内机票报表 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($caiwuguanli_jipiaobaobiao) && $caiwuguanli_jipiaobaobiao == true): ?>
                                    <?php if (!empty($caiwuguanli_jipiaobaobiao_curr) && $caiwuguanli_jipiaobaobiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'>出票报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'>出票报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (!empty($caiwuguanli_gaiqianchupiao) && $caiwuguanli_gaiqianchupiao == true): ?>
                                    <?php if (!empty($caiwuguanli_gaiqianchupiao_curr) && $caiwuguanli_gaiqianchupiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/gaiqianchupiao/index"); ?>'>改签出票报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/gaiqianchupiao/index"); ?>'>改签出票报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (!empty($caiwuguanli_tuipiao) && $caiwuguanli_tuipiao == true): ?>
                                    <?php if (!empty($caiwuguanli_tuipiao_curr) && $caiwuguanli_tuipiao_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/tuipiao/index"); ?>'>退票报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/tuipiao/index"); ?>'>退票报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (!empty($caiwuguanli_judan) && $caiwuguanli_judan == true): ?>
                                    <?php if (!empty($caiwuguanli_judan_curr) && $caiwuguanli_judan_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/judan/index"); ?>'>拒单报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/judan/index"); ?>'>拒单报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (!empty($caiwuguanli_xiangqing) && $caiwuguanli_xiangqing == true): ?>
                                    <?php if (!empty($caiwuguanli_xiangqing_curr) && $caiwuguanli_xiangqing_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/xiangqing/index"); ?>'>详情报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/xiangqing/index"); ?>'>详情报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>									
                                </ul>
                            </li>
                            <!-- 酒店报表 -->
                            <?php if (!empty($caiwuguanli_jdbb_curr) && $caiwuguanli_jdbb_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 酒店报表 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 酒店报表 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($caiwuguanli_jiudianjudan) && $caiwuguanli_jiudianjudan == true): ?>
                                    <?php if (!empty($caiwuguanli_jiudianjudan_curr) && $caiwuguanli_jiudianjudan_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/jiudianjudan/index"); ?>'>酒店拒单报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/jiudianjudan/index"); ?>'>酒店拒单报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>	
                                    <?php if (!empty($caiwuguanli_jiudiandingfang) && $caiwuguanli_jiudiandingfang == true): ?>
                                    <?php if (!empty($caiwuguanli_jiudiiandingfang_curr) && $caiwuguanli_jiudiandingfang_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/caiwuguanli/jiudiandingfang/index"); ?>'>订房报表</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/caiwuguanli/jiudiandingfang/index"); ?>'>订房报表</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>									
                                </ul>
                            </li>
                            <?php endif; ?>
							
                        
                            <!-- 平台管理 -->
                            <?php if (!empty($pingtaiguanli) && $pingtaiguanli == true && !empty($pingtaiguanli_curr) && $pingtaiguanli_curr == true): ?>
                            
                            <?php if (!empty($pingtaiguanli_yh_curr) && $pingtaiguanli_yh_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($pingtaiguanli_yonghu) && $pingtaiguanli_yonghu == true): ?>
                                    <?php if (!empty($pingtaiguanli_yonghu_curr) && $pingtaiguanli_yonghu_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/yonghu/index"); ?>'>用户管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/yonghu/index"); ?>'>用户管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            
                            <?php if (!empty($pingtaiguanli_cpgl_curr) && $pingtaiguanli_cpgl_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 产品管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 产品管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($pingtaiguanli_baoxiangongsi) && $pingtaiguanli_baoxiangongsi == true): ?>
                                    <?php if (!empty($pingtaiguanli_baoxiangongsi_curr) && $pingtaiguanli_baoxiangongsi_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/index"); ?>'>保险公司管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/index"); ?>'>保险公司管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($pingtaiguanli_baoxianchanping) && $pingtaiguanli_baoxianchanping == true): ?>
                                    <?php if (!empty($pingtaiguanli_baoxianchanping_curr) && $pingtaiguanli_baoxianchanping_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/baoxianchanping/index"); ?>'>保险产品管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/baoxianchanping/index"); ?>'>保险产品管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            
                            <?php if (!empty($pingtaiguanli_xtgl_curr) && $pingtaiguanli_xtgl_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 系统管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 系统管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($pingtaiguanli_guanliyuanzu) && $pingtaiguanli_guanliyuanzu == true): ?>
                                    <?php if (!empty($pingtaiguanli_guanliyuanzu_curr) && $pingtaiguanli_guanliyuanzu_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/guanliyuanzu/index"); ?>'>管理员组</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/guanliyuanzu/index"); ?>'>管理员组</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($pingtaiguanli_guanliyuan) && $pingtaiguanli_guanliyuan == true): ?>
                                    <?php if (!empty($pingtaiguanli_guanliyuan_curr) && $pingtaiguanli_guanliyuan_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/guanliyuan/index"); ?>'>管理员</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/guanliyuan/index"); ?>'>管理员</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($pingtaiguanli_jiaoseguanli) && $pingtaiguanli_jiaoseguanli == true): ?>
                                    <?php if (!empty($pingtaiguanli_jiaoseguanli_curr) && $pingtaiguanli_jiaoseguanli_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/index"); ?>'>角色管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/index"); ?>'>角色管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($pingtaiguanli_quanxian) && $pingtaiguanli_quanxian == true): ?>
                                    <?php if (!empty($pingtaiguanli_quanxian_curr) && $pingtaiguanli_quanxian_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/quanxian/index"); ?>'>权限管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/quanxian/index"); ?>'>权限管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
									
									<?php if (!empty($pingtaiguanli_chanpinpeizhi) && $pingtaiguanli_chanpinpeizhi == true): ?>
                                    <?php if (!empty($pingtaiguanli_chanpinpeizhi_curr) && $pingtaiguanli_chanpinpeizhi_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/pingtaiguanli/chanpinpeizhi/index"); ?>'>产品配置</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/pingtaiguanli/chanpinpeizhi/index"); ?>'>产品配置</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>	
									
                                </ul>
                            </li>
                            
                            <?php endif; ?>
                            
                            <!-- 账户设置 -->
                            <?php if (!empty($zhanghushezhi) && $zhanghushezhi == true && !empty($zhanghushezhi_curr) && $zhanghushezhi_curr == true): ?>
                            
                            <?php if (!empty($zhanghushezhi_aqzx_curr) && $zhanghushezhi_aqzx_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 个人信息管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 个人信息管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($zhanghushezhi_anquanzhongxin) && $zhanghushezhi_anquanzhongxin == true): ?>
                                    <?php if (!empty($zhanghushezhi_anquanzhongxin_curr) && $zhanghushezhi_anquanzhongxin_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/zhanghushezhi/anquanzhongxin/index"); ?>'>安全中心</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/zhanghushezhi/anquanzhongxin/index"); ?>'>安全中心</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
							
							<!-- 火车票 -->
				<?php if (!empty($huocheguanli) && $huocheguanli == true && !empty($huocheguanli_curr) && $huocheguanli_curr == true): ?>

					<?php if (!empty($huocheguanli_cpgl_curr) && $huocheguanli_cpgl_curr == true): ?>
						<li class="active">
							<a><i class="fa"></i> 火车订单管理 <span class="fa fa-chevron-down"></span></a>
							<ul style="display: block;" class="nav child_menu">
							<?php else: ?>
								<li>
									<a><i class="fa"></i> 火车订单管理 <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
									<?php endif; ?>
									<?php if (!empty($huocheguanli_chupiaoguanli) && $huocheguanli_chupiaoguanli == true): ?>
										<?php if (!empty($huocheguanli_chupiaoguanli_curr) && $huocheguanli_chupiaoguanli_curr == true): ?>
											<li class="current-page"><a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'>出票管理</a></li>
										<?php else: ?>
											<li><a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'>出票管理</a></li>
										<?php endif; ?>
									<?php endif; ?>	
                                </ul>
                            </li>
                            <?php endif; ?>
							
							<!-- 酒店 -->
                            <?php if (!empty($jiudianguanli) && $jiudianguanli == true && !empty($jiudianguanli_curr) && $jiudianguanli_curr == true): ?>
                            
                            <?php if (!empty($jiudianguanli_dingdanguanli_curr) && $jiudianguanli_dingdanguanli_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 订单管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a><i class="fa"></i> 订单管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if (!empty($jiudianguanli_dingdanguanli) && $jiudianguanli_dingdanguanli == true): ?>
                                    <?php if (!empty($jiudianguanli_dingdanguanli_curr) && $jiudianguanli_dingdanguanli_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/jiudian/dingdanguanli/index"); ?>'>订单管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/jiudian/dingdanguanli/index"); ?>'>订单管理</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                </ul>
                            </li>
							
                            <!-- 信息管理 -->
                            <?php if (!empty($jiudianguanli_xinxiguanli_curr) && $jiudianguanli_xinxiguanli_curr == true): ?>
                            <li class="active">
                                <a><i class="fa"></i> 信息管理 <span class="fa fa-chevron-down"></span></a>
                                <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                            <li>
                                <a href='<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/index"); ?>'><i class="fa"></i> 信息管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    
                                    <?php if (!empty($jiudianguanli_xinxiguanli_xinzeng_curr) && $jiudianguanli_xinxiguanli_xinzeng_curr == true): ?>
                                    <li class="current-page"><a href='<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/index"); ?>'>问答管理</a></li>
                                    <?php else: ?>
                                    <li><a href='<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/index"); ?>'>问答管理</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
							
                <?php if (!empty($wangmengyewu) && $wangmengyewu == true && !empty($wangmengyewu_curr) && $wangmengyewu_curr == true): ?>

                    <?php if (!empty($wangmengyewu_cpgl_curr) && $wangmengyewu_cpgl_curr == true): ?>
                        <li class="active">
                            <a><i class="fa"></i> 商户管理 <span class="fa fa-chevron-down"></span></a>
                            <ul style="display: block;" class="nav child_menu">
                            <?php else: ?>
                                <li>
                                    <a><i class="fa"></i> 商户管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <?php endif; ?>
                                    <?php if (!empty($wangmengyewu_qiyeshanghu) && $wangmengyewu_qiyeshanghu == true): ?>
                                        <?php if (!empty($wangmengyewu_qiyeshanghu_curr) && $wangmengyewu_qiyeshanghu_curr == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/index"); ?>'>企业商户</a></li>
                                        <?php else: ?>
                                            <li><a href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/index"); ?>'>企业商户</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($wangmengyewu_gerenshanghu) && $wangmengyewu_gerenshanghu == true): ?>
                                        <?php if (!empty($wangmengyewu_gerenshanghu_curr) && $wangmengyewu_gerenshanghu_curr == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("admin/wangmengyewu/gerenshanghu/index"); ?>'>个人商户</a></li>
                                        <?php else: ?>
                                            <li><a href='<?php echo site_url("admin/wangmengyewu/gerenshanghu/index"); ?>'>个人商户</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?> 

                                    <?php if (!empty($wangmengyewu_zhangdanjiesuan) && $wangmengyewu_zhangdanjiesuan == true): ?>
                                        <?php if (!empty($wangmengyewu_zhangdanjiesuan_curr) && $wangmengyewu_zhangdanjiesuan_curr == true): ?>
                                            <li class="current-page"><a href='<?php echo site_url("admin/wangmengyewu/zhangdanjiesuan/index"); ?>'>账单结算</a></li>
                                        <?php else: ?>
                                            <li><a href='<?php echo site_url("admin/wangmengyewu/zhangdanjiesuan/index"); ?>'>账单结算</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?> 
                                </ul>
                            </li>
                            <?php endif; ?> 
							
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
                        <?php if (!empty($guoneijipiao) && $guoneijipiao == true): ?>
                        <?php if (!empty($guoneijipiao_curr) && $guoneijipiao_curr == true): ?>
                        <li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">国内机票</span></a></li>
                        <?php else: ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">国内机票</span></a></li>
                        <?php endif; ?>
                        <?php endif; ?>
                         <!-- 酒店 -->
                                                <?php if (!empty($jiudianguanli) && $jiudianguanli == true): ?>
							<?php if (!empty($jiudianguanli_curr) && $jiudianguanli_curr == true): ?>
								<li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/jiudian/dingdanguanli/index"); ?>'><span style="font-size:16px; font-weight:bold;">酒店</span></a></li>
							<?php else: ?>
								<li role="presentation"><a href='<?php echo site_url("admin/jiudian/dingdanguanli/index"); ?>'><span style="font-size:16px; font-weight:bold;">酒店</span></a></li>
							<?php endif; ?>
						<?php endif; ?> 
                                                                
						<?php if (!empty($huocheguanli) && $huocheguanli == true): ?>
							<?php if (!empty($huocheguanli_curr) && $huocheguanli_curr == true): ?>
								<li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">火车票</span></a></li>
							<?php else: ?>
								<li role="presentation"><a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">火车票</span></a></li>
							<?php endif; ?>
						<?php endif; ?>           
                        
						
                        <?php if (!empty($caiwuguanli) && $caiwuguanli == true): ?>
                        <?php if (!empty($caiwuguanli_curr) && $caiwuguanli_curr == true): ?>
                        <li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">财务管理</span></a></li>
                        <?php else: ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'><span style="font-size:16px; font-weight:bold;">财务管理</span></a></li>
                        <?php endif; ?>
                        <?php endif; ?>
						
                        <?php if (!empty($wangmengyewu) && $wangmengyewu == true ): ?>
                        <?php if (!empty($wangmengyewu_curr) && $wangmengyewu_curr == true): ?>
                        <li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/index"); ?>'><span style="font-size:16px; font-weight:bold;">网盟业务</span></a></li>
                        <?php else: ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/index"); ?>'><span style="font-size:16px; font-weight:bold;">网盟业务</span></a></li>
                        <?php endif; ?>
                        <?php endif; ?>						
						
                        
                        <?php if (!empty($pingtaiguanli) && $pingtaiguanli == true): ?>
                        <?php if (!empty($pingtaiguanli_curr) && $pingtaiguanli_curr == true): ?>
                        <li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/pingtaiguanli/yonghu/index"); ?>'><span style="font-size:16px; font-weight:bold;">平台管理</span></a></li>
                        <?php else: ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/pingtaiguanli/yonghu/index"); ?>'><span style="font-size:16px; font-weight:bold;">平台管理</span></a></li>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if (!empty($zhanghushezhi) && $zhanghushezhi == true): ?>
                        <?php if (!empty($zhanghushezhi_curr) && $zhanghushezhi_curr == true): ?>
                        <li role="presentation" style="background:#d9dee4 no-repeat scroll 0 0"><a href='<?php echo site_url("admin/zhanghushezhi/anquanzhongxin/index"); ?>'><span style="font-size:16px; font-weight:bold;">账户设置</span></a></li>
                        <?php else: ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/zhanghushezhi/anquanzhongxin/index"); ?>'><span style="font-size:16px; font-weight:bold;">账户设置</span></a></li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <li role="presentation"><a href='<?php echo site_url("admin/login/logout"); ?>'><span style="font-size:16px; font-weight:bold;">退出</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- 数据展示 -->
        <div role="main" class="right_col" style="min-height: 3160px;">           