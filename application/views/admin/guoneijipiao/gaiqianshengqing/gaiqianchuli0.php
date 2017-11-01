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
			<div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size: 30px; margin-bottom: 0px;">
                            出票订单详情</h2>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            <a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>机票订单管理</a> / <a href='<?php echo site_url("admin/guoneijipiao/chupiao/index"); ?>'>出票管理</a> / <a href='<?php echo site_url("admin/guoneijipiao/chupiao/xiangqing"); ?>'>出票订单详细</a></h4>
                    </div>
                </div>
               <?php echo form_open('admin/guoneijipiao/gaiqianshengqing/gq', array('id' => 'gaiqianshengqingform', 'name' => 'gaiqianshengqingform', 'class' => 'form-signin'));?>
                <!-- 出票成功 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;"><?php echo $obj->dingdanhao; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;"><?php echo $obj->chupiaozhuangtai; ?></span>
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
                                              <td>出票时间：<?php echo $obj->chulishijian; ?></td>
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
                                <!--
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
                                              <th>复制</th>
                                              <th>出票编码</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                          <?php if (!empty($c)): ?>
                                          <tr>
                                              <td><?php echo $c->shifouertong; ?></td>
                                              <td><?php echo $c->chengkeshuliang; ?>人</td>
                                              <td><?php echo $c->cangwei; ?></td>
                                              <td>&yen;</td>
                                              <td>&yen;<?php echo $c->piaomiandanjia; ?></td>
                                              <td>0.5%</td>
                                              <td>&yen;<?php echo $c->jijianfei; ?></td>
                                              <td>占座指令</td>
                                              <td><?php echo $c->chupiaobianma; ?></td>
                                          </tr>
                                          <?php endif; ?>
                                     </tbody>
                                </table>
                                <br />
                                -->
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>乘客类型</th>
                                              <th>乘机人</th>
                                              <th>证件类型</th>
                                              <th>证件号码</th>
                                              <th>出生日期</th>
                                              <th>票号</th>
                                          </tr>
                                     </thead>
                                     <tbody>
									      <?php
                                                                                  $CI = & get_instance();
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                                                                                  $CI->load->model("yonghu/mlvkei", "mlvkei");
										  foreach ($hangchenglvkes as $ck): ?>
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
                                              <td><?php echo $ck->zhengjianleixing; ?></td>
                                              <td><?php echo $ck->zhengjianhaoma; ?></td>
                                              <td><?php echo date('Y-m-d', strtotime($ck->chushengriqi)); ?></td>
                                              <td><?php echo $ck->piaohao; ?></td>
                                          </tr>
										  <?php endforeach; ?>
                                     </tbody>
                                </table>
                            </div>
                            <div class="panel-body">
                                <table class="table" style="margin-bottom:0px;">
                                     <tbody>
                                          <tr>
                                              <td colspan="4">客户申请改签日期：<?php echo $gaiqian_obj->shenqingriqi; ?></td>
                                          </tr>
                                          <tr>
                                              <td>航班日期：<input type="text" id="hangbanriqi" name="hangbanriqi"/></td>
                                              <td>起飞时间：<input type="text" id="qifeishijian" name="qifeishijian"/></td>
                                              <td>抵达时间：<input type="text" id="didashijian" name="didashijian"/></td>
                                              <td>航班号：<input type="text" id="hangbanhao" name="hangbanhao"/></td>
                                          </tr>
                                          <tr>
                                              <td>成人舱位：<input type="text" id="chengrencangwei" name="chengrencangwei"/></td>
                                              <td>成人单张手续费：<input type="text" id="chengrenshouxufei" name="chengrenshouxufei"/></td>
                                              <td colspan="2">成人单张升舱费：<input type="text" id="chengrenshengcangfei" name="chengrenshengcangfei"/></td>
                                          </tr>
                                          <tr>
                                              <td>儿童舱位：<input type="text" id="ertongcangwei" name="ertongcangwei"/></td>
                                              <td>儿童单张手续费：<input type="text" id="ertongshouxufei" name="ertongshouxufei"/></td>
                                              <td colspan="2">儿童单张升舱费：<input type="text" id="ertongshengcangfei" name="ertongshengcangfei"/></td>
                                          </tr>
                                          <tr style="display:none;">
                                              <td colspan="4">
                                                  <input type="hidden" id='gaiqianid' name='gaiqianid' value="<?php echo $gaiqianid;?>" />
                                                  <input type="hidden" id='shenqingzhuangtai' name='shenqingzhuangtai' value="" />
                                              </td>
                                          </tr>
                                          <tr>
                                              <td colspan="4">
                                                  <input id="wfgq" type="submit" class="btn btn-danger" value="无法改签" />
                                                  <input id="yhqxgq" type="submit" class="btn btn-success" value="用户取消改签" />
                                                  <input id="shtg" type="submit" class="btn btn-info" value="审核通过" />
                                              </td>
                                          </tr>
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
                // 无法改签
		$('#wfgq').click(function () {
                      $('#shenqingzhuangtai').val('5');
                });
                
                // 用户取消改签
                $('#yhqxgq').click(function () {
                      $('#shenqingzhuangtai').val('6');
                });
                
                // 审核通过
                $('#shtg').click(function () {
                      $('#shenqingzhuangtai').val('2');
                });
                
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
