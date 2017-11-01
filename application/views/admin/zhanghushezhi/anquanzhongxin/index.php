<div class="row">
    <style type="text/css">
        .error {
            color:red;
        }
    </style>
    <form class="form-horizontal form-label-left" action="<?php echo site_url("admin/zhanghushezhi/anquanzhongxin/pwd"); ?>" method="post" data-parsley-validate="" id="signupForm" novalidate="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                value="<?php echo $this->security->get_csrf_hash()?>" />
        <div class="form-group">
            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">旧密码： <span class="required">*</span>
            </label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="password" class="form-control col-md-5 col-xs-12" id="old_password" name="old_password"/>
            </div>
        </div>
        <div class="form-group">
            <label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12">新密码： <span class="required">*</span>
            </label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="password" class="form-control col-md-5 col-xs-12" name="password" id="password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">重复密码： <span class="required">*</span>
            </label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="password" required="required" class="form-control col-md-5 col-xs-12" id="confirm_password" name="confirm_password">
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">重置</button>
                <button class="btn btn-success" type="submit">提交</button>
            </div>
        </div>

    </form>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('signupForm').reset();
$("#signupForm").validate({

	rules : {
		old_password : "required",
		password : {
			required : true,
			minlength : 5
		},
		confirm_password : {
			required : true,
			minlength : 5,
			equalTo : "#password"
		}

	},
	messages : {
		old_password : "请输入旧密码",
		password : {
			required : "请输入新密码",
			minlength : jQuery.format("新密码不能小于{0}个字 符")
		},
		confirm_password : {
			required : "请输入确认新密码",
			minlength : "确认新密码不能小于5个字符",
			equalTo : "两次输入新密码不一致不一致"
		}
	}

});

    });
</script>   
</body>
</html>
