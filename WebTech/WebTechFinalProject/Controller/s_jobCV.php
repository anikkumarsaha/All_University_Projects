<?php
	
    session_start();
	include 's_nav.php';
	include 'db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}
    
    if(isset($_POST['submit']))
    {
      extract($_POST);
      extract($_GET);
        $fileName=$_FILES["applicant_cv"]["name"];
    	$src = $_FILES["applicant_cv"]["tmp_name"];
        $des = "cv/".$fileName;

      $sql="INSERT INTO job_apply (job_code	,applicant_name	,applicant_cv) VALUE('$job_code','$applicant_name','$fileName')";
      $query=mysqli_query($conn,$sql);
      if($query){
            if(move_uploaded_file($src,$des)){
                $sql="UPDATE jobs SET j_status=1 where j_id=$id";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo "<script>alert('Applied Successfully')</script>";
            echo "<script>window.location.replace('/unihub/s_jobs.php')</script>";
      
                }
            }
            }
    }    
?>