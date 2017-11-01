angular.module('starter', ['ionic', 'starter.controllers', 'train.controllers','hotel.controllers', 'mycontrotrollers.controllers', 'starter.config', 'starter.services', 'starter.directive', 'ngResource'])

    .config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider) {

        var url = 'http://m.bibi321.com/hl/index.php/';
        $ionicConfigProvider.platform.ios.tabs.style('standard');
        $ionicConfigProvider.platform.ios.tabs.position('bottom');
        $ionicConfigProvider.platform.android.tabs.style('standard');
        $ionicConfigProvider.platform.android.tabs.position('standard');
        $ionicConfigProvider.scrolling.jsScrolling(true);
        $ionicConfigProvider.platform.ios.navBar.alignTitle('center');
        $ionicConfigProvider.platform.android.navBar.alignTitle('left');

        $ionicConfigProvider.platform.ios.backButton.previousTitleText('').icon('ion-ios-arrow-thin-left');
        $ionicConfigProvider.platform.android.backButton.previousTitleText('').icon('ion-android-arrow-back');

        $ionicConfigProvider.platform.ios.views.transition('ios');
        $ionicConfigProvider.platform.android.views.transition('android');
       
                $stateProvider

                    .state('tab', {
                        url: "/tab",
                        abstract: true,
                        prefetchTemplate:false,
                        //templateUrl: url + "app/templates/tabs"
                        templateUrl: url + "app/mytemplates/tabs",
                        controller: 'tabCtrl'
                    })

                    .state('bibi', {
                        url: "/bibi",
                        cache:'false',
                        prefetchTemplate:false,
                        templateUrl: url + "app/jiudian/home/bibi",
                        controller: 'bibiCtrl'
                    })


                    // 机票
                    .state('tab.home', {
                        url: '/home',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                //templateUrl: 'templates/home/index.html',
                                templateUrl: url + 'app/templates/home/index',
                                controller: 'HomeCtrl'
                            }
                        }
                    })
                    
                    // 机票 -- 机票
                    .state('tab.jipiao', {
                        url: '/jipiao',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                //templateUrl: 'templates/home/index.html',
                                templateUrl: url + 'app/templates/home/jipiao',
                                controller: 'JiPiaoCtrl'
                            }
                        }
                    })
                    
                    // 机票 -- 日期
                    .state('mydate', {
                        url: '/mydate/:gotoDate/:backDate/:lr',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/home/mydate',
                        controller: 'MydateCtrl'
                    })
                    
                   // 机票 -- 查询
                    .state('query', {
                        url: '/query',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/flight/query',
                        controller: 'QueryCtrl'
                    })
                    
                    // 机票 -- 地址
                    .state('place', {
                        url: '/place/:title',
                        prefetchTemplate:false,
                        cache:false,
                        templateUrl: url + 'app/templates/home/place',
                        controller: 'PlaceCtrl'
                    })
                    
                      // 机票 -- 预定
                    .state('tab.order', {
                        url: '/order',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/home/order',
                                controller: 'OrderCtrl'
                            }
                        }
                    })
                    .state('fapiaotaitou', {
                        url: '/fapiaotaitou',
                        prefetchTemplate:false,
                                templateUrl: url + 'app/templates/home/fapiaotaitou',
                                controller: 'fapiaotaitouCtrl'
                    })
                    // 支付
                    .state('wxpay', {
                        url: '/wxpay',
                        prefetchTemplate:false,
                    //url: '/wxpay/:currentContact/:mail/:addressList/:Insurance/:selected/:userContacts/:costdetail',
                        templateUrl: url + 'app/templates/home/wxpay',
                        controller: 'WXPayCtrl'
                    })

                    // 机票 -- 乘客信息
                    .state('tab.passenger', {
                        url: '/passenger/:passenger/:edit',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/passenger/index',
                                controller: 'PassengerCtrl'
                            }
                        }
                    })

                    // 机票 -- 乘客信息
                    .state('tab.passengerEdit', {
                        url: '/passengerEdit/:isEdit/:p',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/passenger/edit',
                                controller: 'PassengerEditCtrl'
                            }
                        }
                    })
                    // 机票 -- 联系人信息
                    .state('tab.contacts', {
                        url: '/contacts',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/contacts/index',
                                controller: 'ContactsCtrl'
                            }
                        }
                    })

                    // 机票 -- 编辑联系人
                    .state('tab.contactsEdit', {
                        url: '/contactsEdit/:isEdit/:p',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/contacts/edit',
                                controller: 'ContactsEditCtrl'
                            }
                        }
                    })
                    /*
                    // 机票 -- 自营 编辑联系人
                    .state('tab.contacts_ziying', {
                        url: '/contacts_ziying',
                        prefetchTemplate:false,
                        views: {
                            'tab-home': {
                                templateUrl: url + 'app/templates/contacts/contacts_ziying',
                                controller: 'Contacts_ziyingEditCtrl'
                            }
                        }
                    })
                    
                    // 机票 -- 三方 编辑联系人
                    .state('tab.contacts_sanfang', {
                        url: '/contacts_sanfang/:isEdit/:p',
                        prefetchTemplate:false,
                        views: {
                            'tab-home': {
                                templateUrl: url + 'app/templates/contacts/contacts_sanfang',
                                controller: 'Contacts_sanfangEditCtrl'
                            }
                        }
                    })
                    */
                    // 机票 -- 添加联系人
                    .state('tab.contactsAdd', {
                        url: '/contactsAdd',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/contacts/add',
                                controller: 'ContactsAddCtrl'
                            }
                        }
                    })


                    // 机票 -- 邮递地址列表信息
                    .state('tab.address', {
                        url: '/address',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/address/index',
                                controller: 'AddressCtrl'
                            }
                        }
                    })

                    // 机票 -- 编辑邮递地址
                    .state('tab.addressEdit', {
                        url: '/addressEdit/:isEdit/:p',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/address/edit',
                                controller: 'AddressEditCtrl'
                            }
                        }
                    })

                    // 机票 -- 详细
                    .state('tab.detail', {
                        url: '/detail',
                        views: {
                            'tab-home': {
                                prefetchTemplate:false,
                                //templateUrl: 'templates/home/detail.html',
                                templateUrl: url + 'app/templates/home/detail',
                                controller: 'DetailCtrl'
                            }
                        }
                    })
                    
                    //
                    // 我的  
                    .state('tab.user', {
                        url: '/user',
                        views: {
                            'tab-user': {
                                prefetchTemplate:false,
                                //templateUrl: 'templates/user/index.html',
                                templateUrl: url + 'app/templates/user/index',
                                controller: 'UserCtrl'
                            }
                        }
                    })
                    // 我的 -- 登录
                    .state('login', {
                        url: '/login',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/user/login.html',
                        templateUrl: url + 'app/templates/user/login',
                        controller: 'LoginCtrl'
                    })
                    // 找回密码
                    .state('forgotPassword', {
                        url: '/forgotPassword',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/user/forgotPassword',
                        controller: 'ForgotPasswordCtrl'
                    })
                    // 我的 -- 注册
                    .state('register', {
                        url: '/register',
                        prefetchTemplate:false,
                            //templateUrl: 'templates/user/register.html',
                            templateUrl: url + 'app/templates/user/register',
                            controller: 'RegisterCtrl'
                    })
                    // 我的 -- 我的账号
                    .state('myaccount', {
                        url: '/myaccount',
                        prefetchTemplate:false,
                            //templateUrl: 'templates/user/login.html',
                            templateUrl: url + 'app/templates/user/myaccount',
                            controller: 'MyAccountCtrl'
                    })
                    
                    
                    // 我的 -- 机票订单
                    .state('flightOrder', {
                        url: '/flightOrder',
                        prefetchTemplate:false,
                            //templateUrl: 'templates/user/login.html',
                            templateUrl: url + 'app/templates/user/flightOrder',
                            controller: 'FlightOrderCtrl'
                    })
                    // 机票订单 - 订单详情
                    .state('orderDetail', {
                        url: '/orderDetail',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/user/orderDetail',
                        controller: 'OrderDetailCtrl'
                    })
                    // 机票订单 - 改签
                    .state('alterTicket', {
                        url: '/alterTicket',
                        prefetchTemplate:false,
						cache:'false',
                        templateUrl: url + 'app/templates/user/alterTicket',
                        controller: 'AlterTicketCtrl'
                    })
                    // 机票订单 - 退票
                    .state('refundTicket', {
                        url: '/refundTicket',
                        prefetchTemplate:false,
						cache:'false',
                        templateUrl: url + 'app/templates/user/refundTicket',
                        controller: 'RefundTicketCtrl'
                    })
                    // 我的 -- 常用信息
                    .state('commonInfo', {
                        url: '/commonInfo',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/user/commonInfo',
                        controller: 'CommonInfoCtrl'
                    })
                    
                    // 客服
                    .state('tab.custom', {
                        url: '/custom',
                            views: {
                                'tab-user': {
                                    prefetchTemplate:false,
                                    //templateUrl: 'templates/custom/index.html',
                                    templateUrl: url + 'app/templates/custom/index',
                                    controller: 'CustomCtrl'
                                }
                            }
                    })
                    // 客服 -- 安全保障
                    .state('safty', {
                        url: '/safty',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/custom/safty.html',
                        templateUrl: url + 'app/templates/custom/safty',
                        controller: 'SaftyCtrl'
                    })
                    // 客服 -- 购买
                    .state('buy', {
                        url: '/buy',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/custom/buy.html',
                        templateUrl: url + 'app/templates/custom/buy',
                        controller: 'BuyCtrl'
                    })
                    // 客服 -- 账号管理
                    .state('zhanghao', {
                        url: '/zhanghao',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/custom/zhanghao.html',
                        templateUrl: url + 'app/templates/custom/zhanghao',
                        controller: 'ZhanghaoCtrl'
                    })
                    // 客服 -- 退改票
                    .state('tuigai', {
                        url: '/tuigai',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/custom/tuigai.html',
                        templateUrl: url + 'app/templates/custom/tuigai',
                        controller: 'TuigaiCtrl'
                    })  
                    // 客服 -- 关于我们
                    .state('aboutus', {
                        url: '/aboutus',
                        prefetchTemplate:false,
                        //templateUrl: 'templates/custom/aboutus.html',
                        templateUrl: url + 'app/templates/custom/aboutus',
                        controller: 'AboutUsCtrl'
                    })
                    .state('tab.train', {
                        url:'/train',
                        params: {
                            gotoDate: ''
                        },
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/train/index',
                                controller: 'trainCtrl'
                            }
                        }
                    })
                    .state('trainList', {
                        url:'/trainList',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/train/trainList',
                        controller: 'trainListCtrl'

                        
                    })
                    .state('tab.trainOrder', {
                        url:'/trainOrder',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/train/trainOrder',
                                controller: 'trainOrderCtrl'
                            }
                        }
                    })
                    
                    // 我的 -- 我火车列表
                    .state('tab.trainorderlist', {
                        cache:false,
                        url: '/trainorderlist',
                        views: {
                            'tab-user': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/user/trainorderlist',
                                controller: 'mytrainCtrl'
                            }
                        }
                    })
                     // 我的 -- 我火车订单详情
                    .state('trainorderinfo', {
                        cache:false,
                        prefetchTemplate:false,
                        url: '/trainorderinfo/:id/:status',
                        templateUrl: url + 'app/templates/user/trainorderinfo',
                        controller: 'mytraininfoCtrl'
                    })
                     // 我的 -- 我火车订单详情
                    .state('traintuikuan', {
                        cache:false,
                        prefetchTemplate:false,
                        url: '/traintuikuan/:id/:status',
                        templateUrl: url + 'app/templates/user/traintuikuan',
                        controller: 'traintuikuanCtrl'
                    })
                    
                    // 火车 -- 地址
                    .state('trainplace', {
                        url: '/trainplace/:title',
                        cache:false,
                        prefetchTemplate:false,
                        templateUrl: url + 'app/templates/train/place',
                        controller: 'TrainPlaceCtrl'
                    })
                    // 火车 -- 乘客信息
                     .state('tab.passengerTrain', {
                         url: '/passengerTrain/:passenger/:edit',
                         views: {
                             'tab-train': {
                                 prefetchTemplate:false,
                                 templateUrl: url + 'app/templates/passenger/indexTrain',
                                 controller: 'PassengerTrainCtrl'
                             }
                         }
                     })

                    // 火车 -- 乘客信息
                    .state('tab.passengerTrainEdit', {
                        url: '/passengerTrainEdit/:isEdit/:p',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/passenger/editTrain',
                                controller: 'PassengerTrainEditCtrl'
                            }
                        }
                    })
                    // 火车 -- 联系人信息
                    /*
                    .state('tab.contactsTrain', {
                        url: '/contactsTrain',
                        prefetchTemplate:false,
                        views: {
                            'tab-train': {
                                templateUrl: url + 'app/templates/contacts/indexTrain',
                                controller: 'ContactsTrainCtrl'
                            }
                        }
                    })
                    */
                    // 火车 -- 编辑联系人
                    .state('tab.contactsTrainEdit', {
                        url: '/contactsTrainEdit/:isEdit/:p',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/contacts/editTrain',
                                controller: 'ContactsTrainEditCtrl'
                            }
                        }
                    })
                    // 火车 -- 添加联系人
                    .state('tab.contactsTrainAdd', {
                        url: '/contactsTrainAdd',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/contacts/addTrain',
                                controller: 'ContactsTrainAddCtrl'
                            }
                        }
                    })


                    // 火车 -- 邮递地址列表信息
                    .state('tab.addressTrain', {
                        url: '/addressTrain',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/address/indexTrain',
                                controller: 'AddressTrainCtrl'
                            }
                        }
                    })

                    // 火车 -- 编辑邮递地址
                    .state('tab.addressTrainEdit', {
                        url: '/addressTrainEdit/:isEdit/:p',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/address/editTrain',
                                controller: 'AddressTrainEditCtrl'
                            }
                        }
                    })
                    // 火车 -- 邮递地址信息
                    .state('tab.addressTrainInfo', {
                        url: '/addressTrainInfo',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/address/InfoTrain',
                                controller: 'AddressTrainInfoCtrl'
                            }
                        }
                    })
                     // 火车 -- 保险套餐
                    .state('tab.insuranceTrain', {
                        url: '/insuranceTrain',
                        views: {
                            'tab-train': {
                                prefetchTemplate:false,
                                templateUrl: url + 'app/templates/train/insurance',
                                controller: 'InsuranceTrainCtrl'
                            }
                        }
                    })
                    
                    
        //-------------------------酒店-------------------------\\

            //         //酒店
            //         .state('jiudian_tab', {
            //     url: '/jiudian_tab',
            //     abstract: true,
            //     templateUrl: url + 'app/jiudian/home/tabs',
            //     controller: 'JiuDian_TabCtrl'
            // })
            //酒店主页
                .state('tab.hotelhome', {
                url: '/hotelhome',
                
                views: {
                    'tab-hotelhome': {
                        prefetchTemplate:false,
                        templateUrl: url + 'app/jiudian/home/hotelhome',
                        controller: 'hotelhomeCtrl'
                    }
                }
            })
            
            
        //     .state('index_tab', {
        //        url: '/index_tab',
        //        abstract: true,
        //        templateUrl: url + 'app/jiudian/home/tabs_index',
        //        controller: 'Index_TabCtrl'
        //    })  
        //        .state('index_tab.bibi', {
        //        url: '/bibi',
        //        views: {
        //            'index_tab-bibi': {
        //                templateUrl: url + 'app/jiudian/home/bibi',
        //                controller: 'bibiCtrl'
        //            }
        //        }
        //    })    
            
            
                    //城市选择
                    .state('jiudian_place', {
                url: '/jiudian_place',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/place',
                controller: 'JiuDian_PlaceCtrl'
            })
                    //选择日期
                    .state('jiudian_date', {
                url: '/jiudian_date',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/jiudian_date',
                controller: 'jiudian_dateCtrl'
            })
           //酒店列表
                    .state('hotels', {
                url: '/hotels',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/jiudian_query/hotels',
                controller: 'HotelsCtrl'


            })
            //酒店详情
                    .state('hotelDetail', {
                url: '/hotelDetail/:flag',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/jiudian_query/hotelDetail',
                controller: 'HotelDetailCtrl'


            })
            //提交订单
                    .state('tjdd', {
                url: '/tjdd',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/tjdd',
                controller: 'TjddCtrl'


            })
            //酒店邮递地址
                    .state('hotel_address', {
                url: '/hotel_address',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/hotel_address/index',
                controller: 'hotel_addressCtrl'
            })
                    // 酒店 -- 编辑/新增邮递地址
                    .state('hotel_addressEdit', {
                url: '/hotel_addressEdit/:isEdit/:p',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/hotel_address/edit',
                controller: 'hotel_addressEditCtrl'
            })

                    //酒店 -- 发票抬头
                    .state('hotel_fapiaotaitou', {
                url: '/hotel_fapiaotaitou',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/hotel_fapiaotaitou',
                controller: 'hotel_fapiaotaitouCtrl'
            })
                    //超级特价
                    .state('chats', {
                        url: '/chats',
                        prefetchTemplate:false,
                        templateUrl: url + 'app/jiudian/home/tab_chats',
                        controller: 'ChatsCtrl'
            })
                    .state('jiudian_tab.chat-detail', {
                url: '/chats/:chatId',
                views: {
                    'jiudian_tab-chats': {
                        prefetchTemplate:false,
                        templateUrl: url + 'app/jiudian/home/chat_detail',
                        controller: 'ChatDetailCtrl'
                    }
                }
            })
               //订单列表
                     .state('account', {
                url: '/account',
                cache:'false',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/tab_account',
                controller: 'AccountCtrl'

            })
                    .state('jiudian_tab.zf', {
                url: '/chats/:chatId/zf',
                views: {
                    'jiudian_tab-chats': {
                        prefetchTemplate:false,
                        templateUrl: url + 'app/jiudian/home/zf',
                        controller: 'ZfCtrl'
                    }
                }
            })
                
            //在线支付
                    .state('zxf', {
                url: '/hotelhome/hotels/:hotelId/tjdd/zxf',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/zxf',
                controller: 'ZxfCtrl'


            })
            //订单详情
                    .state('ddxq', {
                url: '/hotelhome/hotels/:hotelId/tjdd/zxf/ddxq',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/ddxq',
                controller: 'DdxqCtrl'

            })
            //取消订单
            .state('qxdd', {
              url: '/qxdd',
              cache:'false',
              prefetchTemplate:false,
              templateUrl:  url + 'app/jiudian/home/qxdd',
              controller: 'QxddCtrl'
            })
            //选择入住人
             .state('xzrzr', {
              url: 'xzrzr/:num',
              prefetchTemplate:false,
              templateUrl:  url + 'app/jiudian/home/xzrzr',
              controller: 'XzrzrCtrl'
            })
            //我的收藏
            .state('wdsc', {
                url: '/wdsc/:city/:citycode',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/wdsc',
                controller: 'WdscCtrl'
            })     
            //全部城市
            .state('allcity', {
                url: '/allcity',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/allcity',
                controller: 'AllcityCtrl'
            })       
            
            //浏览历史
            .state('history', {
                url: '/history',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/history',
                controller: 'HistoryCtrl'
            })     
            //图片展示
            .state('showimg', {
                url: '/showimg',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/showimg',
                controller: 'ShowimgCtrl'
            })    
            //大图
            .state('bigimg', {
                url: '/bigimg/:num',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/bigimg',
                controller: 'BigimgCtrl'
            })  
            //常见问题
            .state('changjianwenti', {
                url: '/changjianwenti',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/changjianwenti',
                controller: 'ChangjianwentiCtrl'
            })  
            //比比优势
            .state('bibiyoushi', {
                url: '/bibiyoushi',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/bibiyoushi',
                controller: 'BibiyoushiCtrl'
            })      
            //合作伙伴
            .state('hezuohuoban', {
                url: '/hezuohuoban',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/hezuohuoban',
                controller: 'HezuohuobanCtrl'
            })  
            //订票指南
            .state('dingpiaozhinan', {
                url: '/dingpiaozhinan',
                prefetchTemplate:false,
                templateUrl: url + 'app/jiudian/home/dingpiaozhinan',
                controller: 'DingpiaozhinanCtrl'
            })      
        ;

                // if none of the above states are matched, use this as the fallback
                $urlRouterProvider.otherwise('bibi');

            })
                  .run(function($ionicPlatform) {
                $ionicPlatform.ready(function() {
                  // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
                  // for form inputs)
                  if(window.cordova && window.cordova.plugins.Keyboard) {
                    cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
                  }
                  if(window.StatusBar) {
                    StatusBar.styleDefault();
                  }
                });
              });