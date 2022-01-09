<?php

    session_start();

	include '../Model/db_connection.php';

	$sql="select * from students where s_id=".$_SESSION['id'];
    $get=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $value=mysqli_fetch_assoc($get);

?>

<html>
<head>
	<title>Change Profile Photo</title>
</head>

<body>

    <form method="post" action="../Controller/s_profileEditCheck.php">

        <fieldset style="margin-top:20px">
			<legend><font size="5" color="green">
            <b><i>Change Info:</i></b></font></legend>
            <!-- <div>  </div> -->
			<table>
				<tr>
					<td>Usernmae:</td>
					<td><input type="text" name="s_name" value="<?php echo $value['s_name']?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="s_email" value="<?php echo $value['s_email']?>"></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="s_phone" value="<?php echo $value['s_phone']?>" ></td>
				</tr>
				<tr>
				<td>Address:</td>
					<td><textarea type="text" name="s_address" ><?php echo $value['s_address']?> </textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update Info"> <button type="button" onclick="window.location.replace('profile.php')">Cancel</button></td>
				</tr>
			</table>
		</fieldset>

    </form>


</body>
</html>
