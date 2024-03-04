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
                <img src="/assets/images/logo/logoNewGolden.png" width="200px" class="d-inline-block align-top"
                    alt="">
            </a>
        </div>
    </nav>

    <section class="operations" ng-app="sampleApp" ng-controller="AttendingCtrl">
        <div class="container webpage">
            <div class="row justify-content-md-center">

                <div class="col-12">
                    <button style="border: 0;background: rgba(0,0,0,0);margin-top:15px;" class="back"
                        onclick="history.back()"><i class="fas fa-chevron-left"></i>
                        {{ __('attending.BACK TO INVITATION') }}</button>
                    <div class="card mb-4">
                        <h4 class="card-header text-center"><i
                                class="fal fa-poll-people"></i>{{ __('attending.ATTENDING') }}</h4>
                        <div class="card-body groupdesc" style="font-size:13px;">
                            <p class="gr"><i class="fal fa-info"></i>
                                <strong>{{ __('attending.GROUP INFO') }}</strong>
                            </p>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p><i class="fal fa-user"></i> <strong>@{{ mygroup.name }}</strong></p>
                                    <p ng-show="mygroup.phone"><i class="fal fa-phone"></i> @{{ mygroup.phone }}</p>
                                    <p ng-show="mygroup.whatsapp"><i class="fab fa-whatsapp"></i> @{{ mygroup.whatsapp }}
                                    </p>
                                    <p ng-show="mygroup.email"><i class="fal fa-envelope"></i> @{{ mygroup.email }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-12 endinfo text-end">
                                    <p ng-show="mygroup.table"><strong>{{ __('attending.TABLE') }}:</strong>
                                        @{{ mygroup.table.name }}</p>
                                    <p ng-show="mygroup.table"><strong>Seat:</strong>
                                        @{{ mygroup.seat.seat_name }}</p>
                                    <p ng-show="mygroup.meal"><strong>{{ __('attending.MEAL:') }}</strong>
                                        @{{ mygroup.meal.name }}</p>
                                    <p ng-show="mygroup.allergies"><i class="fal fa-exclamation-triangle"></i>
                                        <strong>{{ __('attending.ALLERGIES') }}</strong>
                                    </p>
                                </div>
                                <div class="col-md-2 col-12 text-end">
                                    <button style="width: 100%" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                        ng-click="editdatag();"
                                        data-bs-target="#editguestModal">{{ __('attending.EDIT') }}</button>
                                    @if ($isCorporate)
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#seatguestModal"
                                            ng-click="selectSeat(mygroup.id_guest)">{{ __('attending.Select Seat') }}</button>
                                    @endif
                                </div>
                                <div class="col-md-2 col-12 text-end">
                                    @if ($guest->opened == 2)
                                    <button style="width: 100%"
                                        class="btn btn-success btn-sm" disabled>{{ __('attending.CONFIRM') }}</button>
                                    @else
                                    <button style="width: 100%" id="confirm"
                                        class="btn btn-success btn-sm" ng-click="confirmGuest()" name="guest_id" value="{{ $guest->id_guest }}">{{ __('attending.CONFIRM') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body groupdesc"
                            style="display: flex;justify-content: space-between;flex-wrap: wrap;text-align: center;">
                            <h6>{{ __('attending.ADDED GUESTS:') }}
                                ({{ $guest->members_number }}) allowed</h6>
                            @if ($isCorporate)
                                <button style="width: 200px;" class="btn btn-warning" id="btn-layout"
                                    data-bs-toggle="modal"
                                    data-bs-target="#tableLayout">{{ __('attending.Table Layout') }}</button>
                            @endif
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body groupdesc">
                            <div ng-class="member.declined?'row align-items-center memberrow declined':'row align-items-center memberrow'"
                                ng-repeat="member in members">
                                <!--<div class="col-1">
        <input class="form-check-input" type="checkbox" ng-checked="member.selected">
       </div>-->
                                <div class="col-md-6 col-sm-12 names">
                                    <p class="fw-bold">@{{ member.name }}</p>
                                    <p ng-show="member.phone"><i class="fal fa-phone"></i> @{{ member.phone }}</p>
                                    <p ng-show="member.whatsapp"><i class="fab fa-whatsapp"></i> @{{ member.whatsapp }}
                                    </p>
                                    <p ng-show="member.email"><i class="fal fa-envelope"></i> @{{ member.email }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-12 text-end endinfo">
                                    <p ng-show="member.table"><strong>{{ __('attending.TABLE:') }}</strong>
                                        @{{ member.table.name }}</p>
                                    <p ng-show="member.seat"><strong>{{ __('attending.Seat:') }}</strong>
                                        @{{ member.seat }}</p>
                                    <p ng-show="member.meal"><strong>{{ __('attending.MEAL:') }}</strong>
                                        @{{ member.meal.name }}</p>
                                    <p ng-show="member.allergies"><i class="fal fa-exclamation-triangle"></i>
                                        <strong>{{ __('attending.ALLERGIES') }}</strong>
                                    </p>
                                </div>
                                <div class="col-md-2 col-12 text-end">
                                    <button class="btn btn-sm" style="background-color: #198754; color: white;"
                                        ng-click="editdata($index);" data-bs-toggle="modal"
                                        data-bs-target="#editguestModal">{{ __('attending.EDIT') }}</button>
                                    <button class="btn btn-danger btn-sm" ng-click="$parent.delid=member.id_guest"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delguestModal">{{ __('attending.DELETE') }}</button>

                                    <button  class="btn btn-dark btn-sm"
                                        ng-click="sendInvitation(member.id_guest)">{{ __('attending.Send Invitation') }}</button>

                                        <button style="width: 100%" ng-if="member.opened == 2"
                                            class="btn btn-success btn-sm" disabled>{{ __('attending.CONFIRM') }}</button>
                                        <button style="width: 100%" id="confirm" ng-if="member.opened == null || member.opened == 1"
                                            class="btn btn-success btn-sm" ng-click="confirmGuest()" name="guest_id" value="${member.id_guest}">{{ __('attending.CONFIRM') }}</button>
                                    @if ($isCorporate)
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#seatguestModal"
                                            ng-click="selectSeat(member.id_guest)">{{ __('attending.Select Seat') }}</button>
                                    @endif
                                </div>
                            </div>

                            <!-- <button ng-show="added < nummembers" class="btn btn-warning btn-md w-100 addm"
                                data-bs-toggle="modal" data-bs-target="#newmemberModal"><i
                                    class="fal fa-user-plus"></i>{{ __('attending.ADD MEMBER') }}</button> -->
                        </div>
                    </div>
                </div>



            </div>

        </div>

        <!-- New Member -->
        {{-- <div class="container" ng-repeat="n in [].constructor(nummembers - added) track by $index">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <h5 class="" id="newmemberModalLabel">{{ __('attending.New Member') }}</h5>
                    </div>
                    <div>
                        <form id="nm" ng-submit="newmember();">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.namemember"
                                            placeholder="Name" required id="nm1">
                                        <label for="nm1">{{ __('attending.Name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="email" class="form-control" ng-model="nm.emailmember"
                                        placeholder="E-mail" id="nm2">
                                        <label for="nm2">{{ __('attending.E-mail') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.phonemember"
                                        placeholder="Phone" id="nm3">
                                        <label for="nm3">{{ __('attending.Phone') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.whatsappmember"
                                        placeholder="Whatsapp" id="nm4">
                                        <label for="nm4">{{ __('attending.Whatsapp') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                        id="nmallergiesmember" ng-model="nm.allergiesmember" ng-true-value="1"
                                        ng-false-value="0" ng-value="0">
                                        <label class="form-check-label"
                                        for="nmallergiesmember">{{ __('attending.ALLERGIES') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select mb-2" ng-model="nm.idmealmember">
                                        <option value="">{{ __('attending.Select meal') }}</option>
                                        <option ng-repeat="meal in meals" ng-value="meal.id_meal">@{{ meal.name }}
                                        </option>
                                    </select>
                                    <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Notes" ng-model="nm.notesmember" id="nm5" style="height: 100px"></textarea>
                                        <label for="nm5">{{ __('attending.Notes') }}</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="" ng-hide="repeat">
                        <button type="submit" form="nm" class="btn btn-orange"
                            onclick="if($('#nm')[0].checkValidity()) $('#newmemberModal').modal('hide')">{{ __('attending.Add Guest') }}</button>
                    </div>
                    <div class=" ng-hide" ng-show="repeat">
                        <span
                            class="text-danger alertrep">{{ __('attending.Other guest has same name, phone or email') }}</span>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container" ng-repeat="n in [].constructor(nummembers - added) track by $index">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <h5 class="" id="newmemberModalLabel">{{ __('Add your Guest (') }}
                            @{{ $index + 1 }} {{ __(')') }}</h5>
                    </div>
                    <div class="p-3 bg-light rounded mb-3">
                        <form id="nm" ng-submit="newmember();">
                            <div class="row d-flex justify-content-center align-items-center flex-wrap flex-row">
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.namemember"
                                            placeholder="Name" required id="nm1">
                                        <label for="nm1">{{ __('attending.Name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="email" class="form-control" ng-model="nm.emailmember"
                                            placeholder="E-mail" id="nm2">
                                        <label for="nm2">{{ __('attending.E-mail') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.phonemember"
                                            placeholder="Phone" id="nm3">
                                        <label for="nm3">{{ __('attending.Phone') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" ng-model="nm.whatsappmember"
                                            placeholder="Whatsapp" id="nm4">
                                        <label for="nm4">{{ __('attending.Whatsapp') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select mb-2" ng-model="nm.idmealmember">
                                        <option value="">{{ __('attending.Select meal') }}</option>
                                        <option ng-repeat="meal in meals" ng-value="meal.id_meal">
                                            @{{ meal.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Notes" ng-model="nm.notesmember" id="nm5"></textarea>
                                        <label for="nm5">{{ __('attending.Notes') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="nmallergiesmember" ng-model="nm.allergiesmember" ng-true-value="1"
                                            ng-false-value="0" ng-value="0">
                                        <label class="form-check-label"
                                            for="nmallergiesmember">{{ __('attending.ALLERGIES') }}</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3" ng-hide="repeat">
                        <button type="submit" form="nm" class="btn btn-dark"
                            onclick="if($('#nm')[0].checkValidity()) $('#newmemberModal').modal('hide')">{{ __('Save Guest') }}</button>
                    </div>
                    <div class=" ng-hide" ng-show="repeat">
                        <span
                            class="text-danger alertrep">{{ __('attending.Other guest has same name, phone or email') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Guest -->
        <div class="modal fade" id="editguestModal" tabindex="-1" aria-labelledby="editguestModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editguestModalLabel">{{ __('attending.Edit Guest') }}
                            @{{ eg.nameguest }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="eg" ng-submit="editguest();">
                            <div class="form-floating mb-2" style="display:none">
                                <input type="text" class="form-control" ng-model="eg.nameguest"
                                    placeholder="Name" required id="eg1">
                                <label for="eg1">{{ __('attending.Name') }}</label>
                            </div>
                            <div class="form-floating mb-2" style="display:none">
                                <input type="email" class="form-control" ng-model="eg.emailguest"
                                    placeholder="E-mail" id="eg2">
                                <label for="eg2">{{ __('attending.E-mail') }}</label>
                            </div>
                            <div class="form-floating mb-2" style="display:none">
                                <input type="text" class="form-control" ng-model="eg.phoneguest"
                                    placeholder="Phone" id="eg3">
                                <label for="eg3">{{ __('attending.Phone') }}</label>
                            </div>
                            <div class="form-floating mb-2" style="display:none">
                                <input type="text" class="form-control" ng-model="eg.whatsappguest"
                                    placeholder="Whatsapp" id="eg4">
                                <label for="eg4">{{ __('attending.Whatsapp') }}</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="egallergiesguest"
                                    ng-model="eg.allergiesguest" ng-checked="eg.allergiesguest==1" ng-true-value="1"
                                    ng-false-value="0">
                                <label class="form-check-label"
                                    for="egallergiesguest">{{ __('attending.ALLERGIES') }}</label>
                            </div>
                            <select class="form-select mb-2" ng-model="eg.idmealguest">
                                <option value="">{{ __('attending.Select meal') }}</option>
                                <option ng-repeat="meal in meals" ng-value="meal.id_meal">@{{ meal.name }}
                                </option>
                            </select>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Notes" ng-model="eg.notesguest" id="eg6" style="height: 100px"></textarea>
                                <label for="eg6">{{ __('attending.Notes') }}</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" ng-hide="repeat">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('attending.Close') }}</button>
                        <button type="submit" form="eg" class="btn btn-orange w-auto"
                            onclick="if($('#eg')[0].checkValidity()) $('#editguestModal').modal('hide')">{{ __('attending.Edit Guest') }}</button>
                    </div>
                    <div class="modal-footer ng-hide" ng-show="repeat">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('attending.Close') }}</button>
                        <span
                            class="text-danger alertrep">{{ __('attending.Other guest has same name, phone or email') }}</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Delete Guest -->
        <div class="modal fade" id="delguestModal" tabindex="-1" aria-labelledby="delguestModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delguestModalLabel">{{ __('attending.Delete Member') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('attending.Are you sure you want to delete this member?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('attending.Close') }}</button>
                        <button type="button" class="btn btn-danger w-auto" data-bs-dismiss="modal"
                            ng-click="guestsdel()">{{ __('attending.Delete Member') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Invitation Model -->
        <div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="sendModalLabel" aria-modal="true"
            role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sendModalLabel">{{ __('attending.Send Invitation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            onclick="closeSendModel()"></button>
                    </div>
                    <input type="hidden" value="" id="invitedGuestId" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty"
                                        type="checkbox" ng-model="emailcheck" id="emailCheck">
                                    <label class="form-check-label"
                                        for="emailCheck">{{ __('attending.Email') }}</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty"
                                        type="checkbox" ng-model="smscheck" id="smsCheck">
                                    <label class="form-check-label" for="smsCheck">{{ __('attending.SMS') }}</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty"
                                        type="checkbox" ng-model="whatsappcheck" id="whatsappCheck">
                                    <label class="form-check-label"
                                        for="whatsappCheck">{{ __('attending.Whatsapp') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="closeSendModel()">{{ __('attending.Close') }}</button>
                        <button type="button" class="btn btn-orange" data-bs-dismiss="modal"
                            onclick="sendInvi();">{{ __('attending.Send') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Seat Selection Guest -->
        <div class="modal fade" id="seatguestModal" tabindex="-1" aria-labelledby="seatguestModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="seatguestModalLabel">{{ __('attending.Select Seat') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" id="seatGuestID" />
                        <label class="form-check-label" for="egallergiesguest">Select Table</label>
                        <select class="form-select mb-2" onchange="getAllSeatList()" id='tableList'>
                            <option value="">{{ __('attending.Select Seat') }}</option>
                            <option ng-repeat="t in table" ng-value="t.id_table">@{{ t.name }} --
                                @{{ t.number }}
                            </option>
                        </select>
                        <br />
                        <label class="form-check-label"
                            for="egallergiesguest">{{ __('attending.Select Seat') }}</label>
                        <select class="form-select mb-2" id="seatsList">
                            <option value="">{{ __('attending.Select Seat') }}</option>
                        </select>
                        <p style="color:red;display:none" id="seatError">
                            {{ __('attending.No seats available in this table') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('attending.Close') }}</button>
                        <button type="button" class="btn btn-danger w-auto" data-bs-dismiss="modal"
                            onclick="saveSeat()">{{ __('attending.Select Seat') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table Layout -->
        <div class="modal fade" id="tableLayout" tabindex="-1" aria-labelledby="tableLayoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tableLayoutModalLabel">{{ __('attending.Table Layout') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img style="width: 100%;"
                            src="https://clickinvitation.com/event-images/{{ $event->id_event }}/plan.jpg"
                            id='tImg' onerror="onPlanImg()">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-auto"
                            data-bs-dismiss="modal">{{ __('attending.Close') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="loader ng-hide" ng-show="loading">
            <img src="/assets/panelimages/loader.svg">
        </div>

        <div ng-click="saveimages();" class="saver ng-hide" ng-show="saveyes">
            <p>{{ __('attending.SAVE') }}</p>
        </div>
    </section>

    <script>
        var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop']);
        sampleApp.controller('AttendingCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window',
            '$interval',
            function($scope, $route, $http, $location, $routeParams, $window, $interval) {
                $scope.loading = 1;
                $scope.saveyes = 0;
                $scope.added = {{ $added }};
                $scope.nummembers = {{ $guest->members_number }};
                $scope.nm = [];
                $scope.eg = [];
                $scope.nm.allergiesmember = 0;

                $http({
                    method: 'POST',
                    url: '/opened-answered',
                    data: {
                        idguest: {{ $guest->id_guest }},
                        opened: 1
                    },
                });

                $scope.showevent = function() {
                    $http({
                        method: 'POST',
                        url: '/show-event',
                        data: {
                            idevent: {{ $event->id_event }}
                        },
                    }).then(function(response) {
                        $scope.galleries = response.data.photogallery;
                    });
                };

                $scope.showevent();

                $scope.mymembers = function() {
                    $http({
                        method: 'POST',
                        url: '/my-members',
                        data: {
                            idgroup: {{ $group->id_guest }}
                        },
                    }).then(function(response) {
                        $scope.members = response.data;
                    });
                };
                $scope.mymembers();


                $scope.groupinfo = function() {
                    $http({
                        method: 'POST',
                        url: '/my-group',
                        data: {
                            idgroup: {{ $group->id_guest }}
                        },
                    }).then(function(response) {
                        console.log(response);
                        $scope.mygroup = response.data;
                    });
                };
                $scope.groupinfo();




                $scope.showmeals = function() {
                    $http({
                        method: 'POST',
                        url: '/show-meals',
                        data: {
                            idevent: {{ $event->id_event }}
                        },
                    }).then(function(response) {
                        $scope.meals = response.data;
                    });
                };
                $scope.showmeals();

                $scope.getTables = function() {
                    $http({
                        method: 'POST',
                        url: '/get-table',
                        data: {
                            idevent: {{ $event->id_event }}
                        },
                    }).then(function(response) {
                        console.log(response);
                        $scope.table = response.data;
                    });
                };
                $scope.getTables();

                $scope.confirmGuest = function() {
                    $http({
                        method: 'POST',
                        url: '/confirm-guest',
                        data: {
                            idevent: {{ $group->id_event }},
                            idguest: {{ $group->id_guest }},
                        },
                    }).then(function(response) {
                        console.log(response);
                    });
                };





                $scope.newmember = function() {
                    $http({
                        method: 'POST',
                        url: '/new-guest',
                        data: {
                            idevent: {{ $group->id_event }},
                            nameguest: $scope.nm.namemember,
                            emailguest: $scope.nm.emailmember,
                            phoneguest: $scope.nm.phonemember,
                            whatsappguest: $scope.nm.whatsappmember,
                            membernumberguest: 0,
                            notesguest: $scope.nm.notesmember,
                            mainguest: 0,
                            allergiesguest: $scope.nm.allergiesmember,
                            idmealguest: $scope.nm.idmealmember,
                            parentidguest: {{ $group->id_guest }}
                        },
                    }).then(function(response) {
                        $scope.nm = [];
                        $scope.nm.allergiesmember = 0;
                        $scope.mymembers();
                        $scope.added = $scope.added + 1;
                    });
                };

                $scope.editdata = function(key) {
                    $scope.eg = [];
                    $scope.eg.nameguest = $scope.members[key].name;
                    $scope.eg.emailguest = $scope.members[key].email;
                    $scope.eg.phoneguest = $scope.members[key].phone;
                    $scope.eg.whatsappguest = $scope.members[key].whatsapp;
                    $scope.eg.notesguest = $scope.members[key].notes;
                    $scope.eg.allergiesguest = $scope.members[key].allergies;
                    $scope.eg.idmealguest = $scope.members[key].id_meal;
                    $scope.eg.membernumberguest = $scope.members[key].members_number;
                    $scope.eg.parentidguest = $scope.members[key].parent_id_guest;
                    $scope.eg.idguest = $scope.members[key].id_guest;
                };

                $scope.sendInvitation = function(guestID) {
                    console.log(guestID);
                    document.getElementById('invitedGuestId').value = guestID;
                    document.getElementById('sendModal').style.display = "block";
                    document.getElementById('sendModal').classList.add("show");
                }

                $scope.selectSeat = function(guestID) {
                    console.log(guestID);
                    document.getElementById('seatGuestID').value = guestID;
                }

                $scope.editdatag = function() {
                    $scope.eg = [];
                    $scope.eg.nameguest = $scope.mygroup.name;
                    $scope.eg.emailguest = $scope.mygroup.email;
                    $scope.eg.phoneguest = $scope.mygroup.phone;
                    $scope.eg.whatsappguest = $scope.mygroup.whatsapp;
                    $scope.eg.notesguest = $scope.mygroup.notes;
                    $scope.eg.allergiesguest = $scope.mygroup.allergies;
                    $scope.eg.idmealguest = $scope.mygroup.id_meal;
                    $scope.eg.membernumberguest = $scope.mygroup.members_number;
                    $scope.eg.parentidguest = $scope.mygroup.parent_id_guest;
                    $scope.eg.idguest = $scope.mygroup.id_guest;
                };

                $scope.editguest = function() {
                    $http({
                        method: 'POST',
                        url: '/edit-opguest',
                        data: {
                            idevent: {{ $group->id_event }},
                            idguest: $scope.eg.idguest,
                            nameguest: $scope.eg.nameguest,
                            emailguest: $scope.eg.emailguest,
                            membernumberguest: $scope.eg.membernumberguest,
                            phoneguest: $scope.eg.phoneguest,
                            whatsappguest: $scope.eg.whatsappguest,
                            notesguest: $scope.eg.notesguest,
                            allergiesguest: $scope.eg.allergiesguest,
                            idmealguest: $scope.eg.idmealguest
                        },
                    }).then(function(response) {
                        $scope.mymembers();
                        $scope.groupinfo();
                    });
                };

                $scope.editdatam = function(key) {
                    $scope.egm = [];
                    $scope.egm.nameguest = $scope.members[key].name;
                    $scope.egm.emailguest = $scope.members[key].email;
                    $scope.egm.phoneguest = $scope.members[key].phone;
                    $scope.egm.whatsappguest = $scope.members[key].whatsapp;
                    $scope.egm.notesguest = $scope.members[key].notes;
                    $scope.egm.allergiesguest = $scope.members[key].allergies;
                    $scope.egm.idmealguest = $scope.members[key].id_meal;
                    $scope.egm.membernumberguest = $scope.members[key].members_number;
                    $scope.egm.parentidguest = $scope.members[key].parent_id_guest;
                    $scope.egm.idguest = $scope.members[key].id_guest;
                };

                $scope.guestsdel = function() {
                    $http({
                        method: 'POST',
                        url: '/del-member-attending',
                        data: {
                            idevent: {{ $group->id_event }},
                            guestid: $scope.delid
                        },
                    }).then(function() {
                        $scope.mymembers();
                        $scope.added = $scope.added - 1;
                    });

                };


                start = $interval(function() {
                    $scope.loading = 0;
                }, 300);

            }
        ]);

        function saveSeat() {
            let tableID = document.getElementById('tableList').value;
            let seatID = document.getElementById('seatsList').value;
            let guestID = document.getElementById('seatGuestID').value
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "/save-seats?idTable=" + tableID + "&idSeat=" + seatID + "&idGuest=" + guestID);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = () => {

                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send();
        }

        function getAllSeatList() {

            let data = document.getElementById('tableList').value;
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "/get-seats?idTable=" + data);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = () => {

                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log(xhr.responseText);
                    let lst = JSON.parse(xhr.responseText);
                    $element = "";
                    lst.forEach(element => {
                        $element += "<option value=" + element['id'] + ">" + element['seat_name'] + "</option>";
                    });
                    if (lst.length > 0) {
                        document.getElementById('seatError').style.display = "none";
                    } else {
                        document.getElementById('seatError').style.display = "block";
                    }
                    document.getElementById('seatsList').innerHTML = $element;
                }
            };
            xhr.send();
        }

        function closeSendModel() {
            document.getElementById('sendModal').style.display = "none";
            document.getElementById('sendModal').classList.remove("show");
        }

        function sendInvi() {
            let isEmail = document.getElementById("emailCheck").checked;
            let isSMS = document.getElementById("smsCheck").checked;
            let isWhatsApp = document.getElementById("whatsappCheck").checked;

            let invitedGuestId = document.getElementById("invitedGuestId").value;

            if (invitedGuestId.length > 0) {
                if (isEmail) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "/sendInvite-email?guestID=" + invitedGuestId + "&eventID=" + window.location.href
                        .split('/')[4], true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = () => {

                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send();
                }
                if (isWhatsApp) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "/sendInvite-whatsapp?guestID=" + invitedGuestId + "&eventID=" + window.location.href
                        .split('/')[4], true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = () => {

                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send();
                }
                if (isSMS) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "/sendInvite-sms?guestID=" + invitedGuestId + "&eventID=" + window.location.href.split(
                        '/')[4], true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = () => {

                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send();
                }
            }

            closeSendModel();

        }

        function onPlanImg() {
            document.getElementById('btn-layout').style.display = "none";
        }
    </script>
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <style>
        @media only screen (max-width : 768px) {
            .col-6 {
                width: 100%;
            }

            .col-4 {
                width: 100%;
            }

            .col-2 {
                width: 100%;
            }

            .btn btn-danger btn-sm {
                width: 100%;
            }

        }
    </style>
</body>

</html>
