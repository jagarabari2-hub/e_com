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
    $j="INSERT INTO reg_t(f_n,l_n,ph_n,mail,pass,re_pass)VALUES('".$_POST['j1']."','".$_POST['j2']."',".$_POST['j3'].",'".$_POST['j4']."','".$_POST['j5']."','".$_POST['j6']."')";
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

<link rel="stylesheet" type="text/css" href="ocss/style-3.css">
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

  <main class="form-signin w-100 m-65">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">REGISTRATION FORM</h1> 
        <div class="form-floating"> 
            <input type="text" class="form-control" id="FirstNInput" name="j1" placeholder="First Name" required> <label for="FirstNInput">First Name</label> </div> 
        <div class="form-floating"> 
            <input type="text" class="form-control" id="LastNInput" name="j2" placeholder="Last Name" required> <label for="LastNInput">Last Name</label> </div> 
        <div class="form-floating">
            <input type="text" class="form-control" id="phoneInput" name="j3" placeholder="Enter Your phone No" required>
            <label for="phoneInput">Phone Number</label> </div> 
        </div>
        <div class="form-floating"> 
            <input type="email" class="form-control" id="floatingInput" name="j4" placeholder="name@example.com" required> <label for="floatingInput">Email address</label> 
        </div> 
        <div class="form-floating"> 
            <input type="password" class="form-control" id="floatingPassword" name="j5" placeholder="Password" required> <label for="floatingPassword">Password</label> 
        </div>
        <div class="form-floating"> 
            <input type="password" class="form-control" id="floatingPassword-2" name="j6" placeholder="Re-type Password" required> <label for="floatingPassword-2">Re-type Password</label> 
        </div>  

            <div class="form-check text-start my-3"> <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault" required> <label class="form-check-label" for="checkDefault">Remember me</label> 
            </div> 
            <button class="btn btn-primary py-2 w-40" id="btn-primary-1" type="submit" name="b1">REGISTER</button> 
            <button class="btn btn-primary py-2 w-40" id="btn-primary-1" type="reset">CANCEL</button>
  </form>
</main>  

</body>
</html>