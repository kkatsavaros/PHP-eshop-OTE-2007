<?php
//----------------------------------------------------------------------
//                      Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_services SET d3 = "'.$_POST['k'].'",
						    	 d4 = "'.$_POST['l'].'" ';
						     	
							        							 
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	//$updated = 'ok Updated ';
	$updated = stripslashes($_POST['k']).' '.stripslashes($_POST['l']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>