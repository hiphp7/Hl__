<!--面包导航-->
<script type="text/javascript">

function fayanzhengma1(){
    countdown = 60;
    $.post('<?php echo site_url("wm/wangmeng/zhifu/fayanzhengma");?>',{'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(json, textStatus) {
    });


}

function settime(val) {

    if (countdown == 0) {
        val.removeAttribute("disabled");
    } else {
        val.setAttribute("disabled", "disabled");
        countdown--;
    }
  var  i = setTimeout(function() {
        settime(val)
    }, 1000);

}

function baocun(){
    var yanzhengshenfen = $("#yanzhengshenfen").val();
    $.post('<?php echo site_url("wm/wangmeng/zhifu/yanzheng");?>',{yanzhengshenfen:yanzhengshenfen,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'} , function(json, textStatus) {
            if (json == "true") {
                var shoukuanpingtai = $("#shoukuanpingtai").val();
                var huzhuming = $("#huzhuming").val();
                var zhanghao = $("#zhanghao").val();

                $.post('<?php echo site_url("wm/wangmeng/zhifu/xiuzhanghu");?>',{shoukuanpingtai:shoukuanpingtai,huzhuming:huzhuming,zhanghao:zhanghao,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'}, function(json, textStatus) {
                        if (json == "true") {
                            alert('账号修改成功');
                            window.location.href='<?php echo site_url("wm/wangmeng/home/index");?>'; 
                        } else{
                            alert('账号修改失败');
                        }
                });
            } else{
                alert("邮箱验证码错误")
            }
    },'text');

}

</script>

<ol class="daohangtiao">
    <li><a href="">首页</a></li>
    <li><a href="">商户信息</a></li>
    <li class="active">收款设置</li>
</ol>
<div style=" width: 100%; height: 100%; position: relative;">
	<div style=" width: 100%; height: 100%;">
	<div style="width: 40%;border: 1px red solid;width: 501px;margin: 0 auto;  <?php if(empty($zhanghu->zhanghao)){ echo 'display:display';} else { echo 'display:none';}; ?>  "  >系统检测到您还未设置“收款账户”，请先完成设置再进行操作</div>
	<div style="clear: both;"></div>
    <div style="width: 40%;box-shadow: 0 2px 10px silver;min-width: 501px;  height: 400px;  margin: auto;   ; 
     ">
    <form class="form-horizontal" autocomplete="off" >
        <div class="modal-header" style="background-color: #73ccd2; margin-bottom: 20px;">
            <h4 class="modal-title"  style="color: white;text-align: center;">收款设置</h4>
        </div>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                value="<?php echo $this->security->get_csrf_hash()?>" />
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon " style="color: #f10548;"></span>收款平台：
            </label>
            <div class="col-sm-6" >
                <input type="text" class=" " id="shoukuanpingtai" placeholder="如:支付宝、招商银行等" style="width: 100%;" value='<?php echo $zhanghu->shoukuanpingtai;  ?>'>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon " style="color: #f10548;"></span>收款账号：
            </label>
            <div class="col-sm-6" >
                <input type="text" class=" " id="zhanghao" placeholder="收款账号" style="width: 100%;" value='<?php echo $zhanghu->zhanghao;  ?>'>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon " style="color: #f10548;"></span>户主名称：
            </label>
            <div class="col-sm-6" >
                <input type="text" class=" " id="huzhuming" placeholder="与真实姓名或公司名称一致" style="width: 100%;" value='<?php echo $zhanghu->huzhuming;  ?>'  disabled = "disabled">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon " style="color: #f10548;"></span>邮箱地址：
            </label>
            <div class="col-sm-6" >
                <input type="text" class=" " id="email_dizhi" placeholder="请输入完整的邮箱地址" style="width: 100%;" value='<?php echo $email;  ?>' disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
                <span class="glyphicon " style="color: #f10548;"></span>验证身份：
            </label>
            <div class="col-sm-6" >
                <input type="text" class=" " id="yanzhengshenfen" placeholder="请输入邮箱验证码" style="width: 100%;" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" style="font-weight: normal; padding-top:3px;">
              
            </label>
            <div class="col-sm-6" >
                <input type="button" class="btn btn-default" class="fayanzhengma" onclick="fayanzhengma1();settime(this);" value="发送邮箱验证码" >
            </div>
        </div> 
                      
       
    </form>

        <hr/>
    <div style="padding: 0px 13% 5% 5%; width: 100%; text-align: right;">

        <input type="reset" class="btn btn-default baocun"  value="重置" >

        <button class="btn baocun"    onclick="baocun()">
            保&nbsp;&nbsp;存
        </button>
    </div>  

</div>

</div>

<?php
$this->load->view('page/wmfooter');
?>

