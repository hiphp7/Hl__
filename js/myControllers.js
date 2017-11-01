angular.module('mycontrotrollers.controllers', ['starter.services', 'LocalStorageModule'])

.controller('mytrainCtrl',
	function ($scope, $rootScope, ENV, MsgBox, publicService, $compile, $filter, $ionicPopover, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();

	$scope.sortOrder1Name = '按预定日期排序';

	$scope.sortOrder1 = 0;

	$scope.sortOrder2 = 0;

	$scope.sortOrder3 = 0;

	// 价格格式化
	$scope.moneyFormat = function (val) {

		if (!publicService.isNull(val) && val.indexOf('.0') > 0) {

			return val.substring(0, val.indexOf('.0'));

		};

		return val;

	};

	// 日期格式化

	$scope.formatDate = function (date, formatType) {

		return $filter("date")(new Date(date), formatType);

	};

	$scope.loading = {

		"display" : "none"

	};

	$scope.footLoading = {

		"display" : "none"

	};

	$scope.isShow = function (status) {

		if (status) {
			return {
				'display' : 'block'
			};
		};

		return {
			'display' : 'none'
		};

	};
	var yonghuid = Storage.get('UserId');

	var orderType = $('.myOrder .orderType .row .column'),

	orderOptionDiv = $('.myOrder .orderOption');

	$scope.$on("$ionicView.enter", function () {
         // 刚刚进入的时候显示 Loading
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });		
		var status = 3;
		$scope.getOrderList(status);
	});
   $scope.doRefresh = function() {
		$scope.getOrderList(status);
		$scope.$broadcast('scroll.refreshComplete');
	};
	//获取订单列表


	$scope.getOrderList = function (status1) {
		$ionicLoading.show({
		    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		status = status1;

		orderType.removeClass('selected').eq(status1 - 1).addClass('selected');

		if (status == 3) {

			$('.foot').show();

		} else {

			$('.foot').hide();

		};

		$scope.orderlist = "";

		$scope.loading = {

			"display" : "none"

		};

		$scope.footLoading = {

			"display" : "none"

		};

		MsgBox.waitShow("正在加载...");

		$scope.trainorderlist = {
			yonghuid : yonghuid,
			status : status,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		$http.post(ENV.api + '/app/db/trainorder/trainorderlist', objtops($scope.trainorderlist)).success(function (data) {

			if (data != 'false') {

				$scope.orderlist = data;
				$scope.order_list = data;

			} else {
				$scope.orderlist = '';
				$scope.order_list = '';
			};

		}).finally (function () {

				$scope.loading.display = "block";

				if (status == 3) {

					$scope.footLoading.display = "block";

					$('.noMorePrompt').css('margin', '0 0 4rem');

				} else {

					$scope.footLoading.display = "none";

					$('.noMorePrompt').css('margin', '0');

				};

				$ionicLoading.hide();

			});

	};

	//获取状态颜色
	$scope.getColor = function (p) {
		if (p == "删除订单" || p == "取消订单" || p == "改签" || p == "已退票") {
			return "c_797979";
		} else if (p == "已退款" || p == "已关闭") {
			return "c_999";
		} else {
			return "c_ff6d6d";
		};
	};
	// $scope.getClass = function(p) {


	//     var arr_status = new Array(0, 3, 5, 6, 7, 4);


	//     if (arr_status.indexOf(parseInt(p)) >= 0) {


	//         return "border_t_1_de";


	//     }


	//     return "";


	// };

	//订单筛选状态列表


	$scope.filterStatusList = [{

			chk : false,

			statusName : "待付款"

		}, {

			chk : false,

			statusName : "出票中"

		}, {

			chk : false,

			statusName : "已出票"

		}, {

			chk : false,

			statusName : "退改中"

		}, {

			chk : false,

			statusName : "已退改"

		}, {

			chk : false,

			statusName : "已取消"

		}, {

			chk : false,

			statusName : "支付超时"

		}, {

			chk : false,

			statusName : "无法出票"

		}
	];

	//列表排序

	$scope.sort = {

		sortBy : "chuangjianshijian",

		sortName : "按预定时间排序",

		chk : 1

	};
	var time = $('.myOrder .foot .time');

	var orderOption = $('.myOrder .foot input[name="orderOption"]');

	$scope.sortOrder = function (type) {

		if (type == 1) {

			time.addClass('selected');

			if ($scope.sortOrder1 == 0) {

				$scope.sort.sortBy = "chuangjianshijian";

				$scope.sortOrder1Name = "按预定日期排序";

				$scope.sortOrder1 = 1;

			} else {

				$scope.sort.sortBy = "depTime";

				$scope.sortOrder1Name = "按出发时间排序";

				$scope.sortOrder1 = 0;

			};

		} else {

			if (type == 2) {

				$scope.sortOrder2 = $scope.sortOrder2 == 0 ? 1 : 0;

				orderOption.eq(1).parent().toggleClass('selected');

			} else {

				$scope.sortOrder3 = $scope.sortOrder3 == 0 ? 1 : 0;

				orderOption.eq(2).parent().toggleClass('selected');

			};

		};

		$scope.filter = {

			time : $scope.sortOrder2,

			effective : $scope.sortOrder3

		};

		$scope.orderlist = $filter("search_trainOrder")($scope.order_list, $scope.filter);

	};

	//删除订单{隐藏订单}

	$scope.deleteOrder = function (p, confirm) {

		if (confirm || confirm == null) {

			$scope.oldVal = p;

			MsgBox.Confirm($compile, $scope, "确定删除该订单?", "deleteOrder(null,false)");

			return;

		} else {

			p = $scope.oldVal;

		};

		MsgBox.waitShow("正在处理...");

		$scope.delorder = {
			id : p.id,
			status : status,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		$http.post(ENV.api + '/app/db/trainorder/deleteorder', objtops($scope.delorder)).success(function (data) {

			if (data != "fasle") {

				$scope.trainorderlist = {
					yonghuid : yonghuid,
					status : status,
					sf : sf,
					csrf_test_name : csrf_test_name
				};
				$http.post(ENV.api + '/app/db/trainorder/trainorderlist', objtops($scope.trainorderlist)).success(function (data) {

					if (data != "fasle") {
						$scope.orderlist = data;
						$scope.order_list = data;
					};

				});
			};

		}).finally (function () {

				MsgBox.waitHide();

			});

	};

	//订单明细


	$scope.orderDetail = function (p) {

		var id = p.id;
		var status = p.status;

		$state.transitionTo('trainorderinfo', {
			id : id,
			status : status
		});

	};
	$scope.refundTicket = function (p) {
		var id = p.id;
		var status = 3;

		$state.transitionTo('traintuikuan', {
			id : id,
			status : status
		});
	};
	// 支付
     $scope.onlinePay = function(p) {
                
			
			var id = p.id;

			$scope.orderdetail = {
				id: id,
				sf: sf,
				csrf_test_name: csrf_test_name
			};
			$http.post(ENV.api + '/app/db/trainorder/orderdetail', objtops($scope.orderdetail)).success(function(data) {

				if (data != 'false') {

					$scope.orderDetail = data;
				 
					Storage.set("orderDetail",$scope.orderDetail);
					
					var body = $scope.orderDetail.train_code + ' ' + $scope.orderDetail.from_station + ' 到 ' + $scope.orderDetail.arrive_station; 
					var total_fee = parseFloat($scope.orderDetail.pay_money);
					var dingdanid = $scope.orderDetail.id;
					var body = body;
					var attach = '';
					var goods_tag = '';
					var detail = '';
					var js = {
						air : 0,
						total_fee : total_fee,
						body : body,
						attach : attach,
						goods_tag : goods_tag,
						detail : detail,
						dingdanid : dingdanid
					};
					var ps = encodeURIComponent(JSON.stringify(js));
					window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_hc_zhifu.php?ps=' + ps + '&';

							} else {

								MsgBox.promptBox("加载支付页失败", 3000);

							}

						});
					};

})

.controller('mytraininfoCtrl',
	function ($scope, $rootScope, ENV, MsgBox, publicService, $filter, Storage, $ionicPopover, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();
	$scope.loading = {

		"display" : "none"

	};

	$scope.moneyFormat = function (val) {

		if (!val) {

			return;

		};

		val += '';

		if (val.lastIndexOf('.00') > 0) {

			return val.replace('.00', '');

		} else if (val.lastIndexOf('.0') > 0) {

			return val.replace('.0', '');

		} else if (val.indexOf('.') > 0 && val.charAt(val.length - 1) == 0) {

			return val.substring(0, val.length - 1);

		};

		return val;

	};

	var ride_station = false;

	$scope.loadClass = function (p, type, name) {

		if (p.name == $scope.timeList.depStation) {

			ride_station = true;

			return name == "sto_name" || name == "dep_time" ? "highlight" : "";

		} else if (p.name == $scope.timeList.arrStation) {

			ride_station = false;

			return name == "sto_name" || name == "arr_time" ? "highlight" : "";

		};

		return ride_station ? "" : "restTrainCity";

	};
	//加载订单详细


	$scope.getOrderDetail = function () {
		var id = $stateParams['id'];

		MsgBox.waitShow("正在加载...");

		$scope.orderdetail = {
			id : id,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		$http.post(ENV.api + '/app/db/trainorder/orderdetail', objtops($scope.orderdetail)).success(function (data) {

			if (data != 'false') {

				$scope.orderDetail = data;

			} else {

				MsgBox.promptBox("加载订单详细失败", 3000);

			};

		}).finally (function () {

				$scope.loading.display = "block";

				MsgBox.waitHide();

			});

	};

	//$scope.getOrderDetail();
	 $scope.$on('$ionicView.enter', function () {
            $scope.getOrderDetail();
        });

	// 列车时刻表
	$ionicModal.fromTemplateUrl('templates/trainTime.html', {
		scope : $scope,
		animation : 'slide-in-left',

	}).then(function (modal) {
		$scope.trainTime = modal;
	});

	//加载时刻表

	$scope.getTimeList = function (p) {

		if (!publicService.isNull($scope.timeList) && $scope.timeList.train_code == p.train_code) {

			$scope.trainTime.show();
			return;
		};
		$scope.station = {
			station : p.train_code,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		$http.post(ENV.api + '/app/jiekou/train/trainstatus', objtops($scope.station)).success(function (data) {

			if (data['return_code'] == '000') {

				$scope.timeList = {

					train_code : p.train_code,

					depStation : p.from_station,

					arrStation : p.arrive_station,

					time_list : data['train_stationinfo']

				};

				$scope.trainTime.show();

			} else {

				MsgBox.promptBox("加载时刻表失败!", 3000);

			};

		}).finally (function (data) {

				MsgBox.waitHide();
			});

	};
	// 退票
	$scope.refundTicket = function (p) {
		var id = p.id;
		var status = 4;

		$state.transitionTo('traintuikuan', {
			id : id,
			status : status
		});
	};

	$scope.zhedie = function () {

		var iconArrow = angular.element('.icon-arrow');
		iconArrow.toggleClass('up');
		iconArrow.parent().parent().prev().prev().slideToggle(300);
		iconArrow.parent().parent().prev().slideToggle(300);

	};
	//退票规则
	$scope.popover12 = $ionicPopover.fromTemplateUrl('templates/refundRule.html', {
			scope : $scope
		}); // .fromTemplateUrl() 方法
	$ionicPopover.fromTemplateUrl('templates/refundRule.html', {
		scope : $scope
	}).then(function (popover) {
		$scope.popover12 = popover;
	});

	$scope.tuipiaoguize = function ($event) {
		$scope.popover12.show($event);
	};
	//销毁事件回调处理：清理popover对象
	$scope.$on("$destroy", function () {
		$scope.popover12.remove();
	});
	// 隐藏事件回调处理
	$scope.$on("popover12.hidden", function () {
		// Execute action
	});
	//删除事件回调处理
	$scope.$on("popover12.removed", function () {
		// Execute action
	});

	//退票规则
	$scope.popover17 = $ionicPopover.fromTemplateUrl('templates/orderMoneyDetail.html', {
			scope : $scope
		}); // .fromTemplateUrl() 方法
	$ionicPopover.fromTemplateUrl('templates/orderMoneyDetail.html', {
		scope : $scope
	}).then(function (popover) {
		$scope.popover17 = popover;
	});

	$scope.moneyDetail = function ($event) {
		$scope.popover17.show($event);
	};
	//销毁事件回调处理：清理popover对象
	$scope.$on("$destroy", function () {
		$scope.popover17.remove();
	});
	// 隐藏事件回调处理
	$scope.$on("popover17.hidden", function () {
		// Execute action
	});
	//删除事件回调处理
	$scope.$on("popover17.removed", function () {
		// Execute action
	});
	//保单
	$scope.popoverbaodan = $ionicPopover.fromTemplateUrl('templates/baodan.html', {
			scope : $scope
		}); // .fromTemplateUrl() 方法
	$ionicPopover.fromTemplateUrl('templates/baodan.html', {
		scope : $scope
	}).then(function (popover) {
		$scope.popoverbaodan = popover;
	});

	$scope.baodan = function ($event) {
		$scope.popoverbaodan.show($event);
	};
	//销毁事件回调处理：清理popover对象
	$scope.$on("$destroy", function () {
		$scope.popoverbaodan.remove();
	});
	// 隐藏事件回调处理
	$scope.$on("popoverbaodan.hidden", function () {
		// Execute action
	});
	//删除事件回调处理
	$scope.$on("popoverbaodan.removed", function () {
		// Execute action
	});
})

.controller('traintuikuanCtrl',
	function ($scope, $rootScope, ENV, MsgBox, publicService, $filter, Storage, $ionicPopover, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();
	var id = $stateParams['id'];
	var status = $stateParams['status'];

	$scope.loading = {

		"display" : "none"

	};

	$scope.display = {

		btnPost : true

	};

	//加载订单详细

	$scope.getOrderDetail = function () {

		MsgBox.waitShow("正在加载...");

		$scope.orderdetail = {
			id : id,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		$http.post(ENV.api + '/app/db/trainorder/orderdetail', objtops($scope.orderdetail)).success(function (data) {

			if (data != "false") {

				$scope.orderDetail = data;
				$scope.orderDetail.passenslist = data.passenslist;

			} else {

				MsgBox.promptBox("加载订单详细失败", 3000);

			}

		}).finally (function () {

				MsgBox.waitHide();

				$scope.loading.display = "block";

			});

	};
	 $scope.$on('$ionicView.enter', function () {
            $scope.getOrderDetail();
        });

	$scope.refundInfo = {

		order_id : 0,

		merchant_order_id : 0,

		RawNote : "",

		adultlist : "",

		childlist : ""

	};

	$scope.$watch('refundInfo.RawNote', function (newVal, oldVal) {

		if (newVal.length > 100) {

			$scope.refundInfo.RawNote = newVal.substring(0, 100);

		};

	});

	//提交退票请求

	$scope.refundRequest = function () {

		var k = true;
		//去程
		var userContactall = $scope.orderDetail.passenslist; // 所有乘客		
		var userContact = [];
		angular.forEach(userContactall, function(item) {
					if (item.ticketStatusName == "出票完成") {
						userContact.push(item);
					};


		});

		var adult = $filter("contacts_filter")(userContact, false, {

				"key" : "ticket_type",

				"value" : '0'

			});

		var child = $filter("contacts_filter")(userContact, false, {

				"key" : "ticket_type",

				"value" : '1'

			});

		if (adult.length <= 0 && child.length > 0) {

			MsgBox.promptBox("根据规定，儿童不能单独乘车，需有成人同行。");
			k = false;
			return false;

		};

		$scope.refundInfo.adultlist = $filter("contacts_filter")(userContact, true, {

				"key" : "ticket_type",

				"value" : '0'

			});

		$scope.refundInfo.childlist = $filter("contacts_filter")(userContact, true, {

				"key" : "ticket_type",

				"value" : '1'

			});

		var refundCount = ($scope.refundInfo.adultlist.length + $scope.refundInfo.childlist.length);

		if (refundCount == 0) {

			MsgBox.promptBox("请选择需要退票的乘客");

			k = false;
			return false;

		}

		//判断退票备注长度


		////如果退票人数等于总人数，则refund_type=all

		if (userContactall.length == refundCount) {

		    $scope.refundInfo.refund_type = "all";

		} else {
			$scope.refundInfo.refund_type = "part";
		};

		$scope.refundInfo.order_id = $scope.orderDetail.order_id;
		$scope.refundInfo.merchant_order_id = $scope.orderDetail.merchant_order_id;
		$scope.refundInfo.id = $scope.orderDetail.id;
		$scope.refundInfo.shanghuhao = $scope.orderDetail.shanghuhao;

		$scope.display.btnPost = false;

		var tuipiao = JSON.stringify($scope.refundInfo);

		MsgBox.waitShow("处理中，请稍等...");

		$scope.ordertuipiao = {
			tuipiao : tuipiao,
			sf : sf,
			csrf_test_name : csrf_test_name
		};
		if (k != false) {
			$http.post(ENV.api + '/app/db/trainorder/ordertuipiao', objtops($scope.ordertuipiao)).success(function (data) {

				if (data == 'true') {

					MsgBox.promptBox("您的退票申请已经提交审核，客服会在24小时内与您联系。请保持您的手机畅通！", 3000);

					if (status == 4) {
						var id = $scope.orderDetail.id;
						$state.transitionTo('trainorderinfo', {
							id : id,
							status : status
						});

					} else {

						$state.transitionTo('tab.trainorderlist');
					};

				} else {
					MsgBox.promptBox("您的退票申请提交失败，请您联系客服！", 3000);

					$scope.display.btnPost = true;
				};
			}).error(function () {

				MsgBox.promptBox("您的退票申请提交失败，请您联系客服！", 3000);

				$scope.display.btnPost = true;

			}).finally (function () {

					MsgBox.waitHide();

				});
		};
	};

})
