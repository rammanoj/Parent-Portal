<?php
	include('../connection.php');
if($_POST['submit']){
	$class = $_POST['class'];
	$key = $_POST['key'];
	$type = $_POST['type'];
	if($class == '' or $key == '' or $type == '' )
	{
		echo "please enter detailes";
	}
	else
	{
	if(!isset($_FILES['filename']) or $_FILES['filename'] == '')
	{
		echo "please upload a file before entering";
	}
	else
	{
		$filename = $_FILES['filename']['name'];	
		$tmpname = $_FILES['filename']['tmp_name'];
		if($key == 'insert' and $type != 'user')
		{		
			$file = fopen($tmpname,"r");
			while(!feof($file))
			{
				$data = fgetcsv($file);
				if(($class == 6 or $class == 4 or $class == 5 or $class == 7) and $type != 'user')
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("INSERT into " . $type . " (stuname,stuid,class,telegu,hindhi,english,maths,science,social) values (:stuname,:stuid,:class,:telegu,:hindhi,:english,:maths,:science,:social)");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":telegu",$data[2]);
						$query->bindParam(":hindhi",$data[3]);
						$query->bindParam(":english",$data[4]);
						$query->bindParam(":maths",$data[5]);
						$query->bindParam(":science",$data[6]);
						$query->bindParam(":social",$data[7]);
						$query->bindParam(':class',$class);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
				elseif(($class == 8 or $class ==9 or $class == 10) and $type!= 'user')  
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("INSERT into" . $type . " (stuname,stuid,class,telegu,hindhi,english,maths,physics,biology,social) values (:stuname,:stuid,:class,:telegu,:hindhi,:english,:maths,:physics,:biology,:social)");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":telegu",$data[2]);
						$query->bindParam(":hindhi",$data[3]);
						$query->bindParam(":english",$data[4]);
						$query->bindParam(":maths",$data[5]);
						$query->bindParam(":physics",$data[6]);
						$query->bindParam(":biology",$data[7]);
						$query->bindParam(":social",$data[8]);
						$query->bindParam(':class',$class);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
			}
			fclose($file); 
		}
		elseif($key == 'update' and $type != 'user')
		{
			$file = fopen("$tmpname","r");
			while(!feof($file))
			{
				$data = fgetcsv($file);
				if(($class == "6" or $class == "4" or $class == "5" or $class == "7") and $type != 'user')
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("UPDATE " . $type . " SET stuname = :stuname ,class = :class , telegu = :telegu , hindhi = :hindhi , english = :english , maths = :maths , science = :science , social = :social where stuid = :stuid");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":telegu",$data[2]);
						$query->bindParam(":hindhi",$data[3]);
						$query->bindParam(":english",$data[4]);
						$query->bindParam(":maths",$data[5]);
						$query->bindParam(":science",$data[6]);
						$query->bindParam(":social",$data[7]);
						$query->bindParam(':class',$class);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
				elseif(($class == "8" or $class =="9" or $class == "10") and $type != 'user')
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("UPDATE " . $type . " SET stuname = :stuname ,class = :class , telegu = :telegu , hindhi = :hindhi , english = :english , maths = :maths , physics = :physics , biology = :biology , social = :social where stuid = :stuid");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":telegu",$data[2]);
						$query->bindParam(":hindhi",$data[3]);
						$query->bindParam(":english",$data[4]);
						$query->bindParam(":maths",$data[5]);
						$query->bindParam(":physics",$data[6]);
						$query->bindParam(":biology",$data[7]);
						$query->bindParam(":social",$data[8]);
						$query->bindParam(':class',$class);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
			}
			fclose($file);
		}
		elseif($type == 'user')
		{
			$file = fopen($tmpname,"r");
			while(!feof($file))
			{
				$data = fgetcsv($file);
				if($type == 'user' and $key == 'insert')
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("INSERT into user (stuname,stuid,stuclass,dob,feepaid,feedue,section,image) values (:stuname,:stuid,:stuclass,:dob,:feepaid,:feedue,:section,:image)");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":stuclass",$data[2]);
						$query->bindValue(":dob",date('Y-m-d',strtotime($data[3])));
						$query->bindParam(":feepaid",$data[4]);
						$query->bindParam(":feedue",$data[5]);
						$query->bindParam(":section",$data[6]);
						$query->bindParam(":image",$data[7]);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
				elseif($key == 'update' and $type == 'user')  
				{
					if($data[0] != NULL)
					{
						$query =  $connection->prepare("UPDATE user SET stuname=:stuname , stuclass = :stuclass , dob = :dob , feepaid = :feepaid , feedue = :feedue , section = :section , image = :image where stuid = :stuid");
						$query->bindParam(":stuname",$data[0]);
						$query->bindParam(":stuid",$data[1]);
						$query->bindParam(":stuclass",$data[2]);
						$query->bindValue(":dob",date('Y-m-d',strtotime($data[3])));
						$query->bindParam(":feepaid",$data[4]);
						$query->bindParam(":feedue",$data[5]);
						$query->bindParam(":section",$data[6]);
						$query->bindParam(":image",$data[7]);
						$query->execute();
						$count = $query->rowCount();
					}
					else
					{
						if($count>0)
						{
							echo "the database is successfully updated";
						}
						break;
					}
				}
			}
			fclose($file);
		}
	}
	}
}
	?>