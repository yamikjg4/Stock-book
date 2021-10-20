<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="icons.js"></script>

    <title>Sidebar + Navbar</title>
  </head>
  <body>
      <?php include('template.php');
      include('config.php');
      ?>
      <?php 
      $id=$_GET['id'];
      $query="SELECT * FROM holder WHERE holder_id=$id";
      $exe=mysqli_query($con,$query);
      $res=mysqli_fetch_array($exe);
      if(isset($_POST['Update'])){
          $name=$_POST['name'];
          $phone=$_POST['phone'];
      $update="UPDATE holder SET holder_name='$name',contact_no='$phone' WHERE holder_id=$id";
      $exec=mysqli_query($con,$update);
      if($exec){
          echo '<script>alert("Updated Sucessfully");</script>';
          ?>
          <meta http-equiv="refresh" content="1;url=holder.php" />
      <?php    
      }
    }
      ?>
       <div id="content">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary text-center text-light">Share-Holder</div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                          <label for="">Share Holder Name</label>
                          <input type="text" name="name" id="" class="form-control" placeholder="Share Holder name"  value="<?php  echo $res['holder_name'];?>">
                          <!-- <small id="helpId" class="text-muted">Help text</small> -->
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="tel" id="phone" class="form-control" name="phone" required pattern="[0-9]{10}" value="<?php echo $res['contact_no'];?>">
                            
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-block mt-2" name="Update">Update</button>
                        
                        </div>
                    
                    </form>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>