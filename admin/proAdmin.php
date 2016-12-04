<?php
/* @var $que pdo */
/* @var $conn pdo */
 include "funcadmin.php";
 require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
   //jika terdapat action sesuai dengan link
   switch ($_GET['action']){
    case "add":
    //inisiasi variabel sesuai data yang dikirim
      $nama_admin = $_REQUEST['nama'];
      $no_hp      = $_REQUEST['no_hp'];
      $password   = $_REQUEST['password'];
      // query untuk menambahkan
      $sql  = "insert into admin (nama_admin,no_hp_admin,password) values ('$nama_admin','$no_hp','$alamat','$password')"
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
