<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>航旅投资后台管理</title>

        <!-- Bootstrap -->
        <link href="http://112.74.171.99/hl/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="http://112.74.171.99/hl/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="http://112.74.171.99/hl/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="http://112.74.171.99/hl/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- jVectorMap -->
        <link href="http://112.74.171.99/hl/production/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

        <!-- datatables -->
        <link href="http://112.74.171.99/hl/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
        <link href="http://112.74.171.99/hl/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
        <link href="http://112.74.171.99/hl/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
        <link href="http://112.74.171.99/hl/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
        <link href="http://112.74.171.99/hl/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>

        <link href="http://112.74.171.99/hl/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="http://112.74.171.99/hl/build/css/custom.min.css" rel="stylesheet">
        <link href="http://112.74.171.99/hl/resources/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
        <link href="http://112.74.171.99/hl/resources/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet" />
        <link href="http://112.74.171.99/hl/resources/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet" />
        
        <style type="text/css">
        .row_selected
        {
            background-color:#d9dee4
            }
    </style>
    </head>
    <body class="nav-md">

        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="http://112.74.171.99/hl/resources/g_img/aukey.png" alt="" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>欢迎使用</span>
                                <h2></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br/>

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section active">
                                <h3>&nbsp;</h3>
                                <ul style="" class="nav side-menu">
                                                                        <li class="active">
                                        <a><i class="fa"></i> 接入管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: block;">
                                                                                                                            <li class="current-page"><a href='http://112.74.171.99/hl/index.php/myhl/lianjieguanli/dizhi/index'>生成连接地址</a></li>
                                                                                                                                    <li><a href='http://112.74.171.99/hl/index.php/myhl/lianjieguanli/zhangdan/index'>生成对账单</a></li>
                                                                                                                                    <li><a href='http://112.74.171.99/hl/index.php/myhl/lianjieguanli/duijie/index'>设置对接</a></li>
                                                                                                                                    <li><a href='http://112.74.171.99/hl/index.php/myhl/lianjieguanli/yue/index'>查看余额</a></li>
                                                                                    </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav role="navigation" class="">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <!-- 页头导航 -->
                            <ul class="nav navbar-nav navbar-left">

                                <li role="presentation"><a href='http://112.74.171.99/hl/index.php/hl/logout'><span style="font-size:16px; font-weight:bold;">退出</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- 数据展示 -->
                <div role="main" class="right_col" style="min-height: 3160px;">           <div class="row">
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
                                                    <li>
                                <input type="checkbox" checked="checked" style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="0" />
                                渠道                            </li>
                                                    <li>
                                <input type="checkbox" checked="checked" style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="1" />
                                地址                            </li>
                                                    <li>
                                <input type="checkbox" checked="checked" style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="2" />
                                创建时间                            </li>
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
                    <button class="btn btn-primary" id="btn_save" type="button">修改</button>
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
                                    <th>昵称</th>
                                    <th>技能</th>
                                    <th>添加时间</th>
                                    <th>备注</th>
                                    <th>操作</th>
                                </tr>
        </thead>
        <tbody>
                            </tbody>
    </table>
</div>
</div>
</div>
</div>
<!-- jQuery -->
    <script src="http://112.74.171.99/hl/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://112.74.171.99/hl/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://112.74.171.99/hl/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="http://112.74.171.99/hl/vendors/nprogress/nprogress.js"></script>
    
    <!-- Datatables -->
    <script src="http://112.74.171.99/hl/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="http://112.74.171.99/hl/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/jszip/dist/jszip.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <script src="http://112.74.171.99/hl/resources/Scripts/ie-emulation-modes-warning.js"></script>
    <script src="http://112.74.171.99/hl/resources/Scripts/ie10-viewport-bug-workaround.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="http://112.74.171.99/hl/build/js/custom.min.js"></script>
    <script src="http://112.74.171.99/hl/resources/jquery-ui/jquery-ui.min.js"></script>
    <script src="http://112.74.171.99/hl/vendors/Chart.js/dist/Chart.min.js"></script>
    
    <script src="http://112.74.171.99/hl/resources/js/validation.js"></script>

    <!-- Datatables -->
    <script type="text/javascript">
function cleartime() {
	$("#id-date-range-picker-1").val("");
}

function editFun(id) {
	$('#mymodal_update').modal('show');
	$("#sanfang_id").val(id);
}

function deleteFun(id) {}

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
						return row.name;
					},
					targets : 0
				}
			],
			columns : [{
					data : 'name',
					title : '名称'
				}, {
					data : 'job',
					title : '工作'
				}, {
					data : 'date',
					title : '创建时间'
				}, {
					data : 'note',
					title : 'note'
				}, {
					data : 'id',
					fnCreatedCell : function (nTd, sData, oData, iRow, iCol) {
						$(nTd).html("<a href='javascript:void(0);' " +
							"onclick='_editFun(\"" + oData.id + "\",\"" + oData.name + "\",\"" + oData.job + "\",\"" + oData.note + "\")'>编辑</a>&nbsp;&nbsp;")
						.append("<a href='javascript:void(0);' onclick='_deleteFun(" + sData + ")'>删除</a>");
					}
				}
			],
                        fnCreatedRow: function (nRow, aData, iDataIndex) {
				//add selected class
				$(nRow).click(function () {
					if ($(this).hasClass('row_selected')) {
						$(this).removeClass('row_selected');
					} else {
						table.$('tr.row_selected').removeClass('row_selected');
						$(this).addClass('row_selected');
					}
				});
			}
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
		$.post('http://112.74.171.99/hl/index.php/myhl/lianjieguanli/dizhi/save', {
			csrf_test_name : $.trim(getCookie('csrf_cookie_name')),
			qudao : $.trim($('#qudao').val())
		}, function (data) {
			$('#mymodal2').modal('hide');
			if (data == -1) {
				alert('已有渠道不能添加了！');
			} else {
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
