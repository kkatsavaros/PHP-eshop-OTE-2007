<?php
//----------------------------------------------------------------------
//     Γέμισμα του Combo Box search_cb, με τον αριθμό παραγγελίας.
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT DISTINCT order_id FROM orders ORDER BY order_id DESC ';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // Ç ðñþôç ìåôáâëçôÞ ðïõ óôÝëíïõìå.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	/*$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));
	$userlist .= '&a'.$counter.'='.urlencode(stripslashes($row['company']));
	$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['model']));
    $userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['number']));
	$userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['price']));
	//-----
	$userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['first_name']));
	$userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['family_name']));
	$userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['telephone']));
	$userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['creditcard']));*/
	
	$userlist .= '&j'.$counter.'='.urlencode(stripslashes($row['order_id']));	
	
//	$userlist .= '&e'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['birthday']));

    $counter++;
}

echo $userlist;

$db->close();
?>