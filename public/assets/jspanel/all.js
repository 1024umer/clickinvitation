var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop', 'textAngular']);

sampleApp.config(['$routeProvider', '$locationProvider',
  function ($routeProvider, $locationProvider) {

    angular.lowercase = angular.$$lowercase;

    $routeProvider.when('/general-infos', {
      templateUrl: '/templates/general-infos.html',
      controller: 'GeneralinfosCtrl',
    }).when('/general-infos/fr', {
      templateUrl: '/templates/fr/general-infos.html',
      controller: 'GeneralinfosCtrl',
    }).
      when('/webpage', {
        templateUrl: '/templates/webpage.html',
        controller: 'WebpageCtrl',
      }).
      when('/webpage-new', {
        templateUrl: '/templates/webpage-new.html',
        controller: 'WebpageCtrl',
      }).
      when('/webpage/fr', {
        templateUrl: '/templates/fr/webpage.html',
        controller: 'WebpageCtrl',
      }).
      when('/meals', {
        templateUrl: '/templates/meals.html',
        controller: 'MealsCtrl',
      }).
      when('/meals/fr', {
        templateUrl: '/templates/fr/meals.html',
        controller: 'MealsCtrlFR',
      }).
      when('/gift-suggestions', {
        templateUrl: '/templates/gift-suggestions.html',
        controller: 'GiftsuggestionsCtrl',
      }).
      when('/gift-suggestions/fr', {
        templateUrl: '/templates/fr/gift-suggestions.html',
        controller: 'GiftsuggestionsCtrlFR',
      }).
      when('/guests-list', {
        templateUrl: '/templates/guests-list.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr', {
        templateUrl: '/templates/guests-list.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/declined', {
        templateUrl: '/templates/guests-list-declined.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/checked-in', {
        templateUrl: '/templates/guests-list-checked-in.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/attending', {
        templateUrl: '/templates/guests-list-attending.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/a-to-z', {
        templateUrl: '/templates/guests-list-a-to-z.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/z-to-a', {
        templateUrl: '/templates/guests-list-z-to-a.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/not-confirm', {
        templateUrl: '/templates/guests-list-not-confirm.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/not-open', {
        templateUrl: '/templates/guests-list-not-open.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr/declined', {
        templateUrl: '/templates/fr/guests-list-declined.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr/checked-in', {
        templateUrl: '/templates/fr/guests-list-checked-in.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr/attending', {
        templateUrl: '/templates/fr/guests-list-attending.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr/not-confirm', {
        templateUrl: '/templates/fr/guests-list-not-confirm.html',
        controller: 'GuestslistCtrl',
      }).
      when('/guests-list/fr/not-open', {
        templateUrl: '/templates/fr/guests-list-not-open.html',
        controller: 'GuestslistCtrl',
      }).
      when('/invitation-old', {
        templateUrl: '/templates/invitation.php',
        controller: 'InvitationCtrl',
      }).
      when('/invitation-new', {
        templateUrl: '/templates/invitation-new.php',
        controller: 'InvitationCtrlNew',
      }).
      when('/invitation', {
        templateUrl: '/templates/invitation-reload.html',
        controller: 'InvitationCtrlNew',
      }).
      when('/invitation/fr', {
        templateUrl: '/templates/invitation-fr.php',
        controller: 'InvitationCtrl',
      }).
      when('/guests-tables', {
        templateUrl: '/templates/guests-tables.html',
        controller: 'GueststablesCtrl',
      }).
      when('/guests-tables/fr', {
        templateUrl: '/templates/fr/guests-tables.html',
        controller: 'GueststablesCtrlFR',
      }).
      when('/photos', {
        templateUrl: '/templates/photos.html',
        controller: 'PhotosCtrl',
      }).
      when('/photos/fr', {
        templateUrl: '/templates/fr/photos.html',
        controller: 'PhotosCtrlFR',
      }).
      when('/acknowledgments', {
        templateUrl: '/templates/acknowledgments.html',
        controller: 'AcknowledgmentsCtrl',
      }).
      when('/acknowledgments/fr', {
        templateUrl: '/templates/fr/acknowledgments.html',
        controller: 'AcknowledgmentsCtrlFR',
      }).
      when('/pay', {
        templateUrl: '/templates/pay.html',
        controller: 'PayCtrl',
      }).
      when('/pay/fr', {
        templateUrl: '/templates/fr/pay.html',
        controller: 'PayCtrl',
      }).
      when('/thankyou', {
        templateUrl: '/templates/thankyou.html',
        controller: 'ThankyouCtrl',
      }).
      when('/thankyou/fr', {
        templateUrl: '/templates/fr/thankyou.html',
        controller: 'ThankyouCtrlFR',
      }).
      when('/messaging', {
        templateUrl: '/templates/messaging.html',
        controller: 'MessagingCtrl',
      }).
      when('/messaging/fr', {
        templateUrl: '/templates/fr/messaging.html',
        controller: 'MessagingCtrl',
      }).
      when('/tutorial', {
        templateUrl: '/templates/tutorial.html',
        controller: 'TutorialCtrl',
      }).
      when('/tutorial/fr', {
        templateUrl: '/templates/fr/tutorial.html',
        controller: 'TutorialCtrlFR',
      }).
      otherwise({
        redirectTo: '/general-infos'
      });

    $locationProvider.html5Mode(true);
  }]);