<?php
//----------------------------------------------------------------------
//                      Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_contacts SET a11 = "'.$_POST['a'].'",
	
       							 d1 = "'.$_POST['b'].'",
						         d2 = "'.$_POST['c'].'"';								        							 
									
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	//$updated = 'ok Updated ';
	$updated = stripslashes($_POST['a']).' '.stripslashes($_POST['c']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>