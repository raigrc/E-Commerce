<?php

if (isset($_SESSION['username'])) {
    //$username = $_POST['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
	include './includes/head.php';
	include './conn.php';
	$hot_items = "SELECT products.*
	FROM (
	  SELECT cat_id, prod_id, ROW_NUMBER() OVER (PARTITION BY cat_id ORDER BY RAND()) AS row_num
	  FROM products
	) subquery
	JOIN products ON subquery.cat_id = products.cat_id AND subquery.prod_id = products.prod_id
	WHERE subquery.row_num <= 5 AND products.cat_id IN(1,2)";
	$hot_result = mysqli_query($mysqli, $hot_items);

    $menproduct = "SELECT *
	FROM products
	WHERE cat_id = 1
	ORDER BY RAND()
	LIMIT 12;
	";
    $menresult = mysqli_query($mysqli, $menproduct);

	$womenproduct = "SELECT *
	FROM products
	WHERE cat_id = 2
	ORDER BY RAND()
	LIMIT 12;
	";
    $womenresult = mysqli_query($mysqli, $womenproduct);

	$footproduct = "SELECT *
	FROM products
	WHERE cat_id = 3
	ORDER BY RAND()
	LIMIT 12;
	";
    $footresult = mysqli_query($mysqli, $footproduct);

	$allproduct = "SELECT products.*
	FROM (
	  SELECT cat_id, prod_id, ROW_NUMBER() OVER (PARTITION BY cat_id ORDER BY RAND()) AS row_num
	  FROM products
	) subquery
	JOIN products ON subquery.cat_id = products.cat_id AND subquery.prod_id = products.prod_id
	WHERE subquery.row_num <= 10";
	$allproductresult = mysqli_query($mysqli, $allproduct);

	$sub_product = "SELECT products.*
	FROM (
	  SELECT cat_id, prod_id, ROW_NUMBER() OVER (PARTITION BY cat_id ORDER BY RAND()) AS row_num
	  FROM products
	) subquery
	JOIN products ON subquery.cat_id = products.cat_id AND subquery.prod_id = products.prod_id
	WHERE subquery.row_num <= 2";
	$sub_productresult = mysqli_query($mysqli, $sub_product);
	$sub_productresult1 = mysqli_query($mysqli, $sub_product);
	$sub_productresult2 = mysqli_query($mysqli, $sub_product);
	
	?>
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
        </div>
    </nav>
    <div class="col-md-3"></div>
    <!-- <div class="col-md-6 well">
        <div class="col-md-3"></div>
        <div class="col-md-6">  
		
		<div class="text-success"><h1>Welcome, <b><?php echo $_SESSION['username']; ?></b></h1></div>
	
        </div>
    </div> -->

	<?php include './includes/header.php';
include './includes/preloader.php';?>
	<section class="hero-slider">

		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span>UP TO 50% OFF </span>MANOA RUNNING SHOES</h1>
										<p>HURRY UP AND PUT YOUR BEST FEET FORWARD. <br> GRAB YOURS NOW!</p>
										<div class="button">
											<a href="./footwear.php" class="btn">Shop Now!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/winter.png" alt="#">
						<div class="content">
							<p>Men's Lookbook</p>
							<h3>Winter Season <br> Fits</h3>
							<a href="./men.php">Discover Now</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/collect.png" alt="#">
						<div class="content">
							<p>Queer Section</p>
							<h3>NooNoo Collection <br> 2022</h3>
							<a href="./featured.php">Shop Now</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="images/foot.gif" alt="#">
						<div class="content">
							<p>Flash Sale</p>
							<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
							<a href="./footwear.php">Discover Now</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">

								<ul class="nav nav-tabs" id="myTab" role="tablist">
								
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all" role="tab">ALL</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#men" role="tab">Men</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Women</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#shoes" role="tab">Footwear</a></li>
								
								</ul>

							</div>
							<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active" id="all" role="tabpanel">
								<div class="tab-single">
									<div class="row">
									<?php

										if (mysqli_num_rows($allproductresult) > 0) {
											while ($products = mysqli_fetch_assoc($allproductresult)) {?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="productDisplay.php?id=<?=$products['prod_id']?>">
																<img class="default-img" src="./a_admin_area/a_uploads/<?=$products['prod_img']?>" alt="#">
																<img class="hover-img" src="./a_admin_area/a_uploads/<?=$products['prod_img2']?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">																
																	<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>																
																</div>
																<div class="product-action-2">
																	<a title="Add to cart" href="#">Add to cart</a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="productDisplay.php?id=<?=$products['prod_id']?>"><?=$products['prod_name']?></a></h3>
															<div class="product-price">
																<span>₱<?=$products['prod_price']?></span>
															</div>
														</div>
													</div>
												</div>
										<?php    }
										}
										?>
									</div>
								</div>
							</div>


							<div class="tab-pane fade" id="men" role="tabpanel">
								<div class="tab-single">
									<div class="row">
									<?php

										if (mysqli_num_rows($menresult) > 0) {
											while ($products = mysqli_fetch_assoc($menresult)) {?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="product-details.html">
																<img class="default-img" src="./a_admin_area/a_uploads/<?=$products['prod_img']?>" alt="#">
																<img class="hover-img" src="./a_admin_area/a_uploads/<?=$products['prod_img2']?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">																
																	<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>																
																</div>
																<div class="product-action-2">
																	<a title="Add to cart" href="#">Add to cart</a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="product-details.html"><?=$products['prod_name']?></a></h3>
															<div class="product-price">
																<span>₱<?=$products['prod_price']?></span>
															</div>
														</div>
													</div>
												</div>
										<?php    }
										}
										?>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="women" role="tabpanel">
								<div class="tab-single">
									<div class="row">
									<?php

										if (mysqli_num_rows($womenresult) > 0) {
											while ($products = mysqli_fetch_assoc($womenresult)) {?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="product-details.html">
																<img class="default-img" src="./a_admin_area/a_uploads/<?=$products['prod_img']?>" alt="#">
																<img class="hover-img" src="./a_admin_area/a_uploads/<?=$products['prod_img2']?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">																
																	<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>																
																</div>
																<div class="product-action-2">
																	<a title="Add to cart" href="#">Add to cart</a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="product-details.html"><?=$products['prod_name']?></a></h3>
															<div class="product-price">
																<span>₱<?=$products['prod_price']?></span>
															</div>
														</div>
													</div>
												</div>
										<?php    }
										}
										?>
									</div>
								</div>
							</div>


							<div class="tab-pane fade" id="shoes" role="tabpanel">
								<div class="tab-single">
									<div class="row">
									<?php

										if (mysqli_num_rows($footresult) > 0) {
											while ($products = mysqli_fetch_assoc($footresult)) {?>
												<div class="col-xl-3 col-lg-4 col-md-4 col-12">
													<div class="single-product">
														<div class="product-img">
															<a href="productDisplay.php?id=<?=$products['prod_id']?>">
																<img class="default-img" src="./a_admin_area/a_uploads/<?=$products['prod_img']?>" alt="#">
																<img class="hover-img" src="./a_admin_area/a_uploads/<?=$products['prod_img2']?>" alt="#">
															</a>
															<div class="button-head">
																<div class="product-action">																
																	<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>																
																</div>
																<div class="product-action-2">
																	<a title="Add to cart" href="#">Add to cart</a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3><a href="productDisplay.php?id=<?=$products['prod_id']?>"><?=$products['prod_name']?></a></h3>
															<div class="product-price">
																<span>₱<?=$products['prod_price']?></span>
															</div>
														</div>
													</div>
												</div>
										<?php    }
										}
										?>
									</div>
								</div>
							</div>

						</div>
						</div>
					</div>
				</div>
            </div>
    </div>							

	<section class="medium-banner">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/10.png" alt="#">
						<div class="content">
							<p>Shop by Phase</p>
							<h3>Gear up your fashion <br>Up to<span> 50%</span></h3>
							<a href="./women.php">Shop Now</a>
						</div>
					</div>
				</div>


				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/9.png" alt="#">
						<div class="content">
							<p>Gear up! Summer Coll</p>
							<h3>Catch up <br>Our Sunny Season up to <span>90%</span></h3>
							<a href="./footwear.php" class="btn">Shop Now</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<?php
							if (mysqli_num_rows($hot_result) > 0) {
								while($hot = mysqli_fetch_assoc($hot_result)) {?>
									<div class="single-product">
										<div class="product-img">
											<a href="productDisplay.php?id=<?=$hot['prod_id']?>">
												<img class="default-img" src="./a_admin_area/a_uploads/<?=$hot['prod_img']?>" alt="#">
												<img class="hover-img" src="./a_admin_area/a_uploads/<?=$hot['prod_img2']?>" alt="#">
												<span class="out-of-stock">Hot</span>
											</a>
											<div class="button-head">
												<div class="product-action">
													<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												</div>
												<div class="product-action-2">
													<a title="Add to cart" href="#">Add to cart</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h3><a href="productDisplay.php?id=<?=$hot['prod_id']?>"><?=$hot['prod_name']?></a></h3>
											<div class="product-price">
												<!-- <span class="old">1,990.00</span> -->
												<span>₱ <?=$hot['prod_price']?></span>
											</div>
										</div>
									</div>
						<?php	}
							}
						?>
						<!-- <div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="images/12.png" alt="#">
									<img class="hover-img" src="images/121.png" alt="#">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html">Curdo Fluff Vest</a></h3>
								<div class="product-price">
									<span class="old">1,990.00</span>
									<span>790.00</span>
								</div>
							</div>
						</div>


						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/221.png" alt="#">
                                    <img class="hover-img" src="images/22.png" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Iskov Fitted Jeans</a></h3>
                                <div class="product-price">
                                    <span>1,050.00</span>
                                </div>
                            </div>
                        </div>


						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/231.png" alt="#">
                                    <img class="hover-img" src="images/23.png" alt="#">
									<span class="new">New</span>
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Reversible Shorts</a></h3>
                                <div class="product-price">
                                    <span>549.00</span>
                                </div>
                            </div>
                        </div>


						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/15.png" alt="#">
                                    <img class="hover-img" src="images/151.png" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Silk Longsleeves</a></h3>
                                <div class="product-price">
                                    <span>780.00</span>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>


	<section class="shop-home-list section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="row">
						<div class="col-12">
							<div class="shop-section-title">
								<h1>On sale</h1>
							</div>
						</div>
					</div>

					<?php
						if (mysqli_num_rows($sub_productresult) > 0 ) {
							while ($subprods = mysqli_fetch_assoc($sub_productresult)) { ?>
								<div class="single-list">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="list-image overlay">
											<img src="./a_admin_area/a_uploads/<?=$subprods['prod_img']?>" alt="#">
											<a href="./productDisplay.php?id=<?=$subprods['prod_id']?>" class="buy"><i class="fa fa-shopping-bag"></i></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 no-padding">
										<div class="content">
											<h4 class="title"><a href="./productDisplay.php?id=<?=$subprods['prod_id']?>"><?=$subprods['prod_name']?></a></h4>
											<p class="price with-discount">₱ <?=$subprods['prod_price']?></p>
										</div>
									</div>
								</div>
							</div>
						<?php	}
						}
					?>
					<!-- <div class="single-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="list-image overlay">
									<img src="images/s6.png" alt="#">
									<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 no-padding">
								<div class="content">
									<h5 class="title"><a href="#">Felicity Tops</a></h5>
									<p class="price with-discount">199.00</p>
								</div>
							</div>
						</div>
					</div> -->

				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="row">
						<div class="col-12">
							<div class="shop-section-title">
								<h1>Best Seller</h1>
							</div>
						</div>
					</div>

					<?php
						if (mysqli_num_rows($sub_productresult1) > 0 ) {
							while ($subprods = mysqli_fetch_assoc($sub_productresult1)) { ?>
								<div class="single-list">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="list-image overlay">
											<img src="./a_admin_area/a_uploads/<?=$subprods['prod_img']?>" alt="#">
											<a href="./productDisplay.php?id=<?=$subprods['prod_id']?>" class="buy"><i class="fa fa-shopping-bag"></i></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 no-padding">
										<div class="content">
											<h4 class="title"><a href="./productDisplay.php?id=<?=$subprods['prod_id']?>"><?=$subprods['prod_name']?></a></h4>
											<p class="price with-discount">₱ <?=$subprods['prod_price']?></p>
										</div>
									</div>
								</div>
							</div>
						<?php	}
						}
					?>

				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="row">
						<div class="col-12">
							<div class="shop-section-title">
								<h1>Top viewed</h1>
							</div>
						</div>
					</div>

					<?php
						if (mysqli_num_rows($sub_productresult2) > 0 ) {
							while ($subprods = mysqli_fetch_assoc($sub_productresult2)) { ?>
								<div class="single-list">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="list-image overlay">
											<img src="./a_admin_area/a_uploads/<?=$subprods['prod_img']?>" alt="#">
											<a href="./productDisplay.php?id=<?=$subprods['prod_id']?>" class="buy"><i class="fa fa-shopping-bag"></i></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 no-padding">
										<div class="content">
											<h4 class="title"><a href="./productDisplay.php?id=<?=$subprods['prod_id']?>"><?=$subprods['prod_name']?></a></h4>
											<p class="price with-discount">₱ <?=$subprods['prod_price']?></p>
										</div>
									</div>
								</div>
							</div>
						<?php	}
						}
					?>

				</div>
			</div>
		</div>
	</section>

		
	<section class="shop-blog section">
		<!-- <div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Rkive</h2>
					</div>
				</div>
			</div> -->
			<!-- <div class="row">
				<div class="col-lg-4 col-md-6 col-12">

					<div class="shop-single-blog">
						<img src="images/blog1.png" alt="#">
						<div class="content">
							<p class="date">#LetyourPHASEdecideyourFit</p>
							<a href="#" class="title">Unleash your inner beauty.</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>

				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<div class="shop-single-blog">
						<img src="images/bl2.png" alt="#">
						<div class="content">
							<p class="date">#SoleBrandtoRemember</p>
							<a href="#" class="title">Walk the line with us.</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>

				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<div class="shop-single-blog">
						<img src="images/bl3.png" alt="#">
						<div class="content">
							<p class="date">#DiscoveryourPHASEtoday</p>
							<a href="#" class="title">Fits Collection Festive</a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>

				</div>
			</div> -->
		</div>
	</section>


	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">

					<div class="single-service">
						<i class="ti-truck"></i>
						<h4>Free Shipping</h4>
						<p>Selected Orders above 1000.00</p>
					</div>

				</div>
				<div class="col-lg-3 col-md-6 col-12">

					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Warranty Return</h4>
						<p>Within 30 days warranty</p>
					</div>

				</div>
				<div class="col-lg-3 col-md-6 col-12">

					<div class="single-service">
						<i class="ti-credit-card"></i>
						<h4>Secure Payments</h4>
						<p>Protected by LCash</p>
					</div>

				</div>
				<div class="col-lg-3 col-md-6 col-12">

					<div class="single-service">
						<i class="ti-ticket"></i>
						<h4>Vouchers & Gifts</h4>
						<p>On all orders</p>
					</div>

				</div>
			</div>
		</div>
	</section>
	<?php include './includes/footer.php';?>
	
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery-migrate-3.0.0.js"></script>
	<script src="./s/jquery-ui.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/colors.js"></script>
	<script src="./js/slicknav.min.js"></script>
	<script src="./js/owl-carousel.js"></script>
	<script src="./js/magnific-popup.js"></script>
	<script src="./js/waypoints.min.js"></script>
	<script src="./js/finalcountdown.min.js"></script>
	<script src="./js/nicesellect.js"></script>
	<script src="./js/flex-slider.js"></script>
	<script src="./js/scrollup.js"></script>
	<script src="./js/onepage-nav.min.js"></script>
	<script src="./js/easing.js"></script>
	<script src="./js/active.js"></script>
    
</body>
</html>