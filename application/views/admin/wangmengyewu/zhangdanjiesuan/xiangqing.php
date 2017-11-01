<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;">账户信息
                </span>
            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr>
                            <td>收款平台：<?php echo $zhangdan->shoukuanpingtai; ?></td>
                            <td>收款账户：<?php echo $zhangdan->shoukuanzhanghu; ?></td>
                            <td>户主：<?php echo $zhangdan->shoukuanhuzuming; ?></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;">账单信息</span>
                <?php if ($zhangdan->zhuangtai == "0"): ?>

                    <?php if ($jie): ?>

                        <span style="font-size:18px; float: right"><button type="button" class="btn btn-warning" onclick="jiesuan('<?php echo $zhangdan->id; ?>')">结算</button></span>        
                    <?php else: ?>
                        <span style="font-size:18px; float: right">未结算</span>        
                    <?php endif ?>

                <?php else: ?>
                    <span style="font-size:18px; float: right">已结算</span>      
                <?php endif ?>

            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr>
                            <td>账单号：<?php echo $zhangdan->zhangdanhao; ?></td>
                            <td>起始日期：<?php echo $zhangdan->kaishiriqi; ?></td>
                            <td>结束日期：<?php echo $zhangdan->jieshuriqi; ?></td>
                        </tr>
                        <tr>
                            <td>出账日期：<?php echo $zhangdan->chuzhangriqi; ?></td>
                            <td>结算方式：<?php echo $zhangdan->qingsuanfangshi == 0 ? "周结" : "月结"; ?></td>
                            <td></td>
                        </tr>

                        <?php if (isset($mingxi[0]) ): ?>
                            <tr>
                                <td colspan="3">
                                    国内机票订单佣金总额：<?php echo $mingxi[0]; ?> 元

                                </td>
                                <tr>

                                <?php endif ?>
                                <?php if (isset($mingxi[1]) ): ?>
                                    <tr>
                                        <td colspan="3">
                                            火车票订单佣金总额：<?php echo $mingxi[1]; ?> 元

                                        </td>
                                        <tr>

                                        <?php endif ?>
                                        <?php if (isset($mingxi[2]) ): ?>
                                            <tr>
                                                <td colspan="3">
                                                    国内酒店佣金总额：<?php echo $mingxi[2]; ?> 元

                                                </td>
                                                <tr>

                                                <?php endif ?>
                                                <?php if (isset($mingxi[3]) ): ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            机票保险佣金总额：<?php echo $mingxi[3]; ?> 元
                                                        </td>
                                                        <tr>

                                                        <?php endif ?>                                                
                                        <td colspan="3">
                                            佣金总计：<?php echo $zhangdan->yongjinzonge; ?> 元

                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $this->load->view('page/dbfooter');
            ?>

<script>
    function jiesuan(id){
        if (confirm("你确定要结算吗？")) {  
            $.post('<?php echo site_url("admin/wangmengyewu/zhangdanjiesuan/jiesuan"); ?>', {id: id,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(data) {
                if(data != "false"){
                    alert("结算成功");
                    location.reload();
                }else {
                     alert("结算失败");
                }

            });
        }
    }
</script>