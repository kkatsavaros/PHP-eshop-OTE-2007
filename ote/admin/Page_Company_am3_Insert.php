<?php
//----------------------------------------------------------------------
//                      Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_company SET d1 = "'.$_POST['f'].'",
						    	d2 = "'.$_POST['g'].'"  ';
						     	
							        							 
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