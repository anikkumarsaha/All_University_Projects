<?php
	
    session_start();

	include '../model/db_connection.php';
	
	if(isset($_SESSION['id']))
	{
        header("location: ../views/s_index.php");
		
	}
    

    if(isset($_POST['submit']))
    {
        $name=$_POST['s_name'];
        $email=$_POST['s_email'];
        $pass=$_POST['s_password'];
		 
        $sql="SELECT* FROM students WHERE s_name='$name' && s_email='$email'";
        $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($query){
            $all=mysqli_fetch_assoc($query);
            // echo "<pre>";
            // echo print_r($sql);
            // echo "</pre>";
            // die();
            if( @$all['s_password']== @$pass){
                echo"<script>alert('Password Seems like your old password... Password not reset')</script>";
                echo"<script>window.location.replace('../views/s_reset.php')</script>";
            }
             else if( @$all['s_name']!= @$name  && @$all['s_email']!= @$email){
                echo"<script>alert('Username and Email dont match')</script>";
                echo"<script>window.location.replace('../views/s_reset.php')</script>";
            }

            else{
            $sql="UPDATE students set s_password='$pass' where s_name='$name' && s_email='$email'";
            $query=mysqli_query($conn,$sql);
            if($sql){
                echo"<script>alert('Password Reset Successfully')</script>";
                echo"<script>window.location.replace('../views/s_login.php')</script>";
            }
            }


        }
        else{
die(mysqli_error($conn));
        }
    }
	
?>