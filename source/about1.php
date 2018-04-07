<?php
include('../login1.php');
include('../connection.php');
if($_SESSION['login']!=True)
{
	header('location: ../login.php');
}
else{
	$id = $_SESSION['id'];
	function retrieve($dbt,$name,$id)
	{
		global $connection;
		$get = $connection->prepare("SELECT * FROM " . $dbt . " where " . $name ." = :id");
		$get->bindParam(":id",$id);
		$get->execute();
		return $get->fetch(PDO::FETCH_ASSOC);
	}
	$query = retrieve("user1","id",$id);
}
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
	  window.location = "<?php echo $query['propic'];?>";
  }
  </script>
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
    <img src="<?php echo $query['propic'];?>" class="profile-image img-circle" width="20" height="20" onclick="goto()"><?php $name = $query['username'];  echo $name;?><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="setting.php"><i class="fa fa-cog"></i>Settings</a></li>
        <li class="divider"></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
	</li>
  </div>
</nav>
<?php
$name = "stuid";
$name1 = $name;
echo "<div class = 'container'> <h2>Marks</h2> </div>";
for($i=0;$i<3;$i++)
{
	if($i!=0)
	{
		$m = $i + 1;
		$name = $name1.$m;
	}
	if($query[$name] != '')
	{
		$query0 = retrieve("user","stuid",$query[$name]);
		$query1 = retrieve("mark","stuid",$query[$name]);
		$query2 = retrieve("unit2","stuid",$query[$name]);
		$query3 = retrieve("unit3","stuid",$query[$name]);
		$query4 = retrieve("unit4","stuid",$query[$name]);
		$query5 = retrieve("quater","stuid",$query[$name]);
		$query6 = retrieve("halfyear","stuid",$query[$name]);
		$query7 = retrieve("annual","stuid",$query[$name]);
	}
	else
	{
		break;
	}
	echo "<div class = 'container'>
	<table class = 'table table-hover'>
		<thead>
			<tr>
				<th>" . $query0['stuname'] . "</th><th>Unit -1</th><th>Unit -2</th><th>Unit -3</th><th>Unit -4</th><th>Quaterly</th><th>halfyearly</th><th>annual</th>
			</tr>
		</thead>
		<tbody>";
	if($query0['stuclass'] == 4 or $query0['stuclass'] == 5 or $query0['stuclass'] == 6 or $query0['stuclass'] == 7)
	{
		$subject = array("telegu","hindhi","english","maths","science","social");
		for($m=0;$m<6;$m++)
		{
			echo"<tr>
				<td>" . $subject[$m] . "<t/d><td>" . $query1[$subject[$m]] . "<t/d><td>" . $query2[$subject[$m]] . "<t/d><td>" . $query3[$subject[$m]] . "<t/d><td>" . $query4[$subject[$m]] . "<t/d><td>" . $query5[$subject[$m]] . "<t/d><td>" . $query6[$subject[$m]] . "<t/d><td>" . $query7[$subject[$m]] . "<t/d>
			</tr>";
		}
		echo "</tbody>";
	}
	elseif($query0['stuclass'] == 8 or $query0['stuclass'] == 9 or $query0['stuclass'] == 10)
	{
		$subject = array("telegu","hindhi","english","maths","physics","biology","social");
		for($m=0;$m<7;$m++)
		{
			echo"<tr>
				<td>" . $subject[$m] . "<t/d><td>" . $query1[$subject[$m]] . "<t/d><td>" . $query2[$subject[$m]] . "<t/d><td>" . $query3[$subject[$m]] . "<t/d><td>" . $query4[$subject[$m]] . "<t/d><td>" . $query5[$subject[$m]] . "<t/d><td>" . $query6[$subject[$m]] . "<t/d><td>" . $query7[$subject[$m]] . "<t/d>
			</tr>";
		}
		echo "</tbody>";
	}
}
?>
</div>
</body>
</html>
