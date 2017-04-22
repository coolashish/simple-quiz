<html>
    <head>
        <title>My first PHP Website</title>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .login-page {
                width: 360px;
                padding: 8% 0 0;
                margin: auto;
            }
            .myform {
                  position: relative;
                  z-index: 1;
                  background: #FFFFFF;
                  max-width: 360px;
                  margin: 0 auto 100px;
                  padding: 45px;
                  text-align: center;
                  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .myform input {
                  font-family: "Roboto", sans-serif;
                  outline: 0;
                  width: 100%;
                  border: 0;
                  margin: 0 0 15px;
                  padding: 15px;
                  box-sizing: border-box;
                  font-size: 14px;
             }
        </style>
    </head>
    <body bgcolor="#76b852">
        <div class="login-page" />
        <!-- <h2>Registration Page</h2> -->
        <div class="myform" backrground="#FFFFFF">
        <form name="registerForm" action="register.php" method="POST" onsubmit ="return validateForm()" >
            <input type="text" name="username" style="background-color:#f2f2f2;"
            placeholder="email" required="required" /> <br/>
			<p id="emailError" style="color:red"> </p>
           <input type="password" name="password" style="background-color:#f2f2f2;"
           placeholder="password" required="required" /> <br/>
			<p id="passwordError" style="color:red"> </p>
           <input type="submit" style="background-color:#4caf50;" value="Create Account"/>
        </form>
		<script>
			function validateForm () {
				var userName = document.forms["registerForm"]["username"].value;
				var result = validateEmail(userName);
				if (result == false) {
					document.getElementById("emailError").innerHTML = "Incorrect email!";
					return false;
				}
				var password = document.forms["registerForm"]["password"].value;
				if (password.length <= 5) {
					document.getElementById("passwordError").innerHTML = "Password length should be greater than 5 characters!";
					console.log("Incorrect password");
					return false;
				}
				return true;
			}
			function validateEmail(email) {
				    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					    return re.test(email);
			}

		</script>
    </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$con = new mysqli("localhost", "root", "", "wst");
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$bool = true;

	$query = "Select * from user_login_details"; //Query the users table
	$result = $con->query($query);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
		#while($row = mysqli_fetch_array($query)) //display all rows from query
		#{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			if($username == $table_users)	{
				$bool = false; // sets bool to false
				Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
				Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
			}
		}
	}
	else {

	}

	if($bool) // checks if bool is true
	{
		$query = "INSERT INTO user_login_details (username, password) VALUES ('$username','$password')";
		$return_value = $con->query($query);
		if ($return_value === true) {
			Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
			Print '<script>window.location.assign("home.php");</script>'; // redirects to register.php
    }
    else {
			#die("Error: " . $con->error());
			Print '<script>alert("Error in  Registration!");</script>'; // Prompts the user
		}
	}

	mysqli_close($con);
}
?>
