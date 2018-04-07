<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPR schools</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function gotofile(){
	window.location = "form.php";
}
</script>
</head>
<body>
<center><h2>Welcome to the site login to continue</h2></center>
<br>
<div id="error" class="">
</div>
<br>
<div class="container">
  <form class="form-horizontal" action="login1.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4">Username:</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
      </div>
    </div>
</form>
 <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" name="submit" onclick="gotofile()">Sign up</button>
      </div>
    </div>
</div>
</body>
</html>
<?php
function error( $msg ) {
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
	$("#error").append("<p class=' . "text-center" . ' style= ' . "color:#ff0000".'><b>' . $msg . '</b> </p>");
	</script>';
}
?>