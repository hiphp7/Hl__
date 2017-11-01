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
        <link href="<?php echo base_url("vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url("vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url("vendors/iCheck/skins/flat/green.css"); ?>" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url("vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"); ?>" rel="stylesheet">
        <!-- jVectorMap -->
        <link href="<?php echo base_url("production/css/maps/jquery-jvectormap-2.0.3.css"); ?>" rel="stylesheet"/>

        <!-- datatables -->
        <link href="<?php echo base_url("vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"); ?>" rel="stylesheet"/>

        <link href="<?php echo base_url("vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url("build/css/custom.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.structure.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("resources/jquery-ui/jquery-ui.theme.min.css"); ?>" rel="stylesheet" />

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
                                <img src="<?php echo base_url("resources/g_img/aukey.png"); ?>" alt="" class="img-circle profile_img">
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
                                <li role="presentation"><a href='<?php echo site_url("hl/logout"); ?>'><span style="font-size:16px; font-weight:bold;">退出</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- 数据展示 -->
                <div role="main" class="right_col" style="min-height: 3160px;">           
                    <div class="row">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover"
                               id="dianpudiaoyan">
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

                        <!-- Modal -->
                        <div id="myModal" class="modal hide fade" data-backdrop="false">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×
                                </button>
                                <h3 id="myModalLabel">用户信息</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" id="resForm">
                                    <input type="hidden" id="objectId"/>

                                    <div class="control-group">
                                        <label class="control-label" for="inputName">昵称：</label> <input
                                            type="text" id="inputName" name="name"/>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputJob">技能：</label> <input
                                            type="text" id="inputJob" name="job"/>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputNote">备注：</label>
                                        <textarea name="note" id="inputNote" cols="30" rows="4"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="btnSave">确定</button>
                                <button class="btn btn-primary" id="btnEdit">保存</button>
                                <button class="btn btn-danger" data-dismiss="modal"
                                        aria-hidden="true">取消
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->load->view('page/dbfooter');
                    ?>
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
				url : '<?php echo site_url("test/datatables/all"); ?>',
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
