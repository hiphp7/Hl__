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
                               id="example">
                            <thead>
                                <tr>
                                    <th style="width:15px"><input type="checkbox" id='checkAll'></th>
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
var oTable;
$(document).ready(function () {
	initModal();
	oTable = initTable();
	$("#btnEdit").hide();
	$("#btnSave").click(_addFun);
	$("#btnEdit").click(_editFunAjax);
	$("#deleteFun").click(_deleteList);
	//checkbox全选
	$("#checkAll").live("click", function () {
		if ($(this).attr("checked") === "checked") {
			$("input[name='checkList']").attr("checked", $(this).attr("checked"));
		} else {
			$("input[name='checkList']").attr("checked", false);
		}
	});
});

/**
 * 表格初始化
 * @returns {*|jQuery}
 */
function initTable() {
	var table = $("#example").dataTable({
			//"iDisplayLength":10,
			"sAjaxSource" : '<?php echo site_url("test/datatables/all"); ?>',
			'bPaginate' : true,
			"bDestory" : true,
			"bRetrieve" : true,
			"bFilter" : false,
			"bSort" : false,
			"bProcessing" : true,
			"aoColumns" : [{
					"mDataProp" : "id",
					"fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
						$(nTd).html("<input type='checkbox' name='checkList' value='" + sData + "'>");

					}
				}, {
					"mDataProp" : "name"
				}, {
					"mDataProp" : "job"
				}, {
					"mDataProp" : "date"
				}, {
					"mDataProp" : "note"
				}, {
					"mDataProp" : "id",
					"fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
						$(nTd).html("<a href='javascript:void(0);' " +
							"onclick='_editFun(\"" + oData.id + "\",\"" + oData.name + "\",\"" + oData.job + "\",\"" + oData.note + "\")'>编辑</a>&nbsp;&nbsp;")
						.append("<a href='javascript:void(0);' onclick='_deleteFun(" + sData + ")'>删除</a>");
					}
				},
			],
			"sDom" : "<'row-fluid'<'span6 myBtnBox'><'span6'f>r>t<'row-fluid'<'span6'i><'span6 'p>>",
			"sPaginationType" : "bootstrap",
                        /*
			"oLanguage" : {
				"sUrl" : "../resources/user_share/basic_curd/jsplugin/datatables/zh-CN.txt",
				"sSearch" : "快速过滤："
			},
*/
			"fnCreatedRow" : function (nRow, aData, iDataIndex) {
				//add selected class
				$(nRow).click(function () {
					if ($(this).hasClass('row_selected')) {
						$(this).removeClass('row_selected');
					} else {
						oTable.$('tr.row_selected').removeClass('row_selected');
						$(this).addClass('row_selected');
					}
				});
			},
			"fnInitComplete" : function (oSettings, json) {
				$('<a href="#myModal" id="addFun" class="btn btn-primary" data-toggle="modal">新增</a>' + '&nbsp;' +
					'<a href="#" class="btn btn-primary" id="editFun">修改</a> ' + '&nbsp;' +
					'<a href="#" class="btn btn-danger" id="deleteFun">删除</a>' + '&nbsp;').appendTo($('.myBtnBox'));
				$("#deleteFun").click(_deleteList);
				$("#editFun").click(_value);
				$("#addFun").click(_init);
			}
		});
	return table;
}

/**
 * 删除
 * @param id
 * @private
 */
function _deleteFun(id) {
	$.ajax({
		url : "http://dt.thxopen.com/example/resources/user_share/basic_curd/deleteFun.php",
		data : {
			"id" : id
		},
		type : "post",
		success : function (backdata) {
			if (backdata) {
				oTable.fnReloadAjax(oTable.fnSettings());
			} else {
				alert("删除失败");
			}
		},
		error : function (error) {
			console.log(error);
		}
	});
}

/**
 * 赋值
 * @private
 */
function _value() {
	if (oTable.$('tr.row_selected').get(0)) {
		$("#btnEdit").show();
		var selected = oTable.fnGetData(oTable.$('tr.row_selected').get(0));
		$("#inputName").val(selected.name);
		$("#inputJob").val(selected.job);
		$("#inputDate").val(selected.date);
		$("#inputNote").val(selected.note);
		$("#objectId").val(selected.id);

		$("#myModal").modal("show");
		$("#btnSave").hide();
	} else {
		alert('请点击选择一条记录后操作。');
	}
}

/**
 * 编辑数据带出值
 * @param id
 * @param name
 * @param job
 * @param note
 * @private
 */
function _editFun(id, name, job, note) {
	$("#inputName").val(name);
	$("#inputJob").val(job);
	$("#inputNote").val(note);
	$("#objectId").val(id);
	$("#myModal").modal("show");
	$("#btnSave").hide();
	$("#btnEdit").show();
}

/**
 * 初始化
 * @private
 */
function _init() {
	resetFrom();
	$("#btnEdit").hide();
	$("#btnSave").show();
}

/**
 * 添加数据
 * @private
 */
function _addFun() {
	var jsonData = {
		'name' : $("#inputName").val(),
		'job' : $("#inputJob").val(),
		'note' : $("#inputNote").val()
	};
	$.ajax({
		url : "http://dt.thxopen.com/example/resources/user_share/basic_curd/insertFun.php",
		data : jsonData,
		type : "post",
		success : function (backdata) {
			if (backdata == 1) {
				$("#myModal").modal("hide");
				resetFrom();
				oTable.fnReloadAjax(oTable.fnSettings());
			} else if (backdata == 0) {
				alert("插入失败");
			} else {
				alert("防止数据不断增长，会影响速度，请先删掉一些数据再做测试");
			}
		},
		error : function (error) {
			console.log(error);
		}
	});
}

/*
add this plug in
// you can call the below function to reload the table with current state
Datatables刷新方法
oTable.fnReloadAjax(oTable.fnSettings());
 */
$.fn.dataTableExt.oApi.fnReloadAjax = function (oSettings) {
	//oSettings.sAjaxSource = sNewSource;
	this.fnClearTable(this);
	this.oApi._fnProcessingDisplay(oSettings, true);
	var that = this;

	$.getJSON(oSettings.sAjaxSource, null, function (json) {
		/* Got the data - add it to the table */
		for (var i = 0; i < json.aaData.length; i++) {
			that.oApi._fnAddData(oSettings, json.aaData[i]);
		}
		oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
		that.fnDraw(that);
		that.oApi._fnProcessingDisplay(oSettings, false);
	});
}

/**
 * 编辑数据
 * @private
 */
function _editFunAjax() {
	var id = $("#objectId").val();
	var name = $("#inputName").val();
	var job = $("#inputJob").val();
	var note = $("#inputNote").val();
	var jsonData = {
		"id" : id,
		"name" : name,
		"job" : job,
		"note" : note
	};
	$.ajax({
		type : 'POST',
		url : 'http://dt.thxopen.com/example/resources/user_share/basic_curd/editFun.php',
		data : jsonData,
		success : function (json) {
			if (json) {
				$("#myModal").modal("hide");
				resetFrom();
				oTable.fnReloadAjax(oTable.fnSettings());
			} else {
				alert("更新失败");
			}
		}
	});
}
/**
 * 初始化弹出层
 */
function initModal() {
	$('#myModal').on('show', function () {
		$('body', document).addClass('modal-open');
		$('<div class="modal-backdrop fade in"></div>').appendTo($('body', document));
	});
	$('#myModal').on('hide', function () {
		$('body', document).removeClass('modal-open');
		$('div.modal-backdrop').remove();
	});
}

/**
 * 重置表单
 */
function resetFrom() {
	$('form').each(function (index) {
		$('form')[index].reset();
	});
}

/**
 * 批量删除
 * 未做
 * @private
 */
function _deleteList() {
	var str = '';
	$("input[name='checkList']:checked").each(function (i, o) {
		str += $(this).val();
		str += ",";
	});
	if (str.length > 0) {
		var IDS = str.substr(0, str.length - 1);
		alert("你要删除的数据集id为" + IDS);
	} else {
		alert("至少选择一条记录操作");
	}
}

                    </script>   
                    </body>
                    </html>
