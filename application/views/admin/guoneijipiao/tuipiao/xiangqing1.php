<!-- 弹出框 -- 占座 -->
<div aria-labelledby="win_zhanzuo" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_zhanzuo" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div>
                        退票规则：<span id="refundStipulate"></span>
                    </div>
                    <br />
                    <div>
                        升仓改期：<span id="changeStipulate"></span>
                    </div>
                    <br />
                    <div>
                        是否签转：<span id="modifyStipulate"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 

<!-- 弹出框 -- 查看 -->
<div aria-labelledby="win_yidi" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_yidi" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                      <table class="table">
                            <?php if (!empty($obj) && !empty($obj->yidipingtai) && $obj->yidipingtai != ''): ?>
                            <tbody>
                                <tr>
                                    <td>异地平台名称:</td>
                                    <td><?php echo $obj->yidipingtai; ?></td>
                                </tr>
                                <tr>
                                    <td>采购金额:</td>
                                    <td><?php echo $obj->yidicaigoujine; ?>人民币（元）</td>
                                </tr>
                                <tr>
                                    <td>异地采购单号:</td>
                                    <td><?php echo $obj->yididingdanhao; ?></td>
                                </tr>
                                <tr>
                                    <td>其他说明:</td>
                                    <td><?php echo $obj->yidiqitashuoming; ?></td>
                                </tr>
                            </tbody>
                            <?php endif; ?>
                        </table>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- 弹出框 -- 查看 -->
<div aria-labelledby="win_bendi" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_bendi" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                      <table class="table">
                            <?php if (!empty($obj) && !empty($obj->prn) && $obj->prn != ''): ?>
                            <tbody>
                                <tr>
                                    <td>订座记录PNR:</td>
                                    <td><?php echo $obj->prn; ?></td>
                                </tr>
                                <tr>
                                    <td>采购金额:</td>
                                    <td><?php echo $obj->caigoujine; ?>人民币（元）</td>
                                </tr>
                                <tr>
                                    <td>其他说明:</td>
                                    <td><?php echo $obj->qitashuoming; ?></td>
                                </tr>
                            </tbody>
                            <?php endif; ?>
                        </table>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
           <div aria-labelledby="mymodalLabel2" role="dialog" tabindex="-1" class="modal fade in"
                    id="waicaidingdanxk" style="display: none;">
                    <div role="document" class="modal-dialog" style="width:300px;">
                        <div class="modal-content">
                            <form id='frm_gaoji'>
                            <div class="modal-header">
                                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                                    <span aria-hidden="true">×</span></button>
                                <h4 id="mymodalLabel2" class="modal-title">
                                    外采信息</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <table id="prohighsearchtable" style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: medium; font-weight: bolder;">
                                                        外采平台
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="外采平台" id="chupiaobianma" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: medium; font-weight: bolder;">
                                                        外采订单编号
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="外采订单编号" id="dingdanhao" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: medium; font-weight: bolder;">
                                                        成人票单价
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="成人票单价" id="zhongwenming" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: medium; font-weight: bolder;">
                                                        备注说明
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="备注说明" id="beizhu" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="btn_reseach" type="button">
                                    关闭</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
			<div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size: 30px; margin-bottom: 0px;">
                            退票订单详情</h2>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            <a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>机票订单管理</a> / <a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>退票管理</a> / <a href='#'>退票处理</a></h4>
                    </div>
                </div>
               <?php $CI = & get_instance(); echo form_open('admin/guoneijipiao/tuipiao/tp', array('id' => 'tuipiaoform', 'name' => 'tuipiaoform', 'class' => 'form-signin'));?>
                <!-- 退票成功 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;"><?php echo $obj->dingdanhao; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;">退票处理中</span>
                            </div>
                            <div class="panel-body">
                                <table class="table" style="margin-bottom:0px;">
                                     <tbody>
                                          <tr>
                                              <td>订单来源：<?php echo $obj->dingdanlaiyuan; ?></td>
                                              <!--
                                              <td>创建时间：2016-04-12 12:30:55</td>
                                              -->
                                              <td>支付时间：<?php echo $obj->fukuanshijian; ?></td>
                                              <td>退票时间：<?php echo $obj->chulishijian; ?></td>
                                          </tr>
                                          <tr>
                                              <td>支付渠道：<?php echo $obj->zhifufangshi; ?></td>
                                              <td>订单总价：￥<?php echo $obj->dingdanzonge; ?></td>
                                              <td></td>
                                          </tr>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 详细 -->
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        $index = 1;
						if(!empty($hangcheng))
						{
                        foreach ($hangcheng as $hc): ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;">第 <?php echo $index; ?> 段</span>
                            </div>
                            <div class="panel-body">
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>航程类型</th>
                                              <th>航空公司</th>
                                              <th>航班号</th>
                                              <th>起飞/到达</th>
                                              <th>经停</th>
                                              <?php if (!empty($obj) && !empty($obj->yidipingtai) && $obj->yidipingtai != ''): ?>
                                              <th>异地退票信息</th>
                                              <?php else: ?>
                                              <th>本地BSP打票</th>
                                              <?php endif; ?>
                                          </tr>
                                     </thead>
                                     <tbody>
                                          <tr>
										      <?php if ($hc->wangfanhangcheng == 0): ?>
                                              <td>单程</td>
											  <?php else: ?>
											  <td>往返</td>
											  <?php endif; ?>
                                              <td><?php echo $hc->hangkonggongsi; ?></td>
                                              <td><?php echo $hc->hangbanhao; ?></td>
											  <!-- 
                                              <td>北京首都机场T2 - 上海浦东机场T1  2016-12-12  23:00 - 00:30 +1天</td>
											  -->
											  <td><?php echo $hc->qifeijichang.$hc->qifeihangzhanlou.' - '.$hc->daodajichang.$hc->daodahangzhanlou.' '.$hc->qifeishijian.' '.$hc->daodashijian; ?></td>
											  <?php if ($hc->jingtinglianbiao > 0): ?>
                                                                                          <td>是</td>
											  <?php else: ?>
											  <td>否</td>
											  <?php endif; ?>
                                                                                          <?php if (!empty($obj) && !empty($obj->yidipingtai) && $obj->yidipingtai != ''): ?>
                                                                                          <td><button type="button" class="btn btn-info" id='chakan_a'>查看</button></td>
                                                                                          <?php else: ?>
                                                                                          <td><button type="button" class="btn btn-info" id='chakan_a_bendi'>查看</button></td>
                                                                                          <?php endif; ?>
                                          </tr>
                                     </tbody>
                                </table>
                                <br />
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>乘客类型</th>
                                              <th>乘客数量</th>
                                              <th>舱位</th>
                                              <th>购买价/张</th>
                                              <th>票面价/张</th>
                                              <th>返点</th>
                                              <th>民航基金/张</th>
                                              <th>退票费/张</th>
                                              <th>实际退款/张</th>
                                              <th>出票编码</th>
                                              <th>退改签规则</th>
                                          </tr>
                                     </thead>
                                     <tbody>	
                                         <?php if (!empty($c->shifouertong)): ?>
                                          <tr>
                                              <td><?php echo $c->shifouertong; ?></td>
                                              <td>1人</td>
                                              <td><?php echo $c->cangwei; ?></td>
                                              <td>&yen;<span id='gmjg_<?php echo $c->id; ?>'><?php echo floatval($c->piaomiandanjia) + floatval($c->ranyoushui); ?></span>
                                              </td>
                                              <td>&yen;<?php echo $c->piaomiandanjia; ?></td>
                                              <td>0.5%</td>
                                              <td>&yen;<?php echo $c->ranyoushui; ?></td>
                                              <td><?php echo floatval($c->piaomiandanjia) + floatval($c->ranyoushui) - floatval($tuipiaojine); ?></td>
                                              <td><?php echo $tuipiaojine; ?></td>
                                              <td><?php echo $c->chupiaobianma; ?></td>
                                              <td><button type="button" class="btn btn-warning" onclick="tuigaiqianguize('<?php echo $c->refundStipulate; ?>', '<?php echo $c->changeStipulate; ?>','<?php echo $c->modifyStipulate; ?>');">退改签规则</button></td>
                                          </tr>
                                          <?php endif; ?>
                                     </tbody>
                                </table>
                                <br />
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>乘客类型</th>
                                              <th>乘机人</th>
                                              <th>证件类型</th>
                                              <th>证件号码</th>
                                              <th>出生日期</th>
                                              <th>票号</th>
                                              <th>行程单</th>
                                          </tr>
                                     </thead>
                                     <tbody>
									      <?php
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                                                                                  $CI->load->model("yonghu/mlvkei", "mlvkei");
										  foreach ($hangchenglvkes as $ck): 
                                                                                      ?>
                                          <tr>
										      <?php if ($ck->shifouertong == 0): ?>
                                                                                          <td>成人</td>
											  <?php else: ?>
											  <td>儿童</td>
											  <?php endif; ?>
                                              <td><?php 
											  $lvke = $CI->mlvkei->getObj($ck->lvkeid);
											  if(!empty($lvke) && !empty($lvke->zhongwenming))
											  {
												  echo $lvke->zhongwenming;
											  }
											  else
											  {
												  echo '';
											  }
											  ?></td>
                                              <td><?php $vs = $CI->config->item("证件类型"); echo $vs[intval($ck->zhengjianleixing)]; ?></td>
                                              <td><?php echo $ck->zhengjianhaoma; ?></td>
                                              <td><?php echo date('Y-m-d', strtotime($ck->chushengriqi)); ?></td>
                                              <td><?php echo $ck->piaohao; ?></td>
                                              <td>行程单</td>
                                          </tr>
										  <?php endforeach; ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        $index++;
                        endforeach; 
						}?>
                    </div>
                </div>
                
                </form>
<?php          
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    
    function jishuan(danjia, zhangshu, jieguo) {
            $('#' + jieguo).html(parseFloat($('#' + danjia).html()) - $('#' + zhangshu).val());
            $('#refund_fee').val($('#' + jieguo).html());
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

        $(function () {
		$("#chupiaoform").validate({
				rules: {
                                    <?php if (!empty($hangchenglvke_tongji)): ?>
                                    <?php 
                                    $index1 = 0;
                                    $count1 = count($hangchenglvke_tongji) + count($hangchenglvke);
                                    foreach ($hangchenglvke_tongji as $c): ?>
                                       <?php if (intval($index1) != intval($count1 - 1)): ?>
                                           chupiaobianma_<?php echo $c->id; ?>:{
                                               required:true,
                                               maxlength:50
                                           },
                                       <?php else: ?>
                                           chupiaobianma_<?php echo $c->id; ?>:{
                                               required:true,
                                               maxlength:50
                                           }
                                       <?php endif; ?>
                                    <?php $index1++; endforeach; ?>
                                    <?php endif; ?>
                                        
                                    <?php if (!empty($hangchenglvke)): ?>
                                    <?php 
                                    foreach ($hangchenglvke as $c): ?>
                                       
                                       <?php if (intval($index1) != intval($count1 - 1)): ?>
                                           piaohao_<?php echo $c->id; ?>:{
                                               required:true,
                                               maxlength:50
                                           },
                                       <?php else: ?>
                                           piaohao_<?php echo $c->id; ?>:{
                                               required:true,
                                               maxlength:50
                                           }
                                       <?php endif; ?>
                                                    
                                    <?php $index1++; endforeach; ?>
                                    <?php endif; ?>
				},
				messages: {
                                      <?php if (!empty($hangchenglvke_tongji)): ?>
                                    <?php 
                                    $index1 = 0;
                                    $count1 = count($hangchenglvke_tongji) + count($hangchenglvke);
                                    foreach ($hangchenglvke_tongji as $c): ?>
                                       <?php if (intval($index1) != intval($count1 - 1)): ?>
                                           chupiaobianma_<?php echo $c->id; ?>:{
                                               required:'请填写退票编码',
                                               maxlength:'退票编码不大于 50 个字符'
                                           },
                                       <?php else: ?>
                                           chupiaobianma_<?php echo $c->id; ?>:{
                                               required:'请填写退票编码',
                                               maxlength:'退票编码不大于 50 个字符'
                                           }
                                       <?php endif; ?>
                                    <?php $index1++; endforeach; ?>
                                    <?php endif; ?>
                                        
                                    <?php if (!empty($hangchenglvke)): ?>
                                    <?php 
                                    foreach ($hangchenglvke as $c): ?>
                                       
                                       <?php if (intval($index1) != intval($count1 - 1)): ?>
                                           piaohao_<?php echo $c->id; ?>:{
                                               required:'请填写票号',
                                               maxlength:'票号不大于 50 个字符'
                                           },
                                       <?php else: ?>
                                           piaohao_<?php echo $c->id; ?>:{
                                               required:'请填写票号',
                                               maxlength:'票号不大于 50 个字符'
                                           }
                                       <?php endif; ?>
                                                    
                                    <?php $index1++; endforeach; ?>
                                    <?php endif; ?>
				}
			});
        });
        
        function tuigaiqianguize(refundStipulate, changeStipulate, modifyStipulate)
        {
             $('#win_zhanzuo').modal('show');
             $('#refundStipulate').html(refundStipulate);
             $('#changeStipulate').html(changeStipulate);
             $('#modifyStipulate').html(modifyStipulate);
        }
        
        $(function () {  
		$('#chakan_a').click(function () {
                    $('#win_yidi').modal('show');
                });
                
                $('#chakan_a_bendi').click(function () {
                    $('#win_bendi').modal('show');
                });
        });
        
    </script>
</body>
</html>
