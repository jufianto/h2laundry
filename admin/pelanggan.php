<?php include "../template/header.php";
      include "../template/menu.php";
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
      <div class="col-lg-12">
          <h1 class="page-header">
              Pelanggan
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i> Dashboard
              </li>
              <li class="active">
                  <i class="fa fa-table"></i> Data Pelanggan
              </li>
          </ol>
      </div>
  </div>


  <!-- tabel pelanggan -->
  <div class="row">
      <div class="col-lg-12">
        <a href="tambahpelanggan.php" class="btn btn-default btn-lg " style="margin-bottom:7px">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Pelanggan
        </a>
          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th width="50">No</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                          <th width="150">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Jufianto Henri</td>
                          <td>Jalan Tanjung Batu</td>
                          <td>08122334456778</td>
                          <td>
                            <a href="#" > <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit </a>
                            <a href="#" > <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete </a>
                          </td>
                      </tr>

                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- /.row -->

</div>

</div>

<?php include "../template/footer.php"; ?>
