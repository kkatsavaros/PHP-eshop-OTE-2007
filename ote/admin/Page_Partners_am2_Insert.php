<?php
//----------------------------------------------------------------------
//                      ???? ??????? ?? ?????? Insert
//---------------------------------------------------------------------- 
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_partners SET d1 = "'.$_POST['h'].'",
						    	 d2 = "'.$_POST['i'].'" ';
						     	 
									  
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	//$updated = 'ok Updated ';
	$updated = stripslashes($_POST['h']).' '.stripslashes($_POST['i']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>