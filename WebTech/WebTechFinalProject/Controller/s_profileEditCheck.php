<?php
	
    session_start();
	include '../Views/s_nav.php';
    include '../model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}
    

    if(isset($_POST['submit']))
    {
        $name=$_POST['s_name'];
        $email=$_POST['s_email'];
        $phone=$_POST['s_phone'];
        $address=$_POST['s_address'];
        $sql="update students set s_name='$name', s_email='$email', s_phone='$phone', s_address='$address' where s_id=".$_SESSION['id'];
        $update=mysqli_query($conn,$sql);
        if($update)
        {    
            $sql="UPDATE comments  INNER JOIN students  ON comments.comment_id = students.s_id  SET comments.name=students.s_name  WHERE comments.comment_id=".$_SESSION['id'];
            $get=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		    if($get){

		    }
		    else {
			 die(mysqli_error($conn));
		    } 
            echo "<script>alert('Info updated successfully')</script>";
            echo "<script>window.location.replace('../views/s_profile.php')</script>";
        }
        else
        {   echo $sql;
            die(mysqli_error($conn));
        }
   
        
    }
	
?>