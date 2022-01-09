<?php 
	session_start();
	include("s_nav.php");
    include "../Model/db_connection.php";
    $sql="  SELECT * FROM blogs  ";
    $conns = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>

<html>
<head>
	<title> Welcome to UniHub </title>
</head>

<body>
        <?php while($get=mysqli_fetch_assoc($conns)){?>
        <fieldset style="border: 2px solid orange;">
                <table width="100%">

                    <tr>
                        <td colspan="3"><h2><?php echo $get['b_title']?></h2></td>

                    </tr>
                    <tr>
                      <td><?php echo $get['b_details']?></td>
                    </tr>

                    <tr>
                        <td colspan="3"><hr color="green" size="4"></td>

                    </tr>
                    <tr>
                        <td colspan="2">Posted By <a href="#" >
                            <?php
                                if($get['b_post_id']==1){
                                    echo "Admin";
                                }
                                else if($get['b_post_id']==2){
                                    echo "Instructor";
                                }
                                else if($get['b_post_id']==3){
                                    echo "Job Recruiter";
                                }
                                else {
                                    echo "Student";
                                }
                            ?>
                        </a> <img src="../assets/comments.svg" style="margin-left:10px"> <span><?php echo @$get['cid']?></span>Comments </td>
                    </tr>
                    <tr>
                        <td>
 <div style="margin-top:15px" id="div2">

<table>
  <tr>
    <th align="left" ><u><span >All Comments</span></u></th>
  </tr>
    <form action="../Controller/s_comment.php" method="post">
<tr>
    <td><textarea required type="text" name="comments" placeholder="your comment" style="margin-top:15px"></textarea></td>
</tr>
<tr>
    <tr></tr>
    <td><button type="submit" name="btn" value="<?php echo $get['b_id']?>">Comment </button></td>
</tr>
</form>
  <?php
   $sql="select * from comments where blog_id='".$get['b_id']."' order by id desc   limit 4 " ;
 $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

   if($query)
 {
  while($get=mysqli_fetch_assoc($query)){
?>
    <tr><td><p><b><?php echo @$get['name']?></b></p></td></tr>
  <tr><td><p><?php echo @$get['comments']?></p></td></tr>
 <?php } }?>
</table>
</div>
</div>
</td>
<tr>
    </table>
</fieldset> <br><br>
    <?php }?>



</body>

</html>
