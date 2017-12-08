"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

var uid = document.getElementById('_userID').innerHTML;

var defaultErrHandle = function(err) {
    console.log(err);
};

var app = angular.module('pmApp', ['cp.ngConfirm']);
app.controller('pmIndex', function($scope, $http, $ngConfirm) {

    $scope.serverPrefix = serverPrefix;
    $scope.my_info = "";
    $scope.viewable_posts = "";

    // Get myinfo
    $http.get(serverPrefix + '/my/' + uid)
        .then(function(response) {
            $scope.my_info = response.data.data[0];
        }, defaultErrHandle);

    // Get posts available to me
    $http.get(serverPrefix + '/post/' + uid)
        .then(function(response) {
            $scope.viewable_posts = response.data.data;
            console.log($scope.viewable_posts);
        }, defaultErrHandle);

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

$('#form-new-whatsup').submit(function(e) {
    var wu = $('#whatsup-text').val();

    $.ajax({
        url: serverPrefix + '/my/whatsup',
        data: 'userID=' + uid + '&whatsup=' + wu,
        type: 'POST',

        success: function(data) {
            if (data.status == '200') {
                location.reload();
            }
        },

        error: function(err) {
            console.log(err);
        },
    });

});