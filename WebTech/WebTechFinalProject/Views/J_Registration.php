<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_Registration.css">
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
						REGISTRATION
					</legend>
					<form method="post" onsubmit="return RegistrationValidation()" action="../Controller/J_RegistrationCheck.php">
						<table>
							<tr height="50px">
								<td>
									Name:
								</td>
								<td>
									<input type="text" id="name" name="Name" value="" placeholder="Enter your name"/>
								</td>
							</tr>

							<tr height="50px">
								<td>
									User Name:
								</td>
								<td>
									<input type="text" id="username" name="Username" value=""placeholder="Enter your username" />
								</td>
							</tr>

							<tr height="50px">
								<td>
									Email:
								</td>
								<td>
									<input type="email" id="email" name="Email" value=""placeholder="Enter your email address" />
								</td>
							</tr>

							<tr height="50px">
								<td>
									Password:
								</td>
								<td>
									<input type="password" id="password" name="Password" value="" placeholder="Enter your password" />
								</td>
							</tr>

							<tr height="50px">
								<td>
									Confirm Password:
								</td>
								<td>
									<input type="password" id="confirmpassword" name="ConfirmPassword" value="" placeholder="Re-enter your password" />
								</td>
							</tr>

							<tr height="50px">
								<td>
									Contact number:
								</td>
								<td>
									<input type="text" id="number" name="Number" value="" placeholder="Enter your contact number"/>
								</td>
							</tr>
						</table>

						<br />
						<fieldset>
							<legend>
								Gender
							</legend>
							<input type="radio" id="gender" name="Gender" value="Male" /> Male
							<input type="radio" id="gender" name="Gender" value="Female" /> Female
							<input type="radio" id="gender" name="Gender" value="Other" /> Other
						</fieldset> <br/>


						<input type="submit" id="submit" name="Submit" value="Sign up" />
						<input type="reset" id="reset" name="Reset" value="Reset" />
					</form>
				</fieldset>
			</td>
		</tr>
	</table>

	<script type="text/javascript" src="J_JS_Works.js"></script>
</body>
</html>
