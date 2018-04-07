<?php
 include('../login1.php');
if($_SESSION['login1'] != True){
	header('location: ../logout.php');
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
	  window.location = "<?php echo $row1['propic'];?>";
  }
  function goto1(){
	  window.location = "csv.php";
  }
  function goto2(){
	  window.location = "insert.php";
  }
  function goto3(){
	  window.location = "mark.php";
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
    <img src="<?php echo $row1['propic'];?>" class="profile-image img-circle" width="20" height="20" onclick="goto()"><?php $name = $row1['username'];  echo $name;?><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="setting.php"><i class="fa fa-cog"></i>Settings</a></li>
        <li class="divider"></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<br><br><br>
<div class="container">
<h2>Uploads ...</h2>
</div>
<div class="container">
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal1">Insert/Update</button>
      </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Create new</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action ="csv.php" enctype="multipart/form-data">
			<input type="file" name="filename" id="filename"><br>
			<div class="form-group">
				<label class="control-label col-sm-4">class: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter class" name="class" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">type: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter exam type" name="type" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">Model: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter name" name="key" type="text">
				</div>
			</div><br><br><br>
			<input type="submit" name="submit" onclick="goto1()">
		  </form>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br><br>
   <div class="container">
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal4">Insert/update one</button>
      </div>
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Upload others things</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action ="insert.php">
			<div class="form-group">
				<label class="control-label col-sm-4">name: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter name" name="name" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">class: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter class" name="class" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">id: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter id" name="stuid" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">dob: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter date" name="date" type="date">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">fee paid: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter paid amount" name="fee" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">fee due: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter amount" name="feed" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">section: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter section" name="section" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">image location: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter location" name="image" type="text">
				</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">type: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter type" name="type" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">model: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter model" name="model" type="text">
				</div>
			</div><br><br><br>
			
			<input type="submit" name="submit" onclick="goto2()">
			</form>
			<br>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <br><br>
   <div class="container">
 <div class="col-sm-offset-4 col-sm-2">
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">Insert/update mark</button>
      </div>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		   <h4 class="modal-title">Upload others things</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action ="mark.php">
			<div class="form-group">
				<label class="control-label col-sm-4">name: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter name" name="name" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">class: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter class" name="class" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">id: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter id" name="id" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">telegu: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="telegu" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">hindhi: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="hindhi" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">English: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="english" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">maths: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="maths" type="text">
				</div>
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">science: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="science" type="text">
				</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">physics: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="physics" type="text">
				</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">Biology: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="biology" type="text">
				</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">Social: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter marks" name="social" type="text">
				</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">Exam type: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter exam type" name="type" type="text">
				</div>	
			</div><br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4">model: </label>
				<div class="col-sm-3">
					<input class="form-control" placeholder="Enter model" name="model" type="text">
				</div>	
			</div><br><br><br>
			<input type="submit" name="submit" onclick="goto3()">
			</form>
			<br>
		  <div class="modal-footer">
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>
</html>
