<?php 
    session_start();
    include './conn.php';

    $customer_id = $_SESSION['customer_id'];

    $check_cart = "SELECT c.cart_id, c.customer_id, c.prod_id, c.quantity AS cart_quantity, b.*, p.* 
    FROM cart c, customers b, products p
    WHERE c.customer_id = '$customer_id' AND c.customer_id = b.customer_id AND p.prod_id = c.prod_id";
    $check_result = mysqli_query($mysqli, $check_cart);

    if (mysqli_num_rows($check_result) > 0) {
        while ($row = mysqli_fetch_assoc($check_result)) {
            $quantity = $row['cart_quantity'];
            $prod_id = $row['prod_id'];
            $current_quantity = $row['quantity'] - 1;

            $add_order = "INSERT INTO orders(`customer_id`, `prod_id`, `quantity`) VALUES ('$customer_id', '$prod_id', '$quantity')";
            $order_result = mysqli_query($mysqli, $add_order);

            $remove_cart = "DELETE FROM cart WHERE prod_id = '$prod_id'";
            $remove_result = mysqli_query($mysqli, $remove_cart);

            
        
            if ($order_result && $remove_result) {
                echo "<script>alert('Successfully placed an order!')</script>";
                echo "<script>window.location='./user_setting.php?id=$customer_id'</script>";
            }
        }
    } else {
        echo 'bobo';
    }





?>