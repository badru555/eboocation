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
  <title>Upload</title>

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
          <li class="active"><a href="upload.php">Upload</a></li>
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
      <div class="col-sm-12">
        <div class="well">
          <form class="form-horizontal" enctype="multipart/form-data" method="POST" <?php echo "action=\"../action.php?act=upload\""; ?>>
            <fieldset>
              <legend>Upload your file</legend>

              <!-- JUDLU -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="title">Title</label>
                <div class="col-md-4">
                  <input  name="title" type="text" placeholder="Type the tittle of your file" class="form-control input-md" required>
                </div>
              </div>

              <!-- PENULIS -->
              <div class="form-group">
                <label class="col-md-4 control-label">Author</label>
                <div class="col-md-4">
                  <input  name="author" type="text" placeholder="Who is the author?" class="form-control input-md" required>
                </div>
              </div>

              <!-- TAHUN -->
              <div class="form-group">
                <label class="col-md-4 control-label">Year</label>
                <div class="col-md-4">
                  <input  name="year" type="text" placeholder="Publishing Year (if any)" class="form-control input-md">
                </div>
              </div>

              <!-- PENERBIT -->
              <div class="form-group">
                <label class="col-md-4 control-label">Publisher</label>
                <div class="col-md-4">
                  <input  name="publisher" type="text" placeholder="Publishing Company (if any)" class="form-control input-md">
                </div>
              </div>

              <!-- KATEGORI -->
              <div class="form-group">
                <label class="col-md-4 control-label">Catergory</label>
                <div class="col-md-4">
                  <select name="category" class="form-control">
                    <option value="sastra">Sastra</option>
                    <option value="ilmiah">Ilmiah</option>
                    <option value="sejarah">Sejarah</option>
                    <option value="bahasa">Bahasa</option>
                    <option value="biografi">Biografi</option>
                  </select>
                </div>
              </div>

              <!-- DISKRIPSI -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>
                <div class="col-md-4">
                  <textarea class="form-control" name="description" placeholder="Abstract, Summary, Sinopsis, ..."></textarea>
                </div>
              </div>
              <input type="hidden" name="iduser" value="<?php echo $_SESSION['id']; ?>">
              <!-- FILE -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="file">Upload file</label>
                <div class="col-md-4">
                  <input name="file" class="input-file" type="file">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </fieldset>
          </form>
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
<?php } ?>
