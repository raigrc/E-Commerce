<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<?php include './includes/head.php' ?>
<?php
    include ('./conn.php');
    if (!isset($_SESSION['user'])) {
        header("Location: ./a_customer_area/signup-page.php");
    }

    $customer_id = $_GET['id'];
    $get_customer = "SELECT c.cart_id, c.customer_id, c.prod_id, c.quantity AS cart_quantity, b.*, p.* 
    FROM cart c, customers b, products p
    WHERE c.customer_id = '$customer_id' AND c.customer_id = b.customer_id AND p.prod_id = c.prod_id";
    $customer_result = mysqli_query($mysqli, $get_customer);
?>
</head>
<body>

    <?php include './includes/header.php';
    
    include './includes/preloader.php';?>

<section class="h-100">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                    class="fas fa-angle-down mt-1"></i></a></p>
            </div>
          </div>
  
          <?php
            if (mysqli_num_rows($customer_result) > 0) {
              $all_items_amount = 0;
              while ($customer = mysqli_fetch_assoc($customer_result)) {?>
              <div class="card rounded-3 mb-4">
                  <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="./a_admin_area/a_uploads/<?=$customer['prod_img']?>"
                      class="img-fluid rounded-3" alt="Cotton T-shirt">
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2"><?=$customer['prod_name']?></p>
                    <p><span class="text-muted">Items left: </span><?=$customer['quantity']?></p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <input id="form1" min="0" name="quantity" value="<?=$customer['cart_quantity']?>" type="number" class="form-control form-control-sm" disabled />
    
                  </div>
                  <?php
                    $total_amount = $customer['cart_quantity'] * $customer['prod_price']; ?> 
                    <input hidden name="total_amount" type="text" value="<?=$customer['prod_price']?>">
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0" id="total-price">₱ <?=$total_amount?></h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="./delete-items-cart.php?id=<?=$customer['cart_id']?>" class="text-danger"><i class="bi bi-trash"></i></a>
                  </div>
                </div>
              </div>
            </div>

            
          <?php $all_items_amount += $total_amount; }
          }
          ?>	
  
          <!-- <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row">
              <div class="form-outline flex-fill">
                <input type="text" id="form1" class="form-control form-control-lg" />
                <label class="form-label" for="form1">Discound code</label>
              </div>
              <button type="button" class="app-btn btn btn-outline-warning btn-lg ms-3" samplebtn>Apply</button>
            </div>
          </div> -->
  
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-warning btn-block btn-lg"><a href="checkout.php?id=<?php echo $_SESSION['customer_id']?>">Proceed to Pay</a></button>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section>
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
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  
<script src="./js/update_price_cart.js"></script>

</body>
</html>