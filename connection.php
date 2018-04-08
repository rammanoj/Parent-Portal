<?php
try{

	// PDO is used in connecting different kinds of databases.
	// For more refrence goto - http://php.net/manual/en/book.pdo.php
	// set the  correct password, username and host before running it.
	$connection = new PDO('mysql:host=localhost;dbname=student;charset=utf8mb4', 'root', '');

  // set PDO error mode to Exception
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
	echo $err->getMessage();
	die();
}
?>
