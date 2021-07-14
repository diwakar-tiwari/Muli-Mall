<!DOCTYPE html>
<html>

<head>
	<title>Contact Us</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => insert
		$conn = mysqli_connect("localhost", "root", "", "insert");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 4 values from the form data(input)
        //$_REQUEST is a PHP super global variable
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$subject = $_REQUEST['subject'];
		$message = $_REQUEST['message'];
		
		// Performing insert query execution
		// here our table name is form
		$sql = "INSERT INTO form
        VALUES ('$name', '$email','$subject','$message')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$name\n $email\n "
				. "$subject\n $message\n");

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
