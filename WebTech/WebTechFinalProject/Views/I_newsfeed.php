<?php
	include('header.php');
	require_once('../model/usersModel.php');
	$result = getAllPosts();
	$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Article</title>

 <style type="text/css">

    	.navbar {
			background-color: lightblue;
		}
		.navbar ul {
			overflow: auto;
		}

		.navbar li {
			float: right;
			list-style: none;
			padding: 5px 5px;
			margin: 10px 15px;

		}
		.navbar li a {
			text-decoration: none;
		}

        h1 {
		 	color: royalblue;
		 	font-size: 25px;
		 }

    </style>
		<link rel="stylesheet" href="newsfeed.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

	<header>

		<nav class="navbar">
			<ul>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_mainpage.php">Back</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>


			</ul>
		</nav>

	</header>

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

</body>
</html>
