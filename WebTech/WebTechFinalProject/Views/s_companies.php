<?php
	
    session_start();
	include 's_nav.php';
	include '../Model/db_connection.php';
	
	if(!isset($_SESSION['id']))
	{
        header("location: s_login.php");
		
	}
    
$sql="SELECT * , COUNT(*) duplicates
      FROM jobs 
      GROUP BY j_company_name ORDER BY duplicates DESC";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($query){	
?>

<html>
<head>
	<title>Companies</title>
</head>

<body>
<h3 align="center"><u>Company List And Posted Jobs</u></h3>         
<table border="1" cellpadding="15%" cellspacing="0" width="50%" align="center">
                <tbody><tr>
                    <th width="70%" align="center">Company Name</th>
                    <th width="30%" align="center">Job Posts</th>
                </tr>  
        <?php while($get=mysqli_fetch_assoc($query)){?>
                <tr align="center">
                    <td><?php echo $get['j_company_name']?></td>
                    <td> <a href="s_companiesjob.php?job=posted&&name=<?php echo $get['j_company_name']?>"><?php echo $get['duplicates']?></a></td>
                </tr>
<?php }

}
else 
{
    die(mysqli_error($conn));
}

?>
             </tbody>
            
            </table>

</body>
</html>