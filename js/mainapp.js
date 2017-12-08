"use strict";

// Prefix for easier debug
var serverPrefix = 'http://127.0.0.1:8000';
var localPrefix = 'http://127.0.0.1:8888';

var uid = document.getElementById('_userID').innerHTML;

var postConfig = {
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
};

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
        }, defaultErrHandle);

    var buttonToLike = function(bL) {
        bL.addClass('disabled');
        bL.html('Liked!');
    };

    var buttonToUnlike = function(bL) {
        bL.removeClass('disabled');
        bL.html('Like');
    };

    // Like button login
    $scope.buttonLikeDislike = function(id, pid) {
        var bL = $('#post-button-like-' + id);
        if (bL.hasClass('disabled')) {
            $http.post(serverPrefix + '/like/cancel', "userID=" + uid + "&pid=" + pid, postConfig)
                .then(function(response) {
                    if (response.data.status == 200) {
                        buttonToUnlike(bL);
                    }
                }, defaultErrHandle);
        } else {
            $http.post(serverPrefix + '/like/', "userID=" + uid + "&pid=" + pid, postConfig)
                .then(function(response) {
                    if (response.data.status == 200) {
                        buttonToLike(bL);
                    }
                }, defaultErrHandle);
        }
    };

    // Report a post, ee_user is targeted
    $scope.reportPost = function(pid, ee_user) {
        $ngConfirm({
            title: 'Report a post',
            contentUrl: 'report_form.html',
            buttons: {
                cancel: function() {},
                confirm: {
                    text: 'Confirm report',
                    disabled: true,
                    btnClass: 'btn-danger',
                    action: function(scope) {
                        $http.post(serverPrefix + '/reportPosts/',
                                'er_userID=' + uid + '&ee_userID=' + ee_user +
                                '&pid=' + pid + '&reasons=' + scope.username, postConfig)
                            .then(function(response) {
                                if (response.data.status == 200) {
                                    $ngConfirm('Reported successfully!');
                                }
                            }, defaultErrHandle);
                    }
                }
            },
            onScopeReady: function(scope) {
                var self = this;
                scope.textChange = function() {
                    if (scope.username)
                        self.buttons.confirm.setDisabled(false);
                    else
                        self.buttons.confirm.setDisabled(true);
                }
            }
        });
    };

    // Logout confirm
    $scope.logoutCheck = function() {
        $ngConfirm({
            animationBounce: 2,
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

    $('#form-alter-whatsup').submit(function(e) {
        var wu = $('#whatsup-text').val();

        $.ajax({
            url: serverPrefix + '/my/whatsup',
            data: 'userID=' + uid + '&whatsup=' + wu,
            type: 'POST',

            success: function(data) {
                if (data.status == '200') {
                    $ngConfirm({
                        backgroundDismiss: true,
                        title: 'Update success!',
                        content: 'You what\'s up has been updated successfully',
                        type: 'green',
                        autoClose: 'close|2000',
                        buttons: {
                            close: function() {}
                        }
                    });
                } else {
                    $ngConfirm({
                        title: 'Update failed',
                        content: 'Fail to update your what\'s up :(',
                        type: 'red',
                        autoClose: 'close|2000',
                        buttons: {
                            close: function() {}
                        }
                    });
                }
            },

            error: function(err) {
                $ngConfirm({
                    title: 'Update failed',
                    content: 'Fail to update your what\'s up :(',
                    type: 'red',
                    autoClose: 'close|2000',
                    buttons: {
                        close: function() {}
                    }
                });
                console.log(err);
            },
        });

    });

});