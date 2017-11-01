<style type="text/css">
    

.form-control, .single-line {
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
    font-size: 14px;
}
.col-tarea .selected-h {
    height: 180px;
}
.btn-primary.btn-outline {
    color: #1ab394;
}
.edit {
    height: 180px;
    text-align: center;
}

.pb {
    padding-bottom: 10px;
}
.col-tarea {
    overflow-x: auto;
    width: 200px;
}
.btn-w {
    width: 80px;
    height: 35px;
    margin-top: 10px;
}



</style>

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
                    <button type="button" data-target="#gridSystemModal" data-toggle="modal" class="btn btn-success">添加角色名称</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 添加角色 -->
<div class="modal inmodal fade in" id="gridSystemModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>添加角色类型</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row pb">
                        <label class="font-noraml">角色类型名称</label>
                    <input type="text" name="RoleName" value ="" id="RoleName" class="form-control">
                    </div>
                    <div class="row pb">
                            <label class="font-noraml">这个角色拥有哪些频道？</label>
                        <div class="row selectdiv">
                            <div class="col-lg-2 col-tarea">
                                <select class="form-control selected-h" multiple="multiple" id="select1">
                                <?php foreach ($guanlizu as $v): ?>
                                    <option value="<?php  echo $v->id ?>"> <?php echo $v->mingcheng ?> </option>
                                <?php endforeach ?>

                                </select>
                            </div>
                            <div class="col-lg-2 edit">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="add" value="添加">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="add_all" value="全部添加">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="remove" value="删除">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="remove_all" value="全部删除">
                            </div>
                            <div class="col-lg-2  col-tarea">
                                                                                                    <select class="form-control selected-h" multiple="true" name="ChannelID[]" id="select2">
                                                                                                            
                                                                                                        </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                <button type="button" id="btn_save" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>

</div> 
<!-- 编辑角色 -->
<div class="modal inmodal fade in" id="win_update" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>编辑角色类型</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row pb">
                        <label class="font-noraml">角色类型名称</label>
                    <input type="text" name="RoleName" value ="" id="update_RoleName" class="form-control">
                    </div>
                    <div class="row pb">
                            <label class="font-noraml">这个角色拥有哪些频道？</label>
                        <div class="row selectdiv">
                            <div class="col-lg-2 col-tarea">
                                <select class="form-control selected-h" multiple="multiple" id="select11">


                                </select>
                            </div>
                            <div class="col-lg-2 edit">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="add1" value="添加">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="add_all1" value="全部添加">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="remove1" value="删除">
                                    <input type="button" class="btn btn-outline btn-default btn-w"  id="remove_all1" value="全部删除">
                            </div>
                            <div class="col-lg-2  col-tarea">
                                    <select class="form-control selected-h" multiple="true" name="ChannelID1[]" id="select21">
                                            
                                        </select>
                            </div>
                        </div>
                    </div>
                     <input id="gsid" name="gsid" type="hidden" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                <button type="button" id="btn_update" class="btn btn-primary">保存</button>
            </div>
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
                                                    url : '<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/all"); ?>',
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
                                                    $(nTd).html('<button type="button" onclick="modify(' + oData.id + ', \'' + oData.mingcheng + '\', \'' + oData.guanliyuanzuid + '\')" class="btn btn-danger">修改</button>&nbsp;&nbsp;<button type="button" onclick="del(' + oData.id + ', \'' + oData.mingcheng + '\')" class="btn btn-danger">删除</button>');
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
                                                            var csrf_name = getCookie('csrf_cookie_name');
                                                            $.post('<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/del"); ?>', { id: id,csrf_test_name : csrf_name},function (data) {
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

                                                function modify(id, mingcheng, update_guanliyunazuid)
                                                {
                                                    $('#jiaoseid').val(id);
                                                    $('#update_RoleName').val(mingcheng != 'null'? mingcheng: '');
                                                    $("#select21").empty(); // 清空
                                                    $("#select11").empty(); // 清空

                                                    <?php foreach ($guanlizu as $k => $v): ?>
                                                        $("#select11").append("<option value='<?php echo $v->id; ?>'><?php echo $v->mingcheng; ?></option>");
                                                    <?php endforeach ?>
                                                    console.log(update_guanliyunazuid);
                                                    if (update_guanliyunazuid !== null && update_guanliyunazuid !== undefined && update_guanliyunazuid !== '' ) {
                                                        var guanliyunazuid=update_guanliyunazuid.split(",");
                                                        for (var i = 0; i < guanliyunazuid.length; i++) {
                                                            var value = guanliyunazuid[i];
                                                            $("#select11 option[value="+value+"]").appendTo('#select21');

                                                        }
                                                    }

                                                $('#win_update').modal('show');
                                                }
                                                // 查询
                                                function search1() {
                                                table.ajax.reload();
                                                        }

$(function () {

    // 添加角色
    $('#btn_save').click(function () {

            var mingcheng = $.trim($('#RoleName').val());
            // 全部选中
            var selectedComs = document.getElementById("select2");  
            for(var i=0;i<selectedComs.length;i++){  
            selectedComs.options[i].selected = true;  
            }  

            var ChannelID = $.trim($('#select2').val());
            if (mingcheng == '')
            {
                alert('角色名称不能为空！');
                return;
            }

            var csrf_name = getCookie('csrf_cookie_name');
            $.post('<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/save"); ?>', { mingcheng: mingcheng, ChannelID: ChannelID,csrf_test_name : csrf_name}, function (data) {
                if (data == "1")
                {
                    $('#gridSystemModal').modal('hide');
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

            var mingcheng = $.trim($('#update_RoleName').val());


            if (mingcheng == '')
            {
                alert('公司名称不能为空！');
            }

                // 全部选中
            var selectedComs = document.getElementById("select21");  
            for(var i=0;i<selectedComs.length;i++){  
            selectedComs.options[i].selected = true;  
            }
            var ChannelID = $.trim($('#select21').val()); 
            var csrf_name = getCookie('csrf_cookie_name');
            $.post('<?php echo site_url("admin/pingtaiguanli/jiaoseguanli/update"); ?>', { id: $('#jiaoseid').val(), mingcheng: mingcheng, ChannelID: ChannelID,csrf_test_name : csrf_name }, function (data) {
                if (data == '1')
                {
                    $('#win_update').modal('hide');
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

//添加角色
$(function(){
    //移到右边
        $('#add').click(function(){
            //获取选中的选项，删除并追加给对方
            $('#select1 option:selected').appendTo('#select2'); 
        });
         
        //移到左边
        $('#remove').click(function(){
            $('#select2 option:selected').appendTo('#select1');
        });
         
        //全部移到右边
        $('#add_all').click(function(){
            //获取全部的选项,删除并追加给对方
            $('#select1 option').appendTo('#select2');
        });
         
        //全部移到左边
        $('#remove_all').click(function(){
            $('#select2 option').appendTo('#select1');
        });
         
        //双击选项
        $('#select1').dblclick(function(){ //绑定双击事件
            //获取全部的选项,删除并追加给对方
            $("option:selected",this).appendTo('#select2'); //追加给对方
        });
         
        //双击选项
        $('#select2').dblclick(function(){
            $("option:selected",this).appendTo('#select1');
        });
});

//编辑角色
$(function(){
    //移到右边
        $('#add1').click(function(){
            //获取选中的选项，删除并追加给对方
            $('#select11 option:selected').appendTo('#select21'); 
        });
         
        //移到左边
        $('#remove1').click(function(){
            $('#select21 option:selected').appendTo('#select11');
        });
         
        //全部移到右边
        $('#add_all1').click(function(){
            //获取全部的选项,删除并追加给对方
            $('#select11 option').appendTo('#select21');
        });
         
        //全部移到左边
        $('#remove_all1').click(function(){
            $('#select21 option').appendTo('#select11');
        });
         
        //双击选项
        $('#select11').dblclick(function(){ //绑定双击事件
            //获取全部的选项,删除并追加给对方
            $("option:selected",this).appendTo('#select21'); //追加给对方
        });
         
        //双击选项
        $('#select21').dblclick(function(){
            $("option:selected",this).appendTo('#select11');
        });
});
</script>
</body>
</html>
