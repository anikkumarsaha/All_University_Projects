<?php
	require_once('../Controller/J_Header.php');
?>

<html>
<head>
	<title>Change Profile Picture</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="J_CSS_For_ChangeProfilePicture.css">
</head>
<body>
<div class="sticky">
<div class="w3-panel w3-blue">
	<table width="100%" align="center">
			<tr>
				<td width="33%" align="left">
					<a href="J_Post.php">Post</a> | <a href="J_SearchStudents.php">Search students</a> | <a href="J_Viewapplicants.php">View applicants</a> | <a href="J_OtherCompanies.php">View other companies</a>
				</td>

				<td width="33%" align="center">
	          <h1>UniHub</h1>
				</td>

				<td width="33%" align="right">
					<a href="J_Profile.php"> <?php echo $_SESSION['Username']; ?> </a> | <a href="J_UserDashboard.php">Home</a> | <a href="../Controller/J_Logout.php">Logout</a> <br />
				</td>
			</tr>
		</table>
</div>
</div>
	<fieldset>
		<table width="100%">
			<tr>

	      <td>
					<fieldset>
						<legend>
							UPLOAD PROFILE PICTURE
						</legend>

						<br />
						<form method="POST" action="../Controller/J_fileupload.php" enctype="multipart/form-data">
							Select Profile Picture: <input type="file" name="Picture" />
							<input type="submit" id="save" name="Submit" value="Save" />
						</form>
						<br />
					</fieldset>
	      </td>
			</tr>
		</table>
	</fieldset>
</body>
</html>
