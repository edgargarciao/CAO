angular
        .module('trainingApp')
        .directive('drRefreshView', function () {
            var noop = function () {
            };
            var refreshDpOnNotify = function (dpCtrl) {
                return function () {
                    dpCtrl.refreshView();
                };
            };
            return {
                require: 'datepicker',
                link: function (scope, elem, attrs, dpCtrl) {
                    var refreshPromise = scope[attrs.drRefreshView];
                    refreshPromise.then(noop, noop, refreshDpOnNotify(dpCtrl));
                }
            };
        });

angular
        .module('trainingApp')
        .directive('stringToNumber', function () {
            return {
                require: 'ngModel',
                link: function (scope, element, attrs, ngModel) {
                    ngModel.$parsers.push(function (value) {
                        return '' + value;
                    });
                    ngModel.$formatters.push(function (value) {
                        return parseFloat(value, 10);
                    });
                }
            };
        });
angular
        .module('trainingApp')
        .directive('dateInput', function () {
            return {
                restrict: 'A',
                scope: {
                    ngModel: '='
                },
                link: function (scope) {
                    if (scope.ngModel)
                        scope.ngModel = new Date(scope.ngModel);
//                        scope.ngModel = new Date(scope.ngModel+" 00:00:00 GMT-0500");
                }
            };
        });