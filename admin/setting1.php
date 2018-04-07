<?php
include('../login1.php');
include('../connection.php');
if($_SESSION['login1']!=True){
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
	$query = $connection->prepare('UPDATE user1 SET username = :user where id = :id');
	$query->bindParam(':user',$user);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "username is successfully updated";
}
if($var == 'b'){
	$passo = $_POST['passo'];
	$pass = $_POST['pass'];
	$passn = $_POST['passn'];
	if($passo ==$row['password'])
	{
		if($pass == $passn)
		{
				$query = $connection->prepare('UPDATE user1 SET password = :pass where id = :id');
				$query->bindParam(':pass',$pass);
			$query->bindParam(':id',$id);
			$query->execute();
			echo "password is successfully updated";
	}
		else{
			echo "please type same password both the times";
		}
	}
	else{
			echo "You have typed wrong password";
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
	$query = $connection->prepare('UPDATE user1 SET mobile = :mobile where id = :id');
	$query->bindParam(':mobile',$mobile);
	$query->bindParam(':id',$id);
	$query->execute();
	echo "mobile number is successfully updated";
}

?>
