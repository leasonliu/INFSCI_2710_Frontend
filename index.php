<?php
include('header.php');
?>

  <div ng-if="!my_info" class="alert alert-primary text-center" role="alert">Loading PittMoments app...</div>
  <main role="main" class="container">
    <div class="row">
      <div class="col-2"></div>

      <!-- Left main feeds -->
      <div class="col-7 clearfix mt-3">

        <!-- Change with correct grid/laout and ng-repeat -->
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="http://sci.pitt.edu/wp-content/uploads/2015/10/Pelechrinis-_-Homepage.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Pitt SCI!</p>
          </div>
        </div>

      </div>
      <!-- Left main feeds end -->

      <!-- Right info/post -->
      <div class="col-3">
        <div class="row mt-3 ml-auto">
          <div class='card card-profile text-center'>
            <div class='card-img-top <?php if($_SESSION["gender"]==1) echo('bg-danger'); else echo('bg-dark'); ?>'></div>
            <div class='card-block'>
              <img alt='User avatar' class='card-img-profile' src='<?php echo(SERVER_PREFIX); ?>{{ my_info.avatar }}'>
              <h4 class='card-title'>{{ my_info.firstname + ' ' + my_info.lastname }}
                <small>{{ my_info.whatsup }}</br></br>E-Mail: {{my_info.email}}</br>DOB: {{my_info.DOB.substring(0,10)}}</small>
              </h4>
              <div class='card-links'>
                <a role="button" class="btn btn-outline-success btn-block" href="./post.php">Post</a>
                <a role="button" class="btn btn-outline-primary btn-block" href="./changeinfo.php">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right info/post end -->

    </div>
  </main>

  <?php
include('footer.php');
?>