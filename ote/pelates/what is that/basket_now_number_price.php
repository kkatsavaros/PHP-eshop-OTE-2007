<?php
//----------------------------------------------------------------------
//      �������� ��������� basket_now ��� number ��� price.
//----------------------------------------------------------------------

//$_POST['d']='3333';
//$_POST['g']='30';  
  
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql = 'INSERT INTO basket (number,price) 
					VALUES ("'.$_POST['d'].'",
							"'.$_POST['g'].'")';
		
$result = $db->query($sql);

if ($result) {
    $created = 'Insertion have done for  : ';
	$created .= stripslashes($_POST['d']);
    echo 'duplicate=n&message='.urlencode($created);
	} else{
	echo 'duplicate=y&message='.urlencode('������� ������ ��������...');
}

$db->close();

?>