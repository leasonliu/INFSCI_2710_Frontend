"use strict";

var alertObj = $('.alert');

var avatar;

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

$('input[type=file]').on('change', prepareUpload);

function prepareUpload(event) {
    if (event.target.files[0].size > 500000) {
        showErrMsg('Avatar too large, should < 500KB!');
        document.getElementById('pic_id').value = '';
        return;
    }
    avatar = event.target.files[0];
    var fN = avatar.name;
    if (fN.length > 15) {
        fN = fN.substring(0, 15) + '...';
    }
    document.getElementById('file-name').innerHTML = fN;
}

window.addEventListener('load', function() {
    var form = document.getElementById('change-info');
    document.getElementById('btn-changeinfo').addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
}, false);

$("#change-info").submit(function(e) {
    e.preventDefault();
    $('#btn-changeinfo').addClass('disabled');

    var email = $('#new_email').val();
    var nick = $('#new_nickname').val();
    var fn = $('#new_fn').val();
    var ln = $('#new_ln').val();
    var p1 = $('#new_password').val();
    var p2 = $('#new_password_rep').val();

    var changePasswd = true;

    var sendInfo = function() {
        $.ajax({
            url: serverPrefix + '/my/info',
            type: 'POST',
            cache: false,
            data: 'userID=' + uid + '&nickname=' + nick +
                '&firstname=' + fn + '&lastname=' + ln +
                '&email=' + email + '&passwd=' + p1,

            success: function(data) {
                if (data.status == '200') {
                    window.location = './index.php';
                } else {
                    showErrMsg('Update person info failed.');
                    $('#btn-post').removeClass('disabled');
                    console.log(data);
                }
            },

            error: function(err) {
                showErrMsg('Upload avatar failed!');
                $('#btn-post').removeClass('disabled');
                console.log(err);
            },
        });
    };

    // Valid on password
    if (p1 !== p2) {
        showErrMsg('Password does not match!');
        $('#new_password').focus();
        return false;
    }
    if (p1 === '') changePasswd = false;

    if (avatar == null) {
        sendInfo();
        return true;
    }

    // Read avatar
    var reader = new FileReader();
    reader.readAsBinaryString(avatar);
    reader.onload = function() {
        var ava_base64 = window.btoa(reader.result);

        // First upload avatar
        $.ajax({
            url: serverPrefix + '/my/avatar',
            type: 'POST',
            cache: false,
            data: 'filename=' + avatar.name + '&userID=' + uid +
                '&avatar=' + encodeURIComponent(ava_base64),
            processData: false,

            success: function(data) {
                if (data.status == '200') {
                    // Then upload data
                    sendInfo();

                } else {
                    showErrMsg('');
                    $('#btn-post').removeClass('disabled');
                    console.log(data);
                }
            },

            error: function(err) {
                showErrMsg('Upload avatar failed!');
                $('#btn-post').removeClass('disabled');
                console.log(err);
            },
        });

    };
    reader.onerror = function(error) {
        showErrMsg('File encode failed');
        $('#btn-changeinfo').removeClass('disabled');
    };

});