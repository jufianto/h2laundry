<?php
session_name('h2laundry');
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}
?>
