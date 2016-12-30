<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

 ?>
<?php include "../template/header.php"; ?>
<?php include "../template/menu.php"; ?>
<?php
$id_pemesanan = $_GET['id_pemesanan'];
$sql = " select pemesanan.*,pelanggan.nama_pelgn from pemesanan inner join pelanggan on pemesanan.id_pelgn = pelanggan.id_pelgn where id_pemesanan= '$id_pemesanan' ";
$stmt = getOne($sql,$conn);

$sql1 = " select * from paket ";
$stmt1 = getData($sql1,$conn);

// $que1 = $conn->prepare($sql1);
// $que1->execute();
// $que1->setFetchMode(PDO::FETCH_OBJ);
// $stmt1 = $que1->fetchAll();

// print_r($stmt1);exit();

 ?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Order Cucian
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="pemesanan.php">Order Cucian</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Order
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proPemesanan.php?action=update" method="post">

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <span><input class="form-control" name="nama_pelgn" placeholder="" value="<?= $stmt->nama_pelgn ?>" readonly="true"></span>
                        <input class="form-control" placeholder="" type="hidden" value="<?= $stmt->id_pemesanan ?>"  name="id_pemesanan">
                    </div>
                    <div class="form-group">
                        <label>Paket</label>
                        <?php $harga ?>

                        <select class="form-control" name="paket">
                        <?php foreach($stmt1 as $key){ ?>
                          <option value="<?= $key->id_paket ?>" <?= $stmt->id_paket == $key->id_paket ? 'selected' : '' ?> >
                             <?php echo $key->paket .'        -->       ' .$key->harga ;?>
                         </option>

                          <?php } ?>
                      </select>
                    </div>


                    <div class="form-group">
                        <label>Berat</label>
                        <span><input class="form-control" name="berat" placeholder="Berat Cucian" value="<?= $stmt->berat ?>"></span>
                    </div>


                    <div class="form-group">
                        <label>Total Harga</label>
                        <span><input class="form-control" name="total_harga"></span>
                    </div>

      </br>

                    <div class="form-group">
                        <Button class="btn btn-primary btn-xl page-scroll">Simpan</button>

                    </div>
                </form>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "../template/footer.php"; ?>
