<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to CodeIgniter</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
        <script src="<?php echo base_url("vendors/jquery/dist/jquery.min.js"); ?>"></script>
        <script type="text/javascript">
            $(function () {
                $('#mya').click(function () {
                var js = {air: 1, total_fee: 1, body: '深圳到北京', attach: '', 
						 goods_tag: '航旅投资', detail: ''};
		var ps = encodeURIComponent(JSON.stringify(js));
                window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_sucesss.php?ps='+ ps +'&';
                //$('#h1').html(ps);
                });
				
				$('#mya1').click(function () {
                var js = {air: 1, total_fee: 2, body: '深圳到北京', attach: '', 
						 goods_tag: '航旅投资', detail: ''};
		var ps = encodeURIComponent(JSON.stringify(js));
                //window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi.php?ps=' + ps;
                $('#h1').html('http://m.bibi321.com/hl/wxpay/jsapi.php?ps=' + ps);
                });
            });
        </script>
</head>
<body>

<div id="container">
    <h1 id="h1"></h1>
        
        参考：官网 https://colorlib.com/polygon/gentelella/index.html
		<br>
        <br>
        <br>
        <br>
        <br>
		<a href="#" id="mya1">生成带参数的字符串</a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="#" id="mya">测试一个结账</a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
	<?php echo form_open('test/db/mypost', array('id' => 'loginForm', 'name' => 'loginForm', 'class' => 'form-signin'));?>
		<label class="input-label" for="username">登录名</label>
		<input type="text" id="username" name="username" class="input-block-level required" value="">
		<label class="input-label" for="password">密码</label>
		<input type="password" id="password" name="password" class="input-block-level required">
                <div>
                    <ul style="list-style:none;margin:0;">
                        <li style="display:inline;">
                            <label class="input-label" for="VerifyCode">验证码</label>
                            <input type="text" id="VerifyCode" name="VerifyCode" class="input-block-level required" value=""></li>
                        <li style="display:inline;margin-bottom:10px;display:block">
                            <img alt="" src="<?PHP echo site_url('tools/mycaptcha/code')?>" id="yzm" />
                        &nbsp;<a id="huanyizhang" style="cursor: pointer;">看不清，换一张？</a></li>
                    </ul>
                </div>
		<input class="btn btn-large btn-primary" type="submit" value="登 录" style="margin-right:35px;"/>&nbsp;&nbsp;
                <!--
		<label for="rememberMe" title="下次不需要再登录"><input type="checkbox" id="rememberMe" name="rememberMe" /> 记住我（公共场所慎用）</label>
                
                <a href="<?php echo site_url("users/myusers/add"); ?>">注 册</a>
                -->
		<div id="themeSwitch" class="dropdown">
                       <!--
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">默认主题<b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="#" onclick="location='/theme/default?url='+location.href">默认主题</a></li><li><a href="#" onclick="location='/theme/cerulean?url='+location.href">天蓝主题</a></li><li><a href="#" onclick="location='/theme/readable?url='+location.href">橙色主题</a></li><li><a href="#" onclick="location='/theme/united?url='+location.href">红色主题</a></li><li><a href="#" onclick="location='/theme/flat?url='+location.href">Flat主题</a></li>
			</ul>
                       -->
			<!--[if lte IE 6]><script type="text/javascript">$('#themeSwitch').hide();</script><![endif]-->
                       <?php if (!empty($err)): ?>
                       <span style="color:red;"><?php echo $err; ?>   </span>
                       <?php endif; ?>
		</div>
	</form>

        <?php 
        echo base_url();
        ?>
        
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
