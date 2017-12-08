<?php
include('header.php');
?>

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
        <div class="row mt-3">
          <div class='card card-profile text-center'>
            <img alt='' class='card-img-top' src='https://unsplash.it/340/160?image=354'>
            <div class='card-block'>
              <img alt='User avatar' class='card-img-profile' src='<?php echo(SERVER_PREFIX . $_SESSION["avatar"]); ?>'>
              <h4 class='card-title'><?php echo($_SESSION["firstname"] . ' ' . $_SESSION["lastname"]); ?>
                <small><?php echo $_SESSION["whatsup"]; ?></small>
              </h4>
              <div class='card-links'>
                <a class='fa fa-dribbble' href='#'></a>
                <a class='fa fa-twitter' href='#'></a>
                <a class='fa fa-facebook' href='#'></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <button type="button" class="btn btn-outline-primary">Primary</button>
        </div>
      </div>
      <!-- Right info/post end -->

    </div>
  </main>

  <?php
include('footer.php');
?>