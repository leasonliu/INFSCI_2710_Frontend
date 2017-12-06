<?php
include('header.php');
?>

  <div class="container">

    <div class="row">
      <div class="mx-auto card">
        <div class="card-header bg-primary text-light">
          Post something
        </div>
        <div class="card-body">
          <h4 class="card-title">Show your moments here!</h4>
          <form id="new-post" action="<?php echo(SERVER_PREFIX . '/post'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="custom-file">
                <input type="file" id="pic_id" class="custom-file-input" onchange="document.getElementById('file-name').innerHTML=this.files[0].name">
                <span class="custom-file-control" id="file-name"></span>
              </label>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="contents" rows="2" placeholder="What's your thoughs?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post!</button>
          </form>
        </div>
      </div>
    </div>

  </div>

  <script src="./js/post.js"></script>

  <?php
include('footer.php');
?>