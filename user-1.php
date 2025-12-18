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
  if(isset($_POST['b1']))
  {
  $con=mysqli_connect('localhost','root','','shoping')or die('db not connect');
  $j="insert into user_1(email,pass)values('".$_POST['i1']."','".$_POST['i2']."')";
  $q=mysqli_query($con,$j)or die('Query not fire');
  }
  
	

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
    <div class="user-form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Email</label><input class="inp-1" type="email" name="i1" placeholder="Email" required><br>
        <label>Password</label><input class="inp-2" type="passward" name="i2" placeholder="Passward" required><br>
        <a href="forgot-p.php" name="forg-p" class="forgot-pass">Forgot Password?</a><br>
 
        <input type="submit" name="b1" value="LOG IN" class="btn-1">
        <input type="reset" name="b1" value="CANCEL" class="btn-2">
        <p class="rge">Don't have an account?<a href="reg.php" class="rge-1">Register</a></p>
    </form>
    
    </div>
    

</body>
</html>