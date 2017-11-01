<div class="row">
    <div class="col-md-12">
        <h2 style="font-size: 30px; margin-bottom: 0px;">
            出票订单详情</h2>
        </div>
        <div class="col-md-12">
            <h4>
                <a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'>火车票售后管理</a> / <a href='<?php echo site_url("admin/huochepiao/chupiao/index"); ?>'>出票管理</a> / <a href='<?php echo site_url("admin/huochepiao/chupiao/xiangqing"); ?>'>出票订单详细</a></h4>
            </div>
        </div>

        <!-- 出票成功 -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-size:18px;"><?php echo $obj->merchant_order_id; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;"><?php echo $obj->statusname; ?></span>
                    </div>
                    <div class="panel-body">
                        <table class="table" style="margin-bottom:0px;">
                            <tbody>
                                <tr>
                                    <td>异地订单号：<?php echo $obj->order_id; ?></td>

                                    <td>创建时间：<?php echo $obj->chuangjianshijian; ?></td>

                                    <td>支付时间：<?php echo $obj->chuangjianshijian; ?></td>
                                    <td>出票时间：<?php echo $obj->out_ticket_time; ?></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>订单来源：<?php echo $obj->dingdanlaiyuan; ?></td> 
                                    <td>支付渠道：<?php echo $obj->zhifufangshi; ?></td> 
                                    <td>订单总价：￥<?php echo $obj->pay_money; ?></td>
                                    <td>退改签规则：<button type="button" class="btn btn-link" data-toggle="modal" data-target="#tuigaiqian">查看</button></td>
                                    <td></td>
                                </tr>
                              <tr <?php if (empty($obj->fail_reason)) {echo "hidden=hidden";} ?>>
                                    <td colspan="4"> 无法出票原因: <?php echo $obj->fail_reason; ?> </td>
                                </tr>								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tuigaiqian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">退改签规则</h4>
            </div>
            <div class="modal-body" style="background-color: #000000;color: #00CC00;">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开车前15天（不含）以上退票的，不收取退票费；票面乘车站开车时间前48小时以上的按票价5%计，24小时以上、不足48小时的按票价10%计，不足24小时的按票价20%计。<br/>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开车前48小时～15天期间内，改签或变更到站至距开车15天以上的其他列车，又在距开车15天前退票的，仍核收5%的退票费。<br/>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;办理车票改签或“变更到站”时，新车票票价低于原车票的，退还差额，对差额部分核收退票费并执行现行退票费标准。<br/>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上述计算的尾数以5角为单位，尾数小于2.5角的舍去、2.5角以上且小于7.5角的计为5角、7.5角以上的进为1元。退票费最低按2元计收。<br/>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;改签或变更到站后的车票乘车日期在春运期间的，退票时一律按开车时间前不足24小时标准核收退票费。
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        </div>
    </div>
</div>
</div>
<!-- 订单详情 -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;"> 出票记录</span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" style="margin-bottom:0px;">
                    <tbody>
                        <tr>

                            <td>车次</td>
                            <td>出发站</td>
                            <td>到达站</td>
                            <td>乘车日期</td>
                            <td>出发/到达</td>
                            <td>历时</td>
                            <td>席别</td>

                        </tr>
                        <tr>
                            <td><?php echo $obj->train_code; ?></td>
                            <td><?php echo $obj->from_station; ?></td>
                            <td><?php echo $obj->arrive_station; ?></td>
                            <td><?php echo $obj->chengcheqiri; ?></td>
                            <td><?php echo $obj->chufa_daoda; ?></td>
                            <td><?php echo $obj->costtime; ?></td>
                            <td><?php echo $obj->seat_type; ?></td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" style="margin-bottom:0px; margin-top: 15px">
                    <tbody>
                        <tr>

                            <td>乘客数量</td>
                            <td>客票购买单价</td>
                            <td>是否购买保险</td>
                            <td>保险渠道</td>
                            <td>保险购买单价</td>
                            <td>是否需要报销</td>
                            <td>报销地址</td>
							<td>联系人</td>
							<td>电话</td>

                        </tr>
                        <tr>
                            <td><?php echo $obj->lvkenum; ?></td>
                            <td><?php echo $obj->ticket_pay_money; ?></td>
                            <td><?php echo $obj->isbuyinsurance; ?></td>
                            <td><?php echo $obj->bx_channel; ?></td>
                            <td><?php echo $obj->insurance; ?></td>
                            <td><?php echo $obj->bx_invoice; ?></td>
                            <td><?php echo $obj->bx_invoice_address; ?></td>
							<td><?php echo $obj->link_name; ?></td>
							<td><?php echo $obj->link_phone; ?></td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" style="margin-bottom:0px; margin-top: 15px">
                    <tbody>
                        <tr>
                            <td>乘客姓名</td>
							<td>乘客类型</td>
                            <td>证件类型</td>
                            <td>证件号码</td>
                            <td>车厢号</td>
                            <td>座位号</td>
                            <td>保单号</td>
                            <td>实际票价</td>
                            <td>客票状态</td>
                        </tr>
						 <?php foreach ($passenslist as $key => $pasenger): ?>
                        <tr>
						
                            <td><?php echo $pasenger->user_name; ?></td>
							<td><?php echo $pasenger->ticket_type== 0?'成人':'儿童'; ?></td>
                            <td><?php echo $pasenger->identityName; ?></td>
                            <td><?php echo $pasenger->user_ids; ?></td>
 
                            <td><?php echo $pasenger->train_box; ?></td>
                            <td><?php echo $pasenger->seat_no; ?></td>
                            <td><?php echo $pasenger->bx_code; ?></td>
                            <td><?php echo $pasenger->shijijiage; ?></td>
                            <td><?php echo $pasenger->ticketStatusName; ?></td>
						

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