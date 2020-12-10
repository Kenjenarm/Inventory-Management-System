<!DOCTYPE html>
<html>
<head>
	<title>inventory</title>
	<link rel ="stylesheet" type="text/css" href="sample.css"  />
</head>
<body>
<?php
	// Written by Kenneth McElveen for CTI-110 FA 2020 Mr.Tyree
	
	$invFile = fopen("inventory.txt", "rw"); // open inventory file and set variable
	
	$password = $_POST["masterPass"]; // Retrieve user input for password as password variable
	
	$action = $_POST["actionType"]; // Retrieve user selection from drop down as action variable
	
	$pw = 'ASDF1234'; //set main password
	
	if ($password != $pw) //if the user input password does not match the main password
	{
		print ("<h1>$password is not the correct password</h1>"); // errors for wrong password
		print ("<p><h2>Please Go Back And Try Again</h2></p>");
	}	
	else //if user input password matches main password
	{		
		if ($action == "view") // if user input for action = view
		{	
			while (!feof($invFile)) // while not end of file
			{
				$totalInventory = fgets($invFile); //get each line
				print("<p>$totalInventory</p>"); // print each line 
			}
			fclose($invFile);// close file 
		}
		
		elseif ($action == "add") // if user input for action = add
		{
			fclose($invFile);// close file
			header('Location: http://localhost:81/webtech/coursework/Final%20Project%20CTI%20110%20Kenneth%20McElveen/add.html'); //redirect to add page
		}	
		
		elseif ($action == "delete") // if user input for action = delete
		{
			fclose($invFile);// close file
			header('Location: http://localhost:81/webtech/coursework/Final%20Project%20CTI%20110%20Kenneth%20McElveen/delete.html'); //redirect to delete page
		}	
		else // if user input isnt matched
		{
			fclose($invFile);// close file
			print("Invalid Selection, Please Try Again"); // self explanitory
		}
	}
		
?>
</body>
</html>

