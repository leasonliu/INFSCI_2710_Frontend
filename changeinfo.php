<?php
include('header.php');
?>

  <main role="main" class="container">

    <div class="row" style="margin-top: 15px;">
      <div class="col-12 col-md-8"></div>
      <div class="col-6 col-md-4">
        <div class="alert alert-danger fade show" role="alert" style="display: none">
          <span id="alertmsg">Change info failed!</span>
        </div>
      </div>
    </div>

    <div ng-hide="!my_info" class="row">
      <div class="mx-auto card mb-3">
        <div class="card-header bg-light text-dark">
          Change your info here, {{my_info.userID}}!
        </div>
        <div class="card-body">
          <h4 class="card-title pb-3">Avatar is ignored if not selected</h4>
          <form id="change-info" method="post" novalidate>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Firstname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="new_fn" value="{{my_info.firstname}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Lastname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="new_ln" value="{{my_info.lastname}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nickname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="new_nickname" value="{{my_info.nickname}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">E-Mail</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="new_email" value="{{my_info.email}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="password" id="new_password" class="form-control" placeholder="Leave blank if not changing">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Repeat It</label>
              <div class="col-sm-8">
                <input type="password" id="new_password_rep" class="form-control" placeholder="Leave blank if not changing">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Avatar</label>
              <div class="col-sm-8">
                <label class="custom-file">
                  <input type="file" id="avatar" class="custom-file-input">
                  <span class="custom-file-control" id="file-name"></span>
                </label>
              </div>
            </div>
            <button class="btn btn-secendary btn-block" onclick="history.back()">Cancel</button>
            <button type="submit" class="btn btn-info btn-block" id="btn-changeinfo">Change!</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script src="./js/change_info.js"></script>
  <?php
include('footer.php');
?>