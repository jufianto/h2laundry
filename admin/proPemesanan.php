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
// print_r($sql);exit();
   $que = $conn->prepare($sql);
   if(($que->execute()))
      {
         //echo "suskses";
         header('location:pemesanan.php?act=add');
      }else{
         $que->errorInfo();
     }
     break;

     case "update":
     $id_pemesanan = $_REQUEST['id_pemesanan'];
     $paket =  $_REQUEST['paket'];
     $berat =  $_REQUEST['berat'];
     $total_harga= $_REQUEST['total_harga'];

     $sql = "update pemesanan set id_paket = '$paket' , berat = '$berat', total_harga = '$total_harga' where id_pemesanan = '$id_pemesanan'";

     $que = $conn->prepare($sql);
     if(($que->execute()))
        {
           //echo "suskses";
           header('location:pemesanan.php?act=update');
        }else{
           $que->errorInfo();
       }

}


}else if($_SERVER['REQUEST_METHOD'] === 'GET')
{
      if(isset($_GET["action"]) && isset($_GET["id"]))
         {
             $sql="DELETE FROM pemesanan WHERE id_pemesanan='".$_GET['id']."'";
             $que = $conn->prepare($sql);

             if($que->execute())
             {
                 header("Location:pemesanan.php?act=del");

             }
             else
             {
                 echo "kesalahan query";
             }
         }

}


?>
