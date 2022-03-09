<?php
//----------------------------------------------------------------------
//                      Όταν πατηθεί το κουμπί Insert
//---------------------------------------------------------------------- 
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE page_partners SET a11 = "'.$_POST['a'].'",
       						     a12 = "'.$_POST['b'].'",
								
						         a21 = "'.$_POST['c'].'",
						         a22 = "'.$_POST['d'].'",
							     a23 = "'.$_POST['e'].'",									
								 a24 = "'.$_POST['f'].'",
						         a25 = "'.$_POST['g'].'",
								 
								 d1 = "'.$_POST['h'].'",
						    	 d2 = "'.$_POST['i'].'",																 
						     	 d3 = "'.$_POST['j'].'",
							 	 d4 = "'.$_POST['k'].'"  ';	
									  
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