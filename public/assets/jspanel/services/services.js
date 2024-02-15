/*sampleApp.factory('Dati', function() {

    var idevent ="";

    return {

        setdata: function(id) {
            idevent=id;
        },

        getid: function() {
            return idevent;
        }
    };
});*/

sampleApp.filter('dateToISO', function() {
    return function(dateSTR) {
        var o = dateSTR.replace(/-/g, "/"); // Replaces hyphens with slashes
        return Date.parse(o + " +0000"); // No TZ subtraction on this sample
    }
});

sampleApp.filter('cut', function() {
  return function(input) {
    var mext=input.substr(0, 12);
    if(mext.length == 12){ mext=mext+'...';}
    mext.replace(/(\r\n|\n|\r)/gm,"");
    return mext;
  };
});

sampleApp.directive('scrollToBottom', function($timeout, $window) {
    return {
        scope: {
            scrollToBottom: "="
        },
        restrict: 'A',
        link: function(scope, element, attr) {
            scope.$watchCollection('scrollToBottom', function(newVal) {
                if (newVal) {
                    $timeout(function() {
                        element[0].scrollTop =  element[0].scrollHeight;
                    }, 0);
                }

            });
        }
    };
});

sampleApp.directive('onLongClick', function($timeout, $document) {
  return {
    restrict: 'A',
    link: function($scope, $elm, $attrs) {
      $elm.bind('mousedown', function(evt) {
        // Locally scoped variable that will keep track of the long press
        $scope.longClicking = true;

        // We'll set a timeout for 600 ms for a long press
        $timeout(function() {
          if ($scope.longClicking) {
            $scope.longClick = true;
            // If the touchend event hasn't fired,
            // apply the function given in on the element's on-long-press attribute
            $scope.$apply(function() {
              $scope.$eval($attrs.onLongClick)
            });
          }
        }, 1000);
      });

      $document.bind('mouseup', function(evt) {
        // Prevent the onLongPress event from firing
        $scope.longClicking = false;
        if ($scope.longClick) {
          $scope.longClick = false;
          // If there is an on-touch-end function attached to this element, apply it
          if ($attrs.onLongClickRelease) {
            $scope.$apply(function() {
              $scope.$eval($attrs.onLongClickRelease)
            });
          }
        }
      });
    }
  };
});