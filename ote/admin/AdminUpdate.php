<?php
//----------------------------------------------------------------------
//                          Ανανέωση Δεδομένων 
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE users SET first_name = "'.$_POST['a'].'",
						 family_name = "'.$_POST['b'].'",
						 telephone = "'.$_POST['c'].'",
						 email = "'.$_POST['d'].'",														  
						 username = "'.$_POST['f'].'"';
							 
$sql .= ' WHERE id = '.$_POST['id'];
$result=$db->query($sql);    
	
if($result){		
	$updated = 'Ανανεώθηκε ';
	$updated .= stripslashes($_POST['a']).' '.stripslashes($_POST['b']);
	$output = 'duplicate=n&message='.urlencode($updated);
}
		
echo $output;
$db->close();	
?>