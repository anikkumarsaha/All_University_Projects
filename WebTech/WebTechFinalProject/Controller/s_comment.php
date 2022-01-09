
<?php
session_start();
include '../Model/db_connection.php';
if(isset($_POST['btn'])){

if($_SESSION['id']==''){
    echo "<script>alert('You need to loging for comment')</script>";
    echo "<script>window.location.replace('../views/s_index.php')</script>";

}

else{
    extract($_POST);
    extract($_GET);
    $comments=$_POST['comments'];
    $btn=$_POST['btn'];
    $sql="insert into comments ( user_id, name, blog_id	,comments, comment_id) value('4', '".$_SESSION['name']."', '$btn','$comments','".$_SESSION['id']."' )";
    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($query){
        echo"<script>location.replace('../views/s_index.php')</script>";
    }
    else
    {
        die(mysqli_error($conn));
    }
}

}

?>  