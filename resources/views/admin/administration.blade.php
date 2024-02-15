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
				<h5 class="card-header text-center"><i class="far fa-globe-americas"></i> YOUR EVENTS</h5>
				<div class="card-body">
					<table class="table table-striped">
						<thead class="table-light">
							<tr>
								<th></th>
								<th scope="col-10">DATE CREATION</th>
								<th scope="col">DATE EVENT</th>
								<th scope="col">EVENT TITLE</th>
								<th scope="col-2"></th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="event in events">
								<td class="align-middle">
									<a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2" ng-click="$parent.delid=event.id_event; $parent.delname=event.name;"><i class="far fa-trash"></i></a>
								</td>
								<td class="align-middle">@{{event.created_at}}</td>
								<td class="align-middle">@{{event.date}}</td>
								<td class="align-middle">@{{event.name}} @{{event.type}}</td>
								<td class="text-end">
									<a href="/event/@{{event.id_event}}" class="btn btn-sm btn-warning" href="">START CREATING</a>
								</td>
							</tr>
						</tbody>
					</table>
					<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-down">NEW EVENT</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New event</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="event-form">
						<div class="mb-3">
							<label for="eventtitle" class="form-label">Event title (max 25 characters)</label>
							<input type="text" class="form-control" ng-model="eventtitle" aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="eventdate" class="form-label">Date</label>
							<input type="datetime-local" class="form-control" ng-model="eventdate">
						</div>
						<div class="mb-3">
							<label for="eventtype" class="form-label">Event type</label>
							<select class="form-select" ng-model="eventtype">
								<option value="">Select event type</option>
								<option value="WEDDING">WEDDING</option>
								<option value="BABY-SHOWER">BABY-SHOWER</option>
								<option value="ANNIVERSARY">ANNIVERSARY</option>
								<option value="BAPTISM">BAPTISM</option>
								<option value="BIRTHDAY">BIRTHDAY</option>
								<option value="CORPORATE">CORPORATE</option>
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button ng-click="newevent();" id="saver" type="button" class="btn btn-success">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModal2Label">Delete Event @{{delname}}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h4>Are you sure to delete this event?</h4>
					<h5>By deleting this event you will lose all data and photos</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button ng-click="delevent();" type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete Event</button>
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

		$http({
			method: 'POST',
			url: '/myevents',
			data: {},
		}).then(function(response){

			$scope.events=response.data;
			angular.forEach($scope.events, function(value, key) {
				$scope.events[key].created_at=new Date($scope.events[key].created_at).toLocaleDateString("en-CA");
				$scope.events[key].date=new Date($scope.events[key].date).toLocaleString("en-CA");
			})
			
		});

		$scope.newevent = function(){
			$('#exampleModal').modal('hide');

			$http({
				method: 'POST',
				url: '/new-event',
				data: {_token: "{{ csrf_token() }}",
                        eventtitle:$scope.eventtitle,
                        eventdate:$scope.eventdate,
                        eventtype:$scope.eventtype},
			}).then(function(response){
				$http({
					method: 'POST',
					url: '/myevents',
					data: {},
				}).then(function(response){

					$scope.events=response.data;

				});				
			});
		}

		$scope.delevent = function(){
			$('#exampleModal2').modal('hide');

			$http({
				method: 'POST',
				url: '/del-event',
				data: {_token: "{{ csrf_token() }}",
                        eventid:$scope.delid},
			}).then(function(response){
				$http({
					method: 'POST',
					url: '/myevents',
					data: {},
				}).then(function(response){

					$scope.events=response.data;

				});				
			});
		}

	}]);
</script>
@endsection