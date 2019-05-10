<?php
require_once "koneksi.php";
$user = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];


$query = "SELECT * FROM user WHERE username='$user' AND password='$password' AND status='$status'";
$login = mysqli_query($koneksi, $query);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if($ketemu>0 and $status=='user'){
  session_start();
  $_SESSION['username'] = $r['username'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['status'] = $r['status'];
  $_SESSION['id'] = $r['id'];
  $URL="user/home.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
elseif($ketemu>0 and $status=='admin'){
  session_start();
  $_SESSION['username'] = $r['username'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['status']  = $r['status'];
  $_SESSION['id']  = $r['id'];
  $URL="admin/dashboard.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
else{
  echo "<div id=\"login\"><h1 class=\"fail\">login gagal! username & password salah</h1>";
  echo "<p class=\"fail\"><a href=\"index.php\">ulangi lagi</a></p></div>";
}
?>
