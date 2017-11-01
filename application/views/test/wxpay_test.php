<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <title></title>
        <script src="<?php echo base_url("vendors/jquery/dist/jquery.min.js"); ?>"></script>
        <script type="text/javascript">
            $(function(){
                // ajax 可以支付了嘛
                $("#btn").click(function(){
                    $.get('<?php echo site_url("test/wxpay_test/zhifu");?>?out_trade_no=115&total_fee=1&body=火车票&attach=11&goods_tag=火车票&detail=火车票3', function(data){
                        //mycallpay(data);
                        alert(data);
                    });
                });
            });
    
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
                    
                    // 把订单传到数据库
                }else
                {
                    $.alert('支付失败');
                }
            }
        );
    }
</script>
    </head>
    <body>
        <button id="btn" class="weui_btn weui_btn_primary" type="button">立即支付</button>
    </body>
</html>
