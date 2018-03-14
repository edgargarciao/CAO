/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('trainingApp').controller('BalanceController', ['$scope', 'Resource', '$filter', '$q',
    function ($scope, Resource, $filter, $q) {

        $scope.init = function () {
            $scope.loadComponents();
            $scope.years = [{
              id: 2016,
              name: 2016
            },{
              id: 2017,
              name: 2017
            }];
        };

        $scope.totalParticipation = function () {
            var participation = 0;
            angular.forEach($scope.auxUsersData, function (user) {
                participation += $scope.totalPerPerson(user);
            });
            return participation;
        };

        $scope.loadComponents = function () {
            $scope.typeFilter = -1;
        };

        $scope.totalPerPerson = function(user){
            var total = 0;
            angular.forEach(user.programs, function(program){
                total += parseInt(program[0].participation);
            });
            return total;
        };

        $scope.updateTypeFilter = function (type_id) {
            console.log('trying to filter by '+type_id);
            $scope.typeFilter = type_id;
            $scope.filterTrainigs();
        };

        $scope.resetFilters = function(){
            $scope.areaFilter = null;
            $scope.programFilter = null;
            $scope.trainingFilter = null;
            $scope.typeFilter = -1;
            $scope.filterTrainigs();
        };

        $scope.filterTrainigs = function(){
            if($scope.usersData !== undefined){
                console.log('data: ');
                console.log($scope.auxUsersData);
                //first, filter per type
                if($scope.typeFilter !== null){
                    if($scope.typeFilter === -1){
                        $scope.auxUsersData = angular.copy($scope.usersData);
                    }
                    else{
                        $scope.auxUsersData = angular.copy($scope.usersData);
                        $scope.auxUsersData = $filter('filter')($scope.auxUsersData, function(user){
                            user.programs = $filter('filter')(user.programs,{tr:{training_type_id: $scope.typeFilter}});
                            if(user.programs.length > 0){
                                return true;
                            }
                            else{
                                return false;
                            }
                        });
                    }
                }
                //second, filter per program
                if($scope.programFilter !== null){
                    $scope.auxUsersData = $filter('filter')($scope.auxUsersData, function(user){
                        user.programs = $filter('filter')(user.programs,{tr:{training_programs_id: $scope.programFilter}});
                        if(user.programs.length > 0){
                            return true;
                        }
                        else{
                            return false;
                        }
                    });
                }
                //third, filter per training
                if($scope.trainingFilter !== null){
                    $scope.auxUsersData = $filter('filter')($scope.auxUsersData, function(user){
                        user.programs = $filter('filter')(user.programs,{tr:{id: $scope.trainingFilter}});
                        if(user.programs.length > 0){
                            return true;
                        }
                        else{
                            return false;
                        }
                    });
                }
                //finally, filter per área
                if($scope.areaFilter !== null){
                    $scope.auxUsersData = $filter('filter')($scope.auxUsersData, function(user){

                        user.programs = $filter('filter')(user.programs,{sp:{area_id: $scope.areaFilter}});
                        console.log(user.programs);
                        if(user.programs.length > 0){
                            return true;
                        }
                        else{
                            return false;
                        }
                    });
                }
            }
            else{
                // Si no se han cargado los trainings espere algo bueno seria un evento para escuchar cuando fueron cargados y dispararse.
                //$scope.typeSelected = {};
            }
        };

        $scope.init();

    }]);
