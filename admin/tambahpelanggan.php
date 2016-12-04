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
                        <i class="fa fa-edit"></i> <a href="pelanggan.php">Data Pelanggan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Tambah Pelanggan
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proAdmin.php?action=add" method="post">

                    <div class="form-group">
                        <label>Nama</label>

                        <span><input class="form-control" placeholder="Nama" name="nama_admin"></span>
                    </div>
      <div class="form-group">
                        <label>Password</label>

                        <input class="form-control" placeholder="Password" input type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" placeholder="Alamat" name="alamat">
                    </div>
      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input class="form-control" placeholder="Nomor Hp" name="no_hp">
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
