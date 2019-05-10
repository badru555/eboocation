<?php
require_once('koneksi.php');
$act = $_GET['act'];



  //signup
if ($act=='create'){
  $username= $_POST['username'];
  $email= $_POST['email'];
  $password= $_POST['password'];
  $conpassword= $_POST['conpassword'];
  $status = $_POST['status'];
  if ($conpassword==$password) {
    $from = $_GET['from'];
    $create = "INSERT INTO user(username,email,status,password) VALUES('$username','$email','$status','$password')";
    mysqli_query($koneksi,$create);
    if ($from=='signup') {
      $URL="user/index.php";
      echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';

    }
    else{
      $URL="admin/user.php";
      echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
    }
  }
  else {
    echo "YOUR PASSWORD DOES NOT MATCH";
  }


}

  //upload
elseif ($act=='upload'){
    // attribut file
  $harusekstensi = array('doc','docx','pdf');
  $nama = $_FILES['file']['name'];
  $x = explode('.',$nama);
  $ekstensi = strtolower(end($x));
  $size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];

    // attribut lainnya
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $publisher= $_POST['publisher'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  date_default_timezone_set("Asia/Bangkok");
  $uploadtime = date ("Y-m-d H:i:s");
  $iduser = $_POST['iduser'];

  if (in_array($ekstensi, $harusekstensi)==true){
    if($size < 7000000){
      move_uploaded_file($file_tmp, 'aafile/'.$nama);
      $create = "INSERT INTO ebooks(title,author,year,publisher,category,description,filename,uploadtime,approval,iduser)
      VALUES('$title','$author','$year','$publisher','$category','$description','$nama','$uploadtime','0','$iduser')";
      $query = mysqli_query($koneksi,$create);
      if ($query) {
        $URL="user/uploaded.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
      } else{
        echo 'FAILED UPLOADING FILE';
      }
    }
    else {
      echo "YOUR FILE IS TOO LARGE";
    }
  }
  else {
    echo "THE EXTENSION IS NOT VALID";
  }
}

  // APPROBAL
elseif ($act=='approve') {
  $approve = "UPDATE ebooks SET approval='1' WHERE id='$_GET[id]'";
  mysqli_query($koneksi,$approve);
  $URL="admin/review.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
elseif ($act=='approveall') {
  mysqli_query($koneksi,"UPDATE ebooks SET approval='1'");
  $URL="admin/review.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}

  // DOWNLOAD
elseif ($act=='download') {
  $id=$_GET['id'];
  $query= mysqli_query($koneksi, "SELECT * FROM ebooks WHERE id='$id'");
  $data = mysqli_fetch_array($query);
  $file = 'aafile/'.$data['filename'];
  if (file_exists($file)) {
    // header('Content-Description: File Transfer');
    // header('Content-Type: application/octet-stream');
    // header('Content-Disposition: attachment; filename="'.basename($file).'"');
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate');
    // header('Pragma: public');
    // header('Content-Length: ' . filesize($file));

    echo "<meta name=\"Content-Description\" content=\"File Transfer\">";
    echo "<meta name=\"Content-Type: application/octet-stream\">";
    echo "<meta name=\"Content-Disposition\" content=\"attachment; filename='.basename($file).'\">";
    echo "<meta name=\"Expires\" content=\"0\">";
    echo "<meta name=\"Cache-Control\" content=\"must-revalidate\">";
    echo "<meta name=\"Pragma\" content=\"public\">";
    echo "<meta name=\"Content-Length\" content=\"filesize($file)\">";
    readfile($file);
    exit;
  }
  else {
    echo "FILES IS NOT CURRENTLY AVAILABLE";
  }
}

  // VIEW PDF
elseif ($act=='view') {
  $id=$_GET['id'];
  $query= mysqli_query($koneksi, "SELECT * FROM ebooks WHERE id='$id'");
  $data = mysqli_fetch_array($query);
  $file = 'aafile/'.$data['filename'];
  if (file_exists($file)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: inline; filename="'.basename($file).'"');
    readfile($file);
    exit;
  }
}

  // UPDATEEBOOK
elseif ($act=='updateebook') {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $publisher= $_POST['publisher'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $uploader = $_POST['uploader'];
  $approval = $_POST['approval'];

  $query = "UPDATE ebooks SET title='$title', author='$author', year='$year', publisher='$publisher',
  category='$category', approval='$approval', description='$description' WHERE id='$id'";
  mysqli_query($koneksi, $query);
  $status = $_POST['status'];
  if ($status == 'admin') {
    $URL="admin/record.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
  } else {
    $URL="user/account.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
  }

}
elseif ($act=='updateuser') {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $conpassword = $_POST['conpassword'];
  if ($oldpassword==NULL) {
    mysqli_query($koneksi,"UPDATE user SET username='$username', email='$email' WHERE id='$id'");
    $URL="user/account.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
  }
  elseif ($oldpassword == $password AND $newpassword!=NULL AND $newpassword == $conpassword) {
    mysqli_query($koneksi,"UPDATE user SET username='$username', email='$email', password='$newpassword' WHERE id='$id'");
    session_start();
    session_destroy();
    echo "<script>alert('YOUR PASSWORD HAVE CHANGED, RELOGIN!');
    window.location='index.php'</script>";
  }
  else {
    echo "FAILED, YOU TYPE A MISMATCH PASSWORD!";
    exit;
  }
}
// DELETE EBOOK
elseif ($act=='deleteebook') {
  mysqli_query($koneksi, "DELETE FROM ebooks WHERE id ='$_GET[id]'");
  $URL="admin/record.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
// DELETE USER
elseif ($act=='deleteuser') {
  $id= $_GET['id'];
  mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
  $URL="admin/user.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
elseif ($act=='restore') {
  $id = $_GET['id'];
  $trash = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ebooktrash WHERE id='$id'"));
  $idd = $trash['id'];
  $title = $trash['title'];
  $author = $trash['author'];
  $year = $trash['year'];
  $publisher= $trash['publisher'];
  $category = $trash['category'];
  $description = $trash['description'];
  $filename = $trash['filename'];
  $uploadtime = $trash['uploadtime'];
  $approval = $trash['approval'];
  $iduser = $trash['iduser'];
  $target = mysqli_fetch_array(mysqli_query($koneksi, "INSERT INTO ebooks(id,title,author,year,publisher,category,description,filename,uploadtime,approval,iduser)
  VALUES ('$idd','$title','$author','$year','$publisher','$category','$description','$filename','$uploadtime','$approval','$iduser')"));

  mysqli_query($koneksi, "DELETE FROM ebooktrash WHERE id='$id'");
  $URL="admin/ebooktrash.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
}
elseif ($act=='deletepermanent') {
  $id= $_GET['id'];
  mysqli_query($koneksi, "DELETE FROM ebooktrash WHERE id='$id'");
  unlink('aafile/'.$_GET['file']);
  $URL="admin/ebooktrash.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
} ?>
