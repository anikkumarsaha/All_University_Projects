<?php
	require_once('../Controller/J_Header.php')
?>

<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_ChangePassword.css">
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
				<a href="J_Profile.php"> <?php echo $_SESSION['Username']; ?> </a> | <a href="J_UserDashboard.php">Home</a> | <a href="../Controller/J_Logout.php">Logout</a> <br />
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
					WANT TO CHANGE YOUR PASSWORD?
				</legend>
				<input type="text" name="" value=<?=$_SESSION['Username']?> hidden id="username">

				<form method="post" onsubmit="ChangePasswordValidation()">
					<table>
						<tr height="50px">
							<td>
								Enter New Password:
							</td>
							<td>
								<input type="password" id="password" name="Password" value="" placeholder="Enter your new password" />
							</td>
						</tr>

						<tr height="50px">
							<td>
								Confirm Password:
							</td>
							<td>
								<input type="password" id="confirm" name="ConfirmPassword" value=""placeholder="Re-enter your new password" />
							</td>
						</tr>
					</table>

					<br /><input type="submit" id="csubmit" name="Submit" value="Confirm" />
				</form>
			</fieldset>
		</td>
	</tr>
</table>


	<div id="msg" style="color: green">

	</div>
	<script type="text/javascript" src="J_JS_Works.js"></script>
</body>
</html>
