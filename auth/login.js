"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';
var alertObj = $('.alert');

// Disabling form submissions if there are invalid fields
function set_up_vaild() {
    window.addEventListener('load', function() {
        var form = document.getElementById('login');
        document.getElementById('btn-login').addEventListener('click', function(event) {
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

$("#login").submit(function(e) {
    alertObj.hide();
    e.preventDefault();

    var uid = $('#inputUid').val();
    var pass = $('#inputPwd').val();

    if (uid.indexOf('.') !== -1) {
        showErrMsg('Invalid username!');
        return;
    }

    // Send request to server
    $.ajax({
        url: serverPrefix + '/login',
        data: 'userID=' + uid + '&password=' + pass,
        type: 'POST',

        success: function(data) {
            var eee = data;
            if (eee.status == 200) {
                var user = JSON.parse(eee.data)[0];

                // Tmp solution: local state manage
                $.ajax({
                    url: localPrefix + '/helper/tmp_session.php',
                    type: 'POST',
                    data: 'login_status=20098&is_admin=' + user.is_admin +
                        '&uid=' + user.userID + '&nick=' + user.nickname +
                        '&fn=' + user.firstname + '&ln=' + user.lastname +
                        '&s=' + user.gender + '&m=' + user.email +
                        '&w=' + user.whatsup + '&dob=' + user.DOB,

                    success: function(data) {
                        if (data == 'GOOD')
                            window.location = "/index.php";
                        else
                            showErrMsg('');
                    },

                    error: function(error) {
                        showErrMsg('');
                        console.log(error);
                    },

                });

            } else if (eee.status == 404) {
                showErrMsg('Wrong UID or password.');
            } else if (eee.status == 403) {
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