<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../aaa/css/bootstrap.min.css">
  <link rel="stylesheet" href="../aaa/css/ownstyle.css">
</head>
<body>
  <div class="row text-center">
    <h1 style="margin-top: 20px;">e-boocation</h1>
  </div>
  <div id="row login-overlay" class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Sign Up to continue</h4>
     </div>
     <div class="modal-body">
       <div class="row">
         <div class="col-xs-6">
           <div class="well">
             <form id="loginForm" method="POST" <?php echo "action=\"../action.php?act=create&from=signup\"" ?>>
              <input type="hidden" name="status" value="user">
              <div class="form-group">
               <label for="username" class="control-label">Username</label>
               <input type="text" class="form-control" id="username" name="username" placeholder="username">
               <span class="help-block"></span>
             </div>
             <div class="form-group">
               <label for="username" class="control-label">Email</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="email">
               <span class="help-block"></span>
             </div>
             <div class="form-group">
               <label for="password" class="control-label">Create Password</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="password">
               <span class="help-block"></span>
             </div>
             <div class="form-group">
               <label for="password" class="control-label">Confirm Password</label>
               <input type="password" class="form-control" id="password" name="conpassword" placeholder="password">
               <span class="help-block"></span>
             </div>
             <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
             <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=badrus@unida.gontor.ac.id&subject=bantuan&body=saya ingin bertanya tentang" target="_blank">
               Need a Help</a>
             </form>
           </div>
         </div>
         <div class="col-xs-6">
           <p class="lead">Register for <span class="text-success">FEATURES</span></p>
           <ul class="list-unstyled" style="line-height: 3">
             <li><span class="glyphicon glyphicon-ok"></span> Share your e-book</li>
             <li><span class="glyphicon glyphicon-ok"></span> Get free e-books</li>
             <li><span class="glyphicon glyphicon-ok"></span> Connect with people</li>
             <li><span class="glyphicon glyphicon-ok"></span> Be usefull</li>
           </ul>
         </div>
       </div>
     </div>
   </div>
 </div>

 <script src="../aaa/js/bootstrap.min.js"></script>
 <script src="../aaa/js/jquery.js"></script>
</body>
</html>
