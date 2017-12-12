angular
        .module('trainingApp')
        .controller('mainController', ['$scope', 'Resource', '$filter', '$q',
            function ($scope, Resource, $filter, $q) {

                /*
                 *|| Se realiza la carga inicial que tomaran los distintos controladores ||
                 */

//                load areas
                Resource.areas.get({format: 'json'},
                function (data) {
//                    console.log('areas loaded sucessful');
                    $scope.areas = data.areas;
                }, function (data) {
                    console.log('areas loaded failed');
                });

//                loading programs
                Resource.programs.get({format: 'json'},
                function (data) {
//                    console.log('programs loaded sucessfuly');
                    $scope.programs = data.trainingPrograms;
                }, function (data) {
                    console.log('programs loaded failed');
                });

//                load types
                Resource.types.get({format: 'json'},
                function (data) {
                    $scope.types = data.trainingType;
                    $scope.filterTypes = data.trainingType;
                    $scope.filterTypes.push({"training_type": {"id": "-1", "name": "Todos"}});
//                    console.log('types loaded sucessfuly');
                }, function (data) {
                    console.log('types loaded failed');
                });

//                load states
                Resource.states.get({format: 'json'},
                function (data) {
                    $scope.states = data.trainingStates;
//                    console.log('states loaded sucessfuly');
                }, function (data) {
                    console.log('states loaded failed');
                });

//                load trainings
                Resource.trainings.get({operation: '', format: 'json'}, function (data) {
//                    console.log('trainings loaded sucessful');
                    $scope.trainings = data.training; //Session conoce este mismo nombre
                    $scope.auxTrainings = data.training; //Session conoce este mismo nombre se decide remplazar y anade el siguiente.
                    $scope.auxTrainingsSessionCtrl = data.training;

                }, function (data) {
                    console.log('trainings loaded failed');
                });

//                || Darwin's loads.
//              Colaboradores carga inicial.
                Resource.users.get({format: 'json'}, function (data) {
                    $scope.colaboradores = data.users;
                }, function (data) {
                    console.log('types loaded failed ' + data.message);
                });


                Resource.allTrainings.get({format: 'json'}, function (data) {
                    $scope.personTrainings = data.trainings;
                    $scope.auxPersonTrainings = data.trainings;
                }, function (data) {
                    console.log('areas loaded failed ' + data.message);
                });

//                || Balance's loads.
                Resource.balanceData.get({year: '2016', format: 'json'},
                function (data) {
//                    console.log('balance data loaded sucessful');
                    $scope.usersData = data.balanceData;
                    $scope.auxUsersData = angular.copy(data.balanceData);
                    //console.log($scope.usersData);
                }, function (data) {
                    console.log('balance data loaded failed');
                });


                //RELOADS DATA

                $scope.reloadBalanceData = function () {
                    Resource.balanceData.get({year: '2016', format: 'json'},
                    function (data) {
//                    console.log('balance data loaded sucessful');
                        $scope.usersData = data.balanceData;
                        $scope.auxUsersData = angular.copy(data.balanceData);
                        //console.log($scope.usersData);
                    }, function (data) {
                        console.log('balance data loaded failed');
                    });
                };
                
                $scope.reload = function () {
                    console.log('reloading trainings...');
                    Resource.trainings.get({operation: '', format: 'json'}, function (data) {
//                        console.log('trainings loaded sucessful');
                        $scope.trainings = data.training;
                        $scope.auxTrainings = data.training;

                    }, function (data) {
//                        console.log('trainings loaded failed');
                    });
                };

                $scope.reloadColaboradores = function () {
                    Resource.allTrainings.get({format: 'json'}, function (data) {
                        $scope.personTrainings = data.trainings;
                        $scope.auxPersonTrainings = data.trainings;
                    }, function (data) {
                        console.log('areas loaded failed ' + data.message);
                    });

                };


            }]);
