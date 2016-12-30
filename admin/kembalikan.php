<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

$id = $_GET['id'];
$sql = " SELECT * FROM pemesanan WHERE id_pemesanan = $id";
$stmt=getOne($sql,$conn);

if(isset($_GET['balik'])){
$sqlbalik = "update pemesanan set status = 1,status_bayar = 1 where id_pemesanan = $id";
$que = $conn->prepare($sqlbalik);

if($que->execute()){
  header('location:pemesanan.php');
}else{
  $que->errorInfo();
}

}else if(isset($_GET['selesai'])){
  $sqlselesai = "update pemesanan set status_cucian = 1 where id_pemesanan = $id";
  $que = $conn->prepare($sqlselesai);

  if($que->execute()){
    header('location:pemesanan.php');
  }else{
    $que->errorInfo();
  }
}

 ?>
