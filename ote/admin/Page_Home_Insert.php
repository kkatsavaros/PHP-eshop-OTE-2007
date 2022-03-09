<?php
//----------------------------------------------------------------------
//                       Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_home SET a11 = "'.$_POST['a'].'",
       						 a12 = "'.$_POST['b'].'",
							 
						     a21 = "'.$_POST['c'].'",
						     a22 = "'.$_POST['d'].'",
							 a23 = "'.$_POST['e'].'",
								 
						     a31 = "'.$_POST['f'].'",								
						     a32 = "'.$_POST['g'].'",
							 a33 = "'.$_POST['h'].'",
								 
							 d1 = now(),
						     d2 = "'.$_POST['j'].'",								
						     d3 = now(),
							 d4 = "'.$_POST['l'].'"  ';							 
							 
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