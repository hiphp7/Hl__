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
											  <td></td>
                                          </tr>
                                          <tr>
                                              <td>支付渠道：<?php echo $obj->zhifufangshi; ?></td>
                                              <td>订单总价：￥<?php
                            $dingdanzonge = 0;
                            $CI = & get_instance();
                            $sql = 'select count(m.id) * m.dingdanzongjia  as baoxianzongjia from baoxiandingdan as m where m.dingdanid = ?';
                                   $query =  $CI->db->query($sql, $obj->id);
                                    $res = $query->row();
                            echo $obj->dingdanzonge - $res->baoxianzongjia;?></td>
                                              <td>联系人:<?php echo $obj->lianxiren; ?></td>
                                              <td>联系人电话:<?php echo $obj->lianxirendianhua; ?></td>
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
                                              <th>异地出票信息</th>
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
                                                                                          <td>本地BSP打票</td>
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
                                              <th>民航基金/张</th>
                                              <th>复制</th>
                                              <th>出票编码</th>
											  
                                          </tr>
                                     </thead>
                                     <tbody>
									      <?php if (!empty($hangchenglvke_tongji) && $index == 1): ?>
									  <?php foreach ($hangchenglvke_tongji[0] as $c): ?>
                                          <tr>
                                              <td><?php echo $c->shifouertong; ?></td>
                                              <td><?php echo $c->chengkeshuliang; ?>人</td>
                                              <td><?php echo $c->cangwei; ?></td>
                                            <td>&yen;<?php echo floatval($c->piaomiandanjia); ?></td>
                                              <td>&yen;<?php echo $c->piaomianjia; ?></td>
                                              <td>&yen;<?php echo $c->jijianfei; ?></td>
                                              <td><button type="button" class="btn btn-warning" onclick="zhanzuo('<?php echo $c->zanzuo; ?>');">占座指令</button></td>
                                              <td><?php echo $c->chupiaobianma; ?></td>
                                          </tr>
								<?php endforeach; ?>
										  <?php endif; ?>
                                          <?php if (!empty($hangchenglvke_tongji) && $index == 2):?>
                            <?php foreach ($hangchenglvke_tongji[1] as $c): ?>
                                        <tr>
                                            <td><?php echo $c->shifouertong; ?></td>
                                            <td><?php echo $c->chengkeshuliang; ?>人</td>
                                            <td><?php echo $c->cangwei; ?></td>
                                            <td>&yen;<?php echo floatval($c->piaomiandanjia); ?></td>
                                            <td>&yen;<?php echo $c->piaomianjia; ?></td>
                                            <td>&yen;<?php echo $c->jijianfei; ?></td>
                                            <td><button type="button" class="btn btn-warning" onclick="zhanzuo('<?php echo $c->zanzuo; ?>');">占座指令</button></td>
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
											  <th>状态</th>
                                          </tr>
                                     </thead>
                                     <tbody>
									      <?php
                                                                                  if($index == 1)
                                                                                  {
                                                                                  $CI = & get_instance();
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                                                                                  $CI->load->model("yonghu/mlvkei", "mlvkei");
																				  foreach ($hangchenglvke[0] as $ck):
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
											  <td><?php echo $ck->zhuangtai; ?></td>
                                          </tr>
                                                                                  <?php endforeach;} ?>
                                          <?php
                                                                                  if($index == 2)
                                                                                  {
                                                                                  $CI = & get_instance();
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                                                                                  $CI->load->model("yonghu/mlvkei", "mlvkei");
																				  foreach ($hangchenglvke[1] as $ck):
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
											  <td><?php echo $ck->zhuangtai; ?></td>
                                          </tr>
                                                                                  <?php endforeach;} ?>
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
