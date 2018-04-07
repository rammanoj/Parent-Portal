<?php
include('../login1.php');
include('../connection.php');
if($_SESSION['login']!=True){
	header('Location : ../logout.php');
}
$id = $_SESSION['id'];
$var = $_POST['var'];
	$query1 = $connection->prepare('SELECT * from  user1 where id = :id');
	$query1->bindParam(':id',$id);
	$query1->execute();
	$row = $query1->fetch(PDO::FETCH_BOTH);
if($var == 'a'){
	$user = $_POST['user'];
	if($user != ''){
	$query = $connection->prepare('UPDATE user1 SET username = :user where id = :id');
	$query->bindParam(':user',$user);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "username is successfully updated";
	}
	else{
		echo "please enter a username blank one can't be taken";
	}
}
if($var == 'b'){
	$passo = $_POST['passo'];
	$pass = $_POST['pass'];
	$passn = $_POST['passn'];
	if($passo == $row['password'])
	{
		if(($pass == $passo) and ($pass!='' and $passo!='' and $passn != ''))
		{
				$query = $connection->prepare('UPDATE user1 SET password = :pass where id = :id');
				$query->bindParam(':pass',$passn);
				$query->bindParam(':id',$id);
				$query->execute();
				echo "password is successfully updated";
		}
		else
		{
			echo "please type same password both the times and don't leave blank";
		}
	}
	else{
			echo "You have typed wrong old password";
	}
}
if($var == 'c'){
	$email1 = $_POST['email1'];
	if(!filter_var($email1,FILTER_VALIDATE_EMAIL))
			{
				echo "Please enter a valid email ";
				die();
			}
	
	$query = $connection->prepare('UPDATE user1 SET email = :email1 where id = :id');
	$query->bindParam(':email1',$email1);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "email is successfully updated";
}
if($var == 'd'){
	$mobile = $_POST['mobile'];
	if($mobile !=''){
	$query = $connection->prepare('UPDATE user1 SET mobile = :mobile where id = :id');
	$query->bindParam(':mobile',$mobile);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "mobile number is successfully updated";
	}
	else{
		echo "please fillthe blank";
	}
}
if($var == 'e'){
	$date1 = $_POST['date1'];
	if($date1!=''){
	$date = date('Y-m-d',strtotime($date1));
	$query = $connection->prepare('UPDATE user1 SET  date = :date where id=:id');
	$query->bindParam(':date',$date);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "date of birth is successfully updated";
	}
	else{
		echo "please enter a valid date of birth";
	}
}

if($var == 'f'){
	$stuid = $_POST['stuname'];
	$student = "stuid";
	$name = $student;
	
	if($stuid != '')
	{
	$query = $connection->prepare("SELECT * from user where stuid = :stuid");
	$query->bindParam(':stuid',$stuid);
	$query->execute();
	$fetch = $query->fetch(PDO::FETCH_ASSOC);
	$row = $query->rowCount();
	for($i=1;$i<4;$i++)
	{
		if($i>1)
		{
			$student = $name . $i;
		}
		$query0 =  $connection->prepare("SELECT * from user1 where $student  = :student");
		$query0->bindParam(':student',$stuid);
		$query0->execute();
		$row2 = $query0->rowCount();
		if($row2>0)
		{
			echo "the student you are trying to register is already registered";
			die();
		}
	}
	if($row > 0)
	{
		$query6 = $connection->prepare("SELECT * from user1 where id = :id");
		$query6->bindParam(':id',$id);
		$query6->execute();
		$row = $query6->fetch(PDO::FETCH_BOTH);
		$stu1 = $row['stuid2'];
		$stu2 = $row['stuid3'];
		if($stu1 == '')
		{
			$query = $connection->prepare('UPDATE user1 SET stuid2 = :stuname where id = :id');
			$query->bindParam(':stuname',$stuid);
			$query->bindParam(':id',$id);
			$query->execute();
			echo "student got sucessfully added to your account";
		}
		elseif($stu2 == '')
		{
			$query = $connection->prepare('UPDATE user1 SET stuid3 = :stuname where id = :id');
			$query->bindParam(':stuname',$stuid);
			$query->bindParam(':id',$id);
			$query->execute();
			echo "student got sucessfully added to your account";
		}
		else
			echo "you have registered atmost number of students to your account";
		}
		else{
			echo "there is no student as per given id";
		}
	}
	else{
		echo "pleasse fill the blank";
}
}
?>