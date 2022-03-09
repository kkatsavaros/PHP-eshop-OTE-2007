<?php
//-----------------------------------------------------------------------------------------------
//Αφού πατηθεί το κουμπί update, βρίσκει αυτό το πρόγραμμα την ζητούμενη εγγραφή
// και την πάει στα texts, στο Flash. Δεν χρειάζεται να έχει counter.
//-----------------------------------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'SELECT * FROM categories WHERE id = '.$_POST['id'];
$result = $db->query($sql);		
		  
while ($row = $result->fetch_assoc()) {  
	$userlist = '&id='.$row['id'];
	$userlist .= '&a='.$row['category'];
}
		  
echo $userlist;
		 
$db->close();

?>