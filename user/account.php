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
  <title><?php echo $_SESSION['username'] ?></title>

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

  <!-- konten -->
  <?php
  require_once "../koneksi.php";
  $iduser = $_SESSION['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$iduser'");
  $data = mysqli_fetch_array($query);
  ?>
  <div class="container">
   <div class="row">
     <h2 style="color: #448aff;text-align: center;"><?php echo $data['username']."'s Account" ?></h2>
     <hr>
     <div class="col-sm-12">
       <div class="well">
         <form class="form-horizontal" method="POST" action="../action.php?act=updateuser">
           <fieldset>
             <legend>Manage Your Account</legend>
             <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
             <input type="hidden" name="password" value="<?php echo $data['password'] ?>">
             <!-- USERNAME -->
             <div class="form-group">
               <label class="col-md-4 control-label" for="title">Username</label>
               <div class="col-md-4">
                 <input  name="username" type="text" placeholder="Type the tittle of your file" class="form-control input-md" required value="<?php echo $data['username'] ?>">
               </div>
             </div>

             <!-- EMAIL -->
             <div class="form-group">
               <label class="col-md-4 control-label">Email</label>
               <div class="col-md-4">
                 <input  name="email" type="email" placeholder="Who is the author?" class="form-control input-md" required value="<?php echo $data['email'] ?>">
               </div>
             </div>

             <br><br>
             <!-- GANTI PASSWORD -->
             <div class="form-group">
               <label class="col-md-4 control-label">Current Password</label>
               <div class="col-md-4">
                 <input  name="oldpassword" type="password" placeholder="Type Current Password (if you want to change)" class="form-control input-md">
               </div>
             </div>

             <!-- PENERBIT -->
             <div class="form-group">
               <label class="col-md-4 control-label">New Password</label>
               <div class="col-md-4">
                 <input  name="newpassword" type="password" placeholder="New password" class="form-control input-md">
               </div>
             </div>
             <div class="form-group">
               <label class="col-md-4 control-label">Confirm Password</label>
               <div class="col-md-4">
                 <input  name="conpassword" type="password" placeholder="Confrim password" class="form-control input-md">
               </div>
             </div>


             <div class="form-group">
               <label class="col-md-4 control-label"></label>
               <div class="col-md-8">
                 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
               </div>
             </div>
           </fieldset>
         </form>
       </div>

     </div>
   </div>
 </div>
 <div class="container">
  <div class="well">
    <div class="row" style="margin: 10px;">
      <div class="col-md-6">
        <legend>Your ebook uploads:</legend>
      </div>
      <div class="col-md-6">
        <a href="../user/upload.php" class="btn btn-info btn-sm pull-right" role="button"> <span class="glyphicon glyphicon-upload"></span> Upload New</a>
      </div>
    </div>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr class="row-name text-center info">
          <th>No</th>
          <th>Title</th>
          <th>Author</th>
          <th>Uploaded Time</th>
          <th>Status</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once "../koneksi.php";
        $book = mysqli_query($koneksi, "SELECT * FROM ebooks WHERE iduser='$iduser'");
        $no=1;
        while ($databook=mysqli_fetch_array($book)) {
          ?>
          <tr class="row-content">
            <td><?php echo $no++; ?></td>
            <td><?php echo $databook['title']; ?></td>
            <td><?php echo $databook['author']; ?></td>
            <td><?php echo $databook['uploadtime']; ?></td>
            <td>
              <?php
              if ($databook['approval']=='1'){ echo "Approved"; }
              else { echo "Unapproved"; }
              ?>
            </td>
            <td>
              <a class="btn btn-success btn-xs" href="updateebook.php?id=<?php echo $databook['id'] ?>" aria-label="Settings">
                <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
              </a>
              <a class="btn btn-info btn-xs" href="viewpdf.php?id=<?php echo $databook['id'] ?>" aria-label="Settings">
                <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

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
