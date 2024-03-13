

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://kit.fontawesome.com/17f7a96081.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <?php include './includes/head.php';?>
    <?php
    include ('./conn.php');
    if (!isset($_SESSION['user'])) {
        header("Location: ./a_customer_area/signup-page.php");
    }

    $customer_id = $_SESSION['customer_id'];

    $get_orders = "SELECT o.order_id, o.customer_id, o.prod_id, o.quantity AS order_quantity, o.order_date, o.order_status, c.*, p.* 
    FROM orders o, customers c, products p 
    WHERE o.customer_id = '$customer_id' AND c.customer_id = o.customer_id AND o.prod_id = p.prod_id
    ORDER BY o.order_date DESC";
    $order_result = mysqli_query($mysqli, $get_orders);

    $order_count = "SELECT COUNT(*) AS order_count 
    FROM orders 
    WHERE customer_id = '$customer_id' AND order_status IN ('Paid', 'Pending')";
    $count_order = mysqli_query($mysqli, $order_count);
    $data_order = mysqli_fetch_assoc($count_order);

    $order_cancelled = "SELECT COUNT(*) AS order_cancelled 
    FROM orders 
    WHERE customer_id = '$customer_id' AND order_status = 'Cancelled'";
    $cancelled_count = mysqli_query($mysqli, $order_cancelled);
    $data_cancelled = mysqli_fetch_assoc($cancelled_count);

    $cart_count = "SELECT COUNT(*) AS cart_count
    FROM cart
    WHERE customer_id = '$customer_id'";
    $count_cart = mysqli_query($mysqli, $cart_count);
    $data_cart = mysqli_fetch_assoc($count_cart);

?>
</head>
<body>

<?php include './includes/header.php';
include './includes/preloader.php';?>


    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <li class="active">
                            <a href="./user_setting.php" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Orders</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Orders</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Address Book</div>
                                    <div class="link-desc">View & Manage Addresses</div>
                                </div>
                            </a>
                        </li> -->
                        <li>
                            <a href="./profile.php" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Profile</div>
                                    <div class="link-desc">Change your profile details & password</div>
                                </div>
                            </a>
                        </li>
                        <li class="help-and-support">
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Help & Support</div>
                                    <div class="link-desc">Contact Us for help and support</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 my-lg-0 my-1">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5"><?php echo $_SESSION['user']?>,</div>
                        <div>Logged in as: <?php echo $_SESSION['email']?></div>
                    </div>
                    <div class="d-flex my-4 flex-wrap">
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Orders placed</div>
                                <div class="ms-auto number"><?php echo $data_order['order_count']?></div>
                            </div>
                        </div>
                        
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/cross-png/file-cancelled-cross-svg-wikipedia-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Cancelled orders</div>
                                <div class="ms-auto number"><?php echo $data_cancelled['order_cancelled']?></div>
                            </div>
                        </div>

                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Items in Cart</div>
                                <div class="ms-auto number"><?php echo $data_cart['cart_count']?></div>
                            </div>
                        </div>

                        <!-- <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Wishlist</div>
                                <div class="ms-auto number">10</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="text-uppercase">My recent orders</div>
                    <!-- <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="col-md-4 col-lg-1 col-xl-10">
                                        <img
                                        src="./a_admin_area/a_uploads/IMG-2-63f5e268b337d4.43664545.jpg"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    </div>
                                    <div class="fs-8">Products #03</div>
                                    <div class="fs-8">22 August, 2020 | 12:05 PM</div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center justify-content-sm-between order-status">
                                    <div class="status">Status : Delivered</div>
                                    <div class="btn btn-primary text-uppercase">order info</div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                    <div class="col-md-4 col-lg-1 col-xl-10">
                                        <img
                                        src="./a_admin_area/a_uploads/IMG-2-63f5e268b337d4.43664545.jpg"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                        <div class="green-label ms-auto text-uppercase">cod</div>
                                    </div>
                                    <div class="fs-8">Products #03</div>
                                    <div class="fs-8">22 August, 2020 | 12:05 PM</div>
                                    <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt=""><span class="px-2">Rating:</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : Delivered</div>
                                    <div class="btn btn-primary text-uppercase">order info</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green">
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted">
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted">
                                            <span class="fas fa-box"></span>
                                        </li>
                                        <li id="step-4" class="text-muted">
                                            <span class="fas fa-truck"></span>
                                        </li>
                                        <li id="step-5" class="text-muted">
                                            <span class="fas fa-box-open"></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php
                        if (mysqli_num_rows($order_result) > 0) {?>
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Total Amount</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </thead> 
                        <?php    while ($data = mysqli_fetch_assoc($order_result)) { 
                                $prod_price = $data['prod_price'];
                                $quantity = $data['order_quantity'];
                                $total_price = $prod_price * $quantity;
                            ?>
                            
                            <tbody>
                                <tr>
                                    <td><?=$data['order_id']?></td>
                                    <td><?=$data['prod_name']?></td>
                                    <td><?=$total_price?></td>
                                    <td><?=$data['order_quantity']?></td>
                                    <td><?=$data['order_date']?>n</td>
                                    <td><?=$data['order_status']?></td>
                                    <?php
                                        if ($data['order_status'] == 'Paid') {
                                            echo "<td>Thank you!</td>";
                                        } else if($data['order_status'] == 'Cancelled') {
                                            echo "<td>Very very sad :(</td>";
                                        }
                                        
                                        else {?>
                                            <td>
                                            <a href="./payment-page.html?id=<?=$data['order_id']?>"><button type="button" class="pay-btn">Pay</button></a>
                                            <a href="./cancel-order.php?id=<?=$data['order_id']?>"><button type="button" class="cancel-btn">Cancel</button></a>
                                        </td>
                                      <?php  }
                                    ?>
                                    
                                </tr>
                            </tbody>
                    
                        <?php    }?>
                        </table>
                        <?php }
                    
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
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

    <script>
			$(document).ready(function() {
				$(".help-and-support").on("click", function() {
					$('html,body').animate({scrollTop: $(document).height()}, 1000);
				});
			});



		</script>
</body>
</html>