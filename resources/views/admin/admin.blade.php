@extends('layouts.admin')
@section('content')
<section class="clients container" ng-app="eventApp" ng-controller="IndexCtrl">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
			<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		</symbol>
	</svg>
	<div class="alert alert-success d-flex align-items-center" role="alert" ng-show="ok">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
			Profile updated correctly
		</div>
	</div>


	<table class="table table-striped">
		<tr>
			<th>Creation Date</th>
			<th>Datas</th>
			<th></th>			
		</tr>
		<tr ng-repeat="user in users">
			<td>
				@{{user.created_at}}
			</td>
			<td>
				@{{user.name}} @{{user.surname}}<br>
				@{{user.email}}
			</td>
			<td class="text-end">
				<button class="btn btn-sm btn-warning">EDIT</button>
				<button class="btn btn-sm btn-danger">DELETE</button>
			</td>			
		</tr>


	</table>


	<div class="row">
		<div class="col-12 col-lg-8 offset-lg-2">
			<div class="card">
				<h5 class="card-header text-center"><i class="far fa-user"></i> CONTACT INFORMATIONS</h5>
				<div class="card-body">
					<form class="row g-3" ng-submit="updateuser();">						
						<div class="col-md-4">
							<label for="input1" class="form-label">First name</label>
							<input type="text" id="input1" ng-model="user.name" class="form-control" placeholder="First name" required>
						</div>
						<div class="col-md-4">
							<label for="input2" class="form-label">Last name</label>
							<input type="text" id="input2" ng-model="user.surname" class="form-control" placeholder="Last name" required>
						</div>
						<div class="col-md-4">
							<label for="input3" class="form-label">Company</label>
							<input type="text" id="input3" ng-model="user.company" class="form-control" placeholder="Company">
						</div>						
						<div class="col-md-4">
							<label for="input4" class="form-label">Phone</label>
							<input type="text" id="input4" ng-model="user.phone" class="form-control" placeholder="Phone">
						</div>
						<div class="col-md-6">
							<label for="input5" class="form-label">Address</label>
							<input type="text" id="input5" ng-model="user.address" class="form-control" placeholder="Address">
						</div>
						<div class="col-md-2">
							<label for="input6" class="form-label">Postal Code</label>
							<input type="text" id="input6" ng-model="user.postalcode" class="form-control" placeholder="Postal Code">
						</div>						
						<div class="col-md-4">
							<label for="input7" class="form-label">Country</label>
							<input type="text" id="input7" ng-model="user.country" class="form-control" placeholder="Country">
						</div>
						<div class="col-md-4">
							<label for="input8" class="form-label">Province</label>
							<input type="text" id="input8" ng-model="user.province" class="form-control" placeholder="Province">
						</div>
						<div class="col-md-4">
							<label for="input9" class="form-label">City</label>
							<input type="text" id="input9" ng-model="user.city" class="form-control" placeholder="City">
						</div>
						<button type="submit" class="btn btn-down">SAVE</button>
					</form>
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

		$scope.allprofile = function(){

			$http({
				method: 'POST',
				url: '/all-profiles',
				data: {_token: "{{ csrf_token() }}",
                        iduser:"{{Auth::user()->id}}",
                }
			}).then(function(response){
				$scope.users=response.data;		
			});
		}

		$scope.allprofile();

		$scope.updateuser = function(){
			$http({
				method: 'POST',
				url: '/update-profile',
				data: {_token: "{{ csrf_token() }}",
	                    iduser:"{{Auth::user()->id}}",
	                    name:$scope.user.name,
	                    surname:$scope.user.surname,
	                    company:$scope.user.company,
	                    phone:$scope.user.phone,
	                    address:$scope.user.address,
	                    postalcode:$scope.user.postalcode,
	                    country:$scope.user.country,
	                    province:$scope.user.province,
	                    city:$scope.user.city,
	            }
			}).then(function(response){
				$scope.ok=1;
				$scope.allprofile();
			});
		}

	}]);
</script>


@endsection