<?php include('session.php');?>

<nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="">
      <h3 id="logo">ShareTrading</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" id="link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          LogOut<span class="sr-only">(current) </span></a>
        </li>
       
      </ul>
    </div>
  </nav>

  <div class="wrapper fixed-left">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><i class="fas fa-user"></i><?php echo $_SESSION['user'];?></h3>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="dashboard.php"><i class="fas fa-home"></i>Home</a>
        </li>
        <li>
          <a href="dashboard.php"><i class="fas fa-clipboard"></i>Dashboard</a>
        </li>
        <li>
          <a href="holder.php"><i class="fas fa-user-cog"></i>Share-Holder</a>
        </li>
        <li>
          <a href="sharelist.php"><i class="fas fa-hands-helping"></i>Share-list</a>
        </li>
        
        <li>
          <a href="shareadd.php"><i class="fas fa-info"></i>Share-Add</a>
        </li>
      </ul>
    </nav>

    <!-- <div id="content">

    </div>

  </div> -->