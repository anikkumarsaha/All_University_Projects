<?php

	require_once('db.php');

	function J_validateLogin($username, $password){
		$con = getConnection();
		$sql = "select * from accounts where username='{$username}' and password='{$password}'";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);

		if($data != null){
			return true;
		}else{
			return false;
		}
	}

	function J_SearchByName($name){
		$con = getConnection();
		$sql = "select * from students where Username like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_SearchStudentsByName($name){
		$con = getConnection();
		$sql = "select * from students where Username like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_SearchApplicantsByName($name){
		$con = getConnection();
		$sql = "select * from appliers where Username like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_SearchCompaniesByName($name){
		$con = getConnection();
		$sql = "select * from companies where companyname like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_addUser($user){
		$con = getConnection();
		$sql = "insert into accounts values('{$user['username']}', '{$user['password']}', '{$user['email']}', '{$user['phone']}', '{$user['role']}', '')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_addPosts($user){
		$con = getConnection();
		$sql = "insert into jobposts values('{$user['post']}', '', '{$user['username']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_addjobinvitations($user){
		$con = getConnection();
		$sql = "insert into jobinvitations values('', '{$user['r_name']}', '{$user['s_name']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}



	function J_addjobaccepts($user){
		$con = getConnection();
		$sql = "insert into AcceptedApplicantsList values('', '{$user['j_name']}', '{$user['s_name']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_getAllUsers(){
		$con = getConnection();
		$sql = "select * from accounts";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_getAllStudents(){
		$con = getConnection();
		$sql = "select * from students";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_getAllCompanies(){
		$con = getConnection();
		$sql = "select * from companies";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_getAllApplicants(){
		$con = getConnection();
		$sql = "select * from appliers";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_getUserById($id){
		$con = getConnection();
		$sql = "select * from accounts where id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function J_getUserByName($name){
		$con = getConnection();
		$sql = "select * from accounts where username='{$name}'";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}


	function J_getApplicantsById($id){
		$con = getConnection();
		$sql = "select * from appliers where id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function J_getStudentById($id){
		$con = getConnection();
		$sql = "select * from students where Id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function J_getCompanyById($id){
		$con = getConnection();
		$sql = "select * from companies where id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function J_getRegisteredUserByName($name){
		$con = getConnection();
		$sql = "select * from accounts where username='{$name}'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_editUser($user){
		$con = getConnection();
		$sql = "update accounts set username='{$user['Username']}', password='{$user['Password']}' where username={$user['Username']}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_editProfile($user){
		$con = getConnection();
		$sql = "update accounts set username='{$user['username']}', email='{$user['email']}', phone='{$user['phone']}' where username='{$user['myself']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_ChangePassword($user){
		$con = getConnection();
		$sql = "update accounts set password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_deleteUser($id){
		$con = getConnection();
		$sql = "delete from products where id={$id}";
		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_uploadPhoto($photo,$username){
		$con = getConnection();
		$sql = "insert into pictures values ('','{$username}','{$photo}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_changePhoto($photo,$username){
		$con = getConnection();
		$sql = "update pictures set picture='{$photo}' where Username='{$username}'";
		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function J_GetProfileImage($username){
		$con = getConnection();
		$sql = "select * from pictures where Username='{$username}'";
		$s=mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($s);
		return $data;
	}

	function J_CheckPhoto($username){
		$con = getConnection();
		$sql = "select * from pictures where Username='{$username}'";
		$s=mysqli_query($con, $sql);
		return $s;
	}
?>
