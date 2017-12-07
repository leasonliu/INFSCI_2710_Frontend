<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Posts</h1>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>PID</th>
            <th>UID</th>
            <th>Picture</th>
            <th>Contents</th>
            <th>Post time</th>
            <th>Delete?</th>
          </tr>
        </thead>
        <tbody>
          <!-- TODO: ng-repeat and Backend API -->
          <tr>
            <td>1</td>
            <td>Idiot</td>
            <td>tony@dreamprc.com</td>
            <td>Fuck all these</td>
            <td>2017/12/06 21</td>
            <td>1</td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>

  <script>
    document.getElementById('nav-p').classList.add('active');
  </script>

  <?php
include('./footer.php');
?>