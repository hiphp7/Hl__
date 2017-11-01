<?php
$this->load->view('page/gheadex', $mystyle);
?>

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
                <button type="button" data-target="#gridSystemModal" data-toggle="modal" class="btn btn-success">导出excel</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <button type="button" data-target="#mymodal2" data-toggle="modal" class="btn btn-primary">添加追踪产品</button>
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
                            <div class="modal-header">
                                <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                <h4 id="mymodalLabel2" class="modal-title">添加产品</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <input type="text" id="dianpu" name="dianpu" class="form-control" placeholder="输入产品编号" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                                <button class="btn btn-primary" id="btn_add" type="button">添加</button>
                            </div>
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
            </tr>
        </thead>
    </table>
</div>

<?php
$this->load->view('page/gfootex');
?>
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#dianpudiaoyan').DataTable({
            fixedHeader: true,
            pagingType: "simple_numbers", //设置分页控件的模式
            searching: false, //屏蔽datatales的查询框
            aLengthMenu: [10], //设置一页展示10条记录
            bLengthChange: true, //屏蔽tables的一页展示多少条记录的下拉列表
            oLanguage: {//对表格国际化
                sLengthMenu: "每页显示 _MENU_条",
                sZeroRecords: "没有找到符合条件的数据",
                sProcessing: "正在加载请稍候...",
                sInfo: "当前第 _START_ - _END_ 条　共计 _TOTAL_ 条",
                sInfoEmpty: "没有记录",
                sInfoFiltered: "(从 _MAX_ 条记录中过滤)",
                sSearch: "搜索：",
                oPaginate: {
                    sFirst: "首页",
                    sPrevious: "前一页",
                    sNext: "后一页",
                    sLast: "尾页"

                }
            },
            processing: true, //打开数据加载时的等待效果
            serverSide: true, //打开后台分页
            ajax: {
                url: '<?php echo site_url("zhuizong/chanping_zz/all"); ?>',
                dataSrc: "aaData",
                type: "post",
                data: function(d) {
                    
                }
            },
            order: [[0, "desc"]],
            columnDefs: [{
                    render: function(data, type, row) {
                        var str = '<a href="<?php echo site_url("product/productdetail/index"); ?>?productid=' + row.productid + '" target="_blank">'+ data +'</a>';
						return str;
                    },
                    targets: 0
                }
            ],
            columns: [
                <?php $index = 0; $mycount = count($li); foreach ($li as $i): ?>
                <?php if ($index == $mycount - 1): ?>
                {
                    data: '<?php echo $i->name; ?>',
                    title: '<?php echo $i->display_name; ?>'
                } 
                <?php else: $index++;?>
                {
                    data: '<?php echo $i->name; ?>',
                    title: '<?php echo $i->display_name; ?>'
                }, 
                <?php endif; ?>
                <?php endforeach; ?>
                
            ]

        });
        
        //显示隐藏列
	$('.toggle-vis').on('change', function (e) {
		e.preventDefault();
		var column = table.column($(this).attr('data-column'));
		column.visible(!column.visible());
	});

// 导出 excel
                    $('#btn_excel').click(function () {
                        var str = 'ps=1';
                        $('.excel_content').find("input[type='checkbox']").each(function (item) {
                            if ($(this).is(':checked')) {
                                str += '&' + $(this).attr('id') + '=1';
                            }
                        });
                        window.open('<?php echo site_url("zhuizong/chanping_zz/daochu");?>?' + str, 'mywindow1', 'width=2, height=2, menubar=no, toolbar=no, scrollbars=yes');
                        $('#gridSystemModal').modal('hide');
                    });
                    
                    $('#btn_add').click(function () {
                        $.get('<?php echo site_url("zhuizong/chanping_zz/add");?>', { dianpu: $('#dianpu').val() }, function (data) {
                            if (data == '1')
                            {
                                alert('添加产品成功！');
                                $('#mymodal2').modal('hide');
                            }
                        });
                    });
    });

</script>
</body>
</html>
