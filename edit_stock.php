<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="icons.js"></script>
    <title>Document</title>
</head>
<body>
<?php include('template.php');
include('config.php');
?>
<?php
$id=$_GET['id'];
$query="SELECT * FROM detail JOIN share ON share.share_id=detail.share_id WHERE Id=$id";
$exe=mysqli_query($con,$query);
$res=mysqli_fetch_array($exe);
if(isset($_POST['update'])){
    $qty=$_POST['qty'];
    $query1="UPDATE detail SET share_count=$qty WHERE Id='$id'";
    $execute=mysqli_query($con,$query1);
    if ($execute) {
        echo '<script>alert("Update Sucessfully");</script>';
        ?>
        <meta http-equiv="refresh" content="1;url=show.php" />
<?php
    } 
    else{
        echo '<script>alert("Update Fail");</script>';
    }     
}
?>
 <div id="content">
    <div class="container">
        <div class="card">
            <div class="card-hearder text-center bg-primary text-light">
                Edit Stock
            </div>
            <div class="card-body">
                <form action="" method="post">
                <div class="form-group">
                    <label for="">Stock-Name</label>
                    <input id="" class="form-control" type="text" value="<?php echo $res['share_name']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input id="" class="form-control" type="number" value="<?php echo $res['share_count']?>" name="qty">
                </div>
                <button class="btn btn-primary btn-block" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>

  </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>