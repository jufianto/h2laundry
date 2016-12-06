<?php

function ceklogin()
{
	session_name('h2laundry');
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
}
}

function getData($sql)
{
    $stmt = $conn->prepare($sql);
    $stmt->excecute;
    print_r($stmt);
}


?>
