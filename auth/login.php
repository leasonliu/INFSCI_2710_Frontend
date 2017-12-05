<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION["login"] == "ok") {
    header('location: /index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login to PittMoments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./login.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
</head>

<body>

    <div class="container" ng-app="myApp" ng-controller="myLogin">
        <div class="row" style="margin-top: 15px;">
            <div class="col-12 col-md-8"></div>
            <div class="col-6 col-md-4">
                <div class="alert alert-danger fade show" role="alert" style="display: none">
                    <span id="alertmsg">Login failed.</span>
                </div>
            </div>
        </div>
        <div class="card card-container">
            <p class="profile-name-card">Log in to PittMoments</p>
            <form id="login" method="post" class="form-signinup" novalidate>
                <div class="form-row">
                    <input type="text" id="inputUid" class="form-control" placeholder="User Name" required autofocus>
                    <div class="invalid-feedback">
                        Please input your username.
                    </div>
                </div>
                <div class="form-row">
                    <input type="password" id="inputPwd" class="form-control" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Please input your password.
                    </div>
                </div>
                <div class="form-row">
                    <button id="btn-login" class="btn btn-lg btn-primary btn-block btn-signinup" type="submit">Sign in</button>
                </div>
            </form>
            <a href="./signup.php" class="sign-up">Click here to Sign-up</a>
        </div>
    </div>


    <script src="./login.js"></script>
    <!-- Below Bootstrap scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>