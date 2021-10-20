<?php
session_start();
$_SESSION['id']=$_GET['id'];
if($_SESSION['id']){
    header("location:show.php");
}
?>