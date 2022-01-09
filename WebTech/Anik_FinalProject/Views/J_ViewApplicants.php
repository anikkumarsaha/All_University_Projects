
<?php
	require_once('../Controller/J_Header.php');
	require_once('../Model/usersModel.php');
	$result = J_getAllApplicants();
?>

<html>
<head>
	<title>View Applicants</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_ViewApplicants.css">
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
		<table width="100%">
			<tr>
	      <td>
	        <fieldset>
	          <legend>
	            SEARCH
	          </legend>
						<form method="post" onsubmit="return ViewApplicantsValidation()" action="../Controller/J_SearchApplicantsResults.php">
							<input type="text" id="search" name="Search" value="" placeholder="Type applicant's name" /> <br/><br/>
		          <input type="submit" id="submit" name="Submit" value="Search" />
						</form>
	        </fieldset>

	        <table border="1" width="100%"  class="w3-table w3-striped w3-border">
						<?php while($data = mysqli_fetch_assoc($result)) { ?>
	          <tr height="50px">
	            <td width="90%">
	              <a href="J_ApplicantProfiles.php?id=<?=$data['id']?>"><?=$data['Username']?></a>
	            </td>
	            <td>
								<button type="button" name="Accept" id="Accept" onclick="Accept(this.value)" value="<?=$data['id']?>" >Accept</button>
	            </td>
	          </tr>
						<?php } ?>
					</table>
	      </td>
			</tr>
		</table>
	<script type="text/javascript" src="../Views/J_JS_Works.js"></script>
</body>
</html>
