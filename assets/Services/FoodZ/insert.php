<!DOCTYPE html>
<html>

<head>
	<title>Pre Register</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => insert
		$conn = mysqli_connect("localhost", "root", "", "contactdb");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 4 values from the form data(input)
        //$_REQUEST is a PHP super global variable
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$phnumber = $_REQUEST['phnumber'];
		
		// Performing insert query execution
		// here our table name is contactdb
		$sql = "INSERT INTO formdb
        VALUES ('$username', '$email','$password','$phnumber')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$username\n $email\n "
				. "$password\n $phnumber\n");

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


