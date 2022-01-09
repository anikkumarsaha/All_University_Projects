
<?php
	require_once('J_Header.php');
	require_once('../Model/usersModel.php');
  if(isset($_POST['Submit']))
  {
    if(isset($_POST['Search']) != "")
    {
      $result = J_SearchStudentsByName($_POST['Search']);
    }
    else {
      echo "Please write something first";
    }
  }
?>

<html>
<head>
	<title>Search students</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="J_CSS_For_SearchStudentsResults.css">

</head>
<body>
	<div class="sticky">
	<div class="w3-panel w3-blue">
	<table width="100%" align="center">
			<tr>
				<td width="33%" align="left">
					<a href="../Views/J_Post.php">Post</a> | <a href="../Views/J_SearchStudents.php">Search students</a> | <a href="../Views/J_Viewapplicants.php">View applicants</a> | <a href="../Views/J_OtherCompanies.php">View other companies</a>
				</td>

				<td width="33%" align="center">
	          <h1>UniHub</h1>
				</td>

				<td width="33%" align="right">
					<a href="../Views/J_Profile.php"> <?php echo $_SESSION['Username']; ?> </a> | <a href="../Views/J_UserDashboard.php">Home</a> | <a href="../Controller/J_Logout.php">Logout</a> <br />
				</td>
			</tr>
		</table>
</div>
</div>
		<table width="100%">
			<tr>

	      <td>
	        <table border="1" width="100%"  class="w3-table w3-striped w3-border">
						<?php while($data = mysqli_fetch_assoc($result)) { ?>
	          <tr height="50px">
	            <td width="90%">
	              <a href="../Views/J_OtherProfiles.php?id=<?=$data['s_id']?>"><?=$data['s_name']?></a>
	            </td>
	            <td>
								<button type="button" name="Invite" id="Invite" onclick="Invt(this.value)"value="<?=$data['s_id']?>">Invite</button>
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
