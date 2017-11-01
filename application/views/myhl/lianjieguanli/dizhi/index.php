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
                <!-- 导出excel -->
                <button type="button" data-target="#mymodal2" data-toggle="modal" class="btn btn-success">添加渠道</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
        </div>
    </div>

</div>

<!-- 弹出框 -- 添加 -->
<div aria-labelledby="mymodalLabel2" role="dialog" tabindex="-1" class="modal fade in" id="mymodal2" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <form id='frm_gaoji'>
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 id="mymodalLabel2" class="modal-title">添加连接地址</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table id="prohighsearchtable" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">渠道名称：</td>
                                        <td>
                                            <div style="width: 100%;" class="">
                                                <input type="text" placeholder="渠道名称" id="qudao" name='qudao' class="form-control no-left-border form-focus-red"/>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="reset">重置</button>
                    <button class="btn btn-primary" id="btn_save" type="button">添加</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 弹出框 -- 修改 -->
<div aria-labelledby="mymodalLabel_update" role="dialog" tabindex="-1" class="modal fade in" id="mymodal_update" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <form id='frm_gaoji'>
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 id="mymodalLabel_update" class="modal-title">修改连接地址</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table id="prohighsearchtable" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">渠道名称：</td>
                                        <td>
                                            <div style="width: 100%;" class="">
                                                <input type="text" placeholder="渠道名称" id="qudao_update" name='qudao_update' class="form-control no-left-border form-focus-red"/>
                                            </div>
                                            <input type="hidden" id="sanfang_id" name="sanfang_id" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="reset">重置</button>
                    <button class="btn btn-primary" id="btn_update" type="button">修改</button>
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
        <tbody>
        </tbody>
    </table>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    function cleartime() {
	$("#id-date-range-picker-1").val("");
}

function editFun(id, qudao)
{
    $("#sanfang_id").val(id);
    $("#qudao_update").val(qudao);
    $('#mymodal_update').modal('show');
}

function deleteFun(id)
{
    $.post('<?php echo site_url("myhl/lianjieguanli/dizhi/del"); ?>', {csrf_test_name: $.trim(getCookie('csrf_cookie_name')), id: id}, function (data) { 
                       if(data == -1)
                       {
                           alert('渠道删除失败！');
                       }
                       else
                       {
                           search1();
                       }
                });
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
				url : '<?php echo site_url("myhl/lianjieguanli/dizhi/all"); ?>',
				dataSrc : "myData",
				type : "post",
				data : function (d) {
                                        var csrf_name = getCookie('csrf_cookie_name');
                                        d.csrf_test_name = csrf_name;
				}
			},
			order : [[0, "desc"]],
			columnDefs : [{
					render : function (data, type, row) {
						//var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
						//return str;
                                                return row.qudao;
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
						$(nTd).html("<a href='javascript:void(0);' " +
							"onclick=\"editFun('" + oData.id + "', '" + oData.qudao + "')\">编辑</a>&nbsp;&nbsp;")
						.append("<a href='javascript:void(0);' onclick='deleteFun(" + sData + ")'>删除</a>");
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
        
	$("#id-date-range-picker-1").datepicker({ //添加日期选择功能
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
        
        $('#btn_save').click(function () {
                $.post('<?php echo site_url("myhl/lianjieguanli/dizhi/save"); ?>', {csrf_test_name: $.trim(getCookie('csrf_cookie_name')), qudao: $.trim($('#qudao').val())}, function (data) { 
                       $('#mymodal2').modal('hide');
                       if(data == -1)
                       {
                           alert('已有渠道不能添加了！');
                       }
                       else
                       {
                           search1();
                       }
                });
                
	});
        
        $('#btn_update').click(function () {
                $.post('<?php echo site_url("myhl/lianjieguanli/dizhi/update"); ?>', {csrf_test_name: $.trim(getCookie('csrf_cookie_name')), qudao: $.trim($('#qudao_update').val()),
                id:$.trim($('#sanfang_id').val())}, function (data) { 
                       $('#mymodal_update').modal('hide');
                       if(data == -1)
                       {
                           alert('已有渠道不能修改了！');
                       }
                       else
                       {
                           search1();
                       }
                });
                
	});
        
        });
        
        // 查询
function search1() {
	table.ajax.reload();
}
</script>   
</body>
</html>
