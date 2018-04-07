<?php
include('../login1.php');
include('../connection.php');
$id = $_SESSION['id'];
if($_SESSION['login1'] != True){
	header('location: ../logout.php');
}
else{
	$query = $connection->prepare('SELECT * from user1 where id = :id');
	$query->bindParam(':id',$id);
	$query->execute();
	$row  = $query->fetch(PDO::FETCH_BOTH);
	if(isset($_FILES['filename']['name']) and $_FILES['filename']['name'] != NULL)
	{
	if($row['propic'] != '' and file_exists($row['propic']))
	{
			unlink($row['propic']);
	}
	$filename = $_FILES['filename']['name'];	
	$tmpname = $_FILES['filename']['tmp_name'];
	$filesize = $_FILES['filename']['size'];
	$dirpath = "../img";
	$slash = "/";
	$dirfile = $dirpath.$slash.basename($filename);
	$filetype1 = pathinfo($dirfile,PATHINFO_EXTENSION);
	if($filetype1!= 'PHP' && $filetype1 != 'php' && $filetype1!='JPEG' && $filetype1 != 'jpeg' && $filetype1!='JPG' && $filetype1!='PNG' && $filetype1 != 'png' && $filetype1 != 'CSV' && $filetype1 != 'jpg'){
	echo "please select only specified files";
	}
	else{
	if($filesize > 5000000){
		echo "file size greater than 5 MB cannot be uploaded";
		}
	else{
			if(file_exists($dirfile)){
				echo "the type of file which you are trying to upload is already to the server";
				}
			else{
					move_uploaded_file($tmpname,$dirfile);
					$name = $id . ".$filetype1";
					$name1 = $dirpath.$slash.$name;
					rename($dirfile,$dirpath . $slash .  $name);
					$query = $connection->prepare('UPDATE user1 SET propic = :propic where id = :id');
					$query->bindParam(':propic',$name1);
					$query->bindParam(':id',$id);
					$query->execute();
					echo "uploaded successfully";
				}
		}
	}
	}
	else{
		echo "please upload your file first";
	}
}
?>

