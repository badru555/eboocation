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
  <title>User</title>
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
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="review.php">Review</a></li>
          <li><a href="record.php">Records</a></li>
          <li class="active"><a href="user.php">Users</a></li>
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
    <h2 style="color: #448aff;text-align: center;"> User Management </h2>
    <hr>
    <div class="row" style="margin-bottom: 10px;">

      <div class="col-md-4">
        <a style="margin-right: 15px;" href="create.php" class="btn btn-primary btn-sm pull-left" role="button"> <span class="glyphicon glyphicon-plus"></span> &nbsp Create User</a>
      </div>
      <div class="col-md-6">
        <form class="form-search" action="user.php" method="post">
          <div id="custom-search-input">
              <div class="input-group col-md-6 pull-right">
                  <input type="text" name="search" class="search-query form-control input-sm" placeholder="Search" />
                  <span class="input-group-btn">
                      <button class="btn btn-danger btn-sm" type="submit">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>
                  </span>
              </div>
          </div>
        </form>
      </div>
      <div class="col-md-2 pull-right">
        <form class="from form-horizontal" method="get" action="user.php">
          <div class="btn-group btn-group-sm text-center pull-right" role="group">
            <a type="submit" name="level" class="btn btn-default" href="user.php">All</a>
            <button type="submit" name="level" class="btn btn-default" value="admin">Admin</button>
            <button type="submit" name="level" class="btn btn-default" value="user">User</button>
          </div>
        </form>
      </div>

    </div>
    <div class="row well">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr class="row-name info">
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
            <th>Option</th>
          </tr>
        </thead>
        <?php
        require "../koneksi.php";


        if (isset($_GET['level'])) {
          $sort=$_GET['level'];
          $user=mysqli_query($koneksi, "SELECT * FROM user WHERE status='$sort'");
        }
        elseif (isset($_POST['search'])){
          $keyword = $_POST['search'];
          $user=mysqli_query($koneksi, "SELECT * FROM user WHERE username LIKE '%$keyword%'");
        }
        else {
          $user=mysqli_query($koneksi, "SELECT * FROM user");
        }

        $no = 1;
        while ($data = mysqli_fetch_array($user)) {
          ?>
          <tbody>
            <tr class="row-content">
              <td><?php echo $no++ ?></td>
              <td><?php echo $data['username'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td>
                <?php
                if ($data['status']=='user') {
                 echo "<i class=\"label label-info\">user</i>";
               }
               elseif ($data['status']=='admin') {
                echo "<i class=\"label label-warning\">admin</i>";
              }
              ?>
            </td>
            <td>
              <a class="btn btn-danger btn-xs" href="../action.php?act=deleteuser&id=<?php echo $data['id'] ?>" aria-label="Settings">
               <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
             </a> &nbsp
             <a class="btn btn-info btn-xs" href="viewuser.php?id=<?php echo $data['id'] ?>" aria-label="Settings">
               <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
             </a>
           </td>
         </tr>
       </tbody>
       <?php } ?>
     </table>
   </div>

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
