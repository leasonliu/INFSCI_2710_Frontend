<?php
include('header.php');
?>

  <div class="container">

    <div class="row" style="margin-top: 15px;">
      <div class="col-12 col-md-8"></div>
      <div class="col-6 col-md-4">
        <div class="alert alert-danger fade show" role="alert" style="display: none">
          <span id="alertmsg">Post failed!</span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="mx-auto card">
        <div class="card-header bg-primary text-light">
          Post something
        </div>
        <div class="card-body">
          <h4 class="card-title">Show your moments!</h4>
          <form id="new-post" method="post" novalidate>
            <div class="form-group">
              <label class="custom-file">
                <input type="file" id="pic_id" class="custom-file-input" required>
                <span class="custom-file-control" id="file-name"></span>
              </label>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="contents" rows="3" required placeholder="What's your thoughs?"></textarea>
              <div class="invalid-feedback">
                You must write something...
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="btn-post">Post!</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postOkModal" tabindex="-1" role="dialog" aria-labelledby="postOkModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="postOkModalLabel">Post successfully!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Click 'Nice!' to go back to home page, or post a new moment!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a role="button" class="btn btn-primary" href="./index.php">Nice!</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->

  </div>

  <script src="./js/post_js.php"></script>

  <?php
include('footer.php');
?>