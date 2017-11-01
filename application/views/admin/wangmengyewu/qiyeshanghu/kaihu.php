<div class="row">
    <div class="col-md-12" style="padding: 4rem 8rem;border: 1px solid #000;width: 80%;margin:4rem 10%;">

        <form class="form-horizontal" method="post" name="kaihuform" id="kaihuform" action='<?php echo site_url("admin/wangmengyewu/qiyeshanghu/savekaihu");?>'>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                value="<?php echo $this->security->get_csrf_hash()?>" />        
            <div class="form-group">
                <label for="email" class="col-sm-4 control-label">*注册邮箱</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" placeholder="注册邮箱" name="email" >
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">*公司联系人</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" placeholder="公司联系人" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="mingcheng" class="col-sm-4 control-label">*公司名称</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="mingcheng" placeholder="公司名称" name="mingcheng">
                </div>
            </div>
            <div class="form-group">
                <label for="shanghudianhua" class="col-sm-4 control-label">*公司联系方式</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="shanghudianhua" placeholder="公司联系方式" name="shanghudianhua">
                </div>
            </div>

            <div class="form-group">
                <label for="qingsuanfangshi" class="col-sm-4 control-label">*清算方式</label>
                <div class="col-sm-5">
                    <select class="form-control" name="qingsuanfangshi"  onChange="setsel(this)">
                        <option value="0">周结</option>
                        <option value="1">月结</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="qingsuanriqi" class="col-sm-4 control-label">*清算日期</label>
                <div class="col-sm-5">
                    <select class="form-control" name="qingsuanriqi">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-4 control-label">账户信息：</label>

            </div>
            <div class="form-group">
                <label for="shoukuanpingtai" class="col-sm-4 control-label">*收款平台</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="shoukuanpingtai" placeholder="如：中国银行、支付宝等" name="shoukuanpingtai">
                </div>
            </div>
            <div class="form-group">
                <label for="huzhuming" class="col-sm-4 control-label">*户主名</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="huzhuming" placeholder="收款平台户主名" name="huzhuming">
                </div>
            </div>
            <div class="form-group">
                <label for="zhanghao" class="col-sm-4 control-label">*收款帐号</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="zhanghao" placeholder="收款帐号" name="zhanghao">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">确定</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script>

    var riqi=[    
            ["1","2","3","4","5","6","7"],  
            ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"],

        ];    
        function setsel(q){    
            var qingsuanfangshi=document.kaihuform.qingsuanfangshi;  
            var qingsuanriqi=document.kaihuform.qingsuanriqi;    
            var iqiselect=riqi[qingsuanfangshi.selectedIndex];    
            qingsuanriqi.length=0;    
            for(var i=0;i<iqiselect.length;i++){    
                qingsuanriqi[i]=new Option(iqiselect[i],iqiselect[i]);    
            }
        }

$(function(){
        var validate = $("#kaihuform").validate({
                        debug: false, //调试模式取消submit的默认提交功能   
                        //errorClass: "label.error", //默认为错误的样式类为：error   
                        focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
                        onkeyup: false,   
  
                        ignore: ":hidden",
                        onsubmit:true, // 是否提交验证
                        rules:{
                            email:{
                                required:true,
                                email: true,
                                  remote: {
                                        url: '<?php echo site_url("admin/wangmengyewu/qiyeshanghu/chayouxiang");?>',
                                        type: "post",
                                        dataType: "text",
                                        data: {
                                            VerifyCode: function () {
                                                return $("#email").val();　　　　//这个是取要验证的邮箱
                                            }
                                            ,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                                        },
                                        dataFilter: function (data) {　　　　//判断控制器返回的内容
                                            if (data == "true") {
                                                return false;
                                            }
                                            else {
                                                return true;
                                            }
                                        }
                                    }                                
                            },
                            shoukuanpingtai:{
                                required:true,
                            },                    
                            huzhuming:{
                                required:true,
                            },                    
                            zhanghao:{
                                required:true,
                            },
                            mingcheng:{
                                required:true,
                            },
                            name:{
                                required:true,
                            },
                            shanghudianhua:{
                                required:true,
                            },



                          
                       },
                        messages:{
                            email:{
                                required:"邮箱不能为空",
                                email:"邮箱格式不正确",
                                remote:"邮箱已存在"
                            },
                            shoukuanpingtai:{
                                required:"收款平台不能为空",
                            },
                            huzhuming:{
                                required:"户主名不能为空",
                            },
                            zhanghao:{
                                required:"收款帐号不能为空",
                            },
                            mingcheng:{
                                required:"公司名称不能为空",
                            },
                            name:{
                                required:"联系人姓名不能为空",
                            },
                            shanghudianhua:{
                                required:"公司电话不能为空",
                            },
         
                        }

                        // errorPlacement: function(error, element) {
                        //         error.appendTo($(".erro"));
                        //         var d = new Date();
                        //         $("#yzm").attr('src', $("#yzm").attr('src') + '/' + d.getMilliseconds());

                        //         // $("#VerifyCode").val('');
                        //         $(".num").val(parseInt($(".num").val())+1);
                        //         if (parseInt($(".num").val())>=2) {
                        //             $(".yanzhengmashow").css("display","block");
                        //         }
                        //     }
                       

                    });
    });

</script>
