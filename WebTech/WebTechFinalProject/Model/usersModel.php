<?php

	require_once('db.php');

	function validate($username, $password){
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

	function addUser($user){
		$con = getConnection();
		$sql = "insert into accounts values('{$user['username']}', '{$user['password']}', '{$user['email']}','{$user['phone']}', '{$user['role']}','','','')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function getAllUsers(){
		$con = getConnection();
		$sql = "select * from accounts";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getAllStudents(){
		$con = getConnection();
		$sql = "select * from students";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getAllPosts(){
		$con = getConnection();
		$sql = "select * FROM posts ORDER BY time DESC";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getUserById($id){
		$con = getConnection();
		$sql = "select * from accounts where id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function getIDByname($id){
		$con = getConnection();
		$sql = "select * from accounts where id={$id}";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function getRolebyuName($user){
		$con = getConnection();
		$sql = "select * from accounts where username='{$user}'";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}

	function SearchByName($name){
		$con = getConnection();
		$sql = "select * from students where s_name like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}
	function SearchByNameForAccounts($name){
		$con = getConnection();
		$sql = "select * from accounts where username like '%{$name}%'";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function editUser($user){
		$con = getConnection();
		$sql = "update accounts set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function edit($user){
		$con = getConnection();
		$sql = "update accounts set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}', phone='{$user['phone']}' where id={$user['id']}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function setStatus($id,$status){
		$con = getConnection();

		$sql = "update students set status='{$status}' where s_id={$id}";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteUser($id){
		$con = getConnection();
		$sql = "delete from accounts where id={$id}";
		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function GetBio($username){
		$con = getConnection();
		$sql = "select post from posts where username='{$username}'";
		$s=mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($s);
		return $data;
	}

	function Post($user){
		$con = getConnection();
		$sql = "INSERT INTO `posts`(`p_id`, `id`, `post`, `username`, `time`, `title`) VALUES ('','$user[id]','$user[post]','$user[username]','$user[time]','$user[title]')";

		//echo $sql;

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function uploadPhoto($photo,$id){
		$con = getConnection();
		$sql = "update accounts set profile='{$photo}' where id={$id}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function GetProfileImage($id){
		$con = getConnection();
		$sql = "select * from accounts where id={$id}";
		$s=mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($s);
		return $data;
	}

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
		$sql = "select * from students where invite != 1 and s_name like '%{$name}%'";

		$result = mysqli_query($con, $sql);
		return $result;
	}

	function J_SearchApplicantsByName($name){
		$con = getConnection();
		$sql = "select * from appliers where accept != 1 and Username  like '%{$name}%'";
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
		$sql = "insert into accounts values('{$user['username']}', '{$user['password']}', '{$user['email']}', '{$user['phone']}', '{$user['role']}', '','','')";

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
		$sql2 = "update students set invite='1' where s_name ='{$user['s_name']}'";

		mysqli_query($con, $sql2);


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}



	function J_addjobaccepts($user){
		$con = getConnection();
		$sql = "insert into AcceptedApplicantsList values('', '{$user['j_name']}', '{$user['s_name']}')";
		$sql2 = "update appliers set accept='1' where Username ='{$user['s_name']}'";

		mysqli_query($con, $sql2);

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
		$sql = "select * from students where invite != 1";
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
		$sql = "select * from appliers where Accept!=1";
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
		$sql = "select * from students where s_id={$id}";
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
	function I_getRolebyuName($name){
		$con = getConnection();
		$sql = "select * from instructor where username='{$name}'";
		$result = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}


		function I_validate($username, $password){
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

		function I_addUser($user){
			$con = getConnection();
			$sql = "insert into accounts values('{$user['username']}', '{$user['password']}', '{$user['email']}','{$user['phone']}', '{$user['role']}','')";

			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_getAllUsers(){
			$con = getConnection();
			$sql = "select * from accounts";
			$result = mysqli_query($con, $sql);
			return $result;
		}
		function I_getAllStudents(){
			$con = getConnection();
			$sql = "select * from students";
			$result = mysqli_query($con, $sql);
			return $result;
		}

		function I_getUserById($id){
			$con = getConnection();
			$sql = "select * from instructor where i_id={$id}";
			$result = mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($result);
			return $data;
		}

		function I_getStudentById($id){
			$con = getConnection();
			$sql = "select * from students where s_id={$id}";

			$result = mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($result);
			return $data;
		}


		function I_SearchByName($name){
			$con = getConnection();
			$sql = "select * from students where s_name like '%{$name}%'";
			$result = mysqli_query($con, $sql);
			return $result;
		}

		function I_SearchByNameForAccounts($name){
			$con = getConnection();
			$sql = "select * from accounts where username like '%{$name}%'";
			$result = mysqli_query($con, $sql);
			return $result;
		}

		function I_editIns($user){
			$con = getConnection();
			$sql = "update instructor set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}' where i_id={$user['id']}";
			//echo $sql;
			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_edit($user){
			$con = getConnection();
			$sql = "update accounts set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}', phone='{$user['phone']}' where id={$user['id']}";

			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}
		function I_setStatus($id,$status){
			$con = getConnection();

			$sql = "update students set status='{$status}' where s_id={$id}";


			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}
		function I_setRG($id,$status){
			$con = getConnection();

			$sql = "update courses set status='{$status}' where No={$id}";
			//echo $sql;

			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_deleteUser($id){
			$con = getConnection();
			$sql = "delete from accounts where id={$id}";
			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_GetBio($username){
			$con = getConnection();
			$sql = "select post from posts where username='{$username}'";
			$s=mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($s);
			return $data;
		}

		function I_Post($user,$userpost){
			$con = getConnection();
			//$sql = "insert into posts values('', {$user['i_id']}, '{$userpost}', '{$user['username']}')";
			$sql = "insert into posts values('', '{$user['i_id']}', '{$userpost}', '{$user['username']}') ";
			//echo $sql;

			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_uploadP($photo,$id){
			$con = getConnection();
			$sql = "update instructor set photo='{$photo}' where i_id={$id}";

			if(mysqli_query($con, $sql)){
				return true;
			}else{
				return false;
			}
		}

		function I_GetProfilePic($id){
			$con = getConnection();
			$sql = "select * from instructor where i_id={$id}";
			$s=mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($s);
			return $data;
		}
?>
