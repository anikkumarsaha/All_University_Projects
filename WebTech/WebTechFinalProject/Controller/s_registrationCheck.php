<?php
	
    session_start();
	include '../views/s_nav.php';
    include '../model/db_connection.php';
	
	if(isset($_SESSION['id']))
	{
        header("location: ../views/s_index.php");
		
	}
    

    if(isset($_POST['submit']))
    {   
        $username=$_POST['s_name'];
        $email=$_POST['s_email'];
        $phone=$_POST['s_phone'];
        $address=$_POST['s_address'];
        $gender=$_POST['s_gender'];
        // @$image=$_POST['s_image'];
        $password=$_POST['s_password'];


        $fileName=$_FILES["s_image"]["name"];
    	$src = $_FILES["s_image"]["tmp_name"];
        $des = "../assets/upload/".$fileName;

        $sql= "insert into students (s_name,s_email,s_phone,s_address,s_password,s_gender,s_image) values ('$username','$email','$phone','$address','$password','$gender','$fileName')";
        $insert= mysqli_query($conn,$sql);
        if($insert)
        {
            move_uploaded_file($src, $des);
            echo "<script>alert('Registraion successfully')</script>";
            echo "<script>window.location.replace('../views/s_login.php')</script>";
            // echo "done";

        }
        else
        {
            die($conn);
        }

        
    }
	
?>

