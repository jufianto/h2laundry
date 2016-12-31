<?php
require_once "../config.php";
require_once "funcadmin.php";
ceklogin();

include "../template/header.php";
include "../template/menu.php";
 ?>

 <?php
 $sq = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
 $cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';

 if ($sq == 'ok'){
   if ($cari == ""){
   $sql = "select * from barang where stok > 0";
    }else{
   $sql = "select * from barang where stok > 0 and nama_barang like '%$cari%'";
    }
 }elseif ($sq == ''){
   if ($cari == ""){
     $sql = " select * from barang";
   }else{
     $sql = " select * from barang where nama_barang like '%$cari%'";

   }
 }



// $cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
// if ($cari == ""){
//   $sql = " select * from barang";
// }else {
//   # code...
//   $sql = "select * from barang where nama like '%$cari%'";
// }

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
              Barang
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> Data Barang
              </li>
          </ol>
      </div>
  </div>

  <div class="row">

      <div class="col-md-9">
        <a href="tambahBarang.php" class="btn btn-default btn-md " style="margin-bottom:7px">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Barang
        </a>
      </div>
      <div class="col-md-3">

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="input-group stylish-input-group">
            <input type="text" class="form-control" name="cari"  placeholder="Search" >
            <span class="input-group-addon">
                <button type="submit" >
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
          </div>
        </form>
      </div>
  </div>
  <!-- tabel barang -->
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
                          <th>Nama Barang</th>
                          <th>Merek Barang</th>
                          <th>Stok</th>
                          <th>Harga</th>
                          <th width="150">Aksi</th>
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
                          <td><?= $q->nama_barang ?></td>
                          <td><?= $q->merk_barang ?></td>
                          <td><?= $q->stok ?></td>
                          <td><?= $q->total_harga ?></td>
                          <td>
                            <a href="editBarang.php?id_barang=<?= $q->id_barang ?>" > <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit </a>
                            <a href="proBarang.php?action=del&id=<?= $q->id_barang?> " > <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete </a>
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
