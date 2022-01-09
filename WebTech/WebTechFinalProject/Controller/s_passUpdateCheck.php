<?php
	
    session_start();
	// include 's_nav.php';
	include '../model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");	
	}
    
    if(isset($_POST['submit']))
    {

    if (count($_POST) > 0) {
    $sql= "SELECT * from  students WHERE s_id=". $_SESSION["id"];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if ($_POST["s_password"] == $row["s_password"]) {
        mysqli_query($conn, "UPDATE students set s_password ='" . $_POST["new_password"] . "' WHERE s_id='" . $_SESSION["id"] . "'");
       echo "<script>alert('Password Updated Successfully')</script>";
       echo "<script>window.location.replace('../views/s_profile.php')</script>";
       
    } else
       echo "<script>alert('Password not match')</script>";
       echo "<script>window.location.replace('../views/s_passUpdate.php')</script>";
}
		 
        
    }
	
?>
