<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

$id = $_GET['id'];
$sql = " SELECT * FROM pemesanan WHERE id_pemesanan = $id";
$stmt=getOne($sql,$conn);

if(isset($_GET['balik']) && $stmt->status_cucian == 1){
$sqlbalik = "insert into pengembalian(id_pemesanan,id_pelgn) values ('$stmt->id_pemesanan','$stmt->id_pelgn')";
$que = $conn->prepare($sqlbalik);

if($que->execute()){
  header('location:pemesanan.php');
}else{
  $que->errorInfo();
}

}

 ?>
