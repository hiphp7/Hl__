<?php
$this->load->view('page/ghead');
?>

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div style="border: 0;" class="navbar nav_title">
                    <a class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img class="img-circle profile_img" alt="" src="<?php echo base_url("resources/g_img/aukey.png"); ?>">
                    </div>
                    <div class="profile_info">
                        <span>欢迎使用</span>
                        <h2></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br>

                <!-- sidebar menu -->
                <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
                    <div class="menu_section active">
                        <h3>Wish 数据分析</h3>
                        <ul class="nav side-menu" style="">
                            <?php if ($ul == 'zhuizong'): ?>
                            <li class="active"><a><i class="fa fa-home"></i> 我的追踪 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                            <?php else: ?>
                            <li><a><i class="fa fa-home"></i> 我的追踪 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if ($li == 'zhuizong_chanping_zz'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("zhuizong/chanping_zz/index");?>">产品追踪</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("zhuizong/chanping_zz/index");?>">产品追踪</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'zhuizong_dianpu_zz'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("zhuizong/dianpu_zz/index");?>">店铺追踪</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("zhuizong/dianpu_zz/index");?>">店铺追踪</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if ($ul == 'chanpingdiaoyan'): ?>
                            <li class="active"><a><i class="fa fa-edit"></i> 产品调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                            <?php else: ?>
                            <li><a><i class="fa fa-edit"></i> 产品调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if ($li == 'chanpingdiaoyan_chanpingrexiao'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("chanpingdiaoyan/chanpingrexiao/index");?>">产品热销榜</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("chanpingdiaoyan/chanpingrexiao/index");?>">产品热销榜</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'chanpingdiaoyan_chanpingbiaosheng'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("chanpingdiaoyan/chanpingbiaosheng/index");?>">产品飙升榜</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("chanpingdiaoyan/chanpingbiaosheng/index");?>">产品飙升榜</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if ($ul == 'dianpudiaoyan'): ?>
                            <li class="active"><a><i class="fa fa-desktop"></i> 店铺调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                            <?php else: ?>
                            <li><a><i class="fa fa-desktop"></i> 店铺调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if ($li == 'dianpudiaoyan_dianpurexiao'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("dianpudiaoyan/dianpurexiao/index");?>">店铺热销榜</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("dianpudiaoyan/dianpurexiao/index");?>">店铺热销榜</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'dianpudiaoyan_dianpubiaosheng'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("dianpudiaoyan/dianpubiaosheng/index");?>">店铺飙升榜</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("dianpudiaoyan/dianpubiaosheng/index");?>">店铺飙升榜</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if ($ul == 'biaoqiandiaoyan'): ?>
                            <li class="active"><a><i class="fa fa-table"></i> 标签调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                            <?php else: ?>
                            <li><a><i class="fa fa-table"></i> 标签调研 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if ($li == 'biaoqiandiaoyan_biaoqian'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("biaoqiandiaoyan/biaoqian/index");?>">标签调研</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("biaoqiandiaoyan/biaoqian/index");?>">标签调研</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'biaoqiandiaoyan_remarkettag'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("biaoqiandiaoyan/remarkettag/index");?>">Remarket Tag</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("biaoqiandiaoyan/remarkettag/index");?>">Remarket Tag</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <!--
                            <?php if ($ul == 'tongjifenxi'): ?>
                            <li class="active"><a><i class="fa fa-bar-chart-o"></i> 统计分析 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                            <?php else: ?>
                            <li><a><i class="fa fa-bar-chart-o"></i> 统计分析 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                            <?php endif; ?>
                                    <?php if ($li == 'tongjifenxi_shichang'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("tongjifenxi/shichang/index");?>">市场统计分析</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("tongjifenxi/shichang/index");?>">市场统计分析</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'tongjifenxi_shangping'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("tongjifenxi/shangping/index");?>">商品销售分析</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("tongjifenxi/shangping/index");?>">商品销售分析</a></li>
                                    <?php endif; ?>
                                    <?php if ($li == 'tongjifenxi_dianpu'): ?>
                                    <li class="current-page"><a href="<?php echo site_url("tongjifenxi/dianpu/index");?>">店铺销售分析</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo site_url("tongjifenxi/dianpu/index");?>">店铺销售分析</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!-- 
                <div class="sidebar-footer hidden-small">
                    <a title="" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
                        <span aria-hidden="true" class="glyphicon glyphicon-cog"></span>
                    </a>
                    <a title="" data-placement="top" data-toggle="tooltip" data-original-title="FullScreen">
                        <span aria-hidden="true" class="glyphicon glyphicon-fullscreen"></span>
                    </a>
                    <a title="" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
                        <span aria-hidden="true" class="glyphicon glyphicon-eye-close"></span>
                    </a>
                    <a title="" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
                        <span aria-hidden="true" class="glyphicon glyphicon-off"></span>
                    </a>
                </div>
                -->
                <!-- /menu footer buttons -->
            </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav role="navigation" class="">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              </ul>
            </nav>
          </div>
        </div>
        <!-- 数据展示 -->
        <div role="main" class="right_col" style="min-height: 3160px;">