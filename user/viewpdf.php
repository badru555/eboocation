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
  <title>View</title>

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

  <div class="container">
    <?php
    require_once "../koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM ebooks WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    $iduser=$data['iduser'];
    $queryuser = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$iduser'");
    $datauser = mysqli_fetch_array($queryuser);
    ?>
    <div class="row">
      <div class="col-md-4 well">
        <div class="cointainer">
          <div>
            <h3><?php echo $data['title'] ?></h3>
          </div>
          <div>
            <p><?php echo $data['author']." - ".$data['year']." " ?><i class="label label-info"><?php echo $data['category'] ?></i></p>
          </div>
          <div>
            <p><?php echo $data['publisher'] ?></p>
          </div>
          <div>
            <p>Uploaded by <?php echo "<strong>".$datauser['username']."</strong>" ?></p>
          </div>
          <div>
            <a href="../aafile/<?php echo $data['filename'] ?>" download="<?php echo $data['filename'] ?>" class="btn btn-block btn-success">Download</a>
          </div>
          <div>
            <p><br>Description : <?php echo $data['description']?></p>
          </div>
          <div>
            <p><br>Other related ebooks;</p>
          </div>
          <?php
          $kategori = $data['category'];
          $id = $data['id'];
          $related = mysqli_query($koneksi, "SELECT * FROM ebooks WHERE category='$kategori' AND id!='$id' LIMIT 4");

          while ($kategoridata = mysqli_fetch_array($related)) {

           ?>
           <ul>
            <li><a href="viewpdf.php?id=<?php echo $kategoridata['id'] ?>"><?php echo $kategoridata['title'] ?></a> <?php echo " (".$kategoridata['year'].")" ?></li>
          </ul>
          <?php } ?>
        </div>
      </div>



      <div class="col-md-8">
        <div class="embed-responsive embed-responsive-4by3">
          <embed src="../aafile/<?php echo $data['filename']; ?>">
          </div>
        </div>
      </div>

    </div>



    <script src="../aaa/js/jquery.js"></script>
    <script src="../aaa/js/bootstrap.min.js"></script>

  </body>
  </html>
  <?php
} ?>
