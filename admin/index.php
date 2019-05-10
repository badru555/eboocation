<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="../aaa/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aaa/css/ownstyle.css">
</head>
<body>
    <div class="row text-center">
      <h1 style="margin-top: 50px;">e-boocation Dasboard</h1>
  </div>
  <div id="row login-overlay" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel">Login to continue</h4>
       </div>
       <div class="modal-body">
           <div class="row">
               <div class="col-xs-6">
                   <div class="well">
                       <form id="loginForm" method="POST" action="../checklogin.php">
                           <div class="form-group">
                               <label for="username" class="control-label">Username</label>
                               <input type="text" class="form-control" id="username" name="username" placeholder="username">
                               <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                               <label for="password" class="control-label">Password</label>
                               <input type="password" class="form-control" id="password" name="password" placeholder="password">
                               <span class="help-block"></span>
                           </div>
                           <input type="hidden" name="status" value="admin">
                           <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                           <button type="submit" class="btn btn-success btn-block">Login</button>
                           <a href="">Forgot password</a>
                       </form>
                   </div>
               </div>
               <div class="col-xs-6">
                   <p class="lead">Log in for <span class="text-success">FEATURES</span></p>
                   <ul class="list-unstyled" style="line-height: 2">
                       <li><span class="glyphicon glyphicon-ok"></span> Share your e-book</li>
                       <li><span class="glyphicon glyphicon-ok"></span> Get free e-books</li>
                       <li><span class="glyphicon glyphicon-ok"></span> Manage e-books</li>
                       <li><span class="glyphicon glyphicon-ok"></span> Do a review</li>
                       <li><span class="glyphicon glyphicon-ok"></span> Add user</li>
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
