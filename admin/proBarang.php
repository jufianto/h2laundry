
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
     $nama_barang   = $_REQUEST['nama_barang'];
     $merk_barang   = $_REQUEST['merk_barang'];
     $stok          = $_REQUEST['stok'];
     $total_harga   = $_REQUEST['total_harga'];
     // query untuk menambahkan
     $sql  = "insert into barang (nama_barang,merk_barang,stok,total_harga) values ('$nama_barang','$merk_barang','$stok','$total_harga')";
     //execute query
     $que = $conn->prepare($sql);
     if(($que->execute()))
        {
           //echo "suskses";
           header('location:barang.php?act=add');
        }else{
           $que->errorInfo();
       }
       break;

    case "update":
    //inisiasi variabel sesuai data yang dikirim
      $id_barang     = $_REQUEST['id_barang'];
      $nama_barang   = $_REQUEST['nama_barang'];
      $merk_barang   = $_REQUEST['merk_barang'];
      $stok          = $_REQUEST['stok'];
      $total_harga   = $_REQUEST['total_harga'];
      // query untuk menambahkan
        $sql  = "update barang set nama_barang = '$nama_barang',merk_barang ='$merk_barang' ,stok = '$stok',total_harga = '$total_harga' where id_barang = '$id_barang'";

      //execute query
      $que = $conn->prepare($sql);
      if(($que->execute()))
         {
            //echo "suskses";
            header('location:barang.php?act=update');
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
                $sql="DELETE FROM barang WHERE id_barang='".$_GET['id']."'";
                $que = $conn->prepare($sql);

                if($que->execute())
                {
                    header("Location:barang.php?act=del");

                }
                else
                {
                    echo "kesalahan query";
                }
            }

 }


?>
