<div class="row">
  <div class="col-md-12">
    <h2 style="font-size: 30px; margin-bottom: 0px;">
      产品配置
    </h2>
  </div>
  <div class="col-md-12">
    <h4>
      <a >平台管理</a> / <a>产品配置</a>
    </h4>
  </div>
</div>

<div class="row">

  <form class="form-horizontal" role="form" action="<?php echo site_url("admin/pingtaiguanli/chanpinpeizhi/editsave"); ?>" id="peizhi" name="peizhi"  method = 'post' >

    <input type="text" hidden="hidden" name="id" value="<?php echo  $peizhi->id; ?>">
    <div class="form-group">
      <label for="chanpinleixing" class="col-sm-2 control-label">产品类型</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="chanpinleixing" name="chanpinleixing" placeholder="" value="<?php echo  $peizhi->chanpinleixing; ?>" disabled="true">
      </div>
    </div>

    <div class="form-group">
      <label for="yewuleixing" class="col-sm-2 control-label">业务类型</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="yewuleixing" name="yewuleixing" placeholder="" value="<?php echo  $peizhi->yewuleixing; ?>" disabled="true">
      </div>
    </div>
    <div class="form-group">
      <label for="shangbanshijian" class="col-sm-2 control-label">上班时间</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shangbanshijian" name="shangbanshijian" placeholder="0000" value="<?php echo  $peizhi->shangbanshijian; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="xiabanshijian" class="col-sm-2 control-label">下班时间</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="xiabanshijian"  name="xiabanshijian" placeholder="0000" value="<?php echo  $peizhi->xiabanshijian; ?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">周期</label>
      <div>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox1" value="1" name="zhouqi[]" <?php if(in_array('1', $zhouqi)){ echo 'checked=checked';} ;?> > 周1
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox2" value="2" name="zhouqi[]" <?php if(in_array('2', $zhouqi)){ echo 'checked=checked';} ;?> > 周2
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox3" value="3" name="zhouqi[]" <?php if(in_array('3', $zhouqi)){ echo 'checked=checked';}; ?> > 周3
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox4" value="4" name="zhouqi[]" <?php if(in_array('4', $zhouqi)){ echo 'checked=checked';} ;?> > 周4
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox5" value="5" name="zhouqi[]" <?php if(in_array('5', $zhouqi)){ echo 'checked=checked';}; ?> > 周5
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox6" value="6" name="zhouqi[]" <?php if(in_array('6', $zhouqi)){ echo 'checked=checked';}; ?> > 周6
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox7" value="0" name="zhouqi[]" <?php if(in_array("0", $zhouqi)){ echo 'checked=checked';};?> > 周7
        </label>

      </div>

    </div>
    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" id="savepeizhi">保存</button>
      </div>
    </div>
  </form>

</div>
<?php
$this->load->view('page/dbfooter');
?>
<script>
  $(function(){
    $("#savepeizhi").click(function(event) {

      var data= $("form").serialize();
      if ( JqValidate() ) {
        $("#peizhi").submit();
      } else {}

    });

    function JqValidate()  
    {  

      return  $("#peizhi").validate({
                        ignore: ":hidden",//不验证的元素
                        rules: {

                         shangbanshijian: {
                           required: true,
                           istime:true,
                           maxlength: 4,
                           minlength: 4,
                         },
                         xiabanshijian: {
                           required: true,
                           istime:true,
                           maxlength: 4,
                           minlength: 4,
                         },
                       },
                       messages: {
                         shangbanshijian: {
                           required: '必填項',
                         },
                         xiabanshijian: {
                           required: '必填項',
                         },
                       },

                     });

    };
    jQuery.validator.addMethod("istime", function(value, element){
      var reg = /^(0\d{1}|1\d{1}|2[0-3])([0-5]\d{1})$/;
      var r = value.match(reg);
      if(r == null){
        return false;
      } else {
        return true;
      } 
    },"输入格式不正确，请按hhmm的格式输入！");

  });
</script>