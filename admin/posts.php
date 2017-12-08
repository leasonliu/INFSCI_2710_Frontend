<?php
include('./header.php');
include('./leftmenu.php');
?>

  <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Manage Posts</h1>

    <div ng-if="!all_posts" class="alert alert-primary text-center" role="alert">Loading data...</div>
    <div ng-show="all_posts" class="table-responsive">
      <table class="table table-striped table-hover">
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
            <th scope="row">{{$index + 1}}</th>
            <td>{{ i.pid }}</td>
            <td>{{ i.userID }}</td>
            <td><a href="<?php echo SERVER_PREFIX; ?>{{ i.pic_id }}" target=_blank>View...</a></td>
            <td style="max-width: 10%">{{ i.contents.length>40 ? i.contents.substring(0,40)+'...' : i.contents }}</td>
            <td>{{ i.timestamp }}</td>
            <td>
            <button ng-click="deletePost(i.pid)" type="button" class="btn btn-danger btn-block">Delete</button>
            </td>
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