<?php

	$term = $_REQUEST['name'];
	$con = mysqli_connect('localhost', 'root', '', 'unihub');
	$sql = "select * from students where s_name like '%{$term}%'";
	$result = mysqli_query($con, $sql);

	//echo $sql;


	if($result != null){
		$data = "<table border=1>
		<tr>
			<td>ID</td>
			<td> Student Name</td>
			<td> Email </td>
			<td> STATUS </td>
			<td> SET STATUS </td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){

			$data .= "<tr>
						<td>{$row['s_id']}</td>
						<td>{$row['s_name']}</td>
						<td>{$row['s_email']}</td>
						<td>{$row['status']}</td>
           <td>

					 <button value={$row['s_id']} onclick=active(this.value,'ACTIVE') > ACTIVE </button>
					 <button value={$row['s_id']} onclick=active(this.value,'PENDING') > PENDING </button>
					 <button value={$row['s_id']} onclick=active(this.value,'REJECTED') > REJECTED </button>


     			</td>";
		}

		$data .= "</table>";
		echo $data;
	}else{
		echo $sql;
	}

?>
