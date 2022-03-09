<?php
// check correct variables have been received through the POST array
if (isset($_POST['username']) && isset($_POST['password'])) {
		
		// initiate the session
		session_start();
		
		// escape quotes and apostrophes if magic_quotes_gpc off
		foreach($_POST as $key=>$value) {
			if (!get_magic_quotes_gpc()) {
				$temp = addslashes($value);
				$_POST[$key] = $temp;
			}
		}
		
		// create a Database instance and check username and password
		$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		  
		$sql = 'SELECT * FROM users WHERE username = "'.$_POST['username'].'" AND password = "'.sha1($_POST['password']).'"'; 
		$result = $db->query($sql);  
		
		//----------------------------------------------------------------------------
		// if a match is found, approve entry; otherwise reject
		if ($result->num_rows > 0) {
				$_SESSION['authenticated'] = $_POST['username'];   // Δημιουργία μεταβλητής session authenticated.
				echo 'authenticated=ok';				
		  } else {
				echo 'authenticated=getLost';
		  }
		//----------------------------------------------------------------------------
		$numrows = $result->num_rows;
		
		$userlist = "&total=$numrows";    // Η πρώτη μεταβλητή που στέλνουμε.
		
		$counter = 0;
		
		while ($row = $result->fetch_assoc()) {
		
			$userlist .= '&a'.$counter.'='.$row['first_name'];
			$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['family_name']));
			$userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['username']));
		
			$counter++;
		}
		echo $userlist;
		//----------------------------------------------------------------------------
		  // close the database connection  
		$db->close();
}
?>