<?php
require_once "../config.php";
require_once "funcpel.php";
ceklogin();

include "../template/header.php";
include "../template/menupl.php";
 ?>

 <?php
$id_pelgn = $_SESSION['id_pelgn'];
$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
if ($cari == ""){
  $sql = " SELECT * FROM pelanggan where id_pelgn = $id_pelgn";
}

$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$q = $que->fetch();

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
          <h1 class="page-header">
              Profile
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> Profile
              </li>
          </ol>
      </div>
  </div>


  <!-- tabel -->
  <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table  table-hover">
              <tr>
                  <td width="300">Nama Pelanggan</td>
                  <td><?= $q->nama_pelgn ?></td>
              </tr>
              <tr>
                  <td width="300">Username</td>
                  <td><?= $q->username ?></td>
              </tr>
              <tr>
                  <td width="300">No Hp</td>
                  <td><?= $q->no_hp_pelgn ?></td>
              </tr>
              <tr>
                  <td width="300">Alamat</td>
                  <td><?= $q->almt_pelgn ?></td>
              </tr>
              <tr>
                  <td width="300">Status</td>
                  <td><?= $q->status ?></td>
              </tr>
            </table>



      </div>
  </div>
  <!-- /.row -->

</div>

</div>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>
<?php include "../template/footer.php"; ?>
