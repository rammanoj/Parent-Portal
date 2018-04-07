<?php
 include('../login1.php');
if($_SESSION['login'] != True){
	header('location: ../login.php');
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function goto(){
	  window.location = "<?php echo $row1['propic'];?>";
  }

</script>
<style>
#myCarousel {
  height: auto;
  width: auto;
  overflow: hidden;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">SPR School</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="detail.php">Student Details</a></li>
	  <li><a href="about1.php">Marks & Attendence</a></li>
    </ul>
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
<div class="container">
<?php
echo "<h2>Welcome you are logged in Successfully $name</h2>";
?>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Announcments</button>
  <br>
  <div id="demo" class="collapse">
    Any announcements regarding the school students can be written here. 
  </div> 
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <img src="1.jpg" alt="1" style="height:550px;width:100%;">
      </div>

      <div class="item">
        <img src="2.jpg" alt="2" style="height:550px;width:100%;">
      </div>
    
      <div class="item">
        <img src="3.jpg" alt="3" style="height:550px;width:100%">
      </div>
    </div>

    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><b>Sample text</b></div>
      <div class="panel-body">
			Some sample text about school can be written
	  <h2>by Rammanoj Potla</h2>
	   
	  </div>
    </div>
</div>
</div>
</body>
</html>