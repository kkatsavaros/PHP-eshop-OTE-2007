<?php
//----------------------------------------------------------------------
//                          Ανανέωση Δεδομένων 
//---------------------------------------------------------------------- 

//$_POST['quantity']='54';
//$_POST['id']='18';

	$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
	$sql = 'UPDATE basket SET quantity = "'.$_POST['quantity'].'"';
							 
	$sql .= ' WHERE order_id = '.$_POST['id'];
	$result=$db->query($sql);    
	
	if($result){		
		$updated = 'Account updated for ';
		$updated .= stripslashes($_POST['id']).' and '.stripslashes($_POST['quantity']);
		$output = 'duplicate=n&message='.urlencode($updated);
	}
		
	echo $output;
	$db->close();	
?>