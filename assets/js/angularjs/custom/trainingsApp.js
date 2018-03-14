/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var env = 'acad_savillegas/';
angular.module('trainingApp', ['ngResource', 'ui.bootstrap', 'multipleDatePicker'])
        .factory('Resource', ['$resource',
            function ($resource) {
                return {
                    trainings: $resource('http://opensky.open.com.co/' + env + 'api/trainings.:format', {format: '@format'}),
                    saveTraining: $resource('http://opensky.open.com.co/' + env + 'api/trainings/add.:format', {format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}, update: {method: 'PUT', params: {data: 0, format: 'json'}}}),
                    deleteTraining: $resource('http://opensky.open.com.co/' + env + 'api/trainings/delete/:id.:format', {format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}, update: {method: 'PUT', params: {data: 0, format: 'json'}}, delete: {method: 'DELETE', params: {id: '@id', format: 'json'}}}),
                    updateTraining: $resource('http://opensky.open.com.co/' + env + 'api/trainings/edit/:id.:format', {id: '@id', format: '@format'}, {update: {method: 'PUT', params: {data: 0, format: 'json'}}}),
                    areas: $resource('http://opensky.open.com.co/' + env + 'api/trainings/allAreas.:format', {format: '@format'}),
                    types: $resource('http://opensky.open.com.co/' + env + 'api/training_types/allTypes.:format', {format: '@format'}),
                    states: $resource('http://opensky.open.com.co/' + env + 'api/training_states/allStates.:format', {format: '@format'}),
                    programs: $resource('http://opensky.open.com.co/' + env + 'api/training_programs/allPrograms.:format', {format: '@format'}),
                    users: $resource('http://opensky.open.com.co/' + env + 'api/sessionsPersons/allUsers.:format', {format: '@format'}),
                    allTrainings: $resource('http://opensky.open.com.co/' + env + 'api/trainings/myTrainings.:format', {format: '@format'}),
                    trainingGroups: $resource('http://opensky.open.com.co/' + env + 'api/trainingGroups/getGroupsTraining/:id.:format', {id: '@id', format: '@format'}),
                    detailedTrainingGroups: $resource('http://opensky.open.com.co/' + env + 'api/trainingGroups/getGroupsTrainingComplete/:id.:format', {id: '@id', format: '@format'}),
                    groupUsers: $resource('http://opensky.open.com.co/' + env + 'api/trainingGroups/getGroupUsers/:id.:format', {id: '@id', format: '@format'}),
                    groupSessions: $resource('http://opensky.open.com.co/' + env + 'api/trainingSessions/getSessionGroup/:id.:format', {id: '@id', format: '@format'}),
                    userSessions: $resource('http://opensky.open.com.co/' + env + 'api/sessionsPersons/allSessionsUser/:id.:format', {id: '@id', format: '@format'}),
                    saveSession: $resource('http://opensky.open.com.co/' + env + '/api/trainingSessions/add.:format', {format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}}),
                    deleteSession: $resource('http://opensky.open.com.co/' + env + 'api/trainingSessions/delete/:id.:format', {id: '@id', format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}}, {delete: {method: 'DELETE', params: {id: '@id', format: 'json'}}}),
                    updateSession: $resource('http://opensky.open.com.co/' + env + 'api/trainingSessions/edit/:id.:format', {id: '@id', format: '@format'}, {update: {method: 'PUT', params: {data: 0, format: 'json', id: '@id'}}}),
                    saveAssitant: $resource('http://opensky.open.com.co/' + env + '/api/sessionsPersons/add.:format', {format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}}),
                    deleteGroup: $resource('http://opensky.open.com.co/' + env + 'api/trainingGroups/delete/:id.:format', {id: '@id', format: '@format'}, {save: {method: 'POST', params: {data: 0, format: 'json'}}}, {delete: {method: 'DELETE', params: {id: '@id', format: 'json'}}}),
                    balanceData: $resource('http://opensky.open.com.co/' + env + 'api/trainings/trainingBalance/:year.:format', {year: '@year', format: '@format'})
                };
            }])
        //do another factory to sync data through all controllers
