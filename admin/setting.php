<?php
include('../login1.php');
include('../connection.php');
if($_SESSION['login1']!=True){
	header('Location : ../login.php');
}
$id = $_SESSION['id'];
$search1 = $connection->prepare("SELECT * FROM user1 where id=:id");
	$search1->bindParam(":id",$id);
	$search1->execute();
	$row1 = $search1->fetch(PDO::FETCH_BOTH);
?>
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
  function goto(){
	  window.location = "setting1.jpg";
  }
  function goto1(){
	  window.location = "upload.php";
  }
  function gotofunc(){
	  window.location = "<?php echo $row1['propic'];?>";
  }
  </script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">SPR School</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
			  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?php echo $row1['propic'];?>" class="profile-image img-circle" onclick="gotofunc()" width="20" height="20"> <?php $name = $row1['username']; echo $name;?><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="setting.php"><i class="fa fa-cog"></i>Settings</a></li>
        <li class="divider"></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Account settings</h2>
      <label class="control-label col-sm-10">username :  <?php $name = $row1['username']; echo $name;?></label>
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">change username</button>
      </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Change username</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="setting1.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4">new Username:</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter username" name="user">
      </div>
    </div>
	<input type="hidden" name="var" value="a">
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" onclick="goto()">change</button>
      </div>
    </div>
	</form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="container">
      <label class="control-label col-sm-10" type="password">password:  <?php $name = strlen($row1['password']); for($i=0;$i<$name;$i++) { echo "*";};?></label>
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal1">change password</button>
      </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Change password: </h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="setting1.php" method="POST">
		  <div class="form-group">
      <label class="control-label col-sm-4">old password: </label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter password" name="passo" type="password">
      </div>
	  </div>
    <div class="form-group">
      <label class="control-label col-sm-4">new password: </label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter password" name="pass" type="password">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4">confirm password: </label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter password" name="passn" type="password">
      </div>
    </div>
	<input type="hidden" name="var" value="b">
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" onclick="goto()">change</button>
      </div>
    </div>
	</form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="container">
      <label class="control-label col-sm-10">email :  <?php $name = $row1['email']; echo $name;?></label>
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">change email</button>
      </div>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Change email</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="setting1.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4">new email`:</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter email" name="email1">
      </div>
    </div>
	<input type="hidden" name="var" value="c">
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" onclick="goto()">change</button>
      </div>
    </div>
	</form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    <div class="container">
      <label class="control-label col-sm-10">mobile :  <?php $name = $row1['mobile']; echo $name;?></label>
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal3">change number</button>
      </div>
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Change mobile number</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="setting1.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-4">new mobile :</label>
      <div class="col-sm-3">
        <input class="form-control" placeholder="Enter mobile number" name="mobile">
      </div>
    </div>
	<input type="hidden" name="var" value="d">
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-3">
        <button type="submit" class="btn btn-primary btn-block" onclick="goto()">change</button>
      </div>
    </div>
	</form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br>
     <div class="container">
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal10">upload profile pic</button>
      </div>
  <div class="modal fade" id="myModal10" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Upload profile pic</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action ="upload.php" enctype="multipart/form-data">
	<input type="file" name="filename" id="filename"><br>
	<input type="hidden" value="5242880" name="size"><br>	
	<button type=submit" onclick="goto1()">upload</button>
	</form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>



