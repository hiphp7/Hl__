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
               <?php echo form_open('admin/guoneijipiao/tuipiao/tp', array('id' => 'tuipiaoform', 'name' => 'tuipiaoform', 'class' => 'form-signin'));?>
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
                                              <th>异地退票信息</th>
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
                                              <td><a href="#" id='chakan_a'>查看</a></td>
											  <?php else: ?>
											  <td>否</td>
                                              <td><a href="#" id='chakan_a'>查看</a></td>
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
                                          </tr>
                                     </thead>
                                     <tbody>
									      <?php if (!empty($hangchenglvke_tongji)): ?>
									      <?php foreach ($hangchenglvke_tongji as $c):?>
                                          <tr>
                                              <td><?php echo $c->shifouertong; ?></td>
                                              <td><?php echo $c->chengkeshuliang; ?>人</td>
                                              <td><?php echo $c->cangwei; ?></td>
                                              <td>&yen;<span id='gmjg_<?php echo $c->mid; ?>'><?php echo floatval($c->piaomiandanjia) + floatval($ranyoushui); ?></span>
                                                  <input type="hidden" id='input_gmjg_<?php echo $c->mid; ?>' name='input_gmjg_<?php echo $c->mid; ?>' value='<?php echo floatval($c->piaomiandanjia) + floatval($ranyoushui); ?>'/>
                                              </td>
                                              <td>&yen;<?php echo $c->piaomiandanjia; ?></td>
                                              <td>0.5%</td>
                                              <td>&yen;<?php echo $c->jijianfei; ?></td>
                                              <td><input id='chupiaobianma_<?php echo $c->mid; ?>' onkeyup='jishuan("gmjg_<?php echo $c->mid; ?>", "chupiaobianma_<?php echo $c->mid; ?>", "sjtk_<?php echo $c->mid; ?>")' name='chupiaobianma_<?php echo $c->mid; ?>' type="text" placeholder="退票费/张"/></td>
                                              <td><span id='sjtk_<?php echo $c->mid; ?>'></span><input type="hidden" id='input_sjtk_<?php echo $c->mid; ?>' name='input_sjtk_<?php echo $c->mid; ?>'/></td>
                                              <td><?php echo $c->chupiaobianma; ?></td>
                                          </tr>
										  <?php endforeach; ?>
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
                                                                                  $CI = & get_instance();
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                                                                                  $CI->load->model("yonghu/mlvkei", "mlvkei");
										  foreach ($hangchenglvke as $ck): ?>
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
                
                <div class="row">
                    <div style="float:right;">
                         <input type="submit" class="btn btn-danger" value='确定退款'></input>
                    </div>
                </div>
                <input type="hidden" id='hangchengid' value='<?php echo $hangchengid; ?>' name='hangchengid' />
                <input type="hidden" id='dingdanid' value='<?php echo $dingdanid; ?>' name='dingdanid' />
                <input type="hidden" id='tuipiaoid' value='<?php echo $tuipiaoid; ?>' name='tuipiaoid' />
                </form>
<?php          
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    
    function jishuan(danjia, zhangshu, jieguo) {
            $('#' + jieguo).html(parseFloat($('#' + danjia).html()) * $('#' + zhangshu).val());
            $('#input_' + jieguo).val($('#' + jieguo).html());
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
                                           chupiaobianma_<?php echo $c->mid; ?>:{
                                               required:true,
                                               maxlength:50
                                           },
                                       <?php else: ?>
                                           chupiaobianma_<?php echo $c->mid; ?>:{
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
                                           chupiaobianma_<?php echo $c->mid; ?>:{
                                               required:'请填写退票编码',
                                               maxlength:'退票编码不大于 50 个字符'
                                           },
                                       <?php else: ?>
                                           chupiaobianma_<?php echo $c->mid; ?>:{
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
        
    </script>
</body>
</html>
