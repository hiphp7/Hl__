angular.module('starter', ['ionic','starter.controllers','starter.config','starter.services','starter.directive','ngResource'])

/*
*     .run(function($ionicPlatform) {
 $ionicPlatform.ready(function() {
 // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
 // for form inputs)
 if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
 cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
 }
 if (window.StatusBar) {
 // org.apache.cordova.statusbar required
 StatusBar.styleLightContent();
 }
 });
 })
* */

    .config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider) {

        var url = 'http://112.74.171.99/hl/index.php/';
        $ionicConfigProvider.platform.ios.tabs.style('standard');
        $ionicConfigProvider.platform.ios.tabs.position('bottom');
        $ionicConfigProvider.platform.android.tabs.style('standard');
        $ionicConfigProvider.platform.android.tabs.position('standard');

        $ionicConfigProvider.platform.ios.navBar.alignTitle('center');
        $ionicConfigProvider.platform.android.navBar.alignTitle('left');

        $ionicConfigProvider.platform.ios.backButton.previousTitleText('').icon('ion-ios-arrow-thin-left');
        $ionicConfigProvider.platform.android.backButton.previousTitleText('').icon('ion-android-arrow-back');

        $ionicConfigProvider.platform.ios.views.transition('ios');
        $ionicConfigProvider.platform.android.views.transition('android');
       
        $stateProvider

            // setup an abstract state for the tabs directive
            .state('tab', {
                url: "/tab",
                abstract: true,
                //templateUrl: "templates/tabs"
                templateUrl: url + "app/mytemplates/tabs"
            })

            // Each tab has its own nav history stack:

            .state('tab.home', {
                url: '/home',
                views: {
                    'tab-home': {
                        //templateUrl: 'templates/home/home.html',
                        templateUrl: url + 'app/templates/home/index',
                        controller: 'HomeCtrl'
                    }
                }
            })
            .state('tab.article', {
                url: '/article',
                views: {
                    'tab-article': {
                        //templateUrl: 'templates/article/article.html',
                        templateUrl: url + 'app/templates/article/index',
                        controller: 'ArticleCtrl'
                    }
                }
            })
            .state('tab.thread', {
                url: '/thread',
                views: {
                    'tab-thread': {
                        //templateUrl: 'templates/thread/thread.html',
                        templateUrl: url + 'app/templates/thread/index',
                        controller: 'ThreadCtrl'
                    }
                }
            })
            .state('tab.news_content', {
                url: '/news_content/:aid',

                views: {
                    'tab-article': {
                        //templateUrl: "templates/article/article-content.html",
                        templateUrl: url + 'app/templates/article/article_content',
                        controller: 'NewsContentCtrl'
                    }
                }

            })
            .state('tab.thread_content', {
                url: '/thread_content/:tid',
                views: {
                    'tab-thread': {
                        //templateUrl: "templates/thread/thread-content.html",
                        templateUrl: url + 'app/templates/thread/thread_content',
                        controller: 'ThreadContentCtrl'
                    }
                }
            })
            .state('tab.user', {
                url: '/user',
                views: {
                    'tab-user': {
                        //templateUrl: 'templates/user/user.html',
                        templateUrl: url + 'app/templates/user/index',
                        controller: 'UserCtrl'
                    }
                }
            })
            .state('tab.login', {
                url: '/login',
                views: {
                    'tab-user': {
                        //templateUrl: 'templates/user/login.html',
                        templateUrl: url + 'app/templates/user/login',
                        controller: 'LoginCtrl'
                    }
                }
            })


            .state('tab.user-personal', {
                url: '/user/personal',
                views: {
                    'tab-user': {
                        //templateUrl: 'templates/user/personal.html',
                        templateUrl: url + 'app/templates/user/personal',
                        controller: 'PersonalCtrl'
                    }
                }
            });

        // if none of the above states are matched, use this as the fallback
        $urlRouterProvider.otherwise('/tab/home');

    });
