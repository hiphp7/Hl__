<div class="row">
    <div class="col-md-12">
        <h2 style="font-size: 30px; margin-bottom: 0px;">
            产品配置
        </h2>
    </div>
    <div class="col-md-12">
        <h4>
            <a >平台管理</a> / <a>产品配置</a>
        </h4>
    </div>
</div>

<div class="row">
    <table id="dianpudiaoyan" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td hidden="hidden">id</td>
                <td>产品类型</td>
                <td>业务类型</td>
                <td>上班时间</td>
                <td>下班时间</td>
                <td>周期</td>
                <td>操作</td>
            </tr>
            
            <?php foreach ($peizhi as $v): ?>
                <tr>
                    <td  hidden="hidden"><?php echo  $v->id; ?></td>
                    <td><?php echo  $v->chanpinleixing; ?></td>
                    <td><?php echo  $v->yewuleixing; ?></td>
                    <td><?php echo  $v->shangbanshijian; ?></td>
                    <td><?php echo  $v->xiabanshijian; ?></td>
                    <td><?php echo  $v->zhouqi; ?></td>
                    <td><a href="<?php echo site_url("admin/pingtaiguanli/chanpinpeizhi/edit/$v->id"); ?>" class="btn btn-primary btn-lg active" role="button">编辑</a></td>
                </tr>
            <?php endforeach ?>

            
        </thead>
    </table>
</div>