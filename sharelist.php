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
      if(isset($_POST['insert'])){
          if(!(empty($_POST['name']))){
            $name=$_POST['name'];
            $select="SELECT * FROM share WHERE share_name='$name'";
            $exe=mysqli_query($con,$select);
            if(mysqli_num_rows($exe)>0){
              echo '<script>alert("Alredy Avalible");</script>';
            }
            else{
                $insert="INSERT INTO share(share_name) VALUES('$name')";
                $sql=mysqli_query($con, $insert);
                if ($sql) {
                    echo '<script>alert("Insert sucessfully");</script>';
                } else {
                    echo '<script>alert("Insert Fail");</script>';
                }
            }
          }
      }
      ?>
       <div id="content">
        <div class="card">
            <form action="" method="post">
            <div class="card-header bg-primary text-light text-center">
                Share-Name
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="">Share Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <!-- <small id="helpId" class="text-muted">Help text</small> -->
                </div>
                <button class="btn btn-primary btn-block" name="insert">Share data</button>
            </div>
            </form>
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