<?php
    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';
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
        $des = "../assets/cv/".$fileName;

      $sql="INSERT INTO job_apply (job_code	,applicant_name	,applicant_cv) VALUE('$job_code','$applicant_name','$fileName')";
      $query=mysqli_query($conn,$sql);
      if($query){
            if(move_uploaded_file($src,$des)){
                $sql="UPDATE jobs SET j_status=1 where j_id=$id";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo "<script>alert('Applied Successfully')</script>";
            echo "<script>window.location.replace('s_jobs.php')</script>";
      
                }
            }
            }  
    } 
    extract($_GET);
    $sql="select * from jobs where j_id=$id";
    $get=mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
    $all=mysqli_fetch_assoc($get);
	
?>

<html>
<head>
	<title> Apply for Job </title>
</head>

<body>
    
    <form action="" method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend><font size="5" color="green">
            <b><i>Application for Job</i></b></font></legend>
			<table>
				<tr>
					<td>Username:</td>
					<td><?php echo $_SESSION['name']; ?><input type="hidden" name="applicant_name" value="<?php echo $_SESSION['name']; ?>">
                    </td>
				</tr>
				<tr>
					<td>Job Code: </td>
					<td><?php echo $all['job_code'] ; ?><input type="hidden" name="job_code" value="<?php echo $all['job_code'] ; ?>" ></td>
				</tr>
                <tr>
					<td>CV:</td>
					<td><input type="file" name="applicant_cv" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit" id="name" > <input type="reset"></td>
				</tr>
			</table>
		</fieldset>
    </form>
<script>
function applyjob() {
    let name = document.getElementById('name').value;
    // let types = document.getElementById('type').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', 's_jobapply.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('name=' + name);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById('div1').innerHTML = this.responseText;
        }
        else {
            // document.getElementById('div1').html("Nothing to show yet.");
        }
    }
}
</script>   
</body>
</html>