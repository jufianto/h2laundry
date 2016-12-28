<?php
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

$id_admin = $_GET['id_admin'];
$sql = " select * from admin where id_admin= '$id_admin' ";
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
                    Edit Admin
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="admin.php">Data Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Admin
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">

                <form role="form" action="proAdmin.php?action=update" method="post">
                  <input class="form-control" placeholder="Nama" value="<?= $id_admin?>" type="hidden" name="id_admin">
                  <div class="form-group">
                      <label>Nama Admin</label>

                      <span><input class="form-control" placeholder="" name="nama_admin" value="<?= $stmt->nama_admin ?>"></span>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <span><input class="form-control TA" type="password" placeholder="" name="password" value="<?= $stmt->password ?>" disabled="true"></span>
                      <label>
                        <input type="checkbox" name="" id="password">Tukar Password
                      </label>
                  </div>
                  <div class="form-group">
                      <label>No HP</label>

                      <span><input class="form-control" placeholder="" name="no_hp_admin" value="<?= $stmt->no_hp_admin ?>"></span>
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
