<?php
session_start();
if(!$_SESSION['user']){
    header("location:index.php");
}
// else{
//     header("location:template.php");
// }
?>