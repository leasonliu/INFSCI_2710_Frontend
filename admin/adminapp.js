"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

$("#sidebar-nav a").on("click", function() {
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});

var defaultErrHandle = function(err) {
    console.log(err);
};

var app = angular.module('pmApp', ['cp.ngConfirm']);
app.controller('pmAdmin', function($scope, $http, $ngConfirm) {

    $scope.all_posts = "";
    $scope.all_users = "";
    $scope.all_reports = "";
    $scope.dash_stat = "";

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

    // Get stats
    $http.get(serverPrefix + '/admin/')
        .then(function(response) {
            $scope.dash_stat = response.data.data;
        }, defaultErrHandle);

    $scope.deleteUser = function(uid) {

    };

    $scope.test = function() {
        $scope.name = 'Sia: cheap thrills';
        $ngConfirm({
            title: 'Confirm!',
            content: '<strong>{{name}}</strong> is my favourite song',
            scope: $scope,
            buttons: {
                sayBoo: {
                    text: 'Say Booo',
                    btnClass: 'btn-blue',
                    action: function(scope, button) {
                        scope.name = 'Booo!!';
                        return false; // prevent close;
                    }
                },
                somethingElse: {
                    text: 'Something else',
                    btnClass: 'btn-orange',
                    action: function(scope, button) {
                        $ngConfirm('You clicked on something else');
                    }
                },
                close: function(scope, button) {
                    // closes the modal
                },
            }
        });
    };

});