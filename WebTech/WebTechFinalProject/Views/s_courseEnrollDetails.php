<?php
	
    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}
$sql="SELECT*
FROM courses
INNER JOIN instructor
ON instructor.i_id = courses.i_id
where courses.c_id=".$_GET['id'];
    $get=mysqli_query($conn,$sql);

	
?>
<html>
<head>
	<title>Enrolled Course Details</title>
</head>                              
<body>
 <?php 

 while($courses=mysqli_fetch_assoc($get)) {
     ?>	
<fieldset>           
    <legend><font size="5" >
    <b><i><?php echo $courses['c_code']?></i></b></font></legend>
    <table>
        <tbody>
        
        <tr>
            <td>Course Name:</td>
            <td><?php echo $courses['c_name']?></td>
        </tr>
        <tr>
            <td>Course Code:</td>
            <td><?php echo $courses['c_code']?></td>
        </tr>
        <tr>
            <td>Course Instructor:</td>
            <td><?php echo $courses['name']?></td>
        </tr>
        <tr>
            <td>Course Price:</td>
            <td><?php echo $courses['c_price']?> </td>
        </tr>
        <tr>
            <td></td>
            <td>
           <button type="button" onclick="window.location.replace('s_profile.php')">Back to Profile</button>
            </td>
        </tr>
    </tbody>
</table>
 </fieldset>      
 <?php echo"<br/>"; }?>