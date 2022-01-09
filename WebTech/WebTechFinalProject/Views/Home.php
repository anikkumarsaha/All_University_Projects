<?php
	require_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>

	<title>Home Page </title>
		<link rel="stylesheet" href="Home.css">
		<link rel="stylesheet" href="body.css">
</head>
<body>

	<div class="panel">

		<table width="100%">
			<tr>
				<td width="30%">
					<div class="linksR">
				<a href="registrationList.php">Registration List</a>
				<a href="userlist.php">User List </a>
				<a href="post.php">POST </a>
					</div>
				</td>
				<td align="center" width="20%">
				<h1>UniHub</h1>
				</td>
					<td>
						<div class="linksL" >
						<a href="profile.php" ><?php echo " ".$_COOKIE['username']?></a>
						<a href="../views/newsfeed.php">Newsfeed </a>
						<a href="../controller/logout.php">logout </a>
						</div>
					</td>
			</tr>
		</table>
	</div>
</body>
</html>
