$(function() {
    
    //酒店查询页
    
    //国内酒店/国外酒店选中样式
    $(document).on("click", ".guoneiwai", function() {
        $(this).find("button").css("border-bottom", "2px solid #17CECC");
        $(this).siblings().find("button").css("border-bottom", "0px");
        if ($(this).find("button.haiwaihotel").length > 0) {
            $('#renshu').show();
        } else {
            $('#renshu').hide();
        }
    });
    //酒店查询页、酒店列表页 - 选中不限时其它取消选中
    $(document).on("change", ".starBox .noLimit input[type='checkbox']", function() {
        if ($(this).prop("checked") == true) {
            $(this).parent().addClass("on");
            $(this).attr("disabled", "disabled");
            $('.starBox .starChild').find("input[type='checkbox']").prop("checked", false);
            $('.starBox .starChild').find('label').removeClass("on");
        }

    });
    //酒店查询页、酒店列表页 - 选中其他（多选），不限取消选择
    $(document).on("change", ".starBox .starChild input[type='checkbox']", function() {
        if ($(this).prop("checked") == true) {
            $(this).parent().addClass("on");
            $('.starBox .noLimit').find("input[type='checkbox']").prop("checked", false).removeAttr("disabled").parent().removeClass("on");
        } else {
            $(this).parent().removeClass("on");
        }
        var nsijr = $('.starBox .starChild').find("input[type='checkbox']:checked").length;
        if (nsijr == 0) {
            $('.starBox .noLimit').find("input[type='checkbox']").prop("checked", true).attr("disabled", "disabled").parent().addClass("on");
        }
    });
    
    //酒店列表 - 点击筛选类型显示/隐藏对应的筛选条件
    $(document).on("click", ".top_select .select", function() {
        var index = $(this).index();
        $(this).find("button").addClass("c_42d6d4");
        $(this).siblings().find("button").removeClass("c_42d6d4");
        if ($(".hotelFloat").eq(index).is(":hidden")) {
            $(".hotelFloat").eq(index).show().siblings().hide();
            $("#hotel_bg").show();
        } else {
            $(".hotelFloat").eq(index).hide();
            $("#hotel_bg").hide();
        }
    });
    //酒店列表 - 选项选中隐藏弹出框
    $(document).on("change", ".hotelFloat .select_child input[type='radio']", function() {
        $(this).parents('.hotelFloat').hide();
        $("#hotel_bg").hide();
    });
    //酒店列表 - 点击星级筛选确定/取消隐藏弹出框
    $(document).on("click", ".starConfirm .cancel,.starConfirm .confirm", function() {
        $(this).parents('.hotelFloat').hide();
        $("#hotel_bg").hide();
    });
    //酒店列表 - 点击黑色背景
    $(document).on("click", "#hotel_bg", function() {
        $(".hotelFloat").hide();
        $("#hotel_bg").hide();
    });
    //酒店详情 - 点击隐藏/显示酒店产品
    $(document).on("click", ".hotelDetail_list .room", function() {
        $(this).next().stop(true).slideToggle(300);
    });

});