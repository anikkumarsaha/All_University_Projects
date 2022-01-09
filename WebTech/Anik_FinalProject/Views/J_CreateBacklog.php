<?php
	require_once('../Controller/Header.php')
?>

<html>
<head>
	<title>Create Backlog</title>
</head>
<body>

	<table width="100%" align="center">
		<tr>
			<td width="90%">
        <center>
          <h1>UniHub</h1>
        </center>
			</td>

			<td align="right">
				<a href="Profile.php"> <?php echo $_SESSION['Username']; ?> </a> | <a href="UserDashboard.php">Home</a> | <a href="../Controller/Logout.php">Logout</a> <br />
			</td>
		</tr>
	</table>

	<fieldset>
		<table width="100%">
			<tr>
				<td>
	        <ul>
						<a href="Post.php"><li>Post</li></a><br />
						<a href="SearchStudents.php"><li>Search students</li></a><br />
						<a href="Viewapplicants.php"><li>View applicants</li></a><br />
						<a href="OtherCompanies.php"><li>View other companies</li></a><br />
					</ul>
				</td>

	      <td>
	        <fieldset>
	          <legend>
	            SEARCH
	          </legend>
	          <input type="text" name="Search" value="" placeholder="Type applicant's name" /> <br/><br/>
	          <input type="submit" name="Submit" value="Search" />
	        </fieldset>

	        <br /><a href="CategoriesAppliers.php">Categories applicants</a><br />
					<a href="CreateBacklog.php">Create backlog</a><br /><br />

	        <table border="1" width="100%">
	          <tr height="50px">
	            <td width="50%">
	              <a href="OtherProfiles.php">Anik</a>
	            </td>
	            <td>
	              <select name="">
					            <option value="">1</option>
					            <option value="">2</option>
					            <option value="">3</option>
					            <option value="">4</option>
				        </select> <br/>
	            </td>
	          </tr>

	          <tr height="50px">
	            <td>
	              <a href="OtherProfiles.php">Raj</a>
	            </td>
	            <td>
	              <select name="">
					            <option value="">1</option>
					            <option value="">2</option>
					            <option value="">3</option>
					            <option value="">4</option>
				        </select> <br/>
	            </td>
	          </tr>

	          <tr height="50px">
	            <td>
	              <a href="OtherProfiles.php">Kumar</a>
	            </td>
	            <td>
	              <select name="">
					            <option value="">1</option>
					            <option value="">2</option>
					            <option value="">3</option>
					            <option value="">4</option>
				        </select> <br/>
	            </td>
	          </tr>
	      </td>
			</tr>
		</table>
	</fieldset>
</body>
</html>
