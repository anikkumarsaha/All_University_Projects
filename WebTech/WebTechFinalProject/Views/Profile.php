<?php

include('header.php');
require_once('../model/usersModel.php');
//$string = GetBio($_COOKIE['username']);
$photoArr = GetProfileImage($_COOKIE['id']);
$user = getUserById($_COOKIE['id']);
$photo = $photoArr['profile'];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="Profile.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="input.css">
    <title>Profile</title>
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
    		<fieldset>
    			<legend>My Profile</legend>
          <?php
          if($photo!='')
          {
            echo "<left><img src=".$photo." alt=noice width=200 height=200></left>";
          }
          ?>
          <br>
          <br>
          <br>
          <button type="button" id="ppUpload" onclick="window.location.href='../views/ppUpload.php'">Change Profile picture</button>
        <!--  <form method="POST" enctype="multipart/form-data"  id="photo">

            Profile picture: <input type="file" name="myfile" id="img"/>
            <input type="submit" name="submit" value="Submit" />
          </form>-->
          <br>
          <br>
    			<table>
    				<tr>
    					<td>Username:</td>
    					<td>

    						<input type="text" name="username" value="<?=$user['username']?>" oninput="nameValid()" id="name" style="border-width: 0px;" size="50" readonly>
    						<p id="nError" style="color:red"> </p>

    					</td>
    				</tr>
    				<tr>
    					<td>Password:</td>
    					<td><input type="text" name="password" value="<?=$user['password']?>" oninput="passValid()" id="pass" style="border-width: 0px;" size="50" readonly>
    					<p id="nPass" style="color:red"> </p> </td>
    				</tr>
    				<tr>
    					<td>Email:</td>
    					<td><input type="email" name="email" value="<?=$user['email']?>" oninput="emailValid()" id="mail" style="border-width: 0px;" size="50" readonly>
    					<p id="nMail" style="color:red"> </p> </td>
    				</tr>
    				<tr>
    					<td>Phone Number:</td>
    					<td><input type="text" name="phone" value="<?=$user['phone']?>" oninput="phoneValid()" id="phone" style="border-width: 0px;" size="50" readonly>
    						<p id="nPhone" style="color:red"> </p>
    					</td>
    				</tr>
          </table>
          <button type="button" name="editUser" onclick="editProfile()" id="editUser">MAKE EDITABLE</button>
          <input type="text" hidden name="" id="id" value="<?=$_COOKIE['id']?>">
          <p id="msg" style="color: green"></p>
        </div>
      <script src="../controller/scripts.js"> </script>
  </body>
</html>
