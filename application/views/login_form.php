<div class="row justify-content-center">
<div class="w-75 p-3" style="background-color: #eee;">
<?php

if($this->session->flashdata('error_login'))
echo '<div class="alert alert-danger">'.$this->session->flashdata('error_login').'</div>';

?>
<div class="card">
<div class="card-header">LOGIN</div>
<div class="card-body">
<form method="post" action="/admin/login_process">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    <small id="emailHelp" class="form-text text-muted">Masukkan username.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>-->
  <input name="submit" value="Masuk" type="submit" class="btn btn-primary">
</form>

</div></div>
</div>