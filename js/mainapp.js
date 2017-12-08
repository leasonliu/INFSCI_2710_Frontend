"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

var defaultErrHandle = function(err) {
    console.log(err);
};

var app = angular.module('pmApp', ['cp.ngConfirm']);
app.controller('pmIndex', function($scope, $http, $ngConfirm) {

    $scope.logoutCheck = function() {
        $ngConfirm({
            title: 'Logout?',
            content: 'You will be automatically logged out in 5 seconds.',
            autoClose: 'logoutUser|5000',
            buttons: {
                logoutUser: {
                    text: 'Logout!',
                    btnClass: 'btn-danger',
                    action: function() {
                        window.location = "/logout.php";
                    }
                },
                cancel: function() {}
            }
        });
    };

});