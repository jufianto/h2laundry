<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

 ?>
<?php include "../template/header.php"; ?>
<?php include "../template/menu.php"; ?>
<?php
$id_pelgn = $_GET['id_pelgn'];
$sql = " select * from pelanggan where id_pelgn= '$id_pelgn' ";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch();
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
                        <span><input class="form-control" placeholder="" value="<?= $stmt->nama_pelgn ?>" readonly="true"></span>
                        <input class="form-control" placeholder="" type="hidden" value="<?= $stmt->id_pelgn ?>"  name="id_pelgn">
                    </div>
                    <div class="form-group">
                        <label>Harga Paket</label>

                        <span><input class="form-control" placeholder="" name="harga_paket"></span>
                    </div>

      </br>
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
