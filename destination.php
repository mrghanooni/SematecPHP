<?php

	include "db.php";
	include "public.php";

	$job=$_REQUEST['job'];
	if ($job=="register")
	{
		$conn = getconnected();
		if ($conn == null) 
		{
			echo "Connection Failed";
			exit;
		}
		else
		{
			
		$name = getCleanText($_POST['name']);
		$familyname = getCleanText($_POST['familyname']);
		$username = getCleanText($_POST['username']);
		$password = getCleanText($_POST['password']);
		$email = getCleanText($_POST['email']);
		
		
		if(file_exists("avatar/".$_FILES["avatar"]["name"]))
		{
			echo $_FILES["avatar"]["name"]."already exists!";
		}	
			else {
				$file = $_FILES["avatar"]["name"];
				$filePath = "avatar/".$file;
				echo $filePath;
				if (move_uploaded_file($_FILES["avatar"]["tmp_name"],$filePath)){
				$sql = "INSERT INTO users (`Name`, `Username`, `Password`, `Email`, `avatar`) VALUES ('$name', '$username', '$password', '$email', '$filePath')";
				$result = $conn->query($sql);
					if ($result)
		{
			header("refresh:5;url=index.php");
			echo "Connection Successful";
					}
					else echo "Failed";
				}
			}
			
						
		
		echo "<br>$name";
		echo "<br> You are $name $familyname registered with $username as your username and your email address is $email"; 
		
		}
	}

	// —------------— check Duplicate —---------------

	if ($job == 'checkDuplicate')
	{

	  $email = $_REQUEST['email'];   //username from ajax codes in the script tag on top of register page
	  $conn = getconnected();

		  $query = "SELECT * FROM users WHERE email='$email'";
		  $check = $conn -> query ($query);

	  if ($check -> num_rows != 0)
	  {
		echo "duplicate"; //duplicate
	  } else 
	  {
		echo "nonduplicate"; //non-duplicate
	  }

	}

	// —------------— check Login —---------------


	if ($job == 'login')
	{

		  $username = $_REQUEST['username']; //username from ajax codes in the script tag on top of register page
		  $password = $_REQUEST['password']; 
		  $code = $_REQUEST ['captcha'];
          
		  $conn = getconnected();

			  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			  $check = $conn -> query ($query);
		  if ($code == $_SESSION['captcha'])
		  {

			  if ($check -> num_rows != 0)
			  {
				header("refresh:2; url=index.php");
				$_SESSION["username"]=$username;

				echo "Welcome dear $username";
			  } else {
				header("refresh:2; url=index.php/#login");
				echo "Username or Password is not correct!"; //non-duplicate

			  } 
		  
          }
			else {
		    echo "captcha is wrong";

		  }
	}


	// —------------— check Logout —---------------


	if ($job == 'logout')
	{
		 header("refresh:2; url=index.php");
			  $_SESSION["username"]="";
			
		 echo "Thank you for visiting our Cafe website";
	}
	
?>
