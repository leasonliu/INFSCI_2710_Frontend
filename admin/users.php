<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Users</h1>

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>UID</th>
            <th>Nickname</th>
            <th>E-Mail</th>
            <th>Created Time</th>
            <th>Last Login</th>
            <th>Delete User?</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="i in all_users">
              <td>{{ i.userID }}</td>
              <td>{{ i.nickname }}</td>
              <td>{{ i.email }}</td>
              <td>{{ i.created_at }}</td>
              <td>{{!i.updated_at ? 'Never' : i.updated_at }}</td>
              <td>1</td>
          </tr>
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