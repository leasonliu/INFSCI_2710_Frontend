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
            <th>Reporter ID</th>
            <th>Reported ID</th>
            <th>Which Post</th>
            <th>Reason</th>
            <th>When</th>
            <th>Process</th>
          </tr>
        </thead>
        <tbody>
          <!-- TODO: ng-repeat and Backend API -->
          <tr>
            <td>tony</td>
            <td>user1</td>
            <td>1</td>
            <td>Too many fucks</td>
            <td>2017/12/06 21</td>
            <td>1</td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>

  <script>
    document.getElementById('nav-r').classList.add('active');
  </script>

  <?php
include('./footer.php');
?>