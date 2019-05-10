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
  <title>e-boocation</title>

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
          <li class="active"><a href="home.php">Home</a></li>
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
      <?php
      require_once "../koneksi.php";
      if (isset($_POST['search'])){
        echo "<h4>RESULTS .. </h4>";
        $keyword = $_POST['search'];
        $query = "SELECT * FROM ebooks WHERE approval='1' AND (title LIKE '%$keyword%' OR author LIKE '%$keyword%' ) ORDER BY uploadtime DESC";
      }

      elseif (isset($_POST['category']) AND isset($_POST['time'])) {
        echo "<h4>FILTERED .. </h4>";
        date_default_timezone_set("Asia/Bangkok");
        $time = $_POST['time'];
        $category = $_POST['category'];
        $datenow = date ("Y-m-d H:i:s");
        if ($time=='lastweek'){
          $query = "SELECT * FROM ebooks WHERE approval='1' AND (uploadtime >= '$datenow' - interval 7 day or category = '$category')";
        }
        elseif ($time=='lastday') {
          $query = "SELECT * FROM ebooks WHERE approval='1' AND (uploadtime >= '$datenow' - interval 1 day or category = '$category')";
        }
        else {
          $query = "SELECT * FROM ebooks WHERE approval='1' AND (uploadtime >= '$datenow' - interval 2 hour or category = '$category')";
        }
      }
      else {
        echo "<h4>NEW EBOOKS ..</h4>";
        $query = "SELECT * FROM ebooks WHERE approval='1' ORDER BY uploadtime DESC LIMIT 5";
      }
      $ebooks=mysqli_query($koneksi, $query);
      if (!mysqli_num_rows($ebooks)) {
        echo "<h1>NO RESULT</h1>";
      }
      else {
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
              <a href="../aafile/<?php echo $data['filename'] ?>" download="<?php echo $data['filename'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i></a>
            </div>
          </div>
        </div>


      <?php } } ?>
    </div>
    <div class="col-md-4">
      <form class="form-horizontal" method="post" action="home.php">
        <fieldset>

          <!-- sidebar -->
          <div class="well">
            <legend>Advanced Filter</legend>
            <!-- Multiple Radios -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="category">Category</label>
              <div class="col-md-4">
                <div class="radio">
                  <label for="catergory">
                    <input type="radio" name="category" value="sastra" checked="checked">
                    Sastra
                  </label>
                </div>
                <div class="radio">
                  <label for="catergory">
                    <input type="radio" name="category" value="ilmiah">
                    Ilmiah
                  </label>
                </div>
                <div class="radio">
                  <label for="catergory">
                    <input type="radio" name="category" value="sejarah">
                    Sejarah
                  </label>
                </div>
                <div class="radio">
                  <label for="catergory">
                    <input type="radio" name="category" value="bahasa">
                    Bahasa
                  </label>
                </div>
                <div class="radio">
                  <label for="catergory">
                    <input type="radio" name="category" value="biografi">
                    Biografi
                  </label>
                </div>
              </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="time">Time Uploaded</label>
              <div class="col-md-4">
                <div class="radio">
                  <label for="timeradio-0">
                    <input type="radio" name="time" id="timeradio-0" value="lasthour" checked="checked">
                    Last Hour
                  </label>
                </div>
                <div class="radio">
                  <label for="timeradio-2">
                    <input type="radio" name="time" id="timeradio-2" value="lastday">
                    Last Day
                  </label>
                </div>
                <div class="radio">
                  <label for="timeradio-1">
                    <input type="radio" name="time" id="timeradio-1" value="lastweek">
                    Last Week
                  </label>
                </div>
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="apply"></label>
              <div class="col-md-8">
                <button type="submit" id="apply" name="apply" class="btn btn-primary">Apply</button>
                <a href="home.php" role="button" class="btn btn-info">Reset</a>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
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
