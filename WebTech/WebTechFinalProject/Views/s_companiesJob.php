<?php

    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';


	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");

	}

$sql="select * from jobs where j_company_name='". @$_GET['name']."'";
$query=mysqli_query($conn,$sql);
if($query){

?>

<!DOCTYPE html>
<html>
<head>
<title>Posted Jobs</title>
</head>
<body>

 <form method="post" action="../Controller/s_jobApply.php">
<?php while($get=mysqli_fetch_assoc($query)){?>
                    <fieldset>
                        <legend><font size="8" >
                        <b><i><?php echo $get['j_title']?></i></b></font></legend>
                        <table>
                            <tr>
                                <td>Job Title:</td>
                                <td><?php echo $get['j_title']?></td>
                            </tr>
                            <tr>
                                <td> Company Name:</td>
                                <td><?php echo $get['j_company_name']?></td>
                            </tr>
                            <tr>
                                <td>Requirments:</td>
                                <td><?php echo $get['j_requirement']?></td>
                            </tr>
                            <tr>
                                <td>Working Hour:</td>
                                <td><?php echo $get['j_working_hr']?></td>
                            </tr>
                            <tr>
                                <td>Salary:</td>
                                <td><?php echo $get['j_salary']?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                <?php if($get['j_status']==0){?>
                                    <a href="s_jobApply.php?apply=done&&id=<?php echo $get['j_id']?>"><button type="button">Apply</button></a>
                                    <?php }
                                    else{
                                    ?>
                                    <button type="button" disabled>Already Applied</button>
                                  <?php }?>
                                    </td>
                            </tr>
                        </table>
                    </fieldset>
                    <?php } } else die(mysqli_error($conn))?>
                </form>
<?php


         if(isset($_GET['apply'])){
            extract($_GET);
            $sql="  INSERT INTO job_apply (j_id)
                    SELECT jobs.j_id
                    FROM  jobs
                    where jobs.j_id=".$_GET['id'];
             $apply=mysqli_query($conn,$sql) or die(mysqli_error($conn));
             if($apply){

                $sql="UPDATE job_apply SET  s_id=".$_SESSION['id']." where j_id=".$_GET['id'];
                $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

                if($query){
                    $sql="UPDATE jobs SET j_status=1  where j_id=".$_GET['id'];
                    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($query){
                         echo "<script>alert('Applied successfully')</script>";
                         echo "<script>window.location.replace('s_jobs.php')</script>";

                }

             }


        }

    }

?>

</body>
</html>
