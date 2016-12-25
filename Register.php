<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>H2 Laundry</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="css/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- Squad theme CSS -->
    <link href="css/footer.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">H2 Laundry</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">



					<li>
						<a class="page-scroll" href="index.php">Kembali</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner ">
                <img src="img/logo-tp.png" width="500px" height="150px">
				<div class="row">
				<div class="col-lg-4 col-sm-6">
				</div>
				<div class="col-lg-4 col-sm-6">

                <form role="form" action="proAdmin.php?action=add" method="post">

                    <div class="form-group">
                        <label>Nama</label>

                        <span><input class="form-control" placeholder="Nama" name="nama"></span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>

                        <span><input class="form-control" placeholder="Username" name="username"></span>
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
            </div>
        </div>
    </header>








    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>


</body>

</html>
