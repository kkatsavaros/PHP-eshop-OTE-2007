<?php

	$src=ImageCreateFromJPEG($_FILES['userfile']['name']);
	
	$width=ImageSx($src);
	$height=ImageSy($src);
	
	$x=$width/15;
	$y=$height/15;
	
	$dst=ImageCreateTrueColor($x,$y);
	
	ImageCopyResampled($dst,$src,0,0,0,0,$x,$y,$width,$height);
	
	header('Content-Type: image/png');
	ImagePNG($dst);	
?>