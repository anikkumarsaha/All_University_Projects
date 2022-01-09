<?php
	require_once('../model/usersModel.php');

  $name = $_POST['search'];

  if(isset($_POST['searchName']))
  {
    if($name != '')
    {
      $result = SearchByName($name);
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

<table>
	<tr>
		<td>
			<fieldset>
				<legend>
					DISPLAY
				</legend>
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

								<a href="../controller/active.php?sid=<?=$data['s_id']?>&status=<?='ACTIVE'?>"> ACTIVE </a> |
								<a href="../controller/active.php?sid=<?=$data['s_id']?>&status=<?='PENDING'?>"> PENDING </a> |
								<a href="../controller/active.php?sid=<?=$data['s_id']?>&status=<?='REJECTED'?>"> REJECTED </a>

							</td>
						</tr>

					<?php } ?>
      	</table>
			</fieldset>
		</td>
	</tr>
</table>
</body>
</html>
