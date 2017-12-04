"use strict";

var serverPrefix = 'http://127.0.0.1:8888';
var app = angular.module('myApp', []);
var alertObj = $('.alert');

// Disabling form submissions if there are invalid fields
function set_up_vaild() {
    window.addEventListener('load', function() {
        var form = document.getElementById('signup');
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
    var alertObj = $('.alert');
    alertObj.stop().fadeTo('slow', 1);
    setTimeout(function() {
        alertObj.stop().fadeTo('slow', 0, function() {
            alertObj.hide();
        });
    }, 2500);
}

app.controller('myCtrl', function($scope, $http, $filter, $sce) {

    $('#signup').submit(function(e) {
        alertObj.hide();
        $('#btn-signup').addClass('disabled');
        e.preventDefault();

        var uid = $('#inputUid').val();
        var pass1 = $('#input_pw1').val();
        var pass2 = $('#input_pw2').val();
        var dob = $('#inputDoB').val();
        var f_name = $('#inputFN').val();
        var l_name = $('#inputLN').val();
        var nickname = $('#inputNick').val();
        var email = $('#inputEM').val();

        // Valid on password
        if (pass1 !== pass2) {
            showErrMsg('Password does not match!');
            return;
        }

        // Valid on DoB
        var trueDob = moment(dob, 'M/D/YYYY', true);
        if (trueDob.isValid() === false) {
            showErrMsg('DoB wrong format!');
            $('#inputDoB').focus();
            return;
        } else if (moment(new Date()).isBefore(trueDob)) {
            showErrMsg('DoB cannot in the furture!');
            $('#inputDoB').focus();
            return;
        }

        // Check gender
        var gender = 'unspecified';
        if ($('#in_male').is(":checked")) {
            gender = 'male';
        } else if ($('#in_female').is(":checked")) {
            gender = 'female';
        }

        // Send request to server
        $.ajax({
            url: serverPrefix + '/regist',
            data: '...',
            type: 'POST',

            success: function(data) {
                var e = data;
                console.log(e);
                if (e.status == 200) {
                    // Good reg
                    // window.location = "login.html";
                    $('#regSuccess').modal('show');
                } else if (e.status == 404) {
                    showErrMsg('???');
                } else if (e.status == 403) {
                    showErrMsg('???');
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