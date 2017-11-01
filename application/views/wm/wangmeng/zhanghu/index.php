<!--面包导航-->
<ol class="daohangtiao">
    <li><a href="">首页</a></li>
    <li><a href="">商户信息</a></li>
    <li class="active">账户安全</li>
</ol>
<div style=" width: 100%; height: 100%; position: relative;">
    <div style="width: 40%;box-shadow: 0 2px 10px silver;min-width: 501px;  height: 370px;  margin: auto; position: absolute; top: 0; left: 150px;; 
     ">
    <form class="form-horizontal" autocomplete="off" >
        <div class="modal-header" style="background-color: #73ccd2; margin-bottom: 20px;">
            <h4 class="modal-title"  style="color: white;">修改登录密码</h4>
        </div>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
            value="<?php echo $this->security->get_csrf_hash()?>" />
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon glyphicon-star" style="color: #f10548;"></span>原密码：
            </label>
            <div class="col-sm-5" style="padding-right: 0;">
                <input type="password" class="input_text mima" id="mima" placeholder="" style="width: 100%;">
                <span style="color: #F10145;display: none;" class="cuowu1">密码错误，请重新输入</span>
            </div>
            <div class="col-sm-4" id="zhengque" style="display: none;">
                <img src="<?php echo base_url("resources/wm/images/zhengque.png"); ?>" style="">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="font-weight: normal;  padding-top: 3px;">新密码：</label>
            <div class="col-sm-5" style="padding-right: 0;">
                <input type="password" class="input_text" id="new_psd" placeholder="" style="width: 100%;" >
                <span style="color: #F10145;display: none;" class="cuowu2">密码格式错误，请重新输入</span>
            </div>
            <div class="col-sm-4">
                <img src="<?php echo base_url("resources/wm/images/zhengque.png"); ?>" style="margin-top: 5px; display: none;" id="zhengque2">
                <span style="color: #F10145;display: none;" class="cuowu2">8-20个字符组成 支持数字、英文字母，特殊字符(不包含空格)</span>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="font-weight: normal;  padding-top: 3px;"></label>
            <div class="col-sm-5" style="text-align: center; line-height: 0; padding-right: 0;">
                <div class="progress psd_strong">
                    <div class="progress-bar level_1" ></div>
                </div>
                <div class="progress psd_strong">
                    <div class="progress-bar level_2" ></div>
                </div>
                <div class="progress psd_strong">
                    <div class="progress-bar level_3"></div>
                </div>
                <div style="width:100%; height: 20px;">
                    <div style=" width: 30%; margin-left: 3%; text-align: center; float: left; height: 20px;">
                        <span class="ruo">弱</span>
                    </div>
                    <div style=" width: 30%; margin-left: 3%; text-align: center; float: left; height: 20px;">
                        <span class="zhong">中</span>
                    </div>
                    <div style=" width: 30%; margin-left: 3%; text-align: center; float: left; height: 20px;">
                        <span class="qiang">强</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="font-weight: normal;  padding-top: 3px;">确认新密码：</label>
            <div class="col-sm-5" style="padding-right: 0;">
                <input type="password" class="input_text" id="re_pwd" placeholder="" style="width: 100%; border-bottom: 1px solid #f10145;">
                <span style="color: #f10145;display: none;" class="cuowu3">两次输入密码不一致，请重新输入</span>
            </div>
            <div class="col-sm-4" style="display: none;" id="zhengque3">
                <img src="<?php echo base_url("resources/wm/images/zhengque.png"); ?>" style="margin-top: 5px;">
            </div>
        </div>
    </form>
    <div style="padding: 0px 13% 5% 5%; width: 100%; text-align: right;">
    <button class="btn guanbi">
            取&nbsp;&nbsp;消
        </button>
        <button class="btn baocun"   id="baocun">
            保&nbsp;&nbsp;存
        </button>
    </div>
</div>

<div class="modal fade bs-example-modal-sm_1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="xiuchenggong">
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 20%;">
        <div class="modal-content">
            <div style="text-align: center; padding: 10%;">
                <img src="<?php echo base_url("resources/wm/images/xiugaichenggong.png"); ?>">
                <h4><span style="color:#666666;">密码修改成功，系统将为您登录，请牢记您的新新密码</span></h4>
                <button type="button" class="btn lianjie_btn" style="width: 35%; margin: 0;" data-dismiss="modal" aria-label="Close">确定</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$this->load->view('page/wmfooter');
?>
<script type="text/javascript">
    $(function() {
        function checkStrong(val) {
            var modes = 0;
            if (val.length < 6)
                return 0;
            if (/\d/.test(val))
                        modes++; //数字
                    if (/[a-z]/.test(val))
                        modes++; //小写
                    if (/[A-Z]/.test(val))
                        modes++; //大写  
                    if (/\W/.test(val))
                        modes++; //特殊字符
                    //if (val.length > 12) return 4;
                    return modes;
                }
                ;
                $("#new_psd").keyup(function() {
                    var val = $(this).val();
                    //$("p").text(val.length);
                    var num = checkStrong(val);
                    switch (num) {
                        case 0:
                            //无
                            $(".ruo").css('color', '#666666');
                            $(".zhong").css('color', '#666666');
                            $(".qiang").css('color', '#666666');
                            $(".level_1").css('background', 'silver');
                            $(".level_2").css('background', 'silver');
                            $(".level_3").css('background', 'silver');
                            break;
                            case 1:
                            //弱
                            $(".ruo").css('color', '#f10145');
                            $(".zhong").css('color', '#666666');
                            $(".qiang").css('color', '#666666');

                            $(".level_1").css('background', '#f10145');
                            $(".level_2").css('background', 'silver');
                            $(".level_3").css('background', 'silver');
                            break;
                            case 2:
                            //中
                            $(".ruo").css('color', '#666666');
                            $(".zhong").css('color', '#fc9f3b');
                            $(".qiang").css('color', '#666666');

                            $(".level_1").css('background', '#fc9f3b');
                            $(".level_2").css('background', '#fc9f3b');
                            $(".level_3").css('background', 'silver');
                            break;
                            case 3:
                            //强
                            $(".ruo").css('color', '#666666');
                            $(".zhong").css('color', '#666666');
                            $(".qiang").css('color', '#73d77a');

                            $(".level_1").css('background', '#73d77a');
                            $(".level_2").css('background', '#73d77a');
                            $(".level_3").css('background', '#73d77a');
                            break;
                            case 4:
                            //还是强
                            $(".ruo").css('color', '#666666');
                            $(".zhong").css('color', '#666666');
                            $(".qiang").css('color', '#73d77a');

                            $(".level_1").css('background', '#73d77a');
                            $(".level_2").css('background', '#73d77a');
                            $(".level_3").css('background', '#73d77a');
                            break;
                            default:
                            break;
                        }
                    })
            });
    $(".mima").blur(function() {
        var mima = $(".mima").val();
        $.ajax({
            url: '<?php echo site_url("wm/wangmeng/zhanghu/yanmima"); ?>',
            type: 'POST',
            dataType: 'text',
            data: {"mima": mima,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        })
        .done(function(data) {
            if (data == "true") {
                $("#zhengque").css("display", "block");
                $(".cuowu1").css("display", "none");
            } else {
                $("#zhengque").css("display", "none");
                $(".cuowu1").css("display", "block");
            }

        })
    });
    $("#new_psd").blur(function() {
        var password = $("#new_psd").val();
        var reg = /^.{6,20}$/;
        if (password.match(reg) && password.indexOf(" ") < 0) {
            $(".cuowu2").css("display", "none");
            $("#zhengque2").css("display", "block");
        } else {
            $("#zhengque2").css("display", "none");
            $(".cuowu2").css("display", "block");
        }
    });
    $("#re_pwd").blur(function() {
        var password = $("#new_psd").val();
        var re_pwd = $("#re_pwd").val();
        if (password == re_pwd) {
            $("#zhengque3").css("display", "block");
            $(".cuowu3").css("display", "none");
        } else {
            $("#zhengque3").css("display", "none");
            $(".cuowu3").css("display", "block");

        }
    });

    function baocun() {
        var mima = $(".mima").val();
        var password = $("#new_psd").val();
        var re_pwd = $("#re_pwd").val();
        var l = false;

        $.ajax({
            url: '<?php echo site_url("wm/wangmeng/zhanghu/yanmima"); ?>',
            type: 'POST',
            dataType: 'text',
            data: {"mima": mima,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        })
        .done(function(data) {
            if (data == "true") {
                l = true;
                $("#zhengque").css("display", "block");
                $(".cuowu1").css("display", "none");
            } else {
                l = false;
                $("#zhengque").css("display", "none");
                $(".cuowu1").css("display", "block");
                return;
            }

        });
        if (l == true) {
            $("#zhengque").css("display", "block");
            $(".cuowu1").css("display", "none");
        } else {
            $("#zhengque").css("display", "none");
            $(".cuowu1").css("display", "block");
            return;
        }

        var reg = /^.{6,20}$/;
        if (password.match(reg) && password.indexOf(" ") < 0) {
            $(".cuowu2").css("display", "none");
            $("#zhengque2").css("display", "block");
        } else {
            $("#zhengque2").css("display", "none");
            $(".cuowu2").css("display", "block");
            return;
        }
        ;

        if (password == re_pwd) {
            $("#zhengque3").css("display", "block");
            $(".cuowu3").css("display", "none");
        } else {
            $("#zhengque3").css("display", "none");
            $(".cuowu3").css("display", "block");
            return;

        }

        $.ajax({
            url: '<?php echo site_url("wm/wangmeng/zhanghu/xiumima"); ?>',
            type: 'post',
            dataType: 'text',
            data: {"mima": mima, "password": password, "re_pwd": re_pwd,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
    $(".baocun").click(function() {

        var mima = $(".mima").val();
        var password = $("#new_psd").val();
        var re_pwd = $("#re_pwd").val();

        if($.trim(mima) == ""){
            $("#zhengque").css("display", "none");
            $(".cuowu1").css("display", "block");
            return;

        }

        var reg = /^.{6,20}$/;
        if (password.match(reg) && password.indexOf(" ") < 0) {
            $(".cuowu2").css("display", "none");
            $("#zhengque2").css("display", "block");
        } else {
            $("#zhengque2").css("display", "none");
            $(".cuowu2").css("display", "block");
            return;
        }
        ;

        if (password == re_pwd) {
            $("#zhengque3").css("display", "block");
            $(".cuowu3").css("display", "none");
        } else {
            $("#zhengque3").css("display", "none");
            $(".cuowu3").css("display", "block");
            return;

        }

        $.ajax({
            url: '<?php echo site_url("wm/wangmeng/zhanghu/xiumima"); ?>',
            type: 'post',
            dataType: 'text',
            data: {"mima": mima, "password": password, "re_pwd": re_pwd,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        })
        .done(function(data) {
            if (data == "true") {
                $("#xiuchenggong").modal('show');
            } else {

            }

        })


    });
    

</script>

