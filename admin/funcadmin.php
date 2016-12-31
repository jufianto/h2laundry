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

function sCuci($data){
	if ($data == 0){
		echo "Belum Selesai";
	}else{
		echo "Selesai";
	}
}

function sBayar($data){
	if($data == 0){
		echo "Belum Lunas";
	}else{
		echo "Lunas";
	}
}

function get_all_get()
{
        $output = "?"; 
        $firstRun = true;
        foreach($_GET as $key=>$val) {
        if($key != $parameter) {
            if(!$firstRun) {
                $output .= "&";
            } else {
                $firstRun = false;
            }
            $output .= $key."=".$val;
         }
    }

    return $output;
}




?>
