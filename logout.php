<?php
include('login1.php');
unset($_SESSION['login']);
unset($_SESSION['login1']);
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function gotofile() {
	window.location = "login.php";
}
</script
</head>
<body>
<br><br><br><br>
<div class="message">
<p class="text-center " style="color:#00ff00;font-size:30px;"><b> Logout Successfully </b></p>
<br>
<div class="container">      
      <div class="col-sm-offset-5 col-sm-1">
        <button type="submit" class="btn btn-primary btn-block" name="login" onclick="gotofile()" >Login</button>
      </div>
	  </div>
</div>
</body>
</html>
