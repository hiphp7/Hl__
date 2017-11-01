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
                    <!-- 新增保险产品 -->
                    <button type="button" data-target="#gridSystemModal" data-toggle="modal" class="btn btn-success">新增保险产品</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 新增保险产品 开始-->
<div aria-labelledby="gridModalLabel" role="dialog" tabindex="-1" class="modal fade in" id="gridSystemModal" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">保险详情配置</h4>
            </div>
            <!--modal-body start-->
            <div class="modal-body">
                <div id="update-form">          
                    <div class="row row-space">
                        <div class="col-lg-4 ">
                            <label class="font-noraml">保险名称：</label>
                            <input type="text" id="save_chanpinmingcheng" name="save_chanpinmingcheng">                                                                
                        </div>

                        <div class="col-lg-4">
                            <label class="font-noraml">保险公司：</label>
                            <select id="save_baoxiangongsiid" name="save_baoxiangongsiid">
                                <option value="1">中国人保</option>
                                <option value="2">泰康在线</option>
                                <option value="3">阳光保险</option>
                                <option value="4">中国平安</option>
                                <option value="5">安联保险</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="font-noraml">保险类型：</label>
                            <select id="save_chanpinleibie" name="save_chanpinleibie">
                                <option value="0">航空意外险</option>
                                <option value="1">交通工具险</option>
                                <option value="2">延误险</option>
                            </select>							
                        </div>
                    </div>  
                    <div class="row row-space">
                        <div class="col-lg-4">
                            <label class="font-noraml">保险金额：</label>
                            <input type="text" id="save_baoxianjine" class="num" name="save_baoxianjine">
                        </div>
                        <div class="col-lg-4">
                            <label class="font-noraml">销售单价：</label>
                            <input type="text" id="save_xiaoshoudanjia" class="num" name="save_xiaoshoudanjia">					     	                         <span class="yuan">元/份</span>
                        </div>

                        <div class="col-lg-4">
                            <label class="font-noraml">成本单价：</label>
                            <input type="text" id="save_chengbendanjia" class="num" name="save_chengbendanjia">					     	                         <span class="yuan">元/份</span>
                        </div>

                    </div>
                    <div class="row row-space">
                        <div class="col-lg-4">
                            <label class="font-noraml">结算方式：</label>
                            <select id="save_jiesuanfangshi" name="save_jiesuanfangshi">
                                <option value="0">当次</option>
                                <option value="1">月结</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="font-noraml">保险期限：</label>
                            <select id="save_baoxianqixian" name="save_baoxianqixian">
                                <option value="0">当次航班</option>
                                <option value="1">七天有效</option>
                                <option value="2">十天有效</option>
                                <option value="3">一年有效</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="font-noraml">保险代码：</label>
                            <input type="text" id="save_chanpindaima" name="save_chanpindaima">
                        </div>
                        
                    </div>
                    <div class="row row-space">
                        <div class="col-lg-4">
                            <label class="font-noraml">是否支持退保：</label>
                            <input type="radio" name="save_shifoutuibao" checked="checked"  value="0"/>是
                            <input type="radio"  name="save_shifoutuibao"  value="1"/>否
                        </div>
                        <div class="col-lg-8">
                            <label class="font-noraml">年龄范围：</label>
                            <input type="radio" name="save_nianlingxianzhi" checked="checked" value="0"  class="limit"/>无限制
                            <input type="radio" name="save_nianlingxianzhi"  value="1" class="limit"/>限制
                            <input type="text" id="save_zuixiaonianling" class="num age" name="save_zuixiaonianling" readonly="true"><span class="sui">岁</span>---
                            <input type="text" id="save_zuidanianling" class="num age" name="save_zuidanianling" readonly="true"><span class="sui2">岁</span>
                        </div>

                    </div> 
                    <div class="form-group texta">
                        <label class="font-noraml">保额详细：</label> 

                        <textarea class="form-control" id="save_baoexiangxi" name="save_baoexiangxi"  placeholder="例：意外身故或残疾保额人民币肆拾万元整（RMB400000.00）"></textarea>
                    </div>
                    <div class="form-group texta">
                        <label class="font-noraml">投保范围及限制：</label>
                        <textarea class="form-control" id="save_baoxianfanwei" name="save_baoxianfanwei"   placeholder="例：被保人年龄为满60岁至60岁以下"></textarea>
                    </div>
                    <div class="form-group texta">
                        <label class="font-noraml">其他说明：</label> 
                        <textarea class="form-control" id="save_beizhu" name="save_beizhu"  placeholder="例：不提供票据，不提供打印"></textarea>
                    </div>
                    <div class="form-group texta">
                        <label class="font-noraml">保单验证地址：</label>
                        <textarea class="form-control"id="save_yanzhengdizhi" name="save_yanzhengdizhi"  placeholder="http://"></textarea>
                    </div>
<!--                    <div id="div1" class="row">
                        <div class="row row-space">
                            <div class="col-lg-7">
                                <label class="font-noraml">附件名称：</label>
                                <input type="text" name="save_fujian_name" placeholder="例：阳光保险协议" />

                                <label class="font-noraml">附件URL：</label>
                                <input type="text" name="save_fujian_url" />
                            </div>
                            <div class="col-lg-1">
                                <button type="button" id="btn-add" class="btn btn-primary btn-ad" onclick="add_div(this)"  add_index="0">增加</button>
                            </div>
                        </div>
                    </div>-->
                </div> 
            </div>
            <!--modal-body end-->
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                <button type="submit" id="btn_save" class="btn btn-primary">保存</button>
            </div>

        </div>
    </div>
</div>
<!-- 修改保险产品 开始-->
<div aria-labelledby="win_update" role="dialog" tabindex="-1" class="modal fade in" id="win_update" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <h4 id="gridModalLabel" class="modal-title">修改保险产品</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table id="update_table" class="table table-bordered">
                        <tbody>
                            <tr>
                                <!--baoxiangongsiid, chanpinmingcheng, chanpinleibie,xiaoshoudanjia,chengbendanjia,dangqianzhuangtai-->
                                <div class="col-lg-4">
                                    <label class="font-noraml">保险公司：</label>
                                    <select id="update_baoxiangongsiid" name="update_baoxiangongsiid">
                                        <option value="1">中国人保</option>
                                        <option value="2">泰康在线</option>
                                        <option value="3">阳光保险</option>
                                        <option value="4">中国平安</option>
                                        <option value="5">安联保险</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-noraml">保险类型：</label>
                                    <select id="update_chanpinleibie" name="update_chanpinleibie">
                                        <option value="0">航空意外险</option>
                                        <option value="1">交通工具险</option>
                                        <option value="2">延误险</option>
                                    </select>
                                </div>
<!--                                <div class="col-lg-4">
                                    <label class="font-noraml">是否上架：</label>
                                    <select id="update_dangqianzhuangtai" name="update_dangqianzhuangtai">
                                        <option value="0">下架</option>
                                        <option value="1">上架</option>
                                    </select>
                                </div>-->
                            </tr>
                            <tr>
                                
                                <td>保险名称：</td>
                                <td><input id="update_chanpinmingcheng" class="form-control" name="update_chanpinmingcheng" type="text" />&nbsp;&nbsp;*</td>
                            </tr>
                            
                            <tr>
                                <td>销售单价：</td>
                                <td><input id="update_xiaoshoudanjia" class="num form-control" name="update_xiaoshoudanjia" type="text" />&nbsp;&nbsp;*</td>
                            </tr>
                            <tr>
                                <td>成本单价：</td>
                                <td><input id="update_chengbendanjia" class="num form-control" name="update_chengbendanjia" type="text" />&nbsp;&nbsp;*</td>
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
<!-- 修改保险产品 结束-->

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
                <th>操作</th>
            </tr>
        </thead>
    </table>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    
    function objtops(obj)
            {
                var p = [];
                for (var key in obj) {
                    p.push(key + '=' + encodeURIComponent(obj[key]));
                }
                return p.join('&');
            }

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
                                    url : '<?php echo site_url("admin/pingtaiguanli/baoxianchanping/all"); ?>',
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
                                    data: 'id',
                                            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                    // 下架
                                    $(nTd).html('<button type="button" onclick="modify(' + oData.id + ', \'' + oData.baoxiangongsiid + '\', \'' + oData.chanpinmingcheng + '\', \'' + oData.chanpinleibie + '\', \'' + oData.xiaoshoudanjia + '\', \'' + oData.chengbendanjia + '\', \'' + oData.dangqianzhuangtai + '\')" class="btn btn-danger">编辑</button>');
                                    //$(nTd).html('<button type="button" onclick="xiajia(' + oData.id + ')" class="btn btn-danger">下架</button>&nbsp;&nbsp;<button type="button" onclick="modify(' + oData.id + ', \'' + oData.baoxiangongsiid + '\', \'' + oData.chanpinmingcheng + '\', \'' + oData.chanpinleibie + '\', \'' + oData.xiaoshoudanjia + '\', \'' + oData.chengbendanjia + '\', \'' + oData.dangqianzhuangtai + '\')" class="btn btn-danger">编辑</button>');
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
                                            // 下架保险产品
                                                    function xiajia(id, name) {
                                                    var r = confirm("是否要下架？");
                                                            if (r == true) {
                                                                var csrf_name = getCookie('csrf_cookie_name');
                                                                $.post('<?php echo site_url("admin/pingtaiguanli/baoxianchanping/xiajia"); ?>', { id: id,csrf_test_name : csrf_name},function (data) {
                                                    if (data == '1')
                                                    {
                                                    alert('下架成功！');
                                                            table.ajax.reload();
                                                    }
                                                    else
                                                    {
                                                    alert('下架失败！');
                                                    }
                                                    });
                                                    }
                                                    }

                                            function modify(id, baoxiangongsiid, chanpinmingcheng, chanpinleibie,xiaoshoudanjia,chengbendanjia,dangqianzhuangtai)
                                            {
                                                // + oData.id + ', \'' + oData.baoxiangongsiid + '\', \'' + oData.chanpinmingcheng + '\', \'' + oData.chanpinleibie + '\', \'' + oData.xiaoshoudanjia + '\', \'' + oData.chengbendanjia + '\', \'' + oData.dangqianzhuangtai
                                            $('#gsid').val(id);
                                                    $('#update_baoxiangongsiid').val(baoxiangongsiid != 'null'? baoxiangongsiid: '');
                                                    $('#update_chanpinmingcheng').val(chanpinmingcheng != 'null'? chanpinmingcheng: '');
                                                    $('#update_chanpinleibie').val(chanpinleibie != 'null'? chanpinleibie: '');
                                                    $('#update_xiaoshoudanjia').val(xiaoshoudanjia != 'null'? xiaoshoudanjia: '');
                                                    $('#update_chengbendanjia').val(chengbendanjia != 'null'? chengbendanjia: '');
                                                    $('#update_dangqianzhuangtai').val(dangqianzhuangtai != 'null'? dangqianzhuangtai: '');
                                                    $('#win_update').modal('show');
                                            }
                                            // 查询
                                            function search1() {
                                            table.ajax.reload();
                                            }
                                            
                                            $(".limit").click(function(){
                                                if(this.value.toString()==="0"){
                                                    $(this).parent("div").children("input[type='text']").attr("readonly",'true');
                                                    var firstinput= $(this).parent("div").children("input[type='text']").first();
                                                    var lastinput=$(this).parent("div").children("input[type='text']").last();
                                                    firstinput.val("");
                                                    lastinput.val("");
                                                }else{
                                                      $(this).parent("div").children("input[type='text']").removeAttr("readonly");
                                                }

                                             })
                                                 $(".num").keypress(function(event) {  
                                                       var keyCode = event.which;  
                                                       if (keyCode == 46 || keyCode == 8 || (keyCode >= 48 && keyCode <=57))  
                                                           return true;  
                                                       else  
                                                           return false;  
                                                   }).focus(function() {  
                                                       this.style.imeMode='disabled';  
                                                   }); 
                                                   $(".age").bind("blur",function(){
                                                      var firstinput= $(this).parent("div").children("input[type='text']").first();
                                                      var lastinput=$(this).parent("div").children("input[type='text']").last();
                                                      if(parseInt(firstinput.val())>parseInt(lastinput.val())){
                                                          firstinput.val("");
                                                          lastinput.val("");
                                                          alert("最大年龄不能小于最小年龄,请重新填写");
                                                      }

                                                   })
                                            
                                            //增加附件
                                                function add_div(e){
                                                    var index= $(e).attr("add_index");
                                                    var htmlattach='<div class="row row-space">';
                                                    htmlattach+='<div class="col-lg-7">';
                                                    htmlattach+='<label class="font-noraml">附件名称：</label>';
                                                    htmlattach+='<input type="text" name="save_fujian_name'+index+']"  />';
                                                    htmlattach+='<label class="font-noraml">附件URL：</label>';
                                                    htmlattach+='<input type="text" name="save_fujian_url'+index+']" />';
                                                    htmlattach+='</div>';
                                                    htmlattach+='<div class="col-lg-1">';
                                                    htmlattach+='<button type="button" x="btn-del" class="btn btn-primary btn-ad">X</button>';
                                                    htmlattach+='</div></div>';
                                                    $(e).parent("div").parent("div").parent("div").append(htmlattach);
                                                    $(e).attr("add_index",++index);
                                                    $("button[x='btn-del']").bind("click",function(){
                                                            del_div($(this));
                                                    });
                                                }
                                                //删除附件
                                                function del_div(obj){
                                                    $(obj).parent("div").parent("div").remove();
                                                }

                                            $(function () {
                                  // 添加保险产品
                                            $('#btn_save').click(function () {
                                            //17
                                            var chanpinmingcheng = $.trim($('#save_chanpinmingcheng').val());
                                            var baoxiangongsiid = $.trim($('#save_baoxiangongsiid').val());
                                            var chanpinleibie = $.trim($('#save_chanpinleibie').val());
                                            var baoxianjine = $.trim($('#save_baoxianjine').val());
                                            var xiaoshoudanjia = $.trim($('#save_xiaoshoudanjia').val());
                                            var chengbendanjia = $.trim($('#save_chengbendanjia').val());
                                            var jiesuanfangshi = $.trim($('#save_jiesuanfangshi').val());
                                            var baoxianqixian = $.trim($('#save_baoxianqixian').val());
                                            var chanpindaima = $.trim($('#save_chanpindaima').val());
                                            var shifoutuibao = $.trim($('input[name="save_shifoutuibao"]:checked').val());
                                            var nianlingxianzhi = $.trim($('input[name="save_nianlingxianzhi"]:checked').val());
                                            var zuixiaonianling = $.trim($('#save_zuixiaonianling').val());
                                            var zuidanianling = $.trim($('#save_zuidanianling').val());
                                            var baoexiangxi = $.trim($('#save_baoexiangxi').val());
                                            var baoxianfanwei = $.trim($('#save_baoxianfanwei').val());
                                            var beizhu = $.trim($('#save_beizhu').val());
                                            var yanzhengdizhi = $.trim($('#save_yanzhengdizhi').val());
                                            
                                            if (chanpinmingcheng == '')
                                            {
                                            alert('保险名称不能为空！');
                                            return;
                                            }
                                            if (baoxianjine == '') {
                                            alert('保险金额不能为空！');
                                            return;
                                            }

                                            if (xiaoshoudanjia == '') {
                                            alert('销售单价不能为空！');
                                            return;
                                            }
                                            if (chengbendanjia == '') {
                                            alert('成本单价不能为空！');
                                            return;
                                            }
                                            if (chanpindaima == '') {
                                            alert('保险代码不能为空！');
                                            return;
                                            }
                                            
//                                            if (zuixiaonianling == '') {
//                                            alert('最小年龄不能为空！');
//                                            return;
//                                            }
//                                            if (zuidanianling == '') {
//                                            alert('最大年龄不能为空！');
//                                            return;
//                                            }
                                            
                                            if (baoexiangxi == '') {
                                            alert('保额详细不能为空！');
                                            return;
                                            }
                                            if (baoxianfanwei == '') {
                                            alert('投保范围及限制不能为空！');
                                            return;
                                            }
                                            if (yanzhengdizhi == '') {
                                            alert('保单验证地址不能为空！');
                                            return;
                                            }
                                            var csrf_name = getCookie('csrf_cookie_name');
                                            var baoxinxinxi = {
                                               chanpinmingcheng: chanpinmingcheng,
                                               baoxiangongsiid: baoxiangongsiid,
                                               chanpinleibie: chanpinleibie,
                                               baoxianjine: baoxianjine,
                                               xiaoshoudanjia: xiaoshoudanjia,
                                               chengbendanjia: chengbendanjia,
                                               jiesuanfangshi: jiesuanfangshi,
                                               baoxianqixian: baoxianqixian,
                                               chanpindaima: chanpindaima,
                                               shifoutuibao: shifoutuibao,
                                               nianlingxianzhi: nianlingxianzhi,
                                               zuixiaonianling: zuixiaonianling,
                                               zuidanianling: zuidanianling,
                                               baoexiangxi: baoexiangxi,
                                               baoxianfanwei: baoxianfanwei,
                                               beizhu: beizhu,
                                               yanzhengdizhi: yanzhengdizhi,
                                               
                                                csrf_name : csrf_name
                                            }
                                            $.post('<?php echo site_url("admin/pingtaiguanli/baoxianchanping/save"); ?>', objtops(baoxinxinxi)).success(function (data) {

                                            
                                            if (data == '1')
                                            {
                                            alert('保存成功！');
                                                    table.ajax.reload();
                                                    $('#gridSystemModal').modal('hide');
                                            }
                                            else
                                            {
                                            alert('保存失败！');
                                            }
                                            });
                                            });
                                        //修改保险产品
                                        $('#btn_update').click(function () {
                                            var baoxiangongsiid = $.trim($('#update_baoxiangongsiid').val());
                                            var chanpinmingcheng = $.trim($('#update_chanpinmingcheng').val());
                                            var chanpinleibie = $.trim($('#update_chanpinleibie').val());
                                            var xiaoshoudanjia = $.trim($('#update_xiaoshoudanjia').val());
                                            var chengbendanjia = $.trim($('#update_chengbendanjia').val());
                                            //var dangqianzhuangtai = $.trim($('#update_dangqianzhuangtai').val());
                                            if (chanpinmingcheng == '')
                                            {
                                            alert('保险名称不能为空！');
                                            return;
                                            }

                                            if (xiaoshoudanjia == '') {
                                            alert('销售单价不能为空！');
                                            return;
                                            }

                                            if (chengbendanjia == '') {
                                            alert('成本单价不能为空！');
                                            return;
                                            }
                                            var csrf_name = getCookie('csrf_cookie_name');
                                            var xiugaichanpin = {
                                               id: $('#gsid').val(),
                                               baoxiangongsiid: baoxiangongsiid,
                                               chanpinmingcheng: chanpinmingcheng,
                                               chanpinleibie: chanpinleibie,
                                               xiaoshoudanjia: xiaoshoudanjia,
                                               chengbendanjia: chengbendanjia,
                                               //dangqianzhuangtai: dangqianzhuangtai,
                                               csrf_test_name : csrf_name
                                            }
                                            $.post('<?php echo site_url("admin/pingtaiguanli/baoxianchanping/update"); ?>', objtops(xiugaichanpin)).success(function (data) {
                                                if (data == '1')
                                                {
                                                alert('修改成功！');
                                                    table.ajax.reload();
                                                    $('#win_update').modal('hide');
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
