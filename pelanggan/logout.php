<?php
session_name('h2pelanggan');
session_start();
session_destroy();
header('Location:../index.php');
 ?>
