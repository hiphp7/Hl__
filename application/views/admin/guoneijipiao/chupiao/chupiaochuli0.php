                <div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size: 30px; margin-bottom: 0px;">
                            出票订单详情</h2>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            <a href="#">机票订单管理</a> / <a href="#">出票管理</a> / <a href="#">出票处理</a></h4>
                    </div>
                </div>
                <!-- 出票成功 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;">GN2016041213024336&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;">出票处理中</span>
                            </div>
                            <div class="panel-body">
                                <table class="table" style="margin-bottom:0px;">
                                     <tbody>
                                          <tr>
                                              <td>订单来源：APP 端</td>
                                              <td>创建时间：2016-04-12 12:30:55</td>
                                              <td>支付时间：2016-04-12 12:30:55</td>
                                              <td>出票时间：2016-04-12 12:30:55</td>
                                          </tr>
                                          <tr>
                                              <td>支付渠道：支付宝</td>
                                              <td>订单总价：￥5000.00</td>
                                              <td></td>
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;">第 1 段</span>
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
                                              <td>单程</td>
                                              <td>南方航空</td>
                                              <td>CZ1885</td>
                                              <td>北京首都机场T2 - 上海浦东机场T1  2016-05-12  23:00 - 00:30 +1天</td>
                                              <td>是</td>
                                              <td>查看</td>
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
                                              <th>复制</th>
                                              <th>出票编码</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                          <tr>
                                              <td>成人</td>
                                              <td>2人</td>
                                              <td>M</td>
                                              <td>&yen;1050</td>
                                              <td>&yen;1000</td>
                                              <td>0.5%</td>
                                              <td>&yen;50</td>
                                              <td>占座指令</td>
                                              <td><input type="text" placeholder="出票编码"/></td>
                                          </tr>
                                          <tr>
                                              <td>儿童</td>
                                              <td>1人</td>
                                              <td>Y</td>
                                              <td>&yen;550</td>
                                              <td>&yen;500</td>
                                              <td>0.5%</td>
                                              <td>&yen;50</td>
                                              <td>占座指令</td>
                                              <td><input type="text" placeholder="出票编码"/></td>
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
                                          <tr>
                                              <td>成人</td>
                                              <td>李美林</td>
                                              <td>身份证</td>
                                              <td>322510196505108850</td>
                                              <td>1965-05-10</td>
                                              <td><input type="text" placeholder="票号"/></td>
                                          </tr>
                                          <tr>
                                              <td>儿童</td>
                                              <td>李梦琪</td>
                                              <td>身份证</td>
                                              <td>322510196505108850</td>
                                              <td>2013-02-08</td>
                                              <td><input type="text" placeholder="票号"/></td>
                                          </tr>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="float:right;">
                         <button type="button" class="btn btn-danger">保存</button>
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

        $(function () {
            
        });
        
    </script>
</body>
</html>
