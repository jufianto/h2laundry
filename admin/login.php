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
  $_SESSION['username'] = $obj->username;
  header('Location:index.php');
} else {
  header('Location:login.php');
}
}
 ?>

<?php include '../header.php';?>
<style type="text/css">
body{
background: url('img/background1.jpg') no-repeat scroll;
background-size: 100% 100%;
min-height: 700px;
}
</style>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog"><br/><br/><br/>
  <div class="modal-content">
      <div class="modal-header">
				<center><h2>Login Admin</h2></center>
          <div class="logo " align="center"><img src="../img/logo-small.png"></div>
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
	<?php include "../footer.php"; ?>
