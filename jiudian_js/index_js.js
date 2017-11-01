/**
 * Created by Zheng on 2016/12/9.
 */
angular.module('ionicApp', ['ionic'])

$(function(){

  //设置div高度
  var leftHeight = $("#left").height();
  $("#login_gift").height(leftHeight+13);
  //设置4个border线的位置
  var x =  $("#login_gift").width();
  var y =  $("#login_gift").height();
  var login_img_height = $("#login_img").height();
  //计算立即登录图片的高度的一半
  var r = login_img_height/2;

  var top_line = x/2;
  var bottom_line = x/2;
  var left_line = y/2;
  var right_line = y/2;

  $("#top_border").css("margin-top",10);
  $("#bottom_border").css("margin-top",y-45);
  $("#left_border").css({"margin-top":y/2,"margin-left":25});
  $("#right_border").css({"margin-top":y/2,"margin-left":x-25-100});
  //立即登录按钮的位置
  $("#login_img").css("margin-top",y/2-r);


//动态高度
  var screenHeight = $(window).height();
  var topH = $("#top").height();
  var height = screenHeight-topH;
  $("#list").height(height);



//这是设置 圆形突出tab的位置
  var screenHeight = $(window).height();
  var screenWidth  = $(window).width();
  var imgH = $("#img").height();  //70
  var imgW = $("#img").width();
  var heig = screenHeight-imgH;
  var wid = (screenWidth/2)-(imgW/2);

  $("#img").css("margin-top",heig);
  $("#img").css("margin-left",wid);
  //电话图标margin-left
  $("#top_phone").css("margin-left",screenWidth-30-30-30);

//旅行优势、各国签证...div高度
  var imgHeight = $("#img_1").height();
  $("#col_1").css("height",imgHeight);
  $("#col_2").css("height",imgHeight);
  $("#col_3").css("height",imgHeight);
  $("#col_4").css("height",imgHeight);
  $("#col_5").css("height",imgHeight);
  $("#col_6").css("height",imgHeight);






})
