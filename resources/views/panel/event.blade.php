@extends('layouts.layoutpanel')
@section('content')
    <style>
        .leftnav {
            background: #222222 !important;
        }

        .event .uppernav {
            background: #222222 !important;
        }

        .event .leftnav ul li .active {
            margin-right: 10px;
            border-radius: 4px;
            color: #f5c31e;
        }

        .event .leftnav ul li a {
            background: linear-gradient(to left, #ffffff00 50%, #ededed 50%);
            -webkit-background-clip: background;
            background-size: 212%;
            background-position: right bottom;
            transition: all 0.6s ease-in-out;
            border-radius: 4px;
            margin-right: 10px;
        }

        .event .leftnav ul li a:hover {
            color: black;
            background-position: left;
        }
        .event .leftnav ul li a:hover {
            color: #f5c31e;
        }
    </style>
    <section class="event" ng-app="sampleApp" ng-controller="MainCtrl" style="margin-top:20px">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert" style="display: none !important;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ __('event.Profile updated correctly') }}
            </div>
        </div>

        <nav ng-class="(leftnav) ? 'leftnav' : 'leftnav sliped'">
            <h4>{{ $event->name }}</h4>
            <p style="color: #f5c31e;">{{ $event->type }}</p>
            <ul>

                @if (App::isLocale('en'))
                    <li><a ng-class="{active: loc=='/general-infos'}"
                            ng-href="/event/{{ $event->id_event }}/general-infos"><i style="color: #f5c31e;"
                                class="fal fa-info-square" aria-hidden="true"></i>{{ __('event.GENERAL INFOS') }}</a></li>
                    <li><a ng-class="{active: loc=='/webpage'}" ng-href="/event/{{ $event->id_event }}/webpage"><i
                                style="color: #f5c31e;" style="color: #f5c31e;" class="fal fa-browser"
                                aria-hidden="true"></i>{{ __('event.WEBPAGE') }}</a></li>
                    <li><a ng-class="{active: loc=='/meals'}" ng-href="/event/{{ $event->id_event }}/meals"><i
                                style="color: #f5c31e;" style="color: #f5c31e;" class="fal fa-utensils-alt"
                                aria-hidden="true"></i>{{ __('event.MEALS') }}</a></li>
                    <li><a ng-class="{active: loc=='/gift-suggestions'}"
                            ng-href="/event/{{ $event->id_event }}/gift-suggestions"><i class="fal fa-gift"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GIFT SUGGESTIONS') }}</a></li>

                    <li><a ng-class="{active: loc=='/invitation'}" ng-href="/event/{{ $event->id_event }}/invitation"><i
                                style="color: #f5c31e;" style="color: #f5c31e;" class="fal fa-envelope-open-text"
                                aria-hidden="true"></i>{{ __('event.INVITATION') }}</a>
                    </li>
                    <li><a ng-class="{active: loc=='/guests-list'}" ng-href="/event/{{ $event->id_event }}/guests-list"><i
                                style="color: #f5c31e;" style="color: #f5c31e;" class="fal fa-poll-people"
                                aria-hidden="true"></i>{{ __('event.GUESTS LIST') }}</a></li>
                    <li><a ng-class="{active: loc=='/guests-tables'}"
                            ng-href="/event/{{ $event->id_event }}/guests-tables"><i class="fal fa-users-class"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GUESTS TABLES') }}</a></li>
                    <li><a ng-class="{active: loc=='/photos'}" ng-href="/event/{{ $event->id_event }}/photos"><i
                                style="color: #f5c31e;" style="color: #f5c31e;" class="fal fa-camera-alt"
                                aria-hidden="true"></i>{{ __('event.PHOTOS') }}</a></li>
                    <li><a ng-class="{active: loc=='/acknowledgments'}"
                            ng-href="/event/{{ $event->id_event }}/acknowledgments"><i
                                class="fal fa-sticky-note"style="color: #f5c31e;"
                                aria-hidden="true"></i>{{ __('event.ACKNOWLEDGMENTS') }}</a></li>
                    <li><a ng-class="{active: loc=='/messaging'}" ng-href="/event/{{ $event->id_event }}/messaging"><i
                                style="color: #f5c31e;" class="fal fa-comment-lines"
                                aria-hidden="true"></i>{{ __('event.MESSAGING') }}</a></li>
                    <li><a ng-class="{active: loc=='/tutorial'}" style="color:#bdbd14;"
                            ng-href="/event/{{ $event->id_event }}/tutorial"><i style="color:#bdbd14;"
                                class="fal fa-question" aria-hidden="true"></i>TUTORIAL</a></li>
                @else
                    <li><a ng-class="{active: loc=='/general-infos/fr'}"
                            ng-href="/event/{{ $event->id_event }}/general-infos/fr"><i class="fal fa-info-square"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GENERAL INFOS') }}</a></li>
                    <li><a ng-class="{active: loc=='/webpage/fr'}" ng-href="/event/{{ $event->id_event }}/webpage/fr"><i
                                style="color: #f5c31e;" class="fal fa-browser"
                                aria-hidden="true"></i>{{ __('event.WEBPAGE') }}</a></li>
                    <li><a ng-class="{active: loc=='/meals/fr'}" ng-href="/event/{{ $event->id_event }}/meals/fr"><i
                                style="color: #f5c31e;" class="fal fa-utensils-alt"
                                aria-hidden="true"></i>{{ __('event.MEALS') }}</a></li>
                    <li><a ng-class="{active: loc=='/gift-suggestions/fr'}"
                            ng-href="/event/{{ $event->id_event }}/gift-suggestions/fr"><i class="fal fa-gift"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GIFT SUGGESTIONS') }}</a></li>
                    <li><a ng-class="{active: loc=='/invitation/fr'}"
                            ng-href="/event/{{ $event->id_event }}/invitation/fr"><i class="fal fa-envelope-open-text"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.INVITATION') }}</a></li>
                    <li><a ng-class="{active: loc=='/guests-list/fr'}"
                            ng-href="/event/{{ $event->id_event }}/guests-list/fr"><i class="fal fa-poll-people"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GUESTS LIST') }}</a></li>

                    <li><a ng-class="{active: loc=='/guests-tables/fr'}"
                            ng-href="/event/{{ $event->id_event }}/guests-tables/fr"><i class="fal fa-users-class"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.GUESTS TABLES') }}</a></li>
                    <li><a ng-class="{active: loc=='/photos/fr'}" ng-href="/event/{{ $event->id_event }}/photos/fr"><i
                                style="color: #f5c31e;" class="fal fa-camera-alt"
                                aria-hidden="true"></i>{{ __('event.PHOTOS') }}</a></li>
                    <li><a ng-class="{active: loc=='/acknowledgments/fr'}"
                            ng-href="/event/{{ $event->id_event }}/acknowledgments/fr"><i style="color: #f5c31e;"
                                class="fal fa-sticky-note" aria-hidden="true"></i>{{ __('event.ACKNOWLEDGMENTS') }}</a>
                    </li>
                    <li><a ng-class="{active: loc=='/messaging/fr'}"
                            ng-href="/event/{{ $event->id_event }}/messaging/fr"><i class="fal fa-comment-lines"
                                style="color: #f5c31e;" aria-hidden="true"></i>{{ __('event.MESSAGING') }}</a></li>
                    <li><a ng-class="{active: loc=='/tutorial/fr'}" style="color: #f5c31e;"
                            ng-href="/event/{{ $event->id_event }}/tutorial/fr"><i style="color: #f5c31e;"
                                class="fal fa-question" aria-hidden="true"></i>TUTORIAL</a></li>
                @endif

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
