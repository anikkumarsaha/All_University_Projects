<?php

    session_start();
	// include 'nav.php';

	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
	}

?>
<html>
<head>
	<title>Change password</title>
</head>

<body>

    <form method="post" action="../Controller/s_passUpdateCheck.php">
		<fieldset>
			<legend><font size="5" color="green">
            <b><i>Change password</i></b></font></legend>
            <!-- <div> </div> -->
			<table>
				<tr>
					<td>Old Password:</td>
					<td><input type="password" name="s_password" value="" placeholder="Enter your current password" required></td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td><input type="password" name="new_password" value="" placeholder="Enter new password" required></td>
				</tr>
                <tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="confirm_password" value="" placeholder="Enter the password again" required></td>
				</tr>
				<tr>
                    <td></td>
					<td><input type="submit" name="submit" value="Update"> <input type="reset"> <button type="button" onclick="window.location.replace('s_profile.php')">Cancel</button></td>
				</tr>

			</table>
		</fieldset>
	</form>


</body>
</html>
