@extends('layouts.admin')
@section('content')

<section class="events container" ng-app="eventApp" ng-controller="IndexCtrl">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
			<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		</symbol>
	</svg>
	<div class="alert alert-success d-flex align-items-center" role="alert" style="display: none !important;">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
			Profile updated correctly
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-8 offset-lg-2">
			<div class="card">
				<h5 class="card-header text-center">PRICES</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<strong>CANADA</strong> <br>
							SUBTOTAL: <input ng-model="canadasubtotal1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="canadasubtotal2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
						<div class="col-6">
							<strong>USA</strong> <br>
							SUBTOTAL: <input ng-model="usasubtotal1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="usasubtotal2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-6">							
							TPS: <input ng-model="canadatps1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="canadatps2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
						<div class="col-6">
							TPS: <input ng-model="usatps1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="usatps2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							TVQ: <input ng-model="canadatvq1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="canadatvq2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
						<div class="col-6">
							TVQ: <input ng-model="usatvq1" style="width: 60px; display:inline-block;" class="form-control" type="text"> . <input ng-model="usatvq2" style="width: 60px; display:inline-block;" class="form-control" type="text">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<button ng-click="saveprices();" class="btn btn-down">SAVE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	var eventApp = angular.module('eventApp', ['ngRoute', 'ngAnimate','ui.sortable']);
	/*
	|
	| INDEX CONTROLLER
	|
	*/
	eventApp.controller('IndexCtrl', ['$scope', '$http', function($scope, $http) {

		$scope.visok=0;

		$http({
			method: 'POST',
			url: '/my-prices',
			data: {},
		}).then(function(response){
			$scope.canadasubtotal1=response.data[0].canadasubtotal1;
			$scope.canadasubtotal2=response.data[0].canadasubtotal2;
			$scope.usasubtotal1=response.data[0].usasubtotal1;
			$scope.usasubtotal2=response.data[0].usasubtotal2;
			$scope.canadatps1=response.data[0].canadatps1;
			$scope.canadatps2=response.data[0].canadatps2;
			$scope.usatps1=response.data[0].usatps1;
			$scope.usatps2=response.data[0].usatps2;
			$scope.canadatvq1=response.data[0].canadatvq1;
			$scope.canadatvq2=response.data[0].canadatvq2;
			$scope.usatvq1=response.data[0].usatvq1;
			$scope.usatvq2=response.data[0].usatvq2;
		});

		$scope.saveprices = function(){
			$http({
				method: 'POST',
				url: '/save-prices',
				data: {_token: "{{ csrf_token() }}",
					canadasubtotal1:$scope.canadasubtotal1,
					canadasubtotal2:$scope.canadasubtotal2,
					usasubtotal1:$scope.usasubtotal1,
					usasubtotal2:$scope.usasubtotal2,
					canadatps1:$scope.canadatps1,
					canadatps2:$scope.canadatps2,
					usatps1:$scope.usatps1,
					usatps2:$scope.usatps2,
					canadatvq1:$scope.canadatvq1,
					canadatvq2:$scope.canadatvq2,
					usatvq1:$scope.usatvq1,
					usatvq2:$scope.usatvq2},
			}).then(function(response){
				$http({
					method: 'POST',
					url: '/myevents',
					data: {},
				}).then(function(response){

					$scope.visok=1;

				});				
			});
		}


	}]);
</script>
@endsection