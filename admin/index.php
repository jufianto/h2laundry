<?php require "funcadmin.php";
	  //ceklogin();

	//require "../cklg.php";
session_name('h2laundry');
session_start();
 ?>
<h1>selamat datang</h1>
<?php echo $_SESSION['username']; echo "anjing"; ?>
<a href="../logout.php">Keluar</a>