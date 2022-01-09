<?php 

	@$term = $_REQUEST['name'];
	@$course = $_REQUEST['course'];
	@$company = $_REQUEST['company'];
	@$instructor = $_REQUEST['instructor'];

	$conn = mysqli_connect('localhost', 'root', '', 'unihub');
	// $sql = "select * from students where s_name like '%{$term}%'";

	$sql1="SELECT*  FROM students WHERE  s_name LIKE '%{$term}%' OR s_email LIKE '%{$term}%' OR s_phone LIKE '%{$term}%' ";     
    $sql2="SELECT*  FROM instructor WHERE name LIKE '%{$instructor}%' OR email LIKE '%{$instructor}%' ";
	$sql3="SELECT* FROM courses WHERE c_name LIKE '%{$course}%' OR c_code LIKE '%{$course}%'";
	$sql4="SELECT* FROM companies WHERE company_name LIKE '%{$company}%' ";


	if($term){
	 $result = mysqli_query($conn, $sql1);
	 if($result != null){
		$data = "<table border=1 cellpadding='5%' cellspacing='0' width='60%' >
		<tr align='center' style='font-weight:bold'>
			<td width='5%'>Sl. No.</td>
			<td width='20%'>Username</td>
			<td width='20%'>Email</td>
			<td width='20%'>Phone</td>
			<td width='20%'>Address</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr align='center'>
						<td>{$row['s_id']}</td>
						<td>{$row['s_name']}</td>
						<td>{$row['s_email']}</td>
						<td>{$row['s_phone']}</td>
						<td>{$row['s_address']}</td>
					 <tr/>";
		}

		$data .= "</table>";
		echo $data;
	}
	else{
	     die(mysqli_error($conn));
	}
	}
	 if($instructor){
	     	 $result = mysqli_query($conn, $sql2);
	 if($result != null){
		$data = "<table border=1 cellpadding='5%' cellspacing='0' width='60%'>
		<tr align='center' style='font-weight:bold'>
			<td width='20%'>Sl No.</td>
			<td width='40%'>Username</td>
			<td width='40%'>Email</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr  align='center'>
						<td>{$row['i_id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['email']}</td>
					 <tr/>";
		}

		$data .= "</table>";
		echo $data;
	}
	else{
	     die(mysqli_error($conn));
	}
	}
	 if($course){
	     	 $result = mysqli_query($conn, $sql3);
	 if($result != null){
		$data = "<table border=1 cellpadding='5%' cellspacing='0' width='60%'>
		<tr align='center' style='font-weight:bold'>
			<td width='20%'>Sl No.</td>
			<td width='40%'>Course Name</td>
			<td width='40%'>Course Code</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr  align='center'>
						<td>{$row['c_id']}</td>
						<td>{$row['c_name']}</td>
						<td>{$row['c_code']}</td>
					 <tr/>";
		}

		$data .= "</table>";
		echo $data;
	}
	else{
	     die(mysqli_error($conn));
	}
	}

	if($company) {
	     	 $result = mysqli_query($conn, $sql4);
	 if($result != null){
		$data = "<table border=1 cellpadding='5%' cellspacing='0' width='60%'>
		<tr align='center' style='font-weight:bold'>
			<td width='20%'>Sl No.</td>
			<td width='40%'>Company Name</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr  align='center'>
						<td>{$row['id']}</td>
						<td>{$row['company_name']}</td>
					 <tr/>";
		}

		$data .= "</table>";
		echo $data;
	}
	else{
	     die(mysqli_error($conn));
	}
	}
?>