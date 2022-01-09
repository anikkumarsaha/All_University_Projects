<?php
    include('header.php');
 ?>
<html>
<head>
	<title>POST</title>
  <link rel="stylesheet" href="Post.css">
  <link rel="stylesheet" href="body.css">
</head>
<body>
  <div class="panel">

    <table width="100%">
      <tr>
        <td width="33%">
          <div class="linksR">
        <a href="registrationList.php">Registration List</a>
        <a href="userlist.php">User List </a>
        <a href="post.php">POST </a>
          </div>
        </td>
        <td align="center" width="20%">
        <h1>UniHub</h1>
        </td>
          <td>
            <div class="linksL" >
            <a href="profile.php" ><?php echo " ".$_COOKIE['username']?></a>
            <a href="../views/newsfeed.php">Newsfeed </a>
            <a href="../controller/logout.php">logout </a>
            </div>
      </tr>
    </table>
  </div>

<div class="form">


	<form method="post" >
		<fieldset>
			<legend>POST</legend>
			<table>
        <tr>
          <td>
            <textarea placeholder="Title" name="Title" id="Title" cols="25" rows="3"></textarea>
          </td>
          <div id="nTitle">

          </div>
        </tr>
				<tr>
					<td>
						<br><textarea placeholder="What's on your mind?" name="Post" id="Post" cols="200" rows="25"></textarea>
					</td>
          <div id="nPost">

          </div>
				</tr>
				<tr>

					<td>
						<button type="post" name="post" onclick='done()'>POST</button>
					</td>
				</tr>
				<tr>

					<td>
						<div id="notification" >

            </div>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

  <input type="text" id="id" hidden value='<?=$_COOKIE['id']?>'>
  <input type="text" id="username" hidden value='<?=$_COOKIE['username']?>'>

</div>
<script src="../controller/scripts.js" charset="utf-8"></script>
</body>
</html>
