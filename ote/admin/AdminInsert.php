<?php
//----------------------------------------------------------------------
//                          Εισαγωγή Δεδομένων
//----------------------------------------------------------------------
// escape quotes and apostrophes if magic_quotes_gpc is "off".
foreach($_POST as $key=>$value) {
	if (!get_magic_quotes_gpc()) {
		$temp = addslashes($value);
		$_POST[$key] = $temp;
	}
}
				
// create a Database instance and check username.
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
				  
$sql = 'SELECT * FROM users WHERE username = "' . $_POST['f'] . '"';   // f=username.
$result = $db->query($sql);
$numrows = $result->num_rows;
		
// if username already in use, send back error message.
if ($numrows > 0) {
	$duplicate = 'Duplicate username. Please choose another.';
	echo 'duplicate=y&message='.urlencode($duplicate);
} else { 
	$sql = 'INSERT INTO users (first_name,family_name,telephone,email,birthday,username,password) 
  		 					VALUES ("'.$_POST['a'].'",
									"'.$_POST['b'].'",
									"'.$_POST['c'].'",
									"'.$_POST['d'].'",
									"'.$_POST['e'].'",
									"'.$_POST['f'].'",
									"'.sha1($_POST['g']).'")';
		
$result = $db->query($sql);
					
if ($result) {
	$created = ''.$_POST['f'];
	echo 'duplicate=n&message='.urlencode($created);
	}
}
?>