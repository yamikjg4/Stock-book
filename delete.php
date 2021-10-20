<?php
include('config.php');
$id=$_GET['id'];
$query="DELETE FROM holder WHERE holder_id=$id";
$exe=mysqli_query($con,$query);
if($exe){
    header("location:holder.php");
}
?>