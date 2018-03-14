angular
        .module('trainingApp')
        .controller('TrainingController', ['$scope', 'Resource', '$filter',
            function ($scope, Resource, $filter) {
                
                $scope.salasCustom = [{sala: 'Sala 1 - I&D - Edificio'}, 
                    {sala: 'Sala 2 - I&D - Edificio'}, {sala: 'Sala 3 - I&D - Edificio'}, 
                    {sala: 'Sala Presidencia'}, {sala: 'Sala Vicepresidencia'},
                    {sala: 'Salon Cañasgordas'}, {sala: 'Salon Comfenalco CMS'},
                    {sala: 'Salon Camara de Comercio'}, {sala: 'Sala Externa'}];

                $scope.init = function () {
//                    console.log('initializing view...');
                    $scope.addMode = false;
                    $scope.actualView = 'index';
                    $scope.newTraining = $scope.initNewTraining();
                };

                $scope.addFormationGroups = function () {
//                    console.log('adding groups...');
                    var size = $scope.newTraining.groups.length;
                    //if user change group number, lost all changes
                    $scope.newTraining.groups = [];
//                    for (i = 0; i < ($scope.group_number - size); i++) {
                    for (i = 0; i < ($scope.group_number); i++) {
                        $scope.newTraining.groups.push(
                                {
                                    name: 'Grupo ' + (i + 1),
                                    location: '',
                                    trainer: '',
                                    start_date: '',
                                    end_date: ''
                                });
                    }
                };

                $scope.initNewTraining = function () {
                    $scope.currentTrainingGroups = [];
                    return {
                        name: "",
                        duration: 3,
                        training_type_id: "1",
                        area_id: "1",
                        training_state_id: "1",
                        training_programs_id: "1",
                        groups: []
                    };
                };

                $scope.validateNewTrainingData = function (training) {
                    var validData = true, message = '';
                    //validate name, training duration & training groups
                    if (training.name == '') {
                        message += 'Debe especificar un nombre para el entrenamiento a registrar. ';
                        validData = false;
                    }
                    if (parseInt(training.duration) <= 0 || training.duration == null) {
                        message += 'Debe especificar una duración mayor a 0. ';
                        validData = false;
                    }
                    if (training.groups.length <= 0) {
                        message += 'Debe registrar al menos un grupo de formación. ';
                        validData = false;
                    }
                    //now, we validate groups data
                    else {
                        angular.forEach(training.groups, function (group, index) {
                            //verificamos que los campos de los grupos estén diligenciados
                            console.log(group.start_date);
                            if (group.location === '' || group.trainer === '' || group.start_date == '' || group.end_date == '' || group.start_date === null || group.end_date === null) {
                                validData = false;
                                message += 'Información incompleta del grupo: ' + group.name + '. ';
                            }
                        });
                    }
                    if (!validData) {
                        callModal(message);
                    }
                    return validData;
                };

                $scope.validateTrainingData = function (training) {
                    //this is so DRY
                    var validData = true, message = '';
                    //validate name, training duration & training groups
                    if (training.name == '') {
                        message += 'Debe especificar un nombre para el entrenamiento a actualizar. ';
                        validData = false;
                    }
                    console.log(training.duration);
                    console.log(parseInt(training.duration));
                    if (parseInt(training.duration) <= 0 || isNaN(parseInt(training.duration))) {
                        message += 'Debe especificar una duración mayor a 0. ';
                        validData = false;
                    }
                    if (training.groups.length <= 0) {
                        message += 'Debe registrar al menos un grupo de formación. ';
                        validData = false;
                    }
                    //now, we validate groups data
                    else {
                        angular.forEach(training.groups, function (group, index) {
                            //verificamos que los campos de los grupos estén diligenciados
                            console.log(group.grupo.start_date);
                            console.log(group.grupo.end_date);
                            if (group.grupo.location === '' || group.grupo.trainer === '' || group.grupo.start_date == '' || group.grupo.end_date == '' || group.grupo.start_date === null || group.grupo.end_date === null) {
                                validData = false;
                                message += 'Información incompleta del grupo: ' + group.grupo.name + '. ';
                            }
                        });
                    }
                    if (!validData) {
                        callModal(message);
                    }
                    return validData;
                };

                $scope.save = function () {
//                    console.log('saving training...');
//                    console.log($scope.newTraining.groups);
                    if ($scope.validateNewTrainingData($scope.newTraining)) {
                        //save data
                        angular.forEach($scope.newTraining.groups, function (group, index) {
                            $scope.newTraining.groups[index].start_date = $filter('date')(group.start_date, 'yyyy-MM-dd');
                            $scope.newTraining.groups[index].end_date = $filter('date')(group.end_date, 'yyyy-MM-dd');
                        });

                        Resource.saveTraining.save({
                            data: $scope.newTraining,
                            format: 'json'
                        }, function (data) {
                            if (data.response.status === 200) {
                                console.log('success');
                                callModal(data.response.message);
                                //reload trainings
                                $scope.reload();
                                $scope.newTraining = $scope.initNewTraining();
                            }
                        }, function (data) {
                            callModal('Lo sentimos, no se ha podido guardar el entrenamiento y sus grupos asociados');
                        });
                    }
                };

                $scope.update = function (training) {
//                    console.log('updting training ' + $scope.currentTrainingGroups);
                    var training = training;
                    training.groups = angular.copy($scope.currentTrainingGroups);
                    if ($scope.validateTrainingData(training)) {
                        for (var i = 0; i < training.groups.length; i++) {
                            training.groups[i].grupo.start_date = $filter('date')(training.groups[i].grupo.start_date, "yyyy-MM-dd");
                            training.groups[i].grupo.end_date = $filter('date')(training.groups[i].grupo.end_date, "yyyy-MM-dd");
                            ;
                        }
                        Resource.updateTraining.update({data: training, id: $scope.currentTraining.training.id}, function (data) {

                            if (data.response.status == 200) {
                                //Recorrer los grupos y transformar dates para evitar warnings
                                for (var i = 0; i < data.response.groups.length; i++) {
                                    data.response.groups[i]['grupo']['start_date'] = new Date(data.response.groups[i]['grupo']['start_date'] + " 00:00:00 GMT-0500");
                                    data.response.groups[i]['grupo']['end_date'] = new Date(data.response.groups[i]['grupo']['end_date'] + " 00:00:00 GMT-0500");
                                }
                                $scope.currentTrainingGroups = data.response.groups;
                                //reload trainings
                                callModal(data.response.message);
                                $scope.reload();
                                $scope.closeDetail();
                            }
                            else {
                                callModal(data.response.message);
                            }
                        }, function (data) {
                            console.log(data);
                            callModal('No se pudo actualizar la información del entrenamiento');
                        });
                    }
                };

                $scope.filterTrainings = function (type_id) {
                    if ($scope.trainings !== undefined) {
                        if (type_id === -1) {
                            $scope.auxTrainings = $scope.trainings;
                        }
                        else {
                            $scope.auxTrainings = $filter('filter')($scope.trainings, {training: {training_type_id: type_id}});
                        }
                    } else {
                        // Si no se han cargado los trainings espere algo bueno seria un evento para escuchar cuando fueron cargados y dispararse.
                        $scope.typeSelected = {};
                    }
                };

                $scope.deleteTrainingGroup = function (id, index) {
                    if (null != id) {
                        Resource.deleteGroup.delete({id: id, format: 'json'}, function (data) {
                            if (data.response.status == 200) {
                                $scope.currentTrainingGroups.splice(index, 1);
                            } else {
                                callModal(data.response.message);
                            }
                        }, function (data) {
                            console.log(data);
                        });
                    } else {
                        $scope.currentTrainingGroups.splice(index, 1);
                    }
                };

                $scope.init();

                $scope.changeView = function () {
                    console.log('changing view...');
                    if ($scope.addMode === false) {
                        $('#index').fadeOut(300);
                        $('#add').fadeIn(300);
                        $scope.addMode = true;
                    }
                    else {
                        $('#add').fadeOut(300);
                        $('#index').fadeIn(300);
                        $scope.addMode = false;
                    }
                };

                $scope.view = function (record, editMode) {
                    console.log('changing to detail ' + record.training.id);
                    $scope.editMode = editMode;
                    $('#index').fadeOut(300);
                    $('#detail').fadeIn(300);
                    $scope.currentTraining = record;
                    console.log($scope.currentTraining);
                    Resource.detailedTrainingGroups.get({id: $scope.currentTraining.training.id, format: 'json'}, function (data) {
                        console.log(data);
                        for (var i = 0; i < data.groups.length; i++) {
                            data.groups[i]['grupo']['start_date'] = new Date(data.groups[i]['grupo']['start_date'] + " 00:00:00 GMT-0500");
                            data.groups[i]['grupo']['end_date'] = new Date(data.groups[i]['grupo']['end_date'] + " 00:00:00 GMT-0500");
                        }

                        $scope.currentTrainingGroups = data.groups;
                    }, function (data) {
                        console.log('something wrong was happened')
                    });
                };

                $scope.closeDetail = function () {
                    $('#detail').fadeOut(300);
                    $('#index').fadeIn(300);
                    $scope.currentTraining = null;
                    $scope.currentTrainingGroups = null;
                };

                /**
                 * Permite eliminar el training seleccionado.
                 * @return {undefined}
                 */
                $scope.deleteTraining = function (id_val, index) {
                    if (validarAccion()) {
                        Resource.deleteTraining.delete({id: id_val, format: 'json'}, function (data) {
                            if (data.response.status == 200) {
                                $scope.auxTrainings.splice(index, 1);
                            } else {
                                callModal(data.response.message);
                            }
                        }, function (data) {
                            console.log(data);
                        });
                    }
                };

                function validarAccion() {
                    return true;
                }

                function callModal(message) {
                    $scope.flashMessage = message;
                    $('#flashModal').modal('toggle');
                }

                /**
                 * Branch OSKD0012 
                 */
                $scope.addGroup = function () {
                    $scope.currentTrainingGroups.push({});
                };
            }]);