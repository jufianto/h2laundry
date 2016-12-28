<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

$id_barang = $_GET['id_barang'];
$sql = " select * from barang where id_barang= '$id_barang' ";
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
                    Edit Barang
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="barang.php">Data Barang</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Barang
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proBarang.php?action=update" method="post">
                  <input class="form-control" placeholder="Nama" value="<?= $id_barang?>" type="hidden" name="id_barang">
                  <div class="form-group">
                      <label>Nama Barang</label>

                      <span><input class="form-control" placeholder="" name="nama_barang" value="<?= $stmt->nama_barang ?>"></span>
                  </div>
                  <div class="form-group">
                      <label>Merek Barang</label>

                      <span><input class="form-control" placeholder="" name="merk_barang" value="<?= $stmt->merk_barang ?>"></span>
                  </div>
                  <div class="form-group">
                      <label>Stok</label>

                      <input class="form-control" placeholder="" input type="text" name="stok" value="<?= $stmt->stok ?>">
                  </div>
                  <div class="form-group">
                      <label>Total Harga</label>
                      <input class="form-control" placeholder="" name="total_harga" value="<?= $stmt->total_harga ?>">
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
