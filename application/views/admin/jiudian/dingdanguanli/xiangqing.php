<!-- 弹出框 -- 占座 -->
<div aria-labelledby="win_zhanzuo" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_zhanzuo" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid" id="doc_zhanzuo">
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 

<!-- 订单信息 -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;">订单信息</span>
            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr>
                            <td>订单编号：<?php echo $obj->affiliateConfirmationId; ?><span style="color:red"><?php echo $obj->dingdanzhuangtai; ?></span></td>
                            <!--
                            <td>创建时间：2016-04-12 12:30:55</td>
                            -->
                            <td>支付方式：<?php echo $obj->zhifufangshi; ?></td>
                            <td>采购渠道：<?php echo $obj->caigouqudao; ?></td>
                        </tr>
                        <tr>
                            <td>产品类型：<?php echo $obj->chanpinleixing; ?></td>
                            <td>创建时间：<?php echo $obj->xiadanshijian; ?></td>
                            <td>支付时间：<?php echo $obj->fukuanshijian; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- 入住信息 -->
<div class="row">
    <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-size:18px;">入住信息</span>
                    </div>
                    <div class="panel-body">
                        <table class="table mytable" style="margin-bottom:0px;">
                            <tbody>
                                <tr>
                                    <td>酒店名称：<?php echo $obj->hotelname; ?></td>
                                    <!--
                                    <td>创建时间：2016-04-12 12:30:55</td>
                                    -->
                                    <td>入住时间：<?php echo $obj->arrivalDate; ?></td>
                                    <td>房间数量：<?php echo $obj->numberOfRooms; ?></td>
                                </tr>
                                <tr>
                                    <td>入住房型：<?php echo $obj->roomtype; ?></td>
                                    <td>离店时间：<?php echo $obj->departureDate; ?></td>
                                    <td>入住人：<?php echo $obj->ordername; ?></td>

                                </tr>
                                <tr>
                                    <td>联系电话：<?php echo $obj->Mobile; ?></td>
                                </tr>
                            </tbody>
                        </table>                              
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- 订单金额明细 -->
            <div class="col-md-5">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <span style="font-size:18px;">订单金额明细</span>
                </div>
                <div class="panel-body">
                    <table class="table mytable" style="margin-bottom:0px;">
                        <tbody>
                            <tr>
                                <td>货币类型：<?php echo $obj->currencyCode; ?></td>
                                <!--
                                <td>创建时间：2016-04-12 12:30:55</td>
                                -->
                                <td>订单总价：<?php echo $obj->totalCost; ?></td>
                            </tr>
                            <tr>
                                <td>酒店费用：<?php echo $obj->hotelcost; ?></td>
                                <td>报销费用：<?php echo $obj->baoxiaofei; ?></td>

                            </tr>
                            <tr>
                                <td>优惠金额：<?php echo $obj->youhuijine; ?></td>
                                <td>实际支付金额：<?php echo $obj->totalCost; ?></td> 
                            </tr>
                        </tbody>
                    </table>                              
                </div>
            </div>
			</div>
            <!--报销处理 -->
            <div class="col-md-7">
                <?php
                 if($obj->ismail == "是"){
                     
                ?>
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <span style="font-size:18px;">报销处理</span>
                </div>
                <div class="panel-body">
                    <table class="table mytable" style="margin-bottom:0px;">
					<!--
                        <tbody>
                            <tr>
                                <td>收件人：<?php echo $obj->shoujianren; ?></td>
                            </tr>
                            <tr>
                                <td>收件地址：<?php echo $obj->address; ?></td>                                             
                            </tr>
                            <tr>
                                <td>联系电话：<?php echo $obj->shoujianmobile; ?></td>
                            </tr>
                        </tbody>
					-->	
						<tbody>
							<tr>
								<td>
								  <div style="float:left; width:50%;">收件人：<?php echo $obj->shoujianren; ?></div>
								  <div style="float:left; width:10%;">
									<div class="baoxiao_hide">快递公司:</div>
								  </div>
								  <div style="float:left; width:20%;">
									<input id="kuaidigongsi"  type="text" style="width:100%; max-height:16px;" class="text baoxiao_hide">
									<div class="kuaidigongsi_text"></div>
								  </div>
								  <div style="float:left; width:20%;"></div>
								</td>
							</tr>
							<tr>
								<td>
								  <div style="float:left; width:50%;">收件地址：<?php echo $obj->address; ?></div>
								  <div style="float:left; width:10%;">
									<div class="baoxiao_hide">快递成本:</div>
								  </div>
								  <div style="float:left; width:20%;">
									<input id="kuaidichengben" type="text" style="width:100%; max-height:16px;" class="text baoxiao_hide">
									<div class="kuaidichengben_text"></div>
								  </div>
								  <div style="float:left; width:20%;"></div>
								</td>                                             
							</tr>
							<tr>
								<td style="padding-top: 0;padding-bottom: 0;">
									<div style="float:left;width:50%;margin: 8px 0;">联系电话：15218735826</div>
									<div style="float:left;width:10%;margin: 8px 0;">
										<div class="baoxiao_hide">运单号:</div>
									</div>
									<div style="float:left;width:20%;margin: 8px 0;">
										<input id="yundanhao" type="text" style="width:100%; max-height:16px;" class="text baoxiao_hide">
										<div class="yundanhao_text"></div>
									</div>
									<div style="float:left;width:20%;text-align: right;">
										<button class="btn operation" onclick="operation()"
										style="width: 40px;height: 26px;line-height: 26px;padding: 0;
												position: relative;top: 5px;background: orange;color: white;">
										操作
										</button>
										<button class="btn baocun" onclick="save()"
										style="width: 40px;height: 26px;line-height: 26px;padding: 0;
												position: relative;top: 5px;background: orange;color: white;">
										保存
										</button>
										<button class="btn cancel" onclick="cancel()"
										style="width: 40px;height: 26px;line-height: 26px;padding: 0;
												position: relative;top: 5px;background: #ccc; color: white;">
										取消
										</button>
									</div>
								</td>
							</tr>
                        </tbody>
                    </table>                              
                </div>
            </div>
                <?php
                      
						}?>
        </div>

<style type="text/css">
	.baoxiao_hide{ display:none;}
	.baocun{ display:none;}
	.kuaidigongsi_text{display:none;}
	.kuaidichengben_text{display:none;}
	.yundanhao_text{display:none;}
</style>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
	//操作按钮 显示输入框
	function operation(){
		$('.baoxiao_hide').show();
		//隐藏操作后保存的text
		$('.kuaidigongsi_text').hide();
		$('.kuaidichengben_text').hide();
		$('.yundanhao_text').hide();
	}
	//输入框按下键盘时显示保存按钮
	$(".text ").keyup(function() {
		$('.baocun').show();
		$('.operation').hide();
	})
	//取消
	function cancel(){
		$('.baoxiao_hide').hide();
		$('.baocun').hide();
		$('.operation').show();
		//隐藏操作后保存的text
		$('.kuaidigongsi_text').hide();
		$('.kuaidichengben_text').hide();
		$('.yundanhao_text').hide();
	}	
	//保存
	function save(){
		
		
		var kuaidigongsi = $('#kuaidigongsi').val();
		var kuaidichengben = $('#kuaidichengben').val();
		var yundanhao = $('#yundanhao').val();
		
		if(kuaidigongsi !='' && kuaidichengben !='' && yundanhao !=''){
			$('.baocun').hide();
			$('.operation').show();
			$('.text').hide();
			
			$('.kuaidigongsi_text').text(kuaidigongsi);
			$('.kuaidigongsi_text').show();	
			
			$('.kuaidichengben_text').text(kuaidichengben);
			$('.kuaidichengben_text').show();
			
			$('.yundanhao_text').text(yundanhao);
			$('.yundanhao_text').show();
		}else{
			alert('输入不能为空');
			$('.baocun').show();
			$('.operation').hide();
			$('.text').show();
		}

	
		
		
		
	}
	
	
    function cleartime() {
        $("#fukuanshijian_begin").val("");
        $("#fukuanshijian_end").val("");
    }

    function getCookie(name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null)
            return unescape(arr[2]);
        return null;
    }

    function zhanzuo(str)
    {
        $('#win_zhanzuo').modal('show');
        $('#doc_zhanzuo').html(str + '&#92;KI');
    }


    $(function () {
        $('#chakan_a').click(function () {
            $('#win_yidi').modal('show');
        });
    });

</script>
</body>
</html>
