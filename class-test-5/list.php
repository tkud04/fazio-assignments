<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=fazio', 'root', 'kudayisi');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the films
$query = "SELECT * FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

//add a foreach loop here to display all the films
foreach($films as $f)
{
  $dl = "details.php?id={$f['id']}";
  echo "<p><a href='{$dl}'>{$f['title']}</a></p>";
}
?>
</body>
</html>