angular.module('starter.controllers', ['starter.services', 'LocalStorageModule'])
        .controller('GuoDuCtrl',
        function($scope, $rootScope, ENV, MsgBox, publicService, $filter, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
            $scope.gotoHome = function() {
                $state.go('tab.home');
            };
            $scope.gotoTrain = function() {
                $state.transitionTo('tab.train');
            };
        })
        .controller('tabCtrl',
        function($scope, $rootScope, $ionicHistory, ENV, MsgBox, publicService, $filter, Storage, $stateParams, $ionicTabsDelegate, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
                $ionicHistory.clearCache();
                $scope.show = function(index) {

                        if (index == 1) {
                          $ionicHistory.clearHistory();
                          // 清飞机缓存
                          Storage.remove('order');
                          Storage.remove('currentContact');
                          Storage.remove('userContacts');
                          Storage.remove('addressList');
                          Storage.remove('mail');
                          Storage.remove('costdetail');
                          Storage.remove('Insurance');
                          Storage.remove('currentselected');
                          Storage.remove('search');
                          Storage.remove('selected');
                          // 清火车缓存
                          Storage.remove('t_currentContact');
                          Storage.remove('t_userContacts');
                          Storage.remove('t_addressList');
                          Storage.remove('t_insurance');
                          Storage.remove('insuranceListTrain');
                          Storage.remove('t_mail');
                          Storage.remove('t_currentselected');
                          Storage.remove('t_chooseId');
                          Storage.remove('firstUserContact');
                          Storage.remove('train_order');
                          Storage.remove('t_costdetail');
                          Storage.remove('gotoDate');
                          $state.transitionTo('tab.home');
                        } else if (index == 2) {

                          $ionicHistory.clearHistory();
                          // 清飞机缓存
                          Storage.remove('order');
                          Storage.remove('currentContact');
                          Storage.remove('userContacts');
                          Storage.remove('addressList');
                          Storage.remove('mail');
                          Storage.remove('costdetail');
                          Storage.remove('Insurance');
                          Storage.remove('currentselected');
                          Storage.remove('search');
                          Storage.remove('selected');
                          // 清火车缓存
                          Storage.remove('t_currentContact');
                          Storage.remove('t_userContacts');
                          Storage.remove('t_addressList');
                          Storage.remove('t_insurance');
                          Storage.remove('insuranceListTrain');
                          Storage.remove('t_mail');
                          Storage.remove('t_currentselected');
                          Storage.remove('t_chooseId');
                          Storage.remove('firstUserContact');
                          Storage.remove('train_order');
                          Storage.remove('t_costdetail');
                          Storage.remove('gotoDate');
                          $state.transitionTo('tab.train');

                        } else if (index == 3) {
                          $ionicHistory.clearHistory();
                          // 清飞机缓存
                          Storage.remove('order');
                          Storage.remove('currentContact');
                          Storage.remove('userContacts');
                          Storage.remove('addressList');
                          Storage.remove('mail');
                          Storage.remove('costdetail');
                          Storage.remove('Insurance');
                          Storage.remove('currentselected');
                          Storage.remove('search');
                          Storage.remove('selected');
                          // 清火车缓存
                          Storage.remove('t_currentContact');
                          Storage.remove('t_userContacts');
                          Storage.remove('t_addressList');
                          Storage.remove('t_insurance');
                          Storage.remove('insuranceListTrain');
                          Storage.remove('t_mail');
                          Storage.remove('t_currentselected');
                          Storage.remove('t_chooseId');
                          Storage.remove('firstUserContact');
                          Storage.remove('train_order');
                          Storage.remove('t_costdetail');
                          Storage.remove('gotoDate');
                          $state.transitionTo('tab.hotelhome');

                        } else if (index == 4) {
                          $ionicHistory.clearHistory();
                          // 清飞机缓存
                          Storage.remove('order');
                          Storage.remove('currentContact');
                          Storage.remove('userContacts');
                          Storage.remove('addressList');
                          Storage.remove('mail');
                          Storage.remove('costdetail');
                          Storage.remove('Insurance');
                          Storage.remove('currentselected');
                          Storage.remove('search');
                          Storage.remove('selected');
                          // 清火车缓存
                          Storage.remove('t_currentContact');
                          Storage.remove('t_userContacts');
                          Storage.remove('t_addressList');
                          Storage.remove('t_insurance');
                          Storage.remove('insuranceListTrain');
                          Storage.remove('t_mail');
                          Storage.remove('t_currentselected');
                          Storage.remove('t_chooseId');
                          Storage.remove('firstUserContact');
                          Storage.remove('train_order');
                          Storage.remove('t_costdetail');
                          Storage.remove('gotoDate');
                          $state.transitionTo('tab.user');

                        }else if (index == 0) {
                          $ionicHistory.clearHistory();
                          // 清飞机缓存
                          Storage.remove('order');
                          Storage.remove('currentContact');
                          Storage.remove('userContacts');
                          Storage.remove('addressList');
                          Storage.remove('mail');
                          Storage.remove('costdetail');
                          Storage.remove('Insurance');
                          Storage.remove('currentselected');
                          Storage.remove('search');
                          Storage.remove('selected');
                          // 清火车缓存
                          Storage.remove('t_currentContact');
                          Storage.remove('t_userContacts');
                          Storage.remove('t_addressList');
                          Storage.remove('t_insurance');
                          Storage.remove('insuranceListTrain');
                          Storage.remove('t_mail');
                          Storage.remove('t_currentselected');
                          Storage.remove('t_chooseId');
                          Storage.remove('firstUserContact');
                          Storage.remove('train_order');
                          Storage.remove('t_costdetail');
                          Storage.remove('gotoDate');
                          $state.transitionTo('bibi');
                        };

                      }
        })
        .controller('HomeCtrl',
        function($scope, $rootScope, ENV, MsgBox, publicService, $filter, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            $scope.$on("$ionicView.beforeEnter", function (event, data) {
				$ionicLoading.hide();
			});

            // 初始化
            $scope.homeInit = function() {
                Storage.remove('left');
                Storage.remove('right');
                Storage.remove('search');
            };
			
			//返回首页
			$scope.backHome = function () {
				$state.transitionTo('bibi');
			};
            /**
             * 初始条件下是单程 默认是深圳，到北京
             * */
            $scope.isActive = true;
            $scope.isActive1 = false;
            $scope.depCity = '上海';
            $scope.arrCity = '北京';
            $scope.depCode = 'SHA';
            $scope.arrCode = 'PEK';
            $scope.currentmodifie = "left_city";
            //搜索条件{}
            $scope.search = {
                gotoDate: "",
                gotoWeek: "",
                backDate: "",
                backWeek: "",
                current: {
                    arrCode: '',
                    arrCity: '',
                    depCode: '',
                    depCity: ''
                },
                oneway: true
            };

            // 返程时间为空
            $scope.fanchengshijian = {
                display: 'none'
            };
            Storage.set('出发地', '上海');
            Storage.set('目的地', '北京');

            // 当前时间
            var date = new Date();
            var seperator1 = "-";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            ;
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            ;
            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate;
            $scope.currentData = currentdate;

            // 直接在程序中添加

            var img_data = ENV.imgUrl + 'resources/air/image/banner1.jpg';

            $scope.bannerData = img_data;
            $ionicSlideBoxDelegate.update();

            //出发日期，返回日期
            $scope.gotoDate = publicService.dayadd(new Date(), 1);
            $scope.gotoWeek = publicService.getweek($scope.gotoDate);
            $scope.backDate = publicService.dayadd($scope.gotoDate, 3);
            $scope.backWeek = publicService.getweek($scope.backDate);

            // 显示日期
            $scope.showDatePage = function(ps) {
                var my_left = $filter("date")(publicService.dayadd(new Date(), 1), "yyyy-MM-dd");
                var my_right = $filter("date")($scope.backDate, "yyyy-MM-dd");
                if (Storage.get('left') != null) {
                    my_left = Storage.get('left');
                }
                ;

                if (Storage.get('right') != null) {
                    my_right = Storage.get('right');
                }
                ;
                if ($scope.isActive1 == false) {
                    $state.transitionTo('mydate', {
                        gotoDate: my_left,
                        backDate: '',
                        lr: ps
                    });
                } else {
                    $state.transitionTo('mydate', {
                        gotoDate: my_left,
                        backDate: my_right,
                        lr: ps
                    });
                }
                ;

            };

            // 再次加载
            $scope.$on('$ionicView.enter', function() {
                var depCity = Storage.get('depCity');
                var depCode = Storage.get('depCode');
                if (depCity != null) {
                    $scope.depCity = depCity;
                    $scope.depCode = depCode;
                }
                ;

                var arrCity = Storage.get('arrCity');
                var arrCode = Storage.get('arrCode');
                if (arrCity != null) {
                    $scope.arrCity = arrCity;
                    $scope.arrCode = arrCode;
                }
                ;
                // 显示修改后的日期
                if (Storage.get('left') != null) {
                    $scope.gotoDate = new Date(Storage.get('left'));
                    $scope.gotoWeek = publicService.getweek($scope.gotoDate);
                }
                ;

                if (Storage.get('right') != null) {
                    $scope.backDate = new Date(Storage.get('right'));
                    $scope.backWeek = publicService.getweek($scope.backDate);
                }
                ;
            });

            // 单程，返程
            //修改行程{True:单程；False：回程}
            $scope.trip = function(p) {
                $scope.search.oneway = p;
                if (p == true) {
                    $scope.isActive = true;
                    $scope.isActive1 = false;
                    $scope.fanchengshijian = {
                        display: 'none'
                    };
					$scope.backDate = '';
					$scope.backWeek = '';
                } else {
                    $scope.backDate = publicService.dayadd($scope.gotoDate, 3);
                    $scope.backWeek = publicService.getweek($scope.backDate);
                    $scope.isActive = false;
                    $scope.isActive1 = true;
                    $scope.fanchengshijian = {
                        display: 'block'
                    };
                }
                ;
            };

            //图片旋转动画,和出发地,目的地互换位置
            var scale = 1;
            $scope.switchCity = function() {
                scale++;
                var img_switch = document.getElementById('img_switch');
                img_switch.style.transform = "rotate(" + scale * 360 + "deg)";
                var city = $scope.depCity;
                var code = $scope.depCode;
                $scope.depCity = $scope.arrCity;
                $scope.depCode = $scope.arrCode;
                $scope.arrCity = city;
                $scope.arrCode = code;

                var start = $(".departure");
                var end = $(".destination");
                start.addClass("bin_left");
                end.addClass("bin_right");
                setTimeout(function() {
                    start.removeClass("bin_left");
                    end.removeClass("bin_right");
                }, 500);
            };

            // 选择地址
            $scope.placeAction = function(index) {
				$ionicLoading.show({
                  template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
                });
                $state.transitionTo('place', {
                    title: index
                });

                Storage.remove('title');
                if (index == '出发地') {
                    Storage.set('title', '出发城市');
                } else {
                    Storage.set('title', '到达城市');
                }
                ;
            };

            //点击查询跳转到航班列表
            $scope.searchflight = function() {

                //判断出发城市和到达城市
                if ($scope.depCity == $scope.arrCity) {
                    MsgBox.promptBox("出发城市与到达城市相同,请你重新选择");
                    return;
                }
                ;
                //如果选择了返程{则需要判断出发日期与返回日期}
                if (!$scope.search.oneway) {
                    if ($scope.backDate == "") {
                        MsgBox.promptBox("请选择返程日期");
                        return;
                    }
                    ;
                    var dt1 = new Date($scope.gotoDate);
                    var dt2 = new Date($scope.backDate);
                    if (dt1 > dt2) {
                        MsgBox.promptBox("出发日期不能大于返程日期");
                        return;
                    }
                    ;
                }
                ;

                $scope.search.current.depCity = $scope.depCity;
                $scope.search.current.arrCity = $scope.arrCity;
                $scope.search.current.depCode = $scope.depCode;
                $scope.search.current.arrCode = $scope.arrCode;
                $scope.search.gotoDate = $filter("date")($scope.gotoDate, "yyyy-MM-dd");
                $scope.search.backDate = $filter("date")($scope.backDate, "yyyy-MM-dd");
                $scope.search.gotoWeek = $scope.gotoWeek;
                $scope.search.backWeek = $scope.backWeek;
                Storage.set("search", $scope.search);
                //$state.transitionTo('query');
                $state.go('query');

            };

        })

        .controller('PlaceCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            // 标题
            $scope.title = $stateParams['title'];

            // 搜索城市
            $scope.searchBox = {
                content: ""
            };
			$scope.$on('$ionicView.afterEnter', function() {

                $ionicLoading.hide();
            })
            var depCity = '';
            var arrCity = '';
            var depCode = '';
            var arrCode = '';
            function place() {
                // 加载图片信息
                $http.get(ENV.imgUrl + "data/place.json")
                        .success(function(data) {
                    $scope.users = data;
                    var users = $scope.users;

                    $scope.alphabet = iterateAlphabet();

                    var tmp = {};
                    for (i = 0; i < users.length; i++) {
                        var letter = users[i].pinyin.toUpperCase().charAt(0);
                        if (tmp[letter] == undefined) {
                            tmp[letter] = []
                        }
                        ;
                        tmp[letter].push(users[i]);
                    }
                    ;
                    $scope.sorted_users = tmp;
                });
            }
            function remenplace() {
                $http.get(ENV.imgUrl + "data/remenplace.json")
                        .success(function(data) {
                    $scope.remenplace = data;
                });
            }
            // $location.hash('index_A');
            $ionicScrollDelegate.anchorScroll('index_A');

            //Click letter event
            $scope.gotoList = function(id) {
                $location.hash(id);
                $ionicScrollDelegate.anchorScroll();
            };

            //Create alphabet object
            function iterateAlphabet() {
                var str = "ABCDEFGHJKLMNPQRSTWXYZ";
                var numbers = new Array();
                for (var i = 0; i < str.length; i++) {
                    var nextChar = str.charAt(i);
                    numbers.push(nextChar);
                }
                ;
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
                ;
            }
            ;

            $scope.toggleGroup = function(group) {
                if ($scope.isGroupShown(group)) {
                    $scope.shownGroup = null;
                } else {
                    $scope.shownGroup = group;
                }
                ;
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
                        if (name.city.match(content)) {
                            searchList.push(name);
                        }
                        ;
                    }
                    ;
                    $scope.searchList = '';
                    $scope.searchList = searchList;
                } else {
                    $scope.searchList = '';
                }
                ;
            };
            $scope.$on("$ionicView.beforeEnter", function() {
                $scope.searchList = '';
                var history = Storage.get('historyplace');
                if (history != null) {
                    $scope.history = history;
                } else {
                    $scope.history = '';
                }
                ;
                 $scope.content = '';
                place();
                remenplace()
            });
            //点击‘返回’，返回首页
            $scope.back = function() {
                $state.transitionTo('tab.home');
            };

            //选择城市 返回首页
            var title = Storage.get('title');

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
                        console.log(historyplace[i].city);
                        console.log(p.city);
                        if (historyplace[i].city == p.city) {
                            cunzai = 1;
                        }
                        ;
                    }
                    ;

                    if (!cunzai) {
                        if (len == 1 || len == 0) {
                            historyplace.push(p);
                        } else {
                            historyplace.shift();
                            historyplace.push(p);
                        }
                        ;
                    }
                    ;
                }
                ;
                Storage.set('historyplace', historyplace);
                switch (title) {
                    case '出发城市':
                        //出发城市
                        depCity = p.city;
                        depCode = p.code;

                        Storage.set('depCity', depCity);
                        Storage.set('depCode', depCode);
                        Storage.remove('title');
                        $state.transitionTo('tab.home');
                        break;
                    case '到达城市':
                        //到达城市
                        arrCity = p.city;
                        arrCode = p.code;
                        Storage.set('arrCity', arrCity);
                        Storage.set('arrCode', arrCode);
                        Storage.remove('title');
                        $state.transitionTo('tab.home');
                        break;
                }
                ;
            };
        })

// 航班列表
        .controller('QueryCtrl',
        function($scope, $ionicPlatform, $ionicModal,$ionicPopover, ENV, MsgBox, $compile, publicService, Storage, $http, $state, $filter, $ionicLoading, $stateParams, $interval, $timeout, $ionicScrollDelegate) {

            $ionicPlatform.ready(function() {
                ionic.Platform.fullScreen();
            });

            $scope.resizeScoll = function() {
                $timeout(function() {
                    $ionicScrollDelegate.resize();
                }, 410);
            };
            
     // 飞机退改签
    	$ionicModal.fromTemplateUrl('templates/airtuigai.html', {
    		scope: $scope,
    		animation: 'slide-in-left',

    	}).then(function (modal) {
    		$scope.airtuigai = modal;
    	});


		//加载时刻表

		$scope.tuigaiqian = function (x,y,$event) {
            
   

        $scope.tuigai = {
            
        }
        var date = $scope.search.date;
        var aircode = x.aircode;
        var orgAirport = x.orgAirport;
        var dstAirport = x.dstAirport;
        var seatCode = y.seatCode[0];
       if (!publicService.isNull($scope.adult) && $scope.adult['airlineCode'] == aircode && $scope.adult['seatCode']== seatCode) {
           $scope.airtuigai.show($event);
       } else {

            // 刚刚进入的时候显示 Loading
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var tuigaiqian = {
                date: date,
                aircode: aircode,
                orgAirport: orgAirport,
                dstAirport: dstAirport,
                seatCode: seatCode,
                sf: sf,
                csrf_test_name: csrf_test_name
            };

            $http.post(ENV.api + '/app/db/order/tuigai', objtops(tuigaiqian)).success(function(data) {

                if (data != 'false') {
                    $ionicLoading.hide();
                    $data = $.parseJSON(data);
                    $scope.adult = data[0];
                    $scope.child = data[1];
					$scope.airtuigai.show($event);

                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("加载退改签政策失败", 3000);

                }
                ;

            }).error(function(error) {

                MsgBox.promptBox("加载退改签政策失败", 3000);
            });

       };

	};         
            
                       

            // 读取航班列表数据
            $scope.getflightList = function() {

                $scope.flights = "";
                $scope.newflights = '';

                // 刚刚进入的时候显示 Loading
                $ionicLoading.show({
                    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
                });
                var depCity = '';
                var arrCity = '';
                var date = '';
                var mytrip = '';
                var SF = '';
                if (typeof($scope.search.depCity) != "undefined" && $scope.search.depCity != null) {
                    depCity = $scope.search.depCity;
                }
                if (typeof($scope.search.arrCity) != "undefined" && $scope.search.arrCity != null) {
                    arrCity = $scope.search.arrCity;
                }
                if (typeof($scope.search.date) != "undefined" && $scope.search.date != null) {
                    date = $scope.search.date;
                }
                if (typeof(search.oneway) != "undefined" && search.oneway != null) {
                    mytrip = search.oneway;
                }
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                var myobject = {
                    depCity: depCity,
                    arrCity: arrCity,
                    // 注：date第一次为去程时间；若有返程，则第二次为返程时间。
                    date: date,
                    mytrip: mytrip,
                    sf: SF,
                    csrf_test_name: csrf_test_name
                };

                $http.post(ENV.api + '/app/templates/flight/myquery', objtops(myobject)).success(function(data) {
                    if (data.returnCode == "S") {
                        var orgCity = '';
                        var dstCity = '';
                        var basePrice = '';
                        var date = '';
                        var distance = '';
                        var flights = '';
                        if (typeof(data['orgCity']) != "undefined" && data['orgCity'] != null) {
                            orgCity = data['orgCity'];
                        }
                        ;
                        if (typeof(data['dstCity']) != "undefined" && data['dstCity'] != null) {
                            dstCity = data['dstCity'];
                        }
                        ;
                        if (typeof(data['basePrice']) != "undefined" && data['basePrice'] != null) {
                            if (typeof(data['basePrice'][0]) != "undefined" && data['basePrice'][0] != null) {
                                basePrice = data['basePrice'][0];
                            }
                            ;

                        }
                        ;
                        if (typeof(data['date']) != "undefined" && data['date'] != null) {
                            if (typeof(data['date'][0]) != "undefined" && data['date'][0] != null) {
                                date = data['date'][0];
                            }
                            ;
                        }
                        ;
                        if (typeof(data['distance']) != "undefined" && data['distance'] != null) {
                            if (typeof(data['distance'][0]) != "undefined" && data['distance'][0] != null) {
                                distance = data['distance'][0];
                            }
                            ;
                        }
                        ;
                        if (typeof(data['flights']) != "undefined" && data['flights'] != null) {
                            flights = data['flights'];
                        }
                        ;
                        var orgCitysanzima = data['orgCitysanzima'];
                        var dstCitysanzima = data['dstCitysanzima'];

                        $scope.baseinfo = {
                            "orgCity": orgCity,
                            "dstCity": dstCity,
                            "orgCitysanzima": orgCitysanzima,
                            "dstCitysanzima": dstCitysanzima,
                            "basePrice": basePrice,
                            "date": date,
                            "distance": distance
                        };
                        $scope.flights = flights;
                        $scope.newflights = $filter("flight_filter")($scope.flights);
                        //判断是否超过可乘机时间

                        //航空公司去重
                        $scope.airports = new Array();
                        $scope.airports = unique1($scope.flights, 'gs');
                        //舱位去重
                        $scope.seatClass = new Array();
                        $scope.seatClass = unique2($scope.flights, 'seatItems', "seatMsg");

                        $scope.orgairp = data.orgairp;
                        $scope.dstairp = data.dstairp;
                        //启动倒计时
                        $scope.countdown();
                        // 隐藏 Loading
                        $ionicLoading.hide();

                    } else {
                        $ionicLoading.hide();
                        MsgBox.promptBox("航班为空，请更换城市或更改时间！", 2000);
                        $scope.selected = {
                            minute: 0,
                            second: 0,
                            goto: {
                                date: "",
                                week: "",
                                depCity: "",
                                arrCity: "",
                                interday: 0,
                                flightTime: "",
                                flight: "",
								mealPolicy: "",
                                seatItem: ""

                            },
                            back: {
                                date: "",
                                week: "",
                                depCity: "",
                                arrCity: "",
                                interday: 0,
                                flightTime: "",
                                flight: "",
								mealPolicy: "",
                                seatItem: ""
                            }
                        };
                        $scope.selectedflight = false;
                        $timeout(function() {

                            $state.transitionTo('tab.home');
                        }, 2000);
                    }
                    ;

                }).error(function(error) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("查询失败，请重新查询！", 2000);
                    $scope.selected = {
                        minute: 0,
                        second: 0,
                        goto: {
                            date: "",
                            week: "",
                            depCity: "",
                            arrCity: "",
                            interday: 0,
                            flightTime: "",
                            flight: "",
							mealPolicy: "",
                            seatItem: ""

                        },
                        back: {
                            date: "",
                            week: "",
                            depCity: "",
                            arrCity: "",
                            interday: 0,
                            flightTime: "",
                            flight: "",
							mealPolicy: "",
                            seatItem: ""
                        }
                    };
                    $scope.selectedflight = false;
                    $timeout(function() {

                        $state.transitionTo('tab.home');
                    }, 2000);
                });
            };

            //返回首页
            $scope.backHome = function() {
			   
			   // 清飞机缓存
			   Storage.remove('order');
			   Storage.remove('currentContact');
			   Storage.remove('userContacts');
			   Storage.remove('addressList');
			   Storage.remove('mail');
			   Storage.remove('costdetail');
			   Storage.remove('Insurance');
			   Storage.remove('currentselected');
			   Storage.remove('search');
			   Storage.remove('selected');				
				
                $state.transitionTo('tab.home');
            };
            // 首次加载
            var search = Storage.get('search'); // 查询条件
            $scope.search = {
                // 注：date：在gotoDate和backDate之间切换
                date: search.gotoDate,
                week: search.gotoWeek,
                depCity: search.current.depCity,
                arrCity: search.current.arrCity,
                depCode: search.current.depCode,
                arrCode: search.current.arrCode,
                airCode: ""

            };

            // 再次进入
            $scope.$on('$ionicView.enter', function() {

                $scope.myStyle = {
                    displaytitle: {
                        "display": "block"
                    },
                    displayflight: {
                        "display": "none"
                    }
                };

                $scope.selected = {
                    minute: 0,
                    second: 0,
                    fanchengbiaozhi: 0,
                    goto: {
                        date: "",
                        week: "",
                        depCity: "",
                        arrCity: "",
                        interday: 0,
                        flightTime: "",
                        flight: "",
						mealPolicy: "",
                        seatItem: ""

                    },
                    back: {
                        date: "",
                        week: "",
                        depCity: "",
                        arrCity: "",
                        interday: 0,
                        flightTime: "",
                        flight: "",
						mealPolicy: "",
                        seatItem: ""
                    }
                };
                $scope.selectedflight = false;

                if (Storage.get('search') != null) {
                    search = Storage.get('search');
                    $scope.search = {
                        // 注：date：在gotoDate和backDate之间切换
                        date: search.gotoDate,
                        week: search.gotoWeek,
                        depCity: search.current.depCity,
                        arrCity: search.current.arrCity,
                        depCode: search.current.depCode,
                        arrCode: search.current.arrCode,
                        airCode: ""

                    };

                }
                ;

                // 显示修改后的日期
                if (Storage.get('flight') != null) {
                    $scope.search.date = new Date(Storage.get('flight'));
                    Storage.remove('flight');
                    $scope.search.week = publicService.getweek($scope.search.date);
                    $scope.search.date = $filter("date")($scope.search.date, "yyyy-MM-dd");

                }
                ;
                // 判断是否有往返程
                if (search.oneway) {
                    //search.gotoDate = search.gotoDate.replace(/-/g, "/"); //兼容苹果手机
                    search.gotoDate = new Date(search.gotoDate);
                    $scope.btnName = "预订";
                }
                ;

                if (!search.oneway) {
                    //search.backDate = search.backDate.replace(/-/g, "/"); //兼容苹果手机
                    search.backDate = new Date(search.backDate);
                    $scope.btnName = "选返程";
                }
                ;
                $scope.getflightList();
            });

            //$scope.getflightList();
            //读取航班列表数据 end

            // 判断是否大于当前 + 6 小时时间，假如小于 0 就表示可以了
            // 格式为：2017/01/09 20:34:49
            function getXiangCha(strDate) {
                var d = new Date(); //获取当前时间
                d.setHours(d.getHours() + 6);

                var d1 = new Date(strDate);
                var haomiao = d.getTime() - d1.getTime();
                var hours = Math.floor(haomiao / (3600 * 1000));
                return hours;
            }

            //前一天 后一天 --> 变更日期
            $scope.dateChange = function(p, n) {
                var dt1 = $filter("date")($scope.search.date, "yyyy/MM/dd");
                var dt2 = $filter("date")(new Date(), "yyyy/MM/dd");
                // 此处还有个判断日期的最后时间
                if (n < 0 && publicService.compareDate(dt1, dt2) >= 0) {
                    return;
                }
                ;
                dt1 = publicService.dayadd(new Date($scope.search.date), n);
                $scope.search.date = $filter("date")(dt1, "yyyy-MM-dd");
                $scope.search.week = publicService.getweek(new Date($scope.search.date));
                if (n > 0) {
                    publicFunction.classAnmte("databutBix", "dataRigh");
                } else {
                    publicFunction.classAnmte("databutBix", "dataLeft");
                }
                ;
                $scope.getflightList();
            };
            // 切换至日期页面
            $scope.showDatePage = function(ps) {
                $state.transitionTo('mydate', {
                    gotoDate: $filter("date")($scope.search.date, "yyyy-MM-dd"),
                    lr: ps
                });
            };

            //定时重新加载航班
            $scope.countdown = function() {
                $scope.selected.minute = 10;
                $scope.selected.second = 0;
                $scope.reload = false;
                var timePromise = $interval(function() {
                    $scope.selected.second--;
                    if ($scope.selected.second <= 0) {
                        if ($scope.selected.minute > 0) {
                            $scope.selected.second = 59;
                            $scope.selected.minute--;
                        } else {
                            $interval.cancel(timePromise);
                            $scope.reload = true;
                        }
                        ;
                    }
                    ;
                }, 1000, 0);
            };

            //点击预订-跳转到填写订单页面
            $scope.reserve = function(flight, seatItem, baseinfo) {
         
                    //如果没有登录，则跳转到登录页面
                    var UserId = Storage.get("UserId");

                    if (typeof(UserId) == 'undefined' || UserId == '' || UserId == null || UserId <= 0) {
                        MsgBox.promptBox("请登录账号！", 1500);
                        Storage.set('loginBack', 'flightlist');
                        $timeout(function() {
                            $state.transitionTo('login');
                        }, 1500);

                        return;
                    }
                    ;


                //判断起飞时间是否太近
                var now = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                var dt = $filter("date")($scope.search.date, "yyyy/MM/dd") + ' ' + flight.depTime;
                if (publicService.CalcTimeDiff(now, dt) < 60 * 4) {
                    MsgBox.promptBox("不支持预订离起飞时间小于4小时的航班", 3000);
                    return;
                }
                ;

                //是否需要重新加载
                if ($scope.reload) {
                    MsgBox.dialogBox($compile, $scope, "航班信息有更新，需重新查询", "确定", "getflightList()");
                    return;
                }
                ;
                if (!$scope.selectedflight) {
                    $scope.selected.fanchengbiaozhi = 0;
                    $scope.selected.goto.date = $filter("date")($scope.search.date, "yyyy/MM/dd");
                    $scope.selected.goto.week = $scope.search.week;
                    $scope.selected.goto.depCity = $scope.search.depCity;
                    $scope.selected.goto.arrCity = $scope.search.arrCity;
                    var flight = $.extend(flight, baseinfo);

                    $scope.selected.goto.flight = flight;
                    $scope.selected.goto.seatItem = seatItem;
                    $scope.selected.goto.flight.seatItems = [seatItem];

                    //如果选择了返程
                    if (!search.oneway) {
                        $scope.btnName = "预订";
                        $scope.selectedflight = true;
                        $scope.myStyle.displayflight.display = "block";
                        $scope.search.date = $filter("date")(search.backDate, "yyyy-MM-dd");
                        $scope.search.week = search.backWeek;
                        $scope.search.depCode = search.current.arrCode;
                        $scope.search.depCity = search.current.arrCity;
                        $scope.search.arrCode = search.current.depCode;
                        $scope.search.arrCity = search.current.depCity;
                        $scope.search.airCode = flight.aircode;
                        //加载返程航班列表
                        $scope.getflightList();
                        return;
                    }
                    ;
                    // 有返程时，选择返程
                } else {
                    $scope.selected.fanchengbiaozhi = 1;
                    $scope.selected.back.date = $filter("date")($scope.search.date, "yyyy/MM/dd");
                    $scope.selected.back.week = $scope.search.week;
                    $scope.selected.back.depCity = $scope.search.depCity;
                    $scope.selected.back.arrCity = $scope.search.arrCity;
                    var flight = $.extend(flight, baseinfo);
                    $scope.selected.back.flight = flight;
                    $scope.selected.back.seatItem = seatItem;
                    $scope.selected.back.flight.seatItems = [seatItem];
                }
                ;

                //保存已选择的信息到缓存
                Storage.set("selected", $scope.selected);
                //跳转到订单页页
                Storage.remove('order');
                Storage.remove('currentContact');
                Storage.remove('userContacts');
                Storage.remove('addressList');
                Storage.remove('mail');
                Storage.remove('costdetail');
                Storage.remove('Insurance');
                Storage.remove('currentselected');
                $state.transitionTo('tab.order');
            };
            $scope.$on('$ionicView.enter', function() {
                $("#titlePrice").addClass("on").siblings().removeClass("on");
                //航班列表排序
                $scope.sortBy = 'sortPrice';
                $scope.sortDesc = false;
                $scope.titleTime = "起飞时间";
                $scope.titlePrice = "价格从低到高";
                $scope.flightSort = function(sortBy) {
                    $scope.sortDesc = !$scope.sortDesc;
                    if ($scope.sortBy != sortBy) {
                        $scope.sortDesc = false;
                    }
                    ;

                    $scope.sortBy = sortBy;
                    if (sortBy == 'sortPrice') {
                        $scope.titleTime = "起飞时间";
                        $scope.titlePrice = $scope.sortDesc ? "价格从高到低" : "价格从低到高";
                    } else {
                        $scope.titlePrice = "价格";
                        $scope.titleTime = $scope.sortDesc ? "时间从晚到早" : "时间从早到晚";
                    }
                    ;
                };

                //筛选条件
                //筛选条件－航空公司
                $scope.airArr = new Array();
                $scope.chkAll_air = true;
                $scope.chkAir = function(chkAll) {
                    if (chkAll) {
                        $scope.chkAll_air = true;
                        $scope.airArr = new Array();
                        angular.forEach($scope.airports, function(item) {
                            item['chk'] = false;
                        });
                    } else {
                        angular.forEach($scope.airports, function(item) {
                            var idx = $scope.airArr.indexOf(item['aircode']);
                            if (item['chk']) {
                                if (idx < 0) {
                                    $scope.airArr.push(item['aircode']);
                                }
                                ;
                            } else {
                                if (idx >= 0) {
                                    $scope.airArr.splice(idx, 1);
                                }
                                ;
                            }
                            ;
                        });
                    }
                    ;
                };
                //筛选条件－舱位
                $scope.seatArr = new Array();
                $scope.chkAll_seat = true;
                //不限：true
                $scope.chkSeat = function(chkAll) {
                    if (chkAll) {
                        $scope.chkAll_seat = true;
                        $scope.seatArr = new Array();
                        angular.forEach($scope.seatClass, function(item) {
                            item['chk'] = false;
                        });
                    } else {
                        angular.forEach($scope.seatClass, function(item) {
                            var idx = $scope.seatArr.indexOf(item['seatMsg']);
                            if (item['chk']) {
                                if (idx < 0) {
                                    $scope.seatArr.push(item['seatMsg']);
                                }
                                ;
                            } else {
                                if (idx >= 0) {
                                    $scope.seatArr.splice(idx, 1);
                                }
                                ;
                            }
                            ;
                        });
                    }
                    ;
                };
                //筛选条件－起飞机场
                $scope.depAirPortArr = new Array();
                $scope.chkAll_depAirPort = true;
                //不限：true
                $scope.chkdepAirPort = function(chkAll) {
                    if (chkAll) {
                        $scope.chkAll_depAirPort = true;
                        $scope.depAirPortArr = new Array();
                        angular.forEach($scope.orgairp, function(item) {
                            item['chk'] = false;
                        });
                    } else {
                        angular.forEach($scope.orgairp, function(item) {
                            var idx = $scope.depAirPortArr.indexOf(item['orgAirport']);
                            if (item['chk']) {
                                if (idx < 0) {
                                    $scope.depAirPortArr.push(item['orgAirport']);
                                }
                                ;
                            } else {
                                if (idx >= 0) {
                                    $scope.depAirPortArr.splice(idx, 1);
                                }
                                ;
                            }
                            ;
                        });
                    }
                    ;
                };
                //筛选条件－降落机场
                $scope.arrAirPortArr = new Array();
                $scope.chkAll_arrAirPort = true;
                $scope.chkarrAirPort = function(chkAll) {
                    if (chkAll) {
                        $scope.chkAll_arrAirPort = true;
                        $scope.arrAirPortArr = new Array();
                        angular.forEach($scope.dstairp, function(item) {
                            item['chk'] = false;
                        });
                    } else {
                        angular.forEach($scope.dstairp, function(item) {
                            var idx = $scope.arrAirPortArr.indexOf(item['dstAirport']);
                            if (item['chk']) {
                                if (idx < 0) {
                                    $scope.arrAirPortArr.push(item['dstAirport']);
                                }
                                ;
                            } else {
                                if (idx >= 0) {
                                    $scope.arrAirPortArr.splice(idx, 1);
                                }
                                ;
                            }
                            ;
                        });
                    }
                    ;
                };
                //筛选条件－起飞时间
                $scope.timelist = [{
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
                $scope.timeArr = new Array();
                $scope.chkAll_time = true;
                $scope.chkTime = function(chkAll) {
                    if (chkAll) {
                        $scope.chkAll_time = true;
                        $scope.timeArr = new Array();
                        angular.forEach($scope.timelist, function(item) {
                            item['chk'] = false;
                        });
                    } else {
                        angular.forEach($scope.timelist, function(item) {
                            var idx = $scope.timeArr.indexOf(item['id']);
                            if (item['chk']) {
                                if (idx < 0) {
                                    $scope.timeArr.push(item['id']);
                                }
                                ;
                            } else {
                                if (idx >= 0) {
                                    $scope.timeArr.splice(idx, 1);
                                }
                                ;
                            }
                            ;
                        });
                    }
                    ;
                };
                //清空筛选条件
                $scope.clearfilter = function() {
                    $scope.chkAir(true);
                    $scope.chkTime(true);
                };
                //筛选航班列表{确定、取消事件}
                $scope.filter = Array();
                $scope.airfilter = new Array();
                $scope.timefilter = new Array();
                $scope.seatfilter = new Array();
                $scope.depairportfilter = new Array();
                $scope.arrairportfilter = new Array();
                //确定：true
                $scope.flightfilter = function(confirm) {
                    if (confirm) {
                        var arr = new Array();
                        arr = arr.concat($scope.airArr);
                        $scope.airfilter = arr;
                        arr = new Array();
                        arr = arr.concat($scope.timeArr);
                        $scope.timefilter = arr;
                        arr = new Array();
                        arr = arr.concat($scope.seatArr);
                        $scope.seatfilter = arr;
                        arr = new Array();
                        arr = arr.concat($scope.depAirPortArr);
                        $scope.depairportfilter = arr;
                        arr = new Array();
                        arr = arr.concat($scope.arrAirPortArr);
                        $scope.arrairportfilter = arr;
                    } else {
                        $scope.chkAll_air = false;
                        $scope.chkAll_time = false;
                        $scope.chkAll_depAirPortArr = false;
                        $scope.chkAll_arrAirPortArr = false;
                        angular.forEach($scope.flights, function(item) {
                            var key = item['aircode'];
                            item['chk'] = ($scope.airfilter.indexOf(key) >= 0);
                        });
                        angular.forEach($scope.timelist, function(item) {
                            var key = item['id'];
                            item['chk'] = ($scope.timefilter.indexOf(key) >= 0);
                        });
                        angular.forEach($scope.seatClass, function(item) {
                            var key = item['seatMsg'];
                            item['chk'] = ($scope.seatfilter.indexOf(key) >= 0);
                        });
                        angular.forEach($scope.orgairp, function(item) {
                            var key = item['orgAirport'];
                            item['chk'] = ($scope.depairportfilter.indexOf(key) >= 0);
                        });
                        angular.forEach($scope.dstairp, function(item) {
                            var key = item['dstAirport'];
                            item['chk'] = ($scope.arrairportfilter.indexOf(key) >= 0);
                        });
                    }
                    ;
                    $scope.filter = {
                        air: $scope.airfilter,
                        deptime: $scope.timefilter,
                        seat: $scope.seatfilter,
                        depAirPort: $scope.depairportfilter,
                        arrAirPort: $scope.arrairportfilter
                    };
                    $scope.newflights = $filter("flight_filter")($scope.flights, $scope.filter);
                };
            });

        })
        .controller('MydateCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            $scope.title = '选择日期';
            // 跳转首页
            $scope.back = function() {
                $state.transitionTo('tab.home');
            };

            // 标题
            // 获取日期
            $scope.dateLists = time;

            //加载样式
            $scope.loadClass = function(p, type) {

                var gotoDate = $stateParams['gotoDate'];
                var backDate = $stateParams['backDate'];

                var depDate = $filter("date")(gotoDate, "yyyy-MM-dd");
                var arrDate = $filter("date")(backDate, "yyyy-MM-dd");

                if (depDate == p.solar || arrDate == p.solar) {
                    return (p.week == '周日' || p.week == '周六') ? "c_ff6d6d on" : "on";
                } else {
                    return (p.week == '周日' || p.week == '周六') ? "c_ff6d6d" : "";
                }
                ;
            };

            // 点击跳转到选择页面
            var lr = $stateParams['lr'];
            $scope.showHomePage = function(p) {
                Storage.remove('lr');
                Storage.set('lr', lr);
                if (lr == 'left') {
                    Storage.set('left', p.solar);
                    Storage.remove('right');
                    $state.transitionTo('tab.home');
                }
                ;

                if (lr == 'right') {
                    Storage.set('right', p.solar);
                    Storage.remove('left');
                    $state.transitionTo('tab.home');
                }
                ;
                if (lr == 0) {
                    Storage.set('flight', p.solar);
                    $state.transitionTo('query');
                }
                ;
                if (lr == 1) {
                    Storage.set('gotoDate', p.solar);
                    $state.transitionTo('tab.train');
                }
                ;
                if (lr == 2) {
                    Storage.set('gotoDate', p.solar);
                    $state.transitionTo('trainList');
                }
                ;
            };

            //返回
            $scope.back = function() {
                if (lr == 0) {
                    $state.transitionTo('query');
                } else if (lr == 1) {
                    $state.transitionTo('tab.train');
                } else if (lr == 2) {
                    $state.transitionTo('trainList');
                } else {
                    $state.transitionTo('tab.home');
                }
                ;
            };

        })
        .controller('OrderCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, $ionicPopover, Storage, MsgBox, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            $scope.gotoQuery = function() {
                $state.transitionTo('query');
            };
            $scope.gotoTaitou = function() {
                $state.transitionTo('fapiaotaitou');
            };
            $ionicModal.fromTemplateUrl('templates/safe.html', {
    scope: $scope,
    animation: 'slide-in-left',
  
  }).then(function(modal) {
    $scope.safebaoxian = modal;
  });
  $scope.safef = function(p,x) {        
        console.log(p);
        console.log(x);
    $scope.safebaoxian.show();
    if(p==false){
      angular.element('span').removeClass('changeDiv');       
      angular.element('.Cimg--1 span').addClass('changeDiv');
    }else{
      if (x==1) {
        angular.element('span').removeClass('changeDiv');       
        angular.element('.Cimg-1 span').addClass('changeDiv');    
      } else if(x==-1){
        angular.element('span').removeClass('changeDiv');       
        angular.element('.Cimg--1 span').addClass('changeDiv');         
      }else{
        angular.element('span').removeClass('changeDiv');       
        angular.element('.Cimg-0 span').addClass('changeDiv');        
      }
    
    }

  }
  //当我们用到模型时，清除它！
  $scope.$on('$destroy', function() {
    $scope.safebaoxian.remove();
  });
  // 当隐藏的模型时执行动作
  $scope.$on('modal.hide', function() {
    // 执行动作
  });
  // 当移动模型时执行动作
  $scope.$on('modal.removed', function() {
    // 执行动作
  });
            var train = '';
            //基本参数{人数、单价、总价（单价与总价包含了去程与回程的）}
            $scope.costdetail = {
                goto: {
                    adult: {
                        totalprice: 0,
                        unitprice: 0,
                        airporttax: 0,
                        insurance: 0,
                        insurances: {
                            accident: 0,
                            dallyover: 0

                        }

                    },
                    child: {
                        totalprice: 0,
                        unitprice: 0,
                        airporttax: 0,
                        insurance: 0,
                        insurances: {
                            accident: 0,
                            dallyover: 0

                        }

                    },
                    total: {
                        totalprice: 0,
                        airporttax: 0

                    }

                },
                back: {
                    adult: {
                        totalprice: 0,
                        unitprice: 0,
                        airporttax: 0,
                        insurance: 0,
                        insurances: {
                            accident: 0,
                            dallyover: 0

                        }

                    },
                    child: {
                        totalprice: 0,
                        unitprice: 0,
                        airporttax: 0,
                        insurance: 0,
                        insurances: {
                            accident: 0,
                            dallyover: 0

                        }

                    },
                    total: {
                        totalprice: 0,
                        airporttax: 0

                    }

                },
                adult: {
                    count: 0

                },
                child: {
                    count: 0

                },
                totalprice: 0,
                expressfee: 0,
                insurances: {
                    accident: 0,
                    dallyover: 0

                }

            };

            var yonghuid = 1;
            //联系人 初始化

            $scope.currentContact = {
                id: 0,
                xingming: "",
                shoujihaoma: ""

            };

            $scope.chooseId = new Array();
            $scope.currentselected = {
                adult: {
                    count: 0

                },
                child: {
                    count: 0

                }
            };

            $scope.goto = {
                mealPolicy: {adult:'',child:''}
            };
            $scope.back = {
                mealPolicy: {adult:'',child:''}
            };

            // 保险初始化
            $scope.tripCount = 1; // 在航班往返程中确定, 现在设为单程1


            $scope.Insurance = {
                accident: {
                    buy: true,
                    goto: {
                        unitprice: 0,
                        insuredAmount: 0,
                        product: ""

                    },
                    back: {
                        unitprice: 0,
                        insuredAmount: 0,
                        product: ""

                    }

                },
                dallyover: {
                    buy: false,
                    goto: {
                        unitprice: 0,
                        insuredAmount: 0,
                        product: ""

                    },
                    back: {
                        unitprice: 0,
                        insuredAmount: 0,
                        product: ""

                    }

                }

            };

            // //邮寄信息

            $scope.mail = {
                index: '',
                isMail: false,
                displayprice: 20,
                totalprice: 0,
                shoujianrenmingzi: "",
                shoujihao: "",
                dizhi: "",
                lastDepTime: ""

            };

            $scope.userContacts = '';
            var yonghuid = 1;

            $scope.sf = sf;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            $scope.yonghuid = {
                yonghuid: yonghuid,
                sf: sf,
                csrf_test_name: csrf_test_name
            };

            if ($scope.sf == '') {
                $scope.issf = 0;
            } else {
                $scope.issf = 1;
            }
            ;

            // 再次加载
            $scope.$on('$ionicView.enter', function() {
                if ($scope.sf == '') {
                    $scope.issf = 0;
                } else {
                    $scope.issf = 1;
                }
                ;

                // 乘客列表
                var userContacts = Storage.get('userContacts');
                if (userContacts != null) {
                    $scope.userContacts = userContacts;
                } else {
                    // 是否为第三方 sf空自营.联系人为本人
                    if ($scope.sf == '' || 1==1) {
                        var yonghuid = Storage.get("UserId");
                        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                        var csrf_test_name = getCsrf();
                        $scope.yonghuid = {
                            yonghuid: yonghuid,
                            sf: sf,
                            csrf_test_name: csrf_test_name
                        };

                        //  自营登陆后直接在本地取
                        var yonghuid = Storage.get('UserId');

                        $scope.yonghuid = {
                            yonghuid: yonghuid,
                            sf: sf,
                            csrf_test_name: csrf_test_name
                        };

                        $http.post(ENV.api + '/app/db/yonghu/find', objtops($scope.yonghuid)).success(function(data1) {
                            if (data1 != 'false') {
                                $scope.currentContact = data1;
                            } else {
                                $scope.currentContact = '';
                            }
                            Storage.set('currentContact', $scope.currentContact);

                        });

                        $http.post(ENV.api + '/app/db/passenger/select', objtops($scope.yonghuid)).success(function(data2) {

                            if (data2 != 'false') {
                                $scope.userContacts = data2;
                            } else {
                                $scope.userContacts = '';
                            }
                            ;
                            Storage.set('userContacts', $scope.userContacts);
                        });
                        $http.post(ENV.api + '/app/db/address/select', objtops($scope.yonghuid)).success(function(data3) {
                            if (data3 != 'false') {
                                $scope.addressList = data3;
                            } else {
                                $scope.addressList = '';
                            }
                            ;
                            Storage.set('addressList', $scope.addressList);

                        });

                    } else {
                        $scope.userContacts = '';
                        $scope.currentContact = '';
                        $scope.addressList = '';
                        Storage.set('userContacts', $scope.userContacts);
                        Storage.set('currentContact', $scope.currentContact);
                        Storage.set('addressList', $scope.addressList);
                    }
                    ;

                }
                ;

                // 选择乘客
                var currentselected = Storage.get('currentselected');
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

                }
                ;
                Storage.set('currentselected', $scope.currentselected)
                // 联系人
                var currentContact = Storage.get('currentContact');
                if (currentContact != null) {
                    $scope.currentContact = currentContact;
                }
                ;

                // 邮递地址 列表
                var addressList = Storage.get('addressList');
                if (addressList != null) {
                    $scope.addressList = addressList;
                }
                ;

                // 邮递
                var mail = Storage.get('mail');
                if (mail != null) {
                    $scope.mail = mail;

                    if ($scope.mail.isMail) {
                        $scope.display.mail.display = "block";
                    } else {
                        $scope.display.mail.display = "none";
                    }
                    ;
                } else {
                    $scope.mail = {
                        index: '',
                        isMail: false,
                        displayprice: 20,
                        totalprice: 0,
                        shoujianrenmingzi: "",
                        shoujihao: "",
                        dizhi: "",
                        lastDepTime: ""
                    };
                    $scope.display.mail.display = "none";

                }
                ;
                Storage.set('mail', $scope.mail);

                // 更改人数

                $scope.costdetail.adult.count = $scope.currentselected.adult.count;
                $scope.costdetail.child.count = $scope.currentselected.child.count;

                // 更改邮递费用

                $scope.costdetail.expressfee = $scope.mail.isMail ? $scope.mail.displayprice : 0;

                Storage.set('costdetail', $scope.costdetail);

            });

            //  加载完
            $scope.$on('$ionicView.afterEnter', function() {

                $scope.calcTotalPrice();
            })

            $scope.$on('$ionicView.unloaded', function() {
                Storage.remove('currentContact');
                Storage.remove('userContacts');
                Storage.remove('addressList');
                Storage.remove('costdetail');

            })

            $scope.$on("$ionicView.beforeEnter", function() {

                $scope.taitou = {
                    isTaitou: false,
                    type: "",
                    name: "",
                    shuihao: ""
                };

                //获取发票抬头
                var air_taitou = Storage.get("air_taitou");
                if (air_taitou != null) {
                    $scope.taitou.isTaitou = air_taitou.isTaitou;
                    $scope.taitou.type = air_taitou.type;
                    $scope.taitou.name = air_taitou.name;
                    $scope.taitou.shuihao = air_taitou.shuihao;
                }
                ;

                //读取费用缓存

                var costdetail = Storage.get("costdetail");

                if (costdetail != null) {

                    $scope.costdetail.adult = costdetail.adult;

                    $scope.costdetail.child = costdetail.child; // 人数

                    $scope.costdetail.totalprice = costdetail.totalprice;

                    $scope.costdetail.expressfee = costdetail.expressfee;

                    $scope.costdetail.insurances = costdetail.insurances;
                } else {
					  $scope.costdetail = {
						  goto: {
							  adult: {
								  totalprice: 0,
								  unitprice: 0,
								  airporttax: 0,
								  insurance: 0,
								  insurances: {
									  accident: 0,
									  dallyover: 0

								  }

							  },
							  child: {
								  totalprice: 0,
								  unitprice: 0,
								  airporttax: 0,
								  insurance: 0,
								  insurances: {
									  accident: 0,
									  dallyover: 0

								  }

							  },
							  total: {
								  totalprice: 0,
								  airporttax: 0

							  }

						  },
						  back: {
							  adult: {
								  totalprice: 0,
								  unitprice: 0,
								  airporttax: 0,
								  insurance: 0,
								  insurances: {
									  accident: 0,
									  dallyover: 0

								  }

							  },
							  child: {
								  totalprice: 0,
								  unitprice: 0,
								  airporttax: 0,
								  insurance: 0,
								  insurances: {
									  accident: 0,
									  dallyover: 0

								  }

							  },
							  total: {
								  totalprice: 0,
								  airporttax: 0

							  }

						  },
						  adult: {
							  count: 0

						  },
						  child: {
							  count: 0

						  },
						  totalprice: 0,
						  expressfee: 0,
						  insurances: {
							  accident: 0,
							  dallyover: 0

						  }

					  };					
				};

                //已选择的航班信息缓存


                var selected = Storage.get("selected");

                if (selected.goto.date != "") {

                    if (costdetail != null && costdetail.goto != '') {

                        $scope.costdetail.goto = costdetail.goto;

                    }
                    ;

                    $scope.mail.lastDepTime = selected.goto.date + " " + selected.goto.flight.depTime;

                    //计算飞行时间

                    selected.goto.date = new Date(selected.goto.date.replace(/-/g, "/")); //兼容苹果手机 replace(/-/g, "/")

                    var minute = publicService.CalcTimeDiff(selected.goto.flight.depTime, selected.goto.flight.arriTime);

                    if (minute < 0) {

                        selected.goto.interday = 1;

                        minute = minute + 24 * 60;

                    }
                    ;

                    selected.goto.flightTime = parseInt(minute / 60) + "小时" + (minute % 60 == 0 ? "" : (minute % 60 + "分钟"));

                    $scope.costdetail.goto.adult.unitprice = parseFloat(selected.goto.seatItem.parPrice);

                    $scope.costdetail.goto.child.unitprice = Math.round(parseFloat(selected.goto.flight.basePrice) * 0.5 / 10) * 10;

                    $scope.costdetail.goto.adult.airporttax = parseFloat(selected.goto.flight.airportTax[0]);

                    $scope.costdetail.goto.total.airporttax = parseFloat(selected.goto.flight.airportTax[0]) + $scope.costdetail.goto.child.airporttax;

                    $scope.tripCount = 1;

                }
                ;

                if (selected.back.date != "") {

                    if (costdetail != null && costdetail.back != '') {

                        $scope.costdetail.back = costdetail.back;

                    }
                    ;

                    $scope.mail.lastDepTime = selected.back.date + " " + selected.back.flight.depTime;

                    selected.back.date = new Date(selected.back.date.replace(/-/g, "/")); //兼容苹果手机 .replace(/-/g, "/")

                    var minute = publicService.CalcTimeDiff(selected.back.flight.depTime, selected.back.flight.arriTime);

                    if (minute < 0) {

                        selected.goto.interday = 1;

                        minute = minute + 24 * 60;

                    }
                    ;

                    selected.back.flightTime = parseInt(minute / 60) + "小时" + (minute % 60 == 0 ? "" : (minute % 60 + "分钟"));

                    $scope.costdetail.back.adult.unitprice = parseFloat(selected.back.seatItem.parPrice);

                    $scope.costdetail.back.child.unitprice = Math.round(parseFloat(selected.back.flight.basePrice) * 0.5 / 10) * 10;

                    $scope.costdetail.back.adult.airporttax = parseFloat(selected.back.flight.airportTax[0]);

                    $scope.costdetail.back.total.airporttax = parseFloat(selected.back.flight.airportTax[0]) + $scope.costdetail.back.child.airporttax;

                    $scope.tripCount = 2;

                } else {
                  $scope.Insurance.accident.back.product = '';
                  $scope.Insurance.accident.back.unitprice = 0;
                  $scope.Insurance.accident.back.insuredAmount = 0;					
				};
                $scope.selected = selected;

                // 退改签
                // 初始化
                $scope.myStyle = {
                    display_adult: {
                        "display": "none"
                    },
                    display_child: {
                        "display": "none"

                    }
                };
                $scope.display_mp = {
                    "display": "none"

                };

                var date = $filter("date")($scope.selected.goto.date, "yyyy-MM-dd");
                var aircode = $scope.selected.goto.flight.aircode;
                var orgAirport = $scope.selected.goto.flight.orgAirport;
                var dstAirport = $scope.selected.goto.flight.dstAirport;
                var seatCode = $scope.selected.goto.seatItem.seatCode[0];

                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                var tuigaiqian = {
                    date: date,
                    aircode: aircode,
                    orgAirport: orgAirport,
                    dstAirport: dstAirport,
                    seatCode: seatCode,
                    sf: sf,
                    csrf_test_name: csrf_test_name
                };

				$rootScope.goto = '';
				$rootScope.back = '';
				$http.post(ENV.api + '/app/db/order/tuigai', objtops(tuigaiqian)).success(function(data) {
					$rootScope.goto = data['all'];				
					$scope.goto.mealPolicy.adult= data[0];
					$scope.goto.mealPolicy.child= data[1];
				
				});

                // 回程
                if (selected.back.date != '') {
                    var date = $filter("date")($scope.selected.back.date, "yyyy-MM-dd");
                    var aircode = $scope.selected.back.flight.aircode;
                    var orgAirport = $scope.selected.back.flight.orgAirport;
                    var dstAirport = $scope.selected.back.flight.dstAirport;

                    var seatCode = $scope.selected.back.seatItem.seatCode[0];

                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var tuigaiqian = {
                        date: date,
                        aircode: aircode,
                        orgAirport: orgAirport,
                        dstAirport: dstAirport,
                        seatCode: seatCode,
                        sf: sf,
                        csrf_test_name: csrf_test_name
                    };

                    $http.post(ENV.api + '/app/db/order/tuigai', objtops(tuigaiqian)).success(function(data) {
                            $scope.back.mealPolicy.adult= data[0];
                            $scope.back.mealPolicy.child= data[1];							
							$rootScope.back = data['all'];
							$scope.display_mp.display = "block";

                        });
                };
            });

            //读取缓存-end


            //计算总费用

            $scope.calcTotalPrice = function() {

                if ($scope.costdetail.adult.count < 0) {
                    $scope.costdetail.adult.count = 0;
                }
                ;

                if ($scope.costdetail.child.count < 0) {
                    $scope.costdetail.child.count = 0;
                }
                ;

                //去程成人航空意外险

                $scope.costdetail.goto.adult.insurances.accident = $scope.Insurance.accident.goto.unitprice * ($scope.costdetail.adult.count > 0 ? $scope.costdetail.adult.count : 0);

                //去程成人延误取消险

                $scope.costdetail.goto.adult.insurances.dallyover = $scope.Insurance.dallyover.goto.unitprice * ($scope.costdetail.adult.count > 0 ? $scope.costdetail.adult.count : 0);

                //去程成人保险总单价

                $scope.costdetail.goto.adult.insurance = $scope.costdetail.goto.adult.insurances.accident + $scope.costdetail.goto.adult.insurances.dallyover;

                //去程儿童航空意外险

                $scope.costdetail.goto.child.insurances.accident = $scope.Insurance.accident.goto.unitprice * ($scope.costdetail.child.count > 0 ? $scope.costdetail.child.count : 0);

                //去程儿童延误取消险

                $scope.costdetail.goto.child.insurances.dallyover = $scope.Insurance.dallyover.goto.unitprice * ($scope.costdetail.child.count > 0 ? $scope.costdetail.child.count : 0);

                //去程儿童保险总单价

                $scope.costdetail.goto.child.insurance = $scope.costdetail.goto.child.insurances.accident + $scope.costdetail.goto.child.insurances.dallyover;

                //回程成人航空意外险

                $scope.costdetail.back.adult.insurances.accident = $scope.Insurance.accident.back.unitprice * ($scope.costdetail.adult.count > 0 ? $scope.costdetail.adult.count : 0);

                //回程成人延误取消险

                $scope.costdetail.back.adult.insurances.dallyover = $scope.Insurance.dallyover.back.unitprice * ($scope.costdetail.adult.count > 0 ? $scope.costdetail.adult.count : 0);

                //回程成人保险总单价

                $scope.costdetail.back.adult.insurance = $scope.costdetail.back.adult.insurances.accident + $scope.costdetail.back.adult.insurances.dallyover;

                //回程儿童航空意外险

                $scope.costdetail.back.child.insurances.accident = $scope.Insurance.accident.back.unitprice * ($scope.costdetail.child.count > 0 ? $scope.costdetail.child.count : 0);

                //回程儿童延误取消险

                $scope.costdetail.back.child.insurances.dallyover = $scope.Insurance.dallyover.back.unitprice * ($scope.costdetail.child.count > 0 ? $scope.costdetail.child.count : 0);

                //回程儿童保险总单价

                $scope.costdetail.back.child.insurance = $scope.costdetail.back.child.insurances.accident + $scope.costdetail.back.child.insurances.dallyover;

                //航空意外险总额

                $scope.costdetail.insurances.accident = $scope.costdetail.goto.adult.insurances.accident + $scope.costdetail.goto.child.insurances.accident + $scope.costdetail.back.adult.insurances.accident + $scope.costdetail.back.child.insurances.accident;

                //延误取消险总额

                $scope.costdetail.insurances.dallyover = $scope.costdetail.goto.adult.insurances.dallyover + $scope.costdetail.goto.child.insurances.dallyover + $scope.costdetail.back.adult.insurances.dallyover + $scope.costdetail.back.child.insurances.dallyover;

                //去程成人[(机票销售价　+　燃油税) * 乘客数　+　保险总价]

                var goto_adult = $scope.costdetail.goto.adult;

                $scope.costdetail.goto.adult.totalprice = (goto_adult.unitprice + goto_adult.airporttax) * $scope.costdetail.adult.count + goto_adult.insurance;

                //去程儿童[(机票销售价　+　燃油税) * 乘客数　+　保险总价]

                var goto_child = $scope.costdetail.goto.child;

                $scope.costdetail.goto.child.totalprice = (goto_child.unitprice + goto_child.airporttax) * $scope.costdetail.child.count + goto_child.insurance;

                //回程成人[(机票销售价　+　燃油税) * 乘客数　+　保险总价]

                var back_adult = $scope.costdetail.back.adult;

                $scope.costdetail.back.adult.totalprice = (back_adult.unitprice + back_adult.airporttax) * $scope.costdetail.adult.count + back_adult.insurance;

                //回程儿童[(机票销售价　+　燃油税) * 乘客数　+　保险总价]

                var back_child = $scope.costdetail.back.child;

                $scope.costdetail.back.child.totalprice = (back_child.unitprice + back_child.airporttax) * $scope.costdetail.child.count + back_child.insurance;

                //去程总额

                $scope.costdetail.goto.totalprice = goto_adult.totalprice + goto_child.totalprice;

                //回程总额

                $scope.costdetail.back.totalprice = back_adult.totalprice + back_child.totalprice;

                //总金额

                $scope.costdetail.totalprice = $scope.costdetail.goto.totalprice + $scope.costdetail.back.totalprice + $scope.costdetail.expressfee;

                Storage.set("costdetail", $scope.costdetail);

            };

            // $scope.calcTotalPrice(); //  要到最后算


            // 联系人跳转  bool true自营平台进入编辑界面 false 第三方进入短信发送界面
            $scope.contacts = function(bool) {
                if (bool == true) {
                    $state.transitionTo('tab.contactsEdit');
                } else {
                    $state.transitionTo('tab.contactsAdd');
                }
                ;
            };

            //飞机往返程信息切换效果
            $scope.goto_spread_shrink = function($event) {

                var nsdisplay = angular.element('.goto_spread').css('display');
                if (nsdisplay == 'none') {

                    angular.element(".down_arrow_goto").addClass("salse180").removeClass("salse000");

                    angular.element(".goto_spread").stop().slideDown();

                    angular.element(".goto_shrink").stop().slideUp();

                    angular.element(".nskkt_box1 > div:last").removeClass("border_b_1_dc");

                } else {

                    angular.element(".down_arrow_goto").addClass("salse000").removeClass("salse180");

                    angular.element(".goto_shrink").stop().slideDown();

                    angular.element(".goto_spread").stop().slideUp();

                }
                ;

            };

            // 费用明细弹出切换效果
            $scope.mingxi = function() {

                var nsdisplay = angular.element(".minsjBox").css("display");

                if (nsdisplay == "none") {

                    angular.element(".bitu_bg").find("i").addClass("salse180").removeClass("salse000");

                    angular.element(".minsjBox").stop().slideDown();

                } else {

                    angular.element(".bitu_bg").find("i").addClass("salse000").removeClass("salse180");

                    angular.element(".minsjBox").stop().slideUp();

                }
                ;

            };

        // 飞机退改签
        $ionicModal.fromTemplateUrl('templates/airtuigaiorder.html', {
            scope: $scope,
            animation: 'slide-in-left',

        }).then(function (modal) {
            $scope.airtuigai = modal;
        });


        $scope.getMealPolicy= function($event) {
            $scope.airtuigai.show($event);
        };



            // -------------乘客信息--------------


            // 乘客信息跳转 isEdit true 编辑 false 更改乘客
            $scope.displayUserContact = function(isEdit, p) {
                if (isEdit) {
                    $state.transitionTo('tab.passengerEdit', {
                        isEdit: isEdit,
                        p: p
                    });
                } else {
                    $state.transitionTo('tab.passenger');
                }
                ;
            };

            //移除乘客

            $scope.selectedRemove = function(idx) {

                $scope.userContacts[idx]['chk'] = false;

                if ($scope.userContacts[idx]['type'] == 0) {

                    $scope.currentselected.adult.count -= 1;

                    if ($scope.currentselected.adult.count < 0) {
                        $scope.currentselected.adult.count = 0;
                    }
                    ;

                } else {

                    $scope.currentselected.child.count -= 1;

                    if ($scope.currentselected.child.count < 0) {
                        $scope.currentselected.child.count = 0;
                    }
                    ;


                }
                ;

                $scope.costdetail.adult.count = $scope.currentselected.adult.count;

                $scope.costdetail.child.count = $scope.currentselected.child.count;

                // Storage.set('costdetail', $scope.costdetail); //更改人数

                Storage.set('currentselected', $scope.currentselected);
                Storage.set('userContacts', $scope.userContacts);
                $scope.calcTotalPrice();
            };

            //进入乘客列表
            $scope.passenger = function() {
                $state.transitionTo('tab.passenger');

            };
            $scope.safe = function(p) {
        
                $state.transitionTo('tab.safe');        
            };
            // -------------------------------  邮递地址 --------------------------------------------------


            //是否显示出生日期 邮递地址

            $scope.myStyle = {
                birthday: {
                    "display": "none"

                },
                selectAddress: {
                    "display": "none"

                },
                displayAddress: {
                    "display": "none"

                }

            };

            $scope.display = {
                mail: {
                    "display": "none"

                }

            };

            //选择或取消邮寄地址

            $scope.chooseMail = function() {
                //$scope.mail.isMail = isMail;
                //$scope.display.mail.display = "block";
                $state.transitionTo('tab.address');
                //Storage.set('mail', $scope.mail);
            };
            $scope.cancel = function(isMail) {
                Storage.remove('air_taitou');
                $scope.taitou.isTaitou = false;
                $scope.taitou.name = '';
                $scope.mail.isMail = isMail;
                $scope.display.mail.display = "none";
                // 更改邮递费用
                if (!isMail) {
                    $scope.costdetail.totalprice = $scope.costdetail.totalprice - $scope.mail.displayprice;
                    Storage.set('costdetail', $scope.costdetail);
                }
                ;

                Storage.set('mail', $scope.mail);
            };

            // 更改邮件地址，新增地址跳到地址列表页
            $scope.address = function() {
                Storage.set('mail', $scope.mail);
                $state.transitionTo('tab.address');
            };

            //-------------------------------------------------------保险---------------------------
            //保险信息


            $scope.baoxian = {
                sf: sf,
                csrf_test_name: csrf_test_name
            };

            $http.post(ENV.api + '/app/db/baoxian/select', objtops($scope.baoxian)).success(function(data4) {

                $scope.accidents = data4.accident;

                $scope.dallyovers = data4.dallyover;

                if ($scope.accidents.length == 0) {

                    $scope.Insurance.accident.buy = false;

                }
                ;
                if ($scope.dallyovers.length > 0) {

                    $scope.dallyover = $scope.dallyovers[0];

                }
                ;
                $scope.changeInsurance($scope.accidents[0]);
            });

            //保险改变

            $scope.changeInsurance = function(p) {

                $scope.accident = p;

                $scope.checkedInsurance($scope.Insurance.accident.buy, $scope.accident, 0);

            };
            $scope.changeSafe = function(id){
        
                angular.element('span').removeClass('changeDiv');
        
                angular.element('.Cimg-'+id+ ' span').addClass('changeDiv');
  
            }
            //选择或取消保险时

            $scope.checkedInsurance = function(buy, insurance, type) {

                if (type == 0) {

                    $scope.Insurance.accident.goto.product = insurance;

                    $scope.Insurance.accident.goto.unitprice = buy ? insurance.xiaoshoudanjia : 0;

                    $scope.Insurance.accident.goto.insuredAmount = buy ? insurance.baoxianjine : 0;

                    //  数据待添加
                    if ($scope.selected.back.date != "") {

                        $scope.Insurance.accident.back.product = insurance;

                        $scope.Insurance.accident.back.unitprice = buy ? insurance.xiaoshoudanjia : 0;

                        $scope.Insurance.accident.back.insuredAmount = buy ? insurance.baoxianjine : 0;

                    }
                    ;

                } else {

                    $scope.Insurance.dallyover.goto.product = insurance;

                    $scope.Insurance.dallyover.goto.unitprice = buy ? insurance.xiaoshoudanjia : 0;

                    $scope.Insurance.dallyover.goto.insuredAmount = buy ? insurance.baoxianjine : 0;

                    if ($scope.selected.back.date != "") {

                        $scope.Insurance.dallyover.back.product = insurance;

                        $scope.Insurance.dallyover.back.unitprice = buy ? insurance.xiaoshoudanjia : 0;

                        $scope.Insurance.dallyover.back.insuredAmount = buy ? insurance.baoxianjine : 0;

                    }
                    ;

                }
                ;

                $scope.calcTotalPrice();

            };

              $scope.saveSafe= function(){
                  var selectDiv = angular.element('.changeDiv');

                  var selectid = selectDiv.attr("select");
                  $scope.selectid = selectid; //选择保险的序列，-1时不买
                  if(selectid == -1){
                    $scope.Insurance.accident.buy = false;
                  } else{
                    $scope.Insurance.accident.buy = true;
                  };
				  $scope.checkedInsurance($scope.Insurance.accident.buy, $scope.accidents[selectid], 0);

                  $scope.safebaoxian.hide();

            };
            // //航空意外险
            $scope.popover = $ionicPopover.fromTemplateUrl('my-Aaicbut.html', {
                scope: $scope
            });
            // fromTemplateUrl() 方法
            $ionicPopover.fromTemplateUrl('my-Aaicbut.html', {
                scope: $scope
            }).then(function(popover) {
                $scope.popover = popover;

            });

            $scope.Aaicbut = function($event) {

                $scope.popover.show($event);
            };
            $scope.closePopover = function() {
                $scope.popover.hide();
            };
            //销毁事件回调处理：清理popover对象
            $scope.$on("$destroy", function() {
                $scope.popover.remove();
            });
            // 隐藏事件回调处理
            $scope.$on("popover.hidden", function() {
                // Execute action
            });
            //删除事件回调处理
            $scope.$on("popover.removed", function() {
                // Execute action
            });

            // 航空延误取消险
            $scope.popover1 = $ionicPopover.fromTemplateUrl('my-Yuanbut.html', {
                scope: $scope
            });

            $ionicPopover.fromTemplateUrl('my-Yuanbut.html', {
                scope: $scope
            }).then(function(popover) {
                $scope.popover1 = popover;
            });
            $scope.Yuanbut = function($event) {

                $scope.popover1.show($event);
            };
            $scope.closePopover = function() {
                $scope.popover1.hide();
            };
            //销毁事件回调处理：清理popover对象
            $scope.$on("$destroy", function() {
                $scope.popover1.remove();
            });
            // 隐藏事件回调处理
            $scope.$on("popover1.hidden", function() {
                // Execute action
            });
            //删除事件回调处理
            $scope.$on("popover1.removed", function() {
                // Execute action
            });

            //提交订单

            $scope.postOrder = function() {
				
				$scope.selected.goto.mealPolicy = $rootScope.goto;
				$scope.selected.back.mealPolicy = $rootScope.back;			
				//console.log($scope.selected.goto.mealPolicy);
                var $flag = true;
                if ($scope.currentContact.xingming == null || $scope.currentContact.xingming == "") {
                    MsgBox.promptBox("请填写联系人姓名", 3000);
                    //return false;
                    $flag = false;
                    return;
                }
                ;
                if ($scope.currentContact.shoujihaoma == null || $scope.currentContact.shoujihaoma == "") {
                    MsgBox.promptBox("请填写联系电话", 3000);
                    //return false;
                    $flag = false;
                    return;
                }
                ;
                //  过滤的为 选择的乘客
                var adult = $filter("contacts_filter")($scope.userContacts, true, {
                    "key": "type",
                    "value": '0'

                });

                var child = $filter("contacts_filter")($scope.userContacts, true, {
                    "key": "type",
                    "value": '1'

                });

                $scope.passengers = {
                    adult: adult,
                    child: child
                };
                if (!effectCommon.formSelsec.addLimain) {
                    //return false;
                    $flag = false;
                }
                ;
                if ($scope.passengers.adult.length == 0 && $scope.passengers.child.length == 0) {

                    MsgBox.promptBox("请选择乘客", 3000);
                    //return false;
                    $flag = false;
                }
                ;
                if ($scope.passengers.adult.length == 0 && $scope.passengers.child.length > 0) {

                    MsgBox.promptBox("您好，儿童不能单独乘机，需由成人陪同。", 3000);
                    //return false;
                    $flag = false;
                }
                ;
                //如果订票人数大于当前可预订的人数时，退出

                if ($scope.selected.goto.seatItem.seatStatus != 'A' && $scope.selected.goto.seatItem.seatStatus - $scope.costdetail.adult.count < 0) {
                    MsgBox.promptBox("对不起，因去程余票有限，最多只能添加" + $scope.selected.goto.seatItem.seatStatus + "名乘客", 3000);
                    //return false;
                    $flag = false;
                }
                ;
                if ($scope.costdetail.adult.count < $scope.costdetail.child.count) {
                    MsgBox.promptBox("对不起，一个成人只允许带一个儿童", 3000);
                    //return false;
                    $flag = false;
                }
                ;
                if ($scope.costdetail.back.totalprice > 0) {

                    if ($scope.costdetail.adult.count > $scope.selected.back.seatItem.seatStatus) {
                        MsgBox.promptBox("对不起，因回程余票有限，最多只能添加" + $scope.selected.back.seatItem.seatStatus + "名乘客", 3000);
                        //return false;
                        $flag = false;
                    }
                    ;
                }
                ;
                if ($scope.currentContact.name == "" || $scope.currentContact.tel == "") {
                    MsgBox.promptBox("请选择联系人");
                    //return false;
                    $flag = false;
                }
                ;
                if ($scope.mail.isMail) {
                    if ($scope.mail.name == "" || $scope.mail.tel == "" || $scope.mail.tel == "") {
                        MsgBox.promptBox("请选择收件地址");
                        //return false;
                        $flag = false;
                    }
                    ;
                    if ($scope.taitou.name == '') {
                        MsgBox.promptBox("请填写发票抬头");
                        $flag = false;
                    }
                    ;
                }
                ;

                //提交订单
                //		var userContacts = JSON.stringify($scope.userContacts);
                //		var currentContact = JSON.stringify($scope.currentContact); // 联系人。
                //		var mail = JSON.stringify($scope.mail); // 收件人。
                //		var Insurance = JSON.stringify($scope.Insurance); // 保险信息
                //		// 地址列表
                //		var selected = JSON.stringify($scope.selected); // 航班信息
                //		var costdetail = JSON.stringify($scope.costdetail); // 费用
                //		var addressList = JSON.stringify($scope.addressList);
                //		var costdetail = JSON.stringify($scope.costdetail);

                //		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                //		var csrf_test_name = getCsrf();

                //		$scope.order = {
                //			currentContact : currentContact,
                //			mail : mail,
                //			addressList : addressList,
                //			Insurance : Insurance,
                //			selected : selected,
                //			userContacts : userContacts,
                //			costdetail : costdetail,
                //                        sf : sf,
                //			csrf_test_name : csrf_test_name
                //		}

                if ($flag === true) {
					console.log($scope.selected);
					//return;
                    $scope.order = {
                        currentContact: $scope.currentContact,
                        mail: $scope.mail,
                        addressList: $scope.addressList,
                        Insurance: $scope.Insurance,
                        selected: $scope.selected,
                        userContacts: $scope.userContacts,
                        costdetail: $scope.costdetail,
                        air_taitou: $scope.taitou
                    };

                    Storage.set("order", $scope.order);
                    Storage.set("sf", sf);
       
                        // 订单中的总金额
                        var total_fee = parseFloat($scope.costdetail.totalprice);

                        var body = "航班" + $scope.selected.goto.depCity + "到" + $scope.selected.goto.arrCity;
                        var attach = '';
                        var goods_tag = '';
                        var detail = '';

                        /*
                         var js = {
                         air: 1,
                         total_fee: total_fee,
                         body: body,
                         attach: attach,
                         goods_tag: goods_tag,
                         detail: detail
                         };
                         var ps = encodeURIComponent(JSON.stringify(js));
                         */
                        //window.location.href = ENV.siteUrl + '/wx/zhifu/' + ps;
                        //window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_sucesss.php?ps=' + ps + '&';
                        //window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi.php?ps=' + ps + '&';

                        // 原方法
                        //window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_air.php?ps=' + ps + '&';
                        //window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_yanzheng.php?ps=' + ps + '&';

                        //$scope.air_ps = ps;
                        //$("#air_ps").val(ps);
                        //$("#tijiaoform").attr('action', 'http://m.bibi321.com/hl/wxpay/jsapi_air.php?ps=' + ps + '&');
                        $("#total_fee").val(total_fee);
                        $("#body").val(body);
                        $("#attach").val(attach);
                        $("#goods_tag").val(goods_tag);
                        $("#detail").val(detail);
                        $("#tijiaoform").submit();
 
                }
                ;

            };

        })

        .controller('fapiaotaitouCtrl', function($scope, $state, $ionicPopup, MsgBox, Storage) {

    $scope.gotoOrder = function() {
        $state.transitionTo('tab.order');

    };

    //进入前
    $scope.$on("$ionicView.beforeEnter", function() {
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
    $scope.leixing = function(p) {
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
        ;
    };

    //清空
    $scope.clearName = function() {
        $scope.taitou.name = '';
    };

    //提示对话框
    $scope.shuihaoTip = function() {
        var alertPopup = $ionicPopup.alert({
            title: '<div class="shuihaoTip">提示</div>',
            template: '纳企业税务登记上唯一识别企业的税号，由15、18或20位数码组成',
            okText: '确定'
        });
        alertPopup.then(function(res) {
        });
    };

    //完成
    $scope.finish = function() {
        if ($scope.taitou.name == '' || $scope.taitou.name == null) {
            MsgBox.promptBox("请输入姓名！", 1500);
            return;
        }
        ;
        if ($scope.taitou.type === "企业" && $scope.taitou.shuihao !== null && $scope.taitou.shuihao !== '') {
            var myreg = /^\d{15}$|^\d{18}$|^\d{20}$/;
            if (!myreg.test($scope.taitou.shuihao)) {
                MsgBox.promptBox("请输入15、18或20位企业税号！", 1500);
                return;
            }
            ;
        }
        ;
        $scope.taitou.isTaitou = true;
        Storage.set('air_taitou', $scope.taitou);
        $state.transitionTo('tab.order');
    };
})

//微信支付
        .controller('WXPayCtrl', ['$scope', 'ENV', 'MsgBox', '$state', '$ionicLoading', '$stateParams', 'Storage',
    function($scope, ENV, MsgBox, $state, $ionicLoading, $stateParams, Storage) {
        //            $scope.$on('$ionicView.enter', function () {
        var order = Storage.get("order");
        //订单详情
        $scope.orderDetail = order.selected;
        //乘客
        $scope.userContacts = order.userContacts;
        //联系人
        $scope.currentContact = order.currentContact;
        //明细单
        $scope.costdetail = order.costdetail;
        //保险
        $scope.Insurance = order.Insurance;
        //            $scope.orderDetail = order.selected;
        //            });

    }
])

// 编辑联系人 自营
        .controller('Contacts_ziyingEditCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, $ionicPopover, Storage, MsgBox, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            var lianxiren = Storage.get('lianxiren');
            $scope.contact = lianxiren;
            $scope.saveContact = function() {

                var contacts_ziying_name = $.trim($('#contacts_ziying_name').val());
                var contacts_ziying_Phone = $.trim($('#contacts_ziying_Phone').val());

                if (publicService.isNull(contacts_ziying_name)) {
                    MsgBox.promptBox('姓名不能为空！');
                    return;
                }
                ;

                if (publicService.isNull(contacts_ziying_Phone)) {
                    MsgBox.promptBox('手机号不能为空！');
                    return;
                }
                ;

                if (!publicService.isNull(lianxiren)) {
                    var users_ziyingEdit = eval('(' + lianxiren + ')');
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        xingming: contacts_ziying_name,
                        shoujihaoma: contacts_ziying_Phone,
                        yuan_shoujihaoma: users_ziyingEdit.shoujihaoma,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/db/yonghudb/ziyingmodifyyonghu', objtops(myobject)).success(function(data) {
                        MsgBox.promptBox("编辑联系人成功！", 2000);
                        window.history.go(-1);
                    }). finally(function() {
                        $ionicLoading.hide();
                    });
                }
                ;

            };

            $scope.back = function() {
                window.history.go(-1);
            };

        })

// 编辑联系人 三方
        .controller('Contacts_sanfangEditCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, $ionicPopover, Storage, MsgBox, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
        })

        .controller('PassengerCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {
            $scope.isdable = {
                check: true
            };
            $scope.$on('$ionicView.enter', function() {
                $('#chk_ts_edit').children('.checkbox').attr('style', 'padding-left:38px;');

                var userContacts = Storage.get('userContacts');
                if (userContacts != null) {
                    $scope.userContacts = userContacts;
                } else {
                    $scope.userContacts = '';
                }
                ;
                var currentselected = Storage.get('currentselected');
                if (currentselected != null) {
                    $scope.currentselected = currentselected;
                }
                ;
                $scope.isdable.check = true;
            });

            // Storage.set('currentselected', $scope.currentselected);

            // Storage.set("userContacts", $scope.userContacts);

            // 监听
            $scope.$watch('userContacts', function(newValue, oldValue, scope) {
                if (newValue === oldValue) {
                    return;
                }
                ;
                $scope.userContacts = newValue;
            });
            $scope.$watch('currentselected', function(newValue, oldValue, scope) {
                if (newValue === oldValue) {
                    return;
                }
                ;
                $scope.currentselected = newValue;
            });
            $scope.displayUserContact = function(isEdit, p) {

                $state.transitionTo('tab.passengerEdit', {
                    isEdit: isEdit,
                    p: p
                });
            };

            //选择或取消乘客时的事件
            $scope.selectedUserContact = function(p, i) {
                var selected = Storage.get('selected');
                var chushengriqi = p.chushengriqi;
                var gotime = selected.goto.date;
                var sd = gotime.split("/");
                var st = chushengriqi.split("-");

                var child = false;
                if (parseInt(sd[0]) - parseInt(st[0]) > 12) {
                }
                else if (parseInt(sd[0]) - parseInt(st[0]) == 12) {
                    if (parseInt(sd[1]) - parseInt(st[1]) > 0) {
                    }
                    else if (parseInt(sd[1]) - parseInt(st[1]) == 0) {
                        if (parseInt(sd[2]) - parseInt(st[2]) <= 0) {
                            child = true;
                        }
                    } else {
                        child = true;
                    }
                    ;
                } else {
                    child = true;
                }
                ;

                if (p.type == 0) {

                    if (p.chk) {
                        $scope.currentselected.adult.count += 1;
                    } else {
                        $scope.currentselected.adult.count -= 1;
                    }
                    ;
                } else {
                    if (child) {
                        if (p.chk) {
                            $scope.currentselected.adult.count += 1;
                        } else {
                            $scope.currentselected.adult.count -= 1;
                        }
                        ;
                    } else {
                        if (p.chk) {

                            $scope.currentselected.child.count += 1;
                        } else {
                            $scope.currentselected.child.count -= 1;
                        }
                        ;
                    }
                    ;

                }
                ;
            };
            //选择乘客确定
            $scope.selectedConfirm = function(confirm) {

                if (confirm) {
                    $scope.currentselected.adult.count = 0;
                    $scope.currentselected.child.count = 0;
                    angular.forEach($scope.userContacts, function(item) {
                        if (item['chk']) {
                            if (item['type'] == 0) {
                                $scope.currentselected.adult.count += 1;
                            } else {
                                $scope.currentselected.child.count += 1;
                            }
                            ;
                        }
                        ;
                    });

                    Storage.set('currentselected', $scope.currentselected);

                    Storage.set("userContacts", $scope.userContacts);

                } else {
                }
                ;

                $state.transitionTo('tab.order');

            };

        })

        .controller('PassengerEditCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, MsgBox, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            //是否显示出生日期

            $scope.myStyle = {
                birthday: {
                    "display": "none"

                },
                soldOut: {
                    "display": "none"

                },
                display_adult: {
                    "display": "none"

                },
                display_child: {
                    "display": "none"

                }

            };

            //乘客输入框对象{姓名输入框，证件类型选择框、证件号码输入、去支付按钮}

            $scope.disable = {
                name: false,
                identityType: false,
                identityNo: false,
                btnPost: false,
                isEdit: false

            };

            // 获得证件列表
            $http.get(ENV.imgUrl + "data/identitys.json")
                    .success(function(data) {

                $scope.identitys = data;

            })

                    .error(function(error) {
                failCallback(error);
            });

            $scope.$on('$ionicView.enter', function(event, data) {

                var userContacts = Storage.get('userContacts');
                $scope.userContacts = userContacts;
                if (userContacts != null) {
                    var isEdit = $stateParams['isEdit'];
                    if (isEdit == 'true') {
                        var i = parseInt($stateParams['p']);
                        $scope.i = i; //索引
                        $scope.userContact = userContacts[i];
                        $scope.disable.identityType = true;
                        $scope.title = '编辑';

                        $scope.userContactOld = {
                            zhongwenming: $scope.userContact.zhongwenming,
                            zhengjianhaoma: $scope.userContact.zhengjianhaoma,
                            chushengriqi: $scope.userContact.chushengriqi,
                            isNew: $scope.userContact.isNew,
                            isDelete: $scope.userContact.isDelete,
                            isEdit: $scope.userContact.isEdit,
                            chk: $scope.userContact.chk

                        };
                        if ($scope.userContact.zhengjianleixing == '身份证') {

                            $scope.myStyle.birthday.display = "none";

                        } else {

                            $scope.myStyle.birthday.display = "block";

                        }
                        ;
                    } else {
                        // 新增乘客
                        $scope.title = '新增';

                        $scope.userContact = {
                            id: "0",
                            yonghuid: '',
                            zhongwenming: "",
                            zhengjianleixing: "身份证",
                            zhengjianhaoma: "",
                            chushengriqi: "",
                            type: 0,
                            isNew: true,
                            isDelete: false,
                            isEdit: false,
                            chk: false
                        };
                    }
                    ;
                } else {
                    $scope.title = '新增';

                    $scope.userContact = {
                        id: "0",
                        yonghuid: '',
                        zhongwenming: "",
                        zhengjianleixing: "身份证",
                        zhengjianhaoma: "",
                        chushengriqi: "",
                        type: 0,
                        isNew: true,
                        isDelete: false,
                        isEdit: false,
                        chk: false
                    };
                }
                ;
            })

            $scope.$watch('userContact', function(newValue, oldValue, scope) {

                if (newValue === oldValue) {
                    return;
                }
                ;
                scope.userContact = newValue;

            });

            $scope.$watch('userContacts', function(newValue, oldValue, scope) {
                if (newValue === oldValue) {
                    return;
                }
                ;
                scope.userContacts = newValue;

            });

            $scope.back = function() {
                $state.transitionTo('tab.passenger');
            };
            //保存乘客{新增：True；修改：False}
            // 检测生日格式
            function RQcheck(RQ) {
                var date = RQ;
                var result = date.match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/);

                if (result == null) {
                    return false;
                }
                ;

                var d = new Date(result[1], result[3] - 1, result[4]);
                return (d.getFullYear() == result[1] && (d.getMonth() + 1) == result[3] && d.getDate() == result[4]);

            }
            ;

            $scope.saveUserContact = function(isNew) {

                if ($scope.userContact.zhongwenming == '') {
                    MsgBox.promptBox("姓名不能为空", 3000);
                    return;
                }
                ;
                if ($scope.userContact.zhengjianhaoma == '') {
                    MsgBox.promptBox("证件不能为空", 3000);
                    return;
                }
                ;

                $scope.userContact.chushengriqi = angular.element('#inputpdate').val();

                //如果证件类型为身份证的，需要通过身份证号计算出生日期

                if ($scope.userContact.zhengjianleixing == '身份证') {

                    if (!effectCommon.checkIdCard($scope.userContact.zhengjianhaoma)) {
                        return;
                    }
                    ;

                    var brithday = $scope.userContact.zhengjianhaoma.substring(6, 14);

                    $scope.userContact.chushengriqi = brithday.substring(0, 4) + '-' + brithday.substring(4, 6) + '-' + brithday.substring(6, 8);

                }
                ;

                if ($scope.userContact.chushengriqi == '') {
                    MsgBox.promptBox("出生日期不能为空", 3000);
                    return;
                }
                ;
                if (!RQcheck($scope.userContact.chushengriqi)) {
                    MsgBox.promptBox("请正确输入出生日期", 3000);
                    return;
                }
                ;

                //获取出生日期计算年龄

                var age = publicService.CalcAge($scope.userContact.chushengriqi);

                if (age < 2) {

                    MsgBox.promptBox("乘客必需为２周岁以上", 3000);

                    return;

                }
                ;
                if (age < 12) {
                    $scope.userContact.type = 1;
                }
                ;
                //如果信息没有改变，则不向后台提交（直接返回原列表页）

                if (!isNew && $scope.userContactOld.zhongwenming == $scope.userContact.zhongwenming && $scope.userContactOld.zhengjianhaoma == $scope.userContact.zhengjianhaoma && $scope.userContactOld.chushengriqi == $scope.userContact.chushengriqi) {

                    // 返回列表页

                    $state.transitionTo('tab.passenger');

                }
                ;

                var userContacts = $scope.userContacts;
                if (userContacts != '') {
                    var loop = true;

                    angular.forEach($scope.userContacts, function(data, index, array) {
                        if (loop) {
                            if (isNew) {
                                if (data.zhongwenming == $scope.userContact.zhongwenming && data.zhengjianhaoma == $scope.userContact.zhengjianhaoma) {
                                    loop = false;
                                }
                                ;
                            } else {
                                if (data.zhongwenming == $scope.userContact.zhongwenming && data.zhengjianhaoma == $scope.userContact.zhengjianhaoma && data.id != $scope.userContact.id) {
                                    loop = false;
                                }
                                ;
                            }
                            ;

                        }
                        ;

                    });
                    if (loop) {
                        if ($scope.i != null) {
                            if ($scope.userContact.isNew) {
                                $scope.userContact.isEdit = true;
                                userContacts[$scope.i] = $scope.userContact;
                            } else {
                                $scope.userContact.isEdit = true;
                                userContacts[$scope.i] = $scope.userContact;
                            }
                            ;

                        } else {
                            $scope.userContact.isNew = true;
                            userContacts.push($scope.userContact);
                        }
                        ;

                    } else {

                        MsgBox.promptBox("此联系人已存在", 3000);
                        return;
                    }
                    ;
                } else {
                    userContacts = new Array();
                    userContacts.push($scope.userContact);
                }
                ;
                Storage.set('userContacts', userContacts);
                $state.transitionTo('tab.passenger');

            };

        })

        .controller('ContactsCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            // 获得联系人列表
            $http.get(ENV.imgUrl + "data/contactsList.json")
                    .success(function(data) {

                $scope.Contacts = data;

            });
            $scope.displayContacts = function(isEdit, e) {
                if (isEdit) {
                    var e = JSON.stringify(e);
                } else {
                    var e = '';
                }
                ;

                $state.transitionTo('tab.contactsEdit', {
                    isEdit: isEdit,
                    p: e
                });

            };
            var mid = 132;
            //联系人 初始化

            $scope.currentContact = {
                mid: mid,
                name: "",
                tel: ""

            };

            //选择联系人的事件

            $scope.selectedContact = function(p) {

                $scope.currentContact.name = p.name;

                $scope.currentContact.tel = p.tel;

                $scope.currentContact.mid = mid;

                Storage.set("currentContact", $scope.currentContact);

                $state.transitionTo('tab.order');

            };

        })

        .controller('ContactsEditCtrl',
        function($scope, $rootScope, ENV, MsgBox, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            $scope.$on('$ionicView.enter', function(event, data) {
                $('#chk_ts_edit').children('.checkbox').attr('style', 'padding-left:38px;');
            });

            $scope.contact = {
                id: '',
                xingming: '',
                shoujihaoma: '',
                isNew: ''

            };

            $scope.contactOld = {
                xingming: '',
                shoujihaoma: ''

            };

            var yonghuid = Storage.get('UserId');
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载联系人...</p></div>'
            });
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            $scope.yonghuid = {
                yonghuid: yonghuid,
                sf: sf,
                csrf_test_name: csrf_test_name
            };

            $http.post(ENV.api + '/app/db/yonghu/find', objtops($scope.yonghuid)).success(function(data) {
                if (data != 'false') {
                    $ionicLoading.hide();
                    MsgBox.promptBox("加载联系人成功！", 1500);
                    $scope.contact = data;
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("加载联系人失败！", 3000);
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("加载联系人失败！", 3000);
            });

            $scope.contactOld = {
                xingming: $scope.contact.xingming,
                shoujihaoma: $scope.contact.shoujihaoma
            };

            $scope.back = function() {
                $state.transitionTo('tab.order');
            };

            //保存联系人
            $scope.saveContact = function() {

                if ($scope.contactOld.xingming == $scope.contact.xingming && $scope.contactOld.shoujihaoma == $scope.contact.shoujihaoma) {

                    $state.transitionTo('tab.order');

                }
                ;
                var yonghu = JSON.stringify($scope.contact);
                $ionicLoading.show({
                    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在保存...</p></div>'
                });
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                $scope.yonghu = {
                    yonghu: yonghu,
                    sf: sf,
                    csrf_test_name: csrf_test_name
                };

                $http.post(ENV.api + '/app/db/yonghu/update', objtops($scope.yonghu)).success(function(data) {
                    if (data > 0) {
                        $ionicLoading.hide();
                        Storage.set('currentContact', $scope.contact);
                        MsgBox.promptBox("保存联系人成功！", 3000);
                        $state.transitionTo('tab.order');
                    } else {
                        $ionicLoading.hide();
                        MsgBox.promptBox("保存联系人失败！", 3000);
                    }
                    ;

                }).error(function(error) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("保存联系人失败！", 3000);
                });

            };

        })

        .controller('ContactsAddCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, MsgBox, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            $scope.$on('$ionicView.enter', function(event, data) {
                //$('#chk_ts').children('.checkbox').attr('style', 'padding-left:38px;');
            });

            $scope.contact = {
                id: '',
                xingming: '',
                shoujihaoma: '',
                isNew: ''

            };
            $scope.oldcontact = {
                id: '',
                xingming: '',
                shoujihaoma: '',
                isNew: ''
            };
            $scope.a = {
                code: ''
            };
            $scope.back = function() {
                $state.transitionTo('tab.order');
            };

            $scope.pushNotification = {
                checked: false
            };
            $scope.isShow = false;
            // 显示提示
            $scope.pushNotificationChange = function() {
                if (typeof($scope.pushNotification.checked) != "undefined" && $scope.pushNotification.checked != null) {
                    if ($scope.pushNotification.checked == true) {
                        $scope.isShow = true;
                    } else {
                        $scope.isShow = false;
                    }
                    ;
                }
                ;
            };

            //发送短信
            $scope.postduanxin = function() {

                var name = $scope.contact.xingming;
                var tel = $scope.contact.shoujihaoma;

                if (name == '') {
                    MsgBox.promptBox('姓名不能为空');
                } else {
                    $scope.oldcontact.xingming = name;
                }
                ;
                if (tel.length > 0) {
                    var reg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/i;
                    var result = reg.test(tel);
                    if (result) {
                        $scope.oldcontact.shoujihaoma = tel;
                    } else {
                        MsgBox.promptBox('请输入有效电话号码');
                        return;
                    }
                    ;
                } else {
                    MsgBox.promptBox('电话号码不能为空');
                    return;
                }
                ;
                $ionicLoading.show({
                    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在发送短信...</p></div>'
                });
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                $scope.duanxin = {
                    name: $scope.oldcontact.xingming,
                    tel: $scope.oldcontact.shoujihaoma,
                    sf: sf,
                    csrf_test_name: csrf_test_name
                };
                $http.post(ENV.api + '/app/db/yonghu/duanxin', objtops($scope.duanxin)).success(function(data) {

                    if (data == 'false') {
                        $ionicLoading.hide();
                        MsgBox.promptBox("验证码发送出错，请重新发送！", 3000);
                    } else {
                        $ionicLoading.hide();
                        MsgBox.promptBox("获取验证码成功！", 2000);
                        showTime();
                    }
                    ;
                }).error(function(error) {
                    MsgBox.promptBox("验证码发送出错，请重新发送！", 3000);
                    $ionicLoading.hide();
                });

            };

            //保存联系人
            $scope.saveContact = function() {

                if ($scope.a.code == '') {
                    MsgBox.promptBox('请输入验证码');
                    return;
                }
                ;

                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                $scope.yanzheng = {
                    code: $scope.a.code,
                    sf: sf,
                    csrf_test_name: csrf_test_name
                };
                // 短信验证
                $http.post(ENV.api + '/app/db/yonghu/yanzheng', objtops($scope.yanzheng)).success(function(data) {
                    if (data == 'false') {
                        MsgBox.promptBox('验证码错误;请重新输入');
                        return;
                    }
                    ;

                    var yonghu = JSON.stringify($scope.contact);
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在保存...</p></div>'
                    });
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    $scope.yonghu = {
                        yonghu: yonghu,
                        sf: sf,
                        csrf_test_name: csrf_test_name
                    };

                    // 三方注册，存在返回信息
                    $http.post(ENV.api + '/app/db/yonghu/sanfangzhuce', objtops($scope.yonghu)).success(function(data) {
                        if (data != 'false') {
                            $scope.currentContact = data;
                            Storage.set('currentContact', $scope.currentContact);
                            // 获取乘客信息与邮递地址信息

                            var yonghuid = data.id;
                            $scope.yonghuid = {
                                yonghuid: yonghuid,
                                sf: sf,
                                csrf_test_name: csrf_test_name
                            };
                            // 合并乘客
                            $http.post(ENV.api + '/app/db/passenger/select', objtops($scope.yonghuid)).success(function(data1) {
                                var arr1 = new Array();
                                var userContacts = Storage.get('userContacts');
                                if (userContacts != null && userContacts != '') {
                                    if (data1 != 'false') {
                                        angular.forEach(data1, function(d1, i1, a1) {
                                            angular.forEach(userContacts, function(d2, i2, a2) {
                                                if (d1.zhongwenming == d2.zhongwenming && d1.zhengjianhaoma == d2.zhengjianhaoma && d1.chushengriqi == d2.chushengriqi) {
                                                    d1.chk = d2.chk;
                                                    d2.isDelete = true;
                                                }
                                                ;
                                                d2.yonghuid = yonghuid;
                                            });
                                        });

                                        angular.forEach(userContacts, function(d3, i3, a3) {
                                            if (d3.isDelete != true) {
                                                data1.push(d3);
                                            }
                                            ;
                                        });
                                        arr1 = data1;
                                    } else {
                                        arr1 = '';
                                    }
                                    ;

                                } else {
                                    if (data1 != 'false') {
                                        arr1 = data1;
                                    } else {
                                        arr1 = '';
                                    }
                                    ;
                                }
                                ;
                                Storage.set('userContacts', arr1);
                            });

                            // 合并邮递地址
                            $http.post(ENV.api + '/app/db/address/select', objtops($scope.yonghuid)).success(function(data2) {
                                var addressList = Storage.get('addressList');
                                var mail = Storage.get('mail');

                                //  地址列表 只有先编辑地址才有，先填乘客没有即为null
                                if (addressList != null && addressList != '') {
                                    if (data2 != 'false') {

                                        angular.forEach(data2, function(d1, i1, a1) {
                                            angular.forEach(addressList, function(d2, i2, a2) {
                                                if (d1.shoujianrenmingzi == d2.shoujianrenmingzi && d1.dizhi == d2.dizhi) {
                                                    d1.chk = d2.chk;
                                                    d2.isDelete = true;
                                                    if (mail.index == i2) {
                                                        mail.index = i1;
                                                    }
                                                    ;

                                                }
                                                ;
                                                d2.yonghuid = yonghuid;
                                            });
                                        });

                                        angular.forEach(addressList, function(d3, i3, a3) {
                                            if (d3.isDelete != true) {
                                                data2.push(d3);
                                                if (mail.index == i3) {
                                                    mail.index = data.length - 1;
                                                }
                                                ;
                                            }
                                            ;

                                        });

                                        arr2 = data2;
                                    } else {
                                        arr2 = '';
                                    }
                                    ;

                                } else {
                                    if (data2 != 'false') {
                                        arr2 = data2;
                                    } else {
                                        arr2 = '';
                                    }
                                    ;
                                }
                                ;

                                Storage.set('addressList', arr2);
                                Storage.set('mail', mail);
                            });
                            $ionicLoading.hide();
                            MsgBox.promptBox("保存联系人成功！", 1500);
                            $state.transitionTo('tab.order');
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("保存联系人失败！", 3000);
                        }
                        ;

                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("保存联系人失败！", 3000);

                    });
                });
            };

        })

        .controller('AddressCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            // 获得地址列表

            $scope.$on('$ionicView.enter', function() {
                var mail = Storage.get('mail');
                if (mail != null) {
                    $scope.mail = mail;
                }
                ;

                var addressList = Storage.get('addressList');
                if (addressList != null && addressList != '') {
                    $scope.addressList = addressList;
                }
                ;

            });

            $scope.displayAddress = function(isEdit, p) {

                $state.transitionTo('tab.addressEdit', {
                    isEdit: isEdit,
                    p: p
                });

            };

            //选择收件地址事件

            $scope.selectedAddress = function(p, index, chk) {

                $scope.mail.isMail = chk;

                if (chk) {
                    $scope.mail.index = index;
                    $scope.mail.shoujianrenmingzi = p.shoujianrenmingzi;

                    $scope.mail.shoujihao = p.shoujihao;

                    $scope.mail.dizhi = p.dizhi;
                    Storage.set('mail', $scope.mail);

                    $state.transitionTo('tab.order');

                } else {

                    $state.transitionTo('tab.order');

                }
                ;

            };

        })

        .controller('AddressEditCtrl',
        function($scope, $rootScope, ENV, publicService, $filter, Storage, $location, MsgBox, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout) {

            //初始化

            $scope.disable = {
                isEdit: ""
            };
            $scope.addressOld = {
                shoujianrenmingzi: "",
                shoujihao: "",
                dizhi: ""

            };
            $scope.$on('$ionicView.enter', function(event, data) {

                var addressList = Storage.get('addressList');
                $scope.addressList = addressList;
                if (addressList != null) {
                    var isEdit = $stateParams['isEdit'];
                    if (isEdit == 'true') {
                        $scope.disable.isEdit = true;
                        var i = parseInt($stateParams['p']);
                        $scope.i = i; //索引
                        $scope.address = addressList[i];

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
                    ;
                }
                ;
            });

            $scope.back = function() {
                $state.transitionTo('tab.address');
            };

            $scope.$watch('addressList', function(newValue, oldValue, scope) {
                if (newValue === oldValue) {
                    return;
                }
                ;
                $scope.addressList = newValue;
            });

            //保存收件地址{新增：True；修改：False}

            $scope.saveAddress = function(isNew) {

                if ($scope.address.shoujianrenmingzi == '') {
                    MsgBox.promptBox("姓名不能为空", 3000);
                    return;
                }
                ;
                if ($scope.address.shoujihao == '') {
                    MsgBox.promptBox("手机号码不能为空", 3000);
                    return;
                }
                ;
                if ($scope.address.shoujihao.length != 11) {
                    MsgBox.promptBox("请输入有效的手机号码！", 3000);
                    return;
                }
                ;
                var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
                if (!myreg.test($scope.address.shoujihao)) {
                    MsgBox.promptBox("请输入有效的手机号码！", 3000);
                    return false;
                }
                ;
                if ($scope.address.dizhi == '') {
                    MsgBox.promptBox("地址不能为空", 3000);
                    return;
                }
                ;

                if (!isNew && $scope.addressOld.shoujianrenmingzi == $scope.address.shoujianrenmingzi && $scope.addressOld.shoujihao == $scope.address.shoujihao && $scope.addressOld.dizhi == $scope.address.dizhi) {

                    $state.transitionTo('tab.address');
                    return;

                }
                ;

                var addressList = $scope.addressList;
                if (addressList != '') {
                    var loop = true;
                    angular.forEach($scope.addressList, function(data, index, array) {
                        if (loop) {
                            if (isNew) {
                                if (data.shoujianrenmingzi == $scope.address.shoujianrenmingzi && data.shoujihaoma == $scope.address.shoujihaoma) {
                                    loop = false;
                                }
                                ;

                            } else {
                                if (data.shoujianrenmingzi == $scope.address.shoujianrenmingzi && data.shoujihaoma == $scope.address.shoujihaoma && data.id != $scope.address.id) {
                                    loop = false;
                                }
                                ;

                            }
                            ;

                        }
                        ;

                    });
                    if (loop) {
                        // 存在编辑
                        if ($scope.i != null) {
                            if ($scope.address.isNew) {
                                $scope.address.isEdit = true;
                                addressList[$scope.i] = $scope.address;
                            } else {
                                $scope.address.isEdit = true;
                                addressList[$scope.i] = $scope.address;
                            }
                            ;

                        } else {
                            $scope.address.isNew = true;
                            addressList.push($scope.address);
                        }
                        ;

                    } else {
                        MsgBox.promptBox("此地址已存在", 3000);
                        return;
                    }
                    ;
                } else {
                    addressList = new Array();
                    $scope.address.isNew = true;
                    addressList.push($scope.address);
                }
                ;
                Storage.set('addressList', addressList);
                $state.transitionTo('tab.address');
            };

        })

        .controller('DetailCtrl', function($scope, ENV) {
})

//我的
        .controller('UserCtrl', ['$scope', 'ENV', 'publicService', '$state', 'Storage', '$http', 'MsgBox', '$timeout', '$ionicLoading',
    function($scope, ENV, publicService, $state, Storage, $http, MsgBox, $timeout, $ionicLoading) {

        // 火车票订单
        $scope.trainorderlist = function() {
            $state.transitionTo('tab.trainorderlist');
        };
        // 机票订单
        $scope.gotoFlightOrder = function() {
            $state.transitionTo('flightOrder');
        };
		// 酒店订单
        $scope.gotoHotel = function() {
            $state.transitionTo('account');
        };
        // 登录
        $scope.gotoLogin = function() {
            $state.transitionTo('login');
        };
        $scope.gotoCustom = function() {
            $state.transitionTo('tab.custom');
        };
        $scope.gotoCommonInfo = function() {
            $state.transitionTo('commonInfo');
        };
		
		$scope.$on("$ionicView.beforeEnter", function () {
			$ionicLoading.hide();
		});
		
        // 再次加载
        $scope.$on('$ionicView.enter', function() {

            var UserId = '';
            //if (sf == '') {
            //如果没有登录，则跳转到登录页面
            UserId = Storage.get("UserId");
            if (typeof(UserId) == 'undefined' || UserId == "" || UserId == null || UserId <= 0) {
                $scope.member = "";
				MsgBox.promptBox("请登录账号！", 2000);
                Storage.set('loginBack', 'user');
                $timeout(function() {
                    $state.transitionTo('login');
                }, 2000);
                return;
            }
            ;
            //} else {
            //	UserId = userid;
            //}
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载数据...</p></div>'
            });
            var SF = '';
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: UserId,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            // 获取用户数据
            $http.post(ENV.api + '/app/templates/user/FindAll', objtops(myobject)).success(function(data) {
                if (data.length > 0) {
                    $scope.memberManage(data[0]);
                    $ionicLoading.hide();
                    //MsgBox.promptBox("加载数据成功！", 1500);

                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("请登录账号！", 2000);
                    Storage.set('loginBack', 'user');
                    $timeout(function() {
                        $state.transitionTo('login');
                    }, 2000);
                    return;
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("加载数据失败！", 3000);
            });
        });
        //用户数据
        $scope.memberManage = function(p) {
            if (p == undefined) {
                return;
            }
            ;

            // 数据获取
            $scope.member = p;
            if (!publicService.isNull($scope.member.zhanghu)) {
                $scope.member.disableMobile = $scope.member.zhanghu.substr(0, 3) + "*****" + $scope.member.zhanghu.substr(8, 3);
            }
            ;

            if (publicService.isNull($scope.member.youxiang)) {
                $scope.member.disableEmail = "未绑定邮箱";
            } else {
                $scope.member.disableEmail = $scope.member.youxiang.substr(0, 3) + "***" + $scope.member.youxiang.substr(-3, 3);
            }
            ;
			if (publicService.isNull($scope.member.img)) {
                $scope.member.img = ENV.imgUrl+"resources/user/userImages/bsu_icon.jpg";
            } else {
                var d = new Date();
                $scope.member.img = ENV.imgUrl+"resources/user/userImages/"+$scope.member.img+ '?mg=' + d.getMilliseconds();
            }
            ;
            $scope.loginSuccess = true;
        };

        $scope.gotoMyAccount = function() {
            if (!$scope.loginSuccess) {
                Storage.set('loginBack', 'user');
                $state.transitionTo('login');
            } else {
                $state.transitionTo("myaccount");
            }
            ;
        };
    }
])
        .controller('RegisterCtrl', ['$scope', 'ENV', 'publicService', 'Storage', '$state', '$filter', 'MsgBox', '$http', '$timeout', 'Storage', '$ionicLoading', '$ionicPopover',
    function($scope, ENV, publicService, Storage, $state, $filter, MsgBox, $http, $timeout, Storage, $ionicLoading, $ionicPopover) {
        //返回
        $scope.gotoLogin = function() {
            $state.transitionTo('login');
        };

        //显示服务条款
        /*$scope.termsOfService = false;
         $scope.showTermsOfService = function () {
         $scope.termsOfService = true;
         $('#mask').show();
         $('#termsOfService').css('top', document.body.scrollTop + document.documentElement.clientHeight * 0.1 + 'px').show();
         };
         */
        //显示服务条款
        $scope.popover = $ionicPopover.fromTemplateUrl('termsOfService.html', {
            scope: $scope
        });
        // .fromTemplateUrl() 方法
        $ionicPopover.fromTemplateUrl('termsOfService.html', {
            scope: $scope
        }).then(function(popover) {
            $scope.popover = popover;
        });
        $scope.termsOfService = true;
        $scope.showTermsOfService = function($event) {
            $scope.termsOfService = false;
            $scope.popover.show($event);
            //				$('#mask').show();
            $('#termsOfService').css('top', document.body.scrollTop + document.documentElement.clientHeight * 0.1 + 'px').show();
        };
        $scope.closePopover = function() {
            $scope.popover.hide();
        };
        //销毁事件回调处理：清理popover对象
        $scope.$on("$destroy", function() {
            $scope.popover.remove();
        });

        $scope.registerInfo = {
            shoujihaoma: "",
            mima: "",
        };

        //获取验证码
        $scope.sendVerifyCode = function() {
            //判断手机合法性
            if (effectCommon.registered.userName() == false) {
                return;
            }
            ;
            $scope.tel = $scope.registerInfo.shoujihaoma;

            //判断手机是否存在
            var shoujihaoma = '';
            var SF = '';
            if (typeof($scope.tel) != "undefined" && $scope.tel != null) {
                shoujihaoma = $scope.tel;
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                shoujihaoma: shoujihaoma,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/FindZhangHu', objtops(myobject)).success(function(data) {
                if (data > 0) {
                    MsgBox.promptBox("该手机号已经注册,请更换其它手机号！", 3000);
                    return;
                }
                ;

                //发送验证码
                $ionicLoading.show({
                    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在发送验证码...</p></div>'
                });
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                csrf_test_name = getCsrf();
                $scope.send = {
                    shoujihaoma: shoujihaoma,
                    code: "",
                    sf: SF,
                    csrf_test_name: csrf_test_name
                };
                $http.post(ENV.api + '/app/templates/user/YanZhengMa', objtops($scope.send)).success(function(data) {
                    if (data == 'true') {
                        $scope.codeBDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");

                        $ionicLoading.hide();
                        MsgBox.promptBox("发送验证码成功！", 2000);
                        publicFunction.obtnewi.obtCodes("snsit_but", 60);
                    } else {
                        $ionicLoading.hide();
                        MsgBox.promptBox("发送验证码失败！", 3000);
                        return;
                    }
                    ;
                }).error(function(error) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("发送验证码失败！！", 3000);
                });
            }). finally(function() {
                $ionicLoading.hide();
            });

        };
        //确定
        $scope.confirm = function() {
            //判断手机合法性
            if (effectCommon.registered.userName() == false) {
                return;
            }
            ;
            if (effectCommon.registered.password() == false) {
                return;
            }
            ;
            //判断是否获取验证码成功
            if (publicService.isNull($scope.codeBDT)) {
                MsgBox.promptBox("请先获取验证码", 3000);
                return;
            }
            ;
            //判断验证码是否为空
            if ($scope.send.code == "") {
                MsgBox.promptBox("请输入验证码");
                return;
            }
            ;
            //判断验证码是否过期
            $scope.codeEDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
            if (publicService.CalcTimeDiff($scope.codeBDT, $scope.codeEDT) >= 5) {
                MsgBox.promptBox("验证码已超时，请重新获取", 3000);
                return;
            }
            ;
            //判断验证码是否一致
            var csrf_test_name = getCsrf();
            var myobject = {
                yzm: $scope.send.code,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/shoujiyanzhengma', objtops(myobject)).success(function(data) {
                if (data != 'true') {
                  MsgBox.promptBox("验证码不正确", 3000);
                  return;
                }
            });
            //判断手机号是否发生变化
            if ($scope.tel != $scope.registerInfo.shoujihaoma) {
                MsgBox.promptBox("手机号发生了变化，请重新获取验证码！", 3000);
                return;
            }
            ;
            //判断密码是否合法
            if (effectCommon.registered.registFunciton() == false) {
                return;
            }
            ;
            //确定注册
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在注册...</p></div>'
            });
            var shoujihaoma = '';
            var mima = '';
            var SF = '';
            if (typeof($scope.registerInfo.shoujihaoma) != "undefined" && $scope.registerInfo.shoujihaoma != null) {
                shoujihaoma = $scope.registerInfo.shoujihaoma;
            }
            ;
            if (typeof($scope.registerInfo.mima) != "undefined" && $scope.registerInfo.mima != null) {
                mima = $scope.registerInfo.mima;
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                shoujihaoma: shoujihaoma,
                mima: mima,
                zhuceriqi: $filter("date")(new Date(), "yyyy/MM/dd"),
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/AddZhuCeRiQi', objtops(myobject)).success(function(data) {
			  if (data=="ok") {
					$ionicLoading.hide();
					MsgBox.promptBox("用戶已注册,请登录", 2000);
              } else if (data > 0) {
                    //locals.set("mid", data['item'][0]['ID']);
                    $ionicLoading.hide();
                    Storage.set("UserId", data);
                    MsgBox.promptBox("注册成功！", 2000);
                    $timeout(function() {
                        var loginBack = Storage.get("loginBack");
                        if (loginBack == 'flightlist') {
                            $timeout(function() {
                                $state.transitionTo('query');
                            }, 2000);
                        } else if (loginBack == 'user') {
                            $timeout(function() {
                                $state.transitionTo('tab.user');
                            }, 2000);
                        } else if (loginBack == 'myaccount') {
                            $timeout(function() {
                                $state.transitionTo('myaccount');
                            }, 2000);
                        } else if (loginBack == 'flightOrder') {
                            $timeout(function() {
                                $state.transitionTo('flightOrder');
                            }, 2000);
                        } else if (loginBack == 'orderDetail') {
                            $timeout(function() {
                                $state.transitionTo('orderDetail');
                            }, 2000);
                        } else if (loginBack == 'alterTicket') {
                            $timeout(function() {
                                $state.transitionTo('alterTicket');
                            }, 2000);
                        } else if (loginBack == 'trainList') {
                            $timeout(function() {
                                $state.transitionTo('trainList');
                            }, 2000);
                        } else {
                            $timeout(function() {
                                $state.transitionTo('tab.home');
                            }, 2000);
                        }
                        ;
                    }, 2000);
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("注册失败，请重新注册！", 3000);
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("注册失败，请重新注册！", 3000);
            });
        };
    }
])

        .controller('LoginCtrl', ['$scope', '$state', 'publicService', 'isWeiXin', 'MsgBox', '$http', 'ENV', '$timeout', '$filter', 'Storage', '$ionicLoading',
    function($scope, $state, publicService, isWeiXin, MsgBox, $http, ENV, $timeout, $filter, Storage, $ionicLoading) {

        /*
         显示三方登录中的微信登录
         */
        if (isWeiXin() == true) {
            $scope.WeChat = true;

            if (sf == '') {
                $scope.sanfang_denglv = 'none';
            } else {
                $scope.sanfang_denglv = sf;
            }
            ;

            var loginBack = Storage.get('loginBack');
            if (typeof(loginBack) != 'undefined' && loginBack != null &&
                    $.trim(loginBack) == 'flightlist') {
                $scope.loginBack = 'query';
            } else if (typeof(loginBack) != 'undefined' && loginBack != null &&
                    $.trim(loginBack) == 'user') {
                $scope.loginBack = "tab.user";
            } else if (typeof(loginBack) != 'undefined' && loginBack != null &&
                    $.trim(loginBack) == 'trainList') {
                $scope.loginBack = 'trainList';
            } else {
                $scope.loginBack = 'tab.home';
            }
            ;
        } else {
            $scope.WeChat = false;
        }
        ;
        $scope.WeChat = true;

        $scope.getLoginUrl = function(denglv) {
            if (denglv == 'WX') {
                //alert('微信登录');
                //alert(window.location.href);
            } else if (denglv == 'QQ') {
                //alert('QQ登录');
                alert(document.referrer);
            }
            ;
        };

        $scope.gotoRegister = function() {
            $state.transitionTo('register');
        };

        $scope.gotoForgotPassword = function() {
            $state.transitionTo('forgotPassword');
        };
        $scope.loginInfo = {
            loginName: "",
            loginPass: "",
        };
        //登录事件
        $scope.login = function() {

            if ($scope.loginInfo.loginName == "") {
                MsgBox.promptBox("请输入用户名", 3000);
                return;
            }
            ;
            if ($scope.loginInfo.loginPass == "") {
                MsgBox.promptBox("请输入登录密码", 3000);
                return;
            }
            ;
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在登录...</p></div>'
            });
            var shoujihaoma = '';
            var mima = '';
            var SF = '';
            if (typeof($scope.loginInfo.loginName) != "undefined" && $scope.loginInfo.loginName != null) {
                shoujihaoma = $scope.loginInfo.loginName;
            }
            ;
            if (typeof($scope.loginInfo.loginPass) != "undefined" && $scope.loginInfo.loginPass != null) {
                mima = $scope.loginInfo.loginPass;
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                // number可能是手机号码或邮箱号码
                number: shoujihaoma,
                mima: mima,
                dengluriqi: $filter("date")(new Date(), "yyyy/MM/dd"),
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/FindDengLuMing', objtops(myobject)).success(function(data) {
                if (!publicService.isNull(data)) {

                    //var sub_users = eval('(' + data + ')');
                    var sub_users = data;
                    var lxr = new mliaxiren(sub_users.id, sub_users.zhanghu, sub_users.mima, sub_users.xingming, sub_users.shoujihaoma);
                    var user_str = JSON.stringify(lxr);
                    Storage.set("lianxiren", user_str);

                    Storage.set("UserId", data.id);

                    $ionicLoading.hide();
                    MsgBox.promptBox("登录成功！", 2000);
                    var loginBack = Storage.get("loginBack");
                    if (loginBack == 'flightlist') {
                                $timeout(function () {
                                    $state.transitionTo('query');
                                }, 2000);
                            } else if (loginBack == 'user') {
                                $timeout(function () {
                                    $state.transitionTo('tab.user');
                                }, 2000);
                            } else if (loginBack == 'myaccount') {
                                $timeout(function () {
                                    $state.transitionTo('myaccount');
                                }, 2000);
                            } else if (loginBack == 'flightOrder') {
                                $timeout(function () {
                                    $state.transitionTo('flightOrder');
                                }, 2000);
                            } else if (loginBack == 'orderDetail') {
                                $timeout(function () {
                                    $state.transitionTo('orderDetail');
                                }, 2000);
                            } else if (loginBack == 'alterTicket') {
                                $timeout(function () {
                                    $state.transitionTo('alterTicket');
                                }, 2000);
                            } else if (loginBack == 'hotelDetail') {
                                $timeout(function () {
                                    $state.transitionTo('hotelDetail');
                                }, 2000);
                            }else if (loginBack == 'trainList') {
                                $timeout(function () {
                                    $state.transitionTo('trainList');
                                }, 2000);
                            } else if (loginBack == 'account') {
                                $timeout(function () {
                                    $state.transitionTo('account');
                                }, 2000);
                            } else {
                                $timeout(function () {
                                    $state.transitionTo('tab.home');
                                }, 2000);
                            }
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox('用户名或密码不正确！');
                            return;
                        }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("登录失败，请重新输入！", 3000);
            });
        };
    }
])
//找回密码控制器
        .controller('ForgotPasswordCtrl', ['$scope', 'ENV', 'MsgBox', '$http', '$filter', 'publicService', '$state', '$ionicLoading',
    function($scope, ENV, MsgBox, $http, $filter, publicService, $state, $ionicLoading) {

        $scope.registerInfo = {
            shoujihaoma: "",
            mima: ""
        };
        $scope.send = {
            code: ''
        };
        //获取验证码
        $scope.sendVerifyCode = function() {
            //判断手机合法性
            if (effectCommon.registered.userName() == false) {
                return;
            }
            ;
            $scope.tel = $scope.registerInfo.shoujihaoma;
            //判断手机是否存在
            var shoujihaoma = '';
            var SF = '';
            if (typeof($scope.tel) != "undefined" && $scope.tel != null) {
                shoujihaoma = $scope.tel;
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                shoujihaoma: shoujihaoma,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            //修改用户信息
            $http.post(ENV.api + '/app/templates/user/FindZhangHu', objtops(myobject)).success(function(data) {
                if (!(data > 0)) {
                    MsgBox.promptBox("该手机号尚未注册！", 3000);
                    return;
                }
                ;
                $scope.id = data;
                //发送验证码
                $ionicLoading.show({
                    template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在发送验证码...</p></div>'
                });
                var shoujihaoma = '';
                var SF = '';
                if (typeof($scope.tel) != "undefined" && $scope.tel != null) {
                    shoujihaoma = $scope.tel;
                }
                ;
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                ;
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                $scope.codeBDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                var myobject = {
                    shoujihaoma: shoujihaoma,
                    action: "找回比比旅行账号的密码",
                    username: "",
                    code: "",
                    sf: SF,
                    csrf_test_name: csrf_test_name
                };
                //修改用户信息
                $http.post(ENV.api + '/app/templates/user/YanZhengMa', objtops(myobject)).success(function(data) {
                    if (data['result'] == true) {
                        $ionicLoading.hide();
                        $scope.code = data['yzm'];
                        MsgBox.promptBox("发送验证码成功！", 2000);
                        publicFunction.obtnewi.obtCodes("snsit_but", 60);
                    } else {
                        $ionicLoading.hide();
                        MsgBox.promptBox("发送验证码失败！", 2000);
                    }
                    ;
                }).error(function(error) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("发送验证码失败！", 3000);
                });

            });
        };

        //确定
        $scope.confirm = function() {
            //判断手机合法性
            if (effectCommon.registered.userName() == false) {
                return;
            }
            ;
            //判断是否已经点击了获取验证码
            if (publicService.isNull($scope.codeBDT)) {
                MsgBox.promptBox("请先获取验证码", 3000);
                return;
            }
            ;
            //判断验证码是否为空
            if ($scope.send.code == "") {
                MsgBox.promptBox("请输入验证码", 3000);
                return;
            }
            ;
            //判断验证码是否过期
            $scope.codeEDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
            if (publicService.CalcTimeDiff($scope.codeBDT, $scope.codeEDT) >= 5) {
                MsgBox.promptBox("验证码已超时，请重新获取", 3000);
                return;
            }
            ;
            //判断验证码是否一致
            if ($scope.code != $scope.send.code) {
                MsgBox.promptBox("验证码不正确", 3000);
                return;
            }
            ;
            //判断手机号是否发生变化
            if ($scope.tel != $scope.registerInfo.shoujihaoma) {
                MsgBox.promptBox("手机号发生了变化，请重新获取验证码！", 3000);
                return;
            }
            ;
            //判断密码是否合法
            if (effectCommon.registered.findregistFunciton() == false) {
                return;
            }
            ;
            //确定重置密码
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在重置密码...</p></div>'
            });
            var UserId = '';
            var mima = '';
            if (typeof($scope.id) != "undefined" && $scope.id != null) {
                UserId = $scope.id;
            }
            ;
            if (typeof($scope.registerInfo.mima) != "undefined" && $scope.registerInfo.mima != null) {
                mima = $scope.registerInfo.mima;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: UserId,
                mima: mima,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/updateUserData', objtops(myobject)).success(function(data) {
                if (data) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("找回密码成功,请重新登录", 3000);
                    setTimeout(function() {
                        $state.transitionTo('login');
                    }, 3000);
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("找回密码失败！", 3000);
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("找回密码失败！", 3000);
            });
        };

    }
])

//我的  我的账户
        .controller('MyAccountCtrl', ['$scope', 'ENV', 'MsgBox', '$compile', 'publicService', 'Storage', '$http', '$state', '$timeout', '$filter', '$ionicLoading',
    function($scope, ENV, MsgBox, $compile, publicService, Storage, $http, $state, $timeout, $filter, $ionicLoading) {

        $scope.gotoUser = function() {
            $state.transitionTo('tab.user');
        };
        // 网页模式
        $scope.openmode = 'web';
        $scope.loading = {
            "display": "none"
        };
        $scope.send = {
            code: '',
            shoujihaoma: ''
        };
        $scope.password = {
            oldpassword: "",
            newpassword: "",
            paopassword: ""
        };
        $scope.memberDisplay = function() {
            $scope.memberNew = {
                xingming: $scope.member.xingming,
                xingbie: $scope.member.xingbie,
                shoujihaoma: $scope.member.disableMobile,
                youxiang: $scope.member.disableYouXiang
            };
        };

        //首次加载
        var UserId = '';
        if (sf == '') {
            UserId = Storage.get("UserId");
        } else {
            UserId = userid;
        }
        ;
        // 再次加载
        $scope.$on('$ionicView.enter', function() {
            // 获取用户id
        
            UserId = Storage.get("UserId");
   
            if (typeof(UserId) == 'undefined' || UserId == "" || UserId == null || UserId <= 0) {
                MsgBox.promptBox("请登录账号！", 1500);
                Storage.set('loginBack', 'myaccount');
                $timeout(function() {
                    $state.transitionTo('login');
                }, 1500);
                return;
            }
            ;
            // 获取登录后的状态
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载信息...</p></div>'
            });
            var SF = '';
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: UserId,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            //获取用户信息
            $http.post(ENV.api + '/app/templates/user/FindAll', objtops(myobject)).success(function(data) {
                if (data.length > 0) {
                    // 初始化用户信息
                    $ionicLoading.hide();
                    //MsgBox.promptBox("加载完成！", 1500);
                    $scope.memberManage(data[0]);
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("加载失败！", 3000);
                }
                ;
            }). finally(function() {
                $ionicLoading.hide();
                $scope.loading = {
                    "display": "block"
                };
            });
        });

        //用户信息处理
        $scope.memberManage = function(p) {
            $scope.member = p;
            if (!publicService.isNull($scope.member.zhanghu)) {
                $scope.member.disableMobile = $scope.member.zhanghu.substr(0, 3) + "*****" + $scope.member.zhanghu.substr(8, 3);
            }
            ;
            if (!publicService.isNull($scope.member.youxiang)) {
                $scope.member.disableYouXiang = $scope.member.youxiang.substr(0, 3) + "*****" + $scope.member.youxiang.substr(-3, 3);
            }
            ;
            if (publicService.isNull($scope.member.img)) {
                $scope.member.img = ENV.imgUrl+"resources/user/userImages/bsu_icon.jpg";
            } else {
				var d = new Date();
                $scope.member.img = ENV.imgUrl+"resources/user/userImages/"+$scope.member.img+ '?mg=' + d.getMilliseconds();
            }
            ;			
        };

        //上传图片
        $scope.imgurl = "";
        $scope.upload = function() {
            if ($scope.openmode == 'web') {
                $scope.imgurl = $("#hideinput").val();
            }
            ;
            if ($scope.imgurl == "") {
                MsgBox.promptBox("请选择图片", 3000);
                return;
            }
            ;
            publicFunction.returnbut("headPortrait", "mainbox", "headPortrait .header");

            // 传图片参数到后台处理
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在上传...</p></div>'
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
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: UserId,
                touxiang: touxiang,
                type: type,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/upload', objtops(myobject)).success(function(data) {
                if (data) {
                    $ionicLoading.hide();
                    MsgBox.promptBox("上传图片成功！", 1500);
                    var d = new Date();
                    $scope.member.img = ENV.imgUrl + 'resources/user/userImages/' + data + '?mg=' + d.getMilliseconds();
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("上传图片失败！", 3000);
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("上传图片失败！", 3000);
            });
        };

        //保存会员信息
        $scope.SaveMemberInfo = function(p) {
            //信息判断
            // 绑定邮箱
            if (p == "youxiang") {
                if (effectCommon.myAccount.myemail(true) == false) {
                    return;
                }
                ;

                //判断是否已经点击了获取验证码
                if (publicService.isNull($scope.codeBDT)) {
                    MsgBox.promptBox("请先获取验证码", 3000);
                    return;
                }
                ;

                //判断验证码是否为空
                if ($scope.send.code == "") {
                    MsgBox.promptBox("请输入验证码", 3000);
                    return;
                }
                ;

                //判断是否超时
                $scope.codeEDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                if (publicService.CalcTimeDiff($scope.codeBDT, $scope.codeEDT) >= 60) {
                    MsgBox.promptBox("验证码已超时，请重新获取", 3000);
                    return;
                }
                ;

                //判断验证码是否一致
                if ($scope.code != $scope.send.code) {
                    MsgBox.promptBox("验证码不正确", 3000);
                    return;
                }
                ;

                //判断邮箱是否发生了变化
                if ($scope.memberNew.youxiang != $scope.send.youxiang) {
                    MsgBox.promptBox("邮箱地址与验证码不匹配!", 3000);
                    return;
                }
                ;

                $scope.member.youxiang = $scope.memberNew.youxiang;
            }
            //修改姓名和性别
            else if (p == "name_gender") {
                if (effectCommon.myAccount.mydata() == false) {
                    return;
                }
                ;
                $scope.member.xingming = $scope.memberNew.xingming;
                $scope.member.xingbie = $scope.memberNew.xingbie;
            }
            // 绑定手机
            else if (p == "shoujihaoma") {
                if (effectCommon.myAccount.myphone() == false) {
                    return;
                }
                ;

                //判断是否已经点击了获取验证码
                if (publicService.isNull($scope.codeBDT)) {
                    MsgBox.promptBox("请先获取验证码", 3000);
                    return;
                }
                ;

                //判断验证码是否为空
                if ($scope.send.code == "") {
                    MsgBox.promptBox("请输入验证码", 3000);
                    return;
                }
                ;

                //判断验证码是否过期
                $scope.codeEDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                if (publicService.CalcTimeDiff($scope.codeBDT, $scope.codeEDT) >= 5) {
                    MsgBox.promptBox("验证码已超时，请重新获取", 3000);
                    return;
                }
                ;

                //判断验证码是否一致
                if ($scope.code != $scope.send.code) {
                    MsgBox.promptBox("验证码不正确", 3000);
                    return;
                }
                ;

                //判断手机号是否发生了变化
                if ($scope.memberNew.shoujihaoma != $scope.send.shoujihaoma) {
                    MsgBox.promptBox("手机号码与验证码不匹配!", 3000);
                    return;
                }
                ;
                $scope.member.zhanghu = $scope.memberNew.shoujihaoma;
            }
            // 修改登录密码
            else if (p == "mima") {
                if (effectCommon.myAccount.password() == false) {
                    return;
                }
                ;
                if ($scope.member.mima != $scope.password.oldpassword) {
                    MsgBox.promptBox("当前密码不正确", 3000);
                    return;
                }
                ;
                if ($scope.password.newpassword == $scope.password.oldpassword) {
                    MsgBox.promptBox("新密码不能与当前密码相同", 3000);
                    return;
                }
                ;
                $scope.member.mima = $scope.password.newpassword;
            } else {
                return;
            }
            ;
            //提交信息到后台处理
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">处理中，请稍后...</p></div>'
            });
            var xingming = '';
            var xingbie = '';
            var mima = '';
            var zhanghu = '';
            var youxiang = '';
            var SF = '';
            if (typeof($scope.member.xingming) != "undefined" && $scope.member.xingming != null) {
                xingming = $scope.member.xingming;
            }
            ;
            if (typeof($scope.member.xingbie) != "undefined" && $scope.member.xingbie != null) {
                xingbie = $scope.member.xingbie;
            }
            ;
            if (typeof($scope.member.mima) != "undefined" && $scope.member.mima != null) {
                mima = $scope.member.mima;
            }
            ;
            if (typeof($scope.member.zhanghu) != "undefined" && $scope.member.zhanghu != null) {
                zhanghu = $scope.member.zhanghu;
            }
            ;
            if (typeof($scope.member.youxiang) != "undefined" && $scope.member.youxiang != null) {
                youxiang = $scope.member.youxiang;
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                UserId: UserId,
                xingming: xingming,
                xingbie: xingbie,
                mima: mima,
                zhanghu: zhanghu,
                youxiang: youxiang,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            //修改用户信息
            $http.post(ENV.api + '/app/templates/user/updateUserData', objtops(myobject)).success(function(data) {
                if (data > 0) {
                    $ionicLoading.hide();
                    $scope.memberManage(myobject);
                    MsgBox.promptBox("保存成功", 1000);
                    $scope.goBack(p);
                } else {
                    $ionicLoading.hide();
                    MsgBox.promptBox("保存失败！" + data['msg'], 3000);
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("保存失败！", 3000);
            });
        };
        //返回上一页
        $scope.goBack = function(p) {
            if (p == "youxiang") {
                publicFunction.returnbut("emailMation", "mainbox", "emailMation .header");
            } else if (p == "name_gender") {
                publicFunction.returnbut("dataMation", "mainbox", "dataMation .header");
            } else if (p == "shoujihaoma") {
                publicFunction.returnbut("phoneMation", "mainbox", "phoneMation .header");
            } else if (p == "mima") {
                $scope.password = {
                    oldpassword: "",
                    newpassword: "",
                    paopassword: ""
                };
                publicFunction.returnbut("passwordMation", "mainbox", "passwordMation .header");
            }
            ;
        };

        //获取验证码
        $scope.sendVerifyCode = function(p) {
            if (p == "shoujihaoma") {
                if ($scope.member.disableMobile == $scope.memberNew.shoujihaoma || $scope.member.zhanghu == $scope.memberNew.shoujihaoma) {
                    MsgBox.promptBox("手机号码没有改变!", 3000);
                    return;
                }
                ;
                if (effectCommon.myAccount.phone() == false) {
                    return;
                }
                ;
                //判断手机号码是否已经被占用
                var shoujihaoma = '';
                var SF = '';
                if (typeof($scope.memberNew.shoujihaoma) != "undefined" && $scope.memberNew.shoujihaoma != null) {
                    shoujihaoma = $scope.memberNew.shoujihaoma;
                }
                ;
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                ;
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                var myobject = {
                    shoujihaoma: shoujihaoma,
                    sf: SF,
                    csrf_test_name: csrf_test_name
                };
                //修改用户信息
                $http.post(ENV.api + '/app/templates/user/FindZhangHu', objtops(myobject)).success(function(data) {

                    if (data > 0 && UserId != data) {
                        MsgBox.promptBox("该手机号已被占用,请更换其它号码！", 3000);
                        return;
                    }
                    ;

                    //发送验证码
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在发送验证码...</p></div>'
                    });
                    var shoujihaoma = '';
                    var xingming = '';
                    var SF = '';
                    if (typeof($scope.memberNew.shoujihaoma) != "undefined" && $scope.memberNew.shoujihaoma != null) {
                        shoujihaoma = $scope.memberNew.shoujihaoma;
                    }
                    ;
                    if (typeof($scope.member.xingming) != "undefined" && $scope.member.xingming != null) {
                        xingming = $scope.member.xingming;
                    }
                    ;
                    if (typeof(sf) != "undefined" && sf != null) {
                        SF = sf;
                    }
                    ;
                    $scope.codeBDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        shoujihaoma: shoujihaoma,
                        xingming: xingming,
                        //type: "shoujihaoma",
                        code: "",
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $scope.send = myobject;
                    $http.post(ENV.api + '/app/templates/user/YanZhengMa', objtops(myobject)).success(function(data) {
                        if (data['result'] == true) {
                            $ionicLoading.hide();
                            $scope.code = data['yzm'];
                            MsgBox.promptBox("获取验证码成功", 2000);
                            publicFunction.obtnewi.obtCodes("snsit_but", 60);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("获取验证码失败", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("获取验证码失败！", 3000);
                    });
                });
            }

            // 邮箱：发送验证码
            else {
                if ($scope.member.youxiang == $scope.memberNew.youxiang) {
                    MsgBox.promptBox("邮箱地址没有改变!", 3000);
                    return;
                }
                ;
                if (effectCommon.myAccount.myemail(false) == false) {
                    return;
                }
                ;
                //判断邮箱地址是否已经被占用
                var youxiang = '';
                var SF = '';
                if (typeof($scope.memberNew.youxiang) != "undefined" && $scope.memberNew.youxiang != null) {
                    youxiang = $scope.memberNew.youxiang;
                }
                ;
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                ;
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                var myobject = {
                    number: youxiang,
                    sf: SF,
                    csrf_test_name: csrf_test_name
                };
                $http.post(ENV.api + '/app/templates/user/FindDengLuMing', objtops(myobject)).success(function(data) {
                    if (!publicService.isNull(data)) {
                        MsgBox.promptBox("该邮箱已被占用,请更换其它邮箱！", 3000);
                        return;
                    } else {
                        //发送验证码
                        $ionicLoading.show({
                            template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在发送验证码...</p></div>'
                        });
                        var youxiang = '';
                        var SF = '';
                        if (typeof($scope.memberNew.youxiang) != "undefined" && $scope.memberNew.youxiang != null) {
                            youxiang = $scope.memberNew.youxiang;
                        }
                        ;
                        if (typeof(sf) != "undefined" && sf != null) {
                            SF = sf;
                        }
                        ;
                        $scope.codeBDT = $filter("date")(new Date(), "yyyy/MM/dd HH:mm:ss");
                        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                        var csrf_test_name = getCsrf();
                        var myobject = {
                            youxiang: youxiang,
                            type: "youxiang",
                            code: "",
                            sf: SF,
                            csrf_test_name: csrf_test_name
                        };
                        $scope.send = myobject;
                        $http.post(ENV.api + '/app/templates/user/SendEmail', objtops(myobject)).success(function(data) {
                            if (data['rel'] == true) {
                                $ionicLoading.hide();
                                MsgBox.promptBox("获取验证码成功！", 3000);
                                $scope.code = data['yzm'];
                                publicFunction.obtnewi.obtCodes("snsit_but", 60);
                            } else {
                                $ionicLoading.hide();
                                MsgBox.promptBox("获取验证码失败！", 3000);
                            }
                            ;
                        }).error(function(error) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("获取验证码失败！", 3000);
                        });
                    }
                    ;
                });
            }
            ;

        };

        //退出当前账号
        $scope.switchuser = function() {
            MsgBox.Confirm($compile, $scope, '确定要退出当前账号？', 'cancellation()');
        };
        $scope.cancellation = function() {
            $scope.member = '';
            Storage.remove('UserId');
            Storage.remove('loginBack');
            // 清飞机缓存
            Storage.remove('order');
            Storage.remove('currentContact');
            Storage.remove('userContacts');
            Storage.remove('addressList');
            Storage.remove('mail');
            Storage.remove('costdetail');
            Storage.remove('Insurance');
            Storage.remove('currentselected');
            // 清火车缓存
            Storage.remove('t_currentContact');
            Storage.remove('t_userContacts');
            Storage.remove('t_addressList');
            Storage.remove('t_insurance');
            Storage.remove('insuranceListTrain');
            Storage.remove('t_mail');
            Storage.remove('t_currentselected');
            Storage.remove('t_chooseId');
            Storage.remove('firstUserContact');
            Storage.remove('train_order');
            Storage.remove('t_costdetail');
            Storage.remove('gotoDate');
            $state.transitionTo('bibi');
        };
    }
])

//我的订单
        .controller('FlightOrderCtrl', ['$scope', 'ENV', 'MsgBox', 'Storage', '$ionicLoading', '$state', '$http', '$compile', '$ionicPlatform', 'publicService', '$filter', '$timeout',
    function($scope, ENV, MsgBox, Storage, $ionicLoading, $state, $http, $compile, $ionicPlatform, publicService, $filter, $timeout) {
        $ionicPlatform.ready(function() {
            ionic.Platform.fullScreen();
        });
        $scope.loading = {
            "display": "none"
        };
        $scope.backUser = function() {
            $state.transitionTo('tab.user');
        };
        //如果没有登录，则跳转到登录页面

        UserId = Storage.get("UserId");

        if (typeof(UserId) == 'undefined' || UserId == "" || UserId <= 0) {
            MsgBox.promptBox("请登录账号！", 1500);
            Storage.set('loginBack', 'flightOrder');
            $timeout(function() {
                $state.transitionTo('login');
            }, 1500);
            return;
        }
        ;

        //默认状态
        var status = 3;

        //获取订单列表
        $scope.getOrderList = function(status) {
			$scope.status = status;
            //获取当前时间
            $scope.today = $filter("date")(new Date(), "yyyy-MM-dd HH:mm:ss");

            //列表头部样式切换
            $scope.active = {
                on1: status == 1 ? "on" : "",
                on2: status == 2 ? "on" : "",
                on3: status == 3 ? "on" : ""
            };
            //列表内容切换
            $scope.myStyle = {
                display1: {
                    "display": status == 1 ? "block" : "none"
                },
                display2: {
                    "display": status == 2 ? "block" : "none"
                },
                display3: {
                    "display": status == 3 ? "block" : "none"
                }
            };
            // 加载前隐藏
            $scope.orderlist = "";
            $scope.loading = {
                "display": "none"
            };
            // 刚刚进入的时候显示 Loading
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            // 获取订单信息

            var SF = '';

            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                status: status,
                UserId: UserId,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/orderList', objtops(myobject)).success(function(data) {
                if (!publicService.isNull(data) && data != "false") {
                    if (!publicService.isNull(data['yonghu'])) {
                        $scope.yonghu = data['yonghu'];
                    }
                    ;
                    if (!publicService.isNull(data['orders'])) {
                        $scope.orderlist = data['orders'];
                    }
                    ;
                }
                ;
            }).error(function(error) {
                $ionicLoading.hide();
                MsgBox.promptBox("加载失败！", 3000);
            }). finally(function() {
                $ionicLoading.hide();
                $scope.loading.display = "block";
            });
        };


          $scope.doRefresh = function() {
            $scope.getOrderList($scope.status);
            $scope.$broadcast('scroll.refreshComplete');
          };

        $scope.$on('$ionicView.enter', function() {

            $('.order_filter').removeClass("on");

            UserId = Storage.get("UserId");
   
            if (typeof(UserId) == 'undefined' || UserId == "" || UserId <= 0) {
                MsgBox.promptBox("请登录账号！", 1500);
                Storage.set('loginBack', 'flightOrder');
                $timeout(function() {
                    $state.transitionTo('login');
                }, 1500);
                return;
            }
            ;
			
            $scope.getOrderList(status);

            $scope.titleName = "全部选中";

            //订单筛选状态列表
            $scope.filterStatusList = [{
                    chk: false,
                    statusName: "出票中"
                }, {
                    chk: false,
                    statusName: "已出票"
                }, {
                    chk: false,
                    statusName: "用户申请退票"
                }, {
                    chk: false,
                    statusName: "正在退票"
                }, {
                    chk: false,
                    statusName: "已退票"
                }, {
                    chk: false,
                    statusName: "无法退票"
                }, {
                    chk: false,
                    statusName: "用户申请改签"
                }, {
                    chk: false,
                    statusName: "正在改签"
                }, {
                    chk: false,
                    statusName: "已改签"
                }, {
                    chk: false,
                    statusName: "无法改签"
                }, {
                    chk: false,
                    statusName: "无法出票"
                }
            ];

            //选择状态或选择全部选中或全部取消时
            $scope.chkStatus = function(all, titleName) {
                $scope.statusArr = [];
                angular.forEach($scope.filterStatusList, function(item) {
                    if (all) {
                        item['chk'] = titleName == "全部取消" ? false : true;
                    }
                    ;
                    var idx = $scope.statusArr.indexOf(item['statusName']);
                    if (item['chk']) {
                        if (idx < 0) {
                            $scope.statusArr.push(item['statusName']);
                        }
                        ;
                    } else {
                        if (idx >= 0) {
                            $scope.statusArr.splice(idx, 1);
                        }
                        ;
                    }
                    ;
                });
                if ($scope.statusArr.length == $scope.filterStatusList.length) {
                    $scope.titleName = "全部取消";
                } else if ($scope.statusArr.length == 0) {
                    $scope.titleName = "全部选中";
                }
                ;
            };

            //确定筛选或取消筛选
            $scope.statusfilter = new Array();
            $scope.Confirmfilter = function(confirm) {
                if (confirm) {
                    var arr1 = new Array();
                    arr1 = arr1.concat($scope.statusArr);
                    $scope.statusfilter = arr1;
                } else {
                    angular.forEach($scope.filterStatusList, function(item) {
                        item['chk'] = ($scope.statusfilter.indexOf(item['statusName']) >= 0);
                    });
                    if ($scope.statusfilter.length == $scope.filterStatusList.length) {
                        $scope.titleName = "全部取消";
                    } else if ($scope.statusfilter.length == 0) {
                        $scope.titleName = "全部选中";
                    }
                    ;
                }
                ;
            };

            //列表排序
            $scope.sort = {
                sortBy: "chuangjianshijianchuo*1000",
                sortName: "按预定时间排序",
                chk: 0
            };
        });
        $scope.sortConfirm = function(p) {
            if (p) {
                if ($scope.sort.chk == 0) {
                    $scope.sort.sortBy = "chuangjianshijianchuo*1000";
                    $scope.sort.sortName = "按预定时间排序";
                } else {
                    $scope.sort.sortBy = "hangchengs.goto.qifeishijian";
                    $scope.sort.sortName = "按起飞时间排序";
                }
                ;
            } else {
                if ($scope.sort.sortBy == "chuangjianshijianchuo*1000") {
                    $scope.sort.chk = 0;
                } else {
                    $scope.sort.chk = 1;
                }
                ;
            }
            ;
			var status = 3;
            $scope.getOrderList(status);
        };

        //获取状态颜色
        $scope.getColor = function(p) {
            if (p == "已改签" || p == "已退票" || p == "无法出票" || p == "无法退票" == p == "无法改签") {
                return "c_9a9a9a";
            } else if (p == "正在退票") {
                return "c_f89c9c";
            } else {
                return "c_ff6d6d";
            }
            ;
        };
        $scope.getClass = function(p) {
            var arr_status = new Array(0, 3, 5, 6, 7, 8);
            if (arr_status.indexOf(parseInt(p)) >= 0) {
                return "border_t_1_de";
            }
            ;
            return "";
        };
        //订单明细
        $scope.orderDetail = function(p) {
            Storage.set('yonghu', $scope.yonghu);
            Storage.set('orderDetail', p);
            $state.transitionTo('orderDetail');
        };

        //申请改签
        $scope.alterTicket = function(p) {
            Storage.set('alterTicket', p);
            $state.transitionTo('alterTicket');
        };

        //申请退票
        $scope.refundTicket = function(p) {
            Storage.set('refundTicket', p);
            $state.transitionTo('refundTicket');
        };
        // 支付
        $scope.onlinePay = function(p) {

            Storage.set("ordergaiqian", p);
            Storage.set("sf", sf);

                // 订单中的总金额
                var total_fee = parseFloat(p.dingdanzonge);

                var body = "航班" + p.hangchengs.goto.qifeichengshi + "到" + p.hangchengs.goto.daodachengshi;
                var attach = '';
                var goods_tag = '';
                var detail = '';

                /*
                 var js = {
                 air: 1,
                 total_fee: total_fee,
                 body: body,
                 attach: attach,
                 goods_tag: goods_tag,
                 detail: detail,
                 dingdanid: p.orderid
                 };
                 var ps = encodeURIComponent(JSON.stringify(js));
                 
                 window.location.href = 'http://m.bibi321.com/hl/wxpay/jsapi_air_gaiqian.php?ps=' + ps + '&';
                 */
                $("#jpz_zf_total_fee").val(total_fee);
                $("#jpz_zf_body").val(body);
                $("#jpz_zf_attach").val(attach);
                $("#jpz_zf_goods_tag").val(goods_tag);
                $("#jpz_zf_detail").val(detail);
                $("#jpz_zf_dingdanid").val(p.orderid);
                $("#jpz_zf_tijiaoform").submit();

        };

    }
])
// 订单详情
        .controller('OrderDetailCtrl', ['$scope', 'ENV', '$ionicModal','$ionicPopover', 'MsgBox', 'Storage', '$state', '$location', 'publicService', '$ionicLoading', '$http', '$compile', '$stateParams', '$filter', '$ionicPlatform',
    function($scope, ENV,$ionicModal, $ionicPopover, MsgBox, Storage, $state, $location, publicService, $ionicLoading, $http, $compile, $stateParams, $filter, $ionicPlatform) {
        $ionicPlatform.ready(function() {
            ionic.Platform.fullScreen();
        });
        $scope.loading = {
            "display": "none"
        };
        var yonghu = Storage.get('yonghu');
        var orderDetail = Storage.get('orderDetail');
        //加载订单详细
        $scope.getOrderDetail = function() {
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            if (!publicService.isNull(yonghu)) {
                $scope.yonghu = yonghu;
            }
            ;
            if (!publicService.isNull(orderDetail)) {
                $scope.orderDetail = orderDetail;
            }
            ;
            $scope.loading.display = "block";
            $ionicLoading.hide();
        };
        $scope.getOrderDetail();

        //获取状态颜色
        $scope.getColor = function(p) {
            var arr_9a9a9a = new Array("已关闭", "已退款", "支付超时", "无法改签", "无法退票", "出票失败");
            if (arr_9a9a9a.indexOf(p) >= 0) {
                return "c_9a9a9a";
            } else if (p == "退款中") {
                return "c_f89c9c";
            } else {
                return "c_ff6d6d";
            }
            ;
        };
        //获取状态颜色航程旅客
        $scope.getColor2 = function(p) {
            var arr_9a9a9a = new Array("已关闭", "已取消", "已退票", "无法改签", "无法出票", "已取消", "已改签");
            if (arr_9a9a9a.indexOf(p) >= 0) {
                return "c_9a9a9a";
            } else if (p == "退票中" || p == "改签中") {
                return "c_f89c9c";
            } else {
                return "c_ff6d6d";
            }
            ;
        };

        
       // 飞机退改签
    	$ionicModal.fromTemplateUrl('templates/airtuigai.html', {
    		scope: $scope,
    		animation: 'slide-in-left',

    	}).then(function (modal) {
    		$scope.airtuigai = modal;
    	});      
        
        
       $scope.getMealPolicy = function(x, $event) {

            if (x == "goto") {

                $hangchengid = $scope.orderDetail.hangchengs.goto.id;

                if (!publicService.isNull($scope.adult) && $hangchengid == $scope.hangchengid) {
                    $scope.airtuigai.show($event);
                } else {

                    $scope.hangchengid = $hangchengid;

                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var tuigaiqian = {
                        hangchengid: $hangchengid,
                        sf: sf,
                        csrf_test_name: csrf_test_name
                    };

                    $http.post(ENV.api + '/app/db/order/chahangchengtuigaiqian', objtops(tuigaiqian)).success(function(data) {
                        if (data != 'false') {
                            $scope.adult = data[0];
                            $scope.child = data[1];
                            $scope.wangfan = "去程";
                            $scope.airtuigai.show($event);

                        } else {
                            MsgBox.promptBox("加载退改签政策失败", 3000);

                        }
                        ;

                    });

                }
                ;

            } else {

                $hangchengid = $scope.orderDetail.hangchengs.back.id;

                if (!publicService.isNull($scope.adult) && $hangchengid == $scope.hangchengid) {
                    $scope.popover.show($event);
                } else {

                    $scope.hangchengid = $hangchengid;
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var tuigaiqian = {
                        hangchengid: $hangchengid,
                        sf: sf,
                        csrf_test_name: csrf_test_name
                    };

                    $http.post(ENV.api + '/app/db/order/chahangchengtuigaiqian', objtops(tuigaiqian)).success(function(data) {

                        if (data != 'false') {
                            $scope.wangfan = "返程";
                            $scope.adult = data[0];
                            $scope.child = data[1];
                            $scope.airtuigai.show($event);

                        } else {

                            MsgBox.promptBox("加载退改签政策失败", 3000);

                        }
                        ;

                    });

                }
                ;

            }
            ;
        };
        //申请改签
        $scope.alterTicket = function(p) {
            Storage.set('alterTicket', p);
            $state.transitionTo('alterTicket');
        };

        //申请退票
        $scope.refundTicket = function(p) {
            Storage.set('refundTicket', p);
            $state.transitionTo('refundTicket');
        };
    }
])

//改签
        .controller('AlterTicketCtrl', ['$scope', 'MsgBox', '$state', '$ionicLoading', '$http', 'publicService', '$ionicPlatform', '$ionicModal', 'Storage', '$filter', 'ENV', '$timeout',
    function($scope, MsgBox, $state, $ionicLoading, $http, publicService, $ionicPlatform, $ionicModal, Storage, $filter, ENV, $timeout) {
        $ionicPlatform.ready(function() {
            ionic.Platform.fullScreen();
        });
        $scope.loading = {
            "display": "none"
        };
        $scope.display = {
            btnPost: true
        };
        var alterTicket = Storage.get('alterTicket');
        //如果没有登录，则跳转到登录页面
        var UserId = '';
 
        UserId = Storage.get("UserId");
   
        if (typeof(UserId) == 'undefined' || UserId == "" || UserId <= 0) {
            MsgBox.promptBox("请登录账号！", 1500);
            Storage.set('loginBack', 'alterTicket');
            $timeout(function() {
                $state.transitionTo('login');
            }, 1500);
            return;
        }
        ;

        //加载订单详细
        $scope.getOrderDetail = function() {
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            if (!publicService.isNull(alterTicket)) {
                $scope.orderDetail = alterTicket;
            } else {
                MsgBox.promptBox("加载订单详细失败", 3000);
            }
            ;
            $ionicLoading.hide();
            $scope.loading.display = "block";
        };
        $scope.getOrderDetail();

        $scope.UpgradeType = [{
                id: 0,
                name: "不升舱"
            }, {
                id: 1,
                name: "可考虑升为公务舱"
            }, {
                id: 2,
                name: "可考虑升为头等舱"
            }
        ];
        $scope.submitInfo = {
            //            mid: mid,
            //            oid: oid,
            Remark: "",
            goto: {
                chk: false,
                hangchengid: 0,
                changeDate: "请选择出发日期",
                upgrade: null,
                adultlist: "",
                childlist: ""
            },
            back: {
                chk: false,
                hangchengid: 0,
                changeDate: "请选择返程日期",
                upgrade: "",
                adultlist: "",
                childlist: ""
            }
        };
        //选择或取消全部

        $scope.selectedAll = function(p1, chk) {
            if (p1 == "goto") {
                var userContact = $scope.orderDetail.hangchengs.goto.hangchenglvkes;
            } else {
                var userContact = $scope.orderDetail.hangchengs.back.hangchenglvkes;
            }
            ;
            angular.forEach(userContact, function(item) {
                if (item['zhuangtai'] == '已出票') {
                    item['shifougaiqian'] = chk;
                }
                ;

            });
        };

        //提交申请
        $scope.submitApply = function() {
            var totalCount1 = 0;
            var totalCount2 = 0;

            var dt1 = $filter("date")($scope.orderDetail.hangchengs.goto.qifeishijianchuo * 1000, "yyyy-MM-dd");
            var userContact = $scope.orderDetail.hangchengs.goto.hangchenglvkes;
            var adult = $filter("gaiqian_filter")(userContact, false, {
                "key": "shifouertong",
                "value": '0'
            });
            var child = $filter("gaiqian_filter")(userContact, false, {
                "key": "shifouertong",
                "value": '1'
            });
            if (adult.length <= 0 && child.length > 0) {
                MsgBox.promptBox("原订单内，儿童数量大于成人数量，请重新选择！", 3000);
                return;
            }
            ;
            if (adult.length < child.length) {
                MsgBox.promptBox("原订单内，儿童数量大于成人数量，请重新选择！", 3000);
                return;
            }
            ;

            $scope.submitInfo.goto.adultlist = $filter("gaiqian_filter")(userContact, true, {
                "key": "shifouertong",
                "value": '0'
            });
            $scope.submitInfo.goto.childlist = $filter("gaiqian_filter")(userContact, true, {
                "key": "shifouertong",
                "value": '1'
            });
            if ($scope.submitInfo.goto.adultlist.length <= 0 && $scope.submitInfo.goto.childlist.length > 0) {
                MsgBox.promptBox("改签后的订单内，儿童数量大于成人数量，请重新选择！", 3000);
                return;
            }
            ;
            if ($scope.submitInfo.goto.adultlist.length < $scope.submitInfo.goto.childlist.length) {
                MsgBox.promptBox("改签后的订单内，儿童数量大于成人数量，请重新选择！", 3000);
                return;
            }
            ;

            totalCount1 = $scope.submitInfo.goto.adultlist.length + $scope.submitInfo.goto.childlist.length;
            if (totalCount1 > 0) {
                if ($scope.submitInfo.goto.changeDate == "请选择出发日期") {
                    MsgBox.promptBox("请选择去程改签日期！", 3000);
                    return;
                }
                ;
                if ($scope.submitInfo.goto.upgrade === null) {
                    MsgBox.promptBox("请选择去程是否升舱！", 3000);
                    return;
                }
                ;
                dt1 = $scope.submitInfo.goto.changeDate;
                $scope.submitInfo.goto.chk = true;
            } else {
                $scope.submitInfo.goto.chk = false;
            }
            ;
            $scope.submitInfo.goto.hangchengid = $scope.orderDetail.hangchengs.goto.id;
            if (!publicService.isNull($scope.orderDetail.hangchengs.back)) {
                var dt2 = $filter("date")($scope.orderDetail.hangchengs.back.qifeishijianchuo * 1000, "yyyy-MM-dd");
                var userContact = $scope.orderDetail.hangchengs.back.hangchenglvkes;
                var adult = $filter("gaiqian_filter")(userContact, false, {
                    "key": "shifouertong",
                    "value": '0'
                });
                var child = $filter("gaiqian_filter")(userContact, false, {
                    "key": "shifouertong",
                    "value": '1'
                });
                if (adult.length <= 0 && child.length > 0) {
                    MsgBox.promptBox("原订单内，儿童数量大于成人数量，请重新选择！", 3000);
                    return;
                }
                ;
                if (adult.length < child.length) {
                    MsgBox.promptBox("原订单内，儿童数量大于成人数量，请重新选择！", 3000);
                    return;
                }
                ;

                $scope.submitInfo.back.adultlist = $filter("gaiqian_filter")(userContact, true, {
                    "key": "shifouertong",
                    "value": '0'
                });
                $scope.submitInfo.back.childlist = $filter("gaiqian_filter")(userContact, true, {
                    "key": "shifouertong",
                    "value": '1'
                });
                if ($scope.submitInfo.back.adultlist.length <= 0 && $scope.submitInfo.back.childlist.length > 0) {
                    MsgBox.promptBox("改签后的订单内，儿童数量大于成人数量，请重新选择！", 3000);
                    return;
                }
                ;
                if ($scope.submitInfo.back.adultlist.length < $scope.submitInfo.back.childlist.length) {
                    MsgBox.promptBox("改签后的订单内，儿童数量大于成人数量，请重新选择！", 3000);
                    return;
                }
                ;

                totalCount2 = $scope.submitInfo.back.adultlist.length + $scope.submitInfo.back.childlist.length;
                if (totalCount2 > 0) {
                    if ($scope.submitInfo.back.changeDate == "请选择返程日期") {
                        MsgBox.promptBox("请选择回程改签日期！", 3000);
                        return;
                    }
                    ;
                    if ($scope.submitInfo.back.upgrade === "") {
                        MsgBox.promptBox("请选择回程是否升舱！", 3000);
                        return;
                    }
                    ;
                    dt2 = $scope.submitInfo.back.changeDate;
                    $scope.submitInfo.back.chk = true;
                } else {
                    $scope.submitInfo.back.chk = false;
                }
                ;
                $scope.submitInfo.back.hangchengid = $scope.orderDetail.hangchengs.back.id;
            }
            ;
            if (totalCount1 + totalCount2 == 0) {
                MsgBox.promptBox("请选择需要改签行程的乘客", 3000);
                return;
            }
            ;
            //判断改签后日期是否合法
            if (!publicService.isNull($scope.orderDetail.hangchengs.back) && publicService.compareDate(dt1, dt2) < 0) {
                MsgBox.promptBox("改签后的回程日期不能早于去程日期", 3000);
                return;
            }
            ;
            $scope.display.btnPost = false;
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">处理中，请稍后...</p></div>'
            });
            var submitInfo = '';
            var SF = '';
            if (typeof($scope.submitInfo) != "undefined" && $scope.submitInfo != null) {
                submitInfo = JSON.stringify($scope.submitInfo);
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                submitInfo: submitInfo,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/alterRequest', objtops(myobject)).success(function(data) {

                if (!publicService.isNull(data) && data == 'true') {
                    MsgBox.promptBox("您的申请已经提交审核，客服会在24小时内与您联系。请保持您的手机畅通！", 3000);
                    setTimeout(function() {
                        $state.transitionTo('flightOrder');
                    }, 3000);
                } else {
                    MsgBox.promptBox("您的申请提交失败，请您联系客服！", 3000);
                    $scope.display.btnPost = true;
                }
                ;
            }).error(function() {
                MsgBox.promptBox("您的申请提交失败，请您联系客服！", 3000);
                $scope.display.btnPost = true;
            }). finally(function() {
                $ionicLoading.hide();
                $scope.submitInfo.goto.chk = false;
                $scope.submitInfo.back.chk = false;
            });
        };
        //日期选择页－Begin
        //加载样式
        $scope.loadClass = function(p) {
            var depDate = $scope.submitInfo.goto.changeDate != "请选择出发日期" ? $scope.submitInfo.goto.changeDate : $filter("date")($scope.orderDetail.hangchengs.goto.qifeishijianchuo * 1000, "yyyy-MM-dd");
            if ($scope.currentmodifie == "back_date") {
                depDate = $scope.submitInfo.back.changeDate != "请选择返程日期" ? $scope.submitInfo.back.changeDate : $filter("date")($scope.orderDetail.hangchengs.goto.qifeishijianchuo * 1000, "yyyy-MM-dd");
            }
            ;
            if (depDate == p.solar) {
                return (p.week == '周日' || p.week == '周六') ? "c_ff6d6d on" : "on";
            } else {
                return (p.week == '周日' || p.week == '周六') ? "c_ff6d6d" : "";
            }
            ;
        };
        // 时间表
        $ionicModal.fromTemplateUrl('templates/time.html', {
            scope: $scope,
            animation: 'slide-in-left',
        }).then(function(modal) {
            $scope.time = modal;
        });

        //加载日期列表
        $scope.showDatePage = function(p) {
            $scope.currentmodifie = p == 'goto' ? 'goto_date' : 'back_date';
            $scope.titleName = p == 'goto' ? '选择出发日期' : '选择返程日期';
            //加载日期列表
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            $scope.dateLists = time;
            $scope.time.show();
            $ionicLoading.hide();

        };
        //选择日期
        $scope.selectedDate = function(p) {
            if ($scope.currentmodifie == "goto_date") {
                $scope.submitInfo.goto.changeDate = p.solar;
            } else {
                $scope.submitInfo.back.changeDate = p.solar;
            }
            ;
            $scope.time.hide();
        };
        //日期选择页－End

    }
])

//退票控制器
        .controller('RefundTicketCtrl', ['$scope', 'MsgBox', '$state', '$ionicLoading', 'Storage', 'publicService', '$ionicPlatform', '$filter', '$http', 'ENV', '$timeout',
    function($scope, MsgBox, $state, $ionicLoading, Storage, publicService, $ionicPlatform, $filter, $http, ENV, $timeout) {
        $ionicPlatform.ready(function() {
            ionic.Platform.fullScreen();
        });
        $scope.loading = {
            "display": "none"
        };
        $scope.display = {
            btnPost: true
        };
        var refundTicket = Storage.get('refundTicket');
        //如果没有登录，则跳转到登录页面

        UserId = Storage.get("UserId");
   
        if (typeof(UserId) == 'undefined' || UserId == "" || UserId <= 0) {
            MsgBox.promptBox("请登录账号！", 1500);
            Storage.set('loginBack', 'user');
            $timeout(function() {
                $state.transitionTo('login');
            }, 1500);
            return;
        }
        ;
        //加载订单详细
        $scope.getOrderDetail = function() {
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            if (!publicService.isNull(refundTicket)) {
                $scope.orderDetail = refundTicket;
            } else {
                MsgBox.promptBox("加载订单详细失败", 3000);
            }
            ;
            $ionicLoading.hide();
            $scope.loading.display = "block";
        };
        $scope.getOrderDetail();
        //获取退票原因列表
        $scope.refundReason = [{
                "Type": 0,
                "Name": "自身原因",
            }, {
                "Type": 1,
                "Name": "航班原因",
            }
        ];

        $scope.details1 = [{
                "type": "1",
                "Name": "因病无法乘机"
            }, {
                "type": "0",
                "Name": "我办理了升舱"
            }, {
                "type": "1",
                "Name": "名字错误，换开重出，新票已使用"
            }, {
                "type": "0",
                "Name": "其它问题"
            }
        ];
        $scope.details2 = [{
                "type": "1",
                "Name": "航班取消、提前、延误或航程改变"
            }
        ];
        $scope.details3 = [{
                "type": "1",
                "Name": "航班取消、提前、延误或航程改变"
            }, {
                "type": "1",
                "Name": "前段航班变动,导致后端无法乘坐"
            }
        ];
        //退票原因改变时
        $scope.selChange = function(p) {
            $scope.reasonDetails = null;
            if (p == 0) {
                $scope.reasonDetails = $scope.details1;
            } else {
                if ($scope.orderDetail.hangchengs.goto.wangfanhangcheng == 0) {
                    $scope.reasonDetails = $scope.details2;
                } else if ($scope.orderDetail.goto.hangchengs.hangkonggongsi != $scope.orderDetail.hangchengs.back.hangkonggongsi) {
                    $scope.reasonDetails = $scope.details2;
                } else {
                    $scope.reasonDetails = $scope.details3;
                }
                ;
            }
            ;
        };
        //退票信息
        $scope.refundInfo = {
			shanghuhao: "",
            refundType: null,
            RawReason: "",
            RawNote: "",
            tel: "",
            goto: {
                chk: false,
                adultlist: "",
                childlist: ""
            },
            back: {
                chk: false,
                adultlist: "",
                childlist: ""
            }
        };
        //选择或取消全部

        $scope.selectedAll = function(p1, chk) {
            if (p1 == "goto") {
                var userContact = $scope.orderDetail.hangchengs.goto.hangchenglvkes;
            } else {
                var userContact = $scope.orderDetail.hangchengs.back.hangchenglvkes;
            }
            ;
            angular.forEach(userContact, function(item) {
                if (item['zhuangtai'] == '已出票') {
                    item['shifoutuipiao'] = chk;
                }
                ;
            });
        };

        //提交退票请求
        $scope.refundRequest = function() {

            //去程
            var userContact = $scope.orderDetail.hangchengs.goto.hangchenglvkes;
            var adult = $filter("tuipiao_filter")(userContact, false, {
                "key": "shifouertong",
                "value": '0'
            });
            var child = $filter("tuipiao_filter")(userContact, false, {
                "key": "shifouertong",
                "value": '1'
            });
            if (adult.length <= 0 && child.length > 0) {
                MsgBox.promptBox("退票后将导致订单内儿童数量大于成人数量,请重新选择");
                return;
            }
            ;
            if (adult.length < child.length) {
                MsgBox.promptBox("退票后将导致订单内儿童数量大于成人数量,请重新选择");
                return;
            }
            ;
            $scope.refundInfo.goto.adultlist = $filter("tuipiao_filter")(userContact, true, {
                "key": "shifouertong",
                "value": '0'
            });
            $scope.refundInfo.goto.childlist = $filter("tuipiao_filter")(userContact, true, {
                "key": "shifouertong",
                "value": '1'
            });
            var totalCount1 = $scope.refundInfo.goto.adultlist.length + $scope.refundInfo.goto.childlist.length;
            if (totalCount1 > 0) {
                $scope.refundInfo.goto.chk = true;
            } else {
                $scope.refundInfo.goto.chk = false;
            }
            ;
            //回程
            if (!publicService.isNull($scope.orderDetail.hangchengs.back)) {
                userContact = $scope.orderDetail.hangchengs.back.hangchenglvkes;
                var adult = $filter("tuipiao_filter")(userContact, false, {
                    "key": "shifouertong",
                    "value": '0'
                });
                var child = $filter("tuipiao_filter")(userContact, false, {
                    "key": "shifouertong",
                    "value": '1'
                });
                if (adult.length <= 0 && child.length > 0) {
                    MsgBox.promptBox("退票后将导致订单内儿童数量大于成人数量,请重新选择");
                    return;
                }
                ;
                if (adult.length < child.length) {
                    MsgBox.promptBox("退票后将导致订单内儿童数量大于成人数量,请重新选择");
                    return;
                }
                ;
                $scope.refundInfo.back.adultlist = $filter("tuipiao_filter")(userContact, true, {
                    "key": "shifouertong",
                    "value": '0'
                });
                $scope.refundInfo.back.childlist = $filter("tuipiao_filter")(userContact, true, {
                    "key": "shifouertong",
                    "value": '1'
                });
                var totalCount2 = $scope.refundInfo.back.adultlist.length + $scope.refundInfo.back.childlist.length;
                if (totalCount2 > 0) {
                    $scope.refundInfo.back.chk = true;
                } else {
                    $scope.refundInfo.back.chk = false;
                }
                ;
            }
            ;
            var renshu = 0; // 选择人数
            if (!publicService.isNull($scope.orderDetail.hangchengs.back)) {
                if (totalCount1 + totalCount2 == 0) {
                    MsgBox.promptBox("请选择需要退票的乘客");
                    $scope.refundInfo.goto.chk = false;
                    $scope.refundInfo.back.chk = false;
                    return;
                }
                ;
                renshu = totalCount1 + totalCount2;
            } else {
                if (totalCount1 == 0) {
                    MsgBox.promptBox("请选择需要退票的乘客");
                    $scope.refundInfo.goto.chk = false;
                    return;
                }
                ;
                renshu = totalCount1;
            }
            ;
            if (renshu == $scope.orderDetail.ketuipiaorenshu) {
                $scope.refundInfo.isall = true;
            } else {
                $scope.refundInfo.isall = false;
            }
            ;
            if ($scope.refundInfo.refundType == null || $scope.refundInfo.RawReason == "" || $scope.refundInfo.RawReason['Name'] == "") {

                MsgBox.promptBox("请选择退票原因");
                return;
            }
            ;
            $scope.display.btnPost = false;
            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">处理中，请稍后...</p></div>'
            });

            var SF = '';
            if (typeof($scope.refundInfo) != "undefined" && $scope.refundInfo != null) {
				$scope.refundInfo.shanghuhao = $scope.orderDetail.shanghuhao;
                refundInfo = JSON.stringify($scope.refundInfo);
            }
            ;
            if (typeof(sf) != "undefined" && sf != null) {
                SF = sf;
            }
            ;
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            var csrf_test_name = getCsrf();
            var myobject = {
                refundInfo: refundInfo,
                sf: SF,
                csrf_test_name: csrf_test_name
            };
            $http.post(ENV.api + '/app/templates/user/refundRequest', objtops(myobject)).success(function(data) {
                if (!publicService.isNull(data) && data == 'true') {
                    MsgBox.promptBox("您的退票申请已经提交审核，客服会在24小时内与您联系。请保持您的手机畅通！", 3000);
                    setTimeout(function() {
                        $state.transitionTo('flightOrder');
                    }, 3000);
                } else {
                    MsgBox.promptBox("您的退票申请提交失败，请您联系客服！", 3000);
                    $scope.display.btnPost = true;
                }
                ;
            }).error(function() {
                MsgBox.promptBox("您的退票申请提交失败，请您联系客服！", 3000);
                $scope.display.btnPost = true;
            }). finally(function() {
                $ionicLoading.hide();
                $scope.refundInfo.goto.chk = false;
                $scope.refundInfo.back.chk = false;
            });
        };

    }
])

//常用信息
        .controller('CommonInfoCtrl', ['$scope', 'ENV', 'MsgBox', '$state', '$ionicLoading', '$http', 'publicService', '$compile', 'Storage', '$timeout',
    function($scope, ENV, MsgBox, $state, $ionicLoading, $http, publicService, $compile, Storage, $timeout) {

        //如果没有登录，则跳转到登录页面
        var UserId = '';
    
        UserId = Storage.get("UserId");
 
        if (typeof(UserId) == 'undefined' || UserId == "" || UserId == null || UserId <= 0) {
            MsgBox.promptBox("请登录账号！", 1500);
            Storage.set('loginBack', 'commonInfo');
            $timeout(function() {
                $state.transitionTo('login');
            }, 1500);
            return;
        }
        ;

        //默认列表
        var status = 1;

        //乘客输入框对象
        $scope.disable = {
            name: false,
            zhengjianleixing: false,
            zhengjianhaoma: false,
            isEdit: false
        };

        //获取数据列表
        $scope.getDataList = function(status) {

            $scope.loading = {
                "display": "none"
            };
            //tab切换
            $scope.active = {
                on1: status == 1 ? "on" : "",
                on2: status == 2 ? "on" : ""
            };
            $scope.myStyle = {
                display1: {
                    "display": status == 1 ? "block" : "none"
                },
                display2: {
                    "display": status == 2 ? "block" : "none"
                },
                display3: {
                    "display": "none"
                }
            };

            $ionicLoading.show({
                template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在加载...</p></div>'
            });
            switch (parseInt(status)) {
                //乘客
                case 1:
                    var SF = '';
                    if (typeof(sf) != "undefined" && sf != null) {
                        SF = sf;
                    }
                    ;
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        UserId: UserId,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/LvKeList', objtops(myobject)).success(function(data) {
                        if (data.length > 0) {
                            $ionicLoading.hide();
                            publicFunction.promptimeBox("加载乘客列表成功!", 1500);
                            $scope.userContacts = data;
                        } else {
                            $ionicLoading.hide();
                            publicFunction.promptimeBox("加载乘客列表失败!", 3000);
                        }
                        ;
                    }). finally(function() {
                        $ionicLoading.hide();
                        $scope.loading.display = "block";
                    });
                    break;

                case 2:
                    var SF = '';
                    if (typeof(sf) != "undefined" && sf != null) {
                        SF = sf;
                    }
                    ;
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        UserId: UserId,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/YongHuDiZhi', objtops(myobject)).success(function(data) {
                        if (data.length > 0) {
                            $ionicLoading.hide();
                            publicFunction.promptimeBox("加载收件地址列表成功!", 1500);
                            $scope.addressList = data;
                        } else {
                            $ionicLoading.hide();
                            publicFunction.promptimeBox("加载收件地址列表失败!", 3000);
                        }
                    }). finally(function() {
                        $ionicLoading.hide();
                        $scope.loading.display = "block";
                    });
                    break;

            }
            ;
        };
        //获取信息列表
        $scope.getDataList(status);

        //证件类型列表
        var SF = '';
        if (typeof(sf) != "undefined" && sf != null) {
            SF = sf;
        }
        ;
        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
        var csrf_test_name = getCsrf();
        var myobject = {
            sf: SF,
            csrf_test_name: csrf_test_name
        };
        $http.post(ENV.api + '/app/templates/user/ZhengJianLeiXing', objtops(myobject)).success(function(data) {
            if (data.length > 0) {
                $scope.identitys = data;
            } else {
                MsgBox.promptBox("加载证件列表失败!", 3000);
            }
            ;
        });

        //乘客编辑界面显示时的事件
        $scope.userContactDisplay = function(disable, p) {
            //证件类型列表
            //$scope.identitys = publicService.getIdentitys();
            $scope.disable.zhengjianleixing = disable;
            //编辑乘客
            if (disable) {
                //如果证件类型为身份证时，则需要隐藏生日信息
                if (p.zhengjianleixing == '身份证') {
                    $scope.myStyle.display3.display = "none";
                } else {
                    $scope.myStyle.display3.display = "block";
                }
                ;
                $scope.userContact = angular.copy(p);
                $scope.userContactOld = angular.copy(p);
            }
            //新增乘客
            else {
                $scope.userContact = {
                    //                    id: 0,
                    //                    mid: mid,
                    zhongwenming: "",
                    zhengjianleixing: "身份证",
                    zhengjianhaoma: "",
                    chushengriqi: "",
                    isChild: 0,
                    xingbie: '1',
                    shoujihao: "",
                    shifouertong: 0,
                    chk: false,
                    isNew: true
                };
            }
            ;
        };

        //收件地址编辑界面显示时的事件
        $scope.AddressDisplay = function(disable, p) {
            $scope.disable.isEdit = disable;
            if (disable) {
                $scope.address = {
                    id: p.id,
                    shoujianrenmingzi: p.shoujianrenmingzi,
                    shoujihao: p.shoujihao,
                    dizhi: p.dizhi,
                    youbian: p.youbian
                            //                    isNew: p.isNew
                };
                $scope.addressOld = {
                    shoujianrenmingzi: "",
                    shoujihao: "",
                    dizhi: ""
                };
            } else {
                $scope.address = {
                    shoujianrenmingzi: "",
                    shoujihao: "",
                    dizhi: "",
                    youbian: '',
                    //                    isNew: false
                };
            }
            ;
        };

        //保存乘客{新增：True；修改：False}
        $scope.userContactSave = function(isNew) {
            //如果信息效验失败，则中止
            if (effectCommon.addman() == false) {
                return;
            }
            ;
            $scope.userContact.chushengriqi = $('#inputpdate').val();
            //如果证件类型为身份证的，需要通过身份证号计算出生日期
            if ($scope.userContact.zhengjianleixing == '身份证') {
                var chushengriqi = $scope.userContact.zhengjianhaoma.substring(6, 14);
                $scope.userContact.chushengriqi = chushengriqi.substring(0, 4) + '-' + chushengriqi.substring(4, 6) + '-' + chushengriqi.substring(6, 8);
            }
            ;
            if (!effectCommon.judgeDate($scope.userContact.chushengriqi)) {
                MsgBox.promptBox("出生日期格式不正确");
                return;
            }
            ;
            //获取出生日期计算年龄
            var age = publicService.CalcAge($scope.userContact.chushengriqi);
            if (age < 2) {
                alert('乘客必需为２周岁以上');
                return;
            } else {
                $scope.userContact.shifouertong = (age >= 2 && age <= 12) ? 1 : 0;
            }
            ;
            //编辑时，如果信息没有改变，则不向后台提交（直接返回列表页）
            if (!isNew && $scope.userContactOld.zhongwenming == $scope.userContact.zhongwenming && $scope.userContactOld.zhengjianhaoma == $scope.userContact.zhengjianhaoma &&
                    $scope.userContactOld.chushengriqi == $scope.userContact.chushengriqi && $scope.userContactOld.shoujihao == $scope.userContact.shoujihao &&
                    $scope.userContactOld.xingbie == $scope.userContact.xingbie /* && $scope.userContactOld.isChild == $scope.userContact.isChild*/) {
                publicFunction.returnbut("addPassenger", "mainbox", "addPassenger .header");
                return;
            }
            ;
            //循环判断信息是否已存在
            var loop = true;
            var isSave = true;
            var judgResult = true; //判断结果
            angular.forEach($scope.userContacts, function(item) {
                if (loop) {
                    if (isNew) {
                        judgResult = (item['zhengjianhaoma'] == $scope.userContact.zhengjianhaoma);
                    } else {
                        judgResult = (item['zhengjianhaoma'] == $scope.userContact.zhengjianhaoma && item['id'] != $scope.userContact.id);
                    }
                    ;
                    if (judgResult) {
                        MsgBox.promptBox("该乘客已存在，请重新添加", 3000);
                        isSave = false;
                        loop = false;
                    }
                    ;
                }
                ;
            });
            //如果判断通过，则提交到后台处理
            if (isSave) {
                var id = '';
                var zhongwenming = '';
                var zhengjianleixing = '';
                var zhengjianhaoma = '';
                var chushengriqi = '';
                var shifouertong = '';
                var xingbie = '';
                var shoujihao = '';
                var SF = '';
                if (typeof($scope.userContact.id) != "undefined" && $scope.userContact.id != null) {
                    id = $scope.userContact.id;
                }
                ;
                if (typeof($scope.userContact.zhongwenming) != "undefined" && $scope.userContact.zhongwenming != null) {
                    zhongwenming = $scope.userContact.zhongwenming;
                }
                ;
                if (typeof($scope.userContact.zhengjianleixing) != "undefined" && $scope.userContact.zhengjianleixing != null) {
                    zhengjianleixing = $scope.userContact.zhengjianleixing;
                }
                ;
                if (typeof($scope.userContact.zhengjianhaoma) != "undefined" && $scope.userContact.zhengjianhaoma != null) {
                    zhengjianhaoma = $scope.userContact.zhengjianhaoma;
                }
                ;
                if (typeof($scope.userContact.chushengriqi) != "undefined" && $scope.userContact.chushengriqi != null) {
                    chushengriqi = $scope.userContact.chushengriqi;
                }
                ;
                if (typeof($scope.userContact.shifouertong) != "undefined" && $scope.userContact.shifouertong != null) {
                    shifouertong = $scope.userContact.shifouertong;
                }
                ;
                if (typeof($scope.userContact.xingbie) != "undefined" && $scope.userContact.xingbie != null) {
                    xingbie = $scope.userContact.xingbie;
                }
                ;
                if (typeof($scope.userContact.shoujihao) != "undefined" && $scope.userContact.shoujihao != null) {
                    shoujihao = $scope.userContact.shoujihao;
                }
                ;
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                ;
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                //新增乘客
                if (isNew) {
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在添加乘客...</p></div>'
                    });
                    var myobject = {
                        UserId: UserId,
                        zhongwenming: zhongwenming,
                        zhengjianleixing: zhengjianleixing,
                        zhengjianhaoma: zhengjianhaoma,
                        chushengriqi: chushengriqi,
                        shifouertong: shifouertong,
                        xingbie: xingbie,
                        shoujihao: shoujihao,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/addLvKe', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("添加成功！", 1500);
                            publicFunction.returnbut("addPassenger", "mainbox", "addPassenger .header");
                            $scope.getDataList(1);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("添加失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("添加失败！", 3000);
                    });
                }
                //编辑乘客
                else if (!isNew) {
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在编辑乘客...</p></div>'
                    });
                    var myobject = {
                        id: id,
                        zhongwenming: zhongwenming,
                        zhengjianhaoma: zhengjianhaoma,
                        shifouertong: shifouertong,
                        xingbie: xingbie,
                        shoujihao: shoujihao,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/updateLvKeData', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("编辑成功！", 1500);
                            publicFunction.returnbut("addPassenger", "mainbox", "addPassenger .header");
                            $scope.getDataList(1);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("编辑失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("编辑失败！", 3000);
                    });
                }
                ;

            }
            ;
        };

        //保存收件地址{新增：True；修改：False}
        $scope.AddressSave = function(isNew) {
            //如果信息效验失败，则中止
            if (effectCommon.addaddress() == false) {
                return;
            }
            ;
            //如果信息没有改变，则不向后台提交（直接返回列表页）
            if (!isNew && $scope.addressOld.shoujianrenmingzi == $scope.address.shoujianrenmingzi && $scope.addressOld.shoujihao == $scope.address.shoujihao && $scope.addressOld.dizhi == $scope.address.dizhi) {
                publicFunction.returnbut("addReceiver", "mainbox", "addReceiver .header");
                return;
            }
            ;
            //循环判断信息是否已存在
            var loop = true;
            var isSave = true;
            var judgResult = true; //判断结果
            angular.forEach($scope.addressList, function(item) {
                if (loop) {
                    if (isNew) {
                        judgResult = (item['shoujianrenmingzi'] == $scope.address.shoujianrenmingzi && item['shoujihao'] == $scope.address.shoujihao && item['dizhi'] == $scope.address.dizhi);
                    } else {
                        judgResult = (item['shoujianrenmingzi'] == $scope.address.shoujianrenmingzi && item['shoujihao'] == $scope.address.shoujihao && item['dizhi'] == $scope.address.dizhi && item['id'] == $scope.address.id);
                    }
                    ;
                    if (judgResult) {
                        MsgBox.promptBox("该地址已存在，请重新添加");
                        isSave = false;
                        loop = false;
                    }
                    ;
                }
                ;
            });
            //如果判断通过，则提交到后台处理
            if (isSave) {
                var id = '';
                var shoujianrenmingzi = '';
                var shoujihao = '';
                var dizhi = '';
                var youbian = '';
                var SF = '';
                if (typeof($scope.address.id) != "undefined" && $scope.address.id != null) {
                    id = $scope.address.id;
                }
                ;
                if (typeof($scope.address.shoujianrenmingzi) != "undefined" && $scope.address.shoujianrenmingzi != null) {
                    shoujianrenmingzi = $scope.address.shoujianrenmingzi;
                }
                ;
                if (typeof($scope.address.shoujihao) != "undefined" && $scope.address.shoujihao != null) {
                    shoujihao = $scope.address.shoujihao;
                }
                ;
                if (typeof($scope.address.dizhi) != "undefined" && $scope.address.dizhi != null) {
                    dizhi = $scope.address.dizhi;
                }
                ;
                if (typeof($scope.address.youbian) != "undefined" && $scope.address.youbian != null) {
                    youbian = $scope.address.youbian;
                }
                ;
                if (typeof(sf) != "undefined" && sf != null) {
                    SF = sf;
                }
                ;
                $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                var csrf_test_name = getCsrf();
                //新增地址
                if (isNew) {
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在添加地址...</p></div>'
                    });
                    var myobject = {
                        UserId: UserId,
                        shoujianrenmingzi: shoujianrenmingzi,
                        shoujihao: shoujihao,
                        dizhi: dizhi,
                        youbian: youbian,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/addYongHuDiZhi', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("添加成功！", 1500);
                            publicFunction.returnbut("addReceiver", "mainbox", "addReceiver .header");
                            $scope.getDataList(2);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("添加失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("添加失败！", 3000);
                    });
                }
                //编辑地址
                else if (!isNew) {
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在编辑地址...</p></div>'
                    });
                    var myobject = {
                        id: id,
                        shoujianrenmingzi: shoujianrenmingzi,
                        shoujihao: shoujihao,
                        dizhi: dizhi,
                        youbian: youbian,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/updateYongHuDiZhi', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("编辑成功！", 1500);
                            publicFunction.returnbut("addReceiver", "mainbox", "addReceiver .header");
                            $scope.getDataList(2);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("编辑失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("编辑失败！", 3000);
                    });
                }
                ;

            }
            ;
        };

        //删除列表信息{乘客、收件地址}
        $scope.ConfigDel = function(p, confirm) {
            if (confirm || confirm == null) {
                MsgBox.Confirm($compile, $scope, "确认删除?", "ConfigDel(" + p + ",false)");
                return;
            }
            ;
            switch (parseInt(p)) {
                //乘客人
                case 1:
                    //删除乘客
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在删除乘客...</p></div>'
                    });
                    var id = '';
                    if (typeof($scope.userContact.id) != "undefined" && $scope.userContact.id != null) {
                        id = $scope.userContact.id;
                    }
                    ;
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        id: id,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/delLvKe', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("删除成功！", 1500);
                            publicFunction.returnbut("addPassenger", "mainbox", "addPassenger .header");
                            $scope.getDataList(1);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("删除失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("删除失败！", 3000);
                    });
                    break;

                    //收件地址
                case 2:
                    //删除地址
                    $ionicLoading.show({
                        template: '<div><ion-spinner icon="ios"></ion-spinner><p style="color:#ddd">正在删除地址...</p></div>'
                    });
                    var id = '';
                    if (typeof($scope.address.id) != "undefined" && $scope.address.id != null) {
                        id = $scope.address.id;
                    }
                    ;
                    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
                    var csrf_test_name = getCsrf();
                    var myobject = {
                        id: id,
                        sf: SF,
                        csrf_test_name: csrf_test_name
                    };
                    $http.post(ENV.api + '/app/templates/user/delYongHuDiZhi', objtops(myobject)).success(function(data) {
                        if (data > 0) {
                            $ionicLoading.hide();
                            MsgBox.promptBox("删除成功！", 1500);
                            publicFunction.returnbut("addReceiver", "mainbox", "addReceiver .header");
                            $scope.getDataList(2);
                        } else {
                            $ionicLoading.hide();
                            MsgBox.promptBox("删除失败！", 3000);
                        }
                        ;
                    }).error(function(error) {
                        $ionicLoading.hide();
                        MsgBox.promptBox("删除失败！", 3000);
                    });
                    break;

            }
            ;

        };

    }
])

        .controller('AddPassengerCtrl', ['$scope', '$rootScope', 'ENV', 'MsgBox', 'publicService', 'Storage', '$stateParams', '$window', '$http', '$ionicModal', '$ionicSlideBoxDelegate', '$ionicLoading', '$ionicScrollDelegate', '$state', '$timeout', '$filter', '$interval',
    function($scope, $rootScope, ENV, MsgBox, publicService, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout, $filter, $interval) {
    }
])
        .controller('AddContactsCtrl', ['$scope', '$rootScope', 'ENV', 'MsgBox', 'publicService', 'Storage', '$stateParams', '$window', '$http', '$ionicModal', '$ionicSlideBoxDelegate', '$ionicLoading', '$ionicScrollDelegate', '$state', '$timeout', '$filter', '$interval',
    function($scope, $rootScope, ENV, MsgBox, publicService, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout, $filter, $interval) {
    }
])
        .controller('AddReceiverCtrl', ['$scope', '$rootScope', 'ENV', 'MsgBox', 'publicService', 'Storage', '$stateParams', '$window', '$http', '$ionicModal', '$ionicSlideBoxDelegate', '$ionicLoading', '$ionicScrollDelegate', '$state', '$timeout', '$filter', '$interval',
    function($scope, $rootScope, ENV, MsgBox, publicService, Storage, $stateParams, $window, $http, $ionicModal, $ionicSlideBoxDelegate, $ionicLoading, $ionicScrollDelegate, $state, $timeout, $filter, $interval) {
    }
])
        .controller('CustomCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {

        $scope.back = function() {
            $state.transitionTo('tab.home');
        };

        $scope.gotoSafty = function() {
            $state.transitionTo('safty');
        };

        $scope.gotoBuy = function() {
            $state.transitionTo('buy');
        };

        $scope.gotoZhanghao = function() {
            $state.transitionTo('zhanghao');
        };

        $scope.gotoTuigai = function() {
            $state.transitionTo('tuigai');
        };

        $scope.gotoAboutUs = function() {
            $state.transitionTo('aboutus');
        };
    }

])
        .controller('SaftyCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {
        $scope.back = function() {
            $state.transitionTo('tab.custom');
        };
    }
])
        .controller('BuyCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {
        $scope.back = function() {
            $state.transitionTo('tab.custom');
        };
    }
])
        .controller('ZhanghaoCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {
        $scope.back = function() {
            $state.transitionTo('tab.custom');
        };
    }
])
        .controller('TuigaiCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {
        $scope.back = function() {
            $state.transitionTo('tab.custom');
        };
    }
])
        .controller('AboutUsCtrl', ['$scope', 'ENV', '$state',
    function($scope, ENV, $state) {
        $scope.back = function() {
            $state.transitionTo('tab.custom');
        };
    }
])



  
  
