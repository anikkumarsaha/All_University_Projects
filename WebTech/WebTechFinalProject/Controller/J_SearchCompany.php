<?php

  require_once('J_Header.php');
  require_once('../Model/usersModel.php');
	$name = $_REQUEST['name'];
	$result = J_SearchCompaniesByName($name);

	//echo $sql;

	if($result != null){
		$data = "<table border='1' width='100%'>
		<tr>
			<td>Company Name</td>
		</tr>";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr height='50px'>
      <td width='50%'>
            <a href=J_OtherCompanyProfiles.php?id={$row['id']}>{$row['companyname']}</a>
            </td>
					 <tr/>
           ";

		}

		$data .= "</table>";
		echo $data;
	}else{
		echo $sql;
	}

?>
