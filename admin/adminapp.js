"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

$("#sidebar-nav a").on("click", function() {
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http, $filter, $sce) {

    $scope.all_posts = "";
    $scope.all_users = "";
    $scope.all_reports = "";
    $scope.dash_stat = "";

    // Get all users
    $http.get(serverPrefix + '/admin/users')
        .then(function(response) {
            $scope.all_users = response.data.data;
        });

    // Get all posts
    $http.get(serverPrefix + '/admin/posts')
        .then(function(response) {
            $scope.all_posts = response.data.data;
        });

    // Get all reports
    $http.get(serverPrefix + '/admin/reports')
        .then(function(response) {
            $scope.all_reports = response.data.data;
        });

    // Get stats
    $http.get(serverPrefix + '/admin/')
        .then(function(response) {
            $scope.dash_stat = response.data.data;
        });

});