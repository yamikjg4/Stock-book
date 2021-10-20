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
      if (isset($_POST['register'])) {
          if (!(empty($_POST['name']) && empty($_POST['phone']))) {
              $name=$_POST['name'];
              $phone=$_POST['phone'];
              $quer="INSERT INTO holder (holder_name,contact_no) VALUES ('$name','$phone')";
              $insert=mysqli_query($con, $quer);
              if ($insert) {
                  echo '<script>alert("Insert Sucessfully");</script>';
              } else {
                  echo '<script>alert("Insert Fail");</script>';
              }
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
                          <input type="text" name="name" id="" class="form-control" placeholder="Share Holder name" aria-describedby="helpId">
                          <!-- <small id="helpId" class="text-muted">Help text</small> -->
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="tel" id="phone" class="form-control" name="phone" required pattern="[0-9]{10}">
                            
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-block mt-2" name="register">Register</button>
                        </div>
                    
                    </form>
                </div>
            </div>
           
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>holder_name</th>
                    <th>Contact_no</th>
                    <th>operation</th>
                </thead>
                <tbody>
                <?php $show="SELECT * FROM holder";
            $result=mysqli_query($con,$show);
            while ($data=mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['holder_id'];?></td>
                        <td><?php echo $data['holder_name'];?></td>
                        <td><?php echo $data['contact_no'];?></td>
                        <td><a href="edit.php?id=<?php echo $data['holder_id'];?>"><i class="fas fa-edit"></i></a>
                        <a href="delete.php?id=<?php echo $data['holder_id'];?>" onclick="return delete1()"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                   <?php
            } ?>
                </tbody>
            </table>
        </div>

    </div>

  </div>
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
         function delete1(){
        return confirm("Are You Sure Delete This Record");
    }
    </script>
  </body>
</html>