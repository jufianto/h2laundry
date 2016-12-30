<?php
if(isset($_POST['login'])){
  session_name('h2laundry');
  session_start();
  require_once '../config.php';
  $username = $_REQUEST['username'];
  $password= md5($_REQUEST['password']);
  $sql = "select * from admin where nama_admin='$username' && password='$password'";
  $stmt = $conn->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt->execute();
  $obj = $stmt->fetch();
  if ($obj) {
  $_SESSION['username'] = $obj->nama_admin;
  header('Location:index.php');
} else {
  header('Location:login.php?failed');
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>H2 Laundry</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/img.css" rel="stylesheet">
  </head>
  <body>
<style type="text/css">
body{
background: url('img/background1.jpg') no-repeat scroll;
background-size: 100% 100%;
min-height: 700px;
}
</style>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog"><br/>
  <div class="modal-content">
      <div class="modal-header">

        <?php if(isset($_GET['failed'])) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <i class="fa fa-info-circle"></i>  <strong>GAGAL</strong> Username atau Password Salah
                </div>
            </div>
        </div>
        <?php } ?>


				<center><h2>Login Admin</h2></center>
          <div class="logo " align="center"><img src="../img/logoxx.png" width="150" height="150"></div>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" id="email" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" id="password" name="password" >
            </div>

            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Sign In</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
		  </div>
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>

</html>
