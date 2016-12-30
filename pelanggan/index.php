<?php
require_once "../config.php";
require_once "funcpel.php";
ceklogin();

include "../template/header.php";
include "../template/menupl.php";
 ?>
<?php

$id_pelgn= $_SESSION['id_pelgn'];
$sql = "select * from pemesanan where id_pelgn = $id_pelgn ";
$stmt = getData($sql, $conn);
$stmt = count($stmt);

$sql1 = "select * from pemesanan where id_pelgn = $id_pelgn and status = 1 ";
$stmt1 = getData($sql1, $conn);
$stok = count($stmt1);

$sql2 = "select * from pemesanan where id_pelgn = $id_pelgn and status_cucian = 1 and status = 0";
$stmt2 = getData($sql2,$conn);
$stno = count($stmt2);


// print_r($stmt);echo count($stmt);exit();
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
          <br>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
          </ol>
      </div>
  </div>

<?php if($stno > 0) { ?>
  <div class="row">
      <div class="col-lg-12">
          <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-info-circle"></i>  <strong><?= $stno ?></strong> Orderan cucian anda telah <strong>Selesai</strong>
          </div>
      </div>
  </div>
  <?php } ?>

  <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $stmt ?></div>
                            <div>Total Order Cucian</div>
                        </div>
                    </div>
                </div>
                <a href="pemesanan.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $stok ?></div>
                            <div>Total Cucian Telah di Ambil</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $stno ?></div>
                            <div>Total Cucian Belum di Ambil</div>
                        </div>
                    </div>
                </div>
                <a href="pemesanan.php?s=no">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>






      </div>

  </div>
  <!-- /.row -->

</div>

</div>


<?php include "../template/footer.php"; ?>
