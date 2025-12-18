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
    if(isset($_POST['b1']))
    {
		$con=mysqli_connect('localhost','root','','shoping');
        if(!$con)
        {
            die ("db not connect");
        }
		//for image
	$filename = $_FILES['f1']['name'];
	$tempname = $_FILES['f1']['tmp_name'];
	$folder = "./image/" . $filename;
	
        $q=mysqli_query($con,"insert into product(cat_id,subcat_id,p_nm,img,price,description)values(".$_POST['i1'].",".$_POST['i2'].",'".$_POST['i3']."','$filename',".$_POST['i4'].",'".$_POST['i5']."')")or die("query not fire");
		
		if(move_uploaded_file($tempname,$folder))
	{
		echo "Image uploaded successfully!";
	}
	else
	{
		echo "Failed to upload image!";
	}

    }
    ?>



<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="ocss/product.css">
<script src="js/bootstrap.bundle.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Dashboard Admin Panel</a>
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
            <a class="nav-link active" aria-current="page" href="cat.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="sub_cat.php">Sub-Category</a>
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
</nav>

	<div id="main">
		
		<hr>
         <h3 class="txt-1">Product Add</h3>
        <hr><br><br>
        

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<p>Category : </p><select class="txt-2" name="i1" id="s1">
			<option value="">---select  --- </option>
			
			<?php
			$con=mysqli_connect('localhost','root','','shoping');
			$rs=mysqli_query($con,"SELECT id,name FROM category ORDER By id ASC");
			while($row=mysqli_fetch_assoc($rs))
			{
			?>
			<option value="<?php echo $row['id']; ?>">
			
			<?php echo $row['name']; ?>
			</option>
			<?php
			}
			?>
			</select><br><br>
			<p>Sub-category : </p><select class="txt-3" name="i2" id="s2">
				<option value="">--- select --- </option>
				<script>
					$(document).ready(function() 
					{
						$('#s1').on('change', function() 
						{
							var cat_id = $(this).val();
						if (cat_id) 
						{
							$.ajax({
								type: 'POST',
								url: 'n_p.php',
								data: {cat_id: cat_id},
								dataType: 'json',
								success: function(data) {
									$('#s2').empty().append('<option value="">---select---</option>');
									$.each(data, function(key, value) 
								{
										$('#s2').append('<option value="' + value.subcat_id + '">' + value.subcat_nm + '</option>');
								});

														} 
								   });
						} 
						else
							{
							$('#s2').empty().append('<option value="">---select---</option>');
							}
						});
					});


				</script>
          
			
			</select><br><br>
			<p>Product Name : </p><input class="txt-4" type="text" name="i3" required><br><br>
			<p>Product Image : </p><input class="txt-5" type="file" name="f1" required><br><br>
			<p>Product Price : </P><input class="txt-6" type="text" name="i4" required><br><br>
			<p>Product Description : </p><input class="txt-7" type="text" name="i5" required><br><br>
			
            
            

            


            <input type="submit" class="btn-1" name="b1" value="add products"><br><br>

        </form>
		
		<hr>
		<h3 class="txt-8">View Product</h3>
		<hr><br><br>
		
			<div class="container-1">
				<div class="row">
				<div class="col">p_id</div>
				<div class="col">cat_id</div>
				<div class="col">subcat_id</div>
				<div class="col">p_nm</div>	
				<div class="col">img</div>
				<div class="col">price</div>
				<div class="col">discription</div>
				<div class="col">Edit</div>
				<div class="col">Delete</div>
				</div>
				<?php
					$con=mysqli_connect("localhost","root","","shoping");
					$limit = 4;
					if (isset($_GET["page"]))
						{
							$pn = $_GET["page"];
						}
					else
						{
							$pn=1;
						};
		
					$start_from = ($pn-1) * $limit;
		
					$q="select * from product LIMIT $start_from, $limit";
					$rs=mysqli_query($con,$q);
					if(mysqli_num_rows($rs)>0)
						{
							foreach($rs as $h)
						{
							$id=$h['p_id'];
				
							?>
				
							<div class="row">
							<div class="col"><?= $h['p_id'] ?></div>
							<div class="col"><?= $h['cat_id'] ?></div>
							<div class="col"><?= $h['subcat_id'] ?></div>
							<div class="col"><?= $h['p_nm'] ?></div>
							<div class="col"><img src="./image/<?= $h['img'] ?>" height="60px" width="60px" alt="..."></div>
							<div class="col"><?= $h['price'] ?></div>
							<div class="col"><?= $h['description'] ?></div>
							<div class="col"><a class=sour href="edit_pro.php?sid=<?= $h['p_id']; ?>">Edit</a></div>
							<div class="col"><a class=sour href="del_pro.php?sid=<?= $h['p_id']; ?>">Delete</a></div>
							</div><hr>

							<?php
						}
						}
					else
						{
							?>
							<?php
						}
				?>
					<ul class="page-1">
					<?php
				        $sql = "SELECT COUNT(*) FROM product";
				        $rs_result = mysqli_query($con,$sql);
				        $row = mysqli_fetch_row($rs_result);
				        $total_records = $row[0];
				        
				        $total_pages = ceil($total_records / $limit);
				        $pagLink = "";
				        for ($i=1; $i<=$total_pages; $i++) {
				        	if ($i==$pn)
				        	{
				        		$pagLink .= "<li class='active'><a class=j1 href='product.php?	page=".$i."'>".$i."</a></li>";
				        	}
				        	else
				        	{
				        		$pagLink .= "<li class='active'><a class=j1 href='product.php?page=".$i."'>".$i."</a></li>";
				        	}
				};
				echo $pagLink;
					?>
					</ul>
				
				
			
			
			
			</div>
			<br><br>
			<footer class="footer_1">
    <div class="footer">
<div class="jumbotron text-center">
	<h1>Admin</h1>
	<p>Dashboard Panel</p><br><br>
	<div class="container">
		<div class="row">
		<div class="col-sm-4">
		<h3>About</h3>
		<p>Contact</p>
		<p>Careers</p>
		<p>Community Guidelines</p>
		<p>Subscribe</p>
		<p>Cookie Policy</p>
		<p>Legal</p>
		<p>Do Not Sell or Share My Personal Information</p>
		<p id="dash-b">Dashboard</p>




	</div>
	<div class="col-sm-4">
		<h3>More</h3>
		<p>English</p>
		<p>Corporate</p>
		<p>Privacy</p>
		<p>New York</p>
		<p>London</p>
		<p>Paris</p>
		<p>Bogotá</p>
		<p>MCMXCVIII</p>
	</div>
	<div class="col-sm-4">
		<h3>Contact Us</h3>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg> X<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg> Instagram<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
</svg> Youtube<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
</svg> Facebook<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitch" viewBox="0 0 16 16">
  <path d="M3.857 0 1 2.857v10.286h3.429V16l2.857-2.857H9.57L14.714 8V0zm9.714 7.429-2.285 2.285H9l-2 2v-2H4.429V1.143h9.142z"/>
  <path d="M11.857 3.143h-1.143V6.57h1.143zm-3.143 0H7.571V6.57h1.143z"/>
</svg> Twitch<br>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
  <path d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"/>
</svg> Discord

	</div>
	</div><br>
	
	</div>



<br><br>

<h3><b>&copy;2025 - Dashboard Admin Panel all right reserved.</b></h3>

	
		
		
</footer>
		
		
</body>
</html>