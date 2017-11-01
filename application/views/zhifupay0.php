<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <title></title>
    </head>
    <body>
        <?php
$jsApiParameters = $parameters;//参数赋值
?>
 
<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                //WeixinJSBridge.log(res.err_msg);
                alert(res.err_msg);
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    $.alert('支付成功');
                    //我在这里选择了前台只要支付成功将单号传递更新数据
                    /*
                    $.ajax({
                        url:'<?php  echo $notifyurl.'/'.$pubid;?>',
                        dataType:'json',
                        success : function(ret){
                            if(ret==1){
                                //成功后返回我的订单页面
                                //location.href="<?php echo base_url().'index.php/wx/myorder';?>";
                            }
                        }
                    });
                    */
                }else
                {
                    //$.alert('支付失败');
                }
                //alert(res.err_code+res.err_desc+res.err_msg);
            }
        );
    }
 
    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
    
    function mycallpay(ps)
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            myjsApiCall(ps);
        }
    }
    
    function myjsApiCalljsApiCall(ps)
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            ps,
            function(res){
                //WeixinJSBridge.log(res.err_msg);
                alert(res.err_msg);
                if(res.err_msg == "get_brand_wcpay_request:ok" ){
                    $.alert('支付成功');
                    //我在这里选择了前台只要支付成功将单号传递更新数据
                    /*
                    $.ajax({
                        url:'<?php  echo $notifyurl.'/'.$pubid;?>',
                        dataType:'json',
                        success : function(ret){
                            if(ret==1){
                                //成功后返回我的订单页面
                                //location.href="<?php echo base_url().'index.php/wx/myorder';?>";
                            }
                        }
                    });
                    */
                }else
                {
                    //$.alert('支付失败');
                }
                //alert(res.err_code+res.err_desc+res.err_msg);
            }
        );
    }
</script>

<button class="weui_btn weui_btn_primary" type="button" onclick="callpay()" >立即支付</button>
<br/>
<br/>
<br/>
<br/>
<br/>

    </body>
</html>
