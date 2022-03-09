<?php
//----------------------------------------------------------------------
//                          Ανανέωση Δεδομένων 
//---------------------------------------------------------------------- 

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE products SET category = "'.$_POST['a'].'",
       						company = "'.$_POST['b'].'",
						    model = "'.$_POST['c'].'",
						    number = "'.$_POST['d'].'",
						    picture = "'.$_POST['e'].'",								
						    characteristics = "'.$_POST['f'].'",
						    price = "'.$_POST['g'].'",
						    offer = "'.$_POST['h'].'",
						    date = "'.$_POST['i'].'"';
							 
$sql .= ' WHERE id = '.$_POST['id'];
$db->query($sql);    
$result = $db->query($sql);
	
if($result){		
	$updated = 'ok Updated ';
	$updated .= stripslashes($_POST['a']).' '.stripslashes($_POST['b']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('problem...');
}
echo $output; 
	
$db->close();	
?>