angular.module('train.controllers', ['starter.services', 'LocalStorageModule'])
.controller('trainCtrl',
	function ($scope, $rootScope, $ionicPlatform, ENV, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout, $compile) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	$scope.backHome = function () {
				$state.transitionTo('bibi');
			};
	        $scope.$on("$ionicView.beforeEnter", function (event, data) {
				$ionicLoading.hide();
			});

	//加载图片信息
	$http.get(ENV.imgUrl + "data/main_banner.json")
	.success(function (data) {
		$scope.bannerData = data.data;
	})
	.error(function (error) {
		failCallback(error);
	});

	//出发日期，返回日期
	$scope.date = publicService.dayadd(new Date(), 1);

	$scope.week = publicService.getweek($scope.date);

	$scope.loadErr = false;

	//搜索条件{}
	$scope.search = {

		date: $scope.date,

		week: $scope.week,

		only_GCD: false,

		current: ""

	};

	$scope.search.current = {
		depStation: '深圳',

		arrStation: '上海',

		creationTime: (new Date()).getTime()
	};

	//定位本地
	// $http.get("http://webapi.amap.com/maps/ipLocation?key=608d75903d29ad471362f8c58c550daf")
	// .success(function (response) {
	//     //转换为JSON对象
	//     var jsonObj = eval("(" + response.replace('(', '').replace(')', '').replace(';', '') + ")");
	//     $scope.search.current.depStation = jsonObj.city;
	// });
	$scope.$on("$ionicView.enter", function () {
		if (Storage.get('t_depCity') != null) {
			$scope.search.current.depStation = Storage.get('t_depCity');
		} else {
			Storage.set('t_depCity', $scope.search.current.depStation);
		};
		if (Storage.get('t_arrCity') != null) {
			$scope.search.current.arrStation = Storage.get('t_arrCity');
		} else {
			Storage.set('t_arrCity', $scope.search.current.arrStation);
		};
		if (Storage.get('gotoDate') != null) {
			$scope.search.date = Storage.get('gotoDate');
			$scope.search.week = publicService.getweek(new Date($scope.search.date));
		} else {
			Storage.set('gotoDate', $scope.search.date);
		};

	});

	//交换出发地和目的地
	$scope.switchStation = function () {

		var station = $scope.search.current.depStation;

		$scope.search.current.depStation = $scope.search.current.arrStation;

		$scope.search.current.arrStation = station;

		var start = $(".queryCondition .city .start .cityName"),

		end = $(".queryCondition .city .end .cityName"),

		exchange = $('.queryCondition .exchange span');

		//添加动画
		start.addClass("bin_left");

		end.addClass("bin_right");

		exchange.addClass("salse720");

		setTimeout(function () {

			start.removeClass("bin_left");

			end.removeClass("bin_right");

			exchange.removeClass('salse720');

		}, 500);

	};
	// var gotoDate = Storage.get('gotoDate');
	// if (gotoDate) {
	//  $scope.search.date = gotoDate;
	// }

	// Storage.set('gotoDate', $scope.search.date);

	$scope.selectDate = function (p) {

		$scope.currentmodifie = p == 'left' ? 'left_date' : 'right_date';
		Storage.set('currentmodifie', $scope.currentmodifie);
		$state.transitionTo('mydate', {
			gotoDate: $scope.search.date,
			lr: 1
		});
	};

	$scope.selectStation = function (index) {
		$ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
		$scope.currentmodifie = index == 'left' ? '出发站' : '返回站';
		Storage.set('currentmodifie', $scope.currentmodifie);
		$state.transitionTo('trainplace', {
			title: $scope.currentmodifie
		});

	};

	$scope.trainSearch = function () {

		//判断出发城市和到达城市


		if ($scope.search.current.depStation == $scope.search.current.arrStation) {

			MsgBox.dialogBox($compile, $scope, "出发地和目的地不能相同", "确定");

			return;

		};

		//保存缓存

		Storage.set("trainSearch", $scope.search);
		Storage.set("train_searchDate", $filter("date")($scope.search.date, "yyyy/MM/dd"));

		//跳转到航班列表页


		$state.transitionTo('trainList');
	};

})
.controller('trainListCtrl',
	function ($scope, $rootScope, $ionicPlatform, ENV, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();
	$scope.myStyle = {

		displaytitle: {

			"display": "block"

		},

		displayflight: {

			"display": "none"

		},

		loading: {

			"display": "none"

		},

		loadfinish: {

			"display": "none"

		}

	};

	$scope.display = {

		head: {

			'display': 'none'

		},

		foot: false,

		central: "loading"

	};

	$scope.gotoTrainHome = function () {
		$state.transitionTo('tab.train');
	};

	$scope.$on("$ionicView.enter", function () {

		$scope.search = Storage.get("trainSearch");
		$scope.search.date = new Date($scope.search.date);
		var gotoDate = Storage.get('gotoDate');
		if (gotoDate != null) {
			$scope.search.date = gotoDate;
			var a = new Date(gotoDate);
			$scope.search.week = publicService.getweek(a);
		};
		$scope.trainTypeList = getTrainTypeList($scope.search.only_GCD);
		$scope.trainTypeArr = [];

		$scope.chkAll_trainType = true;

		if ($scope.search.only_GCD) {

			$scope.chkTrainType(false);

		};

		$scope.getSearchList(false);

	});

	// 票价格式化
	$scope.moneyFormat = function (val) {

		if (!val) {

			return val;

		};

		if (val.lastIndexOf('.00') > 0) {

			return val.replace('.0', '');

		};

		if (val.lastIndexOf('.0') > 0) {

			return val.replace('.0', '');

		};

		return val;

	};

	// 详细信息展示- 折叠效果
	$scope.baseInfo = function (event) {
		var baseInfo = angular.element(event.currentTarget);
		var simpleInfo = baseInfo.next();
		var detailInfo = simpleInfo.next();
		if (detailInfo.css('display') == 'block') {

			angular.element('.detailInfo').hide();

			angular.element('.simpleInfo').hide();

			simpleInfo.hide();

			detailInfo.hide();

		} else {

			angular.element('.detailInfo').hide();

			angular.element('.simpleInfo').hide();
			detailInfo.show();
		};

	};

	//余票与票价显示切换
	$scope.changeColor = function(){
		$('.baseInfo').click(function(){
			$(this).css('background','#49D3DD').find('span').addClass('changeColor');
			$(this).parent().siblings().find('.baseInfo').css('background','#FFF').find('span').removeClass('changeColor');
			$(this).find('img:eq(0)').attr('src',ENV.imgUrl + 'resources/air/image/shi1.png');
			$(this).find('img:eq(1)').attr('src',ENV.imgUrl + 'resources/air/image/zhong1.png');
			$(this).parent().siblings().find('img:eq(0)').attr('src',ENV.imgUrl + 'resources/air/image/shi.png');
			$(this).parent().siblings().find('img:eq(1)').attr('src',ENV.imgUrl + 'resources/air/image/zhong.png');
		})
		
	}

	$scope.switchDisplay = function (className) {

		$scope.costTimeClass = "";

		$scope.depTimeClass = "";

		$scope.moneyClassName = className == "number" ? "selected money" : "selected number";

		$scope.className = className == "number" ? "money" : "number";

		$scope.textName = className == "number" ? "显示余票" : "显示价格";

	};

	// 列车时刻表
	$ionicModal.fromTemplateUrl('templates/trainTime.html', {
		scope: $scope,
		animation: 'slide-in-left',

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
			station: p.train_code,
			sf: sf,
			csrf_test_name: csrf_test_name
		};
		$http.post(ENV.api + '/app/jiekou/train/trainstatus', objtops($scope.station)).success(function (data) {

			if (data['return_code'] == '000') {

				$scope.timeList = {

					train_code: p.train_code,

					depStation: p.from_station,

					arrStation: p.arrive_station,

					time_list: data['train_stationinfo']

				};

				$scope.trainTime.show();

			} else {

				MsgBox.promptBox("加载时刻表失败!", 3000);

			};

		}).finally (function (data) {

				MsgBox.waitHide();
			});

	}

	//前一天 后一天 --> 变更日期
	$scope.dateChange = function (p, n) {
		var dt1 = $filter("date")($scope.search.date, "yyyy/MM/dd");
		var dt2 = $filter("date")(new Date(), "yyyy/MM/dd");
		if (n < 0 && publicService.compareDate(dt1, dt2) >= 0) {
			return;
		};
		$scope.search.date = publicService.dayadd(new Date($scope.search.date), n);
		$scope.search.week = publicService.getweek(new Date($scope.search.date));
		if (n > 0) {
			publicFunction.classAnmte("databutBix", "dataRigh");
		} else {
			publicFunction.classAnmte("databutBix", "dataLeft");
		};
		$scope.search.date = $filter("date")($scope.search.date, "yyyy-MM-dd")
			$scope.getSearchList();
		return;
	};
	// 切换至日期页面
	$scope.selectDate = function (ps) {
		$state.transitionTo('mydate', {
			gotoDate: $filter("date")($scope.search.date, "yyyy-MM-dd"),
			lr: ps
		});
	};

	//获取搜索列表{bool:true:交换;false:不换方向}


	$scope.getSearchList = function (bool) {

		if (bool) {

			var station = $scope.search.current.depStation;

			$scope.search.current.depStation = $scope.search.current.arrStation;

			$scope.search.current.arrStation = station;

		};

		$scope.display.head.display = "none";

		$scope.display.foot = false;

		$scope.display.central = "loading";

		$scope.myStyle.loading.display = "block";

		$scope.myStyle.loadfinish.display = "none";

		$scope.errMsg = "没有找到符合条件的车次，";

		$scope.searchtrain = {
			arrStation: $scope.search.current.arrStation,
			depStation: $scope.search.current.depStation,
			date: $scope.search.date,
			sf: sf,
			csrf_test_name: csrf_test_name
		};

		$http.post(ENV.api + '/app/jiekou/train/trainList', objtops($scope.searchtrain)).success(function (data) {

			if (data['code'] == 0) {

				$scope.train_List = data['item']['trainList'];

				$scope.stationList = data['item']['stationList'];

				$scope.searchfilter(true); // 筛选时添加


				if ($scope.train_List == '' || $scope.train_List.lenght == 0) {

					$scope.display.central = "loadempty";

				} else {

					$scope.display.foot = true;

					$scope.display.central = "loadfinish";

				};

			} else {

				if (data['code'] == 1) {

					$scope.display.central = "loadempty";

					$scope.errMsg = data['msg'];

				} else {

					$scope.display.central = "loaderr";

				};

			}

		}).error(function () {

			$scope.display.central = "loaderr";

		}).finally (function (data) {

				$scope.myStyle.loading.display = "none";

				$scope.myStyle.loadfinish.display = "block";

				$scope.display.head.display = "block";

			});

	};

	//列表排序


	$scope.listSort = function (sortBy) {

		$scope.moneyClassName = "";

		if (sortBy.indexOf("depTimeClass") >= 0) {

			$scope.sortBy = 'from_time';

			$scope.sortDesc = !publicService.isNull($scope.depTimeClass) && $scope.depTimeClass.indexOf('up') >= 0;

			$scope.costTimeClass = "";

			$scope.depTimeClass = $scope.sortDesc ? "selected down" : "selected up";

		} else {

			$scope.sortBy = 'costtime';

			$scope.sortDesc = !publicService.isNull($scope.costTimeClass) && $scope.costTimeClass.indexOf('up') >= 0;

			$scope.depTimeClass = "";

			$scope.costTimeClass = $scope.sortDesc ? "selected down" : "selected up";

		};

	};

	//筛选框
	$ionicModal.fromTemplateUrl('templates/shaixuan.html', {
		scope: $scope,

	}).then(function (modal) {
		$scope.shaixuan = modal;
	});

	//筛选条件－车次类型


	function getTrainTypeList(only_GCD) {

		return [{

				chk: only_GCD,

				id: 0,

				name: "高铁(G/C)"

			}, {

				chk: only_GCD,

				id: 1,

				name: "动车(D)"

			}, {

				chk: false,

				id: 2,

				name: "普通(Z/T/K)"

			}, {

				chk: false,

				id: 30,

				name: "其他(L/Y等)"

			}
		];

	};

	// $scope.trainTypeList = getTrainTypeList($scope.search.only_GCD);
	// $scope.trainTypeArr = [];

	// $scope.chkAll_trainType = true;

	$scope.chkTrainType = function (chkAll) {

		if (chkAll) {

			$scope.chkAll_trainType = true;

			$scope.trainTypeArr = [];

			angular.forEach($scope.trainTypeList, function (item) {

				item['chk'] = false;

			});

		} else {

			angular.forEach($scope.trainTypeList, function (item) {

				var idx = $scope.trainTypeArr.indexOf(item['id']);

				if (item['chk']) {

					if (idx < 0) {

						$scope.trainTypeArr.push(item['id']);

					}

				} else {

					if (idx >= 0) {

						$scope.trainTypeArr.splice(idx, 1);

					}

				}

			});

		};

	};

	//只查高铁/动车


	// if ($scope.search.only_GCD) {

	//     $scope.chkTrainType(false);

	// }

	//筛选条件－发车时间

	function getTimeList() {

		return [{

				chk: false,

				id: 1,

				name: "上午",

				bt: "06:00",

				et: "12:00"

			}, {

				chk: false,

				id: 2,

				name: "下午",

				bt: "12:00",

				et: "18:00"

			}, {

				chk: false,

				id: 3,

				name: "晚上",

				bt: "18:00",

				et: "24:00"

			}, {

				chk: false,

				id: 0,

				name: "凌晨",

				bt: "00:00",

				et: "06:00"

			}
		];

	};
	$scope.timelist = getTimeList();

	$scope.timeArr = [];

	$scope.chkAll_time = true;

	$scope.chkTime = function (chkAll) {

		// $scope.timelist = getTimeList();

		$scope.timeArr = [];

		$scope.chkAll_time = true;

		if (chkAll) {

			$scope.chkAll_time = true;

			$scope.timeArr = [];

			angular.forEach($scope.timelist, function (item) {

				item['chk'] = false;

			});

		} else {

			angular.forEach($scope.timelist, function (item) {

				var idx = $scope.timeArr.indexOf(item['id']);

				if (item['chk']) {

					if (idx < 0) {

						$scope.timeArr.push(item['id']);

					};

				} else {

					if (idx >= 0) {

						$scope.timeArr.splice(idx, 1);

					};

				};

			});

		}
	};

	//筛选条件－站点


	$scope.stationArr = [];

	$scope.chkAll_station = true;

	$scope.chkStation = function (chkAll) {

		if (chkAll) {

			$scope.chkAll_station = true;

			$scope.stationArr = [];

			angular.forEach($scope.stationList, function (item) {

				item['chk'] = false;

			});

		} else {

			angular.forEach($scope.stationList, function (item) {

				var idx = $scope.stationArr.indexOf(item['station']);

				if (item['chk']) {

					if (idx < 0) {

						$scope.stationArr.push(item['station']);

					};

				} else {

					if (idx >= 0) {

						$scope.stationArr.splice(idx, 1);

					};

				};

			});

		};

	};

	//获取搜索列表


	// $scope.getSearchList(false);

	//筛选搜索列表{确定、取消事件}


	// $scope.filter = Array();

	// $scope.timefilter = new Array();

	// $scope.stationfilter = new Array();

	// $scope.stainTypefilter = new Array();

	//车次列表筛选


	$scope.searchfilter = function (confirm) {
		$scope.filter = Array();

		$scope.timefilter = new Array();

		$scope.stationfilter = new Array();

		$scope.stainTypefilter = new Array();

		$scope.shaixuan.hide();

		if (confirm) {

			var arr = new Array();

			arr = arr.concat($scope.timeArr);

			$scope.timefilter = arr;

			arr = new Array();

			arr = arr.concat($scope.stationArr);

			$scope.stationfilter = arr;

			arr = new Array();

			arr = arr.concat($scope.trainTypeArr);

			$scope.stainTypefilter = arr;

		} else {

			angular.forEach($scope.timelist, function (item) {

				var key = item['id'];

				item['chk'] = ($scope.timefilter.indexOf(key) >= 0);

			});

			angular.forEach($scope.stationList, function (item) {

				var key = item['station'];

				item['chk'] = ($scope.stationfilter.indexOf(key) >= 0);

			});

			angular.forEach($scope.trainTypeList, function (item) {

				var key = item['id'];

				item['chk'] = ($scope.stainTypefilter.indexOf(key) >= 0);

			});

		}

		$scope.filter = {

			deptime: $scope.timefilter,

			station: $scope.stationfilter,

			stainType: $scope.stainTypefilter

		};

		$scope.trainList = $filter("search_train_filter")($scope.train_List, $scope.filter);

		if ($scope.trainList.length <= 0) {

			$scope.display.central = "screenEmpty";

			$scope.errMsg = "没有符合条件的列车";

		} else {

			$scope.display.central = "loadfinish";

		}

		$scope.className = "number";

		$scope.textName = "显示价格";

		$scope.depTimeClass = "selected up";

		$scope.sortBy = 'from_time';

		$scope.sortDesc = false;

	};

	//预订
	$scope.reserve = function (train, seat) {

		train.seatList = [seat];
		train.search = $scope.search;

		//保存已选择的信息到缓存

		Storage.set("train_selected", train);
		var UserId = Storage.get("UserId");
	
			//如果没有登录，则跳转到登录页面
			if (UserId == undefined || UserId == '' || UserId == null || UserId <= 0) {
				MsgBox.promptBox("请登录账号！", 1500);
				Storage.set('loginBack', 'trainList');
				$timeout(function () {
					$state.transitionTo('login');
				}, 1500);
				return;
		} else {
			$state.transitionTo('tab.trainOrder');
			return;
		};

		//跳转到火车订单页
	};

})
.controller('trainOrderCtrl',
	function ($scope, $rootScope, ENV, $ionicModal, $ionicPlatform, publicService, $filter, MsgBox, Storage, $ionicPopover, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	$scope.sf = sf;
	//当前选择乘客统计
	$scope.traininit = function () {};

	$scope.currentselected = {

		adult: {

			count: 0

		},

		child: {

			count: 0

		}

	};
	//联系人

	$scope.currentContact = {

		yonghuid: 0,

		xingming: "",

		shoujihaoma: ""

	};
	//费用明细

	$scope.costdetail = {

		adult: {

			count: 0

		},

		child: {

			count: 0

		},

		unit: {

			ticketfare: 0,

			expressfee: 0,

			insurance: 0

		},

		total: {

			totalPrice: 0,

			totalCount: 0,

			ticketfare: 0,

			expressfee: 0,

			insurance: 0

		}

	};
	//保险信息

	$scope.insurance = {

		id: 0,

		price: 0,

		title: "",

		isMail: false

	};

	//已选择乘客Id列表

	$scope.chooseId = new Array();

	//邮寄信息

	$scope.mail = {

		isMail: false,

		bx_invoice_receiver: "",

		bx_invoice_phone: "",

		bx_invoice_zipcode: "",

		bx_invoice_address: ""

	};

	$scope.$on("$ionicView.beforeEnter", function () {

		$scope.selected = Storage.get("train_selected");

		$scope.selected.source = 0;

		$scope.selected.search.date = new Date($scope.selected.search.date);

		$scope.selected.search.arr_date = publicService.minuteadd($scope.selected.search.date, $scope.selected.cost_time);

		$scope.selected.search.arr_week = publicService.getweek($scope.selected.search.arr_date);

		$scope.costdetail.unit.ticketfare = $scope.selected.seatList[0].price;

	});

	$scope.sf = sf;

	if (sf == '') {
		$scope.issf = 0;
	} else {
		$scope.issf = 1;
	}

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();

	$scope.$on("$ionicView.enter", function () {

		if (sf == '') {
			$scope.issf = 0;
		} else {
			$scope.issf = 1;
		};

		var currentContact = Storage.get('t_currentContact')
			if (currentContact != null) {
				$scope.currentContact = currentContact;
			} else {

				if ($scope.sf == '' || 1==1) {
					var yonghuid = Storage.get('UserId');
					$scope.yonghuid = {
						yonghuid: yonghuid,
						sf: sf,
						csrf_test_name: csrf_test_name
					};
					//联系人
					$http.post(ENV.api + '/app/db/yonghu/find', objtops($scope.yonghuid)).success(function (data1) {
						if (data1 != 'false') {
							$scope.currentContact = data1;
						} else {
							// $scope.currentContact = '';
						};

						Storage.set('t_currentContact', $scope.currentContact);

					});
					// 乘客
					$http.post(ENV.api + '/app/db/passenger/trainSelect', objtops($scope.yonghuid)).success(function (data) {

						if (data != 'false') {
							$scope.userContacts = data;
						} else {
							$scope.userContacts = '';
						};
						Storage.set('t_userContacts', $scope.userContacts);
					});
					// 收件地址
					$http.post(ENV.api + '/app/db/address/trainSelect', objtops($scope.yonghuid)).success(function (data) {
						if (data != 'false') {
							$scope.addressList = data;
						} else {
							$scope.addressList = '';
						};
						Storage.set('t_addressList', $scope.addressList);
					});
				} else {
					// $scope.currentContact = '';
					Storage.set('t_currentContact', $scope.currentContact);
					$scope.userContacts = '';
					Storage.set('t_userContacts', $scope.userContacts);
					$scope.addressList = '';
					Storage.set('t_addressList', $scope.addressList);

				};

			};

		var insurance = Storage.get('t_insurance');
		if (insurance != null) {
			$scope.insurance = insurance;
		} else {
			//保险列表
			$http.get(ENV.imgUrl + 'data/trainInsuranceList.json').success(function (data) {
				if (data['code'] == 0) {

					$scope.insuranceList = data['item'];

					//保险信息

					angular.forEach($scope.insuranceList, function (item) {

						if (item.chk) {

							$scope.insurance.id = item.id;

							$scope.insurance.price = item.price;

							$scope.insurance.title = item.title.replace("套餐", "");

						}

					});

					Storage.set('insuranceListTrain', $scope.insuranceList);
					Storage.set('t_insurance', $scope.insurance);

				} else {}

			});
		};
		// 邮递地址
		var mail = Storage.get('t_mail');
		if (mail != null) {
			$scope.mail = mail;
		} else {
			//邮寄信息

			$scope.mail = {

				isMail: false,

				bx_invoice_receiver: "",

				bx_invoice_phone: "",

				bx_invoice_zipcode: "",

				bx_invoice_address: ""

			};
			Storage.set('t_mail', $scope.mail);
		};

		// 选择人数
		var currentselected = Storage.get('t_currentselected');
		if (currentselected != null) {
			$scope.currentselected = currentselected;
		} else {
			$scope.currentselected = {

				adult: {

					count: 0

				},

				child: {

					count: 0

				}

			};
			Storage.set('t_currentselected', $scope.currentselected);
		};
		// 乘客
		var userContacts = Storage.get('t_userContacts'); ;
		if (userContacts != null) {
			$scope.userContacts = userContacts;
		}
		var chooseId = Storage.get('t_chooseId');

		if (chooseId != null) { // 乘客选择ID
			$scope.chooseId = chooseId;
			if ($scope.chooseId.length > 0) {

				angular.forEach($scope.userContacts, function (item) {

					item['chk'] = ($scope.chooseId.indexOf(item['id']) >= 0);

				});

			}

		} else {
			Storage.set('t_chooseId', $scope.chooseId);
		}
		var costdetail = Storage.get('t_costdetail');
		if (costdetail != null) {
			$scope.costdetail = costdetail;
		} else {
			//费用明细

			$scope.costdetail = {

				adult: {

					count: 0

				},

				child: {

					count: 0

				},

				unit: {

					ticketfare: 0,

					expressfee: 0,

					insurance: 0

				},

				total: {

					totalPrice: 0,

					totalCount: 0,

					ticketfare: 0,

					expressfee: 0,

					insurance: 0

				}

			};
			Storage.set('t_costdetail', $scope.costdetail);
		};

		var firstUserContact = Storage.get('firstUserContact');
		if (firstUserContact != null) {
			$scope.firstUserContact = firstUserContact;
		};

		$scope.selected = Storage.get("train_selected");
		$scope.selected.source = 0;
		$scope.selected.search.date = new Date($scope.selected.search.date);
		$scope.selected.search.arr_date = publicService.minuteadd($scope.selected.search.date, $scope.selected.cost_time);
		$scope.selected.search.arr_week = publicService.getweek($scope.selected.search.arr_date);
		$scope.costdetail.unit.ticketfare = $scope.selected.seatList[0].price;

		$scope.calcTotalPrice();
		// $scope.yincang();
		// angular.element('.footorder').find('.detail').removeClass('up');
	});
	// 为空跳转有联系人跳转修改界面,不为空跳转三方注册界面
	$scope.lianxiren = function (p) {
	
		$state.transitionTo('tab.contactsTrainEdit');

	};

	// 时间列表样式
	$scope.loadClass = function (p, type, name) {
		var ride_station = false;

		if (p.name == $scope.timeList.depStation) {

			ride_station = true;

			return name == "sto_name" || name == "dep_time" ? "highlight" : "";

		} else if (p.name == $scope.timeList.arrStation) {

			ride_station = false;

			return name == "sto_name" || name == "arr_time" ? "highlight" : "";

		};

		return ride_station ? "" : "restTrainCity";

	};

	// 费用明细弹出切换效果
	$scope.mingxi = function () {

		angular.element('.footorder').find('.detail').toggleClass('up');

		angular.element('.particularsMask').toggle();

	};
	// 隐藏
	$scope.yincang = function () {
		angular.element('.footorder').find('.detail').removeClass('up');

		angular.element('.particularsMask').toggle();
	};

	// 列车时刻表
	$ionicModal.fromTemplateUrl('templates/trainTime.html', {
		scope: $scope,
		animation: 'slide-in-left',

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
			station: p.train_code,
			sf: sf,
			csrf_test_name: csrf_test_name
		};
		$http.post(ENV.api + '/app/jiekou/train/trainstatus', objtops($scope.station)).success(function (data) {

			if (data['return_code'] == '000') {

				$scope.timeList = {

					train_code: p.train_code,

					depStation: p.from_station,

					arrStation: p.arrive_station,

					time_list: data['train_stationinfo']

				};

				$scope.trainTime.show();

			} else {

				MsgBox.promptBox("加载时刻表失败!", 3000);

			};

		}).finally (function (data) {

				MsgBox.waitHide();
			});

	};

	$scope.showChoosePassenger = function () {
		if ($scope.currentContact.xingming != '') {
			$state.transitionTo('tab.passengerTrain');
		} else {
			MsgBox.promptBox('请先添加联系人', 3000);
		};

	};
	$scope.addressTrainInfo = function () {
		if ($scope.currentContact.xingming != '') {
			$state.transitionTo('tab.addressTrainInfo');
		} else {
			MsgBox.promptBox('请先添加联系人', 3000);
		};

	};

	// 订单须知
	$scope.popover7 = $ionicPopover.fromTemplateUrl('templates/orderNotice.html', {
			scope: $scope
		});
	$ionicPopover.fromTemplateUrl('templates/orderNotice.html', {
		scope: $scope
	}).then(function (popover) {
		$scope.popover7 = popover;
	});

	$scope.orderInfo = function ($event) {
		$scope.popover7.show($event);
	};
	//销毁事件回调处理：清理popover对象
	$scope.$on("$destroy", function () {
		$scope.popover7.remove();
	});
	// 隐藏事件回调处理
	$scope.$on("popover.hidden", function () {
		// Execute action
	});
	//删除事件回调处理
	$scope.$on("popover.removed", function () {
		// Execute action
	});

	//移除乘客

	$scope.selectedRemove = function (p) {

		if (p && p.ticket_type == 0 && $scope.costdetail.adult.count == 1 && $scope.costdetail.child.count > 0) {

			var ticket_type = false;

			angular.forEach($scope.costdetail.childInfo, function (item) {

				if (item.pid != p.id) {

					ticket_type = true;

					return;

				};

			});

			if (ticket_type) {

				MsgBox.promptBox('这是订单内最后一个成人，请先移除儿童票再移除此成人。', 3000);

				return;

			};

		};

		$scope.chooseId = new Array();

		$scope.costdetail.childInfo = new Array();

		$scope.costdetail.adult.count = 0;

		$scope.costdetail.child.count = 0;

		$scope.firstUserContact = "";

		var len = $scope.userContacts.length;

		// 从后往前遍历
		for (var i = len - 1; i >= 0; i--) {

			item = $scope.userContacts[i];

			if (!publicService.isNull(p)) {

				//移除乘车人记录操作

				if (p.isNew) {

					//移除携带儿童记录

					if (p.id == item.id) {

						//删除符合条件的记录

						$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

						continue;

					};

				} else {

					if (p.user_ids == item.user_ids) {

						if (item.isNew) {

							$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

							continue;

						} else {

							$scope.userContacts[i].chk = false;

						};

					};

				};

			} else {

				//确定选择乘车人操作  // 本身是儿童？

				if ($scope.clearChild && item.isNew) {

					//如果是携带儿童记录，则直接从列表中移除

					$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

					continue;

				};

			};

			if (item.chk) {

				// 重新生成 选择ID
				$scope.chooseId.push(item.id);

				if (item.ticket_type == 0) {

					$scope.costdetail.adult.count += 1;

					if (publicService.isNull($scope.firstUserContact) || item['chkTime'] < $scope.firstUserContact.chkTime) {

						$scope.firstUserContact = angular.copy(item);

						$scope.firstUserContact.pid = item.id;

						$scope.firstUserContact.chk = true;

						$scope.firstUserContact.isNew = false;

						$scope.firstUserContact.ticket_type = 1;

					};

				} else {
					// 把儿童信息添加到临时的childInfo 中，以便判断最后的儿童
					$scope.costdetail.childInfo.push(item);

					$scope.costdetail.child.count += 1;

				};

			};

		};

		$scope.calcTotalPrice();

		$scope.currentselected.adult.count = $scope.costdetail.adult.count;

		$scope.currentselected.child.count = $scope.costdetail.child.count;

		Storage.set('t_chooseId', $scope.chooseId);

		Storage.set('t_costdetail', $scope.costdetail);
		Storage.set('t_currentselected', $scope.currentselected);

	};

        
//筛选框
	$ionicModal.fromTemplateUrl('templates/xuanchengren.html', {
		scope: $scope,

	}).then(function (modal) {
		$scope.shaixuan = modal;
	});	
        
        
        	//添加携带儿童

	$scope.addChildTicket = function () {

         var ertongshu = 0;

		angular.forEach($scope.userContacts, function(data,index,array){

			if (data.ticket_type == "1" && typeof(data.pid ) != "undefined" && data.pid != null) {
				ertongshu +=1;
			};
		});

		if (ertongshu >0) {
			  $scope.shaixuan.show();
		} else {
			if (publicService.isNull($scope.firstUserContact)){
				return;
			}
			if ($scope.costdetail.total.totalCount >= 5) {
				MsgBox.promptBox("最多只能添加5位乘客", 3000);
				return;
			};
	
			var userContact = angular.copy($scope.firstUserContact);
	
			userContact.pid = $scope.firstUserContact.id;
	
			userContact.id = (new Date()).getTime();
	
			userContact.ticket_type = "1";
	
			userContact.isNew = true;
	
			$scope.userContacts.push(userContact);
	
			$scope.chooseId.push(userContact['id']);
	
			$scope.costdetail.child.count += 1;
	
			$scope.currentselected.child.count = $scope.costdetail.child.count;
	
			$scope.calcTotalPrice();

		};
	};

	// 添加儿童
	$scope.tianjiaertong = function($ren){
		var userContact  =angular.fromJson(angular.toJson ($ren));

		var ertongshu = 0;

		angular.forEach($scope.userContacts, function(data,index,array){

			if (typeof(data.pid ) != "undefined" && data.pid != null && data.pid == userContact.id) {

				ertongshu +=1;
			};
		});
		if (ertongshu >1) {
			MsgBox.promptBox("已携带俩个儿童, 请另选大人携带", 3000);
		} else {

			userContact.pid = userContact.id ;
			userContact.id = (new Date()).getTime();

			userContact.ticket_type = "1";

			userContact.isNew = true;

			$scope.userContacts.push(userContact);

			$scope.chooseId.push(userContact['id']);

			$scope.costdetail.child.count += 1;

			$scope.currentselected.child.count = $scope.costdetail.child.count;

			$scope.calcTotalPrice();

			$scope.shaixuan.hide();

		};

	};
        
	//计算总费用

	$scope.calcTotalPrice = function () {

		if ($scope.costdetail.adult.count < 0){
			$scope.costdetail.adult.count = 0;			
		};
		if ($scope.costdetail.child.count < 0){
			$scope.costdetail.child.count = 0;			
		};
		$scope.costdetail.unit.insurance = $scope.insurance.price;

		$scope.costdetail.total.totalCount = $scope.costdetail.adult.count + $scope.costdetail.child.count;

		$scope.costdetail.total.ticketfare = $scope.costdetail.unit.ticketfare * $scope.costdetail.total.totalCount;

		$scope.costdetail.total.insurance = $scope.costdetail.unit.insurance * $scope.costdetail.adult.count;

		$scope.costdetail.total.expressfee = $scope.costdetail.unit.expressfee;

		$scope.costdetail.total.totalPrice = $scope.costdetail.total.ticketfare + $scope.costdetail.total.expressfee + $scope.costdetail.total.insurance;

	};

	//提交订单
	$scope.postOrder = function () {
       
		var flag = true;
		if ($scope.currentContact.xingming == null || $scope.currentContact.xingming == "") {
			MsgBox.promptBox("请填写联系人姓名", 3000);
			flag = false;
		};
		if ($scope.currentContact.shoujihaoma == null || $scope.currentContact.shoujihaoma == "") {
			MsgBox.promptBox("请填写联系电话", 3000);
			flag = false;
		};

		if ($scope.costdetail.total.totalCount == 0) {
			MsgBox.promptBox("请添加乘车人", 2000);
			flag = false;
		};

		if ($scope.costdetail.total.totalCount > 5) {
			MsgBox.promptBox("最多只能添加5位乘客", 2000);
			flag = false;
		};

		if ($scope.costdetail.adult.count <= 0 && $scope.costdetail.child.count > 0) {
			MsgBox.promptBox("根据规定，儿童不能单独乘车，需有成人同行。");
			flag = false;
		};

		if ($scope.selected.seatList[0].count < $scope.costdetail.total.totalCount) {
			MsgBox.promptBox("余票不足", 2000);
			flag = false;
		};

		if ($scope.currentContact.name == "" || $scope.currentContact.tel == "") {
			MsgBox.promptBox("请选择联系人");
			flag = false;
		};

		if (flag === true) {
			var adult = $filter("contacts_filter")($scope.userContacts, true, {
					"key": "ticket_type",
					"value": '0'
				});

			var child = $filter("contacts_filter")($scope.userContacts, true, {
					"key": "ticket_type",
					"value": '1'
				});

			$scope.firstUserContact.carry_childCount = child.length;

			$scope.selected.ticketInfo = {
				ticket_person: {
					adult: adult,
					child: child
				},
				contacts: $scope.currentContact,
				mail: $scope.mail,
				insurance: $scope.insurance,
				cost: $scope.costdetail,
				carry_child: $scope.firstUserContact
			};
			var yonghuid = Storage.get("UserId");
			var train_order = {
				selected: $scope.selected,
				yonghuid: yonghuid,
				sf: sf
			};

			Storage.set("train_order", train_order);


				var ts = $scope.selected;
				var body = ts.train_code + ' ' + ts.from_station + ' 到 ' + ts.arrive_station;

				// 订单中的总金额
				var total_fee = '';
				if (typeof($scope.selected.ticketInfo.cost.total.totalPrice) != 'undefined' &&
					$scope.selected.ticketInfo.cost.total.totalPrice != "" && $scope.selected.ticketInfo.cost.total.totalPrice != null) {
					total_fee = $scope.selected.ticketInfo.cost.total.totalPrice;
				}

				$("#hc_total_fee").val(total_fee);
				$("#hc_body").val(body);
				$("#hc_attach").val("");
				$("#hc_goods_tag").val("");
				$("#hc_detail").val("");
				$("#hc_tijiaoform").submit();
	
		};
	};

})
.controller('TrainPlaceCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	$scope.$on('$ionicView.afterEnter', function() {
        $ionicLoading.hide();
    })
	// 标题
	$scope.title = $stateParams['title'];

	// 搜索城市
	$scope.searchBox = {
		content: ""
	};

	var depCity = '';
	var arrCity = '';
	var depCode = '';
	var arrCode = '';

	// 加载站点列表
	$http.get(ENV.imgUrl + "data/stationlist.json")
	.success(function (data) {

		$scope.users = data.item;
		var users = $scope.users;

		$scope.alphabet = iterateAlphabet();

		//Sort user list by first letter of name
		var tmp = {};
		for (i = 0; i < users.length; i++) {
			var letter = users[i].FPY;
			if (tmp[letter] == undefined) {
				tmp[letter] = [];
			};
			for (j = 0; j < users[i].station.length; j++) {
				tmp[letter].push(users[i].station[j]);
			};
		};

		$scope.sorted_users = tmp;

	})
	.error(function (error) {
		failCallback(error);
	});

	$http.get(ENV.imgUrl + "data/trainremenplace.json")
	.success(function (data) {
		$scope.remenplace = data;
	});
	// $location.hash('index_A');
	// $ionicScrollDelegate.anchorScroll();
	$ionicScrollDelegate.anchorScroll('index_A');

	//Click letter event
	$scope.gotoList = function (id) {
		$location.hash(id);
		$ionicScrollDelegate.anchorScroll();
	};

	//Create alphabet object
	function iterateAlphabet() {
		var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		var numbers = new Array();
		for (var i = 0; i < str.length; i++) {
			var nextChar = str.charAt(i);
			numbers.push(nextChar);
		}
		return numbers;
	}
	$scope.groups = [];
	for (var i = 0; i < 10; i++) {
		$scope.groups[i] = {
			name: i,
			items: []
		};
		for (var j = 0; j < 3; j++) {
			$scope.groups[i].items.push(i + '-' + j);
		};
	};

	$scope.toggleGroup = function (group) {
		if ($scope.isGroupShown(group)) {
			$scope.shownGroup = null;
		} else {
			$scope.shownGroup = group;
		};
	};
	$scope.isGroupShown = function (group) {
		return $scope.shownGroup === group;
	};

	$scope.content = '';
	$scope.keyup = function ($event) {

		var searchList = new Array();

		var content = $scope.content;
		var users = $scope.users;

		if (content) {
			for (i = 0; i < users.length; i++) {
				var station = users[i].station;
				for (j = 0; j < station.length; j++) {

					if (station[j].stationName.match(content)) {
						searchList.push(station[j]);
					}
				};
			}
			$scope.searchList = '';
			$scope.searchList = searchList;
		} else {
			$scope.searchList = '';
		}
	};
	$scope.$on("$ionicView.beforeEnter", function () {
		$scope.searchList = '';

		var history = Storage.get('train_historyplace');
		if (history != null) {
			$scope.history = history;
		} else {
			$scope.history = '';
		};

	});

	//点击‘返回’，返回首页
	$scope.back = function () {
		$state.transitionTo('tab.train');
	};

	//选择城市 返回首页
	$scope.showHomePage = function (p) {

		var history = new Array();
		var historyplace = Storage.get('train_historyplace');
		if (historyplace == null || historyplace == '') {
			historyplace = history;
			historyplace.push(p);
		} else {
			var cunzai = 0;
			var len = historyplace.length;
			for (var i = len - 1; i >= 0; i--) {
				if (historyplace[i].stationName == p.stationName) {
					cunzai = 1;
				};
			};

			if (!cunzai) {
				if (len == 1 || len == 0) {
					historyplace.push(p);
				} else {
					historyplace.shift();
					historyplace.push(p);
				};
			};
		};
		Storage.set('train_historyplace', historyplace);

		switch ($scope.title) {
		case '出发站':
			//出发城市
			depCity = p.stationName;
			Storage.set('t_depCity', depCity);
			$state.transitionTo('tab.train');
			break;
		case '返回站':
			//到达城市
			arrCity = p.stationName;
			Storage.set('t_arrCity', arrCity);
			$state.transitionTo('tab.train');
			break;
		};
	};
})
.controller('PassengerTrainCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, publicService, MsgBox, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	$scope.$on("$ionicView.enter", function () {
		var userContacts = Storage.get('t_userContacts'); ;
		if (userContacts != null) {
			$scope.userContacts = userContacts;
		} else {
			$scope.userContacts = '';
		};

		$scope.currentselected = Storage.get('t_currentselected');

		$scope.chooseId = Storage.get('t_chooseId');

		if ($scope.chooseId.length > 0) {

			angular.forEach($scope.userContacts, function (item) {

				item['chk'] = ($scope.chooseId.indexOf(item['id']) >= 0);

			});
		};

		$scope.costdetail = Storage.get('t_costdetail');
	});

	//常用乘客界面显示时的事件

	$scope.displayUserContact = function (disable, p, pageName) {
		if (disable) {
			var p = JSON.stringify(p);
		} else {
			var p = '';
		};

		$state.transitionTo('tab.passengerTrainEdit', {
			isEdit: disable,
			p: p
		});
	};
	//选择或取消乘客时的事件

	$scope.selectedUserContact = function (p) {

		if (p.Audit == "0") {
			$ionicLoading.show({
                  template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
			$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
			var csrf_test_name = getCsrf();
			$scope.passenger = {
				passenger: JSON.stringify(p),
				sf: sf,
				csrf_test_name: csrf_test_name
			}
			$http.post(ENV.api + '/app/db/passenger/yanzheng', objtops($scope.passenger)).success(function (data) {
					if (data=="true") {

						angular.forEach($scope.userContacts, function(item) {
							if (item['id'] == p.id) {
								item['chk'] = true;
								item['Audit'] = "1";
								p.Audit = "1";
								p.chk = true;
							} 

                        });
						$ionicLoading.hide();
						Storage.set('t_userContacts', $scope.userContacts);
					}else{
						$ionicLoading.hide();
						MsgBox.promptBox("该乘客未通过身份信息核验，请去火车站办理。", 3000);

						p.chk = false;

						return;

					}
				
			});


		}

		if (p.ticket_type == 0) {

			if (p.chk) {

				if ($scope.currentselected.adult.count + $scope.currentselected.child.count >= 5) {

					MsgBox.promptBox("最多只能添加5位乘客", 3000);

					p.chk = false;

					return;

				}

				p.chkTime = (new Date()).getTime();

				$scope.currentselected.adult.count += 1;

			} else {
				// 作用  暂时不知
				// $scope.clearChild = ($scope.firstUserContact != undefined && p.identityNo == $scope.firstUserContact.identityNo);

				$scope.currentselected.adult.count -= 1;

			};

		} else {

			if (p.chk) {

				if ($scope.currentselected.adult.count + $scope.currentselected.child.count >= 5) {

					MsgBox.promptBox("最多只能添加5位乘客", 3000);

					p.chk = false;

					return;

				};

				$scope.currentselected.child.count += 1;

			} else {

				$scope.currentselected.child.count -= 1;

			};

		};

	};

	//选择乘客确定

	$scope.selectedConfirm = function (confirm) {

		if (confirm) {

			$scope.selectedRemove();
			if (($scope.currentselected.adult.count + $scope.currentselected.child.count) > 0) {

				if ($scope.currentselected.adult.count == 0) {

					MsgBox.promptBox("儿童不能单独乘车，需有成人同行。", 3000);
					return;

				} else {

					Storage.set('t_currentselected', $scope.currentselected);
					Storage.set('t_chooseId', $scope.chooseId);
					Storage.set('t_costdetail', $scope.costdetail);
					$state.transitionTo('tab.trainOrder');
					return;

				};

			} else {

				MsgBox.promptBox("请选择乘客", 3000);

			};

		} else {

			angular.forEach($scope.userContacts, function (item) {

				item['chk'] = ($scope.chooseId.indexOf(item['id']) >= 0);

			});

			$state.transitionTo('tab.trainOrder');
			return;

		};

	};

	//  需精简

	$scope.selectedRemove = function (p) {

		if (p && p.ticket_type == 0 && $scope.costdetail.adult.count == 1 && $scope.costdetail.child.count > 0) {

			var ticket_type = false;

			angular.forEach($scope.costdetail.childInfo, function (item) {

				if (item.pid != p.id) {

					ticket_type = true;

					return;

				};

			});

			if (ticket_type) {

				MsgBox.promptBox('这是订单内最后一个成人，请先移除儿童票再移除此成人。', 3000);

				return;

			};

		};

		$scope.chooseId = new Array();

		$scope.costdetail.childInfo = new Array();

		$scope.costdetail.adult.count = 0;

		$scope.costdetail.child.count = 0;

		$scope.firstUserContact = "";

		var len = $scope.userContacts.length;

		for (var i = len - 1; i >= 0; i--) {

			item = $scope.userContacts[i];

			if (!publicService.isNull(p)) {

				//移除乘车人记录操作

				if (p.isNew) {

					//移除携带儿童记录

					if (p.id == item.id) {

						//删除符合条件的记录

						$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

						continue;

					};

				} else {

					if (p.user_ids == item.user_ids) {

						if (item.isNew) {

							$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

							continue;

						} else {

							$scope.userContacts[i].chk = false;

						};

					};

				};

			} else {

				//确定选择乘车人操作

				if ($scope.clearChild && item.isNew) {

					//如果是携带儿童记录，则直接从列表中移除

					$scope.userContacts.splice($scope.userContacts.indexOf(item), 1);

					continue;

				};

			};

			if (item.chk) {

				$scope.chooseId.push(item.id); // 选择ID


				if (item.ticket_type == 0) {

					$scope.costdetail.adult.count += 1;

					if (publicService.isNull($scope.firstUserContact) || item['chkTime'] < $scope.firstUserContact.chkTime) {

						$scope.firstUserContact = angular.copy(item);

						$scope.firstUserContact.pid = item.id;

						$scope.firstUserContact.chk = true;

						$scope.firstUserContact.isNew = false;

						$scope.firstUserContact.ticket_type = 1;

						Storage.set('firstUserContact', $scope.firstUserContact);
					};

				} else {

					$scope.costdetail.childInfo.push(item);

					$scope.costdetail.child.count += 1;

				};

			};

		};

		Storage.set('t_chooseId', $scope.chooseId);

		// $scope.calcTotalPrice();

		$scope.currentselected.adult.count = $scope.costdetail.adult.count;

		$scope.currentselected.child.count = $scope.costdetail.child.count;

	};

})
.controller('PassengerTrainEditCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, MsgBox, publicService, $filter, Storage, MsgBox, $ionicPopover, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	// 证件类型
	$http.get(ENV.imgUrl + "data/trainIdentitys.json")
	.success(function (data) {

		$scope.identitys = data;

	})

	.error(function (error) {
		failCallback(error);
	});

	//乘客输入框对象{姓名输入框，证件类型选择框、证件号码输入、去支付按钮}

	$scope.disable = {

		name: false,

		identityType: false,

		identityNo: false,

		btnPost: false,

		isEdit: false

	};
	var yonghuid = Storage.get('UserId');
	$scope.$on("$ionicView.enter", function () {
		var userContacts = Storage.get('t_userContacts'); ;
		if (userContacts != null) {
			$scope.userContacts = userContacts;
		};

		var isEdit = $stateParams['isEdit'];

		if (isEdit == 'true') {

			// 编辑乘客
			var p = JSON.parse($stateParams['p']);
			$scope.disable.identityType = true;
			$scope.title = '编辑';
			$scope.userContact = angular.copy(p);

			$scope.userContactOld = {
				user_name: p.user_name,
				user_ids: p.user_ids,
				ticket_type: p.ticket_type

			};

		} else {

			// 新增乘客
			$scope.title = '新增';

			$scope.userContact = {
				id: "0",
				yonghuid: yonghuid,
				user_name: "",
				ids_type: "二代身份证",
				user_ids: "",
				ticket_type: 0,
				chk: false,
				isNew: true

			};
		};

	});
	//保存常用乘客{新增：True；修改：False}

	$scope.saveUserContact = function (isNew) {
		// 刚刚进入的时候显示 Loading
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在处理...</p></div>'
		});

		//如果信息效验失败，则中止

		if (publicService.isNull($scope.userContact.user_name)) {
			$ionicLoading.hide();
			MsgBox.promptBox("乘车人姓名不允许为空", 3000);

			return;

		};

		if (publicService.isNull($scope.userContact.user_ids)) {
			$ionicLoading.hide();
			MsgBox.promptBox("乘车人证件号码不允许为空", 3000);

			return;

		};

		//如果证件类型为身份证的，需要通过身份证号计算出生日期

		if ($scope.userContact.ids_type == '二代身份证') {
		
			if (!effectCommon.checkIdCard($scope.userContact.user_ids)) {
				$ionicLoading.hide();
				return;

			};

		};

		//如果信息没有改变，则不向后台提交（直接返回原列表页）

		if (!isNew && $scope.userContactOld.user_name == $scope.userContact.user_name && $scope.userContactOld.user_ids == $scope.userContact.user_ids &&

			$scope.userContactOld.chushengriqi == $scope.userContact.chushengriqi && $scope.userContactOld.ticket_type == $scope.userContact.ticket_type) {
			$ionicLoading.hide();
			$state.transitionTo('tab.passengerTrain');
			return;

		};

		//循环判断信息是否已存在

		var loop = true;

		var isSave = true;

		var judgResult = true; //判断结果

		angular.forEach($scope.userContacts, function (item) {

			if (loop) {

				if (isNew) {

					judgResult = (item['user_ids'] == $scope.userContact.user_ids);

				} else {

					judgResult = (item['user_ids'] == $scope.userContact.user_ids && item['id'] != $scope.userContact.id);

				};

				if (judgResult) {
					$ionicLoading.hide();
					MsgBox.promptBox("该乘车人已存在，请检查", 3000);

					isSave = false;

					loop = false;

				};

			};

		});

		//如果判断通过，则提交到后台处理

		//如果判断通过，则提交到后台处理

		if (isSave) {
			var passenger = JSON.stringify($scope.userContact);

			$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
			var csrf_test_name = getCsrf();
			$scope.passenger = {
				passenger: passenger,
				sf: sf,
				csrf_test_name: csrf_test_name
			}
			$http.post(ENV.api + '/app/db/passenger/trainAdd', objtops($scope.passenger)).success(function (data) {

				if (data > 0) {
					$scope.yonghuid = {
						yonghuid: yonghuid,
						sf: sf,
						csrf_test_name: csrf_test_name
					};

					$http.post(ENV.api + '/app/db/passenger/trainSelect', objtops($scope.yonghuid)).success(function (data) {
						$scope.userContacts = data;
						Storage.set('t_userContacts', $scope.userContacts);
						$state.transitionTo('tab.passengerTrain');
						$ionicLoading.hide();
						return;
					});

				} else if(data == "cunzai"){
					$ionicLoading.hide();
					MsgBox.promptBox("该乘车人已存在，请检查", 3000);
				}else{
					$ionicLoading.hide();
					MsgBox.promptBox("添加乘车人出错，请检查", 3000);
				};

			});

		};

	};

	// 乘客姓名提醒浮动框
	$scope.popover8 = $ionicPopover.fromTemplateUrl('templates/passengerName.html', {
			scope: $scope
		});
	$ionicPopover.fromTemplateUrl('templates/passengerName.html', {
		scope: $scope
	}).then(function (popover) {
		$scope.popover8 = popover;
	});

	$scope.passengerName = function ($event) {
		$scope.popover8.show($event);
	};
	$scope.closePopover = function () {
		$scope.popover8.hide();
	};
	//销毁事件回调处理：清理popover对象
	$scope.$on("$destroy", function () {
		$scope.popover8.remove();
	});
	// 隐藏事件回调处理
	$scope.$on("popover.hidden", function () {
		// Execute action
	});
	//删除事件回调处理
	$scope.$on("popover.removed", function () {
		// Execute action
	});
})
.controller('ContactsTrainCtrl',
	function ($scope, $rootScope, ENV, publicService, MsgBox, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {})
.controller('ContactsTrainEditCtrl',
	function ($scope, $rootScope, ENV, publicService,  MsgBox, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$scope.contact = {
		id: '',
		xingming: '',
		shoujihaoma: '',
		isNew: '',
		bx_invoice_address: '',
		bx_invoice_receiver: '',
		bx_invoice_phone: '',
		bx_invoice_zipcode: ''
	};

	$scope.contactOld = {
		xingming: '',
		shoujihaoma: '',
		bx_invoice_address: '',
		bx_invoice_receiver: '',
		bx_invoice_phone: '',
		bx_invoice_zipcode: ''
	};

	var yonghuid = Storage.get('UserId');

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	var csrf_test_name = getCsrf();
	$scope.yonghuid = {
		yonghuid: yonghuid,
		sf: sf,
		csrf_test_name: csrf_test_name
	};

	$http.post(ENV.api + '/app/db/yonghu/find', objtops($scope.yonghuid)).success(function (data) {
		$scope.contact = data;
	});

	$scope.contactOld = {
		xingming: $scope.contact.xingming,
		shoujihaoma: $scope.contact.shoujihaoma
	};

	$scope.back = function () {
		$state.transitionTo('tab.trainOrder');
	};

	//保存联系人
	$scope.saveContact = function () {
		var name = $scope.contact.xingming;
		var tel = $scope.contact.shoujihaoma;

		if (name == '') {
			MsgBox.promptBox('姓名不能为空');
			return;
		} else {
		};
		if (tel.length > 0) {
			var reg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/i;
			var result = reg.test(tel);
			if (result) {
				
			} else {
				MsgBox.promptBox('请输入有效电话号码');
				return;
			};
		} else {
			MsgBox.promptBox('电话号码不能为空');
			return;
		};

		if ($scope.contactOld.xingming == $scope.contact.xingming && $scope.contactOld.shoujihaoma == $scope.contact.shoujihaoma) {
			$state.transitionTo('tab.trainOrder');
		};
		var yonghu = JSON.stringify($scope.contact);

		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		$scope.yonghu = {
			yonghu: yonghu,
			sf: sf,
			bx_invoice_address: $scope.contact.bx_invoice_address,
			bx_invoice_receiver: $scope.contact.xingming,
			bx_invoice_phone: $scope.contact.bx_invoice_phone,
			bx_invoice_zipcode: $scope.contact.bx_invoice_zipcode,
			csrf_test_name: csrf_test_name
		};

		$http.post(ENV.api + '/app/db/yonghu/update', objtops($scope.yonghu)).success(function (data) {
			if (data > 0) {
				Storage.set('t_currentContact', $scope.contact);
				$state.transitionTo('tab.trainOrder');
			};
		});

	};
})
.controller('ContactsTrainAddCtrl',
	function ($scope, $rootScope, ENV, publicService, MsgBox, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$scope.contact = {
		id: '',
		xingming: '',
		shoujihaoma: '',
		isNew: '',
		bx_invoice_address: '',
		bx_invoice_receiver: '',
		bx_invoice_phone: '',
		bx_invoice_zipcode: ''

	};
	$scope.oldcontact = {
		id: '',
		xingming: '',
		shoujihaoma: '',
		isNew: '',
		bx_invoice_address: '',
		bx_invoice_receiver: '',
		bx_invoice_phone: '',
		bx_invoice_zipcode: ''
	};
	$scope.a = {
		code: ''
	};
	$scope.back = function () {
		$state.transitionTo('tab.trainOrder');
	};

	//发送短信
	$scope.postduanxin = function () {

		var name = $scope.contact.xingming;
		var tel = $scope.contact.shoujihaoma;

		if (name == '') {
			MsgBox.promptBox('姓名不能为空');
		} else {
			$scope.oldcontact.xingming = name;
		};
		if (tel.length > 0) {
			var reg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/i;
			var result = reg.test(tel);
			if (result) {
				$scope.oldcontact.shoujihaoma = tel;
			} else {
				MsgBox.promptBox('请输入有效电话号码');
				return;
			};
		} else {
			MsgBox.promptBox('电话号码不能为空');
			return;
		};

		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		$scope.duanxin = {
			name: $scope.oldcontact.xingming,
			tel: $scope.oldcontact.shoujihaoma,
			sf: sf,
			csrf_test_name: csrf_test_name
		};
		$http.post(ENV.api + '/app/db/yonghu/duanxin', objtops($scope.duanxin)).success(function (data) {

			if (data == 'false') {
				MsgBox.promptBox("验证码发送出错，请重新发送", 3000);
			} else {
				MsgBox.promptBox("获取验证码成功", 2000);
				showTime();
			};
		});

	};

	//保存联系人
	$scope.saveContact = function () {

		if ($scope.a.code == '') {
			MsgBox.promptBox('请输入验证码');
			return;
		};

		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		$scope.yanzheng = {
			code: $scope.a.code,
			sf: sf,
			csrf_test_name: csrf_test_name
		};
		// 短信验证
		$http.post(ENV.api + '/app/db/yonghu/yanzheng', objtops($scope.yanzheng)).success(function (data) {
			if (data == 'false') {
				MsgBox.promptBox('验证码错误;请重新输入');
				return;
			};

			var yonghu = JSON.stringify($scope.contact);
			$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
			var csrf_test_name = getCsrf();
			$scope.yonghu = {
				yonghu: yonghu,
				sf: sf,
				csrf_test_name: csrf_test_name
			};

			// 三方注册，存在返回信息
			$http.post(ENV.api + '/app/db/yonghu/sanfangzhuce', objtops($scope.yonghu)).success(function (data) {
				if (data != 'false') {
					$scope.currentContact = data;
					Storage.set('t_currentContact', $scope.currentContact);
					// 获取乘客信息与邮递地址信息

					var yonghuid = data.id;
					Storage.set('UserId', yonghuid);
					$scope.yonghuid = {
						yonghuid: yonghuid,
						sf: sf,
						csrf_test_name: csrf_test_name
					};
					// 查询乘客
					$http.post(ENV.api + '/app/db/passenger/trainSelect', objtops($scope.yonghuid)).success(function (data1) {
						if (data1 != 'false') {
							Storage.set('t_userContacts', data1);
						} else {};
					});

					// 查询邮递地址
					$http.post(ENV.api + '/app/db/address/trainSelect', objtops($scope.yonghuid)).success(function (data2) {

						if (data2 != 'false') {
							Storage.set('t_addressList', data2);
						} else {};

					});

					$state.transitionTo('tab.trainOrder');
				};

			});
		});

	};

})
.controller('AddressTrainInfoCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	//是否显示出生日期

	$scope.myStyle = {

		displayAddress: {

			"display": "none"

		}

	};
	$scope.$on("$ionicView.enter", function () {
		$scope.mail = Storage.get('t_mail');
		$scope.insurance = Storage.get('t_insurance');
		$scope.myStyle.displayAddress.display = publicService.isNull($scope.mail.bx_invoice_receiver) ? "none" : "block";
		var addressList = Storage.get('t_addressList');
		if (addressList != null) {
			$scope.addressList = addressList;
		} else {
			$scope.addressList = '';
		};
	});

	//选择或取消邮寄地址

	$scope.checkedMail = function (p) {

		$scope.mail.isMail = p; //因获取input的value值为字符串，则添加上此句
		Storage.set('t_mail', $scope.mail);

		if ($scope.mail.isMail) {

			//如果原来没有选择过，则打开收件地址选择页

			if (publicService.isNull($scope.mail.bx_invoice_receiver)) {
				$state.transitionTo('tab.addressTrain');
				return;

			} else {

				$scope.myStyle.displayAddress.display = "block";

			};

		} else {

			$scope.myStyle.displayAddress.display = "none";

		}

	};
	//更新收件地址

	$scope.changeAddress = function (p) {

		if (p) {

			$state.transitionTo('tab.addressTrain');

		};

	};

	//报销证明选择确认

	$scope.selConfirmAddress = function (p) {

		if (p) {

			$scope.insurance.isMail = $scope.mail.isMail;

		} else {

			$scope.mail.isMail = $scope.insurance.isMail;

		};

		// //如果不需要邮寄，则还原已选信息

		if (!$scope.insurance.isMail) {

			$scope.mail = {

				isMail: false,

				bx_invoice_receiver: "",

				bx_invoice_phone: "",

				bx_invoice_address: "",
				bx_invoice_zipcode: ""

			};

			angular.forEach($scope.addressList, function (item) {

				item.chk = false;

			});

		};

		Storage.set('t_insurance', $scope.insurance);
		Storage.set('t_mail', $scope.mail);
		Storage.set('t_addressList', $scope.addressList);

		$state.transitionTo('tab.trainOrder');

		//是否显示已选信息

		// $scope.myStyle.displayAddress.display = $scope.mail.isMail ? "block" : "none";

	};

})
.controller('AddressTrainCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	//收件地址编辑界面显示时的事件
	$scope.displayAddress = function (isEdit, p) {
		if (isEdit) {
			var p = JSON.stringify(p);
		} else {
			var p = '';
		};

		$state.transitionTo('tab.addressTrainEdit', {
			isEdit: isEdit,
			p: p
		});
	};

	$scope.$on("$ionicView.enter", function () {
		$scope.mail = Storage.get('t_mail');
		var addressList = Storage.get('t_addressList');
		if (addressList != null) {
			$scope.addressList = addressList;
		};
	});

	//选择收件地址事件

	$scope.selectedAddress = function (p, chk) {

		if (chk) {

			$scope.mail.bx_invoice_receiver = p.bx_invoice_receiver;

			$scope.mail.bx_invoice_phone = p.bx_invoice_phone;

			$scope.mail.bx_invoice_address = p.bx_invoice_address;

			$scope.mail.bx_invoice_zipcode = p.bx_invoice_zipcode;

		} else {

			$scope.mail.isMail = !(publicService.isNull($scope.mail.bx_invoice_receiver));
		};
		Storage.set('t_addressList', $scope.addressList);
		Storage.set('t_mail', $scope.mail);
		$state.transitionTo('tab.addressTrainInfo');

	};
})
.controller('AddressTrainEditCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, MsgBox, publicService, $filter, Storage, $location, MsgBox, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});
	//乘客输入框对象{姓名输入框，证件类型选择框、证件号码输入、去支付按钮}

	$scope.disable = {

		name: false,

		identityType: false,

		identityNo: false,

		btnPost: false,

		isEdit: false

	};
	$scope.addressOld = {
		bx_invoice_receiver: '',
		bx_invoice_phone: '',
		bx_invoice_address: ''

	};

	var yonghuid = Storage.get('UserId');

	$scope.$on("$ionicView.enter", function () {
		var addressList = Storage.get('t_addressList');
		if (addressList != null) {
			$scope.addressList = addressList;
		};

		var isEdit = $stateParams['isEdit'];
		$scope.disable.isEdit = isEdit;

		if (isEdit == 'true') {
			$scope.title = '编辑';
			var p = JSON.parse($stateParams['p']);
			$scope.address = {
				id: p.id,
				yonghuid: p.yonghuid,
				bx_invoice_receiver: p.bx_invoice_receiver,
				bx_invoice_phone: p.bx_invoice_phone,
				bx_invoice_address: p.bx_invoice_address,
				bx_invoice_zipcode: p.bx_invoice_zipcode,
				isNew: p.isNew

			};

			$scope.addressOld = {
				bx_invoice_receiver: p.bx_invoice_receiver,
				bx_invoice_phone: p.bx_invoice_phone,
				bx_invoice_address: p.bx_invoice_address

			};

		} else {
			$scope.title = '新增';

			$scope.address = {
				id: "0",
				yonghuid: yonghuid,
				bx_invoice_receiver: "",
				bx_invoice_phone: "",
				bx_invoice_address: "",
				isNew: false

			};
		};

	});
	//保存收件地址{新增：True；修改：False}

	$scope.saveAddress = function (isNew) {

		if ($scope.address.bx_invoice_receiver == '') {
			MsgBox.promptBox("姓名不能为空", 3000);
			return;
		};
		if ($scope.address.bx_invoice_phone == '') {
			MsgBox.promptBox("手机号码不能为空", 3000);
			return;
		}
		if ($scope.address.bx_invoice_phone.length != 11) {
			MsgBox.promptBox("请输入有效的手机号码！", 3000);
			return;
		};
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
		if (!myreg.test($scope.address.bx_invoice_phone)) {
			MsgBox.promptBox("请输入有效的手机号码！", 3000);
			return false;
		};
		if ($scope.address.bx_invoice_address == '') {
			MsgBox.promptBox("地址不能为空", 3000);
			return;
		};
		if ($scope.address.bx_invoice_zipcode == '') {
			$scope.address.bx_invoice_zipcode = 000000;
				return;
		} else if ($scope.address.bx_invoice_zipcode.length != 6) {
			MsgBox.promptBox("请输入有效的邮政编码！", 3000);
			return;
		};

		//如果信息没有改变，则不向后台提交（直接返回列表页）

		if (!isNew && $scope.addressOld.bx_invoice_receiver == $scope.address.bx_invoice_receiver && $scope.addressOld.bx_invoice_phone == $scope.address.bx_invoice_phone && $scope.addressOld.bx_invoice_address == $scope.address.bx_invoice_address) {

			$state.transitionTo('tab.addressTrain');
			return;

		};

		//循环判断信息是否已存在

		var loop = true;

		var isSave = true;

		var judgResult = true; //判断结果


		angular.forEach($scope.addressList, function (item) {

			if (loop) {

				if (isNew) {

					//添加
					judgResult = (item['bx_invoice_receiver'] == $scope.address.bx_invoice_receiver && item['bx_invoice_phone'] == $scope.address.bx_invoice_phone && item['bx_invoice_address'] == $scope.address.bx_invoice_address);

				} else {
					//编辑

					judgResult = (item['bx_invoice_receiver'] == $scope.address.bx_invoice_receiver && item['bx_invoice_phone'] == $scope.address.bx_invoice_phone && item['id'] != $scope.address.id);

				};

				if (judgResult) {

					MsgBox.promptBox("该地址已存在，请重新添加");
					isSave = false;

					loop = false;

				};

			};

		});

		//如果判断通过，则提交到后台处理

		if (isSave) {

			if (true) {
				var address = JSON.stringify($scope.address);

				$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
				var csrf_test_name = getCsrf();
				$scope.address = {
					address: address,
					sf: sf,
					csrf_test_name: csrf_test_name
				};
				$http.post(ENV.api + '/app/db/address/trainAdd', objtops($scope.address)).success(function (data) {

					if (data > 0) {
						$scope.yonghuid = {
							yonghuid: yonghuid,
							sf: sf,
							csrf_test_name: csrf_test_name
						};

						$http.post(ENV.api + '/app/db/address/trainSelect', objtops($scope.yonghuid)).success(function (data) {
							if (data != 'fasle') {
								$scope.addressList = data;
								Storage.set('t_addressList', $scope.addressList);
								$state.transitionTo('tab.addressTrain');
							} else {
								MsgBox.promptBox('获取数据失败');
								return;

							};
						});
					} else {
						MsgBox.promptBox('添加地址失败，请重试');
						return;
					};

				});
			};
		};
	};

})
.controller('InsuranceTrainCtrl',
	function ($scope, $rootScope, ENV, $ionicPlatform, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	$ionicPlatform.ready(function () {
		ionic.Platform.fullScreen();
	});

	// 获取保险信息

	$scope.$on("$ionicView.enter", function () {
		$scope.insuranceList = Storage.get('insuranceListTrain');
		$scope.insurance = Storage.get('t_insurance');

	});

	//保险选择事件

	$scope.selectedInsurance = function (p) {

		angular.forEach($scope.insuranceList, function (item) {

			item.chk = (item.id == p.id);

		});

	};
	//保险选择确定事件

	$scope.selConfirmInsurance = function (confirm) {

		angular.forEach($scope.insuranceList, function (item) {

			if (confirm) {

				if (item.chk) {

					$scope.insurance = {

						id: item.id,

						price: item.price,

						title: item.title.replace("套餐", "")

					};
					Storage.set('t_insurance', $scope.insurance);
					Storage.set('insuranceListTrain', $scope.insuranceList);

				};

			} else {

				item.chk = (item.id == $scope.insurance.id);

			};

		});
		$state.transitionTo('tab.trainOrder');

	};
});
