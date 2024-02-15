@extends('layouts.layoutpanel')
@section('content')

<section class="gl container" ng-app="sampleApp" ng-controller="GuestslistCtrl">

	<div class="container guestlist">
		<div class="row justify-content-md-center">

			<div class="col-9 operations">
				<div class="card mb-0">
					<div class="card-body">
						<div class="input-group mb-0">
							<input type="text" class="form-control" placeholder="{{__('guestlistpage.Find guest by name, phone, e-mail')}}" aria-label="Recipient's username" aria-describedby="basic-addon2" ng-model="myfilter">
							<span class="input-group-text" id="basic-addon2"><i class="fal fa-search"></i></span>
						</div>
					</div>
				</div>
			</div>


			<div class="col-9 list">
				<div class="card mb-4">
					<div class="card-body">
						<div class="row align-items-center statistic">
							<div class="col-6">
								<input ng-show="tot>=1" class="form-check-input" type="checkbox" ng-click="selectall();" ng-model="sa">
								<p class="text-end" ng-show="tot==0">{{__('guestlistpage.GUEST LIST EMPTY')}}</p>
							</div>
							<div class="col-6 text-end totals">
								<p>{{__('guestlistpage.TOTAL')}}: @{{tot}}</p>
								<p>(@{{totg}} {{__('guestlistpage.guests')}} - @{{totm}} {{__('guestlistpage.members')}})</p>
							</div>
							
						</div>
						<div class="row align-items-center maincont" ng-repeat="guest in guests | filter:myfilter">
							<div class="col-4">							
								<button ng-click="vis==1?vis=0:vis=1" class="visualizer text-start">
									<i ng-class="vis?'fas fa-caret-down':'fas fa-caret-up'"></i>
									<span>{{__('guestlistpage.GROUP')}}:</span><strong>@{{guest.name}}</strong>
								</button>
							</div>
							<div class="col-4">
							</div>
							<div class="col-12" ng-show="!vis">
								<div ng-class="guest.declined?'row align-items-center guestrow declined':'row align-items-center guestrow'" ng-click="select(guest)">
									<div class="col-1">
										<input class="form-check-input" type="checkbox" ng-checked="guest.selected">
									</div>
									<div class="col-3 names">
										<p class="fw-bold viol">@{{guest.name}}</p>
										<p ng-show="guest.phone"><i class="fal fa-phone"></i> @{{guest.phone}}</p>
										<p ng-show="guest.whatsapp"><i class="fab fa-whatsapp"></i> @{{guest.whatsapp}}</p>
										<p ng-show="guest.email"><i class="fal fa-envelope"></i> @{{guest.email}}</p>
									</div>
								</div>
								<div ng-class="member.declined?'row align-items-center memberrow declined':'row align-items-center memberrow'" ng-repeat="member in guest.members | filter:myfilter" ng-click="select(member)">
									<div class="col-1">
										<input class="form-check-input" type="checkbox" ng-checked="member.selected">
									</div>
									<div class="col-3 names">
										<p class="fw-bold">@{{member.name}}</p>
										<p ng-show="member.phone"><i class="fal fa-phone"></i> @{{member.phone}}</p>
										<p ng-show="member.whatsapp"><i class="fab fa-whatsapp"></i> @{{member.whatsapp}}</p>
										<p ng-show="member.email"><i class="fal fa-envelope"></i> @{{member.email}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="modifier ng-hide" ng-show="numselected==1">
			<p>@{{numselected}} {{__('guestlistpage.GUEST SELECTED')}}</p>
			<button class="btn btn-sm btn-orange" ng-click=" reset(); idguestedit();" data-bs-toggle="modal" data-bs-target="#editguestModal">EDIT</button>
			<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delguestModal">{{__('guestlistpage.DELETE')}}</button>
		</div>

		<div class="modifier ng-hide" ng-show="numselected>1">
			<p>@{{numselected}} {{__('guestlistpage.GUESTS SELECTED')}}</p>
			<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delguestsModal">{{__('guestlistpage.DELETE ALL')}}</button>
		</div>













		<!-- Edit Guest -->
		<div class="modal fade" id="editguestModal" tabindex="-1" aria-labelledby="editguestModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editguestModalLabel">{{__('guestlistpage.Edit Guest')}} @{{eg.nameguest}}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="eg" ng-submit="editguest();">
							<div class="form-floating mb-2">
								<input type="text" class="form-control" ng-model="eg.nameguest" placeholder="Name" required id="eg1" ng-change="checkrepeat();">
								<label for="eg1">{{__('guestlistpage.Name')}}</label>
							</div>
							<div class="form-floating mb-2">
								<input type="email" class="form-control" ng-model="eg.emailguest" placeholder="E-mail" id="eg2" ng-change="checkrepeat();">
								<label for="eg2">{{__('guestlistpage.E-mail')}}</label>
							</div>
							<div class="form-floating mb-2">
								<input type="text" class="form-control" ng-model="eg.phoneguest" placeholder="Phone" id="eg3" ng-change="checkrepeat();">
								<label for="eg3">{{__('guestlistpage.Phone')}}</label>
							</div>
							<div class="form-floating mb-2">
								<input type="text" class="form-control" ng-model="eg.whatsappguest" placeholder="Whatsapp" id="eg4" ng-change="checkrepeat();">
								<label for="eg4">{{__('guestlistpage.Whatsapp')}}</label>
							</div>
							<div class="form-check form-switch mb-2">
							  <input class="form-check-input" type="checkbox" role="switch" id="egallergiesguest" ng-model="eg.allergiesguest" ng-checked="eg.allergiesguest==1" ng-true-value="1" ng-false-value="0">
							  <label class="form-check-label" for="egallergiesguest">{{__('guestlistpage.Allergies')}}</label>
							</div>
							<!--<select class="form-select mb-2" ng-model="eg.idmealguest" required>
								<option value="">Select meal</option>
								<option ng-repeat="meal in meals" ng-value="meal.id_meal">@{{meal.name}}</option>
							</select>-->
							<div class="form-floating mb-2" ng-show="eg.parentidguest==0">
								<input type="number" class="form-control" ng-model="eg.membernumberguest" placeholder="Number of members can invite" id="eg5">
								<label for="eg5">{{__('guestlistpage.Number of members can invite')}}</label>
							</div>
							<div class="form-floating mb-2">
								<textarea class="form-control" placeholder="Notes" ng-model="eg.notesguest" id="eg6" style="height: 100px"></textarea>
								<label for="eg6">{{__('guestlistpage.Notes')}}</label>
							</div>
						</form>
					</div>
					<div class="modal-footer" ng-hide="repeat">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('guestlistpage.Close')}}</button>
						<button type="submit" form="eg" class="btn btn-orange" onclick="if($('#eg')[0].checkValidity()) $('#editguestModal').modal('hide')">{{__('guestlistpage.Edit Guest')}}</button>					
					</div>
					<div class="modal-footer ng-hide" ng-show="repeat">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('guestlistpage.Close')}}</button>
						<span class="text-danger alertrep">{{__('guestlistpage.Other guest has same name, phone or email')}}</span>
					</div>

				</div>
			</div>
		</div>

		<!-- Delete Guest -->
		<div class="modal fade" id="delguestModal" tabindex="-1" aria-labelledby="delguestModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="delguestModalLabel">{{__('guestlistpage.Delete Guest')}}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>{{__('guestlistpage.Are you sure you want to delete this guest?')}}</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('guestlistpage.Close')}}</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="guestsdel()">{{__('guestlistpage.Delete Guest')}}</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Delete Guests -->
		<div class="modal fade" id="delguestsModal" tabindex="-1" aria-labelledby="delguestsModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="delguestsModalLabel">{{__('guestlistpage.Delete Selected Guests')}}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>{{__('guestlistpage.Are you sure you want to delete all this guests?')}}</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('guestlistpage.Close')}}</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="guestsdel()">{{__('guestlistpage.Delete Selected Guests')}}</button>
					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="loader ng-hide" ng-show="loading">
		<img src="/assets/panelimages/loader.svg">
	</div>

	<div ng-click="saveimages();" class="saver ng-hide" ng-show="saveyes">
		<p>{{__('guestlistpage.SAVE')}}</p>
	</div>
</section>


<script>
	console.log("ss")
	var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate','ui.sortable']);
	/*
	|
	| GUESTLIST CONTROLLER
	|
	*/
	sampleApp.controller('GuestslistCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window', '$interval', function($scope, $route, $http, $location, $routeParams, $window, $interval) {
		$scope.loading=1;
		$scope.leftnav=0;
		$scope.numselected=0;
		$scope.eg=[];

		start = $interval(function() {
		    $scope.loading=0;
		}, 300);

		$scope.guestlist = function(){
			$http({
				method: 'POST',
				url: '/show-guests-for-admin',
				data: {idevent:(window.location).pathname.split('/')[2]},
			}).then(function(response){
				$scope.guests=response.data;
				$scope.tot=0;
				$scope.totm=0;
				$scope.totg=0;
				angular.forEach($scope.guests, function(value, key) {
					var nm=0;
					angular.forEach($scope.guests[key].members, function(value2, key2) {
							$scope.tot++;
							$scope.totm++;
							nm++;
					});
					$scope.guests[key].nummembers=nm;
					$scope.tot++;
					$scope.totg++;
				})
			});
		};
		$scope.guestlist();

		$scope.showmeals = function(){
			$http({
				method: 'POST',
				url: '/show-meals',
				data: {idevent:(window.location).pathname.split('/')[2]},
			}).then(function(response){
				$scope.meals=response.data;
			});
		};
		$scope.showmeals();



		

		$scope.reset = function(){
			$scope.ng=[];
			$scope.ng.allergiesguest=0;
			$scope.nm=[];
			$scope.nm.allergiesmember=0;
			$scope.eg=[];
			$scope.repeat=0;
		};


		$scope.selectall = function(){
			$scope.numselected=0;
			angular.forEach($scope.guests, function(value, key) {
				angular.forEach($scope.guests[key].members, function(value2, key2) {
						if(!$scope.sa){ $scope.guests[key].members[key2].selected=1; $scope.numselected++;}
						else $scope.guests[key].members[key2].selected=0;
				});
				if(!$scope.sa){ $scope.guests[key].selected=1; $scope.numselected++;}
				else $scope.guests[key].selected=0;
			})
		};

		$scope.checkrepeat = function(){
			$scope.repeat=0;
			/*angular.forEach($scope.guests, function(value, key) {
				angular.forEach($scope.guests[key].members, function(value2, key2) {
						if(
							$scope.guests[key].members[key2].id_guest!=$scope.eg.idguest &&(
							$scope.guests[key].members[key2].name==$scope.ng.nameguest && $scope.guests[key].members[key2].name
						|| $scope.guests[key].members[key2].phone==$scope.ng.phoneguest && $scope.guests[key].members[key2].phone
						|| $scope.guests[key].members[key2].whatsapp==$scope.ng.whatsappguest && $scope.guests[key].members[key2].whatsapp
						|| $scope.guests[key].members[key2].email==$scope.ng.emailguest && $scope.guests[key].members[key2].email
						|| $scope.guests[key].members[key2].name==$scope.nm.namemember && $scope.guests[key].members[key2].name
						|| $scope.guests[key].members[key2].phone==$scope.nm.phonemember && $scope.guests[key].members[key2].phone
						|| $scope.guests[key].members[key2].whatsapp==$scope.nm.whatsappmember && $scope.guests[key].members[key2].whatsapp
						|| $scope.guests[key].members[key2].email==$scope.nm.emailmember && $scope.guests[key].members[key2].email
						|| $scope.guests[key].members[key2].name==$scope.eg.nameguest && $scope.guests[key].members[key2].name
						|| $scope.guests[key].members[key2].phone==$scope.eg.phoneguest && $scope.guests[key].members[key2].phone
						|| $scope.guests[key].members[key2].whatsapp==$scope.eg.whatsappguest && $scope.guests[key].members[key2].whatsapp
						|| $scope.guests[key].members[key2].email==$scope.eg.emailguest && $scope.guests[key].members[key2].email)
						)$scope.repeat=1;
				});

				if(
						$scope.guests[key].id_guest!=$scope.eg.idguest && (
						$scope.guests[key].name==$scope.ng.nameguest && $scope.guests[key].name
					|| $scope.guests[key].phone==$scope.ng.phoneguest && $scope.guests[key].phone
					|| $scope.guests[key].whatsapp==$scope.ng.whatsappguest && $scope.guests[key].whatsapp
					|| $scope.guests[key].email==$scope.ng.emailguest && $scope.guests[key].email
					|| $scope.guests[key].name==$scope.nm.namemember && $scope.guests[key].name
					|| $scope.guests[key].phone==$scope.nm.phonemember && $scope.guests[key].phone
					|| $scope.guests[key].whatsapp==$scope.nm.whatsappmember && $scope.guests[key].whatsapp
					|| $scope.guests[key].email==$scope.nm.emailmember && $scope.guests[key].email
					|| $scope.guests[key].name==$scope.eg.nameguest && $scope.guests[key].name
					|| $scope.guests[key].phone==$scope.eg.phoneguest && $scope.guests[key].phone
					|| $scope.guests[key].whatsapp==$scope.eg.whatsappguest && $scope.guests[key].whatsapp
					|| $scope.guests[key].email==$scope.eg.emailguest && $scope.guests[key].email)
				)$scope.repeat=1;
			})*/
		};

		$scope.newguest = function(){
			$http({
				method: 'POST',
				url: '/new-guest',
				data: {
					idevent:(window.location).pathname.split('/')[2],
					nameguest:$scope.ng.nameguest,
					emailguest:$scope.ng.emailguest,
					phoneguest:$scope.ng.phoneguest,
					whatsappguest:$scope.ng.whatsappguest,
					membernumberguest:$scope.ng.membernumberguest,
					notesguest:$scope.ng.notesguest,
					allergiesguest:$scope.ng.allergiesguest,
					idmealguest:$scope.ng.idmealguest,
					mainguest:1,
					parentidguest:''
				},
			}).then(function(response){
				$scope.ng=[];
				$scope.guestlist();
			});			
		};

		$scope.newmember = function(){
			$http({
				method: 'POST',
				url: '/new-guest',
				data: {
					idevent:(window.location).pathname.split('/')[2],
					nameguest:$scope.nm.namemember,
					emailguest:$scope.nm.emailmember,
					phoneguest:$scope.nm.phonemember,
					whatsappguest:$scope.nm.whatsappmember,
					membernumberguest:0,
					notesguest:$scope.nm.notesmember,
					mainguest:0,
					allergiesguest:$scope.nm.allergiesmember,
					idmealguest:$scope.nm.idmealmember,
					parentidguest:$scope.editmemberid
				},
			}).then(function(response){
				$scope.nm=[];
				$scope.guestlist();
			});
		};

		$scope.editguest = function(){
			$http({
				method: 'POST',
				url: '/edit-guest',
				data: {
					idevent:(window.location).pathname.split('/')[2],
					idguest:$scope.eg.idguest,
					nameguest:$scope.eg.nameguest,
					emailguest:$scope.eg.emailguest,
					membernumberguest:$scope.eg.membernumberguest,
					phoneguest:$scope.eg.phoneguest,
					whatsappguest:$scope.eg.whatsappguest,
					notesguest:$scope.eg.notesguest,
					allergiesguest:$scope.eg.allergiesguest
				},
			}).then(function(response){
				angular.forEach($scope.guests, function(value, key) {
					angular.forEach($scope.guests[key].members, function(value2, key2) {
							$scope.guests[key].members[key2].selected=0;
					});
					$scope.guests[key].selected=0;
				});
				$scope.numselected=0;
				$scope.eg=[];
				$scope.guestlist();
			});
		};

		$scope.select = function(guest){
			if(guest.selected==1){ $scope.numselected--; guest.selected=0; }  else { $scope.numselected++; guest.selected=1;}
		};

		$scope.iselect = function(guest){
			if(guest.selected==1){ guest.selected=0; }  else { guest.selected=1;}
		};

		$scope.idguestedit = function(){
			angular.forEach($scope.guests, function(value, key) {
				if($scope.guests[key].selected==1){
					$scope.eg.nameguest=$scope.guests[key].name;
					$scope.eg.emailguest=$scope.guests[key].email;
					$scope.eg.phoneguest=$scope.guests[key].phone;
					$scope.eg.whatsappguest=$scope.guests[key].whatsapp;
					$scope.eg.notesguest=$scope.guests[key].notes;
					$scope.eg.allergiesguest=$scope.guests[key].allergies;
					$scope.eg.idmealguest=$scope.guests[key].id_meal;
					$scope.eg.membernumberguest=$scope.guests[key].members_number;
					$scope.eg.parentidguest=$scope.guests[key].parent_id_guest;
					$scope.eg.idguest=$scope.guests[key].id_guest;
				}
				else{
					angular.forEach($scope.guests[key].members, function(value2, key2) {
						if($scope.guests[key].members[key2].selected==1){
							$scope.eg.nameguest=$scope.guests[key].members[key2].name;
							$scope.eg.emailguest=$scope.guests[key].members[key2].email;
							$scope.eg.phoneguest=$scope.guests[key].members[key2].phone;
							$scope.eg.whatsappguest=$scope.guests[key].members[key2].whatsapp;
							$scope.eg.notesguest=$scope.guests[key].members[key2].notes;
							$scope.eg.allergiesguest=$scope.guests[key].members[key2].allergies;
							$scope.eg.idmealguest=$scope.guests[key].members[key2].id_meal;
							$scope.eg.membernumberguest=$scope.guests[key].members[key2].members_number;
							$scope.eg.parentidguest=$scope.guests[key].members[key2].parent_id_guest;
							$scope.eg.idguest=$scope.guests[key].members[key2].id_guest;
						}
					});				
				}

			});
		};

		$scope.guestsdel = function(){
			angular.forEach($scope.guests, function(value, key) {
				if($scope.guests[key].selected==1){
					$http({
						method: 'POST',
						url: '/del-guest-for-admin',
						data: {guestid:$scope.guests[key].id_guest},
					}).then(function(){$scope.guestlist()});
				}
				else{
					angular.forEach($scope.guests[key].members, function(value2, key2) {
						if($scope.guests[key].members[key2].selected==1){
							$http({
								method: 'POST',
								url: '/del-guest-for-admin',
								data: {guestid:$scope.guests[key].members[key2].id_guest},
							}).then(function(){$scope.guestlist()});
						}
						$scope.guests[key].members[key2].selected=0;
					});				
				}
				$scope.guests[key].selected=0;
			});
			$scope.numselected=0;
		};

		$scope.guestsdecline = function(){
			angular.forEach($scope.guests, function(value, key) {
				if($scope.guests[key].selected==1){
					$http({
						method: 'POST',
						url: '/decline-guest',
						data: {idevent:(window.location).pathname.split('/')[2], guestid:$scope.guests[key].id_guest},
					}).then(function(){$scope.guestlist()});
				}
				else{
					angular.forEach($scope.guests[key].members, function(value2, key2) {
						if($scope.guests[key].members[key2].selected==1){
							$http({
								method: 'POST',
								url: '/decline-guest',
								data: {idevent:(window.location).pathname.split('/')[2], guestid:$scope.guests[key].members[key2].id_guest},
							}).then(function(){$scope.guestlist()});
						}
						$scope.guests[key].members[key2].selected=0;
					});				
				}
				$scope.guests[key].selected=0;
			});
			$scope.numselected=0;
		};


		$http({
			method: 'POST',
			url: '/all-guests',
			data: {idevent:(window.location).pathname.split('/')[2]},
		}).then(function(response){
			$scope.allguests=response.data;
		});

		$scope.importfromoe = function(){
			$http({
				method: 'POST',
				url: '/importfoe',
				data: {
					idevent:(window.location).pathname.split('/')[2],
					allguests:$scope.allguests
				},
			}).then(function(response){
				$scope.guestlist();
			});
		};

		$scope.readcsv = function(mycsv) {
			var selectfile=mycsv.files[0];
			r = new FileReader();
			r.onloadend = function (e) {
				//debugger;
				var contents = e.target.result;

				const lines = contents.split('\n')
				$scope.risultato = []
				const headers = lines[0].split(';')

				for (let i = 1; i < lines.length; i++) {        
					if (!lines[i]) continue
					const obj = {}
					const currentline = lines[i].split(';')

					for (let j = 0; j < headers.length; j++) {
						obj[headers[j]] = currentline[j]
					}
					$scope.risultato.push(obj);
				}
				//console.log($scope.risultato);
			}
			r.readAsBinaryString(selectfile);
		}

		$scope.importfromcsv = function(){
			$http({
				method: 'POST',
				url: '/importfcsv',
				data: {
					idevent:(window.location).pathname.split('/')[2],
					guests:$scope.risultato
				},
			}).then(function(response){
				$scope.guestlist();
			});
		};   


	}]);

</script>
@endsection