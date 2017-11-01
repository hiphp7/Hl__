angular.module('starter.services', [])

.factory('Storage', function () {
	return {
		set : function (key, data) {
			return window.localStorage.setItem(key, window.JSON.stringify(data));
		},
		get : function (key) {

			return window.JSON.parse(window.localStorage.getItem(key));
		},
		remove : function (key) {
			return window.localStorage.removeItem(key);
		}
	};
})
//是否微信
.factory('isWeiXin', function () {

	return function () {
		var ua = window.navigator.userAgent.toLowerCase();
		if (ua.match(/MicroMessenger/i) == 'micromessenger') {
			return true;
		}
		return false;
	}
})

.service('publicService', function ($filter) {
	return {
		isNull : function (p) {
			return (p == null || p == undefined || p == '');
		},
		//获取生日计算年龄
		CalcAge : function (brithday) {
			var dt1 = new Date(brithday.replace(/-/g, "/"));
			var dt2 = new Date();

			var y1 = dt1.getFullYear();
			var m1 = dt1.getMonth() + 1;
			var d1 = dt1.getDate();

			var y2 = dt2.getFullYear();
			var m2 = dt2.getMonth() + 1;
			var d2 = dt2.getDate();

			var age = y2 - y1;
			var md1 = m1.toString() + d1.toString();
			var md2 = m2.toString() + d2.toString();
			if (parseInt(md2) < parseInt(md1)) {
				age -= 1;
			}

			return age;
		},
		//计算两个时间相差多少分钟
		CalcTimeDiff : function (t1, t2) {
			if (t1.length > 10) {
				var time1 = new Date(t1.replace(/-/g, "/"));
				var time2 = new Date(t2.replace(/-/g, "/"));
			} else {
				var time1 = new Date("2000/01/01 " + t1);
				var time2 = new Date("2000/01/01 " + t2);
			}
			var minute = (time2.getTime() - time1.getTime()) / 86400000 * 24 * 60;

			return Math.round(minute);
		},
		//计算两日期相差多少天
		CalcDayDiff : function (d1, d2) {
			var time1 = new Date(d1);
			var time2 = new Date(d2);

			return (time2.getTime() - time1.getTime()) / 86400000;
		},
		//比较日期大小
		compareDate : function (d1, d2) {
			var time1 = new Date(d1);
			var time2 = new Date(d2);

			return time2.getTime() - time1.getTime();
		},
		//获取地址栏参数值
		getUrlParam : function (url, key, defaultValue) {
			var sValue = url.match(new RegExp("[\?\&]" + key + "=([^\&]*)(\&?)", "i"));
			defaultValue = defaultValue == undefined ? "" : defaultValue;
			return sValue ? sValue[1] : defaultValue;
		},
		//获取证件类型
		getIdentitys : function () {
			return [{
					Type : 1,
					Name : "身份证"
				}, {
					Type : 2,
					Name : "护照"
				}, {
					Type : 3,
					Name : "军官证"
				}, {
					Type : 4,
					Name : "士兵证"
				}, {
					Type : 5,
					Name : "台胞证"
				}, {
					Type : 6,
					Name : "其它"
				}
			];
		},
		//选择对话框
		ConfirmBox : function ($compile, $scope, msg, method) {
			var html = publicFunction.ConfirmBox(msg, method);
			angular.element('body').append($compile(html)($scope));
		},
		//增加或减少日期
		dayadd : function (dt, n) {
			date = new Date(dt.valueOf() + n * 24 * 60 * 60 * 1000);
			return date;
		},
		//从日期获取星期{返回周几}
		getweek : function (dt) {
			var dt1 = $filter("date")(new Date(), "yyyy-MM-dd");
			var dt2 = $filter("date")(dt, "yyyy-MM-dd");
			if (this.CalcDayDiff(dt1, dt2) == 0) {
				return '今天';
			} else if (this.CalcDayDiff(dt1, dt2) == 1) {
				return '明天';
			}

			switch (dt.getDay()) {
			case 1:
				return '周一';
			case 2:
				return '周二';
			case 3:
				return '周三';
			case 4:
				return '周四';
			case 5:
				return '周五';
			case 6:
				return '周六';
			case 0:
				return '周日';
			}
		},
		//获取随机密码
		getRandomPwd : function (min, max) {
			return Math.floor(min + Math.random() * (max - min));
		},
		//增加或减少时间{按分钟}

		minuteadd : function (dt, n) {

			date = new Date(dt.valueOf() + n * 60 * 1000);

			return date;

		},

	};

})
//信息提示框
.factory('MsgBox', function () {
	return {
		//选择对话框
		Confirm : function ($compile, $scope, msg, method) {
			var html = publicJS.ConfirmBox(msg, method);
			try {
				$('body').append($compile(html)($scope));
				// angular.element('body').append($compile(html)($scope));
			} catch (e) {
				var html = $compile(html)($scope);
				$('body').append(html);
			}
			finally {}
		},
		//等待提示框显示
		waitShow : function (msg) {
			publicJS.loadingShow(msg);
		},
		//等待提示框隐藏
		waitHide : function () {
			setTimeout(function () {
				publicJS.loadingHide();
			}, 100);
		},
		//对话框
		dialogBox : function ($compile, $scope, msg, btnText, method) {
			var html = publicJS.dialogBox(msg, btnText, method);
			angular.element('body').append($compile(html)($scope));
		},
		//提示框{自动关闭}
		promptBox : function (msg, time) {
			if (time == null)
				time = 1000;
			publicJS.promptBox(msg, time);
		},
		//提示框{倒计时}
		prompCountdown : function (leftMsg, rightMsg, time, url) {
			publicJS.prompCountdown(leftMsg, rightMsg, time, url);
		}
	}
}) //web服务

//航班列表过虑
        .filter('flight_filter', function() {
    return function(input, filterArr) {
        if (input == null)
            return;
        if (filterArr == null)
            return input;
        var output = [];
        for (var i = 0; i < input.length; i++) {
            var item = input[i];
            //按起飞时间过虑
            var filter = filterArr.deptime;
            if (filter != null && filter.length > 0) {
                if (filter.indexOf(parseInt(item['depTimeId'])) < 0) {
                    continue;
                }
            }
            //按起飞机场过虑
            filter = filterArr.depAirPort;
            if (filter != null && filter.length > 0) {
                if (filter.indexOf(item['orgAirport']) < 0) {
                    continue;
                }
            }
            //按降落机场过虑
            filter = filterArr.arrAirPort;
            if (filter != null && filter.length > 0) {
                if (filter.indexOf(item['dstAirport']) < 0) {
                    continue;
                }
            }
            //按航空公司过虑
            filter = filterArr.air;
            if (filter != null && filter.length > 0) {
                if (filter.indexOf(item['aircode']) < 0) {
                    continue;
                }
            }
            //按舱位过虑{筛选没有舱位的航班}
            filter = filterArr.seat;//获取筛选舱位数组
            if (filter != null && filter.length > 0) {
                var seat = [];
                var seatItems = item['seatItems'];
                for (var j = 0; j < seatItems.length; j++) {
                    var seatItem = seatItems[j];
                    if (filter.indexOf(seatItem['seatMsg']) >= 0) {
                        output.push(item);
                        break;
                    }
                }
            } else {
                output.push(item);
            }
        }
        return output;
    };
})

//舱位列表过虑（第二次舱位筛选）
.filter('seat_filter', function () {
	return function (input, filter) {
		if (input == null)
			return;
		if (filter == null)
			return input;
		if (filter.length == 0)
			return input;
		var output = [];
		for (var i = 0; i < input.length; i++) {
			var item = input[i];
			if (filter.indexOf(item['seatMsg']) < 0) {
				continue;
			}
			output.push(item);
		}
		return output;
	};
})
//订单状态过虑
        .filter('order_filter', function() {
    return function(input, statusArr) {
        if (input == null)
            return;
        if (statusArr == null)
            return input;
        if (statusArr.length == 0)
            return input;

        var output = [];
        angular.forEach(input, function(item) {
            var key_status = item['statusName'];
            if (statusArr.indexOf(key_status) >= 0) {
                output.push(item);
            }
        });
        return output;
    };
})

//乘客过虑器
.filter('contacts_filter', function () {

	return function (data, chk, condition) {
		var output = [];
		angular.forEach(data, function (item) {
			var bool_chk = chk == "null" ? true : item['chk'] == chk;
			if (bool_chk && parseInt(item[condition.key]) == parseInt(condition.value)) {
				output.push(item);
			}
		});
		return output;
	}
})

//判断是否改签
.filter('gaiqian_filter', function() {
    return function(data, chk, condition) {
        var output = [];
        angular.forEach(data, function(item) {
            var bool_chk = chk == "null" ? true : item['shifougaiqian'] == chk;
            if (bool_chk && parseInt(item[condition.key]) == parseInt(condition.value)) {
                output.push(item);
            }
        });
        return output;
    }
})

//判断是否退票
.filter('tuipiao_filter', function() {
    return function(data, chk, condition) {
        var output = [];
        angular.forEach(data, function(item) {
            var bool_chk = chk == "null" ? true : item['shifoutuipiao'] == chk;
            if (bool_chk && parseInt(item[condition.key]) == parseInt(condition.value)) {
                output.push(item);
            }
        });
        return output;
    }
})

//车次搜索列表过虑
.filter('search_train_filter', function () {

	return function (input, filterArr) {

		if (input == null)
			return;
		if (filterArr == null)
			return input;
		var output = [];
		for (var i = 0; i < input.length; i++) {
			var item = input[i];
			//按发车时间过虑
			var filter = filterArr.deptime;
			if (filter != null && filter.length > 0) {
				if (filter.indexOf(parseInt(item['depTimeId'])) < 0) {
					continue;
				}
			}

			//按站点名称过虑
			filter = filterArr.station;
			if (filter != null && filter.length > 0) {
				if (filter.indexOf(item['from_station']) < 0 && filter.indexOf(item['arrive_station']) < 0) {
					continue;
				}
			}

			//按车次类型过虑
			filter = filterArr.stainType;
			if (filter != null && filter.length > 0) {
				if (filter.indexOf(item['train_type']) < 0) {
					continue;
				}
			}
			output.push(item);
		}
		return output;
	};
})
//火车订单过滤
.filter('search_trainOrder', function($filter) {

    return function(input, filterArr) {
        if (input == null) {
            return;
        }
        if (filterArr == null) {
            return input;
        }
        var output = [];
        for (var i = 0; i < input.length; i++) {
            var item = input[i],
                //过滤有效订单
                filter = filterArr.effective;
            if (filter) {
                if (parseInt(item['status']) == 6 || parseInt(item['status']) == 7) {
                    continue;
                }
            }
            //过滤3个月内的订单
            filter = filterArr.time;
            if (filter) {
                if (new Date(item['chuangjianshijian']).getTime() < (new Date().getTime() - 1000 * 24 * 60 * 60 * 90)) {
                    continue;
                }
            }
            output.push(item);
        }
        return output;
    };
})
// 酒店列表页中，字符串截取
        .filter('cut', function() {
    return function(value, max, tail) {
        if (!value)
            return '';
        max = parseInt(max, 10);
        if (!max)
            return value;
        if (value.length <= max)
            return value;
        value = value.split("。")[0];
        value = value.substr(0, max);
        return value + (tail || ' …');
    };
})

// 酒店列表过滤
        .filter('hotel_filter', function() {
    return function(input, filterArr) {
        if (input == null) {
            return;
        }
        if (filterArr == null) {
            return input;
        }
        var output = [];
        for (var i = 0; i < input.length; i++) {
            var item = input[i];
            //按行政区过滤
            var filter = filterArr.district;
            filter = new RegExp(filter);
            if (filter != null && filter != '') {
                if(!filter.test(item['district'])){
                    continue;
                }
//                if (filter.indexOf(item['district']) < 0) {
//                    continue;
//                }
            }
			//按搜索页，传过来的星级过滤
            var filter = filterArr.hotelHomeStar;
            if (filter != null && filter != '') {
                if (filter.indexOf(parseInt(item['category'])) < 0) {
                    continue;
                }
            }
			//按搜索页，传过来的价格区间过滤
            var filter = filterArr.priceSelect;
            if (filter != null && filter != '') {
				var value1 = parseInt(filter.split("~")[0]);
				var value2 = parseInt(filter.split("~")[1]);
				//“600~不限”的情况
                if (isNaN(value2)){
                    if (parseInt(item['hotelPrice']) < value1) {
                        continue;
                    }
                }else{
                    if (parseInt(item['hotelPrice']) < value1 || parseInt(item['hotelPrice']) > value2) {
                        continue;
                    }
                }
            }
			//按价格区间过滤
            /*var filter = filterArr.priceRange;
            if (filter != null && filter != '') {
                if (parseInt(item['salePrice']) < 0 || parseInt(item['salePrice']) > filter) {
                    continue;
                }
            }
			*/
            //按星级过虑
            var filter = filterArr.star;
            if (filter != null && filter.length > 0) {
                if (filter.indexOf(parseInt(item['category'])) < 0) {
                    continue;
                } else {
                    output.push(item);
                }
            } else {
                output.push(item);
            }
        }
        return output;
    };
})

        // 酒店星级展示
        .filter('xingji', function() {
    return function(value) {
        if (!value)
            return '';
        value = parseInt(value, 10);
        switch (value) {
            case 1:
                return '经济型';
            case 2:
                return '三星级/舒适';
            case 3:
                return '四星级/高档';
            case 4:
                return '五星级/豪华';
            case 5:
                return '二星级/其他';
        }
    };
})
// 酒店详情页中，判断有哪些房间设施
        .filter('sheshi', function() {
    return function(value, string) {
        if (!value)
            return '';
        var index = value.indexOf(string);

        if (index > -1) {
            return true;
        } else {
            return false;
        }
    };
})
//一维数组去掉重复项
        .filter('unique1', function() {
    return function(arr, keyname) {
        var output = [];
        angular.forEach(arr, function(item) {
            var key = item[keyname];
            if (output.indexOf(key) < 0) {
                output.push(key);
            }
        });
        return output;
    };
})
;
