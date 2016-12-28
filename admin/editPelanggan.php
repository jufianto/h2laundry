<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

$id = $_GET['id_pelgn'];
$sql = " select * from pelanggan where id_pelgn= '$id' ";
$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetch();


 ?>
<script src="../js/jquery.js"></script>
<script>
$(document).ready(function(){
  $('#password').change(function() {
       if($('#password').is(':checked')) { $('.TA').removeAttr('disabled');} else{ $('.TA').attr("disabled",true); }
     });
})
</script>
<?php include "../template/header.php"; ?>
<?php include "../template/menu.php"; ?>

<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit pelanggan
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="pelanggan.php">Data Pelanggan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Pelanggan
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proPelanggan.php?action=update" method="post">
                  <input class="form-control" placeholder="Nama" value="<?= $id?>" type="hidden" name="id">
                    <div class="form-group">
                        <label>Nama</label>
                        <span><input class="form-control" placeholder="Nama" name="nama" value="<?= $stmt->nama_pelgn?>"></span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>

                        <span><input class="form-control" placeholder="Nama" name="username" value="<?= $stmt->username ?>"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>

                    <input class="form-control" placeholder="Password" input type="password" disabled="true" name="password" value="<?= $stmt->pass_pelgn ?>">
                        <label>
                          <input type="checkbox" name="" id="password">Tukar Password
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" placeholder="Alamat" name="alamat" value="<?= $stmt->almt_pelgn ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input class="form-control" placeholder="Nomor Hp" name="no_hp" value="<?= $stmt->no_hp_pelgn ?>">
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
