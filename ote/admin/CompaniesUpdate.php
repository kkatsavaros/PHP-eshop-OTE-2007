<?php
//----------------------------------------------------------------------
//                          Ανανέωση Δεδομένων 
//---------------------------------------------------------------------- 
$_POST['a']=trim($_POST['a']);

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'UPDATE companies SET company = "'.$_POST['a'].'"';
        													 
$sql .= ' WHERE id = '.$_POST['id'];
$db->query($sql);    
$result = $db->query($sql);	
	
if($result){		
	$updated = stripslashes($_POST['a']);
	$output = 'duplicate=n&message='.urlencode($updated);
}else{
	$output='message='.urlencode('There is a problem...');
}
echo $output; 
	
$db->close();	
?>