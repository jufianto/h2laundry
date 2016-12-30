<style>
.navgo{
  margin-right: 30px;
}
</style>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">H2 Laundry</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav collapse navbar-collapse navbar-ex1-collapse">
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <ul class="nav navbar-nav ">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="pemesanan.php"><i class="fa fa-fw fa-envelope"></i> Order Cucian</a>
            </li>

        <li class="dropdown navgo">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

</nav>
