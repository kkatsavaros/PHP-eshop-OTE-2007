<?php
//----------------------------------------------------------------------
//                          Διαγραφή Δεδομένων
//----------------------------------------------------------------------
  
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');  
	
$sql = 'DELETE FROM categories WHERE id = '.$_POST['id'];
$db->query($sql);
$db->close();
  
  
$revisedList = 'SELECT * FROM categories';

$deleted = $_POST['who'];

$output = 'duplicate=n&message='.urlencode($deleted);
echo $output .= '&'.getUserList($revisedList);

//---------------------------------------------------------------------

function getUserList($sql) {
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop');  
	$result = $db->query($sql);
	$numrows = $result->num_rows;
	$userlist = "total=$numrows";
	$counter = 0;
  
	while ($row = $result->fetch_assoc()) {  
    	$userlist .= '&id'.$counter.'='.$row['id'];
		$userlist .= '&a'.$counter.'='.$row['category'];
	
	    $counter++;
	}
	$db->close();
	return $userlist;
}

?>