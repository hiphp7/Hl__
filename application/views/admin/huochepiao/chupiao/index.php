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
                <!--
                <button type="button" data-target="#gridSystemModal" data-toggle="modal" class="btn btn-success">导出excel</button>
                -->
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <form id='frm_chx'>
                <!--
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="input-group primary">
                        <input type="text" placeholder="输入用户组查询" id="searchproinput" name='searchproinput' class="form-control no-left-border form-focus-red">
                        <span class="input-group-btn">
                            <button id="btn_jian_chaxun" class="btn btn-success" type="button">
                                搜索
                            </button>
                        </span>
                    </div>
                    <input id="readioval" name="readioval" type="hidden" />
                </div>
                -->
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <!--
                    <button type="button" data-target="#mymodal2" data-toggle="modal" class="btn btn-primary">高级查询</button>
                    -->
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
                                        <td style="font-size: medium; font-weight: bolder;">订单编号</td>
                                        <td>
                                            <input type="text" placeholder="订单编号" id="order_id"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">异地订单号</td>
                                        <td>
                                            <input type="text" placeholder="异地订单号" id="merchant_order_id"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: medium; font-weight: bolder;">乘客姓名</td>
                                        <td>
                                            <input type="text" placeholder="乘客姓名" id="user_name"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">订单来源</td>
                                        <td>
                                            <select id="laiyuan">
                                                <option value="全部">全部</option>
                                                <option value="0">APP端</option>
                                                <option value="1">Web端</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">支付方式</td>
                                        <td>
                                            <select id="zhifufangshi">
                                                <option value="全部">全部</option>
                                                <option value="0">支付宝</option>
                                                <option value="1">QQ钱包</option>
                                                <option value="2">微信支付</option>
                                            </select>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;">订单状态</td>
                                        <td>
                                            <select id="status">
                                                <option value="全部">全部</option>
                                                <option value="0">待支付</option>
                                                <option value="1">支付成功，等待出票</option>
                                                <option value="2">出票处理中</option>
                                                <option value="3">出票成功</option>
                                                <option value="4">出票失败</option>
                                                <option value="5">无法出票</option>
                                                <option value="6">出票失败</option>
                                                <option value="7">订单关闭</option>
                                                <option value="8">退票待处理</option>
                                                <option value="9">退票处理中</option>
                                                <option value="10">退票失败</option>
                                                <option value="11">无法退票</option>
                                                <option value="12">退票成功，未退款</option>
                                                <option value="13">退票成功，已退款</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">起止日期</td>
                                        <td colspan='3'>
                                            <select id="riqi" style="height:25px;">
                                                <option value="0">创建日期</option>
                                                <option value="1">支付日期</option>
                                                <option value="2">出票日期</option>

                                            </select>
                                            <input type="text" placeholder="" id="fukuanshijian_begin"> 至<input type="text" placeholder="" id="fukuanshijian_end">
                                        </td>
          
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="font-size: medium; font-weight: bolder;">商户号</td>
                                        <td>
                                       <input type="text" placeholder="商户号" id="cha_shanghuhao"/>
                                        </td>
                                        <td style="font-size: medium; font-weight: bolder;"></td>
                                        <td>
                                    
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
<!-- <div class="row">
<table class="table" style="width:70%">
<tr>
    <td>订单编号</td>
    <td><input type="text" placeholder="订单编号" id="order_id"/></td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>5</td>
    <td>5</td>
    <td>5</td>
</tr>

</table>
</div> -->
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

    // 锁单
    function suodan(id)
    {
    var csrf_name = getCookie('csrf_cookie_name');
            $.post('<?php echo site_url("admin/guoneijipiao/chupiao/suodan"); ?>/' + id, {csrf_test_name: csrf_name}, function (data) {
    if (data == '1') {
    $('#suodan_a_' + id).hide();
            alert('锁单成功！');
    }
    });
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
    url : '<?php echo site_url("admin/huochepiao/chupiao/all"); ?>',
            dataSrc : "myData",
            type : "post",
            data : function (d) {
    var csrf_name = getCookie('csrf_cookie_name');
            d.csrf_test_name = csrf_name;
            var order_id = $.trim($('#order_id').val());
            d.order_id = order_id != 'on'? order_id: '';
            var merchant_order_id = $.trim($('#merchant_order_id').val());
            d.merchant_order_id = merchant_order_id != 'on'? merchant_order_id: '';
            var user_name = $.trim($('#user_name').val());
            d.user_name = user_name != 'on'? user_name: '';
            var zhifufangshi = $.trim($('#zhifufangshi').val());
            d.zhifufangshi = zhifufangshi != 'on' && zhifufangshi != '全部'? zhifufangshi: '';
            var status = $.trim($('#status').val());
            d.status = status != 'on' && status != '全部'? status: '';
            var riqi = $.trim($('#riqi').val());
            d.riqi = riqi != 'on' && riqi != '0'? riqi: '';
            var laiyuan = $.trim($('#laiyuan').val());
            d.laiyuan = laiyuan != 'on' && laiyuan != '全部'? laiyuan: '';
            var fukuanshijian_begin = $.trim($('#fukuanshijian_begin').val());
            d.shijian_begin = fukuanshijian_begin != 'on'? fukuanshijian_begin: '';
            var fukuanshijian_end = $.trim($('#fukuanshijian_end').val());
            d.shijian_end = fukuanshijian_end != 'on'? fukuanshijian_end: '';
			var shanghuhao = $.trim($('#cha_shanghuhao').val());
			d.shanghuhao = shanghuhao != 'on'? shanghuhao: '';
                                        			
    }
    },
            order : [[0, "desc"]],
            columnDefs : [{
    render : function (data, type, row) {
    //var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
    //return str;
    return row.orderid;
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
    data : 'id',
            fnCreatedCell : function (nTd, sData, oData, iRow, iCol) {
    // sData id 值
    $(nTd).html("<a  id='chakan_a_" + oData.id + "' href='<?php echo site_url("admin/huochepiao/chupiao/xiangqing/"); ?>/" + oData.id + "'>查看</a>&nbsp;&nbsp;");
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
