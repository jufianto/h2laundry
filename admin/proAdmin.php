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
    case "update":
    //inisiasi variabel sesuai data yang dikirim
      $id_admin   = $_REQUEST['id_admin'];
      $nama_admin = $_REQUEST['nama_admin'];
      $no_hp_admin      = $_REQUEST['no_hp_admin'];
      $password   = $_REQUEST['password'];
      // query untuk menambahkan

      if(isset($_POST["password"])){
        $password   = md5($_REQUEST['password']);
        $sql  = "update admin set nama_admin = '$nama_admin',password ='$password' ,no_hp_admin ='$no_hp_admin' where id_admin = '$id_admin'";
      }else{
        $sql  = "update admin set nama_admin = '$nama_admin' ,no_hp_admin ='$no_hp_admin' where id_admin = '$id_admin'";
      }


      //execute query
      $que = $conn->prepare($sql);
      if(($que->execute()))
         {
            //echo "suskses";
            header('location:admin.php?act=update');
         }else{
            $que->errorInfo();
        }
        break;
      }
    }
