<?php
include('helper/config.php');
include('helper/auth.php');
is_logged_in();
?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pitt-Moments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="./vendor/angular-confirm.min.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
  </head>

  <body ng-app="pmApp" ng-controller="pmIndex">

    <header>
      <nav id="home-nav" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">PittMoments</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <span class="navbar-text">
              Hi <?php echo($_SESSION['nickname']); ?>!
            </span>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/post.php">Post New</a>
            </li>
            <?php if($_SESSION['role']==1) {?>
            <li class="nav-item">
              <a class="nav-link" href="/admin/dashboard.php">Dashboard</a>
            </li>
            <?php } ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/changeinfo.php">Alter Info</a>
                <a class="dropdown-item" ng-click="logoutCheck()">Logout</a>
              </div>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" id="search-people">
            <input class="form-control mr-sm-2" type="text" placeholder="Search someone..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
