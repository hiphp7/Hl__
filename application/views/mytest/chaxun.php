<html ng-app="ionicApp">
    <head
        <title>Ionic Alphabetically Indexed List</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic.min.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic.filter.bar.min.css"); ?>' rel="stylesheet"/>
        <link href='<?php echo base_url("lib/ionic/css/ionic-datepicker.styles.css"); ?>' rel="stylesheet"/>
        <script src='<?php echo base_url("lib/ionic/js/ionic.bundle.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/ionic-datepicker.bundle.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/ionic.filter.bar.min.js"); ?>'></script>

        <script src='<?php echo base_url("lib/jquery/jquery.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/jquery/mobiscroll_date.js"); ?>'></script>
        <script src='<?php echo base_url("lib/jquery/mobiscroll.js"); ?>'></script>

        <script src='<?php echo base_url("lib/ionic/js/angular-local-storage.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-resource.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-sanitize.min.js"); ?>'></script>
        <script src='<?php echo base_url("lib/ionic/js/angular/angular-animate.min.js"); ?>'></script>

        <script type="text/javascript">
            angular.module('ionicApp', ['ionic', 'jett.ionic.filter.bar'])

              .controller('MyCtrl', function($scope, $timeout, $ionicFilterBar) {
               
                var filterBarInstance;

                function getItems() {
                    var items = [];
                    for (var x = 1; x < 20; x++) {
                        items.push({text: 'This is item number ' + x + ' which is an ' + (x % 2 === 0 ? 'EVEN' : 'ODD') + ' number.'});
                    }
                    $scope.items = items;
                }

                getItems();
                /*
                $scope.showFilterBar = function() {
                    filterBarInstance = $ionicFilterBar.show({
                        items: $scope.items,
                        update: function(filteredItems, filterText) {
                            $scope.items = filteredItems;
                            if (filterText) {
                                console.log(filterText);
                            }
                        }
                    });
                };

                $scope.refreshItems = function() {
                    if (filterBarInstance) {
                        filterBarInstance();
                        filterBarInstance = null;
                    }

                    $timeout(function() {
                        getItems();
                        $scope.$broadcast('scroll.refreshComplete');
                    }, 1000);
                };
                */
            });

        </script>

    </head>

    <body ng-controller="MyCtrl">

    <ion-nav-buttons side="secondary">
        <button class="button button-icon icon ion-ios-search-strong" ng-click="showFilterBar()">
        </button>
    </ion-nav-buttons>

    <ion-content direction="y" scrollbar-y="false">

        <ion-refresher pulling-icon="ion-arrow-down-b" on-refresh="refreshItems()">
        </ion-refresher>

        <ion-list>
            <ion-item collection-repeat="item in items" >
                <p>{{item.text}}</p>
            </ion-item>
        </ion-list>

        <div ng-if="items !== undefined && !items.length" class="no-results">
            <p>No Results</p>
        </div>

    </ion-content>

</body>
</html>