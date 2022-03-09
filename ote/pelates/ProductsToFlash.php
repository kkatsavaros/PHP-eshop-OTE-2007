<?php
//----------------------------------------------------------------------
//                     Αρχική Εμφάνιση όλων των προϊόντων
//----------------------------------------------------------------------
//							Ταξινόμηση ανάποδα ανά id.

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');		  
$sql = 'SELECT * FROM products ORDER BY id DESC';    

$result = $db->query($sql);	
$numrows = $result->num_rows;
	
$userlist = "total=$numrows";	
$counter = 0;
	
while ($row = $result->fetch_assoc()) {		
	$userlist .= '&id'.$counter.'='.$row['id'];
	$userlist .= '&b'.$counter.'='.$row['company'];
	$userlist .= '&c'.$counter.'='.$row['model'];
	$userlist .= '&d'.$counter.'='.$row['number'];
	$userlist .= '&e'.$counter.'='.$row['picture'];	
	$userlist .= '&f'.$counter.'='.$row['characteristics'];	
	$userlist .= '&g'.$counter.'='.$row['price'];
		
	$counter++;
}
	
echo $userlist;
?>