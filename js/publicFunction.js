// JavaScript Document
var publicFunction = {
    //返回隐藏
    returnbut: function (a, b, c) {
        $("." + a).removeClass("onbut").addClass("upbut");
        $("." + c).removeClass("onbut").addClass("upbut");
        setTimeout(function () {
            $("." + a).hide().removeClass("upbut");
            $("." + c).removeClass("upbut");
        }, 500);
        $("." + b).show();
        $('body,html').scrollTop(0);
    },

    returnbutaa: function (a) {
        $("." + a).siblings().removeClass("onbut").addClass("upbut").find(".header").removeClass("onbut").addClass("upbut");


        setTimeout(function () {
            $("." + a).siblings().hide().removeClass("upbut").find(".header").removeClass("upbut");

        }, 500);
        $("." + a).show();
        $('body,html').scrollTop(0);
    },

    //动画-右边进入显示
    rightAnimation: function (a, b) {
        $("." + a).addClass(b).show().siblings().not(".dofingBox").hide();
        setTimeout(function () {
            $("." + a).removeClass(b);
        }, 500);
        $('body,html').scrollTop(0);
    },

    //选中隐藏
    clickhidefi: function (a, b, c, d) {
        $(document).on("click", "." + a, function () {
            publicFunction.returnbut(b, c, d);
            $('body,html').scrollTop(0);
        });

    },

    //提示框信息
    promptBox: function (txt) {
        $('body').append('<span class="promptBox">' + txt + '</span>');
        setTimeout(function () {
            $(".promptBox").remove();
        }, 1500);
    },
    //提示框信息
    promptimeBox: function (txt, time) {
        $('body').append('<span class="promptBox">' + txt + '</span>');
        setTimeout(function () {
            $(".promptBox").remove();
        }, time);
    },

    //倒计时提示
    prompCountdown: function (txt, natxt, time) {
        $('body').append('<span class="promptBox">' + txt + time + natxt + '</span>');
        function jump(count) {
            window.setTimeout(function () {
                count--;
                if (count > 0) {
                    $(".promptBox").html(txt + count + natxt);
                    jump(count);
                } else {
                    $(".promptBox").remove();
                }
            }, 1000);
        }
        jump(time);

    },
    //手动关闭的提示框
    manualTips: function (txt, butTxt) {
        var html = "";
        html += '<section class="tisomeBox" >';
        html += '<div class="tismbox bg_fff pa_100 text_a_c">';
        html += '<p class="f_s16 c_181818 border_b_1_e9 pa_100">' + txt + '</p>';
        html += '<a class="c_289deb dp_b pa_100 f_s16 tisoBut">' + butTxt + '</a>';
        html += '</div>';
        html += '</section>';
        $('body').append(html);
        $(document).on("click", ".tisoBut", function () {
            $(this).parent().parent().remove();
        });
    },
    //手动关闭的提示框{带方法}
    dialogBox: function (txt, butTxt, methodName) {
        var html = "";
        html += '<section class="tisomeBox" >';
        html += '<div class="tismbox bg_fff pa_100 text_a_c">';
        html += '<p class="f_s16 c_181818 border_b_1_e9 pa_100">' + txt + '</p>';
        html += '<a class="c_289deb dp_b pa_100 f_s16 tisoBut" ng-click="' + methodName + '">' + butTxt + '</a>';
        html += '</div>';
        html += '</section>';
        $(document).on("click", ".tisoBut", function () {
            $(this).parent().parent().remove();
        });
        return html;
    },

    //取消/确定提示框
    BalloonBC: function (txt) {
        var html = "";
        html += '<section class="tisomeBox" >';
        html += '<div class="tismbox bg_fff pa_100 text_a_c">';
        html += '<p class="f_s16 c_181818 border_b_1_e9 pa_100">' + txt + '</p>';
        html += '<p class="wrapfix"><a class="c_289deb fl pa_100 f_s16 cancelBut">取消</a><a  class="c_289deb fr pa_100 f_s16 determineBut">确定</a></p>';
        html += '</div>';
        html += '</section>';
        $('body').append(html);
        $(document).on("click", ".cancelBut, .determineBut", function () {
            $(this).parent().parent().parent().remove();

        });

    },
    //传值确认框
    ConfirmBox: function (txt, methodName) {
        var html = "";
        html += '<section class="tisomeBox" >';
        html += '<div class="tismbox bg_fff pa_100 text_a_c">';
        html += '<p class="f_s16 c_181818 border_b_1_e9 pa_100">' + txt + '</p>';
        html += '<p class="wrapfix"><a class="c_289deb fl pa_100 f_s16 cancelBut">取消</a><a  class="c_289deb fr pa_100 f_s16 determineBut"  ng-click="' + methodName + '">确定</a></p>';
        html += '</div>';
        html += '</section>';
        $(document).on("click", ".cancelBut, .determineBut", function () {
            $(this).parent().parent().parent().remove();
        });
        return html;
    },

    //提示等待
    tipWait: function (txt) {
        $(".dofingBox").remove();
        var html = "";
        html += '<div class="dofingBox">';
        html += '<span class="sidBox f_s14 c_fff text_a_c">' + txt + '</span>';
        html += '</div>';
        $('body').append(html);
    },
    removetipWait: function () {
        $(".dofingBox").remove();
    },

    //点击隐藏
    clickHide: function (a, b) {
        $(document).on("click", "." + a, function () {
            $("." + b).hide();
        });
    },

    //点击显示		
    clickShow: function (a, b) {
        $(document).on("click", "." + a, function () {
            $("." + b).show();
        });
    },
    //获取验证码
    obtnewi: {
        t: "",
        obtCodes: function (a, b) {
            var btn = $("." + a);
            var count = b;
            function time() {
                if (count != 0) {
                    btn.attr("disabled", true);
                    btn.val(count + "秒后重发").css({ background: "#b2b2b2", color: "#fff" });
                    count--;
                    t = setTimeout(function () { time() }, 1000);
                } else {
                    btn.removeAttr("disabled");
                    btn.val("获取验证码").css({ background: "#289deb", color: "#fff" });

                    count = b;
                };
            };

            time();

        },

        obtclear: function () {
            clearTimeout(t);
            $(".snsit_but").removeAttr("disabled").val("获取验证码").css({ background: "#289deb", color: "#fff" });
            return;
        }


    },
    //显示密码	
    passworShow: function (a, b) {
        $(document).on("change", "." + a, function () {
            if ($(this).prop("checked") == true) {
                $("." + b).attr("type", "text");
            } else {
                $("." + b).attr("type", "password");
            }

        })

    },
    winheight: function () {
        $(window).resize(function () {
            var bsut = $(window).height();
            $(".wrap_Box").css({ "min-height": bsut });
        }).resize();
    },
    //多选选中或取消
    chechkdlist: function (a) {
        $(document).on("click", "." + a, function () {
            var chie = $(this).find('input[type="checkbox"]').prop("checked");
            if (chie) {
                $(this).find('input[type="checkbox"]').removeAttr("checked");
            } else {
                $(this).find('input[type="checkbox"]').prop("checked", true);
            }

        });
    },
    //单选选中或取消
    radiolist: function (a) {
        $(document).on("click", "." + a, function () {
            var chie = $(this).find('input[type="radio"]').prop("checked");
            if (chie) {
                $(this).find('input[type="radio"]').removeAttr("checked");
            } else {
                $(this).find('input[type="radio"]').prop("checked", true);
            }

        });

    },
    //收缩或展开
    silderFn: function (a, b) {
        $(document).on("click", "." + a, function () {
            var nsdisplay = $("." + b).css("display");
            if (nsdisplay == "none") {
                $(this).parent().find(".bsiu_but").addClass("salse180").removeClass("salse000");
                //$(this).find("img").addClass("salse180").removeClass("salse000");
                $("." + b).stop().slideDown();
            } else {
                $(this).parent().find(".bsiu_but").addClass("salse000").removeClass("salse180");
                //$(this).find("img").addClass("salse000").removeClass("salse180");
                $("." + b).stop().slideUp();

            }
        });


    },
    //全选或取消全选
    checkdFn: function (a, b) {
        $(document).on("change", "." + a, function () {
            if ($(this).prop("checked")) {
                $("." + b).prop("checked", true);
            } else {
                $("." + b).removeAttr("checked");
            };

        });
        $(document).on("change", "." + b, function () {
            var xhut = $(this).parent().parent().parent().find('input[type="checkbox"]').length;
            var chsir = $(this).parent().parent().parent().find('input[type="checkbox"]:checked').length;
            if (chsir == 0) {
                $("." + a).removeAttr("checked");
            } else {
                $("." + a).prop("checked", true);
            };
        });

    },

    selseamrFn: function () {
        var speed = 10;
        var demo = $("#demo");
        var demo1 = $("#demo1");
        var demo2 = $("#demo2");
        demo2.html(demo1.html());
        function Marquee() {
            if (demo.scrollTop() >= demo1.height())
                demo.scrollTop(0);
            else {
                demo.scrollTop(demo.scrollTop() + 3);
            }
        }
        var MyMar = setInterval(Marquee, speed)

    },
    // 增加class名动画
    classAnmte: function (name, naClass) {
        $("." + name).addClass(naClass);
        setTimeout(function () {
            $("." + name).removeClass(naClass);
        }, 500);
    },
    addressBar: {
        lautbs: function () {
            var hash = location.hash;
            hash = hash.replace('#', '');
            return hash

        },

        chkHash: function () {
            //console.log(publicFunction.addressBar.lautbs());
            if (publicFunction.addressBar.lautbs() == "" || publicFunction.addressBar.lautbs() == "mainsecit") {
                publicFunction.returnbutaa("mainsecit");

            } else {
                publicFunction.rightAnimation(publicFunction.addressBar.lautbs(), "onbut");
            }

        },
        srufir: function (a) {
            //publicFunction.addressBar.lautbs();
            if (publicFunction.addressBar.lautbs() == "") {
                window.history.pushState(null, null, a)
                //window.location.hash=a
            } else {
                window.history.replaceState(null, null, a)
                //window.location.hash=a
            }
        }



    },
    remvoeFn: function (a) {
        $(".a" + a).remove();
    }

}