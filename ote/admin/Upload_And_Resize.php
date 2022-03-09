<?php
//-----------------------------------------------------------------------------------------
//                      Από το βιβίο Flash Professional 8,  ???????? ???? ????
//-----------------------------------------------------------------------------------------
$browser_name=$_FILES['Filedata']['name'];
$temp_name=$_FILES['Filedata']['tmp_name'];

$uploadDir="images/";	
$uploadFile=$uploadDir.basename($browser_name);             //images/aaa	

if(is_uploaded_file($temp_name)){
	
		$src=imagecreatefromjpeg($temp_name);                                 // Δημιουργία ενός image από jpeg, έτσι ώστε να μπορούμε να το κάνουμε resize.
	
		$oldwidth=imagesx($src);                                              // Πέρνουμε τις διαστάσεις και τις βάζουμε σε μεταβλητές.
		$oldheight=imagesy($src);
		//----- ----- ----- -----
		//$newwidth=$oldwidth/10;                                             // Αυτές είναι οι καινούργιες διαστάσεις.
		$newwidth=800;
		//$newheight=$oldheight/10;
		$newheight=600;
		
		$dst=imagecreatetruecolor($newwidth,$newheight);                      // Δημιουργία ενός καινούριου image, true color.
		//----- ----- ----- -----
		imagecopyresampled($dst, $src, 0,0,0,0, $newwidth, $newheight, $oldwidth, $oldheight);         //Εδώ γίνεται το resize.
		
		imagejpeg($dst,$uploadFile,10);                                      // Εδώ δημουργείται και αποθηκεύεται το image στον server.  
		
		//move_uploaded_file($a,$uploadFile);	                                   //move_uploaded_file  
}
?>

