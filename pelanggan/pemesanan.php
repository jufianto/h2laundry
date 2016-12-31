<?php
require_once "../config.php";
require_once "funcpel.php";
ceklogin();

include "../template/header.php";
include "../template/menupl.php";
 ?>

 <?php
$id_pelgn = $_SESSION['id_pelgn'];
$sq = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
if ($sq == 'ok'){
  $sql = " SELECT pemesanan.status,paket.paket,pelanggan.nama_pelgn,pemesanan.status_cucian,pemesanan.status_bayar,pemesanan.tgl_pemesanan,pemesanan.berat,pemesanan.total_harga,pemesanan.id_pemesanan FROM pemesanan INNER JOIN pelanggan on pemesanan.id_pelgn = pelanggan.id_pelgn INNER JOIN paket on pemesanan.id_paket = paket.id_paket where pemesanan.id_pelgn = $id_pelgn and pemesanan.status = 1";

}elseif ($sq == 'no') {
  $sql = "SELECT     pemesanan.status,paket.paket,pelanggan.nama_pelgn,pemesanan.status_cucian,pemesanan.status_bayar,pemesanan.tgl_pemesanan,pemesanan.berat,pemesanan.total_harga,pemesanan.id_pemesanan FROM pemesanan INNER JOIN pelanggan on pemesanan.id_pelgn = pelanggan.id_pelgn INNER JOIN paket on pemesanan.id_paket = paket.id_paket where pemesanan.id_pelgn = $id_pelgn and status_cucian = 1 and pemesanan.status = 0";
}else if($sq == ''){
  $sql = " SELECT pemesanan.status,paket.paket,pelanggan.nama_pelgn,pemesanan.status_cucian,pemesanan.status_bayar,pemesanan.tgl_pemesanan,pemesanan.berat,pemesanan.total_harga,pemesanan.id_pemesanan FROM pemesanan INNER JOIN pelanggan on pemesanan.id_pelgn = pelanggan.id_pelgn INNER JOIN paket on pemesanan.id_paket = paket.id_paket where pemesanan.id_pelgn = $id_pelgn";

}
// print_r($sql);echo $sql;exit();
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetchAll();

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
                  <i class="fa fa-table"></i> Data Order Cucian
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
        <a href="ordercucian.php" class="btn btn-primary btn-md " style="margin-bottom:7px"> Tambah Order </a>
          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>

                      <tr>
                          <th width="50">No</th>
                          <th>Nama Pelanggan</th>
                          <th>Status Cucian</th>
                          <th>Status Ambil</th>
                          <th>Date</th>
                          <th>Total Harga</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($stmt as $q)
                    {
                        $no++;
                        ?>
                      <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->nama_pelgn ?></td>
                          <td><?= sCuci($q->status_cucian) ?></td>
                          <td><?= sAmbil($q->status) ?></td>
                          <td><?= $q->tgl_pemesanan ?></td>
                          <td><?= $q->total_harga ?></td>

                      </tr>
                      <?php }?>

                  </tbody>
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
