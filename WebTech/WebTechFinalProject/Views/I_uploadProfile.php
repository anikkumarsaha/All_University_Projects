<?php
    include('I_header.php');
    require_once('../model/usersModel.php');
    $photoArr = I_GetProfilePic($_COOKIE['id']);
    $user = I_getUserById($_COOKIE['id']);
    $photo = $photoArr['photo'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Photo</title>

   <style type="text/css">
     h1
    {
      color: lightblue;
      font-size: 25px;
    }

        h4
        {
          color: lightblue;
        }

        h5
        {
          color: midnightblue;
          font-family: monospace;
          width: 30%;
        }

        .navbar {
      background-color: lightblue;
    }
    .navbar ul {
      overflow: auto;
    }

    .navbar li {
      float: right;
      list-style: none;
      padding: 10px 10 px;
      margin: 10px 10px;


    }
    .navbar li a {
      text-decoration: none;
    }

        body
     {
      background-color: royalblue;
      padding: 0px 20px;
     }

     .file 
     {
      background-color: lightblue;
     }

     .submit 
     {
      background-color: lightblue;
     }

   </style>

  </head>
  <body>

     <header>
  <nav class="navbar">
      <ul>

        <li></li>
        <li> <a href="../controller/I_logout.php"> Logout</a></li>
        <li><a href="I_profile.php">Back</a></li>
        <li> <a href="I_contactus.html">Contact Us</a> </li>

        <li> <a href="I_mainpage.php">DashBoard</a></li>

      </ul>
    </nav>

  </header>


    <center>
      <?php
    if($photo!='')
    {
      echo "<left><img src=".$photo." alt=Profile width=200 height=200></left>";
    }
    ?>
    </center>
     
    <center>
    <form method="POST" action="../controller/I_fileupload.php" enctype="multipart/form-data"  id="photo" onsubmit="return PhotoValid()">

      Profile picture: <input class="file" type="file" name="myfile" id="img"/>
      <input class="submit" type="submit" name="submit" value="Submit" />

    </form>
    

  </center>

  <script src="../controller/I_scripts.js" charset="utf-8"></script>

  </body>
</html>
