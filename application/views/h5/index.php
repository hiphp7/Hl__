<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxc27ddb489017a49a", "LmhfwRFsjur3ClPy4MYYRD4xpQi0Ejz6Oif1M3zwSakTsOItv6ujPkfNwBcvAQFp");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>比比旅游</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic.min.css"); ?>' rel="stylesheet"/>
        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/ionic.bundle.min.js"); ?>'></script>

        <script src='<?php echo base_url("lib/ionic/js/angular-local-storage.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-resource.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-sanitize.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-animate.min.js"); ?>'></script>
        <script src='<?php echo base_url("js/app.js"); ?>'></script>
        <script src='<?php echo base_url("js/config.js"); ?>'></script>
        <script src='<?php echo base_url("js/controllers.js"); ?>'></script>
        <script src='<?php echo base_url("js/services.js"); ?>'></script>
        <script src='<?php echo base_url("js/directive.js"); ?>'></script>
        <script src='<?php echo base_url("js/publicJS.js"); ?>'></script>
        <script src='<?php echo base_url("js/effectCommon.js"); ?>'></script>
        <script src='<?php echo base_url("js/publicFunction.js"); ?>'></script>
        <script src='<?php echo base_url("js/trainControllers.js"); ?>'></script>
        <script src='<?php echo base_url("js/myControllers.js"); ?>'></script>

        <link href='<?php echo base_url("css/common.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/index.css"); ?>' rel="stylesheet"/>
        <!--
        <link href='<?php echo base_url("css/normalize3.0.2.min.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/mobiscroll.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/mobiscroll_date.css"); ?>' rel="stylesheet"/>
        -->
        <link type="text/css" href='<?php echo base_url("css/publicCss1.css"); ?>' rel="stylesheet" />

        <link type="text/css" href='<?php echo base_url("css/trainList.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("css/trainOrder.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("css/myOrder.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("css/orderDetail.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("css/layout.css"); ?>' rel="stylesheet"/>

        <!--我的-->
        <link type="text/css" href='<?php echo base_url("resources/user/css/user.css"); ?>' rel="stylesheet"/>
        <link type="text/css" href='<?php echo base_url("resources/user/css/register.css"); ?>' rel="stylesheet"/>
        <!--常用信息-->
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/iscroll.js"); ?>'></script>
        <script type="text/javascript" src='<?php echo base_url("resources/user/js/date.js"); ?>'></script>
        
        <!--酒店----------------------->
        <script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=iT46LDMO8w4i3k6blFarL7Me9RC2yQ1r&v=1.0"></script>  
        <script src="http://res.wx.qq.com/open/js/jweixin-1.1.0.js"></script>

        <script src='<?php echo base_url("jiudian_js/controllers.js"); ?>'></script>
        <script src='<?php echo base_url("jiudian_js/jiudianJs.js"); ?>'></script>

        <link href='<?php echo base_url("jiudian_css/style.css"); ?>' rel="stylesheet">
        <link href='<?php echo base_url("jiudian_css/icomoon.css"); ?>' rel="stylesheet">
        
        <style type="text/css">
            .alpha_sidebar{
                position: absolute;
                top:50px;
                right:  10px;
                z-index: 100000;
            }
            .alpha_sidebar li{
                color: #49afcd;
                margin-bottom: 2px;
                cursor: pointer;
            }
            .alpha_list{
                padding-right: 22px;
            }
        </style>
        <script type="text/javascript">
            
            //酒店入住离店日期选择 [begin]
            function selectDate(ruzhu, lidian)
            {
                this.ruzhu = ruzhu;
                this.lidian = lidian;
            }
            // 实例化对象
            var myDate = new selectDate("", "");
            //用于判断，是选择入住，还是离店
            var jiudian_dateType = "入住";
            //酒店入住离店日期选择 [end]
            
            //酒店列表数据
            function hotelList_node(cityCode,ruzhuDate,searchBox,starSelect,priceSelect,jiudianxiangqings,districts)
            {
                this.cityCode = cityCode;
                this.ruzhuDate = ruzhuDate;
                this.searchBox = searchBox;
                this.starSelect = starSelect;
                this.priceSelect = priceSelect;
                this.jiudianxiangqings = jiudianxiangqings;
                this.districts = districts;
            }
            
            //酒店详情数据
            function hotelDetail_node(hotelId,rooms,images)
            {
                this.hotelId = hotelId;
                this.rooms = rooms;
                this.images = images;
            }
        
            function is_empty (mixed_var) {  
                var key; 
                if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || typeof(mixed_var) === 'undefined') {  
                    return true;  
                }
   
                if (typeof mixed_var == 'object') {  
                    for (key in mixed_var) {  
                        return false;  
                    }  
                    return true;  
                }  
   
                return false;  
            }
        
            /**
               联系人 js model 类
               对应于数据库中的 yonghu 表中的一列。
               自营的情况是，当用户登录的时候，添加一个序列化的 liaxiren js 对象到 Storage 里面去
               三方的情况是，当用户添加联系人的时候，首先添加到 yonghu 表中，
               在添加一个序列化序列化的 liaxiren js 对象到 Storage 里面去
            */
            function mliaxiren(id, zhanghu, mima, xingming, shoujihaoma) {          
         this.id = is_empty(id) == false ? id: "";
                 this.zhanghu = is_empty(zhanghu) == false ? zhanghu: "";
                 this.mima = is_empty(mima) == false ? mima: "";
                 this.xingming = is_empty(xingming) == false ? xingming: "";
                 this.shoujihaoma = is_empty(shoujihaoma) == false ? shoujihaoma: "";
            }

            var index_time = 60;
            var myshowtime;
            function showTime() {
                if (index_time != 0) {

                    $('#fsdxyzm').val(index_time + '秒后重发').attr('disabled', 'disabled').attr('style', 'background: rgb(178, 178, 178) none repeat scroll 0% 0%; color: rgb(255, 255, 255);');
                    index_time--;

                    myshowtime = setTimeout("showTime()", 1000);
                }
                else {
                    //clearTimeout('showTime()');
                    clearTimeout(myshowtime);
                }
            }
            
            function getCsrf() {
                var name = 'csrf_cookie_name';
                var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
                if (arr != null)
                    return unescape(arr[2]);
                return null;
            }

            function objtops(obj)
            {
                var p = [];
                for (var key in obj) {
                    p.push(key + '=' + encodeURIComponent(obj[key]));
                }
                return p.join('&');
            }
            function users()
            {
                //用户名
                this.yonghuming = "";
                //用户名称
                this.name = "";
                //手机号码
                this.shoujihaoma = "";
                //邮箱
                this.youxiang = "";
                //身份证号码
                this.IDcard = "";
                //好友
                this.friend = null;
                //虚拟币
                this.bi = 0;
                //地址
                this.address = "";             
            }
            //选择入住人
           function Person(name,chk){
                this.name = name;
                this.chk = chk;     
            }     
       
            
        </script>
    </head>
    <body ng-app="starter">
          <ion-nav-view animation="slide-left-right-ios7"></ion-nav-view>
    </body>
<script type="text/javascript">
   /* if (document.body.clientWidth < 540) {
        (document.getElementsByTagName('html'))[0].style.fontSize = (document.body.clientWidth / 16) + 'px';
    }
    ;
    */
    var time = <?php echo $time; ?>;
    // 三方 id
    var sf = '<?php echo $sf; ?>';

    var ps = '<?php echo $ps; ?>';
    var userid = '<?php echo $userid; ?>';

    if(userid == ''){
        if(window.JSON.parse(window.localStorage.getItem('UserId')) != null){
            //window.localStorage.setItem('UserId', window.JSON.stringify(userid));
        } else {
            //window.localStorage.setItem('UserId', window.JSON.stringify(userid));
        }
    } else {
        window.localStorage.setItem('UserId', window.JSON.stringify(userid));
    }
    

</script>
<script type="text/javascript">
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
	*/
   
   var position_name = "";
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: '<?php echo $signPackage["timestamp"];?>',
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'getLocation',
     
    ]
  });
  wx.ready(function () {
    wx.getLocation({
    success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        $.ajax({    
          url: 'http://api.map.baidu.com/geocoder/v2/?ak=btsVVWf0TM1zUBEbzFz6QqWF&callback=renderReverse&location=' + latitude + ',' + longitude + '&output=json&pois=1',  
          type: "get",  
          dataType: "jsonp",  
          jsonp: "callback", 
          success: function (data) {
                position_name = (data.result.formatted_address);
                //alert(position_name);
                //localStorage.setItem("position_name", name); 
                    
                if (typeof callback == "function") {  
                    callback(data);  
                }  
  
            }  
        });     
    },
    cancel: function (res) {
        alert('用户拒绝授权获取地理位置');
    }
});
  });
  wx.error(function(res){
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    alert('验证失败');
});

 


</script>
</html>
