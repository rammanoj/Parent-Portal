<?php
include('../connection.php');
if($_POST['submit']){
	$name = $_POST['name'];
	$class = $_POST['class'];
	$section = $_POST['section'];
	$stuid = $_POST['stuid'];
	$img = $_POST['image'];
	$feep = $_POST['fee'];
	$feed = $_POST['feed'];
	$date = date('Y-m-d',strtotime($_POST['date']));
	$type = $_POST['type'];
	if($name != '' && $class != '' && $section != '' && $stuid != '' && $img != '' && $feep != '' && $feed != '' && $date != '' && $type != '')
	{
		if($_POST['model'] == "insert" )
		{
			$query = $connection->prepare("INSERT into $type(stuname,stuclass,stuid,dob,feepaid,feedue,section,image) values (:stuname,:stuclass,:id,:dob,:feepaid,:feedue,:section,:image)");
		}
		elseif($_POST['model'] == "update")
		{
			$query = $connection->prepare('UPDATE $type SET stuname = :stuname , stuclass = :stuclass , dob = :dob , feepaid = :feepaid , feedue = :feedue , section = :section , image = :image  where stuid = :id');
		}
		else
		{
			exit(0);
		}
		$query->bindParam(':stuname',$name);
		$query->bindParam(':stuclass',$class);
		$query->bindParam(':id',$stuid);
		$query->bindParam(':dob',$date);
		$query->bindParam(':feedue',$feed);
		$query->bindParam(':feepaid',$feep);
		$query->bindParam(':section',$section);
		$query->bindParam(':image',$img);
		$query->execute();
		$row = $query->rowCount();
		if($row>0)
		{
			echo "database sucessfully updated";
		}
		else
		{
			echo "there is a problem in updating database please try again";
		}
	}
	else
	{
			echo "please fill form completely";
	}
}
?>