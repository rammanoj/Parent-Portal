<?php
	include('../connection.php');
	$class = $_POST['class'];
	$type = $_POST['type'];
	$exam = $_POST['exam'];
	if($class == '' or $type == '' or $exam == '')
	{
		echo "please fill the credentials completely";
	}
	else
	{
		if(!isset($_FILES['filename']) and $_FILES['filename'] == '')
		{
			echo "please upload the file first";
		}
		else
		{
			$filename = $_FILES['filename']['name'];	
			$tmpname = $_FILES['filename']['tmp_name'];
			$file = fopen($tmpname,"r");
			while(!feof($file))
				{
					$data = fgetcsv($file);
					if($data[0] != NULL)
					{
						if($exam != 'user')
						{
							if($type == 'Insert')
							{
								if($class == 4 or $class == 5 or $class == 6 or $class == 7)
								{
									$query =  $connection->prepare("INSERT into " . $exam . " (stuname,stuid,telegu,hindhi,english,maths,science,social) values (:stuname,:stuid,:telegu,:hindhi,:english,:maths,:science,:social)");
									$detail = array("stuname","stuid","telegu","hindhi","english","maths","science","social");
									for($m=0;$m<8;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
								}
								elseif($class == 8 or $class == 9 or $class == 10)
								{
									$detail = array("stuname","stuid","telegu","hindhi","english","maths","physics","biology","social");
									$query =  $connection->prepare("INSERT into " . $exam . " (stuname,stuid,telegu,hindhi,english,maths,physics,biology,social) values (:stuname,:stuid,:telegu,:hindhi,:english,:maths,:physics,:biology,:social)");
									for($m=0;$m<9;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
								}
								else
								{
									echo "please enter correct credentials";
									exit(0);
								}
							}
							elseif($type == 'Update')
							{
								if($class == 4 or $class == 5 or $class == 6 or $class == 7)
								{
									$query =  $connection->prepare("UPDATE " . $exam . " SET stuname = :stuname , telegu = :telegu , hindhi = :hindhi , english = :english , maths = :maths , science = :science , social = :social where stuid = :stuid");
									$detail = array("stuname","stuid","telegu","hindhi","english","maths","science","social");
									for($m=0;$m<8;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
								}
								elseif($class == 8 or $class == 9 or $class == 10)
								{
									$detail = array("stuname","stuid","telegu","hindhi","english","maths","physics","biology","social");
									$query =  $connection->prepare("UPDATE " . $exam . " SET stuname = :stuname , telegu = :telegu , hindhi = :hindhi , english = :english , maths = :maths , physics = :physics ,biology = :biology , social = :social where stuid = :stuid");
									for($m=0;$m<9;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
								}
								else
								{
									echo "please enter correct credentials";
									exit(0);
								}
							}
							$query->execute();
							$count = $query->rowCount();
						}
						elseif($exam == 'user')
						{
							$detail = array("stuname","stuclass","stuid","dob","fee paid","fee due","section","image");
							if($type == 'Insert')
							{
								$query =  $connection->prepare("INSERT into " . $exam . " (stuname,stuclass,stuid,dob,fee paid,fee due,section,image) values (:stuname,:stuclass,:stuid,:dob,:fee paid,:fee due,:section,:image)");
								for($m=0;$m<8;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
							}	
							elseif($type == 'Update')
							{
								$query =  $connection->prepare("UPDATE " . $exam . " SET stuname = :stuname , stuclass = :stuclass , dob = :dob , fee paid = :fee paid , fee due = :fee due , section = :section ,image = :image where stuid = :stuid");
								for($m=0;$m<8;$m++)
									{
										$query->bindParam(':'.$detail[$m],$data[$m]);
									}
							}
						}
					}
					else
						{
							if($count > 0)
							{
								echo "database sucessfully updated";
								exit(0);
							}
							else
							{
								echo "there is a problem in updating database or there are no credentials provided";
								exit(0);
							}
							break;
						}
				}
			fclose($file);
		}
	}
?>
							