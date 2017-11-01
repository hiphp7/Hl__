<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>网盟服务平台</title>
    <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("resources/wm/css/mycss.css"); ?>">
    <link href="<?php echo base_url("static/jquery-validation/1.11.0/jquery.validate.min.css"); ?>" type="text/css" rel="stylesheet" />
    <script src="<?php echo base_url("static/jquery-validation/1.11.0/jquery.validate.min.js"); ?>" type="text/javascript"></script>
    <style type="text/css">
        .form-bg{
            background: #00b4ef;
        }
        .form-horizontal{
            background: #fff;
            padding-bottom: 40px;

            border: 1px solid black;
            padding: 20px;
        }
        .heading{padding: 5px 0 35px;}
        .form-horizontal{
            padding: 20px 20px 50px 20px;
        }
        .form-horizontal .heading{
            display: block;
            font-size: 40px;
            font-weight: 500;
            color: #0DC4d1;
            text-align: center;

        }
        .form-horizontal .form_hang{
            margin: 0 0 25px 0;
            position: relative;
        }
        .form-horizontal .form_h{

            border: none;

            box-shadow: none;
            width: 274px;
            transition: all 0.3s ease 0s;
            border-bottom: 1px solid #d3d3d3;
        }

        .form-horizontal .form_hang i{
            position: absolute;
            top: 12px;
            left: 60px;
            font-size: 17px;
            color: #c8c8c8;
            transition : all 0.5s ease 0s;
        }


        .form-horizontal .text{
            float: left;
            margin-left: 7px;
            line-height: 20px;
            padding-top: 5px;
            text-transform: capitalize;
        }
        .form-horizontal .btn{
            float: right;
            font-size: 14px;
            color: #fff;
            background: #00b4ef;
            padding: 10px 25px;
            border: none;
            text-transform: capitalize;
            transition: all 0.5s ease 0s;
        }
        @media only screen and (max-width: 479px){
            .form-horizontal .form_hang{
                padding: 0 25px;
            }
            .form-horizontal .form_hang i{
                left: 45px;
            }
            .form-horizontal .btn{
                padding: 10px 20px;
            }
        }

         .form-horizontal   :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            font-size: 18px;
            margin: 4px;
            }

         .form-horizontal   ::-moz-placeholder { /* Mozilla Firefox 19+ */
            font-size: 18px;
            margin: 4px;
            }

        .form-horizontal    input:-ms-input-placeholder
        {
            font-size: 18px;
            margin: 4px;
            }

         .form-horizontal   input::-webkit-input-placeholder
         {
                font-size: 18px;
                margin: 4px;

        }
        .denglu{
            background: #8dd2d7 !important; padding: 5px !important; font-size: 20px !important;
        }
        
            /*  输入框默认字体 */
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color: #d3d3d3; opacity:1; font-size: 15px;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color: #d3d3d3;opacity:1; font-size: 15px;
    }
    input:-ms-input-placeholder{
        color: #d3d3d3;opacity:1; font-size: 15px;
    }
    input::-webkit-input-placeholder{
        color: #d3d3d3;opacity:1; font-size: 15px;
    }
    .qing {
        display: none;
        position: absolute;right: 10px;top: 6px; z-index: 99;
    }
    .qing_psd{
        display: none;position: absolute;right: 10px;top: 6px; z-index: 99;
    }
    .yanzhengmashow{
        display: none;
    }
    </style>    
</head>

<body style="background-color: #f0f0f0;min-width: 1300px;">

<div >
    <div style="position:absolute; left: 40px; top:30px; z-index:2;"><img src='<?php echo base_url("resources/wm/banner.png"); ?>' alt=""></div>
    <div  class="login_dingwei" >
        <div  style="width: 354px; padding: 20px 0;">
            <form method="POST" action="<?php echo site_url("wm/login/mylogin"); ?>" class="form-horizontal" style="overflow:auto; box-shadow: 0px 0px 10px #666666; border: 0px none;"  autocomplete="on" id="loginform">
                <span class="heading">欢迎登录</span>
                <div class="form_hang">
                    <span  ><img src='<?php echo base_url("resources/wm/ren.png"); ?>' alt="" style="vertical-align: bottom; " /></span>
                    <input type="text" class="form_h " name="name" id="name" placeholder="企业邮箱/用户名" onblur="show_Icon('user')"  value="<?php if(!empty($username)) echo $username ;?>">
                    <img src="<?php echo base_url("resources/wm/cha.png"); ?>" alt="" class="qing"  onclick="qing(this)" />
                </div>
                <div class="form_hang">
                    <span  ><img src='<?php echo base_url("resources/wm/suo.png"); ?>' alt=""  style="vertical-align: bottom !important;"/></span>
                    <input type="password" class="form_h" name="password" id="password" placeholder="请输入密码" onblur="show_Icon('psd')"  value="<?php if(!empty($password)) echo $password ;?>">
                    <span  style="margin-left: -25px" class="qing_psd" onclick="qing(this)"><img src="<?php echo base_url("resources/wm/cha.png"); ?>" alt="" /></span>
                </div>

                <div class="form_hang yanzhengmashow">
                    <span  ><img src='<?php echo base_url("resources/wm/yan3px.png"); ?>' alt="" /></span>
                    <input type="text" class="form_h "  name="VerifyCode" id="VerifyCode" placeholder="请输入验证码" style="width: 130px;" >
                    <span>
                        <span  style="width: 76px;height: 37px;">
                            <img src="<?PHP echo site_url('tools/mycaptcha/code')?>" id="yzm" alt="">
                        </span>
                        <span style="padding-left: 4px;color: #0DC4d1;" id="huanyizhang">换一张</span>
                    </span>

                </div>

                <div generated="true" class="erro" id="erro" name="erro">
                </div>
                <div class="msg" id="msg"></div>

                <div style="">
                    <input type="checkbox" name="remmber" id="remmber" style="margin:5px;" /><span style="margin:15px; font-size: 18px; color: #6b7b80;" >下次自动登录</span>
                </div>
                <div class="form_hang" style="margin: 20px">
                    <input type="text" name="num" id="num" class="num" value="0" style="display: none">
                    <button type="submit" class="btn btn-default denglu" style="width: 100%; color: white !important;">登&nbsp;录</button>
                </div>
            </form>
        </div>
    </div>

    <div id="myCarousel" class="carousel slide">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   

        <div class="carousel-inner">
            <div class="item active">
                <img src='<?php echo base_url("resources/wm/01.png"); ?>' alt="First slide">
            </div>
            <div class="item">
                <img src='<?php echo base_url("resources/wm/02.png"); ?>' alt="Second slide">
            </div>
            <div class="item">
                <img src='<?php echo base_url("resources/wm/03.png"); ?>' alt="Third slide">
            </div>
        </div>
    </div> 
</div>

<div style="text-align: center;line-height: 50px; color: #c1c8cf;width: 100%; margin-top:50px;">
    2012-2017 比比旅行版本所有 粤 IC 备 13042645 号
</div>


<script>
    $(function(){


        var validate = $("#loginform").validate({
                        debug: false, //调试模式取消submit的默认提交功能   
                        //errorClass: "label.error", //默认为错误的样式类为：error   
                        focusInvalid: false, //当为false时，验证无效时，没有焦点响应  
                        onkeyup: false,   
                        submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form   
                            var param = $("#loginform").serialize();

                            $.ajax({
                                url: '<?php echo site_url("wm/login/mylogin"); ?>',
                                type: 'post',
                                dataType: 'json',
                                data: param,
                            })
                            .done(function(data) {

                                if (data.status == 0) {

                                    window.location.href='<?php echo site_url("wm/wangmeng/home/index"); ?>';  

                                } else {
                                    $(".msg").append('<label for="name" class="error">'+data.msg+'</label>');
                                    $(".num").val(data.num);
                                    if (data.num>=2) {
                                        $(".yanzhengmashow").css("display","block");
                                    }
                                }
                            })
     
                        },   
                        ignore: ":hidden",
                        onsubmit:true, // 是否提交验证
                        rules:{
                            name:{
                                required:true
                            },
                            password:{
                                required:true,
                                rangelength:[6,20]
                                
                            },
                            VerifyCode:{
                                required:true,
                                  remote: {
                                        url: '<?php echo site_url("wm/login/yanzhengma");?>',
                                        type: "post",
                                        dataType: "json",
                                        data: {
                                            VerifyCode: function () {
                                                return $("#VerifyCode").val();　　　　//这个是取要验证的密码
                                            }
                                        },
                                        dataFilter: function (data) {　　　　//判断控制器返回的内容
                                            if (data == "true") {
                                                return true;
                                            }
                                            else {
                                                return false;
                                            }
                                        }
                                    }
                                },
                            },
                          
                       
                        messages:{
                            name:{
                                required:"邮箱不能为空"
                            },
                            password:{
                                required:"密码不能为空",
                                rangelength:"密码错误"
                            },
                            VerifyCode:{
                                required: "验证码不能为空",
                                remote:"验证码错误"
                            },
                        },

                        errorPlacement: function(error, element) {
                                error.appendTo($(".erro"));
                                var d = new Date();
                                $("#yzm").attr('src', $("#yzm").attr('src') + '/' + d.getMilliseconds());

                                // $("#VerifyCode").val('');
                                $(".num").val(parseInt($(".num").val())+1);
                                if (parseInt($(".num").val())>=2) {
                                    $(".yanzhengmashow").css("display","block");
                                }
                            }
                       

                    });
            
                


        //点击看不清，换一张更换验证码。
        $("#huanyizhang, #yzm").click(function(){
            var d = new Date();
            $("#yzm").attr('src', $("#yzm").attr('src') + '/' + d.getMilliseconds());
        });
        // 初始化轮播            
        $('#myCarousel').carousel({
            interval: 2000
        });


    });
        function change(q){
            if ($(q).val() != '') {
                $(q).siblings(".qing").css("display","inline");
            }
        }
        function qing(q){
            $(q).siblings("input").val("");
            $(q).css("display","none");
        }
        function show_Icon(User_or_Psd){
            if(User_or_Psd == 'user'){
                $(".qing").show();  
            }else{
                $(".qing_psd").show();  
            }
        }

</script>

</body>
</html>