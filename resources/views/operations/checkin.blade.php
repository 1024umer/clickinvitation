<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Click Invitation</title>

    <link rel="stylesheet" href="/assets/panelstyle.css">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <script src="/assets/jspanel/jquery.min.js"></script>
    <script src="/assets/jspanel/sortable.min.js"></script>
    <script src="/assets/jspanel/touchj.js"></script>
    <script src="/assets/jspanel/angular.js"></script>
    <script src="/assets/jspanel/angular-animate.min.js"></script>
    <script src="/assets/jspanel/angular-route.min.js"></script>

    <script src="/assets/jspanel/sortableang.js"></script>
    <script src="/assets/jspanel/ng-img-crop.js"></script>
</head>


<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo/logoNewGolden.png" width="200px" class="d-inline-block align-top" alt="">
            </a>
        </div>
    </nav>

    <section class="operations" ng-app="sampleApp" ng-controller="SorryCtrl">
        <div class="container webpage">
            <div class="row justify-content-md-center">
                <div class="col-12 col-sm-9">
                    <button style="border: 0;background: rgba(0,0,0,0);margin-top:15px;" class="back" onclick="history.back()""><i
                            class="fas fa-chevron-left"></i>{{ __('checkin.BACK TO INVITATION') }}</button>
                    <div class="card mb-4">
                        <h4 class="card-header text-center"><i
                                class="fal fa-user-check"></i>{{ __('checkin.CHECK-IN') }}</h4>
                        <div class="card-body mt-5">
                            <div ng-class="guest.checkin? 'row giftl bgreen':'row giftl'">
                                <div class="col">
                                    <p>@{{ guest.name }}</p>
                                </div>
                                <div class="col">
                                    <p ng-show="guest.table.name">Table: @{{ guest.table.name }}</p>
                                </div>
                                <div class="col">
                                    <p ng-show="guest.table.guest_number">Seat: @{{ guest.seat }}</p>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            {{ __('checkin.CHECK-IN') }}
                                        </label>
                                        <input class="form-check-input" type="checkbox" value=""
                                            ng-checked="guest.checkin" id="flexCheckChecked"
                                            ng-click="ch(guest.id_guest);">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div ng-repeat="g in guest.childs" ng-class="g.checkin? 'row giftl bgreen':'row giftl'">
                                <div class="col">
                                    <p>@{{ g.name }}</p>
                                </div>
                                <div class="col">
                                    <p ng-show="g.table.name">Table: @{{ g.table.name }}</p>
                                </div>
                                <div class="col">
                                    <p ng-show="g.table.guest_number">Seat: @{{ g.seat }}</p>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <label class="form-check-label" ng-show="g.checkin">
                                            {{ __('checkin.CHECK-IN') }}
                                        </label>
                                        <label class="form-check-label" ng-hide="g.checkin">
                                            {{ __('checkin.CHECK-IN') }}
                                        </label>
                                        <input class="form-check-input" type="checkbox" ng-checked="g.checkin"
                                            ng-click="ch(g.id_guest);">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="loader ng-hide" ng-show="loading">
            <img src="/assets/panelimages/loader.svg">
        </div>

        <div ng-click="decline();" class="saver ng-hide" ng-show="saveyes">
            <p>{{ __('checkin.SAVE') }}</p>
        </div>
    </section>
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <script>
        var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop']);
        sampleApp.controller('SorryCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window', '$interval',
            function($scope, $route, $http, $location, $routeParams, $window, $interval) {
                $scope.loading = 1;
                $scope.saveyes = 0;

                $http({
                    method: 'POST',
                    url: '/opened-answered',
                    data: {
                        idguest: {{ $guest->id_guest }},
                        opened: 1
                    },
                });

                $scope.showguests = function() {
                    $http({
                        method: 'POST',
                        url: '/show-opguests',
                        data: {
                            idguest: {{ $guest->id_guest }}
                        },
                    }).then(function(response) {
                        $scope.guest = response.data;
                    });
                };

                $scope.showguests();

                start = $interval(function() {
                    $scope.loading = 0;
                }, 300);

                $scope.ch = function(idg) {
                    $http({
                        method: 'POST',
                        url: '/change-check',
                        data: {
                            idguest: idg
                        },
                    }).then(function(response) {
                        $scope.showguests();
                    });
                };

                /*$scope.$watchGroup(["decliner"], function(newValue, oldValue) {
                	if (newValue != oldValue)
                		$scope.saveyes=1;
                });




                $scope.decline = function(){
                	$http({
                		method: 'POST',
                		url: '/decline',
                		data: {
                			guestcode:'{{ $guest->code }}',
                			decliner:$scope.decliner,
                		},
                	}).then(function(response){
                		$scope.saveyes=0;
                	});
                };*/

            }
        ]);
    </script>

</body>

</html>
