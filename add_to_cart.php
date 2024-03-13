<?php 
session_start();

require_once("conn.php");

if (isset($_POST['quantity']) && isset($_POST['cust_id']) && isset($_POST['prod_id'])) {
    
    $customer_id = $_POST['cust_id'];
    $product_id = $_POST['prod_id'];
    $quantity = $_POST['quantity'];

    $add_cart = "INSERT INTO `cart`(`customer_id`, `prod_id`, `quantity`) VALUES ('$customer_id','$product_id','$quantity')";

    $cart_result = mysqli_query($mysqli, $add_cart);

    if($cart_result) {
        echo "successfully added to cart";
    }
}

?>