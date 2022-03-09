<?php		
//------------------------------------------------------------------------
//           Εισαγωγή στοιχείων πελάτη στην φόρμα παραγγελλίας
//------------------------------------------------------------------------

// escape quotes and apostrophes if magic_quotes_gpc off
foreach($_POST as $key=>$value) {
	if (!get_magic_quotes_gpc()) {
		$temp = addslashes($value);
		$_POST[$key] = $temp;
	}
}
				
// create a Database instance and check username
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
				  
$sql = 'INSERT INTO customers (first_name,family_name,address,tk,town,telephone,creditcard) 
						VALUES ("'.$_POST['a'].'",
								"'.$_POST['b'].'",
								"'.$_POST['c'].'",
								"'.$_POST['d'].'",
								"'.$_POST['e'].'",
								"'.$_POST['f'].'",
								"'.$_POST['g'].'")';
	
$result = $db->query($sql);
					
if ($result) {
	$created = 'Your order has been inserted. Thank you very much '.$_POST['a'];
	echo 'duplicate=n&message='.urlencode($created);
}
		
$db->close();
?>