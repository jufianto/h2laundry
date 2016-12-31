<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

include "../template/header.php";
include "../template/menu.php";
 ?>

 <?php
$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
if ($cari == ""){
  $sql = " select * from pelanggan";
}else {
  # code...
  $sql = "select * from pelanggan where nama_pelgn like '%$cari%'";
}

$que = $conn->prepare($sql);
$que->execute();
$que->setFetchMode(PDO::FETCH_OBJ);
$stmt = $que->fetchAll();

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
              Pelanggan
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> Data Pelanggan
              </li>
          </ol>
      </div>
  </div>


  <!-- tabel pelanggan -->
  <div class="row">

      <div class="col-md-9">
        <a href="tambahpelanggan.php" class="btn btn-default btn-md " style="margin-bottom:7px">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Pelanggan
        </a>
      </div>
      <div class="col-md-3">

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
          <div class="input-group stylish-input-group">
            <input type="text" class="form-control" name="cari"  placeholder="Search" value="<?= $cari ?>" >
            <span class="input-group-addon">
                <button type="submit" >
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
          </div>
        </form>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-12">

<?php

  if(isset($_GET['act'])){
   if($_GET['act'] == 'del'){
     echo "
     <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di di hapus.
     </div>";
   }else if($_GET['act'] == 'add'){
     echo "
     <div class='alert alert-success'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di Tambah.
     </div>";
   }
   else if($_GET['act'] == 'update'){
     echo "
     <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert'>&times;</a>
         <strong>Berhasil</strong> Data Telah di edit.
     </div>";
   }
 }

 ?>





          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>

                      <tr>
                          <th width="50">No</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                          <th width="100">Status</th>
                          <th width="200" colspan="2">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($stmt as $q)
                    {
                        $no++;
                        ?>
                      <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->nama_pelgn ?></td>
                          <td><?= $q->almt_pelgn ?></td>
                          <td><?= $q->no_hp_pelgn ?></td>
                          <td><?= $q->status == 1 ? 'Aktif' : 'Belum Aktif'; ?></td>
                          <td width="200">
                            <a href="editPelanggan.php?id_pelgn=<?= $q->id_pelgn ?>" > <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit </a>
                            <a href="proPelanggan.php?action=del&id=<?= $q->id_pelgn?> " > <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete </a>
                            <?php if($q->status == 0) { ?>
                            <a href="proPelanggan.php?aktif=1&id=<?= $q->id_pelgn?> " > <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aktifkan </a>
                        <?php }else{ ?>
                          <a href="proPelanggan.php?aktif=0&id=<?= $q->id_pelgn?> " > <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Blokir </a>
                      <?php  } ?>
                          </td>
                          <td width="75">
                            <?php if($q->status == 1 ) { ?>
                            <a href="tambahPemesanan.php?id=<?= $q->id_pelgn?>" class="btn btn-info btn-sm">Pesan</a>
                            <?php }else{
                              echo "TERBLOKIR";
                            } ?>
                          </td>
                      </tr>
                      <?php }?>

                  </tbody>
              </table>
          </div>
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
