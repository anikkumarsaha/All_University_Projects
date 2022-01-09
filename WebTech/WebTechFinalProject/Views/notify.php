<?php

	require_once('../model/usersModel.php');

	$id = $_REQUEST['id'];
	//echo $id;
	$user = getUserById($id);
	//print_r($user);
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

	<script type="text/javascript" src="../controller/scripts.js">	</script>



	<form method="post" >
		<fieldset>
			<legend>Notify User</legend>
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="<?=$user['username']?>" oninput="nameValid()" id="name">
					<p id="nError" style="color:red"> </p></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" value="<?=$user['password']?>" oninput="passValid()" id="pass">
						<p id="nPass" style="color:red"> </p> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" value="<?=$user['email']?>"oninput="emailValid()" id="mail">
					<p id="nMail" style="color:red"> </p> </td>
				</tr>
				<tr>
					<td><input type="hidden" name="theid" id="id" value="<?=$id?>"></td>
					<td><button onclick="notify()">NOTIFY</button></td>
				</tr>
			</table>
      <div id="msg">

      </div>
		</fieldset>
	</form>
</body>
</html>
