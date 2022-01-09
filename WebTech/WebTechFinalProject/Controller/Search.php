<?php

	$term = $_REQUEST['name'];
	$con = mysqli_connect('localhost', 'root', '', 'unihub');
	$sql = "select * from students where s_name like '%{$term}%'";
	$result = mysqli_query($con, $sql);

	//echo $sql;


	if($result != null){
		$data = "<table border=1 width='100%' align='center' id='li'>
		<tr>
			<th>ID</td>
			<th>Username</td>
			<th>Email</td>
			<th>STATUS</td>
			<th>set STATUS</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){

			if($row['status']=='ACTIVE')
			{
				$s = "<h5 style=color:green;>ACTIVE ✓</h5>";
			}
			elseif ($row['status']=='PENDING') {
				$s = "<h5 style=color:yellow;>PENDING !!</h5>";
			}
			else {
				$s = "<h5 style=color:red;>REJECTED X</h5>";
			}

			$data .= "<tr>
						<td>{$row['s_id']}</td>
						<td>{$row['s_name']}</td>
						<td>{$row['s_email']}</td>
						<td>{$s}</td>
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
