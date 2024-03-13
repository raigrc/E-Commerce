<?php
    include ('conn.php');
    // session_start();

    $single_product_id = $_GET['id'];
    $product_select = "SELECT * FROM products WHERE prod_id = '$single_product_id'";
    $product_result = mysqli_query($mysqli, $product_select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/productDisplay.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
    <?php include './includes/head.php';?>

</head>
<body>
<?php include './includes/header.php';
include './includes/preloader.php';?>
    <div class="container mt-5 mb-5">	
        <div class="card">	
            <div class="row g-0">	
                <div class="col-md-6 border-end">	
                    <div class="d-flex flex-column justify-content-center">	
                    <?php
                        if (mysqli_num_rows($product_result) > 0) {
                            $product = mysqli_fetch_assoc($product_result);
                            $_SESSION['prod_id'] = $product['prod_id'];
                            ?>
                        
                        <input name="prod_id" type="text" hidden value="<?=$_SESSION['prod_id']?>">
                        <div class="main_image">	
                            <img src="./a_admin_area/a_uploads/<?=$product['prod_img']?>" id="main_product_image" width="350">	
                        </div>	
                        <div class="thumbnail_images">	
                            <ul id="thumbnail">	
                                <li><img onclick="changeImage(this)" src="./a_admin_area/a_uploads/<?=$product['prod_img2']?>" width="70">
                                </li>	
                            </ul>	
                        </div>	
                    </div>	
                </div>	
                <div class="col-md-6">	
                    <div class="p-3 right-side">
                            <input name="prod_price" type="text" hidden value="<?=$product['prod_price']?>">
                            <h1><?=$product['prod_name']?></h1>
                            <div class="mt-2 pr-3 content">	
                                <p><?=$product['prod_desc']?></p>	
                            </div>	
                            <h3>₱<?=$product['prod_price']?></h3>
                        
                        <div class="mt-5">	
                            <!-- <span class="fw-bold">Color</span>	
                            <div class="colors">	
                                <ul id="marker">	
                                    <li id="marker-1"></li>	
                                    <li id="marker-2"></li>	
                                    <li id="marker-3"></li>	
                                    <li id="marker-4"></li>	
                                    <li id="marker-5"></li>	
                                </ul>	 -->
                                <label for="quantity">Quantity:</label>
                                <div class="quantity">
                                  <input class="qty-details" type="number" id="quantity" name="quantity" min="1" max="10" value="1">
                                  <div class="quantity-controls">
                                    <button class="quantity-up">+</button>
                                    <button class="quantity-down">-</button>
                                  </div>
                            </div>	
                        </div>	
                        <?php
                            if (!isset($_SESSION['customer_id'])) {?>
                                <div class="buttons d-flex flex-row mt-5 gap-3">	
                                    <a href="./a_customer_area/signup-page.php"><button class="btn btn-dark" id="add_to_cart"><i class="bi bi-cart4"></i> Add to Cart</button></a>	
                                </div>
                           <?php }else {?>
                                <input name="cust_id" type="text" hidden value="<?=$_SESSION['customer_id']?>">
                                <div class="buttons d-flex flex-row mt-5 gap-3">	
                            <button class="btn btn-dark" id="add_to_cart"><i class="bi bi-cart4"></i> Add to Cart</button>	
                        </div>
                           <?php }
                        ?>
                        	
                        </div>
                        
                        </div>
                        <?php
                        }
                        ?>	
                    </div>	
                </div>	
            </div>	
        </div> 
    </div>
    <?php include './includes/footer.php';?>
</body>
<script>
    function changeImage(element) {

var main_prodcut_image = document.getElementById('main_product_image');
main_prodcut_image.src = element.src;}
</script>
<script>
// Get the quantity input and buttons
const quantityInput = document.getElementById('quantity');
const quantityUpBtn = document.querySelector('.quantity-up');
const quantityDownBtn = document.querySelector('.quantity-down');

// Add event listeners to the buttons
quantityUpBtn.addEventListener('click', () => {
  increaseQuantity();
});

quantityDownBtn.addEventListener('click', () => {
  decreaseQuantity();
});

// Function to increase the quantity value
function increaseQuantity() {
  let quantityValue = parseInt(quantityInput.value);
  if (quantityValue < parseInt(quantityInput.max)) {
    quantityValue++;
    quantityInput.value = quantityValue;
  }
}

// Function to decrease the quantity value
function decreaseQuantity() {
  let quantityValue = parseInt(quantityInput.value);
  if (quantityValue > parseInt(quantityInput.min)) {
    quantityValue--;
    quantityInput.value = quantityValue;
  }
}

</script>

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
    <script src="./js/add_to_cart.js"></script>
</html>