<?php
//-----------------------------------------------------------------------------------------
//                      ��� �� ����� Flash Professional 8,  ???????? ???? ????
//-----------------------------------------------------------------------------------------
$browser_name=$_FILES['Filedata']['name'];
$temp_name=$_FILES['Filedata']['tmp_name'];

$uploadDir="images/";	
$uploadFile=$uploadDir.basename($browser_name);             //images/aaa	

if(is_uploaded_file($temp_name)){
	
		$src=imagecreatefromjpeg($temp_name);                                 // ���������� ���� image ��� jpeg, ���� ���� �� �������� �� �� ������� resize.
	
		$oldwidth=imagesx($src);                                              // �������� ��� ���������� ��� ��� ������� �� ����������.
		$oldheight=imagesy($src);
		//----- ----- ----- -----
		//$newwidth=$oldwidth/10;                                             // ����� ����� �� ����������� ����������.
		$newwidth=800;
		//$newheight=$oldheight/10;
		$newheight=600;
		
		$dst=imagecreatetruecolor($newwidth,$newheight);                      // ���������� ���� ���������� image, true color.
		//----- ----- ----- -----
		imagecopyresampled($dst, $src, 0,0,0,0, $newwidth, $newheight, $oldwidth, $oldheight);         //��� ������� �� resize.
		
		imagejpeg($dst,$uploadFile,10);                                      // ��� ������������ ��� ������������ �� image ���� server.  
		
		//move_uploaded_file($a,$uploadFile);	                                   //move_uploaded_file  
}
?>

