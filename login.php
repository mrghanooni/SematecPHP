<!DOCTYPE html>
<html>
<title>MohammadReza Work Out!</title>
<?php
	include "public.php";
	$title = "Login Page";
	include "header.php";
	include "db.php";
	?>

<body>

<?php
	
	$job=$_POST['job'];
	if ($job=="login") {
		$name = getCleanText($_POST['name']);
		$familyname = getCleanText($_POST['familyname']);
		$username = getCleanText($_POST['username']);
		$password = getCleanText($_POST['password']);
		$email = getCleanText($_POST['email']);
		header("refresh:3;url=index.php");
		echo "<br> You are $name $familyname registered with $username as your username and your email address is $email. ";
	}
	else {
		header("refresh:3;url=index.php");
		echo "<br>Please check, something is wrong";
	}
		
?>


</body>
</html>
