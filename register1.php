<?php
include('connection.php');
include('form.php');
if($_POST['submit']){
$form = $_POST;
$username = $form['username'];
$password = $form['password'];
$repass = $form['repass'];
$email = $form['email'];
$stuname = $form['stuname'];
$stuclass = $form['stuclass'];
$stuid = $form['stuid'];
$dob = $form['dob'];
$mobile = $form['mobile'];
if(isset($_POST['gender'])) {
$gender = $form['gender'];
}
$date = date('Y-m-d',strtotime($dob));

	
		if($username == '' or $password == '' or $repass == '' or $email =='' or $stuname == '' or $stuid =='' or $stuclass == '' or $dob =='' or $gender=='' && $mobile =='')
		{
			error("Please fill the form completely");
		}
		else
		{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				error("Please enter a valid email");
				die();
			}
			if(strlen($password)<12)
			{
				error("password must be atleast 12 characters");
				echo strlen($password);
				die();
			}
			if($password == $repass)
			{
				$query = $connection->prepare("SELECT * from user where stuname = :stuname AND stuid = :stuid AND stuclass = :stuclass");
				$query->bindParam(":stuname",$stuname);
				$query->bindParam(":stuid",$stuid);
				$query->bindParam(":stuclass",$stuclass);
				$query->execute();
				$count = $query->rowCount();
				if($count<=0)
				{
					error("There is no student in the school as per the given requirments");
					die();
				}
				else if($count == 1)
				{
					$query2 = $connection->prepare("SELECT * from user1 where email = :email");
					$query2->bindParam(":email",$email);
					$query2->execute();
					$count3 = $query2->rowCount();
					if($count3>0)
					{
						error("you have already registered");
						die();
					}
					$student = 'stuid';
					for($i=1;$i<4;$i++)
					{
						if($i>1)
						{
							$hello=$student.$i;
						}
						else
						{
							$hello=$student;
						}
						$query4 = $connection->prepare("SELECT * FROM user1 where $hello  = :stuid");
						$query4->bindParam(":stuid",$stuid);
						$query4->execute();
						$count4 = $query4->rowCount();
						if($count4>0)
						{
							error(" the account of the student is already registered");
							die();
						}
					}
						$query1 = $connection->prepare("INSERT into user1 (username,password,stuid,email,gender,date,mobile) values  (:username,:password,:stuid,:email,:gender,:date,:mobile)");
						$query1->bindParam(":username",$username);
						$query1->bindParam(":password",$password);
						$query1->bindParam(":email",$email);
						$query1->bindParam(":gender",$gender);
						$query1->bindParam(":date",$date);
						$query1->bindParam(":mobile",$mobile);
						$query1->bindParam(":stuid",$stuid);
						$query1->execute();
						$count1 = $query1->rowCount();
						if(isset($count1))
						{
							error("You have sucessfully registered");
						}
						else
						{
							error("there is some internal error please try again");
						}
				}
			}
			else
			{
				error("passwords donot match");
				die();
			}
		}
}
?>