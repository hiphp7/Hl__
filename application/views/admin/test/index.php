<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <!-- 产品列显示/隐藏 -->
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        产品列显示/隐藏
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <?php foreach ($li as $i): ?>
                            <?php if ($i->display_name == '店铺编号'): ?>
                                <li style="display:none;">
                                    <input type="checkbox" <?php if ($i->show == true): ?>checked="checked"<?php endif; ?> style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="<?php echo $i->index; ?>" />
                                    <?php echo $i->display_name; ?>
                                </li>
                            <?php else: ?>
                                <li>
                                    <input type="checkbox" <?php if ($i->show == true): ?>checked="checked"<?php endif; ?> style="margin-top: 5px; margin-left: 5px;" class="toggle-vis" data-column="<?php echo $i->index; ?>" />
                                    <?php echo $i->display_name; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float:right;">
                    <!-- 导出excel -->
                    <button type="button" data-target="#gridSystemModal" data-toggle="modal" class="btn btn-success">添加保险公司</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 弹出框 -- 导出 -->
<div aria-labelledby="gridModalLabel" role="dialog" tabindex="-1" class="modal fade in" id="gridSystemModal" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <h4 id="gridModalLabel" class="modal-title">添加保险公司</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table id="save_table" class="table table-bordered">
        <tbody>
            <tr>
                <td>公司名称：</td>
                <td><input id="save_mingcheng" class="form-control" name="save_mingcheng" type="text"/>&nbsp;&nbsp;*</td>
            </tr>
            <tr>
                <td>url：</td>
                <td><input id="save_url" class="form-control" name="save_url" type="text" />&nbsp;&nbsp;*</td>
            </tr>
            <tr>
                <td>联系电话：</td>
                <td><input id="save_lianxidianhua" class="form-control" name="save_lianxidianhua" type="text" />&nbsp;&nbsp;*</td>
            </tr>
        </tbody>
    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_save" type="button">保存</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- 弹出框 -- 导出 -->
<div aria-labelledby="win_update" role="dialog" tabindex="-1" class="modal fade in" id="win_update" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <h4 id="gridModalLabel" class="modal-title">修改保险公司</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table id="update_table" class="table table-bordered">
        <tbody>
            <tr>
                <td>公司名称：</td>
                <td><input id="update_mingcheng" class="form-control" name="update_mingcheng" type="text"/>&nbsp;&nbsp;*</td>
            </tr>
            <tr>
                <td>url：</td>
                <td><input id="update_url" class="form-control" name="update_url" type="text" />&nbsp;&nbsp;*</td>
            </tr>
            <tr>
                <td>联系电话：</td>
                <td><input id="update_lianxidianhua" class="form-control" name="update_lianxidianhua" type="text" />&nbsp;&nbsp;*</td>
            </tr>
        </tbody>
    </table>
                    <input id="gsid" name="gsid" type="hidden" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_save" type="button">保存</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
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
                                        <td style="font-size: medium; font-weight: bolder;">本周评价</td>
                                        <td>
                                            <div style="width: 100%;" class="">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最低评价" id="minpingjia" style="height: 35px; width: 45%;padding: 2px;">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最高评价" id="maxpingjia" style="height: 35px; width: 45%;padding: 2px;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">产品评分</td>
                                        <td>
                                            <div style="width: 100%;padding-top: 6px;" class="">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最低评分" id="minrate" style="height: 35px; width: 45%;padding: 2px;">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最高评分" id="maxrate" style="height: 35px; width: 45%;padding: 2px;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">本周销量</td>
                                        <td>
                                            <div style="width: 100%;padding-top: 6px;" class="">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最低周销量" id="minbought" style="height: 35px; width: 45%;padding: 2px;">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最高周销量" id="maxbought" style="height: 35px; width: 45%;padding: 2px;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">产品数</td>
                                        <td>
                                            <div style="width: 100%;padding-top: 6px;" class="">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最低产品数" id="minproduct_count" style="height: 35px; width: 45%;padding: 2px;">
                                                <input type="number" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="最高产品数" id="maxproduct_count" style="height: 35px; width: 45%;padding: 2px;">
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
                    <button class="btn btn-primary" id="btn_reseach" type="button">查询</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- 数据表 -->
<div class="row">
    <table id="dianpudiaoyan" class="table table-striped table-bordered">
        <thead>
            <tr>
                <?php foreach ($li as $i): ?>
                    <th><?php echo $i->display_name; ?></th>
                <?php endforeach; ?>
                <th>删除</th>
            </tr>
        </thead>
    </table>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
                                                            function cleartime() {
                                                            $("#id-date-range-picker-1").val("");
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
                                                    url : '<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/all"); ?>',
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
                                                    return row.mingcheng;
                                                    },
                                                            targets : 0
                                                    }
                                                    ],
                                                            columns : [
<?php $index = 0;
$mycount = count($li);
foreach ($li as $i): ?>
    <?php if ($index == $mycount - 1): ?>
                                                            {
                                                            data: '<?php echo $i->name; ?>',
                                                                    title: '<?php echo $i->display_name; ?>'
                                                            }
    <?php else: $index++; ?>
                                                            {
                                                            data: '<?php echo $i->name; ?>',
                                                                    title: '<?php echo $i->display_name; ?>'
                                                            },
    <?php endif; ?>
<?php endforeach; ?>
                                                    , {
                                                    data: 'id',
                                                            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                                    // 删除
                                                    $(nTd).html('<button type="button" onclick="modify(' + oData.id + ', \'' + oData.mingcheng + '\', \'' + oData.url + '\', \'' + oData.lianxidianhua + '\')" class="btn btn-danger">修改</button>&nbsp;&nbsp;<button type="button" onclick="del(' + oData.id + ', \'' + oData.mingcheng + '\')" class="btn btn-danger">删除</button>');
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
                                                            // 导出 excel
                                                            $('#btn_excel').click(function () {
                                                                  var str = 'ps=1';
                                                                  $('.excel_content').find("input[type='checkbox']").each(function (item) {
                                                                        if ($(this).is(':checked')) {
                                                                             str += '&' + $(this).attr('id') + '=1';
                                                                        }
                                                            });
                                                            
                                                            var minpingjia = $('#minpingjia').val();
                                                            str += '&minpingjia=' + minpingjia;
                                                            var maxpingjia = $('#maxpingjia').val();
                                                            str += '&maxpingjia=' + maxpingjia;
                                                            var minrate = $('#minrate').val();
                                                            str += '&minrate=' + minrate;
                                                            var maxrate = $('#maxrate').val();
                                                            str += '&maxrate=' + maxrate;
                                                            var minbought = $('#minbought').val();
                                                            str += '&minbought=' + minbought;
                                                            var maxbought = $('#maxbought').val();
                                                            str += '&maxbought=' + maxbought;
                                                            var minproduct_count = $('#minproduct_count').val();
                                                            str += '&minproduct_count=' + minproduct_count;
                                                            var maxproduct_count = $('#maxproduct_count').val();
                                                            str += '&maxproduct_count=' + maxproduct_count;
                                                            window.open('<?php echo site_url("dianpudiaoyan/dianpurexiao/daochu"); ?>?' + str, 'mywindow1', 'width=2, height=2, menubar=no, toolbar=no, scrollbars=yes');
                                                            $('#gridSystemModal').modal('hide');
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
                                                            // 删除保险公司
                                                                    function del(id, name) {
                                                                    var r = confirm("是否要删除" + name + "？");
                                                                            if (r == true) {
                                                                    $.get('<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/index"); ?>' + '/' + id, function (data) {
                                                                    if (data == '1')
                                                                    {
                                                                    alert('删除成功！');
                                                                            table.ajax.reload();
                                                                    }
                                                                    else
                                                                    {
                                                                    alert('删除失败！');
                                                                    }
                                                                    });
                                                                    }
                                                                    }

                                                            function modify(id, mingcheng, url, lianxidianhua)
                                                            {
                                                                $('#gsid').val(id);
                                                                $('#update_mingcheng').val(mingcheng != 'null'? mingcheng: '');
                                                                $('#update_url').val(url != 'null'? url: '');
                                                                $('#update_lianxidianhua').val(lianxidianhua != 'null'? lianxidianhua: '');
                                                            $('#win_update').modal('show');
                                                            }
                                                            // 查询
                                                            function search1() {
                                                            table.ajax.reload();
                                                                    }

$(function () {
    
    // 添加保险公司
    $('#btn_save').click(function () {

            var mingcheng = $.trim($('#save_mingcheng').val());
            var url = $.trim($('#save_url').val());
            var lianxidianhua = $.trim($('#save_lianxidianhua').val());

            if (mingcheng == '')
            {
                alert('公司名称不能为空！');
            }

            if (url == '') {
                alert('url不能为空！');
            }

            if (lianxidianhua == '') {
                alert('联系电话不能为空！');
            }

            $.get('<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/save"); ?>', { mingcheng: mingcheng, url: url, lianxidianhua: lianxidianhua }, function (data) {
                if (data == '1')
                {
                    alert('保存成功！');
                    table.ajax.reload();
                }
                else
                {
                    alert('保存失败！');
                }
            });
        });
        
        $('#btn_update').click(function () {

            var mingcheng = $.trim($('#update_mingcheng').val());
            var url = $.trim($('#update_url').val());
            var lianxidianhua = $.trim($('#update_lianxidianhua').val());

            if (mingcheng == '')
            {
                alert('公司名称不能为空！');
            }

            if (url == '') {
                alert('url不能为空！');
            }

            if (lianxidianhua == '') {
                alert('联系电话不能为空！');
            }

            $.get('<?php echo site_url("admin/pingtaiguanli/baoxiangongsi/update"); ?>', { id: $('#gsid').val(), mingcheng: mingcheng, url: url, lianxidianhua: lianxidianhua }, function (data) {
                if (data == '1')
                {
                    alert('修改成功！');
                    table.ajax.reload();
                }
                else
                {
                    alert('修改失败！');
                }
            });
        });
});
</script>
</body>
</html>
