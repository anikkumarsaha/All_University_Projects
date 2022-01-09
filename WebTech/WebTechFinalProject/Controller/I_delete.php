<?php

                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "unihub";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);


        $id=$_GET['id'];
        
        $query = "DELETE FROM `instructor` WHERE i_id='$id' " ; 
        $data = mysqli_query($conn, $query);    

        if($data)
        {
        	header('location: ../view/viewprofile.php');
        }    
        else
        {
          	echo "Delete Failed";
        }  

?>
