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
      改签申请详细</h2>
    </div>
    <div class="col-md-12">
      <h4>
        机票订单管理 / 改签申请管理 / 改签申请详细
      </h4>
    </div>
  </div>
  <!-- 出票成功 -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <span style="font-size:18px;"><?php echo $obj_tuipiaodingdan->shenqinghao; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;"><?php 
          $CI = &get_instance();
          $myconfig = $CI->config->item("申请状态");
          echo $myconfig[intval($obj_tuipiaodingdan->chulizhuangtai)]; ?></span>
        </div>
        <div class="panel-body">
          <table class="table" style="margin-bottom:0px;">
           <tbody>
            <tr>
              <td>申请时间：<?php echo $obj_tuipiaodingdan->shenqingriqi; ?></td>
              <td>处理时间：<?php echo $obj_tuipiaodingdan->caozuoshijian; ?></td>
            </tr>
            <tr>
              <td>联系人姓名：<?php echo $obj->lianxiren ; ?></td>
              <td>电话：<?php echo $obj->lianxirendianhua ; ?></td>
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

    if(!empty($hangc))
    { 
      foreach ($hangc as $a): $hc= $a->hangcheng;  $youertong= $a->youertong; $hangchenglvkes = $a->gaiqianlvke; $gaiqianxiangqing = $a->gaiqianxiangqing; $gaiqianshenqing = $a->gaiqianshenqing;?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <span style="font-size:18px;">第 <?php echo $index; ?> 段</span>
          <input type="hidden" id='hangchengid_<?php echo $hc->id; ?>' name='hangchengid_<?php echo $hc->id; ?>' value="<?php echo $hc->id; ?>" />
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
                                            <td><button type="button" class="btn btn-info" id='chakan_a_<?php echo $index; ?>'>查看</button></td>
                                          <?php else: ?>
                                            <td><button type="button" class="btn btn-info" id='chakan_a_bendi_<?php echo $index; ?>'>查看</button></td>
                                          <?php endif; ?>
                                        </tr>
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
                                </tr>
                              </thead>
                              <tbody>
                               <?php
                               $CI = & get_instance();
										  //$this->load->model("yonghu/mlvkei", "mlvkei");
                               $CI->load->model("yonghu/mlvkei", "mlvkei");
                               if(!empty($hangchenglvkes))
                               {
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
                              <?php endforeach;}?>
                          </tbody>
                        </table>
                      </div>
                      <div class="panel-body">
                        <table class="table" style="margin-bottom:0px;">

                           <tbody>
                            <tr>
                              <td colspan="2" >客户申请改签日期：<?php echo $gaiqianshenqing->gaiqianshijian; ?></td>
                              <td colspan="2" >改签类型：<?php echo $gaiqianshenqing->leixing; ?></td>
                            </tr>
                            <tr>
                              <td colspan="4" >说明：<?php echo $gaiqianshenqing->gaiqianyuanyin; ?></td>
                            </tr>
                            <tr>
                              <td>航班日期：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->hangbanriqi: ''; ?></td>
                              <td>起飞时间：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->qifeishijian: ''; ?></td>
                              <td>抵达时间：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->didashijian: ''; ?></td>
                              <td>航班号：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->hangbanhao: ''; ?></td>
                            </tr>
                            <tr>
                              <td>成人舱位：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->chengrencangwei: ''; ?></td>
                              <td>成人单张手续费：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->chengrenshouxufei: ''; ?></td>
                              <td colspan="2">成人单张升舱费：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->chengrenshengcangfei: ''; ?></td>
                            </tr>

                            <tr style="display: <?php echo $youertong ? '' : 'none' ; ?>;">
                              <td>儿童舱位：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->ertongcangwei: ''; ?></td>
                              <td>儿童单张手续费：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->ertongshouxufei: ''; ?></td>
                              <td colspan="2">儿童单张升舱费：<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->ertongshengcangfei: ''; ?></td>
                            </tr>
                            <tr style="display:none;">
                              <td colspan="4">
                                <input type="hidden" id='xqid_<?php echo $index; ?>' name='xqid_<?php echo $index; ?>' value="<?php echo !empty($gaiqianxiangqing)? $gaiqianxiangqing->id: ''; ?>"/>
                                <input type="hidden" id='dingdanid_<?php echo $index; ?>' name='dingdanid_<?php echo $index; ?>' value="<?php echo $dingdanid;?>" />
                                <input type="hidden" id='hangchengid_<?php echo $index; ?>' name='hangchengid_<?php echo $index; ?>' value="<?php echo $hc->id;?>" />
                              </td>
                            </tr>
                                          <!-- 
                                          <tr>
                                              <td colspan="4">
                                                  <input id="wfgq_<?php echo $index; ?>" type="submit" class="btn btn-danger" value="无法改签" />
                                                  <input id="yhqxgq_<?php echo $index; ?>" type="submit" class="btn btn-success" value="用户取消改签" />
                                                  <input id="shtg_<?php echo $index; ?>" type="submit" class="btn btn-info" value="审核通过" />
                                              </td>
                                          </tr>
                                        -->
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
                        <div class="row" style="float:right;display:none;">
                          <input type="hidden" id='shenqingzhuangtai' name='shenqingzhuangtai' value="" />
                          <input id="wfgq" type="submit" class="btn btn-danger" value="无法改签" />
                          <input id="yhqxgq" type="submit" class="btn btn-success" value="用户取消改签" />
                          <input id="shtg" type="submit" class="btn btn-info" value="审核通过" />
                        </div>
                        <input type="hidden" id='gaiqiandingdanid' name='gaiqiandingdanid' value="<?php echo $gaiqiandingdanid;?>" />

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
                
                $('button[id^="chakan_a_"]').click(function () {
                  $('#win_yidi').modal('show');
                });
                
                $('button[id^="chakan_a_bendi_"]').click(function () {
                  $('#win_bendi').modal('show');
                });

              });

            </script>
          </body>
          </html>
