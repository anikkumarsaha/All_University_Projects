<?php

include('header.php');
require_once('../model/usersModel.php');
$string = GetBio($_COOKIE['username']);
$photoArr = GetProfileImage($_COOKIE['id']);

$photo = $photoArr['profile'];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>

    <form method="POST" action="../controller/fileupload.php" enctype="multipart/form-data">

				Profile picture: <input type="file" name="myfile"/>
				<input type="submit" name="submit" value="Submit"/>
		</form>
    <?php
    if($photo!='')
    {
      echo "<center><img src=".$photo." alt=noice width=200 height=200></center>";
    }
     ?>
      <h2>Name: <?php echo $_COOKIE['username'] ?></h2>
      <h2>Role: <?php echo $_COOKIE['role'] ?></h2>
      <h2>Bio:</h2>
      <textarea placeholder="<?php echo $string['post']; ?>" cols="100" rows="25"></textarea>

  </body>
</html>
