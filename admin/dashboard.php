<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Overview</h1>

    <div ng-if="!dash_stat" class="alert alert-primary text-center" role="alert">Loading data...</div>
    <section ng-show="dash_stat" class="row text-center placeholders">

      <div class="col-6 col-sm-3 placeholder">
        <div class="progress">
          <div class="progress-value bg-primary">{{dash_stat[0].users}}</div>
        </div>
        <h4>Total users</h4>
      </div>

      <div class="col-6 col-sm-3 placeholder">
        <div class="progress">
          <div class="progress-value">{{dash_stat[1].blockedusers}}</div>
        </div>
        <h4>Blocked users</h4>
      </div>

      <div class="col-6 col-sm-3 placeholder">
        <div class="progress">
          <div class="progress-value bg-info">{{dash_stat[2].posts}}</div>
        </div>
        <h4>Total posts</h4>
      </div>

      <div class="col-6 col-sm-3 placeholder">
        <div class="progress">
          <div class="progress-value bg-danger">{{dash_stat[3].reports}}</div>
        </div>
        <h4>Total reports</h4>
      </div>

    </section>

    <div class="alert alert-secondary" role="alert">
      This page will display some basic information related to the website!
    </div>

  </main>

  <!-- Match leftmenu.php -->
  </div>
  </div>

  <script>
    document.getElementById('nav-home').classList.add('active');
  </script>

  <?php
include('./footer.php');
?>