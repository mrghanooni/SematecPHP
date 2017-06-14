<?php
$title = "MohammadReza Work Out!";
include "header.php";
include "db.php";
?>

<!-- Header with jquery-->

<header class="bgimg w3-display-container w3-grayscale-min" id="home">
 
<!-- include jquery First-->

 <script type= "text/javascript" src="jquery-3.2.1.min.js"> </script>
 
<!-- include CKEDROT after jquery-->

 <script src = "ckeditor/ckeditor.js"></script>
 <script type="text/javascript">      
	  $(document).ready(function(){
	  CKEDITOR.replace("field"); 
	  });   
 </script>
    
 <!---->   
    
     <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Open from 6am to 5pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px"><?php echo $_SESSION["username"]; ?> welcome to <br>my Cafe</span>
  </div>
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">15 Adr street, 5015</span>
  </div>
 
 <!-- include jquery and ckeditor-->


  
 <script type= "text/javascript" >
		$(document).ready(function(){
				
			$('#email').focusout (function(){
			
		    var email = document.getElementById("email").value;
            $.ajax({
                cache: false,
                type: "POST",
                url: "destination.php",
                data: { 
                      job: "checkDuplicate", 
                      email: email 
                      },
                //processData: true, //<— this isn't needed because it defaults to true anyway
                success: function (result) {
                   // alert(result);
                    if (result=="duplicate")
                    {
					  alert ("Your Email is taken before");
                      $('#email').css({"color": "red"});
                      $('#submit').prop("disabled", true);                    }
                    if (result=="nonduplicate")
                    {
					  alert ("Congratulations! You can register!");
                      $('#email').css({"color": "green"});
                      $('#submit').prop("disabled", false);
                    }
                    
                },
                error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
            });	
		});
							 
							 
						
					  });
	
	</script>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT MR CAFE PROJECT</span></h5>
    <p> In this project, I have covered the following issues for my first PHP project; <br> 
    - Login Form <br>
    - Register Form <br>
    - Change Login and Logout in the menue <br>
    - Hiding Login section when a user is logged in <br>
    - Chapcha for Login form <br>
    - Jquery for duplicate and non-duplicate Emails <br>
    - CKEDITOR for writing a description of a user <br>
    - Receiving an image as an Avatar from a user <br>
    - Json for getting the online Gold Price at footer.php <br>
    </p>
    <p>Folders can be seen in my project and how they are located.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"This project is as an exmaple for Sematec classes hold by Eng. Teymoori.</i></p>
      <p>MohammadReza Ghanoni</p>
    </div>
    <img src="http://localhost:8080/sematec/coffeeshop.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>My Email:</strong> ghanooni@gmail.com </p>
    <p><strong>Date:</strong> 2017, 06 jun</p>
  </div>
</div>

<!-- Login Container -->

<div class="w3-container" id="login" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">YOU CAN LOGIN HERE!</span></h5>
    <p>Please enter your information to login.</p>
    
    <!--<div id="googleMap" class="w3-sepia" style="width:100%;height:400px;"></div> -->
    <?php
		if ( $_SESSION["username"]==""){
			?>
			<p><span class="w3-tag">FYI!</span> Please Login here!</p>
			<p><strong>LOGIN</strong> with your correct information:</p>

			<form action="destination.php" method="POST">
			<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="User Name" required name="username"></p>
			<p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
			<p><input type=hidden name="job" value="login"</p>

			<Br><br>
			<input type="text" name="captcha"/>
			<img src="captcha.php">
			<Br><br>
			<p><button class="w3-button w3-black" type="submit">SUBMIT</button></p>
			</form>
		<?php
		}
		else {
			echo "<p><span class='w3-tag'>FYI!</span> You already Login!</p>";
			//it is sent via GET mothod 	
		}
		?>
    <!--<p><span class="w3-tag">FYI!</span> Please Login here!</p>
    <p><strong>LOGIN</strong> with your correct information:</p>
   
    <form action="destination.php" method="POST">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="User Name" required name="username"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
      <p><input type=hidden name="job" value="login"</p>
      <p><button class="w3-button w3-black" type="submit">SUBMIT</button></p>
    </form>-->
	
  </div>
</div>

</div>

<!-- Register Container -->
<div class="w3-container" id="register" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">YOU CAN REGISTER HERE!</span></h5>
    <p>Please enter your information to register.</p>
    
    <p><span class="w3-tag">FYI!</span> After you register, you will receive an email for the confirmation.</p>
    <p><strong>Register</strong> with your correct information:</p>
   
    <form action="destination.php" method="POST" enctype="multipart/form-data">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Family Name" required name="familyname"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Your Email Here" required name="email" id="email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="User Name" required name="username"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
      <textarea id="field" name="field"></textarea>
      <p><input type=hidden name="job" value="register"</p>
      <p><input type="file" name="avatar" id="avatar"></p> 
     
      <p><button class="w3-button w3-black" type="submit" id="submit">SUBMIT</button></p>
    </form>
	
  </div>
</div>

<!-- End page content -->
</div>



<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<?php
include "footer.php";
?>


