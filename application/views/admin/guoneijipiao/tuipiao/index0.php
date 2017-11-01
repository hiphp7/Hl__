<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-7">
                <!-- 产品列显示/隐藏 -->
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        产品列显示/隐藏
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <?php foreach ($li as $i): ?>
                            <li>
                                <input type="checkbox" <?php if ($i->show == true): ?>checked="checked"<?php endif; ?> style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="<?php echo $i->index; ?>" />
                                <?php echo $i->display_name; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <form id='frm_chx'>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button type="button" id="btn_gaojichaxun" class="btn btn-primary">高级查询</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- 弹出框 -- 导出 -->
<div aria-labelledby="gridModalLabel" role="dialog" tabindex="-1" class="modal fade in" id="gridSystemModal" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <h4 id="gridModalLabel" class="modal-title">导出excel</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row excel_content">
                        <?php foreach ($li as $i): ?>
                            <input id="<?php echo $i->name; ?>" type="checkbox" checked="checked" /><label for="<?php echo $i->name; ?>"><?php echo $i->display_name; ?></label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                <button class="btn btn-primary" id="btn_excel" type="button">导出</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- 弹出框 -- 添加 -->
<div aria-labelledby="mymodalLabel2" role="dialog" tabindex="-1" class="modal fade in" id="mymodal2" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <form id='frm_gaoji'>
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 id="mymodalLabel2" class="modal-title">高级查询</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table id="prohighsearchtable" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">出票编码</td>
                                        <td>
                                            <input type="text" placeholder="出票编码" id="chupiaobianma"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">订单编号</td>
                                        <td>
                                            <input type="text" placeholder="订单编号" id="dingdanhao"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">乘客姓名</td>
                                        <td>
                                            <input type="text" placeholder="乘客姓名" id="zhongwenming"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">航程类型</td>
                                        <td>
                                            <select id="wangfanhangcheng">
                                                  <option value="全部">全部</option>
                                                  <option value="0">单程</option>
                                                  <option value="1">往返</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">乘客票号</td>
                                        <td>
                                            <input type="text" placeholder="乘客票号" id="piaohao"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">订单状态</td>
                                        <td>
                                            <select id="dingdanzhuangtai">
                                                  <option value="全部">全部</option>
                                                  <option value="0">等待付款</option>
                                                  <option value="1">等待处理</option>
                                                  <option value="2">开始处理</option>
                                                  <option value="3">处理完成</option>
                                                  <option value="4">暂停出票</option>
                                                  <option value="5">无法出票</option>
                                                  <option value="9">锁单</option>
                                             </select>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">退票类型</td>
                                        <td colspan="3">
                                            <select id="tuipiaoleixing">
                                                  <option value="全部">全部</option>
                                                  <option value="0">自愿退票</option>
                                                  <option value="1">非自愿退票</option>
                                             </select>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">退票日期</td>
                                        <td>
                                            <input type="text" placeholder="" id="chulishijian_begin">
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">至</td>
                                        <td>
                                            <input type="text" placeholder="" id="chulishijian_end">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="reset">重置</button>
                    <button class="btn btn-primary" id="btn_reseach" type="button">查询</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 数据表 -->
<div class="row">
    <table id="dianpudiaoyan" class="table table-striped table-bordered">
        <thead>
            <tr>
                <?php foreach ($li as $i): ?>
                    <th><?php echo $i->display_name; ?></th>
                <?php endforeach; ?>
                    <th>操作</th>
            </tr>
        </thead>
    </table>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    function cleartime() {
	$("#fukuanshijian_begin").val("");
        $("#fukuanshijian_end").val("");
}

function checkProRadio() {
	var id = $("#selectbtn").val();
	if (id == "ids") {
		$("#readioval").val(1);
		$("#searchproinput").attr("placeholder", "输入产品ID查询");
	} else {
		$("#readioval").val(0);
		$("#searchproinput").attr("placeholder", "输入产品关键词查询");
	}
}

function getCookie(name) {
                var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
                if (arr != null)
                    return unescape(arr[2]);
                return null;
            }
var table;
        $(function () {
            table = $('#dianpudiaoyan').DataTable({
			fixedHeader : true,
			pagingType : "simple_numbers", //设置分页控件的模式
			searching : false, //屏蔽datatales的查询框
			aLengthMenu : [10], //设置一页展示10条记录
			bLengthChange : true, //屏蔽tables的一页展示多少条记录的下拉列表
			oLanguage : { //对表格国际化
				sLengthMenu : "每页显示 _MENU_条",
				sZeroRecords : "没有找到符合条件的数据",
				sProcessing : "正在加载请稍候...",
				sInfo : "当前第 _START_ - _END_ 条　共计 _TOTAL_ 条",
				sInfoEmpty : "没有记录",
				sInfoFiltered : "(从 _MAX_ 条记录中过滤)",
				sSearch : "搜索：",
				oPaginate : {
					sFirst : "首页",
					sPrevious : "前一页",
					sNext : "后一页",
					sLast : "尾页"

				}
			},
			processing : true, //打开数据加载时的等待效果
			serverSide : true, //打开后台分页
			ajax : {
				url : '<?php echo site_url("admin/guoneijipiao/tuipiao/all"); ?>',
				dataSrc : "myData",
				type : "post",
				data : function (d) {
                                        var csrf_name = getCookie('csrf_cookie_name');
                                        d.csrf_test_name = csrf_name;
                                        
                                        var chupiaobianma = $.trim($('#chupiaobianma').val());
                                        d.chupiaobianma = chupiaobianma != 'on'? chupiaobianma: '';
                                        
                                        var dingdanhao = $.trim($('#dingdanhao').val());
                                        d.dingdanhao = dingdanhao != 'on'? dingdanhao: '';
                                        
                                        var wangfanhangcheng = $.trim($('#wangfanhangcheng').val());
                                        d.wangfanhangcheng = wangfanhangcheng != 'on' && wangfanhangcheng != '全部'? wangfanhangcheng: '';
                                        
                                        var zhifufangshi = $.trim($('#zhifufangshi').val());
                                        d.zhifufangshi = zhifufangshi != 'on'? zhifufangshi: '';
                                        
                                        var dingdanzhuangtai = $.trim($('#dingdanzhuangtai').val());
                                        d.dingdanzhuangtai = dingdanzhuangtai != 'on'? dingdanzhuangtai: '';
                                        
                                        var fukuanshijian_begin = $.trim($('#fukuanshijian_begin').val());
                                        d.fukuanshijian_begin = fukuanshijian_begin != 'on'? fukuanshijian_begin: '';
                                        
                                        var fukuanshijian_end = $.trim($('#fukuanshijian_end').val());
                                        d.fukuanshijian_end = fukuanshijian_end != 'on'? fukuanshijian_end: '';
				}
			},
			order : [[0, "desc"]],
			columnDefs : [{
					render : function (data, type, row) {
						//var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
						//return str;
                                                return row.dingdanhao;
					},
					targets : 0
				}
			],
			columns : [
                <?php $index = 0; $mycount = count($li); foreach ($li as $i): ?>
                <?php if ($index == $mycount - 1): ?>
                {
                    data: '<?php echo $i->name; ?>',
                    title: '<?php echo $i->display_name; ?>'
                } 
                <?php else: $index++;?>
                {
                    data: '<?php echo $i->name; ?>',
                    title: '<?php echo $i->display_name; ?>'
                }, 
                <?php endif; ?>
                <?php endforeach; ?>
			, {
					data : 'id',
					fnCreatedCell : function (nTd, sData, oData, iRow, iCol) {
                                                // 假如处理完成 就只能查看
						if(oData.chulizhuangtai == '2' || oData.chulizhuangtai == '3')
                                                {
                                                    $(nTd).html("<a id='chakan_a_" + oData.hid + "' href='<?php echo site_url("admin/guoneijipiao/tuipiao/xiangqing/");?>/" + oData.hid + "'>查看</a>");
                                                }
                                                else if(oData.chulizhuangtai == '0')
                                                {
                                                    if(oData.suodan_self == '0' && oData.suodan != '')
                                                    {
                                                        $(nTd).html("已锁单&nbsp;&nbsp;")
                                                              .append("<a id='chakan_a_" + oData.hid + "' href='<?php echo site_url("admin/guoneijipiao/tuipiao/xiangqing/");?>/" + oData.hid + "'>查看</a>&nbsp;&nbsp;");
                                                    }
                                                    if(oData.suodan == '')
                                                    {
                                                       $(nTd).html("<a href='<?php echo site_url("admin/guoneijipiao/tuipiao/index");?>/" + oData.hid + "'>锁单</a>&nbsp;&nbsp;")
                                                             .append("<a id='chakan_a_" + oData.hid + "' href='<?php echo site_url("admin/guoneijipiao/tuipiao/xiangqing/");?>/" + oData.hid + "'>查看</a>&nbsp;&nbsp;");
                                                    }
                                                    else
                                                    {
                                                        $(nTd).html("<a id='chakan_a_" + oData.hid + "' href='<?php echo site_url("admin/guoneijipiao/tuipiao/xiangqing/");?>/" + oData.hid + "'>查看</a>&nbsp;&nbsp;")
                                                              .append("<a id='chuli_a_" + oData.hid + "' href='<?php echo site_url("admin/guoneijipiao/tuipiao/tuipiaochuli/");?>/" + oData.hid + "/"+ oData.tid +"'>处理</a>");
                                                    }
                                                }
					}
				}]

		});
	//显示隐藏列
	$('.toggle-vis').on('change', function (e) {
		e.preventDefault();
		var column = table.column($(this).attr('data-column'));
		column.visible(!column.visible());
	});
        
        //var column = table.column(0);
	//column.visible(!column.visible());
        
	$("#fukuanshijian_begin").datepicker({ //添加日期选择功能
		numberOfMonths : 1, //显示几个月
		showButtonPanel : true, //是否显示按钮面板
		dateFormat : 'yy-mm-dd', //日期格式
		clearText : "清除", //清除日期的按钮名称
		closeText : "关闭", //关闭选择框的按钮名称
		yearSuffix : '年', //年的后缀
		showMonthAfterYear : true, //是否把月放在年的后面
		monthNames : ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
		dayNames : ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
		dayNamesShort : ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
		dayNamesMin : ['日', '一', '二', '三', '四', '五', '六'],
		onSelect : function (selectedDate) { //选择日期后执行的操作
			//alert(selectedDate);
		}
	});
        
        $("#fukuanshijian_end").datepicker({ //添加日期选择功能
		numberOfMonths : 1, //显示几个月
		showButtonPanel : true, //是否显示按钮面板
		dateFormat : 'yy-mm-dd', //日期格式
		clearText : "清除", //清除日期的按钮名称
		closeText : "关闭", //关闭选择框的按钮名称
		yearSuffix : '年', //年的后缀
		showMonthAfterYear : true, //是否把月放在年的后面
		monthNames : ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
		dayNames : ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
		dayNamesShort : ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
		dayNamesMin : ['日', '一', '二', '三', '四', '五', '六'],
		onSelect : function (selectedDate) { //选择日期后执行的操作
			//alert(selectedDate);
		}
	});
	
	$('#btn_gaojichaxun').click(function () {
		document.getElementById('frm_chx').reset();
		document.getElementById('frm_gaoji').reset();
		$('#mymodal2').modal('show');
	});

	// 简单查询
	$('#btn_jian_chaxun, #btn_reseach').click(function () {
                $('#mymodal2').modal('hide');
		search1();
	});
        });
        
        // 查询
function search1() {
	table.ajax.reload();
}
    </script>
</body>
</html>
