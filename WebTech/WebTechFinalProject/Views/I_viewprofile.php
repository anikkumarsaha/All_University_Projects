

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ViewProfile</title>

<style type="text/css">
		.navbar {
			background-color: lightblue;
		}
		.navbar ul {
			overflow: auto;
		}

		.navbar li {
			float: right;
			list-style: none;
			padding: 5px 5px;
			margin: 10px 15px;
			
		}
		.navbar li a {
			text-decoration: none;
		}
		 h1 {
		 	font-size: 18px; 
		 	color: mediumblue;
		 	 text-align: center; 
		 	margin-top: -20px; 
		 	margin-bottom: 20px;
		 }

		 body 
		 {
		 	background-color: royalblue;
		 }

		 .main-div
		 { 
		 	      width: 100%;
		 	       height: 80vh;
		 	       display: flex; 
		 	       flex-direction: column; 
		 	       justify-content: center;
		 	       align-items: center;
		 }

		 .center-div
		 {   
		 	width: 58%; 
		 	height: 60vh; 
		 	 background-color: royalblue;
		 	 padding: 20px 0 e 0; 
		 	 box-shadow: 0 10px 20px 0 rgba(0,0,0,0); 
		 	 border-radius: 10px; 
		 }

		 table
		 {  border-collapse: collapse; 
		 	background-color: steelblue; 
		 	box-shadow: 0 12px 20px e rgba(0,0,0,.03); 
		 	border-radius: 10px; margin: auto; 
		 }

		 th, td{ 
		 	border:1px solid #f2f2f2;
		 	 padding: 8px 30px;
		 	  text-align: 
		 	 center;
		 	  color: black; 
		 	} 
		 	th 
		 	{ 
		 		text-transform: uppercase; 
		 		font-weight: 500; 
		 	}

		 	td 
		 	{
		 		font-size: 13px;
		 	}

		 	.edit 
		 	{
		 		color: deepskyblue;
		 		text-decoration: none;
		 	}

		 	.delete 
		 	{
		 		color: red;
		 		text-decoration: none;
		 	}

		 	.search
		 	{
		 		background-color: lightblue;
		 		width: 25%;
		 	}

		 	.searchbt
		 	 {
		 	 	background-color: lightblue;
		 	 }
		 	 .btn 
		 	 {
		 	 	background-color: royalblue;
		 	 }




	</style>

</head>
<body>

	<header>
		<nav class="navbar">
			<ul>
				<li> <a href="Login.php"> Logout</a></li>
				<li><a href="mainpage.php">Back</a></li>
				<li> <a href="contactus.html">Contact Us</a> </li>
				
				<li> <a href="Home.html"> Home</a></li>
				
			</ul>
		</nav>

	</header>

  
   
		 
	

	
</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

     <input class="search" type="text" name="search" placeholder="search"><br><br>
     <input class="searchbt" type="submit" name="search" value="Search">

	<div class="main-div">
		<h1>List of Instructor</h1>
		<div class="center-div">
			<div class="table-responsive">
				<table border="2">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							
							<th colspan="2">Operation</th>
						</tr>
					</thead>
					<tbody>


                <?php

                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "unihub";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);
                   
                   	  $sql = "SELECT * FROM `instructor`";
                   	  $query = mysqli_query($conn,$sql);
                   	  
                   	  $num = mysqli_num_rows($query);
                   	  		

                   	  	while ($res = mysqli_fetch_array($query)) 
                   	  	{
                   	  		$id = $res['i_id'] ;
                   	  		$name = $res['name'];
                   	  		$username = $res['username'] ;
                   	  		$email = $res['email'] ;

                   	  		echo '<tr>
							      <td>'.$id.'</td>
							      <td>'.$name.'</td>
							      <td>'.$username.'</td>
							      <td>'.$email.'</td>
							      <td>
                	         <button class="btn" ><a class="edit" href="editprofile.php">Edit</a></button> </td>
 
                          <td><button class ="btn"><a class="delete" href="../controller/delete.php?id='.$id.'">Delete</a></button></td>

						       </tr>' ;
                   	  	
                   	  	}

                ?>
                
                

					</tbody>
				</table>
				
			</div>
			
		</div>
	</div>

       
</body>

</html>



