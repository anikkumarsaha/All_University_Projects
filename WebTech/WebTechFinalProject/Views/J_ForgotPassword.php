
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_ForgotPassword.css">
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
						FORGOT PASSWORD?
					</legend>

          <form method="post" onsubmit="return ForgotPasswordValidation()" >
						<table>
							<tr>
								<td>
									Username:
								</td>
								<td>
									<input type="text" id="username" name="Username" value=""placeholder="Enter your username" />
								</td>
							</tr>

							<tr>
								<td>
									Enter New Password:
								</td>
								<td>
									<input type="password" id="password" name="Password" value="" placeholder="Enter your new password" />
								</td>
							</tr>

							<tr>
								<td>
									Confirm Password:
								</td>
								<td>
									<input type="password" id="confirm" name="ConfirmPassword" value="" placeholder="Re-enter your new password" />
								</td>
							</tr>
						</table>

						 <br />
            <input type="submit" id="submit" name="Submit" value="Confirm" />
          </form>
        </fieldset>
			</td>
		</tr>
	</table>

	<script type="text/javascript" src="J_JS_Works.js"></script>
</body>
</html>
