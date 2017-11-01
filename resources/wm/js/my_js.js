/**
 * Created by Zheng on 2017/3/9.
 */
$(function(){
    //获取当前日期
    var now= new Date();
    var year=now.getFullYear();
    var month=now.getMonth();
    var date=now.getDate();
    $('.riqi').html(year+"年"+(month+1)+"月"+date+"日");

    //设置最小高度
    $('.nav_left').css('min-height', $(window).height() - $('#header').height());
    $(window).resize(function(){
        $('.nav_left').css('min-height', $(window).height() - $('#header').height());
    });

});
function changjianwenti(cla1,cla2) {
    $('.cjwt').css('color','black ');
    $('.all').css('display','none');

    $(cla2).css('color','#0DC4D1');
    $(cla1).css('display','block');
}
function startProgerss(){
    var trytmp=0;
    var wait=false;
    run();
    function run(){
        if(!wait){
            vue.length+=(Math.random()*10).ceil();
        }
        if(vue.length<=98){
            if(vue.length>80 && textupover && imgupover){
                vue.length=100;
                $("div[role='progressbar']").css("width","100%");
                //短暂延迟后刷新页面,貌似""作用是刷新本页面
                refreshtohome(1000, "");
            }else{
                $("div[role='progressbar']").css("width",vue.length+"%");
                var timer=setTimeout(run,100);
            }
        }else{//等待时间过长，可能出现了其他错误
            wait=true;//进入等待状态
            vue.length=99;
            $("div[role='progressbar']").css("width","99%");
            //查看服务器的响应
            if(textupover && imgupover){
                vue.length=100;
                $("div[role='progressbar']").css("width","100%");
                //短暂延迟后刷新页面,貌似""作用是刷新本页面
                refreshtohome(1000, "");
            }
            if(++trytmp<10){//超时等待(大约10s)
                var timer=setTimeout(run,1000);
            }else{
                alert("服务器响应失败！");
                //隐藏进度条提示框
                $('#progressbar').modal('hide');
                //重置进度条的长度
                vue.length=10;
            }
        }
    }
}