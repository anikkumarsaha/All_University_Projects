<?php
	include('header.php');
	require_once('../model/usersModel.php');
	$result = getAllUsers();
	$count = mysqli_num_rows($result);

	// $user = getUserById($id);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User List</title>
	<link rel="stylesheet" href="../views/userlist.css">
	<link rel="stylesheet" href="../views/body.css">
<style media="screen">
body
{
	background-color: white;
}
.panel
{
  position: sticky;
  top: 0;
  background-color: #3D152E;
  height: 160px;
  padding: 0px;
  margin: 0px;
  width: 100%;

}

</style>

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

<div class="head">

	<input type="text" id="sName" name="name" value="" placeholder="Search" onkeyup="searchUser()">
<br>
<br>
	<div id="dom">

	<table border="1" align="center" id="table">
		<tr>
			<th>ID</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>EMAIL</th>
			<th>ROLE</th>
			<th>ACTION</th>
		</tr>
	</div>

	<?php while($data = mysqli_fetch_assoc($result)) {?>
		<tr>
			<td><?=$data['id']?></td>
			<td><?=$data['username']?></td>
			<td><?=$data['password']?></td>
			<td><?=$data['email']?></td>
			<td><?=$data['role']?></td>
			<td>
				<button value="<?=$data['id']?>" class="button" onclick="editUser(this.value,1)" > EDIT </button>
				<button value="<?=$data['id']?>" class="button" onclick="deleteUser(this.value)" > DELETE </button>
				<button value="<?=$data['id']?>" class="button" onclick="notify(this.value)" > Notify </button>
			</td>
		</tr>

	<?php } ?>

	</table>
</div>

<div hidden id="edit">

	<form method="post">
		<fieldset>
			<legend>Edit User</legend>
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="" oninput="nameValid2()" id="uname">
					<p id="nE" style="color:red"> </p></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="password" value="" oninput="passValid()" id="pass">
						<p id="nPass" style="color:red"> </p> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" value=""oninput="emailValid()" id="mail">
					<p id="nMail" style="color:red"> </p> </td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=""></td>
					<td>
						<button id="btn" type="button" value="" name="Update" onclick="editUser(this.value,2)">UPDATE</button>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

</div>

<div hidden id="list">

	<table border="1" align="center">
		<tr>
			<th>ID</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>EMAIL</th>
			<th>ROLE</th>
			<th>ACTION</th>
		</tr>

		<?php $s = getAllUsers(); while($data = mysqli_fetch_assoc($s)) {?>
			<tr>
				<td><?=$data['id']?></td>
				<td><?=$data['username']?></td>
				<td><?=$data['password']?></td>
				<td><?=$data['email']?></td>
				<td><?=$data['role']?></td>
				<td>
					<button value="<?=$data['id']?>" onclick="editUser(this.value,1)" > EDIT </button>
					<button value="<?=$data['id']?>" onclick="deleteUser(this.value)" > DELETE </button>
					<button value="<?=$data['id']?>" onclick="notify(this.value)" > Notify </button>
				</td>
			</tr>

		<?php } ?>

	</table>

</div>
<script src="../controller/scripts.js">	</script>
</body>
</html>
