<?php
	include('header.php');
	require_once('../model/usersModel.php');
	$result = getAllStudents();
	$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration List</title>

	<link rel="stylesheet" href="../views/registration.css">
	<link rel="stylesheet" href="../views/body.css">


</head>
<body>


	<div class="panel">

		<table width="100%">
			<tr>
				<td width="33%">
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
			</tr>
		</table>
	</div>

<br>
<br>
<br>
<input type="text" id="sName" name="name" value="" onkeyup="search(1)" placeholder="Search">
	<form method="post">

		<input type="submit" name="searchName" value="Search by name" >
		<p id="nError" style="color:red">

		<br><br>
	</form>
<div id="table">
	<table border="1" align="center" id="li">
		<tr>
			<th>ID</th>
			<th>USERNAME</th>
			<th>EMAIL</th>
			<th>STATUS</th>
			<th>set STATUS</th>

		</tr>


	<?php while($data = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?=$data['s_id']?></td>
			<td><?=$data['s_name']?></td>
			<td><?=$data['s_email']?></td>
			<td>
				<?php if($data['status']=='ACTIVE')
				echo "<h5 style=color:green;>ACTIVE ✓</h2>";
				elseif ($data['status']=='PENDING') {
					echo "<h5 style=color:yellow;>PENDING !!</h2>";
				}
				else {
					echo "<h5 style=color:red;>REJECTED X</h2>";
				}
			?></td>

			<td>

				<button value="<?=$data['s_id']?>" class="button" onclick="active(this.value,'ACTIVE')" > ACTIVE </button>
				<button value="<?=$data['s_id']?>" class="button" onclick="active(this.value,'PENDING')" > PENDING </button>
				<button value="<?=$data['s_id']?>" class="button" onclick="active(this.value,'REJECTED')" > REJECTED </button>

			</td>
		</tr>

	<?php } ?>

	</table>
</div>
	<script type="text/javascript" src="../controller/scripts.js">	</script>

</body>
</html>
