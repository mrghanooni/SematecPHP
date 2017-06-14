<?php
include "public.php";
?>

<!DOCTYPE html>


<html>
<title><?php echo $title; ?></title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost:8080/sematec/Style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
}
.bgimg {
    background-position: center;
    background-size: cover;
    background-image: url("http://localhost:8080/sematec/coffeehouse.jpg");
    min-height: 75%;
}
.menu {
    display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-black">ABOUT</a>
    </div>
    <div class="w3-col s3">
    
        <?php
		if ( $_SESSION["username"]==""){
			echo "<a href='#login' class='w3-button w3-block w3-black'>LOGIN</a>";
		}
		else {
			echo "<a href='destination.php?job=logout' class='w3-button w3-block w3-black'>LOGOUT</a>";
			//it is sent via GET mothod 	
		}
		?>
   
    </div>
    <div class="w3-col s3">
      <!--<a href="<?php /*?><?php echo esc_url(home_url('/') ).'#where'; ?><?php */?>">Register</a>-->
      <a href="#register" class="w3-button w3-block w3-black">REGISTER</a>
    </div>
  </div>
</div>
