<!--面包导航-->
<style type="text/css">
	input::-webkit-input-placeholder {
          /* placeholder颜色  */
         color: #CCCCCC;
         /* placeholder字体大小  */
         font-size: 18px;                  
}

::-webkit-input-placeholder { /* WebKit browsers */ 
color: #CCCCCC;
font-size: 18px;  
} 
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */ 
color: #CCCCCC;
font-size: 18px;  
} 
::-moz-placeholder { /* Mozilla Firefox 19+ */ 
color: #CCCCCC;
font-size: 18px;  
} 
:-ms-input-placeholder { /* Internet Explorer 10+ */ 
color: #CCCCCC;
font-size: 18px;  
} 
</style>
<ol class="daohangtiao">
    <li><a href="">首页</a></li>
    <li><a href="">推广管理</a></li>
    <li class="active">链接管理</li>
</ol>
<div style=" margin-bottom: 15px;">
    <span style="font-size: 25px;">最多可创建<span style="color:#73ccd2;">10</span>个推广链接</span>
    <button type="button" class="btn lianjie_btn"  style='<?php if(!$jianlianjie){echo "display:none";};?>'>增加链接</button>
    <!--<button type="button" class="btn lianjie_btn" data-toggle="modal" data-target=".bs-example-modal-lg_a" style='<?php if(!$jianlianjie){echo "display:none";};?>'>增加链接</button>-->
</div>
<div class="modal fade bs-example-modal-lg_a lianjieModal " tabindex="-1" role="dialog" aria-labelledby="lianjieModal" id="lianjieModal">
    <div class="modal-dialog modal-lg" role="document" style=" margin-top: 10%; width: 50%; max-width: 700px;">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header" style="border-bottom: 2px solid #73ccd2;">
                <button type="button" class="close chacha" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 2%;top: 10px; ">
                    <span aria-hidden="true" class="close_btn">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: #73ccd2;">创建链接</h4>
            </div>

            <div class="modal-body" style="padding-top: 10%; font-size: 1.8rem;" >
                <div class="row">
                    <div class="col-md-3" style="text-align: right; padding-right:0;">
                        <span class="glyphicon glyphicon-star" style="color: #f10548;"></span>链接名称：</div>
                        <div class="col-md-9">
                            <input name="carType" type="text" class="input_text"  id="carType"  placeholder="请输入链接名称" value=""/>
                            <img id="zhengque" style="display:none;"  src="<?php echo base_url("resources/wm/images/zhengque.png"); ?>">
                            <span id="cuowu" style="display:none; color: #f10548; font-size: 1.2rem;">文字格式不正确，请重新输入</span>
                        </div>

                    </div>

                    <div class="row"style="margin-bottom: 10px;">
                        <div class="col-md-3" style="text-align: right; padding-right:0;"></div>
                        <div class="col-md-7" style="color: #f10548; font-size: 1.2rem;">
                            (非空字符串组成)
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="text-align: right; padding-right:0;">创建后状态：</div>
                        <div class="col-md-7">
                            <label style="font-weight: inherit;"><input style="margin-left: 10px;" type="radio" name="lianjiezhuangtai" class="lianjiezhuangtai" id="optionsRadios1" value="0" checked> 启用</label>
                            <label style="font-weight: inherit;"><input style="margin-left: 10px;" type="radio" name="lianjiezhuangtai" class="lianjiezhuangtai" id="optionsRadios2" value="1">禁用</label>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <!--按钮-->
                    <div style="padding: 5%; width: 100%; text-align: right;">
                        <button class="btn guanbi" data-dismiss="modal" aria-label="Close">
                            关&nbsp;&nbsp;闭
                        </button>
                        <button class="btn baocun " id="baocun" >
                            保&nbsp;&nbsp;存
                        </button>
                    </div>


                </div>
            </div>
        </div>

    </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document" style="margin-top: 20%;">
            <div class="modal-content">
                <div style="text-align: center; padding: 5% 0;">
                    <h3 style="color: #fb3c3c;">创建成功！</h3>
                    <h4>请到“<span style="color:#22b7c2;"><a href='<?php echo site_url("wm/wangmeng/home/index"); ?>'>链接管理</a></span>”查看</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg_chakan" tabindex="-1" role="dialog" aria-labelledby="erweima" id="erweima">
        <div class="modal-dialog modal-lg" role="document" style=" margin-top: 10%;width: 570px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #73ccd2;">
                    <button type="button" class="close chacha" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 2%;top: 10px; ">
                        <span aria-hidden="true" class="close_btn">&times;</span>
                    </button>
                    <h4 class="modal-title"  style="color: #73ccd2;font-size: 22px;">查看</h4>
                </div>
                <input type="hidden" id="erweimaurl" class="erweimaurl" >
                <input type="hidden" id="lianjieid" class="lianjieid" >

                <div class="modal-body" style="padding-top: 5%; padding-bottom: 5%; font-size: 1.8rem;">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" style="text-align: center;">二维码边长(cm)</div>
                        <div class="col-md-4" style="text-align: center;" >下载</div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" style="text-align: center;">最小</div>
                        <div class="col-md-4" style="text-align: center;cursor: pointer;"><a class="glyphicon glyphicon-download-alt " length="8"  onclick ="xiazai(2)"></a></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" style="text-align: center;">中等</div>
                        <div class="col-md-4" style="text-align: center;cursor: pointer;"><a class="glyphicon glyphicon-download-alt " length="15"  onclick ="xiazai(5)"></a></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row"  style="margin-top: 10px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" style="text-align: center;">做大</div>
                        <div class="col-md-4" style="text-align: center;cursor: pointer;"><a class="glyphicon glyphicon-download-alt " length="50"   onclick ="xiazai(10)"></a></div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<style>

</style>
    <!-- 数据表 -->
    <div class="row" >
        <table id="dianpudiaoyan" class="table table-hover" >
            <thead style="background: #f7f8f9;">
                <tr >
                    <?php foreach ($li as $i): ?>
                        <th><?php echo $i->display_name; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
        </table>
    </div>






        <?php
        $this->load->view('page/wmfooter');
        ?>

        <script>
        
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
                    ordering:false,
                    paging:true,
                    info:false,
                                pagingType : "full", //设置分页控件的模式
                                searching : false, //屏蔽datatales的查询框
                                aLengthMenu : [10], //设置一页展示10条记录
                                bLengthChange : false, //屏蔽tables的一页展示多少条记录的下拉列表
                                oLanguage : { //对表格国际化
                                    sLengthMenu : "每页显示 _MENU_条",
                                    sZeroRecords : "<img style='width:50%;height:50%;padding-top:100px;padding-bottom:100px;' src='<?php echo base_url("resources/wm/images/wulianjie.png"); ?>'>",
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
                                    url : '<?php echo site_url("wm/wangmeng/home/all"); ?>',
                                    dataSrc : "myData",
                                    type : "post",
                                    data : function (d) {
                                        var csrf_name = getCookie('csrf_cookie_name');
                                        d.csrf_test_name = csrf_name;
                                        ;
                                    }
                                },
                                order : [[0, "desc"]],
                                columnDefs : [{
                                    render : function (data, type, row) {
                                        var str = "<span class='chakan' onclick='erweima(this)' qrcode="+row.qrcode+" lianjieid1="+row.id+">查看</span>";
                                        // var str = '<span onclick=\"erweima(' + row.qrcode + ')\">查看</span>';
                                        // var str = "<span onclick=\'erweima\("+row.qrcode+"\)\'>查看</span>";
                                        //var str = '<a href="' + row.external_url + '" target="_blank"><img src="' + row.small_picture + '" alt="" /></a>';
                                        return str;
                                        // return row.time;
                                    },
                                    targets : 3
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
     
                            });
                                // 查询
                                function search1() {
                                    table.ajax.reload();
                                }


                                $('#carType').blur(function() {
                                    $("#zhengque").css("display", "none");
                                    $("#cuowu").css("display", "none");
                                    var carType = $.trim($("#carType").val());
                                    if (carType.length > 0 && carType != ''){
                                        $("#zhengque").css("display", "inline");
                                    } else{
                                        $("#cuowu").css("display", "inline");
                                    }
                                });
                                $('#baocun').click(function() {
                                    // alert(1);
                                    var carType = $.trim($("#carType").val());
                                    if (carType.length > 0 && carType != ''){
                                        var zhuangtai = $('.lianjiezhuangtai:radio:checked').val();

                                        var csrf_name = getCookie('csrf_cookie_name');
                                        $.post('<?php echo site_url("wm/wangmeng/home/savelianjie"); ?>', {csrf_test_name: csrf_name,zhuangtai: zhuangtai,carType: carType,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function (data) {
                                         if(data != "false"){
											 if(data>=10){
												$('.lianjie_btn').css("display","none"); 
											 }
                                             $("#lianjieModal").modal('hide');
                                             table.ajax.reload()
                                         }else{
                                             $("#lianjieModal").modal('hide');
                                             table.ajax.reload()
                                         }

                                     });


                                    } else{

                                    }
                                    
                                    
                                });

                                function erweima(p){

                                    var url = $(p).attr('qrcode');
                                    var lianjieid = $(p).attr('lianjieid1');
                                    $(".erweimaurl").val(url);
                                    $(".lianjieid").val(lianjieid);
 
                                    $("#erweima").modal('show');
                                }
                                function xiazai(p){
                                    var lianjieid = $(".lianjieid").val();

                                    window.location.href='<?php echo site_url("wm/wangmeng/home/erweimaxiazai"); ?>/'+lianjieid+'/'+p; 

                                }

                            var a =$(".dataTables_empty").css("display");


							function borderColor(){
								if($('.input_text').val()==''){
									$('.input_text').css('border-color','#efefef');
									$('.input_text').mouseout(function(){
										if($('.input_text').val()){
											$('.input_text').css('border-color','#73ccd2');
										}
										else{
											$('.input_text').css('border-color','#efefef');
										}
									})
								}
								
							}
							$('.lianjie_btn').click(function() {
								$("#carType").val("");
								$("#zhengque").css("display", "none");
								$("#cuowu").css("display", "none");
								$("#lianjieModal").modal('show');
			
							});
							function btnChange(){
								$($('.lianjie_btn').hover(function(){
									$(this).css('background','#22b7c2')
								},function(){
									$(this).css('background','#73ccd2')
								}))
							}
							btnChange();
							borderColor();
							
							
							
                            </script>


