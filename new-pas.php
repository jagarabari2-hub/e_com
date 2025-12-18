<?php

session_start();
  if(isset($_SESSION['admin']))
  {
    
    /*echo "welcome ....".$_SESSION['admin'];*/
  
  }
    else  
  {
    
    header('location:main-dis.php');
    exit();
  }
  if(isset($_POST['submit']))
  {
    header('location:admin-log.php');
    $con=mysqli_connect('localhost','root','','shoping')or die('db not connect');
    $u="INSERT INTO user_1(pass,re_pass,old_pass)VALUES('".$_POST['i2']."','".$_POST['i1']."','".$_POST['i3']."')";
    
	$rsj=mysqli_query($con,$u)or die("error");
  }
  /*else
  {
      $old_p = $_POST['i1'];
      $ps    = $_POST['i2'];
      $re_p  = $_POST['i3'];
      if($old_p!=$re_p=$ps)
      {
        echo "Password doesn't match re-type";
      }
  }*/
  
  
	

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="ocss/style-2.css">
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="main-dis.php">Dashboard Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
        <hr>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="cat.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="sub_cat.php">Sub-Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              
              <li><a class="dropdown-item" href="user.php">User</a></li>
              <li><a class="dropdown-item" href="cart.php">Cart</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="admin-log.php">Log in</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        
              
      </div>
    </div>
  </div>
</nav><br><br><br>
    
    <div class="user-form-3">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <h6 class="txt-r">Reset Your Password</h6>

        <label>Old Password</label><input class="inp-0-1" value="" type="password" name="i1" placeholder="Enter Old Password" required><br>
       
        <label>New Password</label><input class="inp-0-2" value="" type="password" name="i2" placeholder="Enter New Password" required><br>

        <label>Re-type Password</label><input class="inp-0-3" value="" type="password" name="i3" placeholder="Re-type New Password" required><br>

     
 <br>
        <input type="submit" name="submit" value="SUBMIT" class="btn-0-1">
        <input type="reset" name="b1" value="CANCEL" class="btn-0-2">
    </form>
    
    </div>
    

</body>
</html>