<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage User Reports</h1>

    <div ng-if="!all_reports" class="alert alert-primary text-center" role="alert">Loading data...</div>
    <div ng-show="all_reports" class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Reporter ID</th>
            <th scope="col">Reported ID</th>
            <th scope="col">Which Post</th>
            <th scope="col">Reason</th>
            <th scope="col">When</th>
            <!-- Report what to do? -->
          </tr>
        </thead>
        <tbody>
        <tr ng-repeat="i in all_reports">
            <th scope="row">{{$index +1}}</th>
            <td>{{ i.er_userID }}</td>
            <td>{{ i.ee_userID }}</td>
            <td>{{ i.pid }}</td>
            <td>{{ i.reasons }}</td>
            <td>{{ i.timestamp }}</td>
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