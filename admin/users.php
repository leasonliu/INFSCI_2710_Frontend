<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Users</h1>

    <div ng-if="!all_users" class="alert alert-primary text-center" role="alert">Loading data...</div>
    <div ng-show="all_users" class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">UID</th>
            <th scope="col">Nickname</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Created Time</th>
            <th scope="col">Last Login</th>
            <th scope="col">User Operation</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="i in all_users">
              <th scope="row">{{$index +1}}</th>
              <td>{{ i.userID }}</td>
              <td>{{ i.nickname }}</td>
              <td>{{ i.email }}</td>
              <td>{{ i.created_at }}</td>
              <td>{{!i.updated_at ? 'Never' : i.updated_at }}</td>
              <td>
                <button ng-if="i.is_active == '0'" ng-click="restoreUser(i.userID)" type="button" class="btn btn-outline-success btn-block">Recover</button>
                <button ng-if="i.is_active != '0'" ng-click="inactiveUser(i.userID)" type="button" class="btn btn-outline-danger btn-block">Block</button>
              </td>
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