<?php
//include "funcpelanggan.php";
require_once "funcpel.php";
ceklogin();
require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  switch ($_GET['action']){
   case "add":
   $nama_pelgn = $_REQUEST['id_pelgn'];
   $paket =  $_REQUEST['paket'];
   $berat =  $_REQUEST['berat'];
   $total_harga= $_REQUEST['total_harga'];

   $sql = "insert into pemesanan (id_pelgn,id_paket,berat,total_harga) values('$nama_pelgn','$paket','$berat','$total_harga')";

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
