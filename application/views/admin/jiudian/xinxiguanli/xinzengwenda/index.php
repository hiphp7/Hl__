<div id="wendaguanli" style="margin-top: 65px;">
    <!--tab切换 begin-->
    <ul class="nav nav-pills xxgl" style="font-size: 16px;margin: 7px 0px 10px;background-color: rgb(236, 236, 236);">
        <li class="li1 active">
            <a href="#">问答管理</a>
        </li>
        <li class="li2">
            <a href="#">新增问答</a>
        </li>
    </ul>
    <!--tab切换 end-->
    
    <!--新增问答 begin-->
    <div id="xinzengwenda" class="row clearfix" style="display: none;">
        <div class="col-md-12 column">
            <div class="form-group">
                <input type="text" class="form-control" id="save_wentimingcheng" name="save_wentimingcheng" placeholder="问题名称"/>
            </div>
            <div class="form-group"> 
                <textarea class="form-control" rows="5" id="save_daan" name="save_daan" placeholder="答案"></textarea> 
            </div> 
            <button type="button" class="btn btn-warning" id="btn_fabu" style="float: right;">发布</button>
        </div>
    </div>
    <!--新增问答 end-->
    <!-- 数据表 begin-->
    <div id="xxgl_shujubiao">
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
                </div>
            </div>
<!--            <button id="btn_excel" type="button" class="btn btn-warning" style="float: right;">导出excel</button>-->
        </div>
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
        <!-- 数据表 end-->
    </div>
</div>
<!--问答详情 begin-->
<div id="wendaxiangqing" style="margin-top: 65px;display: none;">
    <ul class="nav nav-pills" style="font-size: 16px;margin: 7px 0px 10px;background-color: #337AB7;">
        <li>
            <a id="wdxq_back" href="#" style="color: #fff"><span class="glyphicon glyphicon-chevron-left"></span>返回</a>
        </li>
        <li class="active">
            <a href="#" style="color: #337AB7;background-color: #fff;border-radius: 0;">
                问答详情
            </a>
        </li>
    </ul>
    <div>
        <button type="button" class="btn btn-success" onclick="modify();">编辑</button>
        <button type="button" class="btn btn-default" onclick="del();" style="color:#169F85;border:1px solid #169F85;">删除</button>
        <input id="wdxq_id" name="gsid" type="hidden" />
    </div>
    <div class="row clearfix" style="position: relative;background-color: #fff;padding: 20px 30px;color:#515151;font-size: 16px;min-height: 200px;">
            <p id="wdxq_wentimingcheng"></p>
            <p>
                <span>答：</span>
                <span id="wdxq_daan"></span>
            </p>
            <div style="position: absolute;bottom: 12px;right: 41px;">
                <span>上传时间：</span>
                <span id="wdxq_chuangjianshijian"></span>
                <span>发布人：</span>
                <span id="wdxq_guanliyuanxingming"></span>
            </div>
    </div>
</div>
<!--问答详情 end-->
<!-- 问答修改弹出框 开始-->
<div aria-labelledby="win_update" role="dialog" tabindex="-1" class="modal fade in" id="win_update" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <h4 id="gridModalLabel" class="modal-title">编辑问答</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table id="update_table" class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>问题名称：</td>
                                <td><input id="update_wentimingcheng" class="form-control" name="update_wentimingcheng" type="text" />&nbsp;&nbsp;*</td>
                            </tr>
                            <tr>
                                <td>答案：</td>
                                <td><input id="update_daan" class="num form-control" name="update_daan" type="text" />&nbsp;&nbsp;*</td>
                            </tr>
                        </tbody>
                    </table>
                    <input id="gsid" name="gsid" type="hidden" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_update" type="button">修改</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- 问答修改弹出框 结束-->
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">

    //问答管理/新增问答按钮点击样式
    $('.xxgl li').click(function() {
        $(this).addClass("active").siblings().removeClass("active");
    });
    
    //问答管理
    $('.xxgl .li1').click(function() {
        $('#xinzengwenda').hide();
        $('#xxgl_shujubiao').show();
    });
    //新增问答
    $('.xxgl .li2').click(function() {
        $('#xinzengwenda').show();
        $('#xxgl_shujubiao').hide();
    });
            function objtops(obj)
            {
            var p = [];
                    for (var key in obj) {
            p.push(key + '=' + encodeURIComponent(obj[key]));
            }
            return p.join('&');
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
    url : '<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/all"); ?>',
            dataSrc : "myData",
            type : "post",
            data : function (d) {
    var csrf_name = getCookie('csrf_cookie_name');
            d.csrf_test_name = csrf_name;
    }
    },
            order : [[0, "asc"]],
            columnDefs : [{
    render : function (data, type, row) {
    //var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
    //return str;
    return row.id;
    },
            targets : 0
    }],
            columns : [
<?php
$index = 0;
$mycount = count($li);
foreach ($li as $i):
    ?>
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
    // 查看/删除
    $(nTd).html('<button type="button" onclick="chakan(' + oData.id + ', \'' + oData.wentimingcheng + '\', \'' + oData.daan + '\', \'' + oData.guanliyuanxingming + '\', \'' + oData.chuangjianshijian + '\')" class="btn btn-danger">查看</button>&nbsp;&nbsp;<button type="button" onclick="del(' + oData.id + ', \'' + oData.wentimingcheng + '\')" class="btn btn-default" style="color:#c9302c;border:1px solid #c9302c;">删除</button>');
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
                var r = confirm("是否要导出excel？");
                if (r == true) {
                    $.get('<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/daochuExcel"); ?>', function (data) {
                        if (data == '1')
                        {
                            alert('导出excel成功！');
                        }
                        else
                        {
                            alert('导出excel失败！');
                        }
                    });
                }
            });
    
            //高级查询
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
    
            //查看
            function chakan(id, wentimingcheng, daan,guanliyuanxingming,chuangjianshijian)
            {
                $('#wdxq_id').val(id);
                $('#wdxq_wentimingcheng').text(wentimingcheng != 'null'? wentimingcheng: '');
                $('#wdxq_daan').text(daan != 'null'? daan: '');
                $('#wdxq_guanliyuanxingming').text(guanliyuanxingming != 'null'? guanliyuanxingming: '');
                $('#wdxq_chuangjianshijian').text(chuangjianshijian != 'null'? chuangjianshijian: '');
                $('#wendaxiangqing').show();
                $('#wendaguanli').hide();
                
            }
            
            //赋值并显示编辑模块
            function modify()
            {
                $('#gsid').val($('#wdxq_id').val());
                $('#update_wentimingcheng').val($('#wdxq_wentimingcheng').text());
                $('#update_daan').val($('#wdxq_daan').text());
                $('#win_update').modal('show');
            }
            
    // 删除问答
    function del(id, wentimingcheng) {
        if(typeof(id)=="undefined"){
            var id = $('#wdxq_id').val();
            var wentimingcheng = $('#wdxq_wentimingcheng').text();
        }
        var r = confirm("是否要删除“" + wentimingcheng + "”？");
        if (r == true) {
            var csrf_name = getCookie('csrf_cookie_name');
            var shanchuwenda = {
                id: id,
                csrf_test_name : csrf_name
            }
            $.post('<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/del"); ?>', objtops(shanchuwenda)).success(function (data) {

                if (data == '1')
                {
                    alert('删除成功！');
                    table.ajax.reload();
                    $('#wendaxiangqing').hide();
                    $('#wendaguanli').show();
                }
                else
                {
                    alert('删除失败！');
                }
            });
        }
    }

    $(function() {
    
    //问答详情返回按钮
    $('#wdxq_back').click(function () {
        $('#wendaxiangqing').hide();
        $('#wendaguanli').show();
    });
    
    //编辑问答
    $('#btn_update').click(function () {
        var wentimingcheng = $.trim($('#update_wentimingcheng').val());
        var daan = $.trim($('#update_daan').val());
        if (wentimingcheng == '')
        {
            alert('问题名称不能为空！');
            return;
        }

        if (daan == '') {
            alert('答案不能为空！');
            return;
        }
        var csrf_name = getCookie('csrf_cookie_name');
        var xiugaiwenda = {
        id: $('#gsid').val(),
            wentimingcheng: wentimingcheng,
            daan: daan,
            //dangqianzhuangtai: dangqianzhuangtai,
            csrf_test_name : csrf_name
        }
        $.post('<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/update"); ?>', objtops(xiugaiwenda)).success(function (data) {
            if (data == '1')
            {
                alert('修改成功！');
                table.ajax.reload();
                $('#win_update').modal('hide');
                $('#wendaxiangqing').hide();
                $('#wendaguanli').show();
            }
            else
            {
                alert('修改失败！');
            }
        });
    });
            // 上传
            $('#btn_shangchuan').click(function() {
    var wentimingcheng = $.trim($('#save_wentimingcheng').val());
            var daan = $.trim($('#save_daan').val());
            if (wentimingcheng == '')
    {
    alert('问题名称不能为空！');
            return;
    }
    if (daan == '')
    {
    alert('答案不能为空！');
            return;
    }

            var csrf_name = getCookie('csrf_cookie_name');
            var xinzengwenda = {
                wentimingcheng: wentimingcheng,
                daan: daan,
                csrf_name: csrf_name
            }
            $.post('<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/save"); ?>', objtops(xinzengwenda)).success(function(data) {
                if (data == '1')
                {
                    alert('上传成功！');
    //                    table.ajax.reload();
    //                    $('#gridSystemModal').modal('hide');
                }
                else
                {
                    alert('上传失败！');
                }
            });
        });
            //发布
            $('#btn_fabu').click(function() {
                var wentimingcheng = $.trim($('#save_wentimingcheng').val());
                    var daan = $.trim($('#save_daan').val());
                    if (wentimingcheng == '')
                    {
                        alert('问题名称不能为空！');
                        return;
                    }
                    if (daan == '')
                    {
                        alert('答案不能为空！');
                        return;
                    }
                    var csrf_name = getCookie('csrf_cookie_name');
                    var xinzengwenda = {
                        wentimingcheng: wentimingcheng,
                        daan: daan,
                        csrf_name: csrf_name
                    }
                    $.post('<?php echo site_url("admin/jiudian/xinxiguanli/xinzengwenda/save"); ?>', objtops(xinzengwenda)).success(function(data) {
                    if (data == '1')
                    {
                        alert('发布成功！');
                        table.ajax.reload();
                        $('#xinzengwenda').hide();
                        $('#xxgl_shujubiao').show();
                        $(".xxgl li1").addClass("active").siblings().removeClass("active");
                        
                    }
                    else
                    {
                    alert('发布失败！');
                    }
                });
                });
    });
</script>
</body>
</html>
