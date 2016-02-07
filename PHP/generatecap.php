<?php
session_start();
header("Content-type: image/png");

$word_1 = '';

for ($i = 0; $i < 4; $i++) 
{
    $word_1 .= chr(rand(97, 122));
}

$_SESSION['captcha'] = $word_1;



$dir = "./";
$image = imagecreatetruecolor(120, 80);

$font = "../fonts/Capt.ttf"; // font style you may give any you have / prefer

$color = imagecolorallocate($image, 0, 0, 0);// color

$white = imagecolorallocate($image, 255, 255, 232); // background color white

imagefilledrectangle($image, 0,0, 119, 150, $white);

imagettftext ($image, 40, 0, 20, 50, $color, $dir.$font, $_SESSION['captcha']);

for($x = 1; $x<=7; $x++){
		$x1 = rand(10, 50);
		$y1 = rand(10, 50);
		$x2 = rand(1, 400);
		$y2 = rand(1, 400);

		imageline($image, $x1, $y1, $x2, $y2, $color);

	}

imagepng($image);
?>