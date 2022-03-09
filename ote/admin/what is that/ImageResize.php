<?php

	$src=ImageCreateFromJPEG('miami006.jpg');
	
	$width=ImageSx($src);
	$height=ImageSy($src);
	
	$x=$width/5;
	$y=$height/5;
	
	$dst=ImageCreateTrueColor($x,$y);
	
	ImageCopyResampled($dst,$src,0,0,0,0,$x,$y,$width,$height);
	
	header('Content-Type: image/png');
	ImagePNG($dst);	
?>