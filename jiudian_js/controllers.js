angular.module('hotel.controllers', ['starter.services'])

        .controller('Index_TabCtrl', function($scope,$state) {
            
        })		
		
.controller('bibiCtrl', function ($scope, $state, $ionicLoading) {

	//选择城市
	$scope.gotoJiudian = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tab.hotelhome'); //tab.hotelhome
	};
	$scope.gotoAir = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tab.home');
	};
	$scope.gotoTrain = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tab.train');
	};
	$scope.gotouser = function() {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
        $state.transitionTo('tab.user');
    };
	
	$scope.goto_bibiyoushi = function() {
        $state.transitionTo('bibiyoushi');
    };
    $scope.goto_dingpiaozhinan = function() {
        $state.transitionTo('dingpiaozhinan');
    };
    $scope.goto_hezuohuoban = function() {
        $state.transitionTo('hezuohuoban');
    };
	
	
})
.controller('hotelhomeCtrl', function ($scope, $state, $ionicModal, $ionicScrollDelegate,$timeout, Storage, publicService, $filter, MsgBox, $ionicPopover, $ionicLoading) {
	
	
	$scope.gotoBibi = function () {
		$state.transitionTo('bibi');
	};
	$scope.gotoAir = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tab.home');
	};
	$scope.gotoTrain = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tab.train');
	};
	
	//点击成人 儿童位数，滚动条滚动到指定位置
    $scope.scrollTo = function() {
        $ionicScrollDelegate.scrollTo(0, 300, true);
    };
	
	$scope.cityName = "深圳";
	$scope.cityCode = "shenzhen";
	
	//搜索条件
	$scope.searchBox = {
        name: ""
    };
    $scope.jiudian_search = {
        cityName: '',
        cityCode: '',
        starSelect: '',
        priceSelect: ''
    };
	//入住离店日期
	$scope.jiudian_Date = {
		ruzhuDate: "",
		lidianDate: ""
	};
	//默认是国内
	$scope.guoneiwai = 'guonei';
	$scope.adultNumber = {
		number: 1
	};
	$scope.childrenNumber = {
		number: 0
	};
	//出发日期，返回日期
	$scope.ruzhuDate = publicService.dayadd(new Date(), 1);
	$scope.ruzhuWeek = publicService.getweek($scope.ruzhuDate);
    $scope.lidianDate = publicService.dayadd($scope.ruzhuDate, 3);
    $scope.lidianWeek = publicService.getweek($scope.lidianDate);
	
	$scope.$on("$ionicView.beforeEnter", function () {
		$ionicLoading.hide();
		//判断酒店列表页传过来的输入框搜索条件，是否与首页的一致
        if ($scope.searchBox.name != Storage.get("searchBox")) {
            $scope.searchBox.name = Storage.get("searchBox");
        }
		//星级选择
		$scope.star_arr = [{
				name: "经济连锁",
				code: 1,
				chk: true
			}, {
				name: "二星/其他",
				code: 5,
				chk: true
			}, {
				name: "三星/舒适",
				code: 2,
				chk: true
			}, {
				name: "四星/高档",
				code: 3,
				chk: true
			}, {
				name: "五星/豪华",
				code: 4,
				chk: true
			}
		];
		//价格区间筛选
		$scope.price_arr = [{
				name: "￥0~200",
				price: '0~200'
			}, {
				name: "￥200~400",
				price: '200~400'
			}, {
				name: "￥400~600",
				price: '400~600'
			}, {
				name: "￥600以上",
				price: '600~不限'
			}
		];
        //价格区间筛选
        // $scope.priceRange = {
            // value: 100
        // };
	});
	
	// 再次加载
	$scope.$on('$ionicView.enter', function () {
		//城市信息
		var cityName = Storage.get('cityName');
		var cityCode = Storage.get('cityCode');
		if (cityName != null && cityName != $scope.cityName) {
            $scope.cityName = cityName;
            $scope.cityCode = cityCode;
            //城市不同时，置搜索框为空
            $scope.searchBox.name = "";
            Storage.set("searchBox","");
        }
		// 显示修改后的日期
		if (myDate.ruzhu != "") {
			$scope.ruzhuDate = new Date(myDate.ruzhu);
			$scope.ruzhuWeek = publicService.getweek($scope.ruzhuDate);
		}

		if (myDate.lidian != "") {
			$scope.lidianDate = new Date(myDate.lidian);
			$scope.lidianWeek = publicService.getweek($scope.lidianDate);
		}
		if ($scope.ruzhuDate >= $scope.lidianDate) {
			$scope.lidianDate = publicService.dayadd($scope.ruzhuDate, 1);
			$scope.lidianWeek = publicService.getweek($scope.lidianDate);
		}
		//计算天数
		$scope.dayNumber = parseInt(publicService.CalcDayDiff($scope.ruzhuDate, $scope.lidianDate));
	});
	//判断是国内还是国外（默认是国内）
	$scope.guonei = function (p) {
		if (p === true) {
			$scope.guoneiwai = 'guonei';
		} else if (p === false) {
			$scope.guoneiwai = 'haiwai';
		}
	};
	//选择城市
	$scope.placeAction = function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('jiudian_place');
	};
	// 选择日期
	$scope.showDatePage = function (ps) {
		//判断是从哪个页面进入日期页
		Storage.set('hotel_gotoDate', '酒店查询页');
		var my_left = $filter("date")($scope.ruzhuDate, "yyyy-MM-dd");
		var my_right = $filter("date")($scope.lidianDate, "yyyy-MM-dd");
		myDate.ruzhu = my_left;
		myDate.lidian = my_right;
		if (!publicService.isNull(myDate.ruzhu) && !publicService.isNull(myDate.lidian)) {
			$ionicLoading.show({
				template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
			});
			$state.transitionTo('jiudian_date');
		}
	};

	$ionicPopover.fromTemplateUrl('my-popover3.html', {
		scope: $scope
	}).then(function (popover) {
		$scope.popover3 = popover;
	});
	$scope.openPopover3 = function ($event) {
		$scope.scrollTo();
        $timeout(function() {
            $scope.popover3.show($event);
        }, 300);
	};
	$scope.num = function (num) {
		$scope.popover3.hide();
		//$("#crs").text(num);
		$scope.adultNumber.number = num;
	};
	// 清除浮动框
	$scope.$on('$destroy', function () {
		$scope.popover3.remove();
	});

	$ionicPopover.fromTemplateUrl('my-popover2.html', {
		scope: $scope
	}).then(function (popover) {
		$scope.popover2 = popover;
	});
	$scope.openPopover2 = function ($event) {
		$scope.scrollTo();
        $timeout(function() {
            $scope.popover2.show($event);
        }, 300);
	};
	$scope.num2 = function (num) {
		$scope.popover2.hide();
		//$("#ets").text(num);
		$scope.childrenNumber.number = num;
	};
	// 清除浮动框
	$scope.$on('$destroy', function () {
		$scope.popover2.remove();
	});
	// 在隐藏浮动框后执行
	$scope.$on('popover.hidden', function () {
		// 执行代码
	});
	// 移除浮动框后执行
	$scope.$on('popover.removed', function () {
		// 执行代码
	});
	
	//搜索查询
	$scope.search = function () {
		
		var dt1 = new Date($scope.ruzhuDate);
		var dt2 = new Date($scope.lidianDate);
		if (dt1 > dt2) {
			MsgBox.promptBox("出发日期不能大于返程日期");
			return;
		}
		$scope.jiudian_search.cityName = $scope.cityName;
		$scope.jiudian_search.cityCode = $scope.cityCode;
		$scope.jiudian_Date.ruzhuDate = $scope.ruzhuDate;
        $scope.jiudian_Date.lidianDate = $scope.lidianDate;
		//星级筛选
		//$scope.jiudian_search.star_arr = $scope.star_arr;
		//用于在酒店列表中，判断星级是否选择不限
		//$scope.jiudian_search.chkAll_star = $scope.chkAll_star;
		//用于判断国内外
		$scope.jiudian_search.guoneiwai = $scope.guoneiwai;
		if ($scope.guoneiwai === 'haiwai') {
			$scope.jiudian_search.guoneiwai = $scope.guoneiwai;
			$scope.jiudian_search.adultNumber = $scope.adultNumber.number;
			$scope.jiudian_search.childrenNumber = $scope.childrenNumber.number;
		} else {
			$scope.jiudian_search.adultNumber = '';
			$scope.jiudian_search.childrenNumber = '';
		}
		//保存搜索条件
        if($scope.jiudian_search.starSelect == null){
            $scope.jiudian_search.starSelect = "";
        }
		Storage.set("jiudian_search", $scope.jiudian_search);
		//搜索框搜索条件
        Storage.set("searchBox", $scope.searchBox.name);
		//入住离店日期
		Storage.set("jiudian_Date", $scope.jiudian_Date);
		//用于判断从哪个页面，进入酒店列表页，便于星级筛选
		Storage.set("page", "酒店查询页");
		$ionicLoading.show({
            template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
		$state.transitionTo('hotels');
	};
})
//城市选择
.controller('JiuDian_PlaceCtrl',
        function($scope, ENV, Storage, $location, $stateParams, $http, $ionicScrollDelegate, $state, $ionicLoading, MsgBox) {
            // 搜索城市
            $scope.searchBox = {
                content: ""
            };
            var cityName = '';
            var cityCode = '';

            $scope.$on("$ionicView.beforeEnter", function() {
                $ionicLoading.hide();
                $scope.content = '';

                $scope.searchList = '';
                var history = Storage.get('historyplace');
                if (history != null) {
                    $scope.history = history;
                } else {
                    $scope.history = '';
                }
            });
			$ionicLoading.show({
				template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
			});
			// 加载城市信息
			$http.get(ENV.api + '/app/jiudian/home/jiudian_city').success(function(data) {
				if (data != 'false') {
					$scope.users = data;
					var users = $scope.users;
					$scope.alphabet = iterateAlphabet();
					var tmp = {};
					for (i = 0; i < users.length; i++) {
						var letter = users[i].cityCode.toUpperCase().charAt(0);
						if (tmp[letter] == undefined) {
							tmp[letter] = [];
						}
						tmp[letter].push(users[i]);
					}
					$scope.sorted_users = tmp;
					$ionicLoading.hide();
				} else {
					$ionicLoading.hide();
					MsgBox.promptBox("加载城市列表失败,请重新查询", 1500);
				}
			}).error(function(error) {
				$ionicLoading.hide();
				failCallback(error);
			});
			$http.get(ENV.imgUrl + "jiudian_data/jiudian_hot.json").success(function(data) {
				$scope.remenplace = data;
			});
			// $location.hash('index_A');
			$ionicScrollDelegate.anchorScroll('index_A');
            


            //Click letter event
            $scope.gotoList = function(id) {
                $location.hash(id);
                $ionicScrollDelegate.anchorScroll(true);
            };
            //Create alphabet object
            function iterateAlphabet() {
                var str = "ABCDEFGHJKLMNOPQRSTWXYZ";
                var numbers = new Array();
                for (var i = 0; i < str.length; i++) {
                    var nextChar = str.charAt(i);
                    numbers.push(nextChar);
                }
                return numbers;
            }
            ;
            $scope.groups = new Array();
            for (var i = 0; i < 10; i++) {
                $scope.groups[i] = {
                    name: i,
                    items: []
                };
                for (var j = 0; j < 3; j++) {
                    $scope.groups[i].items.push(i + '-' + j);
                }
            }
            $scope.toggleGroup = function(group) {
                if ($scope.isGroupShown(group)) {
                    $scope.shownGroup = null;
                } else {
                    $scope.shownGroup = group;
                }
            };
            $scope.isGroupShown = function(group) {
                return $scope.shownGroup === group;
            };
            $scope.content = '';
            $scope.keyup = function($event) {

                var searchList = new Array();
                var content = $scope.content;
                var users = $scope.users;
                if (content) {
                    for (i = 0; i < users.length; i++) {
                        var name = users[i];
                        if (name.cityName.match(content)) {
                            searchList.push(name);
                        }
                    }
                    $scope.searchList = '';
                    $scope.searchList = searchList;
                } else {
                    $scope.searchList = '';
                }
            };
            //点击‘返回’，返回首页
            $scope.back = function() {
                $state.transitionTo('tab.hotelhome');
            };
            $scope.showHomePage = function(p) {
                var history = new Array();
                var historyplace = Storage.get('historyplace');
                if (historyplace == null || historyplace == '') {
                    historyplace = history;
                    historyplace.push(p);
                } else {
                    var cunzai = 0;
                    var len = historyplace.length;
                    for (var i = len - 1; i >= 0; i--) {

                        if (historyplace[i].cityName == p.cityName) {
                            cunzai = 1;
                        }
                    }
                    if (!cunzai) {
                        if (len == 1 || len == 0) {
                            historyplace.push(p);
                        } else {
                            historyplace.shift();
                            historyplace.push(p);
                        }
                    }
                }
                Storage.set('historyplace', historyplace);
                cityName = p.cityName;
                cityCode = p.cityCode;
                Storage.set('cityName', cityName);
                Storage.set('cityCode', cityCode);
                $state.transitionTo('tab.hotelhome');
            };
        })

.controller('jiudian_dateCtrl',
	function ($scope, $filter, Storage, $stateParams, $state, MsgBox, $ionicLoading,$timeout) {
	
	$scope.$on("$ionicView.beforeEnter", function () {
		$ionicLoading.hide();
	});
	$scope.title = '入住离店日期';
	// 返回
	$scope.back = function () {
		//返回时初始化状态
        jiudian_dateType = '入住';
		
		var hotel_gotoDate = Storage.get('hotel_gotoDate');
		if (hotel_gotoDate === '酒店查询页') {
			$ionicLoading.show({
		        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
	        });
			$state.transitionTo('tab.hotelhome');
		} else if (hotel_gotoDate === '酒店列表') {
			$ionicLoading.show({
		        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
	        });
			$state.transitionTo('hotels');
		} else if (hotel_gotoDate === '酒店详情') {
			$ionicLoading.show({
		        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
	        });
			$state.transitionTo('hotelDetail');
		}
	};
	// 获取日期
	$scope.dateLists = time;
	$scope.$on('$ionicView.enter', function () {
		MsgBox.promptBox("请选择入住日期", 1000);
	});

	// 返回搜索页
	var ruzhuDate = "";
	$scope.showHomePage = function(p, $event) {
        var hotel_gotoDate = Storage.get('hotel_gotoDate');
        if (jiudian_dateType === '入住') {
            //入住日期
			console.log(1);
            ruzhuDate = p.solar;
            MsgBox.promptBox("请选择离店日期", 1000);
            //改变状态
            jiudian_dateType = '离店';
            //移除入住、离店类名
            $('.hotel_dateBox').find("li[class*='ruzhu']").removeClass('ruzhu');
            $('.hotel_dateBox').find("li[class*='lidian']").removeClass('lidian');
            //去掉文本内容
            $(".hotel_dateBox").find(".ruzhuOrlidian").text("");
            //移除入住、离店日期之间的样式
            $('.hotel_dateBox').find("li[class*='date_between']").removeClass('date_between');
            //在对应元素上添加 ruzhu 类名，并添加“入住”文本
            $($event.target).parent().parent().parent().addClass('ruzhu');
            $(".ruzhu").find(".ruzhuOrlidian").text("入住");

        } else if (jiudian_dateType === '离店') {
			myDate.ruzhu = ruzhuDate;
            //判断是否小于等于入住时间
            if (myDate.ruzhu >= p.solar) {
				ruzhuDate = p.solar;
            MsgBox.promptBox("请选择离店日期", 1000);
            //改变状态
            jiudian_dateType = '离店';
            //移除入住、离店类名
            $('.hotel_dateBox').find("li[class*='ruzhu']").removeClass('ruzhu');
            $('.hotel_dateBox').find("li[class*='lidian']").removeClass('lidian');
            //去掉文本内容
            $(".hotel_dateBox").find(".ruzhuOrlidian").text("");
            //移除入住、离店日期之间的样式
            $('.hotel_dateBox').find("li[class*='date_between']").removeClass('date_between');
            //在对应元素上添加 ruzhu 类名，并添加“入住”文本
            $($event.target).parent().parent().parent().addClass('ruzhu');
            $(".ruzhu").find(".ruzhuOrlidian").text("入住");
                //MsgBox.promptBox("请选择正确的离店日期", 1000);
                return;
            }
            //离店日期
            myDate.lidian = p.solar;
            //改变状态
            jiudian_dateType = '入住';
            //在对应元素上添加 lidian 类名，并添加“离店”文本
            $($event.target).parent().parent().parent().addClass('lidian');
            $(".lidian").find(".ruzhuOrlidian").text("离店");
            //在入住、离店日期之间添加样式
            $('.ruzhu').nextUntil('.lidian', '.true').addClass('date_between');
            $('.lidian').prevUntil('.ruzhu', '.true').addClass('date_between');
            var dom_dateList = $('.lidian').parents('.dateList');
            for (var i = 0; ; i++) {
                if (dom_dateList.find('.true').hasClass("ruzhu")) {
                    break;
                } else {
                    dom_dateList = dom_dateList.prev();
                    if (dom_dateList.find('.true').hasClass("ruzhu")) {
                        break;
                    } else {
                        dom_dateList.find('.true').addClass('date_between');
                    }
                }
            }
            //跳转到相应的页面
            $timeout(function() {
                if (hotel_gotoDate === '酒店查询页') {
                    $state.transitionTo('tab.hotelhome');
                } else if (hotel_gotoDate === '酒店列表') {
                    $state.transitionTo('hotels');
                } else if (hotel_gotoDate === '酒店详情') {
                    $state.transitionTo('hotelDetail');
                }
				Storage.set('hotel_gotoDate', '酒店日期');
            }, 400);
        }
	};
})

.controller('HotelsCtrl', function ($scope, $state, Storage, $ionicLoading, $ionicPopover, $http, ENV, MsgBox, $timeout, $compile, $interval, $filter, publicService,$ionicScrollDelegate) {

	$scope.back = function () {
		$state.transitionTo('tab.hotelhome');
	};
	//星级选择
	$scope.star_arr2 = [{
			name: "经济连锁",
			code: 1,
			chk: false
		}, {
			name: "二星/其他",
			code: 5,
			chk: false
		}, {
			name: "三星/舒适",
			code: 2,
			chk: false
		}, {
			name: "四星/高档",
			code: 3,
			chk: false
		}, {
			name: "五星/豪华",
			code: 4,
			chk: false
		}
	];

	//入住离店日期
	$scope.jiudian_Date = {
		ruzhuDate: "",
		lidianDate: ""
	};
	var jiudian_Date = Storage.get("jiudian_Date");
	$scope.ruzhuDate = jiudian_Date.ruzhuDate;
	$scope.lidianDate = jiudian_Date.lidianDate;
	
	//价格、评价排序初始化（升序true/降序false）
	$scope.sortBy = 'hotelPrice';
	$scope.sortDesc = false;
	
	// 视图即将进入并成为活动视图
	$scope.$on('$ionicView.beforeEnter', function () {
		$ionicLoading.hide();
		$ionicScrollDelegate.scrollTop(true);
        $scope.price = '低价优先';
        $scope.star = '星级';
        $scope.xzq = '行政区';
		
		//隐藏搜索条件
        $(".hotelFloat").hide();
        $("#hotel_bg").hide();

        // 搜索页搜索条件
        var jiudian_search = Storage.get("jiudian_search");
        console.log(jiudian_search);
        $scope.cityName = jiudian_search.cityName;
        $scope.cityCode = jiudian_search.cityCode;
        //输入框赋值
        $scope.searchBox = Storage.get("searchBox");
        //星级搜索条件
        $scope.starSelect = jiudian_search.starSelect;
        //价格区间搜索条件
        $scope.priceSelect = jiudian_search.priceSelect;
        console.log($scope.priceSelect);
        
        //初始化行政区筛选条件
        $scope.districtOb = '';
		//微信定位
		$scope.position_name = position_name;
	});

	// 已经全面进入，现在是活动视图
    $scope.$on('$ionicView.enter', function() {
        //星级选中初始化
        $scope.chkStar2(true, $scope.star_arr2);//true：不限
        $scope.hotelfilter(true);
        var $this = $(".starBox .noLimit input[type='checkbox']");
        $this.parent().addClass("on");
        $this.attr("disabled", "disabled");
        $('.starBox .starChild').find('label').removeClass("on");
        $('.starBox .starChild').find("input[type='checkbox']").prop("checked", false);
        
        // 显示修改后的日期
        if (myDate.ruzhu != "") {
            $scope.ruzhuDate = new Date(myDate.ruzhu);
        }
        if (myDate.lidian != "") {
            $scope.lidianDate = new Date(myDate.lidian);
        }
        if ($scope.ruzhuDate >= $scope.lidianDate) {
            $scope.lidianDate = publicService.dayadd($scope.ruzhuDate, 1);
        }
        //如果查不同条件，需重新请求 $scope.gethotelList();
        var hotelList = Storage.get("hotelList");
        var searchBox = '';
        if ($scope.searchBox != "" && $scope.searchBox != null) {
            searchBox = $scope.searchBox;
        }
        var starSelect = "";
        if ($scope.starSelect != "" && $scope.starSelect != null) {
            starSelect = $scope.starSelect;
        }
        var priceSelect = "";
        if ($scope.priceSelect != "" && $scope.priceSelect != null) {
            priceSelect = $scope.priceSelect;
        }
        if (hotelList == null || hotelList[0].cityCode != $scope.cityCode 
                || hotelList[0].ruzhuDate != $filter("date")($scope.ruzhuDate, "yyyy-MM-dd") 
                || hotelList[0].searchBox != searchBox 
                || hotelList[0].starSelect != starSelect 
                || hotelList[0].priceSelect != priceSelect) {
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            //初始化请求数据条数和偏移量
            //$scope.maxNumbel = 8;
            $scope.offset = 0;
            //酒店列表初始化
            $scope.hotels = '';
            $scope.newhotels = '';
            //上拉加载隐藏条件：ng-if="!noMore"
            $scope.noMore = false;
            $scope.gethotelList();
        }else{
            $scope.hotels = hotelList[0].jiudianxiangqings;
            $scope.districts = hotelList[0].districts;
            $scope.newhotels = $filter("hotel_filter")($scope.hotels);
        }
    });
    // 读取酒店列表数据
    var isLock = false;
    var paixuleixing = "";
    $scope.gethotelList = function(p) {
        //islock：锁，防止在网络慢的时候多次请求。
        if (isLock) {
            return;
        }
        isLock = true;
        if($scope.sortBy != "" && $scope.sortBy != null){
            paixuleixing = $scope.sortBy;
        }
        console.log(p);
        if (p == "上拉加载") {
            $scope.sortBy = "";
        } else {
            $scope.sortBy = paixuleixing;
        }
        //搜索页筛选条件
        var searchBox = '';
        //jiudianming不为空时进入另一个方法
        //var qingqiufangfa = "hotelList";
        if ($scope.searchBox != "" && $scope.searchBox != null) {
            searchBox = $scope.searchBox;
            //qingqiufangfa = "hotelQuery";
        }
        var starSelect = "";
        if ($scope.starSelect != "" && $scope.starSelect != null) {
            starSelect = $scope.starSelect;
        }
        var priceSelect = "";
        if ($scope.priceSelect != "" && $scope.priceSelect != null) {
            priceSelect = $scope.priceSelect;
        }
        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
        var csrf_test_name = getCsrf();
        var myobject = {
			cityName: $scope.cityName,
            cityCode: $scope.cityCode,
			position_name: $scope.position_name,
            //maxNumbel: $scope.maxNumbel,
            offset: $scope.offset,
            ruzhuDate: $filter("date")($scope.ruzhuDate, "yyyy-MM-dd"),
            searchBox: searchBox,
            starSelect: starSelect,
            priceSelect: priceSelect,
            csrf_test_name: csrf_test_name
        };
        $http.post(ENV.api + '/app/jiudian/jiudian_query/hotelSearch' , objtops(myobject)).success(function(data) {
            
            if (data !== 'false') {

                //判断是上拉触发的，还是查询条件改变触发的
                var hotelList = Storage.get("hotelList");
                if (hotelList == null || hotelList[0].cityCode !== myobject.cityCode 
                || hotelList[0].ruzhuDate !== myobject.ruzhuDate 
                || hotelList[0].searchBox !== myobject.searchBox 
                || hotelList[0].starSelect !== myobject.starSelect 
                || hotelList[0].priceSelect !== myobject.priceSelect) {
                    //酒店
                    $scope.hotels = data.jiudianxiangqings;
                    //行政区
                    $scope.districts = data.districts;
                    if ($scope.hotels == null || $scope.hotels == "") {
						//禁用上拉加载功能
                        $scope.noMore = true;
                        $ionicLoading.hide();
                        MsgBox.promptBox("查询结果为空，请确认查询城市！", 2000);
                        $timeout(function() {
                            $state.transitionTo('tab.hotelhome');
                        }, 2000);
                        return;
                    }
                } else {
                    //在没有数据加载的时候，禁止触发加载更多
                    if (data.jiudianxiangqings.length == 0) {
                        //禁用上拉加载功能
                        $scope.noMore = true;
                        $ionicLoading.hide();
                        return;
                    }
                    $scope.hotels = $scope.hotels.concat(data.jiudianxiangqings);
                    //合并 行政区 数组
                    var districts = data.districts;
                    for (var i = 0; i < $scope.districts.length; i++) {
                        for (var j = 0; j < districts.length; j++) {
                            if ($scope.districts[i]['district'] === districts[j]['district']) {
                                districts.splice(j, 1);
                            }
                        }
                    }
                    for (var i = 0; i < districts.length; i++) {
                        $scope.districts.push(districts[i]);
                    }
                }
                //酒店列表
                $scope.newhotels = $filter("hotel_filter")($scope.hotels);
                //酒店列表保存在本地
                var hotelList_arr = new Array();
                var hotelList = new hotelList_node(myobject.cityCode,myobject.ruzhuDate,myobject.searchBox,myobject.starSelect,myobject.priceSelect, $scope.hotels, $scope.districts);
                hotelList_arr.push(hotelList);
                Storage.set("hotelList", hotelList_arr);
				//触发筛选功能
                $scope.hotelfilter(true);
				//偏移量
				$scope.offset = data.offset;
                //$scope.offset += 8;
                $ionicLoading.hide();
            } else {
                $ionicLoading.hide();
                MsgBox.promptBox("查询结果为空，请确认查询城市！", 2000);
                $timeout(function() {
                    $state.transitionTo('tab.hotelhome');
                }, 2000);
            }
        }).error(function() {
            $ionicLoading.hide();
            MsgBox.promptBox("查询失败，请重新查询！", 2000);
            $timeout(function() {
                $state.transitionTo('tab.hotelhome');
            }, 2000);
        }). finally(function(error) {
            $scope.searchName = searchBox;
            isLock = false;
            $scope.$broadcast('scroll.infiniteScrollComplete');
            $scope.$broadcast('scroll.refreshComplete');
        });
    };
	//顶部搜索按钮
    $scope.search = function() {
        //搜索页筛选条件
        if ($scope.searchBox == "" || $scope.searchBox == null) {
            MsgBox.promptBox("商圈/地标/景点等关键词！", 1500);
            return;
        }
		//判断首页传过来输入框搜索条件，是否与酒店列表页的一致
        if ($scope.searchBox != Storage.get("searchBox")) {
            Storage.set("searchBox",$scope.searchBox);
        }
		//初始化请求数据条数和偏移量
        //$scope.maxNumbel = 8;
        $scope.offset = 0;
		
        $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
        $scope.gethotelList();
    };
	// 选择日期
	$scope.showDatePage = function (ps) {
		Storage.set('hotel_gotoDate', '酒店列表');
		var my_left = $filter("date")($scope.ruzhuDate, "yyyy-MM-dd");
		var my_right = $filter("date")($scope.lidianDate, "yyyy-MM-dd");
		myDate.ruzhu = my_left;
		myDate.lidian = my_right;
		if (!publicService.isNull(myDate.ruzhu) && !publicService.isNull(myDate.lidian)) {
			$ionicLoading.show({
				template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
			});
			$state.transitionTo('jiudian_date');
		}
	};

	//价格、评价排序
    $scope.chkPrice = function(value) {
        if (value === '低价优先') {
            $scope.sortBy = 'hotelPrice';
            $scope.sortDesc = false;
        } else if (value === '高价优先') {
            $scope.sortBy = 'hotelPrice';
            $scope.sortDesc = true;
        } else if (value === '好评优先') {
            $scope.sortBy = 'commentScore';
            $scope.sortDesc = true;
        }
        $scope.price = value;
		$ionicScrollDelegate.scrollTop(true);
    };

    //筛选条件 － 星级（多选）
    $scope.starArr2 = new Array();
    $scope.chkAll_star2 = true;
    //不限：true
    $scope.chkStar2 = function(chkAll, star_arr) {
        if (chkAll) {
            $scope.chkAll_star2 = true;
            $scope.starArr2 = new Array();
            angular.forEach(star_arr, function(item) {
                item['chk'] = false;
            });
        } else {
            angular.forEach(star_arr, function(item) {
                //判断数组存不存在，不存在且选中，则加入数组；如果星级没选中，则从数组删除。
                var idx = $scope.starArr2.indexOf(item['code']);
                if (item['chk']) {
                    if (idx < 0) {
                        $scope.starArr2.push(item['code']);
                    }
                } else {
                    //如果星级没选中，则从数组删除
                    if (idx >= 0) {
                        $scope.starArr2.splice(idx, 1); //删除从 idx 处开始的 1 个元素
                    }
                }
            });
        }
    };
    //筛选条件 － 行政区
    $scope.chkDistrict = function(chkAll, content) {
		$ionicScrollDelegate.scrollTop(true);
		console.log(1111);
        if (chkAll) {
            $scope.districtOb = '';
            //调用确定函数
            $scope.hotelfilter(true);
        } else {
            $scope.districtOb = content;
            //调用确定函数
            $scope.hotelfilter(true);
        }
    };
    //筛选航班列表{确定、取消事件}
    $scope.filter = Array();
    $scope.starfilter = new Array();
    //确定：true
    $scope.hotelfilter = function(confirm) {
		
        if (confirm) {
            //星级筛选
            var arr = new Array();
            arr = arr.concat($scope.starArr2);
            $scope.starfilter = arr;
        } else {
            angular.forEach($scope.star_arr2, function(item) {
                var key = item['code'];
                item['chk'] = ($scope.starfilter.indexOf(key) >= 0);
            });
        }

        $scope.filter = {
            priceSelect: $scope.priceSelect,
            star: $scope.starfilter,
            district: $scope.districtOb
        };
        $scope.newhotels = $filter("hotel_filter")($scope.hotels, $scope.filter);
    };
	$scope.qiangding = function (hotel) {
		//更新入住离店日期
		$scope.jiudian_Date.ruzhuDate = $scope.ruzhuDate;
        $scope.jiudian_Date.lidianDate = $scope.lidianDate;
		//入住离店日期
		Storage.set("jiudian_Date", $scope.jiudian_Date);
		//保存已选择的信息到缓存
		console.log(hotel);
		Storage.set("selected_hotel", hotel);
		
		//保存浏览历史
		var today = new Date();
		if (Storage.get('brows_history')) {
			$scope.liulan = Storage.get('brows_history');
			var num = 0
			for (i = 0; i < $scope.liulan.length; i++) {
				if ($scope.liulan[i].date == today.toLocaleDateString()) {
					for (var j = 0; j < $scope.liulan[i].hotel_detail.length; j++) {
						if (hotel.name == $scope.liulan[i].hotel_detail[j].name) {
							$scope.liulan[i].hotel_detail.splice(j, 1);
						}
					}
					$scope.liulan[i].hotel_detail.unshift(hotel);
					num += 1;
				}
			}
			if (num == 0) {
				var obj = new Object();
				obj.date = today.toLocaleDateString();
				obj.hotel_detail = new Array();
				obj.hotel_detail.push(hotel);
				$scope.liulan.unshift(obj);

			}
			Storage.set('brows_history', $scope.liulan);
		} else {
			var obj = new Object();
			$scope.liulan = new Array();
			obj.date = today.toLocaleDateString();
			obj.hotel_detail = new Array();
			obj.hotel_detail.push(hotel);
			$scope.liulan.push(obj);
			Storage.set('brows_history', $scope.liulan);
		}
		$scope.liulan = Storage.get('brows_history');
		console.log($scope.liulan);		
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('hotelDetail', {flag: hotel});
	};
})

//酒店详情
.controller('HotelDetailCtrl', function ($scope, $stateParams, $ionicScrollDelegate, $timeout, $compile, $state, Storage, $filter, $interval, $ionicLoading, $http, ENV, MsgBox, publicService, $ionicSlideBoxDelegate) {

	$scope.back = function () {
		$scope.flag = $stateParams['flag'];
		Storage.set("page", "酒店详情页");
		
		if($scope.flag == 'shoucang'){
            $state.transitionTo('wdsc', {city: '全部城市',citycode:'all'});
        }else if($scope.flag == 'history'){
            $state.transitionTo('history');
        }else{
			$ionicLoading.show({
				template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
			});			
            $state.transitionTo('hotels');
        }
	};
	
	//跳转到图片展示
    $scope.tupian_show = function() {
		Storage.set('hotelDetailImages', $scope.images);
        $state.transitionTo('showimg');
    };
	
	//收藏
	$scope.Collection = function() {
		if (Storage.get("UserId")) {
			if(Storage.get('cityName')){
				$scope.cityName = Storage.get('cityName');
			}else{
				$scope.cityName = '深圳'
			}
			if(Storage.get('cityCode')){
				$scope.cityCode = Storage.get('cityCode');
			}else{
				$scope.cityCode = 'shenzhen'
			}
			$scope.hotel = Storage.get('selected_hotel');
			$scope.id = Storage.get('UserId');
			$scope.hotel.cityname = $scope.cityName;
			$scope.hotel.city = $scope.cityCode;
			if (Storage.get('shoucang')) {
				var arr = Storage.get('shoucang');
				var num = 0;
				for (i = 0; i < arr.length; i++) {
					if (arr[i].User_id == $scope.id) {
						for (var j = 0; j < arr[i].shoucang.length; j++) {
							if ($scope.hotel.name == arr[i].shoucang[j].name) {

								$scope.shoucang_show = true;
								$scope.shoucang_show2 = false;
								arr[i].shoucang.splice(j, 1);
								num += 1;
							}
						}
						if(num < 1){
						   $scope.shoucang_show = false;
						   $scope.shoucang_show2 = true;
						   arr[i].shoucang.unshift($scope.hotel);         
						}
					}
				}
			   Storage.set('shoucang', arr);   
			} else {
				var obj = new Object();
				var arr = new Array();
				obj.User_id = $scope.id;
				obj.shoucang = new Array();
				obj.shoucang.push($scope.hotel);
				arr.push(obj)
				Storage.set('shoucang', arr);
				$scope.shoucang_show2 = true;
				$scope.shoucang_show = false;
				console.log('ok');
			}                     
		} else {
			MsgBox.promptBox("请登录账号！", 1500);
				Storage.set('loginBack', 'hotelDetail');
				$timeout(function() {
					$state.transitionTo('login');
				}, 1500);
				return;                                     
		}
	};	
	
	
	var jiudian_Date = Storage.get("jiudian_Date");
	$scope.ruzhuDate = jiudian_Date.ruzhuDate;
	$scope.lidianDate = jiudian_Date.lidianDate;
	// 视图即将进入并成为活动视图
	$scope.$on('$ionicView.beforeEnter', function () {
		$ionicLoading.hide();
		$scope.shoucang_show = true;
		$scope.shoucang_show2 = false;
		if (Storage.get('shoucang')) {
			$scope.id = Storage.get('UserId');
			var sc = Storage.get('shoucang');
			$scope.hotel = Storage.get('selected_hotel');
			
			for (i = 0; i < sc.length; i++) {
				if (sc[i].User_id == $scope.id) {
					for (var j = 0; j < sc[i].shoucang.length; j++) {
						if ($scope.hotel.name == sc[i].shoucang[j].name) {
							
							$scope.shoucang_show = false;
							$scope.shoucang_show2 = true;
						}
					}
				}
			}
		}	
		//更新轮播图
		$ionicSlideBoxDelegate.update();
		//显示房型条数
		$scope.showNumber = 6;
		//选择的酒店
		$scope.jiudian_selected = {
			ruzhuDate: 0,
			lidianDate: 0,
			hotelId: "",
			roomTypeId: "",
			ratePlanId: "",
			salePrice: "",
			jianyejiage: "",
			productType: "",
			hotelname: ""
		}
		var selected_hotel = Storage.get("selected_hotel");
		$scope.selected_hotel = selected_hotel;
	});
	// 已经全面进入，现在是活动视图
	$scope.$on('$ionicView.enter', function () {
		var hotelDetail = Storage.get("hotelDetail");
		
        //判断酒店id是否相同，是则不用再次加载
		var hotelDetail = Storage.get("hotelDetail");
        if (hotelDetail != null) {
			if (hotelDetail[0].hotelId == $scope.selected_hotel.hotelId) {
				$scope.rooms = hotelDetail[0].rooms;
				$scope.images = hotelDetail[0].images;
			} else {
				$scope.getHotelDetailList();
			}
		} else {
			$scope.getHotelDetailList();
		}
		$scope.lookAll_display = {
			display: "block"
		};
		// 显示修改后的日期
		if (myDate.ruzhu != "") {
			$scope.ruzhuDate = new Date(myDate.ruzhu);
		}

		if (myDate.lidian != "") {
			$scope.lidianDate = new Date(myDate.lidian);
		}
		if ($scope.ruzhuDate >= $scope.lidianDate) {
			$scope.lidianDate = publicService.dayadd($scope.ruzhuDate, 1);
		}
		//计算天数
		$scope.dayNumber = parseInt(publicService.CalcDayDiff($scope.ruzhuDate, $scope.lidianDate));
		//判断是否从酒店日期页返回，是则重新加载
        if(Storage.get('hotel_gotoDate') == "酒店日期"){
            $scope.getHotelDetailList();
            Storage.set('hotel_gotoDate', '酒店详情');
        }
	});
	// 读取酒店列表数据
	$scope.getHotelDetailList = function () {

		$scope.hotelDetail = '';
		// 刚刚进入的时候显示 Loading
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var myobject = {
			hotelId: $scope.selected_hotel.hotelId,
			ruzhuDate: $filter("date")($scope.ruzhuDate, "yyyy-MM-dd"),
            lidianDate: $filter("date")($scope.lidianDate, "yyyy-MM-dd"),
			csrf_test_name: csrf_test_name
		};
		console.log(myobject.hotelId); // 571820642
		$http.post(ENV.api + '/app/jiudian/jiudian_query/hotelDetailList', objtops(myobject)).success(function (data) {
			if (data !== 'false' && data !== '空') {
				console.log('--------------------');
				console.log(data);
				console.log('--------------------');

				//保存酒店详情数据到本地
                var hotelDetail_arr = new Array();
                var hotelDatail_data = data;
                var images = "";
                if(!(publicService.isNull(hotelDatail_data.images))){
                    images = hotelDatail_data.images;
                }
                var hotelDetail = new hotelDetail_node($scope.selected_hotel.hotelId, hotelDatail_data.rooms,images);
                hotelDetail_arr.push(hotelDetail);
                Storage.set("hotelDetail", hotelDetail_arr);
                
                $scope.rooms = data.rooms;
                $scope.images = images;
				//点击“查看全部”时，赋值给 showNumber
				$scope.roomNumber = $scope.rooms.length;
				console.log($scope.rooms);
				$ionicLoading.hide();
			} else if (data === '空') {
				$ionicLoading.hide();
				MsgBox.promptBox("没有找到该酒店房间", 2000);
				$timeout(function() {
                    $state.transitionTo('hotels');
                }, 2000);
			} else {
				$ionicLoading.hide();
				MsgBox.promptBox("查询出错，请重新选择酒店！", 2000);
				$timeout(function () {
					$state.transitionTo('hotels');
				}, 2000);
			}
		}).error(function () {
			$ionicLoading.hide();
			MsgBox.promptBox("查询失败，请重新选择酒店！", 2000);
			$timeout(function () {
				$state.transitionTo('hotels');
			}, 2000);
		});
	};
	// 选择日期
	$scope.showDatePage = function (ps) {
		Storage.set('hotel_gotoDate', '酒店详情');
		var my_left = $filter("date")($scope.ruzhuDate, "yyyy-MM-dd");
		var my_right = $filter("date")($scope.lidianDate, "yyyy-MM-dd");
		myDate.ruzhu = my_left;
		myDate.lidian = my_right;
		if (!publicService.isNull(myDate.ruzhu) && !publicService.isNull(myDate.lidian)) {
			$ionicLoading.show({
				template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
			});
			$state.transitionTo('jiudian_date');
		}
	};
	//定时重新加载
	$scope.countdown = function () {
		$scope.minute = 10;
		$scope.second = 0;
		$scope.reload = false;
		var timePromise = $interval(function () {
				$scope.second--;
				if ($scope.second <= 0) {
					if ($scope.minute > 0) {
						$scope.second = 59;
						$scope.minute--;
					} else {
						$interval.cancel(timePromise);
						$scope.reload = true;
					}
				}
			}, 1000, 0);
	};
	//查看全部
	$scope.lookAll = function () {
		$scope.showNumber = $scope.roomNumber;
		$scope.lookAll_display = {
			display: "none"
		};
		$timeout(function () {
			//告诉滚动视图重新计算它的容器大小
			$ionicScrollDelegate.resize();
		}, 410);
	};
	//跳转到订单页面
	$scope.gotoOrder = function (room, chanpinxinxi) {

		if (sf == '') {
			//如果没有登录，则跳转到登录页面
			var UserId = Storage.get("UserId");
			console.log(UserId);
			if (typeof(UserId) == 'undefined' || UserId == '' || UserId == null || UserId <= 0) {
				MsgBox.promptBox("请登录账号！", 1500);
				Storage.set('loginBack', 'hotelDetail');
				$timeout(function () {
					$state.transitionTo('login');
				}, 1500);
				return;
			}
		} else {
			var UserId = userid;
		}
		$scope.jiudian_selected = {
			ruzhuDate: 0,
			lidianDate: 0,
			hotelId: "",
			roomTypeId: "",
			ratePlanId: "",
			salePrice: "",
			jianyejiage: "",
			productType: "",
			hotelname: "",
			daynum: "",
			roomtype: "",
			productName:""
		};
		$scope.jiudian_selected.ruzhuDate = $filter("date")($scope.ruzhuDate, "yyyy-MM-dd");
		$scope.jiudian_selected.lidianDate = $filter("date")($scope.lidianDate, "yyyy-MM-dd");
		$scope.jiudian_selected.hotelId = $scope.selected_hotel.hotelId;
		$scope.jiudian_selected.address = $scope.selected_hotel.address;
		$scope.jiudian_selected.roomTypeId = room.roomTypeId;
		$scope.jiudian_selected.ratePlanId = chanpinxinxi.ratePlanId;
		$scope.jiudian_selected.salePrice = chanpinxinxi.hotelPrice;
		$scope.jiudian_selected.jianyejiage = chanpinxinxi.jianyejiage;
		
        $scope.jiudian_selected.productType = chanpinxinxi.productType;
        $scope.jiudian_selected.hotelname = $scope.selected_hotel.name;
		$scope.jiudian_selected.daynum = $scope.dayNumber;
		$scope.jiudian_selected.roomtype = chanpinxinxi.productRoomName;
		$scope.jiudian_selected.productName = chanpinxinxi.productName;
		Storage.set("jiudian_selected", $scope.jiudian_selected);
		console.log($scope.jiudian_selected);
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$state.transitionTo('tjdd');
	};
})
//超级特价
        .controller('ChatsCtrl', function($scope,$state) {
            $scope.backtoHotelhomes = function() {
                $state.transitionTo('tab.hotelhome');
            };
        })
.controller('ChatDetailCtrl', function ($scope, $stateParams, Chats) {
	$scope.chat = Chats.get($stateParams.chatId);
})

.controller('AccountCtrl', function ($scope, $state, Storage, $http, ENV, MsgBox, $timeout, $ionicLoading) {
	$scope.gotoddxq = function(p){
               $scope.jiudian = {
                    orderId: "",
					arrivalDate: "",
					departureDate: ""					
                };
               $scope.jiudian.orderId = p.orderId;
               $scope.jiudian.arrivalDate = p.arrivalDate;
               $scope.jiudian.departureDate = p.departureDate;			   
               Storage.set("jiudian_order", $scope.jiudian);
               $state.transitionTo('ddxq');
        };
	$scope.backto = function () {
		$state.transitionTo('tab.hotelhome');
	};
   $scope.gotozxf = function(p){
			   
               $scope.jiudian = {
                    orderId: "",
					arrivalDate: "",
					departureDate: ""
                };
               $scope.jiudian.orderId = p.orderId;
               $scope.jiudian.arrivalDate = p.arrivalDate;
               $scope.jiudian.departureDate = p.departureDate;			   
               Storage.set("jiudian_order", $scope.jiudian);
               $state.transitionTo('zxf');
        };
		$scope.gotoHotelDetail = function(p){
			$scope.selected_hotel.name = p.hotelname;
			$scope.selected_hotel.address = p.address;
			$scope.selected_hotel.hotelId = p.hotelId;
		    Storage.set("selected_hotel",$scope.selected_hotel);
			console.log(Storage.get("selected_hotel"));
		    $state.transitionTo('hotelDetail');
        };
		
		$scope.selected_hotel = {
			name: "",
			address: ""
		};
	$scope.$on('$ionicView.beforeEnter', function () {
		$scope.chk = false;
		$scope.myobj = {
			"color": "#cacbcd"
		};
	});
	//有效订单
    $scope.youxiaodingdan = function(){
        //打勾时
        if($scope.chk == true){
            console.log($scope.chk);
            $scope.yincang = {
            "display": "none"
                };
        }else{
            console.log($scope.chk);
               $scope.yincang = {
                 "display": "block"
                };
            }
        }
	$scope.gotoqxdd = function (p) {

		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var myobject = {
			orderId: p.orderId,
			csrf_test_name: csrf_test_name
		};
		$http.post(ENV.api + '/app/jiudian/orderstatus/statusquery', objtops(myobject)).success(function (data) {
			if (data !== 'false') {
				console.log(data);
				$scope.jiudian = {
					orderId: ""
				};
				$scope.jiudian.orderId = p.orderId;
				Storage.set("jiudian", $scope.jiudian);
				$state.transitionTo('qxdd');
			} else {
				//$ionicLoading.hide();
				alert('订单不能被取消');
			}
		}).error(function (error) {
			// $ionicLoading.hide();
			MsgBox.promptBox("创建订单失败，请重新创建！", 2000);
			$timeout(function () {
				$state.transitionTo('tab.hotelhome');
			}, 2000);
		});
		//$state.transitionTo('qxdd');
		//$ionicLoading.hide();
	};
	//console.log(myobject.orderId);
	$scope.$on('$ionicView.enter', function () {

		var UserId = '';
		if (sf == '') {
			//如果没有登录，则跳转到登录页面
			var UserId = Storage.get("UserId");
			if (typeof(UserId) == 'undefined' || UserId == '' || UserId == null || UserId <= 0) {
				MsgBox.promptBox("请登录账号！", 1500);
				Storage.set('loginBack', 'account');
				$timeout(function () {
					$state.transitionTo('login');
				}, 1500);
				return;
			}
		} else {
			var UserId = userid;
		}

		console.log(UserId);
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var myobject = {
			userId: UserId,
			csrf_test_name: csrf_test_name
		};

		console.log(myobject.userId);
		$http.post(ENV.api + '/app/jiudian/orderstatus/myorder', objtops(myobject)).success(function (data) {
			console.log(data);
			$scope.orders = data;

			//console.log($scope.orders);
			$ionicLoading.hide();
		});

	});
})
.controller('FriendsCtrl', function ($scope, Friends) {
	$scope.friends = Friends.all();
})
.controller('FriendDetailCtrl', function ($scope, $stateParams, Friends) {
	$scope.friend = Friends.get($stateParams.friendId);
})
.controller('ZfCtrl', function ($scope) {})
.controller('JiuDian_TabCtrl', function($scope, $rootScope, $state,$ionicModal, $timeout) {
            $rootScope.$on('$ionicView.beforeEnter', function() {
                var statename = $state.current.name;
                //tabs中存在的主页面不需要隐藏，hidetabs=false
                if (statename === 'tab.hotelhome' || statename === 'jiudian_tab.chats' || statename === 'jiudian_tab.friends') {
                    $rootScope.hideTabs = false;
                } else {
                    $rootScope.hideTabs = true;
                }
            });
            var screenheight = $(window).height();
            $scope.guanjia = false;
            $scope.show_guanjia = function(){
                $('#backgr').css("bottom", 0);
                $("#backgr").css("height", screenheight);
                $(".xialakuang").css("display", 'none');
                $scope.guanjia = true; 
            };
            $scope.close_guanjia = function(){
                $scope.guanjia = false;
                $timeout(function() {
                   $(".xialakuang").css("display", 'block');
                }, 100);
            }
	  
	  $scope.createContact = function(u) {        
	    $scope.contacts.push({ name: u.firstName + ' ' + u.lastName });
	    $scope.modal.hide();
	  };
         $scope.goto_wdsc = function(city,citycode) {   
            $scope.guanjia = false;
			$state.transitionTo('wdsc', {city: '全部城市',citycode:'all'});
	    
	  };
         $scope.goto_history = function() {   
            $scope.guanjia = false;
	    $state.transitionTo('history');
	  };    
		$scope.goto_changjianwenti = function() {   
            $scope.guanjia = false;
	    $state.transitionTo('changjianwenti');
	  };        
        })
//提交订单
    .controller('TjddCtrl', function($scope, $state, Storage, $http, ENV, MsgBox, $ionicLoading, $timeout, $ionicPopup, $timeout) {

    $scope.fanhui = false;
    $scope.goto = function() {
        $scope.fanhui = true;
    };
    $scope.quxiao = function(){
        $scope.fanhui = false;
    };
    $scope.queding = function(){
        //默认保存1间房，和第一个入住人
         $scope.room = {
            num: 1
        };
        Storage.set('room_num', $scope.room);
        var arr = new Array();
        if (Storage.get('入住人')) {
            $scope.str = Storage.get('入住人');
            $scope.mylist = JSON.parse($scope.str);
        } else {
            $scope.mylist = new Array();
        }

        if ($scope.mylist == '' || $scope.mylist == null || $scope.mylist == undefined) {
            arr[0] = {
                name: '',
                chk: false
            }
        } else {
            arr[0] = {
                name: $scope.mylist[0].name,
                chk: false
            }
        } 
        //存入本地     
        Storage.set('zhuhu', arr);                        
        $state.transitionTo('hotelDetail');
        Storage.remove('hotel_mail');
        $scope.fanhui = false;
    }


    $scope.gotoTaitou = function() {
        $state.transitionTo('hotel_fapiaotaitou');
    };
	//邮寄信息
	$scope.hotel_mail = {
		index: '',
		isMail: false,
		displayprice: 20,
		shoujianrenmingzi: "",
		shoujihao: "",
		dizhi: "",
		lastDepTime: ""
	};

    $scope.$on('$ionicView.beforeEnter', function() {
        $ionicLoading.hide();
        console.log(1);
        console.log($scope.hotel_mail.displayprice);
        //是否显示邮递地址
        $scope.myStyle = {
            selectAddress: {
                "display": "none"
            },
            displayAddress: {
                "display": "none"
            }
        };
        $scope.mail_display = {
            "display": "none"
        };
        //发票抬头
        $scope.taitou = {
            isTaitou: false,
            type: "",
            name: "",
            shuihao: ""
        };
        //获取发票抬头
        var hotel_taitou = Storage.get("hotel_taitou");
        if (hotel_taitou != null) {
            $scope.taitou.isTaitou = hotel_taitou.isTaitou;
            $scope.taitou.type = hotel_taitou.type;
            $scope.taitou.name = hotel_taitou.name;
            $scope.taitou.shuihao = hotel_taitou.shuihao;
        }

        var jiudian_selected = Storage.get('jiudian_selected');
        $scope.hotelname = jiudian_selected.hotelname;
        $scope.ruzhuriqi = jiudian_selected.ruzhuDate;
        $scope.lidianriqi = jiudian_selected.lidianDate;
        $scope.roomname = jiudian_selected.roomtype;
        $scope.daynum = jiudian_selected.daynum;
        $scope.saleprice = jiudian_selected.salePrice;
		$scope.productType = jiudian_selected.productType;
		$scope.zhudianriqis = jiudian_selected.jianyejiage;
		var sum = 0;
		for(var i=0;i<$scope.zhudianriqis.length ;i++){
			if($scope.productType == "比比特惠"){
				sum += $scope.zhudianriqis[i].tehuiPrice;
			}else{
				sum += $scope.zhudianriqis[i].zunxiangPrice;
			}
		}
		$scope.total = sum;
		if(jiudian_selected.productName == ""){
            $scope.breakfast = "无早"
        }else{
        $scope.breakfast = jiudian_selected.productName;
        }
		//费用明细时间
/*         var arr = new Array();
        for(var i=0; i<$scope.daynum ;i++){
         var newstr = $scope.ruzhuriqi.replace(/-/g,'/'); 
         var date =  new Date(newstr); 
         var time_str = date.getTime()+ i*86400*1000;
         arr[i] = new Date(parseInt(time_str)).toLocaleString().substr(0,9);      
        }    
       $scope.zhudianriqis = arr; */
	   
        if (Storage.get('room_num') == null) {
            //设置默认房间数为1
            $scope.room = {
                num: 1
            };
            Storage.set('room_num', $scope.room);
            $scope.fangjianshu = Storage.get('room_num');
        } else {
            $scope.fangjianshu = Storage.get('room_num');
            //console.log($scope.fangjianshu);          
        }
        if (Storage.get('zhuhu') == null) {
            //默认给一个空对象
            var arr = new Array();
            arr[0] = new Object();
            $scope.shuzu = arr;
            //存入本地
            Storage.set('zhuhu', $scope.shuzu);
            $scope.zhuhu = Storage.get('zhuhu');
            console.log($scope.zhuhu);
        } else {
            $scope.zhuhu = Storage.get('zhuhu');
            console.log($scope.zhuhu);
        }

    });
    // 再次加载
    $scope.$on('$ionicView.enter', function() {
        $scope.zhuhu = Storage.get('zhuhu');
        //$scope.totalprice = $scope.daynum * $scope.saleprice * $scope.fangjianshu.num;
        $scope.totalprice = $scope.total * $scope.fangjianshu.num;
        // 邮递
        var hotel_mail = Storage.get('hotel_mail');

        if (hotel_mail != null) {
            $scope.hotel_mail = hotel_mail;


            if ($scope.hotel_mail.isMail) {
                $scope.mail_display.display = "block";
            } else {
                $scope.mail_display.display = "none";
            }
        } else {
            $scope.hotel_mail = {
                index: '',
                isMail: false,
                displayprice: 20,
                totalprice: 0,
                shoujianrenmingzi: "",
                shoujihao: "",
                dizhi: "",
                lastDepTime: ""
            };
            $scope.mail_display.display = "none";

        }
        Storage.set('hotel_mail', $scope.hotel_mail);
        $scope.expressfee = $scope.hotel_mail.isMail ? $scope.hotel_mail.displayprice : 0;
        $scope.fangjianfei = $scope.total * $scope.fangjianshu.num;
        $scope.totalprice = $scope.total * $scope.fangjianshu.num + $scope.expressfee;
    });
	//视图加载完成
    $scope.$on('$ionicView.afterEnter', function() {
        //设置房间数边框
        var biankuang = ".a" + $scope.fangjianshu.num;
        $(".aa").css('border', 'none');
        $(biankuang).css('border', '1px solid #49d3dd');
    });
    //点击房间数
    $scope.fjs = function(num1, num2) {
        $('.aa').css('border', 'none');
        $(num1).css('border', '1px solid #49d3dd');
        $scope.room = {
            num: num2
        };
        Storage.set('room_num', $scope.room);
        $scope.fangjianshu = Storage.get('room_num');
		$scope.expressfee = $scope.hotel_mail.isMail ? $scope.hotel_mail.displayprice : 0;
        $scope.totalprice = $scope.total * $scope.fangjianshu.num + $scope.expressfee;
		$scope.fangjianfei = $scope.total * $scope.fangjianshu.num;
        
        //当$scope.zhuhu数组 不为空时
        if ($scope.zhuhu != '' || $scope.zhuhu != null || $scope.zhuhu != undefined) {
            //比较房间数和$scope.zhuhu的大小
            if (num2 > $scope.zhuhu.length) {
                //差值
                var bijiao = num2 - $scope.zhuhu.length;
                var kong = new Object();
                for (i = 0; i < bijiao; i++) {
                    //插入空对象
                    $scope.zhuhu.push(kong);
                }
            } else {
                var bijiao = $scope.zhuhu.length - num2;
                for (i = 0; i < bijiao; i++) {
                    //删除数组最后一个元素
                    $scope.zhuhu.pop();
                }
            }
            Storage.set('zhuhu', $scope.zhuhu);
            $scope.zhuhu = Storage.get('zhuhu');
        }
        //当$scope.zhuhu数组 为空时
        else {
            //创建一个空数组，遍历插入空对象，
            var arr = new Array();
            for (i = 0; i < num2; i++) {
                arr[i] = new Object();
            }
            $scope.zhuhu = arr;
            //存入本地
            Storage.set('zhuhu', $scope.zhuhu);
            $scope.zhuhu = Storage.get('zhuhu');
        }
		$scope.isShow = false;
    };

    $scope.isShow = false;
    $scope.showorhide = function() {
        $scope.isShow = !$scope.isShow;
    };
	
    // 到选择入住人界面
    $scope.gotoxzrzr = function() {
        $scope.fangjianshu = Storage.get('room_num');
        var arr3 = Storage.get('zhuhu');
        var num = $scope.fangjianshu.num;
        var list = new Array();
        reg2 = /^([a-zA-Z\u4e00-\u9fa5]){0,16}$/;
        //获取输入框的值，存入数组list
        for (var j = 1; j <= $scope.fangjianshu.num; j++) {
            var text_1 = '#text' + j;
            if (!reg2.test($(text_1).val())) {
                var alertPopup = $ionicPopup.alert({
					title: '提示!',
					template: '入住人数超过房间数，请重新选择',
					okText: '确定',
					okType: 'anniuyanse'
				});
				return;
                return false;
            }
            if ($(text_1).val()) {
                list.push($(text_1).val());
            }
        }
        //将自定义输入的入住人存到本地
        if (Storage.get('入住人') != '' && Storage.get('入住人') != null && Storage.get('入住人') != undefined) {

            $scope.str = Storage.get('入住人');
            $scope.mylist = JSON.parse($scope.str);
            for (var k = 0; k < list.length; k++) {
                var zidingyi = 0;
                for (var m = 0; m < $scope.mylist.length; m++) {
                    if (list[k] == $scope.mylist[m].name) {
                        $scope.mylist[m].chk = true;
                        zidingyi++;
                    }
                }
                //将自定义输入的入住人 存到本地
                if (zidingyi == 0) {
                    var P2 = new Person();
                    P2.name = list[k];
                    P2.chk = true;
                    if ($scope.mylist != '' && $scope.mylist != null && $scope.mylist != undefined) {
                        var arr2 = $scope.mylist;
                    } else {
                        var arr2 = new Array();
                    }
                    arr2.push(P2);
                    var str2 = JSON.stringify(arr2);
                    //存入本地        
                    Storage.set('入住人', str2);
                }
            }
            var str = JSON.stringify($scope.mylist);
            Storage.set('入住人', str);
        }
        else {
            $scope.mylist = new Array();
            console.log(list);
            for (i = 0; i < list.length; i++) {
                if (list[i] != '' && list[i] != null && list[i] != undefined) {
                    var P2 = new Person();
                    P2.name = list[i];
                    P2.chk = true;
                    $scope.mylist.push(P2);
                    var str2 = JSON.stringify($scope.mylist);
                    //存入本地        
                    Storage.set('入住人', str2);
                }
            }
        }

        //将输入框的name赋值给zhuhu
        for (i = 0; i < $scope.zhuhu.length; i++) {
            if ($scope.zhuhu[i].name != '' && $scope.zhuhu[i].name != null && $scope.zhuhu[i].name != undefined) {
                $scope.zhuhu[i].name = list.shift();
            }
        }
        Storage.set('zhuhu', $scope.zhuhu);
        $state.transitionTo('xzrzr', {num: num});
    };



    //早餐明细
    $scope.zaocan = false;
    $scope.zcmx = function() {
		
        $scope.zaocan = !$scope.zaocan;
        var screenheight = $(window).height();        
        $('#zaocan').css("max-height", screenheight-100-44-42); 
			
	    $scope.gundong = {
            "max-height": screenheight-100-43-44-45
        };
    };
    $scope.kongbaichu_guanbi = function() {
        $scope.zaocan = false;
    };
    //选择或取消邮寄地址
    $scope.chooseMail = function() {
        if($scope.hotel_mail.isMail){
           $scope.cancel(false); 
        }else{
            $state.transitionTo('hotel_address');
			//获取房间数
			$scope.fangjianshu = Storage.get('room_num');
			reg = /^([a-zA-Z\u4e00-\u9fa5]){0,16}$/;
			var rzr = new Array();
			//循环
			for (var j = 1; j <= $scope.fangjianshu.num; j++) {           
				var text_1 = '#text' + j;
				if(reg.test($(text_1).val()) && $(text_1).val() !='' && $(text_1).val() != null && $(text_1).val() != undefined){
					var obj = new Object();
					obj.name = $(text_1).val();
					obj.chk = true;
				}else{
					var obj = new Object();
					obj.name = '';
					obj.chk = false; 
				}
				rzr.push(obj);
			}
			console.log(rzr);
			Storage.set('zhuhu', rzr); 
        }
    };
    $scope.cancel = function(isMail) {
        Storage.remove('hotel_taitou');
        $scope.taitou.isTaitou = false;
        $scope.taitou.name = '';
        $scope.hotel_mail.isMail = isMail;
        $scope.mail_display.display = "none";
        // 更改邮递费用
        if (!isMail) {
            $scope.totalprice = $scope.totalprice - $scope.hotel_mail.displayprice;
            Storage.set('costdetail', $scope.costdetail);
        }
        Storage.set('hotel_mail', $scope.hotel_mail);
    };
    // 更改邮件地址，新增地址跳到地址列表页
    $scope.address = function() {
        Storage.set('hotel_mail', $scope.hotel_mail);
        $state.transitionTo('hotel_address');
    };

    $scope.orderinfo = {
        mobile: ""
    };
    $scope.jiudian_order = {
        orderId: ""
    };
    $scope.creatdd = function() {
        var phone = $("#phone").val();
        reg = /^1[34578]\d{9}$/;
        reg2 = /[^ ]([a-zA-Z\u4e00-\u9fa5\/\s]){0,16}$/;

        for (var i = 1; i <= $scope.fangjianshu.num; i++) {
            var text = '#text' + i;
             if ($(text).val() == '' || $(text).val() == null) {
    
			  MsgBox.promptBox("入住人不能为空", 2000);
 
                return false;
                break;
            }
            if (!reg2.test($(text).val())) {

               MsgBox.promptBox("请输入16位一下的中文或英文，不能输入特殊字符", 2000);
                return false;
                break;
            }
        }
        if (phone == '' || phone == null) {

			 MsgBox.promptBox("手机号码不能为空", 2000);
            return false;
        }
        if (!reg.test(phone)) {

			  MsgBox.promptBox("请输入正确的手机号码", 2000);
            return false;
        }
		if( $scope.hotel_mail.isMail == true && $scope.taitou.name == ""){

			 MsgBox.promptBox("请填写发票抬头", 2000);
             return false; 
        }
        var list = new Array();
        for (var j = 1; j <= $scope.fangjianshu.num; j++) {
            var text_1 = '#text' + j;
            if ($(text_1).val()) {
                list.push($(text_1).val());
            }
        }

        $ionicLoading.show({
            template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
        var UserId = Storage.get("UserId");
        console.log(UserId);
        console.log($scope.taitou);
        console.log($scope.hotel_mail);
        var jiudian_selected = Storage.get('jiudian_selected');
        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
        var room_num = Storage.get('room_num');
        var csrf_test_name = getCsrf();
        var myobject = {
            ruzhuDate: jiudian_selected.ruzhuDate,
            lidianDate: jiudian_selected.lidianDate,
			hotelname: jiudian_selected.hotelname,
            hotelId: jiudian_selected.hotelId,
			address:jiudian_selected.address,
			roomtype: jiudian_selected.roomtype,
            roomTypeId: jiudian_selected.roomTypeId,
            ratePlanId: jiudian_selected.ratePlanId,
            salePrice: jiudian_selected.salePrice,
            numberOfRooms: room_num.num,
            numberofContact: JSON.stringify(list),
            mobile: $scope.orderinfo.mobile,
            totalPrice: $scope.totalprice,
            userId: UserId,
            shoujianrenmingzi: $scope.hotel_mail.shoujianrenmingzi,
            shoujianrenshouji: $scope.hotel_mail.shoujihao,
            shoujiandizhi: $scope.hotel_mail.dizhi,
            isMail: $scope.hotel_mail.isMail,
            isTaitou: $scope.taitou.isTaitou,
            taitouleixing: $scope.taitou.type,
            taitoumingcheng: $scope.taitou.name,
            shuihao: $scope.taitou.shuihao,
            csrf_test_name: csrf_test_name
        };
		console.log('提交订单');
        console.log(myobject);
        $http.post(ENV.api + '/app/jiudian/creatdingdan/validateOrder1', objtops(myobject)).success(function(data) {
            if (data !== 'false') {
                console.log(data);
                $scope.jiudian_order = data;
                Storage.set("jiudian_order", $scope.jiudian_order);

                //默认保存1间房，和第一个入住人
                $scope.room = {
                    num: 1
                };
                Storage.set('room_num', $scope.room);
                var arr = new Array();
                if (Storage.get('入住人')) {
                    $scope.str = Storage.get('入住人');
                    $scope.mylist = JSON.parse($scope.str);
                } else {
                    $scope.mylist = new Array();
                }
                //将自定义输入的入住人 存到本地
                for (var k = 0; k < list.length; k++) {
                    var zidingyi = 0;
                    for (var m = 0; m < $scope.mylist.length; m++) {
                        if (list[k] == $scope.mylist[m].name) {
                            zidingyi++;
                        }
                    }
                    if (zidingyi == 0) {
                        //console.log(list[k]);
                        var P2 = new Person();
                        P2.name = list[k];
                        P2.chk = false;
                        if ($scope.mylist != '' && $scope.mylist != null && $scope.mylist != undefined) {
                            var arr2 = $scope.mylist;
                        } else {
                            var arr2 = new Array();
                        }
                        arr2.push(P2);
                        var str2 = JSON.stringify(arr2);
                        //存入本地        
                        Storage.set('入住人', str2);
                    }
                }


                if ($scope.mylist == '' || $scope.mylist == null || $scope.mylist == undefined) {
                    arr[0] = {
                        name: '',
                        chk: false
                    };
                } else {
                    arr[0] = {
                        name: $scope.mylist[0].name,
                        chk: false
                    };
                }
                //存入本地     
                Storage.set('zhuhu', arr);


                $state.transitionTo('zxf');
                $ionicLoading.hide();
                //Storage.remove('hotel_mail');
            } else {
                $ionicLoading.hide();
                MsgBox.promptBox("创建订单失败，请重新创建！", 2000);
            }
        }).error(function(error) {
            $ionicLoading.hide();
            MsgBox.promptBox("系统未知异常，请稍后再试！", 2000);
            $timeout(function() {
                $state.transitionTo('tab.dash');
            }, 2000);
        });

    };

})
//在线支付
.controller('ZxfCtrl', function ($scope, $state, Storage, $http, ENV, MsgBox, $timeout, $ionicLoading) {
	$scope.goto2 = function () {
		$state.transitionTo('tjdd');
	};
	$scope.xiangqing = function () {
		$("#xq").css("display", "block");
		$("#zs").css("display", "none");
		$("#sq").css("display", "block");
	};
	$scope.shouqi = function () {
		$("#xq").css("display", "none");
		$("#zs").css("display", "block");
		$("#sq").css("display", "none");
	};
	$scope.$on('$ionicView.enter', function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var jiudian_order = Storage.get('jiudian_order');
		var myobject = {
			orderId: jiudian_order.orderId,
            arrivalDate: jiudian_order.arrivalDate,
			departureDate: jiudian_order.departureDate,			
			csrf_test_name: csrf_test_name
		};
		console.log(myobject);
		$http.post(ENV.api + '/app/jiudian/jiudian_orderquery/orderinfo', objtops(myobject)).success(function (data) {

			$scope.order = data[0];
			console.log($scope.order);
			$ionicLoading.hide();
		});
	});
	$scope.gotopay = function () {

		Storage.set("order", $scope.order);
		var body = "比比旅行酒店支付";
		var attach = '';
		var goods_tag = '';
		// 订单中的总金额

		var js = {
			hotelname: $scope.order.hotelname,
			totalprice: $scope.order.totalCost,
			body: body,
			attach: attach,
			goods_tag: goods_tag,
			orderid: $scope.order.affiliateConfirmationId,
		}
		var ps = encodeURIComponent(JSON.stringify(js));

		window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_jiudian.php?ps=' + ps + '&';
		
	}
})
//订单详情
.controller('DdxqCtrl', function ($scope, $state, Storage, $http, ENV, MsgBox, $timeout, $ionicLoading) {

	$scope.backto = function () {
		$state.transitionTo('account');
	};
	$scope.gotoqxdd = function () {
		$state.transitionTo('qxdd');
	};
	$scope.common_pro = function () {
		$state.transitionTo('changjianwenti');
	};
	$scope.gotoAir = function() {
        $ionicLoading.show({
            template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
        $state.transitionTo('tab.home');
    };
    $scope.gotoTrain = function() {
        $ionicLoading.show({
            template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
        });
        $state.transitionTo('tab.train');
    };

	$scope.$on('$ionicView.enter', function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var jiudian_order = Storage.get('jiudian_order');
		var myobject = {
			orderId: jiudian_order.orderId,
            arrivalDate: jiudian_order.arrivalDate,
			departureDate: jiudian_order.departureDate,			
			csrf_test_name: csrf_test_name
		};
		$http.post(ENV.api + '/app/jiudian/jiudian_orderquery/orderinfo', objtops(myobject)).success(function (data) {
			console.log(data);
			$scope.order = data[0];
			console.log($scope.order);
			$ionicLoading.hide();
		});
	});
})
//取消订单
.controller('QxddCtrl', function ($scope, $state, $http, ENV, MsgBox, $timeout, Storage, $ionicLoading) {

	$scope.$on('$ionicView.enter', function () {
		$ionicLoading.show({
			template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
		});
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var jiudian_order = Storage.get('jiudian');
		var myobject = {
			orderId: jiudian_order.orderId,
			arrivalDate: jiudian_order.arrivalDate,
			departureDate: jiudian_order.departureDate,
			csrf_test_name: csrf_test_name
		};
		console.log(myobject);
		$http.post(ENV.api + '/app/jiudian/jiudian_orderquery/orderinfo', objtops(myobject)).success(function (data) {
			console.log(data);
			$scope.order = data[0];
			console.log($scope.order);
			$ionicLoading.hide();
		});
	});
	$scope.quxiaodingdan = function () {
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var csrf_test_name = getCsrf();
		var jiudian_order = Storage.get('jiudian');
		var myobject = {
			orderId: jiudian_order.orderId,
			arrivalDate: jiudian_order.arrivalDate,
			departureDate: jiudian_order.departureDate,			
			csrf_test_name: csrf_test_name
		};
		console.log(myobject);
		$('#quxiao').css('display', 'block');
		$('#qxddan').css('background-color', '#30404f');
		$http.post(ENV.api + '/app/jiudian/quxiaodingdan/cancelOrder', objtops(myobject)).success(function (data) {
			if (data != 'false') {
				console.log(data);
				$state.transitionTo('account');
			} else {
				alert('取消失败');
			}
		}).error(function (error) {
			MsgBox.promptBox("取消失败，请稍后再试！", 2000);
			$timeout(function () {
				$state.transitionTo('tab.hotelhome');
			}, 2000);
		});
	};
	$scope.backtoddxq = function () {
		$state.transitionTo('ddxq');
	};
})
//选择入住人
.controller('XzrzrCtrl', function($scope, $stateParams, $state, Storage,$ionicPopup) {
    $scope.num = $stateParams['num'];
		//限制复选框个数
		$scope.ruzhuren = function(name) {
			$scope.zhuhu = Storage.get('zhuhu');
			var renshu = 0;
			var xuanren = new Array();
			for (i = 0; i < $scope.list.length; i++) {
				if ($scope.list[i].chk == true) {
					renshu += 1;
					xuanren.push($scope.list[i]);
				}
			}
			if (renshu > $scope.num) {
				for (j = 0; j < $scope.list.length; j++) {
					if (name == $scope.list[j].name) {
						$scope.list[j].chk = false;
					}
				}                    
				var alertPopup = $ionicPopup.alert({
					title: '提示!',
					template: '入住人数超过房间数，请重新选择',
					okText: '确定',
					okType: 'anniuyanse'
				});
				return;
			}
		};
    $scope.clear_text = function() {
        $("#xingming").val("").focus();
    };

    $scope.tianjia_show = false;
    $scope.show_tianjia = function() {
        $scope.tianjia_show = true;
    };
    $("#xingming").blur(function() {
        $scope.tianjia_show = false;
    });

    $scope.$on('$ionicView.beforeEnter', function() {
		$scope.zhuhu = Storage.get('zhuhu');
		if (Storage.get('入住人')) {
			$scope.str_0 = Storage.get('入住人');
			$scope.list_0 = JSON.parse($scope.str_0);
			for (var i = 0; i < $scope.list_0.length; i++) {
				$scope.list_0[i].chk = false;
			}
			$scope.true_num = 0;
			for (var j = 0; j < $scope.zhuhu.length; j++) {
				for (var k = 0; k < $scope.list_0.length; k++) {
					if ($scope.zhuhu[j].name == $scope.list_0[k].name) {
						$scope.list_0[k].chk = true;
						$scope.true_num++;
					}
				}
			}
			 //console.log(true_num);
			var str5 = JSON.stringify($scope.list_0);
			Storage.set('入住人', str5);
			$scope.str = Storage.get('入住人');
			$scope.list = JSON.parse($scope.str);
			console.log($scope.list);
		}
    });
    //添加
    $scope.tianjia = function() {
        var xingming = $("#xingming").val();
        reg = /^([a-zA-Z\u4e00-\u9fa5]){1,16}$/;
        var P1 = new Person();
        P1.name = xingming;
        P1.chk = false;
        if (!reg.test(xingming)) {
            //console.log(xingming);
			   var alertPopup = $ionicPopup.alert({
               title: '提示!',
               template: '请输入16位一下的中文或英文，不能输入特殊字符',
			   okText: '确定',
				okType: 'anniuyanse'
             });
            return false;
        }
        if ($scope.list != '' && $scope.list != null && $scope.list != undefined) {
            var arr = $scope.list;
        } else {
            var arr = new Array();
        }
        arr.push(P1);
        var str = JSON.stringify(arr);
        //存入本地
        Storage.set('入住人', str);
        $scope.str = Storage.get('入住人')
        $scope.list = JSON.parse($scope.str);
		$("#xingming").val("").focus();
		$scope.tianjia_show = false;
    };
    //完成
    $scope.finish = function() {
        $scope.zhuhu = Storage.get('zhuhu');
		if($scope.list){
			var renshu = 0;
			var xuanren = new Array();
			for (i = 0; i < $scope.list.length; i++) {
				if ($scope.list[i].chk == true) {
					renshu += 1;
					xuanren.push($scope.list[i]);
				}
			}


			console.log(xuanren);
			var obj = new Object();
			obj.name = '';
			obj.chk = false;
			if (xuanren.length < $scope.num) {
				var chazhi = $scope.num - xuanren.length;
				for (var i = 0; i < chazhi; i++) {
					xuanren.push(obj);
				}
			}
			console.log(xuanren);
			Storage.set('zhuhu', xuanren);
			var str2 = JSON.stringify($scope.list);
			Storage.set('入住人', str2);
		}
        //跳转
        $state.transitionTo('tjdd');
    };



    //删除
	$scope.delete_contact = function(id) {
		console.log(id);
		$scope.str_1 = Storage.get('入住人');
		$scope.list_1 = JSON.parse($scope.str_1);
		$scope.list_1.splice(id, 1);
		var str = JSON.stringify($scope.list_1);
		Storage.set('入住人', str);               
		if($scope.list_1.length == 0){
			Storage.remove('入住人');
		}
		$scope.str = Storage.get('入住人');
		$scope.list = JSON.parse($scope.str);
	};
    $scope.backtotjdd = function() {
        $state.transitionTo('tjdd');
    };
})

//酒店邮递地址
.controller('hotel_addressCtrl', function ($scope, Storage, $state) {

	// 获得地址列表
	$scope.$on('$ionicView.enter', function () {
		var hotel_mail = Storage.get('hotel_mail');
		if (hotel_mail != null) {
			$scope.hotel_mail = hotel_mail;
		}
		var hotel_addressList = Storage.get('hotel_addressList');
		if (hotel_addressList != null && hotel_addressList != '') {
			$scope.hotel_addressList = hotel_addressList;
		}
	});
	$scope.displayAddress = function (isEdit, p, x) {
		$state.transitionTo('hotel_addressEdit', {
			isEdit: isEdit,
			p: p
		});
	};
	//选择收件地址事件
	$scope.selectedAddress = function (p, index, chk) {
		$scope.hotel_mail.isMail = chk;
		console.log($scope.hotel_mail.isMail);
		if (chk) {
			$scope.hotel_mail.index = index;
			$scope.hotel_mail.shoujianrenmingzi = p.shoujianrenmingzi;
			$scope.hotel_mail.shoujihao = p.shoujihao;
			$scope.hotel_mail.dizhi = p.dizhi;
			Storage.set('hotel_mail', $scope.hotel_mail);
			console.log('2312');
			console.log(Storage.get('hotel_mail'));
			$state.transitionTo('tjdd');
		} else {
			$state.transitionTo('tjdd');
		}
	};
})
//酒店邮递地址编辑/新增
.controller('hotel_addressEditCtrl',
	function ($scope, $rootScope, ENV, publicService, $filter, Storage, $location, MsgBox, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
	//初始化
	$scope.disable = {
		isEdit: ""
	};
	$scope.addressOld = {
		shoujianrenmingzi: "",
		shoujihao: "",
		dizhi: ""
	};
	$scope.$on('$ionicView.enter', function (event, data) {
		var hotel_addressList = Storage.get('hotel_addressList');
		if (hotel_addressList != null) {
			$scope.hotel_addressList = hotel_addressList;
		} else {
			$scope.hotel_addressList = '';
		}
		var isEdit = $stateParams['isEdit'];
		console.log(typeof(isEdit));

		if (isEdit == 'true') {
			$scope.disable.isEdit = true;
			console.log('isEdit');
			var i = parseInt($stateParams['p']);
			$scope.i = i; //索引
			$scope.address = hotel_addressList[i];
			console.log('isEdit');
			console.log($scope.address);
			$scope.title = '编辑';
			$scope.addressOld = {
				shoujianrenmingzi: $scope.address.shoujianrenmingzi,
				shoujihao: $scope.address.shoujihao,
				dizhi: $scope.address.dizhi,
				isNew: $scope.address.isNew,
				isDelete: $scope.address.isDelete,
				isEdit: $scope.address.isEdit,
				chk: $scope.address.chk
			};
		} else {
			// 新增地址
			$scope.title = '新增';
			$scope.disable.isEdit = false;
			$scope.address = {
				id: "0",
				yonghuid: '',
				shoujianrenmingzi: "",
				shoujihao: "",
				dizhi: "",
				isNew: false,
				isDelete: false,
				isEdit: false,
				chk: false
			};
		}
	});
	$scope.back = function () {
		$state.transitionTo('hotel_address');
	};
	$scope.$watch('hotel_addressList', function (newValue, oldValue, scope) {
		if (newValue === oldValue) {
			return;
		}
		$scope.hotel_addressList = newValue;
	});
	//保存收件地址{新增：True；修改：False}
	$scope.saveAddress = function (isNew) {
		if ($scope.address.shoujianrenmingzi == '') {
			MsgBox.promptBox("姓名不能为空", 3000);
			return;
		}
		if ($scope.address.shoujihao == '') {
			MsgBox.promptBox("手机号码不能为空", 3000);
			return;
		}
		if ($scope.address.shoujihao.length != 11) {
			MsgBox.promptBox("请输入有效的手机号码！", 3000);
			return;
		}
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
		if (!myreg.test($scope.address.shoujihao)) {
			MsgBox.promptBox("请输入有效的手机号码！", 3000);
			return false;
		}
		if ($scope.address.dizhi == '') {
			MsgBox.promptBox("地址不能为空", 3000);
			return;
		}
		if (!isNew && $scope.addressOld.shoujianrenmingzi == $scope.address.shoujianrenmingzi && $scope.addressOld.shoujihao == $scope.address.shoujihao && $scope.addressOld.dizhi == $scope.address.dizhi) {
			$state.transitionTo('hotel_address');
			return;
		}
		var hotel_addressList = $scope.hotel_addressList;
		console.log($scope.hotel_addressList);
		console.log('hotel_addressList');
		console.log(hotel_addressList);
		if (hotel_addressList != '') {
			var loop = true;
			angular.forEach($scope.hotel_addressList, function (data, index, array) {
				if (loop) {
					if (isNew) {
						if (data.shoujianrenmingzi == $scope.address.shoujianrenmingzi && data.shoujihaoma == $scope.address.shoujihaoma) {
							loop = false;
						}
					} else {
						if (data.shoujianrenmingzi == $scope.address.shoujianrenmingzi && data.shoujihaoma == $scope.address.shoujihaoma && data.id != $scope.address.id) {
							loop = false;
						}
					}
				}
			});
			if (loop) {
				// 存在编辑
				if ($scope.i != null) {
					if ($scope.address.isNew) {
						$scope.address.isEdit = true;
						hotel_addressList[$scope.i] = $scope.address;
					} else {
						$scope.address.isEdit = true;
						hotel_addressList[$scope.i] = $scope.address;
					}
				} else {
					$scope.address.isNew = true;
					hotel_addressList.push($scope.address);
				}
			} else {
				MsgBox.promptBox("此地址已存在", 3000);
				return;
			}
		} else {
			hotel_addressList = new Array();
			$scope.address.isNew = true;
			hotel_addressList.push($scope.address);
		}
		Storage.set('hotel_addressList', hotel_addressList);
		$state.transitionTo('hotel_address');
	};
})
//发票抬头
.controller('hotel_fapiaotaitouCtrl', function ($scope, $state, $ionicPopup, MsgBox, Storage) {
	$scope.gotoOrder = function () {
		$state.transitionTo('tjdd');

	};
	//进入前
	$scope.$on("$ionicView.beforeEnter", function () {
		$scope.taitou = {
			isTaitou: false,
			type: "企业",
			name: "",
			shuihao: ""
		};
		$scope.shuihaoShow = {
			qiye: 1,
			geren: 0
		};
		$scope.show = true;
	});

	//显示/隐藏税号
	$scope.leixing = function (p) {
		if (p === '企业') {
			$scope.shuihaoShow = {
				qiye: 1,
				geren: 0
			};
			$scope.show = true;
			$scope.taitou.type = '企业';
		} else {
			$scope.shuihaoShow = {
				qiye: 0,
				geren: 1
			};
			$scope.show = false;
			$scope.taitou.type = '个人';
			$scope.taitou.shuihao = '';
		}
	};

	//清空
	$scope.clearName = function () {
		$scope.taitou.name = '';
	};

	//提示对话框
	$scope.shuihaoTip = function () {
		var alertPopup = $ionicPopup.alert({
				title: '<div class="shuihaoTip">提示</div>',
				template: '纳企业税务登记上唯一识别企业的税号，由15、18或20位数码组成',
				okText: '确定',
				okType: 'anniuyanse'
			});
		alertPopup.then(function (res) {});
	};

	//完成
	$scope.finish = function () {
		if ($scope.taitou.name == '' || $scope.taitou.name == null) {
			MsgBox.promptBox("请输入姓名！", 1500);
			return;
		}
		if ($scope.taitou.type === "企业" && $scope.taitou.shuihao !== null && $scope.taitou.shuihao !== '') {
			var myreg = /^\d{15}$|^\d{18}$|^\d{20}$/;
			if (!myreg.test($scope.taitou.shuihao)) {
				MsgBox.promptBox("请输入15、18或20位企业税号！", 1500);
				return;
			}
		}
		$scope.taitou.isTaitou = true;
		Storage.set('hotel_taitou', $scope.taitou);
		$state.transitionTo('tjdd');
	};
})

//我的收藏
.controller('WdscCtrl', function($scope, $stateParams, $state, Storage) {
	$scope.backtoHotels = function() {
		 $state.transitionTo('tab.hotelhome'); //tab.hotelhome
	};         
	$scope.goto_all_city = function() {
		console.log('1');
		$state.transitionTo('allcity');

	};            
	$scope.goto_hoteldetail_2 = function(hotels) {
		var list = JSON.parse(hotels);
		console.log('hotels');
		//保存已选择的信息到缓存
		Storage.set("selected_hotel", list);                 
		 $state.transitionTo('hotelDetail',{flag : 'shoucang'});  
	};             
	$scope.$on('$ionicView.beforeEnter', function() {  
		//接收传值
		$scope.city_code = $stateParams['citycode'];
		$scope.cityname = $stateParams['city'];
		
		$scope.collection = new Array();
		if (Storage.get('shoucang')) {
			$scope.id = Storage.get('UserId');
			$scope.sc = Storage.get('shoucang');
			for(var j=0; j<$scope.sc.length;j++){
				if($scope.id == $scope.sc[j].User_id){
					$scope.collection = $scope.sc[j].shoucang;
				}
			}   
		}
	});
	//已经全面进入，现在是活动视图
	$scope.$on('$ionicView.afterEnter',function(){   
		//隐藏显示城市
		if($scope.city_code != ''){
			if($scope.city_code == 'all'){
				$('.all_collection').css('display','block');
			}else{
				$('.all_collection').css('display','none');
				$('.'+$scope.city_code).css('display','block');   
			}
			
		} 
	});
})


//收藏的全部城市
.controller('AllcityCtrl', function($scope,$state,Storage) {
	  

	
	$scope.$on('$ionicView.beforeEnter', function() {   
		//新建一个数组
		$scope.collection = new Array();
		if (Storage.get('shoucang')) {
			//获取用户id 和 本地收藏
			$scope.id = Storage.get('UserId');
			$scope.sc = Storage.get('shoucang');
			for(var j=0; j<$scope.sc.length;j++){
				//将收藏保存到对应的用户id
				if($scope.id == $scope.sc[j].User_id){
					$scope.collection = $scope.sc[j].shoucang;
				}
			}   
		}
		//全部城市个数
		$scope.city_num = $scope.collection.length;
		//把收藏里的城市名和city_code存起来
		var arr = new Array();
		var num = 0;
		
		var first = new Object();
		first.cityname ='全部城市';
		first.citycode ='all';
		first.citynum =$scope.city_num;
		arr.push(first);
		for (var i=0; i<$scope.collection.length; i++){                   
			var obj = new Object();
			obj.cityname = $scope.collection[i].cityname;
			obj.citycode = $scope.collection[i].city;
			//遍历，把每个城市的个数存起来
			for(var k = 0;k<$scope.collection.length;k++){
				if($scope.collection[i].cityname == $scope.collection[k].cityname){
					num +=1;
				}
			}
			obj.citynum = num;
			//存入新数组
			arr.push(obj);
			num = 0;
		}   
		//删除数组重复元素
		$scope.citys = [];
		for(var i=0; i<arr.length;i++){
			var flag = true;
			for(var j = i;j<arr.length-1;j++){
				if(arr[i].cityname == arr[j+1].cityname){
					flag = false;
					break;
				}
			}
			if(flag){
				$scope.citys.push(arr[i])
			}
		}
		//单选框
		if($scope.xuanze == undefined){	
			$scope.xuanze = 'all';
		}
	});   
	//选择城市
	$scope.choice_city = function(name,code){
		
		$scope.xuanze= code; 
		//console.log($scope.data);
		$state.transitionTo('wdsc', {city: name,citycode:code});
	};  
	//返回我的收藏
	$scope.backtowdsc = function(name,code){
		$state.transitionTo('wdsc',{city: '全部城市',citycode:'all'});
	};   
	  


	
	
})		
//浏览历史
.controller('HistoryCtrl', function($scope, $stateParams, $state, Storage) {
            $scope.$on('$ionicView.beforeEnter', function() {    
                //获取今天时间
                var today = new Date(); 
                $scope.jintian = today.toLocaleDateString();;
                if (Storage.get('brows_history')) {
                    $scope.liulan = Storage.get('brows_history');                
                    for(var i=0; i<$scope.liulan.length; i++){
                        var date = new Date($scope.liulan[i].date);
                        //当天时间减去本地浏览历史时间
                        var chazhi = today - date;
                        //删除7天前的历史记录
                        if(chazhi > 24*60*60*1000*7){
                            $scope.liulan.splice(i,1);
                        }
                    }
                    //保存
                    Storage.set('brows_history',$scope.liulan);
                }
            });   
            //清空浏览历史
             $scope.clear_history = function(){
                Storage.remove('brows_history');
                $scope.liulan = Storage.get('brows_history');
            };   
            //返回
            $scope.backtoHotels = function() {
                 $state.transitionTo('tab.hotelhome'); //tab.hotelhome
            };  
            //跳转到酒店详情页
            $scope.goto_hoteldetail = function(hotels) {
                var list = JSON.parse(hotels);
                //保存已选择的信息到缓存
                Storage.set("selected_hotel", list);                 
                 $state.transitionTo('hotelDetail',{flag : 'history'});  
            };              
          
        })	
 		
//图片展示
        .controller('ShowimgCtrl', function($scope, Storage, $state, $ionicLoading, $http, ENV, MsgBox) {

    $scope.$on('$ionicView.beforeEnter', function() {
        $scope.hotelDetailImages = Storage.get("hotelDetailImages");
    });

    $scope.tupian = function(num) {
        console.log(num);
        $state.transitionTo('bigimg', {num: num});
    };
    $scope.backtoHotels = function() {
        $state.transitionTo('hotelDetail');
    };
})

//大图
        .controller('BigimgCtrl', function($scope, $state, Storage, $stateParams, $ionicSlideBoxDelegate) {
    $scope.$on('$ionicView.beforeEnter', function() {
        $scope.page_num = $ionicSlideBoxDelegate.currentIndex() + 1;
        $scope.hotelDetailImages = Storage.get('hotelDetailImages');
        $scope.page_count = $scope.hotelDetailImages.length;
    });

    //显示第几个图片
    $scope.myActiveSlide = $stateParams['num'];
    //左右滑动事件
    $scope.onRelease = function() {
        $scope.page_num = $ionicSlideBoxDelegate.currentIndex() + 1;
    }

    //返回
    $scope.backto_showimg = function() {
        $state.transitionTo('showimg');
    };

})
	//常见问题
	.controller('ChangjianwentiCtrl', function($scope, $state) {
		$scope.backtoHotels = function() {
			history.back();
			 //$state.transitionTo('tab.hotelhome'); //tab.hotelhome
		};   
	})  
	//比比优势
	.controller('BibiyoushiCtrl', function($scope, $state) {
		$scope.back_index = function() {
			$state.transitionTo('bibi');
		};
	})         
	//合作伙伴
	.controller('HezuohuobanCtrl', function($scope, $state) {
		$scope.slideIndexSearch=-1; 
		$scope.activeSlideSearch = function(index) {
			$scope.slideIndexSearch=index;
		};
		$scope.back_index = function() {
			$state.transitionTo('bibi');
		};
		$scope.onSwipeRight = function(num){
			console.log(num);
			$scope.slideIndexSearch=num;
		};
		 $scope.onSwipeLeft = function(num){
			 console.log(num);
			$scope.slideIndexSearch=num;
		};
	})    
	//订票指南
	.controller('DingpiaozhinanCtrl', function($scope, $state) {
		$scope.back_index = function() {
			$state.transitionTo('bibi');
		};
	})  		
        ;


