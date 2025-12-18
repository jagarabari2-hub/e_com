<?php

session_start();
  if(!isset($_SESSION['admin']))
  {
    
    /*echo "welcome ....".$_SESSION['admin'];*/
  
  }
    else  
  {
    
    header('location:admin-log.php');
    exit();
  }

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="ocss/style-1.css">
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="FashionMart.php">Dashboard Admin Panel</a>
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
    <h4 class="txt-head">Man Category</h4>
    <div class="grid-container-1">
        <span class="scroll-arr" id="scr-bar-1"><</span>
        <div class="box-1">
            <img src="img/4.jpg" class="img-box"><a href="cat.php"><b><i>Shirt</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/60.jpg" class="img-box"><a href="cat.php"><b><i>T-shirt</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/63.jpg" class="img-box"><a href="cat.php"><b><i>Pants</i></b></a>
        </div>
        <div class="box-1">
            <img src="img/4.jpg" class="img-box"><a href="cat.php"><b><i>Hat</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/60.jpg" class="img-box"><a href="cat.php"><b><i>Bag</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/63.jpg" class="img-box"><a href="cat.php"><b><i>Glasses</i></b></a>
        </div>
        <span class="scroll-arr" id="scr-bar-2">></span>
    </div><br>
    <div class="txt-hin">
    <h4 class="txt-head">Woman Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/3.jpg" class="img-box"><a href="cat.php"><b><i>Outfit</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/5.jpg" class="img-box"><a href="cat.php"><b><i>Outfit</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/62.jpg" class="img-box"><a href="cat.php"><b><i>Outfit</i></b></a>
        </div>
    </div>        
    </div><br>
    <h4 class="txt-head">Kids Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>
    <h4 class="txt-head">Electronics Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Fashion Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Pets Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Books Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Media Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Health Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Beauty Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Home Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Kitchen Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Toys Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">hobbies Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Food Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>

    <h4 class="txt-head">Beverages Category</h4>
    <div class="grid-container">
        <div class="box-1">
            <img src="img/61.jpg" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-2">
            <img src="img/16.png" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        <div class="box-3">
            <img src="img/17.jfif" class="img-box"><a href="cat.php"><b><i>blank</i></b></a>
        </div>
        
    </div><br>


</body>
</html>