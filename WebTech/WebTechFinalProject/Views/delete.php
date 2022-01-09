<?php
	require_once('../model/usersModel.php');
	$id = $_REQUEST['id'];
	$user = getUserById($id);
?>

<html>
<head>
	<title>Edit user</title>
</head>
<body>
	<center>
		<a href="home.php">Back </a> |
		<a href="../controller/logout.php">logout </a>
	</center>



	<form method="post" action="../controller/DeleteCheck.php">
		<fieldset>
			<legend>Delete User</legend>
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="<?=$user['username']?>"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" value="<?=$user['password']?>"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" value="<?=$user['email']?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?=$user['id']?>"></td>
					<td><input type="submit" name="delete" value="Delete"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>
</html>
