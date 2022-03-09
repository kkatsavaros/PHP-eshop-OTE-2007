<?php
//----------------------------------------------------------------------
//                      Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_partners SET d3 = "'.$_POST['j'].'",
							 	 d4 = "'.$_POST['k'].'"  ';	
									  
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	//$updated = 'ok Updated ';
	$updated = stripslashes($_POST['j']).' '.stripslashes($_POST['k']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>