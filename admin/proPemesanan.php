<?php
//include "funcpelanggan.php";
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  switch ($_GET['action']){
   case "add":
   $nama_pelgn = $_REQUEST['id_pelgn'];
   $paket =  $_REQUEST['paket'];
   $status_bayar =  $_REQUEST['status_bayar'];
   $berat =  $_REQUEST['berat'];
   $total_harga= $_REQUEST['total_harga'];

   $sql = "insert into pemesanan (id_pelgn,id_paket,status_bayar,berat,total_harga) values('$nama_pelgn','$paket','$status_bayar','$berat','$total_harga')";

   $que = $conn->prepare($sql);
   if(($que->execute()))
      {
         //echo "suskses";
         header('location:pemesanan.php?act=add');
      }else{
         $que->errorInfo();
     }
     break;

}


}
