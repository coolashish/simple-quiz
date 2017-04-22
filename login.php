<html>
	<head>
		<title> Login </title>
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
		<!--
		<a href="index.php">Click here to go back </a><br/><br/>
		-->
		<div class="myform" backrground="#FFFFFF">
		<form name="loginForm" action="checklogin.php" method="POST"
		onsubmit="return validateForm()" >
			<input type="text" style="background-color:#f2f2f2;" name="username" placeholder="email" required="required" /> <br/>
			<p id="emailError" style="color:red"> </p>
			<input type="password" style="background-color:#f2f2f2;" name="password" placeholder="password" required="required"/> <br/>
			<p id="passwordError" style="color:red"> </p>
			<input type="submit" style="background-color:#4caf50;" value="Log In"/>
		</div>
		</form>
		</div>
		<script>
			function validateForm () {
				var userName = document.forms["loginForm"]["username"].value;
				var result = validateEmail(userName);
				if (result == false) {
					document.getElementById("emailError").innerHTML = "Incorrect email!";
					return false;
				}
				var password = document.forms["loginForm"]["password"].value;
				if (password.length <= 5) {
					document.getElementById("passwordError").innerHTML = "Incorrect password!";
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
