<?php
	
    session_start();

    include '../Model/db_connection.php';

    if(isset($_POST['submit']))
	{

        
        $fileName=$_FILES["s_image"]["name"];
    	$src = $_FILES["s_image"]["tmp_name"];
        $des = "../assets/upload/".$fileName;
        if($fileName=='')
        {
            echo "<script>alert('Image required')</script>";
            echo "<script>window.location.replace('../views/s_profile.php')</script>";

        }
        else{
             $sql="update students set s_image='$fileName' where s_id=".$_SESSION['id'];
        $update= mysqli_query($conn,$sql);
        if($update)
        {
            move_uploaded_file($src,$des);
            echo "<script>alert('Image Upload Successfully')</script>";
            echo "<script>window.location.replace('../views/s_profile.php')</script>";
        }
        else {
            die(mysqli_error($conn));
        }
		
        }
       
	
		
	}
	
?>