"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8888';
var app = angular.module('myApp', []);
var alertObj = $('.alert');

// Disabling form submissions if there are invalid fields
function set_up_vaild() {
    window.addEventListener('load', function() {
        var form = document.getElementById('login');
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    }, false);
}

set_up_vaild();

function showErrMsg(msg) {
    if (msg == '') {} else {
        $('#alertmsg').html(msg);
    }
    alertObj.stop().fadeTo('slow', 1);
    setTimeout(function() {
        alertObj.stop().fadeTo('slow', 0, function() {
            alertObj.hide();
        });
    }, 2500);
}

app.controller('myLogin', function($scope, $http, $filter, $sce) {

    $("#login").submit(function(e) {
        alertObj.hide();
        $('#btn-login').addClass('disabled');
        e.preventDefault();

        var uid = $('#inputUid').val();
        var pass = $('#inputPwd').val();

        // Send request to server
        $.ajax({
            url: serverPrefix + '/login',
            data: 'userID=' + uid + '&password=' + pass,
            type: 'POST',

            success: function(data) {
                var e = data;
                console.log(e);
                if (e.status == 200) {
                    // Good login
                    window.location = "index.php";
                } else if (e.status == 404) {
                    showErrMsg('Wrong UID or password.');
                } else if (e.status == 403) {
                    showErrMsg('Your account is blocked.');
                } else {
                    showErrMsg('');
                }
            },

            error: function(error) {
                $('#btn-login').removeClass('disabled');
                showErrMsg('');
                console.log(error);
            },

        });

    });

});