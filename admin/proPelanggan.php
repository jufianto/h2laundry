
<?php
include "funcpelanggan.php";
require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  //jika terdapat action sesuai dengan link
  switch ($_GET['action']){
   case "add":
   //inisiasi variabel sesuai data yang dikirim
     $nama       = $_REQUEST['nama'];
     $username   = $_REQUEST['username'];
     $password   = $_REQUEST['password'];
     $alamat     = $_REQUEST['alamat'];
     $no_hp      = $_REQUEST['no_hp '];
     $status     = 0;
     // query untuk menambahkan
     $sql  = "insert into pelanggan (username,pass_pelgn,nama_pelgn,no_hp_pelgn,alamat_plgn,status) values ('$username','$password','$nama','$no_hp','$alamat','$status')";
     //execute query
     $que = $conn->prepare($sql);
     if(($que->execute()))
        {
           //echo "suskses";
           header('location:pelanggan.php?act=add');
        }else{
           $que->errorInfo();
       }
       break;
     }
   }


?>
