<?php
include('header.php');

?>

  <div class="container">
    <div class="row">

      <form action="<?php echo(SERVER_PREFIX . '/post'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="file" class="form-control-file" id="pic_id">
        </div>
        <div class="form-group">
          <textarea class="form-control" id="contents" rows="2" placeholder="Say something?"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post!</button>
      </form>

    </div>
  </div>

  <?php
include('footer.php');
?>