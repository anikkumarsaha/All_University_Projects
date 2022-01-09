<?php
	

	include '../Views/s_nav.php';
        include '../Model/db_connection.php';
	
	if(isset($_SESSION['id']))
	{
        header("location: s_index.php");
		
	}
    

    if(isset($_POST['submit']))
    {
      
     if($conn){
        $email=$_POST['s_email'];
        $password=$_POST['s_password'];
        $sql = "SELECT * FROM students WHERE s_email = '$email' && s_password = '$password'";
        if($result = mysqli_query($conn,$sql)){
            $user = mysqli_fetch_assoc($result);
            if($user){
                session_start();
                $_SESSION['id'] = $user['s_id'];
                $_SESSION['name'] = $user['s_name'];
                $_SESSION['email'] = $user['s_email'];
                $_SESSION['phone'] = $user['s_phone'];
                $_SESSION['address'] = $user['s_address'];
                $_SESSION['gender'] = $user['s_gender'];
                $_SESSION['image'] = $user['s_image'];

                header('location:../views/s_index.php');
                // echo "successsss";
            } 
            else {
                echo "<script>alert('Email or Password not matched')</script>";
                echo "<script>window.location.replace('../Views/s_login.php')</script>";
            }
        } 
        else {
            die('Query Problem'.mysqli_error($conn));
        }
        }
        else{
            echo die("error".mysqli_error($conn));
        }
        
    }
	
?>
