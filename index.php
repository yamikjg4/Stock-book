<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .loader {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 175px;
    height: 250px;
}

.loader .img {
    width: 100%;
    /* text-align: center; */
}
.content{
    display: none;
}
.alignment{
    width: 50%;
}
@media screen and (max-width: 700px) and (min-width:0px){
    .alignment{
    width: 100%;}
}
        </style>
</head>
<body>
    <?php
    include('config.php');
    ?>
   
    <?php
    session_start();
     $user_err='';
     $data='';
     $pass_err='';
    if (isset($_POST['login'])) {
        if (!(empty($_POST['email']) && empty($_POST['password']))) {
            $email=$_POST['email'];
            $pwd=$_POST['password'];
            $query="SELECT * FROM user WHERE email_id='$email'";
            $res=mysqli_query($con, $query);
            $count=mysqli_num_rows($res);
            if ($count>0) {
                $show=mysqli_fetch_array($res);
                $pass=$show['password'];
                $check=password_verify($pwd,$pass);
                if($check){
                    header("location:dashboard.php");
                    $_SESSION['user']=$show['user_name'];
                }
                else{
                    $pass_err="Password Not Match";
                }
            } else {
                $user_err="User Not Found";
            }
        }
        else{
            $data="Something Missing";
        }
    }
   
    ?>
    <div class="loader" style="margin: auto;">
        <img src="loader-loading.gif" alt="" style=" background-size:100% 100%;">
    </div>
    <div class="content m-5">
        <div class="container py-5">
        <div class="card mx-auto alignment">
            <div class="card-header text-center text-light bg-success">
                Login
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="form-group">
                      <label for="">Email Adress</label>
                      <input type="text" name="email" id="" class="form-control" placeholder="Enter Email Adrees" aria-describedby="helpId">
                      <!-- <small id="helpId" class="text-muted">Help text</small> -->
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" id="" class="form-control" placeholder="Enter Password" aria-describedby="helpId">
                      <span style="color:red;"><?php echo $pass_err?></span>
                    </div>
                    <span style="color:red;"><?php echo $user_err?></span>
                    <span style="color:red;"><?php echo $data?></span>
                    <button class="btn btn-primary btn-block" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script>
    window.onload=function(){
        $('.loader').hide();
        $('.content').show();
    }
</script>
</html>