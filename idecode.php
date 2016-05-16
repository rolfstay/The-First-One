<?php  
//a easy CAPTCHA with session
	session_start();
	$im=imagecreatetruecolor(80, 25);

	$white=imagecolorallocate($im, 255, 255, 255);
	$red=imagecolorallocate($im, 255, 0, 0);
	$green=imagecolorallocate($im, 0, 255, 0);
	$blue=imagecolorallocate($im,0, 0, 255);
	$gray=imagecolorallocate($im, 50, 50, 50);

	imagefill($im, 0, 0, $gray);
	for ($i=0; $i < 300; $i++) { 
		imagesetpixel($im, mt_rand(0,80), mt_rand(0,25), $white);
	}

	$strarr=array_merge(range(0,9),range(a,z),range(A,Z));
	shuffle($strarr);

	$str=join('',array_slice($strarr, 0,4));
	$_SESSION['idecode']=$str;

	$fontfile="fonts/Ubuntu-LI.ttf";//Here is fonts,you can find your own fonts

	imagettftext($im, 20, 0, 5, 25, $white, $fontfile, $str);
	header("content-type:image/png");
	imagepng($im);
	imagedestroy($im);
?>