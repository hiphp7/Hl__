<!--面包导航-->
<ol class="daohangtiao">
    <li><a href="">首页</a></li>
    <li><a href="">佣金结算</a></li>
    <li class="active">账单查询</li>
</ol>
<div class="col-md-12" style="font-size:1.8rem;">
    <img src="<?php echo base_url("resources/wm/images/riqi.png"); ?>" class="img-responsive riqi_img" />
    完成日期：
    <input size="16" type="text" id="datetimeStart" name="datetimeStart" readonly class="form_datetime " style=" width: 10%;padding-left: 0px;margin-left: 0px">
    &nbsp;至&nbsp;
    <input size="16" type="text" id="datetimeEnd" name="datetimeEnd"  readonly class="form_datetime " style=" width: 10%; margin-right: 2%;">
    <img src="<?php echo base_url("resources/wm/images/zhangdan.png"); ?>" class="img-responsive leixing_img" style="margin-right:5px;" />账单状态：
    <select name="cha_zhuangtai" id="cha_zhuangtai" class="leixing" style="padding-right: 0px" >
        <option value="0" selected="selected">全部</option>
        <option value="1">已结算</option>
        <option value="2">结算中</option>
    </select> 
    <input type="hidden" name="cishu" id="cishu" value="0">
    <button type="button" class="btn lianjie_btn chaxun" >查询</button>
    <!-- <button type="button" class="btn lianjie_btn daochu" >导出报表</button>  -->
</div>
<div class="col-md-12 tishi" style=" text-align: right; padding-right: 32%; color: #ff0220;display: none;" id="tishi">
    <img src="<?php echo base_url("resources/wm/images/jingao.png"); ?>" class="img-responsive tishi_img" />
    查询时间跨度不能超过12个月，重新选择起止日期!
</div>
<div class="col-md-12" style=" text-align: center; font-size: 25px; color: #333333; padding-right: 25%;margin:20px;">
    账单总数：<span style="margin-right:3%;color:#FC9F38;" id="dingdannum">0</span>

    佣金总数：<span style="color:#49d3dd;" id="yongjinzongeaall">0</span>
</div>
<!-- 数据表 -->
<div class="row" style="background: white">

    <table id="dianpudiaoyan" class="table table-hover">
        <thead>
            <tr>
                <?php foreach ($li as $i): ?>
                    <th><?php echo $i->display_name; ?></th>
                <?php endforeach; ?>
                <th>详情</th>

            </tr>
        </thead>
    </table>
</div>
<?php
$this->load->view('page/wmfooter');
?>
<script type="text/javascript">

    function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
            if (arr != null)
            return unescape(arr[2]);
            return null;
    }
    var table;
            $('#dianpudiaoyan>tbody').css("display", "none");
            $(function () {
    table = $('#dianpudiaoyan').DataTable({

    "initComplete": function(settings, json) {
    $('.dataTables_empty').html('<img style="padding-top:100px;padding-bottom:100px;" src="<?php echo base_url("resources/wm/images/chaxun.png"); ?>"/>');
            $('#dianpudiaoyan_paginate').html('');
    },
            fixedHeader : true,
            ordering:false,
            info:false,
            pagingType : "full", //设置分页控件的模式
            searching : false, //屏蔽datatales的查询框
            aLengthMenu : [10], //设置一页展示10条记录
            bLengthChange : false, //屏蔽tables的一页展示多少条记录的下拉列表
            info:false,
            lengthChange:false,
            oLanguage : { //对表格国际化
    sLengthMenu : "每页显示 _MENU_条",
            sZeroRecords : '<img style="padding-top:100px;padding-bottom:100px;" src="<?php echo base_url("resources/wm/images/wujieguo.png"); ?>"/>',
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
    url : '<?php echo site_url("wm/wangmeng/zhangdan/all"); ?>',
            dataSrc : "myData",
            type : "post",
            data : function (d) {
    var csrf_name = getCookie('csrf_cookie_name');
            d.csrf_test_name = csrf_name;
            var datetimeStart = $.trim($('#datetimeStart').val());
            d.datetimeStart = datetimeStart != 'on'? datetimeStart: '';
            var datetimeEnd = $.trim($('#datetimeEnd').val());
            d.datetimeEnd = datetimeEnd != 'on'? datetimeEnd: '';
            var zhuangtai = $.trim($('#cha_zhuangtai').val());
            d.zhuangtai = zhuangtai != 'on' && zhuangtai != '全部'? zhuangtai: '';
            var cishu = $.trim($('#cishu').val());
            d.cishu = cishu != 'on'? cishu: '';
    }
    },
            order : [[0, "desc"]],
            columnDefs : [{
    render : function (data, type, row) {
    //var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
    //return str;
    return row.zhangdanhao;
    },
            targets : 0
    }
    ],
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
    data : 'id',
            fnCreatedCell : function (nTd, sData, oData, iRow, iCol) {

    $(nTd).html("<a id='chakan_a_" + oData.id + "' href='<?php echo site_url("wm/wangmeng/zhangdan/xiangqing/"); ?>/" + oData.id + "'>查看</a>&nbsp;&nbsp;");
    }
    }
    ]

    });
            //显示隐藏列
            $('.toggle-vis').on('change', function (e) {
    e.preventDefault();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());
    });
            //var column = table.column(0);
            //column.visible(!column.visible());

            $(function () {
    $("#datetimeStart").datepicker({ //添加日期选择功能
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
            $("#datetimeEnd").datepicker({ //添加日期选择功能
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
    }
    });
    });
            // 简单查询  
            $('.chaxun').click(function () {

    var datetimeStart = $.trim($("#datetimeStart").val());
            var datetimeEnd = $.trim($("#datetimeEnd").val());
            var zhuangtai = $.trim($("#cha_zhuangtai").val());
            if (datetimeStart == '') {
    alert('日期必填');
            return;
    }
    if (datetimeEnd == '') {
    alert('日期必填');
            return;
    }
    if (datetimeStart > datetimeEnd) {
    alert('日期范围请重新选择');
            return;
    };
            if ((Date.parse(datetimeEnd) / 1000 - Date.parse(datetimeStart) / 1000) / 3600 / 24 > 360) {
    $(".tishi").css("display", "block");
            return;
    };
            $(".tishi").css("display", "none");
            var chishu = $("#cishu").val();
            $("#cishu").val(1);
            search1();
            $.ajax({
    url: '<?php echo site_url("wm/wangmeng/zhangdan/info"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {"datetimeStart": datetimeStart, "datetimeEnd":datetimeEnd,"zhuangtai":zhuangtai,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
    })
            .done(function(data) {
    $("#dingdannum").text(data.dingdannum);
            $("#yongjinzongeaall").text(data.yongjinzongeaall);
    })

    });
    });
            // 查询
                    function search1() {
                    table.ajax.reload();
                    }
                    function bTnChange(){
								$($('.chaxun').hover(function(){
									$(this).css('background','#22b7c2')
								},function(){
									$(this).css('background','#73ccd2')
								}))
							}
							bTnChange();
</script> 