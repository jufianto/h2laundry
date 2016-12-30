<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

include "../template/header.php";
include "../template/menu.php";
 ?>

 <?php
 $id = $_GET['id'];
$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
if ($cari == ""){
  $sql = " SELECT paket.paket,paket.harga,pelanggan.nama_pelgn,pemesanan.status_cucian,pemesanan.status_bayar,pemesanan.tgl_pemesanan,pemesanan.berat,pemesanan.total_harga,pemesanan.id_pemesanan FROM pemesanan INNER JOIN pelanggan on pemesanan.id_pelgn = pelanggan.id_pelgn INNER JOIN paket on pemesanan.id_paket = paket.id_paket where pemesanan.id_pemesanan = $id";
}else {
  # code...
  $sql = "select * from pemesanan where nama like '%$cari%'";
}

$q = getOne($sql,$conn);

  ?>
 <style type="text/css">
.container{
  min-height: 800px;
}
</style>

<div id="page-wrapper">
<div class="container">
  <!-- Page Heading -->
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">
              Pemesanan
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> <a href="pemesanan.php">Data Pemesanan</a>
              </li>
              <li class="active">
                  <i class="fa fa-table "></i> Detail Pemesanan
              </li>
          </ol>
      </div>
  </div>


  <!-- tabel Pemesanan -->
  <div class="row">
      <div class="col-lg-12">

<?php

  if(isset($_GET['act'])){
   if($_GET['act'] == 'del'){
     echo "
     <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di di hapus.
     </div>";
   }else if($_GET['act'] == 'add'){
     echo "
     <div class='alert alert-success'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di Tambah.
     </div>";
   }
   else if($_GET['act'] == 'update'){
     echo "
     <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di edit.
     </div>";
   }
 }

 ?>



        <!-- <a href="tambahPemesanan.php" class="btn btn-default btn-md " style="margin-bottom:7px">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Pemesanan
        </a> -->
          <div class="table-responsive">
              <table class="table  table-hover">

                      <tr>
                          <td width="300">Nama Pelanggan</td>
                          <td><?= $q->nama_pelgn ?></td>
                      </tr>
                      <tr>
                          <td width="300">Paket</td>
                          <td><?= $q->paket ?></td>
                      </tr>
                      <tr>
                          <td width="300">Harga Paket</td>
                          <td><?= $q->harga ?></td>
                      </tr>
                      <tr>
                          <td width="300">Status Cucian</td>
                          <td><?= sCuci($q->status_cucian) ?></td>
                      </tr>
                      <tr>
                          <td width="300">Status Bayar</td>
                          <td><?= sBayar($q->status_bayar) ?></td>
                      </tr>
                      <tr>
                          <td width="300">tanggal Pemesanan</td>
                          <td><?= $q->tgl_pemesanan ?></td>
                      </tr>
                      <tr>
                          <td width="300">Berat</td>
                          <td><?= $q->berat ?></td>
                      </tr>
                      <tr>
                          <td width="300">Total Harga</td>
                          <td><?= $q->total_harga ?></td>
                      </tr>



              </table>
          </div>
      </div>
  </div>
  <!-- /.row -->

</div>

</div>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>
<?php include "../template/footer.php"; ?>
