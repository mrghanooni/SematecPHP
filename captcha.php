<?php 
  session_start();
  
  header ("Content-Type: image/png");
  $image = imagecreate (200, 100);
  $image_background = imagecolorallocate($image, 0, 0, 0);
  
  
  $text_color = imagecolorallocate($image, 70, 70, 70);
  $fontfile = "arial.ttf";
  
  $code = rand (1000, 1000000);
  $_SESSION['captcha'] = $code;
  
  imagettftext($image, 30, 0, 35, 60, $text_color, $fontfile, $code);
  
  $pixel_color = imagecolorallocate($image, 0, 100, 255);
  
  for ($i = 0; $i < 1000; $i++){
    imagesetpixel ($image, rand(0, 200), rand(0, 100), $pixel_color);
  }
  
  $line_color = imagecolorallocate($image, 64, 64, 64);
  
  for ($i=0; $i<10; $i++){
    imageline ($image, 0, rand(0, 200), rand(0, 100), rand(0, 200), $line_color);
    
  }
  
  imagepng($image);
  imagedestroy($image);
  
?>