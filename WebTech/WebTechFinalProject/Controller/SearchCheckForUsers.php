<?php
	require_once('../model/usersModel.php');

  $name = $_POST['search'];

  if(isset($_POST['searchName']))
  {
    if($name != '')
    {
      $result = SearchByNameForAccounts($name);
      $count = mysqli_num_rows($result);
      if($count<1)
      {
        echo "<h1 style=color:red;>NO ACCOUNT FOUND</h1>";
      }
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User List</title>
	<style>
			table {
		width: 100%;
		border: 1px solid black;
		}
			th,td {
	  text-align: left;
	}
	</style>
</head>
<body>

	<center>
		<a href="home.php">Back </a> |
		<a href="../controller/logout.php">logout </a>
	</center>

	<form method="post" action="../controller/SearchCheckForUsers.php">
		<input type="text" name="search" value="" />
		<input type="submit" name="searchName" value="Search by name"> <br><br>
	</form>

	<table border="1" align="center">
		<tr>
			<th>ID</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>EMAIL</th>
			<th>ACTION</th>
			<th>ROLE</th>
		</tr>

	<?php while($data = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?=$data['id']?></td>
			<td><?=$data['username']?></td>
			<td><?=$data['password']?></td>
			<td><?=$data['email']?></td>
			<td><?=$data['role']?></td>
			<td>
				<a href="edit.php?id=<?=$data['id']?>"> EDIT </a> |
				<a href="delete.php?id=<?=$data['id']?>"> DELETE </a>
			</td>
		</tr>

	<?php } ?>
	</table>
</body>
</html>
