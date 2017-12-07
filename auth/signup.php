<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION["login"] == "ok") {
    header('location: /index.php');
}
?>

  <!doctype html>
  <html lang="en">

  <head>
    <title>Sign up an account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./signup.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">
      <div class="row" style="margin-top: 15px;">
        <div class="col-12 col-md-8"></div>
        <div class="col-6 col-md-4">
          <div class="alert alert-danger fade show" role="alert" style="display: none">
            <span id="alertmsg">Sign-up failed.</span>
          </div>
        </div>
      </div>
      <div class="card card-container">
        <p class="profile-name-card">Signup at PittMoments</p>
        <form class="form-signinup" id="signup" novalidate>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" id="inputUid" placeholder="User Name" required>
              <div class="invalid-feedback">
                Please provide a valid user id.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" id="inputFN" placeholder="First name" required>
              <div class="invalid-feedback">
                Please provide.
              </div>
            </div>
            <div class="col">
              <input type="text" class="form-control" id="inputLN" placeholder="Last name" required>
              <div class="invalid-feedback">
                Please provide.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="email" class="form-control" id="inputEM" required placeholder="Email address">
              <div class="invalid-feedback">
                Please provide your email.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" id="inputNick" required placeholder="Nickname">
              <div class="invalid-feedback">
                Please provide your nickname.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" id="inputDoB" required placeholder="DoB (MM/DD/YYYY)">
              <div class="invalid-feedback">
                Please provide your vaild DOB.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col" style="margin-top: 10px">
              <label class="custom-control custom-radio">
                <input id="in_male" name="radio" type="radio" class="custom-control-input" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Male</span>
              </label>
              <label class="custom-control custom-radio">
                <input id="in_female" name="radio" type="radio" class="custom-control-input" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Female</span>
              </label>
              <label class="custom-control custom-radio">
                <input id="in_no" name="radio" type="radio" class="custom-control-input" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Secret</span>
              </label>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="password" class="form-control" id="input_pw1" required placeholder="Password">
            </div>
            <div class="col">
              <input type="password" class="form-control" id="input_pw2" required placeholder="Repeat it">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <a href="./login.php" style="">Sign in</a>
            </div>
            <div class="form-group col-md-9">
              <button id="btn-signup" class="btn btn-lg btn-primary btn-block btn-signinup" type="submit">Finish sign up</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="regSuccess" tabindex="-1" role="dialog" aria-labelledby="regok" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="regok">Regisered Success!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            You have successfully registered an account at PittMoments!
          </div>
          <div class="modal-footer">
            <a href="./login.php" type="button" class="btn btn-primary" role="button">Goto Login</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!-- Below base scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js" integrity="sha256-/As5lS2upX/fOCO/h/5wzruGngVW3xPs3N8LN4FkA5Q=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="./signup.js"></script>

  </body>

  </html>