<?php

if(isset($_REQUEST['Submit']))
{
	$name = $_POST['Name'];
	$uname = $_POST['Username'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$cpassword = $_POST['ConfirmPassword'];



                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "mergeddb";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);
                   if($conn)
                   {

                     $sql = "insert into instructor  values ( '', '$name', '$uname', '$email', '$password', 'ABC')";
                     //$sql = "INSERT INTO `instructor` ( `name`, `username`, `email`, `password`) VALUES ( '$name', '$uname', '$email', '$password')";
                      $result = mysqli_query($conn, $sql);
                      if($result)
                      {

                        header('location: ../views/I_login.php');
                      }
                      else
                      {
                        echo "Failed";
                      }


                   }
                   else
                   {
                   	echo "Unsuccessfull";
                   }

   }

?>
