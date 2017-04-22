<html>
<div class="login-page">
<link rel="stylesheet" type="text/css" href="style.css">
  <h1 align='center'> Welcome </h1>
  <form action = "checklogin.php" method="POST">
      <!--
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <p class='message' id='script'> Create account </p>

      <button id="loginButton" onclick = "myFunction()">login</button>

    <form action="checklogin.php" method="POST">
-->
			Enter username: <input type="text" placeholder="username" name="username" required="required" /> <br/><br/>
			Enter password: <input type="password" placeholder="password" name="password" required="required"/> <br/><br/>
			<input type="submit" value="Log In" /><br/><br/>
	  <a href="register.php">Create account</a>
  </form>
<script>
function myFunction() {
    var elem = document.createElement('script');
    elem.src = 'http://jsonip.com/?callback=insertReply';
    document.body.appendChild(elem);

}
function insertReply(content) {
    //document.getElementById('script').innerHTML = JSON.stringify(content);
    //document.getElementById('script').innerHTML = 'Your ip address is:' + content['ip'];
    alert('Your ip address is: ' + content.ip);
    console.log(content.ip);
    //console.log(JSON.stringify(content));
}
</script>
</div>
</html>
