<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Uploaded Files of the server</title>
</head>

<body>

<h1>Browsing</h1>
<?php
  $current_dir = 'C:/photosoteshop/';
  $dir = opendir($current_dir);

  echo "<p>Upload directory is $current_dir</p>";
  
  echo '<p>Directory Listing:</p><ul>';
  while ($file = readdir($dir))
  {
      echo "<li>$file</li>";
  }
  echo '</ul>';
  closedir($dir);
?>
</body>
</html>
