<?php
    define('CAPTCHA_NUMCHARS', 6);  // number of characters in pass-phrase
  define('CAPTCHA_WIDTH', 100);   // width of image
  define('CAPTCHA_HEIGHT', 25);
  
	header('Content-type: image/png');
	
    $myImage = imagecreate(200, 100);
    $myGray = imagecolorallocate($myImage, 204, 204, 204);
    $myBlack = imagecolorallocate($myImage, 0, 0, 0);
    
	imageline($myImage, 15, 35, 120, 60, $myBlack);
	$pass_phrase = "";
  for ($i = 0; $i < CAPTCHA_NUMCHARS; $i++) {
    $pass_phrase .= chr(rand(97, 122));
  }

  // Store the encrypted pass-phrase in a session variable
  

  // Create the image
  $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);

  // Set a white background with black text and gray graphics
  $bg_color = imagecolorallocate($img, 255, 255, 255);     // white
  $text_color = imagecolorallocate($img, 0, 0, 0);         // black
  $graphic_color = imagecolorallocate($img, 64, 64, 64);   // dark gray
	
	imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);
	
	for ($i = 0; $i < 5; $i++) {
    imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }
  
   for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }
  
   imagettftext($img, 18, 0, 5, CAPTCHA_HEIGHT, $text_color, 'courbd.ttf', 'Hello');
	
	header('Content-type: image/png');
   // imagepng($myImage);
	imagepng($img);
    imagedestroy($myImage);
	imagedestroy($img);
?>
