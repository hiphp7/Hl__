<div class="row">
    <div class="col-md-12">
        <h2 style="font-size: 30px; margin-bottom: 0px;">
            机票报表
        </h2>
    </div>
    <div class="col-md-12">
        <h4>
            <a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'>国内机票报表下载 </a> / <a href='<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/index"); ?>'>机票报表</a>
        </h4>
    </div>

</div>
<div class="row">
    <div class="col-md-7">

      <form action="" id ='baobiaotiaojian', name = 'baobiaotiaojian' >
        <table  style="width: 100%;">
            <tbody>
                <tr>
                    <td style="font-size: medium; font-weight: bolder;">起止日期：
                    </td>
                    <td colspan="3">
                        <select name="leixing" id="leixing" style="padding-right: 0px"><option value="0" selected="selected">创建日期</option><option value="1">支付日期</option></select>

                        <input size="16" type="text" id="datetimeStart" name="datetimeStart" readonly class="form_datetime " style="padding-left: 0px;margin-left: 0px">
                        至
                        <input size="16" type="text" id="datetimeEnd" name="datetimeEnd"  readonly class="form_datetime " style="">
                    </td>
                </tr>
<!--                 <tr>
                    <td>订单来源：</td>
                    <td><select name="dingpioalaiyuan" id="dingpioalaiyuan" style="width: 150px"><option value=""></option></select></td>
                    <td>航程类型：</td>
                    <td><select name="hangchengleixing" id="hangchengleixing" style="width: 150px"><option value=""></option></select></td>
                    <td>支付渠道：</td>
                    <td><select name="zhifuqudao" id="zhifuqudao" style="width: 150px"><option value=""></option></select></td>
                </tr>
                <tr>
                    <td>乘客类型：</td>
                    <td><select name="chengkeleixing" id="chengkeleixing" style="width: 150px"><option value=""></option></select></td>
                    <td>政策来源：</td>
                    <td><select name="zhengcelaiyuan" id="zhengcelaiyuan" style="width: 150px"><option value=""></option></select></td>
                    <td>订单类型：</td>
                    <td><select name="dingdanleixing" id="dingdanleixing" style="width: 150px"><option value=""></option></select></td>
                </tr> -->
                <tr>
                    <td colspan="4">
                        <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
                        <button type="button" id="btn_daochu" class="btn btn-primary">导出EXCEL</button>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">

    function cleartime() {
        $("#datetimeStart").val("");
        $("#datetimeEnd").val("");
    }

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

    $("#btn_daochu").click(function(event) {
            var datetimeStart = $.trim($("#datetimeStart").val());
            var datetimeEnd = $.trim( $("#datetimeEnd").val());
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
            }
        var data= $("form").serialize();

        window.location.href = '<?php echo site_url("admin/caiwuguanli/jipiaobaobiao/zhuchupiao"); ?>' +'?'+ data + '&';

    });

});

</script>
</body>
</html>
