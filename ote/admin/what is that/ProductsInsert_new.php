<?php
//----------------------------------------------------------------------
//                          Εισαγωγή Δεδομένων
//----------------------------------------------------------------------
  
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql = 'SELECT * FROM products WHERE number = "' . $_POST['d'] . '"';   // d=number.
		$result = $db->query($sql);
		$numrows = $result->num_rows;

if ($numrows > 0) {
			$duplicate = 'Duplicate number. Please choose another.';
			echo 'duplicate=y&message='.urlencode($duplicate);
} else { 
	$sql = 'INSERT INTO  products (category,company,model,number,picture,characteristics,price,offer,date)
			VALUES ("'.$_POST['a'].'",
					"'.$_POST['b'].'",
					"'.$_POST['c'].'",
					"'.$_POST['d'].'",
					"'.$_POST['e'].'",
					"'.$_POST['f'].'",
					"'.$_POST['g'].'",
					"'.$_POST['h'].'",now())';
					
			//    "'.$_POST['i'].'")';
			//      "'.$_POST['birthday'].'")';     //"'.sha1($_POST['pwd']).'")';
	
	$result = $db->query($sql);
	
	if ($result) {
		$created = 'Account created for : ';
		$created .= stripslashes($_POST['c']).' '.stripslashes($_POST['f']);
		echo 'duplicate=n&message='.urlencode($created);
		} else{
		echo 'duplicate=y&message='.urlencode('Υπάρχει κάποιο πρόβλημα...');
	}

	$db->close();
}
?>