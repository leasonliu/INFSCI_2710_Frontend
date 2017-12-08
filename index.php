<?php
include('header.php');
?>

  <main role="main" class="container-fluid">
    <div class="row">
      <div class="col-3 mt-3">
        <div>It's a placeholder.<hr></br>Could be some ads or other info here in the further release...</div>
      </div>

      <!-- Left main feeds -->
      <div class="col-5 mt-3">

        <div ng-if="!viewable_posts" class="alert alert-primary text-center" role="alert">Loading feeds data...</div>
        <div ng-if="viewable_posts && viewable_posts.length==0" class="alert alert-secondary text-center" role="alert">Currently, there are no posts for you!</div>
        <!-- Change with correct grid/laout and ng-repeat -->
        <div ng-show="viewable_posts.length>0" class="form-group" ng-repeat="i in viewable_posts">
          <div class="moment-card moment-card-inverse moment-card-info">
            <div class="moment-card-block">
              <figure class="moment-profile moment-profile-inline">
                  <img src="<?php echo SERVER_PREFIX; ?>{{ i.avatar }}" class="moment-profile-avatar" alt="Post user avatar">
              </figure>
              <h4 class="moment-card-title">{{ i.nickname }}</h4>
              <div class="moment-card-text">
                <span class="text-muted">Thoughts:</span> {{ i.contents }}
                <button id="post-button-report" style="margin-top: -20px;" ng-click="reportPost(i.pid, i.userID)"
                  type="button" class="btn btn-outline-light text-secondary float-right btn-sm">Report</button>
              </div>
            </div>
            <div>
              <!-- Click to view post -->
              <a data-toggle="lightbox" data-title="Moment" data-footer="{{ i.contents }}" data-type="image" data-remote="<?php echo SERVER_PREFIX ?>{{ i.pic_id }}" href="#">
                <img class="moment-card-img-top" src="<?php echo SERVER_PREFIX ?>{{ i.pic_id }}" class="img-fluid">
              </a>
            </div>
            <div class="moment-card-footer">
              <small>Post on: {{ i.timestamp }}</small>
              <button ng-if="i.liked==0" id="post-button-like-{{$index}}" ng-click="buttonLikeDislike($index, i.pid)" class="btn btn-danger float-right btn-sm post-button-like">Like</button>
              <button ng-if="i.liked!=0" id="post-button-like-{{$index}}" ng-click="buttonLikeDislike($index, i.pid)" class="btn btn-danger float-right btn-sm post-button-like disabled">Liked!</button>
            </div>
          </div>
        </div>

      </div>
      <!-- Left main feeds end -->

      <div class="col-1"></div>

      <!-- Right info/post -->
      <div class="col-3">
        <div ng-if="!my_info" class="alert alert-secondary text-center" role="alert">Loading your information...</div>
        <div ng-show="my_info" class="row mt-3 mr-auto">
          <div class='card card-profile text-center'>
            <div class='card-img-top <?php if($_SESSION["gender"]==1) echo('bg-danger'); else echo('bg-dark'); ?>'></div>
            <div class='card-block'>
              <img alt='User avatar' height="150px" width="150px" class='card-img-profile img-fluid' src='<?php echo(SERVER_PREFIX); ?>{{ my_info.avatar }}'>
              <h4 class='card-title'>
                {{ my_info.firstname + ' ' + my_info.lastname }}
                <form class='whats-up' id="form-alter-whatsup">
                  <input type="text" class="form-control-plaintext" id="whatsup-text" style="text-align: center;" value="{{ my_info.whatsup }}">
                </form>
                <small></br>E-Mail: {{my_info.email}}</br>DOB: {{my_info.DOB.substring(0,10)}}</small>
              </h4>
              <div class='card-links'>
                <a role="button" class="btn btn-outline-success btn-block" href="./post.php">Post Moment</a>
                <a role="button" class="btn btn-outline-primary btn-block" href="./changeinfo.php">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right info/post end -->

    </div>
  </main>

  <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) { event.preventDefault(); $(this).ekkoLightbox();} );
  </script>

  <?php
include('footer.php');
?>