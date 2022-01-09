<?php
	require_once('../Controller/J_Header.php')
?>

<html>
<head>
	<title>Post</title>
	<link rel="stylesheet" type="text/css" href="J_CSS_For_Post.css">
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
	            POST
	          </legend>
						<form method="post" onsubmit=" return PostValidation()" action="../Controller/J_PostCheck.php">
							<!--<input type="text" id="post" name="Post" value="" placeholder="Write something to post" width="480" height="480"/> <br/><br/>-->
							<br><textarea id="post" placeholder="Write something to post" name="Post" cols="169" rows="25"></textarea><br>
		          <br /><input type="submit" id="submit" name="Submit" value="Post" />
						</form>
	        </fieldset>
	      </td>
			</tr>
		</table>
	<script type="text/javascript" src="J_JS_Works.js"></script>
	<div id="message" style="color:Tomato;">

	</div>
</body>
</html>
