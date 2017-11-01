                <div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size: 30px; margin-bottom: 0px;">
                            投保处理页</h2>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            保险售后管理 / 订单处理 / 投保处理页
                        </h4>
                    </div>
                </div>
                <!-- 出票成功 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;"><?php
                                $CI = & get_instance();
                                $myconfig_zhifufangshi = $CI->config->item("支付方式");
                                $myconfig_zhengjianleixing = $CI->config->item("证件类型");
                                $myconfig_baoxianleixing = $CI->config->item("保险类型");
                                $myconfig_baoxianzhaungtai = $CI->config->item("保险订单状态");
                                echo $obj->mdingdan->dingdanhao; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;"><?php echo  $myconfig_baoxianzhaungtai[$obj->lst[0]->baodanzhuangtai]; ?></span>
                            </div>
                            <div class="panel-body">
                                <table class="table" style="margin-bottom:0px;">
                                     <tbody>
                                          <tr>
                                              <td>保险类型：<?php echo $myconfig_baoxianleixing[intval($obj->lst[0]->baoxianleixing)]; ?></td>
                                              <td>创建时间：<?php echo $obj->mdingdan->fukuanshijian; ?></td>
                                              <td>支付时间：<?php echo $obj->mdingdan->fukuanshijian; ?></td>
                                          </tr>
                                          <tr>
                                              <td>支付渠道：<?php echo $myconfig_zhifufangshi[intval($obj->mdingdan->zhifufangshi)]; ?></td>
                                              <td>订单总价：￥<?php 
                                              $dingdanzongjia = 0;
                                              foreach ($obj->lst as $c) {
                                                  $dingdanzongjia = floatval($dingdanzongjia) + floatval($c->dingdanzongjia);
                                              }
                                              echo $dingdanzongjia; ?></td>
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
                    <?php echo form_open('admin/guoneijipiao/dingdan/cp', array('id' => 'yidiform', 'name' => 'yidiform')); ?>
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span style="font-size:18px;">被保人信息</span>
                                <input id="baoxian_id" name="baoxian_id" type="hidden" value=""/>
                                <input id="dingdanid" name="dingdanid" type="hidden" value="<?php echo $obj->mdingdan->id; ?>"/>
                                <input id="insurance" name="insurance" type="hidden" value="<?php echo $myconfig_baoxianleixing[intval($obj->lst[0]->baoxianleixing)]; ?>"/>
                            </div>
                            <div class="panel-body">
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>航程类型</th>
                                              <th>航空公司</th>
                                              <th>航班号</th>
                                              <th>起飞/到达</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                          <tr>
                                              <td><?php echo $obj->mhangcheng->wangfan; ?></td>
                                              <td><?php echo $obj->mhangcheng->hangkonggongsi; ?></td>
                                              <td><?php echo $obj->mhangcheng->hangbanhao; ?></td>
                                              <td><?php echo $obj->mhangcheng->qifeijichang.' - '.$obj->mhangcheng->daodajichang.' '.$obj->mhangcheng->qifeishijian.' - '.$obj->mhangcheng->daodashijian; ?></td>
                                          </tr>
                                     </tbody>
                                </table>
                                <br />
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <thead>
                                          <tr>
                                              <th>被保人姓名</th>
                                              <th>证件类型</th>
                                              <th>证件号码</th>
                                              <th>出生日期</th>
                                              <th>保单号</th>
                                              <th>生效日期</th>
                                              <th>保单状态</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($obj->lst as $c): ?>
                                          <tr>
                                              <td><?php echo $c->mhangchenglvke[0]->zhongwenming; ?></td>
                                              <td><?php echo $myconfig_zhengjianleixing[intval($c->mhangchenglvke[0]->zhengjianleixing)]; ?></td>
                                              <td><?php echo $c->mhangchenglvke[0]->zhengjianhaoma; ?></td>
                                              <td><?php echo $c->mhangchenglvke[0]->chushengriqi; ?></td>
                                              <td><?php echo $c->baodanhao; ?><span style="color:red"></span></td>
                                              <td><?php echo $c->shengxiaoriqi; ?><span style="color:red"></span></td>
                                              <td><?php echo $myconfig_baoxianzhaungtai[intval($c->baodanzhuangtai)]; ?></td>
                                          </tr>
                                          <?php endforeach; ?>
                                     </tbody>
                                </table>
                                <br />
                                <table class="table mytable" style="margin-bottom:0px;">
                                     <tbody>
                                          <tr>
                                              <td>外采平台:</td>
                                              <td><?php echo $obj->lst[0]->waicaipingtai; ?><span style="color:red"></span></td>
                                              <td>外采订单编号:</td>
                                              <td><?php echo $obj->lst[0]->waicaidingdanbianhao; ?><span style="color:red"></span></td>
                                          </tr>
                                          <tr>
                                              <td>外采总价:</td>
                                              <td><?php echo $obj->lst[0]->waicaizongjia; ?><span style="color:red"></span></td>
                                              <td>外采备注:</td>
                                              <td><?php echo $obj->lst[0]->waicaibeizhu; ?></td>
                                          </tr>
                                     </tbody>
                                </table>
                                <div class="row">
                                     <div style="float:right;">
                                         <input id="mybaodanhao" name="mybaodanhao" type="hidden"/>
                                         <input id="myshengxiaoriqi" name="myshengxiaoriqi" type="hidden"/>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    function mybaodanhao(baodanhao, baoxianid) {
            this.baodanhao = baodanhao;
            this.baoxianid = baoxianid;
        }
        
        function myshengxiaoriqi(shengxiaoriqi, baoxianid) {
            this.shengxiaoriqi = shengxiaoriqi;
            this.baoxianid = baoxianid;
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
            
            $("#yidiform").validate({
                rules: {
                    waicaipingtai: {
                        required: true,
                        maxlength: 50
                    },
                    waicaidingdanbianhao: {
                        required: true,
                        maxlength: 50
                    },
                    waicaizongjia: {
                        number:true,
						min:0,
                        required: true,
                        maxlength: 50
                    },
                    <?php
                    $sub_index = 0;
                    foreach ($obj->lst as $c): ?>
                 <?php if (intval($sub_index) == intval(count($obj->lst) - 1)): ?>
                    baodanhao_<?php echo $c->id; ?>: {
                        required: true,
                        maxlength: 50
                    },
                    shengxiaoriqi_<?php echo $c->id; ?>: {
                        required: true,
                        maxlength: 50
                    }
                    <?php else: ?>
                    baodanhao_<?php echo $c->id; ?>: {
                        required: true,
                        maxlength: 50
                    },
                    shengxiaoriqi_<?php echo $c->id; ?>: {
                        required: true,
                        maxlength: 50
                    },
                    <?php endif; ?>
                    <?php $sub_index++; endforeach; ?>
                },
                messages: {
                    waicaipingtai: {
                        required: "外采平台不能为空",
                        maxlength: "外采平台不能大于50个字符"
                    },
                    waicaidingdanbianhao: {
                        required: "外采订单编号不能为空",
                        maxlength: "外采订单编号不能大于50个字符"
                    },
                    waicaizongjia: {
                        number: "只能输入整数",
						min:"不能为负数",
                        required: "外采总价不能为空",
                        maxlength: "外采总价不能大于50个字符"
                    },
                    <?php 
                    $sub_index = 0;
                    foreach ($obj->lst as $c): ?>
                    <?php if (intval($sub_index) == intval(count($obj->lst) - 1)): ?>
                    baodanhao_<?php echo $c->id; ?>: {
                        required: "保单号不能为空",
                        maxlength: "保单号不能大于50个字符"
                    },
                    shengxiaoriqi_<?php echo $c->id; ?>: {
                        required: "生效日期不能为空",
                        maxlength: "生效日期不能大于50个字符"
                    }
                    <?php else: ?>
                    baodanhao_<?php echo $c->id; ?>: {
                        required: "保单号不能为空",
                        maxlength: "保单号不能大于50个字符"
                    },
                    shengxiaoriqi_<?php echo $c->id; ?>: {
                        required: "生效日期不能为空",
                        maxlength: "生效日期不能大于50个字符"
                    },
                    <?php endif; ?>
                    <?php $sub_index++;  endforeach; ?>
                 }
             });
            
            $("input[id^='shengxiaoriqi_']").datepicker({//添加日期选择功能  
                        numberOfMonths: 1, //显示几个月  
                                showButtonPanel: true, //是否显示按钮面板  
                                dateFormat: 'yy-mm-dd', //日期格式  
                                clearText: "清除", //清除日期的按钮名称  
                                closeText: "关闭", //关闭选择框的按钮名称  
                                yearSuffix: '年', //年的后缀  
                                showMonthAfterYear: true, //是否把月放在年的后面  
                                monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                                dayNames: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
                                dayNamesShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
                                dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
                                onSelect: function (selectedDate) {//选择日期后执行的操作  
                        //alert(selectedDate);
                        }
                        });
                        
            $('#btn_tijiao').click(function () {
                var result = true;
                var ar = new Array();
                $("input[id^='baodanhao_']").each(function (index) {
                    var cp = new mybaodanhao();
                    cp.baodanhao = $.trim($(this).val());
                    cp.baoxianid = $(this).attr('baoxianid');
                    ar.push(cp);

                });
                var str = JSON.stringify(ar);
                $('#mybaodanhao').val(str);
				
	        // 出票编码
                var ar_cpbm = new Array();
                $("input[id^='shengxiaoriqi_']").each(function (index) {
                    var cp = new myshengxiaoriqi();
                    cp.shengxiaoriqi = $.trim($(this).val());
                    cp.baoxianid = $(this).attr('baoxianid');
                    ar_cpbm.push(cp);

                });
				
	        var str_cpbm = JSON.stringify(ar_cpbm);
                $('#myshengxiaoriqi').val(str_cpbm);		
                return result;
            });
        });
        
    </script>
</body>
</html>
