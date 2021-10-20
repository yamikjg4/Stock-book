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
      if(isset($_POST['submit'])){
          if(!(empty($_POST['qty']))){
            $holder=$_POST['holder'];
            $share=$_POST['share'];
            $count=$_POST['qty'];
            $insert="INSERT INTO detail (holder_id,share_id,share_count) VALUES('$holder','$share','$count')";
            $execute=mysqli_query($con,$insert);
            if($execute){
                echo '<script>alert("Insert Sucessfully");</script>';
            }
            else{
                echo '<script>alert("Insert Fail");</script>';
            }
          }
          else{
              echo '<script>alert("Please Fill Data");</script>';
          }
      }
      ?>
       <div id="content">
        <div class="conatiner">
            <div class="card">
                <div class="card-header text-light bg-primary text-center">
                    Issue Share Details
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                          <label for="">Select Holder</label>
                          <?php 
                          $query="SELECT * FROM holder";
                          $res=mysqli_query($con,$query);
                          ?>
                          <select name="holder" id="" class="form-control">
                              <?php while($exe=mysqli_fetch_array($res)){?>
                        <option value="<?php echo $exe['holder_id'];?>"><?php echo $exe['holder_name'];?></option>
                        <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="">Select Share Name</label>
                          <?php 
                          $query1="SELECT * FROM share";
                          $res1=mysqli_query($con,$query1);
                          ?>
                          <select name="share" id="" class="form-control">
                              <?php while($exe1=mysqli_fetch_array($res1)){?>
                        <option value="<?php echo $exe1['share_id'];?>"><?php echo $exe1['share_name'];?></option>
                        <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="">Qty</label>
                          <input type="number" name="qty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <!-- <small id="helpId" class="text-muted">Help text</small> -->
                        </div>
                        <button class="btn btn-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </div>
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>