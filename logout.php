<?php
session_name('h2laundry');
session_start();
session_destroy();
header('Location:admin/index.php');
 ?>
