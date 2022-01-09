<?php 

      if(isset($_REQUEST['save']))
      {
            $id = $_GET['id']
      	$name = $_GET['Name'];
      	$username = $_GET['Username'];
      	$email = $_GET['Email'];


      	


            $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "unihub";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);
                   if($conn)
                   {
                        $sql= " update `instructor` set name='$name', username='$username', email='$email' where  i_id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        if ($result)
                         {
                             echo "Update Successfull";
                        }
                        else
                        {
                              echo "Failed";
                        }
                   }
      }

?>