<?php
include('I_header.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student List</title>

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
		 	height: 60vh;
		 	 background-color: royalblue;
		 	 padding: 20px 0 e 0;
		 	 box-shadow: 0 10px 20px 0 rgba(0,0,0,0);
		 	 border-radius: 10px;
			 width: "100%"
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
		 		color: blueviolet;
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
				 background-color: transparent;
				 background-repeat: no-repeat;
				 border: none;
				 cursor: pointer;
				 overflow: hidden;
				 outline: none;

			 }

			 .btn:hover {
				 background-color: #F6F6F7;
			 }

			 .accept
		 	{
		 		background-color: limegreen;
		 		text-decoration: none;
		 	}

           .reject
		 	{
		 		background-color: red;
		 		text-decoration: none;
		 	}

		 	.pending
		 	 {
		 	 	background-color: yellow;
		 		text-decoration: none;

		 	 }

	</style>

</head>
<body>

	<header>
		<nav class="navbar">
			<ul>
				<li> <a href="../controller/I_logout.php"> Logout</a></li>
				<li><a href="I_mainpage.php">Back</a></li>
				<li> <a href="I_contactus.html">Contact Us</a> </li>



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
	<script src="../views/I_src.js" charset="utf-8"></script>

     <input class="search" type="text" name="search" placeholder="search" id="sName" onkeyup="search()"><br><br>
     <input class="searchbt" type="submit" name="search" value="Search">

	<div class="main-div">
		<h1>List of Student</h1>
		<div class="center-div">
			<div class="table-responsive">
				<table id="tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th> Student Name</th>
							<th>Phone Number</th>
							<th>Email</th>

							<th >Status</th>
							<th >SET STATUS</th>
						</tr>
					</thead>
					<tbody>

                <?php
                   $server = "localhost";
                   $dbuser = "root";
                   $dbpass = "";
                   $database = "mergeddb";

                   $conn = mysqli_connect($server, $dbuser, $dbpass, $database);

                   	  $sql = "SELECT * FROM `students`";
                   	  $query = mysqli_query($conn,$sql);

                   	  $num = mysqli_num_rows($query);


                   	  	while ($res = mysqli_fetch_array($query))
                   	  	{

                ?>

					           <tr>
							      <td><?php echo $res['s_id'] ?></td>
							      <td><button value="<?=$res['s_id']?>" class="btn" onclick="window.location.href='../views/I_sprofile.php?id=<?=$res['s_id']?>'"> <?php echo $res['s_name'] ?> </button></td>
							      <td><?php echo $res['s_phone'] ?></td>
							      <td><?php echo $res['s_email'] ?></td>
							      <td><?php echo $res['status'] ?></td>
										<td>

											<button class="accept" value="<?=$res['s_id']?>" class="button" onclick="active(this.value,'ACTIVE')" > ACTIVE </button>
											<button class="pending" value="<?=$res['s_id']?>" class="button" onclick="active(this.value,'PENDING')" > PENDING </button>
											<button class="reject" value="<?=$res['s_id']?>" class="button" onclick="active(this.value,'REJECTED')" > REJECTED </button>

										</td>

						       </tr>

				<?php
                   	  	}

                ?>


					</tbody>
				</table>

			</div>

		</div>
	</div>

<script src="../controller/scripts" charset="utf-8"></script>

</body>
</html>
