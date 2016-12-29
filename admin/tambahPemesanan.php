<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

 ?>
<?php include "../template/header.php"; ?>
<?php include "../template/menu.php"; ?>
<?php
$id_pelgn = $_GET['id'];
$sql = " select * from pelanggan where id_pelgn= '$id_pelgn' ";
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
                    Tambah Order Cucian
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="pemesanan.php">Order Cucian</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Tambah Order
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proPemesanan.php?action=add" method="post">

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <span><input class="form-control" name="nama_pelgn" placeholder="" value="<?= $stmt->nama_pelgn ?>" readonly="true"></span>
                        <input class="form-control" placeholder="" type="hidden" value="<?= $stmt->id_pelgn ?>"  name="id_pelgn">
                    </div>
                    <div class="form-group">
                        <label>Paket</label>
                        <?php $harga ?>

                        <select class="form-control" name="paket">
                        <?php foreach($stmt1 as $key){ ?>
                          <option value="<?= $key->id_paket ?>"> <?php echo $key->paket .'        -->       ' .$key->harga ;?> </option>

                          <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Bayar di Muka ? </label><br>
                        <label class="radio-inline">
                          <input type="radio" name="status_bayar" id="inlineRadio1" value="1"> Iya
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="status_bayar" id="inlineRadio2" value="0"> Tidak
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Berat</label>
                        <span><input class="form-control" name="berat" placeholder="Berat Cucian"></span>
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
