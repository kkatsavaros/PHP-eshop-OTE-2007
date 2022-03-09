<?php
//----------------------------------------------------------------------
//                          Εμφάνιση δεδομένων
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM page_company';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // Ç ðñþôç ìåôáâëçôÞ ðïõ óôÝëíïõìå.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	$userlist .= '&a'.$counter.'='.$row['a11'];
	$userlist .= '&b'.$counter.'='.$row['a12'];
	
	$userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['a21']));
    $userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['a22']));
	$userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['a23']));
	
	$userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['d1']));
	$userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['d2']));
	
	$userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['d3']));
	$userlist .= '&i'.$counter.'='.urlencode(stripslashes($row['d4']));
		
//	$userlist .= '&i'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));

    $counter++;
}

echo $userlist;

$db->close();

function repair_SQL_DATEONLY($theString) {
	$arr1=explode(" ", $theString);
	$arrDate=explode("-", $arr1[0]);
	$arrdate2=array_reverse($arrDate);
	$arrDate3=implode("-", $arrdate2);

	return $arrDate3;
}

?>