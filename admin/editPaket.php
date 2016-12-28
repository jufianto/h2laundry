<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

$id_paket = $_GET['id_paket'];
$sql = " select * from paket where id_paket= '$id_paket' ";
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
                    Edit paket
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="paket.php">Data paket</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit paket
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proPaket.php?action=update" method="post">
                  <input class="form-control" placeholder="Nama" value="<?= $id_paket?>" type="hidden" name="id_paket">
                  <div class="form-group">
                      <label>Nama paket</label>

                      <span><input class="form-control" placeholder="" name="nama_paket" value="<?= $stmt->paket ?>"></span>
                  </div>
                  <div class="form-group">
                      <label>Harga Paket</label>

                      <span><input class="form-control" placeholder="" name="harga_paket" value="<?= $stmt->harga ?>"></span>
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
