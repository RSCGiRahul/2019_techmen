
'use strict';
(function () {
    var app = angular.module('willcrisis.angular-select2', []);

    app.directive('select2', ['$timeout', function ($timeout) {
        return {
            require: 'ngModel',
            restrict: 'A',
            link: function (scope, element, attrs) {
                $timeout(function() {
                    element.select2();
                    element.select2Initialized = true;
                });

                var recreateSelect = function () {
                    if (!element.select2Initialized) {
                        return;
                    }
                    $timeout(function() {
                        element.select2('destroy');
                        element.select2();
                    });
                };

                scope.$watch(attrs.ngModel, recreateSelect);

                if (attrs.ngOptions) {
                    var list = attrs.ngOptions.match(/ in ([^ ]*)/)[1];
                    // watch for option list change
                    scope.$watch(list, recreateSelect);
                }

                if (attrs.ngDisabled) {
                    scope.$watch(attrs.ngDisabled, recreateSelect);
                }
            }
        };
    }]);
})();

var app = angular.module('techman-app', ['datatables','willcrisis.angular-select2']);
app.config(config);
config.$inject = ['$interpolateProvider'];
function config($interpolateProvider){

    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
}
