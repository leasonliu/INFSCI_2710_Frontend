"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

$("#sidebar-nav a").on("click", function() {
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});

var postConfig = {
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
}

var defaultErrHandle = function(err) {
    console.log(err);
};

var app = angular.module('pmApp', ['cp.ngConfirm']);
app.controller('pmAdmin', function($scope, $http, $ngConfirm) {

    $scope.all_posts = "";
    $scope.all_users = "";
    $scope.all_reports = "";
    $scope.dash_stat = "";

    // Get stats
    $http.get(serverPrefix + '/admin/')
        .then(function(response) {
            $scope.dash_stat = response.data.data;
        }, defaultErrHandle);

    // Get all users
    $http.get(serverPrefix + '/admin/users')
        .then(function(response) {
            $scope.all_users = response.data.data;
        }, defaultErrHandle);

    // Get all posts
    $http.get(serverPrefix + '/admin/posts')
        .then(function(response) {
            $scope.all_posts = response.data.data;
        }, defaultErrHandle);

    // Get all reports
    $http.get(serverPrefix + '/admin/reports')
        .then(function(response) {
            $scope.all_reports = response.data.data;
        }, defaultErrHandle);

    $scope.deletePost = function(pid) {
        $ngConfirm({
            title: 'Deleteing post!',
            content: 'You are about to delete pid: "' + pid + '", proceed?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Yes block',
                    btnClass: 'btn-red',
                    action: function() {
                        $http.post(serverPrefix + '/admin/deletePosts', "pid=" + pid, postConfig)
                            .then(function(response) { location.reload(); }, defaultErrHandle);
                    }
                },
                close: function() {}
            }
        });
    };

    $scope.inactiveUser = function(uid) {
        $ngConfirm({
            title: 'Inactiving ' + uid + '!',
            content: 'You are about to inactive "' + uid + '", proceed?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Yes block',
                    btnClass: 'btn-red',
                    action: function() {
                        $http.post(serverPrefix + '/admin/blockOrRecoverUsers', "userID=" + uid, postConfig)
                            .then(function(response) { location.reload(); }, defaultErrHandle);
                    }
                },
                close: function() {}
            }
        });
    };

    $scope.restoreUser = function(uid) {
        $ngConfirm({
            title: 'Restoring ' + uid + '!',
            content: 'You are about to restore "' + uid + '", proceed?',
            type: 'green',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Yes restore',
                    btnClass: 'btn-green',
                    action: function() {
                        $http.post(serverPrefix + '/admin/blockOrRecoverUsers', "userID=" + uid, postConfig)
                            .then(function(response) { location.reload(); }, defaultErrHandle);
                    }
                },
                close: function() {}
            }
        });
    };


});