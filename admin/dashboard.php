<?php
session_start();
 //apabila user belum Login
$level = $_SESSION['status'];
if ($level!='admin'){
 echo "<div style=\"width: 100%; text-align: center;\"><h1>Untuk Mengakses, Anda harus login sebagai admin.</h1>
 <button><a href=\"index.php\">LOGIN</a></button></div>";
}
 //apabila sudah Login
else{
 ?>
 <!DOCTYPE html>
 <html>

 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../aaa/css/bootstrap.min.css">
  <link rel="stylesheet" href="../aaa/css/ownstyle.css">



  <body>
    <nav class="my-navbar navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="mybrand navbar-brand" href="dashboard.php">e-boocation <b>Dasboard</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="mymenu nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="review.php">Review</a></li>
            <li><a href="record.php">Records</a></li>
            <li><a href="user.php">Users</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" style="background-color: #463C94;">
                <li><a href="../user/home.php"><i class="icon-cog"></i>User Homepage</a></li>
                <li><a href="account.php"><i class="icon-cog"></i> Managge Account</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    <?php
    require_once "../koneksi.php";
    $ebooks=mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE approval='0'");
    $ebooksa=mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE approval='1'");
    $user=mysqli_query($koneksi, "SELECT COUNT(id) FROM user WHERE status='user'");
    $admin=mysqli_query($koneksi, "SELECT COUNT(id) FROM user WHERE status='admin'");
    $data = mysqli_fetch_array($ebooks);
    $dataa = mysqli_fetch_array($ebooksa);
    $datau = mysqli_fetch_array($user);
    $dataua = mysqli_fetch_array($admin);
    $sastra=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE category='sastra' AND approval='1' group by category"));
    $ilmiah=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE category='ilmiah' AND approval='1' group by category"));
    $sejarah=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE category='sejarah' AND approval='1' group by category"));
    $bahasa=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE category='bahasa' AND approval='1' group by category"));
    $biografi=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE category='biografi' AND approval='1' group by category"));
    ?>
    <!-- konten -->
    <div class="container-fluid">
      <?php if ($data['COUNT(id)']>'0') { ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> You have <?php echo $data['COUNT(id)'] ?> unapproved ebooks from users.
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h2>
              Assalamualaikum, Admin!
            </h2>
            <p>
              You are now in Dashboard panel of this website. You can act as common user and manage users and review their uploads. Be good and good luck!
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading">Ebooks</div>
            <div class="panel-body">
              Unapproved Ebook : <?php echo $data['COUNT(id)'] ?> <br>
              Approved Ebook : <?php echo $dataa['COUNT(id)'] ?> <br>
              Sum of Ebook Uploaded : <?php echo $data['COUNT(id)']+$dataa['COUNT(id)'] ?> <br>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Categories</div>
            <div class="panel-body">
              <div class="col-xs-4">
                Sastra : <?php echo $sastra['COUNT(id)'] ?> <br>
                Ilmiah : <?php echo $ilmiah['COUNT(id)'] ?> <br>
                Sejarah : <?php echo $sejarah['COUNT(id)'] ?> <br>
              </div>
              <div class="col-xs-4">
                Bahasa : <?php echo $bahasa['COUNT(id)'] ?> <br>
                Biografi : <?php echo $biografi['COUNT(id)'] ?> <br>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-danger">
            <div class="panel-heading">Users</div>
            <div class="panel-body">
              User : <?php echo $datau['COUNT(id)'] ?> <br>
              Admin : <?php echo $dataua['COUNT(id)'] ?> <br>
              Sum of Users : <?php echo $datau['COUNT(id)']+$dataua['COUNT(id)'] ?> <br>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <div class="nav navbar-fixed-bottom" style="background-color: #f4f8ff;">
      <div class="container">
        <div class="text-center">
          <a href="../about" target="_blank"> About |</a>
          <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=badrus@unida.gontor.ac.id&subject=bantuan&body=saya ingin bertanya tentang" target="_blank"> Help |</a>
          <a href="dashboard.php"> Admin </a><br> e-boocation &copy; 2018 Copyright:
        </div>
      </div>
    </div>
    <script src="../aaa/js/jquery.js"></script>
    <script src="../aaa/js/bootstrap.min.js"></script>
  </body>
  </html>
  <?php
}
?>
