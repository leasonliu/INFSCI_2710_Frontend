<?php
include('../helper/auth.php');
header('Content-Type: application/javascript');
is_logged_in();
?>

// Variable to store your files
var serverPrefix = 'http://127.0.0.1:8000';

var pic;

var alertObj = $('.alert');

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
    if (event.target.files[0].size > 2000000) {
        showErrMsg('File too large!');
        document.getElementById('pic_id').value = '';
        return;
    }
    pic = event.target.files[0];
    var fN = pic.name;
    if (fN.length > 20) {
        fN = fN.substring(0, 20) + '...';
    }
    document.getElementById('file-name').innerHTML = fN;
}

window.addEventListener('load', function() {
    var form = document.getElementById('new-post');
    document.getElementById('btn-post').addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
}, false);

$("#new-post").submit(function(e) {
    e.preventDefault();

    var text = $('#contents').val();

    // Read pic as binary file
    var reader = new FileReader();
    reader.readAsBinaryString(pic);
    reader.onload = function() {

        var pic_base64 = window.btoa(reader.result);

        $.ajax({
            url: serverPrefix + '/post',
            type: 'POST',
            cache: false,
            data: 'filename=' + pic.name +
                '&contents=' + text +
                '&userID=' + '<?php echo($_SESSION["userid"]); ?>' +
                '&pic_id=' + encodeURIComponent(pic_base64),
            processData: false,

            success: function(data) {

            },

            error: function(err) {
                showErrMsg('');
                console.log(err);
            },

        });

    };
    reader.onerror = function(error) {
        showErrMsg('File encode failed');
    };

});