<?php
//------------------------------------------------------------------------------------------------
//       ���� ������� �� ������ update, ������� ���� �� ��������� ��� ��������� �������
//             ��� ��� ���� ��� texts, ��� Flash. ��� ���������� �� ���� counter.
//------------------------------------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'SELECT * FROM companies WHERE id = '.$_POST['id'];
$result = $db->query($sql);		
		  
while ($row = $result->fetch_assoc()) {  
	$userlist = '&id='.$row['id'];
	$userlist .= '&a='.$row['company'];	
}
		  
echo $userlist;
		 
$db->close();

?>