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
  <title>New User</title>
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
          <li><a href="record.php">Records</a></li>
          <li class="active"><a href="user.php">Users</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i> User <b class="caret"></b></a>
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

  <!-- konten -->
  <div class="container">
    <div class="well">
      <form class="form-horizontal" method="post" <?php echo "action=\"../action.php?act=create&from=admin\""; ?>>
        <fieldset>
          <!-- Form Name -->
          <legend>Create New User</legend>
          <form class="form-group" action="index.html" method="post">
            <div class="form-group">
              <label class="col-md-4 control-label" for="username">Username</label>
              <div class="col-md-4">
                <input id="username" name="username" type="text" placeholder="Type an unique username" class="form-control input-md" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email</label>
              <div class="col-md-4">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="status">Status</label>
              <div class="col-md-4">
                <select name="status" class="form-control" required>
                  <option value="">- select user status -</option>
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Confirm Password</label>
              <div class="col-md-4">
                <input id="password" name="conpassword" type="password" placeholder="confirm password" class="form-control input-md" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label"></label>
              <div class="col-md-8">
                <button type="submit" class="btn btn-primary">CREATE</button>
              </div>
            </div>

          </form>

        </fieldset>
      </form>
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
