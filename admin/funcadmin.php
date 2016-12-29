<?php

function ceklogin()
{
	session_name('h2laundry');
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
}
}

function getData($sql,$conn)
{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$stmt = $stmt->fetchAll();
    return $stmt;
}

function getOne($sql,$conn){
	$que = $conn->prepare($sql);
	$que->execute();
	$que->setFetchMode(PDO::FETCH_OBJ);
	$stmt = $que->fetch();
	return $stmt;
}




?>
