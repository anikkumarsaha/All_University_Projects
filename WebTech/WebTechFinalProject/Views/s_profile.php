<?php
	
    session_start();
	include 's_nav.php';
    include '../Model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}

    $sql="select * from students where s_id=".$_SESSION['id'];
    $get=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $value=mysqli_fetch_assoc($get);
	
?>

<html>
<head>
	<title>Profile</title>
    <script>
function loadDoc() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                document.getElementById("div1").innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            }
            else {
                alert('something else other than 200 was returned');
            }
        }
    };

    xmlhttp.open("GET", "s_profile_photoChange.php", true);
    xmlhttp.send();
}

function loadinfo() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                document.getElementById("div2").innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            }
            else {
                alert('something else other than 200 was returned');
            }
        }
    };

    xmlhttp.open("GET", "s_profileEdit.php", true);
    xmlhttp.send();
}


function loadpass() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                document.getElementById("div2").innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            }
            else {
                alert('something else other than 200 was returned');
            }
        }
    };

    xmlhttp.open("GET", "s_passUpdate.php", true);
    xmlhttp.send();
}




    </script>
</head>

<body>
	<form method="post" action="" >
    <div align="center"> <img src="../assets/upload/<?php echo $value['s_image']?>" width="25%" height="20%"></div>
    <div align="center" style="margin-top:10px"> <button type="button" onclick="loadDoc()">Change Photo</button> </div>
</form>
    <div id="div1">
    
   </div>
    
    <fieldset>
			<legend><font size="5" color="green">
            <b><i>Informations:</i></b></font></legend>
			<table>
				<tr>
					<td>Username:</td>
					<td><?php echo $value['s_name']; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $value['s_email']; ?></td>
                </tr>
				<tr>
                    <td></td>
					<td></td>
				</tr>
                <tr>
                    <td colspan="2"><p> <button type="button" onclick="loadinfo()">Edit Profile Info</button></p></td>
                </tr>
                <tr>
                    <td colspan="2"><p> <button type="button" onclick="loadpass()">Update Password</button></p></td>
                </tr>
        
			</table>
		</fieldset>
                         <div id="div2" style="margin-top:20px">
    
                        </div>       
        
    <fieldset>
			<legend><font size="5" color="orange">
            <b><i>Enrolled Courses:</i></b></font></legend>
            <?php 
                    $sql="SELECT*
                    FROM students
                    INNER JOIN course_enroll
                    ON students.s_id = course_enroll.s_id
                    where course_enroll.e_status=1";
                    $get=mysqli_query($conn,$sql)or die(mysqli_error($conn));
            ?>	
            <table>
                <?php while($enroll=mysqli_fetch_assoc($get)){?>
                <tr>
                    <td>Name: </td>
					<td><?php echo $enroll['c_code']?></td>
                   <td></td> 
                   <td>
                    <a href="s_courseEnrollDetails.php?details=see&&id=<?php echo $enroll['c_id']?>"> See Details </a>
                    </td>
				</tr>
                <?php } if(mysqli_num_rows($get)==0){?>
                <tr>
                    <td>No Course Enrolled</td>
                </tr> 
                <?php }?>   
            <table>    

    </fieldset>

<script>    
</body>
</html>