<?php
//----------------------------------------------------------------------
//                          Εισαγωγή Δεδομένων
//----------------------------------------------------------------------
$_POST['a']=trim($_POST['a']);
  
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql = 'INSERT INTO  categories (category) VALUES ("'.$_POST['a'].'")';
		
$result = $db->query($sql);

if ($result) {
	$created = stripslashes($_POST['a']);
    echo 'duplicate=n&message='.urlencode($created);
	} else{
	echo 'duplicate=y&message='.urlencode('Υπάρχει κάποιο πρόβλημα...');
}

$db->close();

?>