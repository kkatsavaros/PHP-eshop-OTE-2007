<?php

if($_FILES['Filedata']['name']){

	$uploadDir="images/";
	
	$uploadFile=$uploadDir.basename($_FILES['Filedata']['name']);             //images/aaa
	
	move_uploaded_file($_FILES['Filedata']['tmp_name'],$uploadFile);
	
 }
	
?>

