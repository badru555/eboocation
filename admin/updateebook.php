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
  <title>Edit</title>
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
        <a class="mybrand navbar-brand" href="dashboard.php">e-boocation <b>Dasboard</b></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="mymenu nav navbar-nav navbar-right">
          <li><a href="../user/home.php">Homepage</a></li>
          <li><a href="review.php">Review</a></li>
          <li class="active"><a href="record.php">Records</a></li>
          <li><a href="user.php">Users</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: #463C94;">
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


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="well">
          <?php
          require_once "../koneksi.php";
          $id=$_GET['id'];
          $query = mysqli_query($koneksi, "SELECT * FROM ebooks WHERE id='$id'");
          $data = mysqli_fetch_array($query); ?>
          <form class="form-horizontal" method="POST" action="../action.php?act=updateebook">
            <fieldset>
              <legend>Edit Ebook Data</legend>
              <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
              <!-- JUDLU -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="title">Title</label>
                <div class="col-md-4">
                  <input  name="title" type="text" placeholder="Type the tittle of your file" class="form-control input-md" required value="<?php echo $data['title'] ?>">
                </div>
              </div>

              <!-- PENULIS -->
              <div class="form-group">
                <label class="col-md-4 control-label">Author</label>
                <div class="col-md-4">
                  <input  name="author" type="text" placeholder="Who is the author?" class="form-control input-md" required value="<?php echo $data['author'] ?>">
                </div>
              </div>

              <!-- TAHUN -->
              <div class="form-group">
                <label class="col-md-4 control-label">Year</label>
                <div class="col-md-4">
                  <input  name="year" type="text" placeholder="Publishing Year (if any)" class="form-control input-md" value="<?php echo $data['year'] ?>">
                </div>
              </div>

              <input type="hidden" name="status" value="admin">
              <!-- PENERBIT -->
              <div class="form-group">
                <label class="col-md-4 control-label">Publisher</label>
                <div class="col-md-4">
                  <input  name="publisher" type="text" placeholder="Publishing Company (if any)" class="form-control input-md" value="<?php echo $data['publisher'] ?>">
                </div>
              </div>

              <!-- KATEGORI -->
              <div class="form-group">
                <label class="col-md-4 control-label">Catergory</label>
                <div class="col-md-4">
                  <select name="category" class="form-control" value="<?php echo $data['category'] ?>">
                    <option value="sastra">Sastra</option>
                    <option value="ilmiah">Ilmiah</option>
                    <option value="sejarah">Sejarah</option>
                    <option value="bahasa">Bahasa</option>
                    <option value="biografi">Biografi</option>
                  </select>
                </div>
              </div>

              <!-- APPROVAL -->
              <div class="form-group">
                <label class="col-md-4 control-label">Approval Status</label>
                <div class="col-md-4">
                  <select name="approval" class="form-control" value="<?php echo $data['approval'] ?>">
                    <option value="0">Unapproved</option>
                    <option value="1">Approved</option>
                  </select>
                </div>
              </div>

              <!-- DISKRIPSI -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>
                <div class="col-md-4">
                  <textarea class="form-control" name="description" placeholder="Abstract, Summary, Sinopsis, ..."><?php echo $data['description'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary">Update</button>
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
        <a href="../admin"> Admin </a><br> e-boocation &copy; 2018 Copyright:
      </div>
    </div>
  </div>

  <script src="../aaa/js/jquery.js"></script>
  <script src="../aaa/js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>
