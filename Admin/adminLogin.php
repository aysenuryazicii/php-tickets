<!DOCTYPE html>
<html>

<head>
  <title>Admin Paneli</title>
  <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>" media="screen">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<?php

echo '
<div class="admin-panel">
  <form method="post">
    <p>Admin Paneli</p>
    <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Email" required="required">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="pass" placeholder="Şifre" required="required">
    </div>
    <div class="form-group">
      <button type="submit" name="save" class="btnbtn-success btn-lg btn-block u-btnu-button-stylu-palette-2-base" style="background-color:#db545a; border-color: #db545a;">Giriş Yap</button>
    </div>
  </form>';

if (isset($_POST['save'])) {
  extract($_POST);
  if ($_POST['email'] == "admin@admin.com" && $_POST['pass'] == "admin") {
    header("Location: Admin.php");
  }
}

echo '
</div>';
