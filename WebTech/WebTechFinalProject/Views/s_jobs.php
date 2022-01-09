<?php
    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
	}
    $sql="select* from jobs";
    $get=mysqli_query($conn,$sql);
?>
<html>
<head>
	<title>Jobs</title>
</head>
<body>
	<form method="post" action="../Controller/s_jobApply.php">
        <?php while($all=mysqli_fetch_assoc($get)){?>
                    <fieldset>
                        <legend><font size="8" >
                        <b><i><?php echo $all['job_code']?></i></b></font></legend>
                        <table>
                            <tbody><tr>
                                <td>Job Title:</td>
                                <td><?php echo $all['j_title']?></td>
                            </tr>
                            <tr>
                                <td> Company Name:</td>
                                <td><?php echo $all['j_company_name']?></td>
                            </tr>
                            <tr>
                                <td>Requirments:</td>
                                <td> <?php echo $all['j_requirement']?></td>
                            </tr>
                            <tr>
                                <td>Working Hour:</td>
                                <td><?php echo $all['j_working_hr']?></td>
                            </tr>
                            <tr>
                                <td>Salary:</td>
                                <td><?php echo $all['j_salary']?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php if($all['j_status']==0){?>
                                    <a href="s_jobApply.php?apply=done&&id=<?php echo $all['j_id']?>"><button  type="button">Apply</button></a>
                                    <?php }
                                    else{
                                    ?>
                                    <button type="button" disabled>Already Applied</button>
                                  <?php }?>
                                </td>
                            </tr>
                        </tbody></table>
                    </fieldset>
                    <?php }?>
                </form>
</body>
</html>
