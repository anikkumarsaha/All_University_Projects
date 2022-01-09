<?php
	
    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}
    $sql="SELECT*
FROM instructor
INNER JOIN courses
ON instructor.i_id = courses.i_id";
    $get=mysqli_query($conn,$sql);

	
?>

<html>
<head>
	<title>Courses</title>
</head>                              
<body>
	
<h2>Courses List</h2>
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
            <?php 
            if($courses['c_status']==0) {?>  
            <a href="?course=enroll&&id=<?php echo $courses['c_id']?>"> <button type="button" name="enlolled">Enroll</button></a>
            <?php } 
            else {?>
            <input type="submit" name="enlolled" value="Alreadey Enrolled">
            <a href="?status=cancel&&id=<?php echo $courses['c_id']?>"> <button type="button" name="enlolled">Cancel</button></a>
            <?php }?>

            
            </td>
        </tr>
    </tbody>
</table>
 </fieldset>
      <?php echo"<br/>"; }
        if(isset($_GET['course'])){
            extract($_GET);
            $sql="  INSERT INTO course_enroll (c_id,c_code,e_status)
                    SELECT courses.c_id, courses.c_code, courses.c_status 
                    FROM  courses
                    where courses.c_id=".$_GET['id'];
             $insert_enrolled_course=mysqli_query($conn,$sql) or die(mysqli_error($conn));   
             if($insert_enrolled_course){
               
                $sql="UPDATE course_enroll SET e_status=1, s_id=".$_SESSION['id']." where c_id=".$_GET['id'];
                $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));   

                if($query){
                    $sql="UPDATE courses SET c_status=1  where c_id=".$_GET['id'];
                    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn)); 
                    if($query){
                         echo "<script>alert('Course Enrolled successfully')</script>";
                         echo "<script>window.location.replace('s_courses.php')</script>";
                    }
                }

             }
        }         
            if(isset($_GET['status'])){
            $sql="DELETE FROM course_enroll  WHERE c_id =".$_GET['id'];
            $enroll=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            if($enroll){
            $sql="UPDATE courses SET c_status = 0  WHERE c_id =".$_GET['id'];
            $enrolls=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            //   if($enrolls){  
                echo "<script>alert('Course Enroll Cancelled')</script>";
                echo "<script>window.location.replace('s_courses.php')</script>";
            //   }
            }
            else {
                    echo "<script>alert(".die(mysqli_error($conn)).")</script>";
                
            }
        }         


?>
      
</body>
</html>