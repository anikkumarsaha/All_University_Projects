<?php

include('I_header.php');
require_once('../model/usersModel.php');
//$string = GetBio($_COOKIE['username']);
$photoArr = I_GetProfilePic($_COOKIE['id']);
$user = I_getUserById($_COOKIE['id']);
$photo = $photoArr['photo'];
//echo $photo;
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Profile</title>
    <style type="text/css">
    .navbar {
      background-color: lightblue;
    }
    .navbar ul {
      overflow: auto;
    }

    .navbar li {
      float: right;
      list-style: none;
      padding: 5px 5px;
      margin: 10px 15px;
      
    }
    .navbar li a {
      text-decoration: none;
    }
     h1 {
      font-size: 18px; 
      color: mediumblue;
       text-align: center; 
      margin-top: -20px; 
      margin-bottom: 20px;
     }

     body 
     {
      background-color: royalblue;
     }

     .main-div
     { 
            width: 100%;
             height: 80vh;
             display: flex; 
             flex-direction: column; 
             justify-content: center;
             align-items: center;
     }

     .center-div
     {   
      width: 58%; 
      height: 60vh; 
       background-color: royalblue;
       padding: 20px 0 e 0; 
       box-shadow: 0 10px 20px 0 rgba(0,0,0,0); 
       border-radius: 10px; 
     }

     table
     {  border-collapse: collapse; 
      background-color: steelblue; 
      box-shadow: 0 12px 20px e rgba(0,0,0,.03); 
      border-radius: 10px; margin: auto; 
     }

     th, td{ 
      border:1px solid #f2f2f2;
       padding: 8px 30px;
        text-align: 
       center;
        color: black; 
      } 
      th 
      { 
        text-transform: uppercase; 
        font-weight: 500; 
      }

      td 
      {
        font-size: 13px;
      }

      .edit 
      {
        background-color: royalblue;
        color: deepskyblue;
        text-decoration: none;
      }

      .btn
      {
        background-color: royalblue;
        color: deepskyblue;
        text-decoration: none;
      }
      .R
      {
        background-color: steelblue;
      }

      




  </style>

  </head>
  <body>

    <header>
    <nav class="navbar">
      <ul>
        <li> <a href="../controller/I_logout.php"> Logout</a></li>
        <li><a href="I_mainpage.php">Back</a></li>
        <li> <a href="I_contactus.html">Contact Us</a> </li>
        
        
        
      </ul>
    </nav>

  </header>

     <center>
      <?php
          if($photo!='')
          {
            echo "<left><img src=".$photo." alt=noice width=200 height=200></left>";
          }
          ?>
          <br>
   </center>
    		
          
          <div class="profile">
            <form class="" action="../views/I_editprofile.php" method="post">

          <table>
            <tr>
              <td>Name:</td>
              <td><input class="R" type="text" name="name" value="<?=$user['name']?>" id="name" style="border-width: 0px;" size="50" readonly>
                <p id="nPass" style="color:red"> </p> </td>
              </tr>
            <tr>
              <td>Username:</td>
              <td>

                <input class="R" type="text" name="username" value="<?=$user['username']?>"  id="uname" style="border-width: 0px;" size="50" readonly>
                <p id="nError" style="color:red"> </p>

              </td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input class="R" type="email" name="email" value="<?=$user['email']?>" id="mail" style="border-width: 0px;" size="50" readonly>
              <p id="nMail" style="color:red"> </p> </td>
            </tr>
          </table>
          <br>
          <center>
                      <input class="edit" type="submit" name="edit" id="edit" value="EDIT">
                      <input type="text" hidden name="" id="id" value="<?=$_COOKIE['id']?>">
              <button class="btn" type="button" id="ppUpload" onclick="location.href='../views/I_uploadProfile.php'">Change Profile picture</button>
          </center>
        </form>
            
          </div>

          
          <p id="msg" style="color: green"></p>

  </body>
</html>
