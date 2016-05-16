<?php
	$imgfile="";  

	$imgarr=getimagesize($imgfile);

	$maxw=$imgarr[0];
	$maxh=$imgarr[1];
	$maxt=$imgarr[2];
	$maxm=$imgarr['mime'];

	$maxim=imagecreatefromjpeg($imgfile);

	$minw=50;
	$minh=20;


	if (($minw/$maxw)>($minh/$maxh)) { //do equal proportions
		$proport=$minh/$maxh;
	} else {
		$proport=$minw/$maxw;
	}

	$minw=floor($maxw*$proport);
	$minh=floor($maxh*$proport);
	$minim=imagecreatetruecolor($minw, $minh);

	imagecopyresampled($minim, $maxim, 0, 0, 0, 0, $minw, $minh, $maxw, $maxh);

	header("content-type:{$maxm}");  

	switch ($maxt) {
		case 1:
			$imgout="imagegif";
			break;
		
		case 2:
			$imgout="imagejpeg";
			break;
		case 3:
			$imgout="imagepng";
			break;
	}

	$reimgfile="s_".$imgfile;

	$imgout($minim);  
	$imgout($minim,$reimgfile);
?>