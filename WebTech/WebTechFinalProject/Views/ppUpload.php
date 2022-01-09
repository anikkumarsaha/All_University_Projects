<?php
    include('header.php');
    require_once('../model/usersModel.php');
    $photoArr = GetProfileImage($_COOKIE['id']);
    $user = getUserById($_COOKIE['id']);
    $photo = $photoArr['profile'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="ppUpload.css">
    <link rel="stylesheet" href="input.css">

    <title></title>
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
    <div class="table">

      <center>
    <form method="POST" action="../controller/fileupload.php" enctype="multipart/form-data"  id="photo" onsubmit="return PhotoValid()">

      Profile picture: <input type="file" name="myfile" id="img"/>
      <input type="submit" name="submit" value="Submit" />

    </form>
    <?php
    if($photo!='')
    {
      echo "<left><img src=".$photo." alt=Profile width=200 height=200></left>";
    }
    ?>
  </center>

  </div>


  <script src="../controller/scripts.js" charset="utf-8"></script>

  </body>
</html>
