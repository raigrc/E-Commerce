<?php 
	
	include ('./conn.php');
	if (isset($_SESSION['user'])) {
		$cust_id = $_SESSION['customer_id'];
		$num_items_cart = "SELECT COUNT(*) as num_items FROM cart WHERE customer_id = '$cust_id'";
		$result_cart = mysqli_query($mysqli, $num_items_cart);
	}

?>



<header class="header shop">	
			<div class="container">
				<div class="row">
				</div>
			</div>
					
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						
						<div class="logo">
							<a href=""><img src="./images/mplogo.png" alt="logo"></a>
						</div>
						
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search" name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
	
						</div>
						
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<!-- <div class="search-bar">
								<select>
									<option selected="selected">All Category</option>
									<option>Women</option>
									<option>Men</option>
									<option>Footwears</option>
								</select>
								<form>
									<input name="search" placeholder="Search Products" type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div> -->
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
						
							<!-- <div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div> -->

							<div class="sinlge-bar">
								<a href="user_setting.php" class="single-icon"><i class="fa fa-user-circle-o"></i></a>
							</div>

							<div class="sinlge-bar">
								<a href="a_customer_area/logout.php" class="single-icon"><i class="ti-power-off" aria-hidden="true"></i></a>
							</div>
						
							<div class="sinlge-bar shopping">
								<?php
									if (isset ($_SESSION['user'])) { 
										if (mysqli_num_rows($result_cart) > 0) {
											while ($cart_items = mysqli_fetch_assoc($result_cart)) {?>
												<a href="./cart.php?id=<?=$_SESSION['customer_id'] ?>" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $cart_items['num_items']?></span></a>
												<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo $cart_items['num_items']?> Items</span>
										<a href="./cart.php?id=<?=$_SESSION['customer_id'] ?>">View Cart</a>
									</div>
										<?php	}
										}	?>
										<ul class="shopping-list">
										<!-- <li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="images/ad1.png" alt="#"></a>
											<h4><a href="#">Iskov T21 Sneakers</a></h4>
											<p class="quantity">1x - <span class="amount">3,999.00</span></p>
										</li>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="images/ad3.png" alt="#"></a>
											<h4><a href="#">Terrex Shoes</a></h4>
											<p class="quantity">1x - <span class="amount">2,090.00</span></p>
										</li>
									</ul> -->
									<div class="bottom">
										<!-- <div class="total">
											<span>Total</span>
											<span class="total-amount">6,089.00</span>
										</div> -->
										<a href="./cart.php?id=<?=$_SESSION['customer_id'] ?>" class="btn animate">Checkout</a>
									</div>
								</div>
								<?php	} else { ?>
									<a href="../../elective/a_customer_area/signup-page.php" class="single-icon"><i class="ti-bag"></i></a>
								<?php }
								?>
								
								
								
							</div>
						</div>
						<?php

						if (isset($_SESSION['user'])) { 
							echo "<p class='user'>" . $_SESSION['user'] . "</p>";
						} else {
							echo "<p class='user'><a href='a_customer_area/signup-page.php'>Login</a></p>";
						}
						?>
						
					</div>
				</div>
			</div>
		</div>

		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
								<ul class="main-category">
									<li><a href="./newest.php">Newest Arrivals</a></li>
									<li class="main-mega"><a href="./best.php">Best Selling</a></li>
									<li><a href="./dds.php">Deals of the Day</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">

								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li><a href="./index.php">Home</a></li>
												<li><a href="./featured.php">Featured Product</a></li>												
												<li><a href="./men.php">Men</a></li>														
												<li><a href="./women.php">Women</a></li>									
												<li><a href="./footwear.php">Footwears</a></li>											
											</ul>
										</div>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
  // Get the index of the last clicked li element from localStorage
  var activeIndex = localStorage.getItem('activeIndex');
  if (activeIndex !== null) {
    // Add "active" class to the last clicked li element
    $('.main-menu li').eq(activeIndex).addClass('active');
  }
  
  $('.main-menu li').on('click', function() {
    // Remove "active" class from all li elements in the same list
    $(this).siblings().removeClass('active');
    
    // Add "active" class to the clicked li element
    $(this).addClass('active');
    
    // Store the index of the clicked li element in localStorage
    var index = $(this).index();
    localStorage.setItem('activeIndex', index);
  });
});

</script>
