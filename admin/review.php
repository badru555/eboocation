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
  <title>Review</title>
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
            <li class="active"><a href="#">Review</a></li>
            <li><a href="record.php">Records</a></li>
            <li><a href="user.php">Users</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" style="background-color: #463C94;">
                <li><a href="../user/home.php">User Homepage</a></li>
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

    <!-- konten -->
    <div class="container">
      <h2 style="color: #448aff;text-align: center;">Upload Approval</h2>
      <hr>
      <div class="btn" style="margin-bottom: 15px">
        <a href="../action.php?act=approveall" class="btn btn-primary btn-sm pull-left" role="button"> <span class="glyphicon glyphicon-check"></span> Approve All</a>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr class="row-name">
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Uploaded Time</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM ebooks WHERE approval='0'");
          $no=1;
          while ($data=mysqli_fetch_array($query)) {
            ?>
            <tr class="row-content">
              <td><?php echo $no++ ?></td>
              <td><?php echo $data['title'] ?></td>
              <td><?php echo $data['author'] ?></td>
              <td><?php echo $data['uploadtime'] ?></td>
              <td>
                <a class="btn btn-danger btn-xs" href="../action.php?act=deleteebook&id=<?php echo $data['id'] ?>" aria-label="Settings">
                  <i class="glyphicon glyphicon-remove-sign" aria-hidden="true"></i>
                </a>

                <a class="btn btn-info btn-xs" href="viewpdf.php?id=<?php echo $data['id'] ?>" aria-label="Settings">
                  <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                </a>

                <a class="btn btn-primary btn-xs" href="../action.php?act=approve&id=<?php echo $data['id']; ?>" aria-label="Settings">
                  <i class="glyphicon glyphicon-check" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- footer -->
      <div class="footer" style="background-color: #f4f8ff;">
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
    <?php } ?>
