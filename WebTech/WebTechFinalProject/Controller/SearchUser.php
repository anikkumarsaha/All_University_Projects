<?php

	$term = $_REQUEST['name'];
	$con = mysqli_connect('localhost', 'root', '', 'unihub');
	$sql = "select * from accounts where username like '%{$term}%'";
	$result = mysqli_query($con, $sql);

	//echo $sql;


	if($result != null){
		$data = "<table border='1' align='center'>
			<tr>
				<th>ID</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>EMAIL</th>
				<th>ROLE</th>
				<th>ACTION</th>
			</tr>";

		while($row = mysqli_fetch_assoc($result)){


			$data .= "<tr>
						<td>{$row['id']}</td>
						<td>{$row['username']}</td>
						<td>{$row['password']}</td>
						<td>{$row['email']}</td>
						<td>{$row['role']}</td>
           <td>

					 <button value={$row['id']} onclick=editUser(this.value,1) > EDIT </button>
					 <button value={$row['id']} onclick=deleteUser(this.value) > DELETE </button>
					 <button value={$row['id']} onclick=notify(this.value) > Notify </button>

     			</td>";
		}

		$data .= "</table>";
		echo $data;
	}else{
		echo $sql;
	}

?>
