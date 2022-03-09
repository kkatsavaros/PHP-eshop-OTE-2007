<?php
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop');		  
	$sql = 'TRUNCATE TABLE basket';    

	$result = $db->query($sql);	
	
	/*$sql = 'INSERT INTO basket (order_id) VALUES (now())';
	$result = $db->query($sql);	*/

?>