<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

 ?>
<?php include "../template/header.php"; ?>
<?php include "../template/menu.php"; ?>

<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tambah pelanggan
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="pelanggan.php">Data Paket</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Tambah Paket
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proPaket.php?action=add" method="post">

                    <div class="form-group">
                        <label>Nama Paket</label>

                        <span><input class="form-control" placeholder="" name="nama_paket"></span>
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
