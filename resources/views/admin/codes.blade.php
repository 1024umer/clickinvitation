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
				<h5 class="card-header text-center"><i class="far fa-globe-americas"></i> YOUR CODES</h5>
				<div class="card-body">
					<table class="table table-striped">
						<thead class="table-light">
							<tr>
								<th></th>
								<th scope="col-10">CODE</th>
								<th scope="col">DISCOUNT</th>
								<th scope="col">TYPE</th>
								<th scope="col">EXPIRATION DATE</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="code in codes">
								<td class="align-middle">
									<a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2" ng-click="$parent.codeid=code.id_code;"><i class="far fa-trash"></i></a>
								</td>
								<td class="align-middle">@{{code.code}}</td>
								<td class="align-middle">@{{code.discount}}</td>
								<td class="align-middle">@{{code.type}}</td>
								<td class="align-middle">@{{code.expiredate}}</td>
							</tr>
						</tbody>
					</table>
					<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-down">NEW CODE</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New code</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="event-form">
						<div class="mb-3">
							<label for="code" class="form-label">Code</label>
							<input type="text" class="form-control" ng-model="code" aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="codetype" class="form-label" ng-model="type">Code Type</label>
							<select class="form-select" ng-model="type">
								<option value="">Select code type</option>
								<option value="expire">EXPIRE DATE</option>
								<option value="single">SINGLE USE</option>
							</select>
						</div>
						<div class="mb-3" ng-show="type=='expire'">
							<label for="codedate" class="form-label">Expiration Date</label>
							<input type="datetime-local" class="form-control" ng-model="expiredate">
						</div>
						<div class="mb-3">
							<label for="discount" class="form-label">Discount (%)</label>
							<input type="number" class="form-control" ng-model="discount" aria-describedby="emailHelp">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button ng-click="newcode();" id="saver" type="button" class="btn btn-success">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModal2Label">Delete Code</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h4>Are you sure to delete this code?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button ng-click="delcode();" type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete Code</button>
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

		$scope.getcodes = function(){
			$http({
				method: 'POST',
				url: '/mycodes',
				data: {},
			}).then(function(response){

				$scope.codes=response.data;
				angular.forEach($scope.codes, function(value, key) {
					if($scope.codes[key].expiredate) $scope.codes[key].expiredate=new Date($scope.codes[key].expiredate).toLocaleDateString("en-CA");
				})
				
			});
		}

		$scope.getcodes();

		$scope.newcode = function(){
			$('#exampleModal').modal('hide');

			$http({
				method: 'POST',
				url: '/new-code',
				data: {_token: "{{ csrf_token() }}",
				code:$scope.code,
				discount:$scope.discount,
				type:$scope.type,
				expiredate:$scope.expiredate},
			}).then(function(response){
				$scope.getcodes();				
			});
		}

		$scope.delcode = function(){
			$('#exampleModal2').modal('hide');

			$http({
				method: 'POST',
				url: '/del-code',
				data: {_token: "{{ csrf_token() }}",
                        codeid:$scope.codeid},
			}).then(function(response){
				$scope.getcodes();			
			});
		}

	}]);
</script>
@endsection