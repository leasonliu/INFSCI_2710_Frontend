<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Posts</h1>

    <div ng-if="!all_posts" class="alert alert-primary text-center" role="alert">Loading data...</div>
    <div ng-show="all_posts" class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">PID</th>
            <th scope="col">UID</th>
            <th scope="col">Picture</th>
            <th scope="col">Contents</th>
            <th scope="col">Post time</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="i in all_posts">
            <th scope="row">{{$index +1}}</th>
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