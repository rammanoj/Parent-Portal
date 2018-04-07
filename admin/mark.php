<?php
include('../connection.php');
if($_POST['submit'])
{
	$name = $_POST['name'];
	$class = $_POST['class'];
	$id = $_POST['id'];
	$telugu = $_POST['telegu'];
	$hindhi = $_POST['hindhi'];
	$english = $_POST['english'];
	$maths = $_POST['maths'];
	$social = $_POST['social'];
	$type = $_POST['type'];
	$science = $_POST['science'];
	$physics = $_POST['physics'];
	$biology = $_POST['biology'];
	if($name == '' or $class == '' or $id == '' or $telugu == '' or $hindhi == '' or $english == '' or $maths == '' or $science == '' or $physics == '' or $biology == '' or $social == '' or $type == '' or $_POST['model'] == '')
	{
		echo "please fill the form completely";
	}
	else
	{
		if($class == 4 or $class == 5 or $class == 6 or $class == 7)
		{
			$science = $_POST['science'];
			$physics = 0;
			$biology = 0;
		}
		elseif($class = 8 or $class == 9 or $class == 10)
		{
			$science = 0;
			$physics = $_POST['physics'];
			$biology = $_POST['biology'];
		}
		if($_POST['model'] == "insert" )
		{
			$query = $connection->prepare("INSERT into $type  (stuname,class,stuid,telegu,hindhi,english,maths,science,physics,biology,social) values (:stuname,:class,:id,:telegu,:hindhi,:english,:maths,:science,:physics,:biology,:social)");
		}
		elseif($_POST['model'] == "update")
		{
			$query = $connection->prepare("UPDATE $type  SET stuname = :stuname , class = :class , telegu = :telegu , hindhi = :hindhi , english = :english , maths = :maths , science = :science , physics = :physics , biology = :biology , social = :social  where stuid = :id");
		}
		else
		{
			echo "please fill the form in valid manner";
			exit(0);
		}
		$query->bindParam(':stuname',$name);
		$query->bindParam(':class',$class);
		$query->bindParam(':id',$id);
		$query->bindParam(':telegu',$telugu);
		$query->bindParam(':hindhi',$hindhi);
		$query->bindParam(':english',$english);
		$query->bindParam(':maths',$maths);
		$query->bindParam(':science',$science);
		$query->bindParam(':physics',$physics);
		$query->bindParam(':biology',$biology);
		$query->bindParam(':social',$social);
		$query->execute();
		$row = $query->rowCount();
		if($row>0)
		{
			echo "database sucessfully updated";
		}
		else
		{
			echo "there is a problem in updating database please try again later";
		}
	}
}
?>