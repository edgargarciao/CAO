angular
        .module('trainingApp')
        .controller('SessionController', ['$scope', 'Resource', '$filter', '$q',
            function ($scope, Resource, $filter, $q) {

                $scope.typeSelected = null;
                $scope.groupSelected = null;
                $scope.colaborador = null;
                $scope.trainingSelected = null;
//                $scope.auxTrainings = []; Ya esta inicializado en main ctrl
//                $scope.colaboradores = []; Ya esta inicializado en main ctrl
                $scope.groups = []; //grupos de un training
                $scope.sessions = [];
                $scope.trainingGroup = null; //Define el training del que se obtendran grupos
                $scope.sessionsUser = []; // Array de las sessiones de un usuario activas
                $scope.personSelected = {id: null};
                $scope.oldPersonSelected = {id: null}; // para la concurrencia
                $scope.dateSession = {date: new Date()}; //Date session
                $scope.durationSelected = 2;
                var dateDisableDeferred = $q.defer();
                $scope.dateDisablePromise = dateDisableDeferred.promise;
                $scope.optionsDatePicker = {
                    showWeeks: false,
                    dateDisabled: isDateDisabled
                };

                $scope.addMode = false;

                /**
                 * Recibe el tipo de entrenamiento y realiza un filtro sobre los trainings cargados
                 * @param {type} type_id
                 * @returns {undefined}
                 */
                $scope.updateTrainings = function () {
                    var type_id = $scope.typeSelected;
                    if ($scope.trainings !== undefined) {
                        $scope.auxTrainingsSessionCtrl = $filter('filter')($scope.trainings, {training: {training_type_id: type_id}});
                        $scope.updatePersonTrainings();
                    } else {
                        // Si no se han cargado los trainings espere algo bueno seria un evento para escuchar cuando fueron cargados y dispararse.
                        $scope.typeSelected = {};
                    }
                };

                $scope.updatePersonTrainings = function () {

                    var type_id = $scope.typeSelected;
                    var training_id = $scope.trainingSelected;
                    $scope.auxPersonTrainings = $scope.personTrainings;
                    var filtro = {};

                    if ($scope.personTrainings !== undefined) {
                        if (type_id !== null) {
                            filtro.training_type_id = type_id;
                            $scope.auxPersonTrainings = $filter('filter')($scope.personTrainings, filtro);
                        }
                        if (training_id !== null) {
                            filtro = {};
                            filtro.training_id = training_id;
                            $scope.auxPersonTrainings = $filter('filter')($scope.auxPersonTrainings, filtro);
                        }

                    } else {
                        $scope.trainingSelected = {};
                    }
                };
                /**
                 * Obtiene los grupos de un entrenamiento
                 * @returns {undefined}
                 */
                $scope.updateGroupTraining = function () {
                    $scope.groups = [];
                    $scope.groupResp = null;
                    if ($scope.trainingGroup !== null) {
                        Resource.trainingGroups.get({id: $scope.trainingGroup, format: 'json'}, function (data) {
                            //$scope.totalTrainingDurationSelected = 
                            angular.forEach($scope.trainings, function(training){
                                if(training.training.id === $scope.trainingGroup){
                                    $scope.totalTrainingDurationSelected = training.training.duration;
                                }
                            });
                            $scope.groups = data.groups;
                        }, function (data) {
                            console.log('trainings loaded failed ' + data.message);
                        });
                    }
                };

                /**
                 * Actualiza el listado de personas y las sessiones disponibles de los grupos
                 * @returns {undefined}
                 */
                $scope.updatePersonsGroup = function () {
                    $scope.personGroup = [];
                    $scope.sessions = undefined;
                    if ($scope.groupSelected !== null) {
//                        Resource.groupUsers.get({id: $scope.groupSelected, format: 'json'}, function (data) {
//                            $scope.personGroup = data.users;
//                        }, function (data) {
//                            console.log('groups loaded failed ' + data.message);
//                        });
                        getPersonasDeGrupo();
                        Resource.groupSessions.get({id: $scope.groupSelected, format: 'json'}, function (data) {
                            $scope.sessions = data.sessions;
                            dateDisableDeferred.notify(new Date().getTime()); //Recalcular sessiones del grupo en el date picker
                            $scope.sessionsUser = [];
                            $scope.colaborador = null;
                            $scope.personSelected.id = null;
                        }, function (data) {
                            console.log('sessions loaded failed ' + data.message);
                        });
                    }
                };

                /**
                 * Valida si la session es activa para el usuario o inactiva
                 * @param session id_session
                 * @returns {Boolean}
                 */
                $scope.checkAsistencias = function (id_session) {

                    if ($scope.personSelected.id) {
                        if ($scope.sessionsUser !== null && $scope.sessionsUser !== undefined) {
                            $scope.colaborador = null;
                            for (var i = 0; i < $scope.sessionsUser.length; i++) {
                                if ($scope.sessionsUser[i].session.id == id_session.id) {
                                    return true;
                                }
                            }
                            return false;
                        } else {
                            return true;
                        }
                    }
                    return true;
                };
                /**
                 * Ejecuta el servicio para actualizar las asistencias de las personas
                 * @returns {undefined}
                 */
                $scope.updateCheckSessions = function (newValue) {
//                  $scope.personSelected.id = newValue;
//                  Actualizo las sessiones para checkear las validas
                    if (newValue != null) {
                        Resource.userSessions.get({id: newValue, format: 'json'}, function (data) {
                            $scope.sessionsUser = data.sessions;
                        }, function (data) {
                            console.log('sessions loaded failed ' + data.message);
                        });
                    }
                };
                /**
                 * Realiza el store de una nueva fecha de session.
                 * @returns {undefined}
                 */
                $scope.saveDates = function () {

                    var dateformated = $filter('date')($scope.dateSession.date.setHours(0, 0, 0, 0), "yyyy-MM-dd");
                    if ($scope.durationSelected < 1) {
                        callModal("Complete el campo duración del entrenamiento, La duración del entrenamiento debe ser mayor a 0.");
                        return;
                    }
                    var sessions = {hours: $scope.durationSelected, date: dateformated, training_groups_id: $scope.groupSelected};
                    Resource.saveSession.save({
                        data: sessions,
                        format: 'json'
                    }, function (data) {
                        if (data.response.status === 200) {
                            $scope.dateSession.date = null;
                            sessions.id = data.response.trainingSession;
                            sessions.check = true;
                            $scope.sessions.push({sessions: sessions});
                            dateDisableDeferred.notify(new Date().getTime());
                        } else {
                            callModal(data.response.message);
                        }
                    }, function (data) {

                    });
                };


                function isDateDisabled(data) {
                    var date = data.date,
                            mode = data.mode;
                    if (mode === 'day') {
                        var dayToCheck = new Date(date).setHours(0, 0, 0, 0);
                        for (var i = 0; i < $scope.sessions.length; i++) {
                            var yyy = Date.parse($scope.sessions[i].sessions.date + ' 00:00:00 GMT-0500');
                            var currentDay = new Date(yyy).setHours(0, 0, 0, 0);
                            if (dayToCheck === currentDay) {
                                return true;
                            }
                        }
                        return false;
                    }
                }

                $scope.updateColaborador = function () {
                    $scope.personSelected.id = null;
                };

                /**
                 * Obtener ids de sessiones para la persona y guardar.
                 * @returns {undefined}
                 */
                $scope.saveAssitant = function () {
                    if ($scope.sessions != undefined && ($scope.groupSelected != null || $scope.sessions.length > 0)) {

                        var ids_sessions = [];
                        for (var i = 0; i < $scope.sessions.length; i++) {
                            var value = document.getElementById('checkSession' + $scope.sessions[i].sessions.id);
                            if (value.checked) {
                                ids_sessions.push($scope.sessions[i].sessions.id);
                            }
                        }

                        var id_user = ($scope.personSelected.id != null)
                                ? $scope.personSelected.id :
                                ($scope.colaborador != null)
                                ? $scope.colaborador.users.id : null;
                        var id_grupo = $scope.groupSelected;

                        var data = {id_sessions: ids_sessions, id_user: id_user, id_grupo: id_grupo};
                        Resource.saveAssitant.save({
                            data: data,
                            format: 'json'
                        }, function (data) {
                            if (data.response.status === 200) {
                                // Limpio todo exepto el person selected se limpia solo.
                                if ($scope.colaborador != null) {
                                    $scope.sessionsUser = [];
                                    $scope.colaborador = null;
                                    getPersonasDeGrupo(); // Para no cargar...
//                                    $scope.reloadBalanceData();
                                }
                            } else {
                                if (data.response.status === 202) {
                                    callModal(data.response.message);
                                }
                            }
                        }, function (data) {
//                            callModal("No fue posible realizar el registro asegúrese que la información suministrada sea válida.");
                        });
                    }


                };

                $scope.changeView = function () {
                    console.log('changing view...');
//                    $scope.reloadBalanceData();
                    if ($scope.addMode === false) {
                        $('#assist-index').fadeOut(300);
                        $('#assist-add').fadeIn(300);
                        $scope.addMode = true;
                    }
                    else {
                        $scope.trainingGroup = null;
                        $scope.totalTrainingDurationSelected = null;
                        $scope.updateGroupTraining();
                        $scope.reloadColaboradores();
                        $('#assist-add').fadeOut(300);
                        $('#assist-index').fadeIn(300);
                        $scope.addMode = false;
                    }
                };

                $scope.$watch('personSelected.id', function (newValue, oldValue) {
                    if (oldValue != null && newValue != null) {
                        var id_grupo = $scope.groupSelected;
                        var ids_sessions = [];
                        for (var i = 0; i < $scope.sessions.length; i++) {
                            var value = document.getElementById('checkSession' + $scope.sessions[i].sessions.id);
                            if (value.checked) {
                                ids_sessions.push($scope.sessions[i].sessions.id);
                            }
                        }
                        updateCheckInputs(ids_sessions);
                        var data = {id_sessions: ids_sessions, id_user: oldValue, id_grupo: id_grupo};
                        Resource.saveAssitant.save({
                            data: data,
                            format: 'json'
                        }, function (data) {
                            if (data.response.status === 200) {
//                                console.log(data.response);
//                                $scope.reloadBalanceData();
                            }
                        }, function (data) {

                        });
                    }
                    $scope.sessionsUser = [];
                    $scope.updateCheckSessions(newValue);
                });

                $scope.deleteTrainingSession = function (id_val) {
                    Resource.deleteSession.delete({id: id_val, format: 'json'}, function (data) {
                        if (data.response.status == 400) {
                            callModal(data.response.message);
                        }
                        Resource.groupSessions.get({id: $scope.groupSelected, format: 'json'}, function (data) {
                            $scope.sessions = data.sessions;
                            dateDisableDeferred.notify(new Date().getTime()); //Recalcular sessiones del grupo en el date picker
                        });
                    }, function (data) {
                    });
                };

                $scope.updateTrainingSession = function (record) {
                    Resource.updateSession.update({data: record, format: 'json', id: record.id}, function (data) {
                        console.info(data);
                        callModal(data.response.message);
                    }, function (data) {
                        console.log(data);
                    });
                };

                /**
                 * Actualiza las sessiones del usuario a vacias.
                 * Esto debido a que existe un cambio en progreso. de id 1 a id 2 y no queremos que se nos colen sesiones
                 * @param {type} ids_sessions
                 * @returns {undefined}
                 */
                function updateCheckInputs(ids_sessions) {
                    for (var i = 0; i < ids_sessions.length; i++)
                        document.getElementById('checkSession' + ids_sessions[i]).checked = false;
                }

                function getPersonasDeGrupo() {
                    $scope.groupResp = null;
                    Resource.groupUsers.get({id: $scope.groupSelected, format: 'json'}, function (data) {
                        $scope.personGroup = data.response.users;
                        $scope.groupResp = data.response.group[0];
                    }, function (data) {
                        console.log('groups loaded failed ' + data.message);
                    });
                }

                $scope.filterTrainingAssistants = function (type_id) {
                    console.log('filter trainings by type ' + type_id);
                    if ($scope.trainings !== undefined) {
                        $scope.typeSelected = type_id;
                        console.log('trying to filter');
                        if (type_id === -1) {
                            $scope.typeSelected = null;
                            $scope.auxTrainingsSessionCtrl = $scope.trainings;
                            
                        }
                        else {
                            $scope.auxTrainingsSessionCtrl = $filter('filter')($scope.trainings, {training: {training_type_id: type_id}});
                        }
                        //restart filter per training
                        $scope.trainingSelected = null;
                        $scope.updatePersonTrainings();
                    } else {
                        // Si no se han cargado los trainings espere algo bueno seria un evento para escuchar cuando fueron cargados y dispararse.
                        $scope.typeSelected = {};
                    }
                };

                function callModal(message) {
                    $scope.flashMessage = message;
                    $('#flashModalSession').modal('toggle');
                }
            }]);