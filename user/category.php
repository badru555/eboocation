<?php
session_start();
 //apabila user belum Login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
 echo "<div style=\"width: 100%; text-align: center;\"><h1>Untuk Mengakses, Anda harus login dulu.</h1>
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
  <title>Category</title>

  <link rel="stylesheet" href="../aaa/css/bootstrap.min.css">
  <link rel="stylesheet" href="../aaa/css/ownstyle.css">

</head>
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
        <a class="mybrand navbar-brand" href="home.php">e-b</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-sm-3 col-md-3">
          <form class="navbar-form" role="search" method="post" action="home.php">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <ul class="mymenu nav navbar-nav navbar-right">
          <li><a href="home.php">Home</a></li>
          <li><a href="upload.php">Upload</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color: #463C94;">
              <li><a href="category.php?category=sastra">Sastra</a></li>
              <li><a href="category.php?category=ilmiah">Ilmiah</a></li>
              <li><a href="category.php?category=sejarah">Sejarah</a></li>
              <li><a href="category.php?category=bahasa">Bahasa</a></li>
              <li><a href="category.php?category=biografi">Biografi</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: #463C94;">
              <li><a href="account.php"><i class="icon-cog"></i> Managge Account</a></li>
              <li class="divider"></li>
              <li><a href="../logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-8">
      <h4><?php echo strtoupper($_GET['category']); ?></h4>
      <?php
      require_once "../koneksi.php";
      $category = $_GET['category'];
      $ebooks=mysqli_query($koneksi, "SELECT * FROM ebooks WHERE approval='1' AND category='$category' ORDER BY uploadtime DESC");
      $count=mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id) FROM ebooks WHERE approval='1' AND category='$category' GROUP BY category"));
      while ($data = mysqli_fetch_array($ebooks)) {
       ?>

       <div class="panel panel-info">
        <div class="panel-heading">
          <h5 class="panel-title"><?php echo "<strong>".$data['author']."</strong>"; ?></h5>
        </div>
        <div class="panel-body">
          <div class="pull-left">
            <h4><?php echo $data['title']; ?></h4>
            <i class="label label-info"><?php echo $data['category']; ?></i>
            <i class="label label-warning"><?php echo $data['year']; ?></i>
          </div>
          <div class="pull-right">
            <a href="viewpdf.php?id=<?php echo $data['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-zoom-in"></i></a>
            <a href="../action.php?act=download&id=<?php echo $data['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="col-md-4">
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        You get ebook categoried as <strong><?php echo $_GET['category']; ?></strong>
      </div>
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        A number of <strong><?php echo $_GET['category']; ?></strong> is <?php echo $count['COUNT(id)'] ?>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<div class="footer" style="background-color: #f4f8ff;">
  <div class="container">
    <div class="text-center">
      <a href="../about" target="_blank"> About |</a>
      <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=badrus@unida.gontor.ac.id&subject=bantuan&body=saya ingin bertanya tentang" target="_blank"> Help |</a>
      <a href="../admin/dashboard.php"> Admin </a><br> e-boocation &copy; 2018 Copyright:
    </div>
  </div>
</div>


<script src="../aaa/js/jquery.js"></script>
<script src="../aaa/js/bootstrap.min.js"></script>

</body>
</html>
<?php
} ?>
