<?php
//----------------------------------------------------------------------
//                       Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_home SET a31 = "'.$_POST['f'].'",								
						     a32 = "'.$_POST['g'].'",
							 a33 = "'.$_POST['h'].'"  ';
								 
							 
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	//$updated = 'ok Updated ';
	$updated = stripslashes($_POST['f']).' '.stripslashes($_POST['g']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>