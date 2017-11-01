<!--面包导航-->
<ol class="daohangtiao">
    <li><a href="">首页</a></li>
    <li><a href="">佣金结算</a></li>
    <li class="active">账单详情</li>
</ol>
<div class="zhangdan">
    <span >账单号：</span><span><?php echo $info->zhangdanhao; ?></span> 
    <span class="zhangdan_span">出账日期：</span><span><?php echo $info->chuzhangriqi; ?></span> 
    <span class="zhangdan_span">结算方式：</span><span><?php echo $info->qingsuanfangshi; ?></span> 
    <span class="zhangdan_span">订单状态：</span><span><?php echo $info->zhuangtai; ?></span> 
    <!-- <button type="button" class="btn lianjie_btn daochu"  style="float: right;">打印账单</button>  -->
    
    <div class="panel-default" style=" border: 0; margin-top:80px;">
        <div class="panel-heading">
            <ul class="list-inline zhangdan_ul">
                <li>账单起始日期</li>
                <li>账单截止日期</li>
                <li>佣金总计(元)</li>
                <li>结算时间</li>
                <li>结算操作员</li>
            </ul>
        </div>
        <div class="panel-body">
            <ul class="list-inline zhangdan_ul">
                <li><?php echo $info->kaishiriqi; ?></li>
                <li><?php echo $info->jieshuriqi; ?></li>
                <li style="color: #73ccd2"><?php echo $info->yongjinzonge; ?></li>
                <li><?php echo $info->jiesuanshijian; ?></li>
                <li><?php echo $info->xingming; ?></li>
            </ul>
        </div>
    </div>
    <?php foreach ($mingxi as  $v): ?>
    <div class="panel-default" style=" border: 0; margin-top:80px;">
    <?php if ($v->leixing==0 && $v->qianyuefangshi==0): ?>
        <h3><?php echo $v->leixingmingcheng ;?></h3>
            <span>结算公式：佣金总额=(账期内出票总数-账期内退票总数)*佣金基数</span>
            <div class="panel-heading">
                <ul class="list-inline jipiao_ul">
                    <li>出票总数</li>
                    <li>退票总数</li>
                    <li>当期佣金基数</li>
                    <li>当期佣金总额(元)</li>
                </ul>
            </div>
            <div class="panel-body">
                <ul class="list-inline jipiao_ul">
                    <li><?php echo $v->chuhuoshu ;?></li>
                    <li><?php echo $v->tuihuoshu ;?></li>
                    <li><?php echo $v->yongjinjishu ;?></li>
                    <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                </ul>
            </div>
        </div>
        
    <?php elseif($v->leixing==1 && $v->qianyuefangshi==0): ?>
        <h3><?php echo $v->leixingmingcheng ;?></h3>
            <span>结算公式：佣金总额=(账期内出票总数-账期内退票总数)*佣金基数</span>
            <div class="panel-heading">
                <ul class="list-inline jipiao_ul">
                    <li>出票总数</li>
                    <li>退票总数</li>
                    <li>当期佣金基数</li>
                    <li>当期佣金总额(元)</li>
                </ul>
            </div>
            <div class="panel-body">
                <ul class="list-inline jipiao_ul">
                    <li><?php echo $v->chuhuoshu ;?></li>
                    <li><?php echo $v->tuihuoshu ;?></li>
                    <li><?php echo $v->yongjinjishu ;?></li>
                    <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                </ul>
            </div>
        </div>

    <?php elseif($v->leixing==2 && $v->qianyuefangshi==0): ?>
        <h3><?php echo $v->leixingmingcheng ;?></h3>
            <span>结算公式：佣金总额=间夜数*佣金基数</span>
            <div class="panel-heading">
                <ul class="list-inline jipiao_ul">
                    <li>间夜数</li>
 
                    <li>当期佣金基数</li>
                    <li>当期佣金总额(元)</li>
                </ul>
            </div>
            <div class="panel-body">
                <ul class="list-inline jipiao_ul">
                    <li><?php echo $v->chuhuoshu ;?></li>
                    <li><?php echo $v->yongjinjishu ;?></li>
                    <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                </ul>
            </div>
        </div>

        <?php elseif($v->leixing==0 && $v->qianyuefangshi==1): ?>
            <h3><?php echo $v->leixingmingcheng ;?></h3>
                <span>结算公式：佣金总额=(账期内出票总额-账期内退票总额)*佣金基数</span>
                <div class="panel-heading">
                    <ul class="list-inline jipiao_ul">
                        <li>账期内出票总额</li>
                        <li>账期内退票总额</li>
                        <li>当期佣金基数</li>
                        <li>当期佣金总额(元)</li>
                    </ul>
                </div>
                <div class="panel-body">
                    <ul class="list-inline jipiao_ul">
                        <li><?php echo $v->chuhuoshu ;?></li>
                        <li><?php echo $v->tuihuoshu ;?></li>
                        <li><?php echo (floatval($v->yongjinjishu)*100 . "%") ;?></li>
                        <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                    </ul>
                </div>
            </div>
            
        <?php elseif($v->leixing==1 && $v->qianyuefangshi==1): ?>
            <h3><?php echo $v->leixingmingcheng ;?></h3>
                <span>结算公式：佣金总额=(账期内出票总额-账期内退票总额)*佣金基数</span>
                <div class="panel-heading">
                    <ul class="list-inline jipiao_ul">
                        <li>账期内出票总额</li>
                        <li>账期内退票总额</li>
                        <li>当期佣金基数</li>
                        <li>当期佣金总额(元)</li>
                    </ul>
                </div>
                <div class="panel-body">
                    <ul class="list-inline jipiao_ul">
                        <li><?php echo $v->chuhuoshu ;?></li>
                        <li><?php echo $v->tuihuoshu ;?></li>
                        <li><?php echo (floatval($v->yongjinjishu)*100 . "%") ;?></li>
                        <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                    </ul>
                </div>
            </div>

        <?php elseif($v->leixing==2 && $v->qianyuefangshi==1): ?>
            <h3><?php echo $v->leixingmingcheng ;?></h3>
                <span>结算公式：佣金总额=账单内总额*佣金基数</span>
                <div class="panel-heading">
                    <ul class="list-inline jipiao_ul">
                        <li>账单内总额</li>        
                        <li>当期佣金基数</li>
                        <li>当期佣金总额(元)</li>
                    </ul>
                </div>
                <div class="panel-body">
                    <ul class="list-inline jipiao_ul">
                        <li><?php echo $v->chuhuoshu ;?></li>
                        <li><?php echo (floatval($v->yongjinjishu)*100 . "%") ;?></li>
                        <li style="color: #73ccd2"><?php echo $v->yongjine ;?></li>
                    </ul>
                </div>
            </div> 
        
    <?php else : ?>

        
    <?php endif ?>
     
    <?php endforeach ?>
    
<?php
$this->load->view('page/wmfooter');
?>
