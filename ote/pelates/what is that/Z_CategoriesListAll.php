<?php
//----------------------------------------------------------------------
//                      Εμφάνιση Δεδομένων 
//----------------------------------------------------------------------
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM categories';

$result = $db->query($sql);
$numrows = $result->num_rows;

$userlist = "total=$numrows";    // Η πρώτη μεταβλητή που στέλνουμε.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	$userlist .= '&id'.$counter.'='.$row['id'];
	$userlist .= '&a'.$counter.'='.$row['category'];
	
    $counter++;
}
echo $userlist;

$db->close();

?>