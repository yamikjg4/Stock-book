<?php
include('config.php');
$id=$_GET['id'];
$query="DELETE FROM detail WHERE id=$id";
$exe=mysqli_query($con,$query);
if($exe){
    header("location:show.php");
}
?>