/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('trainingApp').controller('SidebarController', ['$scope',
    function ($scope) {
        $scope.changeForm = function (form, element) {
            console.log(element);
            if (!$(form).is(':visible')) {
                $('.content-container:visible').fadeOut(300);
                //hide current, and show requested
                $(form).fadeIn(300);
                //set current item
                $('ul.nav li.active').removeClass('active');
                $(form + 'Optn').addClass('active');
                //and hide menu
            }
            if (form === '#balance') {
                $scope.reloadBalanceData();
            } else {
                if (form === '#sessionPersons') {
                    $scope.reloadColaboradores();
                }
            }
        };
    }]);
