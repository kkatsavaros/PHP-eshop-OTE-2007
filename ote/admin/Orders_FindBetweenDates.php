<?php
//----------------------------------------------------------------------
//            Εύρεση Παραγγελιών ανάμεσα σε δύο ημερομηνίες
//----------------------------------------------------------------------


$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 

$sql='SELECT * FROM orders WHERE date>="'.$_POST['a'].'" AND date<="'.$_POST['b'].'"  ';
$result = $db->query($sql);	        

$numrows = $result->num_rows;	
$userlist = "total=$numrows";
	
$counter = 0;
	
while ($row = $result->fetch_assoc()) {
		$userlist .= '&date'.$counter.'='.repair_SQL_DATEONLY($row['date']);
		$userlist .= '&a'.$counter.'='.$row['company'];
		$userlist .= '&b'.$counter.'='.$row['model'];
		$userlist .= '&c'.$counter.'='.$row['number'];
		$userlist .= '&d'.$counter.'='.$row['price'];	
		
		$userlist .= '&e'.$counter.'='.$row['first_name'];
		$userlist .= '&f'.$counter.'='.$row['family_name'];
		$userlist .= '&g'.$counter.'='.$row['telephone'];
		$userlist .= '&h'.$counter.'='.$row['creditcard'];	
		
		$userlist .= '&j'.$counter.'='.$row['order_id'];	
						
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