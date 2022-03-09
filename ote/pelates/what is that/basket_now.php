<?php
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop');		  
	$sql = 'SELECT * FROM basket';    

	$result = $db->query($sql);	
    $numrows = $result->num_rows;
	
	$basketlist = "total=$numrows";	
	
	$counter = 0;
	
	while ($row = $result->fetch_assoc()) {		
		$basketlist .= '&id'.$counter.'='.$row['order_id'];
		$basketlist .= '&a'.$counter.'='.$row['number'];
		$basketlist .= '&b'.$counter.'='.$row['price'];
						
		$counter++;
	}
	
	echo $basketlist;
?>