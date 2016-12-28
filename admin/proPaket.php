
<?php
//include "funcpelanggan.php";
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  //jika terdapat action sesuai dengan link
  switch ($_GET['action']){
   case "add":
   //inisiasi variabel sesuai data yang dikirim
     $nama_paket   = $_REQUEST['nama_paket'];
     $harga_paket   = $_REQUEST['harga_paket'];
     // query untuk menambahkan
     $sql  = "insert into paket (paket,harga) values ('$nama_paket','$harga_paket')";
     //execute query
     $que = $conn->prepare($sql);
     if(($que->execute()))
        {
           //echo "suskses";
           header('location:paket.php?act=add');
        }else{
           $que->errorInfo();
       }
       break;

    case "update":
    //inisiasi variabel sesuai data yang dikirim
    $id_paket = $_REQUEST['id_paket'];
    $nama_paket   = $_REQUEST['nama_paket'];
    $harga_paket   = $_REQUEST['harga_paket'];
      // query untuk menambahkan
        $sql  = "update paket set paket = '$nama_paket',harga ='$harga_paket' where id_paket = '$id_paket'";

      //execute query
      $que = $conn->prepare($sql);
      if(($que->execute()))
         {
            //echo "suskses";
            header('location:paket.php?act=update');
            // print_r($que);
         }else{
            $que->errorInfo();
        }
        break;


     }
   }else if($_SERVER['REQUEST_METHOD'] === 'GET')
 {
         if(isset($_GET["action"]) && isset($_GET["id"]))
            {
                $sql="DELETE FROM paket WHERE id_paket='".$_GET['id']."'";
                $que = $conn->prepare($sql);

                if($que->execute())
                {
                    header("Location:paket.php?act=del");

                }
                else
                {
                    echo "kesalahan query";
                }
            }

 }


?>
