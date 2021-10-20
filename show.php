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
$id=$_SESSION['id'];
?>
<div id="content">
<div class="container">
    <div class="card d-print-none">
        <div class="card-header">
        <form action="#" method="POST">
            <div class="input-group">
            <input list="output" type="text" name="search" class="form-control" id="search" autocomplete="off">
      <datalist id="output">
        <!-- <option val="value">display test</option> -->
      </datalist>
   <span class="input-group-btn pl-1">
        <button class="btn btn-primary" name="show"><i class="fa fa-search" aria-hidden="true"></i></button>
   </span>
        </div>
    </div>
</div>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <th>id</th>
                <th>Holder_name</th>
                <th>Share Name</th>
                <th>Qty</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                if(isset($_POST['show'])){
                    if(!(empty($_POST['search']))){
                        $id=$_SESSION['id'];
                        $search=$_POST['search'];
                        $query="SELECT * FROM detail JOIN holder ON detail.holder_id=holder.holder_id
                        JOIN share ON detail.share_id=share.share_id WHERE share.share_name LIKE '%$search%' AND holder.holder_id=$id";
                        $execute=mysqli_query($con,$query);
                    }
                    else{
                        $id=$_SESSION['id'];
                        $query="SELECT * FROM detail JOIN holder ON detail.holder_id=holder.holder_id
                        JOIN share ON detail.share_id=share.share_id WHERE holder.holder_id=$id";
                        $execute=mysqli_query($con,$query);
                    }
                }
                // session_start();
               else{
                $query="SELECT * FROM detail JOIN holder ON detail.holder_id=holder.holder_id
                JOIN share ON detail.share_id=share.share_id WHERE holder.holder_id=$id";
                $execute=mysqli_query($con,$query);
               }
               if (mysqli_num_rows($execute)>0) {
                   while ($res3=mysqli_fetch_array($execute)) {
                       ?>
                <tr>
                    <td><?php echo $res3['holder_id']; ?></td>
                    <td><?php echo $res3['holder_name']?></td>
                    <td><?php echo $res3['share_name']?></td>
                    <td><?php echo $res3['share_count']?></td>
                    <td>
                    <a href="edit_stock.php?id=<?php echo $res3['Id']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="delete_stock.php?id=<?php echo $res3['Id']; ?>" onclick="return delete1()"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                   }
               }
               else{
                   echo '<script>alert("No Record here");</script>';
               }?>
            </tbody>
        </table>
    </div>
</div>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
<script>
    $(document).ready(function(){
        $("#search").keypress(function(event) {
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {
                name: $("#search").val(),
            },
            success: function(data) {
                event.preventDefault();
                console.log("hi");
                $("#output").html(data);
            }
        });
    });
    });
    function delete1(){
        return confirm("Are You Sure Delete This Record");
    }
</script>
</body>
</html>