<!DOCTYPE html>
<html>
<head>
	<title>inventory</title>
	<link rel ="stylesheet" type="text/css" href="sample.css"  />
</head>
<body>
<?php
// Written by Kenneth McElveen for CTI-110 FA 2020 Mr.Tyree
	//Open the file
	$invFile = fopen("inventory.txt", "a");
	//Retrieve User Input
	$itemName = $_POST["itemName"];
	$itemPrice = $_POST["itemPrice"];
	$itemNumber = $_POST["itemNumber"];
	//Add User Input to the File
	fputs($invFile, "\n$itemName, $itemPrice, $itemNumber ") ;
	//close the file
	fclose($invFile);
	//Redirect to Success Page
	header('Location: http://localhost:81/webtech/coursework/Final%20Project%20CTI%20110%20Kenneth%20McElveen/success.html');
	
?>

</body>
</html>