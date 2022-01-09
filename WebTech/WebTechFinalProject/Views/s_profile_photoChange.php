<?php 
	session_start();
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");

	}

?>

<html>
<head>
	<title>Change Profile Photo</title>
</head>

<body>

    <form method="post" action="../Controller/s_profile_photoChangeCheck.php" enctype="multipart/form-data">

        <fieldset>
			<legend><font size="5" color="green">
            <b><i>Change Photo:</i></b></font></legend>

			<table>
				<tr>
					<td>New Image:</td>
					<td><input type="file" name="s_image"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Upload"> <button type="button" onclick="window.location.replace('s_profile.php')">Cancel</button></td>

				</tr>
			</table>
		</fieldset>

    </form>

</body>
</html>
