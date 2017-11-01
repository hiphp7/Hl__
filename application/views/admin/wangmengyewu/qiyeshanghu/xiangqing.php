<div aria-labelledby="zhanghu" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="zhanghu" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <form action="">
 
                    <table  style="border:0px;height: 150px;margin: auto;" border="0">
                        <tr>
                            <td>账户信息：</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>收款平台</td>
                            <td><input type="text" name="shoukuanpingtai" id="shoukuanpingtai"></td>
                        </tr>
                        <tr>
                            <td>收款账号</td>
                            <td><input type="text" name="zhanghao" id="zhanghao"></td>
                        </tr>
                        <tr>
                            <td>户主</td>
                            <td><input type="huzhuming" name="" id="huzhuming"></td>
                        </tr>


                    </table>
                    <button  data-dismiss="modal"  class="btn btn-default" type="button" style="float: right;" onclick="changezhanghu()">保存</button>
                </form>

            </div>



        </div>
    </div>
</div> 


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;">商户详情</span>
            </div>
            <div class="panel-body">
                <input type="hidden" name="shanghuhao" id="shanghuhao" value='<?php echo $shanghuhao; ?>'>
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr><td>注册时间：<?php echo $info->chuangjianshijian; ?></td><td>注册邮箱：<?php echo $info->email; ?></td><td>公司名称：<?php echo $info->mingcheng; ?></td></tr>
                        <tr><td>公司联系人：<?php echo $info->name; ?></td><td  colspan="2">公司联系人电话：<?php echo $info->shanghudianhua; ?></td></tr>
                        <tr><td>结算周期：<?php echo $info->qingsuanfangshi; ?></td><td colspan="2">清算时间：<?php echo $info->qingsuanriqi; ?></td></tr>

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
                <span style="font-size:18px;">账户信息</span>
                <span style="font-size:18px; float: right;display:none"><button type="button" class="btn btn-warning" onclick="zhanghu()">修改账户信息</button></span>
            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr><td>收款平台：<span id="shoukuanpingtai_1"><?php echo $zhanghu->shoukuanpingtai; ?></span></td><td>收款账号：<span id="zhanghao_1"><?php echo $zhanghu->zhanghao; ?></span></td><td>收款账户名：<span id="huzhuming_1"><?php echo $zhanghu->huzhuming; ?></span></td></tr>
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
                <span style="font-size:18px;">产品信息</span>
                <span style="font-size:18px; float: right"><a class="btn btn-warning" href='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/addqianyue/".$shanghuhao); ?>' role="button">签约新产品</a></span>

            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px; ">
                    <tbody>
                        <?php foreach ($chanpin as $v): ?>
                            <tr >
                                <td style="line-height:30px;">产品类型：<lable id="leixing"> <?php echo $v->leixing; ?></lable> </td>
                        <td style="line-height:30px;">佣金基数：<lable id="yongjinjishu"> <?php echo $v->yongjinjishu; ?></lable> </td>
                        <td style="line-height:30px">产品状态：<lable id="chanpinzhungtai<?php echo $info->shanghuhao; ?><?php echo $v->chanpinleixing; ?>"> <?php echo $v->chanpinzhungtai; ?></lable> <input style="margin-left: 10px;" class="btn btn-default" type="button" onclick="gaizhungtai(<?php echo $info->shanghuhao; ?>,<?php echo $v->chanpinleixing; ?>)" value="更换状态"></td>
                        </tr>

                    <?php endforeach ?>   

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
                        function gaizhungtai(shanghuhao, chanpinleixing) {
                            if (confirm("你确定修改吗？")) {  

                                $.ajax({
                                    url: '<?php echo site_url("admin/wangmengyewu/qiyeshanghu/gaichanpinzhungtai"); ?>',
                                    type: 'POST',
                                    dataType: 'text',
                                    data: {shanghuhao: shanghuhao, chanpinleixing: chanpinleixing,,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
                                })
                                        .done(function(data) {
                                    if (data != "fasle") {
                                        if (data == "0") {
                                            $("#chanpinzhungtai" + shanghuhao + chanpinleixing).text("禁用");
                                        } else {
                                            $("#chanpinzhungtai" + shanghuhao + chanpinleixing).text("启用");
                                        }
                                    }
                                })
                            }

                        }

                        function zhanghu() {
                            $('#zhanghu').modal('show');
                        }

                        function changezhanghu() {
                            var shanghuhao = $("#shanghuhao").val();
                            var shoukuanpingtai = $("#shoukuanpingtai").val();
                            var zhanghao = $("#zhanghao").val();
                            var huzhuming = $("#huzhuming").val();

                            if (confirm("你确定修改吗？")) {  
                                $.ajax({
                                    url: '<?php echo site_url("admin/wangmengyewu/qiyeshanghu/changezhanghu"); ?>',
                                    type: 'POST',
                                    dataType: 'text',
                                    data: {shanghuhao: shanghuhao, shoukuanpingtai: shoukuanpingtai , zhanghao: zhanghao , huzhuming: huzhuming,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
                                })
                                        .done(function(data) {

                                    if (data != "fasle") {
                                        $("#shoukuanpingtai_1").text(shoukuanpingtai);
                                        $("#zhanghao_1").text(zhanghao);
                                        $("#huzhuming_1").text(huzhuming);


                                    }
                                })

                            }  
                            else {  

                            } 



                        }



</script>
