<?php
    include "conn.php";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include './includes/head.php';?>
</head>
<body>

<?php include './includes/header.php';
include './includes/preloader.php';?>

    <div class="product-area section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Newest Arrivals</h2>
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
<?php include './includes/footer.php';?>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/colors.js"></script>
	<script src="js/slicknav.min.js"></script>
	<script src="js/owl-carousel.js"></script>
	<script src="js/magnific-popup.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/finalcountdown.min.js"></script>
	<script src="js/nicesellect.js"></script>
	<script src="js/flex-slider.js"></script>
	<script src="js/scrollup.js"></script>
	<script src="js/onepage-nav.min.js"></script>
	<script src="js/easing.js"></script>
	<script src="js/active.js"></script>
</body>
</html>