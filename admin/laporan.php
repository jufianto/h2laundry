<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

include "../template/header.php";
include "../template/menu.php";



$bulan = isset($_REQUEST['bulan']) ? $_REQUEST['bulan'] : '' ;
$tahun = isset($_REQUEST['tahun'])? $_REQUEST['tahun'] : '';
$sql = "select sum(total_harga) as total from pemesanan WHERE tgl_pemesanan BETWEEN '$tahun-$bulan-01 00:00:01 ' and '$tahun-$bulan-31 23:59:59'; ";
$que = $conn->prepare($sql);
$que->execute();
// $que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch(PDO::FETCH_NUM);
// var_dump($stmt);
$pemasukan = $stmt['0'];

$sql1 = "select sum(total_harga) as total from barang WHERE tgl_input BETWEEN '$tahun-$bulan-01 00:00:01 ' and '$tahun-$bulan-31 23:59:59'; ";
$que1 = $conn->prepare($sql1);
$que1->execute();
$stmt1 = $que1->fetch(PDO::FETCH_NUM);
$pengeluaran = $stmt1['0'];

$sql = "select * from pelanggan";
$stmt = getData($sql,$conn);
$pelanggan = count($stmt);

$sqlor = "select * from pemesanan";
$stmt1 = getData($sqlor,$conn);
$order = count($stmt1);

$sqlyes = "select * from pemesanan where status = 1";
$stmt4 = getData($sqlyes,$conn);
$cuciyes = count($stmt4);

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
              Laporan
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> Laporan
              </li>
          </ol>
      </div>
  </div>



  <div class="row">
    <div class="col-md-12">

  </div>
</div>

<div class="row">
  <div class="col-md-6">




    <div class="panel panel-primary">
        <div class="panel-heading">
            Laporan Data Laundry
        </div>

            <div class="panel-body">


              <div class="table-responsive" style="margin-top:20px">
                  <table class="table table-hover">
                    <tr>
                        <th>Laporan</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td><a href="pelanggan.php">Total Pelanggan</a></td>
                        <td><?= $pelanggan ?></td>
                    </tr>
                    <tr>
                      <td><a href="pemesanan.php">Total Seluruh Order</a></td>
                      <td><?= $order ?></td>
                    </tr>
                    <tr>
                      <td><a href="pengembalian.php"> Total Order Sudah Diambil </a></td>
                      <td><?= $cuciyes ?></td>
                    </tr>
                  </table>
                </div>

            </div>
    </div>
</div>



    <div class="col-md-6">

      <div class="panel panel-primary">
          <div class="panel-heading">
              Laporan Pemasukan
          </div>

              <div class="panel-body">

                <form class="" action="" method="post">
                <select class="col-md-4" name="bulan">
                  <?php
                  $bulan1 = ['Pilih Bulan','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                  foreach ($bulan1 as $key => $val) {
                    # code...

                    ?> <option value="<?= $key ?>" <?= $bulan == $key ? 'selected' : '' ?> > <?= $val ?> </option> <?php
                  }
                  ?>

                </select>
                <select class="col-md-4" name="tahun">
                  <?php
                  $tahun1 = ['Pilih tahun','2016','2017','2018'];
                  foreach ($tahun1 as $key) {
                    # code...
                    ?> <option value="<?= $key ?>" <?= $tahun == $key ? 'selected' : '' ?> > <?= $key ?> </option> <?php

                  }
                  ?>
            <!-- <option value="" selected="">sda</option> -->
                </select>

                  <button type="submit" name="laporan">Cari</button
                </form>

                <div class="table-responsive table-striped" style="margin-top:20px">
                    <table class="table  table-hover">
                      <tr>
                          <td>Total Pemasukan Order</td>
                          <td><?= $pemasukan == NULL ? '0' : $pemasukan; ?></td>
                      </tr>
                      <tr>
                        <td>Total Pembelian Barang</td>
                        <td><?= $pengeluaran == NULL ? '0' : $pengeluaran; ?></td>
                      </tr>
                    </table>
                  </div>
              </div>
      </div>





      </div>

</div>

</div>
</div>


<?php include "../template/footer.php"; ?>
