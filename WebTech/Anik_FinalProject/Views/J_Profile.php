<?php
	require_once('../Controller/J_Header.php');
	require_once('../Model/usersModel.php');

	$img = J_GetProfileImage($_SESSION['Username']);

	$result =J_getUserByName($_SESSION['Username']);
?>

<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_Profile.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
	        <table border="1" width="100%"  class="w3-table w3-striped w3-border">
	          <tr>
	            <td width="85%">
	              <table width="100%">


									<tr height="50px">
										<td>
											User Name:
										</td>
										<td>
											<input type="text" id="username" name="Username" value="<?php echo $result['username']; ?>" />
										</td>
									</tr>

									<tr height="50px">
										<td>
											Email:
										</td>
										<td>
											<input type="email" id="email" name="Email" value="<?php echo $result['email']; ?>" />
										</td>
									</tr>

									<tr height="50px">
										<td>
											Contact number:
										</td>
										<td>
											<input type="text" id="number" name="Number" value="<?php echo $result['phone']; ?>" />
										</td>
									</tr>

									<tr height="50px">
										<td>
											Role:
										</td>
										<td>
											<input type="text" id="role" name="Role" value="<?php echo $result['role']; ?>" />
										</td>
									</tr>
								</table>
	            </td>

	            <td width="100%">
	              <img src="<?=$img['picture']?>" width="100%" height="100%" /> <br />
	            </td>
	          </tr>
	      </td>
			</tr>
		</table>
		<br /><a href="J_EditProfile.php">Edit Profile</a><br />
	</fieldset>
</body>
</html>
