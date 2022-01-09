<?php
	require_once('../Controller/J_Header.php');
	require_once('../Model/usersModel.php');
	$result = J_getAllCompanies();
?>

<html>
<head>
	<title>Other Companies</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_OtherCompanies.css">
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
		<table width=100% >
			<tr>

	      <td>
	        <fieldset>
	          <legend>
	            SEARCH
	          </legend>
						<form method="post" onsubmit="return OtherCompanyValidation()" action="../Controller/J_SearchCompanyResults.php">
							<input type="text" id="search" name="Search" value="" placeholder="Type company's name" onkeyup="SEARCH(this.value)"/> <br/><br/>
		          <input type="submit" id="osearch" name="Submit" value="Search" />
						</form>
	        </fieldset>

	        <table border="1" width="100%" id="table"  class="w3-table w3-striped w3-border">
						<tr>
							<td>Company Name</td>
						</tr>
						<?php while($data = mysqli_fetch_assoc($result)) { ?>
	          <tr height="50px">
	            <td width="50%">
	              <a href="J_OtherCompanyProfiles.php?id=<?=$data['id']?>"><?=$data['companyname']?></a>
	            </td>
	          </tr>
						<?php } ?>
	      </td>
			</tr>
		</table>
	<script type="text/javascript" src="../Views/J_JS_Works.js"></script>
</body>
</html>
