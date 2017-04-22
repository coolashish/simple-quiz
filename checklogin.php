<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "wst");
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
    $bool = true;

	$query = "Select * from user_login_details WHERE username='$username'";
	$result = $con->query($query);
	$table_username = "";
    $table_password = "";

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$table_username = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password'];
			if($username == $table_username && $password == $table_password)	{
				$bool = false; // sets bool to false
				#Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
				#Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
				$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
				header("location: home.php"); // redirects the user to the authenticated home page
				break;
			}
		}
		if ($bool === true) {
			Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}
	}
	else {
		Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}


?>
