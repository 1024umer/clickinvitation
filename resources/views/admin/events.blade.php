@extends('layouts.admin')
@section('content')
<section class="event" ng-app="sampleApp" ng-controller="MainCtrl">
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

	<nav ng-class="(leftnav) ? 'leftnav' : 'leftnav sliped'">
		<h4>{{$event->name}}</h4>
		<p>{{$event->type}}</p>
	    <ul>
	        <li><a ng-class="{active: loc=='/general-infos'}" ng-href="/event/{{$event->id_event}}/general-infos"><i class="fal fa-info-square" aria-hidden="true"></i> GENERAL INFOS</a></li>
	        <li><a ng-class="{active: loc=='/webpage'}" ng-href="/event/{{$event->id_event}}/webpage"><i class="fal fa-browser" aria-hidden="true"></i> WEBPAGE</a></li>
	        <li><a ng-class="{active: loc=='/meals'}" ng-href="/event/{{$event->id_event}}/meals"><i class="fal fa-utensils-alt" aria-hidden="true"></i> MEALS</a></li>
	        <li><a ng-class="{active: loc=='/gift-suggestions'}" ng-href="/event/{{$event->id_event}}/gift-suggestions"><i class="fal fa-gift" aria-hidden="true"></i> GIFT SUGGESTIONS</a></li>
	        <li><a ng-class="{active: loc=='/guests-list'}" ng-href="/event/{{$event->id_event}}/guests-list"><i class="fal fa-poll-people" aria-hidden="true"></i> GUESTS LIST</a></li>
	        <li><a ng-class="{active: loc=='/invitation'}" ng-href="/event/{{$event->id_event}}/invitation"><i class="fal fa-envelope-open-text" aria-hidden="true"></i> INVITATION</a></li>
	        <li><a ng-class="{active: loc=='/guests-tables'}" ng-href="/event/{{$event->id_event}}/guests-tables"><i class="fal fa-users-class" aria-hidden="true"></i> GUESTS TABLES</a></li>
	        <li><a ng-class="{active: loc=='/photos'}" ng-href="/event/{{$event->id_event}}/photos"><i class="fal fa-camera-alt" aria-hidden="true"></i> PHOTOS</a></li>
	        <li><a ng-class="{active: loc=='/acknowledgments'}" ng-href="/event/{{$event->id_event}}/acknowledgments"><i class="fal fa-sticky-note" aria-hidden="true"></i> ACKNOWLEDGMENTS</a></li>
	        <li><a ng-class="{active: loc=='/messaging'}" ng-href="/event/{{$event->id_event}}/messaging"><i class="fal fa-comment-lines" aria-hidden="true"></i> MESSAGING</a></li>
	    </ul>
	</nav>

	<div ng-class="(leftnav) ? 'uppernav' : 'uppernav righter'">
	    <a class="close" ng-click="togglenav();">
	        <i ng-class="(leftnav) ? 'fal fa-arrow-to-left' : 'fal fa-bars'" aria-hidden="true"></i>
	    </a>
	</div>




	<div class="viewcontainer" ng-class="{righter: leftnav}">
		<div class="ng-view"></div>	
	</div>
	
</section>
@endsection