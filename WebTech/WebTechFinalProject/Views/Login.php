

<html>
<head>
	<title>Login</title>
	<script>
function nameValid() {

  let x = document.getElementById("name").value;

	let e=document.getElementById("nError");

	let text

	if(x=='')
	{
		text="Please fill the input field";
	}
	else if (!isNaN(x))
	{
		text="Username cannot be just a number";
	}
	else {
		text= '';
	}
	e.innerHTML = text;
}

function passValid() {

  let x = document.getElementById("pass").value;

	let e=document.getElementById("nPass");

	let text

	if(x=='')
	{
		text="Please fill the input field";
	}
	else if (!isNaN(x))
	{
		text="Password cannot be just a number";
	}
	else {
		text= '';
	}
	e.innerHTML = text;
}


</script>
</head>
<body>
	<form method="post" action="../controller/loginCheck.php">
		<fieldset>
			<legend>LOGIN</legend>
			<table>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" value="" oninput="nameValid()" id="name">
											<p id="nError" style="color:red"> </p></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" value="" oninput="passValid()" id="pass">
					<p id="nPass" style="color:red"> </p></td>

				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Submit" >

						<a href="signup.html"> Signup </a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
						if(isset($_COOKIE['found']))
						{
							if ($_COOKIE['found']=='yes') {
								// code...
							}
							else {
								echo "<p style=color:red>No user found</p>";
								setcookie('found', 'none', time()-3600, '/');
							}
						}
						?>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>
