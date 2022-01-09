<?php

if(isset($_REQUEST['SAVE']))
{
	$Cname = $_POST['CourseName'];
	$Cost= $_POST['CourseCost'];




                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "mergeddb";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);
                   if($conn)
                   {

                     $sql = "INSERT INTO `course`( `Cname`, `Cprice`) VALUES ('$Cname','$Cost')";
                      $result = mysqli_query($conn, $sql);
                      if($result)
                      {

                        header('location: ../views/I_courselist.php');
                      }
                      else
                      {
                        echo "Failed";
                      }


                   }
                   else
                   {
                   	echo "Uuccessfull";
                   }

   }

?>
