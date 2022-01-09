<?php
	include('header.php');
	require_once('../model/usersModel.php');
	$result = getAllPosts();
	$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts</title>
  </head>

  <style media="screen">
  table {
  width: 100%;
  border: 1px solid black;
  height: 100px;
  margin-top: 10px;

}
td {
  text-align: left;
}
  </style>
  <link rel="stylesheet" href="../views/newsfeed.css">
  <link rel="stylesheet" href="../views/body.css">
  <body>
    <div class="panel">

			<table width="100%" border='0px'>
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
							<div class="linksL">
							<a href="profile.php" ><?php echo " ".$_COOKIE['username']?></a>
							<a href="../views/newsfeed.php">Newsfeed </a>
							<a href="../controller/logout.php">logout </a>
							</div>
				</tr>
			</table>
	</div>
  	<?php while($data = mysqli_fetch_assoc($result)) { ?>
      <table align="center" class="table">
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

  	<?php } ?>


  </body>
</html>
