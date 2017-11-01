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
					var total_fee = parseFloat($scope.costdetail.totalprice);
				    var body = "航班"+$scope.selected.goto.depCity+"到"+$scope.selected.goto.arrCity;
					var attach = '';
					var goods_tag = '';
					var detail = '';
						 
					var js = {air: 1, total_fee: total_fee, body: body, attach: attach, 
						 goods_tag: goods_tag, detail: detail};
					var ps = encodeURIComponent(JSON.stringify(js));
                    window.location.href = 'http://m.bibi321.com/hl/index.php/wx/zhifu/' + ps;
                });
            });
    
</script>
    </head>
    <body>
        <button id="btn" class="weui_btn weui_btn_primary" type="button">立即支付</button>
        <br><br><br>
        <a href='http://m.bibi321.com/hl/index.php/wx/zhifu?out_trade_no=111&total_fee=1&body=test1&attach=test2&goods_tage=11&detail=1111'>a标签支付</a>
        <br><br><br>
        <a href="<?php echo site_url("wx/zhifu?out_trade_no=111&total_fee=1&body=test1&attach=test2&goods_tage=11&detail=1111");?>">测试通过请求方式支付</a>
    </body>
</html>
