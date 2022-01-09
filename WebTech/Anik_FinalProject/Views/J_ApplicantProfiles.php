<?php
	require_once('../Controller/J_Header.php');
	require_once('../Model/usersModel.php');
	$id = $_REQUEST['id'];

	$data = J_getApplicantsById($id);
  $name = $data['Username'];
	$id = $data['id'];
	$email = $data['Email'];
?>

<html>
<head>
	<title>Other Profiles</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_ApplicantProfiles.css">
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
	        <table width="100%">
						<tr>
	            <td>
	              Name:
	            </td>
							<td>
								<input type="text" id="name" name="Name" value="<?php echo $name ?>" />
							</td>
	          </tr>

						<tr>
	            <td>
	              Id:
	            </td>
							<td>
								<input type="text" id="id" name="id" value="<?php echo $id ?>" />
							</td>
	          </tr>

						<tr>
	            <td>
	              Email:
	            </td>
							<td>
								<input type="Email" id="email" name="Email" value="<?php echo $email ?>" />
							</td>
	          </tr>

					</table>
					<br />
					<button type="button" name="Accept" id="Accept" onclick="Accept(this.value)" value="<?=$data['id']?>" >Accept</button>
	      </td>
			</tr>
		</table>
		<script type="text/javascript" src="../Views/J_JS_Works.js"></script>
	</fieldset>
</body>
</html>
