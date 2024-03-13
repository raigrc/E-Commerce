<?php 
    session_start();
    include 'conn.php';

    $customer_id = $_SESSION['customer_id'];
    $order_id = $_POST['order_id'];

    $get_orders = "SELECT o.order_id, o.customer_id, o.prod_id, o.quantity AS order_quantity, o.order_date, o.order_status, c.*, p.* 
    FROM orders o, customers c, products p 
    WHERE o.customer_id = '$customer_id' AND c.customer_id = o.customer_id AND o.prod_id = p.prod_id AND o.order_id = '$order_id'";
    $order_result = mysqli_query($mysqli, $get_orders);
    

    if (mysqli_num_rows($order_result) > 0) {
        $data = mysqli_fetch_assoc($order_result);

        // $order_id = $data['order_id'];
        $customer_id = $data['customer_id'];
        $prod_price = $data['prod_price'];
        $quantity = $data['order_quantity'];
        $pay_method = $_POST['pay_method'];
        $prod_id = $data['prod_id'];
        $current_quantity = $data['quantity'] - 1;

        $total_amount = $prod_price * $quantity;

        $payment = "INSERT INTO `payments`(`order_id`, `amount`, `payment_mode`) VALUES ('$order_id','$total_amount','$pay_method')";
        $payment_result = mysqli_query($mysqli, $payment);

        $update_status = "UPDATE `orders` SET `order_status`='Paid' WHERE order_id = '$order_id'";
        $update_result = mysqli_query($mysqli, $update_status);

        $update_qty = "UPDATE `products` SET `quantity`='$current_quantity' WHERE prod_id = '$prod_id'";
        $qty_result = mysqli_query($mysqli, $update_qty);

        if($payment_result && $update_result && $qty_result) {
            echo "successfully paid the order!";
        }
    }

?>