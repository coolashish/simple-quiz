    <html>
        <head>
            <title>My first PHP Website</title>
       </head>
       <?php
          function get_subject_list () {
                $con = new mysqli("localhost", "root", "", "wst");
                // Check connection
                if ($con->connect_error) {
                  die("Connection failed: " . $con->connect_error);
                }
                $query = "SELECT subject from questions"; //Query the users table
              	$result = $con->query($query);

				if ($result == null) {
                    Print "<p>No subjects to show</p>";
					return;
				}

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      // output data of each row
                      //XXX Check if this worlks
					  $string = implode(',', $row);
                      Print "<p>$string</p>";
                  }
                }
                else {
                    Print "<p>No subjects to show</p>";
                }
          }

        session_start(); //starts the session
      	if($_SESSION['user']){ // checks if the user is logged in
      	}
      	else{
      		header("location: index.php"); // redirects if user is not logged in
      	}
      	$user = $_SESSION['user']; //assigns user value
      	echo "Hello $user";
		echo "<p>List of subjects:  </p>";
        get_subject_list();

       ?>
        <body>
    		<a href="logout.php">Click here to logout</a><br/><br/>
            <h2>Home Page</h2>
    	</body>
    </html>
