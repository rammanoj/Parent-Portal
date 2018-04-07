<?php
	include('connection.php');
	session_start();
	if(isset($_POST['login']))
	{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errflag  = false;
    if($username == '' and $password == '') {
		include('login.php');
     error("Please fill the credentials completely");
       $errflag = true;
    }
    if ($errflag == false) {
       SignIn($username,$password);
    }
	}
	function SignIn($username,$password){
	global $filename;
	global $connection;
	$search = $connection->prepare("SELECT * FROM user1 where username = :username AND password = :password");
	$search->bindParam(':username',$username);
	$search->bindParam(':password',$password);
	$search->execute();
	$count = $search->rowCount();
	$row = $search->fetch(PDO::FETCH_BOTH);
	if($count> 0)
	{
		$_SESSION['id'] = $row['id'];
		if($username == "admin" && $password == "sprschool123")
		{
			 $_SESSION['login1'] = True;
			header("Location: admin/admin.php");
		}
		else
		{
			 $_SESSION['login'] = True;
			header("Location: source/home.php");
		}
		
	}
	else{
		include('login.php');
		error("wrong email or password");
	}
}
?>