<?php
include('config.php');
?>
<?php
session_start();
$id=$_SESSION['id'];;
   $que="SELECT * FROM detail JOIN holder ON detail.holder_id=holder.holder_id
   JOIN share ON detail.share_id=share.share_id WHERE share.share_name LIKE '%$search%' AND holder.holder_id=$id";
   $exe=mysqli_query($con,$que);
   if(mysqli_num_rows($exe)>0){
       while($result=mysqli_fetch_array($exe)){
        echo '<option value="'.$result["share_name"].'">'.$result["share_name"].'</option>';;
       }
   }
?>