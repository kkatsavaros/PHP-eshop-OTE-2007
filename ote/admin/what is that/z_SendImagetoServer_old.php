<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Upload a File</title>
</head>

<body>

<p>Εισαγωγή εικόνας</p> 
<form enctype="multipart/form-data" action="UploadImageFile.php" method=post>

	<input type="hidden" name="MAX_FILE_SIZE" value="9000000">
	Upload this file: <input type="file" name="userfile" >
	<input type="submit" value="Send image">
	
</form>
<hr/>


</body>
</html>

<?php	
	if (isset($_GET['ok'])) {
		echo "<br>";
		echo "'File uploaded successfully.";
	}		
?>

<?php	
	if (isset($_GET['not_jpg'])) {
		echo "<br>";
		echo "'Problem: file is not image jpg.";
	}		
?>

<?php	
	if (isset($_GET['not_upload'])) {
		echo "<br>";
		echo "'Problem: file is not image gif.";
	}		
?>
<?php	
	if (isset($_GET['else'])) {
		echo "<br>";
		echo "Problem: Possible file upload attack.";
	}		
?>