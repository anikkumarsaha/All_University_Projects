<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_Login.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

	<div class="sticky">
	<div class="w3-panel w3-blue">
	<table width="100%" align="center">
		<tr>
			<td width="50%" align="right">
          <h1>UniHub</h1>
			</td>

			<td align="right">
				<a href="J_Home.php">Home</a> | <a href="J_Registration.php">Register</a> | <a href="J_Login.php">Login</a>
			</td>
		</tr>
	</table>
</div>
</div>
<table width="100%" align="center">
	<tr>
		<td colspan="2">
			<fieldset>
				<legend>
					LOGIN
				</legend>
				<form method="post" onsubmit="return LoginValidation()" action="../Controller/J_LoginCheck.php">
					<table>
						<tr height="50px">
							<td>
								User Name:
							</td>
							<td>
								<input type="text" id="username" name="Username" value="" placeholder="Enter your username"/>
							</td>
						</tr>

						<tr height="50px">
							<td>
								Password:
							</td>
							<td>
								<input type="password" id="password" name="Password" value="" placeholder="Enter your password"/>
							</td>
						</tr>
					</table>

					 <br />
					<input type="submit" id="submit" name="Submit" value="Login" />
					<a href="J_ForgotPassword.php">Forgot password?</a>
				</form>
			</fieldset>
		</td>
	</tr>
</table>

	<script type="text/javascript" src="J_JS_Works.js"></script>
</body>
</html>
