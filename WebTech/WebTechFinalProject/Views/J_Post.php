<?php
	require_once('../Controller/J_Header.php');
	require_once('../model/usersModel.php');
	$result = getAllPosts();
	$count = mysqli_num_rows($result);
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
<div class="form">


	<form method="post" >
		<fieldset>
			<legend>POST</legend>
			<table>
				<tr>
					<td>
						<textarea placeholder="Title" name="Title" id="Title" cols="25" rows="3"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<br><textarea placeholder="What's on your mind?" name="Post" id="Post" cols="167" rows="25"></textarea>
					</td>
				</tr>
				<tr>

					<td>
						<button type="post" name="post" id="p" onclick='done()'>POST</button>
					</td>
				</tr>
				<tr>

					<td>
						<div id="notification" >

						</div>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<input type="text" id="id" hidden value='<?=$_SESSION['id']?>'>
	<input type="text" id="username" hidden value='<?=$_SESSION['Username']?>'>
</div>

<br>
<br>
<br>


<?php while($data = mysqli_fetch_assoc($result)) { ?>
	<table align="" class="w3-table w3-striped w3-border">
	<tr>
		<td colspan="3">Username:<?=$data['username']?></td>
	</tr>
	<tr>
		<td>Title: <?=$data['title']?></td>
		<td align="left" colspan="2"><?=$data['time']?></td>
	</tr>
	<tr>
		<td height='250px' align='left'>
			POST:
			<?=$data['post']?>

		</td>
	</tr>
</table>
<br>
<br>
<?php } ?>

	<script type="text/javascript" src="J_JS_Works.js"></script>
	<div id="message" style="color:Tomato;">
<script src="../controller/scripts.js" charset="utf-8"></script>
	</div>
</body>
</html>
