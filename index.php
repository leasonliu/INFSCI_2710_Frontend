<?php
include('header.php');
?>

  <main role="main" class="container-fluid">
    <div class="row">
      <div class="col-3"></div>

      <!-- Left main feeds -->
      <div class="col-6 mt-3">

        <div ng-if="!viewable_posts" class="alert alert-primary text-center" role="alert">Loading feeds data...</div>
        <!-- Change with correct grid/laout and ng-repeat -->
        <div ng-show="viewable_posts" class="form-group" ng-repeat="i in viewable_posts">
          <div class="moment-card moment-card-inverse moment-card-info">
            <div class="text-center">
              <img class="moment-card-img-top" src="<?php echo SERVER_PREFIX ?>{{ i.pic_id }}">
            </div>
            <div class="moment-card-block">
              <figure class="moment-profile moment-profile-inline">
                  <img src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif" class="moment-profile-avatar" alt="">
              </figure>
              <h4 class="moment-card-title">{{ i.userID }}</h4>
              <div class="moment-card-text">{{ i.contents }}</div>
            </div>
            <div class="moment-card-footer">
              <small>Post on: {{ i.timestamp }}</small>
              <button id="post-button-like" class="btn btn-danger float-right btn-sm">Like</button>
            </div>
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
              <img alt='User avatar' height="150px" width="150px" class='card-img-profile img-fluid' src='<?php echo(SERVER_PREFIX); ?>{{ my_info.avatar }}'>
              <h4 class='card-title'>{{ my_info.firstname + ' ' + my_info.lastname }}
              <form class='whats-up' id="form-new-whatsup">
                <input type="text" class="form-control-plaintext" id="whatsup-text" style="text-align: center;" value="{{ my_info.whatsup }}">
              </form>
                <small></br>E-Mail: {{my_info.email}}</br>DOB: {{my_info.DOB.substring(0,10)}}</small>
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