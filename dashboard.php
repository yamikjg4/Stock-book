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
<style>
  .div1{
    height:200px;
    border-radius: 20px;
    background-color: purple;
  }
  .div2{
    height:200px;
    border-radius: 20px;
    background-color: maroon;
  }
  </style>
    <title>Sidebar + Navbar</title>
  </head>
  <body>
      <?php include('template.php');
      include('config.php');
      ?>
       <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="w-100 div1" id="div1">
            <p class="h4 pt-5 text-light text-center">Stock holder</p>
            <?php
            $count="SELECT COUNT(holder_name) FROM holder";
            $exe=mysqli_query($con,$count);
            $res=mysqli_fetch_array($exe);
            ?>
              <p class="h4 pt-1 text-light text-center"><?php echo $res[0];?></p>
            </div>
          </div>
          <div class="col-6">
 <div class="w-100 div2" id="div2">
 <p class="h4 pt-5 text-light text-center">Share</p>
 <?php
            $count1="SELECT COUNT(share_name) FROM share";
            $exe1=mysqli_query($con,$count1);
            $res1=mysqli_fetch_array($exe1);
            ?>
              <p class="h4 pt-1 text-light text-center"><?php echo $res1[0];?></p>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
    <div class="table-responsive mt-3" style="display:none;" id="table2">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Share_id</th>
        <th>Share Name</th>
        <th>Total share</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $show="SELECT SUM(share_count)AS issue,share.share_id,share_name FROM detail
      JOIN share ON share.share_id=detail.share_id GROUP BY share_name";
      $exees=mysqli_query($con,$show);
      while($ress=mysqli_fetch_array($exees)){
      ?>
      <tr>
        <td><?php echo $ress['share_id'];?></td>
        <td><?php echo $ress['share_name'];?></td>
        <td><?php echo $ress['issue'];?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <div class="table-responsive mt-3" id="table1" style="display: none;">
    <table class="table table-dark">
        <thead>
          <th>id</th>
          <th>holder_name</th>
          <th>issue_shares</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $query="SELECT SUM(share_count)AS issue,holder_name,holder.holder_id FROM holder
          JOIN detail ON holder.holder_id=detail.holder_id GROUP BY holder_name";
          $execute=mysqli_query($con,$query);
          while($res3=mysqli_fetch_array($execute)){
          ?>
          <tr>
            <td><?php echo $res3['holder_id'];?></td>
            <td><?php echo $res3['holder_name']?></td>
            <td><?php echo $res3['issue']?></td>
            <td><a href="sessiond.php?id=<?php echo $res3['holder_id'];?>" class="btn btn-primary">Show Issue</a></td>
          </tr>
          <?php
        }?>
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
      $(document).ready(function(){
        $('#div2').click(function(){
          // alert();
          $('#table2').toggle();
          $('#table1').hide();
        })
        $('#div1').click(function(){
          // alert();
          $('#table1').toggle();
          $('#table2').hide();
        })
      });
    </script>
  </body>
</html>