<html>
<meta charset="utf-8">
<head>
<title>
SPR schools
</title>
</head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<center><h2>Get signed in here</h2></center>
<br>
<div class="error">
</div>
<br>
<div class="container">
  <form class="form-horizontal" action="register1.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4">Username:</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter username" name="username">
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-4">Student name</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter student name" name="stuname">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4">Student class: </label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter student class" name="stuclass">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4">Student id:</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter student roll number" name="stuid">
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" placeholder="Enter password" name="password">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Re-Type password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" placeholder="Enter password" name="repass">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4">email:</label>
      <div class="col-sm-3">          
        <input type="email" class="form-control" placeholder="Enter email" name="email">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-4">DOB:</label>
	  <div class="col-sm-3">
	  <input type="date" class="form-control" name="dob">
	  </div>
	  </div>
<div class="form-group">
      <label class="control-label col-sm-4">Gender:</label>
	<label class="radio-inline">
      <input type="radio" name="gender" value="male">Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="female">Female
    </label>
	</div>
	 <div class="form-group">
      <label class="control-label col-sm-4">Mobile:</label>
	  <div class="col-sm-3">
	  <input type="text" class="form-control" name="mobile" placeholder="enter mobile number">
	  </div>
	  </div>
<div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <input type="submit" class="btn btn-primary btn-block" name="submit">
      </div>
    </div>
</form>
</body>
</html>
<?php
function error( $msg ) {
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
	$(".error").append("<p class=' . "text-center" . ' style= ' . "color:#ff0000".'><b>' . $msg . '</b> </p>");
	</script>';
}
?>