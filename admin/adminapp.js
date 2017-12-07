$("#sidebar-nav a").on("click", function() {
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
});

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http, $filter, $sce) {

});