<div class="row">
    <div class="col-md-12" style="padding: 4rem 8rem;border: 1px solid #000;width: 80%;margin:4rem 10%;">

        <?php if (!empty($chanpin)): ?>
            
        <form class="form-horizontal" method="post" name="kaihuform" id="qianyueform" action='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/qianyue"); ?>'>
            <input type="hidden" name="shanghuhao" value='<?php echo $shanghuhao;?>'>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                value="<?php echo $this->security->get_csrf_hash()?>" />            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>签约产品</th>
                        <th>佣金基数</th>
                        <th>产品状态</th>
                        <th>签约方式(默认成单数,选中按交易额计算)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($chanpin as $k => $v): ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="chanpinleixing[]" id="chanpinleixing_<?php echo $k ?>" value='<?php echo $k ?>'> <?php echo $v ?>
                            </td>
                            <td><input type="number" step="0.0001" name="jishu_<?php echo $k ?>" id="jishu_<?php echo $k ?>" value=""   min="0"></td>
                            <td><input type="checkbox" name="zhuangtai_<?php echo $k ?>" id="zhuangtai_<?php echo $k ?>" >是否开启</td>
                            <td><input type="checkbox" <?php if ($k==2) { } else {echo "disabled=disabled"; };?> name="qianyuefangshi_<?php echo $k ?>" id="qianyuefangshi_<?php echo $k ?>" >是否按交易额计算</td>
                        </tr>
                        
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">确定</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </div>
        </form>
        <?php else: ?>
        <p style="text-align: center; "> 已无新产品可添加; 请返回<a style="color: greenyellow;" href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/xiangqing/".$shanghuhao);?>
        '>商户详情页</a></p>
        <?php endif ?>
    </div>
</div>
<?php
$this->load->view('page/dbfooter');
?>
