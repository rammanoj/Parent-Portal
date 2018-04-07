<?php
try{
	$connection = new PDO('mysql:host=localhost;dbname=student;charset=utf8mb4', 'root', 'manoj1999');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
	echo $err->getMessage();
	die();
}
?>
