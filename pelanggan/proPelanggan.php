
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
     $nama       = $_REQUEST['nama'];
     $username   = $_REQUEST['username'];
     $password   = md5($_REQUEST['password']);
     $alamat     = $_REQUEST['alamat'];
     $no_hp      = $_REQUEST['no_hp'];
     $status     = 0;
     // query untuk menambahkan
     $sql  = "insert into pelanggan (username,pass_pelgn,nama_pelgn,no_hp_pelgn,almt_pelgn,status) values ('$username','$password','$nama','$no_hp','$alamat','$status')";
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

    case "update":
    //inisiasi variabel sesuai data yang dikirim
      $id         = $_REQUEST['id'];
      $nama       = $_REQUEST['nama'];
      $username   = $_REQUEST['username'];
      $alamat     = $_REQUEST['alamat'];
      $no_hp      = $_REQUEST['no_hp'];
      // query untuk menambahkan
      if(isset($_POST["password"])){
        $password   = md5($_REQUEST['password']);
        $sql  = "update pelanggan set username = '$username',pass_pelgn ='$password' ,nama_pelgn ='$nama' ,no_hp_pelgn ='$no_hp',almt_pelgn = '$alamat' where id_pelgn = '$id'";
      }else{
        $sql  = "update pelanggan set username = '$username',nama_pelgn ='$nama' ,no_hp_pelgn = '$no_hp',almt_pelgn = '$alamat' where id_pelgn = '$id'";
      }
      //execute query
      $que = $conn->prepare($sql);
      if(($que->execute()))
         {
            //echo "suskses";
            header('location:pelanggan.php?act=update');
         }else{
            $que->errorInfo();
        }
        break;


     }
   }else if($_SERVER['REQUEST_METHOD'] === 'GET')
 {
         if(isset($_GET["action"]) && isset($_GET["id"]))
            {
                $sql="DELETE FROM pelanggan WHERE id_pelgn='".$_GET['id']."'";
                $que = $conn->prepare($sql);

                if($que->execute())
                {
                    header("Location:pelanggan.php?act=del");

                }
                else
                {
                    echo "kesalahan query";
                }
            }

            if(isset($_GET['aktif']) && isset($_GET["id"])){
              $sql="UPDATE pelanggan SET status = '".$_GET['aktif']."' WHERE id_pelgn='".$_GET['id']."'";
              $que = $conn->prepare($sql);

              if($que->execute())
              {
                  header("Location:pelanggan.php");

              }
              else
              {
                  echo "kesalahan query";
              }
            }
 }


?>
