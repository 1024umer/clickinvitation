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

                <div class="col-12">
                    <button style="border: 0;background: rgba(0,0,0,0);margin-top:15px;" class="back" onclick="history.back()""><i
                            class="fas fa-chevron-left"></i>{{ __('giftsuggestion.BACK TO INVITATION') }}</button>
                    <div class="card mb-4">
                        <h4 class="card-header text-center"><i
                                class="fal fa-gift"></i>{{ __('giftsuggestion.OUR GIFT SELECTION') }}</h4>
                        <div class="card-body mt-5">

                            <div class="row giftl align-items-center" ng-repeat="gift in gifts">
                                <div class="col-8">
                                    <p>@{{ gift.name }}</p>
                                    <i>@{{ gift.description }}</i>
                                    <a href="@{{ gift.link }}" target="_BLANK">{{ __('giftsuggestion.LINK') }}</a>
                                </div>
                                <div class="col-4 text-end" ng-show="!gift.id_pick">
                                    <a class="btn btn-warning btn-sm" style="width: auto;"
                                        ng-click="$parent.idpick=gift.id_gift;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">{{ __('giftsuggestion.SELECT GIFT') }}</a>
                                </div>
                                <div class="col-4 text-end" ng-show="gift.id_pick">
                                    <i>{{ __('giftsuggestion.Already selected') }}</i>
                                </div>
                            </div>

                            <div class="row type">
                                <div class="col-4">
                                    <strong>{{ __('giftsuggestion.TRANSFER TYPE:') }}</strong>
                                </div>
                                <div class="col-8">
                                    <p>{{ $event->transfer_type }}</p>
                                </div>

                                <div class="col-4">
                                    <strong>{{ __('giftsuggestion.TRANSFER LINK:') }}</strong>
                                </div>
                                <div class="col-8">
                                    <p>{{ $event->transfer_link }}</p>
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
            <p>{{ __('giftsuggestion.SAVE') }}</p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal2Label">{{ __('giftsuggestion.Gift Selection') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('giftsuggestion.Are you sure to select this gift?') }}</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('giftsuggestion.Close') }}</button>
                        <button data-bs-dismiss="modal" ng-click="pick();" type="button"
                            class="btn btn-warning w-auto">{{ __('giftsuggestion.Select Gift') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <script>
        var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop']);
        sampleApp.controller('SorryCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window', '$interval',
            function($scope, $route, $http, $location, $routeParams, $window, $interval) {
                $scope.idpick = '';
                $scope.saveyes = 0;

                $http({
                    method: 'POST',
                    url: '/opened-answered',
                    data: {
                        idguest: {{ $guest->id_guest }},
                        opened: 1
                    },
                });

                $scope.showgifts = function() {
                    $http({
                        method: 'POST',
                        url: '/show-opgifts',
                        data: {
                            idevent: {{ $event->id_event }}
                        },
                    }).then(function(response) {
                        $scope.gifts = response.data;
                    });
                };

                $scope.showgifts();

                $scope.pick = function() {
                    $http({
                        method: 'POST',
                        url: '/pick-gift',
                        data: {
                            idpick: $scope.idpick,
                            idguest: {{ $guest->id_guest }}
                        },
                    }).then(function(response) {
                        $scope.showgifts();
                    });
                };

                /*$scope.$watchGroup(["decliner"], function(newValue, oldValue) {
                	if (newValue != oldValue)
                		$scope.saveyes=1;
                });


                start = $interval(function() {
                    $scope.loading=0;
                }, 300);

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
