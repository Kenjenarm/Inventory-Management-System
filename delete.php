<!DOCTYPE html>
<html>
<head>
	<title>inventory</title>
	<link rel ="stylesheet" type="text/css" href="sample.css"  />
</head>
<body>
<?php
// Written by Kenneth McElveen for CTI-110 FA 2020 Mr.Tyree
//Get user input
$itemName = $_POST["itemName"];
//establish read/write variables open with proper permissions
$read = fopen('inventory.txt', 'r');
$write = fopen('inventory.tmp', 'w'); // opens as a temp writeable file 
//establish variable to specify line replaced is false
$replaced = false;
//while not end of file read  line is the current line
while (!feof($read)) {
  $line = fgets($read); // get the current line
  if (stristr($line,"$itemName")) {  //if the string contains the users input 
    $line = "\nItem Deleted\n"; //reset line variable to replace with item deleted 
    $replaced = true; //set replaced to true 
  }
  fputs($write, $line); // write the new line over the old line in the temp file
}
fclose($read); fclose($write); // close both files
if ($replaced)  //if replaced is true
{
  rename('inventory.tmp', 'inventory.txt'); // replace the txt file with the temp file 
  header('Location: http://localhost:81/webtech/coursework/Final%20Project%20CTI%20110%20Kenneth%20McElveen/success.html'); // redirect to success page 
} else { //if replaced is false
  unlink('inventory.tmp'); //delete the temp file
  print("<h1>This Item Is Not In The Inventory!</h1>"); // speaks for itself
  print("<p><h1>Please Go Back</h1></p>");
}
?>
</body>
</html>
