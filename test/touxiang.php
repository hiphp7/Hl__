<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <title>头像</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='http://new.ectop.cn/hl/lib/ionic/css/ionic.min.css' rel="stylesheet"/>
        <script src='http://new.ectop.cn/hl/lib/jquery/jquery.min.js'></script>
        <script src='http://new.ectop.cn/hl/lib/ionic/js/ionic.bundle.min.js'></script>
        <link href='http://new.ectop.cn/hl/css/common.css' rel="stylesheet"/>
        <link href='http://new.ectop.cn/hl/css/index.css' rel="stylesheet"/>
        <link type="text/css" href='http://new.ectop.cn/hl/css/publicCss1.css' rel="stylesheet" />
        <link type="text/css" href='http://new.ectop.cn/hl/css/trainList.css' rel="stylesheet"/>
        <link type="text/css" href='http://new.ectop.cn/hl/css/trainOrder.css' rel="stylesheet"/>
        <link href='http://new.ectop.cn/hl/css/layout.css' rel="stylesheet"/>
        <script type="text/javascript" src='http://new.ectop.cn/hl/resources/user/js/iscroll-zoom.js'></script>
        <script type="text/javascript" src='http://new.ectop.cn/hl/resources/user/js/hammer.js'></script>
        <script type="text/javascript" src='http://new.ectop.cn/hl/resources/user/js/lrz.all.bundle.js'></script>
        <script type="text/javascript" src='http://new.ectop.cn/hl/resources/user/js/jquery.photoClip.js'></script>
    </head>
    <body ng-controller="TouXiangCtrl">
    <ion-content>
        <!----头像------->
        <section class="wrap_Box  bg_f6f6f6 pttop50 headPortrait">
            <!--------头部header---------->
            <div class="header f_s18 text_a_c border_b_1_d bg_fff pftop">
                <span class="heaTxx">上传头像</span>
                <a class="returnbut c_fff f_s18 returnjs"><span></span>返回</a>
                <a class="but_nsit f_s16 upload" ng-click="upload()">上传</a>
                <input type="hidden" id="hideinput" ng-model="imgurl"/>
            </div>
            <!--------头部header   [end]---------->
            <section class="pt_100">
                <div id="clipArea"></div>
                <div id="view" style="display:none;"></div>
                <div class="pa_100 wrapfix">
                    <span class="shuwikks fl">选择图片<input type="file" id="file" /></span>
                    <input type="button" id="clipBtn" value="截取" class="shuwikks fr" />
                </div>
            </section>
        </section>
        <!----头像  [end]------->
    </ion-content>
</body>
<script type="text/javascript">

    function objtops(obj)
    {
        var p = [];
        for (var key in obj) {
            p.push(key + '=' + encodeURIComponent(obj[key]));
        }
        return p.join('&');
    }

    function getCsrf() {
        var name = 'csrf_cookie_name';
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null)
            return unescape(arr[2]);
        return null;
    }

    $(function() {
        var uploadSrc;
        ////上传头像
        //function getuploadSrc(a){
        //    return a;
        //};
        $("#clipArea").photoClip({
            size: [260, 260],
            outputSize: [320, 320],
            file: "#file",
            view: "#view",
            ok: "#clipBtn",
            loadStart: function() {
                //     console.log("照片读取中");
                $("#view").hide();
                $("#clipArea").show();
            },
            loadComplete: function() {
                //     console.log("照片读取完成");
            },
            clipFinish: function(dataURL) {
                $("#view").show();
                $("#clipArea").hide();
                uploadSrc = dataURL;
                $("#hideinput").val(uploadSrc);
                //     console.log(dataURL);
            }
        });

        //上传头像
        $(document).on("click", ".headPortrait .upload", function() {
            if (uploadSrc == "") {
                alert("请选择并截取图片");
            } else {
                $("#view").hide();
                $("#clipArea").show();
                //   console.log(uploadSrc);//要上传图片的路径
                $(".photo-clip-moveLayer").remove();
                // publicFunction.returnbut("headPortrait", "mainbox", "headPortrait .header");
                uploadSrc = "";
                $("#hideinput").val(uploadSrc);
            }
        });
    });
    angular.module("myApp", ["ionic"]).controller("TouXiangCtrl", function($scope, $http, $ionicLoading) {
        $scope.openmode = 'web';
        //上传图片
        $scope.imgurl = "";
        $scope.upload = function() {
            if ($scope.openmode == 'web') {
                $scope.imgurl = $("#hideinput").val();
            }
            if ($scope.imgurl == "") {
                alert("请选择图片");
                return;
            }
//            publicFunction.returnbut("headPortrait", "mainbox", "headPortrait .header");

            // 传图片参数到后台处理
            $ionicLoading.show({
                template: '正在上传...'
            });
            var type = '';
            var touxiang = '';
            var SF = '';
            if (typeof($scope.imgurl) != "undefined" && $scope.imgurl != null) {
                //获取图片类型
                type = ($scope.imgurl.split('/', 2)[1]).split(';', 2)[0];
                //获取图片base64编码字符串
                touxiang = $scope.imgurl.split(',')[1];
            }
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: 122,
                touxiang: touxiang,
                type: type,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            //http://new.ectop.cn/hl/
            $http.post('http://new.ectop.cn/hl/index.php/test/touxiang_test/upload', objtops(myobject)).success(function(data) {
                if (data) {
                    $ionicLoading.hide();
                    alert("上传图片成功！");
                    var d = new Date();
                    $scope.touxiang = 'http://new.ectop.cn/hl/resources/user/userImages/' + data + '?mg=' + d.getMilliseconds();
                } else {
                    $ionicLoading.hide();
                    alert("上传图片失败1！");
                }
            }).error(function(error) {
                $ionicLoading.hide();
                alert("上传图片失败2！");
            });
        };

    });

</script>
</html>
