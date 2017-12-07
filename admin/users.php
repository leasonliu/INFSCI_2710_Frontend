<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Users</h1>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
          </tr>
        </thead>
        <tbody>
          <!-- TODO: ng-repeat and Backend API -->
        </tbody>
      </table>
    </div>

  </main>

  <script>
    document.getElementById('nav-u').classList.add('active');
  </script>

  <?php
include('./footer.php');
?>